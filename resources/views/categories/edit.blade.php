<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="nama" :value="__('Nama')" />
                    <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama', $category->nama)" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                </div>

                <!-- Deskripsi -->
                <div class="mt-6">
                    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                    <textarea id="deskripsi" name="deskripsi" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4">{{ old('deskripsi', $category->deskripsi) }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-secondary-button onclick="window.history.back()" type="button" class="mr-3">
                        {{ __('Batal') }}
                    </x-secondary-button>
                    <x-primary-button>
                        {{ __('Simpan') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> 