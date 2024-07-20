<div class="m-content">
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" id="insert" action="<?= $url; ?>" method="post">
        <div class="row">
            <div class="col-lg-9 pr-2">
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--head-sm mb-4 pb-2">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="font-weight-bold">
                                    INFORMASI NAKES
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
                            <div class="col-lg-12">
                                <label for="poli_id" class="form-label font-weight-bold m--font-boldest">Poliklinik
                                    <span class="m--font-danger">*</span></label>
                                <select name="poli_id" class="form-control" required>
                                    <option value="">Pilih Poliklinik</option>
                                    <?php foreach ($poli as $data) {
                                        echo '<option value=' . $data->id . '>' . $data->nama_poli . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--head-sm mb-4 pb-2">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="font-weight-bold">
                                    DATA DIRI
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
                            <div class="col-lg-12">
                                <label for="nama_nakes" class="form-label font-weight-bold m--font-boldest">Nama Nakes
                                    <span class="m--font-danger">*</span></label>
                                <input type="text" class="form-control m-input" name="nama_nakes"
                                    data-toggle="m-tooltip" title="Nama Tenaga Medis"
                                    placeholder="Masukan Nama Tenaga Medis" required>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label for="role" class="form-label font-weight-bold">Role <span
                                        class="m--font-danger">*</span></label>
                                <select name="role" class="form-control" required>
                                    <option value="">Pilih Role</option>
                                    <option value="1">Dokter Umum</option>
                                    <option value="2">Dokter Gigi</option>
                                    <option value="3">Perawat</option>
                                    <option value="4">Spesialis</option>
                                    <option value="5">Subspesialis</option>
                                    <option value="6">Terapis</option>
                                </select>
                            </div>
                            <div class="m-form__group pt-0 pr-3 col-lg-6">
                                <label for="no_telp" class="form-label font-weight-bold">
                                    No. Telepon <span class="m--font-danger">*</span></label>
                                <input type="number" class="form-control m-input" name="no_telp" data-toggle="m-tooltip"
                                    title="Nomor Telepon" placeholder="Enter your type" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--head-sm mb-4 pb-2">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="font-weight-bold">
                                    ALAMAT
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
                                <label class="form-label font-weight-bold">Provinsi</label>
                                <select name="prov" class="form-control" id="provinsi">
                                    <option>- Select Provinsi -</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        echo '<option value="' . $prov->id . '">' . $prov->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label font-weight-bold">Kota</label>
                                <select name="kab" class="form-control" id="kabupaten">
                                    <option value=''>Select Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-6">
                                <label class="form-label font-weight-bold">Kecamatan</label>
                                <select name="kec" class="form-control" id="kecamatan">
                                    <option>Select Kecamatan</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label font-weight-bold">Kelurahan</label>
                                <select name="des" class="form-control" id="desa">
                                    <option>Select Desa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label class="form-label font-weight-bold">Alamat </label>
                                <textarea type="text" class="form-control m-input" name="alamat" data-toggle="m-tooltip"
                                    title="Alamat"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--head-sm mb-4 pb-2">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="font-weight-bold">
                                    LAIN-LAIN
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
                            <div class="col-lg-12">
                                <label for="experience" class="form-label font-weight-bold m--font-boldest">Tahun
                                    Pengalaman</label>
                                <input type="number" class="form-control m-input" name="experience"
                                    data-toggle="m-tooltip" title="Lama Pengalaman"
                                    placeholder="Masukan Lama Pengalaman">
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="edu" class="form-label font-weight-bold">Pilih Tingkat Pendidikan</label>
                                <select name="edu" class="form-control">
                                    <option value="">Pilih Opsi</option>
                                    <?php
                                    foreach ($edu as $edus) {
                                        echo '<option value="' . $edus->id . '">' . $edus->education_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="institution"
                                    class="form-label font-weight-bold m--font-boldest">Institusi</label>
                                <input type="text" class="form-control m-input" name="institution"
                                    data-toggle="m-tooltip" title="Lama Pengalaman"
                                    placeholder="Masukan Lama Pengalaman">
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="graduation_year" class="form-label font-weight-bold m--font-boldest">Tahun
                                    Lulus</label>
                                <input type="number" class="form-control m-input" name="graduation_year"
                                    data-toggle="m-tooltip" title="Tahun Lulus" placeholder="Masukan Tahun Lulus">
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="no_str" class="form-label font-weight-bold m--font-boldest">No.
                                    STR</label>
                                <input type="text" class="form-control m-input" name="no_str" data-toggle="m-tooltip"
                                    title="Nomor Surat Tanda Registrasi" placeholder="Masukan Nomor">
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="sip" class="form-label font-weight-bold m--font-boldest">Surat Izin
                                    Praktik</label>
                                <input type="text" class="form-control m-input" name="sip" data-toggle="m-tooltip"
                                    title="Surat Izin Praktik" placeholder="Masukan surat izin">
                            </div>
                        </div>
                        <div class="form-group m-form__group row pt-0">
                            <div class="col-lg-12">
                                <label for="note" class="form-label font-weight-bold m--font-boldest">Catatan</label>
                                <textarea type="text" class="form-control m-input" name="note" data-toggle="m-tooltip"
                                    title="Catatan"> </textarea>
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

<script>
    var selectedProv = '<?= isset($results->provinsi_id) ? $results->provinsi_id : null ?>';
    var selectedKab = '<?= isset($results->kota_id) ? $results->kota_id : null ?>';
    var selectedKec = '<?= isset($results->kecamatan_id) ? $results->kecamatan_id : null ?>';
    var selectedDes = '<?= isset($results->desa_id) ? $results->desa_id : null ?>';
</script>