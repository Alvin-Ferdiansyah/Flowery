<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-serif text-2xl font-semibold text-rose-950 leading-tight">
                Akun Saya & Riwayat Pesanan
            </h2>
            <a href="{{ route('home') }}" class="inline-block px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded">
                Belanja Lagi
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-rose-50 py-10">
        <div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:px-8">
            <!-- Sidebar Informasi User -->
            <aside class="h-max rounded-lg bg-rose-900 p-6 text-rose-50 shadow-md">
                <p class="text-xs font-bold tracking-[0.18em] text-rose-300">MEMBER FLOWERY</p>
                <h3 class="mt-2 font-serif text-2xl font-bold">{{ $user->name }}</h3>
                <p class="mt-1 text-sm text-rose-200">{{ $user->email }}</p>
                
                <div class="mt-4 pt-4 border-t border-rose-800 text-xs text-rose-200 space-y-1">
                    <p>Role: <strong class="uppercase text-white">{{ $user->role }}</strong></p>
                    <p>Bergabung: {{ $user->created_at->format('d M Y') }}</p>
                </div>

                @if($user->role === 'admin')
                    <div class="mt-6 pt-4 border-t border-rose-800">
                        <a href="{{ route('admin.dashboard') }}" class="block w-full py-2.5 px-3 bg-white text-rose-950 rounded text-center text-xs font-bold hover:bg-rose-100 transition">
                            Masuk Dashboard Admin
                        </a>
                    </div>
                @endif

                <div class="mt-6 pt-4 border-t border-rose-800">
                    <a href="{{ route('collections.index') }}" class="block w-full py-2 px-3 bg-rose-800 text-rose-100 rounded text-center text-xs font-semibold hover:bg-rose-700 transition">
                        Lihat Koleksi Bunga
                    </a>
                </div>
            </aside>

            <!-- Main Content: Riwayat Pesanan & Pengaturan Profil -->
            <div class="space-y-8">
                <!-- 1. FITUR RIWAYAT PESANAN SAYA -->
                <div class="p-6 bg-white shadow-sm ring-1 ring-rose-100 rounded-lg">
                    <div class="border-b border-rose-100 pb-4 mb-4 flex items-center justify-between">
                        <div>
                            <h3 class="font-serif text-xl font-bold text-rose-950">📦 Riwayat Pesanan Saya</h3>
                            <p class="text-xs text-gray-500 mt-1">Pantau status pesanan, pembayaran, dan bukti resi buket bungamu.</p>
                        </div>
                        <span class="text-xs font-bold px-2.5 py-1 bg-rose-100 text-rose-800 rounded">
                            {{ $orders->count() }} Pesanan
                        </span>
                    </div>

                    @forelse($orders as $order)
                        <div class="border border-rose-100 rounded-md p-4 mb-4 hover:border-rose-300 transition bg-rose-50/30">
                            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-rose-100 pb-3 mb-3">
                                <div>
                                    <span class="font-bold text-sm text-rose-900">Resi #{{ $order->order_number }}</span>
                                    <span class="text-xs text-gray-400 ml-2">{{ $order->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if($order->payment_status === 'paid')
                                        <span class="text-xs font-bold px-2 py-0.5 rounded bg-green-100 text-green-800">LUNAS</span>
                                    @else
                                        <span class="text-xs font-bold px-2 py-0.5 rounded bg-amber-100 text-amber-800">MENUNGGU BAYAR</span>
                                    @endif
                                    <span class="text-xs font-bold px-2 py-0.5 rounded bg-rose-200 text-rose-900">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="text-xs space-y-1.5 text-gray-700">
                                @foreach($order->items as $item)
                                    <div class="flex justify-between items-center">
                                        <span>• <strong>{{ $item->product_name }}</strong> ({{ $item->size ?: 'Standar' }})</span>
                                        <span class="font-semibold">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-3 pt-3 border-t border-rose-100 flex items-center justify-between text-xs">
                                <div>
                                    <span class="text-gray-500">Tujuan:</span>
                                    <span class="font-medium text-gray-800">{{ $order->customer_name }} - {{ $order->city ?: 'Alamat' }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-sm text-rose-900">Total: Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                                    <a href="{{ route('order.status', ['order' => $order->order_number]) }}" class="px-3 py-1 bg-rose-600 hover:bg-rose-700 text-white rounded font-bold">
                                        Buka Resi
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-500 text-xs">
                            <p class="text-2xl mb-2">🌸</p>
                            <p class="font-semibold text-sm">Belum ada pesanan buket bunga yang kamu buat.</p>
                            <p class="mt-1">Pilih rangkaian bunga cantik untuk hadiah atau dekorasi spesialmu.</p>
                            <a href="{{ route('collections.index') }}" class="mt-4 inline-block px-4 py-2 bg-rose-600 text-white rounded font-bold">
                                Jelajahi Koleksi Sekarang
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- 2. EDIT INFORMASI PROFIL -->
                <div class="p-6 bg-white shadow-sm ring-1 ring-rose-100 rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- 3. KEAMANAN & PASSWORD -->
                <div class="p-6 bg-white shadow-sm ring-1 ring-rose-100 rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- 4. HAPUS AKUN -->
                <div class="p-6 bg-white shadow-sm ring-1 ring-rose-100 rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
