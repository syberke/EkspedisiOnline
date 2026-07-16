<x-auth-layout title="Daftar">
    <h1 class="text-2xl font-extrabold text-slate-800">Buat Akun Customer</h1>
<<<<<<< HEAD
    <p class="mt-1 text-sm text-slate-500">Daftar untuk mulai kirim & lacak paket.</p>

    @if ($errors->any())
        <div class="mt-5 rounded-xl bg-rose-50 px-4 py-3 text-sm text-rose-700">
            <ul class="list-disc pl-4">
=======
    <p class="mt-1.5 text-sm text-slate-500">Daftar untuk mulai kirim & lacak paket.</p>

    @if ($errors->any())
        <div class="mt-6 rounded-xl border border-rose-100 bg-rose-50 px-5 py-4 text-sm font-medium text-rose-700">
            <ul class="list-disc pl-5 space-y-1">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<<<<<<< HEAD
    <form method="POST" action="{{ route('customer.register') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label class="text-xs font-semibold text-slate-500">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">No. HP</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">Kota</label>
            <input type="text" name="city" value="{{ old('city') }}" required
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">Alamat</label>
            <textarea name="address" required rows="2"
                      class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100">{{ old('address') }}</textarea>
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">Kata Sandi</label>
            <input type="password" name="password" required
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>
        <div>
            <label class="text-xs font-semibold text-slate-500">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" required
                   class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
        </div>

        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>

        <button type="submit"
                class="w-full rounded-xl bg-brand-gradient px-6 py-3 text-sm font-semibold text-white transition hover:opacity-90">
=======
    <form method="POST" action="{{ route('customer.register') }}" class="mt-8 space-y-5">
        @csrf
        <input type="hidden" name="recaptcha_token">

        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <label class="text-xs font-semibold text-slate-500">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            </div>
            <div class="col-span-2">
                <label class="text-xs font-semibold text-slate-500">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            </div>
            <div>
                <label class="text-xs font-semibold text-slate-500">No. HP</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required
                       class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            </div>
            <div>
                <label class="text-xs font-semibold text-slate-500">Kota</label>
                <input type="text" name="city" value="{{ old('city') }}" required
                       class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            </div>
            <div class="col-span-2">
                <label class="text-xs font-semibold text-slate-500">Alamat</label>
                <textarea name="address" required rows="2"
                          class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100">{{ old('address') }}</textarea>
            </div>
            <div>
                <label class="text-xs font-semibold text-slate-500">Kata Sandi</label>
                <input type="password" name="password" required
                       class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            </div>
            <div>
                <label class="text-xs font-semibold text-slate-500">Konfirmasi Sandi</label>
                <input type="password" name="password_confirmation" required
                       class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
            </div>
        </div>

        <button type="submit"
                class="btn-slide w-full rounded-xl bg-brand-gradient px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/20 transition hover:opacity-90">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            Daftar
        </button>
    </form>

<<<<<<< HEAD
    <p class="mt-6 text-center text-sm text-slate-500">
        Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-brand-600">Masuk di sini</a>
    </p>

    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush
=======
    <div class="mt-8 border-t border-slate-100 pt-6 text-center">
        <p class="text-sm text-slate-500">
            Sudah punya akun?
            <a href="{{ route('customer.login') }}" class="font-semibold text-brand-600 transition hover:text-brand-700">Masuk di sini</a>
        </p>
    </div>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
</x-auth-layout>
