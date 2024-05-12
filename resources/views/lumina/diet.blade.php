@include('layouts.navigation')
@include('layouts.head')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bmi pt-[5vw]">
        <div class="bmi-container flex  w-full h-full justify-center relative">
            <div class="left-bmi w-[19vw] bg-white h-full flex flex-col  pt-[2vw] ps-[2vw] fixed left-0 border-e-2">
                <div class="bmi-form justify-center">
                    <div class="title mt-[2vw]">
                        <h1 class="md:text-[2.2vw] text-[5.5vw] font-semibold md:mb-[1.6vw] mb-[8vw] text-black">Lumina <span class="py-2 px-4 bg-[#4E9F3D] text-white rounded" data-aos="fade">BMI</span> Calculator</h1>
                    </div>
                    <div class="form flex">
                        <form action="{{ route('calculateBMI') }}" method="post">
                            @csrf
                            <div class="mb-4 w-[6vw]">
                                <label for="weight" class="block text-sm font-medium text-gray-700">Berat Badan</label>
                                <input type="number" id="weight" name="weight" class="mt-1 p-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="height" class="block text-sm font-medium text-gray-700">Tinggi Badan</label>
                                <input type="number" id="height" name="height" class="mt-1 p-2 border border-gray-300 rounded-md">
                            </div>
                            <button type="submit" class="text-white py-[1vw] px-[2vw] w-full rounded" style="background-color: #4E9F3D">Hitung BMI</button>
                        </form>
                    </div>
                </div>

                <div class="message-wrapper pe-[2.5vw]">
                    <div class="message bg-transparent text-black rounded-[1vw] p-[1vw] text-[0.9vw] text-justify border  border-[#4E9F3D]">
                        <p>Kalkulator ini digunakan untuk menghitung berat badan ideal. yang dimana hasil perhitungannya akan dipakai untuk memfilter makanan yang cocok untuk anda</p>
                    </div>
                </div>
            </div>
            <div class="right-bmi W-full bg-white overflow-auto pt-[1vw] ps-[19vw]">
                <div class="title p-[2vw] text-[1.8vw] text-black font-semibold">
                    @isset($category)
                        <h1>Daftar makanan untuk BMI dengan kategori <span class="py-2 px-4 bg-[#4E9F3D] text-white rounded" data-aos="fade">{{ $category }}</span></h1>  
                    @endisset
                </div>
                <div class="product-list grid grid-cols-4 gap-[3vw] p-[2vw]">
                @isset($category)
                @foreach ($diets as $diet)
                    @if ($category === $diet->category)
                    <div class="bg-white shadow-md rounded-md p-4 w-64 text-black">
                        <img class="rounded-md w-full h-32 object-cover" src="{{ asset('storage/'. $diet->photo ) }}" alt="diet">
                        <div class="mt-4">
                            <h3 class="text-xl font-semibold">{{ $diet->name }}</h3>
                            <div class="flex items-center space-x-2 mt-2">
                                <span class="bg-gray-200 rounded-md px-2 py-1 text-sm font-semibold text-gray-700">Category: {{ $diet->category }}</span>
                            </div>
                            <div class="mt-4">
                                <p class="text-xl font-semibold">Rp. {{ $diet->price }}</p>
                            </div>
                        </div>
                        <div class="mt-6 text-black">
                            <form action="{{ route('bmi-checkout') }}" method="post">
                                @csrf
                                <input type="hidden" name="product" value="{{ $diet->id }}">
                                <button type="submit" class="bg-[#4E9F3D] text-white px-6 py-3 rounded-md shadow-md hover:bg-green-700 transition duration-300 ease-in-out w-full" style="background-color: #4E9F3D">Beli</button>
                            </form>
                        </div>
                    </div>                 
                    @endif
                @endforeach
                @endisset
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>