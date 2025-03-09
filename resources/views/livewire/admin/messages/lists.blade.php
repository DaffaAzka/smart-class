<div>


    <div class="my-5">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($messages as $message)
                <div class="group relative p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full flex flex-col">
                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-4">
                            <h5 class="text-xl font-bold text-gray-800 dark:text-gray-200 truncate pr-2">
                                {{ $message['name'] }}
                            </h5>
                            <span class="text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                📅 {{ $message['created_at']->format('d M Y') }}
                            </span>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                            {{ $message['msg'] }}
                        </p>
                    </div>

                    <div class="mt-auto pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            🕒 {{ $message['created_at']->diffForHumans() }}
                        </span>
                        <a href=""
                           class="inline-flex items-center px-3 py-2 text-sm font-medium transition-colors duration-200">
                            Buka Pesan
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-6 md:mx-4">
            {{ $messages->links() }}
        </div>
    </div>

</div>
