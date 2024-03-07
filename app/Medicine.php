<?php

namespace App;


use App\PatientMedicalRecord;
use App\PatientMedicineRecord;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'medicine_name',
        'description',
        'quantity',
        'given_medicine',
        'remain_medicine',
        'expire_date',
        'price',
        'issue_date',
    ];

    public function patientMedicalRecords()
    {
        return $this->hasMany(PatientMedicalRecord::class);
    }
}
