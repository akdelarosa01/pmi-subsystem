<?php $__env->startSection('content'); ?>
    <?php /* Warehouse Copy */ ?>
    <div class="col-xs-6" style="border-right: solid 1px">
        <div class="row">
        	<div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Part Name / Code</th>
                            <th>USG</th>
                            <th>RQD</th>
                            <th>QTY</th>
                            <th>LOT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($mk_details_data as $key => $value)
                        {
                        ?>
                            <tr>
                                <td><?php echo e($value->item); ?></td>
                                <td><?php echo e($value->item_desc); ?></td>
                                <td><?php echo e($value->usage); ?></td>
                                <td><?php echo e($value->rqd_qty); ?></td>
                                <td><?php echo e($value->issued_qty); ?></td>
                                <td><?php echo e($value->lot_no); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php /* Production Copy */ ?>
    <div class="col-xs-6">
        <div class="row">
        	<div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Part Name / Code</th>
                            <th>USG</th>
                            <th>RQD</th>
                            <th>QTY</th>
                            <th>LOT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($mk_details_data as $key => $value)
                        {
                        ?>
                            <tr>
                                <td><?php echo e($value->item); ?></td>
                                <td><?php echo e($value->item_desc); ?></td>
                                <td><?php echo e($value->usage); ?></td>
                                <td><?php echo e($value->rqd_qty); ?></td>
                                <td><?php echo e($value->issued_qty); ?></td>
                                <td><?php echo e($value->lot_no); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pdf.material_issuace_sheet_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>