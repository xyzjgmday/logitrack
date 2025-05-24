<div class="m-content">

    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Informasi Barang
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" id="insert" action="<?= $url; ?>" method="post">
            <div class="m-portlet__body">
                <div class="m-form__content">
                    <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
                        <div class="m-alert__icon">
                            <i class="la la-warning"></i>
                        </div>
                        <div class="m-alert__text">
                            Oh snap! Change a few things up and try submitting again.
                        </div>
                        <div class="m-alert__close">
                            <button type="button" class="close" data-close="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12 font-weight-bold">Kode Barang <span
                            class="m--font-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="product_code" placeholder="Enter your type"
                            data-toggle="m-tooltip" title="Product Code" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12 font-weight-bold">Nama Barang <span
                            class="m--font-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="name" placeholder="Enter your type"
                            data-toggle="m-tooltip" title="Product Code" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12 font-weight-bold">Quantity <span
                            class="m--font-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="quantity" placeholder="Enter your type"
                            data-toggle="m-tooltip" title="quantity" required>
                    </div>
                </div>
                <div class="m-separator m-separator--dashed m-separator--lg mt-2 mb-3"></div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12 font-weight-bold">Harga <span
                            class="m--font-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Rp. </span></div>
                            <input type="text" class="form-control m-input" name="price" id="price"
                                placeholder="Enter your type" data-toggle="m-tooltip" title="Harga Barang" required>
                        </div>
                    </div>
                </div>
                <div class="m-separator m-separator--dashed m-separator--lg mt-2 mb-3"></div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-secondary" onclick="history.back()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
</div>