       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- <div class="col-sm-9"> -->
           <!-- DataTales Example -->
           <!-- Card Header - Dropdown -->
           <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-white"> UBAH DATA <b>KELOMPOK</b> </h6>
           </div>

           <div class="card shadow mb-4">
               <div class="col-sm-12 mb-10">
                   <form action="<?= base_url(); ?>/masterdata/ubah_kelompok/<?= $pemeriksaan['id']; ?>" method="post">

                       <div class="row">
                           <input type="hidden" name="id" id="id" value="<?= $pemeriksaan['id']; ?>">


                           <!-- nama alat -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="id_kelompok" class="h5 mb-1 font-weight-bold text-gray-800">Kelompok</label>
                                               <input type="text" class="form-control" id="id_kelompok" name="id_kelompok" value="<?= $pemeriksaan['id_kelompok']; ?>">
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
                                               <label for="nama_teknisi" class="h5 mb-1 font-weight-bold text-gray-800">Nama Teknisi</label>
                                               <input type="text" class="form-control" id="nama_teknisi" name="nama_teknisi" value="<?= $pemeriksaan['nama_teknisi']; ?>">
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