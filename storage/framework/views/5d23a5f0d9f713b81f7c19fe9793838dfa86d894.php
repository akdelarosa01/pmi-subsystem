<?php $__env->startSection('title'); ?>
	YPICS Inventory Query | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_INVQUERY')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
					<div class="col-md-8 col-md-offset-2">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="row">
							<div class="col-md-12">
								<a href="/inventoryquery" class="btn btn-danger pull-right">
									<i class="fa fa-mail-reply"></i> Back
								</a>
							</div>
						</div>

						<br>

						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cubes"></i>  TPICS STOCK QUERY BY BOM REVERSE
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="portlet box blue-hoki">
											<div class="portlet-body">
												<div class="row">
													<div class="col-md-12">
														<form method="POST" action="<?php echo e(url('/rebomitems')); ?>" class="form-horizontal" id="searchfrm">
															<?php echo e(csrf_field()); ?>


															<div class="form-group">
																<label class="control-label col-md-2">PART NAME:</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="partname" name="partname">
																</div>
																<div class="col-md-2">
																	<a class="btn btn-sm btn-primary" id="btn_partname">
																		<i class="fa fa-search"></i> Search
																	</a>
																</div>
															</div>

														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="portlet box">

											<div class="portlet-body">

												<div class="row">
													<div class="col-md-12">
														<div class="scroller" style="height:200px">
															<table class="table table-striped table-bordered table-hover" style="font-size: 10px;">
																<thead>
																	<tr>
																		<td>VENDOR</td>
																		<td>PRICE</td>
																		<td>Stock Total</td>
																		<td>ASSY100</td>
																		<td>ASSY102</td>
																		<td>WHS100</td>
																		<td>WHS102</td>
																		<td>WHS-NON</td>
																		<td>WHS-SM</td>
																		<td>Updated</td>
																	</tr>
																</thead>
																<tbody id="tbl_bom">
																</tbody>
															</table>
														</div>

													</div>
												</div>

												<br/>

												<div class="row">
													<div class="col-md-8 col-md-offset-2">
														<div class="scroller" style="height:300px">
															<table class="table table-striped table-bordered table-hover" style="font-size: 10px;">
																<thead>
																	<tr>
																		<td>PRODUCT</td>
																		<td>PRODUCT NAME</td>
																		<td>USAGE</td>
																	</tr>
																</thead>
																<tbody id="tbl_prod">
																	<!-- <?php if(Session::has('prods')): ?>
																		<?php foreach(Session::get('prods') as $prod): ?>

																		<?php endforeach; ?>
																	<?php endif; ?> -->
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
							<div class="col-md-8 col-md-offset-2">
								<img src="assets/images/ajax-loader.gif" class="img-responsive">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- msg -->
		<div id="msg" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-sm gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 id="title" class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<p id="err_msg"></p>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$( document ).ready(function(e) {
		//$('#searchfrm').submit();
		// selectValue(e);
		// function selectValue(e) {
		// 	var url = "<?php echo e(url('/rebomitems')); ?>";
		// 	var token = "<?php echo e(Session::token()); ?>";
		// 	var data = {
		// 		_token : token,
		// 	};
		//
		// 	$.ajax({
		// 		url: url,
		// 		method: 'GET',
		// 		data:  data,
		// 	}).done( function(data, textStatus, jqXHR) {
		// 		$('#code option').remove();
		// 		$.each(data, function(i,item) {
		// 			$('#code').append(
		// 				$('<option></option>')
		// 				.text(item.name)
		// 				.val(item.code)
		// 			);
		// 		});
		// 	}).fail( function(data, textStatus, jqXHR) {
		// 		console.log(textStatus);
		// 	});
		// }

		$('#btn_partname').on('click', function(e) {
			var partname = $('#partname').val();
			bom(e,partname);
			prod(e,partname);
		});
		
		function bom(e,partname) {
			var formURL = "<?php echo e(url('/rebomsearchBOM')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token: token,
				partname: partname,
			};
			var detailstbl = '';

			e.preventDefault(); //Prevent Default action.
			$('#loading').modal('show');

			$.ajax({
				url: formURL,
				method: 'POST',
				data:  formData,
			}).done( function(data, textStatus, jqXHR) {
				$('#loading').modal('hide');
				$('#tbl_bom').html('');
				console.log(data);
				$.each(data,function (index,bom) {
					var StockTotal = parseInt(bom.assy100) + parseInt(bom.assy102) + parseInt(bom.whs100) + parseInt(bom.whs102) + parseInt(bom.whsnon) + parseInt(bom.whssm);
					detailstbl = '<tr>'+
									'<td>'+bom.vendor+'</td>'+
									'<td>'+bom.price+'</td>'+
									'<td>'+StockTotal+'</td>'+
									'<td>'+bom.assy100+'</td>'+
									'<td>'+bom.assy102+'</td>'+
									'<td>'+bom.whs100+'</td>'+
									'<td>'+bom.whs102+'</td>'+
									'<td>'+bom.whsnon+'</td>'+
									'<td>'+bom.whssm+'</td>'+
									'<td></td>'
								'</tr>'
					$('#tbl_bom').append(detailstbl);
				});

			}).fail(function(data, jqXHR, textStatus, errorThrown) {
				$('#loading').modal('hide');
				console.log(data);
			});
		}

		function prod(e,partname) {
			var formURL = "<?php echo e(url('/rebomsearchprod')); ?>"
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token: token,
				partname: partname,
			};
			var prodtbl = '';

			e.preventDefault(); //Prevent Default action.
			$('#loading').modal('show');

			$.ajax({
				url: formURL,
				method: 'POST',
				data:  formData,
			}).done( function(data, textStatus, jqXHR) {
				$('#loading').modal('hide');
				$('#tbl_prod').html('');
				console.log(data);
				$.each(data,function (index,prod) {
					prodtbl = '<tr>' +
								'<td>' + prod.CODE + '</td>' +
								'<td>' + prod.NAME + '</td>' +
								'<td>' + prod.SIYOU + '</td>' +
							'</tr>';
					$('#tbl_prod').append(prodtbl);
				});

			}).fail(function(data, jqXHR, textStatus, errorThrown) {
				$('#loading').modal('hide');
				console.log(data);
			});
		}
	});
</script>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>