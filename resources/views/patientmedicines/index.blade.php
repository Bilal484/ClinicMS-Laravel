@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Laravel 5.5 CRUD Example from scratch</h2> --}}
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('patientmedicines.create') }}"> Create New Entry</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Patient Name</th>
            <th>Medicine Name</th>
            <th>Quantity Taken</th>
            <th>Time Taken</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($patientmedicines as $patientmedicine)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $patientmedicine->patient->name }}</td>
            <td>{{ $patientmedicine->medicine->name }}</td>
            <td>{{ $patientmedicine->quantity_taken }}</td>
            <td>{{ $patientmedicine->time_taken }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('patientmedicines.show',$patientmedicine->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('patientmedicines.edit',$patientmedicine->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['patientmedicines.destroy', $patientmedicine->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>

    {!! $patientmedicines->links() !!}
@endsection
