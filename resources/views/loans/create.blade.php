<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservasi Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Terjadi kesalahan:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('loans.store') }}" method="POST" id="loanForm">
                        @csrf

                        @if(request('book_id'))
                            <input type="hidden" name="book_id" value="{{ request('book_id') }}">
                            <div class="mb-6">
                                <p class="text-gray-600">Buku yang dipilih: 
                                    <span class="font-semibold">{{ $book->judul }}</span>
                                    (Stok: {{ $book->stok }})
                                </p>
                            </div>
                        @else
                            <div class="mb-6">
                                <x-input-label for="book_id" :value="__('Buku')" />
                                <select id="book_id" name="book_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">Pilih Buku</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                            {{ $book->judul }} (Stok: {{ $book->stok }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('book_id')" />
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tanggal Pinjam -->
                            <div>
                                <x-input-label for="tanggal_pinjam" :value="__('Tanggal Pinjam')" />
                                <x-text-input id="tanggal_pinjam" name="tanggal_pinjam" type="date" 
                                    class="mt-1 block w-full" 
                                    :value="old('tanggal_pinjam', date('Y-m-d'))" 
                                    min="{{ date('Y-m-d') }}"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_pinjam')" />
                            </div>

                            <!-- Tanggal Kembali -->
                            <div>
                                <x-input-label for="tanggal_kembali" :value="__('Tanggal Kembali')" />
                                <x-text-input id="tanggal_kembali" name="tanggal_kembali" type="date" 
                                    class="mt-1 block w-full" 
                                    :value="old('tanggal_kembali', date('Y-m-d', strtotime('+7 days')))" 
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_kembali')" />
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="mt-6">
                            <x-input-label for="keterangan" :value="__('Keterangan')" />
                            <textarea id="keterangan" name="keterangan" 
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                rows="4" 
                                placeholder="Tambahkan keterangan jika diperlukan">{{ old('keterangan') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-secondary-button onclick="window.history.back()" type="button" class="mr-3">
                                {{ __('Batal') }}
                            </x-secondary-button>
                            <x-primary-button onclick="submitForm(event)">
                                {{ __('Reservasi') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function submitForm(event) {
            event.preventDefault();
            
            // Log form data
            const formData = new FormData(document.getElementById('loanForm'));
            console.log('Form data being submitted:');
            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            // Submit the form
            document.getElementById('loanForm').submit();
        }

        // Add event listeners for date validation
        document.getElementById('tanggal_pinjam').addEventListener('change', function() {
            const tanggalKembali = document.getElementById('tanggal_kembali');
            tanggalKembali.min = this.value;
            if (tanggalKembali.value < this.value) {
                tanggalKembali.value = this.value;
            }
        });
    </script>
    @endpush
</x-app-layout> 