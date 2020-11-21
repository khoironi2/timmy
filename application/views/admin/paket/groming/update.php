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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Form update groming
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/paket/groming/update/' . $groming['id_paket_groming']); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_paket_groming" value="<?= $groming['id_paket_groming'] ?>">
                            <div class="form-group">
                                <label for="nama_paket_groming">Nama Paket Groming</label>
                                <input type="text" class="form-control" id="nama_paket_groming" name="nama_paket_groming" required value="<?= $groming['nama_paket_groming']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="keterangan_paket_groming">Keterangan Paket Groming</label>
                                <input type="text" class="form-control" id="keterangan_paket_groming" name="keterangan_paket_groming" required value="<?= $groming['keterangan_paket_groming']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="harga_paket_groming">Harga Paket Groming</label>
                                <input type="text" class="form-control" id="harga_paket_groming" name="harga_paket_groming" required value="<?= $groming['harga_paket_groming']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="gambar_paket_groming">Gambar</label>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img class="img-thumbnail" src="<?= base_url('assets/img/paket/groming/' . $groming['gambar_paket_groming']); ?>" alt="">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar_paket_groming" name="gambar_paket_groming">
                                            <label class="custom-file-label" for="gambar_paket_groming">Choose file</label>
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

    