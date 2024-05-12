<x-app-layout>
    <div class="container mx-auto p-10">
        <div class="rounded bg-white p-4 shadow">

            @auth
                @if(auth()->user()->isAdmin())
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="form-group">
                            <label for="" class="label">Nama</label>
                            <input type="text" name="name" class="form-control input-bordered w-full rounded shadow">
                        </div>

                        <div class="form-group">
                            <label for="" class="label">Price</label>
                            <input type="text" name="price" class="form-control input-bordered w-full rounded shadow">
                        </div>

                        <div class="form-group">
                            <label for="" class="label">Foto</label>
                            <input type="file" name="photo" class="form-control input-bordered w-full rounded shadow">
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-primary w-full">
                    </form>
                @else
                    <p>Anda tidak memiliki izin untuk mengakses halaman ini.</p>
                @endif
            @endauth

        </div>
    </div>
</x-app-layout>
