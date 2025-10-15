<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profil Sekolah XYZ</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <header class="absolute inset-x-0 top-0 z-50">
                <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="/" class="-m-1.5 p-1.5">
                            <span class="sr-only">Nama Sekolah</span>
                            <svg class="h-8 w-auto text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex lg:flex-1 lg:justify-end gap-x-6">
                        <a href="{{ route('articles.index') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Berita</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Register</a>
                            @endif
                        @endauth
                    </div>
                </nav>
            </header>

            <main>
                <div class="relative isolate overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">
                    <div class="absolute inset-y-0 right-1/2 -z-10 -mr-96 w-[200%] origin-top-right skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-[-11.5rem]"></div>
                    <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-x-16 lg:gap-y-6 xl:grid-cols-1 xl:grid-rows-1 xl:gap-x-8">
                            <h1 class="max-w-2xl text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl lg:col-span-2 xl:col-auto">Selamat Datang di Website Resmi Sekolah Kami</h1>
                            <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
                                <p class="text-lg leading-8 text-gray-600">Mencetak Generasi Unggul, Berkarakter, dan Berwawasan Global. Temukan informasi terbaru seputar kegiatan, prestasi, dan pendaftaran di sekolah kami.</p>
                                <div class="mt-10 flex items-center gap-x-6">
                                    <a href="#berita" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lihat Berita Terbaru</a>
                                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Profil Sekolah <span aria-hidden="true">→</span></a>
                                </div>
                            </div>
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop" alt="Foto Gedung Sekolah" class="mt-10 aspect-[6/5] w-full max-w-lg rounded-2xl object-cover sm:mt-16 lg:mt-0 lg:max-w-none xl:row-span-2 xl:row-end-2 xl:mt-36">
                        </div>
                    </div>
                </div>

                <div id="berita" class="bg-white py-24 sm:py-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Berita & Informasi Terkini</h2>
                            <p class="mt-2 text-lg leading-8 text-gray-600">Ikuti terus perkembangan dan kegiatan terbaru dari sekolah kami.</p>
                        </div>
                        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            @forelse ($posts as $post)
                                <article class="flex flex-col items-start justify-between">
                                    <div class="relative w-full">
                                        <img src="https://picsum.photos/seed/{{ $post->id }}/400/300" alt="Gambar Berita" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                    <div class="max-w-xl">
                                        <div class="mt-8 flex items-center gap-x-4 text-xs">
                                            <time datetime="{{ $post->created_at->toDateString() }}" class="text-gray-500">{{ $post->created_at->format('d F Y') }}</time>
                                            <span class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600">{{ $post->category->name }}</span>
                                        </div>
                                        <div class="group relative">
                                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                                <a href="{{ route('articles.show', $post) }}">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ Str::limit(strip_tags($post->content), 150) }}</p>
                                        </div>
                                    </div>
                                </article>
                            @empty
                                <p class="col-span-3 text-center text-gray-500">Belum ada berita yang dipublikasikan saat ini.</p>
                            @endforelse
                        </div>
                        <div class="mt-16 text-center">
                             <a href="{{ route('articles.index') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lihat Semua Berita</a>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="bg-gray-800 text-white text-center p-4">
                <p>&copy; {{ date('Y') }} Nama Sekolah Anda. All Rights Reserved.</p>
            </footer>
        </div>
    </body>
</html>