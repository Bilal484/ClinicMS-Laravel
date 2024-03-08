@extends('layouts.app')

@section('content')
    <style>
        /* Custom CSS for table */
        .container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

    <div class="container">
        <h4>Patients Medicine Record for DBR: {{ $patientMedicineRecord->first()->DBR }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Disease</th>
                    <th>Medicine Name</th>
                    <th>Medicine Description</th>
                    <th>Given Medicine</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patientMedicineRecord as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->disease }}</td>
                        <td>{{ $record->medicine_name }}</td>
                        <td>{{ $record->medicine_description }}</td>
                        <td>{{ $record->given_medicine }}</td>
                        <td>{{ $record->date }}</td>
                    </tr>
                @endforeach

            </tbody>
            <a href="{{ route('patient-medicine-records.download-pdf', ['dbr' => $patientMedicineRecord->first()->DBR]) }}"
                class="btn btn-primary">Download as PDF</a>
        </table>


    </div>
@endsection
