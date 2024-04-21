     <!-- Main Content -->
     <div id="content">
         <!-- Begin Page Content -->
         <div class="container-fluid">

             <div class="row">

                 <!-- Area Chart -->
                 <div class="col-xl-12 col-lg-12">
                     <div class="card shadow mb-4 ">
                         <!-- Card Header - Dropdown -->
                         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                             <h6 class="m-0 font-weight-bold text-primary">DATA PEMINJAMAN NASABAH</h6>

                         </div>
                         <!-- Card Body -->
                         <div class="card-body">
                             <table class="table table-borderless text-gray-900">
                                 <thead>
                                     <tr>
                                         <td>Nama Nasabah</td>
                                         <td><?= $getDataBarangById['nama_nasabah']; ?></td>
                                         <td>Tanggal Peminjaman</td>
                                         <td><?= $getDataBarangById['tgl_registrasi']; ?></td>
                                     </tr>
                                 </thead>
                                 
                             </table>
                         </div>
                     </div>
                 </div>





                 <!-- ----------------------------------- FORM INPUT PENGEMBALIAN ------------------------------------------   -->

                 <div class="col-xl-12 col-lg-12">
                     <div class="card shadow mb-4">
                         <!-- Card Header - Dropdown -->
                         <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                             <h6 class="m-0 font-weight-bold text-white">FORM INPUT PENGEMBALIAN</h6>
                         </div>
                         <!-- Card Body -->
                         <div class="card-body">
                             <?php if ($getDataBarangById['selesai'] == 'b') : ?>
                                 <div></div>
                             <?php else : ?>
                                 <form action="<?= base_url(''); ?>surface/preview_data/<?= $getDataBarangById['id']; ?>" method="post">
                                     <input type="hidden" name="id_registrasi" value="<?= $getDataBarangById['id']; ?>" id="">
                                     <input type="hidden" name="jumlah_pinjaman" value="<?= $getDataBarangById['jumlah_pinjaman'];?>">
                                     <input type="hidden" name="selisih" value="<?= $getDataBarangById['jumlah_pinjaman'];?>">
                                     <table class="table table-borderless text-gray-900">
                                         <thead>
                                             <tr>
                                                 
                                                     <td>Kelompok</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small" name="kelompok" id="id_alat_bantu" value="-" readonly></td>
                                                 <td><a href="" class="btn btn-primary" data-toggle="modal"  data-target=".alat_bantu_modal">Pilih <i class="fa fa-search" aria-hidden="true"></i>
                                                     </a></td>
                                                
                                             </tr>
                                         </thead>
                                         <tbody>
                                             
                                             <tr>
                                                 <td>Tanggal Pengembalian</td>
                                                 <td colspan="2"><input type="text" class="form-control bg-grey border-1 small" name="tanggal_pengembalian" value="<?= date('d F Y'); ?>" readonly ></td>
                                                 <td>Jumlah Peminjaman</td>
                                                 <td>
                                                    <input type="text" class="form-control bg-grey border-1 small"  placeholder=" Rp. <?= number_format($getDataBarangById['jumlah_pinjaman'], 0, ',', '.');?>"  readonly>
                                                   
                                                </td>
                                             </tr>
                                             <tr>
                                                 <td>Jumlah Pengembalian</td>
                                                 <td colspan="2">
                                                 <input type="text" id="formatted_jumlah_pinjaman" class="form-control bg-grey border-1 small" >
                                                <input type="hidden" id="jumlah_pinjaman" name="jumlah_pengembalian" class="form-control" >
                                                </td>
                                                
                                             </tr>
                                             <td><button class="btn btn-primary">Tambahkan</button></td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </form>
                             <?php endif; ?>
                             <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                             <!-- MODAL -->


                             <div class="modal fade bd-example-modal-lg alat_bantu_modal" id="id_alat_bantu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                     <div class="modal-content">

                                         
                                     <div class="modal-body">
                                             <table class="table table-hover text-gray-900" id="dataTable">
                                                 <thead>
                                                     <tr>
                                                        <th>Aksi</th>
                                                         <th>Kelompok</th>
                                                         <th>Nama Teknisi</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($getDataAlatBantuResult as $s) : ?>
                                                         <tr>
                                                             <td scope="row"><button type="" class="btn btn-primary" id="select" data-id="<?= $s['id']; ?>" data-alat_bantu='<?= $s['id_kelompok']; ?>'> Pilih </b utton></td>
                                                             <td><?= $s['id_kelompok']; ?></td>
                                                             <td><?= $s['nama_teknisi']; ?></td>
                                                         </tr>
                                                     <?php endforeach; ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <br> <br> <br>
             </div>
             <!-- /.container-fluid -->
         </div>
         <!-- End of Main Content -->


         <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


         <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->

             <?= $this->session->flashdata('message'); ?>
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-white">DETAIL SETORAN</h6>
                 </div>
                 <div class="card-body ">
                     <div class="row mb-2 ml-1">
                         <?php if ($getDataBarangById['selesai'] == 'a') : ?>
                             <form action="<?= base_url(); ?>surface/selesai/<?= $getDataBarangById['id']; ?>" method="POST">
                                 <input type="hidden" name="id" value="<?= $getDataBarangById['id']; ?>" id="">
                                 <button for="selesai" class="btn btn-danger mr-2" name="selesai" value="b">SELESAI</button>
                             </form>
                         <?php else : ?>

                             <a href="<?= base_url(''); ?>surface/pdf/<?= $getDataBarangById['id']; ?>" class="btn btn-primary mr-2" target="_blank"> <i class="fas fa-file-pdf"></i> Cetak</a>

                         <?php endif; ?>
                     </div>
                     <div class="table-responsive">
                         <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="">
                             <thead>
                                 <tr>
                                 <th>No</th>
                                     <th>Kelompok</th>
                                     <th>Tanggal Pengembalian</th>
                                     <th>Jumlah Pinjaman</th>
                                     <th>Jumlah Pengembalian</th>
                                     <th>Sisa Pengembalian</th>     
                                 </tr>
                             </thead>
                             <tfoot>
                                 <tr>
                                 <th>No</th>
                                     <th>Kelompok</th>
                                     <th>Tanggal Pengembalian</th>
                                     <th>Jumlah Pinjaman</th>
                                     <th>Jumlah Pengembalian</th>
                                     <th>Sisa Pengembalian</th>     
                                 </tr>
                             </tfoot>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($getDataProgressResultWithID as $row) : ?>
                                    <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $row['kelompok']; ?></td>
                                         <td><?= $row['tanggal_pengembalian']; ?></td>
                                         <td>Rp. <?= number_format($row['jumlah_pinjaman'], 0, ',', '.'); ?></td>
                                         <td>Rp. <?= number_format($row['jumlah_pengembalian'], 0, ',', '.'); ?></td>
                                         <td>Rp. <?= number_format($row['selisih'], 0, ',', '.'); ?></td>
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

     </div>
     <!-- End of Main Content -->