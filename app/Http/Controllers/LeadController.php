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
    public function index(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->input('category');

        // Validate category ID if present
        if ($categoryId && !is_numeric($categoryId)) {
            return response()->view('errors.400', [], 400);
        }

        $selectedCategory = null;

        if ($categoryId) {
            // Ensure the category exists
            $selectedCategory = Category::find($categoryId);
            if (!$selectedCategory) {
                return response()->view('errors.404', [], 404);
            }

            // Show leads for the selected category
            $leads = Lead::where('category_id', $categoryId)
                ->with(['category', 'websiteType'])
                ->latest()
                ->get();
        } elseif ($user) {
            // Logged-in user: show leads from their associated categories
            $categoryIds = $user->categories->pluck('id');
            $leads = Lead::whereIn('category_id', $categoryIds)
                ->with(['category', 'websiteType'])
                ->latest()
                ->get();
        } else {
            // Not logged in and no category selected
            return redirect()->route('login')->with('error', 'Please login to view your leads.');
        }

        // Safe wishlist fetch: only if logged in
        $wishlistedIds = $user
            ? Wishlist::where('user_id', $user->id)->pluck('lead_id')->toArray()
            : [];

        // Purchased lead IDs: only if logged in
        $purchasedLeadIds = $user
            ? Payment::where('user_id', $user->id)
            ->where('status', 1)
            ->pluck('lead_id')
            ->toArray()
            : [];

        return view('leads.index', compact(
            'leads',
            'selectedCategory',
            'wishlistedIds',
            'purchasedLeadIds'
        ));
    }

    public function show(Lead $lead)
    {
        $user = Auth::user();

        // 1. Check authentication
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view this lead.');
        }

        // 2. Check if the user has access to this lead's category
        $userCategoryIds = $user->categories->pluck('id'); // make sure 'categories' is a valid relation

        if (!$userCategoryIds->contains($lead->category_id)) {
            return response()->view('errors.403', [], 403); // custom 403 page
        }

        // 3. Check if the lead is already purchased
        $alreadyPurchased = Payment::where('user_id', $user->id)
            ->where('lead_id', $lead->id)
            ->where('status', 1)
            ->exists();

        if ($alreadyPurchased) {
            return redirect()->route('leads.index')
                ->with('error', 'You have already purchased this lead.');
        }

        // 4. All checks passed — show the lead
        return view('leads.show', compact('lead'));
    }

    public function payment(Lead $lead)
    {
        $user = Auth::user();

        // 1. Check authentication
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to continue to payment.');
        }

        // 2. Check if the user has access to the lead's category
        $userCategoryIds = $user->categories->pluck('id'); // categories must be a proper relation

        if (!$userCategoryIds->contains($lead->category_id)) {
            return response()->view('errors.403', [], 403); // or redirect with message
        }

        // 3. Check if the lead is already purchased
        $alreadyPurchased = Payment::where('user_id', $user->id) // Use user_id if preferred
            ->where('lead_id', $lead->id)
            ->where('status', 1)
            ->exists();

        if ($alreadyPurchased) {
            return redirect()->route('leads.index')
                ->with('error', 'You have already purchased this lead. Payment is not allowed again.');
        }

        // 4. All checks passed — show the payment page
        return view('leads.payment', compact('lead'));
    }
    public function viewlead($id)
    {
        $lead = Lead::with(['category', 'websiteType'])->findOrFail($id);

        return view('leads.view', compact('lead'));
    }

}
