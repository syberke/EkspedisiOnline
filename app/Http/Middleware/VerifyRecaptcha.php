<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class VerifyRecaptcha
{
    /**
<<<<<<< HEAD
     * Validasi Google reCAPTCHA v2.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! config('services.recaptcha.secret_key')) {
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'Konfigurasi reCAPTCHA server belum tersedia. Silakan coba lagi nanti.',
            ]);
        }


        $token = $request->input('g-recaptcha-response');

        if (! $token) {
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'Verifikasi captcha wajib diisi.',
=======
     * Validasi Google reCAPTCHA v3. Skor minimal diambil dari
     * config('services.recaptcha.min_score', default 0.5) — token
     * dikirim frontend dari widget invisible reCAPTCHA v3.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (app()->environment('local', 'testing') || ! config('services.recaptcha.secret')) {
            return $next($request); // skip: lokal, atau key belum diisi di .env
        }

        $token = $request->input('recaptcha_token');

        if (! $token) {
            throw ValidationException::withMessages([
                'recaptcha_token' => 'Verifikasi captcha wajib diisi.',
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            ]);
        }

        try {
<<<<<<< HEAD
            $response = Http::when(app()->environment(['local', 'testing']), fn ($http) => $http->withoutVerifying())
                ->asForm()->timeout(5)->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
=======
            $response = Http::asForm()->timeout(5)->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret'),
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                'response' => $token,
                'remoteip' => $request->ip(),
            ])->json();
        } catch (\Throwable $e) {
            // Google gak bisa diakses (jaringan lambat/diblokir) — jangan
            // sampai user kena hang nunggu, anggap gagal verifikasi dan
            // suruh coba lagi daripada request menggantung lama.
            throw ValidationException::withMessages([
<<<<<<< HEAD
                'g-recaptcha-response' => 'Verifikasi captcha gagal (server captcha tidak dapat dihubungi). Coba lagi.',
            ]);
        }

        if (! ($response['success'] ?? false)) {
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'Verifikasi captcha gagal, silakan coba lagi.',
=======
                'recaptcha_token' => 'Verifikasi captcha gagal (server captcha tidak dapat dihubungi). Coba lagi.',
            ]);
        }

        $minScore = config('services.recaptcha.min_score', 0.5);

        if (! ($response['success'] ?? false) || ($response['score'] ?? 0) < $minScore) {
            throw ValidationException::withMessages([
                'recaptcha_token' => 'Verifikasi captcha gagal, silakan coba lagi.',
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            ]);
        }

        return $next($request);
    }
}
