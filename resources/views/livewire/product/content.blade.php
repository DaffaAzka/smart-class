<div>

    <div class="space-y-6 md:space-y-12">

        <img src="{{ asset('storage/aaaa.png') }}" class="block w-full h-fit" alt="...">

        <div class="flex justify-center">
            <div class="space-y-3 md:space-y-4 mx-6 md:mx-12">
                <h1 class="text-center font-semibold md:text-2xl text-xl">{{ $product->header }}</h1>
                <h2 class="md:text-center md:text-base text-sm text-gray-500 font-normal">{{ $product->description }}</h2>

                <div class="flex justify-center">
                    <button type="button" class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40">
                        Request Demo
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 md:bg-gray-50 py-6 space-y-4 md:space-y-0 md:py-auto">

            @foreach ($product_contents as $content)

            @if ($loop->iteration % 2 == 0)
            <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-5 md:p-8 bg-gray-50 md:bg-gray-100">
            @else
            <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-5 md:p-8 bg-gray-50">
            @endif
                <div class="grid grid-cols-1 md:grid-cols-5 md:mx-16 xl:mx-32 gap-4 md:gap-16">
                    @if ($loop->iteration % 2 == 0)
                        {{-- Even items: Image on right --}}
                        <div class="space-y-2 md:col-span-2 md:mt-16">
                            <h2 class="text-lg md:text-2xl font-semibold">blablabla</h2>
                            <p class="text-sm font-thin text-gray-600 md:text-base md:font-normal">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium ducimus necessitatibus nobis, quis odit aperiam architecto similique vero et quasi.</p>
                        </div>

                        <div class="order-first md:col-span-3 md:order-last">
                            <img src="{{ asset('storage/landing.jpg') }}" class="w-full object-cover rounded-lg md:rounded-3xl fill-blue-500">
                        </div>
                    @else
                        {{-- Odd items: Image on left (original layout) --}}
                        <div class="md:col-span-3">
                            <img src="{{ asset('storage/landing.jpg') }}" class="w-full object-cover rounded-lg md:rounded-3xl fill-blue-500">
                        </div>
                        <div class="space-y-2 md:col-span-2 md:mt-16">
                            <h2 class="text-lg md:text-2xl font-semibold">blablabla</h2>
                            <p class="text-sm font-thin text-gray-600 md:text-base md:font-normal">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium ducimus necessitatibus nobis, quis odit aperiam architecto similique vero et quasi.</p>
                        </div>
                    @endif
                </div>
            </div>

            @endforeach


        </div>



    </div>

    <div class="my-6 md:mx-16 mx-6 xl:mx-32 space-y-10">


        <livewire:contact />


    </div>

    <livewire:footer />

</div>
