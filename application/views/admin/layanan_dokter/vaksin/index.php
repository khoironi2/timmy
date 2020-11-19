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
                        <a href="" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-business-time fa-w-20"></i>
                            </span>
                            Buttons
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Info Vaksin
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
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
                                        <td><?= $data['name']; ?></td>
                                        <td><?= $data['nama_hewan_vaksin']; ?></td>
                                        <td><?= $data['nama_paket_vaksin']; ?></td>
                                        <td><?= $data['keterangan_tambahan_vaksin']; ?></td>
                                        <td><?= $data['total_harga_vaksin']; ?></td>
                                        <td>
                                            <?php if ($data['status_boking_vaksin'] == 'sudah') : ?>
                                                <a href="<?= base_url('admin/layanan_dokter/vaksin/updateStatusSelesaiAdministrasi/' . $data['id_boking_vaksin']) ?>"><span class="badge badge-danger">Sudah Ditangani | Belum Administrasi </a>
                                            <?php elseif ($data['status_boking_vaksin'] == 'selesai_administrasi') : ?>
                                                <span class="badge badge-success">Selesai Administrasi </span>
                                            <?php elseif ($data['status_boking_vaksin'] == 'visit_selesai') : ?>
                                                <span class="badge badge-success">Terimakasih Dokter Atas Visit anda </span>
                                            <?php endif; ?>
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