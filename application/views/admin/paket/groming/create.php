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
                <a href="<?= base_url('admin/paket/groming/create'); ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-business-time fa-w-20"></i>
                    </span>
                    Tambah
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Form create groming
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/paket/groming/create'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_paket_groming">Nama Paket Groming</label>
                        <input type="text" class="form-control" id="nama_paket_groming" name="nama_paket_groming" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan_paket_groming">Keterangan Paket Groming</label>
                        <input type="text" class="form-control" id="keterangan_paket_groming" name="keterangan_paket_groming" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_paket_groming">Harga Paket Groming</label>
                        <input type="text" class="form-control" id="harga_paket_groming" name="harga_paket_groming" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar_paket_groming">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_paket_groming" name="gambar_paket_groming">
                            <label class="custom-file-label" for="gambar_paket_groming">Choose file</label>
                        </div>
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
</div>
</div>