<?php $__env->startSection('title'); ?>
	QC Database Molding | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_QCMLD')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
									<i class="fa fa-search"></i>  QC Database Molding
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-xs-12 hidden-md hidden-lg hidden-xl">
										<div class="btn-group pull-right">
											<button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
												OQC Inspection <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li class="active">
													<a href="<?php echo e(url('/oqcmolding')); ?>">
													   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
												   	</a>
												</li>
												<li>
													<a href="<?php echo e(url('/packingmolding')); ?>">
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
											<a href="<?php echo e(url('/oqcmolding')); ?>" class="list-group-item active">
											   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
										   </a>
										   <a href="<?php echo e(url('/packingmolding')); ?>" class="list-group-item">
											   <i class="fa fa-cube fa-2x font-purple"></i> Packing Inspection
										   </a>
										</div>
									</div>

									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="portlet box red" >
                        							<div class="portlet-title">
                        								<div class="caption">
                        									<i class="fa fa-search"></i> OQC Inspection
                        								</div>
                        							</div>
                        							<div class="portlet-body">
                                                        <div class="row">
                                                            <form class="form-forizontal">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-sm-2">P.O. No.</label>
                                                                        <div class="col-sm-7">
                                                                            <input type="text" class="form-control input-sm" id="posearch" name="posearch">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <a href="javascript:;" class="btn blue input-sm" id="btn_posearch">
                                                                                View P.O.
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-sm-2">Date From</label>
                                                                        <div class="col-sm-3">
                                                                            <input type="text" class="form-control input-sm date-picker" id="from" name="from">
                                                                        </div>
                                                                        <label class="control-label col-sm-2">Date to</label>
                                                                        <div class="col-sm-3">
                                                                            <input type="text" class="form-control input-sm date-picker" id="to" name="to">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <a href="javascript:;" class="btn blue input-sm" id="btn_datesearch">
                                                                                Go
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-hover table-bordered table-striped" id="oqcdatatable">
                                                                    <thead>
                                                                        <tr>
                                                                            <td style="width: 5%"></td>
                                                                            <td style="width: 5%"></td>
                                                                            <td>ID</td>
                                                                            <td>Date Inspected</td>
                                                                            <td>Submission</td>
                                                                            <td>FY#</td>
                                                                            <td>WW#</td>
                                                                            <td>Customer</td>
                                                                            <td>Parts Code</td>
                                                                            <td>Parts Name</td>
                                                                            <td>P.O. No.</td>
                                                                            <td>Lot No.</td>
                                                                            <td>Lot Qty</td>
                                                                            <td>Total Lot</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="oqctable">
                                                                        
                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden" id="record_count">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

										<div class="row">
                                            <div class="col-md-12 text-center">
                                                <a href="javascript:;" class="btn blue" id="btn_addnew">
                                                    <i class="fa fa-plus"></i> Add New
                                                </a>
                                                <!-- <a href="javascript:;" class="btn grey-gallery" id="btn_groupby">
                                                    <i class="fa fa-group"></i> Group By
                                                </a> -->
                                                <?php /* <button type="button" class="btn red" id="btn_delete">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button> */ ?>
                                                <!-- <a href="javascript:;" class="btn purple" id="btn_search">
                                                    <i class="fa fa-search"></i> Search
                                                </a> -->
												<a href="javascript:;" class="btn red" id="btn_pdf">
                                                    <i class="fa fa-file-pdf-o"></i> Export to PDF
                                                </a>
                                                <a href="javascript:;" class="btn green" id="btn_excel">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel
                                                </a>
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
    <div id="AddNewModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog gray-gallery modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Application for OQC Inspection</h4>
                </div>
                <form class=form-horizontal>
                    <div class="modal-body">

                        <div class="row">
							<div class="col-md-12">
								<strong>Visual Inspection</strong>
							</div>
						</div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">P.O. No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="po_no" name="po_no" required>
                                        <input type="hidden" name="oqc_id" id="oqc_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Parts Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="part_code" name="part_code" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Parts Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="part_name" name="part_name" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear show-tick" name="customer" id="customer" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Family</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear show-tick" name="family" id="family" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Total Qty</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="total_qty" name="total_qty" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Die No.</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm clear show-tick" name="die_num" id="die_num" required>
                                            <option value="option"></option>
                                            <?php foreach($dienos as $dieno): ?>
                                            <option value="<?php echo e($dieno->description); ?>"><?php echo e($dieno->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="quantity" name="quantity" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot No.</label>
                                    <div class="col-sm-9">
                                        <?php /* <input type="text" class="form-control input-sm show-tick" name="lot_num" id="lot_num"> */ ?>
                                        <a href="javascript:;" class="btn blue btn-sm" id="btn_lot" disabled="true">
                                            <i class="fa fa-plus-circle"></i> Add Lot Number
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

						<hr>

						<div class="row">
							<div class="col-md-12">
								<strong>Sampling Plan</strong>
							</div>
						</div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Type of Inspection</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm clear show-tick" name="type_of_inspection" id="type_of_inspection" required>
                                            <option ></option>
                                            <?php foreach($tofinspections as $tofinspection): ?>
                                            <option value="<?php echo e($tofinspection->description); ?>"><?php echo e($tofinspection->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Severity of Inspection</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm clear show-tick" name="severity_of_inspection" id="severity_of_inspection" required>
                                            <option ></option>
                                            <?php foreach($sofinspections as $sofinspection): ?>
                                            <option value="<?php echo e($sofinspection->description); ?>"><?php echo e($sofinspection->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Inspection Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm clear show-tick" name="inspection_lvl" id="inspection_lvl" required>
                                            <option></option>
                                            <?php foreach($inspectionlvls as $inspectionlvl): ?>
                                            <option value="<?php echo e($inspectionlvl->description); ?>"><?php echo e($inspectionlvl->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">AQL</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm clear show-tick" name="aql" id="aql" required>
                                            <option></option>
                                            <?php foreach($aqls as $aql): ?>
                                            <option value="<?php echo e($aql->description); ?>"><?php echo e($aql->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Accept</label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" max="1" class="form-control input-sm clear" id="accept" name="accept" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Reject</label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" max="1" class="form-control input-sm clear" id="reject" name="reject" required>
                                    </div>
                                </div>
                            </div>

                        </div>

						<hr>

						<div class="row">
							<div class="col-md-12">
								<strong>Visual Inspection Result</strong>
							</div>
						</div>

						<div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Date Inspected</label>
                                    <div class="col-sm-9">
                                        <input class="form-control input-sm date-picker" type="text" value="<?php echo e(date('m/d/Y')); ?>" name="date_inspected" id="date_inspected" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Shift</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm clear show-tick" name="shift" id="shift" required>
                                            <option value="option"></option>
                                            <?php foreach($shifts as $shift): ?>
                                            <option value="<?php echo e($shift->description); ?>"><?php echo e($shift->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Inspector</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm show-tick" name="inspector" id="inspector" value="<?php echo e(Auth::user()->user_id); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Submission</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm clear show-tick" name="submission" id="submission" required>
                                            <option value="option"></option>
                                            <?php foreach($submissions as $submission): ?>
                                            <option value="<?php echo e($submission->description); ?>"><?php echo e($submission->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Visial Operator</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="visual_operator" name="visual_operator" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">WW#</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm clear" id="ww" name="ww" required>
                                    </div>
                                    <label class="control-label col-sm-3">FY#</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm clear" id="fy" name="fy" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Remarks</label>
                                    <div class="col-sm-9">
                                        <textarea name="remarks" id="remarks" class="form-control input-sm clear" style="resize:none"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">PTCP / TNR#</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="ptcp_tnr" name="ptcp_tnr" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot Inspected</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="lot_inspected" name="lot_inspected" value="1" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot Accepted</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="lot_accepted" name="lot_accepted" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Sample Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="sample_size" name="sample_size" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Judgement</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="judgement" name="judgement" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" id="no_of_defects_label">No. of Defects</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm clear" id="no_of_defects" name="no_of_defects" required>
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-sm-3" id="btn_mode_of_defects_label">Mode of Defects</label>
									<div class="col-sm-4">
										<a href="javascript:;" class="btn blue btn-sm" id="btn_mode_of_defects" disabled="true">
                                            <i class="fa fa-plus-circle"></i> Add Mode of Defects
                                        </a>
                                        <a href="javascript:;" class="btn blue btn-sm" id="btn_ndf" disabled="true">
                                            <i class="fa fa-plus-circle"></i> NDF
                                        </a>
									</div>
									<div class="col-sm-4">
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control input-sm" id="oqc_status" name="oqc_status" value="insert">
                                            <input type="hidden" class="form-control input-sm" id="start_time" name="start_time">
                                        </div>
                                    </div>
								</div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-success" id="btn_saveoqc">Save</a>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Lot No -->
    <div id="LotNoModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Lot Numbers</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm show-tick" name="lot_no" id="lot_no">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="lotqty" id="lotqty" class="form-control input-sm">
                                        <input type="hidden" name="state" id="state">
                                        <input type="hidden" name="lot_id" id="lot_id">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-striped" id="tbl_lotno">
                                        <thead>
                                            <tr>
                                                <td>Lot No.</td>
                                                <td>Quantity</td>
                                                <td width="10%">Option</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tblforLot">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-success input-sm" id="btn_lot_save">Save</a>
                        <button type="button" data-dismiss="modal" class="btn btn-danger input-sm">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODE OF DEFECTS -->
    <div id="ModeOfDefectsModal" class="modal fade" role="dialog" data-backdrop="static">
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
                                    <label class="control-label col-sm-3">Mode of Defects</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick" name="mode_of_def" id="mode_of_def">
                                            <option value="option"></option>
                                            <?php foreach($mods as $mod): ?>
                                                <option value="<?php echo e($mod->description); ?>"><?php echo e($mod->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mode_qty" id="mode_qty" class="form-control input-sm">
                                        <input type="hidden" name="mode_state" id="mode_state" class="form-control input-sm">
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
                                                <td>Mode of Defects</td>
                                                <td>Quantity</td>
                                                <td>Option</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tblformod">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-success" id="btn_mod_save">Save</a>
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

	<!-- GROUP BY MODAL -->
	<div id="GroupByModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Group Items By:</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
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

    <!--del lot msg-->
    <div id="delmsg" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Lot Number</h4>
                </div>
                <div class="modal-body">
                    <p>Are sure you want to delete this lot number?</p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger iput-sm" id="delete_lot">Delete</a>
                    <button type="button" data-dismiss="modal" class="btn btn-primary iput-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--del mod msg-->
    <div id="delmodmsg" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Lot Number</h4>
                </div>
                <div class="modal-body">
                    <p>Are sure you want to delete this Mode of defect?</p>
                    <input type="hidden" name="mod_desc" id="mod_desc" class="form-control input-sm">
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger iput-sm" id="delete_mod">Delete</a>
                    <button type="button" data-dismiss="modal" class="btn btn-primary iput-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--del oqc msg-->
    <div id="deloqcmsg" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Lot Number</h4>
                </div>
                <div class="modal-body">
                    <p>Are sure you want to delete this OQC Record?</p>
                    <input type="hidden" name="oqc_id" id="oqc_id" class="form-control input-sm">
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger iput-sm" id="delete_oqc">Delete</a>
                    <button type="button" data-dismiss="modal" class="btn btn-primary iput-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--msg-->
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

    <!--msg_success-->
    <div id="msg_success" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 id="success_title" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="success_msg"></p>
                </div>
                <div class="modal-footer">
                    <?php /* <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button> */ ?>
                    <a href="javascript: restart_lotno();" class="btn btn-success" id="success_done">Done</a>
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
                        <div class="col-md-8 col-md-offset-2">
                            <img src="assets/images/ajax-loader.gif" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(function() {
        init_mod();
        loadOQC();
    	$('#btn_addnew').on('click', function (){
            getTime();
    		$('#AddNewModal').modal('show');
    	});

    	$('#btn_mode_of_defects').on('click', function() {
    		$('#ModeOfDefectsModal').modal('show');
            $('#mode_state').val('insert');
    	});

    	$('#btn_groupby').on('click', function() {
    		$('#GroupByModal').modal('show');
    	});

    	$('#btn_search').on('click', function() {
    		$('#SearchModal').modal('show');
    	});

        $('#btn_lot').on('click', function() {
            $('#btn_cancel_update_lot').hide();
            $('#LotNoModal').modal('show');
            $('#state').val('insert');
            $('#lot_no').val('');
            $('#lotqty').val('');
        });

        // execute the button of mode of defects
        $('#lot_accepted').on('change', function() {
            if ($(this).val() > 1) {
                $(this).val(1);
            }
            if ($(this).val() == 0) {
                $('#judgement').val('Rejected');
                init_mod(); 
            } else {
                $('#judgement').val('Accepted');
                init_mod();
            }
        });

        // generate details of po number
        $('#po_no').on('change', function() {
            var url = "<?php echo e(url('/getpooqcmolding')); ?>";
            var token = "<?php echo e(Session::token()); ?>";
            var po = $(this).val();
            var data = {
                _token: token,
                po: po
            };
            $.ajax({
                url: url,
                type: "GET",
                data: data,
            }).done( function(data, textStatus, jqXHR) {
                if (data == 0) {
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("That P.O. number is not available.");
                }else {
                    $.each(data, function(i,x) {
                        $('#part_code').val(x.partcode);
                        $('#part_name').val(x.partname);
                        getCust(x.customer);
                        $('#total_qty').val(parseFloat(x.qty));
                        getTableLotno();
                        getMODtable();
                        getTotalQty();
                        getMODTotalQty();
                    });
                    $('#btn_lot').removeAttr('disabled');
                    $('#btn_ndf').removeAttr('disabled');
                    $('#btn_mode_of_defects').removeAttr('disabled');
                }
            }).fail( function(data, textStatus, jqXHR) {
                $('#msg').modal('show');
                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#err_msg').html("There's some error while processing.");
            });
        });

        //saving / adding lot number
        $('#btn_lot_save').on('click', function() {
            var state = $('#state').val();
            var po = $('#po_no').val();
            var lot_no = $('#lot_no').val();
            var qty = $('#lotqty').val();
            var total_qty = $('#total_qty').val();
            var id = $('#lot_id').val();
            
            insert_lot(po,lot_no,qty,total_qty);
            
        });

        // initiate delete lot
        $('#tblforLot').on('click', '.btn_del_lot', function() {
            $('#lot_id').val($(this).attr('data-id'));
            $('#delmsg').modal('show');
        });

        // delete lot
        $('#delete_lot').on('click', function() {
            var id = $('#lot_id').val();
            $('#delmsg').modal('hide');
            delete_lot(id);
        });

        // initiate delete mod
        $('#tblformod').on('click', '.btn_del_MOD', function() {
            $('#mod_desc').val($(this).attr('data-mod'));
            $('#delmodmsg').modal('show');
        });

        // delete mod
        $('#delete_mod').on('click', function() {
            var mod = $('#mod_desc').val();
            var po = $('#po_no').val();
            var partcode = $('#part_code').val();
            $('#delmodmsg').modal('hide');
            delete_mod(po,partcode,mod);
        });

        // compute sampling plan
        $('#aql').focusout(function() {
            samplingplan();
        });
        $('#severity_of_inspection').focusout(function() {
            samplingplan();
        });
        $('#inspection_lvl').focusout(function() {
            samplingplan();
        });
        
        $('#aql').on('change', function() {
            samplingplan();
        });
        $('#quantity').on('change', function() {
            samplingplan();
        });
        $('#inspection_lvl').on('change', function() {
            samplingplan();
        });
        $('#severity_of_inspection').on('change', function() {
            samplingplan();
        });

        //mod save
        $('#btn_mod_save').on('click', function() {
            var mod = $('#mode_of_def').val();
            var qty = $('#mode_qty').val();
            var state = $('#mode_state').val();
            var id = $('#mode_id').val();
            var po = $('#po_no').val();
            var partcode = $('#part_code').val();

            save_mod(po,partcode,mod,qty,state,id);
        });

        // save oqc
        $('#btn_saveoqc').on('click', function() {
            save_oqc();
        });

        // update oqc
        $('#oqctable').on('click','.update-oqc', function() {
            var po_no = $(this).attr('data-po');
            var part_code = $(this).attr('data-partcode');
            var part_name = $(this).attr('data-partname');
            var customer = $(this).attr('data-customer');
            var total_qty = $(this).attr('data-totalqty');
            var die_num = $(this).attr('data-die');
            var quantity = $(this).attr('data-qty');
            var type_of_inspection = $(this).attr('data-toi');
            var severity_of_inspection = $(this).attr('data-soi');
            var inspection_lvl = $(this).attr('data-inspectionlvl');
            var aql = $(this).attr('data-aql');
            var accept = $(this).attr('data-accept');
            var reject = $(this).attr('data-reject');
            var date_inspected = $(this).attr('data-dateinspected');
            var shift = $(this).attr('data-shift');
            var inspector = $(this).attr('data-inspector');
            var submission = $(this).attr('data-submission');
            var visual_operator = $(this).attr('data-visualoperator');
            var ww = $(this).attr('data-ww');
            var fy = $(this).attr('data-fy');
            var ptcp_tnr = $(this).attr('data-ptcp');
            var lot_inspected = $(this).attr('data-lotinspected');
            var lot_accepted = $(this).attr('data-lotaccepted');
            var sample_size = $(this).attr('data-samplesize');
            var judgement = $(this).attr('data-judgement');
            var no_of_defects = $(this).attr('data-noofdefects');
            var family = $(this).attr('data-family');
            var remarks = $(this).attr('data-remarks');
            var id = $(this).attr('data-id');

            $('#oqc_status').val('update');
            $('#po_no').val(po_no);
            $('#part_code').val(part_code);
            $('#part_name').val(part_name);
            $('#customer').val(customer);
            $('#total_qty').val(total_qty);
            $('#die_num').val(die_num);
            $('#quantity').val(quantity);
            $('#type_of_inspection').val(type_of_inspection);
            $('#severity_of_inspection').val(severity_of_inspection);
            $('#inspection_lvl').val(inspection_lvl);
            $('#aql').val(aql);
            $('#accept').val(accept);
            $('#reject').val(reject);
            $('#date_inspected').val(date_inspected);
            $('#shift').val(shift);
            $('#inspector').val(inspector);
            $('#submission').val(submission);
            $('#visual_operator').val(visual_operator);
            $('#ww').val(ww);
            $('#fy').val(fy);
            $('#ptcp_tnr').val(ptcp_tnr);
            $('#lot_inspected').val(lot_inspected);
            $('#lot_accepted').val(lot_accepted);
            $('#sample_size').val(sample_size);
            $('#judgement').val(judgement);
            $('#no_of_defects').val(no_of_defects);
            $('#family').val(family);
            $('#remarks').val(remarks);
            $('#oqc_id').val(id);

            getTableLotno();
            getMODtable();
            getTotalQty();
            getMODTotalQty();
            init_mod();
            $('#btn_lot').removeAttr('disabled');
            $('#btn_mode_of_defects').removeAttr('disabled');
            $('#po_no').attr('disabled',true);
            $('#AddNewModal').modal('show');
        });

        //initiate delete
        $('#oqctable').on('click','.delete-oqc', function() {
            var id = $(this).attr('data-id');
            $('#oqc_id').val(id);
            $('#deloqcmsg').modal('show');
        })

        //delete oqc
        $('#delete_oqc').on('click', function() {
            $('#deloqcmsg').modal('hide');
            var id = $('#oqc_id').val();
            var url = "<?php echo e(url('/deleteoqc')); ?>";
            var token = "<?php echo e(Session::token()); ?>";
            var data = {
                _token: token,
                id: id,
            };
            $.ajax({
                url: url,
                type: "POST",
                data: data,
            }).done( function(data, textStatus, jqXHR) {
                if (data.status == "success") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                    $('#success_msg').html("OQC Record was successfully deleted.");
                }
                if (data.status == "error") {
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("There's some error while processing.");
                }
            }).fail( function(data, textStatus, jqXHR) {
                $('#msg').modal('show');
                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#err_msg').html("There's some error while processing.");
            });
        });

        $('#btn_posearch').on('click', function() {
            loadOQC();
        });

        $('#btn_datesearch').on('click', function() {
            loadOQC();
        });

        $('#btn_pdf').on('click', function() {
            var po = $('#posearch').val();
            var from = $('#from').val();
            var to = $('#to').val();
            window.location.href = "<?php echo e(url('/oqcprintreportpdf?po=')); ?>" + po + "&&from=" + from + "&&to=" + to;
        });

        $('#btn_excel').on('click', function() {
            var po = $('#posearch').val();
            var from = $('#from').val();
            var to = $('#to').val();
            window.location.href = "<?php echo e(url('/oqcprintreportexcel?po=')); ?>" + po + "&&from=" + from + "&&to=" + to;
        });

        $('#btn_ndf').on('click', function() {
            var mod = $('#mode_of_def').val();
            var qty = $('#mode_qty').val();
            var state = $('#mode_state').val();
            var id = $('#mode_id').val();
            var po = $('#po_no').val();
            var partcode = $('#part_code').val();
            save_mod(po,partcode,"NDF",0,"ndf",id);
        });

    });
    
    // state of mode of defects
    function init_mod() {
        if ($('#lot_accepted').val() == '') {
            $('#no_of_defects_label').hide();
            $('#no_of_defects').hide();
            $('#btn_mode_of_defects_label').hide();
            $('#btn_mode_of_defects').hide();
            $('#btn_ndf').hide();
        }
        else if ($('#lot_accepted').val() > 0) {
            $('#no_of_defects_label').hide();
            $('#no_of_defects').hide();
            $('#btn_mode_of_defects_label').show();
            $('#btn_mode_of_defects').hide();
            $('#btn_ndf').show();
        }
        else if ($('#lot_accepted').val() < 1) {
            $('#no_of_defects_label').show();
            $('#no_of_defects').show();
            $('#btn_mode_of_defects_label').show();
            $('#btn_ndf').hide();
            $('#btn_mode_of_defects').show();
        }
    }

    // getting the customer
    function getCust(custcode) {
        var url = "<?php echo e(url('/getcustoqcmolding')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            custcode: custcode
        };
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            $.each(data, function(i,x) {
                $('#customer').val(x.CNAME);
            });
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while processing.");
        });
    }

    // generating the table for lot number
    function getTableLotno() {
        var tblforLot = '';
        var po = $('#po_no').val();
        var url = "<?php echo e(url('/getlotnoqcmolding')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            po: po
        };
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            $('#tblforLot').empty();
            $.each(data, function(i, x) {
                tblforLot = '<tr>'+
                                '<td>'+x.lot_no+'</td>'+
                                '<td>'+x.qty+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn input-sm red btn_del_lot" data-id="'+x.id+'">'+
                                        '<i class="fa fa-trash"></i>'+
                                    '</a>'+
                                '</td>'+
                            '</tr>';
                $('#tblforLot').append(tblforLot);
            });
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while processing.");
        });
    }

    // get the total qty
    function getTotalQty() {
        var po = $('#po_no').val();
        var url = "<?php echo e(url('/gettotalqty')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            po: po
        };
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            $('#quantity').val(data);
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while calculating the total quantity.");
        });
    }

    // restart the process of lot number
    function restart_lotno() {
        $('#lot_no').empty();
        $('#lotqty').empty();
        $('#msg_success').modal('hide');
    }

    // insert lot number
    function insert_lot(po,lot_no,qty,total_qty) {
        if (!$.isNumeric(qty) || qty > parseInt(total_qty)) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("Quantity value is numeric only and must not be greater than the total quantity.");
        } else {
            var url = "<?php echo e(url('/postlotnoqcmolding')); ?>";
            var token = "<?php echo e(Session::token()); ?>";
            var data = {
                _token: token,
                po: po,
                lot_no: lot_no,
                qty: qty,
                total_qty: total_qty
            };
            $.ajax({
                url: url,
                type: "POST",
                data: data,
            }).done( function(data, textStatus, jqXHR) {
                if (data.status == "success") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                    $('#success_msg').html("Lot Number was successfully saved.");
                    console.log(data);
                    getTableLotno();
                    getTotalQty();
                    $('#lot_no').val('');
                    $('#lotqty').val('');
                }
                if (data.status == "existing") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#success_msg').html("Lot number was already added.");
                    console.log(data);
                }
                if (data.status == "greater") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#success_msg').html("You exceeded to the total P.O. quantity.");
                    console.log(data);
                }
                if (data.status == "error") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#success_msg').html("There's some error while processing.");
                    console.log(data.total);
                }
            }).fail( function(data, textStatus, jqXHR) {
                $('#msg').modal('show');
                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#err_msg').html("There's some error while processing.");
            });
        }
    }

    function delete_lot(id) {
        var url = "<?php echo e(url('/deletelotnoqcmolding')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            id: id,
        };
        $.ajax({
            url: url,
            type: "POST",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            if (data.status == "success") {
                $('#msg_success').modal('show');
                $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                $('#success_msg').html("Lot Number was successfully deleted.");
                console.log(data);
                getTableLotno();
                getTotalQty();
                $('#lot_no').val('');
                $('#lotqty').val('');
            }
            if (data.status == "error") {
                $('#msg_success').modal('show');
                $('#success_title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#success_msg').html("There's some error while processing.");
                console.log(data.total);
            }
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while processing.");
        });
    }

    function samplingplan() {
        var soi = $('#severity_of_inspection').val();
        var ilvl = $('#inspection_lvl').val();
        var aql = parseFloat($('#aql').val());
        var qty = parseInt($('#quantity').val());

        if (soi == 'Normal' && ilvl == 'S3' && aql == 0.40 && qty <= 32) {
            $('#sample_size').val(qty);
            $('#accept').val(0);
            $('#reject').val(1);
        }

        if (soi == 'Normal' && ilvl == 'S3' && aql == 0.40 && qty >= 33) {
            $('#sample_size').val(32);
            $('#accept').val(0);
            $('#reject').val(1);
        }

        if (soi == 'Tightened' && ilvl == 'S3' && aql == 0.40 && qty <= 50) {
            $('#sample_size').val(qty);
            $('#accept').val(0);
            $('#reject').val(1);
        }

        if (soi == 'Tightened' && ilvl == 'S3' && aql == 0.40 && qty >= 51) {
            $('#sample_size').val(50);
            $('#accept').val(0);
            $('#reject').val(1);
        }

        if (soi == 'Normal' && ilvl == 'S3' && aql == 1.00 && qty <= 13) {
            $('#sample_size').val(qty);
            $('#accept').val(0);
            $('#reject').val(1);
        }

        if (soi == 'Normal' && ilvl == 'S3' && aql == 1.00 && qty >= 14) {
            $('#sample_size').val(13);
            $('#accept').val(0);
            $('#reject').val(1);
        }

        if (soi == 'Normal' && ilvl == 'S3' && aql == 1.00 && qty <= 13) {
            $('#sample_size').val(qty);
            $('#accept').val(0);
            $('#reject').val(1);
        }

        if (soi == 'Normal' && ilvl == 'S2' && aql == 0.65 && qty >= 21) {
            $('#sample_size').val(20);
            $('#accept').val(0);
            $('#reject').val(1);
        }
    }

    // save mode of defects
    function save_mod(po,partcode,mod,qty,state,id) {
        if (!$.isNumeric(qty)) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("Quantity value is numeric only.");
        } else {
            var url = "<?php echo e(url('/postmod')); ?>";
            var token = "<?php echo e(Session::token()); ?>";
            var data = {
                _token: token,
                po: po,
                mod: mod,
                qty: qty,
                partcode: partcode,
                state: state,
                id: id
            };
            $.ajax({
                url: url,
                type: "POST",
                data: data,
            }).done( function(data, textStatus, jqXHR) {
                if (data.status == "success") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                    $('#success_msg').html("Mode of defects was successfully added.");
                    console.log(data);
                    getMODtable();
                    getMODTotalQty();
                    $('#mode_of_def').val('');
                    $('#mode_qty').val('');
                }
                if (data.status == "success_ndf") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                    $('#success_msg').html("You assigned an NDF. It means that there are no defects for this Lot.");
                    console.log(data);
                    getMODtable();
                    getMODTotalQty();
                    $('#mode_of_def').val('');
                    $('#mode_qty').val('');
                    $('#btn_ndf').attr('disabled',true);
                }
                if (data.status == "error") {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#success_msg').html("There's some error while processing.");
                    console.log(data.total);
                }
            }).fail( function(data, textStatus, jqXHR) {
                $('#msg').modal('show');
                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#err_msg').html("There's some error while processing.");
            });
        }
    }

    //delete mod
    function delete_mod(po,partcode,mod) {
        var url = "<?php echo e(url('/deletemod')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            po: po,
            partcode: partcode,
            mod: mod
        };
        $.ajax({
            url: url,
            type: "POST",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            if (data.status == "success") {
                $('#msg_success').modal('show');
                $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                $('#success_msg').html("Mode of defect was successfully deleted.");
                console.log(data);
                getMODtable();
                getMODTotalQty();
                $('#mode_of_def').val('');
                $('#mode_qty').val('');
            }
            if (data.status == "error") {
                $('#msg_success').modal('show');
                $('#success_title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#success_msg').html("There's some error while processing.");
                console.log(data.total);
            }
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while processing.");
        });
    }

    function getMODtable() {
        var tblformod = '';
        var po = $('#po_no').val();
        var partcode = $('#part_code').val();
        var url = "<?php echo e(url('/getmodtbl')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            po: po,
            partcode: partcode
        };
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            $('#tblformod').empty();
            $.each(data, function(i, x) {
                tblformod = '<tr>'+
                                '<td>'+x.description+'</td>'+
                                '<td>'+x.qty+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn input-sm red btn_del_MOD" data-mod="'+x.description+'" data-id="'+x.id+'">'+
                                        '<i class="fa fa-trash"></i>'+
                                    '</a>'+
                                '</td>'+
                            '</tr>';
                $('#tblformod').append(tblformod);
            });
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while processing.");
        });
    }

    // get the total qty
    function getMODTotalQty() {
        var po = $('#po_no').val();
        var partcode = $('#part_code').val();
        var url = "<?php echo e(url('/getmodtotalqty')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            po: po,
            partcode: partcode
        };
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            $('#no_of_defects').val(data);
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while calculating the total quantity.");
        });
    }

    // save oqc record
    function save_oqc() {
        var oqc_status = $('#oqc_status').val();
        var po_no = $('#po_no').val();
        var part_code = $('#part_code').val();
        var part_name = $('#part_name').val();
        var customer = $('#customer').val();
        var total_qty = $('#total_qty').val();
        var die_num = $('#die_num').val();
        var quantity = $('#quantity').val();
        var type_of_inspection = $('#type_of_inspection').val();
        var severity_of_inspection = $('#severity_of_inspection').val();
        var inspection_lvl = $('#inspection_lvl').val();
        var aql = $('#aql').val();
        var accept = $('#accept').val();
        var reject = $('#reject').val();
        var date_inspected = $('#date_inspected').val();
        var shift = $('#shift').val();
        var inspector = $('#inspector').val();
        var submission = $('#submission').val();
        var visual_operator = $('#visual_operator').val();
        var ww = $('#ww').val();
        var fy = $('#fy').val();
        var ptcp_tnr = $('#ptcp_tnr').val();
        var lot_inspected = $('#lot_inspected').val();
        var lot_accepted = $('#lot_accepted').val();
        var sample_size = $('#sample_size').val();
        var judgement = $('#judgement').val();
        var no_of_defects = $('#no_of_defects').val();
        var family = $('#family').val();
        var remarks = $('#remarks').val();
        var id = $('#oqc_id').val();
        var from = $('#start_time').val();

        if (po_no == '' || part_code == '' || part_name == '' || customer == '' || total_qty == '' || die_num == '' || 
            quantity == '' || type_of_inspection == '' || severity_of_inspection == '' || inspection_lvl == '' || 
            aql == '' || accept == '' || reject == '' || date_inspected == '' || shift == '' || inspector == '' || 
            submission == '' || visual_operator == '' || ww == '' || fy == '' || ptcp_tnr == '' || lot_inspected == '' || 
            lot_accepted == '' || sample_size == '' || judgement == '') {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("Some input needed to fill out.");
        } else {
            var url = "<?php echo e(url('/saveoqc')); ?>";
            var token = "<?php echo e(Session::token()); ?>";
            var data = {
                _token: token,
                id : id,
                po_no : po_no,
                part_code : part_code,
                part_name : part_name,
                customer : customer,
                total_qty : total_qty,
                die_num : die_num,
                quantity : quantity,
                type_of_inspection : type_of_inspection,
                severity_of_inspection : severity_of_inspection,
                inspection_lvl : inspection_lvl,
                aql : aql,
                accept : accept,
                reject : reject,
                date_inspected : date_inspected,
                shift : shift,
                inspector : inspector,
                submission : submission,
                visual_operator : visual_operator,
                ww : ww,
                fy : fy,
                ptcp_tnr : ptcp_tnr,
                lot_inspected : lot_inspected,
                lot_accepted : lot_accepted,
                sample_size : sample_size,
                judgement : judgement,
                no_of_defects : no_of_defects,
                family : family,
                remarks : remarks,
                status : oqc_status,
                from : from
            };
            $.ajax({
                url: url,
                type: "POST",
                data: data,
            }).done( function(data, textStatus, jqXHR) {
                if (data.status == 'success') {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                    $('#success_msg').html("Record was successfully saved.");
                    $('#oqc_status').val('insert');
                    $('.clear').val('');
                    $('#oqc_id').val('');
                    loadOQC();
                    getTime();
                    init_mod();
                    $('#btn_lot').attr('disabled',true);
                }

                if (data.status == 'update_success') {
                    $('#msg_success').modal('show');
                    $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                    $('#success_msg').html("Record was successfully updated.");
                    $('#oqcdatatable').DataTable();
                }

                if (data.status == 'error') {
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("There's some error while processing.");
                }
            }).fail( function(data, textStatus, jqXHR) {
                $('#msg').modal('show');
                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#err_msg').html("There's some error while processing.");
            });
        }
    }

    // load table oqc
    function loadOQC() {
        $('#loading').modal('show');
        var oqctable = '';
        var po = $('#posearch').val();
        var from = $('#from').val();
        var to = $('#to').val();
        var url = "<?php echo e(url('/getloadoqc')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var data = {
            _token: token,
            po: po,
            from: from,
            to: to
        };
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        }).done( function(data, textStatus, jqXHR) {
            $('#loading').modal('hide');
            $('#oqctable').empty();
            var cnt = 0;
            $.each(data, function(i, x) {
                cnt++;
                oqctable = '<tr>'+
                            '<td>'+
                                '<a href="javascript:;" class="btn btn-sm btn-primary update-oqc" data-id="'+x.id+'" data-po="'+x.po_no+'" '+
                                'data-partcode="'+x.partcode+'" data-partname="'+x.partname+'" data-customer="'+x.customer+'" data-totalqty="'+x.total_qty+'" '+
                                'data-die="'+x.die_no+'" data-qty="'+x.qty+'" data-toi="'+x.type_of_inspection+'" data-soi="'+x.severity_of_inspection+'" '+
                                'data-inspectionlvl="'+x.inspection_lvl+'" data-aql="'+x.aql+'" data-accept="'+x.accept+'" data-reject="'+x.reject+'" '+
                                'data-dateinspected="'+x.date_inspected+'" data-shift="'+x.shift+'" data-inspector="'+x.inspector+'" data-submission="'+x.submission+'" '+
                                'data-visualoperator="'+x.visual_operator+'" data-ww="'+x.ww_no+'" data-fy="'+x.fy_no+'" data-ptcp="'+x.ptcp_tnr+'" '+
                                'data-lotinspected="'+x.lot_inspected+'" data-lotaccepted="'+x.lot_accepted+'" data-samplesize="'+x.sample_size+'" data-judgement="'+x.judgement+'" '+
                                'data-noofdefects="'+x.num_of_defectives+'" data-family="'+x.family+'" data-remarks="'+x.remarks+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</a>'+
                            '</td>'+
                            '<td>'+
                                '<a href="javascript:;" class="btn btn-sm btn-danger delete-oqc" data-id="'+x.id+'">'+
                                       '<i class="fa fa-trash"></i>'+
                                '</a>'+
                            '</td>'+
                            '<td>'+x.id+'</td>'+
                            '<td>'+x.date_inspected+'</td>'+
                            '<td>'+x.submission+'</td>'+
                            '<td>'+x.fy_no+'</td>'+
                            '<td>'+x.ww_no+'</td>'+
                            '<td>'+x.customer+'</td>'+
                            '<td>'+x.partcode+'</td>'+
                            '<td>'+x.partname+'</td>'+
                            '<td>'+x.po_no+'</td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td>'+x.qty+'</td>'+
                       '</tr>';
                $('#oqctable').append(oqctable);
            });
            $('#record_count').val(cnt);
        }).fail( function(data, textStatus, jqXHR) {
            $('#msg').modal('show');
            $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
            $('#err_msg').html("There's some error while calculating the total quantity.");
        });
    }

    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var sec = date.getSeconds();
        var ampm = hours >= 12 ? 'AM' : 'PM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var strTime = hours + ':' + minutes + ':' + sec + ' ' + ampm;
        return strTime;
    }

    function getTime() {
        var d = new Date();
        var time = formatAMPM(d);

        $('#start_time').val(time);
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>