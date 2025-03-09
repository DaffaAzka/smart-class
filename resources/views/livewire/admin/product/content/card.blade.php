<div class="mx-4 md:mx-auto rounded shadow-md p-5 bg-white">

    <div class="grid grid-cols-1 md:grid-cols-5 md:mx-16 xl:mx-32 gap-4 md:gap-16">
        <div class="flex flex-col justify-center space-y-6 md:col-span-2 h-full">
            <h2 class="text-lg md:text-2xl font-semibold">{{ $content->header }}</h2>
            <p class="text-sm font-thin text-gray-600 md:text-base md:font-normal">{{ $content->content }}</p>
            <div class="flex space-x-2">
                <button wire:click="$dispatch('editSelected', { idcontent: '{{ $content->id }}' })" data-modal-toggle="create-modal" data-modal-target="main-update-modal" class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 update-link" data-id="{{ $content->id }}">Update</button>
                <button wire:click="$dispatch('deleteSelected', { idcontent: '{{ $content->id }}' })" data-modal-toggle="delete-modal" data-modal-target="delete-modal" href="" class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 delete-link" data-id="{{ $content->id }}">Delete</button>
            </div>
        </div>

        {{-- <p>{{'storage/images/content/' . $product_id . '/' . $content->img_source }}</p> --}}

        <div class="order-first md:col-span-3 md:order-last">
            <div class="w-full md:aspect-[3/4] md:max-h-96 overflow-hidden">
                <img src="{{ asset('storage/images/content/' . $product_id . '/' . $content->img_source) }}"
                     class="w-full h-full object-cover rounded-lg md:rounded-3xl">
            </div>
        </div>
    </div>

</div>
