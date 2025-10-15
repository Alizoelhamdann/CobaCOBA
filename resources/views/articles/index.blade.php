<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Berita & Informasi Sekolah
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold">
                            <a href="{{ route('articles.show', $post) }}" class="hover:underline">{{ $post->title }}</a>
                        </h3>
                        <div class="text-sm text-gray-500 mt-1">
                            By {{ $post->user->name }} in {{ $post->category->name }} &bull; {{ $post->created_at->diffForHumans() }}
                        </div>
                        <p class="mt-4">
                            {{ Str::limit($post->content, 200) }}
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('articles.show', $post) }}" class="text-blue-600 hover:text-blue-800">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center">
                        <p>Belum ada berita yang dipublikasikan.</p>
                    </div>
                </div>
            @endforelse

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>