<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perspectives
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('perspectives.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Create New
        </a>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perspectives as $perspective)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $perspective->id }}</td>
                            <td class="px-6 py-4">{{ $perspective->name }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('perspectives.edit', $perspective) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('perspectives.destroy', $perspective) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $perspectives->links() }}
            </div>
        </div>
    </div>
</x-app-layout>