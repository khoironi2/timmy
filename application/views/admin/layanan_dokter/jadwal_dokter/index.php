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
                        <button type="button" class="btn-shadow btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-business-time fa-w-20"></i>
                            </span>
                            + Jadwal dokter
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php $errors = $this->session->flashdata('errors'); ?>

                <?php if (!empty($errors)) : ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger text-center">
                                <?php foreach ($errors as $key => $error) { ?>
                                    <?php echo "$error<br>"; ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php elseif ($msg = $this->session->flashdata('error_login')) : ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger text-center">
                                <?= $msg ?>
                            </div>
                        </div>
                    </div>

                <?php elseif ($msg = $this->session->flashdata('success_login')) : ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center">
                                <?= $msg ?>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
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
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>