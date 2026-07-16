<x-auth-layout title="Masuk">
    <h1 class="text-2xl font-extrabold text-slate-800">Masuk</h1>
    <p class="mt-1.5 text-sm text-slate-500">Masuk sebagai customer untuk kirim & lacak paket.</p>

    @if ($errors->any())
        <div class="mt-6 rounded-xl border border-rose-100 bg-rose-50 px-4 py-3.5 text-sm font-medium text-rose-700">
            <span class="flex items-center gap-2">
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                {{ $errors->first() }}
            </span>
        </div>
    @endif

    <form method="POST" action="{{ route('customer.login') }}" class="mt-8 space-y-5">
        @csrf
        <input type="hidden" name="recaptcha_token">
        <div>
            <label class="text-xs font-semibold text-slate-500">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">Kata Sandi</label>
            <input type="password" name="password" required
                   class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>

        <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-600">
            <input type="checkbox" name="remember" class="rounded border-slate-300 text-brand-600 focus:ring-brand-200">
            Ingat saya
        </label>

        <button type="submit"
                class="btn-slide w-full rounded-xl bg-brand-gradient px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/20 transition hover:opacity-90">
            Masuk
        </button>
    </form>

    <div class="mt-8 border-t border-slate-100 pt-6 text-center">
        <p class="text-sm text-slate-500">
            Belum punya akun?
            <a href="{{ route('customer.register') }}" class="font-semibold text-brand-600 transition hover:text-brand-700">Daftar di sini</a>
        </p>
    </div>

    <div class="mt-5 rounded-xl border border-slate-100 bg-slate-50/80 px-5 py-4 text-center text-sm text-slate-500">
        <p>Kamu staf internal (Admin/Manager/Kasir/Kurir)?</p>
        <a href="/login" class="font-semibold text-brand-600 transition hover:text-brand-700">Masuk di sini →</a>
    </div>
</x-auth-layout>
