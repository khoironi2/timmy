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
                <a href="" class="btn-shadow btn btn-info">
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Form create penitipan
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/pets_care/penitipan/create'); ?>" method="POST">
                    <div class="form-group">
                        <label for="id_users_pet">Nama Pasien</label>
                        <select class="form-control select2" id="id_users_pet" name="id_users_pet" required>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['id_users']; ?>"><?= $user['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_hewan_penitipan">Nama hewan penitipan</label>
                        <input type="text" class="form-control" id="nama_hewan_penitipan" name="nama_hewan_penitipan" required>
                    </div>

                    <div class="form-group">
                        <label for="id_paket_vaksin">Paket penitipan</label>
                        <input list="data_santri" type="text" name="id_paket_penitipan" id="id_paket_penitipan" class="form-control" placeholder="paket groming" required onchange="return autofillPenitipan();">
                    </div>
                    <div class="form-group">
                        <label for="staticEmail">Jenis Paket</label>
                        <input readonly class="form-control-plaintext" type="text" id="nama_paket_penitipan" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_hari_penitipan">Jumlah hari penitipan</label>
                        <input type="number" class="form-control" id="jumlah_hari_penitipan" name="jumlah_hari_penitipan" required onchange="total()">
                    </div>

                    <div class="form-group">
                        <label for="staticEmail">Harga Perhari</label>
                        <input readonly class="form-control-plaintext" type="text" id="harga_paket_penitipan" required onchange="total()">
                    </div>

                    <div class="form-group">
                        <label for="keterangan_tambahan_steril">keterangan tambahan</label>
                        <input type="text" class="form-control" id="keterangan_tambahan_penitipan" name="keterangan_tambahan_penitipan" required>
                    </div>

                    <div class="form-group">
                        <label for="total_harga_penitipan">Total Harga</label>
                        <input type="text" class="form-control" id="total_harga_penitipan" name="total_harga_penitipan" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<datalist id="data_santri">
    <?php
    foreach ($record->result() as $b) {
        echo "<option value='$b->id_paket_penitipan'> $b->nama_paket_penitipan </option>";
    }
    ?>
</datalist>