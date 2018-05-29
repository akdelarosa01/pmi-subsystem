var dataColumn = [
	{ data: function(data) {
        return '<input type="checkbox" class="check_item" value="'+data.id+'">';
    }, name: 'id', orderable: false, searchable: false },
	{ data: 'wbs_mr_id', name: 'wbs_mr_id' },
	{ data: 'invoice_no', name: 'invoice_no' },
	{ data: 'item', name: 'item' },
	{ data: 'item_desc', name: 'item_desc' },
	{ data: 'qty', name: 'qty' },
	{ data: 'lot_no', name: 'lot_no' },
	{ data: 'location', name: 'location' },
	{ data: 'supplier', name: 'supplier' },
	{ data: 'iqc_status', name: 'iqc_status' },
	{ data: 'create_user', name: 'create_user' },
	{ data: 'received_date', name: 'received_date' },
	{ data: 'update_user', name: 'update_user' },
	{ data: 'updated_at', name: 'updated_at' },
	{ data: 'action', name: 'action',orderable: false, searchable: false },
];

$( function() {
	checkAllCheckboxesInTable('.check_all','.check_item');
	getDatatable('tbl_inventory',inventoryListURL,dataColumn,[],0);

	$('#btn_add').on('click', function() {
		$('#form_inventory_modal').modal('show');
	});

	$('#tbl_inventory').on('click', '.btn_edit', function() {
		$('#form_inventory_modal').modal('show');
	});

	$("#btn_delete").on('click', removeByID);

	$('#tbl_inventory_body').on('click', '.btn_edit', function(e) {
		e.preventDefault();
		
		$('#item_code').val($(this).attr('data-item'));
		$('#item_desc').val($(this).attr('data-item_desc'));
		$('#lot_no').val($(this).attr('data-lot_no'));
		$('#qty').val($(this).attr('data-qty'));
		$('#location').val($(this).attr('data-location'));
		$('#supplier').val($(this).attr('data-supplier'));
		$('#status').val($(this).attr('data-iqc_status'));
		
	});
	
});


function removeByID(){
     var tray = [];
     $(".check_item:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;
     $.ajax({
          url: deleteselected,
          method: 'post',
          data:  { 
               tray : tray, 
               traycount : traycount
          },
          success:function(){
                    msg("Item Deleted","success"); 
                   	getDatatable('tbl_inventory',inventoryListURL,dataColumn,[],0);
          },
     });
}