<x-customer-layout title="Kirim Paket">
    <h1 class="text-xl font-extrabold text-slate-800">Kirim Paket</h1>
    <p class="mt-1 text-sm text-slate-500">Isi tujuan & data penerima, tarif otomatis terhitung di samping.</p>

    @if ($errors->any())
        <div class="mt-4 rounded-xl bg-rose-50 px-4 py-3 text-sm text-rose-700">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('customer.kirim.store') }}" x-data="kirimPaketForm()" class="mt-6 grid gap-6 lg:grid-cols-3">
        @csrf

        <!-- KIRI: FORM -->
        <div class="space-y-6 lg:col-span-2">
            <div class="rounded-2xl border border-slate-100 bg-white p-6">
                <h2 class="font-bold text-slate-800">Rute Pengiriman</h2>
                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-xs font-semibold text-slate-500">Cabang Asal</label>
                        <select name="origin_branch_id" x-model="originBranchId" @change="recalculate()" required
                                class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                            <option value="">Pilih cabang asal...</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" data-city="{{ $branch->city }}">{{ $branch->name }} ({{ $branch->city }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-500">Cabang Tujuan</label>
                        <select name="destination_branch_id" x-model="destinationBranchId" @change="recalculate()" required
                                class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                            <option value="">Pilih cabang tujuan...</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" data-city="{{ $branch->city }}">{{ $branch->name }} ({{ $branch->city }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p x-show="routeError" x-cloak class="mt-3 text-sm font-medium text-rose-600" x-text="routeError"></p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-6">
                <h2 class="font-bold text-slate-800">Data Penerima</h2>
                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-xs font-semibold text-slate-500">Nama Penerima</label>
                        <input type="text" name="receiver_name" required class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-500">Email Penerima</label>
                        <input type="email" name="receiver_email" required class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                        <p class="mt-1 text-xs text-slate-400">Kalau belum pernah kirim/terima paket di sini, akan otomatis terdaftar.</p>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-500">No. HP Penerima</label>
                        <input type="text" name="receiver_phone" required class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-500">Kota Penerima</label>
                        <input type="text" name="receiver_city" x-model="receiverCity" required class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-xs font-semibold text-slate-500">Alamat Lengkap Penerima</label>
                        <textarea name="receiver_address" required rows="2" class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none"></textarea>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-bold text-slate-800">Barang yang Dikirim</h2>
                    <button type="button" @click="addItem()" class="text-sm font-semibold text-brand-600">+ Tambah Barang</button>
                </div>

                <template x-for="(item, index) in items" :key="index">
                    <div class="mt-4 grid grid-cols-12 gap-3 border-t border-slate-100 pt-4 first:border-0 first:pt-0">
                        <input type="text" :name="`items[${index}][item_name]`" x-model="item.item_name" placeholder="Nama barang" required
                               class="col-span-6 rounded-xl border border-slate-200 px-3 py-2 text-sm focus:border-brand-500 focus:outline-none">
                        <input type="number" :name="`items[${index}][quantity]`" x-model.number="item.quantity" placeholder="Qty" min="1" required
                               @input="recalculate()"
                               class="col-span-2 rounded-xl border border-slate-200 px-3 py-2 text-sm focus:border-brand-500 focus:outline-none">
                        <input type="number" step="0.1" :name="`items[${index}][weight]`" x-model.number="item.weight" placeholder="Berat (kg)" required
                               @input="recalculate()"
                               class="col-span-3 rounded-xl border border-slate-200 px-3 py-2 text-sm focus:border-brand-500 focus:outline-none">
                        <button type="button" @click="removeItem(index)" class="col-span-1 text-rose-500">✕</button>
                    </div>
                </template>
            </div>
        </div>

        <!-- KANAN: RINGKASAN & BAYAR -->
        <div class="space-y-6">
            <div class="sticky top-6 rounded-2xl border border-slate-100 bg-white p-6">
                <h2 class="font-bold text-slate-800">Ringkasan & Pembayaran</h2>

                <div class="mt-4 space-y-2 border-b border-slate-100 pb-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-slate-500">Total Berat</span>
                        <span class="font-medium text-slate-700" x-text="`${totalWeight.toFixed(1)} kg`"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Estimasi Tiba</span>
                        <span class="font-medium text-slate-700" x-text="estimatedDays ? `${estimatedDays} hari` : '-'"></span>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span class="font-bold text-slate-800">Total Bayar</span>
                    <span class="text-xl font-extrabold text-transit-600" x-text="formatRupiah(totalPrice)"></span>
                </div>

                <div class="mt-6">
                    <label class="text-xs font-semibold text-slate-500">Metode Pembayaran</label>
                    <div class="mt-2 grid grid-cols-3 gap-2">
                        <label class="cursor-pointer rounded-xl border border-slate-200 p-3 text-center text-sm has-[:checked]:border-brand-500 has-[:checked]:bg-brand-50">
                            <input type="radio" name="payment_method" value="cash" class="sr-only" checked> Cash
                        </label>
                        <label class="cursor-pointer rounded-xl border border-slate-200 p-3 text-center text-sm has-[:checked]:border-brand-500 has-[:checked]:bg-brand-50">
                            <input type="radio" name="payment_method" value="transfer" class="sr-only"> Transfer
                        </label>
                        <label class="cursor-pointer rounded-xl border border-slate-200 p-3 text-center text-sm has-[:checked]:border-brand-500 has-[:checked]:bg-brand-50">
                            <input type="radio" name="payment_method" value="e-wallet" class="sr-only"> E-Wallet
                        </label>
                    </div>
                </div>

                <button type="submit" :disabled="!canSubmit" :class="canSubmit ? 'opacity-100' : 'opacity-50 cursor-not-allowed'"
                        class="mt-6 w-full rounded-xl bg-brand-gradient px-6 py-3 text-sm font-semibold text-white hover:opacity-90">
                    Kirim & Bayar Sekarang
                </button>
                <p class="mt-2 text-center text-xs text-slate-400">Transfer/E-Wallet lanjut ke Midtrans setelah ini.</p>
            </div>
        </div>
    </form>

    @push('scripts')
    <script>
        function kirimPaketForm() {
            return {
                originBranchId: '', destinationBranchId: '', receiverCity: '',
                items: [{ item_name: '', quantity: 1, weight: '' }],
                totalPrice: 0, estimatedDays: null, routeError: '',

                get totalWeight() {
                    return this.items.reduce((sum, i) => sum + (parseFloat(i.weight) || 0), 0);
                },
                get canSubmit() {
                    return this.originBranchId && this.destinationBranchId && this.totalPrice > 0;
                },

                addItem() { this.items.push({ item_name: '', quantity: 1, weight: '' }); this.recalculate(); },
                removeItem(i) { this.items.splice(i, 1); this.recalculate(); },

                async recalculate() {
                    this.routeError = '';
                    if (!this.originBranchId || !this.destinationBranchId || this.totalWeight <= 0) {
                        this.totalPrice = 0;
                        return;
                    }

                    const originSelect = document.querySelector('select[name="origin_branch_id"]');
                    const destSelect = document.querySelector('select[name="destination_branch_id"]');
                    const originCity = originSelect.selectedOptions[0]?.dataset.city;
                    const destCity = destSelect.selectedOptions[0]?.dataset.city;

                    if (!this.receiverCity) this.receiverCity = destCity ?? '';

                    try {
                        const res = await fetch('/api/v1/rates/calculate', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
                            body: JSON.stringify({ origin_city: originCity, destination_city: destCity, weight_kg: this.totalWeight }),
                        });

                        if (!res.ok) {
                            this.totalPrice = 0;
                            this.routeError = 'Rute ini belum tersedia tarifnya. Pilih kombinasi cabang lain.';
                            return;
                        }

                        const { data } = await res.json();
                        this.totalPrice = data.price;
                        this.estimatedDays = data.estimated_days;
                    } catch {
                        this.totalPrice = 0;
                    }
                },

                formatRupiah(value) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(value || 0);
                },
            };
        }
    </script>
    @endpush
</x-customer-layout>
