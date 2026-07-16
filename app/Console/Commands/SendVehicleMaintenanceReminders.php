<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Illuminate\Console\Command;

class SendVehicleMaintenanceReminders extends Command
{
    protected $signature = 'drg:vehicle-reminders';
    protected $description = 'Kirim reminder STNK/servis kendaraan jatuh tempo';

    public function handle(): int
    {
        $this->info('Vehicle maintenance reminders: not yet implemented.');

        // Placeholder untuk Modul 6 — integrasi dengan jadwal servis & STNK.
        // Begitu tabel vehicle_maintenances ditambahkan, query di sini
        // untuk cari kendaraan yang servis/STNK-nya akan jatuh tempo dalam
        // 7 hari ke depan, lalu kirim notifikasi ke admin cabang terkait.

        return Command::SUCCESS;
    }
}
