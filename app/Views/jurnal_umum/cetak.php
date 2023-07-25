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
            size: A4
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

<body class="A4" onload="window.print()">
    <section class="sheet padding-10mm">

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
                <span>JURNAL UMUM</span><br>
                <span>SISTEM ARUS KAS</span><br>
                <span>PERIODE <?= strtoupper(bulan_indo($bulane * 1)) ?> <?= $tahune ?></span><br>
            </strong></center><br><br>



        <table style="text-align:center;" class="table table-hover table-bordered" border="1" width="100%" cellspacing="0">
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
                        <td rowspan="<?= count($data) + 1 ?>"><?= date('d/m/Y', strtotime($key->tanggal)) ?></td>
                        <td style="text-align:left" rowspan="<?= count($data) + 1 ?>"><?= $key->keterangan ?></td>
                        <?php
                        $cek = explode(' ', $key->keterangan)[1];
                        if ($cek == 'Masuk') {
                            $id_transaksi = $key->id_transaksi . '/KM/' . date('m/Y', strtotime($key->tanggal));
                        } else {
                            $id_transaksi = $key->id_transaksi . '/KK/' . date('m/Y', strtotime($key->tanggal));
                        }
                        ?>

                        <td rowspan="<?= count($data) + 1 ?>"><?= $id_transaksi ?></td>
                    </tr>

                    <?php
                    foreach ($data as $kay) {
                    ?>
                        <tr style="text-align: right;">
                            <td><?= $kay->nama_akun ?></td>
                            <td><?= rp($kay->debit) ?></td>
                            <td><?= rp($kay->kredit) ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </tbody>
        </table>

        <br>

    </section>



</body>



</html>