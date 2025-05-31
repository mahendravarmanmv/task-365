<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::first();
        $categories = Category::all(); // Fetch all categories from the database
        return view('home', compact('categories','banner')); // Pass categories to the home view
    }
}
