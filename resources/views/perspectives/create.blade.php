@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Perspective</h1>
    <form method="POST" action="{{ route('perspectives.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Save</button>
    </form>
</div>
@endsection