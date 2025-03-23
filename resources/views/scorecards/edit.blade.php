<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Scorecard</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-lg">
            <form method="POST" action="{{ route('scorecards.update', $scorecard) }}">
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
                    <div id="details">
                        @foreach($scorecard->details as $i => $detail)
                        <div class="grid grid-cols-7 gap-2 mb-2">
                            <select name="details[{{ $i }}][perspective_id]" class="form-select col-span-1" required>
                                @foreach($perspectives as $persp)
                                    <option value="{{ $persp->id }}" {{ $persp->id == $detail->perspective_id ? 'selected' : '' }}>
                                        {{ $persp->name }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="details[{{ $i }}][objective_id]" class="form-select col-span-1" required>
                                @foreach($objectives as $obj)
                                    <option value="{{ $obj->id }}" {{ $obj->id == $detail->objective_id ? 'selected' : '' }}>
                                        {{ $obj->description }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="details[{{ $i }}][kpi_id]" class="form-select col-span-1" required>
                                @foreach($kpis as $kpi)
                                    <option value="{{ $kpi->id }}" {{ $kpi->id == $detail->kpi_id ? 'selected' : '' }}>
                                        {{ $kpi->description }}
                                    </option>
                                @endforeach
                            </select>

                            <input name="details[{{ $i }}][baseline]" type="number" value="{{ $detail->baseline }}" placeholder="Baseline" class="form-input col-span-1">
                            <input name="details[{{ $i }}][target]" type="number" value="{{ $detail->target }}" placeholder="Target" class="form-input col-span-1">
                            <input name="details[{{ $i }}][weight]" type="number" value="{{ $detail->weight }}" placeholder="Weight" class="form-input col-span-1">
                            <input name="details[{{ $i }}][realization]" type="number" value="{{ $detail->realization }}" placeholder="Realization" class="form-input col-span-1">
                        </div>
                        @endforeach
                    </div>

                    <button type="button" onclick="addDetail({{ $scorecard->details->count() }})" class="mt-2 text-sm text-blue-600 hover:underline">+ Add More</button>
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
        let index = {{ $scorecard->details->count() }};
        function addDetail(startIndex) {
            const details = document.getElementById('details');
            const row = details.firstElementChild.cloneNode(true);
            [...row.querySelectorAll('select, input')].forEach(input => {
                input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                input.value = '';
            });
            details.appendChild(row);
            index++;
        }
    </script>
</x-app-layout>