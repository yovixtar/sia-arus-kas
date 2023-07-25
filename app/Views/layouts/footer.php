<!-- Start app Footer part -->
<footer class="main-footer">
    <div class="footer-left">
        <div class="bullet"></div> <a href="#">SD Negeri Kalipucang Kulon</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url() ?>assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>assets/modules/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/modules/chart.min.js"></script>
<script src="<?= base_url() ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?= base_url() ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<!-- JS Libraies -->
<script src="<?= base_url() ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url() ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Page Specific JS File -->
<script src="js/page/index.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>


<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
    $('.konfirmasi').click(function(event) {
        event.preventDefault();
        var r = confirm("Apakah anda yakin ingin hapus data ini?");
        if (r == true) {
            window.location = $(this).attr('href');
        }

    });
    $('.konfirmasi_logout').click(function(event) {
        event.preventDefault();
        var r = confirm("Apakah anda yakin ingin logout?");
        if (r == true) {
            window.location = $(this).attr('href');
        }

    });
    $('.konfirmasi_status').click(function(event) {
        event.preventDefault();
        var r = confirm("Apakah anda yakin ingin mengganti status?");
        if (r == true) {
            window.location = $(this).attr('href');
        }

    });
</script>
<script>
    setTimeout(function() {
        $('.alert').alert('close');
    }, 3000); // 10 seconds (10,000 milliseconds)
</script>

</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->

</html>