<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Report</title>
    <style>
        /* Menggunakan font sistem standar yang didukung penuh dompdf */
        body { 
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            color: #334155;
            margin: 10px;
            font-size: 13px;
        }
        
        /* Desain Judul Laporan */
        .header {
            margin-bottom: 25px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 10px;
        }
        .report-title {
            font-size: 22px;
            font-weight: bold;
            color: #1e3a8a;
            margin: 0;
        }
        .report-subtitle {
            font-size: 11px;
            color: #64748b;
            margin-top: 5px;
        }

        /* Desain Tabel Modern */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        /* Desain Header Tabel (Warna Navy Korporat) */
        th {
            background-color: #1e3a8a;
            color: #ffffff;
            font-weight: bold;
            text-align: left;
            padding: 10px 8px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Baris Data Karyawan */
        td {
            padding: 9px 8px;
            border-bottom: 1px solid #e2e8f0;
            color: #334155;
        }
        
        /* Efek Zebra Striping (Baris Belang-Belang) */
        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        /* Gaya Kolom Spesifik */
        .col-center {
            text-align: center;
        }
        .code-font {
            font-family: courier, monospace;
            font-size: 12px;
            font-weight: bold;
            color: #475569;
        }
        
        /* Indikator Status */
        .status-active {
            color: #16a34a;
            font-weight: bold;
        }
        .status-inactive {
            color: #dc2626;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="header">
    <h2 class="report-title">LAPORAN DATA KARYAWAN</h2>
    <p class="report-subtitle">Dibuat otomatis oleh Sistem Manajemen Karyawan — Tanggal: {{ date('d F Y') }}</p>
</div>

<table>
    <thead>
        <tr>
            <th width="5%" class="col-center">No</th>
            <th width="15%">Kode</th>
            <th width="30%">Nama Lengkap</th>
            <th width="20%">Departemen</th>
            <th width="18%">Jabatan</th>
            <th width="12%" class="col-center">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td class="col-center">{{ $loop->iteration }}</td>
            <td class="code-font">{{ $employee->employee_code }}</td>
            <td style="font-weight: bold; color: #1e293b;">{{ $employee->full_name }}</td>
            <td>{{ $employee->department->department_name ?? '-' }}</td>
            <td>{{ $employee->position }}</td>
            <td class="col-center">
                @if(strtolower($employee->status) === 'active' || strtolower($employee->status) === 'aktif')
                    <span class="status-active">Aktif</span>
                @else
                    <span class="status-inactive">Nonaktif</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
