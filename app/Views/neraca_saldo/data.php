<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Neraca Saldo</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Catatan</a></div>
                <div class="breadcrumb-item">Neraca Saldo</div>
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
                                        $sesi = \Config\Services::session();
                                        @$hak = $sesi->get('data')->hak_akses;
                                        if (@$hak == 'Petugas TU') {
                                        ?>

                                            <a target="blank" href="<?= base_url('cetak_neraca_saldo/' . $bulan) ?>" class="btn btn-primary btn-xs  mb-4"><i class="fa fa-print"></i>Cetak</a>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <table class="table bordeless table-borderless " id="dataTable" width="100%" cellspacing="0">

                                        <tr>
                                            <th>Kode Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>

                                        </tr>
                                        <?php
                                        $total_debit = 0;
                                        $db = \Config\Database::connect();

                                        foreach ($neraca as $nr) {
                                        ?>
                                            <tr>
                                                <td><?= $nr->kode_akun ?></td>
                                                <td><?= $nr->nama_akun ?></td>
                                                <td>
                                                    <?php
                                                    $nominal = $db->query("SELECT SUM(debit) as deb ,SUM(kredit) as ker FROM tb_jurnal_detail LEFT JOIN tb_jurnal_header ON tb_jurnal_header.id_jurnal=tb_jurnal_detail.id_jurnal WHERE kode_akun='$nr->kode_akun' AND MONTH(tanggal)='$bulane' AND YEAR(tanggal)='$tahune'")->getRow();
                                                    $nom_deb = $nominal->deb - $nominal->ker;

                                                    if ($nom_deb < 0) {
                                                        echo rp(0);
                                                    } else {
                                                        echo rp(abs($nom_deb));
                                                        $total_debit += $nom_deb;
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($nom_deb > 0) {
                                                        echo rp(0);
                                                    } else {
                                                        echo rp(abs($nom_deb));
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                        <tr>
                                            <td><b>Jumlah</td></b>
                                            <td></td>
                                            <td><b><?= rp($total_debit) ?></td></b>
                                            <td><b><?= rp($total_debit) ?></td></b>

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
?>
<script type="text/javascript">
    $('#bulan').on('change', function() {
        window.location.href = "<?= base_url() ?>/neraca_saldo/index/" + $(this).val();
    });
</script> <!-- Footer -->