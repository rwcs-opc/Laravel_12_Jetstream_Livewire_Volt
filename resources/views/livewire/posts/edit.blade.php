<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold mb-6 text-zinc-900 dark:text-zinc-100">
            {{ __('Edit  Post') }}
        </h1>

        <a href="{{ route('posts.index') }}"
            class="px-4 py-2 bg-gray-500 text-white text-sm rounded-md hover:bg-gray-600 focus:ring focus:ring-gray-300">
            {{ __('Back') }}
        </a>
    </div>

    <div>
        @if (session('success'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="update" class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Post Title') }}
                </label>
                <input type="text" id="title" wire:model="title"
                    class="mt-1 block w-full rounded-md border border-zinc-300 dark:border-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 focus:border-blue-500 focus:ring focus:ring-blue-200 p-2"
                    placeholder="Enter post title">

                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Content') }}
                </label>
                <textarea id="content" wire:model="content" rows="6"
                    class="mt-1 block w-full rounded-md border border-zinc-300 dark:border-zinc-600 dark:bg-zinc-800 dark:text-zinc-100 focus:border-blue-500 focus:ring focus:ring-blue-200 p-2"
                    placeholder="Write your post content here..."></textarea>

                @error('content')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('posts.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white text-sm rounded-md hover:bg-gray-600 focus:ring focus:ring-gray-300">
                    {{ __('Cancel') }}
                </a>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300">
                    {{ __('Update Post') }}
                </button>
            </div>
        </form>
    </div>
</div>
