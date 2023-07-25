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

            <div class="row">
                <div class="col-6">
                    <div class="card">

                        <div class="card-body">


                            <div class="card-body">
                                <!-- <div class="alert alert-info">
                                    <b>Note!</b> Not all browsers support HTML5 type input.
                                </div> -->
                                <form action="<?= base_url('simpan_akun') ?>" method="post">
                                    <input type="hidden" name="id_akun" value="<?= @$data->id_akun ?>">
                                    <div class="form-group">
                                        <label>Kode Akun</label>
                                        <input type="text" class="form-control" placeholder="Kode Akun" name="kode_akun" value="<?= @$data->kode_akun ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Akun</label>
                                        <input type="text" class="form-control" placeholder="Nama Akun" name="nama_akun" value="<?= @$data->nama_akun ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Saldo Awal</label>
                                        <input type="text" class="form-control" placeholder="Saldo Awal" name="saldo_awal" value="<?= @$data->saldo_awal ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Akun</label>
                                        <select class="form-control" name="jenis_akun">
                                            <option <?= @$data->id_akun == 'aktiva' ? 'selected' : '' ?> value="aktiva">Aktiva</option>
                                            <option <?= @$data->id_akun == 'pasiva' ? 'selected' : '' ?>value="pasiva">Pasiva</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-success mr-1" type="submit">Simpan</button>
                                    <a href="<?= base_url('akun') ?>" class="btn btn-danger" type="button">Kembali</a>

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