var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var updateUrl = "/master/practitioner/change/";
	var deleteUrl = "/master/practitioner/delete/";
	var listUrl = "/master/practitioner/viewlist";
	var initTable = function () {
		statsObj = {
			1: { title: 'Aktif', color: 'info' },
			0: { title: 'Nonaktif', color: 'warning' }
		};
		roleObj = {
			1: { name: 'Dokter Umum' },
			2: { name: 'Dokter Gigi' },
			3: { name: 'Perawat' },
			4: { name: 'Spesialis' },
			5: { name: 'Subspesialis' },
			6: { name: 'Terapis' }
		};

		$('#table-nakes').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "nama_nakes", "role", "nama_poli", "status"]
				}
			},
			columns: [
				{ data: 'id' },
				{ data: 'nama_nakes' },
				{ data: null },
				{ data: null },
				{ data: '' }
			],
			columnDefs: [
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
				{
					targets: 2,
					render: function (data, type, full, meta) {
						let $role = full['role'];

						return `
							${roleObj[$role].name} - ${full['nama_poli']}
						`;
					}
				},
				{
					targets: 3,
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
			initTable();
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
							$('#table-poli').DataTable().ajax.reload();
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
