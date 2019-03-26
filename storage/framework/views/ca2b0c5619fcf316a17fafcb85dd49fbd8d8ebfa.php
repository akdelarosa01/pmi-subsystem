<?php
/*******************************************************************************
     Copyright (c) Company Nam All rights reserved.

     FILE NAME: poregistration.blade.php
     MODULE NAME:  6002 : PO Registration
     CREATED BY: dax
     DATE CREATED: 2018.08.08
     REVISION HISTORY :

     
*******************************************************************************/
?>



<?php $__env->startSection('title'); ?>
PO Registration | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <?php $state = ""; $readonly = ""; ?>
    <?php foreach($userProgramAccess as $access): ?>
        <?php if($access->program_code == Config::get('constants.MODULE_CODE_POREG')): ?>
            <?php if($access->read_write == "2"): ?>
                <?php $state = "disabled"; $readonly = "readonly"; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <div class="page-content">

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="portlet box blue" >
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-navicon"></i>  P.O. Registration
                        </div>
                    </div>
                    <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <?php /* <form class="" action="<?php echo e(url('/updatedevice')); ?>" method="post" id="frm">
                                                        <?php echo e(csrf_field()); ?> */ ?>
                                           <button type="button" id="add" class="btn btn-sm green input-sm"  <?php echo e($state); ?>> 
                                                <i class="fa fa-plus"></i> ADD  PO DETAILS
                                           </button>
                                           <button type="button" id="update" class="btn btn-sm blue input-sm"  <?php echo e($state); ?>> 
                                                <i class="fa fa-star"></i> UPDATE DEVICE FROM YPICS
                                            </button>
                                        <?php /* </form> */ ?>
                                    </div>
                                </div>
                            </div>
                                  <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="tbl_device" style="font-size:10px">
                                            <thead>
                                                <tr>
                                                    <td>PO NUmber</td>
                                                    <td>Device Code</td>
                                                    <td>Device Name</td>
                                                    <td>PO Qty</td>
                                                    <td>Family</td>
                                                    <td>Series</td>
                                                    <td>Product Type</td>
                                                    <td>Update</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_device_body"></tbody>
                                        </table>

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

    <?php echo $__env->make('includes.yielding_poreg_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    var token = "<?php echo e(Session::token()); ?>";
    var loadporegdevice = "<?php echo e(url('/getdevice')); ?>";
    var displayporegitem = "<?php echo e(url('/displayItem')); ?>";
    var loadfamilylist = "<?php echo e(url('/getFamilyDropDown')); ?>"
    var loadserieslist = "<?php echo e(url('/getSeriesDropdown')); ?>"
    var getdropdownlang = "<?php echo e(url('/yielddropdowns')); ?>";
    var getpoypics = "<?php echo e(url('/CheckYpicsPO')); ?>";
    var addpodata = "<?php echo e(url('/add-poregistration')); ?>";
    var loadypicsdevice = "<?php echo e(url('/updatedevice')); ?>";
    var getPOregistration = "<?php echo e(url('/get-poregistration')); ?>";
    var displayporeg = "<?php echo e(url('/displayporeg')); ?>";
    var deleteporeg = "<?php echo e(url('/deleteporeg')); ?>";
</script>
<script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset(config('constants.PUBLIC_PATH').'assets/global/scripts/yielding_poreg.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>