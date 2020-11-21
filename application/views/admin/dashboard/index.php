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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Pasien Vaksin</div>
                    <!-- <div class="widget-subheading">Last year expenses</div> -->
                </div>
                <div class="widget-content-right">
                    <?php foreach ($totalvaksin as $data) : ?>
                        <div class="widget-numbers text-white"><span><?= $data->count; ?></span></div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Pasien Steril</div>
                    <!-- <div class="widget-subheading">Last year expenses</div> -->
                </div>
                <div class="widget-content-right">
                    <?php foreach ($totalsteril as $data) : ?>
                        <div class="widget-numbers text-white"><span><?= $data->count; ?></span></div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Pasien Groming</div>
                    <!-- <div class="widget-subheading">Last year expenses</div> -->
                </div>
                <div class="widget-content-right">
                    <?php foreach ($totalgroming as $data) : ?>
                        <div class="widget-numbers text-white"><span><?= $data->count; ?></span></div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Pasien Penitipan</div>
                    <!-- <div class="widget-subheading">Last year expenses</div> -->
                </div>
                <div class="widget-content-right">
                    <?php foreach ($totalpenitipan as $data) : ?>
                        <div class="widget-numbers text-white"><span><?= $data->count; ?></span></div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>