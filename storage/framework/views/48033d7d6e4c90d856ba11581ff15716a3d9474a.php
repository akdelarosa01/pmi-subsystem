<?php $__env->startSection('content'); ?>
    <?php /* Warehouse Copy */ ?>
    <div class="col-xs-6" style="border-right: solid 1px">
        <div class="row">
            <br>
        	<div class="col-xs-12">
        		<table class="table table-borderless table-condensed">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <h4><ins>MATERIAL ISSUANCE SHEET</ins></h4>
                            </th>
                            <td style="font-size: 9px">Warehouse Copy<br>
                                <?php /* <span class=".pagenum">Page 1</span> */ ?>
                            </td>
                        </tr>
                        <tr>
                            <th>PO:</th>
                            <td><?php echo e($pono); ?></td>
                            <th></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>DEVICE NAME:</th>
                            <td colspan="2"><?php echo e($devicename); ?></td>
                            <th></th>
                        </tr>
                        <tr>
                            <th>ORDER QTY:</th>
                            <td><?php echo e($poqty); ?></td>
                            <th>Transfer to:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>KIT QTY:</th>
                            <td><?php echo e($kitqty); ?></td>
                            <th>A. Kanban House</th>
                            <th>__________</th>
                        </tr>
                        <tr>
                            <th>KIT NUMBER:</th>
                            <td><?php echo e($kitno); ?></td>
                            <th>B. Warehouse</th>
                            <th>__________</th>
                        </tr>
                        <tr>
                            <th>PREPARED DT:</th>
                            <td><?php echo e($createdat); ?></td>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <?php /* Production Copy */ ?>
    <div class="col-xs-6">
        <div class="row">
            <br>
            <div class="col-xs-12">
                <table class="table table-borderless table-condensed">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <h4><ins>MATERIAL ISSUANCE SHEET</ins></h4>
                            </th>
                            <td style="font-size: 9px">Production Copy<br>
                                <?php /* <span class=".pagenum">Page 1</span> */ ?>
                            </td>
                        </tr>
                        <tr>
                            <th>PO:</th>
                            <td><?php echo e($pono); ?></td>
                            <th></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>DEVICE NAME:</th>
                            <td colspan="2"><?php echo e($devicename); ?></td>
                            <th></th>
                        </tr>
                        <tr>
                            <th>ORDER QTY:</th>
                            <td><?php echo e($poqty); ?></td>
                            <th>Transfer to:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>KIT QTY:</th>
                            <td><?php echo e($kitqty); ?></td>
                            <th>A. Kanban House</th>
                            <th>__________</th>
                        </tr>
                        <tr>
                            <th>KIT NUMBER:</th>
                            <td><?php echo e($kitno); ?></td>
                            <th>B. Warehouse</th>
                            <th>__________</th>
                        </tr>
                        <tr>
                            <th>PREPARED DT:</th>
                            <td><?php echo e($createdat); ?></td>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pdf.material_issuace_sheet_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>