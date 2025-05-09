<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Pengguna
                        </a>
                    </div>

                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b">Nama</th>
                                <th class="px-6 py-3 border-b">Email</th>
                                <th class="px-6 py-3 border-b">NPM</th>
                                <th class="px-6 py-3 border-b">Level</th>
                                <th class="px-6 py-3 border-b">Status</th>
                                <th class="px-6 py-3 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 border-b">{{ $user->nama }}</td>
                                    <td class="px-6 py-4 border-b">{{ $user->email }}</td>
                                    <td class="px-6 py-4 border-b">{{ $user->npm }}</td>
                                    <td class="px-6 py-4 border-b">{{ ucfirst($user->level) }}</td>
                                    <td class="px-6 py-4 border-b">{{ $user->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                                    <td class="px-6 py-4 border-b">
                                        <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        @if ($user->id !== auth()->id())
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center">Tidak ada data pengguna</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 