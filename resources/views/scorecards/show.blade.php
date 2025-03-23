<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Scorecard Detail</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-lg">
            <p><strong>Employee:</strong> {{ $scorecard->employee->name }}</p>
            <p><strong>Year:</strong> {{ $scorecard->year }}</p>

            <div class="mt-6">
                <h3 class="font-semibold mb-2">Details</h3>
                <table class="table-auto w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-2">Perspective</th>
                            <th class="px-3 py-2">Objective</th>
                            <th class="px-3 py-2">KPI</th>
                            <th class="px-3 py-2">Target</th>
                            <th class="px-3 py-2">Weight</th>
                            <th class="px-3 py-2">Realization</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scorecard->details as $detail)
                        <tr class="border-t">
                            <td class="px-3 py-2">{{ $detail->perspective->name }}</td>
                            <td class="px-3 py-2">{{ $detail->objective->description }}</td>
                            <td class="px-3 py-2">{{ $detail->kpi->description }}</td>
                            <td class="px-3 py-2">{{ $detail->target }}</td>
                            <td class="px-3 py-2">{{ $detail->weight }}</td>
                            <td class="px-3 py-2">{{ $detail->realization }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <a href="{{ route('scorecards.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
            </div>
        </div>
    </div>
</x-app-layout>