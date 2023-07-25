<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kas Masuk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
                <div class="breadcrumb-item">Kas Masuk</div>
            </div>
        </div>

        <div class="section-body">
            <?php
            if (!empty($_GET['simpan'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Data Berhasil disimpan.
                </div>
            <?php
            }
            ?>
            <?php
            if (!empty($_GET['hapus'])) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Data Berhasil dihapus.
                </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a href="<?= base_url('tambah_kas_masuk') ?>" class="btn btn-primary btn-sm" style="float:right"> Transaksi Kas Masuk </a>

                            <br>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center  table-bordered table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>No Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Sumber Kas</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $dt) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $dt->no_transaksi ?></td>
                                                <td><?= tgl_indo($dt->tanggal) ?></td>
                                                <td>

                                                    <div class="badge badge-<?= $dt->sumber == 'BOS' ? 'success' : 'warning' ?>"> <?= $dt->sumber ?></div>

                                                </td>
                                                <td><?= rp($dt->jumlah) ?></td>

                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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