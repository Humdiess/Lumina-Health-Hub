@extends('layouts.head')


    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-semibold mb-3">Add Product</h1>

        <form action="{{ url('/diet') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Product Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*" class="mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="mt-1 p-2 border border-gray-300 rounded-md">
                    <option value="Overweight">Overweight</option>
                    <option value="Normal">Normal</option>
                    <option value="Underweight">Underweight</option>
                    <option value="Obese">Obese</option>
                </select>
            </div>
            

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" class="mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <button type="submit" class="text-white py-2 px-4 bg-[#4E9F3D] rounded-md">Add Product</button>
        </form>
    </div>
