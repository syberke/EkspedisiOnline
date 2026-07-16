<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const page = usePage();
const customer = computed(() => page.props.auth?.customer ?? null);

const menuOpen = ref(false);
<<<<<<< HEAD
const nav = [
    { label: 'Beranda', href: '/', inertia: true },
    { label: 'Kirim Paket', href: '/customer/kirim', inertia: false },
    { label: 'Lacak Paket', href: '/lacak', inertia: true },
    { label: 'Tentang Kami', href: '/tentang', inertia: true },
];
</script>

<template>
    <div class="min-h-screen bg-white text-slate-800 font-sans antialiased">
        <header class="sticky top-0 z-50 border-b border-slate-100 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-4">
                <Link href="/" class="flex items-center gap-2">
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-brand-gradient text-white font-bold">D</span>
                    <span class="text-lg font-extrabold tracking-tight">
                        drg<span class="bg-brand-gradient bg-clip-text text-transparent">Ekspedisi</span>
                    </span>
                </Link>

                <nav class="hidden gap-8 md:flex">
                    <template v-for="item in nav" :key="item.label">
                        <Link v-if="item.inertia" :href="item.href"
                              class="text-sm font-medium text-slate-600 transition hover:text-brand-600">
                            {{ item.label }}
                        </Link>
                        <a v-else :href="item.href"
                           class="text-sm font-medium text-slate-600 transition hover:text-brand-600">
                            {{ item.label }}
                        </a>
                    </template>
                </nav>

                <div class="hidden items-center gap-3 md:flex">
                    <template v-if="customer">
                        <span class="text-sm text-slate-500">Hai, {{ customer.name.split(' ')[0] }}</span>
                        <a href="/customer/dashboard"
                           class="rounded-full bg-brand-gradient px-5 py-2.5 text-sm font-semibold text-white shadow-sm shadow-brand-500/30 transition hover:opacity-90">
                            Dashboard Saya
                        </a>
                        <Link href="/customer/logout" method="post" as="button"
                           class="rounded-full border border-rose-200 bg-rose-50 px-5 py-2.5 text-sm font-semibold text-rose-600 shadow-sm transition hover:bg-rose-100">
                            Keluar
                        </Link>
                    </template>
                    <template v-else>
                        <a href="/login" class="text-sm font-semibold text-slate-600 hover:text-brand-600">Masuk</a>
                        <a href="/customer/register"
                           class="rounded-full bg-brand-gradient px-5 py-2.5 text-sm font-semibold text-white shadow-sm shadow-brand-500/30 transition hover:opacity-90">
                            Daftar
=======
</script>

<template>
    <div class="min-h-screen bg-[#0a0f1e] text-slate-200 font-sans antialiased">
        <!-- ✦ NAVIGATION BAR -->
        <header class="sticky top-0 z-50 border-b border-white/5 bg-[#0a0f1e]/95 backdrop-blur-xl">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4">
                <!-- Logo -->
                <Link href="/" class="flex items-center gap-2.5 group">
                    <span class="relative grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-emerald-400 via-emerald-500 to-cyan-500 text-white text-sm font-bold shadow-lg shadow-emerald-500/20 group-hover:shadow-emerald-500/40 transition-all duration-300">
                        <span class="text-lg font-black tracking-tight">D</span>
                        <span class="absolute inset-0 rounded-xl bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                    </span>
                    <span class="text-lg font-extrabold tracking-tight text-white">
                        drg<span class="bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">Ekspedisi</span>
                    </span>
                </Link>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-1">
                    <Link href="/" class="px-4 py-2 text-sm font-medium text-slate-400 hover:text-white transition-colors rounded-lg hover:bg-white/5">Beranda</Link>
                    <a href="/customer/kirim" data-no-inertia class="px-4 py-2 text-sm font-medium text-slate-400 hover:text-white transition-colors rounded-lg hover:bg-white/5">Kirim Paket</a>
                    <Link href="/lacak" class="px-4 py-2 text-sm font-medium text-slate-400 hover:text-white transition-colors rounded-lg hover:bg-white/5">Lacak Paket</Link>
                    <Link href="/tentang" class="px-4 py-2 text-sm font-medium text-slate-400 hover:text-white transition-colors rounded-lg hover:bg-white/5">Tentang</Link>
                </nav>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center gap-3">
                    <template v-if="customer">
                        <span class="text-sm text-slate-400">Hai, {{ customer.name.split(' ')[0] }}</span>
                        <a href="/customer/dashboard" data-no-inertia
                           class="relative inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/40 transition-all duration-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Dashboard Saya
                        </a>
                    </template>
                    <template v-else>
                        <a href="/customer/login" data-no-inertia
                           class="text-sm font-medium text-slate-400 hover:text-white transition-colors px-3 py-2">Masuk</a>
                        <a href="/customer/register" data-no-inertia
                           class="relative inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/40 transition-all duration-300 group overflow-hidden">
                            <span class="relative z-10">Daftar</span>
                            <span class="absolute inset-0 bg-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300"></span>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                        </a>
                    </template>
                </div>

<<<<<<< HEAD
                <button class="md:hidden" @click="menuOpen = !menuOpen" aria-label="Buka menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
=======
                <!-- Mobile menu button -->
                <button class="md:hidden rounded-lg p-2 text-slate-400 hover:text-white hover:bg-white/5 transition" @click="menuOpen = !menuOpen" aria-label="Menu">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

<<<<<<< HEAD
            <div v-if="menuOpen" class="border-t border-slate-100 px-5 py-4 md:hidden">
                <template v-for="item in nav" :key="item.label">
                    <Link v-if="item.inertia" :href="item.href" class="block py-2 text-sm font-medium text-slate-600">{{ item.label }}</Link>
                    <a v-else :href="item.href" class="block py-2 text-sm font-medium text-slate-600">{{ item.label }}</a>
                </template>
                <a v-if="customer" href="/customer/dashboard"
                   class="mt-2 block rounded-full bg-brand-gradient px-5 py-2.5 text-center text-sm font-semibold text-white">
                    Dashboard Saya
                </a>
                <Link v-if="customer" href="/customer/logout" method="post" as="button"
                   class="mt-2 w-full block rounded-full border border-rose-200 bg-rose-50 px-5 py-2.5 text-center text-sm font-semibold text-rose-600 hover:bg-rose-100">
                    Keluar
                </Link>
                <a v-else href="/login" class="mt-2 block rounded-full bg-brand-gradient px-5 py-2.5 text-center text-sm font-semibold text-white">
                    Masuk
                </a>
            </div>
        </header>

        <div v-if="page.props.flash?.success" class="bg-brand-50 px-5 py-3 text-center text-sm font-medium text-brand-700">
            {{ page.props.flash.success }}
        </div>
        <div v-if="page.props.flash?.error" class="bg-rose-50 px-5 py-3 text-center text-sm font-medium text-rose-700">
=======
            <!-- Mobile menu -->
            <div v-if="menuOpen" class="border-t border-white/5 px-5 py-4 md:hidden">
                <div class="space-y-1">
                    <Link href="/" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 hover:text-white hover:bg-white/5 transition">Beranda</Link>
                    <a href="/customer/kirim" data-no-inertia class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 hover:text-white hover:bg-white/5 transition">Kirim Paket</a>
                    <Link href="/lacak" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 hover:text-white hover:bg-white/5 transition">Lacak Paket</Link>
                    <Link href="/tentang" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 hover:text-white hover:bg-white/5 transition">Tentang</Link>
                </div>
                <div class="mt-4 pt-4 border-t border-white/5 space-y-2">
                    <template v-if="customer">
                        <a href="/customer/dashboard" data-no-inertia class="block w-full rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-500 px-4 py-2.5 text-center text-sm font-semibold text-white">Dashboard Saya</a>
                    </template>
                    <template v-else>
                        <a href="/customer/login" data-no-inertia class="block w-full rounded-xl border border-white/10 px-4 py-2.5 text-center text-sm font-semibold text-slate-200 hover:bg-white/5 transition">Masuk</a>
                        <a href="/customer/register" data-no-inertia class="block w-full rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-500 px-4 py-2.5 text-center text-sm font-semibold text-white">Daftar</a>
                    </template>
                </div>
            </div>
        </header>

        <!-- Flash Messages -->
        <div v-if="page.props.flash?.success" class="bg-emerald-500/10 border-b border-emerald-500/20 px-5 py-3 text-center text-sm font-medium text-emerald-300">
            {{ page.props.flash.success }}
        </div>
        <div v-if="page.props.flash?.error" class="bg-red-500/10 border-b border-red-500/20 px-5 py-3 text-center text-sm font-medium text-red-300">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            {{ page.props.flash.error }}
        </div>

        <main>
            <slot />
        </main>

<<<<<<< HEAD
        <footer class="mt-24 border-t border-slate-100 bg-slate-50">
            <div class="mx-auto grid max-w-6xl gap-10 px-5 py-14 md:grid-cols-4">
                <div>
                    <span class="text-lg font-extrabold">
                        drg<span class="bg-brand-gradient bg-clip-text text-transparent">Ekspedisi</span>
                    </span>
                    <p class="mt-3 text-sm text-slate-500">Platform pengiriman barang terpadu & terintegrasi, dari gerbang cabang hingga pintu penerima.</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-slate-700">Layanan</h4>
                    <ul class="mt-3 space-y-2 text-sm text-slate-500">
                        <li><a href="/customer/kirim" class="hover:text-brand-600">Kirim Paket</a></li>
                        <li><a href="/lacak" class="hover:text-brand-600">Lacak Paket</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-slate-700">Perusahaan</h4>
                    <ul class="mt-3 space-y-2 text-sm text-slate-500">
                        <li><a href="/tentang" class="hover:text-brand-600">Tentang Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-slate-700">Hubungi Kami</h4>
                    <p class="mt-3 text-sm text-slate-500">cs@drgekspedisi.id</p>
                    <p class="text-sm text-slate-500">0800-1-DRGEKS</p>
                </div>
            </div>
            <div class="border-t border-slate-100 py-5 text-center text-xs text-slate-400">
                © {{ new Date().getFullYear() }} drgEkspedisi. Seluruh hak cipta dilindungi.
=======
        <!-- ✦ FOOTER -->
        <footer class="border-t border-white/5 bg-[#070b15]">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 py-16 md:grid-cols-4">
                <div>
                    <span class="text-lg font-extrabold text-white">
                        drg<span class="bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">Ekspedisi</span>
                    </span>
                    <p class="mt-3 text-sm text-slate-500 leading-relaxed">Platform pengiriman barang terpadu & terintegrasi, dari gerbang cabang hingga pintu penerima.</p>
                    <div class="mt-4 flex gap-3">
                        <span class="grid h-8 w-8 place-items-center rounded-lg bg-white/5 text-slate-400 hover:bg-emerald-500/20 hover:text-emerald-400 transition cursor-pointer">🐦</span>
                        <span class="grid h-8 w-8 place-items-center rounded-lg bg-white/5 text-slate-400 hover:bg-emerald-500/20 hover:text-emerald-400 transition cursor-pointer">📷</span>
                        <span class="grid h-8 w-8 place-items-center rounded-lg bg-white/5 text-slate-400 hover:bg-emerald-500/20 hover:text-emerald-400 transition cursor-pointer">💼</span>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white">Layanan</h4>
                    <ul class="mt-4 space-y-3 text-sm text-slate-500">
                        <li><a href="/customer/kirim" data-no-inertia class="hover:text-emerald-400 transition">Kirim Paket</a></li>
                        <li><Link href="/lacak" class="hover:text-emerald-400 transition">Lacak Paket</Link></li>
                        <li><a href="/customer/login" data-no-inertia class="hover:text-emerald-400 transition">Cek Tarif</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white">Perusahaan</h4>
                    <ul class="mt-4 space-y-3 text-sm text-slate-500">
                        <li><Link href="/tentang" class="hover:text-emerald-400 transition">Tentang Kami</Link></li>
                        <li><a href="/tentang" class="hover:text-emerald-400 transition">Cabang Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white">Hubungi Kami</h4>
                    <div class="mt-4 space-y-3 text-sm text-slate-500">
                        <p class="flex items-center gap-2"><span class="text-emerald-400">✉</span> cs@drgekspedisi.id</p>
                        <p class="flex items-center gap-2"><span class="text-emerald-400">📞</span> 0800-1-DRGEKS</p>
                        <p class="flex items-center gap-2"><span class="text-emerald-400">📍</span> Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-white/5 py-6 text-center text-xs text-slate-600">
                <p>© {{ new Date().getFullYear() }} drgEkspedisi. Seluruh hak cipta dilindungi.</p>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            </div>
        </footer>
    </div>
</template>
