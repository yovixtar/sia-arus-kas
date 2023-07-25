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

<body class="A4 landscape " onload="window.print()">
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
                <span>LAPORAN GAJI</span><br>
                <span>BULAN <?= strtoupper(bulan_indo(ltrim($bulane, '0'))) ?> TAHUN <?= $tahune ?></span><br>
            </strong></center><br><br>

        <table style="text-align:center;" class="table table-hover table-bordered" border="1" width="100%" cellspacing="0">
            <thead>
                <tr>

                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($gaji)) {
                    
                    echo '<tr><td colspan="3">Tidak ada data</td></tr>';
                } else {

                    $no = 1;

                    foreach ($gaji as $g) {
                        $keterangan = $g->keterangan;
                        $nama = str_ireplace("gaji", "", $keterangan);
                        $nama = trim($nama);
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $nama ?></td>
                            <td><?= rp($g->jumlah) ?></td>
                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <br />
        <?php
        $db = \Config\Database::connect();

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