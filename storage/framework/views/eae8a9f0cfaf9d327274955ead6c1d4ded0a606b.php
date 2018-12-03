<?php $__env->startSection('title'); ?>
	QC Database | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
	<style type="text/css">

    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_QCDB')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
							<div class="portlet-body">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="portlet box grey-gallery" >
                        							<div class="portlet-title">
                        								<div class="caption">
                        									<i class="fa fa-search"></i> IQC Inspection
                        								</div>
                        							</div>
                        							<div class="portlet-body">
                        								<br>
                        								<div class="row col-sm-offset-4">
															<div class="col-sm-3">
																<a href="javascript:;" class="btn green btn-block" id="btn_iqcresult">
																	<i class="fa fa-search"></i> Inspection
																</a>
															</div>

															<div class="col-sm-3">
																<a href="javascript:;" class="btn green btn-block" id="btn_requali">
																	<i class="fa fa-history"></i> Re-qualification
																</a>
															</div>
														</div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-hover table-bordered table-striped" id="iqcdatatable">
                                                                    <thead>
                                                                        <tr>
                                                                        	<td class="table-checkbox" style="width: 5%">
                                                                                <input type="checkbox" class="group-checkable iqc_checkall" />
                                                                            </td>
                                                                            <td></td>
                                                                            <td>No.</td>
                                                                            <td>Month</td>
                                                                            <td>Inspection Date</td>
                                                                            <td>Inspection Time</td>
                                                                            <td>Application Ctrl No.</td>
                                                                            <td>FY#</td>
                                                                            <td>WW#</td>
                                                                            <td>Sub</td>
                                                                            <td>Part Code</td>
                                                                            <td>Part Name</td>
                                                                            <td>Supplier</td>
                                                                            <td>Lot No.</td>
                                                                            <td>AQL</td>
																			<td>Judgement</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tblforiqcinspection">
	                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <a href="javascript:;" class="btn grey-gallery" id="btn_groupby">
                                                    <i class="fa fa-group"></i> Group By
                                                </a>
                                                <button type="button" class="btn red" id="btn_delete">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                                <a href="javascript:;" class="btn purple" id="btn_search">
                                                    <i class="fa fa-search"></i> Search
                                                </a>
												<a href="javascript:;" class="btn yellow-gold" id="btn_pdf">
                                                    <i class="fa fa-file-text-o"></i> Export to Pdf
                                                </a>
                                                <a href="javascript:;" class="btn green-jungle" id="btn_excel">
                                                    <i class="fa fa-file-text-o"></i> Export to Excel
                                                </a>

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

	<!-- IQC RESULT MODAL -->
	<div id="IQCresultModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery modal-xl">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 class="modal-title">IQC Inspection Result</h4>
				</div>
				<form class=form-horizontal>
					 <div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Invoice No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clear" id="invoice_no" name="invoice_no">
										<input type="hidden" class="form-control input-sm clear" id="iqc_result_id" name="iqc_result_id">
										<div id="er_invoice_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-9">
										<!-- <input type="text" class="form-control required input-sm clear" id="partcode" name="partcode"> -->
                                        <input type="text" id="partcode" name="partcode" class="form-control required input-sm clearselect" <?php echo($state);?>>
										<!-- <select class="form-control required select2me input-sm clear" id="partcode" name="partcode">
										</select> -->
										<div id="er_partcode"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Name</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="partname" name="partname" readonly>
										<div id="er_partname"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Supplier</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="supplier" name="supplier" >
										<div id="er_supplier"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Application Date</label>
									<div class="col-sm-9">
										<input class="form-control input-sm clear" type="text" name="app_date" id="app_date" value="<?php echo e(date('m/d/Y')); ?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Application Time</label>
									<div class="col-sm-9">
										<input type="text" data-format="h:m A" class="form-control input-sm clear" name="app_time" id="app_time" value="<?php echo e(date('h:i A')); ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Application Ctrl No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clear" id="app_no" name="app_no">
										<div id="er_app_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot No.</label>
									<div class="col-sm-9">
										<input type="text" name="lot_no" id="lot_no" class="form-control required input-sm lot_no clearselect">
										<!-- </select> -->
										<div id="er_lot_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Quantity</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="lot_qty" name="lot_qty" readonly>
										<div id="er_lot_qty"></div>
									</div>
								</div>
							</div>

						</div>

						<hr>

						<div class="row">
							<div class="col-sm-12">
								<strong>Sampling Plan</strong>
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Type of Inspection</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick" name="type_of_inspection" id="type_of_inspection">
										<div id="er_type_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Severity of Inspection</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick" name="severity_of_inspection" id="severity_of_inspection">
										<div id="er_severity_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspection Level</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick" name="inspection_lvl" id="inspection_lvl">
										<div id="er_inspection_lvl"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">AQL</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick" name="aql" id="aql">
										<div id="er_aql"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Accept</label>
									<div class="col-sm-9">
										<input type="number" min="0" max="1" class="form-control input-sm clear" id="accept" name="accept">
										<div id="er_accept"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Reject</label>
									<div class="col-sm-9">
										<input type="number" min="0" max="1" class="form-control input-sm clear" id="reject" name="reject">
										<div id="er_reject"></div>
									</div>
								</div>
							</div>

						</div>

						<hr>

						<div class="row">
							<div class="col-sm-12">
								<strong>Visual Inspection</strong>
							</div>
						</div>


						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Date Inspected</label>
									<div class="col-sm-9">
										<input class="form-control required input-sm clear date-picker" type="text" name="date_inspected" id="date_inspected" data-date-format='yyyy-mm-dd'/>
										<div id="er_date_ispected"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">WW#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear" id="ww" name="ww" readonly>
										<div id="er_ww"></div>
									</div>
									<label class="control-label col-sm-3">FY#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear" id="fy" name="fy" readonly>
										<div id="er_fy"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Time Inspected</label>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control required input-sm timepicker timepicker-no-seconds" name="time_ins_from" id="time_ins_from"/>
										<div id="er_time_ins_from"></div>
									</div>
									<div class="col-sm-1"></div>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control required input-sm timepicker timepicker-no-seconds" name="time_ins_to" id="time_ins_to"/>
										<div id="er_time_ins_to"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Shift</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick" name="shift" id="shift">
										<div id="er_shift"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspector</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clear" id="inspector" name="inspector">
										<div id="er_inspector"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Submission</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick" name="submission" id="submission">
										<div id="er_submission"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Judgement</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="judgement" name="judgement" readonly>
										<div id="er_judgement"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label col-sm-3">Lot Inspected</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clear" id="lot_inspected" name="lot_inspected">
										<div id="er_lot_inspected"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Accepted</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clear" id="lot_accepted" name="lot_accepted">
										<div id="er_lot_accepted"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Sample Size</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="sample_size" name="sample_size" readonly>
										<div id="er_sample_size"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="no_defects_label">No. of Defectives</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="no_of_defects" name="no_of_defects">
										<div id="er_no_of_defects"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Remarks</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="remarks" name="remarks">
										<input type="hidden" class="form-control input-sm clear" id="inspectionstatus" name="inspectionstatus">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="mode_defects_label">Mode of Defects</label>
									<div class="col-sm-4">
										<button type="button" class="btn blue btn_mod_ins" id="btn_mod_ins">
                                            <i class="fa fa-plus-circle"></i> Add Mode of Defects
                                        </button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<input type="hidden" name="save_status" id="save_status">
									</div>
								</div>
							</div>

						</div>

					</div>
					<div class="modal-footer">
						<button type="button" onclick="javascript:saveInspection();" class="btn btn-success" id="btn_savemodal"><i class="fa fa-floppy-disk-o"></i>Save</button>
						<button type="button" class="btn grey-gallery" id="btn_clearmodal"><i class="fa fa-eraser"></i>Clear</button>
						<a href="javascript:;" data-dismiss="modal"  class="btn btn-danger btn_backModal"><i class="fa fa-reply"></i>Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- REQUALI MODAL -->
	<div id="ReQualiModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery modal-xl">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 class="modal-title">Re-qualification</h4>
				</div>
				<form class=form-horizontal>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="scroller" style="height:200px">
									<table class="table table-striped table-hover table-responsive table-bordered" id="tblrealification">
										<thead>
											<tr>
												<td class="table-checkbox" style="width: 2%">
                                                    <input type="checkbox" class="group-checkable checkAllitemsrq" />
                                                </td>
												<td></td>
												<td>Ctrl No.</td>
												<td>Part Code</td>
												<td>Part Name</td>
												<td>Lot No.</td>
												<td>Application Date</td>
												<td>Application Time</td>
												<td>Application Ctrl No.</td>
											</tr>
										</thead>
										<tbody id="rq_inspection_body">
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Ctrl No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm" id="ctrl_no_rq" name="ctrl_no_rq">
										<div id="er_ctrl_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm clear" id="partcode_rq" name="partcode_rq">
										<span id="er_partcode_rq" style="color:red"></span>
										<input type="hidden" class="form-control input-sm clear" id="id_rq" name="id_rq" readonly>
										<input type="hidden" class="form-control input-sm clear" id="save_status_rq" name="save_status_rq" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Name</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="partname_rq" name="partname_rq" readonly>
										<div id="er_partname_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Supplier</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="supplier_rq" name="supplier_rq" readonly>
										<div id="er_supplier_rq"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Application Ctrl No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm clear" id="app_no_rq" name="app_no_rq">
										<span id="er_app_no_rq" style="color:red"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Application Date</label>
									<div class="col-sm-9">
										<input class="form-control input-sm clear date-picker" type="text" value="<?php echo e(date('m/d/Y')); ?>" name="app_date_rq" id="app_date_rq" readonly />

									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Application Time</label>
									<div class="col-sm-9">
										<input type="text" data-format="hh:mm A" class="form-control input-sm clear clockface_1" value="<?php echo e(date('h:i A')); ?>" name="app_time_rq" id="app_time_rq" readonly />

									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot No.</label>
									<div class="col-sm-9">
										<input type="text" name="lot_no_rq" id="lot_no_rq" class="form-control requiredRequali input-sm lot_no_rq">
										<div id="er_lot_no_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Quantity</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="lot_qty_rq" name="lot_qty_rq" readonly>
										<div id="er_lot_qty_rq"></div>
									</div>
								</div>
							</div>

						</div>

						<hr>

						<div class="row">
							<div class="col-sm-12">
								<strong>Visual Inspection</strong>
							</div>
						</div>


						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Date Inspected</label>
									<div class="col-sm-9">
										<input class="form-control requiredRequali input-sm clear date-picker" type="text" name="date_ispected_rq" id="date_ispected_rq"/>
										<div id="er_date_ispected_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">WW#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear" id="ww_rq" name="ww_rq" readonly>
										<div id="er_ww_rq"></div>
									</div>
									<label class="control-label col-sm-3">FY#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear" id="fy_rq" name="fy_rq" readonly>
										<div id="qr_fy_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Time Inspected</label>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control requiredRequali input-sm clear clockface_1" name="time_ins_from_rq" id="time_ins_from_rq"/>
										<div id="er_time_ins_from_rq"></div>
									</div>
									<div class="col-sm-1"></div>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control requiredRequali input-sm clear clockface_1" name="time_ins_to_rq" id="time_ins_to_rq"/>
										<div id="er_time_ins_to_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Shift</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm clear show-tick" name="shift_rq" id="shift_rq">
										<div id="er_shift_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspector</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm" name="inspector_rq" id="inspector_rq"/>
										<div id="er_inspector_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Submission</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm clear show-tick" name="submission_rq" id="submission_rq">
										<div id="er_submission_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Judgement</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm clear" id="judgement_rq" name="judgement_rq">
										<div id="er_judgement_rq"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Inspected</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm clear" id="lot_inspected_rq" name="lot_inspected_rq">
										<div id="er_lot_inspected_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Accepted</label>
									<div class="col-sm-9">
										<input type="text" class="form-control requiredRequali input-sm clear" id="lot_accepted_rq" name="lot_accepted_rq">
										<div id="er_lot_accepted_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="no_defects_label_rq">No. of Defectives</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="no_of_defects_rq" name="no_of_defects_rq">
										<div id="er_no_of_defects"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Remarks</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="remarks_rq" name="remarks_rq">
										<input type="hidden" class="form-control input-sm clear" id="status_rq" name="status_rq">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="mode_defects_label_rq">Mode of Defects</label>
									<div class="col-sm-4">
										<button type="button" class="btn blue btn_mod_rq" id="btn_mod_rq">
                                            <i class="fa fa-plus-circle"></i> Add Mode of Defects
                                        </button>
									</div>
								</div>
							</div>

						</div>


					</div>
					<div class="modal-footer">
						<button type="button" onclick="javascript:saveRequalification();" class="btn btn-success" id="btn_savemodal_rq"><i class="fa fa-floppy-disk-o"></i>Save</button>
						<button type="button" id="btn_deleteRequali" class="btn btn-success red"><i class="fa fa-trash"></i>Delete</button>
						<a href="javascript:;" class="btn grey-gallery btn_clearModal" id="btn_clearmodal_rq"><i class="fa fa-eraser"></i>Clear</a>
						<a href="javascript:;" data-dismiss="modal" id="btn_back_rq" class="btn btn-danger btn_backModal"><i class="fa fa-reply"></i>Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODE OF DEFECTS -->
	<div id="mod_inspectionModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 class="modal-title">Mode of Defect</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-3">Mode of Defect</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm show-tick" name="mod_inspection" id="mod_inspection">
										<div id="er_mod"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">Quantity</label>
									<div class="col-sm-9">
										<input type="text" id="qty_inspection" name="qty_inspection" class="form-control input-sm">
										<input type="hidden" id="status_inspection" name="status_inspection" class="form-control input-sm">
										<input type="hidden" id="id_inspection" name="id_inspection" class="form-control input-sm">
										<div id="er_qty"></div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<button type="button" id="bt_save_modeofdefectsinspection" class="btn btn-sm green pull-right">Save</button>
										<button type="button" id="bt_delete_modeofdefectsinspection" class="btn btn-sm red pull-right">Delete</button>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-bordered table-striped" id="tbl_modeofdefect">
										<thead>
											<tr>
												<td class="table-checkbox" style="width: 5%">
                                                    <input type="checkbox" class="group-checkable checkAllitemsinspection" />
                                                </td>
                                                <td></td>
												<td>#</td>
												<td>Mode of Defects</td>
												<td>Quantity</td>
											</tr>
										</thead>
										<tbody id="tblformodinspection">
                                        	<!-- table records here -->
                                        </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-danger" id=inspectionmod_close>Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODE OF DEFECTS CH3CKL3V3L -->
	<div id="mod_checklevelModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 class="modal-title">Mode of Defect</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-3">Mode of Defect</label>
									<div class="col-sm-9">
										<select class="form-control input-sm show-tick" name="mod_checklevel" id="mod_checklevel">
											<option value=""></option>
										</select>
										<div id="er_modcl"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">Quantity</label>
									<div class="col-sm-9">
										<input type="text" id="qty_checklevel" name="qty_checklevel" class="form-control input-sm">
										<input type="hidden" id="status_checklevel" name="status_checklevel" class="form-control input-sm">
										<input type="hidden" id="id_checklevel" name="id_checklevel" class="form-control input-sm">
										<div id="er_qtycl"></div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<button type="button" onclick="javascript:checklevel_save();" id="btn_add_mod" class="btn btn-sm green pull-right">Save</button>
										<button type="button" onclick="javascript:deleteAllcheckedchecklevel();" id="" class="btn btn-sm red pull-right">Delete</button>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-bordered table-striped" id="tbl_modeofdefect">
										<thead>
											<tr>
												<td class="table-checkbox" style="width: 5%">
                                                    <input type="checkbox" class="group-checkable checkAllitemschecklevel" />
                                                </td>
                                                <td></td>
												<td>#</td>
												<td>Mode of Defects</td>
												<td>Quantity</td>
											</tr>
										</thead>
										<tbody id="tblformodchecklevel">
                                        	<!-- table records here -->
                                        </tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" id=checklabelmod_close class="btn btn-danger">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODE OF DEFECTS REQUEALIFICATION -->
	<div id="mod_requalificationModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 class="modal-title">Mode of Defect</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-3">Mode of Defect</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm show-tick" name="mod_rq" id="mod_rq">
										<div id="er_modrq"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">Quantity</label>
									<div class="col-sm-9">
										<input type="text" id="qty_rq" name="qty_rq" class="form-control input-sm">
										<input type="hidden" id="status_requalification" name="status_requalification" class="form-control input-sm">
										<input type="hidden" id="id_requalification" name="id_requalification" class="form-control input-sm">
										<div id="er_qtyrq"></div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<button type="button" onclick="javascript:saveModeOfDefectsRequali();" id="btn_add_mod" class="btn btn-sm green pull-right">Save</button>
										<button type="button" id="btn_deletemodrq" class="btn btn-sm red pull-right">Delete</button>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-bordered table-striped" id="tbl_modeofdefect">
										<thead>
											<tr>
												<td class="table-checkbox" style="width: 5%">
                                                    <input type="checkbox" class="group-checkable checkAllitemsrequalification" />
                                                </td>
                                                <td></td>
												<td>#</td>
												<td>Mode of Defects</td>
												<td>Quantity</td>
											</tr>
										</thead>
										<tbody id="tblformodrequalification">
                                        	<!-- table records here -->
                                        </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" id=rqmod_close class="btn btn-danger">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- GROUP BY MODAL -->
	<div id="GroupByModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-lg gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Group Items By:</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<?php echo csrf_field(); ?>

						<div class="form-group">
							<label class="control-label col-sm-2">Date From</label>
							<div class="col-sm-5">
								<input type="text" class="form-control date-picker input-sm " id="groupby_datefrom" name="groupby_datefrom" data-date-format='yyyy-mm-dd'>
                            </div>
                            <div class="col-sm-5">
                                    <input type="text" class="form-control date-picker input-sm " id="groupby_dateto" name="groupby_dateto" data-date-format='yyyy-mm-dd'>
                            </div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Group #1</label>
							<div class="col-sm-5">
								<select class="form-control select2me input-sm show-tick" name="group1" id="group1">
									<option value=""></option>
									<option value="app_no">Application Ctrl No</option>
									<option value="fy">FY</option>
									<option value="ww">WW</option>
									<option value="submission">Submission</option>
									<option value="partcode">Part Code</option>
									<option value="partname">Part Name</option>
									<option value="supplier">Supplier</option>
									<option value="aql">AQL</option>
								</select>
							</div>
							<div class="col-sm-5">
								<input type="text" class="form-control input-sm show-tick" name="group1content" id="group1content">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Group #2</label>
							<div class="col-sm-5">
								<select class="form-control select2me input-sm show-tick" name="group2" id="group2">
									<option value=""></option>
									<option value="app_no">Application Ctrl No</option>
									<option value="fy">FY</option>
									<option value="ww">WW</option>
									<option value="submission">Submission</option>
									<option value="partcode">Part Code</option>
									<option value="partname">Part Name</option>
									<option value="supplier">Supplier</option>
									<option value="aql">AQL</option>
								</select>
							</div>
							<div class="col-sm-5">
								<input type="text" class="form-control input-sm show-tick" name="group2content" id="group2content">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Group #3</label>
							<div class="col-sm-5">
								<select class="form-control select2me input-sm show-tick" name="group3" id="group3">
									<option value=""></option>
									<option value="app_no">Application Ctrl No</option>
									<option value="fy">FY</option>
									<option value="ww">WW</option>
									<option value="submission">Submission</option>
									<option value="partcode">Part Code</option>
									<option value="partname">Part Name</option>
									<option value="supplier">Supplier</option>
									<option value="aql">AQL</option>
								</select>
							</div>
							<div class="col-sm-5">
								<input type="text" class="form-control input-sm show-tick" name="group3content" id="group3content">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<div class="table-responsive">
									<table class="table table-hover table-bordered table-striped">
										<thead>
											<tr>
												<td></td>
												<td>Inspected</td>
												<td>Accept</td>
												<td>Reject</td>
												<td>Sample Size</td>
												<td>Qty / NG</td>
												<td>LAR</td>
												<td>LRR</td>
												<td>DPPM</td>
											</tr>
										</thead>
										<tbody id="tblforlarlrrdppm">
	                                    	<!-- table records here -->
	                                    </tbody>
									</table>
								</div>
							</div>
						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="btn_groupby_ok">OK</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
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
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm clear" id="search_partcode" name="search_partcode">
										<span id="search_partcode_error" style="color:red"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">From</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" data-date-format='yyyy-mm-dd' name="search_from" id="search_from"/>
										<!-- <div id="er_search_from"></div> -->
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">To</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" data-date-format='yyyy-mm-dd' name="search_to" id="search_to"/>
										<!-- <div id="er_search_to"></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btn_searchnow" class="btn btn-success">OK</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger" id="btn_search-close">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Empty FIELD SEARCH -->
	<div id="emptyModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Warning!</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label col-sm-10">Please search record/s first before you print reports</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- AJAX LOADER -->
	<div id="loading" class="modal fade" role="dialog" data-backdrop="static">
		 <div class="modal-dialog modal-sm gray-gallery">
			  <div class="modal-content ">
				   <div class="modal-body">
						<div class="row">
							 <div class="col-sm-2"></div>
							 <div class="col-sm-8">
								  <img src="assets/images/ajax-loader.gif" class="img-responsive">
							 </div>
							 <div class="col-sm-2"></div>
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
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
<script type="text/javascript">
    $(function() {
		var row = 10;
		getIQCInspection(row);

		$('#tblforiqcinspection').scroll(function() {
			if($('#tblforiqcinspection').scrollTop() + $('#tblforiqcinspection').height() >= $('#tblforiqcinspection').height()) {
				row = row+2;
				getIQCInspection(row);
			}
		});

		$('#rq_inspection_body').scroll(function() {
			if($('#rq_inspection_body').scrollTop() + $('#rq_inspection_body').height() >= $('#rq_inspection_body').height()) {
				row = row+2;
				getRequalification(row);
			}
		});

		// INSPECTION SIDE
		$('.timepicker-no-seconds').timepicker({
			autoclose: true,
			minuteStep: 5
		});

        $('#btn_iqcresult').on('click', function() {
			$('#partcode').prop('readonly',true);
			$('#lot_no').prop('readonly',true);

			getDropdowns();

			$('#no_defects_label').hide();
			$('#no_of_defects').hide();
			$('#mode_defects_label').hide();
			$('#btn_mod_ins').hide();

			$('#save_status').val('ADD');

			$('#IQCresultModal').modal('show');
        });

        $('#btn_groupby').on('click', function(){
            $('#GroupByModal').modal('show');
        });

        $('#btn_search').on('click', function(){
			getPartcodeSearch();
            $('#SearchModal').modal('show');
        });

		$('#btn_searchnow').on('click', function() {
			searchItemInspection();
		});

        $('#btn_pdf').on('click', function(){
        });
        $('#btn_excel').on('click', function(){
        });

        $('#invoice_no').on('change', function(){
            getItems();
        });

        $('#partcode').on('change', function(){
            getItemDetails();
        });

		$('#lot_no').on('change', function() {
			calculateLotQty($(this).select2('val'));
		});

		$('#severity_of_inspection').on('change', function() {
			samplingPlan();
		});

		$('#inspection_lvl').on('change', function() {
			samplingPlan();
		});

		$('#aql').on('change', function() {
			samplingPlan();
		});

		$('#time_ins_from').on('change', function() {
			getShift();
		});
		$('#time_ins_to').on('change', function() {
			getShift();
		});

		$('#btn_clearmodal').on('click', function() {
			clear();
		});

		$('#btn_mod_ins').on('click', function() {
			iqcdbgetmodeofdefectsinspection();
			$('#mod_inspectionModal').modal('show');
		});

		$('#bt_save_modeofdefectsinspection').on('click', function() {
			saveModeOfDefectsInspection();
		});

		$('#lot_accepted').on('change', function() {
			if ($(this).val() == 0) {
				$('#no_defects_label').show();
				$('#no_of_defects').show();
				$('#mode_defects_label').show();
				$('#btn_mod_ins').show();
				$('#judgement').val('Rejected');
			} else {
				$(this).val(1);
				$('#no_defects_label').hide();
				$('#no_of_defects').hide();
				$('#mode_defects_label').hide();
				$('#btn_mod_ins').hide();
				$('#judgement').val('Accepted');
			}
		});

		$('#tblformodinspection').on('click', '.modinspection_edititem',function() {
			var mod = $(this).attr('data-mod');
			var qty = $(this).attr('data-qty');
			var id = $(this).attr('data-id');

			$('#mod_inspection').select2('data',{
				id: mod,
				text:mod
			});
			$('#qty_inspection').val(qty);
			$('#id_inspection').val(id);
			$('#status_inspection').val('EDIT');
		});

		$('.checkAllitemsinspection').on('change', function(e) {
			$('input:checkbox.modinspection_checkitem').not(this).prop('checked', this.checked);
		});

		$('.iqc_checkall').on('change', function(e) {
			$('input:checkbox.iqc_checkitems').not(this).prop('checked', this.checked);
		});

		$('#tblforiqcinspection').on('click','.btn_editiqc',function() {
			getDropdowns();
			$('#invoice_no').prop('readonly',true);
			$('#invoice_no').val($(this).attr('data-invoice_no'));
			getItems();
			$('#partcode').val($(this).attr('data-partcode'));
			getItemDetails();

			$('#partname').val($(this).attr('data-partname'));
			$('#supplier').val($(this).attr('data-supplier'));
			$('#app_date').val($(this).attr('data-app_date'));
			$('#app_time').val($(this).attr('data-app_time'));
			$('#app_no').val($(this).attr('data-app_no'));
			$('#lot_no').val([$(this).attr('data-lot_no')]);
			$('#lot_qty').val($(this).attr('data-lot_qty'));
			$('#type_of_inspection').val([$(this).attr('data-type_of_inspection')]);
			$('#severity_of_inspection').val([$(this).attr('data-severity_of_inspection')]);
			$('#inspection_lvl').val([$(this).attr('data-inspection_lvl')]);
			$('#aql').val([$(this).attr('data-aql')]);
			$('#accept').val($(this).attr('data-accept'));
			$('#reject').val($(this).attr('data-reject'));
			$('#date_inspected').val($(this).attr('data-date_ispected'));
			$('#ww').val($(this).attr('data-ww'));
			$('#fy').val($(this).attr('data-fy'));
			$('#time_ins_from').val($(this).attr('data-time_ins_from'));
			$('#time_ins_to').val($(this).attr('data-time_ins_to'));
			$('#shift').val([$(this).attr('data-shift')]);
			$('#inspector').val($(this).attr('data-inspector'));
			$('#submission').val([$(this).attr('data-submission')]);
			$('#judgement').val($(this).attr('data-judgement'));
			$('#lot_inspected').val($(this).attr('data-lot_inspected'));
			$('#lot_accepted').val($(this).attr('data-lot_accepted'));
			$('#sample_size').val($(this).attr('data-sample_size'));
			$('#no_of_defects').val($(this).attr('data-no_of_defects'));
			$('#remarks').val($(this).attr('data-remarks'));

			$('#no_defects_label').hide();
			$('#no_of_defects').hide();
			$('#mode_defects_label').hide();
			$('#btn_mod_ins').hide();

			$('#save_status').val('EDIT');
			$('#iqc_result_id').val($(this).attr('data-id'));

			$('#IQCresultModal').modal('show');
		});

		$('#bt_delete_modeofdefectsinspection').on('click', function() {
			var url = "<?php echo e(url('/iqcdbdeletemodeofdefects')); ?>";
			var token  = "<?php echo e(Session::token()); ?>";
			var data = {
				id: getAllChecked('.modinspection_checkitem'),
				_token: token
			}

			$.ajax({
				url: url,
				type: "POST",
				dataType: "JSON",
				data: data
			}).done( function(data,textStatus,jqXHR) {
				if (data.return_status == "success") {
					successMsg(data.msg);
				} else {
					failedMsg(data.msg);
				}
				iqcdbgetmodeofdefectsinspection();
			}).fail( function(data,textStatus,jqXHR) {
				failedMsg("There's some error while processing.");
			});
		});

		$('#btn_delete').on('click', function() {
			var url = "<?php echo e(url('/iqcdbdeleteinspection')); ?>";
			var token  = "<?php echo e(Session::token()); ?>";
			var data = {
				id: getAllChecked('.iqc_checkitems'),
				_token: token
			}

			$.ajax({
				url: url,
				type: "POST",
				dataType: "JSON",
				data: data
			}).done( function(data,textStatus,jqXHR) {
				if (data.return_status == "success") {
					successMsg(data.msg);
				} else {
					failedMsg(data.msg);
				}
				getIQCInspection(10);
			}).fail( function(data,textStatus,jqXHR) {
				failedMsg("There's some error while processing.");
			});
		});

		//REQUALIFICATION
		$('#btn_requali').on('click', function() {
			getItemsRequalification();
			getDropdownsRequali();
			$('#no_defects_label_rq').hide();
			$('#no_of_defects_rq').hide();
			$('#mode_defects_label_rq').hide();
			$('#btn_mod_rq').hide();
			$('#save_status_rq').val('ADD');

			getRequalification(5);

            $('#ReQualiModal').modal('show');
        });

		$('#partcode_rq').on('change', function() {
			getAppNo();
		});

		$('#app_no_rq').on('change', function() {
			getDetailsRequalification();
			getVisualInspectionRequalification();
		});

		$('#lot_no_rq').on('change', function() {
			calculateLotQtyRequalification($(this).select2('val'));
		});

		$('#btn_mod_rq').on('click', function() {
			$('#status_requalification').val('ADD');
			iqcdbgetmodeofdefectsRequali();
			$('#mod_requalificationModal').modal('show');
		});

		$('#lot_accepted_rq').on('change', function() {
			if ($(this).val() == 0) {
				$('#no_defects_label_rq').show();
				$('#no_of_defects_rq').show();
				$('#mode_defects_label_rq').show();
				$('#btn_mod_rq').show();
				$('#judgement_rq').val('Rejected');
			} else {
				$(this).val(1);
				$('#no_defects_label_rq').hide();
				$('#no_of_defects_rq').hide();
				$('#mode_defects_label_rq').hide();
				$('#btn_mod_rq').hide();

				$('#judgement_rq').val('Accepted');
			}
		});

		$('#rq_inspection_body').on('click', '.btn_editRequali',function() {
			$('#ctrl_no_rq').val($(this).attr('data-ctrl_no'));
			$('#partcode_rq').select2('val',$(this).attr('data-partcode'));
			getDropdownsRequali();
			getAppNo();

			$('#partname_rq').val($(this).attr('data-partname'));
			$('#supplier_rq').val($(this).attr('data-supplier'));
			$('#app_date_rq').val($(this).attr('data-app_date'));
			$('#app_time_rq').val($(this).attr('data-app_time'));
			$('#app_no_rq').val([$(this).attr('data-app_no')]);

			getDetailsRequalification();
			getVisualInspectionRequalification();

			$('#lot_no_rq').val([$(this).attr('data-lot_no')]);
			$('#lot_qty_rq').val($(this).attr('data-lot_qty'));

			$('#date_ispected_rq').val($(this).attr('data-date_ispected'));
			$('#ww_rq').val($(this).attr('data-ww'));
			$('#fy_rq').val($(this).attr('data-fy'));
			$('#time_ins_from_rq').val($(this).attr('data-time_ins_from'));
			$('#time_ins_to_rq').val($(this).attr('data-time_ins_to'));
			$('#shift_rq').val([$(this).attr('data-shift')]);
			$('#inspector_rq').val($(this).attr('data-inspector'));
			$('#submission_rq').val([$(this).attr('data-submission')]);
			$('#judgement_rq').val($(this).attr('data-judgement'));
			$('#lot_inspected_rq').val($(this).attr('data-lot_inspected'));
			$('#lot_accepted_rq').val($(this).attr('data-lot_accepted'));
			$('#no_of_defects_rq').val($(this).attr('data-no_of_defects'));
			$('#remarks_rq').val($(this).attr('data-remarks'));
			$('#id_rq').val($(this).attr('data-id'));

			$('#save_status_rq').val('EDIT');
		});

		$('.checkAllitemsrq').on('change', function(e) {
			$('input:checkbox.checitemrq').not(this).prop('checked', this.checked);
		});

		$('#btn_deleteRequali').on('click', function() {
			var url = "<?php echo e(url('/iqcdbdeleterequali')); ?>";
			var token  = "<?php echo e(Session::token()); ?>";
			var data = {
				id: getAllChecked('.checitemrq'),
				_token: token
			}

			$.ajax({
				url: url,
				type: "POST",
				dataType: "JSON",
				data: data
			}).done( function(data,textStatus,jqXHR) {
				if (data.return_status == "success") {
					successMsg(data.msg);
				} else {
					failedMsg(data.msg);
				}
				getRequalification(5);
			}).fail( function(data,textStatus,jqXHR) {
				failedMsg("There's some error while processing.");
			});
		});

		$('.checkAllitemsrequalification').on('change', function(e) {
			$('input:checkbox.modrq_checkitem').not(this).prop('checked', this.checked);
		});

		$('#btn_deletemodrq').on('click', function() {
			var url = "<?php echo e(url('/iqcdbdeletemodeofdefectsrequali')); ?>";
			var token  = "<?php echo e(Session::token()); ?>";
			var data = {
				id: getAllChecked('.modrq_checkitem'),
				_token: token
			}

			$.ajax({
				url: url,
				type: "POST",
				dataType: "JSON",
				data: data
			}).done( function(data,textStatus,jqXHR) {
				if (data.return_status == "success") {
					successMsg(data.msg);
				} else {
					failedMsg(data.msg);
				}
				iqcdbgetmodeofdefectsRequali();
			}).fail( function(data,textStatus,jqXHR) {
				failedMsg("There's some error while processing.");
			});
		});

		$('#tblformodrequalification').on('change', '.modrq_edititem', function() {
			var mod = $(this).attr('data-mod');
			var qty = $(this).attr('data-qty');
			var id = $(this).attr('data-id');

			$('#mod_rq').select2('data',{
				id: mod,
				text:mod
			});
			$('#qty_rq').val(qty);
			$('#id_requalification').val(id);
			$('#status_requalification').val('EDIT');
		});

		// GROUP BY
		$('#group1').on('change', function() {
			getGroupbyContents('#group1','#group1content');
		});

		$('#group2').on('change', function() {
			getGroupbyContents('#group2','#group2content');
		});

		$('#group3').on('change', function() {
			getGroupbyContents('#group3','#group3content');
		});

		$('#btn_groupby_ok').on('click', function() {
			groupByTable(
				$('#group1').val(),
				$('#group1content').val(),
				$('#group2').val(),
				$('#group2content').val(),
				$('#group3').val(),
				$('#group3content').val(),
				$('#groupby_datefrom').val(),
				$('#groupby_dateto').val());

			getInspectionBydate($('#groupby_datefrom').val(),
				$('#groupby_dateto').val())
		});

		// EXPORTS
		$('#btn_pdf').on('click', function() {
			if ($('#groupby_datefrom').val() != '' && $('#groupby_dateto').val() != '') {
				var url = "<?php echo e(url('/iqcprintreport?from=')); ?>" + $('#groupby_datefrom').val() + "&to=" + $('#groupby_dateto').val()+ "&field1=" + $('#group1').val()+
					"&content1=" + $('#group1content').val()+ "&field2=" + $('#group2').val()+ "&content2=" + $('#group2content').val()+
					"&field3=" +$('#group3').val()+ "&content3=" + $('#group3content').val();
				window.location.href= url;
			} else {
				failedMsg("Please provide a date coverage in 'group by' button.");
			}
			
		});
		$('#btn_excel').on('click', function() {
			if ($('#groupby_datefrom').val() != '' && $('#groupby_dateto').val() != '') {
				var url = "<?php echo e(url('/iqcprintreportexcel?from=')); ?>" + $('#groupby_datefrom').val() + "&to=" + $('#groupby_dateto').val()+ "&field1=" + $('#group1').val()+
					"&content1=" + $('#group1content').val()+ "&field2=" + $('#group2').val()+ "&content2=" + $('#group2content').val()+
					"&field3=" +$('#group3').val()+ "&content3=" + $('#group3content').val();
				window.location.href= url;
			} else {
				failedMsg("Please provide a date coverage in 'group by' button.");
			}
			
		});
    });

	// INSPECTION SIDE
	function getIQCInspection(row) {
		var tblforiqcinspection = '';
		$('#tblforiqcinspection').html('');
		var url = "<?php echo e(url('/iqcdbgetiqcdata')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			 _token: token,
			 row: row
		};

		$.ajax({
			 url: url,
			 type: "GET",
			 data: data,
		}).done( function(data, textStatus, jqXHR) {
			getIQCdataTable(data,tblforiqcinspection);
		}).fail( function(data, textStatus, jqXHR) {
			 failedMsg("There's some error while processing.");
		});
	}

	function getIQCdataTable(data,tblforiqcinspection) {
		var bg = '';
		var color = '#ffe9e9';
		var cnt = 1;
		$.each(data, function(i,x) {
			if (x.judgement == 'Rejected') {
				bg = '#f04646';
			}

			if (x.judgement == 'Accepted') {
				bg = '#009490';
			}
			tblforiqcinspection = '<tr>'+
										'<td>'+
											'<input type="checkbox" class="iqc_checkitems" value="'+x.id+'"/>'+
										'</td>'+
										'<td>'+
											'<a href="javascript:;" class="btn input-sm blue btn_editiqc" data-id="'+x.id+'" '+
												'data-invoice_no="'+x.invoice_no+'"'+
												'data-partcode="'+x.partcode+'"'+
												'data-partname="'+x.partname+'"'+
												'data-supplier="'+x.supplier+'"'+
												'data-app_date="'+x.app_date+'"'+
												'data-app_time="'+x.app_time+'"'+
												'data-app_no="'+x.app_no+'"'+
												'data-lot_no="'+x.lot_no+'"'+
												'data-lot_qty="'+x.lot_qty+'"'+
												'data-type_of_inspection="'+x.type_of_inspection+'"'+
												'data-severity_of_inspection="'+x.severity_of_inspection+'"'+
												'data-inspection_lvl="'+x.inspection_lvl+'"'+
												'data-aql="'+x.aql+'"'+
												'data-accept="'+x.accept+'"'+
												'data-reject="'+x.reject+'"'+
												'data-date_ispected="'+x.date_ispected+'"'+
												'data-ww="'+x.ww+'"'+
												'data-fy="'+x.fy+'"'+
												'data-time_ins_from="'+x.time_ins_from+'"'+
												'data-time_ins_to="'+x.time_ins_to+'"'+
												'data-shift="'+x.shift+'"'+
												'data-inspector="'+x.inspector+'"'+
												'data-submission="'+x.submission+'"'+
												'data-judgement="'+x.judgement+'"'+
												'data-lot_inspected="'+x.lot_inspected+'"'+
												'data-lot_accepted="'+x.lot_accepted+'"'+
												'data-sample_size="'+x.sample_size+'"'+
												'data-no_of_defects="'+x.no_of_defects+'"'+
												'data-remarks="'+x.remarks+'">'+
												'<i class="fa fa-edit"></i>'+
											'</a>'+
										'</td>'+
										'<td>'+cnt+'</td>'+
										'<td>'+getInspectionMonth(x.date_ispected)+'</td>'+
										'<td>'+x.date_ispected+'</td>'+
										'<td>'+x.time_ins_to+'</td>'+
										'<td>'+x.app_no+'</td>'+
										'<td>'+x.fy+'</td>'+
										'<td>'+x.ww+'</td>'+
										'<td>'+x.submission+'</td>'+
										'<td>'+x.partcode+'</td>'+
										'<td>'+x.partname+'</td>'+
										'<td>'+x.supplier+'</td>'+
										'<td>'+x.lot_no+'</td>'+
										'<td>'+x.aql+'</td>'+
										'<td style="background-color:'+bg+';">'+x.judgement+'</td>'+
									'</tr>';
			$('#tblforiqcinspection').append(tblforiqcinspection);
			cnt++;
		});
	}

	function saveInspection() {
		$('#loading').modal('show');
		if (requiredFields(':input.required') == true) {
			var url = "<?php echo e(url('/iqcsaveinspection')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				save_status: $('#save_status').val(),
				id: $('#iqc_result_id').val(),
				invoice_no: $('#invoice_no').val(),
				partcode: $('#partcode').val(),
				partname: $('#partname').val(),
				supplier: $('#supplier').val(),
				app_date: $('#app_date').val(),
				app_time: $('#app_time').val(),
				app_no: $('#app_no').val(),
				lot_no: $('#lot_no').val(),
				lot_qty: $('#lot_qty').val(),
				type_of_inspection: $('#type_of_inspection').val(),
				severity_of_inspection: $('#severity_of_inspection').val(),
				inspection_lvl: $('#inspection_lvl').val(),
				aql: $('#aql').val(),
				accept: $('#accept').val(),
				reject: $('#reject').val(),
				date_inspected: $('#date_inspected').val(),
				ww: $('#ww').val(),
				fy: $('#fy').val(),
				time_ins_from: $('#time_ins_from').val(),
				time_ins_to: $('#time_ins_to').val(),
				shift: $('#shift').val(),
				inspector: $('#inspector').val(),
				submission: $('#submission').val(),
				judgement: $('#judgement').val(),
				lot_inspected: $('#lot_inspected').val(),
				lot_accepted: $('#lot_accepted').val(),
				sample_size: $('#sample_size').val(),
				no_of_defects: $('#no_of_defects').val(),
				remarks: $('#remarks').val(),
			};

			$.ajax({
				url: url,
				type: "POST",
				dataType: "JSON",
				data: data
			}).done( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');

				if (data.return_status == 'success') {
					successMsg(data.msg);
					clear();
				}
				getIQCInspection(10);
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's some error while processing.");
			});
		} else {
			$('#loading').modal('hide');
			failedMsg("Please fill out all required fields.");
		}
	}

	function clear() {
		$('.clear').val('');
		$('.clearselect').select2('data', {
			id: '',
			text: ''
		})
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

    function getShift() {
		var url = "<?php echo e(url('/iqcshift')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			from: $('#time_ins_from').val(),
			to: $('#time_ins_to').val()
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data,textStatus,jqXHR) {
			$('#shift').select2('data',{
				 id: data,
				 text: data
			});
		}).fail(function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
    }

	function samplingPlan() {
		var url = "<?php echo e(url('/iqcsamplingplan')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			soi: $('#severity_of_inspection').val(),
			il: $('#inspection_lvl').val(),
			aql: $('#aql').val(),
			lot_qty: $('#lot_qty').val()
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data, textStatus, jqXHR){
			$('#accept').val(data.accept);
			$('#reject').val(data.reject);
			$('#sample_size').val(data.sample_size);
			$('#date_inspected').val(data.date_inspected);
			$('#lot_inspected').val(1);
			$('#inspector').val(data.inspector);
			$('#ww').val(data.workweek);
			getFiscalYear();
		}).fail(function(data, textStatus, jqXHR){
			failedMsg("There's some error while processing.");
		});
	}

	function getDropdowns() {
		var url = "<?php echo e(url('/iqcgetdropdowns')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data,textStatus,jqXHR) {
			$('#type_of_inspection').select2({
				data:data.tofinspection,
				placeholder: "Select Type of Inspection"
			});
			$('#severity_of_inspection').select2({
				data:data.sofinspection,
				placeholder: "Select Severity of Inspection"
			});
			$('#inspection_lvl').select2({
				data:data.inspectionlvl,
				placeholder: "Select Inspection Level"
			});
			$('#aql').select2({
				data:data.aql,
				placeholder: "Select AQL"
			});
			$('#shift').select2({
				data: data.shift,
				placeholder: "Select Shift"
			});
			$('#submission').select2({
				data: data.submission,
				placeholder: "Select Submission"
			});
			$('#mod_inspection').select2({
				data: data.mod,
				placeholder: "Select Mode of Defects"
			});
		}).fail(function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

    function getFiscalYear() {
        var date = new Date();
        var month = date.getMonth();
        var year = date.getFullYear();

        if (month < 3) {
            year = year - 1;
        }

        $('#fy').val(year);
    }

    function getItems() {
         var url = "<?php echo e(url('/iqcdbgetitems')); ?>";
         var token = "<?php echo e(Session::token()); ?>";
         var data = {
              _token: token,
              invoiceno: $('#invoice_no').val()
         };

         $.ajax({
              url: url,
              type: "GET",
              data: data,
         }).done( function(data, textStatus, jqXHR) {
			 $('#partcode').prop('readonly',false);
			 $('#lot_no').prop('readonly',false);
			 $('#partcode').select2({
				 data: data,
				 placeholder: "Select an Item"
			 });
         }).fail( function(data, textStatus, jqXHR) {
              failedMsg("There's some error while processing.");
         });
    }

    function getItemDetails() {
        var url = "<?php echo e(url('/iqcdbgetitemdetails')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
             _token: token,
             invoiceno: $('#invoice_no').val(),
             item: $('#partcode').val()
        };

        $.ajax({
             url: url,
             type: "GET",
             data: data,
        }).done( function(data, textStatus, jqXHR) {
			var details = data.details;
			$('#partname').val(details.item_desc);
			$('#supplier').val(details.supplier);
			$('#app_date').val(details.app_date);
			$('#app_time').val(details.app_time);
			$('#app_no').val(details.receive_no);

			$('#lot_no').select2({
				tags: true,
				data: data.lot,
				placeholder: 'Select Lot Number'
			});
        }).fail( function(data, textStatus, jqXHR) {
             failedMsg("There's some error while processing.");
        });
    }

	function calculateLotQty(lotno) {
		var url = "<?php echo e(url('/iqccalculatelotqty')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token:token,
			invoiceno: $('#invoice_no').val(),
			item: $('#partcode').val(),
			lot_no: lotno
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done( function(data, textStatus, jqXHR) {
			$('#lot_qty').val(data);
		}).fail( function(data, textStatus, jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function saveModeOfDefectsInspection() {
		var url = "<?php echo e(url('/iqcdbsavemodeofdefects')); ?>";
		var token  = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			invoiceno: $('#invoice_no').val(),
			item: $('#partcode').val(),
			mod: $('#mod_inspection').val(),
			qty: $('#qty_inspection').val(),
			status: $('#status_inspection').val(),
			id: $('#id_inspection').val()
		};

		$.ajax({
			url: url,
			type: "POST",
			dataType: "JSON",
			data: data
		}).done( function(data,textStatus,jqXHR) {
			if (data.return_status == "success") {
				successMsg(data.msg);
			} else {
				failedMsg(data.msg);
			}
			iqcdbgetmodeofdefectsinspection();
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function getModinspectionlist(data) {
		var cnt = 1;
		var no_of_defectives = 0;
		$.each(data, function(i,x) {
			tblformodinspection = '<tr>'+
										'<td>'+
											'<input type="checkbox" class="modinspection_checkitem checkboxes" value="'+x.id+'">'+
										'</td>'+
										'<td>'+
											'<a href="javascript:;" class="btn blue input-sm modinspection_edititem" data-mod="'+x.mod+'" data-qty="'+x.qty+'" data-id="'+x.id+'">'+
												'<i class="fa fa-edit"></i>'+
											'</a>'+
										'</td>'+
										'<td>'+cnt+'</td>'+
										'<td>'+x.mod+'</td>'+
										'<td>'+x.qty+'</td>'+
									'</tr>';
			cnt++;
			no_of_defectives = parseFloat(no_of_defectives) + parseFloat(x.qty);
			$('#tblformodinspection').append(tblformodinspection);
		});
		$('#no_of_defects').val(no_of_defectives);
		$('#status_inspection').val('ADD');
	}

	function iqcdbgetmodeofdefectsinspection() {
		$('#tblformodinspection').html('');
		var tblformodinspection = '';
		var url = "<?php echo e(url('/iqcdbgetmodeofdefectsinspection')); ?>";
		var token  = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			invoiceno: $('#invoice_no').val(),
			item: $('#partcode').val(),
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done( function(data,textStatus,jqXHR) {
			getModinspectionlist(data);
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function getAllChecked(element) {
		var chkArray = [];

		$(element+":checked").each(function() {
			chkArray.push($(this).val());
		});

		return chkArray;
	}

	function getInspectionMonth(date) {
		var monthNames = ["January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
		];

		var d = new Date(date);
		return monthNames[d.getMonth()];
	}

	function requiredFields(requiredClass) {
		var reqlength = $(requiredClass).length;
	    var value = $(requiredClass).filter(function () {
	        return this.value != '';
	    });

	    if (value.length !== reqlength) {
	        return false;
	    } else {
			console.log('true');
	        return true;
	    }
	}

	//search button
	function getPartcodeSearch() {
		var url = "<?php echo e(url('/iqcdbgetitemsearch')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			 _token: token,
		};

		$.ajax({
			 url: url,
			 type: "GET",
			 data: data,
		}).done( function(data, textStatus, jqXHR) {
			if (data == null || data == "") {
				$('#search_partcode_error').html("No Inspections Available");
			} else {
				$('#search_partcode').select2({
	   				 data: data,
	   				 placeholder: "Select an Item"
	   			 });
			}
		}).fail( function(data, textStatus, jqXHR) {
			 failedMsg("There's some error while processing.");
		});
	}

	function searchItemInspection() {
		var tblforiqcinspection = '';
		$('#tblforiqcinspection').html('');
		var url = "<?php echo e(url('/iqcdbsearchinspection')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			item: $('#search_partcode').val(),
			from: $('#search_from').val(),
			to: $('#search_to').val()
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done( function(data,textStatus,jqXHR) {
			getIQCdataTable(data,tblforiqcinspection);
			$('#SearchModal').modal('hide');
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	//REQUALIFICATION
	function getItemsRequalification() {
		var url = "<?php echo e(url('/iqcdbgetitemrequali')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			 _token: token,
		};

		$.ajax({
			 url: url,
			 type: "GET",
			 data: data,
		}).done( function(data, textStatus, jqXHR) {
			if (data == null || data == "") {
				$('#er_partcode_rq').html("No Inspections Available");
			} else {
				$('#partcode_rq').select2({
	   				 data: data,
	   				 placeholder: "Select an Item"
	   			 });
			}
		}).fail( function(data, textStatus, jqXHR) {
			 failedMsg("There's some error while processing.");
		});
	}

	function getAppNo() {
		var url = "<?php echo e(url('/iqcdbgetappnorequali')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			 _token: token,
			 item: $('#partcode_rq').val()
		};

		$.ajax({
			 url: url,
			 type: "GET",
			 data: data,
		}).done( function(data, textStatus, jqXHR) {
			if (data == null || data == "") {
				$('#er_app_no_rq').html("No Available Application Number.");
			} else {
				$('#app_no_rq').select2({
	   				 data: data,
	   				 placeholder: "Select an Item"
	   			 });
			}
		}).fail( function(data, textStatus, jqXHR) {
			 failedMsg("There's some error while processing.");
		});
	}

	function getDetailsRequalification() {
		var url = "<?php echo e(url('/iqcdbgetdetailsrequali')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			 _token: token,
			 item: $('#partcode_rq').val(),
			 app_no: $('#app_no_rq').val()
		};

		$.ajax({
			 url: url,
			 type: "GET",
			 data: data,
		}).done( function(data, textStatus, jqXHR) {
			var details = data.details;
			$('#partname_rq').val(details.partname);
			$('#supplier_rq').val(details.supplier);
			$('#app_date_rq').val(details.app_date);
			$('#app_time_rq').val(details.app_time);
			$('#lot_qty_rq').val(details.lot_qty);

			$('#lot_no_rq').select2({
				tags: true,
				data: data.lots,
				placeholder: 'Select Lot Number'
			});

			$('#lot_no_rq').select2('val',data.lotval);
		}).fail( function(data, textStatus, jqXHR) {
			 failedMsg("There's some error while processing.");
		});
	}

	function calculateLotQtyRequalification(lotno) {
		var url = "<?php echo e(url('/iqccalculatelotqtyrequali')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token:token,
			app_no: $('#app_no_rq').val(),
			item: $('#partcode_rq').val(),
			lot_no: lotno
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done( function(data, textStatus, jqXHR) {
			$('#lot_qty_rq').val(data);
			console.log(data);
		}).fail( function(data, textStatus, jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function getVisualInspectionRequalification() {
		var url = "<?php echo e(url('/iqcdbvisualinspectionrequali')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token:token,
			app_no: $('#app_no_rq').val(),
			item: $('#partcode_rq').val(),
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done( function(data, textStatus, jqXHR) {
			$.each(data, function(i,x){
				$('#date_ispected_rq').val(x.date_ispected);
				$('#ww_rq').val(x.ww);
				$('#fy_rq').val(x.fy);
				$('#time_ins_from_rq').val(x.time_ins_from);
				$('#time_ins_to_rq').val(x.time_ins_to);
				$('#shift_rq').select2('val',[x.shift]);
				$('#inspector_rq').val(x.inspector);
				$('#submission_rq').select2('val',[x.submission]);
				$('#judgement_rq').val(x.judgement);
				$('#lot_inspected_rq').val(x.lot_inspected);
				$('#lot_accepted_rq').val(x.lot_accepted);
				$('#no_of_defects_rq').val(x.no_of_defects);
				$('#remarks_rq').val(x.remarks);
			});

			if ($('#lot_accepted_rq').val() < 1) {
				$('#no_defects_label_rq').show();
				$('#no_of_defects_rq').show();
				$('#mode_defects_label_rq').show();
				$('#btn_mod_rq').show();
			} else {
				$('#no_defects_label_rq').hide();
				$('#no_of_defects_rq').hide();
				$('#mode_defects_label_rq').hide();
				$('#btn_mod_rq').hide();;
			}
		}).fail( function(data, textStatus, jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function getDropdownsRequali() {
		var url = "<?php echo e(url('/iqcgetdropdownsrequali')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data,textStatus,jqXHR) {
			$('#shift_rq').select2({
				data: data.shift,
				placeholder: "Select Shift"
			});
			$('#submission_rq').select2({
				data: data.submission,
				placeholder: "Select Submission"
			});
			$('#mod_rq').select2({
				data: data.mod,
				placeholder: "Select Mode of Defects"
			});
		}).fail(function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function saveRequalification() {
		$('#loading').modal('show');
		if (requiredFields(':input.requiredRequali') == true) {
			var url = "<?php echo e(url('/iqcsaverequali')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				save_status: $('#save_status_rq').val(),
				id: $('#id_rq').val(),
				ctrlno: $('#ctrl_no_rq').val(),
				partcode: $('#partcode_rq').val(),
				partname: $('#partname_rq').val(),
				supplier: $('#supplier_rq').val(),
				app_date: $('#app_date_rq').val(),
				app_time: $('#app_time_rq').val(),
				app_no: $('#app_no_rq').val(),
				lot_no: $('#lot_no_rq').val(),
				lot_qty: $('#lot_qty_rq').val(),
				date_inspected: $('#date_ispected_rq').val(),
				ww: $('#ww_rq').val(),
				fy: $('#fy_rq').val(),
				time_ins_from: $('#time_ins_from_rq').val(),
				time_ins_to: $('#time_ins_to_rq').val(),
				shift: $('#shift_rq').val(),
				inspector: $('#inspector_rq').val(),
				submission: $('#submission_rq').val(),
				judgement: $('#judgement_rq').val(),
				lot_inspected: $('#lot_inspected_rq').val(),
				lot_accepted: $('#lot_accepted_rq').val(),
				no_of_defects: $('#no_of_defects_rq').val(),
				remarks: $('#remarks_rq').val(),
			};

			$.ajax({
				url: url,
				type: "POST",
				dataType: "JSON",
				data: data
			}).done( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');

				if (data.return_status == 'success') {
					successMsg(data.msg);
				}
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's some error while processing.");
			});
		} else {
			$('#loading').modal('hide');
			failedMsg("Please fill out all required fields.");
		}
	}

	function getRequalification(row) {
		var rq_inspection_body = '';
		$('#rq_inspection_body').html('');
		var url = "<?php echo e(url('/iqcdbgetrequalidata')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			 _token: token,
			 row: row
		};

		$.ajax({
			 url: url,
			 type: "GET",
			 data: data,
		}).done( function(data, textStatus, jqXHR) {
			getRequalidataTable(data,rq_inspection_body);
		}).fail( function(data, textStatus, jqXHR) {
			 failedMsg("There's some error while processing.");
		});
	}

	function getRequalidataTable(data,rq_inspection_body) {
		$.each(data, function(i,x) {
			rq_inspection_body = '<tr>'+
										'<td class="table-checkbox" style="width: 2%">'+
											'<input type="checkbox" class="checkboxes checitemrq" value="'+x.id+'"/>'+
										'</td>'+
										'<td>'+
											'<a href="javascript:;" class="btn btn-primary input-sm btn_editRequali" '+
												'data-ctrl_no="'+x.ctrl_no_rq+'" '+
												'data-partcode="'+x.partcode_rq+'" '+
												'data-partname="'+x.partname_rq+'" '+
												'data-supplier="'+x.supplier_rq+'" '+
												'data-app_date="'+x.app_date_rq+'" '+
												'data-app_time="'+x.app_time_rq+'" '+
												'data-app_no="'+x.app_no_rq+'" '+
												'data-lot_no="'+x.lot_no_rq+'" '+
												'data-lot_qty="'+x.lot_qty_rq+'" '+
												'data-date_ispected="'+x.date_ispected_rq+'" '+
												'data-ww="'+x.ww_rq+'" '+
												'data-fy="'+x.fy_rq+'" '+
												'data-shift="'+x.shift_rq+'" '+
												'data-time_ins_from="'+x.time_ins_from_rq+'" '+
												'data-time_ins_to="'+x.time_ins_to_rq+'" '+
												'data-inspector="'+x.inspector_rq+'" '+
												'data-submission="'+x.submission_rq+'" '+
												'data-judgement="'+x.judgement_rq+'" '+
												'data-lot_inspected="'+x.lot_inspected_rq+'" '+
												'data-lot_accepted="'+x.lot_accepted_rq+'" '+
												'data-no_of_defects="'+x.no_of_defects_rq+'" '+
												'data-remarks="'+x.remarks_rq+'"'+
												'data-id="'+x.id+'">'+
												'<i class="fa fa-edit"></i>'+
											'</a>'+
										'</td>'+
										'<td>'+x.ctrl_no_rq+'</td>'+
										'<td>'+x.partcode_rq+'</td>'+
										'<td>'+x.partname_rq+'</td>'+
										'<td>'+x.lot_no_rq+'</td>'+
										'<td>'+x.app_date_rq+'</td>'+
										'<td>'+x.app_time_rq+'</td>'+
										'<td>'+x.app_no_rq+'</td>'+
									'</tr>';
			$('#rq_inspection_body').append(rq_inspection_body);
		});
	}

	function iqcdbgetmodeofdefectsRequali() {
		$('#tblformodinspection').html('');
		var tblformodinspection = '';
		var url = "<?php echo e(url('/iqcdbgetmodeofdefectsrequali')); ?>";
		var token  = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			item: $('#partcode_rq').val(),
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done( function(data,textStatus,jqXHR) {
			getModrqlist(data);
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function getModrqlist(data) {
		var cnt = 1;
		var no_of_defectives = 0;
		$.each(data, function(i,x) {
			tblformodrequalification = '<tr>'+
										'<td>'+
											'<input type="checkbox" class="modrq_checkitem checkboxes" value="'+x.id+'">'+
										'</td>'+
										'<td>'+
											'<a href="javascript:;" class="btn blue input-sm modrq_edititem" data-mod="'+x.mod+'" data-qty="'+x.qty+'" data-id="'+x.id+'">'+
												'<i class="fa fa-edit"></i>'+
											'</a>'+
										'</td>'+
										'<td>'+cnt+'</td>'+
										'<td>'+x.mod+'</td>'+
										'<td>'+x.qty+'</td>'+
									'</tr>';
			cnt++;
			no_of_defectives = parseFloat(no_of_defectives) + parseFloat(x.qty);
			$('#tblformodrequalification').append(tblformodrequalification);
		});

		$('#no_of_defects_rq').val(no_of_defectives);
		$('#status_requalification').val('ADD');
	}

	function saveModeOfDefectsRequali() {
		var url = "<?php echo e(url('/iqcdbsavemodeofdefectsrq')); ?>";
		var token  = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			item: $('#partcode_rq').val(),
			mod: $('#mod_rq').val(),
			qty: $('#qty_rq').val(),
			status: $('#status_requalification').val(),
			id: $('#id_requalification').val()
		};

		$.ajax({
			url: url,
			type: "POST",
			dataType: "JSON",
			data: data
		}).done( function(data,textStatus,jqXHR) {
			if (data.return_status == "success") {
				successMsg(data.msg);
			} else {
				failedMsg(data.msg);
			}
			iqcdbgetmodeofdefectsRequali();
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	// GROUP BY
	function getGroupbyContents(field,content) {
		var url = "<?php echo e(url('iqcdbgroupbygetcontent')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			field: $(field).val(),
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data,textStatus,jqXHR) {
			if (data == '' || data == null) {

			} else {
				$(content).select2({
					data:data
				});
			}
		}).fail(function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function groupByTable(field1,content1,field2,content2,field3,content3,gfrom,gto) {
		tblforiqcinspection = '';
		tblforlarlrrdppm = '';
		$('#tblforiqcinspection').html('');
		$('#tblforlarlrrdppm').html('');
		var url = "<?php echo e(url('/iqcdbgroupbytable')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			field1: field1,
			content1: content1,
			field2: field2,
			content2: content2,
			field3: field3,
			content3: content3,
			from: gfrom,
			to: gto,
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data,textStatus,jqXHR) {
			DPPMtable(data,tblforlarlrrdppm)
		}).fail(function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function getInspectionBydate(gfrom,gto) {
		tblforiqcinspection = '';
		$('#tblforiqcinspection').html('');
		var url = "<?php echo e(url('/iqcdbinspectionbydate')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			from: gfrom,
			to: gto,
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data,textStatus,jqXHR) {
			getIQCdataTable(data,tblforiqcinspection);
		}).fail(function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function DPPMtable(data,tblforlarlrrdppm) {
		$.each(data, function(i,x) {
			var lar = (((x.lot_qty - x.no_of_defects)/x.lot_qty)*100).toFixed(2);
			// var lar = (lqminusnoddividedbylq * 100).toFixed(2);

			var lrr = ((x.no_of_defects / x.lot_qty)*100).toFixed(2);
			// var lrr = (noddivlq * 100).toFixed(2);
			
			// //getting the dppm value-------
			var noddivss = 0;
			if(x.no_of_defects > 0 && x.sample_size > 0){
				var noddivss = x.no_of_defects/x.sample_size;
			}
			var dppm = (noddivss * 1000000).toFixed(2);

			var reject = x.lot_inspected - x.lot_accepted;
			tblforlarlrrdppm = '<tr>'+
									'<td></td>'+
									'<td>'+x.lot_inspected+'</td>'+
		        					'<td>'+x.lot_accepted+'</td>'+
		                            '<td>'+reject+'</td>'+
		                            '<td>'+x.sample_size+'</td>'+
		                            '<td>'+x.no_of_defects+'</td>'+
		                            '<td>'+lar+'</td>'+
		                            '<td>'+lrr+'</td>'+
		                            '<td>'+dppm+'</td>'+
								'</tr>';
			$('#tblforlarlrrdppm').append(tblforlarlrrdppm);
		});
	}

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>