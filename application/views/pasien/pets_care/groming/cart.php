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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Info Cart
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Groming</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($this->cart->contents() as $cart) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $cart['name'] ?></td>
                                        <td>
                                            <img width="60" class="img-thumbnail" src="<?= base_url('assets/img/paket/groming/'. $cart['image']); ?>" alt="">
                                        </td>
                                        <td><?= number_format($cart['price'], 0, ',', '.'); ?></td>
                                        <td><?= $cart['qty'] ?></td>
                                        <td><?= number_format($cart['subtotal'], 0, ',', '.'); ?></td>
                                    </tr>
                                    
                                <?php endforeach; ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <h5><code>Total</code></h5>
                                        </td>
                                        <td>
                                            <h5><code>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></code></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="<?= base_url('pasien/pets_care/groming_cart/cart/destroy'); ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('pasien/pets_care/groming_cart/checkout'); ?>" class="btn btn-primary">Checkout</a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

