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
                <div class="page-title-actions">

                    <div class="d-inline-block dropdown">
                        <a href="" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-business-time fa-w-20"></i>
                            </span>
                            Buttons
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Form update jadwal dokter
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="<?= base_url('admin/layanan_dokter/jadwal_dokter/update/' . $dokter['id_jadwal']) ?>" method="POST">
                            <input type="hidden" id="id" name="id" value="<?= $dokter['id_jadwal']; ?>">
                            <div class="form-group row">
                                <label for="hari_update" class="col-sm-2 col-form-label">Hari</label>
                                <div class="col-sm-10">
                                    <select name="hari" class="form-control select2" style="width: 100%;" id="hari_update" required multiple>
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
                                <label for="id_dokter_update" class="col-sm-2 col-form-label">Dokter</label>
                                <div class="col-sm-10">
                                    <select name="id_dokter" class="form-control select2" style="width: 100%;" id="id_dokter_update" required multiple>
                                        <?php foreach ($dokterName as $data) : ?>
                                            <option value="<?= $data['id_users']; ?>"><?= $data['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>