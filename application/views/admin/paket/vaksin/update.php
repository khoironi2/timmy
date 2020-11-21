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
                Form update vaksin
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/paket/vaksin/update/' . $vaksin['id_paket_vaksin']); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_paket_vaksin" value="<?= $vaksin['id_paket_vaksin'] ?>">
                    <div class="form-group">
                        <label for="nama_paket_vaksin">Nama Paket vaksin</label>
                        <input type="text" class="form-control" id="nama_paket_vaksin" name="nama_paket_vaksin" required value="<?= $vaksin['nama_paket_vaksin']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="keterangan_paket_vaksin">Keterangan Paket vaksin</label>
                        <input type="text" class="form-control" id="keterangan_paket_vaksin" name="keterangan_paket_vaksin" required value="<?= $vaksin['keterangan_paket_vaksin']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="harga_paket_vaksin">Harga Paket vaksin</label>
                        <input type="text" class="form-control" id="harga_paket_vaksin" name="harga_paket_vaksin" required value="<?= $vaksin['harga_paket_vaksin']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="gambar_paket_vaksin">Gambar</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <img class="img-thumbnail" src="<?= base_url('assets/img/paket/vaksin/' . $vaksin['gambar_paket_vaksin']); ?>" alt="">
                            </div>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar_paket_vaksin" name="gambar_paket_vaksin">
                                    <label class="custom-file-label" for="gambar_paket_vaksin">Choose file</label>
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