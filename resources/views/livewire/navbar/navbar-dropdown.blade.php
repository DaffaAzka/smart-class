<div wire:ignore.self id="mega-menu-full-dropdown" class="hidden mt-1 border-gray-200 shadow-xs bg-gray-50 md:bg-white border-y dark:bg-gray-800 dark:border-gray-600">

    <div class="block">
        <div class="grid max-w-screen-xl px-4 py-4 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:px-6">
            @foreach ($sub_categories as $category)
            <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="font-semibold">{{ $category->name }}</div>
                <span class="hidden md:block text-sm text-gray-500 dark:text-gray-400 text-ellipsis">{{ $category->description }}</span>
            </a>
            @endforeach
        </div>
    </div>

</div>
