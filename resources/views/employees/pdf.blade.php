<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
        }
    </style>
</head>
<body>

<h2>Employee Report</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Department</th>
            <th>Position</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $employee->employee_code }}</td>
            <td>{{ $employee->full_name }}</td>
            <td>{{ $employee->department->department_name ?? '-' }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>