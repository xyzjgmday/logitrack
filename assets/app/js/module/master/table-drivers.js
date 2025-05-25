var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var updateUrl = "/master/drivers/change/";
	var deleteUrl = "/master/drivers/delete/";
	var listUrl = "/master/drivers/viewlist";
	var initTable1 = function () {

		$('#table-drivers').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "driver_name", "phone", "plat_nomor"]
				}
			},
			columns: [
				{ data: null },
				{ data: 'driver_name' },
				{ data: 'phone' },
				{ data: 'plat_nomor' },
			],
			columnDefs: [
				{
					targets: 0, // target kolom pertama (nomor)
					orderable: false,
					searchable: false,
					render: function (data, type, full, meta) {
						return meta.row + 1;
					}
				},
				{
					targets: 4,
					orderable: false,
					render: function (data, type, full, meta) {
						return `<a href="${baseUrl + updateUrl + full.id}" class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">
							<i class="la la-edit"></i>
						</a>&nbsp;&nbsp;<a href="javascript:;" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" onclick="confirmDelete('${baseUrl + deleteUrl + full.id}')">
							<i class="la la-trash"></i>
						</a>`;
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
							$('#table-drivers').DataTable().ajax.reload();
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
