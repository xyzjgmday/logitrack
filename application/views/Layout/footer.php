<footer class="m-grid__item		m-footer ">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                <span class="m-footer__copyright">
                    Copyright © 2024 ., <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="stroke-1.5 w-4 h-4 mr-2">
                        <path
                            d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z">
                        </path>
                        <path
                            d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z">
                        </path>
                        <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                        <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                    </svg>v.0.0.5 &mdash; PT.Digital Media Utama (DIGIMU) All rights reserved.
                </span>
            </div>
        </div>
    </div>
</footer>

<!-- Modal HTML -->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="m-form m-form--fit m-form--label-align-right" id="insert"
                action="<?= base_url('medical-record/submit') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Informasi Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group m-form__group row pt-0">
                        <div class="col-lg-6">
                            <label for="nama" class="form-label font-weight-bold">Nama <span
                                    class="m--font-danger">*</span></label>
                            <div class="m-typeahead">
                                <input type="text" class="form-control m-input" id="nama" name="nama"
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save-changes">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>