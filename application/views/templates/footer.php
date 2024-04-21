<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; CI3 <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?> ">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Script Load Modal -->
<script>
    $(document).ready(function() {

        $(document).on('click', '#select', function() {
            var id = $(this).data('id');
            var alat_ukur = $(this).data('alat_ukur');
            var alat_ukur1 = $(this).data('alat_ukur1');
            var alat_bantu = $(this).data('alat_bantu');
            $('#id').val(id);
            $('#id_alat_ukur').val(alat_ukur);
            $('#id_alat_ukur1').val(alat_ukur1);
            $('#id_alat_bantu').val(alat_bantu);
            $('#modal_item').modal('hide');
        })
    })
</script>




<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    // Function to generate ticket number
    function generateTicketNumber() {
        var today = new Date();
        var year = today.getFullYear().toString().substr(-2);
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var day = ('0' + today.getDate()).slice(-2);
        var randomNumber = Math.floor(1000 + Math.random() * 9000); 
        return year + month + day + randomNumber;
    }

    // Set generated ticket number to the input field
    document.getElementById('nomorTiket').value = generateTicketNumber();
</script>
<script>
    // Event listener untuk setiap input pada field jumlah pinjaman
    document.getElementById('formatted_jumlah_pinjaman').addEventListener('input', function(event) {
        // Mengambil nilai input
        var input = event.target.value;
        
        // Menghapus karakter selain angka
        var amount = input.replace(/\D/g, '');
        
        // Menyimpan nilai integer di input tersembunyi
        document.getElementById('jumlah_pinjaman').value = amount;
        
        // Memformat angka menjadi format Rupiah
        var formattedAmount = formatRupiah(amount);
        
        // Menampilkan nilai yang sudah diformat
        event.target.value = formattedAmount;
    });

    // Fungsi untuk format Rupiah
    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }
</script>
</body>

</html>