<x-app-layout>
    <x-slot name="header">
        <h1 class="section-title">Daftar Peminjaman</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-hand-holding"></i> Daftar Peminjaman</h4>
                    <a href="{{ route('loans.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Peminjaman
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Buku</th>
                                    <th>Peminjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($loans as $loan)
                                    <tr>
                                        <td>
                                            <div class="font-weight-600">{{ $loan->book->judul }}</div>
                                            <div class="text-muted small">ISBN: {{ $loan->book->isbn }}</div>
                                        </td>
                                        <td>
                                            <div class="font-weight-600">{{ $loan->user->nama }}</div>
                                            <div class="text-muted small">{{ $loan->user->email }}</div>
                                        </td>
                                        <td>{{ $loan->tanggal_pinjam->format('d/m/Y') }}</td>
                                        <td>{{ $loan->tanggal_kembali->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="badge badge-{{ $loan->status === 'reserved' ? 'warning' : ($loan->status === 'dipinjam' ? 'primary' : ($loan->status === 'dikembalikan' ? 'success' : 'danger')) }}" style="font-size: 0.95em; padding: 0.5em 1em;">
                                                {{ ucfirst($loan->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($loan->status === 'reserved')
                                                <form action="{{ route('loans.approve', $loan) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin menyetujui peminjaman ini?')">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            @elseif($loan->status === 'dipinjam')
                                                <form action="{{ route('loans.return', $loan) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengembalikan buku ini?')">
                                                        <i class="fas fa-undo"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('loans.edit', $loan) }}" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data peminjaman</td>
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
                { "sortable": false, "targets": [5] }
            ]
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @endpush
</x-app-layout> 