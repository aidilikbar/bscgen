<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employees
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('employees.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Create New
        </a>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-medium">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Position</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Business Unit</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Supervisor</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $employee->id }}</td>
                            <td class="px-6 py-4">{{ $employee->name }}</td>
                            <td class="px-6 py-4">{{ $employee->position_title }}</td>
                            <td class="px-6 py-4">{{ $employee->business_unit }}</td>
                            <td class="px-6 py-4">{{ $employee->supervisor?->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('employees.edit', $employee) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this employee?')" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</x-app-layout>