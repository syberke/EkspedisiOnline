<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Masuk' }} — drgEkspedisi</title>
<<<<<<< HEAD
=======
    <meta name="theme-color" content="#18b378">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
</head>
<body class="font-sans antialiased">
    <div class="grid min-h-screen lg:grid-cols-2">
<<<<<<< HEAD
        <div class="relative hidden flex-col justify-between overflow-hidden bg-brand-gradient p-12 text-white lg:flex">
            <!-- pola titik rute dekoratif -->
=======
        <!-- Brand Side -->
        <div class="relative hidden flex-col justify-between overflow-hidden bg-brand-gradient p-12 text-white lg:flex">
            <!-- Decorative pattern -->
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            <svg class="pointer-events-none absolute inset-0 h-full w-full opacity-20" viewBox="0 0 500 800" preserveAspectRatio="none">
                <path d="M-20,650 C120,700 150,500 280,480 S420,300 520,200"
                      fill="none" stroke="white" stroke-width="2" stroke-dasharray="6 10" />
                <circle cx="-20" cy="650" r="6" fill="white" />
                <circle cx="280" cy="480" r="6" fill="white" />
                <circle cx="520" cy="200" r="6" fill="white" />
<<<<<<< HEAD
            </svg>

            <div class="relative flex items-center justify-between">
                <a href="/" class="flex items-center gap-2">
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-white/20 font-bold">D</span>
                    <span class="text-lg font-extrabold">drgEkspedisi</span>
                </a>
                
                @if(auth('customer')->check())
                <form method="POST" action="{{ route('customer.logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="text-sm font-semibold text-white/80 hover:text-white transition">
                        Keluar
                    </button>
                </form>
                @endif
            </div>

            <div class="relative">
                <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs font-semibold">
                    📦 5 cabang · pengiriman terlacak
                </span>
                <h2 class="mt-4 text-3xl font-extrabold leading-tight">Kelola pengiriman<br>dari satu dashboard.</h2>
                <p class="mt-3 max-w-sm text-white/80">Pantau shipment, kurir, pembayaran, dan laporan operasional secara realtime.</p>
            </div>

            <p class="relative text-sm text-white/60">© {{ date('Y') }} drgEkspedisi</p>
        </div>

        <div class="flex flex-col items-center justify-center px-6 py-12">
            @if(auth('customer')->check())
                <div class="w-full max-w-sm flex justify-end mb-4 lg:hidden">
                    <form method="POST" action="{{ route('customer.logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-sm font-semibold text-rose-600 hover:text-rose-700 transition">
                            Keluar
                        </button>
                    </form>
                </div>
            @endif
            <div class="w-full max-w-sm">
=======
                <path d="M520,800 C400,750 380,600 300,500 S180,400 80,300"
                      fill="none" stroke="white" stroke-width="1.5" stroke-dasharray="4 8" opacity="0.6"/>
            </svg>

            <a href="/" class="relative flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-white/20 font-bold text-lg">D</span>
                <span class="text-xl font-extrabold tracking-tight">drgEkspedisi</span>
            </a>

            <div class="relative">
                <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-1.5 text-xs font-semibold backdrop-blur-sm">
                    📦 Jaringan luas · pengiriman terlacak
                </span>
                <h2 class="mt-5 text-4xl font-extrabold leading-tight">Kelola pengiriman<br>dari satu dashboard.</h2>
                <p class="mt-4 max-w-sm text-base leading-relaxed text-white/80">Pantau shipment, kurir, pembayaran, dan laporan operasional secara realtime dari mana saja.</p>

                <!-- Feature list -->
                <ul class="mt-8 space-y-3">
                    <li class="flex items-center gap-3 text-sm text-white/80">
                        <svg class="h-5 w-5 shrink-0 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Tracking realtime tiap perpindahan status
                    </li>
                    <li class="flex items-center gap-3 text-sm text-white/80">
                        <svg class="h-5 w-5 shrink-0 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Pembayaran aman via Midtrans
                    </li>
                    <li class="flex items-center gap-3 text-sm text-white/80">
                        <svg class="h-5 w-5 shrink-0 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Laporan operasional & keuangan otomatis
                    </li>
                </ul>
            </div>

            <p class="relative text-sm text-white/50">© {{ date('Y') }} drgEkspedisi. Seluruh hak cipta dilindungi.</p>
        </div>

        <!-- Form Side -->
        <div class="flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-sm animate-fade-in-up">
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                {{ $slot }}
            </div>
        </div>
    </div>

<<<<<<< HEAD
    @stack('scripts')
</body>
</html>

=======
    @if (config('services.recaptcha.site_key'))
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
        <script>
            document.querySelectorAll('form').forEach((form) => {
                const tokenInput = form.querySelector('input[name="recaptcha_token"]');
                if (!tokenInput) return;

                form.addEventListener('submit', function (e) {
                    if (tokenInput.dataset.filled === 'true') return;
                    e.preventDefault();

                    grecaptcha.ready(() => {
                        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'submit' }).then((token) => {
                            tokenInput.value = token;
                            tokenInput.dataset.filled = 'true';
                            form.submit();
                        });
                    });
                });
            });
        </script>
    @endif
</body>
</html>
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
