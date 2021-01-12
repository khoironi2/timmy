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
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                Form rekam medis
            </div>
            <div class="card-body">
                <form action="<?= base_url('dokter/layanan_pasien/rekam_medis/create'); ?>" method="POST">
                    <div class="form-group">
                        <label for="pemilik">Nama Pemilik</label>
                        <input type="text" class="form-control" name="pemilik" id="pemilik">
                        <?= form_error('pemilik', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="pemeliharaan">Nama Pemeliharaan</label>
                        <input type="text" class="form-control" name="pemeliharaan" id="pemeliharaan">
                        <?= form_error('pemeliharaan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" name="catatan" id="catatan"></textarea>
                        <?= form_error('catatan', '<small class="text-danger">', '</small>'); ?>
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