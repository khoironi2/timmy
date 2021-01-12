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
                    <a href="<?= base_url('pasien/pets_care/groming/create'); ?>" class="btn-shadow btn btn-info">
                        <span clss="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-business-time fa-w-20"></i>
                        </span>
                        Reservasi Grooming
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
                        Info Grooming
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Pasien</th>
                                    <th scope="col">Hewan</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Dijemput</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($groming as $data) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $data->time_create_boking_groming; ?></td>
                                        <td><?= $data->name; ?></td>
                                        <td><?= $data->nama_hewan_groming; ?></td>
                                        <td><?= $data->nama_paket_groming; ?></td>
                                        <?php if ($data->dijemput == 'ya') : ?>
                                            <td><span class="badge badge-success"><?= $data->dijemput; ?></span></td>
                                        <?php else : ?>
                                            <td><span class="badge badge-danger"><?= $data->dijemput; ?></span></td>
                                        <?php endif; ?>
                                        <td><?= $data->keterangan_tambahan_groming; ?></td>
                                        <td><?= $data->total_harga_groming; ?></td>
                                        <td>

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