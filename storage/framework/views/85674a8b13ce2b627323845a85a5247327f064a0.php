<?php $__env->startSection('title'); ?>
	YPICS Invoicing | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_INVCING')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-file-text"></i>  YPICS Invoicing
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-hover table-bordered" id="tbl_invoicing">
                                                    <thead>
                                                        <tr>
                                                            <td width="30px">
                                                                <input type="checkbox" name="check" class="group-checkable" value="">
                                                            </td>
                                                            <td>CTR #</td>
															<td>Invoice Date</td>
															<td>Remarks</td>
															<td>Sold To</td>
															<td>Ship To</td>
															<td>Date Ship</td>
															<td>Port of Destination</td>
															<td>Shipping Instruction</td>
															<td>Case Marks</td>
															<td>Note</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php if(isset($packinglist)): ?>
                                                    		<?php foreach($packinglist as $pl): ?>
                                                    			<?php
                                                    				$bg = ''; $font = '';
                                                    				if ($pl->invoicing_status == 'Complete') {
                                                    					$bg = '#1BA39C';
                                                    					$font = '#fff';
                                                    				} elseif ($pl->invoicing_status == 'Revised') {
                                                    					$bg = '#e35b5a';
                                                    					$font = '#fff';
                                                    				}
                                                    			?>
	                                                    		<tr style="background-color:<?php echo e($bg); ?>; color:<?php echo e($font); ?>">
		                                                            <td width="30px">
		                                                                <a href="javascript:;" class="btn blue btn_edit input-sm" id="btn_edit" data-ctrl="<?php echo e($pl->control_no); ?>">
						                                                    <i class="fa fa-edit"></i>
						                                                </a>
		                                                            </td>
		                                                            <td><?php echo e($pl->control_no); ?></td>
																	<td><?php echo e($pl->invoice_date); ?></td>
																	<td>
																		<?php echo e($pl->remarks_time); ?> <br>
																		<?php echo e($pl->remarks_pickupdate); ?> <br>
																		<?php echo e($pl->remarks_s_no); ?>

																	</td>
																	<td><?php echo e($pl->sold_to); ?></td>
																	<td><?php echo e($pl->ship_to); ?></td>
																	<td><?php echo e($pl->date_ship); ?></td>
																	<td><?php echo e($pl->port_loading); ?></td>
																	<td><?php echo e($pl->shipping_instruction); ?></td>
																	<td><?php echo e($pl->case_marks); ?></td>
																	<td><?php echo e($pl->note); ?></td>
		                                                        </tr>
	                                                    	<?php endforeach; ?>
                                                    	<?php endif; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <?php /* <a href="javascript:;" class="btn blue" id="btn_edit">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a> */ ?>
                                                <?php /* <a href="javascript:;" class="btn red" id="btn_discard">
                                                    <i class="fa fa-eraser"></i> Discard Changes
                                                </a>
                                                <a href="javascript:;" class="btn purple" id="btn_search">
                                                    <i class="fa fa-search"></i> Search
                                                </a>
                                                <a href="javascript:;" class="btn red" id="btn_delete">
                                                    <i class="fa fa-trash"></i> Cancel
                                                </a>
												<a href="javascript:;" class="btn blue-hoki">
                                                    <i class="fa fa-print"></i> Print
                                                </a> */ ?>
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

	<!-- ADD NEW MODAL -->
	<div id="EditModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-xl gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Invoicing Details</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn green" id="btn_save"><i class="fa fa-floppy-o"></i> Save</a>
                        <a href="javascript:;" class="btn grey-gallery" id="btn_discard_modal"><i class="fa fa-eraser"></i> Discard Changes</a>
						<button type="button" data-dismiss="modal" class="btn red"><i class="fa fa-times"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- SEARCH MODAL -->
	<div id="SearchModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Search</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-3">From</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_from" id="search_from"/>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">To</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_to" id="search_to"/>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="">OK</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
$(function() {
    $('#tbl_invoicing').DataTable();    

	$('#btn_search').on('click', function() {
		$('#SearchModal').modal('show');
	});

	$('.btn_edit').on('click', function() {
		var ctrl = $(this).attr('data-ctrl');
		window.location = '<?php echo e(url("/detailsypicsinvoicing")); ?>'+'/'+ctrl;
	});

});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>