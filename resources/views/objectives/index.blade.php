<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Objectives
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('objectives.create') }}" class="btn btn-primary mb-4">+ Create New</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="bg-white p-6 shadow-sm rounded-lg">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Perspective</th>
                            <th>Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objectives as $objective)
                            <tr>
                                <td>{{ $objective->id }}</td>
                                <td>{{ $objective->perspective->name ?? '-' }}</td>
                                <td>{{ $objective->description }}</td>
                                <td class="text-right">
                                    <a href="{{ route('objectives.edit', $objective) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('objectives.destroy', $objective) }}" method="POST" class="inline-block">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete this objective?')" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>