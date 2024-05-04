@extends('layouts.master')
@section('content')
<div class="card-header">
    All Record From Excel File
    <a class="btn btn-warning float-end" href="{{ route('home') }}">Back</a>
</div>
<table class="table table-bordered mt-3">
    <tr>
        <th>Sr No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Title</th>
    </tr>
    @foreach($filedata as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ isset($data->name) ? (string)$data->name : 'N/A' }}</td>
        <td>{{ isset($data->email) ? $data->email : 'N/A' }}</td>
        <td>{{ isset($data->department) ? $data->department : 'N/A' }}</td>
        <td>{{ isset($data->title) ? $data->title : 'N/A' }}</td>
    </tr>
    @endforeach
</table>
@endsection