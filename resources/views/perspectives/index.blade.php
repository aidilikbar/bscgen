@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Perspectives</h1>
    <a href="{{ route('perspectives.create') }}" class="btn btn-primary mb-3">Create New</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perspectives as $perspective)
                <tr>
                    <td>{{ $perspective->id }}</td>
                    <td>{{ $perspective->name }}</td>
                    <td>
                        <a href="{{ route('perspectives.show', $perspective) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('perspectives.edit', $perspective) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('perspectives.destroy', $perspective) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection