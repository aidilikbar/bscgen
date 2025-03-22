<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Key Performance Indicators (KPIs)
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('kpis.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
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
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Perspective</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Description</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kpis as $kpi)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $kpi->id }}</td>
                            <td class="px-6 py-4">{{ $kpi->perspective->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $kpi->description }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('kpis.edit', $kpi) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('kpis.destroy', $kpi) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $kpis->links() }}
            </div>
        </div>
    </div>
</x-app-layout>