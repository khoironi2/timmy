<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <div class="single-slider pt-100 pb-100 yellow-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 col-sm-7">
                        <div class="slider-content slider-animated-1 pt-114">
                            <h3 class="animated">Timmy Fetcare.</h3>
                            <h1 class="animated">Tymmy Fetcare <br>Sampang</h1>
                            <div class="slider-btn">
                                <a class="animated" href="<?= base_url('/auth') ?>">GROMING NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 col-sm-5">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" src="<?= base_url('assets/frontend') ?>/images/header/unnamed-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider pt-100 pb-100 yellow-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                        <div class="slider-content slider-animated-1 pt-114">
                            <h3 class="animated">Timmy Fetcare.</h3>
                            <h1 class="animated">Tymmy Fetcare <br>Sampang</h1>
                            <div class="slider-btn">
                                <a class="animated" href="<?= base_url('/auth') ?>">GROMING NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5 col-12">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" src="<?= base_url('assets/frontend') ?>/images/header/unnamed-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="food-category food-category-col pt-100 pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="single-food-content text-center">
                    <h3>Dokter</h3>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">

            <?php foreach ($users as $user) : ?>
                <div class="col-lg-4 col-md-4">
                    <div class="single-food-category cate-padding-1 text-center mb-30">
                        <div class="single-food-hover-2">
                            <?php if (!empty($user['gambar_users'])) : ?>
                                <img src="<?= base_url('assets/img/users/' . $user['gambar_users']); ?>" alt="">
                            <?php else : ?>
                                <img src="<?= base_url('assets/frontend') ?>/img/product/product-1.jpg" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="single-food-content">
                            <h3><?= $user['name'] ?></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>