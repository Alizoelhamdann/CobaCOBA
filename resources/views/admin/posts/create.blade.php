<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Berita Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Formulir harus menggunakan method POST dan enctype untuk file upload -->
                <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Judul Berita -->
                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Judul Berita</label>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label for="category_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Kategori</label>
                        <select name="category_id" id="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                            <option value="">-- Pilih Kategori --</option>
                            <!-- Loop melalui kategori yang dikirim dari controller -->
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- Isi Konten -->
                    <div class="mb-4">
                        <label for="content" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Isi Konten</label>
                        <textarea id="content" name="content" rows="6" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Gambar Unggulan -->
                    <div class="mb-6">
                        <label for="image" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Gambar Unggulan</label>
                        <!-- Pastikan type adalah file -->
                        <input type="file" id="image" name="image" class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 dark:file:bg-indigo-700 file:text-indigo-700 dark:file:text-indigo-50 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-600"/>
                        <p class="text-xs text-gray-500 mt-1">Hanya format JPG, JPEG, PNG, maksimal 2MB.</p>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>


                    <div class="flex items-center justify-end">
                        <x-primary-button>
                            Simpan Berita
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>