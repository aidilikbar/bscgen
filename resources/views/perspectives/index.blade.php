<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perspectives
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('perspectives.create') }}" class="btn btn-primary mb-4">+ Create New</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-bordered w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perspectives as $perspective)
                                <tr>
                                    <td>{{ $perspective->id }}</td>
                                    <td>{{ $perspective->name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('perspectives.edit', $perspective) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('perspectives.destroy', $perspective) }}" method="POST" class="inline-block">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Delete this perspective?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>