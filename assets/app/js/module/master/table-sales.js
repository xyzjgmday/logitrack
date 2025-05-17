var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var updateUrl = "/master/sales/change/";
	var deleteUrl = "/master/sales/delete/";
	var listUrl = "/master/sales/viewlist";
	var initTable1 = function () {

		$('#table-sales').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "name", "phone", "address"]
				}
			},
			columns: [
				{ data: null },
				{ data: 'name' },
				{ data: 'phone' },
				{ data: 'address' },
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
							$('#table-sales').DataTable().ajax.reload();
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
