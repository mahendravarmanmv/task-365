<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;

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

    return view('leads.index', compact('leads', 'selectedCategory'));
}
    public function show(Lead $lead)
    {
        // Authorize if needed: check if user has access to this lead's category
        $user = Auth::user();
        $categoryIds = $user->categories->pluck('id');

        if (!$categoryIds->contains($lead->category_id)) {
            abort(403); // Forbidden
        }

        return view('leads.show', compact('lead'));
    }
    public function payment(Lead $lead)
    {
        // Optional: Authorization check
        $user = Auth::user();
        if (!$user->categories->pluck('id')->contains($lead->category_id)) {
            abort(403); // Forbidden
        }

        // You can return a payment view
        return view('leads.payment', compact('lead'));
    }
}

