<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diet;

class BMIController extends Controller
{
    public function calculate(Request $request)
    {
        // Validate the input
        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        // Calculate BMI
        $weight = $request->input('weight');
        $height = $request->input('height') / 100; // Convert height to meters
        $bmi = $weight / ($height * $height);

        // Determine BMI category
        $category = $this->getCategory($bmi);

        // Fetch all products based on the BMI category
        $diets = Diet::where('category', $category)->get();

        return view('lumina.diet', [
            'bmi' => $bmi,
            'category' => $category,
            'diets' => $diets,
        ]);
    }

    private function getCategory($bmi)
    {
        if ($bmi < 18.5) {
            return 'Underweight';
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            return 'Normal';
        } elseif ($bmi >= 25 && $bmi < 30) {
            return 'Overweight';
        } else {
            return 'Obese';
        }
    }
}
