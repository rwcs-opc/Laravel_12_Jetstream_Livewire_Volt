<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">All Posts</h2>
        <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            + Create Post
        </a>
    </div>

    @if (session('success'))
        <div class="p-3 mb-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="p-3 mb-3 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
    @endif

    <div class="mb-6 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-zinc-900">
        <div class="grid gap-4 md:grid-cols-4 md:items-end">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <input id="search" type="text" wire:model.debounce.500ms="search"
                        placeholder="Search title or content..."
                        class="flex-1 rounded-l-md border border-gray-300 bg-white p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-gray-600 dark:bg-zinc-800 dark:text-gray-100" />
                    <button type="button" wire:click="$refresh"
                        class="inline-flex items-center justify-center rounded-r-md border border-l-0 border-gray-300 bg-gray-100 px-3 text-gray-600 transition hover:bg-gray-200 focus:outline-none focus:ring focus:ring-blue-200 dark:border-gray-600 dark:bg-zinc-800 dark:text-gray-200 dark:hover:bg-zinc-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 105.25 5.25a7.5 7.5 0 0011.4 11.4z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div>
                <label for="from_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">From date</label>
                <input id="from_date" type="date" wire:model="fromDate"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white p-2 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-gray-600 dark:bg-zinc-800 dark:text-gray-100" />
            </div>

            <div>
                <label for="to_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">To date</label>
                <input id="to_date" type="date" wire:model="toDate"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white p-2 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-gray-600 dark:bg-zinc-800 dark:text-gray-100" />
            </div>

            <div class="flex items-center justify-start md:justify-end">
                <button type="button" wire:click="clearFilters"
                    class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-zinc-800">
                    Clear filters
                </button>
            </div>
        </div>

        @if ($invalidDateRange)
            <p class="mt-3 text-sm text-red-600">The start date must be before the end date.</p>
        @endif
    </div>

    <table class="w-full text-left border border-gray-300 dark:border-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-800">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Author</th>
                <th class="px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="border-t border-gray-300 dark:border-gray-700">
                    <td class="px-4 py-2">{{ $post->id }}</td>
                    <td class="px-4 py-2">{{ $post->title }}</td>
                    <td class="px-4 py-2">{{ $post->user->name ?? '—' }}</td>
                    <td class="px-4 py-2 text-center space-x-3">
                        <!-- ✅ View Button -->
                        <a href="{{ route('posts.show', $post->id) }}" 
                           class="text-green-600 hover:underline">View</a>

                        <!-- ✏️ Edit Button -->
                        <a href="{{ route('posts.edit', $post->id) }}" 
                           class="text-blue-600 hover:underline">Edit</a>

                        <!-- 🗑️ Delete Button -->
                        <button wire:click="delete({{ $post->id }})"
                                class="text-red-600 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this post?')">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
