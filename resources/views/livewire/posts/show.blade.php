<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">
            {{ $post->title }}
        </h1>
        <a href="{{ route('posts.index') }}" 
           class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
            ← Back
        </a>
    </div>

    <div class="text-zinc-800 dark:text-zinc-200 leading-relaxed">
        <p class="whitespace-pre-line">{{ $post->content }}</p>
    </div>

    <div class="mt-4 text-sm text-gray-500">
        Author: {{ $post->user->name ?? 'Unknown' }}<br>
        Created: {{ $post->created_at->format('d M Y, h:i A') }}
    </div>
</div>
