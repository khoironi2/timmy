<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head><body style="text-align: center; border: solid black;">
    <h4 style="text-align: center;"> SISTEM INFORMASI KLINIK PELAYANAN HEWAN</h4>
   <h1 style="text-align: center;">Nomor : <?= $antrian->id_antrian_pasien ?></h1>
   <br><p>Tanggal : <?= $antrian->time_create_boking_vaksin ?></p>
   <br><p>Peliharaan : <?= $antrian->nama_hewan_vaksin ?></p>
   <br><p>Paket : <?= $antrian->nama_paket_vaksin ?></p>
   <br><p>Dokter : <?= $antrian->nama_dokter ?></p>
   
</body></html>