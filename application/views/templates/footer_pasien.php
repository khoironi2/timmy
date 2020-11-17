<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                        <?= date('Y'); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script src="<?= base_url('assets/vendors') ?>/jquery-3.5.1.js"></script>
<script src="<?= base_url('assets/admin') ?>/scripts/main.js"></script>
<script src="<?= base_url('assets/vendors/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/select/select2.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();

        $('.select2').select2();
    });
</script>
<script>
    function autofill() {
        var id_paket_vaksin = document.getElementById('id_paket_vaksin').value;
        $.ajax({
            url: "<?php echo base_url('/'); ?>pasien/layanan_dokter/vaksin/cari",
            data: '&id_paket_vaksin=' + id_paket_vaksin,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('id_paket_vaksin').value = val.id_paket_vaksin;
                    document.getElementById('nama_paket_vaksin').value = val.nama_paket_vaksin;
                    document.getElementById('harga_paket_vaksin').value = val.harga_paket_vaksin;
                });
            }
        });
    }

    function total() {
        var as = parseInt(document.getElementById('berat_penjualan').value);
        var ad = parseInt(document.getElementById('harga_katalog').value);
        var jumlah_harga = as * ad;
        document.getElementById('total_penjualan').value = jumlah_harga;
    }
</script>
</body>

</html>
<!-- start area modal tambah boking vaksin -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Boking vaksin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="<?= base_url('pasien/layanan_dokter/vaksin/insert') ?>" method="POST">

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Hewan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_hewan_vaksin" class="form-control" placeholder="nama peliharaan" id="nama_hewan_vaksin" required>
                            <input type="text" hidden name="id_pasien" value="<?= $user['id_users'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_paket_vaksin" class="col-sm-2 col-form-label">Paket Vaksin</label>
                        <div class="col-sm-10">
                            <input list="data_santri" type="text" name="id_paket_vaksin" id="id_paket_vaksin" class="form-control" placeholder="paket vaksin" onchange="return autofill();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Paket</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control-plaintext" type="text" id="nama_paket_vaksin">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_dokter" class="col-sm-2 col-form-label">Dokter</label>
                        <div class="col-sm-10">
                            <select name="id_dokter_vaksin" class="form-control select2" style="width: 100%;" id="id_dokter_vaksin" required multiple>
                                <?php foreach ($dokter as $data) : ?>
                                    <option value="<?= $data['id_users']; ?>"><?= $data['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_paket_vaksin" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-10">
                            <input readonly name="total_harga_vaksin" class="form-control-plaintext" type="text" id="harga_paket_vaksin" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<datalist id="data_santri">
    <?php
    foreach ($record->result() as $b) {
        echo "<option value='$b->id_paket_vaksin'> $b->nama_paket_vaksin </option>";
    }
    ?>
</datalist>

<!-- end area modal tambah boking vaksin -->