<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Scorecards</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('scorecards.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Create New
        </a>

        @if(session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Employee</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Year</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($scorecards as $scorecard)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $scorecard->employee->name }}</td>
                            <td class="px-6 py-4">{{ $scorecard->year }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('scorecards.show', $scorecard) }}" class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('scorecards.edit', $scorecard) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('scorecards.destroy', $scorecard) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('Delete this scorecard?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $scorecards->links() }}
            </div>
        </div>
    </div>
</x-app-layout>