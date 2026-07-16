<x-admin-layout :title="$shipment->tracking_number">
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
            <!-- HEADER -->
            <div class="rounded-2xl border border-slate-100 bg-white p-6">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">No. Resi</p>
                        <p class="text-xl font-extrabold text-slate-800">{{ $shipment->tracking_number }}</p>
                    </div>
                    <span class="rounded-full bg-brand-gradient px-4 py-1.5 text-xs font-semibold text-white">
                        {{ $shipment->status->label() }}
                    </span>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2 text-sm">
                    <div>
                        <p class="text-xs font-semibold text-slate-400">Pengirim</p>
                        <p class="font-medium text-slate-700">{{ $shipment->sender->name ?? '-' }}</p>
                        <p class="text-slate-500">{{ $shipment->sender->phone ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400">Penerima</p>
                        <p class="font-medium text-slate-700">{{ $shipment->receiver->name ?? '-' }}</p>
                        <p class="text-slate-500">{{ $shipment->receiver->phone ?? '-' }} · {{ $shipment->receiver->city ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400">Rute</p>
                        <p class="font-medium text-slate-700">{{ $shipment->originBranch->name ?? '-' }} → {{ $shipment->destinationBranch->name ?? '-' }}</p>
                        <p class="text-slate-500">{{ $shipment->total_weight }} kg</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400">Total Harga</p>
                        <p class="font-medium text-slate-700">Rp{{ number_format($shipment->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>

                @if ($shipment->photo)
                    <div class="mt-4 border-t border-slate-100 pt-4">
                        <p class="text-xs font-semibold text-slate-400">Foto Paket</p>
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($shipment->photo) }}" class="mt-2 h-32 w-32 rounded-xl object-cover">
                    </div>
                @endif
            </div>

            <!-- TIMELINE -->
            <div class="rounded-2xl border border-slate-100 bg-white p-6">
                <h2 class="font-bold text-slate-800">Riwayat Tracking</h2>
                <ol class="relative ml-3 mt-5 border-l-2 border-slate-100">
                    @foreach ($shipment->trackings as $tracking)
                        <li class="mb-6 ml-6 last:mb-0">
                            <span class="absolute -left-[9px] grid h-4 w-4 place-items-center rounded-full bg-brand-gradient ring-4 ring-white"></span>
                            <div class="flex items-baseline justify-between gap-3">
                                <h4 class="font-semibold text-slate-800">{{ \App\Enums\ShipmentStatus::from($tracking->status)->label() }}</h4>
                                <time class="text-xs text-slate-400">{{ $tracking->tracked_at->format('d/m/Y H:i') }}</time>
                            </div>
                            <p class="mt-1 text-sm text-slate-500">{{ $tracking->description }}</p>
                            @if ($tracking->location)
                                <p class="text-xs font-medium text-transit-600">{{ $tracking->location }}</p>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="space-y-6">
<<<<<<< HEAD
            <!-- STATUS (READ-ONLY) -->
            <div class="rounded-2xl border border-slate-100 bg-white p-6">
                <h2 class="font-bold text-slate-800">Status Pengiriman</h2>
                <p class="mt-1 text-xs text-slate-400">
                    Status diperbarui otomatis mengikuti aksi kurir di lapangan. Admin tidak dapat mengubah status secara manual.
                </p>
                <div class="mt-4 flex items-center gap-2">
                    <span class="rounded-full bg-brand-gradient px-4 py-1.5 text-xs font-semibold text-white">
                        {{ $shipment->status->label() }}
                    </span>
                </div>
                @if ($shipment->courier)
                    <p class="mt-3 text-xs text-slate-500">
                        Ditugaskan ke kurir: <span class="font-semibold text-slate-700">{{ $shipment->courier->name }}</span>
                    </p>
                @endif
            </div>
=======
            <!-- UPDATE STATUS -->
            @can('update', $shipment)
                <div class="rounded-2xl border border-slate-100 bg-white p-6">
                    <h2 class="font-bold text-slate-800">Update Status</h2>
                    <form method="POST" action="{{ route('admin.shipments.update-status', $shipment) }}" class="mt-4 space-y-3">
                        @csrf
                        <select name="status" required class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                            <option value="picked_up">Sudah Diambil</option>
                            <option value="in_transit">Dalam Perjalanan</option>
                            <option value="arrived_at_branch">Tiba di Cabang</option>
                            <option value="out_for_delivery">Sedang Diantar</option>
                            <option value="delivered">Terkirim</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                        <input type="text" name="location" placeholder="Lokasi (opsional)"
                               class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                        <textarea name="description" required rows="2" placeholder="Deskripsi update"
                                  class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none"></textarea>
                        <button type="submit" class="w-full rounded-xl bg-brand-gradient px-4 py-2.5 text-sm font-semibold text-white hover:opacity-90">
                            Simpan Update
                        </button>
                    </form>
                </div>
            @endcan

            <!-- ASSIGN KURIR -->
            @can('assignCourier', $shipment)
                <div class="rounded-2xl border border-slate-100 bg-white p-6">
                    <h2 class="font-bold text-slate-800">Kurir</h2>

                    @if ($shipment->courier)
                        <p class="mt-2 text-sm text-slate-600">
                            Ditugaskan ke: <span class="font-semibold">{{ $shipment->courier->name }}</span>
                            <span class="text-xs text-slate-400">(otomatis, bergantian sesuai beban kerja)</span>
                        </p>
                    @else
                        <p class="mt-2 text-sm text-amber-600">
                            Belum ada kurir tersedia di cabang asal. Kurir akan otomatis
                            ditugaskan begitu pembayaran dikonfirmasi (kalau ada yang aktif),
                            atau tugaskan manual di bawah.
                        </p>
                    @endif

                    <p class="mt-3 text-xs font-semibold uppercase text-slate-400">Override Manual</p>
                    <form method="POST" action="{{ route('admin.shipments.assign-courier', $shipment) }}" class="mt-2 flex gap-2">
                        @csrf
                        <select name="courier_id" required class="flex-1 rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                            <option value="">Pilih kurir lain...</option>
                            @foreach ($couriers as $courier)
                                <option value="{{ $courier->id }}" @selected($shipment->courier_id === $courier->id)>{{ $courier->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="rounded-xl bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-700">
                            Ganti
                        </button>
                    </form>
                </div>
            @endcan
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        </div>
    </div>
</x-admin-layout>
