

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
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-bar-chart-o"></i> Scheduling Support System (sample DOUJI INPUT)
								</div>
							</div>
							<div class="portlet-body portlet-empty">
								<dv class="row">
									<div class="col-md-12">
										<h3>SAMPLE DOUJI INPUT</h3>
									</div>
								</dv>
								<br>
								<br>
								<div class="row">
									<div class="portlet-body col-md-12">
										
										<div class="table-responsive scroller" data-rail-visible="1" style="height: 500px;"">
											<table class="table table-striped table-bordered table-hover" style="font-size: 12px">
												<thead>
													<tr>
														<th>
															ORDER DATE
														</th>
														<th>
															PO
														</th>
														<th>
															DCODE
														</th>
														<th>
															ORDERBAL
														</th>
														<th>
															ORDERQTY
														</th>
														<th>
															CUSTCODE
														</th>
														<th>
															CUSTOMER
														</th>
														<th>
															MCODE
														</th>
														<th>
															MNAME
														</th>
														<th>
															SUPPLIERCODE
														</th>

														<th>
															SUPPLIERNAME
														</th>
														<th>
															RE
														</th>
														<th>
															STATUS
														</th>
														
													</tr>
												</thead>

												<tbody id="table" >
													
													
												</tbody>
											</table>

											<!-- <div class="row" id="loading" style="display: none">
												<div class="col-sm-6"></div>
												<div class="col-sm-6">
													<img src="assets/global/img/loading-spinner-blue.gif" class="img-responsive">
												</div>
											</div> -->
										</div>
									</div>
								</div>
								<span id="count"></span>
								
								<br/>
								<div class="row">
									<div class="col-md-12">
									

										<form method="post" enctype="multipart/form-data"  action="<?php echo e(url('/doujiexportexcel')); ?>" >
										<?php echo csrf_field(); ?>

										<button class="btn blue btn-lg pull-right">
											<i class="fa fa-print"></i> Print
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

<script type="text/javascript">
	
	var load = function (){
		$('#loading').modal('show');  
		$.ajax({
	        url: '<?php echo e(url('/sampledoujiinputload')); ?>',
	        method: 'GET',
	    }).done(function(data){
	    	updateDeliveryWarningList(data);
	    });

	}


		function updateDeliveryWarningList(data)
	{
		var html = "";
				    	var count = 0;
				    	$.each(data, function (i, item) {
				    		
				    		html = html + '<tr>'
							    				+ '<td>' + item['order_date'] + '</td>'
							    				+ '<td>' + item['po'] + '</td>'
							    				+ '<td>' + item['dcode'] + '</td>'
							    				+ '<td>' + item['order_bal'] + '</td>'
							    				+ '<td>' + item['order_qty'] + '</td>'
							    				+ '<td>' + item['cust_code'] + '</td>'
							    				+ '<td>' + item['cust_name'] + '</td>'
							    				+ '<td>' + item['mcode'] + '</td>'
							    				+ '<td>' + item['mname'] + '</td>'
							    				+ '<td>' + item['sup_code'] + '</td>'
							    				+ '<td>' + item['sup_name'] + '</td>'
							    				+ '<td>' + item['re'] + '</td>'
							    				+ '<td>' + item['status'] + '</td>'
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


		function arrangeDateToLong(date,val)
	{

		var returnvalue = "";
		if(val=="d")
			returnvalue = date.substring(3, 5);
		else if(val=="m")
			returnvalue = date.substring(0, 2);
		else if(val=="y")
			returnvalue = date.substring(6, 10);

		return returnvalue;
	}

	function arrangeLongToDate(date,val)
	{

		var returnvalue = "";
		if(val=="d")
			returnvalue = date.substring(6, 8);
		else if(val=="m")
			returnvalue = date.substring(4, 6);
		else if(val=="y")
			returnvalue = date.substring(0, 4);

		return returnvalue;
	}

	function isNumber(n) 
	{ 
		return /^-?[\d.]+(?:e-?\d+)?$/.test(n); 
	} 
</script>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>