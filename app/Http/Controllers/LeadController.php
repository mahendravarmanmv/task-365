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
}

