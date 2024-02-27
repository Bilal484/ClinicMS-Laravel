@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Entry</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patientmedicines.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Patient Name:</strong>
                {{ $patientmedicine->patient->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Medicine Name:</strong>
                {{ $patientmedicine->medicine->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity Taken:</strong>
                {{ $patientmedicine->quantity_taken }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time Taken:</strong>
                {{ $patientmedicine->time_taken }}
            </div>
        </div>
    </div>
@endsection
