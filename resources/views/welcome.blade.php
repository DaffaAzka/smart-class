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
                        <div class="bg-white rounded shadow-md hover:shadow-lg p-4 hover:bg-blue-800 hover:text-white transition duration-300 ease-in-out h-full flex flex-col">
                            <a href="#" class="flex-1">
                                <div class="h-28 overflow-hidden">
                                    <img src="{{ asset('storage/icons/f677f584b83454a7cbc2d29a91068e.svg') }}"
                                         alt="{{ $h['title'] }}"
                                         class="w-full h-full object-cover rounded-lg">
                                </div>
                                <h2 class="text-sm font-thin md:text-base md:font-medium mt-1 md:mt-4 text-center">{{ $h['title'] }}</h2>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>



    <div class="my-6 space-y-4">
        <h1 class="text-base font-medium text-center md:text-3xl">Solusi Untuk Sekolah, Perkantoran, OEM/ODM, dan CKD/SKD</h1>

        @foreach ($categories as $category)

        @if ($loop->iteration % 2 == 0)
        <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-8 md:bg-gray-100">
        @else
        <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-8">
        @endif
            <div class="grid grid-cols-1 md:grid-cols-5 md:mx-16 xl:mx-32 gap-4 md:gap-16">
                 @if ($loop->iteration % 2 == 0)
                    {{-- Even items: Image on right --}}
                    <div class="flex flex-col justify-center h-full space-y-4 md:space-y-8 md:col-span-2">
                        <h2 class="text-base font-medium md:text-xl md:font-semibold">{{ $category['name'] }}</h2>
                        <p class="text-sm font-thin line-clamp-3 md:line-clamp-4 text-gray-600 md:text-base md:font-normal">{{ $category['description'] }}</p>
                        <p><a href="{{ $category['url'] }}" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Learn More</a></p>
                    </div>

                    <div class="order-first md:col-span-3 md:order-last">
                        <div class="w-full md:aspect-[3/4] md:max-h-96 overflow-hidden">
                            <img src="{{ asset('storage/images/' . $category['image'] ) }}"
                                 class="w-full h-full object-cover rounded-lg md:rounded-3xl">
                        </div>
                    </div>
                @else
                    {{-- Odd items: Image on left (original layout) --}}
                    <div class="md:col-span-3">
                        <div class="w-full md:aspect-[3/4] md:max-h-96 overflow-hidden">
                            <img src="{{ asset('storage/images/' . $category['image'] ) }}"
                                 class="w-full h-full object-cover rounded-lg md:rounded-3xl">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center h-full space-y-4 md:space-y-8 md:col-span-2">
                        <h2 class="text-base font-medium md:text-xl md:font-semibold">{{ $category['name'] }}</h2>
                        <p class="text-sm font-thin line-clamp-3 md:line-clamp-4 text-gray-600 md:text-base md:font-normal">{{ $category['description'] }}</p>
                        <p><a href="{{ $category['url'] }}" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Learn More</a></p>
                    </div>
                @endif
            </div>
        </div>
        @endforeach

    </div>

    <div class="my-6 md:mx-16 mx-6 xl:mx-32 space-y-10">
        <h1 class="text-lg font-medium text-center md:text-3xl">Tentang Kami</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="h-full flex items-center">
                <p class="text-sm">Kami di dukung oleh salah satu pabrikan terbesar di cina, perusahaan teknologi tinggi terkemuka di Tiongkok, memiliki pengalaman luas dalam penelitian dan pengembangan serta pembuatan tampilan interaktif. Tim R&D dan teknis kami mencakup lebih dari 60% total tenaga kerja kami, memastikan keahlian tingkat atas untuk proyek papan tulis interaktif Anda. Dengan tim produksi terampil yang mampu memproduksi lebih dari 2.000 papan tulis interaktif per bulan, kami memprioritaskan pemenuhan kebutuhan Anda dengan segera. Didukung oleh berbagai hak kekayaan intelektual, termasuk paten teknis, merek dagang produk, dan hak cipta perangkat lunak, Riotouch memegang lebih dari 30 sertifikasi seperti CE, CB, CCC, dan CQC. Andalkan kami untuk memenuhi semua kebutuhan papan tulis interaktif Anda.</p>
            </div>

            <div class="order-first md:order-last">
                <img src="{{ asset('storage/landing.jpg') }}" alt="" class="object-cover rounded w-screen md:w-5/6 ">
            </div>
        </div>
    </div>

    <div class="my-6 md:mx-16 mx-6 xl:mx-32 space-y-10">


        <livewire:contact />


    </div>



    <livewire:footer />







</x-layouts.app>
