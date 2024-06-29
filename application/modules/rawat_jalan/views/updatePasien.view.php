<div class="m-content">

    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        <?= $title; ?>
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" id="update" action="<?= $url; ?>" method="post">
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
                    <label class="col-lg-3 col-form-label">No NIK:</label>
                    <div class="col-lg-3">
                        <input type="number" class="form-control m-input" name="nik" value="<?= $results->nik; ?>" maxlength="16" data-toggle="m-tooltip" title="NIK" placeholder="Enter your type" required>
                    </div>
                    <label class="col-lg-2 col-form-label">No BPJS: <small>(Jika Ada)</small></label>
                    <div class="col-lg-3">
                        <input type="number" class="form-control m-input" name="bpjs" value="<?= $results->bpjs; ?>" data-toggle="m-tooltip" title="BPJS" placeholder="Enter your type">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Nama Pasien *</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="name" value="<?= $results->nama; ?>" placeholder="Enter your type" data-toggle="m-tooltip" title="Nama Pasien" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">Tempat Lahir:</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input" name="tmp_lahir" value="<?= $results->tempat_lahir; ?>" data-toggle="m-tooltip" title="Tempat Lahir Pasien" placeholder="Enter your type" required>
                    </div>
                    <label class="col-lg-2 col-form-label">Tanggal Lahir:</label>
                    <div class="col-lg-3">
                        <input type="date" class="form-control m-input" name="tgl_lahir" value="<?= $results->tanggal_lahir; ?>" data-toggle="m-tooltip" title="Tanggal Lahir Pasien" placeholder="Enter your type" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">Jenis Kelamin:</label>
                    <div class="col-lg-3">
                        <div class="m-radio-inline">
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="jenis_kelamin" <?= $results->jenis_kelamin == '1' ? 'checked' : ''; ?> value="1"> Laki-Laki
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="jenis_kelamin" <?= $results->jenis_kelamin == '0' ? 'checked' : ''; ?> value="0"> Perempuan
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <label class="col-lg-2 col-form-label">Gol. Darah:</label>
                    <div class="col-lg-3">
                        <select class="form-control m-input" name="gol_darah" required>
                            <option value="-">Select</option>
                            <option value="A+" <?= $results->gol_darah == 'A+' ? 'selected' : ''; ?>>A+</option>
                            <option value="A-" <?= $results->gol_darah == 'A-' ? 'selected' : ''; ?>>A-</option>
                            <option value="B+" <?= $results->gol_darah == 'B+' ? 'selected' : ''; ?>>B+</option>
                            <option value="B-" <?= $results->gol_darah == 'B-' ? 'selected' : ''; ?>>B-</option>
                            <option value="AB+" <?= $results->gol_darah == 'AB+' ? 'selected' : ''; ?>>AB+</option>
                            <option value="AB-" <?= $results->gol_darah == 'AB-' ? 'selected' : ''; ?>>AB-</option>
                            <option value="O+" <?= $results->gol_darah == 'O+' ? 'selected' : ''; ?>>O+</option>
                            <option value="O-" <?= $results->gol_darah == 'O-' ? 'selected' : ''; ?>>O-</option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Alamat *</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <textarea type="text" class="form-control m-input" name="alamat" data-toggle="m-tooltip" title="Alamat" required><?= $results->alamat; ?></textarea>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">Provinsi:</label>
                    <div class="col-lg-3">
                        <select name="prov" class="form-control" id="provinsi">
                            <option>- Select Provinsi -</option>
                            <?php
                            foreach ($provinsi as $prov) {
                                echo '<option value="' . $prov->id . '"' . ($results->provinsi_id == $prov->id ? ' selected' : '') . '>' . $prov->nama . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <label class="col-lg-2 col-form-label">Kota:</label>
                    <div class="col-lg-3">
                        <select name="kab" class="form-control" id="kabupaten">
                            <option value=''>Select Kabupaten</option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">Kecamatan:</label>
                    <div class="col-lg-3">
                        <select name="kec" class="form-control" id="kecamatan">
                            <option>Select Kecamatan</option>
                        </select>
                    </div>
                    <label class="col-lg-2 col-form-label">Kelurahan:</label>
                    <div class="col-lg-3">
                        <select name="des" class="form-control" id="desa">
                            <option>Select Desa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2"></label>
                    <div class="col-lg-3">
                        <label>Agama:</label>
                        <select name="agama" class="form-control" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($agama as $agm) {
                                echo '<option value="' . $agm->id . '"' . ($results->agama_id == $agm->id ? ' selected' : '') . '>' . $agm->religion_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="">Status Pernikahan:</label>
                        <select class="form-control m-input" name="stat_kawin" required>
                            <option value="">Select</option>
                            <option value="0" <?= $results->status_pernikahan == '0' ? 'selected' : ''; ?>>Belum Kawin</option>
                            <option value="1" <?= $results->status_pernikahan == '1' ? 'selected' : ''; ?>>Kawin</option>
                            <option value="2" <?= $results->status_pernikahan == '2' ? 'selected' : ''; ?>>Janda</option>
                            <option value="3" <?= $results->status_pernikahan == '3' ? 'selected' : ''; ?>>Duda</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Pekerjaan:</label>
                        <div class="m-typeahead">
                            <input class="form-control m-input" type="text" id="job" name="job" value="<?= $results->occupation_name; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-secondary" onclick="history.back()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
<script>
    var selectedProv = '<?= isset($results->provinsi_id) ? $results->provinsi_id : null  ?>';
    var selectedKab = '<?= isset($results->kota_id) ? $results->kota_id : null ?>';
    var selectedKec = '<?= isset($results->kecamatan_id) ? $results->kecamatan_id : null ?>';
    var selectedDes = '<?= isset($results->desa_id) ? $results->desa_id : null ?>';
</script>