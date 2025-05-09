<x-app-layout>
    <x-slot name="header">
        <h1 class="section-title">Daftar Kategori</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Kategori</h4>
                    <div class="card-header-action">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Kategori
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Jumlah Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="font-weight-600">{{ $category->nama }}</div>
                                            <div class="text-muted text-small">{{ $category->deskripsi }}</div>
                                        </td>
                                        <td>
                                            <span class="badge badge-info">{{ $category->books_count }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data kategori</td>
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
                { "sortable": false, "targets": [2] }
            ]
        });
    </script>
    @endpush
</x-app-layout> 