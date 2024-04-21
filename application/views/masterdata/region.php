       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-white">DATA <b> KELOMPOK</b> </h6>
               </div>
               <div class="card-header py-3">
                   <?= $this->session->flashdata('message'); ?>
                   <h6 class="m-0 font-weight-bold"><button class="btn btn-primary tombolTambahDataAlatBantu" data-toggle="modal" data-target="#TambahDataModal">Tambah Data</button></h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered text-center text-gray-900" id="dataTable" width="100%" cellspacing="">
                           <thead class="bg-gray-200">
                               <tr>
                                   <th>No</th>
                                   <th>Kelompok</th>
                                   <th>Nama Teknisi</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tfoot class="bg-gray-200">
                               <tr>
                               <th>No</th>
                                   <th>Kelompok</th>
                                   <th>Nama Teknisi</th>
                                   <th>Aksi</th>
                               </tr>
                           </tfoot>
                           <tbody>
                               <?php $no = 1; ?>
                               <?php foreach ($dataPemeriksaan as $row) :   ?>
                                   <tr>
                                       <td><?= $no++; ?></td>
                                       <td><?= $row['id_kelompok']; ?></td>
                                       <td><?= $row['nama_teknisi']; ?></td>
                                       <td style="text-align:center;">
                                           <a href="<?= base_url(); ?>/masterdata/ubah_kelompok/<?= $row['id']; ?>" style=" color: orange;" class="tampilModalUbahAlatBantu" data-id="<?= $row['id']; ?>" data-placement="top" title="Ubah"> <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                           </a> &nbsp;
                                           <a href="<?= base_url(); ?>/masterdata/hapus_kelompok/<?= $row['id']; ?>" style=" color: red;" onclick="return confirm('apakah anda yakin?');" data-toggle="tooltip" data-placement="top" title="DELETE"> <i class="fas fa-trash"></i>
                                           </a>
                                       </td>
                                   </tr>
                               <?php endforeach; ?>
                           </tbody>
                       </table>
                   </div>
               </div>
               </div>
           </div>
       </div>



       <!-- Modal -->
       <div class="modal fade" id="TambahDataModal" tabindex="-1" aria-labelledby="TambahDataModal" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header text-gray-900">
                       <h5 class="modal-title" id="TambahDataModalLabelAlatBantu">Tambah Data Kelompok</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <form action="<?= base_url('masterdata/region'); ?>" method="post">
                       <input type="hidden" name="id" id="id">
                       <div class="modal-body text-gray-900">
                           <div class="form-group">
                               <label for="id_kelompok">Kelompok</label>
                               <input type="text" class="form-control" id="id_kelompok" name="id_kelompok">
                               <?= form_error('id_kelompok', ' <small class="text-danger">', '</small>'); ?>
                           </div>
                           <div class="form-group">
                               <label for="nama_teknisi">Nama Teknisi</label>
                               <input type="text" class="form-control" id="nama_teknisi" name="nama_teknisi">
                               <?= form_error('nama_teknisi', ' <small class="text-danger">', '</small>'); ?>
                           </div>
                          
                           <div class="modal-footer">
                               <button type="submit" class="btn btn-primary">Save changes</button>

                           </div>
                           <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                   </form>
               </div>

           </div>
       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->