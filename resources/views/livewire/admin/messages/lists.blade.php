<div>
    <div class="my-5">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($messages as $message)
                <div class="group relative p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full flex flex-col">
                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-4">
                            <h5 class="text-xl font-bold text-gray-800 dark:text-gray-200 truncate pr-2">
                                {{ $message->name }}
                            </h5>
                            <span class="text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                📅 {{ $message->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                            {{ $message->msg }}
                        </p>
                    </div>

                    <div class="mt-auto pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            🕒 {{ $message->created_at->diffForHumans() }}
                        </span>
                        <button
                        wire:click="dispatch('openModal', { idmessage: '{{ $message->id }}' })"
                            data-modal-toggle="open-modal" data-modal-target="open-modal"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium transition-colors duration-200">
                            Buka Pesan
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-6 md:mx-4">
            {{ $messages->links() }}
        </div>
    </div>


    <div wire:ignore.self id="open-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Isi Pesan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="open-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form class="p-4 md:p-5 max-h-[calc(100vh-15rem)] overflow-y-auto" method="post" enctype="multipart/form-data" wire:submit='store'>

                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <p class="text-base text-gray-700 dark:text-gray-300">
                                    <strong>Nama:</strong> {{ $msg->name ?? "" }}
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300">
                                    <strong>Email:</strong> {{ $msg->email ?? "" }}
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300">
                                    <strong>Phone:</strong> {{ $msg->phone ?? "" }}
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300">
                                    <strong>Negara:</strong> {{ $msg->country ?? "" }}
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300">
                                    <strong>Pekerjaan:</strong> {{ $msg->Role ?? "" }}
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300">
                                    <strong>Perusahaan:</strong> {{ $msg->Company ?? "" }}
                                </p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-base text-gray-700 dark:text-gray-300">
                                <strong>Pesan:</strong>
                            </p>
                            <p class="bg-gray-100 dark:bg-gray-600 p-3 rounded-lg">
                                {{ $msg->msg ?? "" }}
                            </p>
                        </div>
                    </div>

                </form>


            </div>
        </div>



    </div>



</div>
