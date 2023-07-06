<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

                        <div class="row">

                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Node</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                <?php foreach ($fibernode as $item) { ?>
     <div class="card-body<?= $item['node']; ?>">
         <div class="modal-dialog" role="document">
                 </div>
                 <div class="modal-body" >
                     <form role="form" enctype="multipart/form-data" action="<?= site_url('View_Dashboard/view_data'); ?>" method="POST">
                         <label for="node" class="col-form-label">Node :</label>
                         <label for="node" class="col-form-label"><?= $item['node'] ?></label>
                         <div class="form-group">
                             <label for="fiber_desc" class="col-form-label">Fiber Desc :</label>
                             <label for="fiber_desc" class="col-form-label"><?= $item['fiber_desc'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="class" class="col-form-label">Class :</label>
                             <label for="class" class="col-form-label"><?= $item['class'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="hub" class="col-form-label">HUB :</label>
                             <label for="hub" class="col-form-label"><?= $item['hub'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="hub_desc" class="col-form-label">HUB Desc :</label>
                             <label for="hub_desc" class="col-form-label"><?= $item['hub_desc'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="city_town" class="col-form-label">City Town :</label>
                             <label for="city_town" class="col-form-label"><?= $item['city_town'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="ftax" class="col-form-label">FTAX :</label>
                             <label for="ftax" class="col-form-label"><?= $item['ftax'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="ftax_desc" class="col-form-label">Ftax Desc :</label>
                             <label for="ftax_desc" class="col-form-label"><?= $item['ftax_desc'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="rel_tsell" class="col-form-label">Ready To Sell :</label>
                             <label for="rel_tsell" class="col-form-label"><?= $item['rel_tsell'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="hp_all" class="col-form-label">HP All :</label>
                             <label for="hp_all" class="col-form-label"><?= $item['hp_all'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="act_payall" class="col-form-label">ACT PAY All :</label>
                             <label for="act_payall" class="col-form-label"><?= $item['act_payall'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="pen_payall" class="col-form-label">Penetration Pay All :</label>
                             <label for="pen_payall" class="col-form-label"><?= $item['pen_payall'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="pen_all" class="col-form-label">Penetration All :</label>
                             <label for="pen_all" class="col-form-label"><?= $item['pen_all'] ?></label>
                         </div>
                          <div class="form-group">
                             <label for="avg_rateall" class="col-form-label">Average Rate All :</label>
                             <label for="penavg_rateall_all" class="col-form-label"><?= $item['avg_rateall'] ?></label>
                         </div>
                         <div class="form-group">
                             <label for="revenue" class="col-form-label">Revenue :</label>
                             <label for="revenue" class="col-form-label"><?= $item['revenue'] ?></label>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 <?php } ?>

                                </div>

                                <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan VIP</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                <?php foreach ($fibernode as $item) { ?>
     <div class="card-body<?= $item['node']; ?>">
         <div class="modal-dialog" role="document">
                 </div>
                              <div class="table-responsive">
                 <table class="table table-bordered" width="80%" cellspacing="100">
                     <thead>
                         <tr>
                             <th style="text-align: center;">Site ID</th>
                             <th style="text-align: center;">No Acc</th>
                             <th style="text-align: center;">Node</th>
                             <th style="text-align: center;">First Name</th>
                             <th style="text-align: center;">Last Name</th>
                             <th style="text-align: center;">Phone</th>
                             <th style="text-align: center;">Email</th>
                             <th style="text-align: center;">Alamat Pemasangan</th>
                             <th style="text-align: center;">Company</th>
                             <th style="text-align: center;">Position</th>
                             <th style="text-align: center;">Paket VIP</th>
                             <th style="text-align: center;">Masa VIP</th>
                             <th style="text-align: center;">Requestor</th>
                             <th style="text-align: center;">End Date</th>
                             <th style="text-align: center;">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($fibernode as $item) {
                                $date = $item['end_date'];
                                $dateformat_database = date("d M Y", strtotime($date));
                            ?>
                             <tr>
                                 <td><?= $item['site_id'] ?></td>
                                 <td><?= $item['no_acc'] ?></td>
                                 <td><?= $item['node'] ?></td>
                                 <td><?= $item['fname'] ?></td>
                                 <td><?= $item['lname'] ?></td>
                                 <td><?= $item['mphone'] ?></td>
                                 <td><?= $item['email'] ?></td>
                                 <td><?= $item['alamat'] ?></td>
                                 <td><?= $item['company'] ?></td>
                                 <td><?= $item['position'] ?></td>
                                 <td><?= $item['paket'] ?></td>
                                 <td><?= $item['masa_vip'] ?></td>
                                 <td><?= $item['requestor'] ?></td>
                                 <td><?= $dateformat_database ?></td>
                                 <td style="text-align: center;">
                                     <!-- Tombol Edit -->
                                     <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-data<?= $item['site_id'] ?>">
                                         <span btn-icon-left>
                                             <i class="fa fa-edit"></i>
                                         </span>
                                         Edit</button>
                                     &emsp;
                                     <!-- Tombol Hapus -->
                                     <button onclick="delete_repositori_ajax(<?= $item['site_id'] ?>)" type="submit" class="btn btn-danger btn-sm">
                                         <span btn-icon-left>
                                             <i class="fa fa-trash"></i>
                                         </span>
                                         Hapus</button>
                                 </td>
                             </tr>
                         <?php
                            }
                            ?>
                     </tbody>
                 </table>
             </div>
             </div>
         </div>
     </div>
 <?php } ?>

                                </div>
                            </div>
                        </div>

                    </div>



    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_surat_masuk ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-download fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_surat_keluar ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-upload fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div class="row">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kwitansi CR</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_surat_keterangan_ahli_waris ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proposal CR</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_surat_proposal ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->