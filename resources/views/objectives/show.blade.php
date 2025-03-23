<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Objective Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <div class="mb-6 text-left">
                    <a href="{{ route('objectives.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded ml-auto">
                        ← Back to List
                    </a>
                </div>
                <p><strong>Perspective:</strong> {{ $objective->perspective->name }}</p>
                <p><strong>Description:</strong> {{ $objective->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>