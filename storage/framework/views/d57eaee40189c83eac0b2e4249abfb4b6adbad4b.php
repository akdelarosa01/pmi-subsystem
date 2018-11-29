<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

	/*
	*Sakidashi Issuance START
	*/
	$(document).ready(function(e)
	{
		// $('.table').dataTable( { "bSort" : false } );

		$("#issuancenosaki").keyup(function(event){
			var si = $('#issuancenosaki').val();
			if(event.keyCode == 13)
			{
				window.location.href = "<?php echo e(url('/wbssakidashi?page=')); ?>" + 'SI&id=' + si;
			}
		});

		$("#issueqty").focusout(function ()
		{
			var iqty = 0
			var rqqty = 0;

			if(parseInt($("#issueqty").val()))
			{
				iqty = parseInt($("#issueqty").val());

				if(parseInt($("#reqqty").val()))
				{
					rqqty = parseInt($("#reqqty").val());

				    if(rqqty >= iqty)
				    {
				    	$("#retqty").val(rqqty - iqty);
				    }
				    else
				    {
						$.alert('Issued quantity must not be greater than required quantity',
						{
							position:['center',[-0.40,0]],
							type	:'error',
							closeTime:2000,
							autoClose:true,
							id		:'alert_suc'
						});
				    }
				}
				else
				{
					$.alert('Please input valid required quantity.',
					{
						position:['center',[-0.40,0]],
						type	:'error',
						closeTime:2000,
						autoClose:true,
						id		:'alert_suc'
					});
				}
			}
			else
			{
				$.alert('Please input valid issued quantity.',
				{
					position:['center',[-0.40,0]],
					type	:'error',
					closeTime:2000,
					autoClose:true,
					id		:'alert_suc'
				});
			}

		});


		$("#reqqty").focusout(function ()
		{
			var iqty = 0
			var rqqty = 0;

			if(parseInt($("#issueqty").val()))
			{
				iqty = parseInt($("#issueqty").val());
			}
			else
			{
				$.alert('Please input valid issued quantity.',
				{
					position:['center',[-0.40,0]],
					type	:'error',
					closeTime:2000,
					autoClose:true,
					id		:'alert_suc'
				});
			}

			if(parseInt($("#reqqty").val()))
			{
				rqqty = parseInt($("#reqqty").val());
			}
			else
			{
				$.alert('Please input valid required quantity.',
				{
					position:['center',[-0.40,0]],
					type	:'error',
					closeTime:2000,
					autoClose:true,
					id		:'alert_suc'
				});
			}

		    if(rqqty >= iqty)
		    {
		    	$("#retqty").val(rqqty - iqty);
		    }
		    else
		    {
				$.alert('Issued quantity must not be greater than required quantity',
				{
					position:['center',[-0.40,0]],
					type	:'error',
					closeTime:2000,
					autoClose:true,
					id		:'alert_suc'
				});
		    }

		});

		var queryString = new Array;
		var query = location.search.substr(1);
		var result = {};


		query.split("&").forEach(function(part)
		{
			var item = part.split("=");

			if(decodeURIComponent(item[0]) == 'action'&&(decodeURIComponent(item[1]) == 'ADD'||decodeURIComponent(item[1]) == 'EDIT'))
			{
				var rowCount = $('#sample_3 tr').length;
				if(rowCount >= 2)
				{
					if(rowCount == 2)
					{
						$("#validShipModal").modal("show");
					}
					else
					{
						$("#itemModal").modal("show");
					}
				}
				else
				{
					$.alert('Please input valid and existing PO No. or Item Code',
					{
						position:['center',[-0.40,0]],
						type	:'error',
						closeTime:2000,
						autoClose:true,
						id		:'alert_suc'
					});
				}
			}
		});

		$('#receivingdate').datepicker({
			"setDate":newDate(),
			"autoclose":true
		});
	});

	/**
	* Open the Sakidashi Issuance Report in a new tab.
	**/
	function generateSiReport()
	{
		window.open("<?php echo e(url('/wbssi-report?')); ?>" + 'id=1' + $("#recid").val(), '_blank');
	}

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
		window.location.href= "<?php echo e(url('/wbssakidashi?page=')); ?>" + val + '&id=' + id;
	}

	function setcontrol(action, item)
	{
		// $('#loading').modal('toggle');
		switch(action)
		{
			case ('ADD'):

				$("#btn_min").prop("disabled", true);
				$("#btn_prv").prop("disabled", true);
				$("#btn_nxt").prop("disabled", true);
				$("#btn_max").prop("disabled", true);

				$("#btn_edit").hide();
				$("#btn_add").hide();
				$("#btn_search").hide();
				$("#btn_cancel").hide();
				$("#btn_print").hide();

				$("#issuancenosaki").prop("disabled", true);
				$("#ponosaki").removeAttr('disabled');
				$("#btn_ponosaki").removeAttr('disabled');
				$("#incharge").removeAttr('disabled');
				$("#remarks").removeAttr('disabled');

				$("#partcode").removeAttr('disabled');
				$("#btn_partcode").removeAttr('disabled');
				$("#lotno").removeAttr("disabled");
				$("#pairno").removeAttr("disabled");
				$("#issueqty").removeAttr("disabled");
				$("#reqqty").removeAttr("disabled");
				$("#schedretdate").removeAttr("disabled");

				$("#btn_save").show();
				$("#btn_discard").show();
				$("#btn_add_batch").show();
				$("#btn_delete_batch").show();
				$("#btn_update_batch").show();

				 // Set header values to empty.
				 $("#issuancenosaki").val("");
				 $("#ponosaki").val("");
				 $("#devicecodesaki").val("");
				 $("#devicenamesaki").val("");
				 $("#poqtysaki").val("");
				 $("#incharge").val("");
				 $("#remarks").val("");
				 $("#statussaki").val("");
				 $("#createdbysaki").val("");
				 $("#createddatesaki").val("");
				 $("#updatedbysaki").val("");
				 $("#updateddatesaki").val("");

				 $("#partcode").val("");
				 $("#partname").val("");
				 $("#lotno").val("");
				 $("#pairno").val("");
				 $("#issueqty").val("");
				 $("#reqqty").val("");
				 $("#retqty").val("");
				 $("#schedretdate").val("");

				 $("#action").val("ADD");
				 $("#action1").val("ADD");

				 var table = $('#sample_2').DataTable();
				 table
				 .clear()
				 .draw();

				 break;

				 case ('EDIT'):

				 $("#btn_min").prop("disabled", true);
				 $("#btn_prv").prop("disabled", true);
				 $("#btn_nxt").prop("disabled", true);
				 $("#btn_max").prop("disabled", true);

				 $("#btn_edit").hide();
				 $("#btn_add").hide();
				 $("#btn_search").hide();
				 $("#btn_cancel").hide();
				 $("#btn_barcode").hide();
				 $("#btn_print").hide();

				 $("#issuancenosaki").prop("disabled", true);
				 // $("#ponosaki").removeAttr('disabled');
				 // $("#btn_ponosaki").removeAttr('disabled');
				 $("#incharge").removeAttr('disabled');
				 $("#remarks").removeAttr('disabled');

				 // $("#partcode").removeAttr('disabled');
				 // $("#btn_partcode").removeAttr('disabled');
				 $("#lotno").removeAttr("disabled");
				 $("#pairno").removeAttr("disabled");
				 $("#issueqty").removeAttr("disabled");
				 $("#reqqty").removeAttr("disabled");
				 $("#schedretdate").removeAttr("disabled");


				 $("#btn_save").show();
				 $("#btn_discard").show();
				 $("#btn_add_batch").show();
				 $("#btn_delete_batch").show();
				 $("#btn_update_batch").show();

				 $("#action").val("EDIT");
				 $("#action1").val("EDIT");


				 break;
				 case ('CNL'):

				 if($("#statussaki").val() == 'Cancelled')
				 {
				 	$.alert('This transaction is already Cancelled.',
				 	{
				 		position  : ['center', [-0.40, 0]],
				 		type	  : 'error',
				 		closeTime : 2000,
				 		autoClose : true,
				 		id		:'alert_suc'
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
				 window.location.href= "<?php echo e(url('/wbssakidashi?page=')); ?>" + 'MIN&id=1';
				 //window.location.reload();
				 break;
				 default:
				 $("#btn_cancel").removeAttr('disabled');
				 $("#btn_barcode").removeAttr('disabled');
				 $("#btn_print").removeAttr('disabled');

				 $("#ponosaki").prop("disabled", true);
				 $("#btn_ponosaki").prop("disabled", true);
				 $("#partcode").prop("disabled", true);
				 $("#btn_partcode").prop("disabled", true);
				 $("#incharge").prop("disabled", true);
				 $("#receivingdate").prop("disabled", true);
				 $("#issuancenosaki").prop("disabled", true);
				 $("#btn_save").prop("disabled", true);
				 $("#btn_discard").prop("disabled", true);
				 $("#btn_add_batch").prop("disabled", true);
				 $("#btn_delete_batch").prop("disabled", true);
				 // $("#action").val("VIEW");
				 // document.getElementById('shipno').removeAttribute("disabled");
				 break;
				}
	// $('#loading').modal('toggle');
}

function loadItem(item)
{
	var query = location.search.substr(1);
	query = query.replace("partcode=", "partcode=" + item);

	window.location.href= "<?php echo e(url('/wbssakidashi?')); ?>" + query;
}

function saverecord()
{
	var si_arr = new Array;
	var obj_data = new Object;
	var item_arr = new Array;
	var cnt = 0;
	var ctr = 0;
	var is_valid = true;
	var action = $("#action").val();

	var detailsUpdateflag= $("#detailsUpdateflag").val();

	si_arr[0] = $('#issuancenosaki').val();
	si_arr[1] = $('#ponosaki').val();
	si_arr[2] = $('#devicecodesaki').val();
	si_arr[3] = $('#devicenamesaki').val();
	si_arr[4] = $('#poqtysaki').val();
	si_arr[5] = $('#incharge').val();
	si_arr[6] = $('#remarks').val();
	si_arr[7] = $('#statussaki').val();
	si_arr[8] = $("#createdbysaki").val();
	si_arr[9] = $("#createddatesaki").val();
	si_arr[10] = $("#updatedbysaki").val();
	si_arr[11] = $("#updateddatesaki").val();

	item_arr[0] = $("#partcode").val();
	item_arr[1] = $("#partname").val();
	item_arr[2] = $("#lotno").val();
	item_arr[3] = $("#pairno").val();
	item_arr[4] = $("#issueqty").val();
	item_arr[5] = $("#reqqty").val();
	item_arr[6] = $("#retqty").val();
	item_arr[7] = $("#schedretdate").val();

	if($.trim(si_arr[1]) == ''
		|| $.trim(si_arr[5]) == ''
		|| $.trim(item_arr[0]) == ''
		|| $.trim(item_arr[1]) == ''
		|| $.trim(item_arr[2]) == ''
		|| $.trim(item_arr[3]) == ''
		|| $.trim(item_arr[7]) == '')
	{
		is_valid = false;
	}

	if($("#ponosaki").val() != $("#hdnpono").val())
	{
		is_valid = false;
	}

	if(parseInt(item_arr[4]) && parseInt(item_arr[5]))
	{
		if(parseInt(item_arr[5]) >= parseInt(item_arr[4]))
		{
			item_arr[6] = parseInt(item_arr[5]) - parseInt(item_arr[4]);
		}
		else
		{
			is_valid = false;
		}
	}
	else
	{
		is_valid = false;
	}

	  	if(is_valid)
	  	{
	  		$('#loading').modal('toggle');

	  		switch(action)
	  		{
	  			case ('ADD'):
				// alert('add');

				$.post("<?php echo e(url('/wbssi-save')); ?>",
				{
					_token			    : $('meta[name=csrf-token]').attr('content')
					, si_arr			: si_arr
					, item_arr		    : item_arr
					, detailsUpdateflag : detailsUpdateflag
				})
				.done(function(data)
				{
					// alert(data);
					$('#loading').modal('toggle');
					$.alert('Sakidashi Issuance Added Successfully.',
					{
						position: ['center', [-0.40, 0]],
						type	: 'success',
						closeTime : 2000,
						autoClose : true,
						id		:'alert_suc'
					});
					window.location.href= "<?php echo e(url('/wbssakidashi?page=')); ?>" + 'MAX&id=-1';
				})
				.fail(function()
				{
					$('#loading').modal('toggle');
					alert('fail');
				});

				break;

				case('EDIT'):
				// alert(si_arr);
				// alert(item_arr);
				$.post("<?php echo e(url('/wbssi-update')); ?>",
				{
					_token			    : $('meta[name=csrf-token]').attr('content')
					, si_arr			: si_arr
					, item_arr		    : item_arr
					, detailsUpdateflag : detailsUpdateflag
				})
				.done(function(data)
				{
					$('#loading').modal('toggle');
					// alert(data);
					$.alert('Sakidashi Issuance Updated Successfully.',
					{
						position: ['center', [-0.40, 0]],
						type	: 'success',
						closeTime : 2000,
						autoClose : true,
						id		:'alert_suc'
					});
					window.location.href= "<?php echo e(url('/wbssakidashi?page=')); ?>" + 'CUR&id=' + $('#recid').val();
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
				position: ['center', [-0.40, 0]],
				type	: 'error',
				closeTime : 2000,
				autoClose : true,
				id		:'alert_suc'
			});
		}
	}

	function filterData(action)
	{
		var condition_arr = new Array;

		if(action == 'SRCH')
		{
			condition_arr[0] = $("#srch_pono").val();
			condition_arr[1] = $("#srch_devicecode").val();
			condition_arr[2] = $("#srch_itemcode").val();
			condition_arr[3] = $("#srch_incharge").val();
		}
		else
		{
			$("#srch_pono").val("")
			$("#srch_devicecode").val("")
			$("#srch_itemcode").val("")
			$("#srch_incharge").val("")

			condition_arr[0] = 'X';
			condition_arr[1] = 'X';
			condition_arr[2] = 'X';
			condition_arr[3] = 'X';
		}

		if($('#srch_open:checkbox:checked').length > 0)
		{
			condition_arr[4] ='1';
		}
		else
		{
			condition_arr[4] ='0';
		}

		if($('#srch_close:checkbox:checked').length > 0)
		{
			condition_arr[5] ='1';
		}
		else
		{
			condition_arr[5] ='0';
		}

		if($('#srch_cancelled:checkbox:checked').length > 0)
		{
			condition_arr[6] ='1';
		}
		else
		{
			condition_arr[6] ='0';
		}

		// alert(condition_arr);

		$.post("<?php echo e(url('/wbssi-search')); ?>",
		{
			_token		: $('meta[name=csrf-token]').attr('content')
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

						newItem = '<tr>'
						+ newcollink
						+ newcol
						+ '</tr>';
						$('#srch_tbl_body').append(newItem);
					});


			})
		.fail(function()
		{
			alert('fail');
		});
	}

	function searchData()
	{
		$("#searchModal").modal("show");
	}

    function findEdit(id)
    {
    	window.location.href= "<?php echo e(url('/wbssakidashi?page=')); ?>" + 'CUR&id=' + id;
    }

    function generateSiReport()
	{
		window.open("<?php echo e(url('/wbssi-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
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
												Sakidashi Issuance <i class="fa fa-angle-down"></i>
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
												<li class="active">
													<a href="<?php echo e(url('/wbssakidashi')); ?>">
		 											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbspartsreceiving')); ?>">
		 											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
		 										   </a>
												</li>
												<li>
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
													<a href="<?php echo e(url('/wbswhsmatissuance')); ?>" >
		 											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
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
										   <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item active">
											   <i class="glyphicon glyphicon-paste fa-2x"></i> Sakidashi Issuance
										   </a>
										   <a href="<?php echo e(url('/wbspartsreceiving')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
										   </a>
										   <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item">
											   <i class="fa fa-cubes fa-2x font-red-flamingo"></i> Warehouse Material Issuance
										   </a>
										</div>
									</div>


									<form>
										<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
											<div class="row">

												<div class="col-md-4">
													<div class="form-group row" style="margin-bottom: 5px;">
														<?php if(isset($sakidashi)): ?>
														<?php foreach($sakidashi as $sakidashi_d): ?>
														<?php endforeach; ?>
														<?php endif; ?>
														<label class="control-label col-md-3 input-sm">Issuance No.</label>
														<div class="col-md-3">
															<input type="hidden" class="form-control input-sm" id="recid" name="recid" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->id; } ?>" />
															<input type="hidden" class="form-control input-sm" id="action" name="action" value="<?php if(isset($action)){echo $action; } ?>" />
															<input type="hidden" class="form-control input-sm" id="hdnpono" name="hdnpono" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->po_no; } ?>" />
															<input type="hidden" class="form-control input-sm" id="hdnissuance" name="hdnissuance" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->issuance_no; } ?>" />
															<input type="hidden" class="form-control input-sm" id="detailsUpdateflag" name="detailsUpdateflag" value="<?php if(isset($detailsUpdateFlag)){echo $detailsUpdateFlag; } ?>" />
															<input type="text" class="form-control input-sm" id="issuancenosaki" name="issuancenosaki" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->issuance_no; } ?>" <?php if($action!='VIEW'){ echo "disabled"; } ?>>
														</div>
														<div class="col-md-6">
															<div class="btn-group btn-group-circle">
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('MIN'); " id="btn_min" class="btn blue input-sm" <?php if(isset($sakidashi_d)){if($sakidashi_d->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-backward"></i></button>
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('PRV'); " id="btn_prv" class="btn blue input-sm" <?php if(isset($sakidashi_d)){if($sakidashi_d->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-backward"></i></button>
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('NXT'); " id="btn_nxt" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-forward"></i></button>
																<button type="button" style="font-size:12px" onclick="javascript: getrecord('MAX'); " id="btn_max" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-forward"></i></button>
															</div>
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">PO No.</label>
														<div class="col-md-4">
															<input type="text" class="form-control input-sm" id="ponosaki" name="ponosaki" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->po_no; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
														</div>
														<div class="col-md-5">
															<button type="submit" class="btn btn-circle green input-sm" id="btn_ponosaki" <?php if($action=='VIEW'){ echo 'disabled'; } ?> <?php echo($state); ?>><i class="fa fa-arrow-circle-down"></i></button>
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">Device Code</label>
														<div class="col-md-4">
															<input type="text" class="form-control input-sm" id="devicecodesaki" name="devicecodesaki" disabled="disable"  value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->device_code; } ?>">
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">Device Name</label>
														<div class="col-md-4">
															<input type="text" class="form-control input-sm" id="devicenamesaki" name="devicenamesaki" disabled="disable" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->device_name; } ?>">
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">PO Qty.</label>
														<div class="col-md-4">
															<input type="text" class="form-control input-sm" id="poqtysaki" name="poqtysaki" disabled="disable" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->po_qty; } ?>">
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">In-Charge</label>
														<div class="col-md-4">
															<input type="text" class="form-control input-sm" id="incharge" name="incharge" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->incharge; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 10px;">
														<label class="control-label col-md-3 input-sm">Remarks</label>
														<div class="col-md-6">
															<textarea class="form-control" style="resize:none;" id="remarks" name="remarks" <?php if($action=='VIEW'){ echo 'disabled'; } ?> ><?php if(isset($sakidashi_d)){echo $sakidashi_d->remarks; } ?></textarea>
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">Status</label>
														<div class="col-md-6">
															<input type="text" class="form-control input-sm" id="statussaki" name="statussaki" disabled="disable" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->status; } ?>">
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">Created By</label>
														<div class="col-md-6">
															<input type="text" class="form-control input-sm" id="createdbysaki" name="createdbysaki" disabled="disable" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->create_user; } ?>">
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">Updated Date.</label>
														<div class="col-md-6">
															<input class="form-control date-picker input-sm" size="16" type="text"  value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->created_at; } ?>" name="createddatesaki" id="createddatesaki" disabled="disable"/>
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">Updated By</label>
														<div class="col-md-6">
															<input type="text" class="form-control input-sm" id="updatedbysaki" name="updatedbysaki" disabled="disable" value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->update_user; } ?>">
														</div>
													</div>
													<div class="form-group row" style="margin-bottom: 5px;">
														<label class="control-label col-md-3 input-sm">Updated Date</label>
														<div class="col-md-6">
															<input class="form-control date-picker input-sm" size="16" type="text"  value="<?php if(isset($sakidashi_d)){echo $sakidashi_d->updated_at; } ?>" name="updateddatesaki" id="updateddatesaki" disabled="disable"/>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 col-md-offset-2">

													<div class="portlet box blue" >
														<div class="portlet-body">
															<?php if(isset($sakidashi_item)): ?>
															<?php foreach($sakidashi_item as $sakidashi_i): ?>
															<?php endforeach; ?>
															<?php endif; ?>
															<div class="row">
																<div class="col-md-12">
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-3 input-sm">Part Code</label>
																				<div class="col-md-7">
																					<input type="text" class="form-control input-sm" id="partcode" name="partcode" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->item; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
																					<input type="hidden" class="form-control input-sm" id="hdnpartcode" name="hdnpartcode" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->item; } ?>" />
																				</div>
																				<div class="col-md-2">
																					<button type="submit" id="btn_partcode" class="btn btn-circle green input-sm" <?php if($action=='VIEW'){ echo 'disabled'; } ?> <?php echo($state); ?>><i class="fa fa-arrow-circle-down"></i></button>
																				</div>
																			</div>
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-3 input-sm">Part Name</label>
																				<div class="col-md-9">
																					<input type="text" class="form-control input-sm" id="partname" name="partname" disabled="disable" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->description; } ?>">
																				</div>
																			</div>
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-3 input-sm">Lot No.</label>
																				<div class="col-md-9">
																					<input type="text" class="form-control input-sm" id="lotno" name="lotno" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->lot_no; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
																				</div>
																			</div>
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-3 input-sm">Pair No.</label>
																				<div class="col-md-9">
																					<input type="text" class="form-control input-sm" id="pairno" name="pairno" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->pair_no; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-4 input-sm">Issue Qty</label>
																				<div class="col-md-8">
																					<input type="text" class="form-control input-sm" id="issueqty" name="issueqty" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->i_qty; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
																				</div>
																			</div>
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-4 input-sm">Required Qty.</label>
																				<div class="col-md-8">
																					<input type="text" class="form-control input-sm" id="reqqty" name="reqqty" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->rqd_qty; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
																				</div>
																			</div>
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-4 input-sm">Return Qty.</label>
																				<div class="col-md-8">
																					<input type="text" class="form-control input-sm" id="retqty" name="retqty" disabled="disable" value="<?php if(isset($sakidashi_i)){echo intval($sakidashi_i->rqd_qty) - intval($sakidashi_i->i_qty); } ?>" >
																				</div>
																			</div>
																			<div class="form-group row" style="margin-bottom: 5px;">
																				<label class="control-label col-md-4 input-sm">Sched Return Date</label>
																				<div class="col-md-8">
																					<input class="form-control date-picker input-sm" size="16" type="text" id="schedretdate" name="schedretdate" value="<?php if(isset($sakidashi_i)){echo $sakidashi_i->r_date; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> >
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-12">
																			<table class="table table-striped table-bordered table-hover table-responsive" id="sample_2" style="font-size:10px">
																				<thead>
																					<tr>
																						<td class="text-center" colspan="5">History</td>
																					</tr>
																					<tr>
																						<td>Transaction No.</td>
																						<td>Issued Qty.</td>
																						<td>Returned Qty.</td>
																						<td>Lot No.</td>
																						<td>Remarks</td>
																					</tr>
																				</thead>
																				<tbody>
																					<?php if(isset($sakidashi_item_his)): ?>
																					<?php foreach($sakidashi_item_his as $sakidashi_i_h): ?>
																					<tr>
																						<td><?php echo e($sakidashi_i_h->po_no); ?></td>
																						<td style="text-align: right;"><?php echo e($sakidashi_i_h->i_qty); ?></td>
																						<td style="text-align: right;"><?php echo e($sakidashi_i_h->r_qty); ?></td>
																						<td><?php echo e($sakidashi_i_h->lot_no); ?></td>
																						<td><?php echo e($sakidashi_i_h->remarks); ?></td>
																					</tr>
																					<?php endforeach; ?>
																					<?php endif; ?>
																				</tbody>
																			</table>
																		</div>
																	</div>

																</div>
															</div>

														</div>
													</div>

												</div>
											</div>
										</form>


										<div class="row">
											<div class="col-md-12 text-center">
												<button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('ADD'); " class="btn green input-sm" id="btn_add" <?php echo($state); ?> >
													<i class="fa fa-plus"></i> Add New
												</button>
												<button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: saverecord(); " class="btn blue-madison input-sm" id="btn_save" <?php echo($state); ?> >
													<i class="fa fa-pencil"></i> Save
												</button>
												<button type="button" style="font-size:12px; <?php if(isset($sakidashi_d)){ if($sakidashi_d->status == 'Cancelled' || $sakidashi_d->status == 'Close') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; }elseif (isset($sakidashi_d)) { if($sakidashi_d->status == 'Close'){ echo 'display:none;'; } } ?>" onclick="javascript: setcontrol('EDIT'); " class="btn blue-madison input-sm" id="btn_edit" <?php echo($state); ?> >
													<i class="fa fa-pencil"></i> Edit
												</button>
												<button type="button" style="font-size:12px; <?php if(isset($sakidashi_d)){ if($sakidashi_d->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('CNL'); " class="btn red input-sm" id="btn_cancel" <?php echo($state); ?> >
													<i class="fa fa-trash"></i> Cancel
												</button>
												<button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('DIS'); " class="btn red-intense input-sm" id="btn_discard" <?php echo($state); ?> >
													<i class="fa fa-times"></i> Discard Changes
												</button>
												<button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: searchData();" class="btn blue-steel input-sm" id="btn_search" >
													<i class="fa fa-search"></i> Search
												</button>
												<button type="submit" style="font-size:12px; <?php if(isset($sakidashi_d)){ if($sakidashi_d->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" formtarget="_blank" onclick="javascript: generateSiReport();" class="btn purple-plum input-sm" id="btn_print" <?php echo($state); ?> <?php echo($state); ?>>
													<i class="fa fa-print"></i> Print Issuance Sheet
												</button>
											</div>
										</div>
									</div>
								</div>

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

								<!-- Successful Ship Load Pop-message-->
								<div id="validShipModal" class="modal fade" role="dialog">
									<div class="modal-dialog modal-sm blue">
										<div class="modal-content ">
											<div class="modal-body">
												<p>Purchase Data Successfully Loaded.</p>
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
										<form role="form" method="POST" action="<?php echo e(url('/wbssi-cancel')); ?>">
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
								<!-- Item Modal -->
								<div id="itemModal" class="modal fade" role="dialog">
									<div class="modal-dialog modal-lg">

										<!-- Modal content-->
										<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/wbssakidashi')); ?>">
											<?php echo csrf_field(); ?>

											<div class="modal-content blue">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Select PO Part Details</h4>
												</div>
												<div class="modal-body">
													<div class="row" style="width:880px; height:300px; overflow:auto;">
														<div class="col-md-12">
															<table class="table table-striped table-bordered table-hover table-responsive" id="sample_3" name="sample_3" style="font-size:10px">
																<thead>
																	<tr>
																		<td width="10%"></td>
																		<td>Item Part/No.</td>
																		<td>Item Description</td>
																		<td>Sched Qty.</td>
																		<td>Actual Total</td>
																	</tr>
																</thead>
																<tbody id="item_tbl_body">
																	<?php if(isset($sakidashi_item)): ?>
																	<?php foreach($sakidashi_item as $sakidashi_i): ?>
																	<tr>
																		<td><a href="#" onclick="javascript: loadItem('<?php echo e($sakidashi_i->item); ?>')" value="<?php echo e($sakidashi_i->item); ?>">Select</a></td>
																		<td><?php echo e($sakidashi_i->item); ?></td>
																		<td><?php echo e($sakidashi_i->description); ?></td>
																		<td><?php echo e($sakidashi_i->i_qty); ?></td>
																		<td><?php echo e($sakidashi_i->i_qty); ?></td>
																	</tr>
																	<?php endforeach; ?>
																	<?php endif; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>


								<!-- Search Modal -->
								<div id="searchModal" class="modal fade" role="dialog">
									<div class="modal-dialog modal-lg">

										<!-- Modal content-->
										<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/wbssakidashi')); ?>">
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
																<label for="inputname" class="col-md-4 control-label" style="font-size:12px">PO No</label>
																<div class="col-md-4">
																	<input type="text" class="form-control input-sm" id="srch_pono" placeholder="PO No." name="srch_pono" autofocus <?php echo($readonly); ?> />
																</div>
															</div>
															<div class="form-group">
																<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Device Code</label>
																<div class="col-md-4">
																	<input type="text" class="form-control input-sm" id="srch_devicecode" placeholder="Device Code" name="srch_devicecode" <?php echo($readonly); ?> />
																</div>
															</div>
															<div class="form-group">
																<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Item Part / No</label>
																<div class="col-md-4">
																	<input type="text" class="form-control input-sm" id="srch_itemcode" placeholder="Item Part / No." name="srch_itemcode" <?php echo($readonly); ?> />
																</div>
															</div>
															<div class="form-group">
																<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Incharge</label>
																<div class="col-md-4">
																	<input type="text" class="form-control input-sm" id="srch_incharge" placeholder="Incharge" name="srch_incharge" <?php echo($readonly); ?> />
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
															<table class="table table-striped table-bordered table-hover table-responsive" id="sample_2" style="font-size:10px">
																<thead>
																	<tr>
																		<td width="10%"></td>
																		<td>Transaction No.</td>
																		<td>PO No.</td>
																		<td>Device Code</td>
																		<td>Device Name</td>
																		<td>Incharge</td>
																		<td>Item Part/No.</td>
																		<td>Item Description</td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>