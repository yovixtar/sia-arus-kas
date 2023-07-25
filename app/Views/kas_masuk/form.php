<?php
echo $this->include('layouts/header');
?>



<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kas Masuk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">SIA</a></div>
                <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
                <div class="breadcrumb-item">Kas Masuk</div>
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
                                <form action="<?= base_url('simpan_kas_masuk') ?>" method="post">
                                    <!-- <input type="hidden" name="id_kas_masuk" value="<?= @$data->id_kas_masuk ?>"> -->
                                    <div class="form-group">
                                        <label>No Transaksi</label>
                                        <input readonly type="text" class="form-control" placeholder="no transaksi" name="no_transaksi" value="<?= @$data->no_transaksi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" placeholder="tanggal" name="tanggal" value="<?= @$data->tanggal ?>" readonly>
                                    </div>


                                    <div class="form-group">
                                        <label>Sumber Kas Masuk</label>
                                        <select class="form-control" name="sumber">

                                            <option <?= @$data->sumber == 'Penjualan Seragam' ? 'selected' : '' ?>value="Penjualan Seragam">Penjualan Seragam</option>
                                            <option <?= @$data->sumber == 'Penjualan Seragam Transfer' ? 'selected' : '' ?>value="Penjualan Seragam Transfer">Penjualan Seragam Transfer</option>
                                            <option <?= @$data->sumber == 'BOS' ? 'selected' : '' ?> value="BOS">BOS</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" placeholder="Jumlah uang Masuk" name="jumlah" value="<?= @$data->jumlah ?>" required>
                                    </div>

                                    <button class="btn btn-success mr-1" type="submit">Simpan</button>
                                    <a href="<?= base_url('kas_masuk') ?>" class="btn btn-danger" type="button">Kembali</a>

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