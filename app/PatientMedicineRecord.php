<?php

namespace App;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;

class PatientMedicineRecord extends Model
{
   

    protected $fillable = [
        'DBR',
        'disease',
        'medicine_name',
        'medicine_description',
        'given_medicine',
        'date',
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class, 'DBR', 'id');
    }
}
