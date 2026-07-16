<x-customer-layout title="Dashboard Saya">
    <!-- WELCOME BANNER -->
    <div class="mt-4 overflow-hidden rounded-2xl bg-brand-gradient-soft p-8 sm:p-10 relative reveal">
        <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
            <svg viewBox="0 0 100 100" fill="none" stroke="#18b378" stroke-width="0.5">
                <circle cx="50" cy="50" r="40" stroke-dasharray="8 8"/>
                <circle cx="50" cy="50" r="25" stroke-dasharray="6 6"/>
            </svg>
        </div>
        <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-1.5 text-xs font-semibold text-brand-700 shadow-sm">
            👋 Selamat datang kembali
        </span>
        <h1 class="mt-4 text-2xl font-extrabold text-slate-800 sm:text-3xl">
            Halo, {{ auth('customer')->user()->name }}!
        </h1>
        <p class="mt-2 max-w-lg text-sm text-slate-600">
            Pantau semua pengiriman kamu di sini, atau langsung kirim paket baru.
        </p>
        <a href="{{ route('customer.kirim') }}"
           class="btn-slide mt-5 inline-block rounded-xl bg-brand-gradient px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/20 transition hover:opacity-90">
            + Kirim Paket Baru
        </a>
    </div>

    <!-- STATS -->
    <div class="mt-6 grid grid-cols-3 gap-4 stagger-children">
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5 text-center">
            <p class="text-2xl font-extrabold text-slate-800">{{ $summary['total'] }}</p>
            <p class="mt-1 text-xs font-medium text-slate-500">Total Pengiriman</p>
        </div>
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5 text-center">
            <p class="text-2xl font-extrabold text-transit-600">{{ $summary['in_progress'] }}</p>
            <p class="mt-1 text-xs font-medium text-slate-500">Sedang Diproses</p>
        </div>
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5 text-center">
            <p class="text-2xl font-extrabold text-brand-600">{{ $summary['delivered'] }}</p>
            <p class="mt-1 text-xs font-medium text-slate-500">Terkirim</p>
        </div>
    </div>

    <!-- DAFTAR PENGIRIMAN -->
    <div class="mt-8 reveal reveal-delay-1">
        <h2 class="text-lg font-bold text-slate-800">Pengiriman Saya</h2>

        <div class="mt-4 space-y-3">
            @forelse ($shipments as $shipment)
                @php
                    $latestPayment = $shipment->payments->last();
                    $isPaid = $latestPayment?->payment_status === 'paid';
                @endphp
                <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <p class="font-bold text-slate-800">{{ $shipment->tracking_number }}</p>
                            <p class="mt-1 text-sm text-slate-500">
                                {{ $shipment->originBranch->name ?? '-' }} → {{ $shipment->destinationBranch->name ?? '-' }}
                            </p>
                            <p class="text-sm text-slate-500">Kepada: {{ $shipment->receiver->name ?? '-' }}</p>
                        </div>
                        <span class="shrink-0 rounded-full bg-brand-gradient-soft px-3 py-1 text-xs font-semibold text-brand-700">
                            {{ $shipment->status->label() }}
                        </span>
                    </div>

                    <div class="mt-4 flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 pt-4">
                        <p class="text-sm">
                            <span class="text-slate-400">Total:</span>
                            <span class="font-semibold text-slate-800">Rp{{ number_format($shipment->total_price, 0, ',', '.') }}</span>
                        </p>

                        <div class="flex gap-2">
                            <a href="/lacak?tracking_number={{ $shipment->tracking_number }}"
                               class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 transition hover:border-brand-300 hover:text-brand-600">
                                Lacak
                            </a>
                            @if ($isPaid)
                                <span class="rounded-xl bg-brand-50 px-4 py-2 text-sm font-semibold text-brand-700 flex items-center gap-1.5">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Lunas
                                </span>
                            @else
                                <a href="{{ route('payment.show', $shipment) }}"
                                   class="btn-slide rounded-xl bg-brand-gradient px-4 py-2 text-sm font-semibold text-white shadow-md shadow-brand-500/20 transition hover:opacity-90">
                                    Bayar Sekarang
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-200 p-12 text-center reveal">
                    <div class="text-4xl mb-4">📦</div>
                    <p class="text-sm text-slate-500">Belum ada pengiriman.</p>
                    <a href="{{ route('customer.kirim') }}" class="mt-4 inline-block text-sm font-semibold text-brand-600 transition hover:text-brand-700">
                        Mulai kirim paket pertamamu →
                    </a>
                </div>
            @endforelse
        </div>

        <div class="mt-6">{{ $shipments->links() }}</div>
    </div>
</x-customer-layout>
