var DatatablesBasicPaginations = function () {

	var baseUrl = window.location.origin;
	var updateUrl = "/master/deliveries/change/";
	var deleteUrl = "/master/deliveries/delete/";
	var listUrl = "/master/deliveries/viewlist";
	var initTable1 = function () {
		statsObj = {
			1: { title: 'Pending', color: 'warning' },
			0: { title: 'Nonaktif', color: 'warning' }
		};

		$('#table-deliveries').DataTable({
			responsive: true,
			ajax: {
				url: baseUrl + listUrl,
				type: 'POST',
				data: {
					columnsDef: ["id", "outlet_name", "address", "sales_name", "driver_name", "delivery_date", "status"]
				}
			},
			columns: [
				{ data: 'id' },
				{ data: null },
				{ data: 'sales_name' },
				{ data: 'driver_name' },
				{ data: 'delivery_date' },
				{ data: null },
				{ data: '' }
			],
			columnDefs: [
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
								
								<div class="m-card-user__details">
									<span class="m-card-user__name">` + row.outlet_name + `</span>
									<a href="" class="m-card-user__email m-link">` + row.address + `</a>
								</div>
							</div>`;
						return output;
					},
				},
				{
					targets: 6,
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
					targets: 5,
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
							$('#table-deliveries').DataTable().ajax.reload();
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
