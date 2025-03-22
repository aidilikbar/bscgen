<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Perspective
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <form method="POST" action="{{ route('perspectives.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                        <input name="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>
                    
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('perspectives.index') }}">
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