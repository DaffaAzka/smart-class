<div>
    @if($corousels->isEmpty())
        <div class="bg-gray-100 py-12 md:py-16 px-4 md:px-8 lg:px-16">
            <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Video Section -->
                <div class="flex justify-center items-center">
                    <div class="max-w-xs md:max-w-md lg:max-w-lg relative">
                        <div class="aspect-[9/16] rounded-2xl overflow-hidden shadow-xl">
                            <video
                                src="{{ asset('storage/videos/video.mp4') }}"
                                class="object-cover"
                                controls
                                playsinline
                                preload="metadata"
                                autoplay
                            >
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="space-y-6 md:space-y-8">
                    <div>
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-800 mb-4 leading-tight">
                            Solusi Inovatif Panel Datar Interaktif
                        </h2>
                        <div class="mb-6">
                            <p class="text-gray-600 text-base md:text-lg">
                                Transformasi lingkungan pendidikan dan korporat dengan teknologi mutakhir.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-700">Fitur Utama:</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Resolusi 4K dengan Brightness 400 Nits
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Interaksi Multi-Sentuh yang Intuitif
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Mendukung sistem operasi Android & Windows
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    @else

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative max-h-56 overflow-hidden rounded-lg md:min-h-96 md:max-h-screen" style="height: 35rem;">
        <!-- Loop through your carousel items -->
        @foreach($corousels as $key => $corousel)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Image with dark overlay -->
                    <div class="absolute inset-0 bg-black/10"></div>
                    <img src="{{ asset('storage/images/corousels/' . $corousel->name) }}"
                         class="h-full w-full object-cover"
                         alt="Carousel Image {{ $key + 1 }}">
                </div>
            </div>
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="absolute bottom-8 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
        @foreach($corousels as $key => $corousel)
            <button type="button"
                    class="h-3 w-12 md:w-3 rounded-full {{ $key === 0 ? 'bg-white' : 'bg-white/50' }}"
                    aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $key + 1 }}"
                    data-carousel-slide-to="{{ $key }}">
            </button>
        @endforeach
    </div>

    <!-- Navigation buttons -->
    <button type="button"
            class="absolute top-1/2 left-4 z-30 flex h-12 w-12 md:h-10 md:w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/30 hover:bg-white/50"
            data-carousel-prev>
        ←
    </button>
    <button type="button"
            class="absolute top-1/2 right-4 z-30 flex h-12 w-12 md:h-10 md:w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/30 hover:bg-white/50"
            data-carousel-next>
        →
    </button>
</div>
@endif


</div>
