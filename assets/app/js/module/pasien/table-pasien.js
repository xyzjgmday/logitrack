var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var updateUrl = "/patients/change/";
	var deleteUrl = "/patients/delete/";
	var listUrl = "/patients/viewlist";
	var initTable1 = function () {
		jkObj = {
			1: { title: 'Laki-Laki' },
			0: { title: 'Perempuan' },
		};

		$('#table-pasien').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "mrn", "nik", "nama", "tempat_lahir", "tanggal_lahir", "jenis_kelamin"]
				}
			},
			columns: [
				{ data: 'id' },
				{ data: null },
				{ data: null },
				{ data: 'nik' },
				{ data: 'jenis_kelamin' },
				{ data: '' }
			],
			columnDefs: [
				{
					targets: 5,
					orderable: false,
					// visible: isSIUUUUU(),
					render: function (data, type, full, meta) {
						return `<a href="${baseUrl + updateUrl + full.id}" class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">
							<i class="la la-edit"></i>
						</a>&nbsp;&nbsp;<a href="javascript:;" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" onclick="confirmDelete('${baseUrl + deleteUrl + full.id}')">
							<i class="la la-trash"></i>
						</a>`;
					}
				},
				{
					targets: 1,
					render: function (data, full, row) {
						var stateNo = mUtil.getRandomInt(0, 7);
						var states = [
							'success',
							'brand',
							'danger',
							'accent',
							'warning',
							'metal',
							'primary',
							'info'];
						var state = states[stateNo];

						output = `
							<div class="m-card-user m-card-user--sm">
								<div class="m-card-user__pic">
									<div class="m-card-user__no-photo m--bg-fill-` + state + `"><span>` + row.nama.substring(0, 1) + `</span></div>
								</div>
								<div class="m-card-user__details">
									<span class="m-card-user__name">` + row.nama + `</span>
									<a href="" class="m-card-user__email m-link">` + row.mrn + `</a>
								</div>
							</div>`;
						return output;
					},
				},
				{
					targets: 2,
					render: function (data, type, row) {
						var formattedDate = moment(row.tanggal_lahir).format('DD MMM YYYY');
						return formattedDate;
					}
				},
				{
					targets: 4,
					render: function (data, type, full, meta) {
						var $jkl = full['jenis_kelamin'];

						return (
							jkObj[$jkl].title
						);
					}
				},
			],
			processing: true,
		});
		$('#table-pasien thead th').css('background-color', '#f2f2f2');
	};

	return {
		init: function () {
			initTable1();
		},

	};
}();

function confirmDelete(deleteUrl) {
	swal({
		title: "Konfirmasi",
		text: "Apakah Anda yakin ingin menonaktifkan?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn btn-danger m-btn m-btn--custom",
		confirmButtonText: "Ya!",
	})
		.then((result) => {
			if (result.value) {
				$.ajax({
					url: deleteUrl,
					type: 'POST',
					dataType: 'json',
					success: function (response) {
						if (response.success) {
							swal("Berhasil", "Pasien tidak aktif.", "success");
							$('#table-pasien').DataTable().ajax.reload();
						} else {
							swal("Gagal", "Terjadi kesalahan saat memproses data.", "error");
						}
					},
					error: function () {
						swal("Gagal", "Terjadi kesalahan saat memproses data.", "error");
					}
				});
			}
		});
}

jQuery(document).ready(function () {
	DatatablesBasicPaginations.init();
});
