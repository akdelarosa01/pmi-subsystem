<?php $__env->startSection('title'); ?>
	WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_WBS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-navicon"></i>  WBS
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-xs-12 hidden-md hidden-lg hidden-xl">
										<div class="btn-group pull-right">
											<button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
												Warehouse Material Issuance <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li>
													<a href="<?php echo e(url('/materialreceiving')); ?>">
														<i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
													</a>
												</li>
												<li>
													<a href="<?php echo e(url('/iqc')); ?>">
													   <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
												   	</a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsmaterialkitting')); ?>">
		 											   <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbssakidashi')); ?>">
		 											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbspartsreceiving')); ?>">
		 											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsphysicalinventory')); ?>">
		 											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsprodmatrequest')); ?>">
		 											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbswhsmatissuance')); ?>" >
		 											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
		 										   </a>
												</li>
												<li  class="active">
													<a href="<?php echo e(url('/wbsreports')); ?>" >
		 											   <i class="fa fa-file-text-o fa-2x font-grey-gallery"></i> WBS Report
		 										   </a>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<br>

								<div class="row">
									<div class="col-lg-2 col-md-2 hidden-xs hidden-sm">
										<div class="list-group">
											<a href="<?php echo e(url('/materialreceiving')); ?>" class="list-group-item">
												<i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
											</a>
											<a href="<?php echo e(url('/iqc')); ?>" class="list-group-item">
											   <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
										   </a>
										   <a href="<?php echo e(url('/wbsmaterialkitting')); ?>" class="list-group-item">
											   <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
										   </a>
										   <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
										   </a>
										   <a href="<?php echo e(url('/wbspartsreceiving')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
										   </a>
										   <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item">
											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
										   </a>
										   <a href="<?php echo e(url('/wbsreports')); ?>" class="list-group-item active">
											  <i class="fa fa-file-text-o fa-2x font-grey-gallery"></i> WBS Report
										  </a>
										</div>
									</div>


									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row">
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat blue-steel">
													<div class="visual">
														<i class="fa fa-qrcode"></i>
													</div>
													<div class="details">
														<div class="number">
															Material Receiving
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="MAT_RCV">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat blue">
													<div class="visual">
														<i class="fa fa-search"></i>
													</div>
													<div class="details">
														<div class="number">
															IQC Inspection
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="IQC">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat yellow-gold">
													<div class="visual">
														<i class="fa fa-clipboard"></i>
													</div>
													<div class="details">
														<div class="number">
															Material Kitting & Issuance
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="MAT_KIT">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat yellow-casablanca">
													<div class="visual">
														<i class="glyphicon glyphicon-paste"></i>
													</div>
													<div class="details">
														<div class="number">
															Sakidashi Issuance
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="SAK_ISS">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
										</div>

										<br>

										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat purple">
													<div class="visual">
														<i class="glyphicon glyphicon-copy"></i>
													</div>
													<div class="details">
														<div class="number">
															Parts Receiving
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="PART_REC">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat green">
													<div class="visual">
														<i class="glyphicon glyphicon-list-alt"></i>
													</div>
													<div class="details">
														<div class="number">
															Physical Inventory
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="PHY_IN">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat blue-chambray">
													<div class="visual">
														<i class="glyphicon glyphicon-save-file"></i>
													</div>
													<div class="details">
														<div class="number">
															Production Material Request
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="PRD_MATREQ">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat grey-gallery">
													<div class="visual">
														<i class="fa fa-cubes"></i>
													</div>
													<div class="details">
														<div class="number">
															Warehouse Material Issuance
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="WHS_MATISS">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
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

	<!-- Search Modal -->
	<div id="matkitModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/wbsmaterialkitting')); ?>">
				<?php echo csrf_field(); ?>

				<div class="modal-content blue">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Search</h4>
					</div>
					<div class="modal-body">
						<div class="row">
						<div class="col-md-12">
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Po No.</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_pono" placeholder="Po No" name="srch_pono" autofocus <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Kit No.</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_kitno" placeholder="Kit No" name="srch_kitno" <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Prepared By</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_preparedby" placeholder="Prepared By" name="srch_preparedby" <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Slip No</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_slipno" placeholder="Slip No" name="srch_slipno" <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Status</label>
									<div class="col-md-8">
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Open" id="srch_open" name="Open" checked="true"/>Open</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Close" id="srch_close" name="Close"/>Close</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="width:880px; height:500px; overflow:auto;">
							<div class="col-md-12">
								<table class="table table-striped table-bordered table-hover" id="sample_3" style="font-size:10px">
									<thead>
										<tr>
											<td width="10%"></td>
											<td>Transaction No.</td>
											<td>Po No.</td>
											<td>Device Code</td>
											<td>Device name</td>
											<td>Kit No.</td>
											<td>Prepared By</td>
											<td>Slip No.</td>
											<td>Status</td>
											<td>Created By</td>
											<td>Created Date</td>
											<td>Updated By</td>
											<td>Updated Date</td>
										</tr>
									</thead>
									<tbody id="srch_tbl_body">
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" class="form-control input-sm" id="editId" name="editId">
						<button type="button" style="font-size:12px" onclick="javascript: filterData('SRCH'); " class="btn blue-madison" ><i class="glyphicon glyphicon-filter"></i> Filter</button>
						<button type="button" style="font-size:12px" onclick="javascript: filterData('CNCL'); " class="btn green" ><i class="glyphicon glyphicon-repeat"></i> Reset</button>
						<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
	<script type="text/javascript">
		$('.showmodal').on('click', function() {
			var sub = $(this).attr('data-sub');
			if (sub == 'MAT_RCV') {}
			if (sub == 'IQC') {}
			if (sub == 'MAT_KIT') {
				$('#matkitModal').modal('show');
			}
			if (sub == 'SAK_ISS') {}
			if (sub == 'PART_REC') {}
			if (sub == 'PHY_IN') {}
			if (sub == 'PRD_MATREQ') {}
			if (sub == 'WHS_MATISS') {}
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>