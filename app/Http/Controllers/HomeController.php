<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('home', compact('categories')); // Pass categories to the home view
    }
}
