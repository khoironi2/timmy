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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Form grooming now
            </div>
            <div class="card-body">
                <form autocomplete="off" action="<?= base_url('pasien/pets_care/groming/create'); ?>" method="POST">
                    <div class="form-group">
                        <input type="text" hidden name="id_pasien" id="id_pasien" value="<?= $user['id_users'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama_hewan_groming">Hewan Grooming</label>
                        <input type="text" class="form-control" id="nama_hewan_groming" name="nama_hewan_groming" required>
                    </div>
                    <div class="form-group">
                        <label for="id_paket_vaksin">Paket Grooming</label>
                        <input list="data_santri" type="text" name="id_paket_groming" id="id_paket_groming" class="form-control" placeholder="paket groming" onchange="return autofillGroming();">
                    </div>
                    <div class="form-group">
                        <label for="staticEmail">Jenis Paket</label>
                        <input readonly class="form-control-plaintext" type="text" id="nama_paket_groming">
                    </div>

                    <div class="form-group">
                        <label for="dijemput">Dijemput ?</label>
                        <select class="form-control" id="dijemput" name="dijemput" required>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan_tambahan_groming">Keterangan Tambahan</label>
                        <input type="text" class="form-control" id="keterangan_tambahan_groming" name="keterangan_tambahan_groming" required>
                    </div>

                    <div class="form-group">
                        <label for="total_harga_groming">Total Harga</label>
                        <input readonly type="text" class="form-control-plaintext" id="harga_paket_groming" name="total_harga_groming" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<datalist id="data_santri">
    <?php
    foreach ($record->result() as $b) {
        echo "<option value='$b->id_paket_groming'> $b->nama_paket_groming </option>";
    }
    ?>
</datalist>

</div>
</div>
</div>