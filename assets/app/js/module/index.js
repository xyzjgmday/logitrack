var FormModals = {
	init: function (baseUrl) {
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
			$("input[name='mrn']").val(suggestion.mrn);
			return false;
		});

		$('#nama').on('input', function () {
			if ($(this).val().trim() === '') {
				$("input[name='mrn']").val('');
			}
		});
	},
};

jQuery(document).ready(function () {
	const baseUrl = window.location.origin;
	FormModals.init(baseUrl);

});