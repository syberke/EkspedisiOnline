<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
<<<<<<< HEAD
        return $this->user()->hasRole('admin');
=======
        return $this->user()->hasRole('admin|manager');
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
    }

    public function rules(): array
    {
        $vehicleId = $this->route('vehicle')?->id;

        return [
            'plate_number' => ['required', 'string', 'max:255', 'unique:vehicles,plate_number,'.$vehicleId],
            'type' => ['required', 'in:motor,mobil,truck'],
            'courier_id' => ['required', 'exists:users,id'],
        ];
    }
}
