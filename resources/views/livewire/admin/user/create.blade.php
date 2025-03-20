<div wire:ignore.self id="create-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    New user
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
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input wire:model='name' type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input wire:model='email' type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type email" required>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input wire:model='password' type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type password">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="repassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Retry repassword</label>
                        <input wire:model='repassword' type="password" name="repassword" id="repassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type password again">
                        @error('repassword')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="text-white inline-flex items-center px-4 py-2 bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                    Submit
                </button>
            </form>


        </div>
    </div>



</div>
