<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use App\Models\Payment;
use App\Models\Wishlist;

class LeadController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categoryId = request()->category;

        if ($categoryId) {
            // Show leads for a specific category
            $leads = Lead::where('category_id', $categoryId)
                ->with('category')
                ->latest()
                ->get();

            $selectedCategory = Category::find($categoryId);
        } elseif ($user) {
            // Logged-in user: show leads for their categories
            $categoryIds = $user->categories->pluck('id');
            $leads = Lead::whereIn('category_id', $categoryIds)
                ->with('category')
                ->latest()
                ->get();

            $selectedCategory = null;
        } else {
            // Not logged in and no category selected — show nothing or all
            $leads = collect();
            $selectedCategory = null;
        }

        // Safe wishlist fetch: only if logged in
        $wishlistedIds = $user
            ? Wishlist::where('user_id', $user->id)->pluck('lead_id')->toArray()
            : [];

        // Get all lead_ids already purchased by this user
        $purchasedLeadIds = Payment::where('email', $user->email)
            ->where('status', 1)
            ->pluck('lead_id')
            ->toArray();

        return view('leads.index', compact('leads', 'selectedCategory', 'wishlistedIds', 'purchasedLeadIds'));
    }
    public function show(Lead $lead)
    {
        // Authorize if needed: check if user has access to this lead's category
        $user = Auth::user();
        // 1. Authorize category access
        $categoryIds = $user->categories->pluck('id');

        if (!$categoryIds->contains($lead->category_id)) {
            abort(403); // Forbidden
        }

        // 2. Prevent re-purchase of already purchased lead
        $alreadyPurchased = Payment::where('email', $user->email) // or use 'user_id' if available
            ->where('lead_id', $lead->id)
            ->where('status', 1) // successful payment
            ->exists();

        if ($alreadyPurchased) {
            return redirect()->route('leads.index')
                ->with('error', 'You have already purchased this lead.');
        }
        // 3. Show lead view if all checks pass
        return view('leads.show', compact('lead'));
    }
    public function payment(Lead $lead)
    {
        // Optional: Authorization check
        $user = Auth::user();
         // 1. Optional: Authorization check
        if (!$user->categories->pluck('id')->contains($lead->category_id)) {
            abort(403); // Forbidden
        }
        // 2. Prevent access if lead already purchased
        $alreadyPurchased = \App\Models\Payment::where('email', $user->email) // or 'user_id' if available
            ->where('lead_id', $lead->id)
            ->where('status', 1) // successful payment
            ->exists();

        if ($alreadyPurchased) {
            return redirect()->route('leads.index')
                ->with('error', 'You have already purchased this lead. Payment not allowed again.');
        }
        // 3. Show payment page if all checks pass
        return view('leads.payment', compact('lead'));
    }
}
