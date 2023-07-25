<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Guru dan Staf</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Master</a></div>
                <div class="breadcrumb-item">Guru & Staf</div>
            </div>
        </div>

        <div class="section-body">
            <?php
            if (!empty($_GET['simpan'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Data Berhasil disimpan.
                </div>
            <?php
            }
            ?>
            <?php
            if (!empty($_GET['status'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Status Berhasil diubah.
                </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a href="<?= base_url('tambah_guru') ?>" class="btn btn-primary btn-sm" style="float:right"> Tambah </a>

                            <br>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center  table-bordered table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>

                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Status</th>
                                            <th>Pegawai</th>
                                            <?php
                                            $sesi = \Config\Services::session();
                                            $hak = $sesi->get('data')->hak_akses;

                                            if ($hak == 'Kepala Sekolah') {
                                            ?>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Hak Akses</th>
                                            <?php
                                            }
                                            ?>
                                            <th style="width: 150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $dt) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>

                                                <td><?= $dt->nama ?></td>
                                                <td><?= $dt->alamat ?></td>
                                                <td><?= $dt->no_telp ?></td>
                                                <td>
                                                    <div class="badge badge-<?= $dt->status == 'Guru' ? 'success' : 'warning' ?>"><?= $dt->status ?></div>
                                                </td>
                                                <td><?= $dt->pegawai ?></td>

                                                <?php
                                                $sesi = \Config\Services::session();
                                                $hak = $sesi->get('data')->hak_akses;

                                                if ($hak == 'Kepala Sekolah') {
                                                ?>
                                                    <td><?= $dt->username ?></td>
                                                    <td><?= $dt->password ?></td>

                                                    <td><?= $dt->hak_akses ?></td>
                                                <?php
                                                }
                                                ?>
                                                <td>
                                                    <a href="<?= base_url('edit_guru/' . $dt->id_guru_staf) ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <?php

                                                    // if ($hak == 'Kepala Sekolah') {
                                                    ?>
                                                    <a href="<?= base_url('status_guru/' . $dt->id_guru_staf . '/' . $dt->aktif) ?>" class="konfirmasi_status btn btn-sm btn-<?= $dt->aktif == 'Ya' ? 'info' : 'danger' ?>">
                                                        <i class="fa fa-refresh"></i> <?= $dt->aktif == 'Ya' ? 'Aktif' : 'Tidak Aktif' ?>
                                                    </a>
                                                    <?php
                                                    //   }
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
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