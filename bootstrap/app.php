<?php

<<<<<<< HEAD
use App\Http\Middleware\EnsureCustomerEmailIsVerified;
=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\VerifyRecaptcha;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function () {
            // Modul API tambahan (auth, admin/CRUD, payment) didaftarkan
            // di sini dengan prefix `api` + middleware group `api`,
            // terpisah dari routes/api.php (modul publik) supaya tiap
            // file route tetap ringkas per modul.
            foreach (['auth', 'admin', 'payment'] as $module) {
                Route::middleware('api')
                    ->prefix('api')
                    ->group(base_path("routes/{$module}.php"));
            }
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'recaptcha' => VerifyRecaptcha::class,
            'role' => EnsureUserHasRole::class,
<<<<<<< HEAD
            'verified.customer' => EnsureCustomerEmailIsVerified::class,
=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        ]);

        // Wajib untuk semua halaman Vue/Inertia (Home, Track, About) —
        // tanpa ini, request Inertia gagal karena tidak ada yang set
        // root view & shared props (lihat App\Http\Middleware\HandleInertiaRequests).
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);

<<<<<<< HEAD
        // Login sudah terpadu (satu halaman /login untuk semua guard), jadi
        // guest yang kena redirect dari guard manapun (`web` atau `customer`)
        // cukup diarahkan ke satu tempat yang sama.
        $middleware->redirectGuestsTo(fn () => route('login'));
=======
        // Default Laravel selalu redirect guest yang belum login ke
        // route('login') (staff), padahal /customer/*, /shipments/*/payment
        // itu punya guard `customer` sendiri. Tanpa ini, orang yang belum
        // login dan buka /customer/kirim bakal nyasar ke halaman login staf.
        $middleware->redirectGuestsTo(function ($request) {
            return $request->is('customer/*') || $request->is('shipments/*/payment')
                ? route('customer.login')
                : route('login');
        });
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
