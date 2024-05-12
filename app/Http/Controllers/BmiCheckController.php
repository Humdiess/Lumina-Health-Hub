<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class BmiCheckController extends Controller
{
    public function index()
    {
        $diets = Diet::all();
        return view('lumina.diet', compact('diets'));
    }

    public function checkout(Request $request)
    {
        $dietId = $request->input('diet');
        $diet = Diet::findOrFail($dietId);

        return view('lumina.checkout', compact('diet'));
    }
}
