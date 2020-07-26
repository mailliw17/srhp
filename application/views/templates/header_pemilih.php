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
    <link href="<?php echo base_url() . 'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6ef3d425d7.js" crossorigin="anonymous"></script>
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
                                        Pemilih
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
                    <div class="logo-src" style="height:23px;width:97px;background:url(../assets/img/rsz_logo_gereja.png)">
                        <img src="<?php echo base_url() . 'assets/img/logo_gereja.png' ?>" style="width: 97px; height: 23px ">
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
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Tata Cara</li>
                            <li>
                                <a href="<?php echo base_url() . 'C_DashboardPemilih' ?>" class="">
                                    <i class="metismenu-icon far fa-question-circle"></i>
                                    Cara Pemilihan
                                </a>
                            </li>

                            <?php if ($this->session->userdata('status_lingkungan') != 'selesai' || $this->session->userdata('status_wilayah') != 'selesai' || $this->session->userdata('status_dph') != 'selesai' || $this->session->userdata('status_koor') != 'selesai') : ?>

                            <li class="app-sidebar__heading">Menu Pemilih</li>
                            <?php if ($this->session->userdata('tipe') == 1) : ?>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fas fa-user-edit"></i>
                                        DPH
                                        <i class="metismenu-state-icon fas fa-caret-down"></i>
                                    </a>
                                    <ul>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC1' ?>">
                                                <i class="metismenu-icon"></i>
                                                Wakil Ketua 2
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC71' ?>">
                                                <i class="metismenu-icon">
                                                </i>Sekretaris 1
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC72' ?>">
                                                <i class="metismenu-icon">
                                                </i>Sekretaris 2
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC73' ?>">
                                                <i class="metismenu-icon">
                                                </i>Sekretaris 3
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC81' ?>">
                                                <i class="metismenu-icon">
                                                </i>Bendahara Umum
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC82' ?>">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 1
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC83' ?>">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 2
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC84' ?>">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 3
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC85' ?>">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 4
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC2' ?>">
                                                <i class="metismenu-icon">
                                                </i>Kabid Liturgi
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC3' ?>">
                                                <i class="metismenu-icon">
                                                </i>Kabid Pelayanan Masyarakat
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC4' ?>">
                                                <i class="metismenu-icon">
                                                </i>Kabid Paguyuban dan Persaudaraan
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC5' ?>">
                                                <i class="metismenu-icon">
                                                </i>Kabid Penelitian dan Pengembangan
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC6' ?>">
                                                <i class="metismenu-icon">
                                                </i>Kabid Rumah Tangga
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?php echo base_url() . 'C_PilihC9' ?>">
                                                <i class="metismenu-icon">
                                                </i>Kabid Pewartaan
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <li>
                                <a href="<?php echo base_url() . 'C_PilihKetuaLingkungan' ?>" class="">
                                    <i class="metismenu-icon fas fa-user-edit"></i>
                                    Ketua Lingkungan
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url() . 'C_PilihKetuaWilayah' ?>" class="">
                                    <i class="metismenu-icon fas fa-user-edit"></i>
                                    Ketua Wilayah
                                </a>
                            </li>
                            <?php if($this->session->userdata('status') == 'A'): ?>
                            <li>
                                <a href="<?php echo base_url() . 'C_PilihKoorWilayah' ?>" class="">
                                    <i class="metismenu-icon fas fa-user-edit"></i>
                                    Koordinator Wilayah
                                </a>
                            </li>
                            <?php endif ;?>
                            

                        <?php endif; ?>

                            <?php if ($this->session->userdata('status_lingkungan') == 'selesai' || $this->session->userdata('status_wilayah') == 'selesai' || $this->session->userdata('status_dph') == 'selesai' || $this->session->userdata('status_koor') == 'selesai') : ?>

                            <li class="app-sidebar__heading">Hasil Pemilihan</li>

                            <?php if($this->session->userdata('tipe') == 1 && $this->session->userdata('status_dph') == 'selesai') : ?>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fas fa-poll-h"></i>
                                        DPH
                                        <i class="metismenu-state-icon fas fa-caret-down"></i>
                                    </a>
                                    <ul>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C1">
                                                <i class="metismenu-icon"></i>
                                                Wakil Ketua 2
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C71">
                                                <i class="metismenu-icon">
                                                </i>Sekretaris 1
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C72">
                                                <i class="metismenu-icon">
                                                </i>Sekretaris 2
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C73">
                                                <i class="metismenu-icon">
                                                </i>Sekretaris 3
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C81">
                                                <i class="metismenu-icon">
                                                </i>Bendahara Umum
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C82">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 1
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C83">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 2
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C84">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 3
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C85">
                                                <i class="metismenu-icon">
                                                </i>Bendahara 4
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C2">
                                                <i class="metismenu-icon">
                                                </i>Kabid Liturgi
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C3">
                                                <i class="metismenu-icon">
                                                </i>Kabid Pelayanan Masyarakat
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C4">
                                                <i class="metismenu-icon">
                                                </i>Kabid Paguyuban dan Persaudaraan
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C5">
                                                <i class="metismenu-icon">
                                                </i>Kabid Penelitian dan Pengembangan
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C6">
                                                <i class="metismenu-icon">
                                                </i>Kabid Rumah Tangga
                                            </a>
                                        </li>
                                        <li style="margin-left: -30px;">
                                            <a href="<?= base_url(); ?>C_DashboardPemilih/DPH/C9">
                                                <i class="metismenu-icon">
                                                </i>Kabid Pewartaan
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <?php endif; ?>

                                <?php if($this->session->userdata('status_lingkungan') == 'selesai') : ?>
                                <li>
                                    <a href="<?= base_url(); ?>C_DashboardPemilih/lingkungan/<?=$this->session->userdata('lingkungan'); ?>" class="">
                                        <i class="metismenu-icon fas fa-poll-h"></i>
                                        Ketua Lingkungan
                                    </a>
                                </li>
                                <?php endif; ?>

                                <?php if($this->session->userdata('status_wilayah') == 'selesai') : ?>
                                <li>
                                    <a href="<?= base_url(); ?>C_DashboardPemilih/wilayah/<?=$this->session->userdata('wilayah'); ?>" class="">
                                        <i class="metismenu-icon fas fa-poll-h"></i>
                                        Ketua Wilayah
                                    </a>
                                </li>
                                <?php endif; ?>

                                

                                <?php if($this->session->userdata('status') == 'A' && $this->session->userdata('status_koor') == 'selesai') : ?>
                                <li>
                                    <a href="<?php echo base_url() . 'C_RekapSuaraPemilih' ?>" class="">
                                        <i class="metismenu-icon fas fa-poll-h"></i>
                                        Koordinator Wilayah
                                    </a>
                                </li>
                                <?php endif; ?>

                            <?php endif; ?>

                            <li class="app-sidebar__heading">Lainnya</li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="metismenu-icon fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>