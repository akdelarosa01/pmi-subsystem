

<?php $__env->startSection('title'); ?>
	SSS Delivery Warning | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php ini_set('max_input_vars', 999999);?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == "3008"): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>

	<div class="clearfix">
	</div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class=""></div>
					<div class="">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">

							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-bar-chart-o"></i> Scheduling Support System (Delivery Warning)
								</div>
							</div>
							<div class="portlet-body portlet-empty">
								<dv class="row">
									<div class="col-md-12">
										<h3>PARTS DELIVERY WARNING CHECK</h3>
									</div>
								</dv>
								<br>
								<br>
								<div class="row">
									<div class="col-md-12">
										<form action="#" class="form-horizontal form-bordered">
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-1">From:</label>
													<div class="col-md-3">
														<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="from" id="from"/>
													</div>

													<label class="control-label col-md-1">To:</label>
													<div class="col-md-3">
														<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="to" id ="to"  />
													</div>

																		<div class="btn-group">
																			<button type="button" onclick="loadDeliveryWarning();"  class="btn btn-sm btn-success " ><i class="fa fa-search"></i> Search</button>

																		</div>

												</div>
											</div>
										</form>
										<div class="" data-rail-visible="1" >
											<div class="table-responsive scroller" style="overflow: scroll; overflow-x: hidden; height: 500px">
												<table class="table table-striped table-bordered table-hover" style="font-size: 12px"><!--id = "sample_3" -->
													<thead>
														<tr>
															<th>
																ORDER DATE
															</th>
															<th>
																PO
															</th>
															<th>
																CODE
															</th>
															<th>
																NAME
															</th>
															<th>
																ORDER QTY
															</th>
															<th>
																CUSTOMER
															</th>
															<th>
																SCHED QTY
															</th>
															<th>
																PARTS COMPLETION
															</th>
															<th>
																YEC
															</th>
															<th>
																PMI
															</th>

														</tr>
													</thead>


													<tbody id="table" >

														<?php $cnt = 0;?>
													<?php foreach($data as $d): ?>
														<?php $cnt++; ?>
														<tr>
																<td> <?php echo e($d->order_date); ?></td>
																<td> <?php echo e($d->po); ?></td>
																<td> <?php echo e($d->code); ?></td>
																<td> <?php echo e($d->name); ?></td>
																<td> <?php echo e($d->order_qty); ?></td>
																<td> <?php echo e($d->customer); ?></td>
																<td> <?php echo e($d->sched_qty); ?></td>
																<td></td>
																<td></td>
																<td></td>

														</tr>
													<?php endforeach; ?>

													</tbody>
												</table>

											<!-- <div class="row" id="loading" style="display: none">
												<div class="col-sm-6"></div>
												<div class="col-sm-6">
													<img src="assets/global/img/loading-spinner-blue.gif" class="img-responsive">
												</div>
											</div> -->
											</div>
											<p>Count: <?php echo $cnt;?></p>
										</div>
									</div>
								</div>
								<span id="count"></span>

								<br/>
								<div class="row">
									<div class="col-md-12">
									<form style ="margin-top: 15px;" method="post" target="_blank" enctype="multipart/form-data"  action="<?php echo e(url('/postDeliveryWarningPDF')); ?>" >
									<?php echo csrf_field(); ?>


										<input type="hidden" name="fd_pdf" id = "fd_pdf">
										<input type="hidden" name="td_pdf" id = "td_pdf">
										<button class="btn blue btn-sm pull-right">
											<i class="fa fa-print"></i> Print
										</button>
										</form>
						<!-- 				<button type="button" id="excel" onclick="deliveryWarningExcel();" class="btn green btn-lg pull-right">
											<i class="fa fa-file-excel-o"></i> Excel
										</button> -->

										<form method="post" enctype="multipart/form-data"  action="<?php echo e(url('/postDeliveryWarningExcel')); ?>" >
										<?php echo csrf_field(); ?>

										<input type="hidden" name="fd" id = "fd">
										<input type="hidden" name="td" id = "td">
										<button class="btn green btn-sm pull-right">
											<i class="fa fa-file-excel-o"></i> Excel
										</button>
										</form>
									</div>
								</div>


							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
					<div class="col-md-2"></div>
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


<?php $__env->stopSection(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
var from_date = "";
var to_date = "";


	var load = function (){

		$('#imgs').html('');

	}



	function loadDeliveryWarning()
	{

		var f = document.getElementById('from').value;
		var t = document.getElementById('to').value;
		from_date = arrangeDateToLong(f);
		to_date = arrangeDateToLong(t);
		document.getElementById("fd").value = from_date;
		document.getElementById("td").value = to_date;
		document.getElementById("fd_pdf").value = from_date;
		document.getElementById("td_pdf").value = to_date;

		if(validateDate(from_date,to_date))
		{
					$('#loading').modal('show');
					var ft = {
			            fd: from_date,
			            td: to_date,
			        }

					$.ajax({
						data: ft,
				        url: '<?php echo e(url('/loadDeliveryWarningWithDate')); ?>',
				        method: 'GET',
				    }).done(function(data){
				    	updateDeliveryWarningList(data);
				    });
		}
		else
		{
			alert('Invalid Date! "From" date must be greater than or equal to "To" date.');
			from_date = "";
			to_date = "";
			document.getElementById('from').value = "";
			document.getElementById('to').value = "";
			document.getElementById("fd").value = "";
			document.getElementById("td").value = "";
			document.getElementById("fd_pdf").value = "";
			document.getElementById("td_pdf").value = "";
		}

	}


	function updateDeliveryWarningList(data)
	{
		var html = "";
				    	var count = 0;
				    	$.each(data, function (i, item) {

				    		html = html + '<tr>'
							    				+ '<td>' + arrangeLongToDate(item['order_date']) + '</td>'
							    				+ '<td>' + item['po'].substring(0, 10) + '</td>'
							    				+ '<td>' + item['code'] + '</td>'
							    				+ '<td>' + item['name'] + '</td>'
							    				+ '<td>' + item['order_qty'] + '</td>'
							    				+ '<td>' + item['customer'] + '</td>'
							    				+ '<td>' + item['sched_qty'] + '</td>'
							    				+ '<td></td>'
							    				+ '<td></td>'
							    				+ '<td></td>'
					    				+ '</tr>';
					    				count++;
				    	});




				    	$('#loading').modal('hide');
				    	$('#table').html(html);
				    	if(count==1)
				    		$('#count').html(count+" Item");
				    	else
				    		$('#count').html(count+" Items");
	}


	function validateDate(from_Date,to_Date)
	{
		if(from_Date.length == 9 && isNumber(from_Date) && to_Date.length == 9 && isNumber(to_Date) && from_Date <= to_Date)
			return true;
		else
			return false;
	}

	function arrangeDateToLong(date)
	{


		return date.substring(6, 10)+date.substring(0, 2)+date.substring(3, 5)+"1";
	}

	function arrangeLongToDate(date)
	{

		return date.substring(4, 6) + "/" + date.substring(6, 8) + "/" + date.substring(0, 4);
	}

	function isNumber(n)
	{
		return /^-?[\d.]+(?:e-?\d+)?$/.test(n);
	}
</script>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>