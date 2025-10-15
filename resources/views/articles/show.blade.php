<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 text-sm text-gray-500">
                        Ditulis oleh <strong>{{ $post->user->name }}</strong> dalam kategori <strong>{{ $post->category->name }}</strong>
                        <br>
                        Diterbitkan pada: {{ $post->created_at->format('d F Y') }}
                    </div>

                    <div class="prose max-w-none mt-6">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>