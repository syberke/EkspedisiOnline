<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Inertia\Inertia;
use Inertia\Response;
=======
use Illuminate\View\View;
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5

class DashboardController extends Controller
{
    /** GET /customer/dashboard — daftar shipment yang dikirim customer ini + status bayar. */
<<<<<<< HEAD
    public function index(Request $request): Response
    {
        $customer = $request->user('customer');

        $paginated = $customer
            ->sentShipments()
            ->with(['receiver:id,name,city', 'originBranch:id,name,city', 'destinationBranch:id,name,city', 'payments'])
            ->latest()
            ->paginate(10);

        $shipments = collect($paginated->items())->map(function ($shipment) {
            $latestPayment = $shipment->payments->last();

            return [
                'id' => $shipment->id,
                'tracking_number' => $shipment->tracking_number,
                'status' => $shipment->status,
                'origin_branch' => $shipment->originBranch,
                'destination_branch' => $shipment->destinationBranch,
                'receiver' => $shipment->receiver,
                'total_price' => $shipment->total_price,
                'is_paid' => $latestPayment?->payment_status === 'paid',
            ];
        })->values();

        return Inertia::render('Customer/Dashboard', [
            'shipments' => $shipments,
        ]);

    }
}

=======
    public function index(Request $request): View
    {
        $customer = $request->user('customer');

        $shipments = $customer
            ->sentShipments()
            ->with(['receiver:id,name,city', 'originBranch:id,name', 'destinationBranch:id,name', 'payments'])
            ->latest()
            ->paginate(10);

        $summary = [
            'total' => $customer->sentShipments()->count(),
            'in_progress' => $customer->sentShipments()->whereNotIn('status', ['delivered', 'cancelled'])->count(),
            'delivered' => $customer->sentShipments()->where('status', 'delivered')->count(),
        ];

        return view('customer.dashboard', compact('shipments', 'summary'));
    }
}
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
