<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        
        // Return a view and pass the category (you can load related leads if needed)
        return view('categories.show', compact('category'));
    }
}

