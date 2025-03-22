@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Perspective Details</h1>
    <p><strong>ID:</strong> {{ $perspective->id }}</p>
    <p><strong>Name:</strong> {{ $perspective->name }}</p>
    <a href="{{ route('perspectives.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection