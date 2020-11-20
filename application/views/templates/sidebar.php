<div class="app-main">
    <div class="scrollbar-container">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboards</li>
                        <li>
                            <a href="<?= base_url('admin/dashboard') ?>">
                                <i class="metismenu-icon fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="app-sidebar__heading">Layanan Pasien</li>
                        <li>
                            <a href="<?= base_url('admin/layanan_pasien/antrian_pasien'); ?>">
                                <i class="metismenu-icon fas fa-pen-square"></i>
                                Antrian Pasien
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Layanan Dokter</li>
                        <li>
                            <a href="<?= base_url('admin/layanan_dokter/jadwal_dokter'); ?>">
                                <i class="metismenu-icon fas fa-calendar-alt"></i>
                                Jadwal Dokter
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/layanan_dokter/vaksin'); ?>">
                                <i class="metismenu-icon fas fa-syringe"></i>
                                Vaksin
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/layanan_dokter/steril'); ?>">
                                <i class="metismenu-icon fas fa-lungs-virus"></i>
                                Steril
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Pets Care</li>
                        <li>
                            <a href="<?= base_url('admin/pets_care/groming'); ?>">
                                <i class="metismenu-icon fas fa-paw"></i>
                                Groming
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/pets_care/penitipan'); ?>">
                                <i class="metismenu-icon fas fa-door-open"></i>
                                Penitipan
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Riwayat</li>
                        <li>
                            <a href="<?= base_url('admin/riwayat/riwayat_rekam_medis'); ?>">
                                <i class="metismenu-icon fas fa-user-md"></i>
                                Riwayat Rekam Medis
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Data Master</li>
                        <li>
                            <a href="<?= base_url('admin/paket/vaksin'); ?>">
                                <i class="metismenu-icon fas fa-dumpster"></i>
                                Paket vaksin
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/paket/steril'); ?>">
                                <i class="metismenu-icon fas fa-dumpster"></i>
                                Paket steril
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/paket/groming'); ?>">
                                <i class="metismenu-icon fas fa-dumpster"></i>
                                Paket groming
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/paket/penitipan'); ?>">
                                <i class="metismenu-icon fas fa-dumpster"></i>
                                Paket penitipan
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Settings</li>
                        <li>
                            <a href="<?= base_url('admin/profile/'); ?>">
                                <i class="metismenu-icon fas fa-user"></i>
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main__outer">
        <div class="app-main__inner">