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