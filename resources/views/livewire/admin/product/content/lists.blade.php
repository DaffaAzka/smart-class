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

    <div class="space-y-8">

        @foreach ($product_contents as $content)

        <livewire:admin.product.content.card :content="$content" :product_id="$product_id" />

        @endforeach

    </div>


    <div class="mb-2 mt-5 space-y-3 md:space-y-0 md:space-x-2 flex justify-center">
        <button data-modal-target="create-modal" data-modal-toggle="create-modal" class="w-full md:w-fit justify-center py-2 text-white inline-flex items-center px-4 bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" type="button">
            Add New Content
        </button>
    </div>

    <livewire:admin.product.content.create :product_id="$product_id" />

    <livewire:admin.product.content.delete />


</div>
