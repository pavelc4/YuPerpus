<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteAccount">
            <i class="fas fa-trash"></i> Hapus Akun
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalDeleteAccount" tabindex="-1" role="dialog" aria-labelledby="modalDeleteAccountLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalDeleteAccountLabel">Konfirmasi Hapus Akun</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus akun ini? Semua data akan dihapus permanen. Masukkan password untuk konfirmasi.</p>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" placeholder="Password">
                                @error('password', 'userDeletion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
