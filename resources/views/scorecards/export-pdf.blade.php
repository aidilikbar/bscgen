<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Scorecard PDF</title>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Scorecard - {{ $scorecard->employee->name }} ({{ $scorecard->year }})</h2>

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
</body>
</html>