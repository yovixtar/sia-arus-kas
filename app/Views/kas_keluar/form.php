<?php
echo $this->include('layouts/header');
?>



<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kas Keluar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
                <div class="breadcrumb-item">Kas Keluar</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">


                            <div class="card-body">
                                <!-- <div class="alert alert-info">
                                    <b>Note!</b> Not all browsers support HTML5 type input.
                                </div> -->
                                <form action="<?= base_url('simpan_kas_keluar') ?>" method="post">
                                    <!-- <input type="hidden" name="id_kas_keluar" value="<?= @$data->id_kas_keluar ?>"> -->
                                    <div class="form-group">
                                        <label>No Transaksi</label>
                                        <input readonly type="text" class="form-control" placeholder="no transaksi" name="no_transaksi" value="<?= @$data->no_transaksi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" placeholder="tanggal" name="tanggal" value="<?= @$data->tanggal ?>" readonly>
                                    </div>


                                    <div class="form-group">
                                        <label>Jenis Kas Keluar</label>
                                        <select class="form-control" name="jenis">

                                            <?php

                                            foreach ($akun_biaya as $b) :
                                            ?>
                                                <option <?= @$data->jenis == $b->nama_akun ? 'selected' : '' ?> value="<?= $b->kode_akun ?>"><?= $b->nama_akun ?></option>

                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>keterangan</label>
                                        <input type="text" class="form-control" placeholder="keterangan" name="keterangan" value="<?= @$data->keterangan ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" placeholder="Jumlah uang Keluar" name="jumlah" value="<?= @$data->jumlah ?>" required>
                                    </div>
                                    <button class="btn btn-success mr-1" type="submit">Simpan</button>
                                    <a href="<?= base_url('kas_keluar') ?>" class="btn btn-danger" type="button">Kembali</a>

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