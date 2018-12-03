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
        #hd_barcode{
        	position: absolute;
        	z-index: -1;
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
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<input type="text" id="hd_barcode" name="hd_barcode" />
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-navicon"></i>  WBS Sakidashi Issuance
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="row">
											<div class="form-horizontal">
												<div class="col-md-5">
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

												<div class="col-md-3">
													<div class="form-group">
														<label class="control-label col-md-4 input-sm">In-Charge</label>
														<div class="col-md-8">
															<input type="text" class="form-control clear input-sm" id="incharge" name="incharge">
														</div>
													</div>
													<div class="form-group" style="margin-bottom: 10px;">
														<label class="control-label col-md-4 input-sm">Remarks</label>
														<div class="col-md-8">
															<textarea class="form-control clear" style="resize:none;" id="remarks" name="remarks"></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4 input-sm">Status</label>
														<div class="col-md-8">
															<input type="text" class="form-control clear input-sm" id="statussaki" name="statussaki" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label col-md-4 input-sm">Created By</label>
														<div class="col-md-7">
															<input type="text" class="form-control clear input-sm" id="createdbysaki" name="createdbysaki" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4 input-sm">Updated Date</label>
														<div class="col-md-7">
															<input type="text" class="form-control clear date-picker input-sm" name="createddatesaki" id="createddatesaki" readonly/>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4 input-sm">Updated By</label>
														<div class="col-md-7">
															<input type="text" class="form-control clear input-sm" id="updatedbysaki" name="updatedbysaki" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4 input-sm">Updated Date</label>
														<div class="col-md-7">
															<input type="text" class="form-control clear date-picker input-sm" name="updateddatesaki" id="updateddatesaki" readonly/>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-10 col-md-offset-1">
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
																				<input type="hidden" name="fifoid" id="fifoid">
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
																					<td style="width: 12.5%">Transaction No.</td>
																					<td style="width: 12.5%">Issued/Reel Qty.</td>
																					<td style="width: 12.5%">Required Qty.</td>
																					<td style="width: 12.5%">Returned Qty.</td>
																					<td style="width: 12.5%">Lot No.</td>
																					<td style="width: 12.5%">Pair No.</td>
																					<td style="width: 12.5%">Remarks</td>
																					<td style="width: 12.5%"></td>
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
												<button type="submit" class="btn yellow-gold input-sm" onclick="generateSiReport()" id="btn_print">
													<i class="fa fa-print"></i> Print Issuance Sheet
												</button>
												<button type="submit" class="btn green-jungle input-sm" id="btn_print_excel">
													<i class="fa fa-print"></i> Export to Excel
												</button>
												<a href="javascript:;" id="btn_reasonlogs" class="btn btn-success input-sm">
								   					<i class="fa fa-file-o"></i> FIFO Reason Logs
								   				</a>
											</div>
										</div>
									</div>
								</div>

								<input type="hidden" name="brsense" id="brsense">


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
	<div id="itemModal" class="modal fade" role="dialog" data-backdrop="static">
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
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="item_close"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIFO Modal -->
	<div id="fifoModal" class="modal fade" role="dialog" data-backdrop="static">
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
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="fifo_close"><i class="fa fa-times"></i> Close</button>
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
	<div id="searchModal" class="modal fade" role="dialog" data-backdrop="static">
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

	<!-- FIFO prompt -->
		<div id="fifoReasonModal" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 id="tit" class="modal-title">FIFO Alert</h4>
					</div>
					<div class="modal-body">
						<p>FIFO is recommended, but you can specify your reason for using this Lot number.</p>
						<textarea class="form-control" id="fiforeason"></textarea>
						<input type="hidden" name="frlotno" id="frlotno">
						<input type="hidden" name="fritem" id="fritem">
						<input type="hidden" name="frqty" id="frqty">
						<input type="hidden" name="frid" id="frid">
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-danger" id="err_msg_close">Close</button>
						<a href="javascript:;" id="btn_fiforeason" class="btn btn-success">OK</a>
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
			$(document).on('click', function(e) {
				var isFocused = $('#hd_barcode').is(':focus');
				var isModalOpen = $('#itemModal').hasClass('in');
				if (isModalOpen == true) {
					$('#hd_barcode').focus();
				} else {
					// if ($('#brsense').val() == 'edit') {
					// 	$('#hd_barcode').focus();
					// }
				}
			});

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
				$('#hd_barcode').focus();
				loadfifo(item,$('#tblfifoAdd'));
				$('#fifoModal').modal('show');
				$('#lotno').focus();
				itemHistory();
			});

			//Barcoding item using barcode scanner
			$('#hd_barcode').on('change', function(e){
				if (checkIfInPO($('#hd_barcode').val(),$('#ponosaki').val()) == true) {
					var item = $('#hd_barcode').val();
					var item_desc = $('.select_item').attr('data-item_desc');
					var req_qty = $('.select_item').attr('data-req_qty');
					var schedretdate = $('.select_item').attr('data-schedretdate');
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
				} else {
					failedMsg('This Item code is not available in this P.O.');
					$('#hd_barcode').val('');
					$('#hd_barcode').focus();
				}

			});

			$('#lotno').on('change', function() {
				if (checkInFIFO($('#partcode').val(),$(this).val()) == true) {
					$('#fifoModal').modal('hide');
				} else {
					failedMsg('This Lot No is not available in this Item code');
					$(this).val('');
				}

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
					fifoid: $('#fifoid').val(),
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

			$('#btn_fiforeason').on('click', function() {
				var item = $('#fritem').val();
				var lotno = $('#frlotno').val();
				var qty = $('#frqty').val();
				var id = $('#frid').val();
				var issuanceno = $('#issuancenosaki').val();
				var reason = $('#fiforeason').val();

				if (reason == '') {
					failedmsg('Please specify your reason for using this Lot Number.');
				} else {
					saveFifoReason(item,lotno,qty,id,issuanceno,reason);
				}
			});

			$('#tblfifoAdd').on('click', '.btn_select_lot', function() {
				if ($(this).attr('data-rowcount') != 1) {
					$('#frlotno').val($(this).attr('data-lotno'));
					$('#frqty').val($(this).attr('data-qty'));
					$('#frid').val($(this).attr('data-id'));
					$('#fritem').val($('#partcode').val());
		            $('#fifoReasonModal').modal('show');
				} else {
					$('#lotno').val($(this).attr('data-lotno'));
					$('#fifoid').val($(this).attr('data-id'));
					$('#issueqty').val($(this).attr('data-qty'));
					if ($('#lotno').val() != '') {
						$('#fifoModal').modal('hide');
					}
				}
			});

			$('#btn_reasonlogs').on('click', function() {
				window.location.href = "<?php echo e(url('/wbssakireasonexcel')); ?>" + "?issuanceno="+$('#issuancenosaki').val();
			});

			$('#btn_print_excel').on('click',function(){
				var issuanceno = $('#issuancenosaki').val();
				var partcode = $('#partcode').val();

				var url = "<?php echo e(url('/sakiExportToExcel?issuanceno=')); ?>" + issuanceno + "&partcode=" + partcode;
				window.location.href = url;

			});
		});

		function saveFifoReason(item,lotno,qty,id,issuanceno,reason) {
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				item: item,
				lotno: lotno,
				issuanceno: issuanceno,
				reason: reason,
			};

			$.ajax({
				url: '/wbssakififoreason',
				type: 'POST',
				dataType: 'JSON',
				data: data
			}).done( function(data, textStatus, jqXHR) {
				if (data.return_status == 'success') {
					console.log(data);
					$('#lotnoiss').val(lotno);
					$('#qtyiss').val(qty);
					$('#fifoid').val(id);

					$('#editlotnoiss').val(lotno);
					$('#editqtyiss').val(qty);
					$('#fifoidedit').val(id);

					$('#fifoReasonModal').modal('hide');
				} else {
					failedmsg('Requesting Failed.');
				}

			}).fail( function(data, textStatus, jqXHR) {
				failedmsg("There was an error while processing.");
			});
		}

		function searchPO(url,data) {
			$('#loading').modal('show');
			$('#hd_barcode').focus();

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
				if (data != null) {
					valuesOfInfo(data);
					valuesOfDetails(data);
					itemHistory();
				}

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
									'<td style="width: 12.5%">'+x.issuance_no+'</td>'+
									'<td style="width: 12.5%">'+x.issued_qty+'</td>'+
									'<td style="width: 12.5%">'+x.req_qty+'</td>'+
									'<td style="width: 12.5%">'+x.return_qty+'</td>'+
									'<td style="width: 12.5%">'+x.lot_no+'</td>'+
									'<td style="width: 12.5%">'+x.pair_no+'</td>'+
									'<td style="width: 12.5%">'+x.remarks+'</td>'+
									'<td style="width: 12.5%">'+
										'<a href="javascript:;" class="btn btn-sm grey-gallery brcodebtn" data-id="'+x.id+'">'+
											'<i class="fa fa-barcode"></i></a>'+
									'</td>'
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

			$('#brsense').val('edit');

			$('#hd_barcode').focus();
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
			//$('#loading').modal('show');
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
				//$('#loading').modal('hide');
				console.log(data);
				if (data == null) {
					failedMsg("There's no data found.");
				} else {
					valuesOfInfo(data);
					valuesOfDetails(data);
					itemHistory();
				}
			}).fail( function(data,textStatus,jqXHR) {
				//$('#loading').modal('hide');
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

					    // if(rqqty >= iqty)
					    // {
					    	$("#retqty").val(iqty - rqqty);
					  //   }
					  //   else
					  //   {
							// $.alert('Issued quantity must not be greater than required quantity',
							// {
							// 	position:['center',[-0.40,0]],
							// 	type	:'error',
							// 	closeTime:2000,
							// 	autoClose:true,
							// 	id		:'alert_suc'
							// });
					  //   }
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
			    	$("#retqty").val(iqty - rqqty);
			    }
			    else
			    {
			    	$("#retqty").val(iqty - rqqty);
					// $.alert('Issued quantity must not be greater than required quantity',
					// {
					// 	position:['center',[-0.40,0]],
					// 	type	:'error',
					// 	closeTime:2000,
					// 	autoClose:true,
					// 	id		:'alert_suc'
					// });
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
				"autoclose":true
			});//"setDate":newDate(),
		});

		function generateSiReport()
		{
			window.open("<?php echo e(url('/wbssi-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
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
	     		var cnt = 1;
	     		$.each(data, function(i, x) {
	     			tblfifoAdd = '<tr>'+
	     							'<td style="width: 9.66%">'+
	     								'<a href="javascript:;" class="btn btn-primary btn_select_lot btn-sm" data-id="'+x.id+'" '+
	     								'data-rowcount="'+cnt+'" data-lotno="'+x.lot_no+'" data-qty="'+x.qty+'">'+
	     									'<i class="fa fa-pencil"></i>'+
	     								'</a>'+
	     							'</td>'+
	                                '<td style="width: 16.66%">'+x.item+'</td>'+
	                                '<td style="width: 24.66%">'+x.item_desc+'</td>'+
	                                '<td style="width: 15.66%">'+x.qty+'</td>'+
	                                '<td style="width: 16.66%">'+x.lot_no+'</td>'+
	                                '<td style="width: 16.66%">'+x.received_date+'</td>'+
	                            '</tr>';

	        		table.append(tblfifoAdd);
	        		cnt++;
	     		});
	     	}).fail(function(data) {
	     	});
	    }

	    function checkIfInPO(item,po) {
	    	var token = "<?php echo e(Session::token()); ?>";
	    	var data = {
	    		_token:token,
	    		item:item,
	    		po:po,
	    	};

	    	$.ajax({
	    		url:'/wbssi-checkinpo',
	    		type:'get',
	    		dataType:'JSON',
	    		data:data,
	    	}).done( function(data,txtStatus) {
	    		if (data > 0) {
	    			return true;
	    		} else {
	    			return false;
	    		}
	    	}).fail( function(data,txtStatus) {
	    		alert('error');
	    	});
	    }

	    function checkInFIFO(item,lot) {
	    	var token = "<?php echo e(Session::token()); ?>";
	    	var data = {
	    		_token:token,
	    		item:item,
	    		lot:lot,
	    	};

	    	$.ajax({
	    		url:'/wbssi-checkinfifo',
	    		type:'get',
	    		dataType:'JSON',
	    		data:data,
	    	}).done( function(data,txtStatus) {
	    		if (data > 0) {
	    			return true;
	    		} else {
	    			return false;
	    		}
	    	}).fail( function(data,txtStatus) {
	    		alert('error');
	    	});
	    }

	    $('#tbl_history').on('click', '.brcodebtn',function() {
	    	var id = $(this).attr('data-id');

	    	if (isOnMobile() == true) {
	    		printBRcode(id);
	    	} else {
	    		$('#msg').modal('show');
				$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Notice!')
				$('#err_msg').html('Please use mobile device to directly print barcodes.');
	    		printBRcode(id);
	    	}
	    });

	    function printBRcode(id) {
			window.location.href="/wbssaki-brprint?id="+id;
		}

		function isOnMobile() {
			var isMobile = false; //initiate as false
			// device detection
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

			return isMobile;
		}
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>