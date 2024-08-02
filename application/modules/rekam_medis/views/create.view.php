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
                                <label for="mrn" class="form-label font-weight-bold">No. MRN <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input" name="mrn" data-toggle="m-tooltip"
                                    title="Nama Pasien" placeholder="Enter your type" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="font-weight-bold">
                                    SUBJECTIVE
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group pt-0">
                            <small>DATA UMUM</small>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="tgl_lahir" class="form-label font-weight-bold">Tanggal Lahir</label>
                                <br>
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-6">
                                <label for="tgl_lahir" class="form-label font-weight-bold">Jenis Kelamin</label><br>
                                <label for="tgl_lahir">Laki-laki</label>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="tgl_lahir" class="form-label font-weight-bold">Status</label><br>
                                <label for="tgl_lahir">Aktif</label>
                            </div>
                            <div class="col-lg-6">
                                <label for="tgl_lahir" class="form-label font-weight-bold">Pembiayaan</label><br>
                                <label for="tgl_lahir">Pribadi</label>
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed m-separator--lg mt-2 mb-3"></div>
                        <div class="form-group m-form__group pt-0">
                            <small>DATA KESEHATAN</small>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <?php //jika wanita ?>
                            <div class="col-lg-6">
                                <label for="" class="form-label font-weight-bold">Hamil</label>
                                <div class="m-checkbox-inline">
                                    <label for="" class="form-label">Tidak</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label font-weight-bold">Menyusui</label>
                                <div class="m-checkbox-inline">
                                    <label for="" class="form-label">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="stat_smoke" class="form-label font-weight-bold">Golongan Darah</label><br>
                                <label for="stat_smoke" class="form-label">-</label>
                            </div>
                            <div class="col-lg-6">
                                <label for="stat_smoke" class="form-label font-weight-bold">Status Perokok</label><br>
                                <label for="stat_smoke" class="form-label">Tidak</label>
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
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="no_antrian" class="form-label font-weight-bold">Keluhan Utama <span
                                        class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input " name="keluhan_utama"
                                    data-toggle="m-tooltip" title="Keluhan utama pasien" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="font-weight-bold">
                                    ASSESMENT
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
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
                                <label for="prognosa" class="form-label font-weight-bold">Prognosa <span
                                        class="m--font-danger">*</span></label>
                                <select name="prognosa" class="form-control" required>
                                    <option value="">Pilih Prognosa</option>
                                    <option value="1">Sanam (sembuh)</option>
                                    <option value="1">Bonam (baik)</option>
                                    <option value="1">Malam (buruk/jelek)</option>
                                    <option value="1">Dubia ad sanam/bolam (tidak tentu/ragu-ragu, cenderung
                                        sembuh/baik)</option>
                                    <option value="1">Dubia ad malam (tidak tentu/ragu-ragu, cenderung buruk/jelek)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div id="m_repeater_1">
                            <div class="form-group  m-form__group row" id="m_repeater_1">
                                <div class="col-lg-12">
                                    <label class="form-label font-weight-bold">Layanan/Tindakan</label>
                                    <div data-repeater-list="" class="col-lg-12" style="padding-left:0">
                                        <div data-repeater-item class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label class="">Nama Layanan</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <input type="email" class="form-control m-input"
                                                            placeholder="Enter full name">
                                                    </div>
                                                </div>
                                                <div class="d-md-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label class="m-label m-label--single">Number:</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <input type="email" class="form-control m-input"
                                                            placeholder="Enter contact number">
                                                    </div>
                                                </div>
                                                <div class="d-md-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div data-repeater-delete=""
                                                    class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                                                    <span>
                                                        <i class="la la-trash-o"></i>
                                                        <span>Delete</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form__group form-group row">
                                <label class="col-lg-8 col-form-label"></label>
                                <div class="col-lg-0">
                                    <div data-repeater-create=""
                                        class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Add</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed m-separator--lg mt-2 mb-3"></div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="prognosa" class="form-label font-weight-bold">Status Pulang <span
                                        class="m--font-danger">*</span></label>
                                <select name="prognosa" class="form-control" required>
                                    <option value="">Pilih statys</option>
                                    <option value="1">Berobat Jalan</option>
                                    <option value="1">Sehat</option>
                                    <option value="1">Inap</option>
                                    <option value="1">Rujuk</option>
                                    <option value="1">Meninggal</option>
                                    </option>
                                </select>
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