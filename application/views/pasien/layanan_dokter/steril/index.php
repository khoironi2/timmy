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
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Orders</div>
                    <div class="widget-subheading">Last year expenses</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>1896</span></div>
                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Boking steril</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="<?= base_url('pasien/layanan_dokter/steril/insert') ?>" method="POST">

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Hewan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_hewan_steril" class="form-control" placeholder="nama peliharaan" id="nama_hewan_steril" required>
                            <input type="text" hidden name="id_users_pet" value="<?= $user['id_users'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_paket_vaksin" class="col-sm-2 col-form-label">Paket Vaksin</label>
                        <div class="col-sm-10">
                            <input list="data_santri" type="text" name="id_paket_steril" id="id_paket_steril" class="form-control" placeholder="paket vaksin" onchange="return autofillSteril();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Paket</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control-plaintext" type="text" id="nama_paket_steril">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_dokter" class="col-sm-2 col-form-label">Dokter</label>
                        <div class="col-sm-10">
                            <select name="id_dokter_steril" class="form-control select2" style="width: 100%;" id="id_dokter_vaksin" required multiple>
                                <?php foreach ($dokter as $data) : ?>
                                    <option value="<?= $data['id_users']; ?>"><?= $data['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_paket_vaksin" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-10">
                            <input readonly name="total_harga_steril" class="form-control-plaintext" type="text" id="harga_paket_steril" required>
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
        echo "<option value='$b->id_paket_steril'> $b->nama_paket_steril </option>";
    }
    ?>
</datalist>

<!-- end area modal tambah boking vaksin -->