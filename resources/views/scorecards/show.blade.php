<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Scorecard Detail
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-lg">
            <div class="mb-4">
                <p><strong>Employee:</strong> {{ $scorecard->employee->name }}</p>
                <p><strong>Year:</strong> {{ $scorecard->year }}</p>
            </div>

            <div class="mb-6 flex space-x-4">
                <a href="{{ route('scorecards.export.pdf', $scorecard) }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Download PDF
                </a>
                <a href="{{ route('scorecards.export.excel', $scorecard) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Download Excel
                </a>
                <a href="{{ route('scorecards.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded ml-auto">
                    ← Back to List
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Perspective</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Objective</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">KPI</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Baseline</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Target</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Weight</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Realization</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($scorecard->details as $detail)
                            <tr>
                                <td class="px-4 py-2">{{ $detail->perspective->name }}</td>
                                <td class="px-4 py-2">{{ $detail->objective->description }}</td>
                                <td class="px-4 py-2">{{ $detail->kpi->description }}</td>
                                <td class="px-4 py-2">{{ $detail->baseline }}</td>
                                <td class="px-4 py-2">{{ $detail->target }}</td>
                                <td class="px-4 py-2">{{ $detail->weight }}</td>
                                <td class="px-4 py-2">{{ $detail->realization }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>