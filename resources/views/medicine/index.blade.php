@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Laravel 5.5 CRUD Example from scratch</h2> --}}
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('medicine.create') }}"> Create New Medicine</a>
            </div>
            <form action="{{ route('medicine.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search keyword..." name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
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
            <th>Medicine Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Given Medicine</th>
            <th>Remain Medicine</th>
            <th>Expire Date</th>
            <th>Price</th>
            <th>Issue Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($medicines as $medicine)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $medicine->medicine_name }}</td>
                <td>{{ $medicine->description }}</td>
                <td>{{ $medicine->quantity }}</td>
                <td>{{ $medicine->given_medicine }}</td>
                <td>{{ $medicine->remain_medicine }}</td>
                <td>{{ $medicine->expire_date }}</td>
                <td>{{ $medicine->price }}</td>
                <td>{{ $medicine->issue_date }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('medicine.show', $medicine->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('medicine.edit', $medicine->id) }}">Edit</a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['medicine.destroy', $medicine->id],
                        'style' => 'display:inline',
                    ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! $medicines->links() !!}
@endsection
