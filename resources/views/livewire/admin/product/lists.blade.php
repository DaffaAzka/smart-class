<div class="space-y-6 md:space-y-8">
    <!-- Error Notification -->
    @if (session('error'))
    <div role="alert" class="p-4 border-l-4 border-red-500 bg-red-50 dark:bg-red-900/20">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-red-600 dark:text-red-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <h3 class="ml-3 text-sm font-medium text-red-800 dark:text-red-400">{{ session('error') }}</h3>
        </div>
    </div>
    @endif

    <!-- Product List Section -->
    <section aria-labelledby="product-list-heading" class="bg-white rounded-lg shadow-sm border border-gray-100">
        <div class="p-6">
            <header class="mb-6">
                <h2 id="product-list-heading" class="text-2xl font-semibold text-gray-900 text-center">Product Management</h2>
            </header>

            <!-- Table Controls -->
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <button
                    data-modal-target="create-modal"
                    data-modal-toggle="create-modal"
                    class="w-full md:w-auto px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors flex items-center justify-center gap-2"
                    aria-label="Add new product">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Product
                </button>

                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input
                        wire:model.live='search_categories'
                        type="search"
                        class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="Search products by name or category..."
                        aria-label="Search products">
                </div>
            </div>

            <!-- Products Table -->
            <div class="border rounded-lg overflow-hidden">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">Product</th>
                                <th scope="col" class="px-6 py-3 font-medium">Category</th>
                                <th scope="col" class="px-6 py-3 font-medium text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($products as $product)
                            <tr class="hover:bg-gray-50" data-product-id="{{ $product->id }}">
                                <!-- Product Cell -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/images/' . $product->image) }}"
                                            alt="{{ $product->name }} product image"
                                            class="w-20 object-contain rounded-lg bg-white p-1"
                                            >
                                        <div>
                                            <h3 class="font-medium text-gray-900">{{ $product->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $product->slug }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Category Cell -->
                                <td class="px-6 py-4">
                                    <a href="#" class="text-purple-600 hover:text-purple-700 hover:underline">
                                        {{ $product->parent_name }}
                                    </a>
                                </td>

                                <!-- Actions Cell -->
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('product.content', ['slug' => $product->slug]) }}"
                                           class="px-3 py-1.5 text-sm bg-blue-100 text-blue-800 rounded-md hover:bg-blue-200 transition-colors"
                                           aria-label="Manage content for {{ $product->name }}">
                                            Content
                                        </a>
                                        <button
                                            wire:click="$dispatch('editSelected', { idproduct: '{{ $product->id }}' })"
                                            class="px-3 py-1.5 text-sm bg-yellow-100 text-yellow-800 rounded-md hover:bg-yellow-200 transition-colors"
                                            aria-label="Edit {{ $product->name }}"\
                                            data-modal-toggle="create-modal" data-modal-target="create-modal">
                                            Edit
                                        </button>
                                        <button
                                            wire:click="$dispatch('deleteSelected', { idproduct: '{{ $product->id }}' })"
                                            class="px-3 py-1.5 text-sm bg-red-100 text-red-800 rounded-md hover:bg-red-200 transition-colors"
                                            aria-label="Delete {{ $product->name }}"
                                            data-modal-toggle="delete-modal" data-modal-target="delete-modal">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </section>

    <!-- Modals -->
    <livewire:admin.product.create />
    <livewire:admin.product.delete />

    <!-- Structured Data -->
    @push('structured-data')
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "itemListElement": [
            @foreach($products as $product)
            {
                "@type": "ListItem",
                "position": {{ $loop->iteration }},
                "item": {
                    "@type": "Product",
                    "name": "{{ $product->name }}",
                    "description": "{{ $product->description }}",
                    "image": "{{ asset('storage/images/' . $product->image) }}",
                    "sku": "{{ $product->slug }}"
                }
            }{{ !$loop->last ? ',' : '' }}
            @endforeach
        ]
    }
    </script>
    @endpush
</div>
