<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem Arus Kas</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="layout-4">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div> -->

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <?php
                $sesi = \Config\Services::session();
                $hak = $sesi->get('data')->hak_akses;
                $db = \Config\Database::connect();
                $request = \Config\Services::request();
                @$ur = @$request->uri->getSegment(1);


                $ur3 = $request->uri->setSilent()->getSegment(3);
                $dt = $db->query("SELECT * FROM tb_guru_staf WHERE id_guru_staf='" . $sesi->get('data')->id_guru_staf . "'")->getRow();

                ?>

                <ul class="navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('l.png') ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= $dt->nama ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Hak Akses <?= @$dt->hak_akses ?></div>

                            <a href="<?= base_url('profile') ?>" class="dropdown-item has-icon"><i class="fas fa-cog"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger konfirmasi_logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Start main left sidebar menu -->
            <div class="main-sidebar sidebar-style-3">
                <aside id="sidebar-wrapper" style="overflow-y: hidden;">
                    <div class="sidebar-brand">
                        <a href="#">SIA ARUS KAS</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">CP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?php

                        if ($hak == 'Kepala Sekolah' || $hak == 'Petugas TU') {
                        ?>


                            <li>
                                <a href="<?= base_url('dashboard') ?>" class="nav-link"><i class="fas fa-dsd"></i> <span>Dashboard</span></a>
                            </li>
                            <li class="menu-header">MASTER</li>
                        <?php
                        }
                        ?>
                        <?php

                        if ($hak == 'Petugas TU') {
                        ?>
                            <li><a class="nav-link" href="<?= base_url('akun') ?>"><i class="fa caret-right"></i> <span>Akun</span></a></li>
                        <?php
                        }
                        ?>
                        <?php

                        if ($hak == 'Kepala Sekolah' || $hak == 'Petugas TU') {
                        ?>
                            <li><a class="nav-link" href="<?= base_url('guru_staf') ?>"><i class="fa caret-right"></i> <span>
                                        <?php

                                        if ($hak == 'Kepala Sekolah') {
                                        ?>

                                            User
                                        <?php
                                        } else {
                                        ?>
                                            Guru & Staf
                                        <?php
                                        }
                                        ?>
                                    </span></a></li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($hak == 'Petugas TU') {
                        ?>
                            <li class="menu-header">TRANSAKSI</li>

                            <li><a class="nav-link" href="<?= base_url('kas_masuk') ?>"><i class="fa caret-right"></i> <span>Kas Masuk</span></a></li>
                            <li><a class="nav-link" href="<?= base_url('kas_keluar') ?>"><i class="fa caret-right"></i> <span>Kas Keluar</span></a></li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($hak == 'Petugas TU' || $hak == 'Bendahara' || $hak == 'Kepala Sekolah') {
                        ?>
                            <li class="menu-header">Catatan Akuntansi</li>

                            <li><a class="nav-link" href="<?= base_url('jurnal_umum/index/' . date('Y-m')) ?>"><i class="fa caret-right"></i> <span>Jurnal Umum</span></a></li>
                            <li><a class="nav-link" href="<?= base_url('buku_besar/index/' . date('Y-m')) ?>"><i class="fa caret-right"></i> <span>Buku Besar</span></a></li>

                            <li><a class="nav-link" href="<?= base_url('neraca_saldo/index/' . date('Y-m')) ?>"><i class="fa caret-right"></i> <span>Neraca Saldo</span></a></li>

                            <li class="menu-header">Laporan Keuangan</li>

                            <li><a class="nav-link" href="<?= base_url('laporan_arus_kas/index/' . date('Y-m')) ?>"><i class="fa caret-right"></i> <span>Laporan Arus Kas</span></a></li>
                            <li><a class="nav-link" href="<?= base_url('laporan_neraca/index/' . date('Y-m')) ?>"><i class="fa caret-right"></i> <span>Laporan Neraca</span></a></li>

                            <li><a class="nav-link" href="<?= base_url('laporan_pembayaran_gaji/index/' . date('Y-m')) ?>"><i class="fa caret-right"></i> <span>Laporan Pembayaran Gaji</span></a></li>
                        <?php
                        }
                        ?>
                        <br>
                        <br>
                        <br>

                </aside>
            </div>