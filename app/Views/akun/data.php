<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Akun</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Master</a></div>
                <div class="breadcrumb-item">Akun</div>
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
            if (!empty($_GET['hapus'])) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Data Berhasil dihapus.
                </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a href="<?= base_url('tambah_akun') ?>" class="btn btn-primary btn-sm"> Tambah Akun</a>

                            <br>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center table-bordered table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Kode Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Jenis Akun</th>
                                            <th>Saldo Awal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $dt) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $dt->kode_akun ?></td>
                                                <td><?= $dt->nama_akun ?></td>
                                                <td><?= $dt->jenis_akun ?></td>
                                                <td><?= $dt->saldo_awal ?></td>
                                                <td>
                                                    <a href="<?= base_url('edit_akun/' . $dt->id_akun) ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>


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