<?php $__env->startSection('title'); ?>
	QC Database | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
	<link href="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/css/table-fixedheader.css')); ?>" rel="stylesheet" type="text/css"/>
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
                        								<div class="row col-sm-offset-3">
															<div class="col-sm-3">
																<a href="javascript:;" class="btn green btn-block" id="btn_iqcresult">
																	<i class="fa fa-search"></i> Inspection
																</a>
															</div>

															<div class="col-sm-3">
																<a href="javascript:;" class="btn green btn-block" id="btn_iqcresult_man">
																	<i class="fa fa-search"></i> Manual Input
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
                                                            	<div class="tabbable-custom">
	                                                            	<ul class="nav nav-tabs" role="tablist">
	                                                            		<li role="presentation"  class="active"><a href="#on-going" aria-controls="on-going" role="tab" data-toggle="tab">On-Going</a></li>
								                                        <li role="presentation"><a href="#inspected" aria-controls="inspected" role="tab" data-toggle="tab">Inspected</a></li>
								                                    </ul>

								                                    <!-- Tab panes -->
								                                    <div class="tab-content">
								                                        <div role="tabpanel" class="tab-pane active" id="on-going">
								                                        	<table class="table table-hover table-bordered table-striped" id="on-going-inspection">
			                                                                    <thead>
			                                                                        <tr>
			                                                                        	<td class="table-checkbox">
			                                                                                <input type="checkbox" class="group-checkable ongoing_checkall" />
			                                                                            </td>
			                                                                            <td></td>
			                                                                            <td>Invoice No.</td>
			                                                                            <td>Inspector</td>
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
			                                                                    <tbody id="tblforongoing">
				                                                                </tbody>
			                                                                </table>
			                                                                <div class="row">
			                                                                	<div class="col-md-12 text-center">
			                                                                		<button type="button" class="btn red" id="btn_delete_ongoing">
			                                                                			<i class="fa fa-trash"></i> Delete
			                                                                		</button>
			                                                                	</div>
			                                                                </div>
								                                        </div>

								                                        <div role="tabpanel" class="tab-pane" id="inspected">
								                                        	<table class="table table-hover table-bordered table-striped" id="iqcdatatable">
			                                                                    <thead>
			                                                                        <tr>
			                                                                        	<td class="table-checkbox">
			                                                                                <input type="checkbox" class="group-checkable iqc_checkall" />
			                                                                            </td>
			                                                                            <td></td>
			                                                                            <td>Invoice No.</td>
			                                                                            <td>Inspector</td>
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
			                                                                <div class="row">
			                                                                	<div class="col-md-12 text-center">
			                                                                		<button type="button" class="btn red" id="btn_delete_inspected">
			                                                                			<i class="fa fa-trash"></i> Delete
			                                                                		</button>
			                                                                	</div>
			                                                                </div>
								                                        </div>
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
                                            	<a href="javascript:;" class="btn green" id="btn_upload">
                                                    <i class="fa fa-upload"></i> Upload Data
                                                </a>
                                                <a href="javascript:;" class="btn grey-gallery" id="btn_groupby">
                                                    <i class="fa fa-group"></i> Group By
                                                </a>
                                                
                                                <a href="javascript:;" class="btn purple" id="btn_search">
                                                    <i class="fa fa-search"></i> Search
                                                </a>
												<a href="javascript:;" class="btn yellow-gold" id="btn_pdf">
                                                    <i class="fa fa-file-text-o"></i> Export to Pdf
                                                </a>
                                                <a href="javascript:;" class="btn green-jungle" id="btn_excel">
                                                    <i class="fa fa-file-text-o"></i> Export to Excel
                                                </a>

                                                <a href="javascript:;" class="btn blue" id="btn_history">
                                                    <i class="fa fa-book"></i> Item History
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
										<input type="hidden" class="form-control input-sm clear" id="classification" name="classification" value="Visual Inspection">
										<div id="er_invoice_no" style="color: #f24848; font-weight: 900"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="partcodelbl" name="partcodelbl">
                                        <input type="text" id="partcode" name="partcode" class="form-control input-sm clear clearselect" <?php echo($state);?>>
										<!-- <select class="form-control required select2me input-sm clear" id="partcode" name="partcode">
										</select> -->
										<div id="er_partcode"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Name</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="partname" name="partname">
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
										<input class="form-control input-sm clear" type="text" name="app_date" id="app_date" value="<?php echo e(date('m/d/Y')); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Application Time</label>
									<div class="col-sm-9">
										<input type="text" data-format="h:m A" class="form-control input-sm clear" name="app_time" id="app_time" value="<?php echo e(date('h:i A')); ?>">
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
										<input type="text" name="lot_no" id="lot_no" class="form-control required input-sm lot_no clear clearselect">
										<!-- </select> -->
										<div id="er_lot_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Quantity</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="lot_qty" name="lot_qty">
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
										<input type="text" class="form-control required input-sm clearselect show-tick actual" name="type_of_inspection" id="type_of_inspection">
										<div id="er_type_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Severity of Inspection</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick actual" name="severity_of_inspection" id="severity_of_inspection">
										<div id="er_severity_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspection Level</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick actual" name="inspection_lvl" id="inspection_lvl">
										<div id="er_inspection_lvl"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">AQL</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick actual" name="aql" id="aql">
										<div id="er_aql"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Accept</label>
									<div class="col-sm-9">
										<input type="number" min="0" max="1" class="form-control input-sm clear actual" id="accept" name="accept">
										<div id="er_accept"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Reject</label>
									<div class="col-sm-9">
										<input type="number" min="0" max="1" class="form-control input-sm clear actual" id="reject" name="reject">
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
										<input class="form-control required input-sm clear date-picker actual" type="text" name="date_inspected" id="date_inspected" data-date-format='yyyy-mm-dd'/>
										<div id="er_date_ispected"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">WW#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear actual" id="ww" name="ww" readonly>
										<div id="er_ww"></div>
									</div>
									<label class="control-label col-sm-3">FY#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear actual" id="fy" name="fy" readonly>
										<div id="er_fy"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Time Inspected</label>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control required input-sm actual" name="time_ins_from" id="time_ins_from" value="<?php echo e(date('H:i A')); ?>"/> <?php /* timepicker timepicker-no-seconds */ ?>
										<div id="er_time_ins_from"></div>
									</div>
									<div class="col-sm-1"></div>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control required input-sm  actual" name="time_ins_to" id="time_ins_to" value="<?php echo e(date('H:i A')); ?>"/> <?php /* timepicker timepicker-no-seconds */ ?>
										<div id="er_time_ins_to"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Shift</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick actual" name="shift" id="shift">
										<div id="er_shift"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspector</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm actual" id="inspector" name="inspector" value="<?php echo e(Auth::user()->user_id); ?>">
										<div id="er_inspector"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Submission</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clearselect show-tick actual" name="submission" id="submission">
										<div id="er_submission"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Judgement</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="judgement" name="judgement" readonly>
										<div id="er_judgement"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label col-sm-3">Lot Inspected</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clear actual" id="lot_inspected" name="lot_inspected">
										<div id="er_lot_inspected"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Accepted</label>
									<div class="col-sm-9">
										<input type="text" class="form-control required input-sm clear actual" id="lot_accepted" name="lot_accepted">
										<div id="er_lot_accepted"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Sample Size</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="sample_size" name="sample_size" readonly>
										<div id="er_sample_size"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="no_defects_label">No. of Defectives</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="no_of_defects" name="no_of_defects">
										<div id="er_no_of_defects"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Remarks</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="remarks" name="remarks">
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

	<!-- IQC RESULT MODAL -->
	<div id="ManualModal" class="modal fade" role="dialog" data-backdrop="static">
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
									<label class="control-label col-sm-3">Classification</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear" id="classification_man" name="classification_man">
											<option value=""></option>
											<option value="Visual Inspection">Visual Inspection (Temporary Invoice)</option>
											<option value="Pkg. & Raw Material">Packaging & Raw Material</option>
											<option value="Material Qualification">Material Qualification</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Invoice No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="invoice_no_man" name="invoice_no_man">
										<input type="hidden" class="form-control input-sm clear" id="iqc_result_id_man" name="iqc_result_id_man">

										<div id="er_invoice_no_man" style="color: #f24848; font-weight: 900"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-9">
										<!-- <input type="text" class="form-control input-sm clear" id="partcode" name="partcode"> -->
                                        <input type="text" id="partcode_man" name="partcode_man" class="form-control input-sm clear clearselect" <?php echo($state);?>>
										<!-- <select class="form-control select2me input-sm clear" id="partcode" name="partcode">
										</select> -->
										<div id="er_partcode"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Name</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="partname_man" name="partname_man">
										<div id="er_partname"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Supplier</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="supplier_man" name="supplier_man" >
										<div id="er_supplier"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Application Date</label>
									<div class="col-sm-9">
										<input class="form-control input-sm clear" type="text" name="app_date_man" id="app_date_man" value="<?php echo e(date('m/d/Y')); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Application Time</label>
									<div class="col-sm-9">
										<input type="text" data-format="h:m A" class="form-control input-sm clear" name="app_time_man" id="app_time_man" value="<?php echo e(date('H:i A')); ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Application Ctrl No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="app_no_man" name="app_no_man">
										<div id="er_app_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot No.</label>
									<div class="col-sm-9">
										<input type="text" name="lot_no_man" id="lot_no_man" class="form-control input-sm lot_no clear clearselect">
										<!-- </select> -->
										<div id="er_lot_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Quantity</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="lot_qty_man" name="lot_qty_man">
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
										<input type="text" class="form-control input-sm clearselect show-tick actual" name="type_of_inspection_man" id="type_of_inspection_man">
										<div id="er_type_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Severity of Inspection</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clearselect show-tick actual" name="severity_of_inspection_man" id="severity_of_inspection_man">
										<div id="er_severity_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspection Level</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clearselect show-tick actual" name="inspection_lvl_man" id="inspection_lvl_man">
										<div id="er_inspection_lvl"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">AQL</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clearselect show-tick actual" name="aql_man" id="aql_man">
										<div id="er_aql"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Accept</label>
									<div class="col-sm-9">
										<input type="number" min="0" max="1" class="form-control input-sm clear actual" id="accept_man" name="accept_man">
										<div id="er_accept"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Reject</label>
									<div class="col-sm-9">
										<input type="number" min="0" max="1" class="form-control input-sm clear actual" id="reject_man" name="reject_man">
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
										<input class="form-control input-sm clear date-picker actual" type="text" name="date_inspected_man" id="date_inspected_man" data-date-format='yyyy-mm-dd'/>
										<div id="er_date_ispected"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">WW#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear actual" id="ww_man" name="ww_man" readonly>
										<div id="er_ww"></div>
									</div>
									<label class="control-label col-sm-3">FY#</label>
									<div class="col-sm-3">
										<input type="text" class="form-control input-sm clear actual" id="fy_man" name="fy_man" readonly>
										<div id="er_fy"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Time Inspected</label>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control input-sm actual" name="time_ins_from_man" id="time_ins_from_man" value="<?php echo e(date('h:i A')); ?>"/> <?php /* timepicker timepicker-no-seconds */ ?>
										<div id="er_time_ins_from"></div>
									</div>
									<div class="col-sm-1"></div>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control input-sm actual" name="time_ins_to_man" id="time_ins_to_man"  value="<?php echo e(date('h:i A')); ?>"/> <?php /* timepicker timepicker-no-seconds */ ?>
										<div id="er_time_ins_to"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Shift</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clearselect show-tick actual" name="shift_man" id="shift_man">
										<div id="er_shift"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspector</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm actual" id="inspector_man" name="inspector_man" value="<?php echo e(Auth::user()->user_id); ?>">
										<div id="er_inspector"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Submission</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clearselect show-tick actual" name="submission_man" id="submission_man">
										<div id="er_submission"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Judgement</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="judgement_man" name="judgement_man" readonly>
										<div id="er_judgement"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label col-sm-3">Lot Inspected</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="lot_inspected_man" name="lot_inspected_man">
										<div id="er_lot_inspected"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Accepted</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="lot_accepted_man" name="lot_accepted_man">
										<div id="er_lot_accepted"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Sample Size</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="sample_size_man" name="sample_size_man" readonly>
										<div id="er_sample_size"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="no_defects_label_man">No. of Defectives</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="no_of_defects_man" name="no_of_defects_man">
										<div id="er_no_of_defects"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Remarks</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear actual" id="remarks_man" name="remarks_man">
										<input type="hidden" class="form-control input-sm clear" id="inspectionstatus_man" name="inspectionstatus_man">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="mode_defects_label_man">Mode of Defects</label>
									<div class="col-sm-4">
										<button type="button" class="btn blue btn_mod_ins" id="btn_mod_ins_man">
                                            <i class="fa fa-plus-circle"></i> Add Mode of Defects
                                        </button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<input type="hidden" name="save_status" id="save_status_man">
									</div>
								</div>
							</div>

						</div>

					</div>
					<div class="modal-footer">
						<button type="button" onclick="javascript:saveInspection_man();" class="btn btn-success" id="btn_savemodal"><i class="fa fa-floppy-disk-o"></i>Save</button>
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
									<table class="table table-hover table-bordered table-striped table-fixedheader" id="tbl_modeofdefect">
										<thead>
											<tr>
												<td class="table-checkbox" style="width: 8%">
                                                    <input type="checkbox" class="group-checkable checkAllitemsinspection" />
                                                </td>
                                                <td style="width: 12%"></td>
												<td style="width: 5%">#</td>
												<td style="width: 55%">Mode of Defects</td>
												<td style="width: 20%">Quantity</td>
											</tr>
										</thead>
										<tbody id="tblformodinspection">
                                        	<!-- table records here -->
                                        </tbody>
									</table>
									<input type="hidden" name="mod_count" id="mod_count">
									<input type="hidden" name="mod_total_qty" id="mod_total_qty">
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
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-hover table-bordered table-striped table-fixedheader">
										<thead>
											<tr>
												<td style="width:11.11%"></td>
												<td style="width:11.11%">Inspected</td>
												<td style="width:11.11%">Accept</td>
												<td style="width:11.11%">Reject</td>
												<td style="width:11.11%">Sample Size</td>
												<td style="width:11.11%">Qty / NG</td>
												<td style="width:11.11%">LAR</td>
												<td style="width:11.11%">LRR</td>
												<td style="width:11.11%">DPPM</td>
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

	<!-- HISTORY MODAL -->
	<div id="historyModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">History</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="hs_partcode" name="hs_partcode">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="hs_lotno" name="hs_lotno">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Judgement</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="hs_judgement" name="hs_judgement">
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">From</label>
									<div class="col-sm-9">
										<input class="form-control input-sm date-picker" type="text" data-date-format='yyyy-mm-dd' name="hs_from" id="hs_from"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">To</label>
									<div class="col-sm-9">
										<input class="form-control input-sm date-picker" type="text" data-date-format='yyyy-mm-dd' name="hs_to" id="hs_to"/>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 table-responsive">
								<table class="table table-bordered table-striped table-fixedheader" style="font-size: 10px;">
									<thead>
										<tr>
											<td style="width: 11.67%">Invoice No.</td>
											<td style="width: 11.67%">Part Code</td>
											<td style="width: 30.67%">Part Name</td>
											<td style="width: 16.67%">Lot No.</td>
											<td style="width: 12.67%">Lot Qty.</td>
											<td style="width: 16%">Jugdement</td>
										</tr>
									</thead>
									<tbody id="tblhistorybody"></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btn_searchHistory" class="btn btn-success">OK</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger" id="btn_search-close">Close</button>
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
								  <img src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/images/ajax-loader.gif')); ?>" class="img-responsive">
							 </div>
							 <div class="col-sm-2"></div>
						</div>
				   </div>
			  </div>
		 </div>
	</div>

	<!-- Upload -->
	<div id="uploadModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Upload Data File</h4>
				</div>
				<form class="form-horizontal" method="POST" enctype="multipart/form-data" id="frm_upload" action="<?php echo e(url('/upload-iqc')); ?>">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Inspection Data</label>
									<div class="col-md-9">
										<input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
										<input type="file" class="filestyle" data-buttonName="btn-primary" name="inspection_data" id="inspection_data" <?php echo e($readonly); ?>>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Mode of Defects</label>
									<div class="col-md-9">
										<input type="file" class="filestyle" data-buttonName="btn-primary" name="inspection_mod" id="inspection_mod" <?php echo e($readonly); ?>>
									</div>
								</div>

								<hr/>

								<div class="form-group">
									<label class="control-label col-md-3">Re-qualification Data</label>
									<div class="col-md-9">
										<input type="file" class="filestyle" data-buttonName="btn-primary" name="requali_data" id="requali_data" <?php echo e($readonly); ?>>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Mode of Defects</label>
									<div class="col-md-9">
										<input type="file" class="filestyle" data-buttonName="btn-primary" name="requali_mod" id="requali_mod" <?php echo e($readonly); ?>>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_uploadfile" class="btn btn-success">Upload</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger" id="btn_search-close">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MSG -->
	<div id="confirmDeleteModal" class="modal fade" role="dialog" data-backdrop="static">
		 <div class="modal-dialog modal-sm gray-gallery">
			  <div class="modal-content ">
				   <div class="modal-header">
						<h4 class="modal-title">Delete</h4>
				   </div>
				   <div class="modal-body">
						<p>Are you sure do you want to delete?</p>
						<input type="hidden" name="delete_type" id="delete_type">
				   </div>
				   <div class="modal-footer">
				   		<button type="button" class="btn btn-primary" id="btn_deleteyes">Yes</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger">No</button>
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
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
<script type="text/javascript">
    $(function() {
		getIQCInspection("<?php echo e(url('/iqcdbgetiqcdata')); ?>");
		getOnGoing();

		$('#partcodelbl').hide();
		$('#partcode').hide();
		$('#partcode').select2('container').hide();

		$('#btn_backModal').on('click', function() {
			$('#partcodelbl').hide();
			$('#partcode').hide();
			$('#partcode').select2('container').hide();
		});

		$('#rq_inspection_body').scroll(function() {
			if($('#rq_inspection_body').scrollTop() + $('#rq_inspection_body').height() >= $('#rq_inspection_body').height()) {
				row = row+2;
				getRequalification(row);
			}
		});

		$('#frm_upload').on('submit', function(event) {
			var formObj = $('#frm_upload');
			var formURL = formObj.attr("action");
			var formData = new FormData(this);
			event.preventDefault();

			var inspection_data = $('#inspection_data').val();
			var inspection_mod = $('#inspection_mod').val();
			var requali_data = $('#requali_data').val();
			var requali_mod = $('#requali_mod').val();

			if (inspection_data != '' && checkFile(inspection_data) == false) {
				failedMsg("The Inspection data in not a valid excel file.")
			} else if (inspection_mod != '' &&  checkFile(inspection_mod) == false) {
				failedMsg("The Mode of defects for Inspection data in not a valid excel file.")
			} else if (requali_data != '' &&  checkFile(requali_data) == false) {
				failedMsg("The Re-qualification data in not a valid excel file.")
			} else if (requali_mod != '' &&  checkFile(requali_mod) == false) {
				failedMsg("The Mode of defects for Re-qualification data in not a valid excel file.")
			} else {
				$.ajax({
					url: formURL,
					method: 'POST',
					data:  formData,
					mimeType:"multipart/form-data",
					contentType: false,
					cache: false,
					processData:false,
				}).done( function(data, textStatus, jqXHR) {
					var out = JSON.parse(data);
					successMsg(out.msg)
					console.log(out);
				}).fail( function(data, textStatus, jqXHR) {
					failedMsg("There's an error occurred while processing.")
				});
			}
		});

		$('#time_ins_from').on('change', function() {
			var time = setTime($(this).val());
			$(this).val(time);
		});

		$('#time_ins_to').on('change', function() {
			var time = setTime($(this).val());
			$(this).val(time);
		});

		$('#time_ins_from_man').on('change', function() {
			var time = setTime($(this).val());
			$(this).val(time);
		});
		$('#time_ins_to_man').on('change', function() {
			var time = setTime($(this).val());
			$(this).val(time);
		});

		// INSPECTION SIDE
		$('.timepicker-no-seconds').timepicker({
			autoclose: true,
			minuteStep: 5
		});

        $('#btn_iqcresult').on('click', function() {
        	clear();
   			// $('#invoice_no').prop('readonly',false);
			// $('#partcode').prop('readonly',true);
			// $('#lot_no').prop('readonly',true);

			getDropdowns();

			$('#no_defects_label').hide();
			$('#no_of_defects').hide();
			$('#mode_defects_label').hide();
			$('#btn_mod_ins').hide();

			$('#save_status').val('ADD');

			$('#partcodelbl').hide();
			$('#partcode').show();

			$('#IQCresultModal').modal('show');
        });

        $('#btn_iqcresult_man').on('click', function() {
        	clear();
   			// $('#invoice_no').prop('readonly',false);
			// $('#partcode').prop('readonly',true);
			// $('#lot_no').prop('readonly',true);

			getDropdowns_man();

			$('#no_defects_label_man').hide();
			$('#no_of_defects_man').hide();
			$('#mode_defects_label_man').hide();
			$('#btn_mod_ins_man').hide();

			$('#save_status_man').val('ADD');

			$('#ManualModal').modal('show');
        });

        $('#btn_upload').on('click', function(){
            $('#uploadModal').modal('show');
        });

        $('#btn_groupby').on('click', function(){
            $('#GroupByModal').modal('show');
        });

        $('#btn_history').on('click', function() {
        	$('#historyModal').modal('show');
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
        	$('#er_invoice_no').html('');
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

		// $('#time_ins_from').on('change', function() {
		// 	getShift();
		// });
		// $('#time_ins_to').on('change', function() {
		// 	getShift();
		// });

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
			openModeOfDefects();
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

		$('.ongoing_checkall').on('change', function(e) {
			$('input:checkbox.ongiong_checkitems').not(this).prop('checked', this.checked);
		});

		$('#tblforiqcinspection').on('click','.btn_editiqc',function() {
			getDropdowns();
			$('#invoice_no').prop('readonly',true);
			$('#invoice_no').val($(this).attr('data-invoice_no'));
			getItems();

			$('#partcodelbl').val($(this).attr('data-partcode'));
			getItemDetailsEdit();
			$('#partcode').hide();

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

			$('#partcodelbl').show();
			$('#partcode').hide();
			$('#partcode').select2('container').hide();

			openModeOfDefects();

			$('#IQCresultModal').modal('show');
		});

		$('#tblforongoing').on('click','.btn_editongiong',function() {
			getDropdowns();
			$('#invoice_no').prop('readonly',true);
			$('#invoice_no').val($(this).attr('data-invoice_no'));
			//getItems();
			$('#partcodelbl').val($(this).attr('data-partcode'));
			$('#partcode').val($(this).attr('data-partcode'));
			getItemDetailsEdit();

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

			$('#partcodelbl').hide();
			$('#partcode').show();
			$('#partcode').select2('container').show();

			openModeOfDefects();

			$('#IQCresultModal').modal('show');
		});

		$('#bt_delete_modeofdefectsinspection').on('click', function() {
			$('#delete_type').val('modins');
			$('#confirmDeleteModal').modal('show');
		});

		$('#btn_deleteyes').on('click', function() {
			var type = $('#delete_type').val();

			if (type == 'inspection') {
				deleteInspection();
			}

			if (type == 'requali') {
				deleteRequali();
			}

			if (type == 'modrq') {
				deleteModRQ();
			}

			if (type == 'modins') {
				deleteModIns();
			}

			if (type == 'on-going') {
				deleteOnGoing();
			}
		});

		$('#btn_delete_inspected').on('click', function() {
			$('#delete_type').val('inspection');
			$('#confirmDeleteModal').modal('show');
		});

		$('#btn_delete_ongoing').on('click', function() {
			$('#delete_type').val('on-going');
			$('#confirmDeleteModal').modal('show');
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
			$('#delete_type').val('requali');
			$('#confirmDeleteModal').modal('show');
		});

		$('.checkAllitemsrequalification').on('change', function(e) {
			$('input:checkbox.modrq_checkitem').not(this).prop('checked', this.checked);
		});

		$('#btn_deletemodrq').on('click', function() {
			$('#delete_type').val('modrq');
			$('#confirmDeleteModal').modal('show');
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

		$('#btn_searchHistory').on('click', function() {
			var tblhistorybody = '';
			$('#tblhistorybody').html('');
			var url = "<?php echo e(url('/iqcdbgethistory')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token:token,
				item: $('#hs_partcode').val(),
				lotno: $('#hs_lotno').val(),
				judgement: $('#hs_judgement').val(),
				from: $('#hs_from').val(),
				to: $('#hs_to').val(),
			};

			$.ajax({
				url: url,
				type: "GET",
				dataType: "JSON",
				data: data
			}).done( function(data,textStatus,jqXHR) {
				var color = '';
				$.each(data, function(i, x) {
					if (x.judgement == 'Accepted') {
						color = '#009490';
					} else {
						color = '#f04646';
					}
					tblhistorybody = '<tr>'+
										'<td style="width: 11.67%">'+x.invoice_no+'</td>'+
										'<td style="width: 11.67%">'+x.partcode+'</td>'+
										'<td style="width: 30.67%">'+x.partname+'</td>'+
										'<td style="width: 16.67%">'+x.lot_no+'</td>'+
										'<td style="width: 12.67%">'+x.lot_qty+'</td>'+
										'<td style="background-color:'+color+'; width: 16%;">'+x.judgement+'</td>'+
									'</tr>';
					$('#tblhistorybody').append(tblhistorybody);
				});
			}).fail( function(data,textStatus,jqXHR) {
				failedMsg("There's some error while processing.");
			});
		});

		//MANUAL INPUT
		$('#severity_of_inspection_man').on('change', function() {
			samplingPlan_man();
		});

		$('#inspection_lvl_man').on('change', function() {
			samplingPlan_man();
		});

		$('#aql_man').on('change', function() {
			samplingPlan_man();
		});

		// $('#time_ins_from_man').on('change', function() {
		// 	getShift_man();
		// });
		// $('#time_ins_to_man').on('change', function() {
		// 	getShift_man();
		// });

		$('#btn_clearmodal_man').on('click', function() {
			clear();
		});

		$('#btn_mod_ins_man').on('click', function() {
			iqcdbgetmodeofdefectsinspection();
			$('#mod_inspectionModal').modal('show');
		});

		$('#lot_accepted_man').on('change', function() {
			openModeOfDefects_man();
		});
    });

	function setTime(time) {
		var h = time.substring(0,2);
		var m = time.substring(3,5);
		var a = time.substring(6,8);

		if (m == undefined || m == '' || m == null) {
			m = '00';
		}

		if (h < 12 && h > 0) {
			if (a == undefined || a == '' || a == null || a == 'A') {
				a = 'AM';
			}
			return h+":"+m+" "+a;
		} else if (h == 00 || h == 0) {
			if (a == undefined || a == '' || a == null || a == 'A') {
				a = 'AM';
			}
			return "12"+":"+m+" "+a;
		}  else if (h == 12) {
			if (a == undefined || a == '' || a == null || a == 'P') {
				a = 'PM';
			}
			return h+":"+m+" "+a;
		} else {
			if (a == undefined || a == '' || a == null || a == 'P') {
				a = 'PM';
			}
			switch(h) {
				case '13':
					return "01"+":"+m+" "+a;
					break;
				case '14':
					return "02"+":"+m+" "+a;
					break;
				case '15':
					return "03"+":"+m+" "+a;
					break;
				case '16':
					return "04"+":"+m+" "+a;
					break;
				case '17':
					return "05"+":"+m+" "+a;
					break;
				case '18':
					return "06"+":"+m+" "+a;
					break;
				case '19':
					return "07"+":"+m+" "+a;
					break;
				case '20':
					return "08"+":"+m+" "+a;
					break;
				case '21':
					return "09"+":"+m+" "+a;
					break;
				case '22':
					return "10"+":"+m+" "+a;
					break;
				case '23':
					return "11"+":"+m+" "+a;
					break;
				default:
					return time;
					break;
			}
		}
	}


	// INSPECTION SIDE
	function getIQCInspection(url) {
		$('#iqcdatatable').dataTable().fnClearTable();
        $('#iqcdatatable').dataTable().fnDestroy();
        $('#iqcdatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: [
                {data: function(data){
                        return '<input type="checkbox" class="iqc_checkitems" value="'+data.id+'"/>';
                },orderable: false, searchable:false, name:"id" },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'invoice_no', name: 'invoice_no'},
                { data: 'inspector', name: 'inspector'},
				{ data: 'date_ispected', name: 'date_ispected'},
				{ data: function(data) {
					return data.time_ins_from;
				}, name: 'time_ins_from'},
				{ data: 'app_no', name: 'app_no'},
				{ data: 'fy', name: 'fy'},
				{ data: 'ww', name: 'ww'},
				{ data: 'submission', name: 'submission'},
				{ data: 'partcode', name: 'partcode'},
				{ data: 'partname', name: 'partname'},
				{ data: 'supplier', name: 'supplier'},
				{ data: 'lot_no', name: 'lot_no'},
				{ data: 'aql', name: 'aql'},
				{ data: 'judgement', name: 'judgement'}, 
            ],
            aoColumnDefs: [
                {
                    aTargets:[15], // You actual column with the string 'America'
                    fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                        $(nTd).css('font-weight', '700');
                        if(sData == "Accepted") {
                            $(nTd).css('background-color', '#c49f47');
                            $(nTd).css('color', '#fff');
                        }
                        if(sData == "Rejected") {
                            $(nTd).css('background-color', '#cb5a5e');
                            $(nTd).css('color', '#fff');
                        }
                        if(sData == "On-going") {
                            $(nTd).css('background-color', '#3598dc');
                            $(nTd).css('color', '#fff');
                        }
                    },
                }
            ],
            order: [[0,'desc']]
        });
	}

	function getOnGoing() {
		$('#on-going-inspection').dataTable().fnClearTable();
        $('#on-going-inspection').dataTable().fnDestroy();
        $('#on-going-inspection').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(url('/iqcdbgetongoing')); ?>",
            columns: [
                {data: function(data){
                        return '<input type="checkbox" class="ongiong_checkitems" value="'+data.id+'"/>';
                },orderable: false, searchable:false, name:"id" },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'invoice_no', name: 'invoice_no'},
                { data: 'inspector', name: 'inspector'},
				{ data: 'date_ispected', name: 'date_ispected'},
				{ data: function(data) {
					return data.time_ins_from+' - present';
				}, name: 'time_ins_from'},
				{ data: 'app_no', name: 'app_no'},
				{ data: 'fy', name: 'fy'},
				{ data: 'ww', name: 'ww'},
				{ data: 'submission', name: 'submission'},
				{ data: 'partcode', name: 'partcode'},
				{ data: 'partname', name: 'partname'},
				{ data: 'supplier', name: 'supplier'},
				{ data: 'lot_no', name: 'lot_no'},
				{ data: 'aql', name: 'aql'},
				{ data: 'judgement', name: 'judgement'}, 
            ],
            aoColumnDefs: [
                {
                    aTargets:[15], // You actual column with the string 'America'
                    fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                        $(nTd).css('font-weight', '700');
                        if(sData == "Accepted") {
                            $(nTd).css('background-color', '#c49f47');
                            $(nTd).css('color', '#fff');
                        }
                        if(sData == "Rejected") {
                            $(nTd).css('background-color', '#cb5a5e');
                            $(nTd).css('color', '#fff');
                        }
                        if(sData == "On-going") {
                            $(nTd).css('background-color', '#3598dc');
                            $(nTd).css('color', '#fff');
                        }
                    },
                }
            ],
            order: [[0,'desc']]
        });
	}

	function saveInspection() {
		$('#loading').modal('show');

		if (requiredFields(':input.required') == true) {
			var url = "<?php echo e(url('/iqcsaveinspection')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var partcode = $('#partcode').val();

			if ($('#save_status').val() == 'EDIT') {
				partcode = $('#partcodelbl').val();
			}
			var data = {
				_token: token,
				save_status: $('#save_status').val(),
				id: $('#iqc_result_id').val(),
				invoice_no: $('#invoice_no').val(),
				partcode: partcode,
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
				classification: $('#classification').val(),
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
					$('#IQCresultModal').modal('hide');
					getIQCInspection("<?php echo e(url('/iqcdbgetiqcdata')); ?>");
					getOnGoing();
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

	function clear() {
		$('.clear').val('');
		$('.clearselect').select2('data', {
			id: '',
			text: ''
		})
		$('#invoice_no').prop('readonly',false);
		$('#er_invoice_no').html('');
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

  //   function getShift() {
		// var url = "<?php echo e(url('/iqcshift')); ?>";
		// var token = "<?php echo e(Session::token()); ?>";
		// var data = {
		// 	_token: token,
		// 	from: $('#time_ins_from').val(),
		// 	to: $('#time_ins_to').val()
		// };

		// $.ajax({
		// 	url: url,
		// 	type: "GET",
		// 	data: data
		// }).done(function(data,textStatus,jqXHR) {
		// 	$('#shift').select2('data',{
		// 		 id: data,
		// 		 text: data
		// 	});
		// }).fail(function(data,textStatus,jqXHR) {
		// 	failedMsg("There's some error while processing.");
		// });
  //   }

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
			$('#submission').val('1st');
			$('#submission').trigger('change');

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
         	if (data.length < 1) {
         		console.log(data);
         		$('#er_invoice_no').html("Your Invoice might be invalid / Not yet received / All Item codes were inspected.");
         	} else {
	     		$('#partcode').prop('readonly',false);
				$('#lot_no').prop('readonly',false);
				$('#partcode').select2({
					data: data,
					placeholder: "Select an Item"
				});
         	}
			 
         }).fail( function(data, textStatus, jqXHR) {
              failedMsg("There's some error while processing.");
         });
    }

    function getItemDetails() {
    	$('#lot_no').select2({
			tags: true,
			data: '',
			placeholder: 'Select Lot Number'
		});

		var partcode = $('#partcode').val();

		if ($('#partcode').val() == '') {
			partcode = $('#partcodelbl').val();
		}
    	
        var url = "<?php echo e(url('/iqcdbgetitemdetails')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
             _token: token,
             invoiceno: $('#invoice_no').val(),
             item: partcode
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

    function getItemDetailsEdit() {
    	$('#lot_no').select2({
			tags: true,
			data: '',
			placeholder: 'Select Lot Number'
		});

		var partcode = $('#partcode').val();

		if ($('#partcode').val() == '') {
			partcode = $('#partcodelbl').val();
		}
    	
        var url = "<?php echo e(url('/iqcdbgetitemdetails')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
             _token: token,
             invoiceno: $('#invoice_no').val(),
             item: partcode
        };

        $.ajax({
             url: url,
             type: "GET",
             data: data,
        }).done( function(data, textStatus, jqXHR) {
			var details = data.details;
			// $('#partname').val(details.item_desc);
			// $('#supplier').val(details.supplier);
			// $('#app_date').val(details.app_date);
			// $('#app_time').val(details.app_time);
			// $('#app_no').val(details.receive_no);

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
			lot_no: $('#lot_no').val(),
			qty: $('#qty_inspection').val(),
			status: $('#status_inspection').val(),
			id: $('#id_inspection').val(),
			current_count: $('#mod_total_qty').val(),
			sample_size: $('#sample_size').val()
		};

		$.ajax({
			url: url,
			type: "POST",
			dataType: "JSON",
			data: data
		}).done( function(data,textStatus,jqXHR) {
			if (data.return_status == "success") {
				successMsg(data.msg);
				console.log(data.count);
			} else {
				failedMsg(data.msg);
				console.log(data.count);
			}
			iqcdbgetmodeofdefectsinspection();
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function getModinspectionlist(data) {
		var cnt = 0;
		var no_of_defectives = 0;
		var qty = 0;
		var max = [];
		$.each(data, function(i,x) {
			cnt++;
			tblformodinspection = '<tr>'+
										'<td style="width: 8%">'+
											'<input type="checkbox" class="modinspection_checkitem checkboxes" value="'+x.id+'">'+
										'</td>'+
										'<td style="width: 12%">'+
											'<a href="javascript:;" class="btn blue input-sm modinspection_edititem" data-mod="'+x.mod+'" data-qty="'+x.qty+'" data-id="'+x.id+'">'+
												'<i class="fa fa-edit"></i>'+
											'</a>'+
										'</td>'+
										'<td style="width: 5%">'+cnt+'</td>'+
										'<td style="width: 55%">'+x.mod+'</td>'+
										'<td style="width: 20%">'+x.qty+'</td>'+
									'</tr>';

			if (x.qty == $('#sample_size').val()) {
				no_of_defectives = x.qty;
			} else {
				max.push(x.qty);
				no_of_defectives = Math.max.apply(null,max);
			}
			//no_of_defectives = parseFloat(no_of_defectives) + parseFloat(x.qty);
			
			qty = parseFloat(qty) + parseFloat(x.qty);
			$('#tblformodinspection').append(tblformodinspection);
		});
		$('#mod_count').val(cnt);
		$('#mod_total_qty').val(qty);
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
									'<td style="width:11.11%"></td>'+
									'<td style="width:11.11%">'+x.lot_inspected+'</td>'+
		        					'<td style="width:11.11%">'+x.lot_accepted+'</td>'+
		                            '<td style="width:11.11%">'+reject+'</td>'+
		                            '<td style="width:11.11%">'+x.sample_size+'</td>'+
		                            '<td style="width:11.11%">'+x.no_of_defects+'</td>'+
		                            '<td style="width:11.11%">'+lar+'</td>'+
		                            '<td style="width:11.11%">'+lrr+'</td>'+
		                            '<td style="width:11.11%">'+dppm+'</td>'+
								'</tr>';
			$('#tblforlarlrrdppm').append(tblforlarlrrdppm);
		});
	}

	function checkFile(fileName) {
		var ext = fileName.split('.').pop();
		if (ext == 'xls' || ext == 'XLS') {
			return true
		} else {
			return false;
		}
	}

	function deleteInspection() {
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
			getIQCInspection("<?php echo e(url('/iqcdbgetiqcdata')); ?>");
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function deleteRequali() {
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
	}

	function deleteModRQ() {
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
	}

	function deleteModIns() {
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
	}

	function deleteOnGoing() {
		var url = "<?php echo e(url('/iqcdbdeleteongoing')); ?>";
		var token  = "<?php echo e(Session::token()); ?>";
		var data = {
			id: getAllChecked('.ongiong_checkitems'),
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
			getOnGoing();
		}).fail( function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

	function openModeOfDefects() {
		if ($('#lot_accepted').val() == 0) {
			$('#no_defects_label').show();
			$('#no_of_defects').show();
			$('#mode_defects_label').show();
			$('#btn_mod_ins').show();
			$('#judgement').val('Rejected');
		} else {
			$('#lot_accepted').val(1);
			$('#no_defects_label').hide();
			$('#no_of_defects').hide();
			$('#mode_defects_label').hide();
			$('#btn_mod_ins').hide();
			$('#judgement').val('Accepted');
		}
	}


	// Manual Inputs
	// function getShift_man() {
	// 	var url = "<?php echo e(url('/iqcshift')); ?>";
	// 	var token = "<?php echo e(Session::token()); ?>";
	// 	var data = {
	// 		_token: token,
	// 		from: $('#time_ins_from_man').val(),
	// 		to: $('#time_ins_to_man').val()
	// 	};

	// 	$.ajax({
	// 		url: url,
	// 		type: "GET",
	// 		data: data
	// 	}).done(function(data,textStatus,jqXHR) {
	// 		$('#shift_man').select2('data',{
	// 			 id: data,
	// 			 text: data
	// 		});
	// 	}).fail(function(data,textStatus,jqXHR) {
	// 		failedMsg("There's some error while processing.");
	// 	});
 //    }

	function samplingPlan_man() {
		var url = "<?php echo e(url('/iqcsamplingplan')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			soi: $('#severity_of_inspection_man').val(),
			il: $('#inspection_lvl_man').val(),
			aql: $('#aql_man').val(),
			lot_qty: $('#lot_qty_man').val()
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data
		}).done(function(data, textStatus, jqXHR){
			$('#accept_man').val(data.accept);
			$('#reject_man').val(data.reject);
			$('#sample_size_man').val(data.sample_size);
			$('#date_inspected_man').val(data.date_inspected);
			$('#lot_inspected_man').val(1);
			$('#inspector_man').val(data.inspector);
			$('#ww_man').val(data.workweek);
			getFiscalYear_man();
		}).fail(function(data, textStatus, jqXHR){
			failedMsg("There's some error while processing.");
		});
	}

	function getDropdowns_man() {
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
			$('#type_of_inspection_man').select2({
				data:data.tofinspection,
				placeholder: "Select Type of Inspection"
			});
			$('#severity_of_inspection_man').select2({
				data:data.sofinspection,
				placeholder: "Select Severity of Inspection"
			});
			$('#inspection_lvl_man').select2({
				data:data.inspectionlvl,
				placeholder: "Select Inspection Level"
			});
			$('#aql_man').select2({
				data:data.aql,
				placeholder: "Select AQL"
			});
			$('#shift_man').select2({
				data: data.shift,
				placeholder: "Select Shift"
			});
			$('#submission_man').select2({
				data: data.submission,
				placeholder: "Select Submission"
			});
			$('#submission_man').val('1st');
			$('#submission_man').trigger('change');

			$('#mod_inspection_man').select2({
				data: data.mod,
				placeholder: "Select Mode of Defects"
			});
		}).fail(function(data,textStatus,jqXHR) {
			failedMsg("There's some error while processing.");
		});
	}

    function getFiscalYear_man() {
        var date = new Date();
        var month = date.getMonth();
        var year = date.getFullYear();

        if (month < 3) {
            year = year - 1;
        }

        $('#fy_man').val(year);
    }

    function openModeOfDefects_man() {
		if ($('#lot_accepted_man').val() == 0) {
			$('#no_defects_label_man').show();
			$('#no_of_defects_man').show();
			$('#mode_defects_label_man').show();
			$('#btn_mod_ins_man').show();
			$('#judgement_man').val('Rejected');
		} else {
			$('#lot_accepted_man').val(1);
			$('#no_defects_label_man').hide();
			$('#no_of_defects_man').hide();
			$('#mode_defects_label_man').hide();
			$('#btn_mod_ins_man').hide();
			$('#judgement_man').val('Accepted');
		}
	}

    function saveInspection_man() {
		$('#loading').modal('show');

		//if (requiredFields(':input.required') == true) {
			var url = "<?php echo e(url('/iqcsaveinspection')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				save_status: $('#save_status_man').val(),
				id: $('#iqc_result_id_man').val(),
				invoice_no: $('#invoice_no_man').val(),
				partcode: $('#partcode_man').val(),
				partname: $('#partname_man').val(),
				supplier: $('#supplier_man').val(),
				app_date: $('#app_date_man').val(),
				app_time: $('#app_time_man').val(),
				app_no: $('#app_no_man').val(),
				lot_no: $('#lot_no_man').val(),
				lot_qty: $('#lot_qty_man').val(),
				type_of_inspection: $('#type_of_inspection_man').val(),
				severity_of_inspection: $('#severity_of_inspection_man').val(),
				inspection_lvl: $('#inspection_lvl_man').val(),
				aql: $('#aql_man').val(),
				accept: $('#accept_man').val(),
				reject: $('#reject_man').val(),
				date_inspected: $('#date_inspected_man').val(),
				ww: $('#ww_man').val(),
				fy: $('#fy_man').val(),
				time_ins_from: $('#time_ins_from_man').val(),
				time_ins_to: $('#time_ins_to_man').val(),
				shift: $('#shift_man').val(),
				inspector: $('#inspector_man').val(),
				submission: $('#submission_man').val(),
				judgement: $('#judgement_man').val(),
				lot_inspected: $('#lot_inspected_man').val(),
				lot_accepted: $('#lot_accepted_man').val(),
				sample_size: $('#sample_size_man').val(),
				no_of_defects: $('#no_of_defects_man').val(),
				remarks: $('#remarks_man').val(),
				classification: $('#classification_man').val(),
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
					$('#ManualModal').modal('hide');
					getIQCInspection("<?php echo e(url('/iqcdbgetiqcdata')); ?>");
					getOnGoing();
				}
			}).fail( function(data,textStatus,jqXHR) {
				$('#loading').modal('hide');
				failedMsg("There's some error while processing.");
			});
		// } else {
		// 	$('#loading').modal('hide');
		// 	failedMsg("Please fill out all required fields.");
		// }	
	}

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>