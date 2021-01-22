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
            <?= $this->session->flashdata('message'); ?>
            <!-- <div class="alert alert-danger">ok</div> -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5><code>Total : Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></code></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 justify-content-center">
                <div class="col-md-6">
                    <code><h6 class="text-center">Lengkapi Data Dibawah Ini Untuk Melanjutkan Groming!</h6></code>
                </div>
            </div>

            <div class="row mt-4 justify-content-center">
                <div class="col-md-6">
                    <form action="<?= base_url('pasien/pets_care/groming_cart/checkout'); ?>" method="POST">
                        <div class="form-group">
                            <label for="invoices_name">Nama</label>
                            <input class="form-control" type="text" name="invoices_name" id="invoices_name">
                            <?= form_error('invoices_name', '<small class="text-danger pl-3"> ', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="invoices_tlp">No. Hp</label>
                            <input class="form-control" type="text" name="invoices_tlp" id="invoices_tlp">
                            <?= form_error('invoices_tlp', '<small class="text-danger pl-3"> ', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="invoices_address">Alamat Lengkap</label>
                            <textarea class="form-control" name="invoices_address" id="invoices_address"></textarea>
                            <?= form_error('invoices_address', '<small class="text-danger pl-3"> ', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <td>
    <h5><code>Total</code></h5>
</td>
<td>
    <h5><code>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></code></h5>
</td> -->