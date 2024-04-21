       <!-- Begin Page Content -->
       <div class="container-fluid">


           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-white">FORM <b>PEMINJAMAN</b> </h6>
               </div>
               <div class="card-header py-3">
                   <?= $this->session->flashdata('message'); ?>
               </div>
               <div class="card-body">
                   <div class="">
                       <table class="table table-bordered text-center text-gray-900" id="dataTable" width="100%" cellspacing="">
                           <thead class="bg-gray-200">
                               <tr>
                               <th>No</th>
                                   <th>No Tiket</th>
                                   <th>Tgl Peminjaman</th>
                                   <th>Nama Nasabah</th>
                                   <th>Jumlah Pinjaman</th>
                                   <th>Status</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tfoot class="bg-gray-200">
                               <tr>
                                   <th>No</th>
                                   <th>No Tiket</th>
                                   <th>Tgl Peminjaman</th>
                                   <th>Nama Nasabah</th>
                                   <th>Jumlah Pinjaman</th>
                                   <th>Status</th>
                                   <th>Aksi</th>
                               </tr>
                           </tfoot>
                           <tbody>
                               <?php $query = "SELECT * FROM `sf_tickets` ORDER BY id DESC ";
                                $hasil = $this->db->query($query)->result_array();
                                ?>

                               <?php $no = 1; ?>
                               <?php foreach ($hasil as $row) : ?>
                                       <tr>
                                           <td><?= $no++; ?></td>
                                           <td><?= $row['rm']; ?></td>
                                           <td><?= $row['tgl_registrasi']; ?></td>
                                           <td><?= $row['nama_nasabah']; ?></td>
                                           <td>Rp. <?= number_format($row['jumlah_pinjaman'], 0, ',', '.'); ?></td>
                                           <td>
                                               <?php if ($row['selesai'] == 'a') : ?>
                                                   <p class="btn btn-danger"> Belum Selesai</p>
                                               <?php elseif ($row['selesai'] == 'b') : ?>
                                                   <p class="btn btn-success"> Sudah Selesai</p>
                                               <?php endif; ?>
                                           </td>
                                           <td style="text-align:center;">
                                               <a href="<?= base_url(); ?>surface/preview_data/<?= $row['id']; ?>" style=" color: light-blue;" data-toggle="tooltip" data-placement="top" title="Progress"><i class="far fa-fw fa-file" aria-hidden="true"></i>
                                               </a> &nbsp;
                                               <a href="<?= base_url(); ?>/surface/hapus_data_tickets/<?= $row['id']; ?>" style=" color: red;" onclick="return confirm('apakah anda yakin?');" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fas fa-trash"></i>
                                               </a>
                                           </td>
                                       </tr>
                               <?php endforeach; ?>

                           </tbody>
                       </table>
                   </div>
               </div>
           </div>

           <!-- End of fluid -->
       </div>


       </div>
       <!-- End of Main Content -->