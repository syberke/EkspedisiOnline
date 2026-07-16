<?php

use App\Http\Controllers\Api\Admin\CourierController;
use App\Http\Controllers\Api\Admin\CustomerController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Admin\RateController;
use App\Http\Controllers\Api\Admin\ReportController;
use App\Http\Controllers\Api\Admin\ShipmentController;
use App\Http\Controllers\Api\Admin\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Modul: Core Shipment (Admin/Manager/Cashier/Courier) — API Sanctum
|--------------------------------------------------------------------------
| Dipakai untuk integrasi mobile/pihak ketiga. Dashboard web staf pakai
| session (routes/web.php), bukan endpoint ini.
<<<<<<< HEAD
|
| Pemisahan tugas: Admin & Kasir = operasional (shipment, assign kurir).
| Admin saja = master data (tarif, kendaraan). Manager = view + export
| laporan saja, TIDAK punya akses CRUD operasional/master data.
=======
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
*/
Route::prefix('v1/admin')
    ->middleware(['auth:sanctum'])
    ->group(function () {

<<<<<<< HEAD
        Route::middleware('role:admin,cashier')->group(function () {
            Route::apiResource('shipments', ShipmentController::class)->except(['update']);
            Route::patch('shipments/{shipment}/status', [ShipmentController::class, 'updateStatus']);
            Route::patch('shipments/{shipment}/assign-courier', [ShipmentController::class, 'assignCourier']);

            Route::get('customers', [CustomerController::class, 'index']);
            Route::post('customers', [CustomerController::class, 'store']);
            Route::get('couriers', [CourierController::class, 'index']);
        });

        Route::middleware('role:admin')->group(function () {
            Route::apiResource('rates', RateController::class)->except(['show']);
            Route::apiResource('vehicles', VehicleController::class)->except(['show']);
        });

        Route::middleware('role:admin,manager')->group(function () {
=======
        Route::apiResource('shipments', ShipmentController::class)->except(['update']);
        Route::patch('shipments/{shipment}/status', [ShipmentController::class, 'updateStatus']);
        Route::patch('shipments/{shipment}/assign-courier', [ShipmentController::class, 'assignCourier'])
            ->middleware('role:admin,manager,cashier');

        Route::get('customers', [CustomerController::class, 'index']);
        Route::post('customers', [CustomerController::class, 'store'])
            ->middleware('role:admin,manager,cashier');

        Route::get('couriers', [CourierController::class, 'index'])
            ->middleware('role:admin,manager,cashier');

        Route::middleware('role:admin,manager')->group(function () {
            Route::apiResource('rates', RateController::class)->except(['show']);
            Route::apiResource('vehicles', VehicleController::class)->except(['show']);

>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            Route::get('dashboard', [DashboardController::class, 'summary']);

            Route::get('reports/operational', [ReportController::class, 'operational']);
            Route::get('reports/financial', [ReportController::class, 'financial']);
            Route::get('reports/export', [ReportController::class, 'export']);
        });
    });
