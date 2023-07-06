 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

     <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
             <li class="breadcrumb-item">
                 <a href="<?= site_url('Dashboard_Admin') ?>">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                     <span>Dashboard</span>
                 </a>
             </li>
             <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
         </ol>
     </nav>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
         </div>
         <div class="card-body">

             <?php if ($this->session->flashdata('notification_berhasil') != '') { ?>
                 <div class="alert alert-success alert-dismissable">
                     <i class="glyphicon glyphicon-ok"></i>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $this->session->flashdata('notification_berhasil'); ?>
                 </div>
             <?php } else if ($this->session->flashdata('notification_gagal') != '') { ?>
                 <div class="alert alert-danger alert-dismissable">
                     <i class="glyphicon glyphicon-ok"></i>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $this->session->flashdata('notification_gagal'); ?>
                 </div>
             <?php } ?>

             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-data">
                 <span btn-icon-left>
                     <i class="fa fa-plus"></i> Tambah Data
                 </span>
             </button>
             <br>
             <br>

             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th style="text-align: center;">Node</th>
                             <th style="text-align: center;">Fiber Desc</th>
                             <th style="text-align: center;">Class</th>
                             <th style="text-align: center;">Hub</th>
                             <th style="text-align: center;">Hub Desc</th>
                             <th style="text-align: center;">City Town</th>
                             <th style="text-align: center;">Ftax</th>
                             <th style="text-align: center;">Ftax Desc</th>
                             <th style="text-align: center;">Ready To Sell</th>
                             <th style="text-align: center;">Homepass All</th>
                             <th style="text-align: center;">Act Pay All</th>
                             <th style="text-align: center;">Penetration Pay All</th>
                             <th style="text-align: center;">Penetration All</th>
                             <th style="text-align: center;">Avg Rate All</th>
                             <th style="text-align: center;">Revenue</th>
                             <th style="width:300px; text-align: center;">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($fibernode as $item) {
                                $date = $item['rel_tsell'];
                                $dateformat_database = date("d M Y", strtotime($date));
                            ?>
                             <tr>
                                 <td><?= $item['node'] ?></td>
                                 <td><?= $item['fiber_desc'] ?></td>
                                 <td><?= $item['class'] ?></td>
                                 <td><?= $item['hub'] ?></td>
                                 <td><?= $item['hub_desc'] ?></td>
                                 <td><?= $item['city_town'] ?></td>
                                 <td><?= $item['ftax'] ?></td>
                                 <td><?= $item['ftax_desc'] ?></td>
                                 <td><?= $dateformat_database ?></td>
                                 <td><?= $item['hp_all'] ?></td>
                                 <td><?= $item['act_payall'] ?></td>
                                 <td><?= $item['pen_payall'] ?></td>
                                 <td><?= $item['pen_all'] ?></td>
                                 <td><?= $item['avg_rateall'] ?></td>
                                 <td><?= $item['revenue'] ?></td>
                                 <td style="text-align: center;">
                                     <!-- Tombol Edit -->
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
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <!-- MODAL -->
 <!--Modal dialog box for edit surat-->

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

 <!--Modal dialog box for tambah surat-->

 <div class="modal modal-primary fade" id="modal-tambah-data">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Tambah Data Fibernode</h4>
                 <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form role="form" enctype="multipart/form-data" action="<?= site_url('Fibernode/tambah_data'); ?>" method="POST">
                     <div class="form-group">
                         <label for="node" class="col-form-label">Node :</label>
                         <input type="text" class="form-control" id="node" name="node" minlength="4" maxlength="100" required>
                         <?= form_error('node', '<small class="text-danger">', '</small>') ?>
                     </div>
                     <div class="form-group">
                         <label for="fiber_desc" class="col-form-label">Fiber Desc :</label>
                         <input type="text" class="form-control" id="fiber_desc" name="fiber_desc" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="class" class="col-form-label">Class :</label>
                         <input type="text" class="form-control" id="class" name="class" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="hub" class="col-form-label">HUB :</label>
                         <input type="text" class="form-control" id="hub" name="hub" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="hub_desc" class="col-form-label">Hub Desc :</label>
                         <input type="text" class="form-control" id="hub_desc" name="hub_desc" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="city_town" class="col-form-label">City Town :</label>
                         <input type="text" class="form-control" id="city_town" name="city_town" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="ftax" class="col-form-label">Ftax :</label>
                         <input type="text" class="form-control" id="ftax" name="ftax" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="rel_tsell" class="col-form-label">Ready To Sell :</label>
                         <input type="date" class="form-control" id="rel_tsell" name="rel_tsell" value="<?= $item['rel_tsell'] ?>" required>
                     </div>
                     <div class="form-group">
                         <label for="hp_all" class="col-form-label">HP All :</label>
                         <input type="text" class="form-control" id="hp_all" name="hp_all" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="act_payall" class="col-form-label">Act Pay All :</label>
                         <input type="text" class="form-control" id="act_payall" name="act_payall" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="pen_payall" class="col-form-label">Penetration Pay All :</label>
                         <input type="text" class="form-control" id="pen_payall" name="pen_payall" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="pen_all" class="col-form-label">Penetration All :</label>
                         <input type="text" class="form-control" id="pen_all" name="pen_all" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="avg_rateall" class="col-form-label">Average Rate All :</label>
                         <input type="text" class="form-control" id="avg_rateall" name="avg_rateall" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="revenue" class="col-form-label">Renvenue :</label>
                         <input type="text" class="form-control" id="revenue" name="revenue" minlength="4" maxlength="100" required>
                     </div>
                     <div class="modal-footer">
                         <button type="submit" value="1" name="tambah" class="btn btn-primary">Tambah Data</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <script type="text/javascript">
     function delete_repositori_ajax(id) {
         if (confirm("Anda yakin ingin menghapus data ini ?")) {
             ;
             $.ajax({
                 url: 'Surat_Proposal/delete_surat',
                 type: 'POST',
                 data: {
                     id: id
                 },
                 success: function() {
                     alert('Delete data berhasil');
                     location.reload();
                 },
                 error: function() {
                     alert('Delete data gagal');
                 }
             });
         }
     }
 </script>