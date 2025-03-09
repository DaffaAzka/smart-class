<div class="mt-28 space-y-6">

    <h1 class="text-center font-medium text-2xl md:text-3xl">Daftar Produk dari {{ $category->name }}</h1>

    <div class="p-2 md:p-10">
        <div class="grid grid-cols-1 md:grid-cols-4">

            @foreach ($products as $p)

            <div class="md:p-4 p-2">
                <div class="bg-white rounded shadow-md hover:shadow-lg p-4 hover:bg-blue-800 hover:text-white transition duration-300 ease-in-out h-full flex flex-col">
                    <a href="{{ route('product', ['slug' => $p->slug]) }}" class="flex-1">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/images/' . $p->image) }}"
                                 alt="{{ $p->name }}"
                                 class="w-full h-full object-cover rounded-lg">
                        </div>
                        <h2 class="text-sm font-thin md:text-base md:font-medium mt-1 md:mt-4 text-center">{{ $p->name }}</h2>
                    </a>
                </div>
            </div>

            @endforeach

        </div>
    </div>


</div>
