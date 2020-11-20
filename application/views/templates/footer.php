</div>
</div>
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
</body>

</html>


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

    function autofillSteril() {
        var id_paket_steril = document.getElementById('id_paket_steril').value;
        $.ajax({
            url: "<?php echo base_url('/'); ?>pasien/layanan_dokter/steril/cari",
            data: '&id_paket_steril=' + id_paket_steril,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('id_paket_steril').value = val.id_paket_steril;
                    document.getElementById('nama_paket_steril').value = val.nama_paket_steril;
                    document.getElementById('harga_paket_steril').value = val.harga_paket_steril;
                });
            }
        });
    }

    function autofillGroming() {
        var id_paket_groming = document.getElementById('id_paket_groming').value;
        $.ajax({
            url: "<?php echo base_url('/'); ?>admin/pets_care/groming/cari",
            data: '&id_paket_groming=' + id_paket_groming,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('id_paket_groming').value = val.id_paket_groming;
                    document.getElementById('nama_paket_groming').value = val.nama_paket_groming;
                    document.getElementById('harga_paket_groming').value = val.harga_paket_groming;
                });
            }
        });
    }

    function autofillPenitipan() {
        var id_paket_penitipan = document.getElementById('id_paket_penitipan').value;
        $.ajax({
            url: "<?php echo base_url('/'); ?>admin/pets_care/penitipan/cari",
            data: '&id_paket_penitipan=' + id_paket_penitipan,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('id_paket_penitipan').value = val.id_paket_penitipan;
                    document.getElementById('nama_paket_penitipan').value = val.nama_paket_penitipan;
                    document.getElementById('harga_paket_penitipan').value = val.harga_paket_penitipan;
                });
            }
        });
    }

    function total() {
        var as = parseInt(document.getElementById('jumlah_hari_penitipan').value);
        var ad = parseInt(document.getElementById('harga_paket_penitipan').value);
        var jumlah_harga = as * ad;
        document.getElementById('total_harga_penitipan').value = jumlah_harga;
    }
</script>
<script type="text/javascript">
    setInterval(function() {
        auto_refresh_function();
    }, 500);

    function auto_refresh_function() {
        $('#tampil').load('http://localhost/sikph/admin/pets_care/groming/total');
    }
</script>