<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-6">
        <div class="row no-gutters">
            <div class="col-md-4 pb-3 pt-3">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
       
            <a href="<?= base_url('user/edit'); ?>"  class="btn btn-success mb-3">Edit</a>
            <a href="<?= base_url('user/changePassword'); ?>" class="btn btn-warning mb-3">Change Password</a>
       
    </div>
    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->