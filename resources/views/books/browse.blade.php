<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Search and Filter -->
                    <div class="mb-6">
                        <form action="{{ route('books.browse') }}" method="GET" class="flex gap-4">
                            <div class="flex-1">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    placeholder="Cari buku berdasarkan judul, pengarang, atau ISBN...">
                            </div>
                            <div class="w-64">
                                <select name="category_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Cari
                            </button>
                        </form>
                    </div>

                    <!-- Books Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @forelse($books as $book)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                @if($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">No Cover</span>
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $book->judul }}</h3>
                                    <div class="space-y-2 text-sm text-gray-600">
                                        <p><span class="font-medium">Pengarang:</span> {{ $book->pengarang }}</p>
                                        <p><span class="font-medium">ISBN:</span> {{ $book->isbn }}</p>
                                        <p><span class="font-medium">Penerbit:</span> {{ $book->penerbit }}</p>
                                        <p><span class="font-medium">Tahun:</span> {{ $book->tahun_terbit }}</p>
                                        <p><span class="font-medium">Kategori:</span> {{ $book->category->nama }}</p>
                                        <p><span class="font-medium">Lokasi:</span> {{ $book->lokasi_rak }}</p>
                                        <p>
                                            <span class="font-medium">Stok:</span>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $book->stok > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $book->stok }} buku
                                            </span>
                                        </p>
                                    </div>
                                    @if(auth()->user()->level === 'anggota' && $book->stok > 0)
                                        <div class="mt-4">
                                            <a href="{{ route('loans.create', ['book_id' => $book->id]) }}" 
                                               class="block text-center bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition-colors">
                                                Pinjam Buku
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8 text-gray-500">
                                Tidak ada buku yang tersedia
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 