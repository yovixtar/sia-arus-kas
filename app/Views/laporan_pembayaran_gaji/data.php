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
                        <div class="card-body">
                            <div class="table-responsive">
                                <label>Pilih Bulan :</label>
                                <div class="row mb-5">
                                    <div class="col-md-2 font-weight-bold">
                                        <input type="month" value="<?= $bulan ?>" name="" class="form-control" id="bulan">
                                    </div>
                                    <div class="col-md-2 font-weight-bold">
                                        <?php
                                        $db = \Config\Database::connect();
                                        ?>
                                        <?php
                                        $sesi = \Config\Services::session();
                                        @$hak = $sesi->get('data')->hak_akses;
                                        if (@$hak == 'Petugas TU') {
                                        ?>
                                            <a target="blank" id="cetak-link" href="<?= base_url('cetak_laporan_gaji/index/' . $bulan) ?>" class="btn btn-primary btn-xs float-left mb-4"><i class="fa fa-print"></i>Cetak</a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <table class="table table-striped v_center" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($gaji as $g) {
                                            $keterangan = $g->keterangan;
                                            $nama = str_ireplace("gaji", "", $keterangan);
                                            $nama = trim($nama);
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= tgl_indo($g->tanggal) ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= rp($g->jumlah) ?></td>
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

<script type="text/javascript">
    $('#bulan').on('change', function() {
        window.location.href = "<?= base_url() ?>/laporan_pembayaran_gaji/index/" + $(this).val();
    });
</script>