<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Perspective
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <form method="POST" action="{{ route('perspectives.update', $perspective) }}">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                        <input name="name" type="text" value="{{ $perspective->name }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('perspectives.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>