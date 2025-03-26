<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Scorecard</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-lg">
            <form action="{{ route('scorecards.update', ['scorecard' => $scorecard->id, 'page' => request()->get('page', 1)]) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium text-sm">Employee</label>
                    <select name="employee_id" class="form-select w-full" required>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ $emp->id == $scorecard->employee_id ? 'selected' : '' }}>
                                {{ $emp->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm">Year</label>
                    <input type="number" name="year" value="{{ $scorecard->year }}" class="form-input w-full" required>
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
                                @foreach($scorecard->details as $i => $detail)
                                <tr>
                                    <td class="px-3 py-2">
                                        <select name="details[{{ $i }}][perspective_id]" class="form-select w-full" required>
                                            <option value="">--</option>
                                            @foreach($perspectives as $persp)
                                                <option value="{{ $persp->id }}" {{ $persp->id == $detail->perspective_id ? 'selected' : '' }}>
                                                    {{ $persp->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-3 py-2">
                                        <select name="details[{{ $i }}][objective_id]" class="form-select w-full" required>
                                            <option value="">--</option>
                                            @foreach($objectives as $obj)
                                                <option value="{{ $obj->id }}" {{ $obj->id == $detail->objective_id ? 'selected' : '' }}>
                                                    {{ $obj->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-3 py-2">
                                        <select name="details[{{ $i }}][kpi_id]" class="form-select w-full" required>
                                            <option value="">--</option>
                                            @foreach($kpis as $kpi)
                                                <option value="{{ $kpi->id }}" {{ $kpi->id == $detail->kpi_id ? 'selected' : '' }}>
                                                    {{ $kpi->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input name="details[{{ $i }}][baseline]" type="number" placeholder="e.g. 5" class="form-input w-full" value="{{ $detail->baseline }}"></td>
                                    <td class="px-3 py-2"><input name="details[{{ $i }}][target]" type="number" placeholder="e.g. 10" class="form-input w-full" value="{{ $detail->target }}"></td>
                                    <td class="px-3 py-2"><input name="details[{{ $i }}][weight]" type="number" placeholder="%" class="form-input w-full" value="{{ $detail->weight }}"></td>
                                    <td class="px-3 py-2"><input name="details[{{ $i }}][realization]" type="number" placeholder="%" class="form-input w-full" value="{{ $detail->realization }}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button type="button" onclick="addDetailRow()" class="mt-3 text-sm text-blue-600 hover:underline">+ Add More</button>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('scorecards.index') }}">
                        <button type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let detailIndex = {{ $scorecard->details->count() }};

        function addDetailRow() {
            const row = document.querySelector('#details tr').cloneNode(true);
            const inputs = row.querySelectorAll('select, input');

            inputs.forEach(input => {
                input.name = input.name.replace(/\[\d+\]/, `[${detailIndex}]`);
                input.value = '';
            });

            document.querySelector('#details').appendChild(row);
            detailIndex++;
        }
    </script>
</x-app-layout>