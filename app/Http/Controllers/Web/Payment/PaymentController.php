<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Services\PaymentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $paymentService)
    {
    }

    /** GET /shipments/{shipment}/payment — halaman pilih metode bayar (guard customer, email wajib terverifikasi). */
    public function show(Shipment $shipment): View
    {
        abort_unless($shipment->sender_id === auth('customer')->id(), 403);

        $latestPayment = $shipment->payments()->latest()->first();

<<<<<<< HEAD
        // Lapisan pengaman ekstra: kalau masih pending & pakai Midtrans,
        // cek langsung ke Midtrans setiap kali halaman ini dibuka —
        // jangan andalkan webhook/JS callback saja (bisa gagal di dev/local).
        if ($latestPayment && $latestPayment->usesMidtrans() && $latestPayment->payment_status === 'pending') {
            try {
                $latestPayment = $this->paymentService->syncStatus($latestPayment);
            } catch (\Throwable $e) {
                report($e);
            }
        }

=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        return view('payment.show', compact('shipment', 'latestPayment'));
    }

    /** POST /shipments/{shipment}/payment — catat pembayaran, charge Midtrans kalau transfer/e-wallet. */
    public function store(Request $request, Shipment $shipment): RedirectResponse
    {
        abort_unless($shipment->sender_id === auth('customer')->id(), 403);

<<<<<<< HEAD
        if ($shipment->payments()->where('payment_status', 'paid')->exists()) {
            return redirect()->route('payment.show', $shipment)
                ->with('success', 'Shipment ini sudah lunas.');
        }

        $validated = $request->validate([
            'payment_method' => ['required', 'in:transfer,e-wallet'],
=======
        $validated = $request->validate([
            'payment_method' => ['required', 'in:cash,transfer,e-wallet'],
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        ]);

        $payment = $this->paymentService->record($shipment, $validated['payment_method']);

        if ($payment->usesMidtrans()) {
            return redirect()->route('payment.show', $shipment);
        }

        return redirect()->route('payment.show', $shipment)
            ->with('success', 'Pembayaran cash dicatat. Menunggu konfirmasi dari kasir.');
    }
<<<<<<< HEAD

    /** POST /shipments/{shipment}/payment/sync — dipanggil frontend (Snap onSuccess/onPending) buat cek status aktif ke Midtrans, gak nunggu webhook pasif. */
    public function sync(Shipment $shipment): \Illuminate\Http\JsonResponse
    {
        abort_unless($shipment->sender_id === auth('customer')->id(), 403);

        $payment = $shipment->payments()->where('payment_method', '!=', 'cash')->latest()->first();

        if (! $payment) {
            return response()->json(['payment_status' => null]);
        }

        $payment = $this->paymentService->syncStatus($payment);

        return response()->json(['payment_status' => $payment->payment_status]);
    }
=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
}
