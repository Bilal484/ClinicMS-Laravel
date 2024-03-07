<?php

namespace App;

use App\Medicine;
use Illuminate\Database\Eloquent\Model;



class PatientMedicalRecord extends Model
{
    protected $fillable = [
        'name', 'DBR', 'father_name', 'roll_no', 'class', 'disease', 'medicine_name', 'medicine_description', 'given_medicine', 'remarks',
        'date',
    ];

    protected $dates = ['date'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_name', 'medicine_name');
    }
}
