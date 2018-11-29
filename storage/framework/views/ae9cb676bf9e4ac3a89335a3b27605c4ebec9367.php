<?php
/*******************************************************************************
     Copyright (c) Company Nam All rights reserved.

     FILE NAME: iqc.blade.php
     MODULE NAME:  3006 : WBS - IQC Inspection
     CREATED BY: AK.DELAROSA
     DATE CREATED: 2016.07.01
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.07.01    AK.DELAROSA      Initial Draft
     100-00-02   1     2016.07.27    MESPINOSA        IQC Inspection Implementation.
*******************************************************************************/
?>



<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script language="javascript" type="text/javascript">

    $( document ).ready(function(e) {
        $('#filter').on('click', function(e) {
            $('#filterModal').modal('show');
        });

        $('#statusbtn').on('click', function(e) {
            $('#statusModal').modal('show');
        });

        var rowCount = $('#tbl_iqc tr').length;
        if(rowCount < 2) {
            $("#invalidFilterModal").modal("show");
        }

    });

    $(function() {
        // add multiple select / deselect functionality
        $("#chk_all").click(function () {
            if(this.checked) {
                $('input[name=chk_item]').parents('span').addClass("checked");
                $("input[name=chk_item]").prop('checked', this.checked);
            } else {
                $('input[name=chk_item]').parents('span').removeClass("checked");
                $("input[name=chk_item]").prop('checked', this.checked);
            }
        });

        // if all checkbox are selected, check the chk_all checkbox
        // and viceversa
        $(".chk_item").click(function() {
            if($(".chk_item").length == $(".chk_item:checked").length) {
                $('input[name=chk_all]').parents('span').addClass("checked");
                $("input[name=chk_all]").prop('checked', this.checked);
            } else {
                $('input[name=chk_all]').parents('span').removeClass("checked");
                $("input[name=chk_all]").prop('checked', this.checked);
            }
        });
    });

    function filter()
    {
        window.location.href= "<?php echo e(url('/iqc?recno=')); ?>" + $("#recnomdl").val()
                                + '&status=' + $("#statusmdl").val()
                                + '&itemno=' + $("#itemnomdl").val()
                                + '&lotno=' + $("#lotnomdl").val();
    }

    function updateStatus() {
        var values = new Array;
        var selecteditems = new Array;
        var ctr = 0;
        var hasCheck = false;

        $(".checkboxes").each(function() {
            var id = $(this).attr('name');

            if($(this).is(':checked')) {
                selecteditem = $(this).val();
                values=selecteditem.split('|');
                selecteditems[ctr] = values;
                hasCheck = true;
                ctr++;
            }
        });

    if(hasCheck == false) {
        values[0] = $('#selectedIqcItem').val();
        values[1] = $('#selectedIqc').val();
        values[2] = $('#selectedIqcLotNo').val();
        values[3] = $('#selectedIqcQty').val();
        selecteditems[0] = values;
    }

    if(hasCheck == false && $('#selectedIqcItem').val() == '') {
        $.alert('No selected record for Update Status.', {
            position  : ['center', [-0.40, 0]],
            type      : 'error',
            closeTime : 2000,
            autoClose : true,
            id        :'alert_suc'
        });
    } else {
        // alert(selecteditems);
        $('#loading').modal('toggle');
        $.post("<?php echo e(url('/iqc-update')); ?>", {
            _token          : $('meta[name=csrf-token]').attr('content')
            , selecteditems : selecteditems
            , status        : $("#statusup").val()
            , iqcresult     : $("#iqcresup").val()
        }).done(function(data) {
            $('#loading').modal('toggle');

            // alert(data);

            $.alert('IQC Status updated successfully.', {
                position  : ['center', [-0.40, 0]],
                type      : 'success',
                closeTime : 2000,
                autoClose : true,
                id        :'alert_suc'
            });

            window.location.href= "<?php echo e(url('/iqc?recno=')); ?>" + $("#recnomdl").val()
                                    + '&status=' + $("#statusmdl").val()
                                    + '&itemno=' + $("#itemnomdl").val()
                                    + '&lotno=' + $("#lotnomdl").val();

        }).fail(function() {
            $('#loading').modal('toggle');
            alert('fail');
            });
        }
    }

    function editIqcStatus(item, iqc, lotno)
    {
        $('#selectedIqc').val(iqc);
        $('#selectedIqcItem').val(item);
        $('#selectedIqcLotNo').val(lotno);
        $('#statusModal').modal('show');
    }

</script>

<?php $__env->startSection('title'); ?>
WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $state = ""; $readonly = ""; ?>
    <?php foreach($userProgramAccess as $access): ?>
        <?php if($access->program_code == Config::get('constants.MODULE_CODE_IQCINS')): ?>
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
                                    <i class="fa fa-navicon"></i>  WBS
                                </div>
                            </div>
                            <div class="portlet-body">

                                <div class="row">
   									<div class="col-xs-12 hidden-md hidden-lg hidden-xl">
   										<div class="btn-group pull-right">
   											<button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
   												IQC Inspection <i class="fa fa-angle-down"></i>
   											</button>
   											<ul class="dropdown-menu" role="menu">
   												<li>
   													<a href="<?php echo e(url('/materialreceiving')); ?>">
   														<i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
   													</a>
   												</li>
   												<li class="active">
   													<a href="<?php echo e(url('/iqc')); ?>">
   													   <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
   												   	</a>
   												</li>
   												<li>
   													<a href="<?php echo e(url('/wbsmaterialkitting')); ?>">
   		 											   <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
   		 										   </a>
   												</li>
   												<li>
   													<a href="<?php echo e(url('/wbssakidashi')); ?>">
   		 											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
   		 										   </a>
   												</li>
   												<li>
   													<a href="<?php echo e(url('/wbspartsreceiving')); ?>">
   		 											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
   		 										   </a>
   												</li>
   												<li>
   													<a href="<?php echo e(url('/wbsphysicalinventory')); ?>">
   		 											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
   		 										   </a>
   												</li>
   												<li>
   													<a href="<?php echo e(url('/wbsprodmatrequest')); ?>">
   		 											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
   		 										   </a>
   												</li>
                                                <li>
                                                    <a href="<?php echo e(url('/wbsprodmatreturn')); ?>" >
                                                       <i class="fa fa-exchange fa-2x"></i> Production Material Return
                                                   </a>
                                                </li>
   												<li>
   													<a href="<?php echo e(url('/wbswhsmatissuance')); ?>" >
   		 											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
   		 										   </a>
   												</li>
                                                <li>
                                                    <a href="<?php echo e(url('/wbsmaterialdisposition')); ?>" >
                                                       <i class="fa fa-history fa-2x"></i> Material Disposistion
                                                   </a>
                                                </li>
                                                <li>
													<a href="<?php echo e(url('/wbsreports')); ?>" >
		 											   <i class="fa fa-file-text-o fa-2x font-grey-gallery"></i> WBS Report
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
                                            <a href="<?php echo e(url('/materialreceiving')); ?>" class="list-group-item">
                                                <i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
                                            </a>
                                            <a href="<?php echo e(url('/iqc')); ?>" class="list-group-item  active">
                                                <i class="fa fa-search fa-2x"></i> IQC Inspection
                                            </a>
                                            <a href="<?php echo e(url('/wbsmaterialkitting')); ?>" class="list-group-item">
                                                <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
                                            </a>
                                            <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item">
                                                <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
                                            </a>
                                            <a href="<?php echo e(url('/wbspartsreceiving')); ?>" class="list-group-item">
                                                <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
                                            </a>
                                            <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
                                                <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
                                            </a>
                                            <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
                                                <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
                                            </a>
                                            <a href="<?php echo e(url('/wbsprodmatreturn')); ?>" class="list-group-item">
                                                <i class="fa fa-exchange fa-2x font-grey-gallery"></i> Production Material Return
                                            </a>
                                            <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item">
                                                <i class="fa fa-cubes fa-2x font-red-flamingo"></i> Warehouse Material Issuance
                                            </a>

                                            <a href="<?php echo e(url('/wbsmaterialdisposition')); ?>" class="list-group-item">
                                                <i class="fa fa-history fa-2x font-grey-gallery"></i> Material Disposistion
                                            </a>
                                            <a href="<?php echo e(url('/wbsreports')); ?>" class="list-group-item">
                                                <i class="fa fa-file-text-o fa-2x font-grey-gallery"></i> WBS Report
                                            </a>
                                        </div>
                                    </div>

   									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="POST" action="<?php echo e(url('/iqc')); ?>" class="form-horizontal" id="filterfrm">
                                                    <?php echo e(csrf_field()); ?>


                                                    <div class="form-group">
                                                        <div class="col-sm-1">
                                                            <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fa fa-refresh"></i> Refresh
                                                            </button>
                                                        </div>

                                                        <label class="control-label col-sm-1">Receiving No.</label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" id="recno" name="recno" style="font-size:12px" value="<?php if(strlen($selectedreceiveno) > 0){ echo $selectedreceiveno;} ?>" >
                                                        </div>

                                                        <label class="control-label col-sm-1">Status</label>
                                                        <div class="col-sm-2">
                                                            <select class="form-control" name="status">
                                                                <option value="-1" <?php if(isset($selectedstatus)){ if($selectedstatus=='-1'){ echo 'selected="selected"'; } }?> >---Select---</option>
                                                                <option value="0"
                                                                <?php
                                                                    if(strlen($selectedstatus) > 0) {
                                                                        if($selectedstatus=='0') {
                                                                            echo 'selected="selected"';
                                                                        }
                                                                    } else {
                                                                        echo 'selected="selected"';
                                                                    }
                                                                ?> >Pending</option>
                                                                <option value="Accepted" <?php if(isset($selectedstatus)){ if($selectedstatus=='Accepted'){ echo 'selected="selected"'; } }?> >Accepted</option>
                                                                <option value="Reject" <?php if(isset($selectedstatus)){ if($selectedstatus=='Reject'){ echo 'selected="selected"'; } }?> >Reject</option>
                                                                <option value="On Hold" <?php if(isset($selectedstatus)){ if($selectedstatus=='On Hold'){ echo 'selected="selected"'; } }?> >On Hold</option>
                                                            </select>
                                                        </div>

                                                        <label class="control-label col-sm-1">Item/Part No.</label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" id="itemno" name="itemno" style="font-size:12px" value="<?php if(strlen($selecteditemno) > 0){ echo $selecteditemno;} ?>" >
                                                        </div>

                                                        <label class="control-label col-sm-1">Lot No.</label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" id="lotno" name="lotno" style="font-size:12px" value="<?php if(strlen($selectedlotno) > 0){ echo $selectedlotno;} ?>" >
                                                        </div>

                                                        <!-- <div class="col-sm-1">
                                                        <a href="#" id="filter" class="btn btn-sm btn-success">
                                                        <i class="fa fa-wrench"></i> Filter
                                                        </a>
                                                        </div> -->

                                                        <div class="col-sm-1">
                                                            <button type="button" id="statusbtn" class="btn btn-sm btn-success" <?php echo($state); ?> >
                                                                <i class="fa fa-ellipsis-v"></i> Update Status Bulk
                                                            </button>
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                                <div class="scroller" style="height: 700px;">
                                                    <table class="table table-striped table-bordered table-hover table-responsive" id="tbl_iqc" style="font-size:10px">
                                                        <thead>
                                                            <tr>
                                                                <td class="table-checkbox" style="font-size:10px"><input type="checkbox" id="chk_all" name="chk_all" class="group-checkable chk_all" data-set="#tbl_batch .checkboxes"/></td>
                                                                <td>Item/Part No.</td>
                                                                <td>Item Description</td>
                                                                <td>Supplier</td>
                                                                <td>Quantity</td>
                                                                <td>Lot No.</td>
                                                                <td>Drawing No.</td>
                                                                <td>Receving No.</td>
                                                                <td>Invoice No.</td>
                                                                <td>Status</td>
                                                                <td>IQC Result</td>
                                                                <td>Updated By</td>
                                                                <td>Updated Date</td>
                                                                <td>Edit Status</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if(isset($iqc_summary_data)): ?>
                                                                <?php foreach($iqc_summary_data as $iqcsdata): ?>
                                                                    <?php
                                                                        switch ($iqcsdata->status) {
                                                                            case 'Accepted':
                                                                                $statuscolor = '#1f897f; color: #fff';
                                                                            break;

                                                                            case 'Reject':
                                                                                $statuscolor = '#c23f44; color: #fff';
                                                                            break;

                                                                            case 'On Hold':
                                                                                $statuscolor = '#c23f44; color: #fff';
                                                                            break;

                                                                            default:
                                                                                $statuscolor = '';
                                                                            break;
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><input type="checkbox" class="checkboxes input-sm chk_item" name="chk_item" value="<?php echo e($iqcsdata->item .'|'. $iqcsdata->wbs_mr_id .'|'. $iqcsdata->lot_no .'|'.$iqcsdata->qty); ?>"/></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->item); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->item_desc); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->supplier); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->qty); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->lot_no); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->drawing_no); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->wbs_mr_id); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->invoice_no); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->status); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->iqc_result); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->update_user); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?>"><?php echo e($iqcsdata->updated_at); ?></td>
                                                                        <td style="text-align: center; background-color: <?php echo $statuscolor; ?> padding-bottom: 0px;padding-top: 4px;padding-left: 0px;padding-right: 0px;"><a href="#" style="padding-bottom: 4px;padding-top: 4px;padding-left: 15px;padding-right: 15px;" class="btn btn-primary btn-sm" onclick="javascript: editIqcStatus('<?php echo $iqcsdata->item;?>' , '<?php echo $iqcsdata->wbs_mr_id;?>', '<?php echo $iqcsdata->lot_no;?>');" value="<?php echo e($iqcsdata->item .'|'. $iqcsdata->wbs_mr_id); ?>" <?php echo($state); ?>><i class="fa fa-edit"></i></a></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <br><br>

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

    <!-- AJAX LOADER -->
    <div id="loading" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <img src="assets/images/ajax-loader.gif" class="img-responsive">
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Modal-->
    <div id="filterModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Filter for IQC Inspection</h4>
                </div>
                    <form type="form" method="POST" action=""  class="form-horizontal" id="filtermdl">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-5">Receiving No.</label>
                                        <div class="col-sm-7">
                                        <input type="text" class="form-control input-sm"  id="recnomdl" name="recno" value="<?php if(strlen($selectedreceiveno) > 0){ echo $selectedreceiveno;} ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5">Status</label>
                                    <div class="col-sm-7">
                                        <select class="form-control input-sm" id="statusmdl" name="status">
                                            <option value="-1" <?php if(isset($selectedstatus)){ if($selectedstatus=='-1'){ echo 'selected="selected"'; } }?> >---Select---</option>
                                            <option value="0"
                                            <?php if(strlen($selectedstatus) > 0)
                                            {
                                            if($selectedstatus=='0')
                                            {
                                            echo 'selected="selected"';
                                            }
                                            }
                                            else
                                            {
                                            echo 'selected="selected"';
                                            }?> >Pending</option>
                                            <option value="Accepted" <?php if(isset($selectedstatus)){ if($selectedstatus=='Accepted'){ echo 'selected="selected"'; } }?> >Accepted</option>
                                            <option value="Reject" <?php if(isset($selectedstatus)){ if($selectedstatus=='Reject'){ echo 'selected="selected"'; } }?> >Reject</option>
                                            <option value="On Hold" <?php if(isset($selectedstatus)){ if($selectedstatus=='On Hold'){ echo 'selected="selected"'; } }?> >On Hold</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5">Item/Part No.</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control input-sm" id="itemnomdl" name="itemno"  value="<?php if(strlen($selecteditemno) > 0){ echo $selecteditemno;} ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5">Lot No.</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control input-sm" id="lotnomdl" name="lotno"  value="<?php if(strlen($selectedlotno) > 0){ echo $selectedlotno;} ?>">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                <label class="control-label col-sm-5">Invoice No.</label>
                                <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" id="invoicenomdl" name="invoiceno"  value=" //if(strlen($selectedinvoiceno) > 0){ echo $selectedinvoiceno;} ?>">
                                </div>
                                </div> -->
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="filter();" data-dismiss="modal" class="btn btn-success" <?php echo($state); ?>>OK</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Status Modal-->
    <div id="statusModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Update Status for IQC Inspection</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="" class="form-horizontal" id="statusmdl">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <p>All Fields are required.</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-5">Status</label>
                                    <div class="col-sm-7">
                                        <select class="form-control input-sm" name="statusup" id="statusup">
                                            <option value="Accepted" selected="selected">Accepted</option>
                                            <option value="Reject">Reject</option>
                                            <option value="On Hold">On Hold</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                <label class="control-label col-sm-5">Item/Part No.</label>
                                <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" id="itemnoup" name="itemnoup">
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-5">Lot No.</label>
                                <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" id="lotnoup" name="lotnoup">
                                </div>
                                </div> -->

                                <div class="form-group">
                                    <label class="control-label col-sm-5">IQC Result</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control input-sm" id="iqcresup" style="resize:none" name="iqcresup"  id="iqcresup" ></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="selectedIqc" id="selectedIqc"/>
                    <input type="hidden" name="selectedIqcItem" id="selectedIqcItem"/>
                    <input type="hidden" name="selectedIqcLotNo" id="selectedIqcLotNo"/>
                    <input type="hidden" name="selectedIqcQty" id="selectedIqcQty"/>
                    <button type="submit" onclick="updateStatus();" data-dismiss="modal" class="btn btn-success" <?php echo($state); ?>>OK</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Invalid Invoice Load Pop-message-->
    <div id="invalidFilterModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm blue">
            <div class="modal-content ">
                <div class="modal-body">
                    <p>Please input valid filter values.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
                </div>
            </div>
        </div>
    </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>