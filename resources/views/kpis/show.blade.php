<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            KPI Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <p><strong>Perspective:</strong> {{ $kpi->perspective->name }}</p>
                <p><strong>Description:</strong> {{ $kpi->description }}</p>
                <a href="{{ route('kpis.index') }}" class="btn btn-secondary mt-4">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>