<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2">
                    Email Anda belum diverifikasi.
                    <button form="send-verification" class="btn btn-link p-0 align-baseline">Kirim ulang verifikasi</button>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2">
                        Link verifikasi baru telah dikirim ke email Anda.
                    </div>
                @endif
            @endif
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success ml-3">Tersimpan.</span>
            @endif
        </div>
    </form>
</section>
