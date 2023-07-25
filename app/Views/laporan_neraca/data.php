<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Neraca</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Laporan</a></div>
                <div class="breadcrumb-item">Neraca</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <label>Pilih Bulan :</label>
                                <div class="row">
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
                                            <a target="blank" href="<?= base_url('cetak_laporan_neraca/' . $bulan) ?>" class="btn btn-primary btn-xs float-left mb-4"><i class="fa fa-print"></i>Cetak</a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <table class="table bordeless table-borderless " id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                                            <th>SALDO AWAL</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                        $total_awal = 0;

                                        foreach ($modal_awal as $ma) {
                                        ?>
                                            <tr>
                                                <td><?= $ma->kode_akun ?> <?= $ma->nama_akun ?></td>
                                                <td>
                                                    <?php
                                                    $modal_awal = $db->query("SELECT SUM(debit) as deb ,SUM(kredit) as ker FROM tb_jurnal_detail LEFT JOIN tb_jurnal_header ON tb_jurnal_header.id_jurnal=tb_jurnal_detail.id_jurnal WHERE kode_akun='$ma->kode_akun' AND MONTH(tanggal)='$bulane' AND YEAR(tanggal)='$tahune'")->getRow();
                                                    echo rp(abs($modal_awal->deb - $modal_awal->ker));
                                                    $total_awal += ($modal_awal->deb - $modal_awal->ker);


                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                        <tr>
                                            <td>
                                                <center>Jumlah Saldo Awal
                                            </td>
                                            </center>
                                            <td></td>
                                            <td><?= rp(abs($total_awal)) ?></td>
                                        </tr>



                                        <tr>
                                            <th>PEMASUKAN</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                        $jumlah_pemasukan = 0;
                                        $total_pemasukan = 0;
                                        foreach ($pemasukan as $pk) {
                                        ?>
                                            <tr>
                                                <td><?= $pk->kode_akun ?> <?= $pk->nama_akun ?></td>
                                                <td>
                                                    <?php
                                                    $nominal_pemasukan = $db->query("SELECT SUM(debit) as deb ,SUM(kredit) as ker FROM tb_jurnal_detail LEFT JOIN tb_jurnal_header ON tb_jurnal_header.id_jurnal=tb_jurnal_detail.id_jurnal WHERE kode_akun='$pk->kode_akun' AND MONTH(tanggal)='$bulane' AND YEAR(tanggal)='$tahune'")->getRow();
                                                    echo rp(abs($nominal_pemasukan->deb - $nominal_pemasukan->ker));
                                                    $jumlah_pemasukan += ($nominal_pemasukan->deb - $nominal_pemasukan->ker);
                                                    $total_pemasukan = ($total_awal + $jumlah_pemasukan);
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                        <tr>
                                            <td>
                                                <center>Jumlah Pemasukan
                                            </td>
                                            </center>
                                            <td></td>
                                            <td><u><?= rp(abs($jumlah_pemasukan)) ?></td></u>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>Total Dana Masuk UPK Periode Ini
                                            </td>
                                            </center>
                                            <td></td>
                                            <td><b><u><?= rp(abs($total_pemasukan)) ?></td></u></b>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table bordeless table-borderless" id="dataTable" width="100%" cellspacing="0">

                                        <tr>
                                            <th>PENGELUARAN</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                        $jumlah_pengeluaran = 0;
                                        $total_pengeluaran = 0;
                                        foreach ($pengeluaran as $p) {
                                        ?>
                                            <tr>
                                                <td><?= $p->kode_akun ?> <?= $p->nama_akun ?></td>
                                                <td>
                                                    <?php
                                                    $nominal_pengeluaran = $db->query("SELECT SUM(debit) as deb ,SUM(kredit) as ker FROM tb_jurnal_detail LEFT JOIN tb_jurnal_header ON tb_jurnal_header.id_jurnal=tb_jurnal_detail.id_jurnal WHERE kode_akun='$p->kode_akun' AND MONTH(tanggal)='$bulane' AND YEAR(tanggal)='$tahune' ")->getRow();
                                                    echo rp(abs($nominal_pengeluaran->deb - $nominal_pengeluaran->ker));
                                                    $jumlah_pengeluaran += ($nominal_pengeluaran->deb - $nominal_pengeluaran->ker);
                                                    $total_pengeluaran = ($total_pemasukan + $jumlah_pengeluaran);

                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                        <tr>
                                            <td>
                                                <center>Jumlah Pengeluaran
                                            </td>
                                            </center>
                                            <td></td>
                                            <td><u><?= rp(abs($jumlah_pengeluaran)) ?></td></u>
                                        </tr>

                                        <tr>
                                            <th>SALDO AKHIR</th>
                                            <th></th>
                                            <th><u><?= rp(abs($total_pengeluaran)) ?></th></u>
                                        </tr>

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
?><script type="text/javascript">
    $('#bulan').on('change', function() {
        window.location.href = "<?= base_url() ?>/laporan_neraca/index/" + $(this).val();
    });
</script> <!-- Footer -->