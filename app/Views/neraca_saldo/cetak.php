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
                <span>NERACA SALDO</span><br>
                <span>SISTEM ARUS KAS</span><br>
                <span>PERIODE <?= strtoupper(bulan_indo($bulane * 1)) ?> <?= $tahune ?></span><br>
            </strong></center><br><br>



        <table class="table table-hover table-bordered" border="1" width="100%" cellspacing="0">

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
                    <td style="text-align:center;"><?= $nr->kode_akun ?></td>
                    <td style="text-align:left;"><?= $nr->nama_akun ?></td>
                    <td style="text-align:right;">
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
                    <td style="text-align:right;">
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
                <td style="text-align:center;"><b>Jumlah</td></b>
                <td></td>
                <td style="text-align:right;"><b><?= rp($total_debit) ?></td></b>
                <td style="text-align:right;"><b><?= rp($total_debit) ?></td></b>

            </tr>
            </tbody>
        </table>

        <br>

    </section>



</body>



</html>