<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Berita Sekolah
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <h3 class="font-bold text-lg">{{ $post->title }}</h3>
                            <p>{{ Str::limit($post->content, 150) }}</p>
                            <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya...</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>