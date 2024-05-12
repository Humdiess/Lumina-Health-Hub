<div class="mt-8 px-[8vw]">
    <div class="title flex md:justify-center">
        <h1 class="font-semibold md:mb-[1vw] mb-[8vw] md:text-center  md:text-[2.8vw] text-[5.5vw] md:py-[1vw] md:px-[3vw] text-[#242424]" >Lumina Healthy <span class="py-2 px-4 bg-[#4E9F3D] text-white rounded" data-aos="fade-up">Shop</span></h1>
    </div>

    <div class="carousel flex justify-center gap-8" >
        @foreach ($products as $product)
            <div class="carousel-item flex-1 flex flex-col md:flex rounded overflow-hidden shadow-lg max-w-[20rem] min-w-[15rem]" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);" data-aos="fade-up">
                {{-- <img class="w-full h-[20vw] object-cover" src="{{ asset('storage/'. $product->photo ) }}" alt="Product" >
                --}}
                <div class="px-4 py-1 flex-1">
                    <div class="font-bold md:text-[2vw] text-[3.8vw]" >{{ $product->name }}</div>
                    <div class="tag">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 md:text-sm text-[2vw] font-semibold text-gray-700 mr-2" data-aos="fade-up">Category: Medicine</span>
                    </div>
                </div>
                <div class="px-4 mt-[1.2vw]" >
                    <p class="inline_block text-gray-700 md:text-[1.5vw] text-[3vw]">Rp. {{ $product->price }}</p>
                </div>
                <div class="card-actions flex px-4 pb-4 mt-[0.67vw]" >
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="product" value="{{ $product->id }}">
                        <button type="submit" class="py-2 md:py-[0.8vw] px-[3vw] w-full md:text-sm text-lg text-[3vw] bg-[#4E9F3D] text-white rounded-md hover:bg-green-700 transition duration-300 ease-in-out">Beli</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
