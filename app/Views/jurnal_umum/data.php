<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jurnal Umum</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Catatan</a></div>
                <div class="breadcrumb-item">Jurnal Umum</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <label>Pilih Bulan :</label>
                                    <div class="row">
                                        <div class="col-md-2 font-weight-bold">
                                            <input type="month" value="<?= $bulan ?>" name="" class="form-control" id="bulan">
                                        </div>
                                        <div class="col-md-2 font-weight-bold">
                                            <?php
                                            $sesi = \Config\Services::session();
                                            @$hak = $sesi->get('data')->hak_akses;
                                            if (@$hak == 'Petugas TU') {
                                            ?>

                                                <a target="blank" href="<?= base_url('cetak_jurnal_umum/' . $bulan) ?>" class="btn btn-primary btn-xs  mb-4"><i class="fa fa-print"></i>Cetak</a>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <br>

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Ref</th>
                                                <th>Nama Akun</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($jurnal_umum as $key) {
                                                $db = \Config\Database::connect();

                                                $data = $db->query("SELECT * FROM tb_jurnal_detail jd LEFT JOIN tb_akun ak ON ak.kode_akun=jd.kode_akun WHERE jd.id_jurnal='$key->id_jurnal' ")->getResult();
                                            ?>
                                                <tr>
                                                    <td rowspan="<?= count($data) + 1 ?>"><?= date('d-m-Y', strtotime($key->tanggal)) ?></td>
                                                    <td rowspan="<?= count($data) + 1 ?>"><?= $key->keterangan ?></td>
                                                    <?php
                                                    $cek = explode(' ', $key->keterangan)[1];
                                                    if ($cek == 'Masuk') {
                                                        $id_transaksi = $key->id_transaksi . '/UM/' . date('m/Y', strtotime($key->tanggal));
                                                    } else {
                                                        $id_transaksi = $key->id_transaksi . '/UK/' . date('m/Y', strtotime($key->tanggal));
                                                    }
                                                    ?>

                                                    <td rowspan="<?= count($data) + 1 ?>"><?= $id_transaksi ?></td>
                                                </tr>

                                                <?php
                                                foreach ($data as $kay) {
                                                ?>
                                                    <tr>
                                                        <td><?= $kay->nama_akun ?></td>
                                                        <td><?= ($kay->debit) ?></td>
                                                        <td><?= ($kay->kredit) ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

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

        </div>
    </section>
</div>




<?php
echo $this->include('layouts/footer');
?>
<script type="text/javascript">
    $('#bulan').on('change', function() {
        window.location.href = "<?= base_url() ?>/jurnal_umum/index/" + $(this).val();
    });
</script> <!-- Footer -->