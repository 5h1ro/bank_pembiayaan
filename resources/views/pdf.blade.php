<!DOCTYPE html>

<head>
    <title>Bukti Pendaftaran</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>BUKTI PENDAFTARAN</h3>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $student->name }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat, tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $student->birthplace }}, {{ $student->birthday }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $student->address }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Sekolah Asal</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $student->school }}</td>
            </tr>
        </table>

        <p>Telah Melakukan Pendaftaran pada tanggal {{ $date }}</p>

        <div style="width: 34%; text-align: left; float: right;">Madiun, {{ $date }}</div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="width: 43%; text-align: left; float: right;">Nurhakiki Romadhony Ikhwandany S.Pdi</div>
        <br>
        <div style="width: 38%; text-align: left; float: right;">Kepala Sekolah SMA N 3 Madiun</div>

    </div>
</body>

</html>
