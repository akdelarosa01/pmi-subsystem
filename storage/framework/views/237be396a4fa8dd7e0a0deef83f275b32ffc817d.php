<?php $__env->startSection('title'); ?>
	YPICS Inventory Query | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_INVQUERY')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>

	<div class="page-content">

		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-cubes"></i>  YPICS STOCKS QUERY
						</div>
					</div>
					<div class="portlet-body">

						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="portlet box blue-hoki">
									<div class="portlet-body">
										<div class="row">
											<div class="col-md-2 col-md-offset-1">
												<div class="form-group">
													<a href="<?php echo e(url('/inventoryquerybyparts')); ?>" id="byparts" class="btn btn-md btn-warning btn-lg" <?php echo e($state); ?>>
														BY PARTS
													</a>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<a href="<?php echo e(url('/inventoryquerybybom')); ?>" id="bybom" class="btn btn-md btn-primary btn-lg" <?php echo e($state); ?>>
														BY BOM
													</a>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<a href="<?php echo e(url('/inventoryqueryrebom')); ?>" id="rebom" class="btn btn-md btn-success btn-lg" <?php echo e($state); ?>>
														REBOM
													</a>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<button id="btn_extract" class="btn btn-md btn-danger btn-lg" <?php echo e($state); ?>>
														EXTRACT
													</button>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<form class="" action="<?php echo e(url('/updatestock')); ?>" method="post" id="frm">
														<?php echo e(csrf_field()); ?>

														<a href="javascript:;" id="update" class="btn btn-md yellow btn-lg" <?php echo e($state); ?>>
															UPDATE
														</a>
													</form>

												</div>

											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12" style="height:30px">
												<div class="progress">
													<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
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
			

	<!-- AJAX LOADER -->
		<div id="loading" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-sm gray-gallery">
				<div class="modal-content ">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<img src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/images/ajax-loader.gif')); ?>" class="img-responsive">
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

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$( document ).ready(function(e) {
		$('#update').on('click', function(e) {
			//$('#frm').submit();
			update(e);
			//$('#loading').modal('show');
		});

		$('#btn_extract').on('click', function(e) {
			e.preventDefault();
			var token = "<?php echo e(Session::token()); ?>";
			window.location.href= "<?php echo e(url('/stockqueryxls')); ?>"+ "?_token="+token;
		});

		function update(e) {
			var url = "<?php echo e(url('/updatestock')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token : token,
			};


			$('#loading').modal('show');
			$.ajax({
				url: url,
				method: 'POST',
				data:  data,
			}).done( function(data, textStatus, jqXHR) {
				console.log(data)
				$('#loading').modal('hide');
				$('#msg').modal('show');
				msg = 'Successfully updated.'
				title = '<strong><i class="fa fa-exclamation-circle"></i> Success!</strong>';
				$('#title').html(title);
				$('#err_msg').html(msg);
			}).fail( function(data, textStatus, jqXHR) {
				$('#loading').modal('hide');
				$('#msg').modal('show');
				msg = 'There is an error while updating.'
				title = '<strong><i class="fa fa-exclamation-circle"></i> Failed!</strong>';
				$('#title').html(title);
				$('#err_msg').html(msg);
			});
		}

	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>