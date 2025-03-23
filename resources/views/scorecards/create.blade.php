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

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm border border-gray-200" id="details-table">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-left">Perspective</th>
                                    <th class="px-3 py-2 text-left">Objective</th>
                                    <th class="px-3 py-2 text-left">KPI</th>
                                    <th class="px-3 py-2 text-left">Baseline</th>
                                    <th class="px-3 py-2 text-left">Target</th>
                                    <th class="px-3 py-2 text-left">Weight</th>
                                    <th class="px-3 py-2 text-left">Realization</th>
                                </tr>
                            </thead>
                            <tbody id="details">
                                <tr>
                                    <td class="px-3 py-2">
                                        <select name="details[0][perspective_id]" class="form-select w-full" required>
                                            <option value="">--</option>
                                            @foreach($perspectives as $persp)
                                                <option value="{{ $persp->id }}">{{ $persp->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-3 py-2">
                                        <select name="details[0][objective_id]" class="form-select w-full" required>
                                            <option value="">--</option>
                                            @foreach($objectives as $obj)
                                                <option value="{{ $obj->id }}">{{ $obj->description }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-3 py-2">
                                        <select name="details[0][kpi_id]" class="form-select w-full" required>
                                            <option value="">--</option>
                                            @foreach($kpis as $kpi)
                                                <option value="{{ $kpi->id }}">{{ $kpi->description }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input name="details[0][baseline]" type="number" placeholder="e.g. 5" class="form-input w-full" /></td>
                                    <td class="px-3 py-2"><input name="details[0][target]" type="number" placeholder="e.g. 10" class="form-input w-full" /></td>
                                    <td class="px-3 py-2"><input name="details[0][weight]" type="number" placeholder="%" class="form-input w-full" /></td>
                                    <td class="px-3 py-2"><input name="details[0][realization]" type="number" placeholder="%" class="form-input w-full" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <button type="button" onclick="addDetailRow()" class="mt-3 text-sm text-blue-600 hover:underline">+ Add More</button>
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
        let detailIndex = 1;

        function addDetailRow() {
            const row = document.querySelector('#details tr').cloneNode(true);
            const inputs = row.querySelectorAll('select, input');

            inputs.forEach(input => {
                const name = input.name.replace(/\[\d+\]/, `[${detailIndex}]`);
                input.name = name;
                input.value = '';
            });

            document.querySelector('#details').appendChild(row);
            detailIndex++;
        }
    </script>
</x-app-layout>