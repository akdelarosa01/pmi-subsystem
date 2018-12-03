

<?php $__env->startSection('title'); ?>
    Material List for Direct Ordering | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == "3006"): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>


	<div class="clearfix"></div>

	<div class="page-container">
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="page-content-wrapper">
			<div class="page-content">
				<!--<div class="col-md-3"></div>-->
				<div class="col-md-offset-2 col-md-8">
					<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Material List For Direct Ordering
							</div>
						</div>


						<div class="portlet box blue-hoki">
							<div class="portlet-body">
								<div class="row">

									<div class="col-md-12">
										<form method="post" class="form-horizontal" enctype="multipart/form-data" target="_blank" action="<?php echo e(url('/material_list_pdf')); ?>" >
										<?php echo csrf_field(); ?>

											<input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
											<div class="form-group">
												<label class="control-label col-sm-4">Order:</label>
												<div class="col-sm-4">
													<input type="file" class="filestyle" name="file1" data-buttonName="btn-primary" id="mlp01uf" <?php echo e($readonly); ?> required>
													<!-- <div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="input-group input-large">
															<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
																<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
																</span>
															</div>
															<span class="input-group-addon btn default btn-file">
																<span class="fileinput-new">
																	Select file
																</span>
																<span class="fileinput-exists">
																	Change
																</span>
																<input type="file" name="file1" id="mlp01uf" <?php echo e($readonly); ?> required>
															</span>
															<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
															Remove </a>
														</div>
													</div> -->
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-4">BOM:</label>
												<div class="col-sm-4">
													<input type="file" class="filestyle" name="file2" data-buttonName="btn-primary" id="mlp02uf" <?php echo e($readonly); ?> required>
													<!-- <div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="input-group input-large">
															<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
																<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
																</span>
															</div>
															<span class="input-group-addon btn default btn-file">
															<span class="fileinput-new">
															Select file </span>
															<span class="fileinput-exists">
															Change </span>
															<input type="file" name="file2" id="mlp02uf" <?php echo e($readonly); ?> required>
															</span>
															<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
															Remove </a>
														</div>
													</div> -->
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12 text-center">
													<button type="submit"  class="btn btn-success btn-sm" ><i class="fa fa-print"></i> Generate</button>
												</div>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="col-md-3"></div>-->
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>