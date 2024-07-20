var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var updateUrl = "/master/services/change/";
	var deleteUrl = "/master/services/delete/";
	var listUrl = "/master/services/viewlist";
	var initTable1 = function () {
		statsObj = {
			1: { title: 'Aktif', color: 'info' },
			0: { title: 'Nonaktif', color: 'warning' }
		};

		$('#table-service').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "name", "type_layanan", "harga", "status"]
				}
			},
			columns: [
				{ data: 'id' },
				{ data: 'name' },
				{ data: null },
				{ data: null },
				{ data: null },
				{ data: '' }
			],
			columnDefs: [
				{
					targets: 5,
					orderable: false,
					render: function (data, type, full, meta) {
						return `<a href="${baseUrl + updateUrl + full.id}" class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">
							<i class="la la-edit"></i>
						</a>&nbsp;&nbsp;<a href="javascript:;" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" onclick="confirmDelete('${baseUrl + deleteUrl + full.id}')">
							<i class="la la-trash"></i>
						</a>`;
					}
				},
				{
					targets: 2,
					render: function (data, type, full, meta) {
						let cat = full['type_layanan'] == 1 ? "Rawat Jalan" : "Rawat Inap";

						return `
							${cat}
						`;
					}
				},
				{
					targets: 3,
					render: function (data, type, full, meta) {
						let spe = full['harga'];
						return formatRupiah(spe, 'Rp. ');
					}
				},
				{
					targets: 4,
					render: function (data, type, full, meta) {
						var $stat = full['status'];

						return `
							<code class="m--font-${statsObj[$stat].color}">${statsObj[$stat].title}</code>
						`;
					}
				},
			],
			processing: true,
		});

	};

	return {
		init: function () {
			initTable1();
		},

	};
}();

function formatRupiah(angka, prefix) {
	var number_string = angka.toString().replace(/[^,\d]/g, ''),
		split = number_string.split(','),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang diinput sudah menjadi angka ribuan
	if (ribuan) {
		let separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

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
							swal("Berhasil", "Layanan tidak aktif.", "success");
							$('#table-service').DataTable().ajax.reload();
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
