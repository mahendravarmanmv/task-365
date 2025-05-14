<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get all category IDs this user belongs to
        $categoryIds = $user->categories->pluck('id');

        // Fetch leads belonging to those categories, with category relationship
        $leads = Lead::whereIn('category_id', $categoryIds)
            ->with('category') // Eager load the category
            ->latest()
            ->get();

        return view('leads.index', compact('leads'));
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

