<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Create Scorecard</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-lg">
            <form method="POST" action="{{ route('scorecards.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-sm">Employee</label>
                    <select name="employee_id" class="form-select w-full" required>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm">Year</label>
                    <input type="number" name="year" class="form-input w-full" required>
                </div>

                <div class="mb-6">
                    <label class="block font-medium text-sm mb-2">Scorecard Details</label>
                    <div id="details">
                        <div class="grid grid-cols-6 gap-2 mb-2">
                            <select name="details[0][perspective_id]" class="form-select col-span-1" required>
                                <option value="">Perspective</option>
                                @foreach($perspectives as $persp)
                                    <option value="{{ $persp->id }}">{{ $persp->name }}</option>
                                @endforeach
                            </select>

                            <select name="details[0][objective_id]" class="form-select col-span-1" required>
                                <option value="">Objective</option>
                                @foreach($objectives as $obj)
                                    <option value="{{ $obj->id }}">{{ $obj->description }}</option>
                                @endforeach
                            </select>

                            <select name="details[0][kpi_id]" class="form-select col-span-1" required>
                                <option value="">KPI</option>
                                @foreach($kpis as $kpi)
                                    <option value="{{ $kpi->id }}">{{ $kpi->description }}</option>
                                @endforeach
                            </select>

                            <input name="details[0][target]" type="number" placeholder="Target" class="form-input col-span-1">
                            <input name="details[0][weight]" type="number" placeholder="Weight" class="form-input col-span-1">
                            <input name="details[0][realization]" type="number" placeholder="Realization" class="form-input col-span-1">
                        </div>
                    </div>
                    <button type="button" onclick="addDetail()" class="mt-2 text-sm text-blue-600 hover:underline">+ Add More</button>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('scorecards.index') }}">
                        <button type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let index = 1;
        function addDetail() {
            const details = document.getElementById('details');
            const row = details.firstElementChild.cloneNode(true);
            [...row.querySelectorAll('select, input')].forEach(input => {
                const name = input.name.replace(/\[\d+\]/, `[${index}]`);
                input.name = name;
                input.value = '';
            });
            details.appendChild(row);
            index++;
        }
    </script>
</x-app-layout>