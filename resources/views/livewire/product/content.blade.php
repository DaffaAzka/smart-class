<div>
    <!-- Hero Section -->
    <section aria-labelledby="product-hero" class="space-y-6 md:space-y-12">
        <figure class="relative">
            <img src="{{ asset('storage/aaaa.png') }}"
                 class="block w-full h-auto object-cover"
                 alt="{{ $product->header }} - {{ config('app.name') }}"
                 loading="lazy"
                 decoding="async">
        </figure>

        <div class="text-center max-w-4xl mx-auto px-4">
            <h1 id="product-hero" class="text-2xl md:text-4xl font-bold text-gray-900 mb-3">
                {{ $product->header }}
            </h1>
            <p class="text-gray-600 md:text-lg leading-relaxed mb-6">
                {{ $product->description }}
            </p>
            <button type="button"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg px-8 py-3 transition-all duration-300 transform hover:scale-105 shadow-lg"
                    aria-label="Request Demo untuk {{ $product->header }}">
                Request Demo
            </button>
        </div>
    </section>

    <!-- Features Section -->
    <section aria-labelledby="product-features" class="bg-gray-50 py-12">
        <div class="mx-auto space-y-8">
            <h2 id="product-features" class="sr-only">Fitur Produk</h2>

            @foreach ($product_contents as $content)

            @if ($loop->iteration % 2 == 0)
            <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-5 md:p-8 bg-gray-50 md:bg-gray-100">
            @else
            <div class="mx-4 md:mx-auto rounded shadow-md md:rounded-none md:shadow-none p-5 md:p-8 bg-gray-50">
            @endif
                <div class="grid grid-cols-1 md:grid-cols-5 md:mx-16 xl:mx-32 gap-4 md:gap-16">
                    @if ($loop->iteration % 2 == 0)
                        {{-- Even items: Image on right --}}
                        <div class="flex flex-col justify-center h-full space-y-2 md:col-span-2">
                            <h2 class="text-lg md:text-2xl font-semibold">{{ $content->header }}</h2>
                            <p class="text-sm font-thin text-gray-600 md:text-base md:font-normal">{{ $content->content }}</p>
                        </div>

                        <div class="order-first md:col-span-3 md:order-last">
                            <div class="w-full md:aspect-[3/4] md:max-h-96 overflow-hidden">
                                <img src="{{ asset('storage/images/content/' . $content->product_id . '/' . $content->img_source) }}"
                                     class="w-full h-full object-cover rounded-lg md:rounded-3xl">
                            </div>                        </div>
                    @else
                        {{-- Odd items: Image on left (original layout) --}}
                        <div class="md:col-span-3">
                            <div class="w-full md:aspect-[3/4] md:max-h-96 overflow-hidden">
                                <img src="{{ asset('storage/images/content/' . $content->product_id . '/' . $content->img_source) }}"
                                     class="w-full h-full object-cover rounded-lg md:rounded-3xl">
                            </div>                        </div>
                        <div class="flex flex-col justify-center h-full space-y-2 md:col-span-2">
                            <h2 class="text-lg md:text-2xl font-semibold">blablabla</h2>
                            <p class="text-sm font-thin text-gray-600 md:text-base md:font-normal">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium ducimus necessitatibus nobis, quis odit aperiam architecto similique vero et quasi.</p>
                        </div>
                    @endif
                </div>
            </div>

            @endforeach
        </div>
    </section>

    <!-- Contact Section -->
    <section aria-labelledby="contact-section" class="my-16 max-w-7xl mx-auto px-4">
        <h2 id="contact-section" class="sr-only">Hubungi Kami</h2>
        <livewire:contact />
    </section>

    <livewire:footer />
</div>
