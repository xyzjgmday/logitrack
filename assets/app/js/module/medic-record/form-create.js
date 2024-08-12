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
                            });
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
                            });
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

        $('#m_select2_1, #m_select2_1_validate').select2({
            placeholder: "Pilih Tindakan"
        });

        $('#m_select2_3, #m_select2_3_validate').select2({
            placeholder: " Select a state",
        });

        $('.m_repeater_1').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
                getDrugs.initializeTypeahead($(this).find('.drug'));
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            },
        });
    },
};

var getDrugs = {
    init: function (baseUrl) {
        var drugEngine = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: baseUrl + "/apotek/get_drugs?term=%QUERY",
                wildcard: '%QUERY',
                transform: function (response) {
                    return $.map(response, function (drug) {
                        return {
                            value: drug.nama_obat
                        };
                    });
                }
            }
        });

        this.initializeTypeahead = function ($elements) {
            $elements.each(function () {
                if (!$(this).data('typeahead')) {
                    $(this).typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    }, {
                        name: 'obat',
                        display: 'value',
                        source: drugEngine
                    }).data('typeahead', true);
                }
            });
        };

        this.initializeTypeahead($('.drug'));
    }
};

jQuery(document).ready(function () {
    const baseUrl = window.location.origin;

    FormControls.init(baseUrl);
    getDrugs.init(baseUrl);
});
