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



        <center><strong>
                <span>
                    <h1>LAPORAN ARUS KAS</h1>
                </span> <span>
                    <h4>SIA ARUS KAS</h4>
                </span>

                <hr>
                <span>PERIODE : <?= strtoupper(bulan_indo($bulane * 1)) ?> <?= $tahune ?></span>
                <hr>

                <br>
            </strong></center>



        <table style="text-align:center;" class="table table-hover table-bordered" width="100%" cellspacing="0">
            <tr>
                <th>SALDO AWAL</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            $total_awal = 0;
            $db = \Config\Database::connect();

            foreach ($modal_awal as $ma) {
            ?>
                <tr>
                    <td style="text-align:left"><?= $ma->kode_akun ?> <?= $ma->nama_akun ?></td>
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
                <td style="text-align:left; width:300px">
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
                    <td style="text-align:left; width:300px"><?= $pk->kode_akun ?> <?= $pk->nama_akun ?></td>
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
                    <center>Total Dana Masuk Periode Ini
                </td>
                </center>
                <td></td>
                <td><b><u><?= rp(abs($total_pemasukan)) ?></td></u></b>
            </tr>
            </tbody>
        </table>
        <table style="text-align:center;" class="table table-hover table-bordered" width="100%" cellspacing="0">

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
                    <td style="text-align:left; width:300px"><?= $p->kode_akun ?> <?= $p->nama_akun ?></td>
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

        <?php
        $sesi = \Config\Services::session();
        $bend = $db->query("SELECT * FROM tb_guru_staf where hak_akses='Bendahara'")->getRow();
        $tu = $db->query("SELECT * FROM tb_guru_staf  where hak_akses='Petugas TU'")->getRow();
        $kep = $db->query("SELECT * FROM tb_guru_staf  where hak_akses='Kepala Sekolah'")->getRow();

        ?>
        <table width="100%">
            <tr align="center">
                <td width="30%">&nbsp;</td>
                <td width="30%">&nbsp;</td>
                <td width="40%">Batang, <?= date('d-m-Y') ?></td>
            </tr>

            <tr align="center">
                <td width="30%"><?= $bend->hak_akses ?></td>
                <td width="30%"><?= $tu->hak_akses ?></td>
                <td width="40%"><?= $kep->hak_akses ?></td>
            </tr>
            <tr align="center">
                <td width="30%">&nbsp;</td>
                <td width="30%">&nbsp;</td>
                <td width="40%">&nbsp;</td>
            </tr>
            <tr align="center">
                <td width="30%">&nbsp;</td>
                <td width="30%">&nbsp;</td>
                <td width="40%">&nbsp;</td>
            </tr>
            <tr align="center">
                <td width="30%"><u>(<?= $bend->nama ?>)</u> </td>
                <td width="30%"><u>(<?= $tu->nama ?>)</u> </td>
                <td width="40%"><u>(<?= $kep->nama ?>)</u> </td>
            </tr>
        </table>
    </section>



</body>



</html>