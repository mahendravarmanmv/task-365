<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('lead.category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('wishlist.index', compact('wishlists'));
    }
    public function toggle(Request $request)
    {
        $leadId = $request->lead_id;
        $userId = Auth::id();

        $wishlist = Wishlist::where('user_id', $userId)
            ->where('lead_id', $leadId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'lead_id' => $leadId
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
