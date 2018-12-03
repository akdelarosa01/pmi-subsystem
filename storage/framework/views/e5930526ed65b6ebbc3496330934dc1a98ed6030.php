<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: OrderDataReport.blade.php
     MODULE NAME:  [3002] Order Data Report
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.04.18
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.04.18     MESPINOSA       Initial Draft
     100-00-02   2     2016.10.27     AKDELAROSA      FIX BUGS
*******************************************************************************/
?>



<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

	function actionStartStop(startstop)
	{
		var obj_data = new Object;
		var cnt = 0;
		var ckeys = new Array;
		var intvals = new Array;
		var dbconnection = '';

		$(".mrpuser-ckey").each(function()
		{
			var id = $(this).attr('name');
			obj_data[id] = $(this).text();
			ckeys[cnt] = obj_data[id].replace(/(\r\n|\n|\r)/gm,"").trim();
			cnt++;
		});

		obj_data = new Object;
		cnt = 0;
		$(".mrpuser-intval").each(function()
		{
			var id = $(this).attr('name');
			obj_data[id] = $(this).text();
			intvals[cnt] = obj_data[id].replace(/(\r\n|\n|\r)/gm,"").trim();
			cnt++;
		});


		dbconnection = $('#action').val();

		$.post("<?php echo e(url('/mrpusers-orderdatareport')); ?>", 
		{
			_token: $('meta[name=csrf-token]').attr('content'),
			action: startstop,
			dbconnect: dbconnection,
			mrpuserckey:ckeys,
			mrpuserintval:intvals
		})
		.done(function(data)
		{
     			$.alert(data, 
     			{
     				position: ['center', [-0.40, 0]],
     				type: 'success',
     				closeTime: 10000,
     				autoClose: true
     			});
     			window.location.reload();
     	})
		.fail(function() 
		{
			$.alert('Unable to start/stop YPICS at this moment. Please try again.', 
			{
				position: ['center', [-0.40, 0]],
				type: 'danger',
				closeTime: 10000,
				autoClose: true
			});
		});
	}

	function connect(dbconnect)
	{
		$('#action').val(dbconnect);
		//$('#ddsupplier').val(supplier);
		$('#loading').modal('show');
	}

	document.onreadystatechange = function(e)
	{
		if (document.readyState=="interactive")
		{
			var all = document.getElementsByName("salesorderdata");
			var totaTr = all.length;

			$('#itemcount').html("0 of " + totaTr);
			for (var i=0, max=all.length; i < max; i++) 
			{
				set_ele(all[i]);
				$('#itemcount').html(i + " of " + totaTr );
			}
			$('#itemcount').html(i + " of " + totaTr );
		}
	}

	function check_element(ele)
	{
		var all = document.getElementsByName("salesorderdata");
		var totalele=all.length;
		var per_inc=100/all.length;

		$('#percentage').html("Percentage : " + per_inc + "%");

		if($(ele).on())
		{
			var prog_width=per_inc+Number(document.getElementById("progress_width").value);

			$('#percentage').html("Percentage : " + Math.round(prog_width * 100) / 100 + "%");

			document.getElementById("progress_width").value=prog_width;

			$("#bar1").animate({width:prog_width+"%"},10,function(){
				if(document.getElementById("bar1").style.width=="100%")
				{
					$(".progress").fadeOut("slow");
				}			
			});
		}

		else	
		{
			set_ele(ele);
		}
	}

	function set_ele(set_element)
	{
		check_element(set_element);
	}

</script>

<?php $__env->startSection('title'); ?>
Order Data Report | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $state = ""; $enabled=""; ?>
		<?php foreach($userProgramAccess as $access): ?>
			<?php if($access->program_code == Config::get('constants.MODULE_CODE_YPICS')): ?>
				<?php if($access->read_write == "2"): ?>
					<?php $state = "disabled"; $enabled="enabled" ?>
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
					<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-area-chart"></i>  YPICS R3 ORDER DATA
							</div>
						</div>
						<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/connect-orderdatareport')); ?>" >
							<?php echo csrf_field(); ?>

							<div class="portlet-body" style="background-color: white;">
								<div class="row">
									<div class="col-md-12" style="background-color: transparent;">

										<div class="portlet box blue">
											<div class="portlet-body">
												<div class="row">
													<div class="col-md-12" >
														<button type="button" onclick="javascript: actionStartStop('START'); " class="btn btn-success" <?php echo($state); ?> >
															<i class="fa fa-play"></i> START USING YPICS</button>
															<button type="button" onclick="javascript: actionStartStop('STOP'); " class="btn btn-danger" <?php echo($state); ?> >
																<i class="fa fa-stop"></i> STOP USING YPICS</button>
																<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning pull-right">
																	<i class="fa fa-users"></i> MRP USER</button>
																</div>
															</div>
															<hr/>

															<div class="row">

																<div class="col-md-4">
																	<div class="portlet box blue">
																		<div class="portlet-title">
																			<div class="caption">
																				SUPPLIER RECORD
																			</div>
																		</div>

																		<div class="portlet-body">
																			<?php /* <form> */ ?>
																				<div class="form-group">
																					<div>
																						<div class="col-md-12">
																							<?php
																								if (Session::has('selected_supplier')){
																									$selected_supplier = Session::get('selected_supplier');
																								}
																							?>
																							<select id="ddsupplier" name="supplier" class="form-control">
																								<option selected="selected">-- Select --</option>
																								<?php foreach($suppliers as $supplier): ?>
																								<option value="<?php echo e($supplier->name); ?>" 
																									<?php if($selected_supplier == $supplier->name)
																									{
																										echo 'selected';
																									}
																									?> 
																									><?php echo e($supplier->name); ?></option>
																									<?php endforeach; ?>
																									<?php /* $supplier->code for value */ ?>
																								</select>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="portlet box blue">
																				<div class="portlet-title">
																					<div class="caption">
																						PRODUCT LINE	
																					</div>
																				</div>
																				<div class="portlet-body">
																					<div class="form-group">
																						<div>
																							<div class="col-md-12">
																								<?php
																									if (Session::has('dbconnection')){
																										$dbconnection = Session::get('dbconnection');
																									}
																								?>
																								<select name="productline" class="form-control">
																									<option selected="selected" value="0">-- Select --</option>
																									<?php foreach($productlines as $productline): ?>
																									<option value="<?php echo e($productline->code); ?>" 
																										<?php if($dbconnection == $productline->code)
																										{
																											echo 'selected';
																										}
																										?> 
																										><?php echo e($productline->name); ?></option>
																										<?php endforeach; ?>
																									</select>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="portlet box blue">
																					<div class="portlet-title">
																						<div class="caption">
																							STATUS	
																						</div>
																					</div>
																					<div class="portlet-body">

																						<div class="row">
																							<div class="col-md-12">
																								<div class="pull-left" id="itemcount">
																									0 of 0
																								</div>
																								<div class="pull-right" id="percentage">
																									Percentage: 0%
																								</div>
																							</div>
																						</div>

																						<br />

																						<div class="row">
																							<div class="col-md-12">

																								<div class="progress progress-striped active" id="progress_div">
																									<div class="progress-bar progress-bar-success" id='bar1'></div>
																									<div class='percent' id='percent1'></div>
																								</div>
																								<input type="hidden" id="progress_width" value="0">

																							</div>
																						</div>

																					</div>
																				</div>
																			</div>

																		</div>

																		<div class="row">
																			<div class="col-md-4">
																				<div class="col-md-4">
																					<button type="submit" onclick="javascript:connect('CN');" class="btn btn-warning" ><i class="fa fa-refresh"></i> BU1(CN)</button>
																				</div>
																				<div class="col-md-4">
																					<button type="submit" onclick="javascript:connect('TS');" class="btn btn-warning" ><i class="fa fa-refresh"></i> BU2(TS)</button>
																				</div>
																				<div class="col-md-4">
																					<button type="submit" onclick="javascript:connect('YF');" class="btn btn-warning" ><i class="fa fa-refresh"></i> CONNECTORS(YF)</button>
																				</div>
																				<div class="col-md-4">
																					<input type="text" id="action" placeholder="Id" name="dbconnect" hidden="true" value="<?php echo $dbconnection ?>">
																				</div>
																			</div>
																		</div>
																	</div>
																</div>

															</div>
														</div>

														<div>
															<div class="col-md-12" style="background-color: white">

																<div class="portlet box blue">
																	<div class="portlet-title">
																		<div class="caption">
																			SUMMARY LIST
																		</div>
																	</div>
																	<div class="portlet-body">
																		<div class="table-responsive scroller" style="height: 430px;">
																			<table class="table table-striped table-bordered table-hover" ><!--id="sample_3"-->

																				<thead>
																					<tr>
																						<th>
																							SALES NO
																						</th>
																						<th>
																							SALES TYPE
																						</th>
																						<th>
																							SALES ORG
																						</th>
																						<th>
																							COMMERCIAL
																						</th>
																						<th>
																							SECTION
																						</th>
																						<th>
																							SALES BRAND
																						</th>
																						<th>
																							SALESG
																						</th>
																						<th>
																							SUPPLIER
																						</th>
																						<th>
																							DESTINATION
																						</th>
																						<th>
																							PAYER
																						</th>
																						<th>
																							ASSISTANT
																						</th>
																						<th>
																							PURCHASE ORDER NO
																						</th>
																						<th>
																							ISSUEDATE
																						</th>
																						<th>
																							FLIGHTDATE
																						</th>
																						<th>
																							HEADERTEXT
																						</th>
																						<th>
																							CODE
																						</th>
																						<th>
																							ITEMTEXT
																						</th>
																						<th>
																							ORDERQUANTITY
																						</th>
																						<th>
																							UNIT
																						</th>
																					</tr>
																				</thead>

																				<tbody>
																					<?php if(Session::has('orderdatareport')): ?>
																						<?php foreach(Session::get('orderdatareport') as $orderdata): ?>
																						<!--php //ini_set('memory_limit', '-1'); -->
																						<tr class="odd gradeX" id="salesorderdata" name="salesorderdata">
																							<td>
																								<?php echo e($orderdata->salesno); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->salestype); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->salesorg); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->commercial); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->section); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->salesbrand); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->salesg); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->supplier); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->destination); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->payer); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->assistant); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->purchaseorderno); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->issuedate); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->flightneeddate); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->headertext); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->code); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->itemtext); ?>

																							</td>
																							<td align="right">
																								<?php echo e($orderdata->orderquantity); ?>

																							</td>
																							<td>
																								<?php echo e($orderdata->unit); ?>

																							</td>
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
												</form>
											</div>
											<!-- END EXAMPLE TABLE PORTLET-->

											<!-- MRP User Modal -->
											<div id="myModal" class="modal fade" role="dialog">
												<div class="modal-dialog modal-lg blue">

													<!-- Modal content-->
													<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
														<div class="modal-content ">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">MRP Users</h4>
															</div>
															<div class="modal-body" style="width:880px; height:800px; overflow:auto";>
																<table class="table table-striped table-bordered table-hover">

																	<thead>
																		<tr>
																			<th>
																				INPUT USER
																			</th>
																			<th>
																				INPUT DATE
																			</th>
																			<th>
																				CKEY
																			</th>
																			<th>
																				INTVAL
																			</th>
																		</tr>
																	</thead>

																	<tbody>
																		<?php $cnt = 0;?>
																		<?php foreach($mrpusers as $mrpuser): ?>

																		<tr class="odd blue">
																			<td>
																				<?php echo e($mrpuser->inputuser); ?>

																			</td>
																			<td>
																				<?php echo e($mrpuser->inputdate); ?>

																			</td>
																			<td class="mrpuser-ckey">
																				<?php echo e($mrpuser->ckey); ?>

																			</td>
																			<td class="mrpuser-intval">
																				<?php echo e($mrpuser->intval); ?>

																			</td>
																		</tr>
																		<?php $cnt++; ?>
																		<?php endforeach; ?>

																	</tbody>
																</table>
															</div>
															<div class="modal-body">
																<div class="modal-footer">
																	<button type="submit" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
																</div>
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

						<div id="msgbox" class="modal fade" role="dialog" data-backdrop="static">
							<div class="modal-dialog modal-sm gray-gallery">
								<div class="modal-content ">
									<div class="modal-body">
										<p>No data generated in this report.</p>
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
									</div>
								</div>
							</div>
						</div>

						<div id="success" class="modal fade" role="dialog" data-backdrop="static">
							<div class="modal-dialog modal-sm gray-gallery">
								<div class="modal-content ">
									<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/print-orderdatareport')); ?>" id="frm_print">
										<?php echo csrf_field(); ?>

										<div class="modal-body">
											<p>You successfully generated all the needed data.</p>
										</div>
										<input type="text" id="selected_dbconnect" name="selected_dbconnect" hidden="true" value="<?php if(Session::has('dbconnection')): ?> <?php echo e(Session::get('dbconnection')); ?><?php endif; ?>">
										<input type="text" id="selected_supplier"  name="selected_supplier" hidden="true" value="<?php if(Session::has('selected_supplier')): ?> <?php echo e(Session::get('selected_supplier')); ?><?php endif; ?>">
										<div class="modal-footer">
											<button type="submit" class="btn btn-success" <?php echo($state); ?> ><i class="fa fa-print" ></i> Print Data</button>
											<a href="javascript:;" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</a>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!-- AJAX LOADER -->
						<div id="loading" class="modal fade" role="dialog" data-backdrop="static">
							<div class="modal-dialog modal-sm gray-gallery">
								<div class="modal-content ">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-8 col-md-offset-2">
												<img src="assets/images/ajax-loader.gif" class="img-responsive">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php if(Session::has('msg') && Session::get('msg') == 0): ?>
							<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
							<script type="text/javascript">
								$( document ).ready(function() {
									$('#loading').modal('hide');
									$('#msgbox').modal('show');
								});
							</script>
						<?php endif; ?>

						<?php if(Session::has('msg') && Session::get('msg') > 0): ?>
							<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
							<script type="text/javascript">
								$( document ).ready(function() {
									$('#loading').modal('hide');
									$('#success').modal('show');
								});
							</script>
						<?php endif; ?>

						<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$( function() {
		$('#frm_print').on('submit', function() {
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			//e.preventDefault(); //STOP default action
			$.ajax({
				url : formURL,
				method: "POST",
				data : postData,
			}).done(function(data, textStatus, jqXHR) {
				console.log(data);
			}).fail(function(jqXHR, textStatus, errorThrown) {
				//if fails
			});
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>