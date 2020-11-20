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
                <button type="button" class="btn-shadow btn btn-info" data-toggle="modal" data-target="#jadwalDokterModal">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-business-time fa-w-20"></i>
                    </span>
                    + Jadwal dokter
                </button>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Info dokter
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($dokter as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['hari']; ?></td>
                                <td><?= $data['jam_mulai']; ?></td>
                                <td><?= $data['jam_selesai']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/layanan_dokter/jadwal_dokter/update/' . $data['id_jadwal']); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Data jadwal akan terhapus.');" href="<?= base_url('admin/layanan_dokter/jadwal_dokter/destroy/' . $data['id_jadwal']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="jadwalDokterModal" tabindex="-1" role="dialog" aria-labelledby="jadwalDokterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jadwalDokterModalLabel">Jadwal dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="<?= base_url('admin/layanan_dokter/jadwal_dokter/insert') ?>" method="POST">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <select name="hari" class="form-control select2" style="width: 100%;" id="hari" required multiple>
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
                        <label for="id_dokter" class="col-sm-2 col-form-label">Dokter</label>
                        <div class="col-sm-10">
                            <select name="id_dokter" class="form-control select2" style="width: 100%;" id="id_dokter" required multiple>
                                <?php foreach ($dokterName as $data) : ?>
                                    <option value="<?= $data['id_users']; ?>"><?= $data['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
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