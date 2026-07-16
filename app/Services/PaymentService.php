<?php

namespace App\Services;

<<<<<<< HEAD
use App\Enums\ShipmentStatus;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\ShipmentTracking;
=======
use App\Models\Payment;
use App\Models\Shipment;
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
use App\Services\Payment\MidtransGateway;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentService
{
    public function __construct(
        private MidtransGateway $midtrans,
        private ShipmentService $shipmentService,
    ) {
    }

    /**
     * Catat pembayaran untuk shipment. `cash` = bayar langsung ke kasir
     * (manual, nunggu konfirmasi). `transfer`/`e-wallet` = di-charge ke
     * Midtrans Snap, customer diarahkan ke halaman pembayaran Midtrans.
     */
    public function record(Shipment $shipment, string $method): Payment
    {
        $payment = DB::transaction(function () use ($shipment, $method) {
            return Payment::create([
                'shipment_id' => $shipment->id,
                'amount' => $shipment->total_price,
                'payment_method' => $method,
                'payment_status' => 'pending',
                'midtrans_order_id' => in_array($method, ['transfer', 'e-wallet'], true)
                    ? 'PAY-'.now()->format('Ymd').'-'.Str::upper(Str::random(6))
                    : null,
            ]);
        });

        if ($payment->usesMidtrans()) {
            try {
                $result = $this->midtrans->charge($payment);

                $payment->update([
                    'midtrans_snap_token' => $result['token'] ?? null,
                    'midtrans_raw_response' => $result,
                ]);
            } catch (\Throwable $e) {
<<<<<<< HEAD
=======
                // Kalau Midtrans gagal (key belum diisi/salah, atau server
                // Midtrans lagi down), jangan sampai seluruh request crash
                // (500). Payment tetap tersimpan dengan status `failed` +
                // alasan di log, biar kasir bisa follow-up manual, dan
                // customer dapat pesan yang jelas alih-alih halaman error.
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
                report($e);

                $payment->update([
                    'payment_status' => 'failed',
                    'midtrans_raw_response' => ['error' => $e->getMessage()],
                ]);
<<<<<<< HEAD

                // Auto-update shipment status when payment fails at creation
                $this->updateShipmentStatusOnPaymentFailure($shipment);
=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            }
        }

        return $payment->fresh();
    }

    /**
     * Kasir konfirmasi pembayaran cash sudah diterima ("rekap uang").
     * Begitu lunas, otomatis lanjut ke tahap berikutnya: paket ditugaskan
<<<<<<< HEAD
     * ke kurir aktif berikutnya secara bergantian.
=======
     * ke kurir aktif berikutnya secara bergantian (lihat
     * ShipmentService::processAtCounter()) — kasir gak perlu assign manual.
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
     */
    public function markAsPaid(Payment $payment): Payment
    {
        $payment->update(['payment_status' => 'paid', 'payment_date' => now()]);

<<<<<<< HEAD
        $this->voidOtherPendingPayments($payment);
=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        $this->shipmentService->processAtCounter($payment->shipment);

        return $payment;
    }

    public function markAsFailed(Payment $payment): Payment
    {
        $payment->update(['payment_status' => 'failed']);

<<<<<<< HEAD
        $this->updateShipmentStatusOnPaymentFailure($payment->shipment);

        return $payment;
    }

    public function markAsExpired(Payment $payment): Payment
    {
        $payment->update(['payment_status' => 'expired']);

        $this->updateShipmentStatusOnPaymentFailure($payment->shipment);

=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        return $payment;
    }

    /** Dipanggil dari webhook controller setelah signature Midtrans diverifikasi. */
    public function handleMidtransNotification(array $payload): Payment
    {
        $payment = Payment::where('midtrans_order_id', $payload['order_id'])->firstOrFail();

<<<<<<< HEAD
        return $this->applyMidtransStatus($payment, $payload);
    }

    /**
     * Cek aktif status transaksi ke Midtrans Core API dan sinkronkan.
     * Dipanggil dari endpoint yang di-hit frontend tepat setelah Snap.js
     * melapor onSuccess/onPending — jangan cuma andalkan webhook pasif,
     * karena webhook bisa tidak pernah sampai di lingkungan dev/local.
     */
    public function syncStatus(Payment $payment): Payment
    {
        if (! $payment->usesMidtrans() || ! $payment->midtrans_order_id) {
            return $payment;
        }

        // Sudah lunas, gak perlu tanya lagi ke Midtrans.
        if ($payment->payment_status === 'paid') {
            return $payment;
        }

        $result = $this->midtrans->checkStatus($payment->midtrans_order_id);

        if (empty($result['transaction_status'])) {
            return $payment->fresh();
        }

        return $this->applyMidtransStatus($payment, $result);
    }

    /** Logika bersama: terapkan payload status Midtrans (dari webhook maupun status-check aktif) ke Payment + shipment terkait. */
    private function applyMidtransStatus(Payment $payment, array $payload): Payment
    {
=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
        $status = $this->midtrans->mapStatus($payload['transaction_status']);

        $payment->update([
            'payment_status' => $status,
            'payment_date' => $status === 'paid' ? now() : $payment->payment_date,
            'midtrans_transaction_id' => $payload['transaction_id'] ?? $payment->midtrans_transaction_id,
            'midtrans_transaction_status' => $payload['transaction_status'],
            'midtrans_raw_response' => $payload,
        ]);

        if ($status === 'paid') {
<<<<<<< HEAD
            $this->voidOtherPendingPayments($payment);
            $this->shipmentService->processAtCounter($payment->shipment);
        } elseif (in_array($status, ['failed', 'expired'], true)) {
            $this->updateShipmentStatusOnPaymentFailure($payment->shipment);
        }

        return $payment->fresh();
    }

    /**
     * Update shipment status when payment fails or expires.
     * This ensures shipment statuses are synchronized with payment statuses.
     */
    private function updateShipmentStatusOnPaymentFailure(Shipment $shipment): void
    {
        // Only update if shipment is still in pending status
        if ($shipment->status === ShipmentStatus::Pending) {
            ShipmentTracking::create([
                'shipment_id' => $shipment->id,
                'status' => ShipmentStatus::Cancelled->value,
                'location' => $shipment->originBranch->city ?? null,
                'description' => 'Pembayaran gagal atau kadaluarsa. Pengiriman dibatalkan.',
                'tracked_at' => now(),
            ]);
        }
    }

    /**
     * Begitu satu payment untuk shipment lunas (baik cash dikonfirmasi kasir
     * maupun Midtrans notification), batalkan payment attempt lain yang
     * masih `pending`.
     */
    private function voidOtherPendingPayments(Payment $paidPayment): void
    {
        Payment::where('shipment_id', $paidPayment->shipment_id)
            ->where('id', '!=', $paidPayment->id)
            ->where('payment_status', 'pending')
            ->update(['payment_status' => 'failed']);
    }
}
=======
            $this->shipmentService->processAtCounter($payment->shipment);
        }

        return $payment;
    }
}
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
