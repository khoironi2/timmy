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
                <a href="" class="btn-shadow btn btn-info" data-toggle="modal" data-target="#exampleModal">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-business-time fa-w-20"></i>
                    </span>
                    Buttons
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col">
            <div class="row">
                <?php foreach ($antriansteril as $data) : ?>
                    </tr>
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Antrian Steril</h5>
                            <p class="card-text"><?= $data->name; ?></p>
                            <p class="card-text"><?= $data->dokter; ?></p>
                            <p class="card-text"> <?= $data->nama_hewan_steril; ?>
                                <?= $data->nama_paket_steril; ?></p>
                            <a href="#" class="btn btn-primary"><?= $data->status_antrian_pasien; ?></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="col">
            <div class="row">
                <?php foreach ($antrianvaksin as $data) : ?>
                    </tr>
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Antrian Vaksin</h5>
                            <p class="card-text"><?= $data->name; ?></p>
                            <p class="card-text"><?= $data->dokter; ?></p>
                            <p class="card-text"> <?= $data->nama_hewan_vaksin; ?>
                                <?= $data->nama_paket_vaksin; ?></p>
                            <a href="#" class="btn btn-primary"><?= $data->status_antrian_pasien; ?></a>
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