<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Details
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-lg">
            <div class="mb-6 text-left">
                <a href="{{ route('employees.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded ml-auto">
                    ← Back to List
                </a>
            </div>
            <p><strong>Name:</strong> {{ $employee->name }}</p>
            <p><strong>Position:</strong> {{ $employee->position_title }}</p>
            <p><strong>Business Unit:</strong> {{ $employee->business_unit }}</p>
            <p><strong>Supervisor:</strong> {{ $employee->supervisor?->name ?? '-' }}</p>
        </div>
    </div>
</x-app-layout>