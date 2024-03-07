@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Patient Medical Records</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('patient_medical_record.create') }}"> Create New Patient Medical
                    Record</a>
            </div><br>
           

        </div>
        <form action="{{ route('patient_medical_record.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search keyword..." name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>DBR</th>
            <th>Father's Name</th>
            <th>Roll No</th>
            <th>Class</th>
            <th>Disease</th>
            <th>Medicine Name</th>
            <th>Medicine Description</th>
            <th>Given Medicine</th>
            <th>Remarks</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($patientMedicalRecords as $patientMedicalRecord)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $patientMedicalRecord->name }}</td>
                <td>{{ $patientMedicalRecord->DBR }}</td>
                <td>{{ $patientMedicalRecord->father_name }}</td>
                <td>{{ $patientMedicalRecord->roll_no }}</td>
                <td>{{ $patientMedicalRecord->class }}</td>
                <td>{{ $patientMedicalRecord->disease }}</td>
                <td>{{ $patientMedicalRecord->medicine_name }}</td>
                <td>{{ $patientMedicalRecord->medicine_description }}</td>
                <td>{{ $patientMedicalRecord->given_medicine }}</td>
                <td>{{ $patientMedicalRecord->remarks }}</td>
                <td>{{ $patientMedicalRecord->date }}</td>
                <td>
                    <a class="btn btn-info"
                        href="{{ route('patient_medical_record.show', $patientMedicalRecord->id) }}">Show</a>
                    <a class="btn btn-primary"
                        href="{{ route('patient_medical_record.edit', $patientMedicalRecord->id) }}">Edit</a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['patient_medical_record.destroy', $patientMedicalRecord->id],
                        'style' => 'display:inline',
                    ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! $patientMedicalRecords->links() !!}
@endsection
