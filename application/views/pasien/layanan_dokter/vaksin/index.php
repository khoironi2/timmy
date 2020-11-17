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
                                <td><?= $data->nama_hewan_vaksin; ?></td>
                                <td><?= $data->nama_paket_vaksin; ?></td>
                                <td><?= $data->nama_dokter; ?></td>
                                <td><?= $data->total_harga_vaksin; ?></td>
                                <td>
                                    <?php if ($data->status_boking_vaksin == 'sudah') : ?>
                                        <span class="badge badge-success">Selesai</span>
                                    <?php elseif ($data->status_boking_vaksin == 'belum') : ?>
                                        <a data-toggle="modal" data-target="#exampleModal<?= $data->id_boking_vaksin ?>"><span class=" badge badge-warning">Ikut Antrian</span></a>
                                        <a data-toggle="modal" data-target="#visitModal<?= $data->id_boking_vaksin ?>"><span class=" badge badge-danger">Visit Home</span></a>
                                    <?php elseif ($data->status_boking_vaksin == 'antri') : ?>
                                        <span class="badge badge-warning">Sedang Antri</span>
                                    <?php elseif ($data->status_boking_vaksin == 'visit') : ?>
                                        <span class="badge badge-warning">Dokter Sedang Bersiap Kesitu</span>
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

<!-- start area modal tambah boking vaksin -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Boking vaksin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="<?= base_url('pasien/layanan_dokter/vaksin/insert') ?>" method="POST">

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Hewan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_hewan_vaksin" class="form-control" placeholder="nama peliharaan" id="nama_hewan_vaksin" required>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_paket_vaksin" class="col-sm-2 col-form-label">Paket Vaksin</label>
                        <div class="col-sm-10">
                            <input list="data_santri" type="text" name="id_paket_vaksin" id="id_paket_vaksin" class="form-control" placeholder="paket vaksin" onchange="return autofill();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Paket</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control-plaintext" type="text" id="nama_paket_vaksin">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_dokter" class="col-sm-2 col-form-label">Dokter</label>
                        <div class="col-sm-10">
                            <select name="id_dokter_vaksin" class="form-control select2" style="width: 100%;" id="id_dokter_vaksin" required multiple>
                                <?php foreach ($dokter as $data) : ?>
                                    <option value="<?= $data['id_users']; ?>"><?= $data['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_paket_vaksin" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-10">
                            <input readonly name="total_harga_vaksin" class="form-control-plaintext" type="text" id="harga_paket_vaksin" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<datalist id="data_santri">
    <?php
    foreach ($record->result() as $b) {
        echo "<option value='$b->id_paket_vaksin'> $b->nama_paket_vaksin </option>";
    }
    ?>
</datalist>

<!-- end area modal tambah boking vaksin -->


<!-- start modal ikut antri -->
<?php $no = 1;
foreach ($boking as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?= $data->id_boking_vaksin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo <?= $data->nama_pemilik ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pasien/layanan_dokter/vaksin/updateStatusW/' . $data->id_boking_vaksin) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo kak <b><?= $data->nama_pemilik ?></b> anda kana mengikuti antrian untuk hewan kesayangan anda <b><?= $data->nama_hewan_vaksin; ?></b> </label>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>">
                            <input type="text" hidden name="id_dokter" value="<?= $data->id_dokter; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Ikut</button>
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
    <div class="modal fade" id="visitModal<?= $data->id_boking_vaksin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Halo <?= $data->nama_pemilik ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pasien/layanan_dokter/vaksin/updateStatusandVisit/' . $data->id_boking_vaksin) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Halo kak <b><?= $data->nama_pemilik ?></b> anda akan meminta tim kami untuk visit hewan kesayangan anda <b><?= $data->nama_hewan_vaksin; ?></b> </label>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>">
                            <input type="text" hidden name="id_dokter" value="<?= $data->id_dokter; ?>">
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