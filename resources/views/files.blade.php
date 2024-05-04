@extends('layouts.master')
@section('content')
<div class="card-header">
    All Excel Files
    <a class="btn btn-warning float-end" href="{{ route('upload.file') }}">Upload File</a>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="card-body">
    @foreach($files as $file)
    <div>
        <a href="{{ route('file.view', $file->id) }}">{{ $file->file }}</a>
    </div>
    @endforeach
</div>
@endsection