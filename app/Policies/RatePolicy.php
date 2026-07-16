<?php

namespace App\Policies;

use App\Models\Rate;
use App\Models\User;

class RatePolicy
{
    public function viewAny(User $user): bool
    {
<<<<<<< HEAD
        return true;
=======
        return $user->hasRole('admin|manager|cashier');
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
    }

    public function manage(User $user, Rate $rate): bool
    {
<<<<<<< HEAD
        return $user->hasRole('admin');
=======
        return $user->hasRole('admin|manager');
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
    }
}
