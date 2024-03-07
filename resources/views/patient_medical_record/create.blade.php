@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Patient Medical Record</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patient_medical_record.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'patient_medical_record.store', 'method' => 'POST']) !!}
    @include('patient_medical_record.form')
    {!! Form::close() !!}
@endsection
