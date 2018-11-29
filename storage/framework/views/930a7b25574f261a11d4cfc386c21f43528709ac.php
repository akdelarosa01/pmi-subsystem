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
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-10 col-md-offset-1">

						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<div class="row">
							<div class="col-md-12">
								<a href="/inventoryquery" class="btn btn-sm red pull-right">
									<i class="fa fa-mail-reply"></i> Back
								</a>
							</div>
						</div>
						<br>

						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cubes"></i>  TPICS STOCK QUERY BY BOM
								</div>
							</div>
							<div class="portlet-body">

								<!-- <div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="portlet box blue-hoki">
											<div class="portlet-body">
												<div class="row">
													<div class="col-md-12">
														<form method="POST" action="<?php echo e(url('/bybomsearchitems')); ?>" class="form-horizontal" id="searchfrm" >
															<?php echo e(csrf_field()); ?>


															<div class="form-group">
																<label class="control-label col-md-2">PRODUCT NAME:</label>
																<div class="col-md-9">
																	<select class="form-control select2me" id="prodname" name="prodname">
																	</select>
																</div>

															</div>

														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> -->

								<div class="row">
									<div class="col-md-12">
										<div class="portlet box blue-hoki">
											<div class="portlet-body">

												<div class="row">
													<div class="col-md-12">
														<table class="table table-striped table-bordered table-hover table-responsive" style="font-size:10px;" id="sample_3">
															<thead>
																<tr>
																	<td>ID</td>
																	<td>PART CODE</td>
																	<td>PART NAME</td>
																	<td>USAGE</td>
																	<td>PRICE</td>
																	<td>VENDOR</td>
																	<td>ASSY100</td>
																	<td>WHS100</td>
																	<td>WHS102</td>
																	<td>WHS-NON</td>
																	<td>WHS-SM</td>
																	<td>StockTotal</td>
																	<td>TotalRequired</td>
																	<td>AvailableStock</td>
																	<td>PR_Balance</td>
																	<td>PRODUCT</td>
																	<td>PRODUCT NAME</td>
																</tr>
															</thead>
															<tbody>
																<?php foreach($boms as $bom): ?>
																	<tr>
																		<td><?php echo e($bom->id); ?></td>
																		<td><?php echo e($bom->code); ?></td>
																		<td><?php echo e($bom->name); ?></td>
																		<td><?php echo e($bom->usage); ?></td>
																		<td><?php echo e($bom->price); ?></td>
																		<td><?php echo e($bom->vendor); ?></td>
																		<td><?php echo e($bom->assy100); ?></td>
																		<td><?php echo e($bom->whs100); ?></td>
																		<td><?php echo e($bom->whs102); ?></td>
																		<td><?php echo e($bom->whsnon); ?></td>
																		<td><?php echo e($bom->whssm); ?></td>
																		<td><?php echo e($bom->stocktotal); ?></td>
																		<td><?php echo e($bom->requirement); ?></td>
																		<td><?php echo e($bom->available); ?></td>
																		<td><?php echo e($bom->prbalance); ?></td>
																		<td><?php echo e($bom->prodcode); ?></td>
																		<td><?php echo e($bom->prodname); ?></td>
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
<?php $__env->startPush('scripts'); ?>
	<!-- <script type="text/javascript">
		$(function() {
			$('#tblStockQuery').DataTable({
				processing: true,
				serverSide: true,
				ajax: "<?php echo e(url('/bybomitems')); ?>",
				columns: [
					{ data: 'partcode', name: 'partcode' },
					{ data: 'partname', name: 'partname' },
					{ data: 'usage', name: 'usage' },
					{ data: 'PRICE', name: 'p.PRICE' },
					{ data: 'VENDOR', name: 's.VENDOR' },
					{ data: 'ASSY100', name: 'ASSY100' },
					{ data: 'WHS100', name: 'WHS100' },
					{ data: 'WHS102', name: 'WHS102' },
					{ data: 'WHSNON', name: 'WHSNON' },
					{ data: 'WHSSM', name: 'WHSSM' },
					{ data: 'StockTotal', name: 'StockTotal' },
					{ data: 'req', name: 'req' },
					{ data: 'CurrInv', name: 'x.CurrInv' },
					{ data: 'prbal', name: 'prbal' },
					{ data: 'code', name: 'code' },
					{ data: 'name', name: 'name' }

				]
			});

		});
	</script> -->
<?php $__env->stopPush(); ?>
<!-- <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$( document ).ready(function(e) {
		//$('#searchfrm').submit();
		// selectValue(e);
		// function selectValue(e) {
		// 	var url = "<?php echo e(url('/bybomsearchitems')); ?>";
		// 	var token = '<?php echo e(Session::token()); ?>';
		// 	var data = {
		// 		_token : token,
		// 	};
		//
		// 	$.ajax({
		// 		url: url,
		// 		method: 'GET',
		// 		data:  data,
		// 	}).done( function(data, textStatus, jqXHR) {
		//
		// 		$('#prodname option').remove();
		// 		$.each(data, function(i,item) {
		// 			console.log(item);
		// 			$('#prodname').append(
		// 				$('<option></option>')
		// 				.text(item)
		// 				.val(i)
		// 			);
		// 		});
		// 	}).fail( function(data, textStatus, jqXHR) {
		// 		console.log(textStatus);
		// 	});
		// }

		// $('#prodname').on('change', function(e) {
		// 	var prodname = $('#prodname').val();
		// 	search(e,prodname);
		// });

		function search(e,prodname) {
			var formURL = "<?php echo e(url('/bybomitems')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token : token,
				prodname : prodname,
			};
			var itemtbl = '';

			e.preventDefault(); //Prevent Default action.
			$('#loading').modal('show');
			$.ajax({
				url: formURL,
				method: 'POST',
				data:  formData,
			}).done( function(data, textStatus, jqXHR) {
				$('#loading').modal('hide');
				$('#tbl_item').html('');
				console.log(data);
				$.each(data,function (index, item) {
					var StockTotal = parseInt(item.ASSY100) + parseInt(item.WHS100) + parseInt(item.WHS102) + parseInt(item.WHSNON) + parseInt(item.WHSSM)
					itemtbl = '<tr>' +
						'<td>'+item.partcode+'</td>' +
						'<td>'+item.partname+'</td>' +
						'<td>'+item.usage+'</td>' +
						'<td>'+item.PRICE+'</td>' +
						'<td>'+item.VENDOR+'</td>' +
						'<td>'+item.ASSY100+'</td>' +
						'<td>'+item.WHS100+'</td>' +
						'<td>'+item.WHS102+'</td>' +
						'<td>'+item.WHSNON+'</td>' +
						'<td>'+item.WHSSM+'</td>' +
						'<td>'+StockTotal+'</td>' +
						'<td>'+item.req+'</td>' +
						'<td>'+item.CurrInv+'</td>' +
						'<td>'+item.prbal+'</td>' +
						'<td>'+item.code+ '</td>' +
						'<td>'+item.name+'</td>' +
					'</tr>'
					$('#tbl_item').append(itemtbl);
				});

			}).fail(function(data, jqXHR, textStatus, errorThrown) {
				$('#loading').modal('hide');
				console.log(data);
			});
		};
	});
</script> -->

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>