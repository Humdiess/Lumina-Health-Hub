<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diet;

class DietController extends Controller
{
    public function index()
    {
        $diets = Diet::all();
        return view('lumina.diet')->with('diets', $diets);
    }

    public function create()
    {
        return view('product.diet');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for image file
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public'); // Store the file in the "public/photos" directory
    
            // You can save the $photoPath to the database, for example:
            // Diet::create([... other fields ..., 'photo' => $photoPath]);
        }
    
        Diet::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
            'photo' => $photoPath ?? null, // Save the photo path or null if no photo is uploaded
        ]);
    
        return redirect()->back()->with('success', 'Product added successfully.');
    }
}
