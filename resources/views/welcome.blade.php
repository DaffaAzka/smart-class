<x-layouts.app>
    <x-slot name="title">
        Panel Interaktif Profesional | {{ config('app.name') }}
    </x-slot>

    {{-- <x-slot name="meta_description">
        Temukan solusi panel interaktif terbaik untuk sekolah, perkantoran, dan industri. Produsen bersertifikat dengan teknologi terkini dan dukungan profesional.
    </x-slot> --}}

    <!-- Hero Section -->
    <section aria-label="Highlight Produk">
        <livewire:corousel />
    </section>

    <!-- Highlight Features -->
    @if ($highlights->isNotEmpty())
    <section class="p-2 md:p-10" aria-labelledby="highlight-products">
        <div class="max-w-7xl mx-auto">
            <h2 id="highlight-products" class="sr-only">Fitur Unggulan</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                @foreach ($highlights as $h)
                    <article class="group relative">
                        <div class="bg-white rounded-lg shadow-sm hover:shadow-lg p-3 md:p-4 transition-all duration-300 h-full flex flex-col border border-gray-100 hover:border-blue-100">
                            <a href="{{ route('product', ['slug' => $h->product->slug]) }}" class="flex flex-col flex-1">
                                <figure class="h-28 md:h-40 overflow-hidden rounded-lg">
                                    <img src="{{ asset('storage/images/highlights/' . $h['image']) }}"
                                         alt="{{ $h['title'] }} - {{ config('app.name') }}"
                                         class="w-full h-full object-contain p-2 transition-transform duration-300 group-hover:scale-105">
                                </figure>
                                <h3 class="text-xs md:text-sm font-medium mt-2 md:mt-3 text-center text-gray-800 group-hover:text-blue-600">
                                    {{ $h['name'] }}
                                </h3>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    <!-- Solutions Section -->
    <section class="my-12 space-y-8" aria-labelledby="solusi-utama">
        <div class="text-center">
            <h1 id="solusi-utama" class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">
                Solusi Profesional untuk Berbagai Kebutuhan
            </h1>
            <p class="text-gray-600 md:text-lg">Sekolah, Perkantoran, OEM/ODM, dan CKD/SKD</p>
        </div>


        @foreach ($categories as $category)

        @if ($loop->iteration % 2 == 1)
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


    </section>

    <!-- About Section -->
    <section class="my-16 py-16 bg-white" aria-labelledby="tentang-kami">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 id="tentang-kami" class="text-2xl md:text-3xl font-bold text-gray-900">
                        Keunggulan Kami
                    </h2>
                    <div class="prose max-w-none text-gray-600">
                        <p class="mb-4">
                            Sebagai mitra resmi pabrikan terbesar di China, kami menghadirkan teknologi terkini dalam bidang panel interaktif. Dengan tim R&amp;D yang mencakup 60% dari total karyawan, kami menjamin inovasi terus-menerus dalam setiap produk.
                        </p>

                        <ul class="space-y-3 list-disc pl-5">
                            <li>Kapasitas produksi 2.000+ unit/bulan</li>
                            <li>30+ sertifikasi internasional (CE, CB, CCC)</li>
                            <li>Dukungan teknis 24/7</li>
                            <li>Garansi resmi 3 tahun</li>
                        </ul>
                    </div>
                </div>

                <figure class="relative rounded-2xl overflow-hidden shadow-xl">
                    <img src="{{ asset('storage/images/service.avif') }}"
                         alt="Fasilitas Produksi Modern {{ config('app.name') }}"
                         class="w-full h-auto object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-blue-800/20"></div>
                </figure>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="my-16" aria-labelledby="kontak-kami">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <h2 id="kontak-kami" class="sr-only">Hubungi Kami</h2>
            <livewire:contact />
        </div>
    </section>

    <livewire:footer />

    <!-- Structured Data -->
    @push('structured-data')
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "{{ config('app.name') }}",
        "description": "Penyedia solusi panel interaktif profesional untuk pendidikan dan bisnis",
        "image": "{{ asset('storage/landing.jpg') }}",
        "email": "info@example.com",
        "telephone": "+62-123-4567-890",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Contoh No. 123",
            "addressLocality": "Jakarta",
            "addressCountry": "ID"
        }
    }
    </script>
    @endpush
</x-layouts.app>
