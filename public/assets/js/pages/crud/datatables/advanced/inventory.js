"use strict";
var KTDatatablesAdvancedColumnRendering = function() {

	var init = function() {
		var table = $('#kt_datatable');

		// begin first table
		var table = $('#kt_datatable').DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
				{
					targets: 0,
					className: 'text-center',
					render: function(data, type, full, meta) {
						// return '<a class="text-dark-50 text-hover-primary" ><strong>' + data.split('#')[0] + '</strong><br>' + data.split('#')[1] + '</a>';
						console.log(meta);
						return meta.row+1;
					},
				},
				{
					targets: 1,
					// title: 'Nasabah',
					width: 100,
					render: function(data, type, full, meta) {
						// var number = KTUtil.getRandomInt(1, 14);
						var filename = data;
						var output; 
						console.log(asset);
						if (filename) {
							output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-100 flex-shrink-0">
                                        <img src="` + asset + `/` + filename + `" alt="photo">
                                    </div>
                                </div>`;
						}

						return output;
					},
				},
				
				{
					targets: -1,
					orderable: false,
					className: 'text-center',
					render: function(data, type, full, meta) {
						// console.log(role);
						

						return `
							
							 <div class="mb-2">
								<button type="button" class="btn btn-primary w-100 btn_edit"><i class="fa fa-edit"></i>Edit</button>
							</div>
							<div>
								<button type="button" class="btn btn-danger w-100 btn_delete"><i class="fa fa-trash"></i>Delete</button>
							</div> 
							
						`;
					},
				},
				// {
				// 	targets: 4,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Tabungan', 'class': 'label-light-primary'},
				// 			2: {'title': 'Tunai', 'class': ' label-light-success'},
				// 			// 3: {'title': 'Canceled', 'class': ' label-light-primary'},
				// 			// 4: {'title': 'Success', 'class': ' label-light-success'},
				// 			// 5: {'title': 'Info', 'class': ' label-light-info'},
				// 			// 6: {'title': 'Danger', 'class': ' label-light-danger'},
				// 			// 7: {'title': 'Warning', 'class': ' label-light-warning'},
				// 		};
				// 		// if (typeof status[data] === 'undefined') {
				// 		// 	return data;
				// 		// }
				// 		if (data=='tunai') {
				// 			data = 2;
				// 		} else {
				// 			data = 1;
				// 		}
				// 		return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
				// 	},
				// },
				// {
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
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
		var table = $('#tabel_jual');

		// begin first table
		var table = $('#tabel_jual').DataTable({
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
					title: 'Aksi',
					orderable: false,
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
							<button type="button" class="btn btn-success">Edit</button>\
							<!--<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>-->\
							<!-- <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>\
							</a> -->\
						';
					},
				},
				{
					targets: -2,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Ditolak', 'class': 'label-light-danger'},
							2: {'title': 'Inprogress', 'class': ' label-light-warning'},
							3: {'title': 'Selesai', 'class': ' label-light-success'},
						};
						// if (typeof status[data] === 'undefined') {
						// 	return data;
						// }
						if (data=='inprogress') {
							data = 2;
						} else if (data=='cancel') {
							data = 1;
						} else {
							data = 3;
						}
						return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
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
