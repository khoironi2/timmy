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
                Form update penitipan
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/paket/penitipan/update/' . $penitipan['id_paket_penitipan']); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_paket_penitipan" value="<?= $penitipan['id_paket_penitipan'] ?>">
                    <div class="form-group">
                        <label for="nama_paket_penitipan">Nama Paket penitipan</label>
                        <input type="text" class="form-control" id="nama_paket_penitipan" name="nama_paket_penitipan" required value="<?= $penitipan['nama_paket_penitipan']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="keterangan_paket_penitipan">Keterangan Paket penitipan</label>
                        <input type="text" class="form-control" id="keterangan_paket_penitipan" name="keterangan_paket_penitipan" required value="<?= $penitipan['keterangan_paket_penitipan']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="harga_paket_penitipan">Harga Paket penitipan</label>
                        <input type="text" class="form-control" id="harga_paket_penitipan" name="harga_paket_penitipan" required value="<?= $penitipan['harga_paket_penitipan']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="gambar_paket_penitipan">Gambar</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <img class="img-thumbnail" src="<?= base_url('assets/img/paket/penitipan/' . $penitipan['gambar_paket_penitipan']); ?>" alt="">
                            </div>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar_paket_penitipan" name="gambar_paket_penitipan">
                                    <label class="custom-file-label" for="gambar_paket_penitipan">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>