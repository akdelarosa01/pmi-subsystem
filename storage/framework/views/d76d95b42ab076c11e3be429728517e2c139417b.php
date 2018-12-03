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
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<div class="row">
							<div class="col-md-12" >
								<a href="/inventoryquery" class="btn btn-sm red pull-right">
									<i class="fa fa-mail-reply"></i> Back
								</a>
							</div>
						</div>

						<br>

						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cubes"></i>  TPICS STOCK QUERY BY PARTS
								</div>
							</div>
							<div class="portlet-body">

								<!-- <div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="portlet box blue-hoki">
											<div class="portlet-body">
												<div class="row">
													<div class="col-md-12">
														<form method="POST" action="<?php echo e(url('/bypartsearchitem')); ?>" class="form-horizontal" id="searchfrm" >
															<?php echo e(csrf_field()); ?>


															<div class="form-group">
																<label class="control-label col-md-2">PART NAME:</label>
																<div class="col-md-9">
																	<select class="form-control select2me" id="partname" name="partname">

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
										<!-- <div class="scroller" style="height: 100px"> -->
											<table class="table table-striped table-bordered table-hover" style="font-size:10px;" id="tblStockQuery">
												<thead>
													<tr>
														<?php /* <td>ID</td> */ ?>
														<td>PART CODE</td>
														<td>PART NAME</td>
														<td>PRICE</td>
														<td>VENDOR</td>
														<td>WHSSM</td>
														<td>WHSNON</td>
														<td>WHS102</td>
														<td>WHS100</td>
														<td>ASSY100</td>
														<td>ASSY102</td>
														<td>StockTotal</td>
														<td>AvailableStock</td>
														<td>TotalRequired</td>
													</tr>
												</thead>
												<?php /* <tbody>
													<?php foreach($parts as $part): ?>
													<tr>
														<td><?php echo e($part->id); ?></td>
														<td><?php echo e($part->code); ?></td>
														<td><?php echo e($part->name); ?></td>
														<td><?php echo e($part->price); ?></td>
														<td><?php echo e($part->vendor); ?></td>
														<td><?php echo e($part->whssm); ?></td>
														<td><?php echo e($part->whsnon); ?></td>
														<td><?php echo e($part->whs102); ?></td>
														<td><?php echo e($part->whs100); ?></td>
														<td><?php echo e($part->assy100); ?></td>
														<td><?php echo e($part->assy102); ?></td>
														<td><?php echo e($part->stocktotal); ?></td>
														<td><?php echo e($part->available); ?></td>
														<td><?php echo e($part->requirement); ?></td>
													</tr>
													<?php endforeach; ?>
												</tbody> */ ?>
											</table>
										<!-- </div> -->
									</div>
								</div>

								<br>

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
				ajax: "<?php echo e(url('/bypartsearchitem')); ?>",
				columns: [
					{ data: 'code', name: 'code' },
					{ data: 'name', name: 'name' },
					{ data: 'price', name: 'price' },
					{ data: 'vendor', name: 'vendor' },
					{ data: 'whssm', name: 'whssm' },
					{ data: 'whsnon', name: 'whsnon' },
					{ data: 'whs102', name: 'whs102' },
					{ data: 'whs100', name: 'whs100' },
					{ data: 'assy100', name: 'assy100' },
					{ data: 'assy102', name: 'assy102' },
					{ data: 'stocktotal', name: 'stocktotal' },
					{ data: 'available', name: 'available' },
					{ data: 'requirement', name: 'requirement' },

				]
			});
		});
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>