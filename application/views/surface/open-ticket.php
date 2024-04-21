       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>
           <?= $this->session->flashdata('message'); ?>
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <form action="<?= base_url('surface/open_ticket'); ?>" method="post">
                   <div class="row">
                       <input type="hidden" name="sts" id="sts" value="1">
                       <input type="hidden" name="selesai" id="selesai" value="a">
                       <!-- KODE REGISTRASI -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="rm" class="h5 mb-1 font-weight-bold text-gray-800">Nomor Tiket</label>
                                           <input type="text" name="rm" class="form-control datepicker bg-grey border-1 small" placeholder="Masukan Nomor Tiket..." autocomplete="off">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- TGL REGISTRASI -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-2 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="tgl_registrasi" class="h5 mb-1 font-weight-bold text-gray-800">Tanggal Peminjaman</label>
                                           <input type="text" name="tgl_registrasi" class="form-control datepicker bg-grey border-1 small" value="<?= date('d F Y'); ?>" readonly>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       



                       <div class="mb-5">
                           <a href="<?= base_url('surface/myprofile'); ?>" class="btn btn-light btn-icon-split ml-5">
                               <span class="icon text-gray-600">
                                   <i class="fas fa-arrow-left"></i>
                               </span>
                               <span class="text">Back</span>
                           </a>
                           <button type="submit" class="btn btn-primary ml-3">Registrasi</button>
                       </div>

                   </div>

               </form>

           </div>












       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->