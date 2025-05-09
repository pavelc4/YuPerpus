<x-app-layout>
    <x-slot name="header">
        <h1 class="section-title">Profil Saya</h1>
    </x-slot>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user"></i> Informasi Profil</h4>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-key"></i> Ubah Password</h4>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header bg-danger text-white">
                    <h4><i class="fas fa-trash"></i> Hapus Akun</h4>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
