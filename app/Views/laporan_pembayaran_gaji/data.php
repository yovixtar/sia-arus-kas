<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan gaji</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Karyawan</th>
                                            <th>Nominal</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($gaji as $g) {

                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= tgl_indo($g->tanggal) ?></td>
                                                <td><?= count($karyawan) ?></td>
                                                <td><?= rp($g->jumlah) ?></td>
                                                <td>
                                                    <a href="<?= base_url('cetak_laporan_gaji/' . $g->id_kas_keluar) ?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i>Cetak</a>
                                                </td>
                                            </tr>

                                        <?php
                                        }
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