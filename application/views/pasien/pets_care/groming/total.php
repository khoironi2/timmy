<?php foreach ($total as $data) : ?>
    <?php if ($data->count >= '5') : ?>
        <div class="d-inline-block dropdown">
            <a class="btn-shadow btn btn-danger">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fas fa-business-time fa-w-20"></i>
                </span>
                Close Groming
            </a>
        </div>
    <?php elseif ($data->count <= '5') : ?>
        <div class="d-inline-block dropdown">
            <a href="<?= base_url('pasien/pets_care/groming/create'); ?>" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fas fa-business-time fa-w-20"></i>
                </span>
                Open Groming now
            </a>
        </div>
    <?php endif; ?>
    <!-- <h2><?= $data->count; ?></h2> -->
<?php endforeach ?>