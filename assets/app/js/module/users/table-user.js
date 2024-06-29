var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var updateUrl = "/data-users/change/";
	var deleteUrl = "/data-users/delete/";
	var listUrl = "/data-users/viewlist";
	var initTable1 = function () {
		roleObj = {
			1: { title: 'Admin' },
			2: { title: 'Receptionist' },
			3: { title: 'Rawat Jalan' },
			4: { title: 'Rawat Inap' },
			5: { title: 'Manajemen' },
			6: { title: 'Tenaga Medis' }
		};

		// begin first table
		var table = $('#table-users').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "username", "last_log_date", "level_id"]
				}
			},
			columns: [
				{ data: 'id' },
				{ data: 'username' },
				{ data: 'last_log_date' },
				{ data: 'level_id' },
				{ data: '' }
			],
			columnDefs: [
				{
					targets: 4,
					orderable: false,
					visible: isSIUUUUU(),
					render: function (data, type, full, meta) {
						return `<a href="${baseUrl + updateUrl + full.id}" class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">
							<i class="la la-edit"></i>
						</a>&nbsp;&nbsp;<a href="javascript:;" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" onclick="confirmDelete('${baseUrl + deleteUrl + full.id}')">
							<i class="la la-trash"></i>
						</a>`;
					}
				},
				{
					targets: 3,
					render: function (data, type, full, meta) {
						var $level = full['level_id'];

						return (
							roleObj[$level].title
						);
					}
				},
			],
			processing: true,
		});

	};

	function isSIUUUUU() {
		var userLevel = sessionId;

		return userLevel === null;
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
		text: "Apakah Anda yakin ingin menghapus?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn btn-danger m-btn m-btn--custom",
		confirmButtonText: "Ya, Hapus!",
	})
		.then((result) => {
			if (result.value) {
				$.ajax({
					url: deleteUrl,
					type: 'POST',
					dataType: 'json',
					success: function (response) {
						if (response.success) {
							swal("Berhasil", "Data telah dihapus.", "success");
							$('#table-user').DataTable().ajax.reload();
						} else {
							swal("Gagal", "Terjadi kesalahan saat menghapus data.", "error");
						}
					},
					error: function () {
						swal("Gagal", "Terjadi kesalahan saat menghapus data.", "error");
					}
				});
			}
		});
}

jQuery(document).ready(function () {
	DatatablesBasicPaginations.init();
});
