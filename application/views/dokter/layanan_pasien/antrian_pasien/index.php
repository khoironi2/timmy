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
<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h5 class="card-title">Antrian Steril</h5>
            <div class="row">
                <?php foreach ($antriansteril as $data) : ?>
                    </tr>
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="page-title-icon ml-4 mt-4">
                            <i class="metismenu-icon fas fa-paw icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Antrian Steril</h5>
                            <p class="card-text"><?= $data->name; ?></p>
                            <p class="card-text"><?= $data->dokter; ?></p>
                            <p class="card-text"> <?= $data->nama_hewan_steril; ?><?= $data->nama_paket_steril; ?></p>
                            <?php if ($data->status_antrian_pasien == 'sudah') : ?>
                                <span class="btn btn-warning">selesaikan pembayaran di admin</span>
                            <?php elseif ($data->status_antrian_pasien == 'belum') : ?>
                                <span class="btn btn-danger">Belum</span>
                            <?php elseif ($data->status_antrian_pasien == 'waiting') : ?>
                                <span class="btn btn-warning">Silahkan tunggu sebentar sampai anda di panggil</span>
                            <?php elseif ($data->status_antrian_pasien == 'giliran_anda') : ?>
                                <span class="btn btn-primary">Silahkan masuk ke ruangan Dokter : <b><?= $data->dokter; ?></b></span>
                            <?php elseif ($data->status_antrian_pasien == 'mulai') : ?>
                                <span class="btn btn-warning">peliharan sedang ditangani Dokter : <b><?= $data->dokter; ?></b></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="col">
            <h5 class="card-title">Antrian Vaksin</h5>
            <div class="row">
                <?php foreach ($antrianvaksin as $data) : ?>
                    </tr>
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="page-title-icon ml-4 mt-4">
                            <i class="metismenu-icon fas fa-paw icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Antrian Vaksin</h5>
                            <p class="card-text"><?= $data->name; ?></p>
                            <p class="card-text"><?= $data->dokter; ?></p>
                            <p class="card-text"> <?= $data->nama_hewan_vaksin; ?><?= $data->nama_paket_vaksin; ?></p>
                            <?php if ($data->status_antrian_pasien == 'sudah') : ?>
                                <span class="btn btn-warning">selesaikan pembayaran di admin</span>
                            <?php elseif ($data->status_antrian_pasien == 'belum') : ?>
                                <span class="btn btn-danger">Belum</span>
                            <?php elseif ($data->status_antrian_pasien == 'waiting') : ?>
                                <span class="btn btn-warning">Silahkan tunggu sebentar sampai anda di panggil</span>
                            <?php elseif ($data->status_antrian_pasien == 'giliran_anda') : ?>
                                <span class="btn btn-primary">Silahkan masuk ke ruangan Dokter : <b><?= $data->dokter; ?></b></span>
                            <?php elseif ($data->status_antrian_pasien == 'mulai') : ?>
                                <span class="btn btn-warning">peliharan sedang ditangani Dokter : <b><?= $data->dokter; ?></b></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<hr>


</div>
</div>
</div>