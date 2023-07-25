<!DOCTYPE html>
<html>

<head>
    <title>CETAK LAPORAN </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4 landscape
        }
    </style>
    <style type="text/css">
        body {
            font-size: 12pt;
            font-family: calibri;
        }

        p {
            line-height: 2px;

        }

        .tab {
            margin-left: 20pt;
        }

        .titikdua {
            left: 120pt;
            position: absolute;
        }

        table {
            border-collapse: collapse;
        }

        table tr {
            line-height: 22px;
        }
    </style>
</head>

<body class="A4 landscape" onload="window.print()" style="padding: 20px;">
    <img src="<?= base_url() ?>/batang.png" width="90px" style="position: absolute; left: 20mm;">

    <center>
        <span style="line-height: 18pt; font-size: 14pt;">
            PEMERINTAH KABUPATEN BATANG <br>
            DINAS PENDIDIKAN DAN KEBUDAYAAN <br>
            <strong>
                SD NEGERI KALIPUCANG KULON <br> KECAMATAN BATANG <br>
            </strong>
        </span>
        <article style="line-height: 9pt; font-size: 8pt;">

            Alamat : Jl. Pajang No.36 Kalipucang Kulon Batang 51218 </article>

    </center>
    <hr style="border-bottom: 2px solid" />




    <center><strong>
            <span>BUKU BESAR</span><br>
            <span>SISTEM ARUS KAS</span><br>
            <span>PERIODE <?= strtoupper(bulan_indo($bulane * 1)) ?> <?= $tahune ?></span><br>
        </strong></center><br><br>



    <?php
    foreach ($akun as $key) {

    ?>
        <p><b>Nama Akun : <?= strtoupper($key->nama_akun) ?> [<?= $key->kode_akun ?>]</b></p>
        <table style="text-align:center;" class="table table-hover table-bordered" border="1" width="100%" cellspacing="0">
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

    <br>





</body>


</html>