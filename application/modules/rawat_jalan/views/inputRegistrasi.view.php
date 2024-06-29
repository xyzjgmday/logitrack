<div class="m-content">
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" id="insert" action="<?= $url; ?>" method="post">
        <div class="row">
            <div class="col-lg-9">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    DATA PASIEN
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__content">
                            <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert"
                                id="m_form_1_msg">
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
                        <div class="form-group m-form__group pt-0">
                            <small>DATA UMUM</small>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="nik" class="form-label font-weight-bold">Nama <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input" name="nama" id="nama"
                                    data-toggle="m-tooltip" title="Nama Pasien" placeholder="Enter your type" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="tgl_lahir" class="form-label font-weight-bold">Tanggal Lahir <span
                                        class="m--font-danger">*</span></label>
                                <input type="date" class="form-control m-input m-input--solid" name="tgl_lahir"
                                    data-toggle="m-tooltip" title="Tanggal Lahir" placeholder="Enter your type" required
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="mrn" class="form-label font-weight-bold">No. MRN <span
                                        class="m--font-danger">*</span></label>
                                <input type="number" class="form-control m-input" name="mrn" data-toggle="m-tooltip"
                                    title="Nama Pasien" placeholder="Enter your type" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="jenis_kelamin" class="form-label font-weight-bold">Jenis Kelamin <span
                                        class="m--font-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-control m-input--solid" required disabled>
                                    <option value="">Select</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label class="form-label font-weight-bold">Alamat <span
                                        class="m--font-danger">*</span></label>
                                <textarea type="text" class="form-control m-input m-input--solid" name="alamat"
                                    data-toggle="m-tooltip" title="Alamat" required readonly> </textarea>
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed m-separator--lg mt-2 mb-3"></div>
                        <div class="form-group m-form__group pt-0">
                            <small>DATA KONTAK</small>
                        </div>
                        <div class="form-group m-form__group row pt-0 m--margin-bottom-10">
                            <div class="col-lg-6">
                                <label for="jenis_krt" class="form-label font-weight-bold">Jenis Kartu Identitas <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input m-input--solid" name="jenis_krt"
                                    data-toggle="m-tooltip" title="Jenis Kartu" placeholder="Enter your type"
                                    value="KTP" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="ktp" class="form-label font-weight-bold">Nomor Kartu Identitas <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input m-input--solid" name="ktp"
                                    data-toggle="m-tooltip" title="KTP" placeholder="Enter your type" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    NAKES & JADWAL
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__content">
                            <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert"
                                id="m_form_1_msg">
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
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="pembiayaan" class="form-label font-weight-bold">Pembiayaan <span
                                        class="m--font-danger">*</span></label>
                                <select name="pembiayaan" class="form-control m-input" required>
                                    <option value="">Select</option>
                                    <option value="1">Pribadi</option>
                                    <option value="2">BPJS</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="no_rjk" class="form-label font-weight-bold">Nomor Rujukan
                                    <small>(Opsional)</small> </label>
                                <input type="text" class="form-control m-input m-input--solid" name="no_rjk"
                                    data-toggle="m-tooltip" title="No Rujukan" placeholder="Enter your type">
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed m-separator--lg mt-2 mb-3"></div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="nama_poli" class="form-label font-weight-bold m--font-boldest">Nama Poli
                                    <span class="m--font-danger">*</span></label>
                                <select name="nama_poli" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="1">Poli Umum</option>
                                    <option value="0">Poli Gigi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="nama_nakes" class="form-label font-weight-bold m--font-boldest">Nama Nakes
                                    <span class="m--font-danger">*</span></label>
                                <select name="nama_nakes" class="form-control" required>
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="tgl_konsul" class="form-label font-weight-bold">Tanggal Konsultasi <span
                                        class="m--font-danger">*</span></label>
                                <input type="date" class="form-control m-input" name="tgl_konsul"
                                    data-toggle="m-tooltip" title="Tanggal Konsultasi" placeholder="Enter your type"
                                    required>
                            </div>
                            <div class="col-lg-6">
                                <label for="no_antrian" class="form-label font-weight-bold">Nomor Antrian <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input m-input--solid" name="no_antrian"
                                    data-toggle="m-tooltip" title="Nomor Antrian" required readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sticky-top" style="z-index: 90; top: 70px; left: 285px; right: 30px;">
                    <div class="m-portlet">
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <button type="reset" class="btn btn-secondary"
                                            onclick="history.back()">Batal</button>
                                    </div>
                                    <div class="col-lg-2 ml-lg-4">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    var selectedProv = '<?= isset($results->provinsi_id) ? $results->provinsi_id : null ?>';
    var selectedKab = '<?= isset($results->kota_id) ? $results->kota_id : null ?>';
    var selectedKec = '<?= isset($results->kecamatan_id) ? $results->kecamatan_id : null ?>';
    var selectedDes = '<?= isset($results->desa_id) ? $results->desa_id : null ?>';
</script>