<div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(<?= base_url('assets/frontend') ?>/img/banner/auth.jpg);">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Login / Register</h2>
            <ul>
                <li><a href="<?= base_url(); ?>">home</a></li>
                <li class="text-light shadow">Login / Register</li>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <?php $errors = $this->session->flashdata('errors'); ?>
                    <?php if (!empty($errors)) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger text-center">
                                    <?php foreach ($errors as $key => $error) { ?>
                                        <?php echo "$error<br>"; ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($msg = $this->session->flashdata('error_login')) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger text-center">
                                    <?= $msg ?>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($msg = $this->session->flashdata('success_login')) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success text-center">
                                    <?= $msg ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="<?= base_url('auth/loginForm') ?>" method="post">
                                        <input type="text" name="email" id="email" placeholder="Email">
                                        <input type="password" name="password" id="password" placeholder="Password">
                                        <div class="button-box">
                                            <!-- <div class="login-toggle-btn"> -->
                                            <!-- <input type="checkbox"> -->
                                            <!-- <label>Remember me</label> -->
                                            <!-- <a href="#">Forgot Password?</a> -->
                                            <!-- </div> -->
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="<?= base_url('auth/registerForm') ?>" method="post">
                                        <input type="text" name="name" placeholder="nama lengkap">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="password" name="confrim_password" placeholder="Comfirm Password">
                                        <input name="email" placeholder="Email" type="email">
                                        <div class="button-box">
                                            <button type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>