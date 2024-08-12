var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var url = new URL(window.location.href);
	var pathname = url.pathname;
	var segments = pathname.split('/').filter(Boolean);
	var secondSegment = segments[1];
	var lastSegment = segments[2] ? `/${segments[2]}` : '';

	var updateUrl = "/medical-record/create/";
	var deleteUrl = "/rawat_jalan/delete/";
	var listUrl = "/rekam_medis/viewlist/";

	var initTable1 = function () {
		jkObj = {
			1: { title: 'Laki-Laki' },
			0: { title: 'Perempuan' },
		};

		$('#table-remdis').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "nama", "mrn", "jenis_kelamin", "tanggal_konsul", "keluhan_utama"]
				}
			},
			columns: [
				{ data: null },
				{ data: null },
				{ data: null },
				{ data: 'keluhan_utama' },
				{ data: '' }
			],
			rowCallback: function (row, data, index) {
				$('td:eq(0)', row).html(index + 1);
			},
			columnDefs: [
				{
					targets: 4,
					orderable: false,
					render: function (data, type, full, meta) {
						return `<a href="${baseUrl + updateUrl + full.mrn}" 
								class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" 
								title="Periksa"><i class="fa fa-notes-medical"></i></a>
								&nbsp;&nbsp;
								<a href="javascript:;" class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" onclick="confirmDelete('${baseUrl + deleteUrl + full.id}')">
							<i class="la la-print"></i>
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

		$('#table-remdis thead th').css('background-color', '#f2f2f2');

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
