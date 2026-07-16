<x-admin-layout title="Pengiriman">
    <div class="flex flex-wrap items-center justify-between gap-4">
<<<<<<< HEAD
        <form method="GET" class="flex flex-1 gap-2">
            <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Cari no. resi..."
                   class="w-full max-w-xs rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            <select name="status" class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                <option value="">Semua Status</option>
                @foreach (\App\Enums\ShipmentStatus::cases() as $status)
                    <option value="{{ $status->value }}" @selected(($filters['status'] ?? '') === $status->value)>{{ $status->label() }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-xl bg-slate-100 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-200">Filter</button>
=======
        <form method="GET" class="flex flex-1 gap-2" x-data="{ status: '{{ ($filters['status'] ?? '') }}' }">
            <div class="relative flex-1 max-w-md">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Cari no. resi..."
                       class="w-full rounded-xl border border-slate-200 pl-9 pr-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            </div>
            <select name="status" x-model="status" class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                <option value="">Semua Status</option>
                @foreach (\App\Enums\ShipmentStatus::cases() as $s)
                    <option value="{{ $s->value }}" @selected(($filters['status'] ?? '') === $s->value)>{{ $s->label() }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-xl bg-slate-100 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">Filter</button>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        </form>

        @can('create', \App\Models\Shipment::class)
            <a href="{{ route('admin.shipments.create') }}"
<<<<<<< HEAD
               class="rounded-xl bg-brand-gradient px-5 py-2.5 text-sm font-semibold text-white hover:opacity-90">
                + Shipment Baru
=======
               class="btn-slide inline-flex items-center gap-2 rounded-xl bg-brand-gradient px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-brand-500/20 transition hover:opacity-90">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                Shipment Baru
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            </a>
        @endcan
    </div>

<<<<<<< HEAD
    <div class="mt-6 overflow-hidden rounded-2xl border border-slate-100 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs font-semibold uppercase text-slate-500">
                <tr>
                    <th class="px-5 py-3">No. Resi</th>
                    <th class="px-5 py-3">Pengirim</th>
                    <th class="px-5 py-3">Tujuan</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($shipments as $shipment)
                    <tr onclick="window.location='{{ route('admin.shipments.show', $shipment) }}'" class="cursor-pointer hover:bg-slate-50">
                        <td class="px-5 py-3 font-semibold text-slate-800">{{ $shipment->tracking_number }}</td>
                        <td class="px-5 py-3 text-slate-600">{{ $shipment->sender->name ?? '-' }}</td>
                        <td class="px-5 py-3 text-slate-600">{{ $shipment->receiver->city ?? '-' }}</td>
                        <td class="px-5 py-3">
                            <span class="rounded-full bg-brand-gradient-soft px-3 py-1 text-xs font-semibold text-brand-700">
                                {{ $shipment->status->label() }}
                            </span>
                        </td>
                        <td class="px-5 py-3 text-slate-500">{{ $shipment->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-5 py-10 text-center text-slate-400">Belum ada data pengiriman.</td></tr>
                @endforelse
            </tbody>
        </table>
=======
    <div class="mt-6 overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-3">No. Resi</th>
                        <th class="px-5 py-3">Pengirim</th>
                        <th class="px-5 py-3">Tujuan</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($shipments as $shipment)
                        <tr onclick="window.location='{{ route('admin.shipments.show', $shipment) }}'" class="cursor-pointer transition hover:bg-slate-50">
                            <td class="px-5 py-3.5 font-semibold text-slate-800">{{ $shipment->tracking_number }}</td>
                            <td class="px-5 py-3.5 text-slate-600">{{ $shipment->sender->name ?? '-' }}</td>
                            <td class="px-5 py-3.5 text-slate-600">{{ $shipment->receiver->city ?? '-' }}</td>
                            <td class="px-5 py-3.5">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-amber-50 text-amber-700',
                                        'picked_up' => 'bg-blue-50 text-blue-700',
                                        'in_transit' => 'bg-sky-50 text-sky-700',
                                        'arrived_at_branch' => 'bg-indigo-50 text-indigo-700',
                                        'out_for_delivery' => 'bg-violet-50 text-violet-700',
                                        'delivered' => 'bg-brand-50 text-brand-700',
                                        'cancelled' => 'bg-rose-50 text-rose-700',
                                    ];
                                @endphp
                                <span class="inline-flex items-center gap-1.5 rounded-full {{ $statusColors[$shipment->status->value] ?? 'bg-slate-100 text-slate-600' }} px-3 py-1 text-xs font-semibold">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $shipment->status->value === 'delivered' ? 'bg-brand-500' : ($shipment->status->value === 'cancelled' ? 'bg-rose-500' : 'bg-current') }}"></span>
                                    {{ $shipment->status->label() }}
                                </span>
                            </td>
                            <td class="px-5 py-3.5 text-slate-500">{{ $shipment->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-5 py-12 text-center text-slate-400">Belum ada data pengiriman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
    </div>

    <div class="mt-5">{{ $shipments->links() }}</div>
</x-admin-layout>
