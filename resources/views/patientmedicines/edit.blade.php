@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Patient Medicine</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patientmedicines.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($patientmedicine, [
        'method' => 'PATCH',
        'route' => ['patientmedicines.update', $patientmedicine->id],
    ]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Patient Name:</strong>
                {!! Form::text('patient_name', $patientmedicine->patient_name, [
                    'placeholder' => 'Patient Name',
                    'class' => 'form-control',
                ]) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DBR:</strong>
                {!! Form::text('dbr', $patientmedicine->dbr, ['placeholder' => 'DBR', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {!! Form::text('last_name', $patientmedicine->last_name, [
                    'placeholder' => 'Last Name',
                    'class' => 'form-control',
                ]) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Medicine Name:</strong>
                {!! Form::text('medicine_name', $patientmedicine->medicine_name, [
                    'placeholder' => 'Medicine Name',
                    'class' => 'form-control',
                ]) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Medicine Description:</strong>
                {!! Form::textarea('medicine_description', $patientmedicine->medicine_description, [
                    'placeholder' => 'Medicine Description',
                    'class' => 'form-control',
                    'style' => 'height:150px',
                ]) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time Taken:</strong>
                {!! Form::text('time_taken', $patientmedicine->time_taken, [
                    'placeholder' => 'Time Taken',
                    'class' => 'form-control',
                ]) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
