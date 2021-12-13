"use strict";
var KTDatatablesAdvancedColumnRendering = function() {

	var init = function() {
		var table = $('#tabel_nasabah');

		// begin first table
		var table = $('#tabel_nasabah').DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
				{
					targets: 0,
					title: 'Nasabah',
					width: 100,
					render: function(data, type, full, meta) {
						// var number = KTUtil.getRandomInt(1, 14);
						// var user_img = '100_' + number + '.jpg';

						var output;
						// if (number > 8) {
						// 	output = `
                        //         <div class="d-flex align-items-center">
                        //             <div class="symbol symbol-50 flex-shrink-0">
                        //                 <img src="assets/media/users/` + user_img + `" alt="photo">
                        //             </div>
                        //             <div class="ml-3">
                        //                 <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[2].split(' ')[0] + `</span>
                        //                 <a href="#" class="text-muted text-hover-primary">` + full[2].split(' ')[1] + `</a>
                        //             </div>
                        //         </div>`;
						// }

						// else {
							var stateNo = KTUtil.getRandomInt(0, 7);
							console.log(stateNo);
							var states = [
								'success',
								'light',
								'danger',
								'success',
								'warning',
								'dark',
								'primary',
								'info'];

							var state = states[stateNo];

							output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light-` + state + `" flex-shrink-0">
                                        <div class="symbol-label font-size-h5">` + full[0].substring(0, 1) + `</div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold- line-height-sm d-block pb-2">` + data + `</span>
                                    </div>
                                </div>`;
						// }

						return output;
					},
				},
				{
					targets: -1,
					orderable: false,
					className: "text-center",
					render: function(data, type, full, meta) {
						return '\
							<!-- <div class="dropdown dropdown-inline">\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	                                <i class="la la-cog"></i>\
	                            </a>\
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
									<ul class="nav nav-hoverable flex-column">\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
									</ul>\
							  	</div>\
							</div> -->\
							<button type="button" class="btn btn-success">Cairkan</button>\
							<!--<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>-->\
							<!-- <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>\
							</a> -->\
						';
					},
				}
				
			],
			// dom: `Bftrip`,
			buttons: [
                'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
            ],
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});

		$('#kt_datatable_search_status').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Status');
		});

		$('#kt_datatable_search_type').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Type');
		});

		$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
	};

	var init2 = function() {
		var table = $('#tabel_riwayat_pribadi');

		// begin first table
		var table = $('#tabel_riwayat_pribadi').DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
				
				// {
				// 	targets: 1,
				// 	render: function(data, type, full, meta) {
				// 		return '<a class="text-dark-50 text-hover-primary" ><strong>' + data.split('#')[0] + '</strong><br>' + data.split('#')[1] + '</a>';
				// 	},
				// },
				{
					targets: -1,
					// title: 'Aksi',
					className: 'text-center',
					orderable: false,
					render: function(data, type, full, meta) {
						console.log(role);
						var status = {
							1: {'title': 'Ditolak', 'class': 'label-light-danger'},
							2: {'title': 'Menunggu konfirmasi', 'class': 'label-light-danger'},
							3: {'title': 'Inprogress', 'class': ' label-light-warning'},
							4: {'title': 'Selesai', 'class': ' label-light-success'},
						};
						// if (typeof status[data] === 'undefined') {
						// 	return data;
						// }
						if (data=='cancel') {
							data = 1;
						} else if (data=='waiting for confirmation') {
							data = 2;
						} else if (data=='inprogress') {
							data = 3;
						} else {
							data = 4;
						}
						if (role == 3) {
							if (data==2) {
								return `
								<button type="button" class="btn btn-danger">Batalkan</button>\
								<button type="button" class="btn btn-success">Konfirmasi</button>\
								`;	
							} 
						} 
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';


					},
				},
				
			],
			dom: `ltrip`,
			buttons: [
                'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
            ],
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});

		$('#kt_datatable_search_status').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Status');
		});

		$('#kt_datatable_search_type').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Type');
		});

		$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
	};

	return {

		//main function to initiate the module
		init: function() {
			init();
			init2();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedColumnRendering.init();
});
