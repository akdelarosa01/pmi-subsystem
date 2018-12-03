<?php $__env->startSection('title'); ?>
    QC Database | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/css/jquery.treegrid.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php $state = ""; $readonly = ""; ?>
    <?php foreach($userProgramAccess as $access): ?>
        <?php if($access->program_code == Config::get('constants.MODULE_CODE_QCDB')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
            <?php if($access->read_write == "2"): ?>
            <?php $state = "disabled"; $readonly = "readonly"; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box grey-gallery" >
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i> OQC Inspection
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <button type="button" class="btn blue" id="btn_groupby" onclick="javascript:GroupBy();">
                                    <i class="fa fa-group"></i> Group By
                                </button>
                                <a href="javascript:;" class="btn purple" id="btn_search" onclick="javascript:Search();">
                                    <i class="fa fa-search"></i> Search
                                </a>
                                <a href="javascript:;" class="btn yellow-gold" id="btn_report" onclick="javascript:Report();">
                                    <i class="fa fa-file-text-o"></i> Reports
                                </a>
                                <a href="<?php echo e(url('/oqcinspection')); ?>" class="btn red" id="btn_back">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body" id="main">
                        
                            
                        
                        <?php /* <div class="table-responsive">
                            <table class="tree table">
                                <thead>
                                    <tr>
                                        <th>Date Inspected</th>
                                        <th>FY-WW</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Lot Size</th>
                                        <th>Sample Size</th>
                                        <th>No. of Defectives</th>
                                        <th>Lot No.</th>
                                        <th>Mode of Defects</th>
                                        <th>Qty</th>
                                        <th>Judgement</th>
                                        <th>Inspector</th>
                                        <th>Remarks</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> */ ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php echo $__env->make('includes.oqc_inspection-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    var token = "<?php echo e(Session::token()); ?>";
    var PDFReportURL = "<?php echo e(url('/oqc-pdf')); ?>";
    var ExcelReportURL = "<?php echo e(url('/oqc-excel')); ?>";
    var GroupByURL = "<?php echo e(url('/oqc-groupby-values')); ?>";
</script>
<script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/jquery.treegrid.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/jquery.treegrid.bootstrap3.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/oqc_inspection_groupby.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>