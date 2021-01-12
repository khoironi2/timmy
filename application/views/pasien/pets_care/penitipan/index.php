<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon <?= $icon; ?> icon-gradient bg-mean-fruit"></i>
                </i>
            </div>
            <div><?= $halaman; ?></div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="<?= base_url('pasien/pets_care/penitipan/create'); ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-business-time fa-w-20"></i>
                    </span>
                    Reservasi Penitipan
                </a>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
            <div class="card-header">
                Info Groming
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Hewan</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Jumlah hari</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($penitipan as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data->time_create_boking_penitipan; ?></td>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->nama_hewan_penitipan; ?></td>
                                <td><?= $data->nama_paket_penitipan; ?></td>
                                <td><?= $data->jumlah_hari_penitipan; ?></td>
                                <td><?= $data->keterangan_tambahan_penitipan; ?></td>
                                <td><?= $data->total_harga_penitipan; ?></td>
                                <td>

                                </td>
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