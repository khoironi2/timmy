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
                        Form create groming
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/pets_care/groming/create'); ?>" method="POST">
                            <div class="form-group">
                                <label for="id_pasien">Nama Pasien</label>
                                <select class="form-control" id="id_pasien" name="id_pasien" required>
                                    <?php foreach ($users as $user) : ?>
                                        <option value="<?= $user['id_users']; ?>"><?= $user['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama_hewan_groming">Hewan Groming</label>
                                <input type="text" class="form-control" id="nama_hewan_groming" name="nama_hewan_groming" required>
                            </div>

                            <div class="form-group">
                                <label for="id_paket_groming">Paket Groming</label>
                                <select class="form-control" id="id_paket_groming" name="id_paket_groming" required>
                                    <?php foreach ($pakets as $paket) : ?>
                                        <option value="<?= $paket['id_paket_groming']; ?>"><?= $paket['nama_paket_groming']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                                <input type="text" class="form-control" id="total_harga_groming" name="total_harga_groming" required>
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

    