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
</head><body>
    <h2 style="text-align: center;"> SISTEM INFORMASI KLINIK PELAYANAN HEWAN</h2>
    <h4 style="background-color: #bdc3c7; color: black; padding: 1px; width: 370px; border: 1px solid #bdc3c7; margin-left: 330px; text-align: center;">LAPORAN DATA STERIL</h4>
   
    <p style="text-align: center;"><span>Antara Tanggal </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemilik</th>
                <th>Hewan</th>
                <th>Paket</th>
                <th>Dokter</th>
                <th>Catatan Medis</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($nasabah as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->time_create_boking_steril ?></td>
                    <td><?= $data->nama_pemilik ?></td>
                    <td><?= $data->nama_hewan_steril ?></td>
                    <td><?= $data->nama_paket_steril ?></td>
                    <td><?= $data->nama_dokter ?></td>
                    <td><?= $data->keterangan_tambahan_steril ?></td>
                    <td>Rp. <?= number_format($data->total_harga_steril, 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body></html>