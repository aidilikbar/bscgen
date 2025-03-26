<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Employee Details</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <a href="{{ route('employees.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    ← Back to List
                </a>
            </div>

            <p><strong>Name:</strong> {{ $employee->name }}</p>
            <p><strong>Position:</strong> {{ $employee->position->name ?? '-' }}</p>
            <p><strong>Business Unit:</strong> {{ $employee->business_unit }}</p>
            <p><strong>Supervisor:</strong> {{ $employee->supervisor?->name ?? '-' }}</p>
        </div>
    </div>
</x-app-layout>