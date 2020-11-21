<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div><?= $halaman; ?></div>
        </div>
    </div>
    <br>
    <?= $this->session->flashdata('message'); ?>
</div>
<form action="<?= base_url('admin/profile/index'); ?>" method="POST" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Profile Info
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="alamat_users">Alamat</label>
                        <input type="text" class="form-control" id="alamat_users" name="alamat_users" value="<?= $user['alamat_users'] ?>">
                        <?= form_error('alamat_users', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="telepon_users">Telepon</label>
                        <input type="text" class="form-control" id="telepon_users" name="telepon_users" value="<?= $user['telepon_users'] ?>">
                        <?= form_error('telepon_users', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="facebook_users">Facebook</label>
                        <input type="text" class="form-control" id="facebook_users" name="facebook_users" value="<?= $user['facebook_users'] ?>">
                        <?= form_error('facebook_users', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="youtube_users">Youtube</label>
                        <input type="text" class="form-control" id="youtube_users" name="youtube_users" value="<?= $user['youtube_users'] ?>">
                        <?= form_error('youtube_users', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="twitter_users">Twitter</label>
                        <input type="text" class="form-control" id="twitter_users" name="twitter_users" value="<?= $user['twitter_users'] ?>">
                        <?= form_error('twitter_users', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="instagram_users">Instagram</label>
                        <input type="text" class="form-control" id="instagram_users" name="instagram_users" value="<?= $user['instagram_users'] ?>">
                        <?= form_error('instagram_users', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Image Info
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="gambar_users">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_users" name="gambar_users">
                            <label class="custom-file-label" for="gambar_users">Choose file</label>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</form>
</div>