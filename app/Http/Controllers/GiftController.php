<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::orderBy('price')->get();
        $availableGifts = Gift::available()->orderBy('price')->get();
        $purchasedGifts = Gift::purchased()->orderBy('purchased_at', 'desc')->get();
        
        return view('gifts.index', compact('gifts', 'availableGifts', 'purchasedGifts'));
    }

    public function show(Gift $gift)
    {
        return view('gifts.show', compact('gift'));
    }

    public function purchase(Request $request, Gift $gift)
    {
        if ($gift->is_purchased) {
            return redirect()->back()->with('error', 'Este presente já foi comprado!');
        }

        $request->validate([
            'buyer_name' => 'required|string|max:255',
        ]);

        $gift->update([
            'is_purchased' => true,
            'purchased_by' => $request->buyer_name,
            'purchased_at' => now(),
        ]);

        return redirect()->route('gifts.index')->with('success', 'Obrigado por presentear os noivos!');
    }
}
