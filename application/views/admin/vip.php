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
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100">
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
                            foreach ($vip as $item) {
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
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <!-- MODAL -->
 <!--Modal dialog box for edit surat-->

 <?php foreach ($vip as $item) { ?>
     <div class="modal modal-primary fade" id="modal-edit-data<?= $item['site_id']; ?>">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Edit Data Pelanggan VIP</h4>
                     <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                     </button>
                 </div>
                 <div class="modal-body" >
                     <form role="form" enctype="multipart/form-data" action="<?= site_url('Vip/edit_data'); ?>" method="POST">
                         <input type="text" class="form-control" id="site_id" name="site_id" readonly value="<?= $item['site_id'] ?>" required>
                         <div class="form-group">
                             <label for="no_acc" class="col-form-label">No ACC :</label>
                             <input type="text" class="form-control" id="no_acc" name="no_acc" value="<?= $item['no_acc'] ?>" minlength="1" maxlength="100" required>
                         </div>
                          <input type="text" class="form-control" id="node" name="node" readonly value="<?= $item['node'] ?>" required>
                         <div class="form-group">
                             <label for="fname" class="col-form-label">First Name :</label>
                             <input type="text" class="form-control" id="fname" name="fname" value="<?= $item['fname'] ?>" minlength="1" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="lname" class="col-form-label">Last Name :</label>
                             <input type="text" class="form-control" id="lname" name="lname" value="<?= $item['lname'] ?>" minlength="1" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="mphone" class="col-form-label">Phone :</label>
                             <input type="text" class="form-control" id="mphone" name="mphone" value="<?= $item['mphone'] ?>" minlength="1" maxlength="15" required>
                         </div>
                         <div class="form-group">
                             <label for="email" class="col-form-label">Email :</label>
                             <input type="text" class="form-control" id="email" name="email" value="<?= $item['email'] ?>" minlength="1" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="alamat" class="col-form-label">Alamat Pemasangan :</label>
                             <textarea id="alamat" rows="4" cols="50" class="form-control" name="alamat" value="" minlength="1" maxlength="100" required><?php echo $item['alamat'] ?></textarea> 
                         </div>
                         <div class="form-group">
                             <label for="company" class="col-form-label">Company :</label>
                             <input type="text" class="form-control" id="company" name="company" value="<?= $item['company'] ?>" minlength="1" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="position" class="col-form-label">Position:</label>
                             <input type="text" class="form-control" id="position" name="position" value="<?= $item['position'] ?>" minlength="1" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="paket" class="col-form-label">Paket VIP :</label>
                             <input type="text" class="form-control" id="paket" name="paket" value="<?= $item['paket'] ?>" minlength="1" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="masa_vip" class="col-form-label">Masa VIP :</label>
                             <input type="text" class="form-control" id="masa_vip" name="masa_vip" value="<?= $item['masa_vip'] ?>" minlength="1" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="requestor" class="col-form-label">Requestor :</label>
                             <select class="form-control" name="requestor">
                                <?php foreach($vip as $v){ ?>
                            <option value="<?php echo $v['requestor']; ?>"><?php echo $v['requestor']; ?>   </option>
                                <?php } ?>
                        </select> 
                         </div>
                         <div class="form-group">
                             <label for="end_date" class="col-form-label">End Date :</label>
                             <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $item['end_date'] ?>" minlength="1" maxlength="100" required>
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
                 <h4 class="modal-title">Tambah Data Pelanggan VIP</h4>
                 <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form role="form" enctype="multipart/form-data" action="<?= site_url('Vip/tambah_data'); ?>" method="POST">
                     <div class="form-group">
                         <label for="site_id" class="col-form-label">Site ID :</label>
                         <input type="text" class="form-control" id="site_id" name="site_id" minlength="1" maxlength="10" required>
                         <?= form_error('site_id', '<small class="text-danger">', '</small>') ?>
                     </div>
                     <div class="form-group">
                         <label for="no_acc" class="col-form-label">No ACC :</label>
                         <input type="text" class="form-control" id="no_acc" name="no_acc" minlength="1" maxlength="10" required>
                     </div>
                     <div class="form-group">
                         <label for="node" class="col-form-label">Node:</label>
                         <input type="text" class="form-control" id="node" name="node" minlength="1" maxlength="10" required>
                     </div>
                     <div class="form-group">
                         <label for="fname" class="col-form-label">First Name :</label>
                         <input type="text" class="form-control" id="fname" name="fname" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="lname" class="col-form-label">Last Name :</label>
                         <input type="text" class="form-control" id="lname" name="lname" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="mphone" class="col-form-label">Phone :</label>
                         <input type="text" class="form-control" id="mphone" name="mphone" minlength="1" maxlength="15" required>
                     </div>
                     <div class="form-group">
                         <label for="email" class="col-form-label">Email :</label>
                         <input type="text" class="form-control" id="email" name="email" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="alamat" class="col-form-label">Alamat Pemasangan :</label>
                         <input type="text" class="form-control" id="alamat" name="alamat" minlength="1" maxlength="300" required>
                     </div>
                     <div class="form-group">
                         <label for="company" class="col-form-label">Company :</label>
                         <input type="text" class="form-control" id="company" name="company" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="position" class="col-form-label">Position :</label>
                         <input type="text" class="form-control" id="position" name="position" minlength="1" maxlength="50" required>
                     </div>
                     <div class="form-group">
                         <label for="paket" class="col-form-label">Paket VIP :</label>
                         <input type="text" class="form-control" id="paket" name="paket" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="mas_vip" class="col-form-label">Masa VIP :</label>
                         <input type="text" class="form-control" id="masa_vip" name="masa_vip" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="requestor" class="col-form-label">Requestor :</label>
                         <input type="text" class="form-control" id="requestor" name="requestor" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="end_date" class="col-form-label">End Date :</label>
                         <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $item['end_date'] ?>" required>
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