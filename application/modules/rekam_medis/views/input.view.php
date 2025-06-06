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
                                <span class="font-weight-bold">
                                    DATA PASIEN
                                </span>
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
                                <div class="m-typeahead">
                                    <input type="text" class="form-control m-input" name="nama" id="nama"
                                        data-toggle="m-tooltip" dir="ltr" title="Nama Pasien"
                                        placeholder="Enter your type" required>
                                </div>
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
                                <input type="text" class="form-control m-input" name="mrn" data-toggle="m-tooltip"
                                    title="Nama Pasien" placeholder="Enter your type" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="jenis_kelamin" class="form-label font-weight-bold">Jenis Kelamin <span
                                        class="m--font-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-control m-input--solid" required readonly>
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
                                    data-toggle="m-tooltip" title="Alamat" required readonly></textarea>
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
                                <span class="font-weight-bold">
                                    DATA KESAEHATAN
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="" class="form-label font-weight-bold">Hamil/Menyusui</label>
                                <div class="m-checkbox-inline">
                                    <label class="m-checkbox">
                                        <input type="checkbox" name="is_pregnant" value="1"> Hamil
                                        <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                        <input type="checkbox" name="is_lactating" value="1"> Menyusui
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="stat_smoke" class="form-label font-weight-bold">Status Perokok</label>
                                <select name="stat_smoke" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Ya</option>
                                    <option value="0" selected>Tidak merokok</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="no_antrian" class="form-label font-weight-bold">Keluhan Utama <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input " name="keluhan_utama"
                                    data-toggle="m-tooltip" title="Keluhan utama pasien" required>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label class="form-label font-weight-bold">Riwayat Penyakit</label>
                                <select class="form-control m-select2" id="m_select2_3" name="riwayat_penyakit[]"
                                    multiple="multiple">
                                    <?php foreach ($medical as $value) {
                                        echo '<option value="' . $value->id . '">' . $value->name . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="no_antrian" class="form-label font-weight-bold">Riwayat Alergi Obat</label>
                                <input type="text" class="form-control m-input " name="rwt_alegi_obat"
                                    data-toggle="m-tooltip" title="Sebutkan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="font-weight-bold">
                                    TANDA-TANDA VITAL
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="suhu" class="form-label font-weight-bold">Suhu Tubuh <span
                                        class="m--font-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input" name="suhu_tubuh"
                                        aria-describedby="basic-addon2" required>
                                    <div class="input-group-append"><span class="input-group-text"
                                            id="basic-addon2">Celcius</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="suhu" class="form-label font-weight-bold">Nadi <span
                                        class="m--font-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input" name="nadi"
                                        aria-describedby="basic-addon2" required>
                                    <div class="input-group-append"><span class="input-group-text"
                                            id="basic-addon2">Kali/Menit</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="suhu" class="form-label font-weight-bold">Sistole <span
                                        class="m--font-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input" name="sistole"
                                        aria-describedby="basic-addon2" required>
                                    <div class="input-group-append"><span class="input-group-text"
                                            id="basic-addon2">mmHg</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="suhu" class="form-label font-weight-bold">Diastole <span
                                        class="m--font-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input" name="diastole"
                                        aria-describedby="basic-addon2" required>
                                    <div class="input-group-append"><span class="input-group-text"
                                            id="basic-addon2">mmHg</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="suhu" class="form-label font-weight-bold">Frekuensi Pernafasan <span
                                        class="m--font-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input" name="respiratory_rate"
                                        aria-describedby="basic-addon2" required>
                                    <div class="input-group-append"><span class="input-group-text"
                                            id="basic-addon2">kali/menit</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed m-separator--lg mt-2 mb-3"></div>
                        <div class="form-group m-form__group pt-0">
                            <small>PEMERIKSAAN FISIK</small>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="tinggiBadan" class="form-label font-weight-bold">Tinggi Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input" id="tinggiBadan" name="tinggiBadan"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="beratBadan" class="form-label font-weight-bold">Berat Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input" id="beratBadan" name="beratBadan"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="imt" class="form-label font-weight-bold">IMT</label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input m-input--solid" id="imt" name="imt"
                                        aria-describedby="basic-addon2" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sticky-top" style="z-index: 90; top: 90px; left: 285px; right: 30px;">
                    <div class="m-portlet">
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="reset" class="btn btn-secondary btn-block"
                                            onclick="history.back()">Batal</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
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