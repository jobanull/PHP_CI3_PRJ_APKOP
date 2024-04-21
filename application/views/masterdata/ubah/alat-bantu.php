       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- <div class="col-sm-9"> -->
           <!-- DataTales Example -->
           <!-- Card Header - Dropdown -->
           <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-white"> UBAH DATA <b>ALAT BANTU</b> </h6>
           </div>

           <div class="card shadow mb-4">
               <div class="col-sm-12 mb-10">
                   <form action="<?= base_url(); ?>/masterdata/ubah_alat_bantu/<?= $pemeriksaan['id']; ?>" method="post">

                       <div class="row">
                           <input type="hidden" name="id" id="id" value="<?= $pemeriksaan['id']; ?>">


                           <!-- nama alat -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="nama_alat" class="h5 mb-1 font-weight-bold text-gray-800">Nama Alat</label>
                                               <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="<?= $pemeriksaan['nama_alat']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Merk -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="merk" class="h5 mb-1 font-weight-bold text-gray-800">Merk</label>
                                               <input type="text" class="form-control" id="merk" name="merk" value="<?= $pemeriksaan['merk']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Kode -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="kode" class="h5 mb-1 font-weight-bold text-gray-800">Kode</label>
                                               <input type="text" class="form-control" id="kode" name="kode" value="<?= $pemeriksaan['kode']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Spesifikasi -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="spesifikasi" class="h5 mb-1 font-weight-bold text-gray-800">Spesifikasi</label>
                                               <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="<?= $pemeriksaan['spesifikasi']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Jumlah -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="jumlah" class="h5 mb-1 font-weight-bold text-gray-800">Jumlah</label>
                                               <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $pemeriksaan['jumlah']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Status -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="status" class="h5 mb-1 font-weight-bold text-gray-800">Status</label>
                                               <input type="text" class="form-control" id="status" name="status" value="<?= $pemeriksaan['status']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Pemakai -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="pemakai" class="h5 mb-1 font-weight-bold text-gray-800">Pemakai</label>
                                               <input type="text" class="form-control" id="pemakai" name="pemakai" value="<?= $pemeriksaan['pemakai']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30px;">Save changes</button>

                       <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                   </form>
               </div>


               <!-- </div> -->
           </div>
       </div>



       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->