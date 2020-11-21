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
                        <a href="<?= base_url('admin/paket/groming/create'); ?>" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-business-time fa-w-20"></i>
                            </span>
                            Tambah
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
                        Info dokter
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($groming as $data) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $data['nama_paket_groming']; ?></td>
                                        <td><?= $data['keterangan_paket_groming']; ?></td>
                                        <td><?= $data['harga_paket_groming']; ?></td>
                                        <td>
                                            <img class="img-thumbnail" width="60" src="<?= base_url('assets/img/paket/groming/' . $data['gambar_paket_groming']); ?>">
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/paket/groming/update/' . $data['id_paket_groming']); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Data jadwal akan terhapus.');" href="<?= base_url('admin/paket/groming/delete/' . $data['id_paket_groming']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

    