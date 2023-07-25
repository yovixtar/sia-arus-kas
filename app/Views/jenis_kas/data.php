<?php
echo $this->include('layouts/header');
?>





<!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Data Jenis Kas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Modules</a></div>
                        <div class="breadcrumb-item">Data Jenis Kas</div>
                    </div>
                </div>

                <div class="section-body">
                   
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                
                                <button class="btn btn-primary btn-sm" style="float: right">Tambah</button>

                                <br>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Jenis Kas</th>
                                                <th>Jenis</th>
                                                <th>Keterangan</th>
                                                <th>User</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>Create a mobile app</td>
                                                <td class="align-middle">
                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                    <div class="progress-bar bg-success" data-width="100%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                </td>
                                                <td>2018-01-20</td>
                                                <td><div class="badge badge-success">Completed</div></td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>Redesign homepage</td>
                                                <td class="align-middle">
                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                                                    <div class="progress-bar" data-width="0"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                </td>
                                                <td>2018-04-10</td>
                                                <td><div class="badge badge-info">Todo</div></td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>Backup database</td>
                                                <td class="align-middle">
                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                                                    <div class="progress-bar bg-warning" data-width="70%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                </td>
                                                <td>2018-01-29</td>
                                                <td><div class="badge badge-warning">In Progress</div></td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>Input data</td>
                                                <td class="align-middle">
                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                    <div class="progress-bar bg-success" data-width="100%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                </td>
                                                <td>2018-01-16</td>
                                                <td><div class="badge badge-success">Completed</div></td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
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