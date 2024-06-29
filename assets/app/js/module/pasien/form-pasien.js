var FormControls = {
    init: function () {
        var baseUrl = window.location.origin;

        $("#insert").validate({
            rules: {
                nik: {
                    required: true,
                    minlength: 16,
                    maxlength: 16,
                    remote: {
                        url: baseUrl + "/patients/check_nik",
                        type: "post",
                        data: {
                            nik: function () {
                                return $("#nik").val();
                            }
                        },
                        dataFilter: function (response) {
                            var data = JSON.parse(response);
                            if (data.exists) {
                                return '"NIK sudah tersedia"';
                            } else {
                                return true;
                            }
                        }
                    }
                }
                // Tambahkan aturan validasi jika diperlukan
            },
            messages: {
                nik: {
                    remote: "NIK sudah terdaftar",
                    required: "NIK wajib diisi",
                    minlength: "NIK harus terdiri dari 16 angka",
                    maxlength: "NIK harus terdiri dari 16 angka"
                }
            },
            invalidHandler: function (e, r) {
                var i = $("#m_form_1_msg");
                i.removeClass("m--hide").show(), mUtil.scrollTo(i, -200);
            },
            submitHandler: function (form) {
                var url = form.getAttribute('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: $(form).serialize(),
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            swal({
                                title: 'Berhasil',
                                text: 'Data Sudah Di Input',
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(function () {
                                window.location.href = '/patients';
                            });
                        } else {
                            swal({
                                title: 'Sorry',
                                text: response.message,
                                type: 'warning',
                                timer: 2000,
                                showConfirmButton: false
                            })
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.statusText);
                        swal({
                            title: 'Sorry',
                            text: xhr.statusText,
                            type: 'warning',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                });
            }
        });

        $("#update").validate({
            rules: {
                // Tambahkan aturan validasi jika diperlukan
            },
            invalidHandler: function (e, r) {
                var i = $("#m_form_1_msg");
                i.removeClass("m--hide").show(), mUtil.scrollTo(i, -200);
            },
            submitHandler: function (form) {
                var url = form.getAttribute('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: $(form).serialize(),
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            swal({
                                title: 'Berhasil',
                                text: response.message,
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(function () {
                                window.location.href = '/patients';
                            });
                        } else {
                            swal({
                                title: 'Sorry',
                                text: response.message,
                                type: 'warning',
                                timer: 2000,
                                showConfirmButton: false
                            })
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.statusText);
                        swal({
                            title: 'Sorry',
                            text: xhr.statusText,
                            type: 'warning',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                });
            }
        });
    },
};

var InputAddress = {
    init: function (baseUrl, selectedProv, selectedKab, selectedKec, selectedDes) {
        $("#provinsi").change(function () {
            var url = baseUrl + "/wilayah/add_ajax_kab/" + $(this).val();
            $('#kabupaten').load(url, function () {
                // Auto select kabupaten if already selected
                if (selectedKab) {
                    $('#kabupaten').val(selectedKab).change();
                }
            });
            return false;
        });

        $("#kabupaten").change(function () {
            var url = baseUrl + "/wilayah/add_ajax_kec/" + $(this).val();
            $('#kecamatan').load(url, function () {
                // Auto select kecamatan if already selected
                if (selectedKec) {
                    $('#kecamatan').val(selectedKec).change();
                }
            });
            return false;
        });

        $("#kecamatan").change(function () {
            var url = baseUrl + "/wilayah/add_ajax_des/" + $(this).val();
            $('#desa').load(url, function () {
                // Auto select desa if already selected
                if (selectedDes) {
                    $('#desa').val(selectedDes);
                }
            });
            return false;
        });

        // Initialize the selections on page load
        this.loadInitialSelections(baseUrl, selectedProv, selectedKab, selectedKec, selectedDes);
    },

    loadInitialSelections: function (baseUrl, selectedProv, selectedKab, selectedKec, selectedDes) {
        if (selectedProv) {
            var urlKab = baseUrl + "/wilayah/add_ajax_kab/" + selectedProv;
            $('#kabupaten').load(urlKab, function () {
                if (selectedKab) {
                    $('#kabupaten').val(selectedKab);

                    var urlKec = baseUrl + "/wilayah/add_ajax_kec/" + selectedKab;
                    $('#kecamatan').load(urlKec, function () {
                        if (selectedKec) {
                            $('#kecamatan').val(selectedKec);

                            var urlDes = baseUrl + "/wilayah/add_ajax_des/" + selectedKec;
                            $('#desa').load(urlDes, function () {
                                if (selectedDes) {
                                    $('#desa').val(selectedDes);
                                }
                            });
                        }
                    });
                }
            });
        }
    }
};

var InputJobs = {
    init: function (baseUrl) {
        var jobEngine = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: baseUrl + "/master/occupations/getJobs?term=%QUERY",
                wildcard: '%QUERY',
                transform: function (response) {
                    return $.map(response, function (job) {
                        return {
                            value: job.occupation_name
                        };
                    });
                }
            }
        });

        $('#job').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'jobs',
            display: 'value',
            source: jobEngine
        });
    }
};


jQuery(document).ready(function () {
    const baseUrl = window.location.origin;

    FormControls.init(baseUrl);
    InputAddress.init(baseUrl, selectedProv, selectedKab, selectedKec, selectedDes);
    InputJobs.init(baseUrl);
});
