<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Peminjaman') }}
            </h2>
            <div>
                @if ($loan->status === 'dipinjam')
                    <a href="{{ route('loans.edit', $loan) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Edit
                    </a>
                    <form action="{{ route('loans.return', $loan) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Kembalikan
                        </button>
                    </form>
                    <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">
                            Hapus
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Buku -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Informasi Buku</h3>
                    <div class="space-y-2">
                        <div>
                            <span class="font-medium">Judul:</span>
                            <span>{{ $loan->book->judul }}</span>
                        </div>
                        <div>
                            <span class="font-medium">ISBN:</span>
                            <span>{{ $loan->book->isbn }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Pengarang:</span>
                            <span>{{ $loan->book->pengarang }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Penerbit:</span>
                            <span>{{ $loan->book->penerbit }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Kategori:</span>
                            <span>{{ $loan->book->category->nama }}</span>
                        </div>
                    </div>
                </div>

                <!-- Informasi Peminjaman -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Informasi Peminjaman</h3>
                    <div class="space-y-2">
                        <div>
                            <span class="font-medium">Peminjam:</span>
                            <span>{{ $loan->user->nama }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Email:</span>
                            <span>{{ $loan->user->email }}</span>
                        </div>
                        <div>
                            <span class="font-medium">No. HP:</span>
                            <span>{{ $loan->user->no_hp }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Tanggal Pinjam:</span>
                            <span>{{ $loan->tanggal_pinjam->format('d/m/Y') }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Tanggal Kembali:</span>
                            <span>{{ $loan->tanggal_kembali->format('d/m/Y') }}</span>
                        </div>
                        @if ($loan->tanggal_dikembalikan)
                            <div>
                                <span class="font-medium">Tanggal Dikembalikan:</span>
                                <span>{{ $loan->tanggal_dikembalikan->format('d/m/Y') }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="font-medium">Status:</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $loan->status === 'dipinjam' ? 'bg-yellow-100 text-yellow-800' : 
                                   ($loan->status === 'dikembalikan' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($loan->status) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($loan->keterangan)
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Keterangan</h3>
                    <p class="text-gray-700">{{ $loan->keterangan }}</p>
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('loans.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout> 