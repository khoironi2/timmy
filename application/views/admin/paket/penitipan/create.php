<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon <?= $icon; ?> icon-gradient bg-mean-fruit"></i>
                </i>
            </div>
            <div><?= $halaman; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Form create penitipan
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/paket/penitipan/create'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_paket_penitipan">Nama Paket Penitipan</label>
                        <input type="text" class="form-control" id="nama_paket_penitipan" name="nama_paket_penitipan" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan_paket_penitipan">Keterangan Paket Penitipan</label>
                        <input type="text" class="form-control" id="keterangan_paket_penitipan" name="keterangan_paket_penitipan" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_paket_penitipan">Harga Paket Penitipan</label>
                        <input type="text" class="form-control" id="harga_paket_penitipan" name="harga_paket_penitipan" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar_paket_penitipan">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_paket_penitipan" name="gambar_paket_penitipan">
                            <label class="custom-file-label" for="gambar_paket_penitipan">Choose file</label>
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