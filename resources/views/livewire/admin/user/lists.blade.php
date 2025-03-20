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
    <section aria-labelledby="user-list-heading" class="bg-white rounded-lg shadow-sm border border-gray-100">
        <div class="p-6">
            <header class="mb-6">
                <h2 id="user-list-heading" class="text-2xl font-semibold text-gray-900 text-center">User Management</h2>
            </header>

            <!-- Table Controls -->
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <button
                    data-modal-target="create-modal"
                    data-modal-toggle="create-modal"
                    class="w-full md:w-auto px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors flex items-center justify-center gap-2"
                    aria-label="Add new user">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add User
                </button>
            </div>

            <!-- users Table -->
            <div class="border rounded-lg overflow-hidden">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">Name</th>
                                <th scope="col" class="px-6 py-3 font-medium">Email</th>
                                <th scope="col" class="px-6 py-3 font-medium text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50" data-user-id="{{ $user->id }}">

                                <!-- user Cell -->
                                <td class="px-6 py-4">
                                    <h3 class="font-medium text-gray-900">{{ $user->name }}</h3>
                                </td>

                                <!-- Category Cell -->
                                <td class="px-6 py-4">
                                    <h3 class="font-medium text-gray-900">{{ $user->email }}</h3>
                                </td>

                                <!-- Actions Cell -->
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            wire:click="$dispatch('editSelected', { iduser: '{{ $user->id }}' })"
                                            class="px-3 py-1.5 text-sm bg-yellow-100 text-yellow-800 rounded-md hover:bg-yellow-200 transition-colors"
                                            aria-label="Edit {{ $user->name }}"
                                            data-modal-toggle="create-modal" data-modal-target="create-modal">
                                            Edit
                                        </button>
                                        <button
                                            wire:click="$dispatch('deleteSelected', { iduser: '{{ $user->id }}' })"
                                            class="px-3 py-1.5 text-sm bg-red-100 text-red-800 rounded-md hover:bg-red-200 transition-colors"
                                            aria-label="Delete {{ $user->name }}"
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
                {{ $users->links() }}
            </div>
        </div>
    </section>

    <!-- Modals -->
    <livewire:admin.user.create />
    <livewire:admin.user.delete />

</div>
