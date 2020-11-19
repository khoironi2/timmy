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
                Info Vaksin
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Hewan</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Dokter</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($boking as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data->nama_pemilik; ?></td>
                                <td><?= $data->nama_hewan_steril; ?></td>
                                <td><?= $data->nama_paket_steril; ?></td>
                                <td><?= $data->nama_dokter; ?></td>
                                <td><?= $data->total_harga_steril; ?></td>
                                <td>
                                    <?php if ($data->status_boking_steril == 'sudah') : ?>
                                        <span class="badge badge-success">perSilahkan saudara/i <b><?= $data->nama_pemilik; ?></b> selesaikan pembyaran di Admin</span>
                                    <?php elseif ($data->status_boking_steril == 'belum') : ?>
                                        <span class="badge badge-primary">Pasien Baru</span>
                                    <?php elseif ($data->status_boking_steril == 'antri') : ?>
                                        <a data-toggle="modal" data-target="#antrianmasuk<?= $data->id_boking_steril ?>"><span class=" badge badge-warning">Sedang Antri</span></a>
                                    <?php elseif ($data->status_boking_steril == 'waiting') : ?>
                                        <a data-toggle="modal" data-target="#persilahkanmasuk<?= $data->id_boking_steril ?>"><span class=" badge badge-warning">Persilahkan Masuk</span></a>
                                    <?php elseif ($data->status_boking_steril == 'giliran_anda') : ?>
                                        <a data-toggle="modal" data-target="#periksa<?= $data->id_boking_steril ?>"><span class=" badge badge-warning">sedang menunggu saudara/i <?= $data->nama_pemilik; ?></span></a>
                                    <?php elseif ($data->status_boking_steril == 'mulai') : ?>
                                        <a data-toggle="modal" data-target="#selesaikan<?= $data->id_boking_steril ?>"><span class=" badge badge-warning">sedang menerima peliharaan saudara/i <?= $data->nama_pemilik; ?></span></a>
                                    <?php elseif ($data->status_boking_steril == 'visit') : ?>
                                        <a data-toggle="modal" data-target="#visitModal<?= $data->id_boking_steril ?>"><span class=" badge badge-danger">Segera visit Pasien !</span></a>
                                    <?php elseif ($data->status_boking_steril == 'menuju') : ?>
                                        <a data-toggle="modal" data-target="#ditanganiModal<?= $data->id_boking_steril ?>"><span class=" badge badge-danger">Hati Hati di jalan Dokter <b><?= $data->nama_dokter; ?></b> !</span></a>
                                    <?php elseif ($data->status_boking_steril == 'ditangani') : ?>
                                        <a data-toggle="modal" data-target="#VisitSelesaiModal<?= $data->id_boking_steril ?>"><span class="badge badge-danger">Sedang ditangani Dokter <b><?= $data->nama_dokter; ?></b> </span></a>
                                    <?php elseif ($data->status_boking_steril == 'visit_selesai') : ?>
                                        <span class="badge badge-success">Terimakasih Dokter <b><?= $data->nama_dokter; ?></b> Atas Visit anda </span>
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
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="antrianmasuk<?= $data->id_boking_steril ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo dok <?= $data->nama_dokter ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/layanan_dokter/steril/updateStatusWaiting/' . $data->id_boking_steril) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo dok <b><?= $data->nama_dokter ?></b> anda akan menerima dan mempersilahkan <b><?= $data->nama_pemilik ?></b> untuk menunggu sebentar ? </b> </label>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>">
                            <input type="text" hidden name="id_dokter" value="<?= $data->id_dokter; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Oke Tunggu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end ikut antri -->

<!-- start modal ikut antri -->
<?php $no = 1;
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="persilahkanmasuk<?= $data->id_boking_steril ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo dok <?= $data->nama_dokter ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/layanan_dokter/steril/updateStatusPersilahkanMasuk/' . $data->id_boking_steril) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo dok <b><?= $data->nama_dokter ?></b> anda akan mempersilahkan masuk <b><?= $data->nama_pemilik ?></b> ! </b> </label>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>">
                            <input type="text" hidden name="id_dokter" value="<?= $data->id_dokter; ?>">
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
<!-- end ikut antri -->
<?php $no = 1;
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="periksa<?= $data->id_boking_steril ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo dok <?= $data->nama_dokter ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/layanan_dokter/steril/updateStatusPeriksa/' . $data->id_boking_steril) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo dok <b><?= $data->nama_dokter ?></b> apakah saudara/i: <b><?= $data->nama_pemilik ?></b> sudah diruangan ?. jika iya silahkan mulai periksa ! </b> </label>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>">
                            <input type="text" hidden name="id_dokter" value="<?= $data->id_dokter; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">mulai periksa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end ikut antri -->
<?php $no = 1;
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="selesaikan<?= $data->id_boking_steril ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo dok <?= $data->nama_dokter ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/layanan_dokter/steril/updateStatusSelesaiPeriksa/' . $data->id_boking_steril) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo dok <b><?= $data->nama_dokter ?></b> apakah peliharaan saudara/i: <b><?= $data->nama_pemilik ?></b> sudah diperiksa ?. jika iya silahkan selesaikan periksa ! dan PERSILAHKAN SAUDARA/I <b><?= $data->nama_pemilik ?></b> SELESAIKAN PEMBYARAN DI ADMIN</b> </label>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>">
                            <input type="text" hidden name="id_dokter" value="<?= $data->id_dokter; ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="keterangan_tambahan_steril" id="keterangan_tambahan_steril" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">selesai periksa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end ikut antri -->


<!-- start modal ikut antri -->
<?php $no = 1;
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="visitModal<?= $data->id_boking_steril ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo Dokter : <?= $data->nama_dokter ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/layanan_dokter/steril/updateStatusandVisit/' . $data->id_boking_steril) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo dok : <b><?= $data->nama_dokter ?></b> pasien <b><?= $data->nama_pemilik ?></b> meminta anda untuk visit ke : <b><?= $data->alamat_pemilik ?></b> untuk menangani hewan <b><?= $data->nama_hewan_steril; ?></b> </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Visit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end ikut antri -->

<!-- start modal ikut antri -->
<?php $no = 1;
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="ditanganiModal<?= $data->id_boking_steril ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo Dokter : <?= $data->nama_dokter ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/layanan_dokter/steril/updateStatusandVisitTangani/' . $data->id_boking_steril) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo dok : <b><?= $data->nama_dokter ?></b> jika sudah samapai di kediaman : <b><?= $data->nama_pemilik ?></b> di : <b><?= $data->alamat_pemilik ?></b> segera tangani hewan : <b><?= $data->nama_hewan_steril; ?></b> </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tangani</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end ikut antri -->

<!-- start modal ikut antri -->
<?php $no = 1;
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="VisitSelesaiModal<?= $data->id_boking_steril ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo Dokter : <?= $data->nama_dokter ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/layanan_dokter/steril/updateStatusandVisitCatatanMedis/' . $data->id_boking_steril) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo dok : <b><?= $data->nama_dokter ?></b> jika hewan : <b><?= $data->nama_hewan_steril; ?></b> sudah ditangani silahkan konfirmasi </label>
                        </div>
                        <div class="form-group">
                            <textarea name="keterangan_tambahan_steril" id="keterangan_tambahan_steril" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end ikut antri -->