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
                            <th scope="col">Hari</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Dokter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $data->hari; ?></td>
                                <td><?= $data->jam_mulai; ?></td>
                                <td><?= $data->jam_selesai; ?></td>
                                <td><?= $data->name; ?></td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>