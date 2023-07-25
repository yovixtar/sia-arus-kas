<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Buku Besar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Catatan</a></div>
                <div class="breadcrumb-item">Buku Besar</div>
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
                                                <a target="blank" href="<?= base_url('cetak_buku_besar/' . $bulan) ?>" class="btn btn-primary btn-xs  mb-4"><i class="fa fa-print"></i>Cetak</a>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <br> <!-- menampilkan tabel buku besar -->
                                    <?php
                                    foreach ($akun as $key) {

                                    ?>
                                        <p><b>Nama Akun : <?= strtoupper($key->nama_akun) ?> [<?= $key->kode_akun ?>]</b></p>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Ref</th>
                                                    <th>Debet</th>
                                                    <th>Kredit</th>
                                                    <th>Saldo Debet</th>
                                                    <th>Saldo Kredit</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $awal = $bulan . '-01';
                                                $akhir = date('Y-m-t', strtotime($awal));
                                                $db = \Config\Database::connect();

                                                $detail = $db->query("SELECT * FROM tb_jurnal_detail jd LEFT JOIN tb_jurnal_header j ON jd.id_jurnal=j.id_jurnal WHERE jd.kode_akun = '$key->kode_akun' AND (j.tanggal BETWEEN '$awal' AND '$akhir') ORDER BY `j`.`tanggal` ASC")->getResult();

                                                $temp = 0;
                                                foreach ($detail as $det) {

                                                    $saldo = $db->query("SELECT *,SUM(jd.debit+jd.Kredit) as saldo FROM tb_jurnal_detail jd LEFT JOIN tb_jurnal_header j ON jd.id_jurnal=j.id_jurnal WHERE jd.kode_akun = '$key->kode_akun' AND j.tanggal < '$det->tanggal' ORDER BY `j`.`tanggal` ASC")->getRowArray();

                                                    $sal = $det->debit - $det->kredit + $temp;
                                                    $temp += $det->debit - $det->kredit;
                                                ?>

                                                    <tr>
                                                        <td><?= date('d-m-Y', strtotime($det->tanggal)) ?></td>
                                                        <td><?= $det->keterangan ?></td>

                                                        <?php
                                                        $cek = explode(' ', $det->keterangan)[1];
                                                        if ($cek == 'Masuk') {
                                                            $id_transaksi = $det->id_transaksi . '/KM/' . date('m/Y', strtotime($det->tanggal));
                                                        } else {
                                                            $id_transaksi = $det->id_transaksi . '/KK/' . date('m/Y', strtotime($det->tanggal));
                                                        }
                                                        ?>

                                                        <td><?= $id_transaksi ?></td>
                                                        <td align="right"><?= rp($det->debit) ?></td>
                                                        <td align="right"><?= rp($det->kredit) ?></td>
                                                        <td align="right"><?php if ($sal > 0) {
                                                                                echo rp($sal);
                                                                            } else {
                                                                                echo "-";
                                                                            } ?></td>
                                                        <td align="right"><?php if ($sal < 0) {
                                                                                echo rp(abs($sal));
                                                                            } else {
                                                                                echo "-";
                                                                            } ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>


                                    <?php } ?>
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
?><script type="text/javascript">
    $('#bulan').on('change', function() {
        window.location.href = "<?= base_url() ?>/buku_besar/index/" + $(this).val();
    });
</script> <!-- Footer -->