<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Objective Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <p><strong>Perspective:</strong> {{ $objective->perspective->name }}</p>
                <p><strong>Description:</strong> {{ $objective->description }}</p>
                <a href="{{ route('objectives.index') }}" class="btn btn-secondary mt-4">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>