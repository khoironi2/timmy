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
        <div class="card">
            <div class="card-header">
                Info dokter
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pet</th>
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
                                <td>
                                    <?php if ($data['status_boking_steril'] == 'sudah') : ?>
                                        <a href="<?= base_url('admin/layanan_dokter/steril/updateStatusSelesaiAdministrasi/' . $data['id_boking_steril']) ?>"><span class="badge badge-danger">Sudah Ditangani | Belum Administrasi </a>
                                    <?php elseif ($data['status_boking_steril'] == 'antri') : ?>
                                        <a data-toggle="modal" data-target="#persilahkanmasuk<?= $data['id_boking_steril'] ?>"><span class=" badge badge-warning">Persilahkan Masuk</span></a>
                                    <?php elseif ($data['status_boking_steril'] == 'selesai_administrasi') : ?>
                                        <span class="badge badge-success">Selesai Administrasi </span>
                                    <?php elseif ($data['status_boking_steril'] == 'visit_selesai') : ?>
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
</div>
</div>



<!-- start modal ikut antri -->
<?php $no = 1;
foreach ($steril as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="persilahkanmasuk<?= $data['id_boking_steril'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/layanan_dokter/steril/updateStatusPersilahkanMasuk/' . $data['id_boking_steril']) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"> anda akan mempersilahkan masuk <b><?= $data['name'] ?></b> Untuk di periksa! </b> </label>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>">
                            <!-- <input type="text" hidden name="id_dokter" value="<?= $data['id_dokter']; ?>"> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">silahkan masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>