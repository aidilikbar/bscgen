<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Employee</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('employees.update', ['employee' => $employee->id, 'page' => request()->get('page', 1)]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block font-medium text-sm">Name</label>
                    <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" value="{{ old('name', $employee->name) }}" required>
                </div>

                <div class="mb-4">
                    <label for="position_id" class="block font-medium text-sm">Position</label>
                    <select name="position_id" id="position_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Select Position --</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="business_unit" class="block font-medium text-sm">Business Unit</label>
                    <input type="text" name="business_unit" id="business_unit" class="w-full border rounded px-3 py-2" value="{{ old('business_unit', $employee->business_unit) }}" required>
                </div>

                <div class="mb-4">
                    <label for="supervisor_id" class="block font-medium text-sm">Supervisor</label>
                    <select name="supervisor_id" id="supervisor_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- None --</option>
                        @foreach ($supervisors as $sup)
                            <option value="{{ $sup->id }}" {{ old('supervisor_id', $employee->supervisor_id) == $sup->id ? 'selected' : '' }}>
                                {{ $sup->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>