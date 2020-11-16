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


<script src="<?= base_url('assets/admin') ?>/scripts/main.js"></script>
<script>
    $('#id_users').select2();
</script>
</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jadwal dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="<?= base_url('admin/layanan_dokter/jadwal_dokter/insert') ?>" method="POST">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <select name="hari" class="form-control" id="hari" required>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                                <option value="minggu">Minggu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col">
                            <input type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai" required>
                        </div>
                        <div class="col">
                            <input type="time" name="jam_selesai" class="form-control" placeholder="Jam Tutup" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_dokter" class="form-control" id="inputPassword" required>
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