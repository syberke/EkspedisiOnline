<x-auth-layout title="Masuk">
<<<<<<< HEAD
    <h1 class="text-2xl font-extrabold text-slate-800">Masuk</h1>
    <p class="mt-1 text-sm text-slate-500">Satu halaman login untuk semua: Customer, Admin, Manajer, Kasir, dan Kurir.</p>

    @if ($errors->any())
        <div class="mt-5 rounded-xl bg-rose-50 px-4 py-3 text-sm text-rose-700">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
        @csrf
        <div>
            <label class="text-xs font-semibold text-slate-500">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
=======
    <h1 class="text-2xl font-extrabold text-slate-800">Masuk ke Dashboard</h1>
    <p class="mt-1.5 text-sm text-slate-500">Khusus staf drgEkspedisi (Admin, Manajer, Kasir, Kurir).</p>

    @if ($errors->any())
        <div class="mt-6 rounded-xl border border-rose-100 bg-rose-50 px-4 py-3.5 text-sm font-medium text-rose-700">
            <span class="flex items-center gap-2">
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                {{ $errors->first() }}
            </span>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
        @csrf
        <input type="hidden" name="recaptcha_token">
        <div>
            <label class="text-xs font-semibold text-slate-500">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">Kata Sandi</label>
            <input type="password" name="password" required
<<<<<<< HEAD
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>

        <label class="flex items-center gap-2 text-sm text-slate-600">
=======
                   class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>

        <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-600">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            <input type="checkbox" name="remember" class="rounded border-slate-300 text-brand-600 focus:ring-brand-200">
            Ingat saya
        </label>

        <button type="submit"
<<<<<<< HEAD
                class="w-full rounded-xl bg-brand-gradient px-6 py-3 text-sm font-semibold text-white transition hover:opacity-90">
=======
                class="btn-slide w-full rounded-xl bg-brand-gradient px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/20 transition hover:opacity-90">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            Masuk
        </button>
    </form>

<<<<<<< HEAD
    <p class="mt-6 text-center text-sm text-slate-500">
        Belum punya akun customer? <a href="{{ route('customer.register') }}" class="font-semibold text-brand-600">Daftar di sini</a>
    </p>

    @if (app()->environment('local'))
        <div class="mt-6 rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-3 text-xs text-slate-500">
            <p class="font-semibold text-slate-600">Akun demo (dari seeder):</p>
            <p>admin@drgekspedisi.id · manager@drgekspedisi.id</p>
            <p>cashier@drgekspedisi.id · courier@drgekspedisi.id</p>
            <p>Password semua: <span class="font-mono">Password123</span></p>
=======
    <div class="mt-8 border-t border-slate-100 pt-6 text-center">
        <p class="text-sm text-slate-500">
            Kamu customer?
            <a href="{{ route('customer.login') }}" class="font-semibold text-brand-600 transition hover:text-brand-700">Masuk di sini</a>
        </p>
    </div>

    @if (app()->environment('local'))
        <div class="mt-6 rounded-xl border border-dashed border-slate-200 bg-slate-50/80 px-5 py-4 text-xs text-slate-500">
            <p class="mb-2 font-semibold text-slate-600">📍 Akun Demo (dari seeder)</p>
            <div class="space-y-1">
                <p><span class="text-slate-400">Admin:</span> admin@drgekspedisi.id</p>
                <p><span class="text-slate-400">Manager:</span> manager@drgekspedisi.id</p>
                <p><span class="text-slate-400">Cashier:</span> cashier@drgekspedisi.id</p>
                <p><span class="text-slate-400">Courier:</span> courier@drgekspedisi.id</p>
                <p class="pt-1 text-slate-400">Password: <span class="font-mono font-semibold text-slate-600">Password123</span></p>
            </div>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        </div>
    @endif
</x-auth-layout>
