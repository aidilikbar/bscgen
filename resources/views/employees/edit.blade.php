<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Employee
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-lg">
            <form method="POST" action="{{ route('employees.update', $employee) }}">
                @csrf @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input name="name" type="text" class="form-input w-full" value="{{ $employee->name }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Position Title</label>
                    <input name="position_title" type="text" class="form-input w-full" value="{{ $employee->position_title }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Business Unit</label>
                    <input name="business_unit" type="text" class="form-input w-full" value="{{ $employee->business_unit }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Supervisor</label>
                    <select name="supervisor_id" class="form-select w-full">
                        <option value="">-- Select Supervisor --</option>
                        @foreach ($supervisors as $supervisor)
                            <option value="{{ $supervisor->id }}" {{ $supervisor->id == $employee->supervisor_id ? 'selected' : '' }}>
                                {{ $supervisor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('employees.index') }}">
                        <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</button>
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>