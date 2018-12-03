<?php
/*******************************************************************************
     Copyright (c) Company Nam All rights reserved.

     FILE NAME: physicalinventory.blade.php
     MODULE NAME:  3006 : WBS - Physical Inventory
     CREATED BY: AK.DELAROSA
     DATE CREATED: 2016.07.01
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.07.01    AK.DELAROSA      Initial Draft
     100-00-02   1     2016.07.05    MESPINOSA        Physical Inventory Implementation.
*******************************************************************************/
?>



<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

          $( document ).ready(function(e)
          {
               $("#inventoryno").keyup(function(event){
                    var mat = $('#inventoryno').val();
                    if(event.keyCode == 13)
                    {
                         window.location.href= "<?php echo e(url('/wbsphysicalinventory?page=')); ?>" + 'PI&id=' + mat;
                    }
               });

               var queryString = new Array;
               var query = location.search.substr(1);
               var result = {};

               query.split("&").forEach(function(part)
               {
                    var item = part.split("=");

                    if(decodeURIComponent(item[0])=='action' && (decodeURIComponent(item[1])=='ADD' || decodeURIComponent(item[1])=='EDIT'))
                    {
                         var rowCount = $('#tbl_batch tr').length;
                         if(rowCount > 1)
                         {
                              $("#validInvModal").modal("show");
                         }
                         else
                         {
                              $.alert('Please input valid and existing Location.',
                              {
                                   position  : ['center', [-0.40, 0]],
                                   type      : 'error',
                                   closeTime : 2000,
                                   autoClose : true,
                                   id        :'alert_suc'
                              });
                         }
                    }
               });
          });

	/**
	* Navigate paggination of records.
	**/
	function getrecord(val)
	{
		var id = 0;
		switch(val)
		{
			case ('MIN'):
			id = 1;
			break;
			case ('PRV'):
			id = parseInt($('#recid').val());
			break;
			case ('NXT'):
			id = parseInt($('#recid').val());
			break;
			case ('MAX'):
			id = -1;
			break;
			case ('INV'):
			id = 0;
			break;
			default:
			id = 1;
			break;
		}
		window.location.href= "<?php echo e(url('/wbsphysicalinventory?page=')); ?>" + val + '&id=' + id;
	}

	/**
	* Set the state of the controls depending on Action (ADD, EDIT, CANCEL, PRINT, DISCARD)
	**/
	function setcontrol(action, item)
	{
		switch(action)
		{
			case ('ADD'):
				$("#action").val("ADD");
				$("#inventoryno").prop("disabled", true);
				$("#btn_min").prop("disabled", true);
				$("#btn_prv").prop("disabled", true);
				$("#btn_nxt").prop("disabled", true);
				$("#btn_max").prop("disabled", true);

				$("#btn_edit").hide();
				$("#btn_add").hide();
				$("#btn_search").hide();
				$("#btn_cancel").hide();
				$("#btn_print").hide();

				$("#location").removeAttr('disabled');
				$("#btn_location").removeAttr('disabled');
				$("#countedby").removeAttr('disabled');
				$("#inventorydate").removeAttr('disabled');
				$("#inventorytime").removeAttr('disabled');
				$("#actualdate").removeAttr('disabled');
				$("#actualtime").removeAttr('disabled');
				$("#remarks").removeAttr('disabled');

				$("#btn_save").show();
				$("#btn_discard").show();
				$("#btn_edit_save").show();

				// Set header values to empty.
				$("#inventoryno").val("");
				$("#inventorydate").datepicker("setDate", new Date());
				$("#inventorytime").val("12:00 AM");
				$("#actualdate").datepicker("setDate", new Date());
				$("#actualtime").val("12:00 AM");
				$("#location").val("");
				$("#countedby").val("");
				$("#totalqty").val("");
				$("#status").val("");
				$("#remarks").val("");
				$("#createdby").val("");
				$("#createddate").val("");
				$("#updatedby").val("");
				$("#updateddate").val("");

				var table = $('#tbl_batch').DataTable();

				table
					.clear()
					.draw();

			break;
			case ('EDIT'):

				$("#inventoryno").prop("disabled", true);
				$("#btn_min").prop("disabled", true);
				$("#btn_prv").prop("disabled", true);
				$("#btn_nxt").prop("disabled", true);
				$("#btn_max").prop("disabled", true);

				$("#btn_edit").hide();
				$("#btn_add").hide();
				$("#btn_search").hide();
				$("#btn_cancel").hide();
				$("#btn_print").hide();

				// $("#location").removeAttr('disabled');
				// $("#btn_location").removeAttr('disabled');
				$("#countedby").removeAttr('disabled');
				$("#inventorydate").removeAttr('disabled');
				$("#inventorytime").removeAttr('disabled');
				$("#actualdate").removeAttr('disabled');
				$("#actualtime").removeAttr('disabled');
				$("#remarks").removeAttr('disabled');
				$("#edit_actualqty").removeAttr('disabled');


				$("#btn_save").show();
				$("#btn_discard").show();
				$("#btn_edit_save").show();
				$("#action").val("EDIT");

			break;

			case ('CNL'):

				if($("#status").val() == 'Cancelled')
				{
					$.alert('This transaction is already Cancelled.',
					{
						position  : ['center', [-0.40, 0]],
						type      : 'error',
						closeTime : 2000,
						autoClose : true,
						id        :'alert_suc'
					});
				}
				else
				{
					$("#deleteModal").modal("show");
					$('#delete_inputId').val($("#recid").val());
				}

			break;

			case ('PRNT'):

				var values = item.split('|');
				var item = values[0];
				var isprinted = values[1];
				$("#barcodeModal").modal("show");
				$('#barcode_inputId').val($("#recid").val());
				$('#barcode_inputItemNo').val(item);

			break;

			case ('DIS'):

				window.location.href= "<?php echo e(url('/wbsphysicalinventory?page=')); ?>" + 'MIN&id=1';

			break;

			default:
				$("#btn_cancel").removeAttr('disabled');
				$("#btn_barcode").removeAttr('disabled');
				$("#btn_print").removeAttr('disabled');

				$("#location").prop("disabled", true);
				$("#btn_location").prop("disabled", true);
				$("#countedby").prop("disabled", true);
				$("#inventorydate").prop("disabled", true);
				$("#actualdate").prop("disabled", true);
				$("#inventoryno").prop("disabled", true);
				$("#btn_save").prop("disabled", true);
				$("#btn_discard").prop("disabled", true);
				$("#btn_add_batch").prop("disabled", true);
				$("#btn_delete_batch").prop("disabled", true);
			break;
		}
	}

	/**
	* Set the Edit Modal Values depending on the selected item.
	**/
	function editBatch(item)
	{
		var obj_data = new Object;
		var itemno_arr = new Array;
		var cnt = 0;

		$('#loading').modal('toggle');

		$(".batch_item" + item).each(function()
		{
			var id = $(this).attr('name');
			obj_data[id] = $(this).text();
			itemno_arr[cnt] = $.trim(obj_data[id]);
			cnt++;
		});

		$("#edit_item option:selected").removeAttr("selected");
		$("#edit_item option").each(function()
		{
			if($.trim($(this).text()) == $.trim(itemno_arr[1]) + ' ' + $.trim(itemno_arr[2]))
			{
				var selecteditem = ' ' + $.trim(itemno_arr[1]) + ' ' + $.trim(itemno_arr[2]);
				$(this).attr('selected', 'selected');
				$(this).text(selecteditem);
			}
		});

		$("#edit_detailid").val(itemno_arr[0]);
		// $("#edit_item").val(itemno_arr[1]);
		$("#edit_whs100").val(itemno_arr[4]);
		$("#edit_whs102").val(itemno_arr[5]);
		$("#edit_whsnon").val(itemno_arr[6]);
		$("#edit_whssm").val(itemno_arr[7]);
		$("#edit_whsng").val(itemno_arr[8]);
		$("#edit_inventoryqty").val(itemno_arr[9]);
		$("#edit_actualqty").val(itemno_arr[10]);
		$("#edit_remarks").text(itemno_arr[12]);

		// alert(itemno_arr);
		$('#loading').modal('toggle');
		$('#addDetailsphModal').modal('show');
	}

	/**
	* Validate quantity values.
	* 1. If number type.
	* 2. If not greater then inventory qty.
	**/
	function validateQtyInput(val, compareVal)
	{
		var result = true;

		if(parseFloat(val))
		{
			if(parseFloat(val) < 0)
			{
				result = false;
			}
			else
			{
				if(parseFloat(val) > parseFloat(compareVal))
				{
					result = false;
				}
			}
		}
		else
		{
			if(val='0')
			{
				result = true;
			}
			else
			{
				result = false;
			}
		}

		return result;
	}

	/**
	* Set the updated values temporarilly to table.
	**/
	function updateBatch()
	{
		var is_valid = true;

		if(validateQtyInput($("#edit_actualqty").val(), $("#edit_inventoryqty").val()))
		{
			is_valid = true;
		}
		else
		{
			is_valid = false;
		}

		if(is_valid)
		{
			var values = $("#edit_item").val().split('|');
			var item = values[0];
			var desc = values[1];
			var variance = 0;
			var inventory = 0;
			var actual = 0;

			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(3)').html(item);
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(4)').html(desc);
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(6)').html($("#edit_whs100").val());
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(7)').html($("#edit_whs102").val());
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(8)').html($("#edit_whsnon").val());
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(9)').html($("#edit_whssm").val());
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(10)').html($("#edit_whsng").val());

			inventory = parseFloat($("#edit_inventoryqty").val());
			actual = parseFloat($("#edit_actualqty").val());
			variance = actual - inventory;

			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(11)').html(inventory);
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(12)').html(actual);
			$('#tr_batch_item'+$("#edit_detailid").val()+' td:nth-child(13)').html(variance);

			$('#addDetailsphModal').modal('toggle');
			$("#batchUpdateflag").val("1");
		}
		else
		{
			$('#addDetailsphModal').modal('toggle');
			$("#invalidEditBatchModal").modal('show');
		}
	}

	/**
	* Show Edit Modal.
	**/
	function showEditBatch()
	{
		$('#invalidEditBatchModal').modal('toggle');
		$("#addDetailsphModal").modal('show');
	}

	/**
	* Collate values with classname = name [parameter] in an array.
	**/
	function createArrValues(name)
	{
		var obj_data = new Object;
		var val_arr = new Array;
		var cnt = 0;
		$("."+name).each(function()
		{
			var id = $(this).attr('name');
			obj_data[id] = $(this).text();
			val_arr[cnt] = $.trim(obj_data[id]);
			cnt++;
		});
		return val_arr;
	}

	/**
	* Save the updated or added values to DB.
	**/
	function saverecord()
	{
		var obj_data = new Object;
		var pi_arr = new Array;
		var detail_arr = new Array;

		var cnt = 0;
		var ctr = 0;
		var is_valid = true;
		var action = $("#action").val();
		var batchUpdateflag  = $("#batchUpdateflag").val();

		// Get inventory values.
		pi_arr[0]  = $('#inventoryno').val();
		pi_arr[1]  = $("#location").val();
		pi_arr[2]  = $("#inventorydate").val() + ' ' + $("#inventorytime").val();;
		pi_arr[3]  = $("#actualdate").val() + ' ' + $("#actualtime").val();
		pi_arr[4]  = $("#countedby").val();
		pi_arr[5]  = $("#remarks").val();
		pi_arr[6]  = $("#status").val();
		pi_arr[7]  = $("#createdby").val();
		pi_arr[8]  = $("#createddate").val();
		pi_arr[9]  = $("#updatedby").val();
		pi_arr[10] = $("#updateddate").val();

		// validate required fields
		// for now: location & countedby are required.
		if($.trim(pi_arr[1]) == ''
			|| $.trim(pi_arr[4]) == '' )
		{
			is_valid = false;
		}

		if($("#location").val() != $("#hdnlocation").val())
		{
			is_valid = false;
		}

		/* inputBatchId */
		detail_arr[0] = createArrValues("inputBatchId");
		/* inputItemNo */
		detail_arr[1] = createArrValues("inputItemNo");
		/* inputItem */
		detail_arr[2] = createArrValues("inputItem");
		/* inputLocation */
		detail_arr[3] = createArrValues("inputLocation");
		/* inputwhs100 */
		detail_arr[4] = createArrValues("inputwhs100");
		/* inputwhs102 */
		detail_arr[5] = createArrValues("inputwhs102");
		/* inputwhsnon */
		detail_arr[6] = createArrValues("inputwhsnon");
		/* inputwhssm */
		detail_arr[7] = createArrValues("inputwhssm");
		/* inputwhsng */
		detail_arr[8] = createArrValues("inputwhsng");
		/* inputVariance */
		detail_arr[9] = createArrValues("inputInventoryQty");
		/* inputVariance */
		detail_arr[10] = createArrValues("inputActualQty");
		/* inputVariance */
		detail_arr[11] = createArrValues("inputVariance");
		/* inputRemarks */
		detail_arr[12] = createArrValues("inputRemarks");

		if(is_valid)
		{
			$('#loading').modal('toggle');

			switch(action)
			{
				case ('ADD'):
					// alert('add');
					$.post("<?php echo e(url('/wbspi-save')); ?>",
					{
						_token              : $('meta[name=csrf-token]').attr('content')
						, pi_arr            : pi_arr
						, detail_arr        : detail_arr
						, batchUpdateflag   : batchUpdateflag
					})
					.done(function(data)
					{
						// alert(data);
						$('#loading').modal('toggle');
						$.alert('Material Receiving Added Successfully.',
						{
							position  : ['center', [-0.40, 0]],
							type      : 'success',
							closeTime : 2000,
							autoClose : true,
							id        :'alert_suc'
						});

						window.location.href= "<?php echo e(url('/wbsphysicalinventory?page=')); ?>" + 'MAX&id=-1';
					})
					.fail(function()
					{
						$('#loading').modal('toggle');
						alert('fail');
					});

				break;

				case('EDIT'):
					// alert(detail_arr);
					$.post("<?php echo e(url('/wbspi-update')); ?>",
					{
						_token              : $('meta[name=csrf-token]').attr('content')
						, pi_arr            : pi_arr
						, detail_arr        : detail_arr
						, batchUpdateflag   : batchUpdateflag
					})
					.done(function(data)
					{
						$('#loading').modal('toggle');
						// alert(data);
						$.alert('Material Receiving Updated Successfully.',
						{
							position  : ['center', [-0.40, 0]],
							type      : 'success',
							closeTime : 2000,
							autoClose : true,
							id        :'alert_suc'
						});
						window.location.href= "<?php echo e(url('/wbsphysicalinventory?page=')); ?>" + 'CUR&id=' + data;
					})
					.fail(function()
					{
						$('#loading').modal('toggle');
						alert('fail');
					});
				break;

				default:
					// alert(action);
				break;
			}
		}
		else
		{
			$.alert('Something is wrong with the input data. All fields are required. Please check and try again.',
			{
				position  : ['center', [-0.40, 0]],
				type      : 'error',
				closeTime : 2000,
				autoClose : true,
				id        :'alert_suc'
			});
		}
	}

	/**
	* Show Search Modal.
	**/
	function searchData()
	{
		$("#searchModal").modal().shown();
	}

	/**
	* Load matching records depending on the inputted values.
	**/
	function filterData(action)
	{
		var condition_arr = new Array;

		if(action == 'SRCH')
		{
			condition_arr[0] = $("#srch_location").val();
			condition_arr[1] = $("#srch_inv_from").val();
			condition_arr[2] = $("#srch_inv_to").val();
			condition_arr[3] = $("#srch_act_from").val();
			condition_arr[4] = $("#srch_act_to").val();
			condition_arr[5] = $("#srch_countedby").val();
		}
		else
		{
			$("#srch_inv_from").val("");
			$("#srch_inv_to").val("");
			$("#srch_act_from").val("");
			$("#srch_act_to").val("");
			$("#srch_location").val("");
			$("#srch_countedby").val("");

			condition_arr[0] = 'X';
			condition_arr[1] = '';
			condition_arr[2] = '';
			condition_arr[3] = '';
			condition_arr[4] = '';
			condition_arr[5] = 'X';
		}

		if($('#srch_open:checkbox:checked').length > 0)
		{
			condition_arr[6] ='1';
		}
		else
		{
			condition_arr[6] ='0';
		}

		if($('#srch_close:checkbox:checked').length > 0)
		{
			condition_arr[7] ='1';
		}
		else
		{
			condition_arr[7] ='0';
		}

		if($('#srch_cancelled:checkbox:checked').length > 0)
		{
			condition_arr[8] ='1';
		}
		else
		{
			condition_arr[8] ='0';
		}

		// alert(condition_arr);

		$.post("<?php echo e(url('/wbspi-search')); ?>",
		{
			_token         : $('meta[name=csrf-token]').attr('content')
			, condition_arr: condition_arr
		})
		.done(function(datatable)
		{
			var newcol = '';
			var newItem = '';
			var newcollink = '';

			$('#srch_tbl_body').html('');

			var arr = $.map(datatable, function(datarow)
			{
				newcol = '';
				$.each( datarow, function( ckey, value )
				{
					if(ckey == 'id')
					{
						newcollink = '<td><a href="#" class="btn btn-primary btn-sm" onclick="findEdit('+value+')" value="'+ value +'">Find</a></td>';
					}
					else
					{
						newcol = newcol + '<td>'+value+'</td>'
					}
				});

				newItem = '<tr>' + newcollink + newcol + '</tr>';
				$('#srch_tbl_body').append(newItem);
			});
		})
		.fail(function()
		{
			alert('fail');
		});
	}

	/**
	* Load selected record. (Triggered in Find link.)
	**/
	function findEdit(id)
	{
		window.location.href= "<?php echo e(url('/wbsphysicalinventory?page=')); ?>" + 'CUR&id=' + id;
	}

	/**
	* Open the Physical Inventory Report in a new tab.
	**/
	function generatePiReport()
	{
		window.open("<?php echo e(url('/wbspi-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
	}

</script>

<?php $__env->startSection('title'); ?>
	WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_WBS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>


	<div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-navicon"></i>  WBS
								</div>
							</div>
							<div class="portlet-body">

                                <div class="row">
									<div class="col-xs-12 hidden-md hidden-lg hidden-xl">
										<div class="btn-group pull-right">
											<button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
												Physical Inventory <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li>
													<a href="<?php echo e(url('/materialreceiving')); ?>">
														<i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
													</a>
												</li>
												<li>
													<a href="<?php echo e(url('/iqc')); ?>">
													   <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
												   	</a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsmaterialkitting')); ?>">
		 											   <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbssakidashi')); ?>">
		 											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbspartsreceiving')); ?>">
		 											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
		 										   </a>
												</li>
												<li class="active">
													<a href="<?php echo e(url('/wbsphysicalinventory')); ?>">
		 											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsprodmatrequest')); ?>">
		 											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsprodmatreturn')); ?>" >
		 											   <i class="fa fa-exchange fa-2x"></i> Production Material Return
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbswhsmatissuance')); ?>" >
		 											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsmaterialdisposition')); ?>" >
		 											   <i class="fa fa-history fa-2x"></i> Material Disposistion
		 										   </a>
												</li>
                                                <li>
													<a href="<?php echo e(url('/wbsreports')); ?>" >
		 											   <i class="fa fa-file-text-o fa-2x font-grey-gallery"></i> WBS Report
		 										   </a>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<br>

								<div class="row">
									<div class="col-lg-2 col-md-2 hidden-xs hidden-sm">
										<div class="list-group">
											<a href="<?php echo e(url('/materialreceiving')); ?>" class="list-group-item">
												<i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
											</a>
											<a href="<?php echo e(url('/iqc')); ?>" class="list-group-item">
											   <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
										   </a>
										   <a href="<?php echo e(url('/wbsmaterialkitting')); ?>" class="list-group-item">
											   <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
										   </a>
										   <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
										   </a>
										   <a href="<?php echo e(url('/wbspartsreceiving')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
										   </a>
										   <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item active">
											   <i class="glyphicon glyphicon-list-alt fa-2x"></i> Physical Inventory
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatreturn')); ?>" class="list-group-item">
											  <i class="fa fa-exchange fa-2x font-grey-gallery"></i> Production Material Return
										  </a>
										   <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item">
											   <i class="fa fa-cubes fa-2x font-red-flamingo"></i> Warehouse Material Issuance
										   </a>
										   <a href="<?php echo e(url('/wbsmaterialdisposition')); ?>" class="list-group-item">
											  <i class="fa fa-history fa-2x font-grey-gallery"></i> Material Disposistion
										  </a>
                                           <a href="<?php echo e(url('/wbsreports')); ?>" class="list-group-item">
											  <i class="fa fa-file-text-o fa-2x font-grey-gallery"></i> WBS Report
										  </a>
										</div>
									</div>

									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
										<div class="row">

											<form>

												<div class="col-md-4">
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Inventory No.</label>
														<div class="col-md-3">
															<?php if(isset($pi_data)): ?>
															<?php foreach($pi_data as $prdata): ?>
															<?php endforeach; ?>
															<?php endif; ?>
															<input type="hidden" class="form-control input-sm" id="recid" name="recid" value="<?php if(isset($prdata)){echo $prdata->id; } ?>" />
															<input type="hidden" class="form-control input-sm" id="action" name="action" value="<?php if(isset($action)){echo $action; } ?>" />
															<input type="hidden" class="form-control input-sm" id="hdninventoryno" name="hdninventoryno" value="<?php if(isset($prdata)){echo $prdata->inventory_no; } ?>" />
															<input type="hidden" class="form-control input-sm" id="hdnlocation" name="hdnlocation" value="<?php if(isset($prdata)){echo $prdata->location; } ?>" />
															<input type="hidden" class="form-control input-sm" id="batchUpdateflag" name="batchUpdateflag" value="<?php if(isset($batchUpdateFlag)){echo $batchUpdateFlag; } ?>" />
															<input type="text" class="form-control input-sm" id="inventoryno" name="inventoryno" value="<?php if(isset($prdata)){echo $prdata->inventory_no; } ?>" <?php if($action!='VIEW'){ echo "disabled"; } ?>>
														</div>
														<div class="col-md-6">
															<div class="btn-group btn-group-sm btn-group-circle btn-sm">
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('MIN'); " id="btn_min" class="btn blue input-sm" <?php if(isset($prdata)){if($prdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-backward"></i></button>
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('PRV'); " id="btn_prv" class="btn blue input-sm" <?php if(isset($prdata)){if($prdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-backward"></i></button>
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('NXT'); " id="btn_nxt" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-forward"></i></button>
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('MAX'); " id="btn_max" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-forward"></i></button>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Location</label>
														<div class="col-md-4">
															<input type="text" class="form-control input-sm" id="location" name="location" value="<?php if(isset($prdata)){echo $prdata->location; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
														</div>
														<div class="col-md-5">
															<button type="submit" class="btn btn-circle green input-sm" id="btn_location" <?php if($action=='VIEW'){ echo 'disabled'; } ?> ><i class="fa fa-arrow-circle-down"></i></button>
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Inventory Date</label>
														<div class="col-md-3" style="padding-right: 0px;">
															<input class="form-control date-picker input-sm" size="16" type="text" id="inventorydate" disabled="disabled" readonly="true" value="<?php if(isset($prdata)){echo $prdata->inventory_date; } ?>"  <?php echo($state); ?>>
														</div>
														<div class="col-md-3" style="padding-left: 0px;">
															<input id="inventorytime" name="inventorytime" class="form-control timepicker timepicker-no-seconds input-sm" disabled="disabled" readonly="true" size="16" type="text" value="<?php if(isset($prdata)){echo $prdata->inventory_time; } ?>" <?php echo($state); ?> >
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Actual Date</label>
														<div class="col-md-3" style="padding-right: 0px;">
															<input class="form-control date-picker input-sm" size="16" type="text" id="actualdate" disabled="disabled" readonly="true" value="<?php if(isset($prdata)){echo $prdata->actual_date; } ?>"<?php if($action=='VIEW'){ echo 'disabled'; } ?>  <?php echo($state); ?>>
														</div>
														<div class="col-md-3" style="padding-left: 0px;">
															<input id="actualtime" name="actualtime" class="form-control timepicker timepicker-no-seconds input-sm" disabled="disabled" readonly="true" size="16" type="text" value="<?php if(isset($prdata)){echo $prdata->actual_time; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> <?php echo($state); ?> >
														</div>
														<div class="col-md-6">
															<!-- <input class="form-control date-picker input-sm" size="16" type="text" id="actualdate" value="<?php if(isset($prdata)){echo $prdata->actual_date; } ?>"> -->
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Counted By</label>
														<div class="col-md-6">
															<input type="text" class="form-control input-sm" id="countedby" name="countedby" value="<?php if(isset($prdata)){echo $prdata->counted_by; } ?>"<?php if($action=='VIEW'){ echo 'disabled'; } ?>>
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Remarks</label>
														<div class="col-md-6">
															<textarea class="form-control input-sm" style="resize:none;" id="remarks" name="remarks" <?php if($action=='VIEW'){ echo 'disabled'; } ?> ><?php if(isset($prdata)){echo $prdata->remarks; } ?></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Status</label>
														<div class="col-md-6">
															<input type="text" class="form-control input-sm" id="status" name="status" disabled="disable" value="<?php if(isset($prdata)){echo $prdata->status; } ?>">
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Created By</label>
														<div class="col-md-6">
															<input type="text" class="form-control input-sm" id="createdbyph" name="createdbyph" disabled="disable" value="<?php if(isset($prdata)){echo $prdata->create_user; } ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Created Date.</label>
														<div class="col-md-6">
         													<input class="form-control date-picker input-sm" size="50" type="text" name="createddate" id="createddate" value="<?php if(isset($prdata)){echo $prdata->created_at; } ?>" disabled="disable"/>
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Updated By</label>
														<div class="col-md-6">
															<input type="text" class="form-control input-sm" id="updatedbyph" name="updatedbyph" disabled="disable" value="<?php if(isset($prdata)){echo $prdata->update_user; } ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 input-sm">Updated Date</label>
														<div class="col-md-6">
     														<input class="form-control date-picker input-sm" size="50" type="text" name="updateddate" id="updateddate" value="<?php if(isset($prdata)){echo $prdata->updated_at; } ?>" disabled="disable"/>
														</div>
													</div>
												</div>

											</form>
										</div>

										<div class="row">
											<div class="col-md-12">
												<div class="portlet box">
													<div class="portlet-body">
														<div class="row">
															<div class="col-sm-12 table-responsive"  style="width:100%; height:486px; overflow:auto;">
																<table class="table table-striped table-bordered table-hover table-responsive" id="tbl_batch" style="font-size:10px">
																	<thead>
																		<tr>
																			<td style="width:10px"></td>
																			<td>Detail ID</td>
																			<td>Item/Part No.</td>
																			<td>Item Description</td>
																			<td>Location</td>
																			<td>WHS100</td>
																			<!-- <td>Act. WHS100 Qty.</td> -->
																			<td>WHS102</td>
																			<!-- <td>Act. WHS102 Qty.</td> -->
																			<td>WHSNON</td>
																			<!-- <td>Act. WHSNON Qty.</td> -->
																			<td>WHSSM</td>
																			<!-- <td>Act. WHSSM Qty.</td> -->
																			<td>WHSNG</td>
																			<!-- <td>Act. WHSNG Qty.</td> -->
																			<td>Inventory Qty</td>
																			<td>Actual Qty</td>
																			<td>Variance</td>
																			<td>Remarks</td>
																		</tr>
																	</thead>
																	<tbody id="table_body" >
   																		<?php $ctr = 1; ?>
																	     <?php if(isset($pi_batch_data)): ?>
																	     <?php foreach($pi_batch_data as $piddata): ?>
																		<tr id="tr_batch_item<?php echo e($piddata->id); ?>">
																			<td style=" padding-bottom: 0px;padding-top: 2px;padding-left: 4px;padding-right: 0px; width: 20px">
																				<a href="#" class="btn btn-primary btn-sm" onclick="editBatch(<?php echo e($piddata->id); ?>)" id="editDetails">
																					<i class="fa fa-edit"></i>
																				</a>
																			</td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputBatchId"   name="inputId"       ><?php echo e($piddata->id); ?>               </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputItemNo"    name="inputItemNo"   ><?php echo e($piddata->item); ?>             </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputItem"      name="inputItem"     ><?php echo e($piddata->description); ?>      </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputLocation"  name="inputLocation" ><?php echo e($piddata->location); ?>         </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputwhs100"    name="inputWhs100"   style="text-align: right;"><?php echo e($piddata->whs100); ?>           </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputwhs102"    name="inputWhs102"   style="text-align: right;"><?php echo e($piddata->whs102); ?>           </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputwhsnon"    name="inputWhsnon"   style="text-align: right;"><?php echo e($piddata->whsnon); ?>           </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputwhssm"     name="inputWhssm"    style="text-align: right;"><?php echo e($piddata->whssm); ?>            </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputwhsng"     name="inputWhsng"    style="text-align: right;"><?php echo e($piddata->whsng); ?>            </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputInventoryQty" name="inputInventoryQty" style="text-align: right;"><?php echo e($piddata->inventory_qty); ?>         </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputActualQty" name="inputActualQty" style="text-align: right;"><?php echo e($piddata->actual_qty); ?>         </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputVariance"  name="inputVariance" style="text-align: right;"><?php echo e($piddata->variance); ?>         </td>
																			<td class="batch_item<?php echo e($piddata->id); ?> inputRemarks"   name="inputRemarks"  ><?php echo e($piddata->remarks); ?>          </td>
																		</tr>
																	    <?php endforeach; ?>
																	    <?php endif; ?>
																	</tbody>
																</table>
															</div>
														</div>

<!-- 														<div class="row">
															<div class="col-md-12 text-center">
																<a href="#" id="btn_add_batch" class="btn green input-sm">
																	<i class="fa fa-plus"></i> Add
																</a>
																<button id="btn_delete_batch" class="btn red input-sm">
																	<i class="fa fa-trash"></i> Delete
																</button>
															</div>
														</div> -->

													</div>
												</div>

											</div>
										</div>



										<div class="row">
											<div class="col-md-12 text-center">
											    <button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('ADD'); " class="btn green input-sm" id="btn_add" <?php echo($state); ?> >
											    <i class="fa fa-plus"></i> Add New
											    </button>
											  <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: saverecord(); " class="btn blue-madison input-sm" id="btn_save" <?php echo($state); ?> >
											    <i class="fa fa-pencil"></i> Save
											  </button>
											  <button type="button" style="font-size:12px; <?php if(isset($prdata)){ if($prdata->status == 'Cancelled') { echo 'display:none;'; } } ?>  <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('EDIT'); " class="btn blue-madison input-sm" id="btn_edit" <?php echo($state); ?> >
											    <i class="fa fa-pencil"></i> Edit
											  </button>
											  <button type="button" style="font-size:12px; <?php if(isset($prdata)){ if($prdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('CNL'); " class="btn red input-sm" id="btn_cancel" <?php echo($state); ?> >
											    <i class="fa fa-trash"></i> Cancel
											  </button>
											  <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('DIS'); " class="btn red-intense input-sm" id="btn_discard" <?php echo($state); ?> >
											    <i class="fa fa-times"></i> Discard Changes
											  </button>
											  <button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: searchData();" class="btn blue-steel input-sm" id="btn_search" >
											    <i class="fa fa-search"></i> Search
											  </button>
											  <button type="submit" style="font-size:12px; <?php if(isset($prdata)){ if($prdata->status == 'Cancelled') { echo 'display:none;'; } } ?><?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: generatePiReport();" class="btn purple-plum input-sm" id="btn_print" <?php echo($state); ?>  <?php echo($state); ?>>
											    <i class="fa fa-print"></i> Print
											  </button>
											</div>
										</div>

									</div>
								</div>



							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->

	</div>
	<!-- END CONTAINER -->

	<!-- AJAX LOADER -->
	<div id="loading" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<img src="assets/images/ajax-loader.gif" class="img-responsive">
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Successful Inv Load Pop-message-->
	<div id="validInvModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm blue">
			<div class="modal-content ">
				<div class="modal-body">
					<p>Inventory Data Successfully Loaded.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Cancel Confirmation Pop-message -->
	<div id="deleteModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm blue">
			<form role="form" method="POST" action="<?php echo e(url('/wbspi-cancel')); ?>">
				<div class="modal-content ">
					<div class="modal-body">
						<p>Are you sure you want to cancel this transaction?</p>
						<?php echo csrf_field(); ?>

						<input type="hidden" name="id" id="delete_inputId"/>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" id="delete">Yes</button>
						<button type="button" data-dismiss="modal" class="btn">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Edit Batch Validation Pop-message -->
	<div id="invalidEditBatchModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm blue">
			<div class="modal-content ">
				<div class="modal-body">
					<p>One or more fields contains invalid values.<br/>
					Actual quantity must not be greater than warehouse inventory quantity.</p>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="javascript: showEditBatch();" class="btn btn-primary" id="btnok">OK</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit details -->
	<div id="addDetailsphModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content " style="padding-top: 0px; padding-bottom: 0px;">
				<div class="modal-header"  style="padding-bottom: 0px;">
					<h4 class="modal-title">Add/Edit Details</h4>
				</div>
				<div class="modal-body" style="padding-top: 0px; padding-bottom: 0px;">
					<div class="row" style="padding-top: 0px; padding-bottom: 0px;">
						<div class="col-md-12">
							<form method="POST" action="" class="form-horizontal" id="addissmdl">
								<?php echo e(csrf_field()); ?>

								<div class="form-group">
									<div class="col-sm-12">
										<p>
											Item/Part No. and Actual Qty. fields are required.
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">Detail ID.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_detailid" name="edit_detailid" disabled="disable">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">Item/Part No.</label>
									<div class="col-sm-9">
										<select id="edit_item"  class="form-control" name="edit_item" <?php echo($state); ?> disabled="true" >
											<option value="-1">--Select--</option>
											<?php if(isset($items)): ?>
											<?php foreach($items as $value): ?>
											<option value="<?php echo e($value->code . "|" . $value->name); ?>"> <?php echo e($value->code . ' ' . $value->name); ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
										</select>
										<!-- <input type="text" class="form-control input-sm" id="itemnoph" name="itemnoph"> -->
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">Location</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_location" name="edit_location" disabled="disable" value="<?php if(isset($prdata)){echo $prdata->location; } ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">WHS100</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_whs100" name="edit_whs100" disabled="disable">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">WHS102</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_whs102" name="edit_whs102" disabled="disable">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">WHSNON</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_whsnon" name="edit_whsnon" disabled="disable">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">WHSSM</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_whssm" name="edit_whssm" disabled="disable">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">WHSNG</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_whsng" name="edit_whsng" disabled="disable">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">Inventory Qty.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_inventoryqty" name="edit_inventoryqty" disabled="disable">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">Actual Qty.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="edit_actualqty" name="edit_actualqty" <?php if($action=='VIEW'){ echo 'disabled'; } ?> <?php echo($readonly); ?>>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 input-sm">Remarks</label>
									<div class="col-sm-9">
										<textarea class="form-control input-sm" style="resize:none" id="edit_remarks" name="edit_remarks" disabled="disable"></textarea>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="padding-top: 0px;">
					<button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" id="btn_edit_save" data-dismiss="modal" onclick="javascript: updateBatch();" class="btn btn-success input-sm" >Save</button>
					<button type="button" data-dismiss="modal" class="btn btn-danger input-sm">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Search Modal -->
	<div id="searchModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/wbsphysicalinventory')); ?>">
				<?php echo csrf_field(); ?>

				<div class="modal-content blue">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Search</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Location</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_location" placeholder="Location" name="srch_location" autofocus <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputcode" class="col-md-4 control-label" style="font-size:12px">Inventory Date</label>
									<div class="col-md-8">
										<div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
											<input type="text" class="form-control input-sm" name="srch_inv_from" id="srch_inv_from"/>
											<span class="input-group-addon">to </span>
											<input type="text" class="form-control input-sm" name="srch_inv_to" id="srch_inv_to"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputcode" class="col-md-4 control-label" style="font-size:12px">Actual Date</label>
									<div class="col-md-8">
										<div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
											<input type="text" class="form-control input-sm" name="srch_act_from" id="srch_act_from"/>
											<span class="input-group-addon">to </span>
											<input type="text" class="form-control input-sm" name="srch_act_to" id="srch_act_to"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Counted By</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_countedby" placeholder="Counted By" name="srch_countedby" autofocus <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Status</label>
									<div class="col-md-8">
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Open" id="srch_open" name="Open" checked="true"/>Open</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Close" id="srch_close" name="Close"/>Close</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="width:880px; height:500px; overflow:auto;">
							<div class="col-md-12">
								<table class="table table-striped table-bordered table-hover table-responsive" id="sample_3" style="font-size:10px">
									<thead>
										<tr>
											<td width="10%"></td>
											<td>Transaction No.</td>
											<td>Location</td>
											<td>Inventory Date</td>
											<td>Actual Date</td>
											<td>Counted By</td>
											<td>Status</td>
											<td>Created By</td>
											<td>Created Date</td>
											<td>Updated By</td>
											<td>Updated Date</td>
										</tr>
									</thead>
									<tbody id="srch_tbl_body">
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" class="form-control input-sm" id="editId" name="editId">
						<button type="button" style="font-size:12px" onclick="javascript: filterData('SRCH'); " class="btn blue-madison"><i class="glyphicon glyphicon-filter"></i> Filter</button>
						<button type="button" style="font-size:12px" onclick="javascript: filterData('CNCL'); " class="btn green" ><i class="glyphicon glyphicon-repeat"></i> Reset</button>
						<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>