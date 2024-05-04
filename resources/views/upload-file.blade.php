@extends('layouts.master')
@section('content')
<div class="card-header">
    Upload File

</div>
<div class="card-body">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('file.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
        @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <br>
        <button class="btn btn-success">Upload File</button>
    </form>
</div>
@endsection