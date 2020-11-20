<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon <?= $icon; ?> icon-gradient bg-mean-fruit"></i>
                </i>
            </div>
            <div><?= $halaman; ?></div>
        </div>
        <!-- <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-business-time fa-w-20"></i>
                            </span>
                            Buttons
                        </a>
                    </div>
                </div> -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Info Antrian Pasien
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pasien</th>
                            <th scope="col">Dokter</th>
                            <th scope="col">Status</th>
                            <!-- <th scope="col">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($antrian as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['name']; ?></td>
                                <?php if ($data['status_antrian_pasien'] == 'sudah') : ?>
                                    <td><span class="badge badge-success"><?= $data['status_antrian_pasien']; ?></span></td>
                                <?php elseif ($data['status_antrian_pasien'] == 'mulai') : ?>
                                    <td><span class="badge badge-warning"><?= $data['status_antrian_pasien']; ?></span></td>
                                <?php else : ?>
                                    <td><span class="badge badge-danger"><?= $data['status_antrian_pasien']; ?></span></td>
                                <?php endif; ?>
                                <!-- <td>
                                        <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                    </td> -->
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