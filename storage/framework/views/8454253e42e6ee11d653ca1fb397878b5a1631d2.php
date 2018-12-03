<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: PoStatus.blade.php
     MODULE NAME:  [3008-1] PO Status
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.05.03
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.05.03     MESPINOSA       Initial Draft
*******************************************************************************/
?>
	

	<script type="text/javascript">

	function redirect(btn)
	{
		//PO Change Delivery
		if(btn=='DEL')
		{
		    window.location.href= "<?php echo e(url('/pochangedelivery?code=')); ?>" + $('#input_code_d').text() + '&po=' + $('#lbl_inputpo').text();
		}
		//PO Parts Status
		else if(btn == 'PSTAT')
		{
		    window.location.href= "<?php echo e(url('/popartsstatus?code=')); ?>" + $('#input_code_d').text() + '&po=' + $('#lbl_inputpo').text() + '&haspart=1';
		}
		//isogiinput
		else if(btn == 'ISO')
		{
		    window.location.href= "<?php echo e(url('/poisogiinput?code=')); ?>" + $('#input_code_d').text();
		}
		//Export to PDF
		else if(btn == 'PDF')
		{
			window.open("<?php echo e(url('/po_printing?po=')); ?>" + $('#lbl_inputpo').text(), '_blank');
		}
	};

	function redirect_val(btn, val)
	{
		// PO Change Delivery
		if(btn=='DEL')
		{
		    window.location.href= "<?php echo e(url('/pochangedelivery?code=')); ?>" + val;
		}
		// PO Parts Status
		else if(btn == 'PSTAT')
		{
		    window.location.href= "<?php echo e(url('/popartsstatus?code=')); ?>" + val + '&po=' + $('#lbl_inputpo').text()+ '&haspart=0';
		}
		//isogiinput
		else if(btn == 'ISO')
		{
		    window.location.href= "<?php echo e(url('/poisogiinput?code=')); ?>" + val + '&po=' + $('#lbl_inputpo').text();
		}
	};

	function exportHtmlToPdf()
	{
		var doc = new jsPDF('landscape','pt');
		// var table = tableToJson($('#sample_3').get(0))
	    var specialElementHandlers = {
	        '#editor': function (element, renderer) {
	            return true;
	        }
	    };

	    doc.fromHTML($('#sample_pdf').html(), 15, 15, {
	        'width': 1200,
                'elementHandlers': specialElementHandlers
	    });
	    doc.setFontSize(6);
	    doc.save('sample-file.pdf');
	}

	function hideOrShow(action)
	{
		$(".details").each(function()
		{
			var id = $(this).attr('name');
			if(action =='HIDE')
			{
				$(this).hide();
			}
			else
			{
				$(this).show();	
			}
		});
	};

	function show_hide_column(col_no, do_show) 
	{
	   var tbl = document.getElementById('sample_3');
	   var col = tbl.getElementsByTagName('col')[col_no];
	   if (col) {
	     col.style.visibility=do_show?"":"collapse";
	   }
	};

	</script>
	<?php $__env->startSection('title'); ?>
	SSS (PO Status) | Pricon Microelectronics, Inc.
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_SSS')): ?>
			<?php if($access->read_write == "2"): ?>
				<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php $urlparam = $access->program_code?>
	<?php endforeach; ?>
	
	<div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content" style="padding-top:5px">
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-line-chart"></i>  Scheduling Support System (PO Status)
								</div>
							</div>
							<div class="portlet-body" style="padding-top: 0px; padding-bottom: 0px;">
								<div class="row">
									<div class="col-md-12" >
										<div class="col-md-4">
											<h3>PO STATUS CONFIRMATION</h3>
										</div>
										<div class="col-md-8">
											<br/>
											<button type="button" onclick="javascript: redirect('DEL'); " id="btn_chgdelivery" class="btn btn-warning pull-right"><i class="fa fa-truck"></i> CHANGE DELIVERY </button>
											<button type="button" onclick="javascript: redirect('PSTAT'); " class="btn btn-success pull-right"><i class="fa fa-certificate"></i> PART STATUS </button>
											<button type="submit" formtarget="_blank" onclick="javascript: redirect('PDF'); " class="btn btn-info pull-right" <?php echo($state); ?> ><i class="fa fa-file-pdf-o"></i> PRINT </button>
											<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary pull-right" <?php echo($state); ?> ><i class="fa fa-file-archive-o"></i> EXTRACT </button>
											<input type="hidden" class="form-control" id="hdnPo" placeholder="PO" name="code" autofocus value="PO">
										</div>
									</div>
								</div>
								<br/>
								<div class="row">
									<div class="col-md-12" >
										<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/postatus')); ?>">
											<?php echo csrf_field(); ?>

											<div class="portlet box blue">
												<div class="portlet-title" style="min-height: 20px;">
													<div class="caption" style="padding-top: 5px; padding-bottom: 5px;">
														SEARCH
													</div>
												</div>
												<div class="portlet-body" style="padding-bottom: 0px;">
													<div class="row">
														<div class="col-md-12" >
															<div class="form-group">
																<div class="col-md-1">
																	<label for="input_po" class="control-label">PO</label>
																</div>
																<div class="col-md-2">
																	<input type="text" class="form-control" id="inputPo" placeholder="PO" name="po" autofocus value="<?php if(isset($po_s)){ if($po_s == 'X') { echo '';} else{ echo $po_s; }} ?>" >
																</div>
																<div class="col-md-1">
																	<label for="input_po_name" class="control-label">Product Name</label>
																</div>
																<div class="col-md-2">
																	<input type="text" class="form-control" id="inputPoName" placeholder="Product Name" name="name" value="<?php if(isset($name)){ if($name == 'X') { echo '';} else{ echo $name; }} ?>" >
																</div>
																<div class="col-md-1">
																	<button type="submit" class="btn btn-info pull-right"><i class="fa fa-search"></i> SEARCH </button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="portlet box blue" id="report_body" style="padding-top: 0px; padding-bottom: 0px; padding-left: 0px; padding-right: 0px;">
												<div class="portlet-body" style="padding-top: 0px; padding-bottom: 0px;">
													<div class="row">
														<div class="col-md-6" >
															<div class="col-md-12" >
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">PO :</span></h4>
																</div>
																<div class="col-md-5" style="padding-top: 0px; padding-bottom: 0px;">
																	<b><label for="input_po" id="lbl_inputpo" class="control-label" style="font-size: 18px; font-weight: bold;"> 
																	<?php foreach($po as $value): ?>
																		<?php echo e($value->PO); ?>

																	<?php endforeach; ?>
																	 </label></b>
																</div>
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">PO DATE :</span></h4>
																</div>
																<div class="col-md-3" style="padding-top: 0px; padding-bottom: 0px;">
																	<label for="input_podate" class="control-label"> 
																	<?php if(isset($value)){echo $value->PODate; } ?>
																	</label>
																</div>
															</div>
															<div class="col-md-12">
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">CODE :</span></h4>
																</div>
																<div class="col-md-5" style="padding-top: 0px; padding-bottom: 0px;">
																	<label for="input_code" id="input_code_d" class="control-label"> 
																	<?php if(isset($value)){echo $value->Code; } ?>
																	</label>
																</div>
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">DEMAND :</span></h4>
																</div>
																<div class="col-md-3" style="padding-top: 0px; padding-bottom: 0px;">
																	<label for="input_demand" class="control-label"> 
																	<?php if(isset($value)){echo $value->Demand; } ?>
																	</label>
																</div>
															</div>
															<div class="col-md-12" >
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">NAME :</span></h4>
																</div>
																<div class="col-md-5" style="padding-top: 0px; padding-bottom: 0px;">
																	<label for="input_name" class="control-label pull-left" style="font-size: 18px; font-weight: bold; text-align: left;"><?php if(isset($value)){echo $value->Name; } ?></label>
																</div>
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">UPDATED BY :</span></h4>
																</div>
																<div class="col-md-3" style="padding-top: 0px; padding-bottom: 0px;">
																	<label for="input_demand" class="control-label"> 
																	<?php if(isset($value)){echo $value->UpdatedBy; } ?>
																	</label>
																</div>
															</div>
															<div class="col-md-12" >
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">CUSTOMER :</span></h4>
																</div>
																<div class="col-md-10" style="padding-top: 0px; padding-bottom: 0px;">
																	<label for="input_customer" class="control-label">
																	<?php if(isset($value)){echo $value->Customer; } ?>
																	</label>
																</div>
															</div>
															<div class="col-md-12" >
																<div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">QUANTITY :</span></h4>
																</div>
																<div class="col-md-10" style="padding-top: 0px; padding-bottom: 0px;">
																	<label for="input_qty" class="control-label"> 
																	<?php if(isset($value)){echo $value->Qty; } ?>
																	</label>
																</div>
															</div>
															<div class="col-md-12" >
																<div class="col-md-3" style="padding-top: 0px; padding-bottom: 0px;">
																	<h4><span class="label label-info">MEMO/REMINDERS :</span></h4>
																</div>
																<div class="col-md-9" style="padding-top: 0px; padding-bottom: 0px;">
																	<textarea rows="2" cols="40" class="form-control" id="edit_memo" placeholder="Memo / Reminders" name="memo" style="resize: none; padding-bottom: 0px;padding-top:0px" <?php echo($readonly); ?> ><?php if(isset($value)){ if(!empty($value->Remarks)){ echo trim($value->Remarks); }} ?></textarea>
																</div>
															</div>
															<div class="col-md-12" >
																<div class="col-md-12" style="padding-top: 5px; padding-bottom: 5px;">
																	<button type="button" onclick="javascript:hideOrShow('SHOW');" class="btn btn-success"><i class="fa fa-eye"></i> SHOW DETAILS </button>
																	<button type="button" onclick="javascript:hideOrShow('HIDE');" class="btn btn-warning"><i class="fa fa-eye-slash"></i> HIDE DETAILS </button>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="portlet box blue">
																<div class="portlet-title" style="min-height: 20px;">
																	<div class="caption" style="padding-top: 5px; padding-bottom: 5px;">
																		R3 ANSWER
																	</div>
																</div>
																<div class="portlet-body">
																	<div class="table-responsive scroller" style="height: 175px">
																		<table class="table table-striped table-bordered table-hover">
																			<thead>
																				<tr>
																					<th>
																						PO
																					</th>
																					<th>
																						R3Answer
																					</th>
																					<th>
																						Time
																					</th>
																					<th>
																						Qty
																					</th>
																					<th>
																						Remarks
																					</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach($answers as $answer): ?>
																				<tr class="odd gradeX" id="salesorderdata" name="salesorderdata">
																					<td>
																						<?php echo e($answer->po); ?>

																					</td>
																					<td>
																						<?php echo e($answer->r3answer); ?>

																					</td>
																					<td style="text-align: right;">
																						<?php echo e($answer->time); ?>

																					</td>
																					<td style="text-align: right;">
																						<?php echo e($answer->qty); ?>

																					</td>
																					<td>
																						<?php echo e($answer->re); ?>

																					</td>
																				</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-md-12">
															<div class="portlet box blue">
																<div class="portlet-title" style="min-height: 20px;">
																	<div class="caption" style="padding-top: 5px; padding-bottom: 5px;">
																		DETAILS &nbsp;&nbsp;&nbsp;
																		<span class="label label-sm label-info"> FROM STOCK </span> &nbsp;&nbsp;&nbsp;
																		<span class="label label-sm label-danger">ALLOCATION </span>
																	</div>
																	<div class="tools">
																		<a href="javascript:;" class="collapse">
																		</a>
																	</div>
																</div>
																<div class="portlet-body">
																	<div class="row">
																		<div class="col-md-12 table-responsive" style="height: 300px">

																			<table class="table table-striped table-bordered table-hover"><!--id="sample_3"-->
																				<thead>
																					<tr>
																						<th>
																							CODE
																						</th>
																						<th style="min-width: 250px">
																							NAME
																						</th>
																						<th>
																							VI
																						</th>
																						<th>
																							PO Req
																						</th>
																						<th>
																							PO Balance
																						</th>
																						<th>
																							Gross Req
																						</th>
																						<th class="details">
																							ASSY100
																						</th>
																						<th class="details">
																							WHS100
																						</th>
																						<th class="details">
																							WHS102
																						</th>
																						<th>
																							TOTAL
																						</th>
																						<th>
																							INV RESR
																						</th>
																						<th>
																							PR BAL
																						</th>
																						<th>
																							MRP
																						</th>
																						<th>
																							PR_ISSUED
																						</th>
																						<th>
																							PR
																						</th>
																						<th>
																							PICK UP (GR)
																						</th>
																						<th>
																							YECPO
																						</th>
																						<th>
																							YEC P/U
																						</th>
																						<th>
																							P/U QTY
																						</th>
																						<th>
																							CHECK
																						</th>
																						<th>
																							DELIACCUM
																						</th>
																						<th>
																							IN CHARGE
																						</th>
																						<th>
																							RE
																						</th>
																						<th>
																							STATUS
																						</th>
																						<th>
																							ALLOCATIONCALC
																						</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php foreach($details_data as $detail): ?>
																					<tr class="odd gradeX">
																						<td>
																							<!-- <a onclick="javascript: redirect_val('PSTAT', '<?php echo e($detail->KCODE); ?>'); "> <?php echo e($detail->KCODE); ?> </a> -->
																							<a onclick="javascript: redirect_val('ISO', '<?php echo e(urlencode($detail->PNAME)); ?>'); "> <?php echo e($detail->KCODE); ?> </a>
																						</td>
																						<td>
																							<!-- <a onclick="javascript: redirect_val('ISO', '<?php echo e(urlencode($detail->PNAME)); ?>'); "> <?php echo e($detail->PNAME); ?> </a> -->
																							<a onclick="javascript: redirect_val('PSTAT', '<?php echo e($detail->KCODE); ?>'); "> <?php echo e($detail->PNAME); ?> </a>
																						</td>
																						<td>
																							<?php echo e($detail->VI); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->PoReq); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->PoBalance); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->GrossReq); ?>

																						</td>
																						<td class="details" style="text-align: right">
																							<?php echo e($detail->ASSY100); ?>

																						</td>
																						<td class="details" style="text-align: right">
																							<?php echo e($detail->WHS100); ?>

																						</td>
																						<td class="details" style="text-align: right">
																							<?php echo e($detail->WHS102); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->TOTAL); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->InvResr); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->PrBal); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->MRP); ?>

																						</td>
																						<td>
																							<?php echo e($detail->PR_Issued); ?>

																						</td>
																						<td>
																							<?php echo e($detail->PR); ?>

																						</td>
																						<td>
																							<?php echo e($detail->PickUpGR); ?>

																						</td>
																						<td>
																							<?php echo e($detail->YecPo); ?>

																						</td>
																						<td>
																							<?php echo e($detail->YecPu); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->PuQty); ?>

																						</td>
																							<?php if($detail->Check == 'FromStock'): ?>
																						<td>
																								<span class="label label-sm label-info">
																								FROM STOCK </span>
																						</td>
																							<?php elseif($detail->Check == 'Allocation'): ?>
																						<td>
																								<span class="label label-sm label-danger">
																								ALLOCATION </span>
																						</td>
																							<?php else: ?> 
																						<td style="text-align: right">
																								<?php echo e($detail->Check); ?>

																						</td>
																							<?php endif; ?>
																						<td style="text-align: right">
																							<?php echo e($detail->Deliaccum); ?>

																						</td>
																						<td>
																							<?php echo e($detail->Incharge); ?>

																						</td>
																						<td>
																							<?php echo e($detail->RE); ?>

																						</td>
																						<td>
																							<?php echo e($detail->Status); ?>

																						</td>
																						<td style="text-align: right">
																							<?php echo e($detail->AllocationCalc); ?>

																						</td>
																					</tr>
																					<?php endforeach; ?>
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
											<div id="editor"></div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm">

									<!-- Modal content-->
									<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/po_printing')); ?>" target="_blank">
										<div class="modal-content blue" style="width: 500px">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">PO PRINTING</h4>
											</div>
											<div class="modal-body">
												<div class="row">
														<?php echo csrf_field(); ?>

														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-3">
																	<h4><span class="label label-info">PO Date</span></h4>
																</div>
																<div class="col-md-9">
																	<div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
																		<input type="text" class="form-control" name="from">
																		<span class="input-group-addon">
																		to </span>
																		<input type="text" class="form-control" name="to">
																	</div>
																	<span class="help-block"> Select date range </span>
																</div>
															</div>
														</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-info" id="btn_print" formtarget="_blank"><i class="fa fa-print"></i> Print</button>
												<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
												<input type="hidden" class="form-control" id="hdnPo" name="po" autofocus value="<?php if(isset($value)){echo $value->PO; } ?>">
											</div>
										</div>
									</form>
								</div>
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