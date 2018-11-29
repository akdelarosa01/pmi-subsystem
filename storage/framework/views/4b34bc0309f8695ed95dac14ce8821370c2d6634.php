<?php $__env->startSection('title'); ?>
	Packing List Molding | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_PLMOLDING')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-bars"></i>  PACKING LIST MOLDING
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<div class="row">
											<form class="form-horizontal">
												<div class="form-group">
													<label  class="control-label col-md-2">Starting Date</label>
													<div class="col-md-3">
														<input class="form-control date-picker" size="16" type="text">
													</div>

													<label  class="control-label col-md-2">Ending Date</label>
													<div class="col-md-3">
														<input class="form-control date-picker" size="16" type="text">
													</div>
													<button type="submit" class="btn btn-primary">view</button>
												</div>
												
											</form>
										</div>


										<div class="row">
											<div class="col-md-12">
												<table class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<td></td>
															<td>CTR #</td>
															<td>Invoice DAte</td>
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
														<tr>
															<td>
																<input type="checkbox" class="check">
															</td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6 col-md-offset-6">
												<a href="<?php echo e(url('/packinglistdetails')); ?>" class="btn green" id="addDetails">
													<i class="fa fa-plus"></i> Add
												</a>
												<button class="btn blue-madison">
													<i class="fa fa-pencil"></i> Edit
												</button>
												<button class="btn red">
													<i class="fa fa-trash"></i> Delete
												</button>
												<button class="btn purple-plum">
													<i class="fa fa-file-excel-o"></i> Excel
												</button>
												<button class="btn purple-plum">
													<i class="fa fa-file-pdf-o"></i> PDF
												</button>
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
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>