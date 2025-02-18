<x-layouts.app>
    <x-slot name="title">
        Home
    </x-slot>

    <div class="">
        <livewire:corousel/>

        <div class="p-2 md:p-10">

            <div class="grid grid-cols-2 md:grid-cols-4 xl:mx-32">

                @foreach ($highlights as $h)
                    <div class="md:p-4 p-2">
                        <div class="bg-white rounded shadow-md hover:shadow-lg p-4 hover:bg-blue-800 hover:text-white transition duration-300 ease-in-out">
                            <a href="">
                                <img src="{{ asset('storage/icons/f677f584b83454a7cbc2d29a91068e.svg') }}" alt="{{ $h['title'] }}" class="svg-icon w-full object-cover rounded-lg fill-blue-500">
                                <h2 class="text-sm font-thin md:text-base md:font-medium mt-1 md:mt-4 text-center">{{ $h['title'] }}</h2>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>



    <div class="my-6 space-y-4">
        <h2 class="text-base font-medium text-center md:text-3xl">Solution For Education, Business, And Engagement</h2>

        @foreach ($categories as $category)

        @if ($loop->iteration % 2 == 0)
        <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-8 md:bg-gray-100">
        @else
        <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-8">
        @endif
            <div class="grid grid-cols-1 md:grid-cols-5 md:mx-16 xl:mx-32 gap-4 md:gap-16">
                 @if ($loop->iteration % 2 == 0)
                    {{-- Even items: Image on right --}}
                    <div class="space-y-4 md:space-y-8 md:col-span-2">
                        <h2 class="text-base font-medium md:text-xl md:font-semibold">{{ $category['name'] }}</h2>
                        <p class="text-sm font-thin text-gray-600 md:text-base md:font-normal">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium ducimus necessitatibus nobis, quis odit aperiam architecto similique vero et quasi.</p>
                        <p><a href="{{ $category['url'] }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Learn More</a></p>
                    </div>

                    <div class="order-first md:col-span-3 md:order-last">
                        <img src="{{ asset('storage/landing.jpg') }}" class="w-full object-cover rounded-lg md:rounded-3xl fill-blue-500">
                    </div>
                @else
                    {{-- Odd items: Image on left (original layout) --}}
                    <div class="md:col-span-3">
                        <img src="{{ asset('storage/landing.jpg') }}" class="w-full object-cover rounde md:rounded-3xl fill-blue-500">
                    </div>
                    <div class="space-y-4 md:space-y-8 md:col-span-2">
                        <h2 class="text-base font-medium md:text-xl md:font-semibold">{{ $category['name'] }}</h2>
                        <p class="text-sm font-thin text-gray-600 md:text-base md:font-normal">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium ducimus necessitatibus nobis, quis odit aperiam architecto similique vero et quasi.</p>
                        <p><a href="{{ $category['url'] }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Learn More</a></p>
                    </div>
                @endif
            </div>
        </div>
        @endforeach

    </div>

    <div class="my-6 md:mx-16 mx-6 xl:mx-32 space-y-10">
        <h2 class="text-lg font-medium text-center md:text-3xl">About Us</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="h-full flex items-center">
                <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim mollitia, odit dolores ipsam molestias aliquid porro perferendis facere dignissimos vitae in et illum esse qui, amet ipsa laboriosam dolor animi magni cum distinctio nisi soluta tenetur non. Explicabo, doloremque excepturi.</p>
            </div>

            <div class="order-first md:order-last">
                <img src="{{ asset('storage/landing.jpg') }}" alt="" class="object-cover rounded w-screen md:w-5/6 ">
            </div>
        </div>
    </div>



    <livewire:footer />







</x-layouts.app>
