<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: PoChangeDelivery.blade.php
     MODULE NAME:  [3008-1] PO Status : Change Delivery
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.05.03
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.05.03     MESPINOSA       Initial Draft
*******************************************************************************/
?>




<?php $__env->startSection('title'); ?>
	PO Status(Change Delivery) | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<script type="text/javascript">

function openmail()
{
	var selected_reason = '';

	if ($.trim($('#dd_reason').val()) =='0')
	{
		selected_reason = '';
	}
	else
	{
		selected_reason = $.trim($('#dd_reason option:selected').text());
	}

	$('#new1').val($('#txt_new1').val());
	$('#new2').val($('#txt_new2').val());
	$('#sel_reason').val(selected_reason);
	$('#note').val($('#txt_note').val());

	 $('#mailModal').modal({
        show: 'true'
    }); 
}

$('#txtnew1').keyup(function() {
	alert($(this).val());
    // $('#txt_username').text($(this).val());
});

</script>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php ini_set('max_input_vars', 999999);?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_SSS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
	
	<div class="clearfix">
	</div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
					<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-pencil"></i> CHANGE DELIVERY NOTICE
								</div>
							</div>
							<div class="portlet-body portlet-empty">
								<!-- <form  class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/send-mail')); ?>">
								<?php echo csrf_field(); ?> -->
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo e(url('/postatus?po=')); ?> <?php if(isset($po)) { if($po == 'X') { echo '';} else {echo $po;}} ?>" class="btn btn-sm yellow pull-right"><i class="fa fa-mail-reply"></i> Back</a>
										<button type="button" onclick="javascript:openmail();" id="btn_composemail" class="btn btn-sm green pull-right"><i class="fa fa-pencil"></i> Compose Message</button>
										<!-- data-toggle="modal" data-target="#mailModal" -->
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="portlet box blue">
											<div class="portlet-body portlet-empty">
												<div class="row">
													<label class="col-sm-1">
														<button class="btn btn-sm grey-gallery" disabled>PART CODE:</button>
													</label>
													<label class="col-sm-4" style="font-size: 20px"value=""><strong>
														<?php foreach($po_details as $value): ?>
															<?php echo e($value->Code); ?>

														<?php endforeach; ?>
													</strong></label>
													<label class="col-sm-1">
														<button class="btn btn-sm grey-gallery" disabled>PART NAME:</button>
													</label>
													<span class="col-sm-4" style="font-size: 20px" name="name"><strong><?php if(isset($value)){echo $value->Name; } ?></strong></span>
												</div>
												<div class="row">
													<label class="col-sm-1" >
														<button class="btn btn-sm grey-gallery" disabled>COSTUMER:</button>
													</label>
													<span class="col-sm-9" style="font-size: 20px"><strong><?php if(isset($value)){echo $value->Customer; } ?></strong></span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h3>ORIGINAL</h3>
										<span><medium>*Double Click to add the original date and qty</medium></span>
										<div class="scroller" data-rail-visible="1" style="height: 350px">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>
															R3Answer
														</th>
														<th>
															Qty
														</th>
														<th>
															Time
														</th>
														<th>
															Re
														</th>
													</tr>
												</thead>

												<tbody id="table" >
													<?php foreach($answers as $answer): ?>
													<tr class="odd gradeX" id="salesorderdata" name="salesorderdata">
														<td>
															<?php echo e($answer->r3answer); ?>

														</td>
														<td style="text-align: right">
															<?php echo e($answer->qty); ?>

														</td>
														<td style="text-align: right">
															<?php echo e($answer->time); ?>

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

								<div class="row">
									<div class="col-md-6">
										<label class="col-sm-2">
											<button class="btn btn-sm grey-gallery" disabled>New:</button>
										</label>
										<input class="form-control form-control-inline input-medium col-sm-3" type="text" name="txtnew1" id="txt_new1" placeholder="New 1" />
										<input class="form-control form-control-inline input-medium col-sm-3" type="text" name="txtnew2" id="txt_new2" placeholder="New 2"/>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label class="col-sm-3">
											<button class="btn btn-sm grey-gallery" disabled>What is The Reason:</button>
										</label>
										<select class="form-control form-control-inline input-medium col-sm-3" name="ddreason" id="dd_reason">
											<option selected="selected" value="0">-- Select --</option>
											<?php foreach($reasons as $reason): ?>
											<option value="<?php echo e($reason->code); ?>">
												<?php echo e($reason->name); ?>

											</option>
											<?php endforeach; ?>
										</select>
										<label class="col-sm-6">
											<button class="btn btn-sm grey-gallery" disabled>Note:</button>
										</label>
										<textarea rows="5" cols="40" class="form-control" placeholder="Note" style="resize: none;" name="txtnote" id="txt_note"></textarea>
									</div>
								</div>
								
								<!-- </form> -->

							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->

						<!-- Mail Modal -->
						<div id="mailModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">

								<!-- Modal content-->
								<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/send-mail')); ?>">
									<div class="modal-content blue">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">SEND EMAIL</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<?php echo csrf_field(); ?>

												<div class="col-md-12">
													<div class="form-group">
														<label class="col-sm-1">To :</label>
														<input class="form-control form-control-inline input-medium col-sm-11" type="email" placeholder="TO" name="to" id="mailto" style="min-width: 750px" />
													</div>
													<div class="form-group">
														<label class="col-sm-1">Cc :</label>
														<input class="form-control form-control-inline input-medium col-sm-11" type="email" placeholder="CC" name="cc" style="min-width: 750px" />
													</div>

													<div class="form-group">
														<label class="col-sm-1">Subject:</label>
														<input class="form-control form-control-inline input-medium col-sm-11" type="text" placeholder="Subject" name="subject" style="min-width: 750px; font-size: 16px" value="CHANGE DELIVERY NOTICE" />
													</div>
													<div class="col-md-12">
													<br/>
														<label class="col-sm-12">Body:</label>
													</div>
													<div class="col-md-12" style="border-style: solid; border-width: 1px; border-color: gray; padding-bottom: 10px">

													<div class="col-md-12">
													<input class="form-control form-control-inline input-medium col-sm-3" type="hidden" name="po" value="<?php if(isset($po)) {echo $po;} ?>"/>
													<input class="form-control form-control-inline input-medium col-sm-3" type="hidden" name="code" value="<?php if(isset($value)){echo $value->Code; } ?>"/>

														<h3>Part Code: 
															<?php if(isset($value)){echo $value->Code; } ?>
														</h3>
														<h3>Part Name: <?php if(isset($value)){echo $value->Name; } ?></h3>
														<h3>Customer: <?php if(isset($value)){echo $value->Customer; } ?></h3>
													</div>
													<div class="col-md-12">
														<table border="1" cellpadding="0" cellspacing="0" style="width: 500px;">
															<thead>
																<tr>
																	<th scope="col">R3Answer</th>
																	<th scope="col">Qty</th>
																	<th scope="col">Time</th>
																	<th scope="col">Re</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach($answers as $answer): ?>
																<tr class="odd gradeX" id="salesorderdata" name="salesorderdata">
																	<td>
																		<?php echo e($answer->r3answer); ?>

																	</td>
																	<td style="text-align: right">
																		<?php echo e($answer->qty); ?>

																	</td>
																	<td style="text-align: right">
																		<?php echo e($answer->time); ?>

																	</td>
																	<td>
																		<?php echo e($answer->re); ?>

																	</td>
																</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
													<div class="col-md-12">
														<p>NEW: </p> 
														<input class="form-control form-control-inline input-medium col-sm-3" type="text" id="new1" name="new1" readonly />
														<input class="form-control form-control-inline input-medium col-sm-3" type="text" id="new2" name="new2" readonly />
													</div>
													<div class="col-md-12">
														<p>WHAT IS THE REASON: </p>
														<input class="form-control form-control-inline input-medium col-sm-3" type="text" id="sel_reason" name="reason" readonly />
													</div>
													<div class="col-md-12">
														<p>NOTE: </p>
														<textarea rows="5" cols="40" class="form-control" placeholder="Note" style="resize: none;" id="note" name="note" ></textarea>
													</div>
													<br/>
													</div>
												</div>													
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success" id="btnSend"><i class="fa fa-send"></i> Send</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
										</div>
									</div>
								</form>

							</div>
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