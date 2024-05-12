<!-- resources/views/lumina/checkout.blade.php -->
@include('layouts.head')

<div class="flex bg-white h-screen">
    <div class="w-2/3 pr-8">
        <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>
        
        <form action="{{ route('checkout') }}" method="post" class="max-w-md mx-auto">
            @csrf
            <input type="hidden" name="product" value="{{ $product->id }}">

            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-600">Jumlah Barang:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="10" onchange="updateTotal()"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            
            <p class="mb-2">Harga per barang: Rp. {{ $product->price }}</p>
            <p class="mb-4">Total Harga: Rp. <span id="totalPrice">{{ $product->price }}</span></p>

            <button type="submit"
                class="py-2 w-full bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300 ease-in-out">
                Beli
            </button>
        </form>

        <a href="/" class="block mt-4 text-blue-500 text-center">Kembali ke Halaman Utama</a>

        <script>
            function updateTotal() {
                var quantity = document.getElementById('quantity').value;
                var price = {{ $product->price }};
                var total = quantity * price;
                document.getElementById('totalPrice').innerText = total.toFixed(2);
            }
        </script>
    </div>
</div>

<footer class="bg-gray-900 text-white py-8">
    <div class="container mx-auto flex flex-wrap justify-between text-center">
        <div class="w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
            <h2 class="text-2xl font-bold mb-4">Lumina Health Hub</h2>
            <p class="text-gray-400">Your trusted partner for a healthier life.</p>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
            <h3 class="text-xl font-bold mb-2">Quick Links</h3>
            <ul>
                <li><a href="#" class="hover:text-gray-400 transition duration-300 ease-in-out">Home</a></li>
                <li><a href="#" class="hover:text-gray-400 transition duration-300 ease-in-out">Services</a></li>
                <li><a href="#" class="hover:text-gray-400 transition duration-300 ease-in-out">About Us</a></li>
                <li><a href="#" class="hover:text-gray-400 transition duration-300 ease-in-out">Contact</a></li>
            </ul>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
            <h3 class="text-xl font-bold mb-2">Connect With Us</h3>
            <ul>
                <li><a href="#" class="hover:text-gray-400 transition duration-300 ease-in-out">Facebook</a></li>
                <li><a href="#" class="hover:text-gray-400 transition duration-300 ease-in-out">Twitter</a></li>
                <li><a href="#" class="hover:text-gray-400 transition duration-300 ease-in-out">Instagram</a></li>
            </ul>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
            <h3 class="text-xl font-bold mb-2">Subscribe</h3>
            <p class="text-gray-400 mb-4">Stay updated with our latest news and services.</p>
            <form class="flex flex-col md:flex-row items-center">
                <input type="email" placeholder="Your email" class="bg-gray-800 text-white px-4 py-2 rounded-l-md mb-2 md:mb-0 md:mr-2">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 md:rounded-r-md rounded-md hover:bg-green-700 transition duration-300 ease-in-out">Subscribe</button>
            </form>
        </div>
    </div>
</footer>
