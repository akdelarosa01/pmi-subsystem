<?php $__env->startSection('title'); ?>
    QC Database | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

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
                                                            <i class="fa fa-search"></i> OQC Inspection
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-striped table-responsive" id="oqcdatatable">
                                                                        <thead>
                                                                            <tr>
                                                                                <td class="table-checkbox" style="width: 5%">
                                                                                    <input type="checkbox" class="group-checkable checkAllitems" />
                                                                                </td>
                                                                                <td></td>
                                                                                <td>FY-WW</td>
                                                                                <td>Date Inspected</td>
                                                                                <td>Device Name</td>
                                                                                <td>From</td>
                                                                                <td>To</td>
                                                                                <td># of Sub</td>
                                                                                <td>Lot Size</td>
                                                                                <td>Sample Size</td>
                                                                                <td>No of Defective</td>
                                                                                <td>Lot No</td>
                                                                                <td>Mode of Defects</td>
                                                                                <td>Qty</td>
                                                                                <td>Judgement</td>
                                                                                <td>Inspector</td>
                                                                                <td>Remarks</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="tblforoqcinspection">
                                                                      
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <a href="javascript:;" class="btn green" id="btn_addnew">
                                                    <i class="fa fa-plus"></i> Add New
                                                </a>
                                                <button type="button" class="btn grey-gallery" id="btn_groupby">
                                                    <i class="fa fa-group"></i> Group By
                                                </button>
                                                <button type="button" onclick="javascript:deleteAllchecked();" class="btn red" id="btn_delete">
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
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_report_status" id="hd_report_status"/>
                                                <input type="hidden" class="form-control input-sm clear" id="hdg1_selected" name="hdg1_selected" readonly>
                                                <input type="hidden" class="form-control input-sm clear" id="hdg2_selected" name="hdg2_selected" readonly>
                                                <input type="hidden" class="form-control input-sm clear" id="hdg3_selected" name="hdg3_selected" readonly>

                                                <input type="hidden" class="form-control input-sm clear" id="count_lotrejected" name="count_lotrejected" readonly>
                                                <input type="hidden" class="form-control input-sm clear" id="count_Totallotrejected" name="count_Totallotrejected" readonly>
                                                <input type="hidden" class="form-control input-sm clear" id="count_lot" name="count_lot" readonly>
                                                <input type="hidden" class="form-control input-sm clear" id="lot_accepted_changed" name="lot_accepted_changed" readonly>
                                                
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Assembly Line</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick checkifEmpty" name="assembly_line" id="assembly_line">
                                            <option value=""></option>
                                            <?php foreach($assemblyline as $aline): ?>
                                            <option value="<?php echo e($aline->description); ?>"><?php echo e($aline->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="hidden" class="form-control input-sm" id="id" name="id">
                                         <input type="hidden" class="form-control input-sm" value="<?php echo $count + 1; ?>" id="add_id" name="add_id">
                                        <div id="er_assembly_line"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="lot_no" name="lot_no">
                                        <div id="er_lot_no"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Application Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control input-sm date-picker checkifEmpty" type="text" name="app_date" id="app_date"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Application Time</label>
                                    <div class="col-sm-9">
                                        <input type="text" data-format="hh:mm A" value="<?php echo e(date('h:i A')); ?>" class="form-control input-sm clockface_1 checkifEmpty" name="app_time" id="app_time"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Product Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick checkifEmpty" name="prod_category" id="prod_category">
                                            <option value=""></option>
                                            <option value="Automotive">Automotive</option>
                                            <option value="Non-Automotive">Non-Automotive</option>
                                        </select>
                                        <div id="er_prod_category"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">P.O. No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="po_no" name="po_no">
                                        <div id="er_po_no"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Device Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="series_name" name="series_name">
                                        <div id="er_series_name"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="customer" name="customer">
                                        <div id="er_customer"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">P.O. Qty</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="po_qty" name="po_qty">
                                        <div id="er_po_qty"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Family</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick checkifEmpty" name="family" id="family">
                                        <option value=""></option>  
                                        <?php foreach($families as $family): ?>
                                            <option value="<?php echo e($family->description); ?>"><?php echo e($family->description); ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                        <div id="er_family"></div>
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
                                        <select class="form-control input-sm show-tick checkifEmpty" name="type_of_inspection" id="type_of_inspection">
                                            <option value=""></option>
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
                                        <select class="form-control input-sm show-tick checkifEmpty" name="severity_of_inspection" id="severity_of_inspection">
                                            <option value=""></option>
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
                                        <select class="form-control input-sm show-tick checkifEmpty" name="inspection_lvl" id="inspection_lvl">
                                            <option value=""></option>
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
                                        <select class="form-control input-sm show-tick checkifEmpty" name="aql" id="aql">
                                            <option value=""></option>
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
                                        <input type="number" min="0" max="1" class="form-control input-sm" id="accept" name="accept">
                                        <div id="er_accept"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Reject</label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" max="1" class="form-control input-sm" id="reject" name="reject">
                                        <div id="er_reject"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <strong>Visual Inspection</strong>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Date Inspected</label>
                                    <div class="col-sm-9">
                                        <input class="form-control input-sm date-picker" type="text" value="" name="date_inspected" id="date_inspected"/>
                                        <div id="er_date_inspected"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">WW#</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="ww" name="ww">
                                        <div id="er_ww"></div>
                                    </div>
                                    <label class="control-label col-sm-3">FY#</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="fy" name="fy">
                                        <div id="er_fy"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Time Inspected</label>
                                    <div class="col-sm-4">
                                        <input type="text" data-format="hh:mm A" class="form-control input-sm clear clockface_1 checkifEmpty" name="time_ins_from" id="time_ins_from"/>
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
                                        <select class="form-control input-sm show-tick checkifEmpty" name="shift" id="shift">
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
                                        <input type="text" class="form-control input-sm" id="inspector" name="inspector" readonly />
                                        <div id="er_inspector"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Submission</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick checkifEmpty" name="submission" id="submission">
                                            <option value=""></option>
                                            <?php foreach($submissions as $submission): ?>
                                            <option value="<?php echo e($submission->description); ?>"><?php echo e($submission->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div id="er_submission"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">COC Requirements</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick checkifEmpty" name="coc_req" id="coc_req">
                                            <option value=""></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div id="er_coc_req"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Judgement</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="judgement" name="judgement">
                                        <div id="er_judgement"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="lot_qty" name="lot_qty">
                                        <div id="er_lot_qty"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Sample Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="sample_size" name="sample_size">
                                        <div id="er_sample_size"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot Inspected</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="lot_inspected" name="lot_inspected">
                                        <div id="er_lot_inspected"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot Accepted</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm checkifEmpty" id="lot_accepted" name="lot_accepted">
                                        <div id="er_lot_accepted"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" id="no_defects_label" >No. of Defectives</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="no_of_defects" name="no_of_defects" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Remarks</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="remarks" name="remarks">
                                        <input type="hidden" class="form-control input-sm" id="hdstatus" name="hdstatus">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" id="mode_defects_label">Mode of Defects</label>
                                    <div class="col-sm-4">
                                        <button type="button" onclick="javascript:display_mod();" class="btn blue" id="btn_mode_of_defects">
                                            <i class="fa fa-plus-circle"></i> Add Mode of Defects
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="javascript:save();" class="btn btn-success" id="btn_savemodal">Save</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
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
                                    <label class="control-label col-sm-3">Mode of Defect</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick" name="mode_of_def" id="mode_of_def">
                                           <option value=""></option>
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
                                        <input type="text" name="mode_qty" id="mode_qty" class="form-control input-sm">
                                        <input type="hidden" name="modstatus" id="modstatus" class="form-control input-sm">
                                        <input type="hidden" name="modid" id="modid" class="form-control input-sm">
                                        <input type="hidden" name="modpono" id="modpono" class="form-control input-sm">
                                        <input type="hidden" name="moddevice" id="moddevice" class="form-control input-sm">
                                        <div id="er_qty"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="button" onclick="javascript:oqcmodsave();" class="btn btn-sm green pull-right">Save</button>      
                                        <button type="button" onclick="javascript:oqcmoddelete();" class="btn btn-sm red pull-right">Delete</button>    
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
                                                    <input type="checkbox" class="group-checkable checkAllitemsmod" />
                                                </td>
                                                <td></td>
                                                <td>#</td>
                                                <td>Mode of Defects</td>
                                                <td>Quantity</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tableforoqcmod">
                                        <!-- oqcmod  records-->
                                      
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
                                    <label class="control-label col-sm-3">PO Number</label>
                                    <div class="col-sm-7">
                                        <input class="form-control input-sm" type="text" value="" name="search_pono" id="search_pono"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">From</label>
                                    <div class="col-sm-7">
                                        <input class="form-control input-sm date-picker" type="text" value="" name="search_from" id="search_from"/>
                                        <div id="er_search_from"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">To</label>
                                    <div class="col-sm-7">
                                        <input class="form-control input-sm date-picker" type="text" value="" name="search_to" id="search_to"/>
                                        <div id="er_search_to"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="javascript:searchby();" class="btn btn-success" id="">OK</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger" id="btn_search-close">Close</button>
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
                                        <option value="date_inspected">Date Inspected</option>
                                        <option value="time_ins_from">Inspection Time</option>
                                        <option value="fy">FY#</option>
                                        <option value="ww">WW#</option>  
                                        <option value="assembly_line">Assembly Line</option>  
                                        <option value="submission">Submission</option>
                                        <option value="prod_category">Category</option>
                                        <option value="customer">Customer Name</option>
                                        <option value="family">Family</option>
                                        <option value="device_name">Device Name</option>
                                        <option value="po_no">P.O#</option>
                                        <option value="lot_no">Lot No</option>
                                        <option value="aql">AQL</option>
                                        <option value="lot_accepted">Lot Accepted</option>
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
                                        <option value="date_inspected">Date Inspected</option>
                                        <option value="time_ins_from">Inspection Time</option>
                                        <option value="fy">FY#</option>
                                        <option value="ww">WW#</option>  
                                        <option value="assembly_line">Assembly Line</option>  
                                        <option value="submission">Submission</option>
                                        <option value="prod_category">Category</option>
                                        <option value="customer">Customer Name</option>
                                        <option value="family">Family</option>
                                        <option value="device_name">Device Name</option>
                                        <option value="po_no">P.O#</option>
                                        <option value="lot_no">Lot No</option>
                                        <option value="aql">AQL</option>
                                        <option value="lot_accepted">Lot Accepted</option>
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
                                        <option value="date_inspected">Date Inspected</option>
                                        <option value="time_ins_from">Inspection Time</option>
                                        <option value="fy">FY#</option>
                                        <option value="ww">WW#</option>  
                                        <option value="assembly_line">Assembly Line</option>  
                                        <option value="submission">Submission</option>
                                        <option value="prod_category">Category</option>
                                        <option value="customer">Customer Name</option>
                                        <option value="family">Family</option>
                                        <option value="device_name">Device Name</option>
                                        <option value="po_no">P.O#</option>
                                        <option value="lot_no">Lot No</option>
                                        <option value="aql">AQL</option>
                                        <option value="lot_accepted">Lot Accepted</option>
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
                                            <td>Total Inspected</td>
                                            <td>Total Accept</td>
                                            <td>Total Reject</td>
                                            <td>Total Sample Size</td>
                                            <td>Total NG</td>
                                            <td>Total LAR</td>
                                            <td>Total LRR</td>
                                            <td>Total DPPM</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tblfortotallarlrrdppm">
                                        <!-- table records here -->
                                    </tbody>
                                </table>
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
                                            <td>NG</td>
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

    <!-- lot accept on change -->
    <div id="lotaccept_onchange" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog gray-gallery">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Warning!</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-10">Please Delete all defects before changing the value to 1.</label>
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

    <!-- Fields Required -->
    <div id="checkemptyModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Warning!</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-10">All Fields are required</label>
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
<script>
$(function() {
    loadOQCdata();
    lot_accepted();
    $('#hd_report_status').val("");
    $('#groupby_datefrom').datepicker();
    $('#groupby_dateto').datepicker();
    $('#search_from').datepicker();
    $('#search_to').datepicker();
    $('select[name=assembly_line]').select2();
    $('select[name=prod_category]').select2();
    $('select[name=family]').select2();
    $('select[name=type_of_inspection]').select2();
    $('select[name=severity_of_inspection]').select2();
    $('select[name=inspection_lvl]').select2();
    $('select[name=aql]').select2();
    $('select[name=shift]').select2();
    $('select[name=submission]').select2();
    $('select[name=coc_req]').select2();
    var hdpono = $('#hdpono').val();
    $('#groupby_datefrom').on('change',function(){
          $(this).datepicker('hide');
    });
    $('#groupby_dateto').on('change',function(){
          $(this).datepicker('hide');
    });
    $('#search_from').on('change',function(){
          $(this).datepicker('hide');
    });
    $('#search_to').on('change',function(){
          $(this).datepicker('hide');
    });

    var date = new Date();
    var newmonth = date.getMonth() + 1;
    var datenow =  newmonth + "/" + date.getDate()+ "/" + date.getFullYear();
    //getting the currnt time----------
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;

    $('#btn_addnew').on('click', function (){
        $('#AddNewModal').modal('show');
        $('#hdstatus').val("ADD"); 
        $('input[name=id]').val(id);
        clearfields();
        lot_accepted();
    });

    $('#btn_mode_of_defects').on('click', function() {
        $('#ModeOfDefectsModal').modal('show');
        $('#modstatus').val("ADD");
        var pono = $('#po_no').val();
        var device = $('#series_name').val();
        $('#modpono').val(pono);
        $('#moddevice').val(device);
    });

    $('#btn_groupby').on('click', function() {
        $('#GroupByModal').modal('show');
        $('#groupby_datefrom').val("");
        $('#groupby_dateto').val("");
        $('#group1').select2('val',"");
        $('#group2').select2('val',"");
        $('#group3').select2('val',"");
        $('#group1content').select2('val',"");
        $('#group2content').select2('val',"");
        $('#group3content').select2('val',"");
        $('#tblfortotallarlrrdppm').html("");
        $('#tblforlarlrrdppm').html("");


        //to classify group by when reporting----------
        $('#hd_report_status').val("GROUPBY");
        $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        $('#hd_search_pono').val("");
    });

    $('#btn_search').on('click', function() {
        $('#SearchModal').modal('show');
        $('#search_pono').val("");
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
        if($('.checkboxes').is(':checked')){
            $('.deleteAll-task').removeClass("disabled");
            $('#add').addClass("disabled");
        }else{
            $('.deleteAll-task').addClass("disabled");
            $('#add').removeClass("disabled");
        }
    
    });
    $('.checkAllitemsmod').change(function(){
        if($('.checkAllitemsmod').is(':checked')){
            $('.deleteAll-task').removeClass("disabled");
            $('#add').addClass("disabled");
            $('input[name=checkitemmod]').parents('span').addClass("checked");
            $('input[name=checkitemmod]').prop('checked',this.checked);
        }else{
            $('input[name=checkitemmod]').parents('span').removeClass("checked");
            $('input[name=checkitemmod]').prop('checked',this.checked);
            $('.deleteAll-task').addClass("disabled");
            $('#add').removeClass("disabled");
        }       
    });

    $('.checkboxesmod').change(function(){
        $('input[name=checkAllitemmod]').parents('span').removeClass("checked");
        $('input[name=checkAllitemmod]').prop('checked',false);
    });

    $('.edit-taskmod').on('click',function(){
        var field = $(this).val().split('|');
        var id = field[0];
        $.ajax({
            url:"<?php echo e(url('/oqcmodinspectionedit')); ?>",
            method:'get',
            data:{
                id:id
            },
        }).done(function(data, textStatus, jqXHR){
            console.log(data);
            $('#mode_of_def').val(data[0]['mod']);
            $('#mode_qty').val(data[0]['qty']);
            $('#modid').val(id);
            $('#modstatus').val("EDIT");
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });
    });

 
    $('#search_from').click(function(){
        $('#er_search_from').html(""); 
    });

    $('#search_to').click(function(){
        $('#er_search_to').html(""); 
    });
 
    $('#po_no').on('change',function(){ 
        var pono = $(this).val();
        $.ajax({
            url:"<?php echo e(url('/getYPICSrecords')); ?>",
            method:'get',
            data:{
                pono:pono
            },
        }).done(function(data, textStatus, jqXHR){
            $('#series_name').val(data[0]['DEVNAME']);
            $('#customer').val(data[0]['CUSTOMER']);
            $('#po_qty').val(data[0]['POQTY']);
            if(pono == ""){
                $('#series_name').val("");
                $('#customer').val("");
                $('#po_qty').val("");
            }
            //date today
            var date = new Date();
            var month = date.getMonth()+1;
            var day = date.getDate();
            var output = (month<10 ? '0' : '') + month + '/' +(day<10 ? '0' : '') + day + '/' +  date.getFullYear();
            
            $('#date_inspected').val(output);
            var current_year = date.getFullYear();
            var newweek = new Date($('#date_inspected').val());
            var weektoday = newweek.getWeek();

            var adjustedweek = '';
            var adjustedyear = '';
            if(weektoday < 14){
                adjustedweek = weektoday + 39;
                adjustedyear = current_year - 1;
            }else{
                adjustedweek = weektoday - 13;
                adjustedyear = current_year;
            }
            $('#ww').val(adjustedweek);
            $('#fy').val(adjustedyear);
            
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });

        $.ajax({
            url:"<?php echo e(url('/getFamily')); ?>",
            method:'get'
        }).done(function(data, textStatus, jqXHR){
            $.each(data,function(i,val){
                var option = '<option value="'+val.family+'">'+val.family+'</option>';
                $('#family').append(option);
            });
            if(pono == ""){
                $('#family').val("");    
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });
    }); 

    $('#time_ins_from').focusout(function(){
        var timefrom = $('#time_ins_from').val();
        var timeto = $('#time_ins_to').val();
        var url = "<?php echo e(url('/time')); ?>";
        $.ajax({
            url:url,
            method:'get',
            data:{
                timefrom:timefrom,
                timeto:timeto
            },
        }).done(function(data,textStatus,jqXHR){
            $('#shift').select2('val',data);
        }).fail(function(jqXHR,textStatus,errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });
    });

    $('#lot_accepted').on('change', function() {
        lot_accepted();
    });

    $('#btn_close').click(function(){
        lot_accepted();
    });

    $('#btn_pdf').on('click', function() {
        var status = $('#hd_report_status').val();
        var hdpono = $('#hd_partcode').val();
        var datefrom = $('#hd_search_from').val();
        var dateto = $('#hd_search_to').val();

        var mod = [];//empty array
        var lot = [];//empty array

        $(".mod_val").each(function() {
            mod.push($(this).html());//push the array values to mod
        });
        $(".lot_val").each(function() {
            lot.push($(this).html());//push the array values to mod
        });
        var tbldata = '';
        if(status == "GROUPBY"){
            tbldata = {
                pono: $('input[name^="hd_pono[]"]').map(function(){return $(this).val();}).get(),
                fyww: $('input[name^="hd_fyww[]"]').map(function(){return $(this).val();}).get(),
                date_inspected: $('input[name^="hd_date_inspected[]"]').map(function(){return $(this).val();}).get(),
                device_name: $('input[name^="hd_device_name[]"]').map(function(){return $(this).val();}).get(),
                time_ins_from: $('input[name^="hd_time_ins_from[]"]').map(function(){return $(this).val();}).get(),
                time_ins_to: $('input[name^="hd_time_ins_to[]"]').map(function(){return $(this).val();}).get(),
                submission: $('input[name^="hd_submission[]"]').map(function(){return $(this).val();}).get(),
                lot_qty: $('input[name^="hd_lot_qty[]"]').map(function(){return $(this).val();}).get(),
                sample_size: $('input[name^="hd_sample_size[]"]').map(function(){return $(this).val();}).get(),
                num_of_defects: $('input[name^="hd_num_of_defects[]"]').map(function(){return $(this).val();}).get(),
                lot_no: lot,
                mod: mod,
                qty: $('input[name^="hd_qty[]"]').map(function(){return $(this).val();}).get(),
                judgement: $('input[name^="hd_judgement[]"]').map(function(){return $(this).val();}).get(),
                inspector: $('input[name^="hd_inspector[]"]').map(function(){return $(this).val();}).get(),
                remarks: $('input[name^="hd_remarks[]"]').map(function(){return $(this).val();}).get(),
                status: status,
                hdpono: hdpono,
                datefrom: datefrom,
                dateto: dateto,
            }    
        } else {
            tbldata = {
                pono: $('input[name^="hd_pono[]"]').map(function(){return $(this).val();}).get(),
                fyww: $('input[name^="hd_fyww[]"]').map(function(){return $(this).val();}).get(),
                date_inspected: $('input[name^="hd_date_inspected[]"]').map(function(){return $(this).val();}).get(),
                device_name: $('input[name^="hd_device_name[]"]').map(function(){return $(this).val();}).get(),
                time_ins_from: $('input[name^="hd_time_ins_from[]"]').map(function(){return $(this).val();}).get(),
                time_ins_to: $('input[name^="hd_time_ins_to[]"]').map(function(){return $(this).val();}).get(),
                submission: $('input[name^="hd_submission[]"]').map(function(){return $(this).val();}).get(),
                lot_qty: $('input[name^="hd_lot_qty[]"]').map(function(){return $(this).val();}).get(),
                sample_size: $('input[name^="hd_sample_size[]"]').map(function(){return $(this).val();}).get(),
                num_of_defects: $('input[name^="hd_num_of_defects[]"]').map(function(){return $(this).val();}).get(),
                lot_no: $('input[name^="hd_lotno[]"]').map(function(){return $(this).val();}).get(),
                mod: mod,
                qty: $('input[name^="hd_qty[]"]').map(function(){return $(this).val();}).get(),
                judgement: $('input[name^="hd_judgement[]"]').map(function(){return $(this).val();}).get(),
                inspector: $('input[name^="hd_inspector[]"]').map(function(){return $(this).val();}).get(),
                remarks: $('input[name^="hd_remarks[]"]').map(function(){return $(this).val();}).get(),
                status: status,
                hdpono: hdpono,
                datefrom: datefrom,
                dateto: dateto,
            }    
        }

        var url = "<?php echo e(url('/oqcprintreport?data=')); ?>" + encodeURIComponent(JSON.stringify(tbldata));
        window.location.href= url;
    });

    $('#btn_excel').on('click', function() {
        var status = $('#hd_report_status').val();
        var hdpono = $('#hd_partcode').val();
        var datefrom = $('#hd_search_from').val();
        var dateto = $('#hd_search_to').val();
     
        var mod = [];
        var lot = [];


        $(".mod_val").each(function() {
            mod.push($(this).html());
        });
        $(".lot_val").each(function() {
            lot.push($(this).html());//push the array values to mod
        });

        if(status == "GROUPBY"){
            var tbldata = {
                pono: $('input[name^="hd_pono[]"]').map(function(){return $(this).val();}).get(),
                fyww: $('input[name^="hd_fyww[]"]').map(function(){return $(this).val();}).get(),
                date_inspected: $('input[name^="hd_date_inspected[]"]').map(function(){return $(this).val();}).get(),
                device_name: $('input[name^="hd_device_name[]"]').map(function(){return $(this).val();}).get(),
                time_ins_from: $('input[name^="hd_time_ins_from[]"]').map(function(){return $(this).val();}).get(),
                time_ins_to: $('input[name^="hd_time_ins_to[]"]').map(function(){return $(this).val();}).get(),
                submission: $('input[name^="hd_submission[]"]').map(function(){return $(this).val();}).get(),
                lot_qty: $('input[name^="hd_lot_qty[]"]').map(function(){return $(this).val();}).get(),
                sample_size: $('input[name^="hd_sample_size[]"]').map(function(){return $(this).val();}).get(),
                num_of_defects: $('input[name^="hd_num_of_defects[]"]').map(function(){return $(this).val();}).get(),
                lot_no: lot,
                mod: mod,
                qty: $('input[name^="hd_qty[]"]').map(function(){return $(this).val();}).get(),
                judgement: $('input[name^="hd_judgement[]"]').map(function(){return $(this).val();}).get(),
                inspector: $('input[name^="hd_inspector[]"]').map(function(){return $(this).val();}).get(),
                remarks: $('input[name^="hd_remarks[]"]').map(function(){return $(this).val();}).get(),
                status: status,
                hdpono: hdpono,
                datefrom: datefrom,
                dateto: dateto,
            }   
        } else {
            var tbldata = {
                pono: $('input[name^="hd_pono[]"]').map(function(){return $(this).val();}).get(),
                fyww: $('input[name^="hd_fyww[]"]').map(function(){return $(this).val();}).get(),
                date_inspected: $('input[name^="hd_date_inspected[]"]').map(function(){return $(this).val();}).get(),
                device_name: $('input[name^="hd_device_name[]"]').map(function(){return $(this).val();}).get(),
                time_ins_from: $('input[name^="hd_time_ins_from[]"]').map(function(){return $(this).val();}).get(),
                time_ins_to: $('input[name^="hd_time_ins_to[]"]').map(function(){return $(this).val();}).get(),
                submission: $('input[name^="hd_submission[]"]').map(function(){return $(this).val();}).get(),
                lot_qty: $('input[name^="hd_lot_qty[]"]').map(function(){return $(this).val();}).get(),
                sample_size: $('input[name^="hd_sample_size[]"]').map(function(){return $(this).val();}).get(),
                num_of_defects: $('input[name^="hd_num_of_defects[]"]').map(function(){return $(this).val();}).get(),
                lot_no: $('input[name^="hd_lotno[]"]').map(function(){return $(this).val();}).get(),
                mod: mod,
                qty: $('input[name^="hd_qty[]"]').map(function(){return $(this).val();}).get(),
                judgement: $('input[name^="hd_judgement[]"]').map(function(){return $(this).val();}).get(),
                inspector: $('input[name^="hd_inspector[]"]').map(function(){return $(this).val();}).get(),
                remarks: $('input[name^="hd_remarks[]"]').map(function(){return $(this).val();}).get(),
                status: status,
                hdpono: hdpono,
                datefrom: datefrom,
                dateto: dateto,
            }   
        }
        

        var url = "<?php echo e(url('/oqcinsprintreportexcel?data=')); ?>" + encodeURIComponent(JSON.stringify(tbldata));
        window.location.href= url;
    });

    $('#group1').on('change',function(){
        var g1 = $('select[name=group1]').val();
        var myData = {g1:g1};
        $('#group1content').html("");
        $('#tblforoqcinspection').html("");
        $.post("<?php echo e(url('/oqcdbselectgroupby1')); ?>",
        {
            _token:$('meta[name=csrf-token]').attr('content'),
            data:myData

        }).done(function(data, textStatus, jqXHR){
            console.log(data);
            /*$('#group1content').val(data);*/
            $.each(data,function(i,val){
                var sup = '';
                switch(g1) {
                    case "date_inspected":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.date_inspected+'">'+val.date_inspected+'</option>';
                        break;
                    case "time_ins_from":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.time_ins_from+'">'+val.time_ins_from+'</option>';
                        break;
                    case "fy":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.fy+'">'+val.fy+'</option>';
                        break;
                    case "ww":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.ww+'">'+val.ww+'</option>';
                        break;
                    case "assembly_line":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.assembly_line+'">'+val.assembly_line+'</option>';
                        break;
                    case "submission":
                        var sup = '<option value=""></option>'+ 
                        '<option value="'+val.submission+'">'+val.submission+'</option>';
                        break;
                    case "prod_category":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.prod_category+'">'+val.prod_category+'</option>';
                        break;
                    case "customer":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.customer+'">'+val.customer+'</option>';
                        break;
                    case "family":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.family+'">'+val.family+'</option>';
                        break;
                    case "device_name":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.device_name+'">'+val.device_name+'</option>';
                        break;
                    case "po_no":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.po_no+'">'+val.po_no+'</option>';
                        break;
                    case "lot_no":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.lot_no+'">'+val.lot_no+'</option>';
                        break;
                    case "aql":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.aql+'">'+val.aql+'</option>';
                        break;
                    case "lot_accepted":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.lot_accepted+'">'+val.lot_accepted+'</option>';
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
        $('#tblforoqcinspection').html("");
        $.post("<?php echo e(url('/oqcdbselectgroupby1')); ?>",
        {
            _token:$('meta[name=csrf-token]').attr('content'),
            data:myData

        }).done(function(data, textStatus, jqXHR){
            console.log(data);
            /*$('#group1content').val(data);*/
            $.each(data,function(i,val){
                var sup = '';
                switch(g2) {
                    case "date_inspected":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.date_inspected+'">'+val.date_inspected+'</option>';
                        break;
                    case "time_ins_from":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.time_ins_from+'">'+val.time_ins_from+'</option>';
                        break;
                    case "fy":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.fy+'">'+val.fy+'</option>';
                        break;
                    case "ww":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.ww+'">'+val.ww+'</option>';
                        break;
                    case "assembly_line":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.assembly_line+'">'+val.assembly_line+'</option>';
                        break;
                    case "submission":
                        var sup = '<option value=""></option>'+ 
                        '<option value="'+val.submission+'">'+val.submission+'</option>';
                        break;
                    case "prod_category":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.prod_category+'">'+val.prod_category+'</option>';
                        break;
                    case "customer":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.customer+'">'+val.customer+'</option>';
                        break;
                    case "family":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.family+'">'+val.family+'</option>';
                        break;
                    case "device_name":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.device_name+'">'+val.device_name+'</option>';
                        break;
                    case "po_no":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.po_no+'">'+val.po_no+'</option>';
                        break;
                    case "lot_no":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.lot_no+'">'+val.lot_no+'</option>';
                        break;
                    case "aql":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.aql+'">'+val.aql+'</option>';
                        break;
                    case "lot_accepted":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.lot_accepted+'">'+val.lot_accepted+'</option>';
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
        $('#tblforoqcinspection').html("");
        $.post("<?php echo e(url('/oqcdbselectgroupby1')); ?>",
        {
            _token:$('meta[name=csrf-token]').attr('content'),
            data:myData

        }).done(function(data, textStatus, jqXHR){
            console.log(data);
            /*$('#group1content').val(data);*/
            $.each(data,function(i,val){
                var sup = '';
                switch(g3) {
                    case "date_inspected":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.date_inspected+'">'+val.date_inspected+'</option>';
                        break;
                    case "time_ins_from":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.time_ins_from+'">'+val.time_ins_from+'</option>';
                        break;
                    case "fy":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.fy+'">'+val.fy+'</option>';
                        break;
                    case "ww":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.ww+'">'+val.ww+'</option>';
                        break;
                    case "assembly_line":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.assembly_line+'">'+val.assembly_line+'</option>';
                        break;
                    case "submission":
                        var sup = '<option value=""></option>'+ 
                        '<option value="'+val.submission+'">'+val.submission+'</option>';
                        break;
                    case "prod_category":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.prod_category+'">'+val.prod_category+'</option>';
                        break;
                    case "customer":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.customer+'">'+val.customer+'</option>';
                        break;
                    case "family":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.family+'">'+val.family+'</option>';
                        break;
                    case "device_name":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.device_name+'">'+val.device_name+'</option>';
                        break;
                    case "po_no":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.po_no+'">'+val.po_no+'</option>';
                        break;
                    case "lot_no":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.lot_no+'">'+val.lot_no+'</option>';
                        break;
                    case "aql":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.aql+'">'+val.aql+'</option>';
                        break;
                    case "lot_accepted":
                        var sup = '<option value=""></option>'+
                        '<option value="'+val.lot_accepted+'">'+val.lot_accepted+'</option>';
                        break;
                    default:
                        var sup = '<option value=""></option>';
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

    $('#tblforoqcinspection').on('click','.edit-task', function() {
        $('#AddNewModal').modal('show');
        $('#hdstatus').val("EDIT");
        var edittext = $(this).val().split('|');
        var id = edittext[0];
        $('input[name=id]').val(id);
        $('select[name=assembly_line]').select2('val',edittext[1]);
        $('input[name=app_date]').val(edittext[2]);
        $('input[name=app_time]').val(edittext[3]);
        $('#lot_no').val(edittext[4]);
        $('select[name=prod_category]').select2('val',edittext[5]);
        $('input[name=po_no]').val(edittext[6]);
        $('input[name=series_name]').val(edittext[7]);
        $('input[name=customer]').val(edittext[8]);
        $('input[name=po_qty]').val(edittext[9]);
        $('select[name=family]').select2('val',edittext[10]);
        $('select[name=type_of_inspection]').select2('val',edittext[11]);
        $('select[name=severity_of_inspection]').select2('val',edittext[12]);
        $('select[name=inspection_lvl]').select2('val',edittext[13]);
        $('select[name=aql]').select2('val',edittext[14]);
        $('input[name=accept]').val(edittext[15]);
        $('input[name=reject]').val(edittext[16]);
        $('input[name=date_inspected]').val(edittext[17]);
        $('input[name=ww]').val(edittext[18]);
        $('input[name=fy]').val(edittext[19]);
        $('select[name=shift]').select2('val',edittext[20]);
        $('#time_ins_from').val(edittext[21]);
        $('#time_ins_to').val(edittext[22]);
        $('select[name=inspector]').val(edittext[23]);
        $('select[name=submission]').select2('val',edittext[24]);
        $('select[name=coc_req]').select2('val',edittext[25]);
        $('input[name=judgement]').val(edittext[26]);
        $('input[name=lot_qty]').val(edittext[27]);
        $('input[name=sample_size]').val(edittext[28]);
        $('input[name=lot_inspected]').val(edittext[29]);
        $('input[name=lot_accepted]').val(edittext[30]);
        $('input[name=no_of_defects]').val(edittext[31]);
        $('input[name=remarks]').val(edittext[32]);
        $('select[name=dbcon]').val(edittext[33]);

        //count lotno if its greater than 1
        $.ajax({
            url:"<?php echo e(url('/countlotno')); ?>",
            method:'get',
            data:{
                pono:$('#po_no').val(),
                lotno:$('#lot_no').val()
            },
        }).done(function(data,textStatus,jqXHR){
            console.log(data);
            $('#count_lot').val(data);
        }).fail(function(jqXHR,textStatus,errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });

        lot_accepted();
    });
});//end of script----------------------------------------------------
function lot_accepted() {
    if($('#hdstatus').val() == "EDIT"){
        $('#lot_accepted').on('change',function(){
            $('#lot_accepted_changed').val("CHANGED");
        });

        var lot_acc = $('#lot_accepted').val();
        if (lot_acc == '0') {
            $('#judgement').val('Reject');
            $('#no_of_defects').show();
            $('#btn_mode_of_defects').show();
            $('#no_defects_label').show();
            $('#mode_defects_label').show();
            $('#btn_mod_ins').show();
            /*$('#no_of_defects').val("0");*/
            var pono = $('input[name=po_no]').val();
            var lotno = $('#lot_no').val();
            var submission = $('#submission').val();
            $.ajax({
                url:"<?php echo e(url('/get_no_of_defectives')); ?>",
                method:'get',
                data:{
                    pono:pono,
                    lotno:lotno,
                    submission:submission
                },
            }).done(function(data, textStatus, jqXHR){
                $('#no_of_defects').val(data[0]['qty']);
            }).fail(function(jqXHR, textStatus, errorThrown){
                console.log(errorThrown+'|'+textStatus)
            });
        } else {
            $('#judgement').val('Accept');
            $('#no_of_defects').hide();
            $('#btn_mode_of_defects').hide();
            $('#no_defects_label').hide();
            $('#mode_defects_label').hide();
            $('#btn_mod_ins').hide();
        }    
    } 
    if($('#hdstatus').val() == "ADD") {
        $('#lot_accepted').on('change',function(){
            $('#lot_accepted_changed').val("");
        });

        var lot_acc = $('#lot_accepted').val();
        if (lot_acc == '0') {
            $('#judgement').val('Reject');
            $('#no_of_defects').show();
            $('#btn_mode_of_defects').show();
            $('#no_defects_label').show();
            $('#mode_defects_label').show();
            $('#btn_mod_ins').show();
            /*$('#no_of_defects').val("0");*/
            var pono = $('input[name=po_no]').val();
            var lotno = $('#lot_no').val();
            var submission = $('#submission').val();
            $.ajax({
                url:"<?php echo e(url('/get_no_of_defectives')); ?>",
                method:'get',
                data:{
                    pono:pono,
                    lotno:lotno,
                    submission:submission
                },
            }).done(function(data, textStatus, jqXHR){
                $('#no_of_defects').val(data[0]['qty']);
            }).fail(function(jqXHR, textStatus, errorThrown){
                console.log(errorThrown+'|'+textStatus)
            });
        } else {
            $('#judgement').val('Accept');
            $('#no_of_defects').hide();
            $('#btn_mode_of_defects').hide();
            $('#no_defects_label').hide();
            $('#mode_defects_label').hide();
            $('#btn_mod_ins').hide();
        }
    }
}
function save(){
    var assemblyline = $('select[name=assembly_line]').val();
    var id = $('input[name=id]').val();
    var lotno = $('#lot_no').val();
    var appdate = $('input[name=app_date]').val();
    var apptime = $('input[name=app_time]').val();
    var prodcategory = $('select[name=prod_category]').val();
    var pono = $('input[name=po_no]').val();
    var seriesname = $('input[name=series_name]').val();
    var customer = $('input[name=customer]').val();
    var poqty = $('input[name=po_qty]').val();
    var family = $('select[name=family]').val();
    var typeofinspection = $('select[name=type_of_inspection]').val();
    var severityofinspection = $('select[name=severity_of_inspection]').val();
    var inspectionlvl = $('select[name=inspection_lvl]').val();
    var aql = $('select[name=aql]').val();
    var accept = $('input[name=accept]').val();
    var reject = $('input[name=reject]').val();
    var dateinspected = $('input[name=date_inspected]').val();
    var ww = $('input[name=ww]').val();
    var fy = $('input[name=fy]').val();
    var shift = $('select[name=shift]').val();
    var timeinsfrom = $('#time_ins_from').val();
    var timeinsto = $('#time_ins_to').val();
    var inspector = $('input[name=inspector]').val();
    var submission = $('select[name=submission]').val();
    var cocreq = $('select[name=coc_req]').val();
    var judgement = $('input[name=judgement]').val();
    var lotqty = $('input[name=lot_qty]').val();
    var samplesize = $('input[name=sample_size]').val();
    var lotinspected = $('input[name=lot_inspected]').val();
    var lotaccepted = $('input[name=lot_accepted]').val();
    var nofdefects = $('input[name=no_of_defects]').val();
    var remarks = $('input[name=remarks]').val();
    var dbcon = $('input[name=inspector]').val();
    var status = $('input[name=hdstatus]').val();
    var modid = $('#add_id').val();
    var count_lot = $('#count_lot').val();
    var lot_type_changed = $('#lot_accepted_changed').val();

    if(assemblyline == '' || lotno == '' || appdate == '' || apptime == '' || prodcategory == '' || pono == '' || seriesname == '' || customer == '' || poqty == '' || family == '' || typeofinspection == '' || severityofinspection == '' || inspectionlvl == '' || aql == '' || accept == '' || reject == '' || dateinspected == '' || ww == '' || fy == '' || shift == '' || timeinsfrom == '' || timeinsto == '' || inspector == '' || submission == '' || cocreq == '' || judgement == '' || lotqty == '' || samplesize == '' || lotinspected == '' || lotaccepted == '') 
    {
        $('#checkemptyModal').modal('show');
        return false;
    }else{
        $.post("<?php echo e(url('/oqcdbsave')); ?>",
        {
            _token:$('meta[name=csrf-token]').attr('content'),
            assemblyline:assemblyline,
            id:id,
            lotno:lotno,
            appdate:appdate,
            apptime:apptime,
            prodcategory:prodcategory,
            pono:pono,
            seriesname:seriesname,
            customer:customer,
            poqty:poqty,
            family:family,
            typeofinspection:typeofinspection,
            severityofinspection:severityofinspection,
            inspectionlvl:inspectionlvl,
            aql:aql,
            accept:accept,
            reject:reject,
            dateinspected:dateinspected,
            ww:ww,
            fy:fy,
            shift:shift,
            timeinsfrom:timeinsfrom,
            timeinsto:timeinsto,
            inspector:inspector,
            submission:submission,
            cocreq:cocreq,
            judgement:judgement,
            lotqty:lotqty,
            samplesize:samplesize,
            lotinspected:lotinspected,
            lotaccepted:lotaccepted,
            nofdefects:nofdefects,
            remarks:remarks,
            dbcon:dbcon,
            status:status,
            modid:modid,
            count_lot:count_lot,
            lotchanged:lot_type_changed
        }).done(function(data, textStatus, jqXHR){
            console.log(data);
            $('#lot_accepted_changed').val("")
            if(data == "updated"){
                window.location.href="<?php echo e(url('/oqcinspection')); ?>";
            }
            if (data.status == 'saved') {
                $('#msg_success').modal('show');
                $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                $('#success_msg').html("Record was successfully saved.");
                $('#tblforoqcinspection').html("");
                loadOQCdata();
                clearfields();
            }
            if (data.status == 'updated') {
                $('#msg_success').modal('show');
                $('#success_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                $('#success_msg').html("Record was successfully updated.");
                window.location.href = "<?php echo e(url('/oqcinspection')); ?>";
                clearfields();
            }

        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });
    }
}
function deleteAllchecked(){
    var tray = [];
    $('.checkboxes:checked').each(function(){
        tray.push($(this).val());
    });

    var traycount = tray.length;

    $.ajax({
            url:"<?php echo e(url('/oqcdbdelete')); ?>",
            method:'get',
            data:{
                tray : tray,
                traycount : traycount
            },          
    }).done(function(data, textStatus, jqXHR){
        window.location.href="<?php echo e(url('/oqcinspection')); ?>";
       console.log(data);
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function display_mod(){
    var pono = $('input[name=po_no]').val();
    var device = $('input[name=series_name]').val();
    var lotno = $('#lot_no').val();
    var submission = $('#submission').val();
    $('#tableforoqcmod').html("");
    $.ajax({
        url:"<?php echo e(url('/displayoqcmod')); ?>",
        method:'get',
        data:{
            pono:pono,
            lotno:lotno,
            submission:submission
        },
    }).done(function(data, textStatus,jqXHR){
        console.log(data);
        $.each(data,function(i,val){
            var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesmod" value="'+val.id+'" name="checkitemmod" id="checkitemmod"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskmod" class="btn btn-sm btn-primary edit-taskmod" value="'+val.id+ '|' +val.mod1+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod1+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tableforoqcmod').append(tblrow);
            $('#mode_of_def').val("");
            $('#mode_qty').val("");
            $('#modid').val("");
            $('#modstatus').val("ADD");
            $('.edit-taskmod').on('click',function(){
                var field = $(this).val().split('|');
                var id = field[0];
                $.ajax({
                    url:"<?php echo e(url('/oqcmodinspectionedit')); ?>",
                    method:'get',
                    data:{
                        id:id
                    },
                }).done(function(data, textStatus, jqXHR){
                    console.log(data);
                    $('#mode_of_def').val(data[0]['mod1']);
                    $('#mode_qty').val(data[0]['qty']);
                    $('#modid').val(id);
                    $('#modstatus').val("EDIT");
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown+'|'+textStatus);
                });
            });
        });
 
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}
function oqcmodsave(){
    var mod = $('select[name=mode_of_def]').val();
    var qty = $('input[name=mode_qty]').val();
    var pono = $('input[name=modpono]').val();
    var device = $('input[name=moddevice]').val();
    var status = $('input[name=modstatus]').val();
    var submission = $('#submission').val();
    var lotno = $('#lot_no').val();
    var id = $('input[name=modid]').val();
    var modid = $('#add_id').val();
    var lotaccepted = $('#lot_accepted').val();
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

    $('#tableforoqcmod').html("");
    $.post("<?php echo e(url('/oqcmodinspectionsave')); ?>",
    {
            _token:$('meta[name=csrf-token]').attr('content'),
            mod:mod,
            qty:qty,
            status:status,
            id:id,
            pono:pono,
            device:device,
            modid:modid,
            lotno:lotno,
            submission:submission,
            lotaccepted:lotaccepted,
    }).done(function(data, textStatus, jqXHR){
        console.log(data);
        $.each(data,function(i,val){
            var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesmod" value="'+val.id+'" name="checkitemmod" id="checkitemmod"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskmod" class="btn btn-sm btn-primary edit-taskmod" value="'+val.id+ '|' +val.mod1+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod1+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tableforoqcmod').append(tblrow);
            $('#mode_of_def').val("");
            $('#mode_qty').val("");
            $('#modid').val("");
            $('#modstatus').val("ADD");
            $('.edit-taskmod').on('click',function(){
                var field = $(this).val().split('|');
                var id = field[0];
                $.ajax({
                    url:"<?php echo e(url('/oqcmodinspectionedit')); ?>",
                    method:'get',
                    data:{
                        id:id
                    },
                }).done(function(data, textStatus, jqXHR){
                    console.log(data);
                    $('#mode_of_def').val(data[0]['mod']);
                    $('#mode_qty').val(data[0]['qty']);
                    $('#modid').val(id);
                    $('#modstatus').val("EDIT");
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown+'|'+textStatus);
                });
            });
        });
        lot_accepted();
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log(errorThrown+'|'+textStatus)
    });
}
function oqcmoddelete(){
    var pono = $('input[name=modpono]').val();
    var lotno = $('input[name=lot_no]').val();
    var tray = [];
    $('.checkboxesmod:checked').each(function(){
        tray.push($(this).val());
    });
    var traycount = tray.length;
    var myData = {tray:tray,traycount:traycount,pono:pono,lotno:lotno};
    $('#tableforoqcmod').html("");
    $.ajax({
            url:"<?php echo e(url('/oqcmodinspectiondelete')); ?>",
            method:'get',
            data:myData            
    }).done(function(data, textStatus, jqXHR){
        console.log(data);
        $.each(data,function(i,val){
            var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesmod" value="'+val.id+'" name="checkitemmod" id="checkitemmod"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskmod" class="btn btn-sm btn-primary edit-taskmod" value="'+val.id+ '|' +val.mod1+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod1+'</td>'+
                            '<td>'+val.qty+'</td>'+
                        '</tr>';
            $('#tableforoqcmod').append(tblrow);
            $('.edit-taskmod').on('click',function(){
                var field = $(this).val().split('|');
                var id = field[0];
                $.ajax({
                    url:"<?php echo e(url('/oqcmodinspectionedit')); ?>",
                    method:'get',
                    data:{
                        id:id
                    },
                }).done(function(data, textStatus, jqXHR){
                    console.log(data);
                    $('#mode_of_def').val(data[0]['mod']);
                    $('#mode_qty').val(data[0]['qty']);
                    $('#modid').val(id);
                    $('#modstatus').val("EDIT");
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
function groupby(){
    var datefrom= $('#groupby_datefrom').val();
    var dateto = $('#groupby_dateto').val();
    
    var g1 = $('select[name=group1]').val();
    var g2 = $('select[name=group2]').val();
    var g3 = $('select[name=group3]').val();
    var g4 = $('select[name=group4]').val();
    var g5 = $('select[name=group5]').val();
    var g1content = $('select[name=group1content]').val();
    var g2content = $('select[name=group2content]').val();
    var g3content = $('select[name=group3content]').val();
    var g4content = $('select[name=group4content]').val();
    var g5content = $('select[name=group5content]').val();
 
    var myData = {g1:g1,g2:g2,g3:g3,g4:g4,g5:g5,g1content:g1content,g2content:g2content,g3content:g3content,g4content:g4content,g5content:g5content,datefrom:datefrom,dateto:dateto};
    
    $.post("<?php echo e(url('/oqcdbgroupby')); ?>",
    {
            _token:$('meta[name=csrf-token]').attr('content'),
            data:myData
    }).done(function(data, textStatus, jqXHR){
        $('#tblforoqcinspection').html("");
        getDataTable(data);

        //get the LAR/LRR/DPPM-----------------
        $('#tblforlarlrrdppm').html("");
        $.ajax({
            url:"<?php echo e(url('/getoqclarlrrdppm')); ?>",
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
            var la = 0;
            var lr = 0;
            $.each(data,function(i,val){
                sample_size = val.sample_size;
                lot_qty = val.lot_qty;
                no_of_defects = val.num_of_defects;
                no_of_lot_accepted = val.lot_accepted;
                no_of_lot_rejected = val.lot_rejected;
                no_of_lot_inspected = val.lot_inspected;
                
                //getting the lar value-------
                var templar = no_of_lot_accepted / no_of_lot_inspected;
                var lar = (templar * 100).toFixed(2);
                //getting the lrr value-------
                var templrr = no_of_lot_rejected / no_of_lot_inspected;
                var lrr = (templrr * 100).toFixed(2);

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
                /*var reject = val.lot_inspected - val.lot_accepted;*/
                var tblrow = '<tr>'+  
                            '<td id="groupbyselected">'+finalselected+'</td>'+ 
                            '<td>'+val.lot_inspected+'</td>'+
                            '<td>'+val.lot_accepted+'</td>'+
                            '<td>'+val.lot_rejected+'</td>'+  
                            '<td>'+val.sample_size+'</td>'+
                            '<td>'+val.num_of_defects+'</td>'+
                            '<td>'+lar+'</td>'+
                            '<td>'+lrr+'</td>'+
                            '<td>'+dppm+'</td>'+
                        '</tr>';
                $('#tblforlarlrrdppm').append(tblrow);
            
            });    
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });

        $('#tblfortotallarlrrdppm').html("");
        $.ajax({
            url:"<?php echo e(url('/getoqctotallarlrrdppm')); ?>",
            method:'get',
            data:myData,
        }).done(function(data, textStatus, jqXHR){
            $.each(data,function(i,val){
                sample_size = val.sample_size;
                lot_qty = val.lot_qty;
                no_of_defects = val.num_of_defects;
                no_of_lot_accepted = val.lot_accepted;
                no_of_lot_rejected = val.lot_rejected;
                no_of_lot_inspected = val.lot_inspected;
                
                //getting the lar value-------
                var templar = no_of_lot_accepted / no_of_lot_inspected;
                var lar = (templar * 100).toFixed(2);
                //getting the lrr value-------
                var templrr = no_of_lot_rejected / no_of_lot_inspected;
                var lrr = (templrr * 100).toFixed(2);

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
                var tblrow = '<tr>'+  
                            '<td id="groupbyselected">'+val.submission+'</td>'+ 
                            '<td>'+val.lot_inspected+'</td>'+
                            '<td>'+val.lot_accepted+'</td>'+
                            '<td>'+val.lot_rejected+'</td>'+  
                            '<td>'+val.sample_size+'</td>'+
                            '<td>'+val.num_of_defects+'</td>'+
                            '<td>'+lar+'</td>'+
                            '<td>'+lrr+'</td>'+
                            '<td>'+dppm+'</td>'+
                        '</tr>';
                $('#tblfortotallarlrrdppm').append(tblrow);
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
    var pono = $('#search_pono').val();
    var report_status = $('#hd_report_status').val();
    $('#tblforoqcinspection').html("");
    $.get("<?php echo e(url('/oqcsearchby')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        datefrom:datefrom,
        dateto:dateto,
        pono:pono
    }).done(function(data, textStatus, jqXHR){
        $('#hd_search_from').val(datefrom);
        $('#hd_search_to').val(dateto);
        $('#hd_partcode').val(pono);
        console.log(data);
        getDataTable(data);
    }).fail(function(jqXHR, errorThrown, textStatus){
        console.log(errorThrown+'|'+textStatus);
    });
}
function getmodcounts(pono,lotno,subs,judgement,cnt) {
    var report_status = $('#hd_report_status').val();
   /* alert(report_status);*/
    var datefrom = $('#hd_search_from').val();
    var dateto = $('#hd_search_to').val();
    $.ajax({
        url:"<?php echo e(url('/getmodcounts')); ?>",
        method:'get',
        data:{

            pono: pono,
            lotno: lotno,
            subs: subs,
            report_status:report_status,
            datefrom:datefrom,
            dateto:dateto,
        },
    }).done(function(data,textStatus,jqXHR){
        console.log(data.mod);
        var x = 0;
        if(judgement == "Accept"){
            $('#md_'+cnt).html("NDF");  
           /* $("#hd_mod_"+cnt).val("NDF");*/
            $("#gb_qty_"+cnt).html(0);
            $("#gb_nod_"+cnt).html(0);
            $("#gb_lot_"+cnt).html(""); 
            $("#hd_qty"+cnt).val(0); 
            $("#hd_num_of_defects"+cnt).val(0); 
        }
        $.each(data.mod, function(i,val) {
            x++;
            var mod = '';
            if(x == data.mod.length){
                var mod = val + ' ';   

            }else{
                var mod = val + ' , ';  
            }
       
            if(judgement == "Accept"){
                $('#md_'+cnt).html("NDF"); 
            } else {
                $('#md_'+cnt).append(mod);  
            }
      
        });
        $.each(data.lotno, function(i,val) {
            x++;
         
            if(judgement == "Accept"){
                $('#gb_lot_'+cnt).html("");   
            } else {
                $('#gb_lot_'+cnt).html(val);    
            }
      
        });
    
    }).fail(function(jqXHR,textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}

function loadOQCdata(){
    $.get("<?php echo e(url('/getrows')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content')
    }).done(function(data, textStatus, jqXHR){
        console.log(data);
        var cnt = 0;
        getDataTable(data);
    });
}

function getDataTable(data) {
    var cnt = 0;
    $.each(data,function(i,val){
        cnt++;
        var report_status = $('#hd_report_status').val();
        if(report_status == "GROUPBY"){
            var qty = '';
            if(val.qty == null){
                qty = 0;
            }else{
                qty = val.qty;
            }
            var tblrow = '<tr>'+
                    '<td>'+
                        '<input type="checkbox" class="form-control input-sm checkboxes" value="'+val.modid+'" name="checkitem" id="checkitem"></input> '+
                    '</td>'+                        
                    '<td style="width: 5%">'+           
                        '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+'|'+val.assembly_line+'|'+val.app_date+'|'+val.app_time+'|'+val.lot_no+'|'+val.prod_category+'|'+val.po_no+'|'+val.device_name+'|'+val.customer+'|'+val.po_qty+'|'+val.family+'|'+val.type_of_inspection+'|'+val.severity_of_inspection+'|'+val.inspection_lvl+'|'+val.aql+'|'+val.accept+'|'+val.reject+'|'+val.date_inspected+'|'+val.ww+'|'+val.fy+'|'+val.shift+'|'+val.time_ins_from+'|'+val.time_ins_to+'|'+val.inspector+'|'+val.submission+'|'+val.coc_req+'|'+val.judgement+'|'+val.lot_qty+'|'+val.sample_size+'|'+val.lot_inspected+'|'+val.lot_accepted+'|'+val.num_of_defects+'|'+val.remarks+'|'+val.dbcon+'" data-cnt="'+cnt+'">'+
                            '   <i class="fa fa-edit"></i> '+
                        '</button>'+
                    '</td>'+
                    '<td>'+val.fy+' - '+val.ww+'<input type="hidden" id="hd_pono" value="'+val.po_no+'" name="hd_pono[]"><input type="hidden" id="hd_fyww" value="'+val.fy+' - '+val.ww+'" name="hd_fyww[]"></td>'+
                    '<td>'+val.date_inspected+'<input type="hidden" id="hd_date_inspected" value="'+val.date_inspected+'" name="hd_date_inspected[]"></td>'+
                    '<td>'+val.device_name+'<input type="hidden" id="hd_device_name" value="'+val.device_name+'" name="hd_device_name[]"></td>'+
                    '<td>'+val.time_ins_from+'<input type="hidden" id="hd_time_ins_from" value="'+val.time_ins_from+'" name="hd_time_ins_from[]"></td>'+
                    '<td>'+val.time_ins_to+'<input type="hidden" id="hd_time_ins_to" value="'+val.time_ins_to+'" name="hd_time_ins_to[]"></td>'+
                    '<td>'+val.submission+'<input type="hidden" value="'+val.submission+'" name="hd_submission[]" id="hd_submission_'+cnt+'"></td>'+
                    '<td>'+val.lot_qty+'<input type="hidden" id="hd_lot_qty" value="'+val.lot_qty+'" name="hd_lot_qty[]"></td>'+
                    '<td >'+val.sample_size+'<input type="hidden" id="hd_sample_size" value="'+val.sample_size+'" name="hd_sample_size[]"><input type="hidden" id="hd_lotno" value="" name="hd_lotno[]"></td>'+
                    '<td id="gb_nod_'+cnt+'">'+qty+'</td>'+
                    '<td id="gb_lot_'+cnt+'" class="lot_val"></td>'+
                    '<td id="md_'+cnt+'" class="mod_val"></td>'+
                    '<td id="gb_qty_'+cnt+'">'+qty+'</td>'+
                    '<td>'+val.judgement+'<input type="hidden" id="hd_num_of_defects'+cnt+'" value="'+qty+'" name="hd_num_of_defects[]"><input type="hidden" id="hd_judgement" value="'+val.judgement+'" name="hd_judgement[]"><input type="hidden" id="hd_qty'+cnt+'" value="'+qty+'" name="hd_qty[]"></td>'+
                    '<td>'+val.inspector+'<input type="hidden" id="hd_inspector" value="'+val.inspector+'" name="hd_inspector[]"></td>'+
                    '<td>'+val.remarks+'<input type="hidden" id="hd_remarks" value="'+val.remarks+'" name="hd_remarks[]"></td>'+
                '</tr>';    
        } else {
            var tblrow = '<tr>'+
                    '<td>'+
                        '<input type="checkbox" class="form-control input-sm checkboxes" value="'+val.modid+'" name="checkitem" id="checkitem"></input> '+
                    '</td>'+                        
                    '<td style="width: 5%">'+           
                        '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+'|'+val.assembly_line+'|'+val.app_date+'|'+val.app_time+'|'+val.lot_no+'|'+val.prod_category+'|'+val.po_no+'|'+val.device_name+'|'+val.customer+'|'+val.po_qty+'|'+val.family+'|'+val.type_of_inspection+'|'+val.severity_of_inspection+'|'+val.inspection_lvl+'|'+val.aql+'|'+val.accept+'|'+val.reject+'|'+val.date_inspected+'|'+val.ww+'|'+val.fy+'|'+val.shift+'|'+val.time_ins_from+'|'+val.time_ins_to+'|'+val.inspector+'|'+val.submission+'|'+val.coc_req+'|'+val.judgement+'|'+val.lot_qty+'|'+val.sample_size+'|'+val.lot_inspected+'|'+val.lot_accepted+'|'+val.num_of_defects+'|'+val.remarks+'|'+val.dbcon+'" data-cnt="'+cnt+'">'+
                            '   <i class="fa fa-edit"></i> '+
                        '</button>'+
                    '</td>'+
                    '<td>'+val.fy+' - '+val.ww+'<input type="hidden" id="hd_pono" value="'+val.po_no+'" name="hd_pono[]"><input type="hidden" id="hd_fyww" value="'+val.fy+' - '+val.ww+'" name="hd_fyww[]"></td>'+
                    '<td>'+val.date_inspected+'<input type="hidden" id="hd_date_inspected" value="'+val.date_inspected+'" name="hd_date_inspected[]"></td>'+
                    '<td>'+val.device_name+'<input type="hidden" id="hd_device_name" value="'+val.device_name+'" name="hd_device_name[]"></td>'+
                    '<td>'+val.time_ins_from+'<input type="hidden" id="hd_time_ins_from" value="'+val.time_ins_from+'" name="hd_time_ins_from[]"></td>'+
                    '<td>'+val.time_ins_to+'<input type="hidden" id="hd_time_ins_to" value="'+val.time_ins_to+'" name="hd_time_ins_to[]"></td>'+
                    '<td>'+val.submission+'<input type="hidden" value="'+val.submission+'" name="hd_submission[]" id="hd_submission_'+cnt+'"></td>'+
                    '<td>'+val.lot_qty+'<input type="hidden" id="hd_lot_qty" value="'+val.lot_qty+'" name="hd_lot_qty[]"></td>'+
                    '<td>'+val.sample_size+'<input type="hidden" id="hd_sample_size" value="'+val.sample_size+'" name="hd_sample_size[]"></td>'+
                    '<td>'+val.num_of_defects+'<input type="hidden" id="hd_num_of_defects" value="'+val.num_of_defects+'" name="hd_num_of_defects[]"></td>'+
                    '<td>'+val.lot_no+'<input type="hidden" id="hd_lotno" value="'+val.lot_no+'" name="hd_lotno[]"></td>'+
                    '<td id="md_'+cnt+'" class="mod_val"></td>'+
                    '<td>'+val.num_of_defects+'<input type="hidden" id="hd_qty" value="'+val.num_of_defects+'" name="hd_qty[]"></td>'+
                    '<td>'+val.judgement+'<input type="hidden" id="hd_judgement" value="'+val.judgement+'" name="hd_judgement[]"></td>'+
                    '<td>'+val.inspector+'<input type="hidden" id="hd_inspector" value="'+val.inspector+'" name="hd_inspector[]"></td>'+
                    '<td>'+val.remarks+'<input type="hidden" id="hd_remarks" value="'+val.remarks+'" name="hd_remarks[]"></td>'+
                '</tr>';    
        }
        

        getmodcounts(val.po_no,val.lot_no,val.submission,val.judgement,cnt);

        $('#tblforoqcinspection').append(tblrow);
   
    });
}
function clearfields(){
    var date = new Date();
    var newmonth = date.getMonth() + 1;
    var datenow =  newmonth + "/" + date.getDate()+ "/" + date.getFullYear();
    //getting the currnt time----------
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;

    $('input[name=date_inspected]').val(datenow);
    $('#time_ins_to').val(strTime);
    $('.checkifEmpty').val("");
    $('#accept').val("0");
    $('#reject').val("1");
    $('#lot_inspected').val("1");
    $('.checkifEmpty').select2('val',"");
    $('#remarks').val("");
    $('#no_of_defects').val("");
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>