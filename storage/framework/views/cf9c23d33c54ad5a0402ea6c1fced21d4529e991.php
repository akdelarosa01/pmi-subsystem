	<script type="text/javascript">

	function actionRecords(action)
	{
        var obj_data = new Object;
        var cnt = 0;
        var selecteditem = '';

        $(".checkboxes").each(function()
        {
        	var id = $(this).attr('name');
        	if($(this).is(':checked'))
        	{
        		if(cnt==0)
        		{
					selecteditem = $(this).val();
        		}
        		else
        		{
        			selecteditem = selecteditem + ',' + $(this).val();
        		}
        		cnt++;
        	}
       	});


        if (cnt == 0)
        {
    		$.alert('No selected record.',
    		{
				position: ['center', [-0.42, 0]],
				type: 'danger',
				closeTime: 3000,
				autoClose: true
			});
        }
        else
        {
        	if(action =='DEL')
        	{
	    		$("#deleteModal").modal("show");
				$('#delete_inputId').val(selecteditem);
        	}
        	else if(action == 'EDIT')
        	{
        		//error when more than 1 record is selected for edit.
        		if(cnt > 1)
        		{
		    		$.alert('Please select one (1) record only.',
		    		{
						position: ['center', [-0.42, 0]],
						type: 'danger',
						closeTime: 3000,
						autoClose: true
					});
        		}
        		else
        		{
        			var dbcon = "<?php echo e(Auth::user()->productline); ?>";
      //   			if($('#dbconnection').val() == 0)
      //   			{
			   //  		$.alert('Please select database connection.',
			   //  		{
						// 	position: ['center', [-0.42, 0]],
						// 	type: 'danger',
						// 	closeTime: 3000,
						// 	autoClose: true
						// });
	     //    		}
      //   			else
      //   			{
						window.location.href= "<?php echo e(url('/packinglistdetails?selecteditem=')); ?>" + selecteditem + "&dbconnection=" + dbcon;//$('#dbconnection').val();
					//}
        		}
        	}
        	else
        	{
        		//Unknown action.
        	}
        }

    }

    function addDetails()
    {
    	var dbcon = "<?php echo e(Auth::user()->productline); ?>";

   //      if($('#dbconnection').val() == 0)
   //     	{
			// $.alert('Please select database connection.',
			// {
			// 	position: ['center', [-0.42, 0]],
			// 	type: 'danger',
			// 	closeTime: 3000,
			// 	autoClose: true
			// });
	  //   }
   //      else
   //     	{
			window.location.href= "<?php echo e(url('/packinglistdetails?dbconnection=')); ?>" + dbcon;//$('#dbconnection').val();
		//}
    }

    function setDate()
    {
    	$('#dateFromXls').val($('#srch_from').val());
    	$('#dateToXls').val($('#srch_to').val());
    	$('#dateFromPdf').val($('#srch_from').val());
    	$('#dateToPdf').val($('#srch_to').val());

    }

/*    function exportToPdf()
    {
		window.open("<?php echo e(url('/packinglistsystem-exportpdf')); ?>" , "_blank");
    }*/

    </script>


<?php $__env->startSection('title'); ?>
	Packing List System | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_PLSYSTEM')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>


	<div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-bars"></i>  PACKING LIST SYSTEM
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-md-12">

										<div class="row">
											<div class="col-sm-12">
												<form class="form-horizontal">
													<?php echo csrf_field(); ?>

			                                        <div class="form-group">
														<label for="inputcode" class="col-sm-1 control-label input-sm">Invoice Date</label>
			                                             <div class="col-sm-3 col-xs-4">
			                                                  <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
			                                                       <input type="text" class="form-control input-sm" name="srch_from"  style="font-size:12px" id="srch_from" value="<?php if(isset($srchfrom)){ echo $srchfrom;} ?>"/>
			                                                       <span class="input-group-addon input-sm">to </span>
			                                                       <input type="text" class="form-control input-sm" name="srch_to" style="font-size:12px" id="srch_to" value="<?php if(isset($srchto)){ echo $srchto;} ?>"/>
			                                                  </div>
			                                             </div>
			                                             <div class="col-sm-1">
															<button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i>view</button>
														 </div>

														

			                                        </div>
												</form>
											</div>
										</div>


										<div class="row">
											<div class="col-sm-12">
												<table class="table table-striped table-bordered table-hover" id="sample_3" style="font-size:10px">
													<thead>
														<tr>
															<td></td>
															<td>CTR #</td>
															<td>Invoice Date</td>
															<td>Remarks</td>
															<td>Sold To</td>
															<td>Ship To</td>
															<td>Carrier</td>
															<td>Date Ship</td>
															<td>Port of Loading</td>
															<td>Port of Destination</td>
															<td>Shipping Instruction</td>
															<td>Case Marks</td>
															<td>Note</td>
														</tr>
													</thead>
													<tbody>
                                                  		<?php if(isset($packinglist)): ?>
															<?php foreach($packinglist as $packingdata): ?>
																<tr>
																	<td>
																		<input type="checkbox" class="checkboxes input-sm" name="checkboxes" value="<?php echo e($packingdata->id); ?>">
																	</td>
																	<td><?php echo e($packingdata->control_no); ?></td>
																	<td><?php echo e($packingdata->invoice_date); ?></td>
																	<td><?php echo e($packingdata->remarks_time); ?> <br/> <?php echo e($packingdata->remarks_pickupdate); ?> <br/> <?php echo e($packingdata->remarks_s_no); ?></td>
																	<td><div style="white-space: pre-wrap;"><?php echo e($packingdata->sold_to); ?></div></td>
																	<td><div style="white-space: pre-wrap;"><?php echo e($packingdata->ship_to); ?></div></td>
																	<td><?php echo e($packingdata->carrier_name); ?></td>
																	<td><?php echo e($packingdata->date_ship); ?></td>
																	<td><?php echo e($packingdata->port_loading); ?></td>
																	<td><?php echo e($packingdata->port_destination_name); ?></td>
																	<td><?php echo e($packingdata->from); ?> <br/> <?php echo e($packingdata->to); ?> <br/> <?php echo e($packingdata->freight); ?></td>
																	<td><?php echo e($packingdata->case_marks); ?></td>
																	<td><?php echo e($packingdata->note); ?></td>
																</tr>
															<?php endforeach; ?>
                                                  		<?php endif; ?>
													</tbody>
												</table>
											</div>
										</div>

										<div class="row">
											<div class="col-md-4">
											</div>
											<div class="col-sm-1" style="width:80px">
												<a href="#" onclick="javascript: addDetails();" class="btn green" id="addDetails" <?php echo($state); ?> >
													<i class="fa fa-plus"></i> Add
												</a>
											</div>
											<div class="col-sm-1" style="width:80px">
												<button type="button" onclick="javascript:actionRecords('EDIT');" class="btn blue-madison">
													<i class="fa fa-pencil"></i> Edit
												</button>
											</div>
											<div class="col-sm-1" style="width:95px">
												<button type="button" onclick="javascript:actionRecords('DEL');" class="btn btn-danger" <?php echo($state); ?> >
													<i class="fa fa-trash-o"></i> DELETE</button>
											</div>
											<div class="col-sm-1" style="width:90px">
													<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/packinglistsystem-exportxls')); ?>">
														<?php echo csrf_field(); ?>

														<input type="hidden" name="from" id="dateFromXls"/>
														<input type="hidden" name="to" id="dateToXls"/>
														<button type="submit" onclick="setDate();" class="btn purple-plum" <?php echo($state); ?> ><i class="fa fa-file-excel-o"></i> Excel</button>
													</form>
											</div>
											<div class="col-sm-1" style="width:80px">
												<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/packinglistsystem-exportpdf')); ?>" target="_blank">
													<?php echo csrf_field(); ?>

														<input type="hidden" name="from" id="dateFromPdf"/>
														<input type="hidden" name="to" id="dateToPdf"/>
													<button type="submit" onclick="setDate();" formtarget="_blank" class="btn purple-plum" <?php echo($state); ?> >
														<i class="fa fa-file-pdf-o"></i> PDF
													</button>
												</form>
											</div>
											<div class="col-sm-3">
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

		<div id="deleteModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm blue">
				<form role="form" method="POST" action="<?php echo e(url('/packinglistsystem-delete')); ?>">
					<div class="modal-content ">
						<div class="modal-body">
							<p>Are you sure you want to delete the selected record?</p>
							<?php echo csrf_field(); ?>

							<input type="hidden" name="id" id="delete_inputId"/>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" id="delete">Delete</button>
							<button type="button" data-dismiss="modal" class="btn">Cancel</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END CONTAINER -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>