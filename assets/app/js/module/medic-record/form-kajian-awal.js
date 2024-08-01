var FormControls = {
    init: function (baseUrl) {
        $("#insert").validate({
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
                                history.back();
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
                                history.back();
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

        $('#m_select2_3, #m_select2_3_validate').select2({
            placeholder: " Select a state",
        });

        var patients = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: baseUrl + "/patients/get_patients?term=%QUERY",
                wildcard: '%QUERY',
            }
        });

        $('#nama').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'patients',
            display: 'nama',
            source: patients,
            templates: {
                suggestion: function (data) {
                    return '<div>' + data.nama + '</div>';
                }
            }
        }).bind('typeahead:select', function (ev, suggestion) {
            $("#nama").val(suggestion.nama);
            $("input[name='tgl_lahir']").val(suggestion.tgl_lahir);
            $("input[name='mrn']").val(suggestion.mrn);
            $("select[name='jenis_kelamin']").val(suggestion.jenis_kelamin);
            $("textarea[name='alamat']").val(suggestion.alamat_lengkap);
            $("input[name='ktp']").val(suggestion.nik);
            return false;
        });

        $('#nama').on('input', function () {
            if ($(this).val().trim() === '') {
                $("input[name='tgl_lahir']").val('');
                $("input[name='mrn']").val('');
                $("select[name='jenis_kelamin']").val('');
                $("textarea[name='alamat']").val('');
                $("input[name='nik']").val('');
            }
        });
    },
};


jQuery(document).ready(function () {
    const baseUrl = window.location.origin;

    FormControls.init(baseUrl);
});
