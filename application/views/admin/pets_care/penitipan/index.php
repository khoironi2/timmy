<div class="app-main__outer">
    <div class="app-main__inner">
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
                        <a href="<?= base_url('admin/pets_care/penitipan/create'); ?>" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-business-time fa-w-20"></i>
                            </span>
                            Create
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
                        Info Penitipan
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Pasien</th>
                                    <th scope="col">Hewan</th>
                                    <th scope="col">Jumlah Hari</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($penitipan as $data) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $data['time_create_boking_penitipan']; ?></td>
                                        <td><?= $data['name']; ?></td>
                                        <td><?= $data['nama_hewan_penitipan']; ?></td>
                                        <td><?= $data['jumlah_hari_penitipan']; ?></td>
                                        <td><?= $data['nama_paket_penitipan']; ?></td>
                                        <td><?= $data['keterangan_tambahan_penitipan']; ?></td>
                                        <td><?= $data['total_harga_penitipan']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/pets_care/penitipan/update/' . $data['id_boking_penitipan']); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Data penitipan akan terhapus.');" href="<?= base_url('admin/pets_care/penitipan/destroy/' . $data['id_boking_penitipan']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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