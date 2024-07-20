var FormControls = {
    init: function () {
        $("#insert").validate({
            rules: {
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
                                window.location.href = '/master/practitioner';
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
                                window.location.href = '/master/practitioner';
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
                if (selectedKab) {
                    $('#kabupaten').val(selectedKab).change();
                }
            });
            return false;
        });

        $("#kabupaten").change(function () {
            var url = baseUrl + "/wilayah/add_ajax_kec/" + $(this).val();
            $('#kecamatan').load(url, function () {
                if (selectedKec) {
                    $('#kecamatan').val(selectedKec).change();
                }
            });
            return false;
        });

        $("#kecamatan").change(function () {
            var url = baseUrl + "/wilayah/add_ajax_des/" + $(this).val();
            $('#desa').load(url, function () {
                if (selectedDes) {
                    $('#desa').val(selectedDes);
                }
            });
            return false;
        });

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

jQuery(document).ready(function () {
    const baseUrl = window.location.origin;

    FormControls.init();
    InputAddress.init(baseUrl, selectedProv, selectedKab, selectedKec, selectedDes);
});
