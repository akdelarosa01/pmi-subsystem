<?php
/*******************************************************************************
     Copyright (c) Company Nam All rights reserved.

     FILE NAME: sakidashiissuance.blade.php
     MODULE NAME:  3006 : WBS - Sakidashi Issuance
     CREATED BY: AK.DELAROSA
     DATE CREATED: 2016.07.01
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.07.01    AK.DELAROSA      Initial Draft
     100-00-02   1     2016.07.05    MESPINOSA        Sakidashi Issuance Implementation.
     200-00-01   1     2017.02.09    AK.DELAROSA      Second Version
*******************************************************************************/
?>



<?php $__env->startSection('title'); ?>
	WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
	<style type="text/css">
        table.table-fixedheader {
            width: 100%;   
        }
        table.table-fixedheader, table.table-fixedheader>thead, table.table-fixedheader>tbody, table.table-fixedheader>thead>tr, table.table-fixedheader>tbody>tr, table.table-fixedheader>thead>tr>td, table.table-fixedheader>tbody>td {
            display: block;
        }
        table.table-fixedheader>thead>tr:after, table.table-fixedheader>tbody>tr:after {
            content:' ';
            display: block;
            visibility: hidden;
            clear: both;
        }
        table.table-fixedheader>tbody {
            overflow-y: scroll;
            height: 200px;
        }
        table.table-fixedheader>thead {
            overflow-y: scroll;
        }
        table.table-fixedheader>thead::-webkit-scrollbar {
            background-color: inherit;
        }

        table.table-fixedheader>thead>tr>td:after, table.table-fixedheader>tbody>tr>td:after {
            content:' ';
            display: table-cell;
            visibility: hidden;
            clear: both;
        }

        table.table-fixedheader>thead tr td, table.table-fixedheader>tbody tr td {
            float: left;    
            word-wrap:break-word;
            height: 40px;
        }
    </style>
<?php $__env->stopPush(); ?>

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
												Sakidashi Issuance <i class="fa fa-angle-down"></i>
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
												<li class="active">
													<a href="<?php echo e(url('/wbssakidashi')); ?>">
		 											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
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
													<a href="<?php echo e(url('/wbsprodmatreturn')); ?>" >
		 											   <i class="fa fa-exchange fa-2x"></i> Production Material Return
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbswhsmatissuance')); ?>" >
		 											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsmaterialdisposition')); ?>" >
		 											   <i class="fa fa-history fa-2x"></i> Material Disposistion
		 										   </a>
												</li>
												<li>
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
										   <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item active">
											   <i class="glyphicon glyphicon-paste fa-2x"></i> Sakidashi Issuance
										   </a>
										   <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatreturn')); ?>" class="list-group-item">
											  <i class="fa fa-exchange fa-2x font-grey-gallery"></i> Production Material Return
										  </a>
										   <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item">
											   <i class="fa fa-cubes fa-2x font-red-flamingo"></i> Warehouse Material Issuance
										   </a>
										   <a href="<?php echo e(url('/wbsmaterialdisposition')); ?>" class="list-group-item">
											  <i class="fa fa-history fa-2x font-grey-gallery"></i> Material Disposistion
										  </a>
										   <a href="<?php echo e(url('/wbsreports')); ?>" class="list-group-item">
											  <i class="fa fa-file-text-o fa-2x font-grey-gallery"></i> WBS Report
										  </a>
										</div>
									</div>


									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
										<div class="row">
											<div class="form-horizontal">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Issuance No.</label>
														<div class="col-md-4">
															<input type="text" class="form-control clear input-sm" id="issuancenosaki" name="issuancenosaki">
															<input type="hidden" name="recid" id="recid">
														</div>
														<div class="col-md-5">
															<div class="btn-group btn-group-circle">
																<button id="btn_min" onclick="nav('first')" class="btn blue input-sm"><i class="fa fa-fast-backward"></i></button>
																<button id="btn_prv" onclick="nav('prev')" class="btn blue input-sm"><i class="fa fa-backward"></i></button>
																<button id="btn_nxt" onclick="nav('nxt')" class="btn blue input-sm"><i class="fa fa-forward"></i></button>
																<button id="btn_max" onclick="nav('last')" class="btn blue input-sm"><i class="fa fa-fast-forward"></i></button>
															</div>
														</div>
													</div>
													<form class="form-horizontal" method="POST" action="<?php echo e(url('/wbssi-searchpo')); ?>" id="searchPOform">
														<div class="form-group">
															<label class="control-label col-md-3 input-sm">PO No.</label>
															<div class="col-md-7">
																<input type="text" class="form-control clear input-sm" id="ponosaki" name="ponosaki">
																<?php echo csrf_field(); ?>

															</div>
															<div class="col-md-2">
																<button type="submit" class="btn btn-circle green input-sm" id="btn_ponosaki">
																	<i class="fa fa-arrow-circle-down"></i>
																</button>
															</div>
														</div>
													</form>
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Device Code</label>
														<div class="col-md-7">
															<input type="text" class="form-control clear input-sm" id="devicecodesaki" name="devicecodesaki" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Device Name</label>
														<div class="col-md-9">
															<input type="text" class="form-control clear input-sm" id="devicenamesaki" name="devicenamesaki" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">PO Qty.</label>
														<div class="col-md-5">
															<input type="text" class="form-control clear input-sm" id="poqtysaki" name="poqtysaki" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">In-Charge</label>
														<div class="col-md-4">
															<input type="text" class="form-control clear input-sm" id="incharge" name="incharge">
														</div>
													</div>
													<div class="form-group" style="margin-bottom: 10px;">
														<label class="control-label col-md-3 input-sm">Remarks</label>
														<div class="col-md-6">
															<textarea class="form-control clear" style="resize:none;" id="remarks" name="remarks"></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Status</label>
														<div class="col-md-6">
															<input type="text" class="form-control clear input-sm" id="statussaki" name="statussaki" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Created By</label>
														<div class="col-md-6">
															<input type="text" class="form-control clear input-sm" id="createdbysaki" name="createdbysaki" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Updated Date.</label>
														<div class="col-md-6">
															<input type="text" class="form-control clear date-picker input-sm" name="createddatesaki" id="createddatesaki" readonly/>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Updated By</label>
														<div class="col-md-6">
															<input type="text" class="form-control clear input-sm" id="updatedbysaki" name="updatedbysaki" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 input-sm">Updated Date</label>
														<div class="col-md-6">
															<input type="text" class="form-control clear date-picker input-sm" name="updateddatesaki" id="updateddatesaki" readonly/>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-8 col-md-offset-2">
												<div class="panel panel-default">
													<div class="panel-body">
														<div class="col-md-12">
															<div class="row">
																<form class="form-horizontal">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="control-label col-md-3 input-sm">Part Code</label>
																			<div class="col-md-7">
																				<input type="text" class="form-control clear input-sm" id="partcode" name="partcode" readonly>
																				<input type="hidden" class="form-control clear input-sm" id="hdnpartcode" name="hdnpartcode"/>
																			</div>
																			<div class="col-md-2">
																				<a href="javascript:;" id="btn_partcode" class="btn btn-circle green input-sm">
																					<i class="fa fa-arrow-circle-down"></i>
																				</a>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-md-3 input-sm">Part Name</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control clear input-sm" id="partname" name="partname" readonly>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-md-3 input-sm">Lot No.</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control clear input-sm" id="lotno" name="lotno">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-md-3 input-sm">Pair No.</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control clear input-sm" id="pairno" name="pairno">
																			</div>
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="control-label col-md-4 input-sm">Issue Qty</label>
																			<div class="col-md-8">
																				<input type="text" class="form-control clear input-sm" id="issueqty" name="issueqty">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-md-4 input-sm">Required Qty.</label>
																			<div class="col-md-8">
																				<input type="text" class="form-control clear input-sm" id="reqqty" name="reqqty">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-md-4 input-sm">Return Qty.</label>
																			<div class="col-md-8">
																				<input type="text" class="form-control clear input-sm" id="retqty" name="retqty" readonly>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-md-4 input-sm">Sched Return Date</label>
																			<div class="col-md-8">
																				<input class="form-control clear date-picker input-sm" size="16" type="text" id="schedretdate" name="schedretdate">
																			</div>
																		</div>
																	</div>
																</form>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="table-responsive">
																		<table class="table table-striped table-bordered table-hover table-fixedheader" style="font-size:10px">
																			<thead>
																				<tr>
																					<td style="width: 100%" class="text-center" colspan="5">History</td>
																				</tr>
																				<tr>
																					<td style="width: 20%">Transaction No.</td>
																					<td style="width: 20%">Issued Qty.</td>
																					<td style="width: 20%">Returned Qty.</td>
																					<td style="width: 20%">Lot No.</td>
																					<td style="width: 20%">Remarks</td>
																				</tr>
																			</thead>
																			<tbody id="tbl_history">
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


										<div class="row">
											<div class="col-md-12 text-center">
												<button type="button" class="btn green input-sm" onclick="addState()" id="btn_add">
													<i class="fa fa-plus"></i> Add New
												</button>
												<button class="btn blue-madison input-sm" id="btn_save">
													<i class="fa fa-pencil"></i> Save
												</button>
												<button type="button" class="btn blue-madison input-sm" onclick="editState()" id="btn_edit">
													<i class="fa fa-pencil"></i> Edit
												</button>
												<button type="button" class="btn red input-sm" onclick="cancelPO()" id="btn_cancel">
													<i class="fa fa-trash"></i> Cancel P.O.
												</button>
												<button type="button" class="btn red-intense input-sm" id="btn_discard">
													<i class="fa fa-times"></i> Discard Changes
												</button>
												<button type="button" class="btn blue-steel input-sm" id="btn_search" >
													<i class="fa fa-search"></i> Search
												</button>
												<button type="submit" class="btn purple-plum input-sm" onclick="generateSiReport()" id="btn_print">
													<i class="fa fa-print"></i> Print Issuance Sheet
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

	<!-- Item Modal -->
	<div id="itemModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Select PO Part Details</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover table-fixedheader" style="font-size:10px">
								<thead>
									<tr>
										<td style="width:14%"></td>
										<td style="width:20%">Item Part/No.</td>
										<td style="width:30%">Item Description</td>
										<td style="width:18%">Sched Qty.</td>
										<td style="width:18%">Actual Total</td>
									</tr>
								</thead>
								<tbody id="item_tbl_body">
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIFO Modal -->
	<div id="fifoModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Select Lot Number</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-fixedheader table-striped table-fifo" style="font-size:10px">
								<thead>
									<tr>
										<td style="width: 9.66%"></td>
										<td style="width: 16.66%">Item Code</td>
										<td style="width: 24.66%">Description</td>
										<td style="width: 15.66%">Qty</td>
										<td style="width: 16.66%">Lot</td>
										<td style="width: 16.66%">Received Date</td>
									</tr>
								</thead>
								<tbody id="tblfifoAdd"></tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Confirm -->
	<div id="confirm" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 class="modal-title">WBS Material Receiving</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure?</p>
					<input type="hidden" name="confirm_status" id="confirm_status">
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" id="confirmyes" class="btn btn-success">Yes</button>
					<button type="button" data-dismiss="modal" id="confirmno" class="btn btn-danger">No</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Search Modal -->
	<div id="searchModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-xl">
			<div class="modal-content blue">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">PO No</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm clear_search" id="srch_pono" placeholder="PO No." name="srch_pono" autofocus <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Device Code</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm clear_search" id="srch_devicecode" placeholder="Device Code" name="srch_devicecode" <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Item Part / No</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm clear_search" id="srch_itemcode" placeholder="Item Part / No." name="srch_itemcode" <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Incharge</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm clear_search" id="srch_incharge" placeholder="Incharge" name="srch_incharge" <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Status</label>
									<div class="col-md-8">
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Open" id="srch_open" name="Open" checked="true"/>Open</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Closed" id="srch_close" name="Close"/>Close</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-fixedheader" style="font-size:10px">
									<thead>
										<tr>
											<td style="width: 4.69%"></td>
											<td style="width: 7.69%">Transaction No.</td>
											<td style="width: 7.69%">PO No.</td>
											<td style="width: 7.69%">Device Code</td>
											<td style="width: 10.69%">Device Name</td>
											<td style="width: 7.69%">Incharge</td>
											<td style="width: 7.69%">Item Part/No.</td>
											<td style="width: 11.69%">Item Description</td>
											<td style="width: 5.69%">Status</td>
											<td style="width: 6.69%">Created By</td>
											<td style="width: 7.69%">Created Date</td>
											<td style="width: 6.69%">Updated By</td>
											<td style="width: 7.69%">Updated Date</td>
										</tr>
									</thead>
									<tbody id="srch_tbl_body"></tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" style="font-size:12px" onclick="javascript: search(); " class="btn blue-madison"><i class="glyphicon glyphicon-filter"></i> Filter</button>
					<button type="button" style="font-size:12px" onclick="javascript: reset(); " class="btn green" ><i class="glyphicon glyphicon-repeat"></i> Reset</button>
					<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- AJAX LOADER -->
	<div id="loading" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-offset-2 col-sm-8">
							<img src="assets/images/ajax-loader.gif" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MSG -->
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
		viewState();
		$(document).ready(function(e) {
			getLatest();
			
			//selecting PO
			$('#btn_ponosaki').on('click', function(e) {
				$('#searchPOform').submit(function(e) {
					e.preventDefault();
					$('#item_tbl_body').html('');
					var url = $(this).attr('action');
					var data = {
						_token: $('meta[name=csrf-token]').attr('content'),
						po: $('#ponosaki').val(),
					}
					searchPO(url,data);
				});
			});

			//selecting item inside PO
			$('#item_tbl_body').on('click', '.select_item', function() {
				var item = $(this).attr('data-item');
				var item_desc = $(this).attr('data-item_desc');
				var req_qty = $(this).attr('data-req_qty');
				var schedretdate = $(this).attr('data-schedretdate');
				$('#partcode').val(item);
				$('#hdnpartcode').val(item);
				$('#partname').val(item_desc);
				$('#reqqty').val(req_qty);
				$('#schedretdate').val(schedretdate);
				$('#itemModal').modal('hide');
				loadfifo(item,$('#tblfifoAdd'));
				$('#fifoModal').modal('show');
				$('#lotno').focus();
				itemHistory();
			});

			$('#btn_partcode').on('click', function() {
				$('#item_tbl_body').html('');
				var url = $('#searchPOform').attr('action');
				var data = {
					_token: $('meta[name=csrf-token]').attr('content'),
					po: $('#ponosaki').val(),
				}
				searchPO(url,data);
			});

			$('#btn_save').on('click', function() {
				var url = "<?php echo e(url('/wbssisave')); ?>";
				var info = {
					issuanceno: $('#issuancenosaki').val(),
					po: $('#ponosaki').val(),
					code: $('#devicecodesaki').val(),
					devname: $('#devicenamesaki').val(),
					poqty: $('#poqtysaki').val(),
					incharge: $('#incharge').val(),
					remarks: $('#remarks').val(),
				};
				var details = {
					partcode: $('#partcode').val(),
					partname: $('#partname').val(),
					lotno: $('#lotno').val(),
					pairno: $('#pairno').val(),
					issueqty: $('#issueqty').val(),
					reqqty: $('#reqqty').val(),
					retqty: $('#retqty').val(),
					schedretdate: $('#schedretdate').val(),
				}
				var data = {
					_token: $('meta[name=csrf-token]').attr('content'),
					info: JSON.stringify(info),
					details: JSON.stringify(details),
				};
				saveRecord(url,data);
			});

			$('#btn_discard').on('click', function() {
				window.location.href="<?php echo e(url('/wbssakidashi')); ?>";
			});

			$('#issuancenosaki').focusout(function() {
				getTransCode($(this).val());
			});

			$('#btn_search').on('click', function() {
				$('#searchModal').modal('show');
			});

			$('#srch_tbl_body').on('click', '.select_item_search', function() {
				var transcode = $(this).attr('data-transcode');
				getTransCode(transcode);
				$('#searchModal').modal('hide');
			});

			$('#tblfifoAdd').on('click', '.btn_select_lot', function() {
				$('#lotno').val($(this).attr('data-lotno'));
				if ($('#lotno').val() != '') {
					$('#fifoModal').modal('hide');
				}
			});
			
		});

		function searchPO(url,data) {
			$('#loading').modal('show');
			$.ajax({
				url: url,
				type: 'POST',
				data:  data,
			}).done(function(data, textStatus, jqXHR){
				var saki = JSON.parse(data);
				var info = saki.info;
				var details = saki.details;
				var item_tbl_body = '';

				if (saki.return_status == 'success') {
					$('#devicecodesaki').val(info['code']);
					$('#devicenamesaki').val(info['prodname']);
					$('#poqtysaki').val(info['POqty']);

					$.each(details, function(i, x) {
						item_tbl_body = '<tr>'+
											'<td style="width:14%">'+
												'<a href="javascript:;" class="btn btn-sm green select_item" data-schedretdate="'+x.return_date+'"'+
													' data-item="'+x.item+'" data-item_desc="'+x.item_desc+'" data-req_qty="'+x.sched_qty+'">'+
													'<i class="fa fa-thumbs-up"></i>'+
												'</a>'+
											'</td>'+
											'<td style="width:20%">'+x.item+'</td>'+
											'<td style="width:30%">'+x.item_desc+'</td>'+
											'<td style="width:18%">'+x.sched_qty+'</td>'+
											'<td style="width:18%">'+x.actual_qty+'</td>'+
										'</tr>';
						$('#item_tbl_body').append(item_tbl_body);
					});
					$('#loading').modal('hide');
					$('#itemModal').modal('show');
					openDetails();
				} else {
					$('#loading').modal('hide');
					failedMsg(saki.msg);
				}
			}).fail(function(data, textStatus, jqXHR){
				failedMsg("There's a problem occurred.");
			});
		}

		function saveRecord(url,data) {
			$('#loading').modal('show');
			$.ajax({
				url: url,
				type: 'POST',
				data: data,
				dataType: 'JSON',
			}).done( function(data,textStatus,jqXHR) {
				if (data.return_status == 'success') {
					getLatest();
					$('#loading').modal('hide');
					successMsg(data.msg);
					viewState();
				} else {
					$('#loading').modal('hide');
					failedMsg(data.msg);
				}
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's a problem occurred.");
			});
		}

		function getLatest() {
			$('#loading').modal('show');
			var url = "<?php echo e(url('/wbssi-getlatest')); ?>";
			var data = {
				_token: $('meta[name=csrf-token]').attr('content'),
			}

			$.ajax({
				url: url,
				type: 'GET',
				data: data,
				dataType: 'JSON',
			}).done( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				valuesOfInfo(data);
				valuesOfDetails(data);
				itemHistory();
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's a problem occurred.");
			});
		}

		function getTransCode(issuanceno) {
			$('#loading').modal('show');
			var url = "<?php echo e(url('/wbssi-gettranscode')); ?>";
			var data = {
				_token: $('meta[name=csrf-token]').attr('content'),
				issuanceno: issuanceno
			}

			$.ajax({
				url: url,
				type: 'GET',
				data: data,
				dataType: 'JSON',
			}).done( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				valuesOfInfo(data);
				valuesOfDetails(data);
				itemHistory();
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's a problem occurred.");
			});
		}

		function valuesOfInfo(data) {
			$('#recid').val(data.id);
			$('#issuancenosaki').val(data.issuance_no);
			$('#ponosaki').val(data.po_no);
			$('#devicecodesaki').val(data.device_code);
			$('#devicenamesaki').val(data.device_name);
			$('#poqtysaki').val(data.po_qty);
			$('#incharge').val(data.incharge);
			$('#remarks').val(data.remarks);
			$('#statussaki').val(data.status);
			$('#createdbysaki').val(data.create_user);
			$('#createddatesaki').val(data.update_user);
			$('#updatedbysaki').val(data.created_at);
			$('#updateddatesaki').val(data.updated_at);
		}

		function valuesOfDetails(data) {
			$('#partcode').val(data.item);
			$('#hdnpartcode').val(data.item);
			$('#partname').val(data.item_desc);
			$('#lotno').val(data.lot_no);
			$('#pairno').val(data.pair_no);
			$('#issueqty').val(data.issued_qty);
			$('#reqqty').val(data.req_qty);
			$('#retqty').val(data.return_qty);
			$('#schedretdate').val(data.return_date);
		}

		function dataOfItemHistory(data) {
			var tbl_history = '';
			$.each(data, function(i, x) {
				tbl_history = '<tr>'+
									'<td style="width: 20%">'+x.issuance_no+'</td>'+
									'<td style="width: 20%">'+x.issued_qty+'</td>'+
									'<td style="width: 20%">'+x.req_qty+'</td>'+
									'<td style="width: 20%">'+x.lot_no+'</td>'+
									'<td style="width: 20%">'+x.remarks+'</td>'+
								'</tr>';

				$('#tbl_history').append(tbl_history);
			});
		}

		function itemHistory() {
			$('#tbl_history').html('');
			var url = "<?php echo e(url('/wbssi-history')); ?>";
			var data = {
				_token: $('meta[name=csrf-token]').attr('content'),
				po: $('#ponosaki').val(),
				item: $('#partcode').val()
			}

			$.ajax({
				url: url,
				type: 'GET',
				data: data,
				dataType: 'JSON',
			}).done( function(data,textStatus,jqXHR) {
				if (data != null) {
					dataOfItemHistory(data);
				}
			}).fail( function(data,textStatus,jqXHR) {
				failedMsg("There's a problem occurred.");
			});
		}

		function successMsg(msg) {
			$('#msg').modal('show');
			$('#title').html('<strong><i class="fa fa-check"></i></strong> Success!')
			$('#err_msg').html(msg);
		}

		function failedMsg(msg) {
			$('#msg').modal('show');
			$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
			$('#err_msg').html(msg);
		}

		function viewState() {
			$('#issuancenosaki').prop('readonly', false);
			$('#ponosaki').prop('readonly', true);
			$('#incharge').prop('readonly', true);
			$('#remarks').prop('readonly', true);

			$('#lotno').prop('readonly', true);
			$('#pairno').prop('readonly', true);
			$('#issueqty').prop('readonly', true);
			$('#reqqty').prop('readonly', true);
			$('#schedretdate').prop('readonly', true);

			$('#btn_ponosaki').prop('disabled', true);
			$('#btn_partcode').hide();

			$('#btn_min').prop('disabled', false);
			$('#btn_prv').prop('disabled', false);
			$('#btn_nxt').prop('disabled', false);
			$('#btn_max').prop('disabled', false);

			$('#btn_save').hide();
			$('#btn_cancel').hide();
			$('#btn_discard').hide();

			$('#btn_add').show();
			$('#btn_edit').show();
			$('#btn_search').show();
			$('#btn_print').show();
		}

		function addState() {
			$('.clear').val('');
			$('#issuancenosaki').prop('readonly', true);
			$('#ponosaki').prop('readonly', false);
			$('#incharge').prop('readonly', false);
			$('#remarks').prop('readonly', false);
			$('#btn_ponosaki').prop('disabled', false);

			$('#btn_min').prop('disabled', true);
			$('#btn_prv').prop('disabled', true);
			$('#btn_nxt').prop('disabled', true);
			$('#btn_max').prop('disabled', true);

			$('#btn_save').show();
			$('#btn_cancel').hide();
			$('#btn_discard').show();

			$('#btn_add').hide();
			$('#btn_edit').hide();
			$('#btn_search').hide();
			$('#btn_print').hide();
		}

		function openDetails() {
			$('#btn_partcode').show();
			$('#lotno').prop('readonly', false);
			$('#pairno').prop('readonly', false);
			$('#issueqty').prop('readonly', false);
			$('#reqqty').prop('readonly', false);
			$('#schedretdate').prop('readonly', false);
		}

		function editState() {
			$('#btn_partcode').show();
			$('#lotno').prop('readonly', false);
			$('#pairno').prop('readonly', false);
			$('#issueqty').prop('readonly', false);
			$('#reqqty').prop('readonly', false);
			$('#schedretdate').prop('readonly', false);

			$('#btn_min').prop('disabled', true);
			$('#btn_prv').prop('disabled', true);
			$('#btn_nxt').prop('disabled', true);
			$('#btn_max').prop('disabled', true);

			$('#btn_save').show();
			$('#btn_cancel').show();
			$('#btn_discard').show();

			$('#btn_add').hide();
			$('#btn_edit').hide();
			$('#btn_search').hide();
			$('#btn_print').hide();
		}

		function search() {
			$('#srch_tbl_body').html('');
			$('#loading').modal('show');
			var condition_arr = {
				srch_pono: $('#srch_pono').val(),
				srch_devicecode: $('#srch_devicecode').val(),
				srch_itemcode: $('#srch_itemcode').val(),
				srch_incharge: $('#srch_incharge').val(),
				srch_open: $('#srch_open').val(),
				srch_close: $('#srch_close').val(),
				srch_cancelled: $('#srch_cancelled').val(),
			}
			var data = {
				_token: $('meta[name=csrf-token]').attr('content'),
				condition_arr: condition_arr
			}

			var url = "<?php echo e(url('/wbssi-search')); ?>";

			$.ajax({
				url: url,
				type: 'POST',
				data: data,
				dataType: 'JSON',
			}).done( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				$.each(data, function(i, x) {
					srch_tbl_body = '<tr>'+
										'<td style="width: 4.69%">'+
											'<a href="javascript:;" class="btn btn-sm blue select_item_search" data-transcode="'+x.issuance_no+'">'+
												'<i class="fa fa-edit"></i>'+
											'</a>'+
										'</td>'+
										'<td style="width: 7.69%">'+x.issuance_no+'</td>'+
										'<td style="width: 7.69%">'+x.po_no+'</td>'+
										'<td style="width: 7.69%">'+x.device_code+'</td>'+
										'<td style="width: 10.69%">'+x.device_name+'</td>'+
										'<td style="width: 7.69%">'+x.incharge+'</td>'+
										'<td style="width: 7.69%">'+x.item+'</td>'+
										'<td style="width: 11.69%">'+x.item_desc+'</td>'+
										'<td style="width: 5.69%">'+x.status+'</td>'+
										'<td style="width: 6.69%">'+x.create_user+'</td>'+
										'<td style="width: 7.69%">'+x.created_at+'</td>'+
										'<td style="width: 6.69%">'+x.update_user+'</td>'+
										'<td style="width: 7.69%">'+x.updated_at+'</td>'+
									'</tr>';
					$('#srch_tbl_body').append(srch_tbl_body);
				});
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's a problem occurred.");
			});
		}

		function reset() {
			$('.clear_search').val('');
			$('#srch_tbl_body tr').remove();
		}

		function nav(to) {
			$('#loading').modal('show');
			var url = "<?php echo e(url('/wbssi-nav')); ?>";
			var data = {
				_token: $('meta[name=csrf-token]').attr('content'),
				issuanceno: $('#issuancenosaki').val(),
				to: to
			}

			$.ajax({
				url: url,
				type: 'GET',
				data: data,
				dataType: 'JSON',
			}).done( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				if (data == null) {
					failedMsg("There's no data found.");
				} else {
					valuesOfInfo(data);
					valuesOfDetails(data);
					itemHistory();
				}
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's a problem occurred.");
			});
		}

		function cancelPO() {
			var url = "<?php echo e(url('/wbssi-cancel')); ?>";
			var data = {
				_token: $('meta[name=csrf-token]').attr('content'),
				po: $('#ponosaki').val()
			}

			$.ajax({
				url: url,
				type: 'POST',
				data: data,
				dataType: 'JSON',
			}).done( function(data,textStatus,jqXHR) {
				getTransCode($('#issuancenosaki').val());
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's a problem occurred.");
			});
		}

		/*
		*Sakidashi Issuance START
		*/
		$(document).ready(function(e)
		{
			// $('.table').dataTable( { "bSort" : false } );

			// $("#issuancenosaki").keyup(function(event){
			// 	var si = $('#issuancenosaki').val();
			// 	if(event.keyCode == 13)
			// 	{
			// 		window.location.href = "<?php echo e(url('/wbssakidashi?page=')); ?>" + 'SI&id=' + si;
			// 	}
			// });

			$("#issueqty").focusout(function ()
			{
				var iqty = 0
				var rqqty = 0;

				if(parseInt($("#issueqty").val()))
				{
					iqty = parseInt($("#issueqty").val());

					if(parseInt($("#reqqty").val()))
					{
						rqqty = parseInt($("#reqqty").val());

					    if(rqqty >= iqty)
					    {
					    	$("#retqty").val(rqqty - iqty);
					    }
					    else
					    {
							$.alert('Issued quantity must not be greater than required quantity',
							{
								position:['center',[-0.40,0]],
								type	:'error',
								closeTime:2000,
								autoClose:true,
								id		:'alert_suc'
							});
					    }
					}
					else
					{
						$.alert('Please input valid required quantity.',
						{
							position:['center',[-0.40,0]],
							type	:'error',
							closeTime:2000,
							autoClose:true,
							id		:'alert_suc'
						});
					}
				}
				else
				{
					$.alert('Please input valid issued quantity.',
					{
						position:['center',[-0.40,0]],
						type	:'error',
						closeTime:2000,
						autoClose:true,
						id		:'alert_suc'
					});
				}

			});


			$("#reqqty").focusout(function ()
			{
				var iqty = 0
				var rqqty = 0;

				if(parseInt($("#issueqty").val()))
				{
					iqty = parseInt($("#issueqty").val());
				}
				else
				{
					$.alert('Please input valid issued quantity.',
					{
						position:['center',[-0.40,0]],
						type	:'error',
						closeTime:2000,
						autoClose:true,
						id		:'alert_suc'
					});
				}

				if(parseInt($("#reqqty").val()))
				{
					rqqty = parseInt($("#reqqty").val());
				}
				else
				{
					$.alert('Please input valid required quantity.',
					{
						position:['center',[-0.40,0]],
						type	:'error',
						closeTime:2000,
						autoClose:true,
						id		:'alert_suc'
					});
				}

			    if(rqqty >= iqty)
			    {
			    	$("#retqty").val(rqqty - iqty);
			    }
			    else
			    {
					$.alert('Issued quantity must not be greater than required quantity',
					{
						position:['center',[-0.40,0]],
						type	:'error',
						closeTime:2000,
						autoClose:true,
						id		:'alert_suc'
					});
			    }

			});

			var queryString = new Array;
			var query = location.search.substr(1);
			var result = {};


			query.split("&").forEach(function(part)
			{
				var item = part.split("=");

				if(decodeURIComponent(item[0]) == 'action'&&(decodeURIComponent(item[1]) == 'ADD'||decodeURIComponent(item[1]) == 'EDIT'))
				{
					var rowCount = $('#sample_3 tr').length;
					if(rowCount >= 2)
					{
						if(rowCount == 2)
						{
							$("#validShipModal").modal("show");
						}
						else
						{
							$("#itemModal").modal("show");
						}
					}
					else
					{
						$.alert('Please input valid and existing PO No. or Item Code',
						{
							position:['center',[-0.40,0]],
							type	:'error',
							closeTime:2000,
							autoClose:true,
							id		:'alert_suc'
						});
					}
				}
			});

			$('#receivingdate').datepicker({
				"setDate":newDate(),
				"autoclose":true
			});
		});
		function generateSiReport()
		{
			window.open("<?php echo e(url('/wbssi-report?')); ?>" + 'id=1' + $("#recid").val(), '_blank');
		}


		function loadfifo(code,table) {
	    	table.html('');
	     	var url = "<?php echo e(url('/wbssi-fifo')); ?>";
	     	var token = "<?php echo e(Session::token()); ?>";
	     	var tblfifoAdd = '';
	     	var data = {
	     		_token: token,
	     		code  : code
	     	};

	     	$.ajax({
	     		url: url,
	            type: "GET",
	            data: data,
	     	}).done(function(data) {
	     		$.each(data, function(i, x) {
	     			tblfifoAdd = '<tr>'+
	     							'<td style="width: 9.66%">'+
	     								'<a href="javascript:;" class="btn btn-primary btn_select_lot btn-sm" data-lotno="'+x.lot_no+'">'+
	     									'<i class="fa fa-pencil"></i>'+
	     								'</a>'+
	     							'</td>'+
	                                '<td style="width: 16.66%">'+x.item+'</td>'+
	                                '<td style="width: 24.66%">'+x.item_desc+'</td>'+
	                                '<td style="width: 15.66%">'+x.qty+'</td>'+
	                                '<td style="width: 16.66%">'+x.lot_no+'</td>'+
	                                '<td style="width: 16.66%">'+x.created_at+'</td>'+
	                            '</tr>';

	        		table.append(tblfifoAdd);
	     		});
	     	}).fail(function(data) {
	     	});
	    }
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>