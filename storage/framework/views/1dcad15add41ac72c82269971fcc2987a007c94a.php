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
                                    <select class= show-tick" name="dbcon" id="dbcon">
                                        <option value="sqlsrvbu">TS</option>
                                        <option value="sqlsrvcn">CN</option>
                                    </select>
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
                                                <li>
                                                    <a href="<?php echo e(url('/iqcinspection')); ?>">
                                                        <i class="fa fa-search fa-2x font-green"></i> IQC Inspection
                                                    </a>
                                                </li>
                                                <li class="active">
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
                                            <a href="<?php echo e(url('/iqcinspection')); ?>" class="list-group-item">
                                                <i class="fa fa-search fa-2x font-green"></i> IQC Inspection
                                            </a>
                                            <a href="<?php echo e(url('/oqcinspection')); ?>" class="list-group-item active">
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

                                                <div class="portlet box red" >
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-search"></i> OQC Inspection
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-hover table-bordered table-striped" id="oqcdatatable">
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="table-checkbox" style="width: 5%">
                                                                                <input type="checkbox" class="group-checkable checkAllitems" />
                                                                            </td>
                                                                            <td></td>
                                                                            <td>ID</td>
                                                                            <td>Date Inspected</td>
                                                                            <td>Inspection Time</td>
                                                                            <td>FY#</td>
                                                                            <td>WW#</td>
                                                                            <td>Assembly Line</td>
                                                                            <td>Sub</td>
                                                                            <td>Category</td>
                                                                            <td>Customer Name</td>
                                                                            <td>Family</td>
                                                                            <td>Device Name</td>
                                                                            <td>P.O. #</td>
                                                                            <td>Lot No.</td>
                                                                            <td>AQL</td>
                                                                            <td>Lot Accepted</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tblforoqcinspection">
                                                                    <?php foreach($tableData as $dest): ?>
                                                                        <tr>
                                                                            <td style="width: 2%">
                                                                                  <input type="checkbox" class="form-control input-sm checkboxes" value="<?php echo e($dest->id); ?>" name="checkitem" id="checkitem"></input> 
                                                                            </td>                        
                                                                            <td style="width: 5%">           
                                                                                <button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="<?php echo e($dest->id.'|'.$dest->assembly_line.'|'.$dest->app_date.'|'.$dest->app_time.'|'.$dest->lot_no.'|'.$dest->prod_category.'|'.$dest->po_no.'|'.$dest->device_name.'|'.$dest->customer.'|'.$dest->po_qty.'|'.$dest->family.'|'.$dest->type_of_inspection.'|'.$dest->severity_of_inspection.'|'.$dest->inspection_lvl.'|'.$dest->aql.'|'.$dest->accept.'|'.$dest->reject.'|'.$dest->date_inspected.'|'.$dest->ww.'|'.$dest->fy.'|'.$dest->shift.'|'.$dest->time_ins_from.'|'.$dest->time_ins_to.'|'.$dest->inspector.'|'.$dest->submission.'|'.$dest->coc_req.'|'.$dest->judgement.'|'.$dest->lot_qty.'|'.$dest->sample_size.'|'.$dest->lot_inspected.'|'.$dest->lot_accepted.'|'.$dest->num_of_defects.'|'.$dest->remarks.'|'.$dest->dbcon); ?>">
                                                                                       <i class="fa fa-edit"></i> 
                                                                                </button>
                                                                            </td>
                                                                            <td><?php echo e($dest->id); ?></td>
                                                                            <td><?php echo e($dest->date_inspected); ?></td>
                                                                            <td><?php echo e($dest->app_time); ?></td>
                                                                            <td><?php echo e($dest->fy); ?>#</td>
                                                                            <td><?php echo e($dest->ww); ?>#</td>
                                                                            <td><?php echo e($dest->assembly_line); ?></td>
                                                                            <td><?php echo e($dest->submission); ?></td>
                                                                            <td><?php echo e($dest->prod_category); ?></td>
                                                                            <td><?php echo e($dest->customer); ?></td>
                                                                            <td><?php echo e($dest->family); ?></td>
                                                                            <td><?php echo e($dest->device_name); ?></td>
                                                                            <td><?php echo e($dest->po_no); ?></td>
                                                                            <td><?php echo e($dest->lot_no); ?></td>
                                                                            <td><?php echo e($dest->aql); ?></td>
                                                                            <td><?php echo e($dest->lot_accepted); ?></td> 
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
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_groupfield" id="hd_groupfield"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_value" id="hd_value"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_groupfield2" id="hd_groupfield2"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_value2" id="hd_value2"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_groupfield3" id="hd_groupfield3"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_value3" id="hd_value3"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_report_status" id="hd_report_status"/>

                                                <input type="text" class="form-control input-sm clear" id="hdg1_selected" name="hdg1_selected" readonly>
                                                <input type="text" class="form-control input-sm clear" id="hdg2_selected" name="hdg2_selected" readonly>
                                                <input type="text" class="form-control input-sm clear" id="hdg3_selected" name="hdg3_selected" readonly>
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Assembly Line</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick" name="assembly_line" id="assembly_line">
                                            <option value=""></option>
                                            <?php foreach($assemblyline as $aline): ?>
                                            <option value="<?php echo e($aline->description); ?>"><?php echo e($aline->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="hidden" class="form-control input-sm" id="id" name="id">
                                        <div id="er_assembly_line"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="lot_no" name="lot_no">
                                        <div id="er_lot_no"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Application Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control input-sm date-picker" type="text" name="app_date" id="app_date"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Application Time</label>
                                    <div class="col-sm-9">
                                        <input type="text" data-format="hh:mm A" value="<?php echo e(date('h:i A')); ?>" class="form-control input-sm clockface_1" name="app_time" id="app_time"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Product Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick" name="prod_category" id="prod_category">
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
                                        <input type="text" class="form-control input-sm" id="po_no" name="po_no">
                                        <div id="er_po_no"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Device Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="series_name" name="series_name">
                                        <div id="er_series_name"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="customer" name="customer">
                                        <div id="er_customer"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">P.O. Qty</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="po_qty" name="po_qty">
                                        <div id="er_po_qty"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Family</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm show-tick" name="family" id="family">
                                        <option value=""></option>  
                                        <?php foreach($families as $family): ?>
                                            <option value="<?php echo e($family->family); ?>"><?php echo e($family->family); ?></option>
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
                                        <select class="form-control input-sm show-tick" name="type_of_inspection" id="type_of_inspection">
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
                                        <select class="form-control input-sm show-tick" name="severity_of_inspection" id="severity_of_inspection">
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
                                        <select class="form-control input-sm show-tick" name="inspection_lvl" id="inspection_lvl">
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
                                        <select class="form-control input-sm show-tick" name="aql" id="aql">
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
                                        <input type="text" class="form-control input-sm" id="ww" name="ww">
                                        <div id="er_ww"></div>
                                    </div>
                                    <label class="control-label col-sm-3">FY#</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm" id="fy" name="fy">
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
                                        <select class="form-control input-sm show-tick" name="shift" id="shift">
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
                                        <select class="form-control input-sm show-tick" name="submission" id="submission">
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
                                        <select class="form-control input-sm show-tick" name="coc_req" id="coc_req">
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
                                        <input type="text" class="form-control input-sm" id="judgement" name="judgement">
                                        <div id="er_judgement"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Lot Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="lot_qty" name="lot_qty">
                                        <div id="er_lot_qty"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Sample Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="sample_size" name="sample_size">
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
                                        <input type="text" class="form-control input-sm" id="lot_accepted" name="lot_accepted">
                                        <div id="er_lot_accepted"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" id="no_defects_label" >No. of Defectives</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="no_of_defects" name="no_of_defects">
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
                                            <td>Accept</td>
                                            <td>Inspected</td>
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
<script>
$(function() {
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

    lot_accepted();
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

    $('#oqcdatatable').DataTable();
    $('#btn_addnew').on('click', function (){
        $('#AddNewModal').modal('show');
        $('#hdstatus').val("ADD"); 
        $('input[name=id]').val(id);
        $('select[name=assembly_line]').select2('val',"");
        $('#lot_no').val("");
        $('input[name=app_date]').val("");
        $('input[name=app_time]').val("");
        $('select[name=prod_category]').select2('val',"");
        $('input[name=po_no]').val("");
        $('input[name=series_name]').val("");
        $('input[name=customer]').val("");
        $('input[name=po_qty]').val("");
        $('select[name=family]').select2('val',"");
        $('select[name=type_of_inspection]').select2('val',"");
        $('select[name=severity_of_inspection]').select2('val',"");
        $('select[name=inspection_lvl]').select2('val',"");
        $('select[name=aql]').select2('val',"");
        $('#accept').val("0");
        $('#reject').val("1");
        $('#lot_inspected').val("1");
        $('input[name=date_inspected]').val(datenow);
        $('input[name=ww]').val("");
        $('input[name=fy]').val("");
        $('select[name=shift]').select2('val',"");
        $('#time_ins_from').val("");
        $('#time_ins_to').val(strTime);
        $('select[name=inspector]').val("");
        $('select[name=submission]').select2('val',"");
        $('select[name=coc_req]').select2('val',"");
        $('input[name=judgement]').val("");
        $('input[name=lot_qty]').val("");
        $('input[name=sample_size]').val("");
        /*$('input[name=lot_inspected]').val("");*/
        $('input[name=lot_accepted]').val("");
        $('input[name=no_of_defects]').val("");
        $('input[name=remarks]').val("");
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
        $('#group1content').select2('val',"");

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

    $('.edit-task').on('click',function(){
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
    });

    /*$('#aql').on('change',function(){
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

    $('#lot_qty').focusout(function(){
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
*/

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

    $('#assembly_line').click(function(){
        $('#er_assembly_line').html(""); 
    });
    $('#lot_no').keyup(function(){
        $('#er_lot_no').html(""); 
    });
    $('#prod_category').click(function(){
        $('#er_prod_category').html(""); 
    });
    $('#po_no').keyup(function(){
        $('#er_po_no').html(""); 
    });
    $('#series_name').keyup(function(){
        $('#er_series_name').html(""); 
    });
    $('#customer').keyup(function(){
        $('#er_customer').html(""); 
    });
    $('#po_qty').keyup(function(){
        $('#er_po_qty').html(""); 
    });
    $('#family').click(function(){
        $('#er_family').html(""); 
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
    $('#date_inspected').click(function(){
        $('#er_date_inspected').html(""); 
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
    $('#coc_req').click(function(){
        $('#er_coc_req').html(""); 
    });
    $('#judgement').keyup(function(){
        $('#er_judgement').html(""); 
    });
    $('#lot_qty').keyup(function(){
        $('#er_lot_qty').html(""); 
    });
    $('#sample_size').keyup(function(){
        $('#er_sample_size').html(""); 
    });
    $('#lot_inspected').keyup(function(){
        $('#er_lot_inspected').html(""); 
    });
    $('#lot_accepted').keyup(function(){
        $('#er_lot_accepted').html(""); 
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
            $('#fy').val(date.getFullYear());
            
            $('#date_inspected').on('change',function(){
                var newweek = new Date($(this).val());
                $('#ww').val(newweek.getWeek() - 12);
            });
            var newweek = new Date($('#date_inspected').val());
            $('#ww').val(newweek.getWeek() - 12);
            
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
 
        $('#shift').select2('val',shift);
    });

    $('#lot_accepted').on('change', function() {
        lot_accepted();
    });

    $('#btn_close').click(function(){
        lot_accepted();
    });

    $('#btn_pdf').on('click', function() {
        var pono = $('#hd_partcode').val();
        var datefrom = $('#hd_search_from').val();
        var dateto = $('#hd_search_to').val();
        var groupfield = $('#hd_groupfield').val();
        var groupvalue = $('#hd_value').val();
        var groupfield2 = $('#hd_groupfield2').val();
        var groupvalue2 = $('#hd_value2').val();
        var groupfield3 = $('#hd_groupfield3').val();
        var groupvalue3 = $('#hd_value3').val();
        var groupfield4 = $('#hd_groupfield4').val();
        var groupvalue4 = $('#hd_value4').val();
        var groupfield5 = $('#hd_groupfield5').val();
        var groupvalue5 = $('#hd_value5').val();
        var status = $('#hd_report_status').val();
      
        var url = "<?php echo e(url('/oqcprintreport?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&pono=" + pono+ "&groupfield=" + groupfield+ "&groupvalue=" + groupvalue+ "&groupfield2=" + groupfield2+ "&groupvalue2=" + groupvalue2+ "&groupfield3=" + groupfield3+ "&groupvalue3=" + groupvalue3+ "&status=" + status;
        window.location.href= url;
     /*   $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        $('#hd_partcode').val("");
        $('#hd_groupfield').val("");
        $('#hd_value').val("");
        $('#hd_groupfield2').val("");
        $('#hd_value2').val("");
        $('#hd_groupfield3').val("");
        $('#hd_value3').val("");
        $('#hd_report_status').val("");*/
    });
    $('#btn_excel').on('click', function() {
        var pono = $('#hd_partcode').val();
        var datefrom = $('#hd_search_from').val();
        var dateto = $('#hd_search_to').val();
        var groupfield = $('#hd_groupfield').val();
        var groupvalue = $('#hd_value').val();
        var groupfield2 = $('#hd_groupfield2').val();
        var groupvalue2 = $('#hd_value2').val();
        var groupfield3 = $('#hd_groupfield3').val();
        var groupvalue3 = $('#hd_value3').val();
        var status = $('#hd_report_status').val();
     
        var url = "<?php echo e(url('/oqcinsprintreportexcel?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&pono=" + pono+ "&groupfield=" + groupfield+ "&groupvalue=" + groupvalue+ "&groupfield2=" + groupfield2+ "&groupvalue2=" + groupvalue2+ "&groupfield3=" + groupfield3+ "&groupvalue3=" + groupvalue3+ "&status=" + status;
        window.location.href= url;
    /*    $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        $('#hd_partcode').val("");
        $('#hd_groupfield').val("");
        $('#hd_value').val("");
        $('#hd_groupfield2').val("");
        $('#hd_value2').val("");
        $('#hd_groupfield3').val("");
        $('#hd_value3').val("");
        $('#hd_report_status').val("");*/

        console.log(data);
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
                    
                //var option = '<option value="'+val.supplier'">'+val.supplier'</option>';
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
});//end of script----------------------------------------------------
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
        var pono = $('input[name=po_no]').val();
        var device = $('input[name=series_name]').val();
        $.ajax({
            url:"<?php echo e(url('/get_no_of_defectives')); ?>",
            method:'get',
            data:{
                pono:pono,
                device:device
            },
        }).done(function(data, textStatus, jqXHR){
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
    var dbcon = $('select[name=dbcon]').val();
    var status = $('input[name=hdstatus]').val();
    if(assemblyline == ""){     
        $('#er_assembly_line').html("Assembly Line field is empty"); 
        $('#er_assembly_line').css('color', 'red');       
        return false;  
    }
    if(lotno == ""){     
        $('#er_lot_no').html("Lot Number field is empty"); 
        $('#er_lot_no').css('color', 'red');       
        return false;  
    }
    if(prodcategory == ""){     
        $('#er_prod_category').html("Product Category field is empty"); 
        $('#er_prod_category').css('color', 'red');       
        return false;  
    }
    if(pono == ""){     
        $('#er_po_no').html("PO Number field is empty"); 
        $('#er_po_no').css('color', 'red');       
        return false;  
    }if(seriesname == ""){     
        $('#er_series_name').html("Series Name field is empty"); 
        $('#er_series_name').css('color', 'red');       
        return false;  
    }
    if(customer == ""){     
        $('#er_customer').html("Customer field is empty"); 
        $('#er_customer').css('color', 'red');       
        return false;  
    }
    if(poqty == ""){     
        $('#er_po_qty').html("PO Quantity field is empty"); 
        $('#er_po_qty').css('color', 'red');       
        return false;  
    }
    if(family == ""){     
        $('#er_family').html("family field is empty"); 
        $('#er_family').css('color', 'red');       
        return false;  
    }
    if(typeofinspection == ""){     
        $('#er_type_of_inspection').html("Type of Inspection field is empty"); 
        $('#er_type_of_inspection').css('color', 'red');       
        return false;  
    }
    if(severityofinspection == ""){     
        $('#er_severity_of_inspection').html("Severity of Inspection field is empty"); 
        $('#er_severity_of_inspection').css('color', 'red');       
        return false;  
    }
    if(inspectionlvl == ""){     
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
        $('#er_reject').html("Reject field is empty"); 
        $('#er_reject').css('color', 'red');       
        return false;  
    }
    if(dateinspected == ""){     
        $('#er_date_inspected').html("Date Inspected field is empty"); 
        $('#er_date_inspected').css('color', 'red');       
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
        $('#er_shift').html("Shift field is empty"); 
        $('#er_shift').css('color', 'red');       
        return false;  
    }
    if(timeinsfrom == ""){     
        $('#er_time_ins_from').html("Time Inspected From field is empty"); 
        $('#er_time_ins_from').css('color', 'red');       
        return false;  
    }
    if(timeinsto == ""){     
        $('#er_time_ins_to').html("time Inspected To field is empty"); 
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
    if(cocreq == ""){     
        $('#er_coc_req').html("COC Requirements field is empty"); 
        $('#er_coc_req').css('color', 'red');       
        return false;  
    }
    if(judgement == ""){     
        $('#er_judgement').html("Judgement field is empty"); 
        $('#er_judgement').css('color', 'red');       
        return false;  
    }
    if(lotqty == ""){     
        $('#er_lot_qty').html("Lot Quantity field is empty"); 
        $('#er_lot_qty').css('color', 'red');       
        return false;  
    }
    if(samplesize == ""){     
        $('#er_sample_size').html("Sample Size field is empty"); 
        $('#er_sample_size').css('color', 'red');       
        return false;  
    }
    if(lotinspected == ""){     
        $('#er_lot_inspected').html("Lot Inspected field is empty"); 
        $('#er_lot_inspected').css('color', 'red');       
        return false;  
    }
    if(lotaccepted == ""){     
        $('#er_lot_accepted').html("Lot Accepted field is empty"); 
        $('#er_lot_accepted').css('color', 'red');       
        return false;  
    }


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
        status:status
    }).done(function(data, textStatus, jqXHR){
        window.location.href="<?php echo e(url('/oqcinspection')); ?>";
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });

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
    $('#tableforoqcmod').html("");
    $.ajax({
        url:"<?php echo e(url('/displayoqcmod')); ?>",
        method:'get',
        data:{
            pono:pono,
            device:device
        },
    }).done(function(data, textStatus,jqXHR){
        console.log(data);
        $.each(data,function(i,val){
            var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesmod" value="'+val.id+'" name="checkitemmod" id="checkitemmod"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskmod" class="btn btn-sm btn-primary edit-taskmod" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
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
    var id = $('input[name=modid]').val();
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
            device:device
    }).done(function(data, textStatus, jqXHR){
        console.log(data);
        $.each(data,function(i,val){
            var tblrow = '<tr>'+                   
                            '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxesmod" value="'+val.id+'" name="checkitemmod" id="checkitemmod"></input> '+
                            '</td>'+                        
                            '<td style="width: 5%">'+           
                                '<button type="button" name="edit-taskmod" class="btn btn-sm btn-primary edit-taskmod" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
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
    var device = $('input[name=moddevice]').val();
    var tray = [];
    $('.checkboxesmod:checked').each(function(){
        tray.push($(this).val());
    });
    var traycount = tray.length;
    var myData = {tray:tray,traycount:traycount,pono:pono,device:device};
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
                                '<button type="button" name="edit-taskmod" class="btn btn-sm btn-primary edit-taskmod" value="'+val.id+ '|' +val.mod+ '|' +val.qty+'">'+
                                       '<i class="fa fa-edit"></i> '+
                                '</button>'+
                            '</td>'+
                            '<td>'+val.id+'</td>'+
                            '<td>'+val.mod+'</td>'+
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
        $('#hd_value4').val(g4content);
        $('#hd_groupfield4').val(g4);
        $('#hd_value5').val(g5content);
        $('#hd_groupfield5').val(g5);
    }else{
        $('#hd_search_from').val(datefrom);
        $('#hd_search_to').val(dateto);
        $('#hd_value').val(g1content);
        $('#hd_groupfield').val(g1);
        $('#hd_value2').val(g2content);
        $('#hd_groupfield2').val(g2);
        $('#hd_value3').val(g3content);
        $('#hd_groupfield3').val(g3);
        $('#hd_value4').val(g4content);
        $('#hd_groupfield4').val(g4);
        $('#hd_value5').val(g5content);
        $('#hd_groupfield5').val(g5);       
    }

    var myData = {g1:g1,g2:g2,g3:g3,g4:g4,g5:g5,g1content:g1content,g2content:g2content,g3content:g3content,g4content:g4content,g5content:g5content,datefrom:datefrom,dateto:dateto};
    $('#tblforoqcinspection').html("");
    $.post("<?php echo e(url('/oqcdbgroupby')); ?>",
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
                            '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+'|'+val.assembly_line+'|'+val.app_date+'|'+val.app_time+'|'+val.lot_no+'|'+val.prod_category+'|'+val.po_no+'|'+val.device_name+'|'+val.customer+'|'+val.po_qty+'|'+val.family+'|'+val.type_of_inspection+'|'+val.severity_of_inspection+'|'+val.inspection_lvl+'|'+val.aql+'|'+val.accept+'|'+val.reject+'|'+val.date_inspected+'|'+val.ww+'|'+val.fy+'|'+val.shift+'|'+val.time_ins_from+'|'+val.time_ins_to+'|'+val.inspector+'|'+val.submission+'|'+val.coc_req+'|'+val.judgement+'|'+val.lot_qty+'|'+val.sample_size+'|'+val.lot_inspected+'|'+val.lot_accepted+'|'+val.num_of_defects+'|'+val.remarks+'|'+val.dbcon+'">'+
                                   '<i class="fa fa-edit"></i>'+ 
                            '</button>'+
                        '</td>'+
                        '<td>'+val.id+'</td>'+
                        '<td>'+val.date_inspected+'</td>'+
                        '<td>'+val.time_ins_from+'</td>'+
                        '<td>'+val.fy+'</td>'+
                        '<td>'+val.ww+'</td>'+
                        '<td>'+val.assembly_line+'</td>'+
                        '<td>'+val.submission+'</td>'+
                        '<td>'+val.prod_category+'</td>'+
                        '<td>'+val.customer+'</td>'+
                        '<td>'+val.family+'</td>'+
                        '<td>'+val.device_name+'</td>'+
                        '<td>'+val.po_no+'</td>'+
                        '<td>'+val.lot_no+'</td>'+
                        '<td>'+val.aql+'</td>'+
                        '<td>'+val.lot_accepted+'</td>'+
                    '</tr>';
            $('#tblforoqcinspection').append(tblrow);
            $('input[name=id]').val(id);
            $('input[name=assembly_line]').val("");
            $('#lot_no').val("");
            $('input[name=app_date]').val("");
            $('input[name=app_time]').val("");
            $('input[name=prod_category]').val("");
            $('input[name=po_no]').val("");
            $('input[name=series_name]').val("");
            $('input[name=customer]').val("");
            $('input[name=po_qty]').val("");
            $('select[name=family]').val("");
            $('select[name=type_of_inspection]').val("");
            $('select[name=severity_of_inspection]').val("");
            $('select[name=inspection_lvl]').val("");
            $('select[name=aql]').val("");
            $('input[name=accept]').val("");
            $('input[name=reject]').val("");
            $('input[name=date_inspected]').val("");
            $('input[name=ww]').val("");
            $('input[name=fy]').val("");
            $('select[name=shift]').val("");
            $('#time_ins_from').val("");
            $('#time_ins_to').val("");
            $('select[name=inspector]').val("");
            $('select[name=submission]').val("");
            $('select[name=coc_req]').val("");
            $('input[name=judgement]').val("");
            $('input[name=lot_qty]').val("");
            $('input[name=sample_size]').val("");
            $('input[name=lot_inspected]').val("");
            $('input[name=lot_accepted]').val("");
            $('input[name=no_of_defects]').val("");
            $('input[name=remarks]').val("");
            $('#hdstatus').val("ADD");
            $('.edit-task').on('click',function(){
                $('#AddNewModal').modal('show');
                $('#hdstatus').val("EDIT");
                var edittext = $(this).val().split('|');
                var id = edittext[0];
                $('input[name=assembly_line]').val(data[0]['assembly_line']);
                $('#lot_no').val(data[0]['lot_no']);
                $('input[name=app_date]').val(data[0]['app_date']);
                $('input[name=app_time]').val(data[0]['app_time']);
                $('input[name=prod_category]').val(data[0]['prod_category']);
                $('input[name=po_no]').val(data[0]['po_no']);
                $('input[name=series_name]').val(data[0]['series_name']);
                $('input[name=customer]').val(data[0]['customer']);
                $('input[name=po_qty]').val(data[0]['po_qty']);
                $('select[name=family]').val(data[0]['family']);
                $('select[name=type_of_inspection]').val(data[0]['type_of_inspection']);
                $('select[name=severity_of_inspection]').val(data[0]['severity_of_inspection']);
                $('select[name=inspection_lvl]').val(data[0]['inspection_lvl']);   
                $('select[name=aql]').val(data[0]['aql']);
                $('input[name=accept]').val(data[0]['accept']);
                $('input[name=reject]').val(data[0]['reject']);
                $('input[name=date_inspected]').val(data[0]['date_inspected']);
                $('input[name=ww]').val(data[0]['ww']);
                $('input[name=fy]').val(data[0]['fy']);
                $('select[name=shift]').val(data[0]['shift']);
                $('#time_ins_from').val(data[0]['time_ins_from']);
                $('#time_ins_to').val(data[0]['time_ins_to']);
                $('select[name=inspector]').val(data[0]['inspector']);
                $('select[name=submission]').val(data[0]['submission']);
                $('select[name=coc_req]').val(data[0]['coc_req']);
                $('input[name=judgement]').val(data[0]['judgement']);
                $('input[name=lot_qty]').val(data[0]['lot_qty']);
                $('input[name=sample_size]').val(data[0]['sample_size']);
                $('input[name=lot_inspected]').val(data[0]['lot_inspected']);
                $('input[name=lot_accepted]').val(data[0]['lot_accepted']);
                $('input[name=no_of_defects]').val(data[0]['no_of_defects']);
                $('input[name=remarks]').val(data[0]['remarks']);
            });
        });

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
            var accept = 0;
            var reject = 0;
            $('#hdg1_selected').val(selected);
            $('#hdg2_selected').val(selected2);
            $('#hdg3_selected').val(selected3);
        
            $.each(data,function(i,val){
                sample_size = val.sample_size;
                lot_qty = val.lot_qty;
                no_of_defects = val.num_of_defects;
             
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
                var lot_accepted = val.lot_accepted;
                if(lot_accepted == 1){
                    accept = accept+1; 
                }else{
                    reject = reject+1; 
                }

                var newselected = $('#hdg1_selected').val().split(',');
                var newselected2 = $('#hdg2_selected').val().split(',');
                var newselected3 = $('#hdg2_selected').val().split(',');
/*              alert(val.partcode);*/
                if(g1){
                    var finalselected = newselected[i];
                }
                if(g2){
                    var finalselected = newselected[i]+' - '+ newselected2[i];
                }
                if(g3){
                    var finalselected = newselected[i]+' - '+newselected2[i]+' - '+newselected3[i];
                }
                var tblrow = '<tr>'+  
                            '<td id="groupbyselected">'+finalselected+'</td>'+ 
                            '<td>'+accept+'</td>'+  
                            '<td>'+val.lot_inspected+'</td>'+
                            '<td>'+reject+'</td>'+
                            '<td>'+val.sample_size+'</td>'+
                            '<td>'+val.lot_qty+' / '+val.num_of_defects+'</td>'+
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
    var pono = $('#search_pono').val();

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
        $.each(data,function(i,val){
            var tblrow = '<tr>'+
                        '<td>'+
                            '<input type="checkbox" class="form-control input-sm checkboxes" value="'+val.id+'" name="checkitem" id="checkitem"></input> '+
                        '</td>'+                        
                        '<td style="width: 5%">'+           
                            '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+'|'+val.assembly_line+'|'+val.app_date+'|'+val.app_time+'|'+val.lot_no+'|'+val.prod_category+'|'+val.po_no+'|'+val.device_name+'|'+val.customer+'|'+val.po_qty+'|'+val.family+'|'+val.type_of_inspection+'|'+val.severity_of_inspection+'|'+val.inspection_lvl+'|'+val.aql+'|'+val.accept+'|'+val.reject+'|'+val.date_inspected+'|'+val.ww+'|'+val.fy+'|'+val.shift+'|'+val.time_ins_from+'|'+val.time_ins_to+'|'+val.inspector+'|'+val.submission+'|'+val.coc_req+'|'+val.judgement+'|'+val.lot_qty+'|'+val.sample_size+'|'+val.lot_inspected+'|'+val.lot_accepted+'|'+val.num_of_defects+'|'+val.remarks+'|'+val.dbcon+'">'+
                            
                                '   <i class="fa fa-edit"></i> '+
                            '</button>'+
                        '</td>'+
                        '<td>'+val.id+'</td>'+
                        '<td>'+val.date_inspected+'</td>'+
                        '<td>'+val.app_time+'</td>'+
                        '<td>'+val.fy+'</td>'+
                        '<td>'+val.ww+'</td>'+
                        '<td>'+val.assembly_line+'</td>'+
                        '<td>'+val.submission+'</td>'+
                        '<td>'+val.prod_category+'</td>'+
                        '<td>'+val.customer+'</td>'+
                        '<td>'+val.family+'</td>'+
                        '<td>'+val.device_name+'</td>'+
                        '<td>'+val.po_no+'</td>'+
                        '<td>'+val.lot_no+'</td>'+
                        '<td>'+val.aql+'</td>'+
                        '<td>'+val.lot_accepted+'</td>'+
                    '</tr>';
            $('#tblforoqcinspection').append(tblrow);
            $('.edit-task').on('click',function(){
                $('#AddNewModal').modal('show');
                $('#hdstatus').val("EDIT");
                var edittext = $(this).val().split('|');
                var id = edittext[0];
                $('input[name=id]').val(id);
                $('select[name=assembly_line]').val(edittext[1]);
                $('#lot_no').val(edittext[2]);
                $('input[name=app_date]').val(edittext[3]);
                $('input[name=app_time]').val(edittext[4]);
                $('input[name=prod_category]').val(edittext[5]);
                $('input[name=po_no]').val(edittext[6]);
                $('input[name=series_name]').val(edittext[7]);
                $('input[name=customer]').val(edittext[8]);
                $('input[name=po_qty]').val(edittext[9]);
                $('select[name=family]').val(edittext[10]);
                $('select[name=type_of_inspection]').val(edittext[11]);
                $('select[name=severity_of_inspection]').val(edittext[12]);
                $('select[name=inspection_lvl]').val(edittext[13]);
                $('select[name=aql]').val(edittext[14]);
                $('input[name=accept]').val(edittext[15]);
                $('input[name=reject]').val(edittext[16]);
                $('input[name=date_inspected]').val(edittext[17]);
                $('input[name=ww]').val(edittext[18]);
                $('input[name=fy]').val(edittext[19]);
                $('select[name=shift]').val(edittext[20]);
                $('#time_ins_from').val(edittext[21]);
                $('#time_ins_to').val(edittext[22]);
                $('select[name=inspector]').val(edittext[23]);
                $('select[name=submission]').val(edittext[24]);
                $('select[name=coc_req]').val(edittext[25]);
                $('input[name=judgement]').val(edittext[26]);
                $('input[name=lot_qty]').val(edittext[27]);
                $('input[name=sample_size]').val(edittext[28]);
                $('input[name=lot_inspected]').val(edittext[29]);
                $('input[name=lot_accepted]').val(edittext[30]);
                $('input[name=no_of_defects]').val(edittext[31]);
                $('input[name=remarks]').val(edittext[32]);
                $('select[name=dbcon]').val(edittext[33]);
            });
        });

    }).fail(function(jqXHR, errorThrown, textStatus){
        console.log(errorThrown+'|'+textStatus);
    });
}

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>