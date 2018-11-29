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
														<table class="table table-striped table-bordered table-hover table-responsive" style="font-size:10px;" id="tblStockQuery">
															<thead>
																<tr>
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
															<?php /* <tbody>
																<?php foreach($boms as $bom): ?>
																	<tr>
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
															</tbody> */ ?>
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
<?php $__env->startPush('script'); ?>
	<script type="text/javascript">
		$(function() {
			$('#tblStockQuery').DataTable({
				processing: true,
				serverSide: true,
				ajax: "<?php echo e(url('/bybomitems')); ?>",
				columns: [
					{ data: 'code', name: 'code' },
					{ data: 'name', name: 'name' },
					{ data: 'usage', name: 'usage' },
					{ data: 'price', name: 'price' },
					{ data: 'vendor', name: 's.vendor' },
					{ data: 'assy100', name: 'assy100' },
					{ data: 'whs100', name: 'whs100' },
					{ data: 'whs102', name: 'whs102' },
					{ data: 'whsnon', name: 'whsnon' },
					{ data: 'whssm', name: 'whssm' },
					{ data: 'stocktotal', name: 'stocktotal' },
					{ data: 'requirement', name: 'requirement' },
					{ data: 'available', name: 'available' },
					{ data: 'prbalance', name: 'prbalance' },
					{ data: 'prodcode', name: 'prodcode' },
					{ data: 'prodname', name: 'prodname' }

				]
			});

		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>