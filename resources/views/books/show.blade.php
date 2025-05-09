<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Buku') }}
            </h2>
            <a href="{{ route('books.browse') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Buku
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Book Cover -->
                        <div class="md:w-1/3">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full rounded-lg shadow-md">
                            @else
                                <div class="w-full aspect-[3/4] bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400">No Cover</span>
                                </div>
                            @endif
                        </div>

                        <!-- Book Details -->
                        <div class="md:w-2/3">
                            <h1 class="text-2xl font-bold mb-4">{{ $book->judul }}</h1>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500">Pengarang</h3>
                                    <p class="mt-1">{{ $book->pengarang }}</p>
                                </div>

                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500">ISBN</h3>
                                    <p class="mt-1">{{ $book->isbn }}</p>
                                </div>

                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500">Penerbit</h3>
                                    <p class="mt-1">{{ $book->penerbit }}</p>
                                </div>

                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500">Tahun Terbit</h3>
                                    <p class="mt-1">{{ $book->tahun_terbit }}</p>
                                </div>

                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500">Kategori</h3>
                                    <p class="mt-1">{{ $book->category->nama }}</p>
                                </div>

                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500">Lokasi Rak</h3>
                                    <p class="mt-1">{{ $book->lokasi_rak }}</p>
                                </div>

                                <div>
                                    <h3 class="text-sm font-semibold text-gray-500">Stok</h3>
                                    <p class="mt-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $book->stok > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $book->stok }} buku
                                        </span>
                                    </p>
                                </div>
                            </div>

                            @if($book->deskripsi)
                                <div class="mt-6">
                                    <h3 class="text-sm font-semibold text-gray-500">Deskripsi</h3>
                                    <p class="mt-2 text-gray-600 whitespace-pre-line">{{ $book->deskripsi }}</p>
                                </div>
                            @endif

                            @if(auth()->user()->level === 'anggota' && $book->stok > 0)
                                <div class="mt-6">
                                    <a href="{{ route('loans.create', ['book_id' => $book->id]) }}" 
                                       class="inline-flex items-center px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Pinjam Buku
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 