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
