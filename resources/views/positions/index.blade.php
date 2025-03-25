<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Positions</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('positions.create') }}" class="mb-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Create New</a>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full table-auto border-collapse">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Business Unit</th>
                        <th class="px-4 py-2">Supervisor</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $position->id }}</td>
                            <td class="px-4 py-2">{{ $position->name }}</td>
                            <td class="px-4 py-2">{{ $position->business_unit }}</td>
                            <td class="px-4 py-2">{{ $position->supervisor?->name ?? '-' }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('positions.show', $position) }}" class="text-indigo-600 hover:underline">Show</a>
                                <a href="{{ route('positions.edit', $position) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('positions.destroy', $position) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $positions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>