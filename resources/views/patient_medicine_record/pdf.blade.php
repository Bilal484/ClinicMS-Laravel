<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Medicine Record PDF</title>
    <style>
        /* Your PDF styling here */
        /* For example: */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h4>Patients Medicine Record for DBR: {{ $patientMedicineRecord->first()->DBR }}</h4>
    <table>
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
    </table>
</body>

</html>
