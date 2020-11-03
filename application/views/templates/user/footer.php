</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-dark">
    <div class="container my-auto">
        <div class="copyright text-center text-white my-auto">
            <span>Copyright &copy; All-In Eduspace 2019</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                <a class="btn btn-primary" href="<?=base_url('/auth/logout');?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url('assets/');?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
<script src="<?=base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=base_url('assets/');?>js/demo/datatables-demo.js"></script>
<script src="<?=base_url('assets/');?>js/select2.js"></script>
<!-- <script src="<?=base_url('assets/');?>js/zoomss.js"></script> -->
<script src="<?=base_url();?>assets/js/my-scripts.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> -->
<script src="<?=base_url('assets/js/ckeditor/ckeditor.js');?>"></script>
<script>
CKEDITOR.replaceAll();

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

// $(document).ready(function() {
//     $('.toast').toast('show');
// });

$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    $('table').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    });
});

$(document).ready(function() {
    var brand = document.getElementById('logo-id');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#logo-id").change(function() {
        readURL(this);
    });
});
</script>

</body>

</html>