<?php $__env->startSection('title'); ?>
    QC Database | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/css/datatable-fixedheader.css')); ?>">
    <style type="text/css">
        .dataTables_scrollHeadInner{
            width:100% !important;
        }
        .dataTables_scrollHeadInner table{
            width:100% !important;
        }
        .modal-backdrop {
            z-index: -1;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php $state = ""; $readonly = ""; ?>
    <?php foreach($userProgramAccess as $access): ?>
        <?php if($access->program_code == Config::get('constants.MODULE_CODE_PCKNGDB')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
            <?php if($access->read_write == "2"): ?>
            <?php $state = "disabled"; $readonly = "readonly"; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <div class="page-content">
        <div class="row">
            <div class="col-md-6">
                <h3>Packing Inspection</h3>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <button type="button" class="btn green" id="btn_add">
                        <i class="fa fa-plus"></i> Add New
                    </button>
                    <button type="button" class="btn blue" id="btn_groupby">
                        <i class="fa fa-group"></i> Group By
                    </button>
                    <button type="button" class="btn red" id="btn_delete">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                    <button class="btn purple" id="btn_search">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </div>
        </div>

        <hr>
        
        <div class="row">
            <div class="col-md-12" id="main_pane">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="tbl_packing_inspection" style="font-size: 10px">
                        <thead>
                            <tr>
                                <td class="table-checkbox">
                                    <input type="checkbox" class="group-checkable check_all" />
                                </td>
                                <td></td>
                                <td>Date Inspected</td>
                                <td>Shipment Date</td>
                                <td>Series Name</td>
                                <td>P.O. #</td>
                                <td>Packing Operator</td>
                                <td>Inspector</td>
                                <td>Packing Type</td>
                                <td>Unit Condition</td>
                                <td>Packing Code(per Series)</td>
                                <td>Carton #</td>
                                <td>Packing Code</td>
                                <td>Qty</td>
                                <td>Judgement</td>
                                <td>Remarks</td>
                            </tr>
                        </thead>
                        <tbody id="tbl_packing_inspection_body"></tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-12" id="group_by_pane"></div>
        </div>

    </div>

    
    <?php echo $__env->make('includes.packing_inspection_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var getStampCodeURL = "<?php echo e(url('packinginspection/stamp-code')); ?>";
        var token = "<?php echo e(Session::token()); ?>";
        var getDataInspectedURL = "<?php echo e(url('/packinginspection/get-data-inspected')); ?>";
        var saveURL = "<?php echo e(url('/packinginspection/save')); ?>";
        var initdataURL = "<?php echo e(url('/packinginspection/initdata')); ?>";
        var getRuncardURL = "<?php echo e(url('/packinginspection/get-runcard')); ?>";
        var getMODURL = "<?php echo e(url('/packinginspection/get-mod')); ?>";
        var deleteInspectionURL = "<?php echo e(url('/packinginspection/delete-inspection')); ?>";
        var deleteRuncardURL = "<?php echo e(url('/packinginspection/delete-runcard')); ?>";
        var deleteMODURL = "<?php echo e(url('/packinginspection/delete-mod')); ?>";
        var getPOdetailsURL = "<?php echo e(url('/packinginspection/po-details')); ?>";
        var current_user = "<?php echo e(Auth::user()->firstname); ?>";
        var searchPdfURL = "<?php echo e(url('/packinginspection/search-pdf')); ?>";
        var searchExcelURL = "<?php echo e(url('/packinginspection/search-excel')); ?>";
        var GroupByURL = "<?php echo e(url('/packinginspection/groupby-values')); ?>";
        var PDFGroupByReportURL = "";
    </script>
    <script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/packing_inspection.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>