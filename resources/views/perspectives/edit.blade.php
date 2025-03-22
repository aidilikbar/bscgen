@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Perspective</h1>
    <form method="POST" action="{{ route('perspectives.update', $perspective) }}">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" value="{{ $perspective->name }}" required>
        </div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection