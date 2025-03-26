<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Objective
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <form action="{{ route('objectives.update', ['objective' => $objective->id, 'page' => request()->get('page', 1)]) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-4">
                        <label for="perspective_id" class="block font-medium">Perspective</label>
                        <select name="perspective_id" class="form-select w-full" required>
                            @foreach($perspectives as $perspective)
                                <option value="{{ $perspective->id }}" {{ $perspective->id == $objective->perspective_id ? 'selected' : '' }}>
                                    {{ $perspective->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium">Description</label>
                        <textarea name="description" class="form-textarea w-full" required>{{ $objective->description }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('objectives.index') }}">
                            <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                                Cancel
                            </button>
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>