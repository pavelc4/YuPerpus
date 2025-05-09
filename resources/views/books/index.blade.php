<x-app-layout>
    <x-slot name="header">
        <h1 class="section-title">Daftar Buku</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Buku</h4>
                    <div class="card-header-action">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Buku
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>ISBN</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $book)
                                    <tr>
                                        <td>
                                            <div class="font-weight-600">{{ $book->judul }}</div>
                                            <div class="text-muted text-small">{{ $book->pengarang }}</div>
                                        </td>
                                        <td>{{ $book->isbn }}</td>
                                        <td>
                                            <span class="badge badge-info">{{ $book->category->nama }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $book->stok > 0 ? 'success' : 'danger' }}">
                                                {{ $book->stok }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('books.edit', $book) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data buku</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $("#table-1").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [4] }
            ]
        });
    </script>
    @endpush
</x-app-layout> 