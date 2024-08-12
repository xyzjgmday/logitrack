var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var url = new URL(window.location.href);
	var pathname = url.pathname;
	var segments = pathname.split('/').filter(Boolean);
	var secondSegment = segments[1];
	var lastSegment = segments[2] ? `/${segments[2]}` : '';

	var updateUrl = "/medical-record/create/";
	var printUrl = "/rawat_jalan/cetak_kartu/";
	var listUrl = "/rawat_jalan/viewlist/";

	var initTable1 = function () {
		jkObj = {
			1: { title: 'Laki-Laki' },
			0: { title: 'Perempuan' },
		};

		$('#table-rajal').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl + secondSegment + lastSegment,
				type: 'POST',
				data: {
					columnsDef: ["id", "nama", "mrn", "jenis_kelamin", "no_antrian", "tgl_konsul", "nama_nakes", "status"]
				}
			},
			columns: [
				{ data: null },
				{ data: null },
				{ data: 'jenis_kelamin' },
				{ data: 'no_antrian' },
				{ data: 'tgl_konsul' },
				{ data: 'nama_nakes' },
				{ data: '' }
			],
			rowCallback: function (row, data, index) {
				$('td:eq(0)', row).html(index + 1);
			},
			columnDefs: [
				{
					targets: 6,
					orderable: false,
					render: function (data, type, full, meta) {
						let isDone = full.status === 'done';
						return `
								<a href="${isDone ? 'javascript:;' : baseUrl + updateUrl + full.mrn}" 
								class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air ${isDone ? 'disabled-link' : ''}" 
								title="Periksa"
								${isDone ? 'onclick="return false;"' : ''}>
									<i class="fa fa-notes-medical"></i>
								</a>&nbsp;&nbsp;
								<a href="javascript:;" 
								class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" 
								title="Cetak Kartu" 
								onclick="confirmCetak('${baseUrl + printUrl + full.mrn}')">
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

		$('#table-general thead th').css('background-color', '#f2f2f2');
	};

	return {
		init: function () {
			initTable1();
		},

	};
}();

function confirmCetak(printUrl) {
	swal({
		title: "Konfirmasi",
		text: "Apakah Anda yakin ingin mencetak kartu?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn btn-danger m-btn m-btn--custom",
		confirmButtonText: "Ya!",
		cancelButtonText: "Tidak",
		closeOnConfirm: true,
		closeOnCancel: true
	}).then((result) => {
		if (result.value) {
			var printWindow = window.open(printUrl, '_blank');
			printWindow.onload = function () {
				// printWindow.print();
			};
		}
	});
}

jQuery(document).ready(function () {
	DatatablesBasicPaginations.init();
});
