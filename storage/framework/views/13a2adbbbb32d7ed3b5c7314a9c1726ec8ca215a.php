<?php $__env->startSection('title'); ?>
	Product Line Master | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $state = ""; $readonly = ""; ?>
		<?php foreach($userProgramAccess as $access): ?>
			<?php if($access->program_code == Config::get('constants.MODULE_CODE_PRODUCT')): ?>
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
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cart-plus"></i> PRODUCT LINE MASTER
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-md-8">
										<h3 class="pull-left">SEARCH</h3>
									</div>
								</div>

								<br/>

								
								<div class="row">
									
									<div class="col-md-12">
										<table class="table table-striped table-bordered table-hover" id="sample_3">

											<thead>
												<tr>
													<th class="table-checkbox">
														<input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
													</th>
													<th>
														CODE
													</th>
													<th>
														NAME
													</th>
												</tr>
											</thead>

											<tbody>
												<?php foreach($productlines as $productline): ?>
													<tr class="odd gradeX" data-id="<?php echo e($productline->id); ?>">
														<td>
															<input type="checkbox" class="checkboxes" id="check_id" name="check_id[]" value="<?php echo e($productline->id); ?>" data-code="<?php echo e($productline->code); ?>" data-name="<?php echo e($productline->name); ?>"/>
															<?php echo csrf_field(); ?>

														</td>
														
														<td>
															<?php echo e($productline->code); ?>

														</td>
														<td>
															<?php echo e($productline->name); ?>

														</td>
													</tr>
												<?php endforeach; ?>
												
											</tbody>
										</table>
									</div>
									
								</div>

								<br/>

								<div class="row">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-lg" <?php echo($state); ?> ><i class="fa fa-plus-square-o"></i> ADD</button>
											<a href="#" id="editbtnprod"  class="btn btn-primary btn-lg"><i class="fa fa-edit"></i> EDIT</a>
											<a href="#" id="delbtnprod" class="btn btn-danger btn-lg" <?php echo($state); ?> ><i class="fa fa-trash-o"></i> DELETE</a><!--data-toggle="modal" data-target="#deleteModal"-->
											<!--data-toggle="modal" data-target="#myModal"-->
										</div>
									</div>
								</div>

								

							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->

						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-sm gray-gallery">

								<!-- Modal content-->
								<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/add-product')); ?>">
									<div class="modal-content ">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">ADD / EDIT PRODUCT LINE</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												
												<?php echo csrf_field(); ?>

												<div class="col-md-12">
													<div class="form-group">
														<label for="inputcode" class="col-md-4 control-label">*Code</label>
														<div class="col-md-8">
															<input type="text" class="form-control" id="inputcode" placeholder="Code" name="code" <?php echo($state); ?> >
														</div>
													</div>
													<div class="form-group">
														<label for="inputname" class="col-md-4 control-label">*Name</label>
														<div class="col-md-8">
															<input type="text" class="form-control" id="inputname" placeholder="Name" name="name" <?php echo($state); ?> >
														</div>
													</div>
												</div>
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success" id="modalsave" <?php echo($state); ?> ><i class="fa fa-save"></i> Save</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div id="confirm" class="modal fade" role="dialog">
							<div class="modal-dialog modal-sm gray-gallery">
								<form role="form" method="POST" action="<?php echo e(url('/delete-product')); ?>">
									<div class="modal-content ">
										<div class="modal-body">
											<p>Are you sure you want to delete this Product Line?</p>
											<?php echo csrf_field(); ?>

											<input type="hidden" name="id" id="id"/>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" id="delete">Delete</button>
											<button type="button" data-dismiss="modal" class="btn">Cancel</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div id="editModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-sm gray-gallery">

								<!-- Modal content-->
								<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/edit-product')); ?>">
									<div class="modal-content ">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">ADD / EDIT PRODUCT LINE</h4>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id" id="id"/>
											<div class="row">
												
												<?php echo csrf_field(); ?>

												<div class="col-md-12">
													<div class="form-group">
														<label for="inputcode" class="col-md-4 control-label">*Code</label>
														<div class="col-md-8">
															<input type="text" class="form-control" id="editcode" placeholder="Code" name="code" <?php echo($state); ?> >
														</div>
													</div>
													<div class="form-group">
														<label for="inputname" class="col-md-4 control-label">*Name</label>
														<div class="col-md-8">
															<input type="text" class="form-control" id="editname" placeholder="Name" name="name" <?php echo($state); ?> >
														</div>
													</div>
												</div>
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success" id="modalsave" <?php echo($state); ?> ><i class="fa fa-save"></i> Save</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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

	<script>
		var token = '<?php echo e(Session::token()); ?>';
		var url = '<?php echo e(url('/edit-user')); ?>';
		
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>