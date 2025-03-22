<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create KPI
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <form method="POST" action="{{ route('kpis.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="perspective_id" class="block font-medium">Perspective</label>
                        <select name="perspective_id" class="form-select w-full" required>
                            <option value="">-- Select Perspective --</option>
                            @foreach($perspectives as $perspective)
                                <option value="{{ $perspective->id }}">{{ $perspective->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium">Description</label>
                        <textarea name="description" class="form-textarea w-full" required></textarea>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('kpis.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>