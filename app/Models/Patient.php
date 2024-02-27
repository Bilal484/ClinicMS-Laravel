<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{


    protected $fillable =
    [
        'DBR', 'first_name', 'father_name', 'class', 'age', 'any_disease', 'gender', 'issue_date', 'location',
        'blood_group',
    ];

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }
    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function packageSales()
    {
        return $this->hasMany('App\Models\PackageSale');
    }
    //
}
