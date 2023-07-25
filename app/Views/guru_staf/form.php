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

            <div class="row">
                <div class="col-6">
                    <div class="card">

                        <div class="card-body">


                            <div class="card-body">
                                <!-- <div class="alert alert-info">
                                    <b>Note!</b> Not all browsers support HTML5 type input.
                                </div> -->
                                <form action="<?= base_url('simpan_guru') ?>" method="post">
                                    <input type="hidden" name="id_guru_staf" value="<?= @$data->id_guru_staf ?>">


                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= @$data->nama ?>" required>
                                    </div>


                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= @$data->alamat ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="text" class="form-control" placeholder="No Telp" name="no_telp" value="<?= @$data->no_telp ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">

                                            <option <?= @$data->Status == 'Guru' ? 'selected' : '' ?> value="Guru">Guru</option>
                                            <option <?= @$data->Status == 'Petugas TU' ? 'selected' : '' ?> value="Petugas TU">Petugas TU</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pegawai</label>
                                        <select class="form-control" name="pegawai">

                                            <option <?= @$data->pegawai == 'Honorer' ? 'selected' : '' ?> value="Honorer">Honorer</option>
                                            <option <?= @$data->pegawai == 'PNS' ? 'selected' : '' ?> value="PNS">PNS</option>
                                        </select>
                                    </div>

                                    <?php
                                    $sesi = \Config\Services::session();
                                    $hak = $sesi->get('data')->hak_akses;

                                    if ($hak == 'Kepala Sekolah') {
                                    ?>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= @$data->username ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" placeholder="Password" name="password" value="<?= @$data->password ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Hak Akses<?= @$data->hak_akses ?> </label>
                                            <select class="form-control" name="hak_akses">
                                                <option <?= @$data->hak_akses == 'Petugas TU' ? 'selected' : '' ?> value="Petugas TU">Petugas TU</option>
                                                <option <?= @$data->hak_akses == 'Kepala Sekolah' ? 'selected' : '' ?> value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option <?= @$data->hak_akses == 'Bendahara' ? 'selected' : '' ?> value="Bendahara">Bendahara</option>
                                            </select>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-success mr-1" type="submit">Simpan</button>
                                    <a href="<?= base_url('guru_staf') ?>" class="btn btn-danger" type="button">Kembali</a>

                                </form>


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