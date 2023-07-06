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
                             <th style="text-align: center;">Id Doc</th>
                             <th style="text-align: center;">Node</th>
                             <th style="text-align: center;">Tanggal</th>
                             <th style="text-align: center;">Nama Project</th>
                             <th style="text-align: center;">Nama Doc</th>
                             <th style="text-align: center;">Jenis Doc</th>
                             <th style="text-align: center;">PIC</th>
                             <th style="width:300px; text-align: center;">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($edoc as $item) {
                                $date = $item['tanggal'];
                                $dateformat_database = date("d M Y", strtotime($date));
                            ?>
                             <tr>
                                 <td><?= $item['id_doc'] ?></td>
                                 <td><?= $item['node'] ?></td>
                                 <td><?= $dateformat_database ?></td>
                                 <td><?= $item['nama_project'] ?></td>
                                 <td><?= $item['nama_doc'] ?></td>
                                 <td><?= $item['jenis_edoc'] ?></td>
                                 <td><?= $item['pic'] ?></td>
                                 <td style="text-align: center;">
                                    <!-- Tombol File -->
                                     <a href="<?= base_url('assets/upload/surat_keluar/' . $item['file']) ?>" class="btn btn-warning btn-sm" target="_blank">
                                         <span btn-icon-left>
                                             <i class="fa fa-file-download"></i>
                                         </span>
                                         File</a>
                                     &emsp;
                                     <!-- Tombol Edit -->
                                     <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-data<?= $item['id_doc'] ?>">
                                         <span btn-icon-left>
                                             <i class="fa fa-edit"></i>
                                         </span>
                                         Edit</button>
                                     &emsp;
                                     <!-- Tombol Hapus -->
                                     <button onclick="delete_repositori_ajax(<?= $item['id_doc'] ?>)" type="submit" class="btn btn-danger btn-sm">
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
 <?php foreach ($edoc as $item) { ?>
     <div class="modal modal-primary fade" id="modal-edit-data<?= $item['id_doc']; ?>">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Edit Data Electronic Document</h4>
                     <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form role="form" enctype="multipart/form-data" action="<?= site_url('Edoc/edit_data'); ?>" method="POST">
                         <input type="text" class="form-control" id="id_doc" name="id_doc" readonly value="<?= $item['id_doc'] ?>">
                         <input type="text" class="form-control" id="node" name="node" readonly value="<?= $item['node'] ?>" required>
                         <div class="form-group">
                             <label for="tanggal" class="col-form-label">Tanggal :</label>
                             <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $item['tanggal'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="nama_project" class="col-form-label">Nama Project :</label>
                             <input type="text" class="form-control" id="nama_project" name="nama_project" value="<?= $item['nama_project'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="nama_doc" class="col-form-label">Nama Dokumen :</label>
                             <input type="text" class="form-control" id="nama_doc" name="nama_doc" value="<?= $item['nama_doc'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="jenis_edoc" class="col-form-label">Jenis Dokumen :</label>
                             <input type="text" class="form-control" id="jenis_edoc" name="jenis_edoc" value="<?= $item['jenis_edoc'] ?>" minlength="4" maxlength="100" required>
                         </div>
                         <div class="form-group">
                             <label for="pic" class="col-form-label">PIC :</label>
                             <input type="pic" class="form-control" id="pic" name="pic" value="<?= $item['pic'] ?>" minlength="4" maxlength="100" required>
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
                 <h4 class="modal-title">Tambah Electronic Document</h4>
                 <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form role="form" enctype="multipart/form-data" action="<?= site_url('Edoc/tambah_data'); ?>" method="POST">
                     <div class="form-group">
                         <label for="fiber_desc" class="col-form-label">Node :</label>
                         <input type="text" class="form-control" id="fiber_desc" name="fiber_desc" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="tanggal" class="col-form-label">Tanggal :</label>
                         <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $item['tanggal'] ?>" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="nama_project" class="col-form-label">Nama Project :</label>
                         <input type="text" class="form-control" id="nama_project" name="nama_project" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="nama_doc" class="col-form-label">Nama Document :</label>
                         <input type="text" class="form-control" id="nama_doc" name="nama_doc" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="jenis_edoc" class="col-form-label">Jenis Document :</label>
                         <input type="text" class="form-control" id="jenis_edoc" name="jenis_edoc" minlength="4" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="pic" class="col-form-label">PIC :</label>
                         <input type="text" class="form-control" id="pic" name="pic" minlength="1" maxlength="100" required>
                     </div>
                     <div class="form-group">
                         <label for="file" class="col-form-label">File:</label>
                         <small style="color: red;">* Wajib diisi, Maks 2Mb, Jenis File (<strong>.pdf .doc .docx .xls .xlsx .png .jpg .jpeg</strong>)</small>
                         <input type="file" id="file" name="file" required>
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