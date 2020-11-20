<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon <?= $icon; ?> icon-gradient bg-mean-fruit"></i>
                </i>
            </div>
            <div><?= $halaman; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Info Riwayat
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Hewan</th>
                            <th scope="col">Paket Steril</th>
                            <th scope="col">Keterangan Tambahan</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($steril as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data['time_create_boking_steril'] ?></td>
                                <td><?= $data['name'] ?></td>
                                <td><?= $data['nama_hewan_steril']; ?></td>
                                <td><?= $data['nama_paket_steril']; ?></td>
                                <td><?= $data['keterangan_tambahan_steril']; ?></td>
                                <td><?= $data['total_harga_steril']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Info Riwayat Vaksin
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Pasien</th>
                            <th scope="col">Nama Hewan</th>
                            <th scope="col">Paket Vaksin</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($vaksin as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data['time_create_boking_vaksin']; ?></td>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['nama_hewan_vaksin']; ?></td>
                                <td><?= $data['nama_paket_vaksin']; ?></td>
                                <td><?= $data['keterangan_tambahan_vaksin']; ?></td>
                                <td><?= $data['total_harga_vaksin']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>