

<?php $__env->startSection('title'); ?>
	User Master | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $state = ""; $readonly = ""; ?>
		<?php foreach($userProgramAccess as $access): ?>
			<?php if($access->program_code == Config::get('constants.MODULE_CODE_USERS')): ?>
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
									<i class="fa fa-users"></i> USER MASTER
								</div>
							</div>
							<div class="portlet-body">

								<?php /* <div class="row">
									<div class="col-md-8">
										<h3 class="pull-left">SEARCH</h3>
									</div>
									<div class="col-md-4">
										<a href="<?php echo e(url('/getexcel')); ?>" class="btn btn-warning pull-right"><i class="fa fa-users"></i> MRP USER</a>
									</div>
								</div> */ ?>

								<br/>

								<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/edit-getuser')); ?>">
									<div class="row">
										
										<div class="col-md-offset-2 col-md-8">
											<table class="table table-striped table-bordered table-hover" id="sample_3">

												<thead>
													<tr>
														<td class="table-checkbox">
															<input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
														</td>
														<td>
															USER ID
														</td>
														<td>
															LAST NAME
														</td>
														<td>
															FIRST NAME
														</td>
														<td>
															MIDDLE NAME
														</td>
														<td>
															LAST DATE LOGGED IN
														</td>
													</tr>
												</thead>

												<tbody>
													<?php foreach($users as $user): ?>
														<tr class="odd gradeX" data-id="<?php echo e($user->id); ?>">
															<td>
																<input type="checkbox" class="checkboxes" id="check_id" name="check_id[]" value="<?php echo e($user->id); ?>" data-userid="<?php echo e($user->user_id); ?>" data-lname="<?php echo e($user->lastname); ?>" data-fname="<?php echo e($user->firstname); ?>" data-mname="<?php echo e($user->middlename); ?>" data-pword="<?php echo e($user->actual_password); ?>" data-locked="<?php echo e($user->locked); ?>"/>
																<?php echo csrf_field(); ?>

															</td>
															
															<td>
																<?php echo e($user->user_id); ?>

																<input type="hidden" name="user_id[]" value="<?php echo e($user->user_id); ?>" />
															</td>
															<td>
																<?php echo e($user->lastname); ?>

																<input type="hidden" name="lastname[]" value="<?php echo e($user->lastname); ?>" />
															</td>
															<td>
																<?php echo e($user->firstname); ?>

																<input type="hidden" name="firstname[]" value="<?php echo e($user->firstname); ?>" />
															</td>
															<td>
																<?php echo e($user->middlename); ?>

																<input type="hidden" name="middlename[]" value="<?php echo e($user->middlename); ?>" />
															</td>
															<td>
																<?php echo e($user->last_date_loggedin); ?>

															</td>
														</tr>
													<?php endforeach; ?>
													
												</tbody>
											</table>
										</div>
										
									</div>

									<br/>

									<div class="row">
										<div class="col-md-12 text-center">
											<a href="javascript:;" class="btn btn-success btn-sm" <?php echo($state); ?> id="btn_add_user" ><i class="fa fa-plus-square-o"></i> ADD</a>
											<a href="javascript:;" id="editbtn" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> EDIT</a><!---->
											<a href="javascript:;" id="delbtn" class="btn btn-danger btn-sm" <?php echo($state); ?> ><i class="fa fa-trash-o"></i> DELETE</a>
										</div>
									</div>
								</form>
								

							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->

						<!-- Add Modal -->
							<div id="addModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg gray-gallery">

									<!-- Modal content-->
									<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
										<div class="modal-content ">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">ADD / EDIT USER</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													
														<?php echo csrf_field(); ?>

														<div class="col-md-6">
															<div class="form-group">
																<label for="inputlname" class="col-md-4 control-label">*Last Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputlname" placeholder="Last Name" name="lastname">
																</div>
															</div>
															<div class="form-group">
																<label for="inputfname" class="col-md-4 control-label">*First Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputfname" placeholder="First Name" name="firstname">
																</div>
															</div>
															<div class="form-group">
																<label for="inputmname" class="col-md-4 control-label">*Middle Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputmname" placeholder="Middle Name" name="middlename">
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="inputuserid" class="col-md-4 control-label">*User ID</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputuserid" placeholder="User ID" name="user_id">
																</div>
															</div>
															<div class="form-group">
																<label for="inputPassword" class="col-md-4 control-label">*Password</label>
																<div class="col-md-8">
																	<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
																</div>
															</div>
															<div class="form-group">
																<label for="inputlocked" class="col-md-5 control-label">
																	*Locked   <input type="checkbox" class="checkboxes" id="inputlocked" name="locked" value="1"/>
																</label>
															</div>
														</div>
													
												</div>

												<table class="table table-striped table-bordered table-hover" >

													<thead>
														<tr>
															<th>
																FUNCTION
															</th>
															<th class="table-checkbox">
																<!--<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes1"/>-->
																READ / WRITE
															</th>
															<th class="table-checkbox">
																<!--<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes2"/>-->
																READ ONLY
															</th>
														</tr>
													</thead>

													<tbody>
														<?php $cnt = 0;?>
														<?php foreach($programs as $program): ?>

															<tr class="odd gray-gallery">
																<td>
																	<?php echo e($program->program_name); ?>

																	<input type="hidden" name="prog_code[]" value="<?php echo e($program->program_code); ?>">
																	<input type="hidden" name="prog_name[]" value="<?php echo e($program->program_name); ?>">
																</td>
																<td>
																	<input type="hidden" class="checkboxes1 rwh" id="hidden1<?php echo e($cnt); ?>" name="rw[]" value="0" />
																	<input type="checkbox" class="checkboxes1 rw" id="check1<?php echo e($cnt); ?>" name="rw[]" value="1" <?php echo($state); ?> />
																</td>
																<td>
																	<input type="hidden" class="checkboxes2 rh" id="hidden2<?php echo e($cnt); ?>" name="r[]" value="0" />
																	<input type="checkbox" class="checkboxes2 r" id="check2<?php echo e($cnt); ?>" name="r[]" value="2" <?php echo($state); ?> />
																</td>
															</tr>
															<?php $cnt++; ?>
														<?php endforeach; ?>
														
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success btn-sm" id="modalsave" <?php echo($state); ?> ><i class="fa fa-save"></i> Save</button>
												<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
											</div>
										</div>
									</form>
								</div>
							</div>

						<!-- Delete Modal -->
							<div id="confirm" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm gray-gallery">
									<form role="form" method="POST" action="<?php echo e(url('/delete-user')); ?>">
										<div class="modal-content ">
											<div class="modal-body">
												<p>Are you sure you want to delete this user?</p>
												<?php echo csrf_field(); ?>

												<input type="hidden" name="id" id="id"/>
												<input type="hidden" name="user_id" id="user_id"/>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary btn-sm" id="delete">Delete</button>
												<button type="button" data-dismiss="modal" class="btn red btn-sm">Cancel</button>
											</div>
										</div>
									</form>
								</div>
							</div>

						<!-- Edit Modal -->
							<div id="editModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg gray-gallery">

									<!-- Modal content-->
									<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/edit-user')); ?>">
										<div class="modal-content ">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">ADD / EDIT USER</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" name="id" id="id"/>
												<input type="hidden" name="usrid" id="usrid"/>
												<div class="row">
													
														<?php echo csrf_field(); ?>

														<div class="col-md-6">
															<div class="form-group">
																<label for="editlname" class="col-md-4 control-label">*Last Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="editlname" placeholder="Last Name" name="lastname" <?php echo($readonly); ?> >
																</div>
															</div>
															<div class="form-group">
																<label for="editfname" class="col-md-4 control-label">*First Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="editfname" placeholder="First Name" name="firstname" <?php echo($readonly); ?> >
																</div>
															</div>
															<div class="form-group">
																<label for="editmname" class="col-md-4 control-label">*Middle Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="editmname" placeholder="Middle Name" name="middlename" <?php echo($readonly); ?> >
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="edituseerid" class="col-md-4 control-label">*User ID</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="edituserid" placeholder="User ID" disabled="disable" >
																	<input type="hidden" id="edituserid1" name="user_id">
																</div>
															</div>
															<div class="form-group">
																<label for="editPassword" class="col-md-4 control-label">*Password</label>
																<div class="col-md-8">
																	<input type="password" class="form-control" id="editPassword" placeholder="Password" name="password" <?php echo($readonly); ?> >
																</div>
															</div>
															<div class="form-group" id="editLockedDiv">
																<label for="editlocked" class="col-md-5 control-label">
																	*Locked <input type="checkbox" id="editlocked" name="locked" value="1"/>
																</label>
																<input type="hidden" class="lock" id="editlockedh" name="locked" value="0" />
															</div>
														</div>
													
												</div>

												<table class="table table-striped table-bordered table-hover">

													<thead>
														<tr>
															<th>
																FUNCTION
															</th>
															<th class="table-checkbox">
																<!--<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes1"/>-->
																READ / WRITE
															</th>
															<th class="table-checkbox">
																<!--<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes2"/>-->
																READ ONLY
															</th>
														</tr>
													</thead>

													<tbody id="userprog">
													<?php $cnt = 0;?>
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success btn-sm" id="modalsave"  <?php echo($state); ?> ><i class="fa fa-save"></i> Save</button>
												<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
		var editUrl = '<?php echo e(url('/edit-getuser')); ?>';
		
	</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
	<script type="text/javascript">
		$('#btn_add_user').on('click', function() {
			$('#addModal').modal('show');
		});
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>