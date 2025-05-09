<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Total Buku</div>
                        <div class="text-3xl font-bold text-blue-600">{{ \App\Models\Book::count() }}</div>
                        <div class="text-sm text-gray-500 mt-2">
                            <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">Lihat Detail →</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Total Anggota</div>
                        <div class="text-3xl font-bold text-green-600">{{ \App\Models\User::where('level', 'anggota')->count() }}</div>
                        <div class="text-sm text-gray-500 mt-2">
                            <a href="{{ route('users.index') }}" class="text-green-500 hover:text-green-700">Lihat Detail →</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Peminjaman Aktif</div>
                        <div class="text-3xl font-bold text-yellow-600">{{ \App\Models\Loan::whereIn('status', ['reserved', 'dipinjam'])->count() }}</div>
                        <div class="text-sm text-gray-500 mt-2">
                            <a href="{{ route('loans.index') }}" class="text-yellow-500 hover:text-yellow-700">Lihat Detail →</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-900 text-xl font-semibold mb-2">Total Kategori</div>
                        <div class="text-3xl font-bold text-purple-600">{{ \App\Models\Category::count() }}</div>
                        <div class="text-sm text-gray-500 mt-2">
                            <a href="{{ route('categories.index') }}" class="text-purple-500 hover:text-purple-700">Lihat Detail →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Cepat -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Menu Cepat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('books.create') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">Tambah Buku</h4>
                                <p class="text-sm text-gray-500">Tambahkan buku baru ke perpustakaan</p>
                            </div>
                        </a>

                        <a href="{{ route('categories.create') }}" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">Tambah Kategori</h4>
                                <p class="text-sm text-gray-500">Buat kategori baru untuk buku</p>
                            </div>
                        </a>

                        <a href="{{ route('loans.index') }}" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">Kelola Peminjaman</h4>
                                <p class="text-sm text-gray-500">Lihat dan kelola peminjaman buku</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Peminjaman Terbaru -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Peminjaman Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peminjam</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse (\App\Models\Loan::with(['book', 'user'])->latest()->take(5)->get() as $loan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $loan->book->judul }}</div>
                                            <div class="text-sm text-gray-500">ISBN: {{ $loan->book->isbn }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $loan->user->nama }}</div>
                                            <div class="text-sm text-gray-500">NPM: {{ $loan->npm }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loan->tanggal_pinjam->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($loan->status === 'reserved') bg-yellow-100 text-yellow-800
                                                @elseif($loan->status === 'dipinjam') bg-blue-100 text-blue-800
                                                @elseif($loan->status === 'dikembalikan') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($loan->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            Tidak ada data peminjaman
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('loans.index') }}" class="text-blue-500 hover:text-blue-700">Lihat Semua Peminjaman →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
