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
									<i class="fa fa-search"></i>  QC Database
								</div>
                                <div class="tools">
                                </div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-xs-12 hidden-md hidden-lg hidden-xl">
										<div class="btn-group pull-right">
											<button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
												IQC Inspection <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li class="active">
													<a href="<?php echo e(url('/iqcinspection')); ?>">
														<i class="fa fa-search fa-2x font-green"></i> IQC Inspection
													</a>
												</li>
												<li>
													<a href="<?php echo e(url('/oqcinspection')); ?>">
													   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
												   	</a>
												</li>
												<li>
													<a href="<?php echo e(url('/fgs')); ?>">
		 											   <i class="fa fa-line-chart fa-2x font-yellow"></i> FGS
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/packinginspection')); ?>">
		 											   <i class="fa fa-cube fa-2x font-purple"></i> Packing Inspection
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
											<a href="<?php echo e(url('/iqcinspection')); ?>" class="list-group-item active">
												<i class="fa fa-search fa-2x font-green"></i> IQC Inspection
											</a>
											<a href="<?php echo e(url('/oqcinspection')); ?>" class="list-group-item">
											   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
										   </a>
										   <a href="<?php echo e(url('/fgs')); ?>" class="list-group-item">
											   <i class="fa fa-line-chart fa-2x font-yellow"></i> FGS
										   </a>
										   <a href="<?php echo e(url('/packinginspection')); ?>" class="list-group-item">
											   <i class="fa fa-cube fa-2x font-purple"></i> Packing Inspection
										   </a>
										</div>
									</div>

									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="portlet box green" >
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
															<!-- <div class="col-sm-3">
																<a href="javascript:;" class="btn green btn-block" id="btn_checklabel">
																	<i class="fa fa-check"></i> Check Label
																</a>
															</div> -->
															<div class="col-sm-3">
																<a href="javascript:;" class="btn green btn-block" id="btn_requali">
																	<i class="fa fa-history"></i> Re-qualification
																</a>
															</div>
														</div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-hover table-bordered table-striped" id="iqcdatatable">
                                                                    <thead>
                                                                        <tr>
                                                                        	<td class="table-checkbox" style="width: 5%">
                                                                                <input type="checkbox" class="group-checkable checkAllitems" />
                                                                            </td>
                                                                            <td></td>
                                                                            <td>ID</td>
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
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tblforiqcinspection">
	                                                                	<?php foreach($tableData as $dest): ?>
	                                                                	<tr>
	                                                                		<td style="width: 2%">
	                                                                            <input type="checkbox" class="form-control input-sm checkboxes" value="<?php echo e($dest->id); ?>" name="checkitem" id="checkitem"></input> 
	                                                                        </td>                        
	                                                                        <td style="width: 5%">           
	                                                                            <button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="<?php echo e($dest->id.'|'.$dest->invoice_no.'|'.$dest->partcode.'|'.$dest->partname.'|'.$dest->supplier.'|'.$dest->app_date.'|'.$dest->app_time.'|'.$dest->app_no.'|'.$dest->lot_no.'|'.$dest->lot_qty.'|'.$dest->type_of_inspection.'|'.$dest->severity_of_inspection.'|'.$dest->inspection_lvl.'|'.$dest->aql.'|'.$dest->accept.'|'.$dest->reject.'|'.$dest->date_ispected.'|'.$dest->ww.'|'.$dest->fy.'|'.$dest->shift.'|'.$dest->time_ins_from.'|'.$dest->time_ins_to.'|'.$dest->inspector.'|'.$dest->submission.'|'.$dest->judgement.'|'.$dest->lot_inspected.'|'.$dest->lot_accepted.'|'.$dest->sample_size.'|'.$dest->no_of_defects.'|'.$dest->remarks.'|'.$dest->dbcon); ?>">
	                                                                                   <i class="fa fa-edit"></i> 
	                                                                            </button>
	                                                                        </td>
	                                                                        <td><?php echo e($dest->id); ?></td>
	                                                                        <td><?php echo e($dest->app_date); ?></td>
	                                                                        <td><?php echo e($dest->date_ispected); ?></td>
	                                                                        <td><?php echo e($dest->time_ins_from); ?></td>
	                                                                        <td><?php echo e($dest->app_no); ?></td>
	                                                                        <td><?php echo e($dest->fy); ?></td>
	                                                                        <td><?php echo e($dest->ww); ?></td>
	                                                                        <td><?php echo e($dest->submission); ?></td>
	                                                                        <td><?php echo e($dest->partcode); ?></td>
	                                                                        <td><?php echo e($dest->partname); ?></td>
	                                                                        <td><?php echo e($dest->supplier); ?></td>
	                                                                        <td><?php echo e($dest->lot_no); ?></td>
	                                                                        <td><?php echo e($dest->aql); ?></td>
	                                                                	</tr>
	                                                                	<?php endforeach; ?>
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
                                                <button type="button" onclick="javascript:inspectiondelete();" class="btn red" id="btn_delete">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                                <a href="javascript:;" class="btn purple" id="btn_search">
                                                    <i class="fa fa-search"></i> Search
                                                </a>
												<a href="javascript:;" class="btn yellow-gold" id="btn_pdf">
                                                    <i class="fa fa-file-text-o"></i> Print to Pdf
                                                </a>
                                                <a href="javascript:;" class="btn green-jungle" id="btn_excel">
                                                    <i class="fa fa-file-text-o"></i> Print to Excel
                                                </a>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_search_from" id="hd_search_from"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_search_to" id="hd_search_to"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_partcode" id="hd_partcode"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_groupfield" id="hd_groupfield"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_value" id="hd_value"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_groupfield2" id="hd_groupfield2"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_value2" id="hd_value2"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_groupfield3" id="hd_groupfield3"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_value3" id="hd_value3"/>
												<input class="form-control input-sm" type="hidden" value="" name="hd_report_status" id="hd_report_status"/>

												<input type="hidden" class="form-control input-sm clear" id="hdg1_selected" name="hdg1_selected" readonly>
												<input type="hidden" class="form-control input-sm clear" id="hdg2_selected" name="hdg2_selected" readonly>
												<input type="hidden" class="form-control input-sm clear" id="hdg3_selected" name="hdg3_selected" readonly>
											
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
										<input type="text" class="form-control input-sm clear" id="invoice_no" name="invoice_no">
										<input type="hidden" class="form-control input-sm clear" id="id" name="id">
										<div id="er_invoice_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-9">
										<!-- <input type="text" class="form-control input-sm clear" id="partcode" name="partcode"> -->
										<select class="form-control select2me input-sm clear" id="partcode" name="partcode">
											
										</select>
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
										<input type="text" class="form-control input-sm clear" id="supplier" name="supplier" readonly>
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
										<input type="text" class="form-control input-sm clear" id="app_no" name="app_no">
										<div id="er_app_no"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot No.</label>
									<div class="col-sm-9">
										<select name="lot_no" id="lot_no" class="form-control input-sm lot_no selectpicker" multiple>
										</select>
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
										<select class="form-control input-sm clear show-tick" name="type_of_inspection" id="type_of_inspection">
											<option value="">select one</option>
											<?php foreach($tofinspections as $tofinspection): ?>
											<option value="<?php echo e($tofinspection->description); ?>"><?php echo e($tofinspection->description); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_type_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Severity of Inspection</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear show-tick" name="severity_of_inspection" id="severity_of_inspection">
											<option value="">select one</option>
											<?php foreach($sofinspections as $sofinspection): ?>
											<option value="<?php echo e($sofinspection->description); ?>"><?php echo e($sofinspection->description); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_severity_of_inspection"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspection Level</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear show-tick" name="inspection_lvl" id="inspection_lvl">
											<option value="">select one</option>
											<?php foreach($inspectionlvls as $inspectionlvl): ?>
											<option value="<?php echo e($inspectionlvl->description); ?>"><?php echo e($inspectionlvl->description); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_inspection_lvl"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">AQL</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear show-tick" name="aql" id="aql">
											<option value="">select one</option>
											<?php foreach($aqls as $aql): ?>
											<option value="<?php echo e($aql->description); ?>"><?php echo e($aql->description); ?></option>
											<?php endforeach; ?>
										</select>
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
										<input class="form-control input-sm clear date-picker" type="text" value="" name="date_ispected" id="date_ispected"/>
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
										<input type="text" data-format="hh:mm A" class="form-control input-sm clear clockface_1" name="time_ins_from" id="time_ins_from"/>
										<div id="er_time_ins_from"></div>
									</div>
									<div class="col-sm-1"></div>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control input-sm clear clockface_1" name="time_ins_to" id="time_ins_to"/>
										<div id="er_time_ins_to"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Shift</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear show-tick" name="shift" id="shift">
											<option value=""></option>
											<?php foreach($shifts as $shift): ?>
											<option value="<?php echo e($shift->description); ?>"><?php echo e($shift->description); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_shift"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspector</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="inspector" name="inspector">
										<div id="er_inspector"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Submission</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear show-tick" name="submission" id="submission">
											<option value="">select one</option>
											<?php foreach($submissions as $submission): ?>
											<option value="<?php echo e($submission->description); ?>"><?php echo e($submission->description); ?></option>
											<?php endforeach; ?>
										</select>
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
										<input type="text" class="form-control input-sm clear" id="lot_inspected" name="lot_inspected">
										<div id="er_lot_inspected"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Accepted</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="lot_accepted" name="lot_accepted">
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
										<button type="button" onclick="javascript:display_mod_inspection();" class="btn blue btn_mod_ins" id="btn_mod_ins">
                                            <i class="fa fa-plus-circle"></i> Add Mode of Defects
                                        </button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3"></div>

								</div>
							</div>

						</div>

					</div>
					<div class="modal-footer">
						<button type="button" onclick="javascript:inspectionsave();" class="btn btn-success" id="btn_savemodal"><i class="fa fa-floppy-disk-o"></i>Save</button>
						<button type="button" onclick="javascript:clear_inspection();" class="btn grey-gallery" id="btn_clearmodal"><i class="fa fa-eraser"></i>Clear</button>
						<a href="javascript:;" class="btn btn-danger btn_backModal"><i class="fa fa-reply"></i>Back</a>
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
									<table class="table table-striped table-hover table-responsive table-bordered">
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
											<?php foreach($tablerq as $dest): ?>
                                        	<tr>
                                        		<td style="width: 2%">
                                                    <input type="checkbox" class="form-control input-sm checkboxesrq" value="<?php echo e($dest->id); ?>" name="checkitemrq" id="checkitemrq"></input> 
                                                </td>                        
                                                <td style="width: 5%">           
                                                    <button type="button" name="edit-taskrq" class="btn btn-sm btn-primary edit-taskrq" value="<?php echo e($dest->id.'|'.$dest->partcode_rq.'|'.$dest->partname_rq.'|'.$dest->supplier_rq.'|'.$dest->app_date_rq.'|'.$dest->app_time_rq.'|'.$dest->app_no_rq.'|'.$dest->lot_no_rq.'|'.$dest->lot_qty_rq.'|'.$dest->date_ispected_rq.'|'.$dest->ww_rq.'|'.$dest->fy_rq.'|'.$dest->shift_rq.'|'.$dest->time_ins_from_rq.'|'.$dest->time_ins_to_rq.'|'.$dest->inspector_rq.'|'.$dest->submission_rq.'|'.$dest->judgement_rq.'|'.$dest->lot_inspected_rq.'|'.$dest->lot_accepted_rq.'|'.$dest->no_of_defects_rq.'|'.$dest->remarks_rq.'|'.$dest->ctrl_no_rq.'|'.$dest->dbcon_rq); ?>">
                                                           <i class="fa fa-edit"></i> 
                                                    </button>
                                                </td>
                                                <td><?php echo e($dest->ctrl_no_rq); ?></td>
                                                <td><?php echo e($dest->partcode_rq); ?></td>
                                                <td><?php echo e($dest->partname_rq); ?></td>
                                                <td><?php echo e($dest->lot_no_rq); ?></td>
                                                <td><?php echo e($dest->app_date_rq); ?></td>
                                                <td><?php echo e($dest->app_time_rq); ?></td>
                                                <td><?php echo e($dest->app_no_rq); ?></td>
                                        	</tr>
                                        	<?php endforeach; ?>	
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
										<input type="text" class="form-control input-sm" id="ctrl_no_rq" name="ctrl_no_rq">
										<div id="er_ctrl_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Part Code</label>
									<div class="col-sm-9">
										<select class="form-control select2me input-sm clear" id="partcode_rq" name="partcode_rq">
											<option value=""></option>
											<?php foreach($iqctable as $pcode): ?>
											<option value="<?php echo e($pcode->item); ?>"><?php echo e($pcode->item); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_partcode_rq"></div>
										<input type="hidden" class="form-control input-sm clear" id="id_rq" name="id_rq" readonly>
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
									<label class="control-label col-sm-3">Application Ctrl No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="app_no_rq" name="app_no_rq">
										<div id="er_app_no_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot No.</label>
									<div class="col-sm-9">
										<select name="lot_no_rq" id="lot_no_rq" class="form-control input-sm lot_no_rq selectpicker" multiple>
										</select>
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
										<input class="form-control input-sm clear date-picker" type="text" name="date_ispected_rq" id="date_ispected_rq"/>
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
										<input type="text" data-format="hh:mm A" class="form-control input-sm clear clockface_1" name="time_ins_from_rq" id="time_ins_from_rq"/>
										<div id="er_time_ins_from_rq"></div>
									</div>
									<div class="col-sm-1"></div>
									<div class="col-sm-4">
										<input type="text" data-format="hh:mm A" class="form-control input-sm clear clockface_1" name="time_ins_to_rq" id="time_ins_to_rq"/>
										<div id="er_time_ins_to_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Shift</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear show-tick" name="shift_rq" id="shift_rq">
											<option value=""></option>
											<?php foreach($shifts as $shift): ?>
											<option value="<?php echo e($shift->description); ?>"><?php echo e($shift->description); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_shift_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Inspector</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" name="inspector_rq" id="inspector_rq"/>
										<div id="er_inspector_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Submission</label>
									<div class="col-sm-9">
										<select class="form-control input-sm clear show-tick" name="submission_rq" id="submission_rq">
											<option value=""></option>
											<?php foreach($submissions as $submission): ?>
											<option value="<?php echo e($submission->description); ?>"><?php echo e($submission->description); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_submission_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Judgement</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="judgement_rq" name="judgement_rq">
										<div id="er_judgement_rq"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Inspected</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="lot_inspected_rq" name="lot_inspected_rq">
										<div id="er_lot_inspected_rq"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Lot Accepted</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm clear" id="lot_accepted_rq" name="lot_accepted_rq">
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
										<button type="button" onclick="javascript:display_mod_rq();" class="btn blue btn_mod_rq" id="btn_mod_rq">
                                            <i class="fa fa-plus-circle"></i> Add Mode of Defects
                                        </button>
									</div>
								</div>
							</div>

						</div>


					</div>
					<div class="modal-footer">
						<button type="button" onclick="javascript:rqsave();" class="btn btn-success" id="btn_savemodal_rq"><i class="fa fa-floppy-disk-o"></i>Save</button>
						<button type="button" onclick="javascript:deleteAllcheckedrequali();" class="btn btn-success red"><i class="fa fa-trash"></i>Delete</button>
						<a href="javascript:;" class="btn grey-gallery btn_clearModal" id="btn_clearmodal_rq"><i class="fa fa-eraser"></i>Clear</a>
						<a href="javascript:;" id="btn_back_rq" class="btn btn-danger btn_backModal"><i class="fa fa-reply"></i>Back</a>
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
										<select class="form-control input-sm show-tick" name="mod_inspection" id="mod_inspection">
											<option value="">select one</option>
											<?php foreach($mods as $mod): ?>
											<option value="<?php echo e($mod->description); ?>"><?php echo e($mod->description); ?></option>
											<?php endforeach; ?>
										</select>
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
										<button type="button" onclick="javascript:inspection_save();" id="" class="btn btn-sm green pull-right">Save</button>
										<button type="button" onclick="javascript:deleteAllcheckedinspection();" id="" class="btn btn-sm red pull-right">Delete</button>
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
											<option value="">select one</option>
											<?php foreach($mods as $mod): ?>
											<option value="<?php echo e($mod->description); ?>"><?php echo e($mod->description); ?></option>
											<?php endforeach; ?>
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
										<select class="form-control input-sm show-tick" name="mod_requalification" id="mod_requalification">
											<option value="">select one</option>
											<?php foreach($mods as $mod): ?>
											<option value="<?php echo e($mod->description); ?>"><?php echo e($mod->description); ?></option>
											<?php endforeach; ?>
										</select>
										<div id="er_modrq"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">Quantity</label>
									<div class="col-sm-9">
										<input type="text" id="qty_requalification" name="qty_requalification" class="form-control input-sm">
										<input type="hidden" id="status_requalification" name="status_requalification" class="form-control input-sm">
										<input type="hidden" id="id_requalification" name="id_requalification" class="form-control input-sm">
										<div id="er_qtyrq"></div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<button type="button" onclick="javascript:requalification_save();" id="btn_add_mod" class="btn btn-sm green pull-right">Save</button>
										<button type="button" onclick="javascript:deleteAllcheckedrq();" id="" class="btn btn-sm red pull-right">Delete</button>
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

						<div class="row">
							<div class="col-sm-12">
								<label class="control-label col-sm-2"></label>
								<div class="col-sm-3">
									<!-- <input type="text" class="form-control datepicker input-sm " id="groupby_datefrom" name="groupby_datefrom">   -->   
                                </div>
                                <div class="col-sm-3">
	                                    <!-- <input type="text" class="form-control datepicker input-sm " id="groupby_dateto" name="groupby_dateto"> -->
	                            </div>
							</div>
						</div>
                        <br>
				
						<br>
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label col-sm-2">Date From</label>
								<div class="col-sm-5">
									<input type="text" class="form-control datepicker input-sm " id="groupby_datefrom" name="groupby_datefrom">     
                                </div>
                                <div class="col-sm-5">
	                                    <input type="text" class="form-control datepicker input-sm " id="groupby_dateto" name="groupby_dateto">
	                            </div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label col-sm-2">Group #1</label>
								<div class="col-sm-5">
									<select class="form-control select2me input-sm show-tick" name="group1" id="group1">
										<option value=""></option>
										<option value="id">ID</option>
										<option value="date_ispected">Inspection Date</option>
										<option value="time_ins_from">Inspection Time	</option>
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
									<select class="form-control select2me input-sm show-tick" name="group1content" id="group1content">
									<!-- append here -->
									</select>
								</div>
								<div class="col-sm-2">
	                            	<label class="control-label col-sm-1" id=""><!-- g1 --></label>
	                            </div>
	                            <div class="col-sm-2">
	                            	<label class="control-label col-sm-1" id=""><!-- g1 --></label>
	                            </div>
							</div>	
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label col-sm-2">Group #2</label>
								<div class="col-sm-5">
									<select class="form-control select2me input-sm show-tick" name="group2" id="group2">
										<option value=""></option>
										<option value="id">ID</option>
										<option value="date_ispected">Inspection Date</option>
										<option value="time_ins_from">Inspection Time	</option>
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
									<select class="form-control select2me input-sm show-tick" name="group2content" id="group2content">
									<!-- append here -->
									<option value=""></option>	
									</select>
								</div>
								<div class="col-sm-2">
	                            	<label class="control-label col-sm-1" id=""><!-- g2 --></label>
	                            </div>
	                            <div class="col-sm-2">
	                            	<label class="control-label col-sm-1" id=""><!-- g2 --></label>
	                            </div>
							</div>	
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label col-sm-2">Group #3</label>
								<div class="col-sm-5">
									<select class="form-control select2me input-sm show-tick" name="group3" id="group3">
										<option value=""></option>
										<option value="id">ID</option>
										<option value="date_ispected">Inspection Date</option>
										<option value="time_ins_from">Inspection Time	</option>
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
									<select class="form-control select2me input-sm show-tick" name="group3content" id="group3content">
									<!-- append here -->
									</select>
								</div>
								<div class="col-sm-2">
	                            	<label class="control-label col-sm-1" id=""><!-- g3 --></label>
	                            </div>
	                            <div class="col-sm-2">
	                            	<label class="control-label col-sm-1" id=""><!-- g3 --></label>
	                            </div>
							</div>	
						</div>
					</div>	
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
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
					<div class="modal-footer">
						<button type="button" onclick="javascript:groupby();" class="btn btn-success" id="">OK</button>
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
										<select class="form-control select2me input-sm clear" id="search_partcode" name="search_partcode">
											<option value=""></option>
											<?php foreach($iqctable as $pcode): ?>
											<option value="<?php echo e($pcode->item); ?>"><?php echo e($pcode->item); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">From</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_from" id="search_from"/>
										<!-- <div id="er_search_from"></div> -->
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">To</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_to" id="search_to"/>
										<!-- <div id="er_search_to"></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" onclick="javascript:searchby();" class="btn btn-success">OK</button>
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
$(function() {
	lot_accepted();
	lot_accepted_rq();
	$('#groupby_datefrom').datepicker();
	$('#groupby_dateto').datepicker();
    $('#iqcdatatable').DataTable();

    $('#groupby_datefrom').on('change',function(){
          $(this).datepicker('hide');
    });
    $('#groupby_dateto').on('change',function(){
          $(this).datepicker('hide');
    });

//-------------------------------------------------------------------------------------BUTTON ADD NEW-------------------------------------
	$('#btn_addnew').on('click', function (){
		$('#AddNewModal').modal('show');
	});	
//-------------------------------------------------------------------------------------BUTTON MODE OF DEFECTS-------------------------------------
	$('.btn_mode_of_defects').on('click', function() {
		$('#ModeOfDefectsModal').modal('show');
	});
//-------------------------------------------------------------------------------------BUTTON GROUPBY------------------------------------
	$('#btn_groupby').on('click', function() {
		$('#GroupByModal').modal('show');
		$('#groupby_datefrom').val("");
		$('#groupby_dateto').val("");
		$('#group1').select2('val',"");
		$('#group1content').select2('val',"");
		$('#group2').select2('val',"");
		$('#group2content').select2('val',"");
		$('#group3').select2('val',"");
		$('#group3content').select2('val',"");
		$('#group4').select2('val',"");
		$('#group4content').select2('val',"");
		$('#group5').select2('val',"");
		$('#group5content').select2('val',"");
		$('#hd_report_status').val("GROUPBY");
		$('#hd_search_from').val("");
        $('#hd_search_to').val("");
		$('#hd_partcode').val("");
		$('#lbl_percentage').html("");
		$('#lbl_val').html("");
		$.ajax({
			url:"<?php echo e(url('/get_iqcpercentage')); ?>",
			method:'get',
		}).done(function(data, textStatus, jqXHR){
			var total_lot_ok = data[0]['lot_accepted'];
			var total_lot_inspected = data[0]['lot_qty'];
			var quotient = total_lot_ok/total_lot_inspected;
			$('#lbl_percentage').append(total_lot_ok +'/'+ total_lot_inspected);
			$('#lbl_val').append((quotient * 100).toFixed(2));
		}).fail(function(jqXHR,textStatus,errorThrown){
			console.log(errorThrown+'|'+textStatus);
		});
	});
//-------------------------------------------------------------------------------------BUTTON SEARCH-------------------------------------
	$('#btn_search').on('click', function() {
        $('#SearchModal').modal('show');
        $('#search_partcode').select2('val',"");
        $('#search_from').val("");
        $('#search_to').val("");

        $('#er_search_from').html(""); 
        $('#er_search_to').html(""); 

        //to classify group by when reporting----------
        $('#hd_report_status').val("SEARCH");
        $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        $('#hd_groupfield').val("");
        $('#hd_value').val("");

    });

//--------------------------------------------------------------------------------------ADD NEW RECORDS IN BUTTON INSPECTION-------------------------------------
	$('#btn_iqcresult').on('click', function() {
		$('#AddNewModal').modal('hide');
		$('#IQCresultModal').modal('show');
		$('#inspectionstatus').val("ADD");
		$('input[name=invoice_no]').val("");
	    $('select[name=partcode]').select2('val',"");
	    $('input[name=partname]').val("");
	    $('input[name=supplier]').val("");
	    $('input[name=category]').val("");
	    $('select[name=family]').val("");
	    $('input[name=app_date]').val("");
	    $('input[name=app_time]').val("");
	    $('input[name=app_no]').val("");
	    $('#lot_no').html('').selectpicker('refresh')
	    $('input[name=lot_qty]').val("");

	    $('select[name=type_of_inspection]').val("");
	    $('select[name=severity_of_inspection]').val("");
	    $('select[name=inspection_lvl]').val("");
	    $('select[name=aql]').val("");
	    $('input[name=accept]').val("");
	    $('input[name=reject]').val("");

	    $('input[name=date_ispected]').val("");
	   	$('input[name=ww]').val("");
	    $('input[name=fy]').val("");
	    $('select[name=shift]').val("");
	    $('input[name=time_ins_from]').val("");
	    $('input[name=time_ins_to]').val("");
		$('select[name=submission]').val("");
		$('input[name=judgement]').val("");

		$('input[name=lot_inspected]').val("");
		$('input[name=lot_accepted]').val("");
		$('input[name=sample_size]').val("");
		$('input[name=no_of_defects]').val("");
		$('input[name=remarks]').val("");
		lot_accepted();
	});
//-------------------------------------------------------------------------------------BUTTON CLEAR INSPECTION-------------------------------------
	$('#btn_clearmodal').click(function(){
		$('input[name=id]').val("");
        $('input[name=invoice_no]').val("");
	    $('#partcode').select2('val',"");
	    $('input[name=partname]').val("");
	    $('input[name=supplier]').val("");
	    $('input[name=category]').val("");
	    $('select[name=family]').val("");
	    $('input[name=app_date]').val("");
	    $('input[name=app_time]').val("");
	    $('input[name=app_no]').val("");
	    $('#lot_no').val('').selectpicker('refresh')
	    $('input[name=lot_qty]').val("");

	    $('select[name=type_of_inspection]').val("");
	    $('select[name=severity_of_inspection]').val("");
	    $('select[name=inspection_lvl]').val("");
	    $('select[name=aql]').val("");
	    $('input[name=accept]').val("");
	    $('input[name=reject]').val("");

	    $('input[name=date_ispected]').val("");
	   	$('input[name=ww]').val("");
	    $('input[name=fy]').val("");
	    $('select[name=shift]').val("");
	    $('input[name=time_ins_from]').val("");
	    $('input[name=time_ins_to]').val("");
		$('select[name=submission]').val("");
		$('input[name=judgement]').val("");

		$('input[name=lot_inspected]').val("");
		$('input[name=lot_accepted]').val("");
		$('input[name=sample_size]').val("");
		$('input[name=no_of_defects]').val("");
		$('input[name=remarks]').val("");
	});

//-------------------------------------------------------------------------------------ADD NEW RECORDS IN BUTTON REQUALIFICATION-------------------------------------
	$('#btn_requali').on('click', function() {
		$('#AddNewModal').modal('hide');
		$('#ReQualiModal').modal('show');
		$('#status_rq').val("ADD");
		$('#partcode_rq').select2('val',"");
	    $('#partname_rq').val("");
	    $('#supplier_rq').val("");
	    $('#category_rq').val("");
	    $('#family_rq').val("");
	    $('#app_date_rq').val("");
	    $('#app_time_rq').val("");
	    $('#app_no_rq').val("");
	    $('#lot_no_rq').html('').selectpicker('refresh')
	    $('#lot_qty_rq').val("");

	    $('#date_ispected_rq').val("");
	    $('#ww_rq').val("");
	    $('#fy_rq').val("");
	    $('#shift_rq').val("");
	    $('#time_ins_from_rq').val("");
	    $('#time_ins_to_rq').val("");
		$('#submission_rq').val("");
		$('#judgement_rq').val("");

		$('#lot_inspected_rq').val("");
		$('#lot_accepted_rq').val("");
		$('#no_of_defects_rq').val("");
		$('#remarks_rq').val();
		lot_accepted_rq();
	});
//-------------------------------------------------------------------------------------BUTTON CLEAR REQUALIFICATION-------------------------------------
	$('#btn_clearmodal_rq').click(function(){
		$('#partcode_rq').val("");
	    $('#partname_rq').select('val',"");
	    $('#supplier_rq').val("");
	    $('#category_rq').val("");
	    $('#family_rq').val("");
	    $('#app_date_rq').val("");
	    $('#app_time_rq').val("");
	    $('#app_no_rq').val("");
	    $('#lot_no').val('').selectpicker('refresh')
	    $('#lot_qty_rq').val("");

	    $('#date_ispected_rq').val("");
	    $('#ww_rq').val("");
	    $('#fy_rq').val("");
	    $('#shift_rq').val("");
	    $('#time_ins_from_rq').val("");
	    $('#time_ins_to_rq').val("");
		$('#submission_rq').val("");
		$('#judgement_rq').val("");

		$('#lot_inspected_rq').val("");
		$('#lot_accepted_rq').val("");
		$('#no_of_defects_rq').val("");
		$('#remarks_rq').val();
	});

//-------------------------------------------------------------------------------------BACK BUTTON------------------------------------
	$('.btn_backModal').on('click', function () {
		if ($('#IQCresultModal').hasClass('in')) {
			$('#IQCresultModal').modal('hide');
			$('#AddNewModal').modal('show');
		}

		if ($('#CheckLabelModal').hasClass('in')) {
			$('#CheckLabelModal').modal('hide');
			$('#AddNewModal').modal('show');
		}

		if ($('#ReQualiModal').hasClass('in')) {
			$('#ReQualiModal').modal('hide');
			$('#AddNewModal').modal('show');
		}
	});
	$('#btn_mod_ins').click(function(){
		$('#mod_inspectionModal').modal('show');
		$('#status_inspection').val("ADD");	
		$('#mod_inspection').val("");
		$('#qty_inspection').val("");
		$('#er_mod').html(""); 
		$('#er_qty').html("");
	});

	$('#btn_mod_rq').click(function(){
		$('#mod_requalificationModal').modal('show');
		$('#status_requalification').val("ADD");
		$('#mod_requalification').val("");
		$('#qty_requalification').val("");
		$('#er_modrq').html("");
		$('#er_qtyrq').html("");			
	});

	$('#lot_accepted').on('change', function() {
		lot_accepted();
	});     

	$('#lot_accepted_rq').on('change', function() {
		lot_accepted_rq();
	});

	$('.checkAllitems').change(function(){
        if($('.checkAllitems').is(':checked')){
            $('.deleteAll-task').removeClass("disabled");
            $('#add').addClass("disabled");
            $('input[name=checkitem]').parents('span').addClass("checked");
            $('input[name=checkitem]').prop('checked',this.checked);
        }else{
            $('input[name=checkitem]').parents('span').removeClass("checked");
            $('input[name=checkitem]').prop('checked',this.checked);
            $('.deleteAll-task').addClass("disabled");
            $('#add').removeClass("disabled");
        }       
    });

    $('.checkboxes').change(function(){
        $('input[name=checkAllitem]').parents('span').removeClass("checked");
        $('input[name=checkAllitem]').prop('checked',false);
    });
    $('.checkAllitemsrq').change(function(){
        if($('.checkAllitemsrq').is(':checked')){
            $('.deleteAll-taskrq').removeClass("disabled");
            $('#add').addClass("disabled");
            $('input[name=checkitemrq]').parents('span').addClass("checked");
            $('input[name=checkitemrq]').prop('checked',this.checked);
        }else{
            $('input[name=checkitemrq]').parents('span').removeClass("checked");
            $('input[name=checkitemrq]').prop('checked',this.checked);
            $('.deleteAll-task').addClass("disabled");
            $('#add').removeClass("disabled");
        }       
    });

    $('.checkboxesrq').change(function(){
        $('input[name=checkAllitemrq]').parents('span').removeClass("checked");
        $('input[name=checkAllitemrq]').prop('checked',false);
    });

    $('.checkAllitemsinspection').change(function(){
        if($('.checkAllitemsinspection').is(':checked')){
            $('.deleteAll-task').removeClass("disabled");
            $('#add').addClass("disabled");
            $('input[name=checkiteminspection]').parents('span').addClass("checked");
            $('input[name=checkiteminspection]').prop('checked',this.checked);
        }else{
            $('input[name=checkiteminspection]').parents('span').removeClass("checked");
            $('input[name=checkiteminspection]').prop('checked',this.checked);
            $('.deleteAll-task').addClass("disabled");
            $('#add').removeClass("disabled");
        }       
    });

    $('.checkboxesinspection').change(function(){
        $('input[name=checkAlliteminspection]').parents('span').removeClass("checked");
        $('input[name=checkAlliteminspection]').prop('checked',false);
    });
//------------------------------------------------------------------------------------Edit Button[Mode of Defect] of inspection--------
    $('.edit-taskinspection').on('click',function(){
        var field = $(this).val().split('|');
        var id = field[0];
       	$.ajax({
       		url:"<?php echo e(url('/iqc_mod_edit_ins')); ?>",
       		method:'get',
       		data:{
       			id:id
       		},
       	}).done(function(data, textStatus, jqXHR){
       		console.log(data);
       		$('#mod_inspection').val(data[0]['mod']);
       		$('#qty_inspection').val(data[0]['qty']);
       		$('#id_inspection').val(id);
       		$('#status_inspection').val("EDIT");
       	}).fail(function(jqXHR, textStatus, errorThrown){
       		console.log(errorThrown+'|'+textStatus);
       	});
    });  

//------------------------------------------------------------------------------------Edit Button[Mode of Defect] of requalification--------
    $('.edit-taskrequalification').on('click',function(){
        var field = $(this).val().split('|');
        var id = field[0];
       	$.ajax({
       		url:"<?php echo e(url('/iqc_mod_edit_rq')); ?>",
       		method:'get',
       		data:{
       			id:id
       		},
       	}).done(function(data, textStatus, jqXHR){
       		console.log(data);
       		$('#mod_requalification').val(data[0]['mod']);
       		$('#qty_requalification').val(data[0]['qty']);
       		$('#id_requalification').val(id);
       		$('#status_requalification').val("EDIT");
       	}).fail(function(jqXHR, textStatus, errorThrown){
       		console.log(errorThrown+'|'+textStatus);
       	});
    }); 	
//------------------------------------------------------------------------------------Edit Button of Inspection--------
    $('#tblforiqcinspection').on('click','.edit-task',function(){
        $('#IQCresultModal').modal('show');
        $('#inspectionstatus').val("EDIT");
        var edittext = $(this).val().split('|');
       	var id = edittext[0];
       	var partcode = edittext[2];

       	/*alert(partcode);*/
       	$('input[name=id]').val(id);
        $('input[name=invoice_no]').val(edittext[1]);

	    $('#partcode').select2('data',{id:partcode,text:partcode});

	    $('input[name=partname]').val(edittext[3]);
	    $('input[name=supplier]').val(edittext[4]);
	    $('input[name=app_date]').val(edittext[5]);
	    $('input[name=app_time]').val(edittext[6]);
	    $('input[name=app_no]').val(edittext[7]);
	    $('select[name=lot_no]').val(edittext[8]);
	    $('input[name=lot_qty]').val(edittext[9]);

	    $('select[name=type_of_inspection]').val(edittext[10]);
	    $('select[name=severity_of_inspection]').val(edittext[11]);
	    $('select[name=inspection_lvl]').val(edittext[12]);
	    $('select[name=aql]').val(edittext[13]);
	    $('input[name=accept]').val(edittext[14]);
	    $('input[name=reject]').val(edittext[15]);

	    $('input[name=date_ispected]').val(edittext[16]);
	   	$('input[name=ww]').val(edittext[17]);
	    $('input[name=fy]').val(edittext[18]);
	    $('select[name=shift]').val(edittext[19]);
	    $('input[name=time_ins_from]').val(edittext[20]);
	    $('input[name=time_ins_to]').val(edittext[21]);
	    $('select[name=inspector]').val(edittext[22]);
		$('select[name=submission]').val(edittext[23]);
		$('input[name=judgement]').val(edittext[24]);
		$('input[name=lot_inspected]').val(edittext[25]);
		$('input[name=lot_accepted]').val(edittext[26]);
		$('input[name=sample_size]').val(edittext[27]);
		$('input[name=no_of_defects]').val(edittext[28]);
		$('input[name=remarks]').val(edittext[29]);
		var invoice = edittext[1];
		var selected_lot = [];
		var cnt = 0;
		$.ajax({
			url:"<?php echo e(url('/getinvoicedetails')); ?>",
			method:'get',
			data:{
				invoiceno:invoice
			},
		}).done(function(data, textStatus, jqXHR){
			console.log(data);
		
        	$.each(data,function(i,val){
        		option = '<option value="'+ val.item +'">'+ val.item +'</option>';
        		//options.append($('<option />')).val(val.item).text(val.item);
        		$('#partcode').append(option);
        	});
        	lot_accepted();
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrow+'|'+textStatus)
		});


		$('#lot_no').html("");
		$.ajax({
			url:"<?php echo e(url('/getpartcode')); ?>",
			method:'get',
			data:{invoiceno:invoice,partcode:partcode},
		}).done(function(data, textStatus, jqXHR){
			console.log(data);
			var selected_lot = [];
			var cnt = 0;
			$.each(data, function(i,x) {
				$('#supplier').val(x.supplier);
				$('#category').val(x.box);
				$('#partname').val(x.item_desc);
				$('#app_time').val(x.created_at);
				$('#app_date').val(x.receive_date);
				$('#app_no').val(x.receive_no);
				$('#lot_no').append('<option value="'+x.lot_no+'">'+x.lot_no+'</option>');
				selected_lot[cnt] = x.lot_no;
				cnt++;
				$('#lot_qty').val(x.qty);
			});
			console.log(selected_lot);
			$('#lot_no')
				.selectpicker('refresh')
				.selectpicker('val',selected_lot);
			console.log($('#lot_no').val());
			
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrow+'|'+textStatus)
		});
		
    });

//------------------------------------------------------------------------------------Edit Button of requalification--------

    $('.edit-taskrq').on('click',function(){
        var field = $(this).val().split('|');
        var id = field[0];
       	$.ajax({
       		url:"<?php echo e(url('/rqiqcdbedit')); ?>",
       		method:'get',
       		data:{
       			id:id
       		},
       	}).done(function(data, textStatus, jqXHR){
       		console.log(data);
       		$('#status_rq').val("EDIT");
       		$('#id_rq').val(data[0]['id']);
       		$('#ctrl_no_rq').val(data[0]['ctrl_no_rq']);
       		$('#partcode_rq').select2('val',data[0]['partcode_rq']);
		    $('#partname_rq').val(data[0]['partname_rq']);
		    $('#supplier_rq').val(data[0]['supplier_rq']);
		    $('#app_date_rq').val(data[0]['app_date_rq']);
		    $('#app_time_rq').val(data[0]['app_time_rq']);
		    $('#app_no_rq').val(data[0]['app_no_rq']);
		    $('#lot_no_rq').val(data[0]['lot_no_rq']);
		    $('#lot_qty_rq').val(data[0]['lot_qty_rq']);

		    $('#date_ispected_rq').val(data[0]['date_ispected_rq']);
		    $('#ww_rq').val(data[0]['ww_rq']);
		    $('#fy_rq').val(data[0]['fy_rq']);
		    $('#shift_rq').val(data[0]['shift_rq']);
		    $('#time_ins_from_rq').val(data[0]['time_ins_from_rq']);
		    $('#time_ins_to_rq').val(data[0]['time_ins_to_rq']);
		   	$('#inspector_rq').val(data[0]['inspector_rq']);
			$('#submission_rq').val(data[0]['submission_rq']);
			$('#judgement_rq').val(data[0]['judgement_rq']);

			$('#lot_inspected_rq').val(data[0]['lot_inspected_rq']);
			$('#lot_accepted_rq').val(data[0]['lot_accepted_rq']);
			$('#no_of_defects_rq').val(data[0]['no_of_defects_rq']);
			$('#remarks_rq').val(data[0]['remarks_rq']);
			
       		lot_accepted_rq();
       	}).fail(function(jqXHR, textStatus, errorThrown){
       		console.log(errorThrown+'|'+textStatus);
       	});
    }); 	
//---------------------------------------------------------------------------------Retrieving invoiceno of Inspection--------

	$('#invoice_no').on('change', function() {
		/*var options = '';*/
		var invoice_no = $('#invoice_no').val();
		var url = "<?php echo e(url('/getinvoicedetails')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
			invoiceno : invoice_no,
        };
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
        	$('#partcode').empty();
        	
        	console.log(data);
        	$('#partcode').append('<option value=""></option>');
        	$.each(data,function(i,val){

        		option = '<option value="'+ val.item +'">'+ val.item +'</option>';
        		//options.append($('<option />')).val(val.item).text(val.item);
        		$('#partcode').append(option);
        	});
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while processing.");
        });
	});
//---------------------------------------------------------------------------------Retrieving partcode of Inspection--------

	$('#partcode').on('change', function(){
		var invoice_no = $('#invoice_no').val();
		var partcode = $('select[name=partcode]').val();
		var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
			partcode : partcode,
			invoiceno : invoice_no,
        };
        $('#lot_no').html("");
		$.ajax({
			url:"<?php echo e(url('/getpartcode')); ?>",
			method:'get',
			data:data,
		}).done(function(data, textStatus, jqXHR){
			var date = new Date();
			//getting the currnt time----------
		  	var hours = date.getHours();
		  	var minutes = date.getMinutes();
		  	var ampm = hours >= 12 ? 'PM' : 'AM';
		  	hours = hours % 12;
		  	hours = hours ? hours : 12; // the hour '0' should be '12'
		  	minutes = minutes < 10 ? '0'+minutes : minutes;
		  	var strTime = hours + ':' + minutes + ' ' + ampm;

		  	//date today
		    var month = date.getMonth()+1;
		    var day = date.getDate();
		    var output = (month<10 ? '0' : '') + month + '/' +(day<10 ? '0' : '') + day + '/' +  date.getFullYear();

			var selected_lot = [];
			var cnt = 0;
			$.each(data, function(i,x) {
				$('#supplier').val(x.supplier);
				$('#partname').val(x.item_desc);
				$('#app_time').val(strTime);
				$('#app_date').val(x.receive_date);
				$('#app_no').val(x.receive_no);
				$('#lot_no').append('<option value="'+x.lot_no+'">'+x.lot_no+'</option>');
				selected_lot[cnt] = x.lot_no;
				cnt++;
				//$('#lot_qty').val(x.qty);
				$('#date_ispected').val(output);
				$('#fy').val(date.getFullYear());
				
				$('#date_ispected').on('change',function(){
					var newweek = new Date($(this).val());
					$('#ww').val(newweek.getWeek() - 12);
				});
				var newweek = new Date($('#date_ispected').val());
				$('#ww').val(newweek.getWeek() - 12);
			});
			$('#lot_no')
			.selectpicker('refresh')
			.selectpicker('val',selected_lot);
			lot_accepted();

			//automatic display of lot qty
			auto_lot_qty();
			
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrow+'|'+textStatus)
		});
	});

	$('#lot_no').on('change',function(){
		auto_lot_qty();
	});

//---------------------------------------------------------------------------------Retrieving partcode of requalification--------
	$('#partcode_rq').on('change', function(){
		var partcode = $('select[name=partcode_rq]').val();
		var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
			partcode : partcode,
        };
        $('#lot_no_rq').html("");
		$.ajax({
			url:"<?php echo e(url('/getpartcode_rq')); ?>",
			method:'get',
			data:data,
		}).done(function(data, textStatus, jqXHR){
			var date = new Date();
			//getting the currnt time----------
		  	var hours = date.getHours();
		  	var minutes = date.getMinutes();
		  	var ampm = hours >= 12 ? 'PM' : 'AM';
		  	hours = hours % 12;
		  	hours = hours ? hours : 12; // the hour '0' should be '12'
		  	minutes = minutes < 10 ? '0'+minutes : minutes;
		  	var strTime = hours + ':' + minutes + ' ' + ampm;

		  	//date today
		    var month = date.getMonth()+1;
		    var day = date.getDate();
		    var output = (month<10 ? '0' : '') + month + '/' +(day<10 ? '0' : '') + day + '/' +  date.getFullYear();

			var selected_lot = [];
			var cnt = 0;
			
			$.each(data, function(i,x) {
				$('#supplier_rq').val(x.supplier);
				$('#category_rq').val(x.box);
				$('#partname_rq').val(x.item_desc);
				$('#app_time_rq').val(strTime);
				$('#app_date_rq').val(x.receive_date);
				$('#app_no_rq').val(x.receive_no);
				$('#lot_no_rq').append('<option value="'+x.lot_no+'">'+x.lot_no+'</option>');
				selected_lot[cnt] = x.lot_no;
				cnt++;
				$('#lot_qty_rq').val(x.qty);
				$('#date_ispected_rq').val(output);
				$('#fy_rq').val(date.getFullYear());
				
				$('#date_ispected_rq').on('change',function(){
					var newweek = new Date($(this).val());
					$('#ww_rq').val(newweek.getWeek() - 12);
				});
				var newweek = new Date($('#date_ispected_rq').val());
				$('#ww_rq').val(newweek.getWeek() - 12);
			});
			
			$('#lot_no_rq').selectpicker('refresh').selectpicker('val',selected_lot);
			$('#lot_inspected_rq').val("1");
			lot_accepted_rq();
			auto_lot_qty_rq();


		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus)
		});
	});

	$('#lot_no_rq').on('change',function(){
		auto_lot_qty_rq();
	});


	//---------------------------------------------------------------------------------Inspection input blank validation--------
	$('#invoice_no').keyup(function(){
        $('#er_invoice_no').html(""); 
    });
    $('#partcode').click(function(){
        $('#er_partcode').html(""); 
    });
    $('#partcode').on('change',function(){
        $('#er_partcode').html("");
        $('#partname').val("");
        $('#supplier').val("");
        $('#category').val("");
        $('#lot_no').val("");
        $('#lot_qty').val("");
    });
    $('#family').click(function(){
        $('#er_family').html(""); 
    });
    $('#app_no').click(function(){
        $('#er_app_no').html(""); 
    });
    $('#type_of_inspection').click(function(){
        $('#er_type_of_inspection').html(""); 
    });
    $('#severity_of_inspection').click(function(){
        $('#er_severity_of_inspection').html(""); 
    });
    $('#inspection_lvl').click(function(){
        $('#er_inspection_lvl').html(""); 
    });
    $('#aql').click(function(){
        $('#er_aql').html(""); 
    });
    $('#accept').click(function(){
        $('#er_accept').html(""); 
    });
    $('#reject').click(function(){
        $('#er_reject').html(""); 
    });
    $('#date_ispected').click(function(){
        $('#er_date_ispected').html(""); 
    });
    $('#ww').keyup(function(){
        $('#er_ww').html(""); 
    });
    $('#fy').keyup(function(){
        $('#er_fy').html(""); 
    });
    $('#shift').click(function(){
        $('#er_shift').html(""); 
    });
    $('#time_ins_from').click(function(){
        $('#er_time_ins_from').html(""); 
    });
    $('#time_ins_to').click(function(){
        $('#er_time_ins_to').html(""); 
    });
     $('#inspector').click(function(){
        $('#er_inspector').html(""); 
    });
    $('#submission').click(function(){
        $('#er_submission').html(""); 
    });
    $('#lot_inspected').keyup(function(){
        $('#er_lot_inspected').html(""); 
    });
    $('#lot_accepted').keyup(function(){
        $('#er_lot_accepted').html(""); 
    });

    //---------------------------------------------------------------------------------------computation for Inspection Sample Size------------------
    $('#type_of_inspection').on('change',function(){
    	var type_of_inspection = $('#type_of_inspection').val();
    	var severity_of_inspection = $('#severity_of_inspection').val();
       	var sample_size = $('#sample_size').val();
      	var inspection_lvl = $('#inspection_lvl').val();
      	var aql = $('#aql').val();
      	var lot_qty = $('#lot_qty').val();
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 33){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 32){
      		$('#sample_size').val("32");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 51){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty < 14){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty > 13){
      		$('#sample_size').val("13");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty < 21){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty > 20){
      		$('#sample_size').val("20");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 50){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 80){
      		$('#sample_size').val("80");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 80){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(type_of_inspection == "Check Label"){
      		var NA = '<option value="'+"N/A"+'">N/A</option>';
      		var C1 = '<option value="'+"C1"+'">C1</option>';
      		$('#severity_of_inspection').append(NA);
      		$('#severity_of_inspection').val("N/A");
      		$('#inspection_lvl').append(NA);
      		$('#inspection_lvl').val("N/A");
      		$('#aql').append(C1);
      		$('#aql').val("C1");
      		$('#sample_size').val(0);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
    });

    $('#severity_of_inspection').on('change',function(){
    	var severity_of_inspection = $('#severity_of_inspection').val();
       	var sample_size = $('#sample_size').val();
      	var inspection_lvl = $('#inspection_lvl').val();
      	var aql = $('#aql').val();
      	var lot_qty = $('#lot_qty').val();
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 33){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 32){
      		$('#sample_size').val("32");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 51){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty < 14){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty > 13){
      		$('#sample_size').val("13");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty < 21){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty > 20){
      		$('#sample_size').val("20");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 50){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 80){
      		$('#sample_size').val("80");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 80){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
    });

    $('#inspection_lvl').on('change',function(){
    	var severity_of_inspection = $('#severity_of_inspection').val();
       	var sample_size = $('#sample_size').val();
      	var inspection_lvl = $('#inspection_lvl').val();
      	var aql = $('#aql').val();
      	var lot_qty = $('#lot_qty').val();
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 33){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 32){
      		$('#sample_size').val("32");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 51){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty < 14){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty > 13){
      		$('#sample_size').val("13");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty < 21){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty > 20){
      		$('#sample_size').val("20");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 50){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 80){
      		$('#sample_size').val("80");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 80){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
    });

    $('#aql').on('change',function(){
    	var severity_of_inspection = $('#severity_of_inspection').val();
       	var sample_size = $('#sample_size').val();
      	var inspection_lvl = $('#inspection_lvl').val();
      	var aql = $('#aql').val();
      	var lot_qty = $('#lot_qty').val();
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 33){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 32){
      		$('#sample_size').val("32");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty < 51){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.40" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty < 14){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "1.00" && lot_qty > 13){
      		$('#sample_size').val("13");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty < 21){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S2" && aql == "0.65" && lot_qty > 20){
      		$('#sample_size').val("20");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 50){
      		$('#sample_size').val("50");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Normal" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 50){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty > 80){
      		$('#sample_size').val("80");
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
      	if(severity_of_inspection == "Tightened" && inspection_lvl == "S3" && aql == "0.25" && lot_qty <= 80){
      		$('#sample_size').val(lot_qty);
      		$('#accept').val("0");
      		$('#reject').val("1");
      		$('#lot_inspected').val("1");
      	}
    });

    //---------------------------------------------------------------------------------CheckLabel input blank validation--------

    $('#invoice_no_cl').keyup(function(){
        $('#er_invoice_no_cl').html(""); 
    });
    $('#partcode_cl').click(function(){
        $('#er_partcode_cl').html(""); 
    });
    $('#partcode_cl').on('change',function(){
        $('#er_partcode_cl').html("");
        $('#partname_cl').val("");
        $('#supplier_cl').val("");
        $('#category_cl').val("");
        $('#lot_no_cl').val("");
        $('#lot_qty_cl').val("");
    });
    $('#family_cl').click(function(){
        $('#er_family_cl').html(""); 
    });
    $('#app_no_cl').click(function(){
        $('#er_app_no_cl').html(""); 
    });
  
    $('#date_ispected_cl').click(function(){
        $('#er_date_ispected_cl').html(""); 
    });
    $('#ww_cl').keyup(function(){
        $('#er_ww_cl').html(""); 
    });
    $('#fy_cl').keyup(function(){
        $('#er_fy_cl').html(""); 
    });
    $('#shift_cl').click(function(){
        $('#er_shift_cl').html(""); 
    });
    $('#time_ins_from_cl').click(function(){
        $('#er_time_ins_from_cl').html(""); 
    });
    $('#time_ins_to_cl').click(function(){
        $('#er_time_ins_to_cl').html(""); 
    });
     $('#inspector_cl').click(function(){
        $('#er_inspector_cl').html(""); 
    });
    $('#submission_cl').click(function(){
        $('#er_submission_cl').html(""); 
    });
    $('#lot_inspected_cl').keyup(function(){
        $('#er_lot_inspected_cl').html(""); 
    });
    $('#lot_accepted_cl').keyup(function(){
        $('#er_lot_accepted_cl').html(""); 
    });
   //---------------------------------------------------------------------------------Requalification input blank validation--------
   	$('#ctrl_no_rq').keyup(function(){
        $('#er_ctrl_rq').html(""); 
    });
    $('#partcode_rq').click(function(){
        $('#er_partcode_rq').html(""); 
    });
    $('#partcode_rq').click(function(){
        $('#er_partcode_rq').html(""); 
    });
    $('#partcode_rq').on('change',function(){
        $('#er_partcode_rq').html("");
        $('#partname_rq').val("");
        $('#supplier_rq').val("");
        $('#category_rq').val("");
        $('#lot_no_rq').val("");
        $('#lot_qty_rq').val("");
    });
    $('#family_rq').click(function(){
        $('#er_family_rq').html(""); 
    });
    $('#app_no_rq').click(function(){
        $('#er_app_no_rq').html(""); 
    });
  
    $('#date_ispected_rq').click(function(){
        $('#er_date_ispected_rq').html(""); 
    });
    $('#ww_rq').keyup(function(){
        $('#er_ww_rq').html(""); 
    });
    $('#fy_rq').keyup(function(){
        $('#er_fy_rq').html(""); 
    });
    $('#shift_rq').click(function(){
        $('#er_shift_rq').html(""); 
    });
    $('#time_ins_from_rq').click(function(){
        $('#er_time_ins_from_rq').html(""); 
    });
    $('#time_ins_to_rq').click(function(){
        $('#er_time_ins_to_rq').html(""); 
    });
     $('#inspector_rq').click(function(){
        $('#er_inspector_rq').html(""); 
    });
    $('#submission_rq').click(function(){
        $('#er_submission_rq').html(""); 
    });
    $('#lot_inspected_rq').keyup(function(){
        $('#er_lot_inspected_rq').html(""); 
    });
    $('#lot_accepted_rq').keyup(function(){
        $('#er_lot_accepted_rq').html(""); 
    });
    $('#search_from').click(function(){
        $('#er_search_from').html(""); 
    });
    $('#search_to').click(function(){
        $('#er_search_to').html(""); 
    });
//------------------------------------------------------------------------------------Input blank validation Mode of Defects-------------------------------
	$('#mod_inspection').click(function(){
        $('#er_mod').html(""); 
    });
    $('#mod_checklevel').click(function(){
        $('#er_modcl').html(""); 
    });
    $('#mod_requalification').click(function(){
        $('#er_modrq').html(""); 
    });
    $('#qty_inspection').keyup(function(){
        $('#er_qty').html(""); 
    });
    $('#qty_checklevel').keyup(function(){
        $('#er_qtycl').html(""); 
    });
    $('#qty_requalification').keyup(function(){
        $('#er_qtyrq').html(""); 
    });
//------------------------------------------------------------------------------------Getting the Shift Value of Inspection-----------------
    $('#time_ins_to').focusout(function(){
    	var timefrom = $('#time_ins_from').val().split(':');
    	var timefromhr = timefrom[0];
    	var temptimefrommin = timefrom[1];
    	var constanttimefrommin = temptimefrommin.split(" ");
    	var timefrommin=constanttimefrommin[0];
    	var timefromdd=constanttimefrommin[1];
    	var timeto = $('#time_ins_to').val().split(':');
    	var timetohr = timeto[0];
    	
    	var temptimetomin = timeto[1];
    	var constanttimetomin = temptimetomin.split(" ");
    	var timetomin=constanttimetomin[0];
    	var timetodd=constanttimetomin[1];

    	var now = new Date();
		var hour = now.getHours();
		var mintues = now.getMinutes();
	
		if(timefromdd == "PM"){
            var ntimefromhr = parseInt(timefromhr) + 12;
            var ntimefrommin = parseInt(timefrommin) + 60;
        }
        if(timefromdd == "AM"){
            var ntimefromhr = parseInt(timefromhr);
            var ntimefrommin = parseInt(timefrommin);
        }
        if(timetodd == "PM"){
            var ntimetohr = parseInt(timetohr) + 12;
            var ntimetomin = parseInt(timetomin) + 60;
        }
         if(timetodd == "AM"){
            var ntimetohr = parseInt(timetohr);
            var ntimetomin = parseInt(timetomin);
        }

        var shift = '';
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr <= 19 && ntimetomin <= 90){
            shift = "Shift A";
        }
       	if(ntimefromhr > 07 && ntimefrommin <= 30 && ntimetohr >= 07 && ntimetomin >= 30){
           shift = "Shift A";
        }
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr > 07 && ntimetomin <= 30){
           shift = "Shift A";
        }
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr == 24 && ntimetomin >= 30){
           shift = "Shift A";
        }

        
   
        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr <= 07 && ntimetomin <= 30){
           shift = "Shift B";
        }
        if(ntimefromhr > 19 && ntimefrommin <= 90 && ntimetohr >= 19 && ntimetomin >= 90){
           shift = "Shift B";
        }
        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr > 19 && ntimetomin <= 90){
           shift = "Shift B";
        }
        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr == 12 && ntimetomin <= 90){
           shift = "Shift B";
        }
 
        $('#shift').val(shift);
      
    });	
//------------------------------------------------------------------------------------Getting the No. of Defectives Value of Inspection-----------------

//------------------------------------------------------------------------------------Getting the Shift Value of Checklabel-----------------
    $('#time_ins_to_cl').focusout(function(){
    	var timefrom = $('#time_ins_from_cl').val().split(':');
    	var timefromhr = timefrom[0];
    	var temptimefrommin = timefrom[1];
    	var constanttimefrommin = temptimefrommin.split(" ");
    	var timefrommin=constanttimefrommin[0];
    	var timefromdd=constanttimefrommin[1];
    	var timeto = $('#time_ins_to_cl').val().split(':');
    	var timetohr = timeto[0];
    	
    	var temptimetomin = timeto[1];
    	var constanttimetomin = temptimetomin.split(" ");
    	var timetomin=constanttimetomin[0];
    	var timetodd=constanttimetomin[1];
    	
    	var now = new Date();
		var hour = now.getHours();
		var mintues = now.getMinutes();111
		if(timefromdd == "PM"){
            var ntimefromhr = parseInt(timefromhr) + 12;
            var ntimefrommin = parseInt(timefrommin) + 60;
        }
        if(timefromdd == "AM"){
            var ntimefromhr = parseInt(timefromhr);
            var ntimefrommin = parseInt(timefrommin);
        }
        if(timetodd == "PM"){
            var ntimetohr = parseInt(timetohr) + 12;
            var ntimetomin = parseInt(timetomin) + 60;
        }
         if(timetodd == "AM"){
            var ntimetohr = parseInt(timetohr);
            var ntimetomin = parseInt(timetomin);
        }

        var shift = '';
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr <= 19 && ntimetomin <= 90){
            shift = "Shift A";
        }
       	if(ntimefromhr > 07 && ntimefrommin <= 30 && ntimetohr >= 07 && ntimetomin >= 30){
           shift = "Shift A";
        }
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr > 07 && ntimetomin <= 30){
           shift = "Shift A";
        }
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr == 24 && ntimetomin >= 30){
           shift = "Shift A";
        }
   


        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr <= 07 && ntimetomin <= 30){
           shift = "Shift B";
        }
        if(ntimefromhr > 19 && ntimefrommin <= 90 && ntimetohr >= 19 && ntimetomin >= 90){
           shift = "Shift B";
        }
        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr > 19 && ntimetomin <= 90){
           shift = "Shift B";
        }
        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr == 12 && ntimetomin <= 90){
           shift = "Shift B";
        }
        $('#shift_cl').val(shift);
    });
//------------------------------------------------------------------------------------Getting the Shift Value of Requalification-----------------
    $('#time_ins_to_rq').focusout(function(){
    	var timefrom = $('#time_ins_from_rq').val().split(':');
    	var timefromhr = timefrom[0];
    	var temptimefrommin = timefrom[1];
    	var constanttimefrommin = temptimefrommin.split(" ");
    	var timefrommin=constanttimefrommin[0];
    	var timefromdd=constanttimefrommin[1];
    	var timeto = $('#time_ins_to_rq').val().split(':');
    	var timetohr = timeto[0];
    	
    	var temptimetomin = timeto[1];
    	var constanttimetomin = temptimetomin.split(" ");
    	var timetomin=constanttimetomin[0];
    	var timetodd=constanttimetomin[1];
    	
    	var now = new Date();
		var hour = now.getHours();
		var mintues = now.getMinutes();
		if(timefromdd == "PM"){
            var ntimefromhr = parseInt(timefromhr) + 12;
            var ntimefrommin = parseInt(timefrommin) + 60;
        }
        if(timefromdd == "AM"){
            var ntimefromhr = parseInt(timefromhr);
            var ntimefrommin = parseInt(timefrommin);
        }
        if(timetodd == "PM"){
            var ntimetohr = parseInt(timetohr) + 12;
            var ntimetomin = parseInt(timetomin) + 60;
        }
         if(timetodd == "AM"){
            var ntimetohr = parseInt(timetohr);
            var ntimetomin = parseInt(timetomin);
        }

        var shift = '';
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr <= 19 && ntimetomin <= 90){
            shift = "Shift A";
        }
       	if(ntimefromhr > 07 && ntimefrommin <= 30 && ntimetohr >= 07 && ntimetomin >= 30){
           shift = "Shift A";
        }
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr > 07 && ntimetomin <= 30){
           shift = "Shift A";
        }
        if(ntimefromhr >= 07 && ntimefrommin >= 30 && ntimetohr == 24 && ntimetomin >= 30){
           shift = "Shift A";
        }
   


        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr <= 07 && ntimetomin <= 30){
           shift = "Shift B";
        }
        if(ntimefromhr > 19 && ntimefrommin <= 90 && ntimetohr >= 19 && ntimetomin >= 90){
           shift = "Shift B";
        }
        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr > 19 && ntimetomin <= 90){
           shift = "Shift B";
        }
        if(ntimefromhr >= 19 && ntimefrommin >= 90 && ntimetohr == 12 && ntimetomin <= 90){
           shift = "Shift B";
        }
        $('#shift_rq').val(shift);
    });
    //button print to excel -----------------------------------------
    $('#btn_excel').on('click', function() {
    	var partcode = $('#hd_partcode').val();
    	var datefrom = $('#hd_search_from').val();
		var dateto = $('#hd_search_to').val();
		var groupfield = $('#hd_groupfield').val();
		var groupvalue = $('#hd_value').val();
		var groupfield2 = $('#hd_groupfield2').val();
		var groupvalue2 = $('#hd_value2').val();
		var groupfield3 = $('#hd_groupfield3').val();
		var groupvalue3 = $('#hd_value3').val();
		var status = $('#hd_report_status').val();

		var url = "<?php echo e(url('/iqcprintreportexcel?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&partcode=" + partcode+ "&groupfield=" + groupfield+ "&groupvalue=" + groupvalue+ "&groupfield2=" + groupfield2+ "&groupvalue2=" + groupvalue2+ "&groupfield3=" + groupfield3+ "&groupvalue3=" + groupvalue3+ "&status=" + status;
		window.location.href= url;
	/*	$('#hd_search_from').val("");
    	$('#hd_search_to').val("");
    	$('#hd_partcode').val("");
    	$('#hd_groupfield').val("");
		$('#hd_value').val("");
		$('#hd_groupfield2').val("");
		$('#hd_value2').val("");
		$('#hd_groupfield3').val("");
		$('#hd_value3').val("");
		$('#hd_report_status').val("");
	*/
    });
    //button print to pdf---------------------------------------------
    $('#btn_pdf').on('click', function() {
    	var partcode = $('#hd_partcode').val();
    	var datefrom = $('#hd_search_from').val();
		var dateto = $('#hd_search_to').val();
		var groupfield = $('#hd_groupfield').val();
		var groupvalue = $('#hd_value').val();
		var groupfield2 = $('#hd_groupfield2').val();
		var groupvalue2 = $('#hd_value2').val();
		var groupfield3 = $('#hd_groupfield3').val();
		var groupvalue3 = $('#hd_value3').val();
		var status = $('#hd_report_status').val();
		
		var url = "<?php echo e(url('/iqcprintreport?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&partcode=" + partcode+ "&groupfield=" + groupfield+ "&groupvalue=" + groupvalue+ "&groupfield2=" + groupfield2+ "&groupvalue2=" + groupvalue2+ "&groupfield3=" + groupfield3+ "&groupvalue3=" + groupvalue3+ "&status=" + status;
		window.location.href= url;
	/*	$('#hd_search_from').val("");
    	$('#hd_search_to').val("");
    	$('#hd_partcode').val("");
    	$('#hd_groupfield').val("");
		$('#hd_value').val("");
		$('#hd_groupfield2').val("");
		$('#hd_value2').val("");
		$('#hd_groupfield3').val("");
		$('#hd_value3').val("");
		$('#hd_groupfield4').val("");
		$('#hd_value4').val("");
		$('#hd_groupfield5').val("");
		$('#hd_value5').val("");
		$('#hd_report_status').val("");*/
	
    });


	$('#group1').on('change',function(){
		var g1 = $('select[name=group1]').val();
		var myData = {g1:g1};
		$('#group1content').html("");
		$('#tblforiqcinspection').html("");
		$.post("<?php echo e(url('/iqcdbselectgroupby1')); ?>",
		{
			_token:$('meta[name=csrf-token]').attr('content'),
			data:myData

		}).done(function(data, textStatus, jqXHR){
			console.log(data);
			$.each(data,function(i,val){
				var sup = '';
				switch(g1) {
					case "date_ispected":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.date_ispected+'">'+val.date_ispected+'</option>';
				        break;
			        case "partname":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partname+'">'+val.partname+'</option>';
				        break;
			        case "time_ins_from":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.time_ins_from+'">'+val.time_ins_from+'</option>';
				        break;
			        case "app_no":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.app_no+'">'+val.app_no+'</option>';
				        break;
			        case "fy":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.fy+'">'+val.fy+'</option>';
				        break;
			        case "ww":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.ww+'">'+val.ww+'</option>';
				        break;
				    case "submission":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.submission+'">'+val.submission+'</option>';
				        break;
				    case "partcode":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partcode+'">'+val.partcode+'</option>';
				        break;
				    case "partname":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partname+'">'+val.partname+'</option>';
				        break;
			        case "supplier":
			        	var sup = '<option value=""></option>'+
			        	'<option value="'+val.supplier+'">'+val.supplier+'</option>';
			       		break;
				    case "aql":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.aql+'">'+val.aql+'</option>';
				        break;
				    default:
				     	var sup = '<option value=""></option>';
				}
				var option = sup;
				$('#group1content').append(option);
			});
		
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus);
		});
	});

	$('#group2').on('change',function(){
		var g2 = $('select[name=group2]').val();
		var myData = {g2:g2};
		$('#group2content').html("");
		$('#tblforiqcinspection').html("");
		$.post("<?php echo e(url('/iqcdbselectgroupby1')); ?>",
		{
			_token:$('meta[name=csrf-token]').attr('content'),
			data:myData

		}).done(function(data, textStatus, jqXHR){
			console.log(data);
			/*$('#group1content').val(data);*/
			$.each(data,function(i,val){
				var sup = '';
				switch(g2) {
					case "date_ispected":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.date_ispected+'">'+val.date_ispected+'</option>';
				        break;
			        case "partname":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partname+'">'+val.partname+'</option>';
				        break;
			        case "time_ins_from":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.time_ins_from+'">'+val.time_ins_from+'</option>';
				        break;
			        case "app_no":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.app_no+'">'+val.app_no+'</option>';
				        break;
			        case "fy":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.fy+'">'+val.fy+'</option>';
				        break;
			        case "ww":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.ww+'">'+val.ww+'</option>';
				        break;
				    case "submission":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.submission+'">'+val.submission+'</option>';
				        break;
				    case "partcode":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partcode+'">'+val.partcode+'</option>';
				        break;
				    case "partname":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partname+'">'+val.partname+'</option>';
				        break;
			        case "supplier":
			        	var sup = '<option value=""></option>'+
			        	'<option value="'+val.supplier+'">'+val.supplier+'</option>';
			       		break;
				    case "aql":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.aql+'">'+val.aql+'</option>';
				        break;
				    default:
				     	var sup = '<option value=""></option>';
				}
					
				//var option = '<option value="'+val.supplier'">'+val.supplier'</option>';
				var option = sup;
				$('#group2content').append(option);
			});
		
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus);
		});
	});

	$('#group3').on('change',function(){
		var g3 = $('select[name=group3]').val();
		var myData = {g3:g3};
		$('#group3content').html("");
		$('#tblforiqcinspection').html("");
		$.post("<?php echo e(url('/iqcdbselectgroupby1')); ?>",
		{
			_token:$('meta[name=csrf-token]').attr('content'),
			data:myData

		}).done(function(data, textStatus, jqXHR){
			console.log(data);
			/*$('#group1content').val(data);*/
			$.each(data,function(i,val){
				var sup = '';
				switch(g3) {
					case "date_ispected":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.date_ispected+'">'+val.date_ispected+'</option>';
				        break;
			        case "partname":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partname+'">'+val.partname+'</option>';
				        break;
			        case "time_ins_from":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.time_ins_from+'">'+val.time_ins_from+'</option>';
				        break;
			        case "app_no":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.app_no+'">'+val.app_no+'</option>';
				        break;
			        case "fy":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.fy+'">'+val.fy+'</option>';
				        break;
			        case "ww":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.ww+'">'+val.ww+'</option>';
				        break;
				    case "submission":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.submission+'">'+val.submission+'</option>';
				        break;
				    case "partcode":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partcode+'">'+val.partcode+'</option>';
				        break;
				    case "partname":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.partname+'">'+val.partname+'</option>';
				        break;
			        case "supplier":
			        	var sup = '<option value=""></option>'+
			        	'<option value="'+val.supplier+'">'+val.supplier+'</option>';
			       		break;
				    case "aql":
				        var sup = '<option value=""></option>'+
				        '<option value="'+val.aql+'">'+val.aql+'</option>';
				        break;
				    default:
				     	var sup = '<option value=""></option>'+
				     	'<option value=""></option>';
				}
					
				//var option = '<option value="'+val.supplier'">'+val.supplier'</option>';
				var option = sup;
				$('#group3content').append(option);
			});
		
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus);
		});
	});

	

    $('input[name=inspector]').val("<?php echo e(Auth::user()->user_id); ?>");
    $('input[name=inspector_cl]').val("<?php echo e(Auth::user()->user_id); ?>");
    $('input[name=inspector_rq]').val("<?php echo e(Auth::user()->user_id); ?>");
});//----------------------------------------end of script------------------------------------------------------------------------------
function display_mod_inspection(){
	var invoice = $('input[name=invoice_no]').val();
	var partcode = $('select[name=partcode]').val();
	$('#tblformodinspection').html("");
	$.ajax({
		url:"<?php echo e(url('/displaymodins')); ?>",
		method:'get',
		data:{
			insinvoice:invoice,
			inspartcode:partcode
		},
	}).done(function(data, textStatus,jqXHR){
		console.log(data);
		$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesinspection" value="'+val.id+'" name="checkiteminspection" id="checkiteminspection"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskinspection" class="btn btn-sm btn-primary edit-taskinspection" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodinspection').append(tblrow);
            $('#mod_inspection').val("");
	       	$('#qty_inspection').val("");
	       	$('#id_inspection').val("");
	       	$('#status_inspection').val("ADD");
	       	$('.edit-taskinspection').on('click',function(){
	        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_ins')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_inspection').val(data[0]['mod']);
		       		$('#qty_inspection').val(data[0]['qty']);
		       		$('#id_inspection').val(id);
		       		$('#status_inspection').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });  	
    	});
	}).fail(function(jqXHR, textStatus, errorThrown){
		console.log(errorThrown+'|'+textStatus);
	});
}
function display_mod_cl(){
	var invoice = $('input[name=invoice_no_cl]').val();
	var partcode = $('select[name=partcode_cl]').val();
	$('#tblformodchecklevel').html("");
	$.ajax({
		url:"<?php echo e(url('/displaymodcl')); ?>",
		method:'get',
		data:{
			clinvoice:invoice,
			clpartcode:partcode
		},
	}).done(function(data, textStatus,jqXHR){
		console.log(data);
		$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxeschecklevel" value="'+val.id+'" name="checkitemchecklevel" id="checkitemchecklevel"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskchecklevel" class="btn btn-sm btn-primary edit-taskchecklevel" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodchecklevel').append(tblrow);
            $('#mod_checklevel').val("");
	       	$('#qty_checklevel').val("");
	       	$('#id_checklevel').val("");
	       	$('#status_checklevel').val("ADD");
	       	$('.edit-taskchecklevel').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_cl')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_checklevel').val(data[0]['mod']);
		       		$('#qty_checklevel').val(data[0]['qty']);
		       		$('#id_checklevel').val(id);
		       		$('#status_checklevel').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
	}).fail(function(jqXHR,textStatus,errorThrown){
		console.log(errorThrown+'|'+textStatus);
	});
}
function display_mod_rq(){
	var partcode = $('select[name=partcode_rq]').val();
	$('#tblformodrequalification').html("");
	$.ajax({
		url:"<?php echo e(url('/displaymodrq')); ?>",
		method:'get',
		data:{
			partcode:partcode
		},
	}).done(function(data, textStatus,jqXHR){
		console.log(data);
		$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesrequalification" value="'+val.id+'" name="checkitemrequalification" id="checkitemrequalification"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskrequalification" class="btn btn-sm btn-primary edit-taskrequalification" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodrequalification').append(tblrow);
            $('#mod_requalification').val("");
	       	$('#qty_requalification').val("");
	       	$('#id_requalification').val("");
	       	$('#status_requalification').val("ADD");
	       	$('.edit-taskrequalification').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_rq')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_requalification').val(data[0]['mod']);
		       		$('#qty_requalification').val(data[0]['qty']);
		       		$('#id_requalification').val(id);
		       		$('#status_requalification').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
	}).fail(function(jqXHR,textStatus,errorThrown){
		console.log(errorThrown+'|'+textStatus);
	});
}
function lot_accepted() {
	var lot_acc = $('#lot_accepted').val();
	if (lot_acc == '0') {
		$('#judgement').val('Reject');
		$('#no_of_defects').show();
		$('#btn_mode_of_defects').show();
		$('#no_defects_label').show();
		$('#mode_defects_label').show();
		$('#btn_mod_ins').show();
		/*$('#no_of_defects').val("0");*/
		var invoice_no = $('input[name=invoice_no]').val();
		var partcode = $('select[name=partcode]').val();
		$.ajax({
			url:"<?php echo e(url('/get_no_of_defectives_ins')); ?>",
			method:'get',
			data:{
				invoice:invoice_no,
				partcode:partcode
			},
		}).done(function(data, textStatus, jqXHR){
			console.log(data);
			$('#no_of_defects').val(data[0]['qty']);
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus)
		});
	} else {
		$('#judgement').val('Accept')
		$('#no_of_defects').hide();
		$('#btn_mode_of_defects').hide();
		$('#no_defects_label').hide();
		$('#mode_defects_label').hide();
		$('#btn_mod_ins').hide();
	}
}
function lot_accepted_cl() {
	var lot_acc = $('#lot_accepted_cl').val();
	if (lot_acc == '0') {
		$('#judgement_cl').val('Reject');
		$('#no_of_defects_cl').show();
		$('#btn_mode_of_defects_cl').show();
		$('#no_defects_label_cl').show();
		$('#mode_defects_label_cl').show();
		$('#btn_mod_cl').show();
		var invoice_no = $('input[name=invoice_no_cl]').val();
		var partcode = $('select[name=partcode_cl]').val();
		$.ajax({
			url:"<?php echo e(url('/get_no_of_defectives_cl')); ?>",
			method:'get',
			data:{
				invoice:invoice_no,
				partcode:partcode
			},
		}).done(function(data, textStatus, jqXHR){
			console.log(data);
			$('#no_of_defects_cl').val(data[0]['qty']);
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus)
		});
	} else {
		$('#judgement_cl').val('Accept')
		$('#no_of_defects_cl').hide();
		$('#btn_mode_of_defects_cl').hide();
		$('#no_defects_label_cl').hide();
		$('#mode_defects_label_cl').hide();
		$('#btn_mod_cl').hide();
	}
}
function lot_accepted_rq() {
	var lot_acc = $('#lot_accepted_rq').val();
	if (lot_acc == '0') {
		$('#judgement_rq').val('Reject');
		$('#no_of_defects_rq').show();
		$('#btn_mode_of_defects_rq').show();
		$('#no_defects_label_rq').show();
		$('#mode_defects_label_rq').show();
		$('#btn_mod_rq').show();
		var partcode = $('select[name=partcode_rq]').val();
		$.ajax({
			url:"<?php echo e(url('/get_no_of_defectives_rq')); ?>",
			method:'get',
			data:{
				partcode:partcode
			},
		}).done(function(data, textStatus, jqXHR){
			console.log(data);
			$('#no_of_defects_rq').val(data[0]['qty']);
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus)
		});
	} else {
		$('#judgement_rq').val('Accept')
		$('#no_of_defects_rq').hide();
		$('#btn_mode_of_defects_rq').hide();
		$('#no_defects_label_rq').hide();
		$('#mode_defects_label_rq').hide();
		$('#btn_mod_rq').hide();
	}
}
function inspectionsave(){
	/*alert('hi');*/
	var id = $('input[name=id]').val();
	var status = $('input[name=inspectionstatus]').val();
    var invoice_no = $('input[name=invoice_no]').val();
    var partcode = $('select[name=partcode]').val();
    var partname = $('input[name=partname]').val();
    var supplier = $('input[name=supplier]').val();
    var app_date = $('input[name=app_date]').val();
    var app_time = $('input[name=app_time]').val();
    var app_no = $('input[name=app_no]').val();
    var lot_no = $('#lot_no').val();
    var lot_qty = $('input[name=lot_qty]').val();

    var type_of_inspection = $('select[name=type_of_inspection]').val();
    var severity_of_inspection = $('select[name=severity_of_inspection]').val();
    var inspection_lvl = $('select[name=inspection_lvl]').val();
    var aql = $('select[name=aql]').val();
    var accept = $('input[name=accept]').val();
    var reject = $('input[name=reject]').val();

    var date_ispected = $('input[name=date_ispected]').val();
    var ww = $('input[name=ww]').val();
    var fy = $('input[name=fy]').val();
    var shift = $('select[name=shift]').val();
    var time_ins_from = $('input[name=time_ins_from]').val();
    var time_ins_to = $('input[name=time_ins_to]').val();
    var inspector = $('input[name=inspector]').val();
	var submission = $('select[name=submission]').val();
	var judgement = $('input[name=judgement]').val();

	var lot_inspected = $('input[name=lot_inspected]').val();
	var lot_accepted = $('input[name=lot_accepted]').val();
	var sample_size = $('input[name=sample_size]').val();
	var no_of_defects = $('input[name=no_of_defects]').val();
	var remarks = $('input[name=remarks]').val();
	var dbcon = "<?php echo e(Auth::user()->productline); ?>";

	if(invoice_no == ""){     
        $('#er_invoice_no').html("Invoice Number field is empty"); 
        $('#er_invoice_no').css('color', 'red');       
        return false;  
    }
    if(partcode == ""){     
        $('#er_partcode').html("Partcode field is empty"); 
        $('#er_partcode').css('color', 'red');       
        return false;  
    }  
    if(partname == ""){     
        $('#er_partname').html("Part Name field is empty"); 
        $('#er_partname').css('color', 'red');       
        return false;  
    }
    if(supplier == ""){     
        $('#er_supplier').html("Supplier field is empty"); 
        $('#er_supplier').css('color', 'red');       
        return false;  
    }
    if(app_no == ""){     
        $('#er_app_no').html("Application Number field is empty"); 
        $('#er_app_no').css('color', 'red');       
         return false;  
    }
    if(lot_no == ""){     
        $('#er_lot_no').html("Lot Number field is empty"); 
        $('#er_lot_no').css('color', 'red');       
        return false;  
    }
    if(lot_qty == ""){     
        $('#er_lot_qty').html("Lot Quantity field is empty"); 
        $('#er_lot_qty').css('color', 'red');       
        return false;  
    }
    if(type_of_inspection == ""){     
        $('#er_type_of_inspection').html("Type of Inspection field is empty"); 
        $('#er_type_of_inspection').css('color', 'red');       
          return false;  
    }
    if(severity_of_inspection == ""){     
        $('#er_severity_of_inspection').html("Severity of Inspection field is empty"); 
        $('#er_severity_of_inspection').css('color', 'red');       
          return false;  
    }
    if(inspection_lvl == ""){     
        $('#er_inspection_lvl').html("Inspection Level field is empty"); 
        $('#er_inspection_lvl').css('color', 'red');       
        return false;  
    }
    if(aql == ""){     
        $('#er_aql').html("AQL field is empty"); 
        $('#er_aql').css('color', 'red');       
        return false;  
    }
    if(accept == ""){     
        $('#er_accept').html("Accept field is empty"); 
        $('#er_accept').css('color', 'red');       
        return false;  
    }
    if(reject == ""){     
        $('#er_reject').html("reject field is empty"); 
        $('#er_reject').css('color', 'red');       
        return false;  
    }
    if(date_ispected == ""){     
        $('#er_date_ispected').html("Date Ispected field is empty"); 
        $('#er_date_ispected').css('color', 'red');       
        return false;  
    }
    if(ww == ""){     
        $('#er_ww').html("WW field is empty"); 
        $('#er_ww').css('color', 'red');       
        return false;  
    }
    if(fy == ""){     
        $('#er_fy').html("FY field is empty"); 
        $('#er_fy').css('color', 'red');       
        return false;  
    }
    if(shift == ""){     
        $('#er_shift').html("FY Number field is empty"); 
        $('#er_shift').css('color', 'red');       
        return false;  
    }
    if(time_ins_from == ""){     
        $('#er_time_ins_from').html("Time Inspected From field is empty"); 
        $('#er_time_ins_from').css('color', 'red');       
        return false;  
    }
    if(time_ins_to == ""){     
        $('#er_time_ins_to').html("Time Inspected To field is empty"); 
        $('#er_time_ins_to').css('color', 'red');       
        return false;  
    }
    if(inspector == ""){     
        $('#er_inspector').html("Inspector field is empty"); 
        $('#er_inspector').css('color', 'red');       
        return false;  
    }
    if(submission == ""){     
        $('#er_submission').html("Submission field is empty"); 
        $('#er_submission').css('color', 'red');       
        return false;  
    }
    if(judgement == ""){     
        $('#er_judgement').html("Judgement field is empty"); 
        $('#er_judgement').css('color', 'red');       
        return false;  
    }
    if(lot_inspected == ""){     
        $('#er_lot_inspected').html("Lot Inspected field is empty"); 
        $('#er_lot_inspected').css('color', 'red');       
        return false;  
    }
    if(lot_accepted == ""){     
        $('#er_lot_accepted').html("Lot Accepted field is empty"); 
        $('#er_lot_accepted').css('color', 'red');       
        return false;  
    }
    if(sample_size == ""){     
        $('#er_sample_size').html("Sample Size field is empty"); 
        $('#er_sample_size').css('color', 'red');       
        return false;  
    }

    $.post("<?php echo e(url('/iqcdbsave')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        id:id,
        invoice_no:invoice_no,
        partcode:partcode,
        partname:partname,
        supplier:supplier,
        app_date:app_date,
        app_time:app_time,
        app_no:app_no,
        lot_no:lot_no,
        lot_qty:lot_qty,
        type_of_inspection:type_of_inspection,
        severity_of_inspection:severity_of_inspection,
        inspection_lvl:inspection_lvl,
        aql:aql,
        accept:accept,
        reject:reject,
        date_ispected:date_ispected,
        ww:ww,
        fy:fy,
        shift:shift,
        time_ins_from:time_ins_from,
        time_ins_to:time_ins_to,
        inspector:inspector,
        submission:submission,
        judgement:judgement,
        lot_inspected:lot_inspected,
        lot_accepted:lot_accepted,
        sample_size:sample_size,
        no_of_defects:no_of_defects,
        remarks:remarks,
        dbcon:dbcon,
        status:status
    }).done(function(data, textStatus, jqXHR){
        window.location.href="<?php echo e(url('/iqcinspection')); ?>";
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function checklabelsave(){
	var id_cl = $('input[name=id_cl]').val();
	var status_cl = $('input[name=status_cl]').val();
    var invoice_no_cl = $('input[name=invoice_no_cl]').val();
    var partcode_cl = $('select[name=partcode_cl]').val();
    var partname_cl = $('input[name=partname_cl]').val();
    var supplier_cl = $('input[name=supplier_cl]').val();
    var app_date_cl = $('input[name=app_date_cl]').val();
    var app_time_cl = $('input[name=app_time_cl]').val();
    var app_no_cl = $('input[name=app_no_cl]').val();
    var lot_no_cl = $('#lot_no_cl').val();
    var lot_qty_cl = $('input[name=lot_qty_cl]').val();

    var date_ispected_cl = $('input[name=date_ispected_cl]').val();
    var ww_cl = $('input[name=ww_cl]').val();
    var fy_cl = $('input[name=fy_cl]').val();
    var shift_cl = $('select[name=shift_cl]').val();
    var time_ins_from_cl = $('input[name=time_ins_from_cl]').val();
    var time_ins_to_cl = $('input[name=time_ins_to_cl]').val();
    var inspector_cl = $('input[name=inspector_cl]').val();
	var submission_cl = $('select[name=submission_cl]').val();
	var judgement_cl = $('input[name=judgement_cl]').val();

	var lot_inspected_cl = $('input[name=lot_inspected_cl]').val();
	var lot_accepted_cl = $('input[name=lot_accepted_cl]').val();
	var no_of_defects_cl = $('input[name=no_of_defects_cl]').val();
	var remarks_cl = $('input[name=remarks_cl]').val();
	var dbcon_cl = "<?php echo e(Auth::user()->productline); ?>";

	if(invoice_no_cl == ""){     
        $('#er_invoice_no_cl').html("Invoice Number field is empty"); 
        $('#er_invoice_no_cl').css('color', 'red');              
        return false;  
    }
    if(partcode_cl == ""){     
        $('#er_partcode_cl').html("Partcode field is empty"); 
        $('#er_partcode_cl').css('color', 'red');       
        return false;  
    }  
    if(partname_cl == ""){     
        $('#er_partname_cl').html("Part Name field is empty"); 
        $('#er_partname_cl').css('color', 'red');       
        return false;  
    }
    if(supplier_cl == ""){     
        $('#er_supplier_cl').html("Supplier field is empty"); 
        $('#er_supplier_cl').css('color', 'red');       
        return false;  
    }
    if(app_no_cl == ""){     
        $('#er_app_no_cl').html("Application Number field is empty"); 
        $('#er_app_no_cl').css('color', 'red');       
         return false;  
    }
    if(lot_no_cl == ""){     
        $('#er_lot_no_cl').html("Lot Number field is empty"); 
        $('#er_lot_no_cl').css('color', 'red');       
        return false;  
    }
    if(lot_qty_cl == ""){     
        $('#er_lot_qty_cl').html("Lot Quantity field is empty"); 
        $('#er_lot_qty_cl').css('color', 'red');       
        return false;  
    }
    if(date_ispected_cl == ""){     
        $('#er_date_ispected_cl').html("Date Ispected field is empty"); 
        $('#er_date_ispected_cl').css('color', 'red');       
        return false;  
    }
    if(ww_cl== ""){     
        $('#er_ww_cl').html("WW field is empty"); 
        $('#er_ww_cl').css('color', 'red');       
        return false;  
    }
    if(fy_cl == ""){     
        $('#er_fy_cl').html("FY field is empty"); 
        $('#er_fy_cl').css('color', 'red');       
        return false;  
    }
    if(shift_cl == ""){     
        $('#er_shift_cl').html("FY Number field is empty"); 
        $('#er_shift_cl').css('color', 'red');       
        return false;  
    }
    if(time_ins_from_cl == ""){     
        $('#er_time_ins_from_cl').html("Time Inspected From field is empty"); 
        $('#er_time_ins_from_cl').css('color', 'red');       
        return false;  
    }
    if(time_ins_to_cl == ""){     
        $('#er_time_ins_to_cl').html("Time Inspected To field is empty"); 
        $('#er_time_ins_to_cl').css('color', 'red');       
        return false;  
    }
    if(inspector_cl == ""){     
        $('#er_inspector_cl').html("Inspector field is empty"); 
        $('#er_inspector_cl').css('color', 'red');       
        return false;  
    }
    if(submission_cl == ""){     
        $('#er_submission_cl').html("Submission field is empty"); 
        $('#er_submission_cl').css('color', 'red');       
        return false;  
    }
    if(lot_inspected_cl == ""){     
        $('#er_lot_inspected_cl').html("Lot Inspected field is empty"); 
        $('#er_lot_inspected_cl').css('color', 'red');       
        return false;  
    }
    if(lot_accepted_cl == ""){     
        $('#er_lot_accepted_cl').html("Lot Accepted field is empty"); 
        $('#er_lot_accepted_cl').css('color', 'red');       
        return false;  
    }

    $.post("<?php echo e(url('/cliqcdbsave')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        id:id_cl,
        invoice_no:invoice_no_cl,
        partcode:partcode_cl,
        partname:partname_cl,
        supplier:supplier_cl,
        app_date:app_date_cl,
        app_time:app_time_cl,
        app_no:app_no_cl,
        lot_no:lot_no_cl,
        lot_qty:lot_qty_cl,
       
        date_ispected:date_ispected_cl,
        ww:ww_cl,
        fy:fy_cl,
        shift:shift_cl,
        time_ins_from:time_ins_from_cl,
        time_ins_to:time_ins_to_cl,
        inspector:inspector_cl,
        submission:submission_cl,
        judgement:judgement_cl,

        lot_inspected:lot_inspected_cl,
        lot_accepted:lot_accepted_cl,
        no_of_defects:no_of_defects_cl,
        remarks:remarks_cl,
        dbcon:dbcon_cl,
        status:status_cl
    }).done(function(data, textStatus, jqXHR){
    	console.log(data);
        window.location.href="<?php echo e(url('/iqcinspection')); ?>";
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function rqsave(){
	/*alert('hi');*/
	var id_rq = $('input[name=id_rq]').val();
	var status_rq = $('input[name=status_rq]').val();    
	var ctrl_no_rq = $('input[name=ctrl_no_rq]').val();
    var partcode_rq = $('select[name=partcode_rq]').val();
    var partname_rq = $('input[name=partname_rq]').val();
    var supplier_rq = $('input[name=supplier_rq]').val();
    var app_date_rq = $('input[name=app_date_rq]').val();
    var app_time_rq = $('input[name=app_time_rq]').val();
    var app_no_rq = $('input[name=app_no_rq]').val();
    var lot_no_rq = $('#lot_no_rq').val();
    var lot_qty_rq = $('input[name=lot_qty_rq]').val();

    var date_ispected_rq = $('input[name=date_ispected_rq]').val();
    var ww_rq = $('input[name=ww_rq]').val();
    var fy_rq = $('input[name=fy_rq]').val();
    var shift_rq = $('select[name=shift_rq]').val();
    var time_ins_from_rq = $('input[name=time_ins_from_rq]').val();
    var time_ins_to_rq = $('input[name=time_ins_to_rq]').val();
    var inspector_rq = $('input[name=inspector_rq]').val();
	var submission_rq = $('select[name=submission_rq]').val();
	var judgement_rq = $('input[name=judgement_rq]').val();

	var lot_inspected_rq = $('input[name=lot_inspected_rq]').val();
	var lot_accepted_rq = $('input[name=lot_accepted_rq]').val();
	var no_of_defects_rq = $('input[name=no_of_defects_rq]').val();
	var remarks_rq = $('input[name=remarks_rq]').val();
	var dbcon_rq = "<?php echo e(Auth::user()->productline); ?>";

	if(ctrl_no_rq == ""){     
        $('#er_ctrl_rq').html("Ctrl Number field is empty"); 
        $('#er_ctrl_rq').css('color', 'red');       
        return false;  
    }
    if(partcode_rq == ""){     
        $('#er_partcode_rq').html("Partcode field is empty"); 
        $('#er_partcode_rq').css('color', 'red');       
        return false;  
    }  
    if(partname_rq == ""){     
        $('#er_partname_rq').html("Part Name field is empty"); 
        $('#er_partname_rq').css('color', 'red');       
        return false;  
    }
    if(supplier_rq == ""){     
        $('#er_supplier_rq').html("Supplier field is empty"); 
        $('#er_supplier_rq').css('color', 'red');       
        return false;  
    }
    if(app_date_rq == ""){     
        $('#er_app_date_rq').html("Family field is empty"); 
        $('#er_app_date_rq').css('color', 'red');       
        return false;  
    }
     if(app_time_rq == ""){     
        $('#er_app_time_rq').html("Family field is empty"); 
        $('#er_app_time_rq').css('color', 'red');       
        return false;  
    }
    if(app_no_rq == ""){     
        $('#er_app_no_rq').html("Application Number field is empty"); 
        $('#er_app_no_rq').css('color', 'red');       
         return false;  
    }
    if(lot_no_rq == ""){     
        $('#er_lot_no_rq').html("Lot Number field is empty"); 
        $('#er_lot_no_rq').css('color', 'red');       
        return false;  
    }
    if(lot_qty_rq == ""){     
        $('#er_lot_qty_rq').html("Lot Quantity field is empty"); 
        $('#er_lot_qty_rq').css('color', 'red');       
        return false;  
    }
   
    if(date_ispected_rq == ""){     
        $('#er_date_ispected_rq').html("Date Ispected field is empty"); 
        $('#er_date_ispected_rq').css('color', 'red');       
        return false;  
    }
    if(ww_rq == ""){     
        $('#er_ww_rq').html("WW field is empty"); 
        $('#er_ww_rq').css('color', 'red');       
        return false;  
    }
    if(fy_rq == ""){     
        $('#er_fy_rq').html("FY field is empty"); 
        $('#er_fy_rq').css('color', 'red');       
        return false;  
    }
    if(shift_rq == ""){     
        $('#er_shift_rq').html("FY Number field is empty"); 
        $('#er_shift_rq').css('color', 'red');       
        return false;  
    }
    if(time_ins_from_rq == ""){     
        $('#er_time_ins_from_rq').html("Time Inspected From field is empty"); 
        $('#er_time_ins_from_rq').css('color', 'red');       
        return false;  
    }
    if(time_ins_to_rq == ""){     
        $('#er_time_ins_to_rq').html("Time Inspected To field is empty"); 
        $('#er_time_ins_to_rq').css('color', 'red');       
        return false;  
    }
    if(inspector_rq == ""){     
        $('#er_inspector_rq').html("Inspector field is empty"); 
        $('#er_inspector_rq').css('color', 'red');       
        return false;  
    }
    if(submission_rq == ""){     
        $('#er_submission_rq').html("Submission field is empty"); 
        $('#er_submission_rq').css('color', 'red');       
        return false;  
    }
   
    if(lot_inspected_rq == ""){     
        $('#er_lot_inspected_rq').html("Lot Inspected field is empty"); 
        $('#er_lot_inspected_rq').css('color', 'red');       
        return false;  
    }
    if(lot_accepted_rq == ""){     
        $('#er_lot_accepted_rq').html("Lot Accepted field is empty"); 
        $('#er_lot_accepted_rq').css('color', 'red');       
        return false;  
    }
	$('#rq_inspection_body').html("");
    $.post("<?php echo e(url('/rqiqcdbsave')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        id:id_rq,
        ctrl_no:ctrl_no_rq,
        partcode:partcode_rq,
        partname:partname_rq,
        supplier:supplier_rq,
        app_date:app_date_rq,
        app_time:app_time_rq,
        app_no:app_no_rq,
        lot_no:lot_no_rq,
        lot_qty:lot_qty_rq,
       
        date_ispected:date_ispected_rq,
        ww:ww_rq,
        fy:fy_rq,
        shift:shift_rq,
        time_ins_from:time_ins_from_rq,
        time_ins_to:time_ins_to_rq,
        inspector:inspector_rq,
        submission:submission_rq,
        judgement:judgement_rq,

        lot_inspected:lot_inspected_rq,
        lot_accepted:lot_accepted_rq,
        no_of_defects:no_of_defects_rq,
        remarks:remarks_rq,
        dbcon:dbcon_rq,
        status:status_rq
    }).done(function(data, textStatus, jqXHR){
    	console.log(data);
    	$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesrq" value="'+val.id+'" name="checkitemrq" id="checkitemrq"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskrq" class="btn btn-sm btn-primary edit-taskrq" value="'+val.id+ '|' +val.partcode_rq+ '|' +val.partname_rq+ '|' +val.supplier_rq+ '|' +val.category_rq+ '|' +val.family_rq+ '|' +val.app_date_rq+ '|' +val.app_time_rq+ '|' +val.app_no_rq+ '|' +val.lot_no_rq+ '|' +val.lot_qty_rq+ '|' +val.date_ispected_rq+ '|' +val.ww_rq+ '|' +val.fy_rq+ '|' +val.shift+ '|' +val.time_ins_from+ '|' +val.time_ins_to+ '|' +val.inspector+ '|' +val.submission+ '|' +val.judgement+ '|' +val.lot_inspected+ '|' +val.lot_accepted_rq+ '|' +val.no_of_defects_rq+ '|' +val.remarks_rq+ '|' +val.ctrl_no_rq+ '|' +val.dbcon_rq+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.ctrl_no_rq+'</td>'+
                            '<td>'+val.partcode_rq+'</td>'+
                            '<td>'+val.partname_rq+'</td>'+
                            '<td>'+val.lot_no_rq+'</td>'+
                            '<td>'+val.app_date_rq+'</td>'+
                            '<td>'+val.app_time_rq+'</td>'+
                            '<td>'+val.app_no_rq+'</td>'+
                        '</tr>';
            $('#rq_inspection_body').append(tblrow);
            $('#partcode_rq').val("");
		    $('#partname_rq').val("");
		    $('#supplier_rq').val("");
		    $('#app_date_rq').val("");
		    $('#app_time_rq').val("");
		    $('#app_no_rq').val("");
		    $('#lot_no_rq').val("");
		    $('#lot_qty_rq').val("");

		    $('#date_ispected_rq').val("");
		    $('#ww_rq').val("");
		    $('#fy_rq').val("");
		    $('#shift_rq').val("");
		    $('#time_ins_from_rq').val("");
		    $('#time_ins_to_rq').val("");
		   	$('#inspector_rq').val("");
			$('#submission_rq').val("");
			$('#judgement_rq').val("");

			$('#lot_inspected_rq').val("");
			$('#lot_accepted_rq').val("");
			$('#no_of_defects_rq').val("");
			$('#remarks_rq').val("");
			$('#status_rq').val("ADD");
			$('.edit-taskrq').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/rqiqcdbedit')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#id_rq').val(data[0]['id	']);
		       		$('#ctrl_no_rq').val(data[0]['ctrl_no_rq']);
		       		$('#partcode_rq').select2('val',data[0]['partcode_rq']);
				    $('#partname_rq').val(data[0]['partname_rq']);
				    $('#supplier_rq').val(data[0]['supplier_rq']);
				    $('#app_date_rq').val(data[0]['app_date_rq']);
				    $('#app_time_rq').val(data[0]['app_time_rq']);
				    $('#app_no_rq').val(data[0]['app_no_rq']);
				    $('#lot_no_rq').val(data[0]['lot_no_rq']);
				    $('#lot_qty_rq').val(data[0]['lot_qty_rq']);

				    $('#date_ispected_rq').val(data[0]['date_ispected_rq']);
				    $('#ww_rq').val(data[0]['ww_rq']);
				    $('#fy_rq').val(data[0]['fy_rq']);
				    $('#shift_rq').val(data[0]['shift_rq']);
				    $('#time_ins_from_rq').val(data[0]['time_ins_from_rq']);
				    $('#time_ins_to_rq').val(data[0]['time_ins_to_rq']);
				   	$('#inspector_rq').val(data[0]['inspector_rq']);
					$('#submission_rq').val(data[0]['submission_rq']);
					$('#judgement_rq').val(data[0]['judgement_rq']);

					$('#lot_inspected_rq').val(data[0]['lot_inspected_rq']);
					$('#lot_accepted_rq').val(data[0]['lot_accepted_rq']);
					$('#no_of_defects_rq').val(data[0]['no_of_defects_rq']);
					$('#remarks_rq]').val(data[0]['remarks_rq']);
			       	$('#status_rq').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
	}).fail(function(jqXHR, textStatus, errorThrown){
   		console.log(errorThrown+'|'+textStatus);
   	});
}
function inspectiondelete(){
    var tray = [];
    $('.checkboxes:checked').each(function(){
        tray.push($(this).val());
    });

    var traycount = tray.length;
    $.ajax({
            url:"<?php echo e(url('/iqcdbdelete')); ?>",
            method:'get',
            data:{ 
                tray : tray,
                traycount : traycount
            },          
    }).done(function(data, textStatus, jqXHR){
        window.location.href="<?php echo e(url('/iqcinspection')); ?>";
       /*console.log(data);*/
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function inspection_save(){
	var mod = $('select[name=mod_inspection]').val();
	var qty = $('#qty_inspection').val();
	var status = $('#status_inspection').val();
	var id = $('#id_inspection').val();
	var invoice_no = $('input[name=invoice_no]').val();
	var partcode = $('select[name=partcode]').val();
	if(mod == ""){
		$('#er_mod').html("Mode of Defect field is empty");
		$('#er_mod').css('color','red');
		return false;
	}
	if(qty == ""){
		$('#er_qty').html("Quantity field is empty");
		$('#er_qty').css('color','red');
		return false;
	}
	$('#tblformodinspection').html("");
	$.post("<?php echo e(url('/iqc_mod_ins')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        mod:mod,
        qty:qty,
        status:status,
        id:id,
        invoice_no:invoice_no,
        partcode:partcode
    }).done(function(data, textStatus, jqXHR){
    	console.log(data);
    	$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesinspection" value="'+val.id+'" name="checkiteminspection" id="checkiteminspection"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskinspection" class="btn btn-sm btn-primary edit-taskinspection" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodinspection').append(tblrow);
            $('#mod_inspection').val("");
	       	$('#qty_inspection').val("");
	       	$('#id_inspection').val("");
	       	$('#status_inspection').val("ADD");
	       	$('.edit-taskinspection').on('click',function(){
	        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_ins')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_inspection').val(data[0]['mod']);
		       		$('#qty_inspection').val(data[0]['qty']);
		       		$('#id_inspection').val(id);
		       		$('#status_inspection').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });  	
    	});
    	lot_accepted();
    }).fail(function(jqXHR, textStatus, errorThrown){
    	console.log(errorThrown+'|'+textStatus);
    });
}
function checklevel_save(){
	var mod = $('select[name=mod_checklevel]').val();
	var qty = $('#qty_checklevel').val();
	var status = $('#status_checklevel').val();
	var id = $('#id_checklevel').val();
	var invoice_no = $('input[name=invoice_no_cl]').val();
	var partcode = $('select[name=partcode_cl]').val();
	if(mod == ""){
		$('#er_modcl').html("Mode of Defect field is empty");
		$('#er_modcl').css('color','red');
		return false;
	}
	if(qty == ""){
		$('#er_qtycl').html("Quantity field is empty");
		$('#er_qtycl').css('color','red');
		return false;
	}

	$('#tblformodchecklevel').html("");
	$.post("<?php echo e(url('/iqc_mod_cl')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        mod:mod,
        qty:qty,
        status:status,
        id:id,
        invoice:invoice_no,
        partcode:partcode
    }).done(function(data, textStatus, jqXHR){
    	console.log(data);
    	$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxeschecklevel" value="'+val.id+'" name="checkitemchecklevel" id="checkitemchecklevel"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskchecklevel" class="btn btn-sm btn-primary edit-taskchecklevel" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodchecklevel').append(tblrow);
            $('#mod_checklevel').val("");
	       	$('#qty_checklevel').val("");
	       	$('#id_checklevel').val("");
	       	$('#status_checklevel').val("ADD");
	       	$('.edit-taskchecklevel').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_cl')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_checklevel').val(data[0]['mod']);
		       		$('#qty_checklevel').val(data[0]['qty']);
		       		$('#id_checklevel').val(id);
		       		$('#status_checklevel').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
    	lot_accepted_cl();
    }).fail(function(jqXHR, textStatus, errorThrown){
    	console.log(errorThrown+'|'+textStatus);
    });
}
function requalification_save(){
	var mod = $('select[name=mod_requalification]').val();
	var qty = $('#qty_requalification').val();
	var status = $('#status_requalification').val();
	var id = $('#id_requalification').val();
	var partcode = $('select[name=partcode_rq]').val();
	if(mod == ""){
		$('#er_modrq').html("Mode of Defect field is empty");
		$('#er_modrq').css('color','red');
		return false;
	}
	if(qty == ""){
		$('#er_qtyrq').html("Quantity field is empty");
		$('#er_qtyrq').css('color','red');
		return false;
	}

	$('#tblformodrequalification').html("");
	$.post("<?php echo e(url('/iqc_mod_rq')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        mod:mod,
        qty:qty,
        status:status,
        id:id,
        partcode:partcode
    }).done(function(data, textStatus, jqXHR){
    	console.log(data);
    	$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesrequalification" value="'+val.id+'" name="checkitemrequalification" id="checkitemrequalification"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskrequalification" class="btn btn-sm btn-primary edit-taskrequalification" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodrequalification').append(tblrow);
            $('#mod_requalification').val("");
	       	$('#qty_requalification').val("");
	       	$('#id_requalification').val("");
	       	$('#status_requalification').val("ADD");
	       	$('.edit-taskrequalification').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_rq')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_requalification').val(data[0]['mod']);
		       		$('#qty_requalification').val(data[0]['qty']);
		       		$('#id_requalification').val(id);
		       		$('#status_requalification').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
    	lot_accepted_rq();
    }).fail(function(jqXHR, textStatus, errorThrown){
    	console.log(errorThrown+'|'+textStatus);
    });
}
function deleteAllcheckedinspection(){
	var invoice = $('input[name=invoice_no]').val();
	var partcode = $('select[name=partcode]').val();
    var tray = [];
    $('.checkboxesinspection:checked').each(function(){
        tray.push($(this).val());
    });
    var traycount = tray.length;
    var myData = {tray:tray,traycount:traycount,invoice:invoice,partcode:partcode};
    $('#tblformodinspection').html("");
    $.ajax({
            url:"<?php echo e(url('/iqc_mod_delete_ins')); ?>",
            method:'get',
            data:myData            
    }).done(function(data, textStatus, jqXHR){
    	console.log(data);
        $.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesinspection" value="'+val.id+'" name="checkiteminspection" id="checkiteminspection"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskinspection" class="btn btn-sm btn-primary edit-taskinspection" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodinspection').append(tblrow);   
            $('.edit-taskinspection').on('click',function(){
	        	var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_ins')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_inspection').val(data[0]['mod']);
		       		$('#qty_inspection').val(data[0]['qty']);
		       		$('#id_inspection').val(id);
		       		$('#status_inspection').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });  	 
    	});
    	lot_accepted();
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function deleteAllcheckedchecklevel(){
	var invoice = $('input[name=invoice_no_cl]').val();
	var partcode = $('select[name=partcode_cl]').val();
    var tray = [];
    $('.checkboxeschecklevel:checked').each(function(){
        tray.push($(this).val());
    });
    var traycount = tray.length;
    var myData = {tray:tray,traycount:traycount,invoice:invoice,partcode:partcode};
    $('#tblformodchecklevel').html("");
    $.ajax({
            url:"<?php echo e(url('/iqc_mod_delete_cl')); ?>",
            method:'get',
            data:myData            
    }).done(function(data, textStatus, jqXHR){
        $.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxeschecklevel" value="'+val.id+'" name="checkitemchecklevel" id="checkitemchecklevel"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskchecklevel" class="btn btn-sm btn-primary edit-taskchecklevel" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodchecklevel').append(tblrow);
	       	$('.edit-taskchecklevel').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_cl')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_checklevel').val(data[0]['mod']);
		       		$('#qty_checklevel').val(data[0]['qty']);
		       		$('#id_checklevel').val(id);
		       		$('#status_checklevel').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
    lot_accepted_cl();
}
function deleteAllcheckedrq(){
	var partcode = $('select[name=partcode_rq]').val();
    var tray = [];
    $('.checkboxesrequalification:checked').each(function(){
        tray.push($(this).val());
    });
    var traycount = tray.length;
    var myData = {tray:tray,traycount:traycount,partcode:partcode};
    $('#tblformodrequalification').html("");
    $.ajax({
            url:"<?php echo e(url('/iqc_mod_delete_rq')); ?>",
            method:'get',
            data:myData            
    }).done(function(data, textStatus, jqXHR){
        $.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesrequalification" value="'+val.id+'" name="checkitemrequalification" id="checkitemrequalification"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskrequalification" class="btn btn-sm btn-primary edit-taskrequalification" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tblformodrequalification').append(tblrow);
	       	$('.edit-taskrequalification').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/iqc_mod_edit_rq')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#mod_requalification').val(data[0]['mod']);
		       		$('#qty_requalification').val(data[0]['qty']);
		       		$('#id_requalification').val(id);
		       		$('#status_requalification').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
    	lot_accepted_rq();
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function deleteAllcheckedrequali(){
    var tray = [];
    $('.checkboxesrq:checked').each(function(){
        tray.push($(this).val());
    });
    var traycount = tray.length;
    var myData = {tray:tray,traycount:traycount};
    $('#rq_inspection_body').html("");
    $.ajax({
            url:"<?php echo e(url('/rqiqcdbdelete')); ?>",
            method:'get',
            data:myData            
    }).done(function(data, textStatus, jqXHR){
    	console.log(data);
    	$.each(data,function(i,val){
    		var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesrq" value="'+val.id+'" name="checkitemrq" id="checkitemrq"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskrq" class="btn btn-sm btn-primary edit-taskrq" value="'+val.id+ '|' +val.partcode_rq+ '|' +val.partname_rq+ '|' +val.supplier_rq+ '|' +val.category_rq+ '|' +val.family_rq+ '|' +val.app_date_rq+ '|' +val.app_time_rq+ '|' +val.app_no_rq+ '|' +val.lot_no_rq+ '|' +val.lot_qty_rq+ '|' +val.date_ispected_rq+ '|' +val.ww_rq+ '|' +val.fy_rq+ '|' +val.shift+ '|' +val.time_ins_from+ '|' +val.time_ins_to+ '|' +val.inspector+ '|' +val.submission+ '|' +val.judgement+ '|' +val.lot_inspected+ '|' +val.lot_accepted_rq+ '|' +val.no_of_defects_rq+ '|' +val.remarks_rq+ '|' +val.ctrl_no_rq+ '|' +val.dbcon_rq+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.ctrl_no_rq+'</td>'+
                            '<td>'+val.partcode_rq+'</td>'+
                            '<td>'+val.partname_rq+'</td>'+
                            '<td>'+val.lot_no_rq+'</td>'+
                            '<td>'+val.app_date_rq+'</td>'+
                            '<td>'+val.app_time_rq+'</td>'+
                            '<td>'+val.app_no_rq+'</td>'+
                        '</tr>';
            $('#rq_inspection_body').append(tblrow);
            $('#partcode_rq').val("");
		    $('#partname_rq').val("");
		    $('#supplier_rq').val("");
		    $('#category_rq').val("");
		    $('#family_rq').val("");
		    $('#app_date_rq').val("");
		    $('#app_time_rq').val("");
		    $('#app_no_rq').val("");
		    $('#lot_no_rq').val("");
		    $('#lot_qty_rq').val("");

		    $('#date_ispected_rq').val("");
		    $('#ww_rq').val("");
		    $('#fy_rq').val("");
		    $('#shift_rq').val("");
		    $('#time_ins_from_rq').val("");
		    $('#time_ins_to_rq').val("");
			$('#submission_rq').val("");
			$('#judgement_rq').val("");

			$('#lot_inspected_rq').val("");
			$('#lot_accepted_rq').val("");
			$('#no_of_defects_rq').val("");
			$('#remarks_rq').val("");
			$('#status_rq').val("ADD");
			$('.edit-taskrq').on('click',function(){
		        var field = $(this).val().split('|');
		        var id = field[0];
		       	$.ajax({
		       		url:"<?php echo e(url('/rqiqcdbedit')); ?>",
		       		method:'get',
		       		data:{
		       			id:id
		       		},
		       	}).done(function(data, textStatus, jqXHR){
		       		console.log(data);
		       		$('#id_rq').val(data[0]['id	']);
		       		$('#partcode_rq').val(data[0]['partcode_rq']);
				    $('#partname_rq').val(data[0]['partname_rq']);
				    $('#supplier_rq').val(data[0]['supplier_rq']);
				    $('#category_rq').val(data[0]['category_rq']);
				    $('#family_rq').val(data[0]['family_rq']);
				    $('#app_date_rq').val(data[0]['app_date_rq']);
				    $('#app_time_rq').val(data[0]['app_time_rq']);
				    $('#app_no_rq').val(data[0]['app_no_rq']);
				    $('#lot_no_rq').val(data[0]['lot_no_rq']);
				    $('#lot_qty_rq').val(data[0]['lot_qty_rq']);

				    $('#date_ispected_rq').val(data[0]['date_ispected_rq']);
				    $('#ww_rq').val(data[0]['ww_rq']);
				    $('#fy_rq').val(data[0]['fy_rq']);
				    $('#shift_rq').val(data[0]['shift_rq']);
				    $('#time_ins_from_rq').val(data[0]['time_ins_from_rq']);
				    $('#time_ins_to_rq').val(data[0]['time_ins_to_rq']);
				   	$('#inspector_rq').val(data[0]['inspector_rq']);
					$('#submission_rq').val(data[0]['submission_rq']);
					$('#judgement_rq').val(data[0]['judgement_rq']);

					$('#lot_inspected_rq').val(data[0]['lot_inspected_rq']);
					$('#lot_accepted_rq').val(data[0]['lot_accepted_rq']);
					$('#no_of_defects_rq').val(data[0]['no_of_defects_rq']);
					$('#remarks_rq]').val(data[0]['remarks_rq']);
			       	$('#status_rq').val("EDIT");
		       	}).fail(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown+'|'+textStatus);
		       	});
		    });
    	});
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function clear_inspection(){
	$('#invoice_no').val("");
    $('#partcode').val("");
    $('#partname').val("");
    $('#supplier').val("");
    $('#category').val("");
    $('#family').val("");
    $('#app_date').val("");
    $('#app_time').val("");
    $('#app_no').val("");
    $('#lot_no').val("");
    $('#lot_qty').val("");

    $('#type_of_inspection').val("");
    $('#severity_of_inspection').val("");
    $('#inspection_lvl').val("");
    $('#aql').val("");
    $('#accept').val("");
    $('#reject').val("");

    $('#date_ispected').val("");
   	$('#ww').val("");
    $('#fy').val("");
    $('#shift').val("");
    $('#time_ins_from').val("");
    $('#time_ins_to').val("");
    $('#inspector').val("");
	$('#submission').val("");
	$('#judgement').val("");

	$('#lot_inspected').val("");
	$('#lot_accepted').val("");
	$('#sample_size').val("");
	$('#no_of_defects').val("");
	$('#remarks').val("");		
}

function groupby(){
	var datefrom= $('#groupby_datefrom').val()
	var dateto = $('#groupby_dateto').val();
	
	var g1 = $('select[name=group1]').val();
	var g2 = $('select[name=group2]').val();
	var g3 = $('select[name=group3]').val();
	var g1content = $('select[name=group1content]').val();
	var g2content = $('select[name=group2content]').val();
	var g3content = $('select[name=group3content]').val();

	if(datefrom == "undefined--undefined" && dateto == "undefined--undefined"){
		$('#hd_search_from').val("");
		$('#hd_search_to').val("");
		datefrom = "";
		dateto = "";
		$('#hd_value').val(g1content);
		$('#hd_groupfield').val(g1);
		$('#hd_value2').val(g2content);
		$('#hd_groupfield2').val(g2);
		$('#hd_value3').val(g3content);
		$('#hd_groupfield3').val(g3);
	}else{
		$('#hd_search_from').val(datefrom);
		$('#hd_search_to').val(dateto);
		$('#hd_value').val(g1content);
		$('#hd_groupfield').val(g1);
		$('#hd_value2').val(g2content);
		$('#hd_groupfield2').val(g2);
		$('#hd_value3').val(g3content);
		$('#hd_groupfield3').val(g3);
	}

	$('#groupbyselected').html();
	
	var myData = {g1:g1,g2:g2,g3:g3,g1content:g1content,g2content:g2content,g3content:g3content,datefrom:datefrom,dateto:dateto};
	$('#tblforiqcinspection').html("");
	$.post("<?php echo e(url('/iqcdbgroupby')); ?>",
	{
		_token:$('meta[name=csrf-token]').attr('content'),
		data:myData

	}).done(function(data, textStatus, jqXHR){
		console.log(data);

		$.each(data,function(i,val){
			var tblrow = '<tr>'+
						'<td>'+
						    '<input type="checkbox" class="form-control input-sm checkboxes" value="'+val.id+'" name="checkitem" id="checkitem"></input> '+
						'</td>'+                        
						'<td style="width: 5%">'+           
						    '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+'|'+val.invoice_no+'|'+val.partcode+'|'+val.partname+'|'+val.supplier+'|'+val.app_date+'|'+val.app_time+'|'+val.app_no+'|'+val.lot_no+'|'+val.lot_qty+'|'+val.type_of_inspection+'|'+val.severity_of_inspection+'|'+val.inspection_lvl+'|'+val.aql+'|'+val.accept+'|'+val.reject+'|'+val.date_ispected+'|'+val.ww+'|'+val.fy+'|'+val.shift+'|'+val.time_ins_from+'|'+val.time_ins_to+'|'+val.inspector+'|'+val.submission+'|'+val.judgement+'|'+val.lot_inspected+'|'+val.lot_accepted+'|'+val.sample_size+'|'+val.no_of_defects+'|'+val.remarks+'|'+val.dbcon+'">'+
						    
						        '   <i class="fa fa-edit"></i> '+
						    '</button>'+
						'</td>'+
						'<td>'+val.id+'</td>'+
						'<td>'+val.app_date+'</td>'+
						'<td>'+val.date_ispected+'</td>'+
						'<td>'+val.app_time+'</td>'+
						'<td>'+val.app_no+'</td>'+
						'<td>'+val.fy+'</td>'+
						'<td>'+val.ww+'</td>'+
						'<td>'+val.submission+'</td>'+
						'<td>'+val.partcode+'</td>'+
						'<td>'+val.partname+'</td>'+
						'<td>'+val.supplier+'</td>'+
						'<td>'+val.lot_no+'</td>'+
						'<td>'+val.aql+'</td>'+
					'</tr>';
			$('#tblforiqcinspection').append(tblrow);
			$('.edit-task').on('click',function(){
		        $('#IQCresultModal').modal('show');
		        $('#inspectionstatus').val("EDIT");
		        var edittext = $(this).val().split('|');
		       	var id = edittext[0];
		       	$('input[name=id_rq]').val(id);
		        $('input[name=invoice_no]').val(data[0]['invoice_no']);
			    $('select[name=partcode]').select2('val',data[0]['partcode']);
			    $('input[name=partname]').val(data[0]['partname']);
			    $('input[name=supplier]').val(data[0]['supplier']);
			    $('input[name=category]').val(data[0]['category']);
			    $('select[name=family]').val(data[0]['family']);
			    $('input[name=app_date]').val(data[0]['app_date']);
			    $('input[name=app_time]').val(data[0]['app_time']);
			    $('input[name=app_no]').val(data[0]['app_no']);
			    $('#lot_no').val(data[0]['lot_no']);
			    $('input[name=lot_qty]').val(data[0]['lot_qty']);

			    $('select[name=type_of_inspection]').val(data[0]['type_of_inspection']);
			    $('select[name=severity_of_inspection]').val(data[0]['severity_of_inspection']);
			    $('select[name=inspection_lvl]').val(data[0]['inspection_lvl']);
			    $('select[name=aql]').val(data[0]['aql']);
			    $('input[name=accept]').val(data[0]['accept']);
			    $('input[name=reject]').val(data[0]['reject']);

			    $('input[name=date_ispected]').val(data[0]['date_ispected']);
			   	$('input[name=ww]').val(data[0]['ww']);
			    $('input[name=fy]').val(data[0]['fy']);
			    $('select[name=shift]').val(data[0]['shift']);
			    $('input[name=time_ins_from]').val(data[0]['time_ins_from']);
			    $('input[name=time_ins_to]').val(data[0]['time_ins_to']);
			    $('select[name=inspector]').val(data[0]['inspector']);
				$('select[name=submission]').val(data[0]['submission']);
				$('input[name=judgement]').val(data[0]['judgement']);

				$('input[name=lot_inspected]').val(data[0]['lot_isnpected']);
				$('input[name=lot_accepted]').val(data[0]['lot_accepted']);
				$('input[name=sample_size]').val(data[0]['sample_size']);
				$('input[name=no_of_defects]').val(data[0]['no_of_defects']);
				$('input[name=remarks]').val(data[0]['remarks']);
    		});
		});

		//get the LAR/LRR/DPPM-----------------
		$('#tblforlarlrrdppm').html("");
		$.ajax({
			url:"<?php echo e(url('/getlarlrrdppm')); ?>",
			method:'get',
			data:myData,
		}).done(function(data, textStatus, jqXHR){
		
			var x =  0;
			var y =  0;
			var z =  0;
			var selected =[];
			var selected2 =[];
			var selected3 =[];
		
			if(g1){
				for(x;x<data.length;x++){
					selected.push(data[x][g1]);
				}	
			}
			if(g2){
				for(y;y<data.length;y++){
					selected2.push(data[y][g2]);
				}	
			}
			if(g3){
				for(z;z<data.length;z++){
					selected3.push(data[z][g3]);
				}	
			}
			
			var sample_size = [];
			var lot_qty = [];
			var no_of_defects = [];
			
			$('#hdg1_selected').val(selected);
			$('#hdg2_selected').val(selected2);
			$('#hdg3_selected').val(selected3);
		
			$.each(data,function(i,val){
				sample_size = val.sample_size;
				lot_qty = val.lot_qty;
				no_of_defects = val.no_of_defects;
				
				//getting the lar value-------
				var lqminusnod = lot_qty - no_of_defects;
				var lqminusnoddividedbylq = lqminusnod / lot_qty;
				var lar = (lqminusnoddividedbylq * 100).toFixed(2);
				//getting the lrr value-------
				var noddivlq = no_of_defects / lot_qty;
				var lrr = (noddivlq * 100).toFixed(2);

				//getting the dppm value-------
				if(no_of_defects == 0 && sample_size == 0){
					var noddivss = 0;	
				}else if(sample_size == 0){
					var noddivss = 0;
				}else if(no_of_defects == 0){
					var noddivss = 0;
				}else{
					var noddivss = no_of_defects/sample_size;	
				}
				var dppm = (noddivss * 1000000).toFixed(2);

				//getting the lot_accepted
				
				$.ajax({
					url:"<?php echo e(url('/getrejected')); ?>",
					method:'get',
				}).done(function(data,textStatus,jqXHR){
				/*	alert(data);*/
					$('#hd_rejected').val(data);
				}).fail(function(jqXHR,textStatus,errorThrown){
					console.log(errorThrown+'|'+textstatus);
				});
				
				var newselected = $('#hdg1_selected').val().split(',');
				var newselected2 = $('#hdg2_selected').val().split(',');
				var newselected3 = $('#hdg2_selected').val().split(',');
		
				if(g1){
					var finalselected = newselected[i];
				}
				if(g2){
					var finalselected = newselected[i]+' - '+ newselected2[i];
				}
				if(g3){
					var finalselected = newselected[i]+' - '+newselected2[i]+' - '+newselected3[i];
				}
				var reject = val.lot_inspected - val.lot_accepted;
        		var tblrow = '<tr>'+  
        					'<td id="groupbyselected">'+finalselected+'</td>'+ 
        					'<td>'+val.lot_inspected+'</td>'+
        					'<td>'+val.lot_accepted+'</td>'+  
                            '<td>'+reject+'</td>'+
                            '<td>'+val.sample_size+'</td>'+
                            '<td>'+val.no_of_defects+'</td>'+
                            '<td>'+lar+'</td>'+
                            '<td>'+lrr+'</td>'+
                            '<td>'+dppm+'</td>'+
                        '</tr>';
            	$('#tblforlarlrrdppm').append(tblrow);
            
        	});
    		
	    	
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log(errorThrown+'|'+textStatus);
		});
	
	}).fail(function(jqXHR, textStatus, errorThrown){
		console.log(errorThrown+'|'+textStatus);
	});
}

function searchby(){
	var datefrom = $('#search_from').val();
	var dateto = $('#search_to').val();
	var partcode = $('#search_partcode').val();

	$('#tblforiqcinspection').html("");
	$.get("<?php echo e(url('/searchby')); ?>",
	{
		_token:$('meta[name=csrf-token]').attr('content'),
		datefrom:datefrom,
		dateto:dateto,
		partcode:partcode
	}).done(function(data, textStatus, jqXHR){
		$('#hd_search_from').val(datefrom);
		$('#hd_search_to').val(dateto);
		$('#hd_partcode').val(partcode);
		$.each(data,function(i,val){
			var tblrow = '<tr>'+
						'<td>'+
						    '<input type="checkbox" class="form-control input-sm checkboxes" value="'+val.id+'" name="checkitem" id="checkitem"></input> '+
						'</td>'+                        
						'<td style="width: 5%">'+           
						    '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+'|'+val.invoice_no+'|'+val.partcode+'|'+val.partname+'|'+val.supplier+'|'+val.app_date+'|'+val.app_time+'|'+val.app_no+'|'+val.lot_no+'|'+val.lot_qty+'|'+val.type_of_inspection+'|'+val.severity_of_inspection+'|'+val.inspection_lvl+'|'+val.aql+'|'+val.accept+'|'+val.reject+'|'+val.date_ispected+'|'+val.ww+'|'+val.fy+'|'+val.shift+'|'+val.time_ins_from+'|'+val.time_ins_to+'|'+val.inspector+'|'+val.submission+'|'+val.judgement+'|'+val.lot_inspected+'|'+val.lot_accepted+'|'+val.sample_size+'|'+val.no_of_defects+'|'+val.remarks+'|'+val.dbcon+'">'+
						    
						        '   <i class="fa fa-edit"></i> '+
						    '</button>'+
						'</td>'+
						'<td>'+val.id+'</td>'+
						'<td>'+val.app_date+'</td>'+
						'<td>'+val.date_ispected+'</td>'+
						'<td>'+val.app_time+'</td>'+
						'<td>'+val.app_no+'</td>'+
						'<td>'+val.fy+'</td>'+
						'<td>'+val.ww+'</td>'+
						'<td>'+val.submission+'</td>'+
						'<td>'+val.partcode+'</td>'+
						'<td>'+val.partname+'</td>'+
						'<td>'+val.supplier+'</td>'+
						'<td>'+val.lot_no+'</td>'+
						'<td>'+val.aql+'</td>'+
					'</tr>';
			$('#tblforiqcinspection').append(tblrow);
			$('.edit-task').on('click',function(){
		        $('#IQCresultModal').modal('show');
		        $('#inspectionstatus').val("EDIT");
		        var edittext = $(this).val().split('|');
		       	var id = edittext[0];
		       	$('input[name=id_rq]').val(id);
		        $('input[name=invoice_no]').val(edittext[1]);
			    $('select[name=partcode]').select2('val',edittext[2]);
			    $('input[name=partname]').val(edittext[3]);
			    $('input[name=supplier]').val(edittext[4]);
			    
			    $('input[name=app_date]').val(edittext[5]);
			    $('input[name=app_time]').val(edittext[6]);
			    $('input[name=app_no]').val(edittext[7]);
			    $('select[name=lot_no]').val(edittext[8]);
			    $('input[name=lot_qty]').val(edittext[9]);

			    $('select[name=type_of_inspection]').val(edittext[10]);
			    $('select[name=severity_of_inspection]').val(edittext[11]);
			    $('select[name=inspection_lvl]').val(edittext[12]);
			    $('select[name=aql]').val(edittext[13]);
			    $('input[name=accept]').val(edittext[14]);
			    $('input[name=reject]').val(edittext[15]);

			    $('input[name=date_ispected]').val(edittext[16]);
			   	$('input[name=ww]').val(edittext[17]);
			    $('input[name=fy]').val(edittext[18]);
			    $('select[name=shift]').val(edittext[19]);
			    $('input[name=time_ins_from]').val(edittext[20]);
			    $('input[name=time_ins_to]').val(edittext[21]);
			    $('select[name=inspector]').val(edittext[22]);
				$('select[name=submission]').val(edittext[23]);
				$('input[name=judgement]').val(edittext[24]);
				$('input[name=lot_inspected]').val(edittext[25]);
				$('input[name=lot_accepted]').val(edittext[26]);
				$('input[name=sample_size]').val(edittext[27]);
				$('input[name=no_of_defects]').val(edittext[28]);
				$('input[name=remarks]').val(edittext[29]);
				var invoice = edittext[1];
				var partcode = edittext[2];
				var selected_lot = [];
				var cnt = 0;
				$.ajax({
					url:"<?php echo e(url('/getinvoicedetails')); ?>",
					method:'get',
					data:{
						invoiceno:invoice
					},
				}).done(function(data, textStatus, jqXHR){
					/*console.log(data);*/
					$('#partcode').empty();
		        	/*console.log(data);*/
		        	$.each(data,function(i,val){
		        		option = '<option value="'+ val.item +'">'+ val.item +'</option>';
		        		//options.append($('<option />')).val(val.item).text(val.item);
		        		$('#partcode').append(option);
		        	});
		        	lot_accepted();
				}).fail(function(jqXHR, textStatus, errorThrown){
					console.log(errorThrow+'|'+textStatus)
				});
				$('#lot_no').html("");
				$.ajax({
					url:"<?php echo e(url('/getpartcode')); ?>",
					method:'get',
					data:{invoiceno:invoice,partcode:partcode},
				}).done(function(data, textStatus, jqXHR){
					console.log(data);
					var selected_lot = [];
					var cnt = 0;
					$.each(data, function(i,x) {
						$('#supplier').val(x.supplier);
						$('#category').val(x.box);
						$('#partname').val(x.item_desc);
						$('#app_time').val(x.created_at);
						$('#app_date').val(x.receive_date);
						$('#app_no').val(x.receive_no);
						$('#lot_no').append('<option value="'+x.lot_no+'">'+x.lot_no+'</option>');
						selected_lot[cnt] = x.lot_no;
						cnt++;
						$('#lot_qty').val(x.qty);
					});
					console.log(selected_lot);
					$('#lot_no')
						.selectpicker('refresh')
						.selectpicker('val',selected_lot);
					console.log($('#lot_no').val());
					
				}).fail(function(jqXHR, textStatus, errorThrown){
					console.log(errorThrow+'|'+textStatus)
				});	
		    });
		});

	}).fail(function(jqXHR, errorThrown, textStatus){
		console.log(errorThrown+'|'+textStatus);
	});
}

function excelreport(){
	var datefrom = $('#hd_search_from').val();
	var dateto = $('#hd_search_to').val();
	var partcode = $('#hd_partcode').val(partcode);

	$.get("<?php echo e(url('/iqcprintreportexcel')); ?>",
	{
		_token:$('meta[name=csrf-token]').attr('content'),
		datefrom:datefrom,
		dateto:dateto,
		partcode:partcode
	}).done(function(data, textStatus, jqXHR){
		console.log(data);
	}).fail(function(jqXHR,textStatus,errorThrown){
		console.log(errorThrown+'|'+textStatus);
	});
}

function auto_lot_qty_rq(){
	var partcode = $('select[name=partcode_rq]').val();
	var lot_num = $('#lot_no_rq').val();
	var token = "<?php echo e(Session::token()); ?>";
    $.ajax({
		url:"<?php echo e(url('/getpartcode_rqLOTSUM')); ?>",
		method:'get',
		data:{
            _token: token,
			partcode : partcode,
			lot_num : lot_num
        },
	}).done(function(data, textStatus, jqXHR){
		$('#lot_qty_rq').val(data);
		$('#lot_no_rq').selectpicker('refresh').selectpicker('val',selected_lot);
		lot_accepted();
	}).fail(function(jqXHR, textStatus, errorThrown){
		console.log(errorThrown+'|'+textStatus)
	});
}
function auto_lot_qty(){
	var invoice_no = $('#invoice_no').val();
	var partcode = $('select[name=partcode]').val();
	var lot_num = $('#lot_no').val();
	var token = "<?php echo e(Session::token()); ?>";
    var data = {
        _token: token,
		partcode : partcode,
		invoiceno : invoice_no,
		lot_num : lot_num
    };
    $.ajax({
		url:"<?php echo e(url('/getpartcodeLOTSUM')); ?>",
		method:'get',
		data:data,
	}).done(function(data, textStatus, jqXHR){
		$('#lot_qty').val(data);
		$('#lot_no')
		.selectpicker('refresh')
		.selectpicker('val',selected_lot);
		lot_accepted();
	}).fail(function(jqXHR, textStatus, errorThrown){
		console.log(errorThrow+'|'+textStatus)
	});
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>