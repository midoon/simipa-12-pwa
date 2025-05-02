<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran | Rekapitulasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 10px;
        }

        .header {
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            font-weight: bold;
            font-size: 24px;
            margin: 10px 0;
        }

        .info {
            margin-bottom: 30px;
        }

        .info .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .info .row span {
            text-align: left;
            white-space: nowrap;
        }

        .table-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead {
            background-color: #708871;
            color: white;
        }

        th {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th.no-column {
            width: 5%;
        }


        th.status-column {
            width: 10%;
        }

        tbody tr {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>REKAPITULASI PEMBAYARAN SISWA</h1>
        <h1>MI PANCASILA MOJOSARI MOJOKERTO</h1>
    </div>

    <div class="info">
        <div class="row">
            <span style="width:10%;">Rombel</span>
            <span style="width: 1%; text-align: center;">:</span>
            <span style="width: 89%;">{{ $group }}</span>
        </div>
        <div class="row">
            <span style="width:10%;">Jenis</span>
            <span style="width: 1%; text-align: center;">:</span>
            <span style="width: 89%;">{{ $activity }}</span>
        </div>
        <div class="row">
            <span style="width:10%;">Tanggal Awal</span>
            <span style="width: 1%; text-align: center;">:</span>
            <span style="width: 89%;">{{ \Carbon\Carbon::parse($start_date)->format('d-m-Y') }}</span>
        </div>
        <div class="row">
            <span style="width:10%;">Tanggal Akhir</span>
            <span style="width: 1%; text-align: center;">:</span>
            <span style="width: 89%;">{{ \Carbon\Carbon::parse($end_date)->format('d-m-Y') }}</span>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th class="no-column">No</th>
                    <th>Nama</th>
                    <th class="status-column">Hadir</th>
                    <th class="status-column">Alpha</th>
                    <th class="status-column">Izin</th>
                    <th class="status-column">Sakit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportMap as $student_id => $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data['name'] }}</td>
                        <td>{{ $data['hadir'] }}</td>
                        <td>{{ $data['alpha'] }}</td>
                        <td>{{ $data['izin'] }}</td>
                        <td>{{ $data['sakit'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

</div>


</body>

</html>
