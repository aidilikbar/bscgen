<table>
    <thead>
        <tr>
            <th>Perspective</th>
            <th>Objective</th>
            <th>KPI</th>
            <th>Target</th>
            <th>Weight</th>
            <th>Realization</th>
        </tr>
    </thead>
    <tbody>
        @foreach($scorecard->details as $detail)
        <tr>
            <td>{{ $detail->perspective->name }}</td>
            <td>{{ $detail->objective->description }}</td>
            <td>{{ $detail->kpi->description }}</td>
            <td>{{ $detail->target }}</td>
            <td>{{ $detail->weight }}</td>
            <td>{{ $detail->realization }}</td>
        </tr>
        @endforeach
    </tbody>
</table>