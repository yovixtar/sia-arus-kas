<?php
echo $this->include('layouts/header');

$db = \Config\Database::connect();

$sesi = \Config\Services::session();
$gs = $db->query("SELECT * FROM tb_guru_staf ")->getNumRows();
$km = $db->query("SELECT sum(jumlah) as total FROM tb_kas_masuk ")->getRow();
$kk = $db->query("SELECT sum(jumlah) as total FROM tb_kas_keluar ")->getRow();

?>

<!-- Start app main Content -->
<div class="main-content" style="background-image: url(<?= base_url('logo-transparent.png') ?>
);min-height: 400px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position-x: center;
    background-position-y: center;">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Guru Staf</h4>
                        </div>
                        <div class="card-body">
                            <h6><?= $gs ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kas Masuk</h4>
                        </div>
                        <div class="card-body">

                            <h6>
                                <?= rp($km->total) ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kas Keluar</h4>
                        </div>
                        <div class="card-body">
                            <h6>
                                <?= rp($kk->total) ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo Akhir</h4>
                        </div>
                        <div class="card-body">
                            <h6>
                                <?= rp($km->total - $kk->total) ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card card-statistic-1">

                    <div class="card-wrap">

                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-statistic-1">

                    <div class="card-wrap">

                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?php
echo $this->include('layouts/footer');
?>