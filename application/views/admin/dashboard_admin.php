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
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
                                </div>
                                <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th style="text-align: center;">NODE</th>
                             <th style="text-align: center;">Fiber Desc</th>
                             <th style="text-align: center;">HUB </th>
                             <th style="text-align: center;">City </th>
                             <th style="text-align: center;">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($fibernode as $item) { ?>
                             <tr>
                                 <td><?= $item['node'] ?></td>
                                 <td><?= $item['fiber_desc'] ?></td>
                                 <td><?= $item['hub'] ?></td>
                                 <td><?= $item['city_town'] ?></td>
                                 <td style="text-align: center;">
                                     <!-- Tombol Edit -->
                                     <!-- Tombol File -->
                                     <a href="<?= site_url('View_Dashboard'.$item['node']) ?>" class="btn btn-warning btn-sm">
                                         <span btn-icon-left>
                                             <i class="fa fa-file-download"></i>
                                         </span>
                                         View</a>
                                     &emsp;                                    
                                     <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-data<?= $item['node'] ?>">
                                         <span btn-icon-left>
                                             <i class="fa fa-edit"></i>
                                         </span>
                                         Edit</button>
                                     &emsp;
                                     <!-- Tombol Hapus -->
                                     <button onclick="delete_repositori_ajax(<?= $item['node'] ?>)" type="submit" class="btn btn-danger btn-sm">
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


<?php foreach ($fibernode as $item) { ?>
     <div class="modal modal-primary fade" id="modal-edit-data<?= $item['node']; ?>">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Edit Data Fibernode</h4>
                     <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form role="form" enctype="multipart/form-data" action="<?= site_url('Fibernode/edit_data'); ?>" method="POST">
                         <input type="text" class="form-control" id="node" name="node" readonly value="<?= $item['node'] ?>" required>
                         <div class="form-group">
                             <label for="fiber_desc" class="col-form-label">Nama :</label>
                             <input type="text" class="form-control" id="fiber_desc" name="fiber_desc" value="<?= $item['fiber_desc'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="class" class="col-form-label">Class :</label>
                             <input type="text" class="form-control" id="class" name="class" value="<?= $item['class'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="hub" class="col-form-label">HUB :</label>
                             <input type="text" class="form-control" id="hub" name="hub" value="<?= $item['hub'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="hub_desc" class="col-form-label">Hub Desc :</label>
                             <input type="text" class="form-control" id="hub_desc" name="hub_desc" value="<?= $item['hub_desc'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="city_town" class="col-form-label">City Town :</label>
                             <input type="text" class="form-control" id="city_town" name="city_town" value="<?= $item['city_town'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="ftax" class="col-form-label">Ftax :</label>
                             <input type="text" class="form-control" id="ftax" name="ftax" value="<?= $item['ftax'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="rel_tsell" class="col-form-label">Rel To Sell :</label>
                             <input type="text" class="form-control" id="rel_tsell" name="rel_tsell" value="<?= $item['rel_tsell'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="hp_all" class="col-form-label">HP All :</label>
                             <input type="text" class="form-control" id="hp_all" name="hp_all" value="<?= $item['hp_all'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="act_payall" class="col-form-label">Act Pay All :</label>
                             <input type="text" class="form-control" id="act_payall" name="act_payall" value="<?= $item['act_payall'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="pen_payall" class="col-form-label">Penetration Pay All :</label>
                             <input type="text" class="form-control" id="pen_payall" name="pen_payall" value="<?= $item['pen_payall'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="pen_all" class="col-form-label">Penetration All :</label>
                             <input type="text" class="form-control" id="pen_all" name="pen_all" value="<?= $item['pen_all'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="avg_rateall" class="col-form-label">Avg Rate All :</label>
                             <input type="text" class="form-control" id="avg_rateall" name="avg_rateall" value="<?= $item['avg_rateall'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="revenue" class="col-form-label">Revenue :</label>
                             <input type="text" class="form-control" id="revenue" name="revenue" value="<?= $item['revenue'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="modal-footer">
                             <button type="submit" value="1" name="simpan" class="btn btn-primary">Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 <?php } ?>


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