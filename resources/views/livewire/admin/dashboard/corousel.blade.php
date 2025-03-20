<div class="space-y-6 md:space-y-8">
    <!-- Error Notification -->

    <!-- Corousel List Section -->
    <section aria-labelledby="corousel-list-heading" class="bg-white rounded-lg shadow-sm border border-gray-100">
        <div class="p-6">
            <header class="mb-6">
                <h2 id="corousel-list-heading" class="text-2xl font-semibold text-gray-900 text-center">Corousel Management</h2>
            </header>

            <!-- Table Controls -->
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <button
                    data-modal-target="create-modal"
                    data-modal-toggle="create-modal"
                    class="w-full md:w-auto px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors flex items-center justify-center gap-2"
                    aria-label="Add new corousel">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Corousel
                </button>
            </div>

            <!-- Corousel Table -->
            <div class="border rounded-lg h-96 overflow-y-scroll">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">Image</th>
                                <th scope="col" class="px-6 py-3 font-medium flex justify-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($corousels as $corousel)
                            <tr class="hover:bg-gray-50" data-corousel-id="{{ $corousel->id }}">

                                {{-- Image Header Cell --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/images/corousels/' . $corousel->name) }}"
                                            alt="{{ $corousel->name }} image header"
                                            class="w-20 object-contain rounded-lg bg-white p-1"
                                            >
                                    </div>
                                </td>

                                <!-- Actions Cell -->
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            wire:click="$dispatch('deleteCorouselSelected', { idcorousel: '{{ $corousel->id }}' })"
                                            class="px-3 py-1.5 text-sm bg-red-100 text-red-800 rounded-md hover:bg-red-200 transition-colors"
                                            aria-label="Delete {{ $corousel->name }}"
                                            data-modal-toggle="delete-corousel-modal" data-modal-target="delete-corousel-modal">
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
        </div>
    </section>

    <!-- Modals -->
    <div wire:ignore.self id="create-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        New Corousel Image
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form class="p-4 md:p-5 max-h-[calc(100vh-15rem)] overflow-y-auto" method="post" enctype="multipart/form-data" wire:submit='store'>

                    @if (session()->has('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                        <span class="font-medium">Success!</span> {{ session('success') }}
                        </div>
                    </div>
                    @endif

                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image Product</label>
                            <input wire:model='name'
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="name"
                                id="name"
                                type="file"
                                name="name"
                            >
                        </div>

                    </div>
                    <button type="submit" class="text-white inline-flex items-center px-4 py-2 bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                        Submit
                    </button>
                </form>


            </div>
        </div>

    </div>

    {{-- Modal Delete --}}
    <div class="">
        <div wire:ignore.self id="delete-corousel-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-corousel-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this corousel?</h3>
                        <button wire:click='destroy' data-modal-hide="delete-corousel-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="delete-corousel-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
