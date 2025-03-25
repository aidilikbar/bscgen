<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Position Detail</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <div class="mb-4 text-left">
                <a href="{{ route('positions.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-sm text-gray-700 hover:bg-gray-300">
                    ← Back to List
                </a>
            </div>

            <p><strong>Name:</strong> {{ $position->name }}</p>
            <p><strong>Business Unit:</strong> {{ $position->business_unit }}</p>
            <p><strong>Supervisor:</strong> {{ $position->supervisor?->name ?? '-' }}</p>
        </div>
    </div>
</x-app-layout>