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
                             <h6 class="m-0 font-weight-bold text-primary">DATA PEMINJAMAN BARANG</h6>

                         </div>
                         <!-- Card Body -->
                         <div class="card-body">
                             <table class="table table-borderless text-gray-900">
                                 <thead>
                                     <tr>
                                         <td>Nomor Tiket</td>
                                         <td><?= $getDataBarangById['rm']; ?></td>
                                         <td>Tanggal Peminjaman</td>
                                         <td><?= $getDataBarangById['tgl_registrasi']; ?></td>
                                     </tr>
                                 </thead>
                                 
                             </table>
                         </div>
                     </div>
                 </div>





                 <!-- ----------------------------------- FORM INPUT PEMERIKSAAN ------------------------------------------   -->

                 <div class="col-xl-12 col-lg-12">
                     <div class="card shadow mb-4">
                         <!-- Card Header - Dropdown -->
                         <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                             <h6 class="m-0 font-weight-bold text-white">FORM INPUT BARANG</h6>
                         </div>
                         <!-- Card Body -->
                         <div class="card-body">
                             <?php if ($getDataBarangById['selesai'] == 'b') : ?>
                                 <div></div>
                             <?php else : ?>
                                 <form action="<?= base_url(''); ?>surface/preview_data/<?= $getDataBarangById['id']; ?>" method="post">
                                     <input type="hidden" name="id_registrasi" value="<?= $getDataBarangById['id']; ?>" id="">
                                     <table class="table table-borderless text-gray-900">
                                         <thead>
                                             <tr>
                                                 <td>Alat Ukur</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small" name="alat_ukur" id="id_alat_ukur" value="-" readonly></td>
                                                 <input type="hidden" class="form-control bg-grey border-1 small" name="status" id="id_alat_ukur1" value="-" readonly>
                                                 <td><a href="" class="btn btn-primary" data-toggle="modal"  data-target=".alat_ukur_modal">Pilih <i class="fa fa-search" aria-hidden="true"></i>
                                                     </a></td>
                                                     <td>Alat Bantu</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small" name="alat_bantu" id="id_alat_bantu" value="-" readonly></td>
                                                 <td><a href="" class="btn btn-primary" data-toggle="modal"  data-target=".alat_bantu_modal">Pilih <i class="fa fa-search" aria-hidden="true"></i>
                                                     </a></td>
                                                
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>Tanggal Peminjaman</td>
                                                 <td colspan="2"><input type="text" class="form-control bg-grey border-1 small" name="tanggal_peminjaman"  value="<?= date('d F Y'); ?>" readonly></td>
                                                 <td>Jam</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small"  name="jam_peminjaman"></td>
                                             </tr>
                                             <tr>
                                                 <td>Tanggal Pengembalian</td>
                                                 <td colspan="2"><input type="text" class="form-control bg-grey border-1 small" name="tanggal_pengembalian" value="<?= date('d F Y'); ?>" readonly ></td>
                                                 <td>Jam</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small"  name="jam_pengembalian"></td>
                                             </tr>
                                             <tr>
                                                 <td>Nama Peminjam</td>
                                                 <td colspan="2"><input type="text" id="inputku" name="nama_peminjam" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control bg-grey border-1 small" autocomplete="off"></td>
                                                 <td>Jumlah</td>
                                                 <td ><input type="text" id="inputku" name="jumlah" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control bg-grey border-1 small" autocomplete="off"></td>
                                             </tr>
                                             <tr>
                                             <td><button class="btn btn-primary">Tambahkan</button></td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </form>
                             <?php endif; ?>
                             <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                             <!-- MODAL -->


                             <div class="modal fade bd-example-modal-lg alat_ukur_modal" id="id_alat_ukur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                     <div class="modal-content">

                                         <div class="modal-body">
                                             <table class="table table-hover text-gray-900" id="dataTable">
                                                 <thead>
                                                     <tr>
                                                         <th>Aksi</th>
                                                         <th>Jenis Alat</th>
                                                         <th>Merk</th>
                                                         <th>Spesifikasi</th>
                                                         <th>Status</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($getDataAlatUkurResult as $s) : ?>
                                                         <tr>
                                                             <td scope="row"><button type="" class="btn btn-primary" id="select" data-id="<?= $s['id']; ?>" data-alat_ukur='<?= $s['nama_alat']; ?>' data-alat_ukur1='<?= $s['status']; ?>'> Pilih </b utton></td>
                                                             <td><?= $s['nama_alat']; ?></td>
                                                             <td><?= $s['kode']; ?></td>
                                                             <td><?= $s['spesifikasi']; ?></td>
                                                             <td><?= $s['status']; ?></td>
                                                         </tr>
                                                     <?php endforeach; ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="modal fade bd-example-modal-lg alat_bantu_modal" id="id_alat_bantu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                     <div class="modal-content">

                                         <div class="modal-body">
                                             <table class="table table-hover text-gray-900" id="dataTable">
                                                 <thead>
                                                     <tr>
                                                        <th>Aksi</th>
                                                         <th>Jenis Alat</th>
                                                         <th>Merk</th>
                                                         <th>Spesifikasi</th>
                                                         <th>Status</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($getDataAlatBantuResult as $s) : ?>
                                                         <tr>
                                                             <td scope="row"><button type="" class="btn btn-primary" id="select" data-id="<?= $s['id']; ?>" data-alat_bantu='<?= $s['nama_alat']; ?>'> Pilih </b utton></td>
                                                             <td><?= $s['nama_alat']; ?></td>
                                                             <td><?= $s['kode']; ?></td>
                                                             <td><?= $s['spesifikasi']; ?></td>
                                                             <td><?= $s['status']; ?></td>
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
                     <h6 class="m-0 font-weight-bold text-white">DETAIL BARANG</h6>
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
                                     <th>Nama Peminjam</th>
                                     <th>Alat Ukur</th>
                                     <th>Alat Bantu</th>
                                     <th>Jumlah</th>
                                     <th>Tanggal Peminjaman</th>
                                     <th>Jam</th>
                                     <th>Tanggal Pengembalian</th>                                     
                                     <th>Jam</th>
                                 </tr>
                             </thead>
                             <tfoot>
                                 <tr>
                                 <th>No</th>
                                     <th>Nama Peminjam</th>
                                     <th>Alat Ukur</th>
                                     <th>Alat Bantu</th>
                                     <th>Jumlah</th>
                                     <th>Tanggal Peminjaman</th>
                                     <th>Jam</th>
                                     <th>Tanggal Pengembalian</th>                                     
                                     <th>Jam</th>
                                 </tr>
                             </tfoot>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($getDataProgressResultWithID as $row) : ?>
                                    <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $row['nama_peminjam']; ?></td>
                                         <td><?= $row['alat_ukur']; ?></td>
                                         <td><?= $row['alat_bantu']; ?></td>
                                         <td><?= $row['jumlah']; ?></td>
                                         <td><?= $row['tanggal_peminjaman']; ?></td>
                                         <td><?= $row['jam_peminjaman']; ?></td>
                                         <td><?= $row['tanggal_pengembalian']; ?></td>
                                         <td><?= $row['jam_pengembalian']; ?></td>
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