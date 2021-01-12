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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url('dokter/layanan_pasien/rekam_medis/create'); ?>" class="btn btn-primary mb-4">Tambah Rekam Medis</a>

        <?= $this->session->flashdata('message'); ?>
        
        <div class="card">
            <div class="card-header">
                Info rekam medis
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Dokter</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Pemeliharaan</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($rekam_medis as $medis) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $medis['name'] ?></td>
                                <td><?= $medis['nama_pemilik'] ?></td>
                                <td><?= $medis['nama_pemeliharaan'] ?></td>
                                <td><?= $medis['catatan'] ?></td>
                                <td>
                                    <a href="<?= base_url('dokter/layanan_pasien/rekam_medis/edit/' . $medis['id']); ?>" class="badge badge-info">Edit</a>
                                    <a onclick="return confirm('Data akan terhapus')" href="<?= base_url('dokter/layanan_pasien/rekam_medis/destroy/' . $medis['id']); ?>" class="badge badge-danger">Delete</a>
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