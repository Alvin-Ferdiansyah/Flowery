<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl font-semibold text-rose-950 leading-tight">
            Profil Saya
        </h2>
    </x-slot>

    <div class="min-h-screen bg-rose-50 py-12">
        <div class="mx-auto grid max-w-6xl gap-6 px-4 sm:px-6 lg:grid-cols-[220px_1fr] lg:px-8">
            <aside class="h-max rounded-2xl bg-rose-900 p-6 text-rose-50"><p class="text-xs font-bold tracking-[0.18em] text-rose-200">AKUN FLOWERY</p><h3 class="mt-3 font-serif text-2xl">Halo, {{ $user->name }}</h3><p class="mt-3 text-sm leading-6 text-rose-100">Kelola informasi akun dan keamananmu di sini.</p><a class="mt-6 inline-block text-sm font-semibold text-white underline" href="{{ route('home') }}">Kembali belanja</a></aside>
            <div class="space-y-6"><div class="p-4 sm:p-8 bg-white shadow-sm ring-1 ring-rose-100 sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-sm ring-1 ring-rose-100 sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-sm ring-1 ring-rose-100 sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div></div>
        </div>
    </div>
</x-app-layout>
