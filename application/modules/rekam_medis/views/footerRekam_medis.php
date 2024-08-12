<!--begin::Page Vendors -->
<script src="<?= base_url(); ?>assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<?= (isset($var)) ? $var : ''; ?>

<?php if (isset($error) && $error === 'true'): ?>
    <script>
        swal("Perhatian", "Pasien belum melaksanakan Kajian Awal.", "warning");
    </script>
<?php endif; ?>