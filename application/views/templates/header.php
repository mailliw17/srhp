<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo base_url() . 'assets/css/dashboard_admin.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/bootstrap-datepicker3.css' ?>" rel="stylesheet">

    <link href="<?php echo base_url() . 'assets/fontawesome/css/all.min.css' ?>" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src" style="margin-bottom: 27px;width:50px;background:url(../assets/img/logo1.png)">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'assets/img/logo1.png' ?>" style=" height: 50px; margin-bottom: 10px;"></a>
                </div>
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
            <div class="app-header__content">
                <div class="app-header-left">
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a href="<?php echo base_url() . 'C_GantiPassword' ?>">
                                                <button type="button" tabindex="0" class="dropdown-item">Ganti
                                                    Password</button>
                                            </a>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="#" data-toggle="modal" data-target="#logoutModal">
                                                <button type="button" tabindex="0" class="dropdown-item" color="red">Logout</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php if ($this->session->userdata('nama')) {
                                            echo $this->session->userdata('nama');
                                        }
                                        ?>
                                    </div>
                                    <div class="widget-subheading">
                                        Admin
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
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
                            <li class="app-sidebar__heading"></li>
                            <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a href="<?php echo base_url() . 'C_DashboardAdmin' ?>" class="">
                                    <i class="metismenu-icon fas fa-desktop"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="app-sidebar__heading">DPH</li>
                            <li>
                                <a href="<?php echo base_url() . 'C_UsulanDph' ?>" class="">
                                    <i class="metismenu-icon fas fa-user-plus"></i>
                                    Usulan DPH
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'C_SeleksiDph' ?>" class="">
                                    <i class="metismenu-icon fas fa-mouse-pointer"></i>
                                    Seleksi
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-users"></i>
                                    Kandidat
                                    <i class="metismenu-state-icon fas fa-caret-down"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_KandidatDph' ?>">
                                            <i class="metismenu-icon"></i>
                                            Kandidat DPH - Keseluruhan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_SuaraDph' ?>">
                                            <i class="metismenu-icon">
                                            </i>Hasil Perolehan Suara
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?php echo base_url() . 'C_PemilihDPH' ?>" class="">
                                    <i class="metismenu-icon fas fa-user-check"></i>
                                    Pemilih DPH
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Wilayah</li>
                            <li>
                                <a href="<?php echo base_url() . 'C_UsulanKetuaWilayah' ?>" class="">
                                    <i class="metismenu-icon fas fa-user-plus"></i>
                                    Usulan Ketua Wilayah
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-users"></i>
                                    Kandidat
                                    <i class="metismenu-state-icon fas fa-caret-down"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_KandidatKetuaWilayah' ?>">
                                            <i class="metismenu-icon"></i>
                                            <small>Kandidat Ketua Wilayah - Keseluruhan</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_SuaraKetuaWilayah' ?>">
                                            <i class="metismenu-icon">
                                            </i>Hasil Perolehan Suara
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="app-sidebar__heading">Lingkungan</li>
                            <li>
                                <a href="<?php echo base_url() . 'C_UsulanKetuaLingkungan' ?>" class="">
                                    <i class="metismenu-icon fas fa-user-plus"></i>
                                    Usulan Ketua Lingkungan
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-users"></i>
                                    Kandidat
                                    <i class="metismenu-state-icon fas fa-caret-down"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_KandidatKetuaLingkungan' ?>">
                                            <i class="metismenu-icon"></i>
                                            <small>Kandidat Ketua Lingkungan - Keseluruhan</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_SuaraKetuaLingkungan' ?>">
                                            <i class="metismenu-icon">
                                            </i>Hasil Perolehan Suara
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="app-sidebar__heading">Lainnya</li>
                           <!--  <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-users"></i>
                                    Atur Waktu Pemilihan
                                    <i class="metismenu-state-icon fas fa-caret-down"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_SetWaktuLingkungan' ?>">
                                            <i class="metismenu-icon"></i>
                                            <small>Pemilihan Ketua Lingkugan</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_SetWaktuLWilayah' ?>">
                                            <i class="metismenu-icon">
                                            </i><small>Pemilihan Ketua Wilayah</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() . 'C_SetWaktuLDPH' ?>">
                                            <i class="metismenu-icon">
                                            </i><small>Pemilihan DPH</small>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url() . 'C_RekapSuara' ?>">
                                    <i class="metismenu-icon fas fa-poll"></i>
                                    Rekap Suara
                                </a>
                                <a href="<?php echo base_url() . 'C_PengaturanPemilih' ?>">
                                    <i class="metismenu-icon fas fa-user-cog"></i>
                                    Pengaturan Pemilih
                                </a>
                                <a href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="metismenu-icon fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </li>
                            

                        </ul>
                    </div>
                </div>
            </div>