<div class="space-y-4 md:space-y-8">
    @if (session('error'))
    <div class="flex items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="">
            {{session('error')}}
        </div>
    </div>
    @endif

    <div class="bg-white p-4 rounded-md shadow-md">

        <h2 class="font-semibold text-center text-xl mb-4">Main Category</h2>

        <div class="relative h-72 overflow-x-auto overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr data-category-id="{{ $category->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset('storage/images/' . $category->image) }}"
                                 alt="{{ $category->slug }}"
                                 class="max-w-24 max-h-24 object-contain">
                        </th>
                        <td class="px-6 py-4 truncate max-w-32">{{ $category->name }}</td>
                        <td class="px-6 py-4">{{ $category->description }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                {{-- <a href="{{ route('products.lists') }}?category={{ $category->id }}" class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 delete-link">Products</a> --}}
                                <button wire:click="$dispatch('editSelected', { idcategory: '{{ $category->id }}' })"" data-modal-toggle="main-update-modal" data-modal-target="main-update-modal" class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 update-link" data-id="{{ $category->id }}">Update</button>
                                <button wire:click="$dispatch('deleteSelected', { idcategory: '{{ $category->id }}' })" data-modal-toggle="delete-modal" data-modal-target="delete-modal" href="" class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 delete-link" data-id="{{ $category->id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-2 mt-5 space-y-3 md:space-y-0 md:space-x-2 md:flex">
            <button data-modal-target="main-create-modal" data-modal-toggle="main-create-modal" class="w-full md:w-fit justify-center py-2 md:py-0 text-white inline-flex items-center px-4 bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" type="button">
                Add Main Category
            </button>

            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:model.lazy='search_categories' wire:change='load()' type="search" id="default-search" class="w-full md:w-fit block p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
            </div>

        </div>
    </div>

    <div class="bg-white p-4 rounded-md shadow-md">

        <h2 class="font-semibold text-center text-xl mb-4">Sub Category</h2>

        <div class="relative h-72 overflow-x-auto overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subcategories as $category)
                    <tr data-category-id="{{ $category->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset('storage/images/' . $category->image) }}"
                                 alt="{{ $category->slug }}"
                                 class="max-w-24 max-h-24 object-contain">
                        </th>
                        <td class="px-6 py-4 truncate max-w-32">{{ $category->name }}</td>
                        <td class="px-6 py-4"><a href="" class="hover:text-blue-400 underline">{{ $category->parent_name }}</a></td>
                        <td class="px-6 py-4 truncate">{{ $category->description }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                {{-- <a href="{{ route('products.lists') }}?category={{ $category->id }}" class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 delete-link">Products</a> --}}
                                <button wire:click="$dispatch('editSelected', { idcategory: '{{ $category->id }}' })"" data-modal-toggle="sub-update-modal" data-modal-target="sub-update-modal" class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 update-link" data-id="{{ $category->id }}">Update</button>
                                <button wire:click="$dispatch('deleteSelected', { idcategory: '{{ $category->id }}' })" data-modal-toggle="delete-modal" data-modal-target="delete-modal" href="" class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 delete-link" data-id="{{ $category->id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-2 mt-5 space-y-3 md:space-y-0 md:space-x-2 md:flex">
            <button data-modal-target="sub-create-modal" data-modal-toggle="sub-create-modal" class="w-full md:w-fit justify-center py-2 md:py-0 text-white inline-flex items-center px-4 bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" type="button">
                Add Sub Category
            </button>

            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:model.lazy='search_sub_categories' wire:change='load()' type="search" id="default-search" class="w-full md:w-fit block p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
            </div>

        </div>

        <livewire:admin.category.delete />

        <livewire:admin.category.main-create />

        <livewire:admin.category.main-update />

        <livewire:admin.category.sub-create />

        <livewire:admin.category.sub-update />


    </div>


</div>
