<x-admin-layout title="Dashboard">
<<<<<<< HEAD
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-slate-100 bg-white p-5">
            <p class="text-xs font-medium text-slate-500">Pengiriman Hari Ini</p>
            <p class="mt-2 text-2xl font-extrabold text-slate-800">{{ $summary['shipments_today'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-100 bg-white p-5">
            <p class="text-xs font-medium text-slate-500">Pengiriman Bulan Ini</p>
            <p class="mt-2 text-2xl font-extrabold text-slate-800">{{ $summary['shipments_this_month'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-100 bg-white p-5">
            <p class="text-xs font-medium text-slate-500">Revenue Bulan Ini</p>
            <p class="mt-2 text-2xl font-extrabold text-transit-600">Rp{{ number_format($summary['revenue_this_month'], 0, ',', '.') }}</p>
        </div>
        <div class="rounded-2xl border border-slate-100 bg-white p-5">
            <p class="text-xs font-medium text-slate-500">Kurir Aktif</p>
            <p class="mt-2 text-2xl font-extrabold text-slate-800">{{ $summary['active_couriers'] }}</p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="rounded-2xl border border-slate-100 bg-white p-6 lg:col-span-2">
            <h2 class="font-bold text-slate-800">Pengiriman Terbaru</h2>
            <div class="mt-4 divide-y divide-slate-100">
                @forelse ($recentShipments as $shipment)
                    @if (auth()->user()->hasRole('admin|cashier'))
                        <a href="{{ route('admin.shipments.show', $shipment) }}" class="flex items-center justify-between gap-4 py-3 hover:bg-slate-50 -mx-2 px-2 rounded-lg transition">
                            <div>
                                <p class="text-sm font-semibold text-slate-800">{{ $shipment->tracking_number }}</p>
                                <p class="text-xs text-slate-500">{{ $shipment->sender->name ?? '-' }}</p>
                            </div>
                            <span class="rounded-full bg-brand-gradient-soft px-3 py-1 text-xs font-semibold text-brand-700">
                                {{ $shipment->status->label() }}
                            </span>
                        </a>
                    @else
                        <div class="flex items-center justify-between gap-4 py-3 -mx-2 px-2">
                            <div>
                                <p class="text-sm font-semibold text-slate-800">{{ $shipment->tracking_number }}</p>
                                <p class="text-xs text-slate-500">{{ $shipment->sender->name ?? '-' }}</p>
                            </div>
                            <span class="rounded-full bg-brand-gradient-soft px-3 py-1 text-xs font-semibold text-brand-700">
                                {{ $shipment->status->label() }}
                            </span>
                        </div>
                    @endif
                @empty
                    <p class="py-6 text-center text-sm text-slate-400">Belum ada pengiriman.</p>
=======
    <!-- Stats Cards -->
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4 stagger-children">
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-slate-500">Pengiriman Hari Ini</p>
                <span class="grid h-8 w-8 place-items-center rounded-lg bg-brand-50 text-brand-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </span>
            </div>
            <p class="mt-3 text-3xl font-extrabold text-slate-800">{{ $summary['shipments_today'] }}</p>
        </div>
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-slate-500">Pengiriman Bulan Ini</p>
                <span class="grid h-8 w-8 place-items-center rounded-lg bg-brand-50 text-brand-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </span>
            </div>
            <p class="mt-3 text-3xl font-extrabold text-slate-800">{{ $summary['shipments_this_month'] }}</p>
        </div>
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-slate-500">Revenue Bulan Ini</p>
                <span class="grid h-8 w-8 place-items-center rounded-lg bg-transit-50 text-transit-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
            </div>
            <p class="mt-3 text-3xl font-extrabold text-transit-600">Rp{{ number_format($summary['revenue_this_month'], 0, ',', '.') }}</p>
        </div>
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-5">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-slate-500">Kurir Aktif</p>
                <span class="grid h-8 w-8 place-items-center rounded-lg bg-brand-50 text-brand-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </span>
            </div>
            <p class="mt-3 text-3xl font-extrabold text-slate-800">{{ $summary['active_couriers'] }}</p>
        </div>
    </div>

    <!-- Charts & Data -->
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <!-- Recent Shipments -->
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-6 lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-slate-800">Pengiriman Terbaru</h2>
                <a href="{{ route('admin.shipments.index') }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700">Lihat Semua →</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse ($recentShipments as $shipment)
                    <a href="{{ route('admin.shipments.show', $shipment) }}" class="flex items-center justify-between gap-4 py-3 hover:bg-slate-50 -mx-2 px-2 rounded-lg transition-all">
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-slate-800 truncate">{{ $shipment->tracking_number }}</p>
                            <p class="text-xs text-slate-500 truncate">{{ $shipment->sender->name ?? '-' }}</p>
                        </div>
                        <span class="shrink-0 rounded-full bg-brand-gradient-soft px-3 py-1 text-xs font-semibold text-brand-700">
                            {{ $shipment->status->label() }}
                        </span>
                    </a>
                @empty
                    <p class="py-8 text-center text-sm text-slate-400">Belum ada pengiriman.</p>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                @endforelse
            </div>
        </div>

<<<<<<< HEAD
        <div class="rounded-2xl border border-slate-100 bg-white p-6">
            <h2 class="font-bold text-slate-800">Performa Cabang</h2>
            <div class="mt-4 space-y-3">
                @foreach ($branchPerformance as $branch)
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-600">{{ $branch->name }}</span>
                        <span class="font-semibold text-slate-800">{{ $branch->shipments_count }}</span>
=======
        <!-- Branch Performance -->
        <div class="card-hover rounded-2xl border border-slate-100 bg-white p-6">
            <h2 class="font-bold text-slate-800">Performa Cabang</h2>
            <p class="mt-1 text-xs text-slate-400">Pengiriman bulan ini</p>
            <div class="mt-5 space-y-4">
                @foreach ($branchPerformance as $branch)
                    <div>
                        <div class="flex items-center justify-between text-sm mb-1.5">
                            <span class="text-slate-600 font-medium">{{ $branch->name }}</span>
                            <span class="font-semibold text-slate-800">{{ $branch->shipments_count }}</span>
                        </div>
                        <div class="h-2 rounded-full bg-slate-100 overflow-hidden">
                            @php
                                $maxCount = $branchPerformance->max('shipments_count') ?: 1;
                                $pct = ($branch->shipments_count / $maxCount) * 100;
                            @endphp
                            <div class="h-full rounded-full bg-brand-gradient" style="width: {{ $pct }}%"></div>
                        </div>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======

    <!-- Status Breakdown -->
    @if ($summary['status_breakdown']->isNotEmpty())
        <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($summary['status_breakdown'] as $status => $count)
                @php
                    $colors = [
                        'pending' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'dot' => 'bg-amber-400'],
                        'picked_up' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'dot' => 'bg-blue-400'],
                        'in_transit' => ['bg' => 'bg-sky-50', 'text' => 'text-sky-700', 'dot' => 'bg-sky-400'],
                        'arrived_at_branch' => ['bg' => 'bg-indigo-50', 'text' => 'text-indigo-700', 'dot' => 'bg-indigo-400'],
                        'out_for_delivery' => ['bg' => 'bg-violet-50', 'text' => 'text-violet-700', 'dot' => 'bg-violet-400'],
                        'delivered' => ['bg' => 'bg-brand-50', 'text' => 'text-brand-700', 'dot' => 'bg-brand-500'],
                        'cancelled' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-700', 'dot' => 'bg-rose-400'],
                    ];
                    $c = $colors[$status] ?? ['bg' => 'bg-slate-50', 'text' => 'text-slate-700', 'dot' => 'bg-slate-400'];
                @endphp
                <div class="rounded-xl border border-slate-100 p-4 flex items-center gap-3 {{ $c['bg'] }}">
                    <span class="h-3 w-3 rounded-full {{ $c['dot'] }}"></span>
                    <div>
                        <p class="text-xs font-medium {{ $c['text'] }}">{{ \App\Enums\ShipmentStatus::from($status)->label() }}</p>
                        <p class="text-lg font-bold text-slate-800">{{ $count }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
</x-admin-layout>
