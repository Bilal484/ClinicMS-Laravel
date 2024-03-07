@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Patients Medicine Record</h2>
        @foreach ($patientMedicineRecords->groupBy('DBR') as $DBR => $records)
            <h3>DBR: {{ $DBR }}</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DBR</th>
                        <th>Disease</th>
                        <th>Medicine Name</th>
                        <th>Medicine Description</th>
                        <th>Given Medicine</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->DBR }}</td>
                            <td>{{ $record->disease }}</td>
                            <td>{{ $record->medicine_name }}</td>
                            <td>{{ $record->medicine_description }}</td>
                            <td>{{ $record->given_medicine }}</td>
                            <td>{{ $record->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
