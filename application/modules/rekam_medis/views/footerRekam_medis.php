<?php if ($this->uri->segment(2)) { ?>
    <!-- Modal HTML -->
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kajian Awal Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="m-form m-form--fit m-form--label-align-right" id="insert" action="<?= $url; ?>"
                        method="post">
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="nama" class="form-label font-weight-bold">Nama <span
                                        class="m--font-danger">*</span></label>
                                <div class="m-typeahead">
                                    <input type="text" class="form-control m-input" name="nama" id="nama"
                                        data-toggle="m-tooltip" dir="ltr" title="Nama Pasien" placeholder="Enter your type"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="mrn" class="form-label font-weight-bold">No. MRN <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input" name="mrn" id="mrn" data-toggle="m-tooltip"
                                    title="No. MRN" placeholder="Enter your type" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-changes">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!--begin::Page Vendors -->
<script src="<?= base_url(); ?>assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<?= (isset($var)) ? $var : ''; ?>