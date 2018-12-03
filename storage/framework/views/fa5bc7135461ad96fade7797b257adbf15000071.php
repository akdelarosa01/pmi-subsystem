<?php $__env->startSection('content'); ?>
    <?php /* Warehouse Copy */ ?>
    <div class="col-xs-6" style="border-right: solid 1px">
        <div class="row">
            <div class="col-xs-12">
                <table class="tabl table-borderless table-condensed">
                    <tr>
                        <td>Prepared By:</td>
                        <td><?php echo e($preparedby); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Issued By:</td>
                        <td>__________________</td>
                        <td></td>
                        <td>Date: __________________</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Received By:</td>
                        <td>__________________</td>
                        <td></td>
                        <td>Date: __________________</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Transfer Slip:</td>
                        <td><?php echo e($issuanceno); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>

    <?php /* Production Copy */ ?>
    <div class="col-xs-6">
        <div class="row">
            <div class="col-xs-12">
                <table class="tabl table-borderless table-condensed">
                    <tr>
                        <td>Prepared By:</td>
                        <td><?php echo e($preparedby); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Issued By:</td>
                        <td>__________________</td>
                        <td></td>
                        <td>Date: __________________</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Received By:</td>
                        <td>__________________</td>
                        <td></td>
                        <td>Date: __________________</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Transfer Slip:</td>
                        <td><?php echo e($issuanceno); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pdf.material_issuace_sheet_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>