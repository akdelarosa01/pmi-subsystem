var issuance = [];

$( function() {
	getPendingRequest();
	getData();
	checkAllCheckboxesInTable('.check_all_details','.check_item_detail');

	$('#tbl_req_summary_body').on('click', '.btn_view_details', function() {
		viewReqDetails($(this).attr('data-transno'))
	});

	$('#tbl_req_details_body').on('change', '.check_item_detail', function() {
		isCheck($(this));
	});

	$('.check_all_details').on('change', function(e) {
		isCheck($('.check_item_detail'));
	});

	$('#btn_make_issuance').on('click', function() {
		var id = [];
		var transno = '';
		$(".check_item_detail:checked").each(function() {
			id.push($(this).val());
			transno = $(this).attr('data-transno');
		});

		$.ajax({
			url: getRequestDetails,
			type: 'GET',
			dataType: 'JSON',
			data: {
				_token: token,
				ids: id,
				transno: transno
			},
		}).done(function(data, textStatus, xhr) {
			switchToIssuance();
			clear();
			issuance = [];

			var details = data.details;
			var totals = data.totals;
			var count = 1;

			$.each(details, function(i, x) {
				issuance.push({
					id: x.id,
					issuance_no: x.issuance_no,
					request_no: x.request_no,
					detail_id: count,
					item: x.item,
					item_desc: x.item_desc,
					pmr_detail_id: x.pmr_detail_id,
					request_qty: x.request_qty,
					issued_qty_o: x.issued_qty_o,
					issued_qty_t: x.issued_qty_t,
					servedqty: x.servedqty,
					lot_no: x.lot_no,
					location: x.location,
					inv_id: ''
				});

				count++;
			});

			$('#id').val(data.id);
			$('#issuance_no').val(details[0].issuance_no);
			$('#req_no').val(details[0].request_no);
			$('#status').val(data.status);
			$('#total_req_qty').val(totals.total_req_qty);

			var total_bal_qty = totals.total_req_qty - totals.total_served_qty;
			$('#total_bal_qty').val(total_bal_qty);

			makeIssuanceTable(issuance);
			addState();
		}).fail(function(xhr, textStatus, errorThrown) {
			msg(textStatus+': '+errorThrown,textStatus);
		});
	});

	$('#tbl_issuance_body').on('click', '.btn_edit_issuance_details', function() {
		getInventory($(this).attr('data-item'));

		$('#edit_detail_id').val($(this).attr('data-detail_id'));
		$('#edit_item').val($(this).attr('data-item'));
		$('#edit_item_desc').val($(this).attr('data-item_desc'));
		$('#edit_pmr_detail_id').val($(this).attr('data-pmr_detail_id'));
		$('#edit_request_qty').val($(this).attr('data-request_qty'));
		$('#edit_served_qty').val($(this).attr('data-servedqty'));

		var issue_qty = parseFloat($(this).attr('data-request_qty')) - parseFloat($(this).attr('data-servedqty'));

		$('#edit_issued_qty').val(issue_qty);
		$('#edit_location').val($(this).attr('data-location'));

		$('#editIssuanceModal').modal('show');
	});

	$('#editIssuanceModal').on('shown.bs.modal', function(e){
		$($.fn.dataTable.tables(true)).DataTable()
		.columns.adjust();
	});

	$('#tbl_inventory_body').on('click', '.btn_select_item_inv', function() {
		$('#edit_lot_no').val($(this).attr('data-lot_no'));
		$('#edit_inv_id').val($(this).attr('data-id'));
	});

	$('#btn_update_details').on('click', function() {
		var detail_id = parseFloat($('#edit_detail_id').val());
		var total_issued = parseFloat($('#edit_served_qty').val()) + parseFloat($('#edit_issued_qty').val());


		if (total_issued > $('#edit_request_qty').val()) {
			msg("Issue quantity is greater than request qty.",'failed');
		} else if ($('#edit_lot_no').val() == '') {
			msg("Please specify a Lot Number.",'failed');
		} else {
			for (var i = issuance.length - 1; i >= 0; --i) {
				if (issuance[i].detail_id == detail_id) {
					issuance[i].issued_qty_t = $('#edit_issued_qty').val();
					issuance[i].lot_no = $('#edit_lot_no').val();
					issuance[i].inv_id = $('#edit_inv_id').val();
				}
			}

			makeIssuanceTable(issuance);
			$('#editIssuanceModal').modal('hide');
		}
	});

	$('#btn_save').on('click', function() {
		save();
	});

	$('#btn_edit').on('click', function() {
		addState();
	});

	$('#btn_discard').on('click', function() {
		getData($('#issuance_no').val());
	});

	$('#btn_first').on('click', function() {
		navigate('first');
	});

	$('#btn_prv').on('click', function() {
		navigate('prev');
	});

	$('#btn_nxt').on('click', function() {
		navigate('next');
	});

	$('#btn_last').on('click', function() {
		navigate('last');
	});

	$('#issuance_no').on('change', function() {
		getData($(this).val());
	});

	$('#btn_search').on('click', function() {
		$('#searchModal').modal('show');
	});

	$('#frm_search').on('submit', function(e) {
		$('#loading').modal('show');
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: 'POST',
			dataType: 'JSON',
			data: $(this).serialize(),
		}).done(function(data, textStatus, xhr) {
			makeSearchTable(data)
		}).fail(function(xhr, textStatus, errorThrown) {
			msg(textStatus+': '+errorThrown,textStatus);
		}).always(function() {
			$('#loading').modal('hide');
		});
	});

	$('#tbl_search_body').on('click', '.btn_search_detail', function() {
		getData($(this).attr('data-issuance_no'));
		$('#searchModal').modal('hide');
	});

	$('#btn_report_excel').on('click', function() {
		window.location.href = excelPDF + '?issuance_no=' + $('#issuance_no').val();
	});
	$('#btn_report_pdf').on('click', function() {
		window.location.href = pdfURL + '?issuance_no=' + $('#issuance_no').val();
	});
});

function viewReqDetails(transno) {
	$.ajax({
		url: viewReqDetailsURL,
		type: 'GET',
		dataType: 'JSON',
		data: {
			_token: token,
			transno: transno
		},
	}).done(function(data, textStatus, xhr) {
		makeViewDetailsTable(data);
	}).fail(function(xhr, textStatus, errorThrown) {
		msg(textStatus+': '+errorThrown,textStatus);
	}).always(function() {
		$('#loading').modal('hide');
	});
}

function getPendingRequest() {
	$('#tbl_req_summary').dataTable().fnClearTable();
    $('#tbl_req_summary').dataTable().fnDestroy();
    $('#tbl_req_summary').dataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: getPedingRequestURL,
        bLengthChange : false,
        scrollY: "250px",
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'transno', name: 'transno', orderable: false },
            { data: 'created_at', name: 'created_at', orderable: false },
            { data: 'pono', name: 'pono', orderable: false },
            { data: 'destination', name: 'destination', orderable: false },
            { data: 'line', name: 'line', orderable: false },
            { data: 'status', name: 'status', orderable: false },
            { data: 'requestedby', name: 'requestedby', orderable: false },
            { data: 'lastservedby', name: 'lastservedby', orderable: false },
            { data: 'lastserveddate', name: 'lastserveddate', orderable: false }
        ]
    });
}

function makeViewDetailsTable(arr) {
	$('#tbl_req_details').dataTable().fnClearTable();
    $('#tbl_req_details').dataTable().fnDestroy();
    $('#tbl_req_details').dataTable({
        data: arr,
        bLengthChange : false,
        scrollY: "200px",
        searching: false,
	    paging: false,
        columns: [
            { data: function(x) {
                return "<input type='checkbox' class='check_item_detail' data-id='"+x.id+"' data-transno='"+x.transno+"' value='"+x.id+"'>";
            }, searchable: false, orderable: false },

            { data: 'detailid' },
			{ data: 'code' },
			{ data: 'name' },
			{ data: 'classification' },
			{ data: 'issuedqty' },
			{ data: 'requestqty' },
			{ data: 'servedqty' },
			{ data: 'last_served_date' },
        ]
    });
}

function makeIssuanceTable(arr) {
	$('#tbl_issuance').dataTable().fnClearTable();
    $('#tbl_issuance').dataTable().fnDestroy();
    $('#tbl_issuance').dataTable({
        data: arr,
        bLengthChange : false,
        searching: false,
	    paging: false,
        columns: [
            { data: function(x) {
                return "<input type='checkbox' class='check_item_detail' "+
                		"data-request_no='"+x.request_no+"' data-issuance_no='"+x.issuance_no+"' value='"+x.id+"'>";
            }, searchable: false, orderable: false },

            { data: function(x) {
            	var servedqty = (x.servedqty == undefined)?x.issued_qty_t:x.servedqty;
                return "<button class='btn btn-sm blue btn_edit_issuance_details' data-id='"+x.id+"' "+
                			"data-detail_id='"+x.detail_id+"'"+
							"data-item='"+x.item+"'"+
							"data-item_desc='"+x.item_desc+"'"+
							"data-pmr_detail_id='"+x.pmr_detail_id+"'"+
							"data-request_qty='"+x.request_qty+"'"+
							"data-issued_qty_t='"+x.issued_qty_t+"'"+
							"data-location='"+x.location+"'"+
							"data-servedqty='"+servedqty+"'>"+
                			"<i class='fa fa-edit'></i>"+
                		"</button>";
            }, searchable: false, orderable: false },

            { data: function(x) {
                return x.detail_id+'<input type="hidden" name="detail_id[]" value="'+x.detail_id+'">';
            } },
			{ data: function(x) {
                return x.item+'<input type="hidden" name="item[]" value="'+x.item+'">';
            } },
			{ data: function(x) {
                return x.item_desc+'<input type="hidden" name="item_desc[]" value="'+x.item_desc+'">';
            } },
			{ data: function(x) {
                return x.issued_qty_o+'<input type="hidden" name="issued_qty_o[]" value="'+x.issued_qty_o+'">';
            } },
			{ data: function(x) {
                return x.issued_qty_t+'<input type="hidden" name="issued_qty_t[]" value="'+x.issued_qty_t+'">';
            } },
			{ data: function(x) {
                return x.lot_no+'<input type="hidden" name="lot_no[]" value="'+x.lot_no+'">';
            } },
			{ data: function(x) {
                return x.location+'<input type="hidden" name="location[]" value="'+x.location+'">'+
                				'<input type="hidden" name="inv_id[]" value="'+x.inv_id+'">'+
                				'<input type="hidden" name="pmr_detail_id[]" value="'+x.pmr_detail_id+'">'+
                				'<input type="hidden" name="request_qty[]" value="'+x.request_qty+'">';
            } },
        ],
        columnDefs: [
        	{ "width": "4.11%", "targets": 0 },
        	{ "width": "5.11%", "targets": 1 },
        	{ "width": "4.11%", "targets": 2 },
        	{ "width": "11.11%", "targets": 3 },
        	{ "width": "25.11%", "targets": 4 },
        	{ "width": "11.11%", "targets": 5 },
        	{ "width": "11.11%", "targets": 6 },
        	{ "width": "11.11%", "targets": 7 },
        	{ "width": "17.11%", "targets": 8 }
        ]
    });
}

function makeInventoryTable(arr) {
	$('#tbl_inventory').dataTable().fnClearTable();
    $('#tbl_inventory').dataTable().fnDestroy();
    $('#tbl_inventory').dataTable({
        data: arr,
        bLengthChange : false,
        scrollY: "200px",
        searching: false,
	    paging: false,
        columns: [
            { data: function(x) {
                return '<button type="button" class="btn btn-sm blue btn_select_item_inv" data-id="'+x.id+'"'+
                			'data-qty="'+x.qty+'" data-lot_no="'+x.lot_no+'">'+
                			'<i class="fa fa-edit"></i>'+
                		'</button>';
            }, searchable: false, orderable: false },

            { data: 'item' },
			{ data: 'item_desc' },
			{ data: 'qty' },
			{ data: 'lot_no' },
			{ data: 'received_date' }
        ]
    });
}

function makeSearchTable(arr) {
	$('#tbl_search').dataTable().fnClearTable();
    $('#tbl_search').dataTable().fnDestroy();
    $('#tbl_search').dataTable({
        data: arr,
        bLengthChange : false,
        scrollY: "250px",
        searching: false,
	    paging: false,
        columns: [
            { data: function(x) {
                return "<button type='button' class='btn btn-sm btn-primary btn_search_detail' "+
                				"data-issuance_no='"+x.issuance_no+"'>"+
                			"<i class='fa fa-eye'></i>"+
                		"</button>";
            }, searchable: false, orderable: false },

            { data: 'issuance_no' },
			{ data: 'request_no' },
			{ data: 'status' },
			{ data: 'create_user' },
			{ data: 'created_at' },
			{ data: 'update_user' },
			{ data: 'updated_at' },
        ]
    });
}

function isCheck(element) {
	if(element.is(':checked')) {
		$('#btn_make_issuance').prop('disabled',false);
	} else {
		$('#btn_make_issuance').prop('disabled',true);
	}
}

function switchToIssuance() {
	$('#summary_tab').removeClass('active');
	$('#summary_pane').removeClass('active');
	//
	$('#issuance_tab').addClass('active');
	$('#issuance_pane').addClass('active');

	$('#issuance_tab').addClass('active');
	$('#issuance_pane').addClass('active');


	$('#summary_tab_toggle').attr('data-toggle','');
}

function switchToSummary() {
	$('#issuance_tab').removeClass('active');
	$('#issuance_pane').removeClass('active');
	//
	$('#summary_tab').addClass('active');
	$('#summary_pane').addClass('active');
	$('#summary_tab_toggle').attr('data-toggle','tab');
}

function viewState() {
	$('#btn_first').prop('disabled', false);
	$('#btn_prv').prop('disabled', false);
	$('#btn_nxt').prop('disabled', false);
	$('#btn_last').prop('disabled', false);

	$('#issuance_no').prop('readonly', false);
	$('#req_no').prop('readonly', true);
	$('#status').prop('readonly', true);
	$('#created_by').prop('readonly', true);
	$('#created_at').prop('readonly', true);
	$('#total_req_qty').prop('readonly', true);
	$('#updated_by').prop('readonly', true);
	$('#updated_at').prop('readonly', true);
	$('#total_bal_qty').prop('readonly', true);

	if ($('#status').val() == 'Serving') {
		$('#btn_edit').show();
	} else {
		$('#btn_edit').hide();
	}

	$('#btn_save').hide();
	$('#btn_cancel').hide();
	$('#btn_discard').hide();
	$('#btn_search').show();
	$('#btn_report_excel').show();
	$('#btn_report_pdf').show();

	$('.btn_edit_issuance_details').prop('disabled', true);
}

function addState() {
	$('#btn_first').prop('disabled', true);
	$('#btn_prv').prop('disabled', true);
	$('#btn_nxt').prop('disabled', true);
	$('#btn_last').prop('disabled', true);

	$('#issuance_no').prop('readonly', true);
	$('#req_no').prop('readonly', true);
	$('#status').prop('readonly', true);
	$('#created_by').prop('readonly', true);
	$('#created_at').prop('readonly', true);
	$('#total_req_qty').prop('readonly', true);
	$('#updated_by').prop('readonly', true);
	$('#updated_at').prop('readonly', true);
	$('#total_bal_qty').prop('readonly', true);

	$('#btn_save').show();
	$('#btn_edit').hide();
	$('#btn_cancel').hide();
	$('#btn_discard').show();
	$('#btn_search').hide();
	$('#btn_report_excel').hide();
	$('#btn_report_pdf').hide();

	$('.btn_edit_issuance_details').prop('disabled', false);
}

function getInventory(item) {
	$.ajax({
		url: getInventoryURL,
		type: 'GET',
		dataType: 'JSON',
		data: {
			_token: token,
			item: item
		},
	}).done(function(data, textStatus, xhr) {
		makeInventoryTable(data);
	}).fail(function(xhr, textStatus, errorThrown) {
		msg(textStatus+': '+errorThrown,textStatus);
	});
}

function navigate(to) {
	getData($('#issuance_no').val(),to);
}

function getData(issuance_no='',to = '') {
	$.ajax({
		url: getDataURL,
		type: 'GET',
		dataType: 'JSON',
		data: {
			_token: token,
			issuance_no: issuance_no,
			to: to
		},
	}).done(function(data, textStatus, xhr) {
		$('#summary_tab_toggle').attr('data-toggle','tab');
		if ('status' in data) {
			msg(data.msg,data.status);
		} else {
			var sum = data.summary;

			$('#id').val(sum.id);
			$('#issuance_no').val(sum.issuance_no);
			$('#req_no').val(sum.request_no);
			$('#status').val(sum.status);
			$('#total_req_qty').val(sum.total_req_qty);
			$('#created_by').val(sum.create_user);
			$('#updated_by').val(sum.update_user);
			$('#created_at').val(sum.created_at);
			$('#updated_at').val(sum.updated_at);
			$('#total_bal_qty').val(data.total_bal_qty);

			console.log(data);

			issuance = data.details;

			makeIssuanceTable(issuance);
		}
		viewState();
	}).fail(function(xhr, textStatus, errorThrown) {
		msg(textStatus+': '+errorThrown,textStatus);
	}).always(function() {
		$('#loading').modal('hide');
	});
}

function clear() {
	$('.clear').val('');
}

function save() {
	$('#loading').modal('show');
	var data = {
		_token: token,
		id: $('#id').val(),
		issuance_no: $('#issuance_no').val(),
		req_no: $('#req_no').val(),
		total_req_qty: $('#total_req_qty').val(),
		detail_id: $('input[name="detail_id[]"]').map(function(){return $(this).val();}).get(),
		item: $('input[name="item[]"]').map(function(){return $(this).val();}).get(),
		item_desc: $('input[name="item_desc[]"]').map(function(){return $(this).val();}).get(),
		issued_qty_o: $('input[name="issued_qty_o[]"]').map(function(){return $(this).val();}).get(),
		issued_qty_t: $('input[name="issued_qty_t[]"]').map(function(){return $(this).val();}).get(),
		lot_no: $('input[name="lot_no[]"]').map(function(){return $(this).val();}).get(),
		location: $('input[name="location[]"]').map(function(){return $(this).val();}).get(),
		inv_id: $('input[name="inv_id[]"]').map(function(){return $(this).val();}).get(),
		pmr_detail_id: $('input[name="pmr_detail_id[]"]').map(function(){return $(this).val();}).get(),
		request_qty: $('input[name="request_qty[]"]').map(function(){return $(this).val();}).get(),
	};

	$.ajax({
		url: saveURL,
		type: 'POST',
		dataType: 'JSON',
		data: data,
	}).done(function(data, textStatus, xhr) {
		getData(data.issuance_no);
		getPendingRequest();
		msg(data.msg,data.status);
	}).fail(function(xhr, textStatus, errorThrown) {
		msg(textStatus+': '+errorThrown,textStatus);
	}).always(function() {
		$('#loading').modal('hide');
	});
}