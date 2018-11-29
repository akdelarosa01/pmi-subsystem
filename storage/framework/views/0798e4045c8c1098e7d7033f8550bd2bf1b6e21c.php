<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: iqc_matrix.blade.php
     MODULE NAME:  [3037] IQC Matrix
     CREATED BY: AK.DELAROSA
     DATE CREATED: 2018.03.23
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2018.03.23     AK.DELAROSA      Initial Draft
*******************************************************************************/
?>



<?php $__env->startSection('title'); ?>
	IQC Matrix | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_MATRIX')): ?>
			<?php if($access->read_write == "2"): ?>
				<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>


	<div class="page-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="portlet box blue" >
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-navicon"></i>  IQC Matrix
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="post" files="true" enctype="multipart/form-data" action="<?php echo e(url('/iqc-matrix-upload')); ?>" id="frm_upload_matrix">
                                    <div class="form-group">
                                        <?php echo e(csrf_field()); ?>

                                        <label class="control-label col-md-3">Not for IQC file</label>
                                        <div class="col-md-6">
                                            <input type="file" class="filestyle" data-buttonName="btn-primary" name="matrix_file" id="matrix_file" <?php echo e($readonly); ?>>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-md green" <?php echo e($state); ?>>
                                                <i class="fa fa-upload"></i> Upload File
                                            </button> <!-- type="submit" -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped" id="tbl_matrix">
                                    <thead>
                                        <tr>
                                            <td>
                                            	<input type="checkbox" name="check_all" class="check_all" id="check_all">
                                            </td>
                                            <td>Item Code</td>
                                            <td>Item Description</td>
                                            <td>Classification</td>
                                            <td>Updated By</td>
                                            <td>Last Update</td>
											<td></td>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_matrix_body"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-md-12 text-center">
                        		<button class="btn btn-sm green" id="btn_add">
                        			<i class="fa fa-plus"></i> Add
                        		</button>

                        		<button class="btn btn-sm red" id="btn_delete">
                        			<i class="fa fa-trash"></i> Delete
                        		</button>

                                <a href="<?php echo e(url('/iqc-matrix-excel')); ?>" class="btn btn-sm grey-gallery">
                                    <i class="fa fa-file-excel-o"></i> Export to Excel
                                </a>
                        	</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

	<?php echo $__env->make('includes.iqc_matrix_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
	<script>
		var token = '<?php echo e(Session::token()); ?>';
		var showMatrixURL = "<?php echo e(url('/iqc-matrix-show')); ?>";
		var DeleteMatrixURL = "<?php echo e(url('/iqc-matrix-delete')); ?>";
		var showClassificationURL = "<?php echo e(url('/iqc-matrix-classification')); ?>";
		var ItemDetailsURL = "<?php echo e(url('/iqc-matrix-details')); ?>";
	</script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/iqc_matrix.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>