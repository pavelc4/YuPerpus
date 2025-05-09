<x-app-layout>
    <x-slot name="header">
        <h1 class="section-title">Daftar Buku</h1>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <form method="GET" action="" class="card card-body shadow-sm">
                <div class="form-row align-items-center">
                    <div class="col-md-6 mb-2">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari buku berdasarkan judul, pengarang, atau ISBN" value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="category" class="form-control">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($books as $book)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->judul }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                            <span class="text-muted">No Cover</span>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold">{{ $book->judul }}</h5>
                        <div class="mb-2">
                            <span class="badge badge-info">{{ $book->category->nama }}</span>
                            <span class="badge badge-{{ $book->stok > 0 ? 'success' : 'danger' }} float-right">{{ $book->stok > 0 ? $book->stok . ' buku' : 'Habis' }}</span>
                        </div>
                        <ul class="list-unstyled small mb-2">
                            <li><b>Pengarang:</b> {{ $book->pengarang }}</li>
                            <li><b>ISBN:</b> {{ $book->isbn }}</li>
                            <li><b>Penerbit:</b> {{ $book->penerbit }}</li>
                            <li><b>Tahun:</b> {{ $book->tahun_terbit }}</li>
                            <li><b>Lokasi:</b> {{ $book->lokasi_rak }}</li>
                        </ul>
                        @if(auth()->user() && auth()->user()->level === 'anggota' && $book->stok > 0)
                            <a href="{{ route('loans.create', ['book_id' => $book->id]) }}" class="btn btn-primary btn-block mt-auto"><i class="fas fa-book-reader"></i> Pinjam Buku</a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Tidak ada buku ditemukan.</div>
            </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
</x-app-layout> 