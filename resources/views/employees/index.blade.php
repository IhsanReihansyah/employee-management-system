<h1>Employee List</h1>

@forelse($employees as $employee)

    <p>{{ $employee->full_name }}</p>

@empty

    <p>Belum ada data karyawan.</p>

@endforelse