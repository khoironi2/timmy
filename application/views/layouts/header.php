<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title; ?></title>

    <!-- all css here -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/responsive.css">
    <script src="<?= base_url('assets/frontend') ?>/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <header class="header-area">
        <div class="header-bottom transparent-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                        <div class="logo pt-39">
                            <a href="<?= base_url(); ?>"><h4 style="font-size: x-large;">Timmy Fetcare</h4></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="<?= base_url(); ?>">HOME</a></li>
                                    <li><a href="<?= base_url('jasa'); ?>">Jasa</a></li>
                                    <li><a href="<?= base_url('jadwal'); ?>">Jadwal</a></li>
                                    <li><a href="<?= base_url('layanan'); ?>">Layanan</a></li>
                                    <li><a href="<?= base_url('syarat'); ?>">Syarat</a></li>
                                    <li><a href="<?= base_url('pengertian'); ?>">Pengertian</a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
                        <div class="search-login-cart-wrapper">

                            <div class="header-login same-style">
                                <a href="<?= base_url('auth'); ?>"><i class="icon-user icons"></i></a>
                            </div>


                        </div>
                    </div>
                    <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        <ul>
                                            <li><a href="index.html">home version 1</a></li>
                                            <li><a href="index-2.html">home version 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li>
                                                <a href="about-us.html">about us</a>
                                            </li>
                                            <li>
                                                <a href="shop-page.html">shop page</a>
                                            </li>
                                            <li>
                                                <a href="shop-list.html">shop list</a>
                                            </li>
                                            <li>
                                                <a href="product-details.html">product details</a>
                                            </li>
                                            <li>
                                                <a href="cart.html">cart page</a>
                                            </li>
                                            <li>
                                                <a href="checkout.html">checkout</a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html">wishlist</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">contact us</a>
                                            </li>
                                            <li>
                                                <a href="my-account.html">my account</a>
                                            </li>
                                            <li>
                                                <a href="login-register.html">login / register</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Food</a>
                                        <ul>
                                            <li><a href="#">Dogs Food</a>
                                                <ul>
                                                    <li><a href="shop-page.html">Grapes and Raisins</a></li>
                                                    <li><a href="shop-page.html">Carrots</a></li>
                                                    <li><a href="shop-page.html">Peanut Butter</a></li>
                                                    <li><a href="shop-page.html">Salmon fishs</a></li>
                                                    <li><a href="shop-page.html">Eggs</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Cats Food</a>
                                                <ul>
                                                    <li><a href="shop-page.html">Meat</a></li>
                                                    <li><a href="shop-page.html">Fish</a></li>
                                                    <li><a href="shop-page.html">Eggs</a></li>
                                                    <li><a href="shop-page.html">Veggies</a></li>
                                                    <li><a href="shop-page.html">Cheese</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Fishs Food</a>
                                                <ul>
                                                    <li><a href="shop-page.html">Rice</a></li>
                                                    <li><a href="shop-page.html">Veggies</a></li>
                                                    <li><a href="shop-page.html">Cheese</a></li>
                                                    <li><a href="shop-page.html">wheat bran</a></li>
                                                    <li><a href="shop-page.html">Cultivation</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">blog</a>
                                        <ul>
                                            <li>
                                                <a href="blog.html">blog page</a>
                                            </li>
                                            <li>
                                                <a href="blog-leftsidebar.html">blog left sidebar</a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">blog details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact us </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>