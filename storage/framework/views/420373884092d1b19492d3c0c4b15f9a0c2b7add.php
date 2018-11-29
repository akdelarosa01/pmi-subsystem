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
     200-00-01   1     2016.07.01    AK.DELAROSA      Version 2.0
*******************************************************************************/
?>



<?php $__env->startSection('title'); ?>
WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        table.table-fixedheader {
            width: 100%;   
        }
        table.table-fixedheader, table.table-fixedheader>thead, table.table-fixedheader>tbody, table.table-fixedheader>thead>tr, table.table-fixedheader>tbody>tr, table.table-fixedheader>thead>tr>td, table.table-fixedheader>tbody>td {
            display: block;
        }
        table.table-fixedheader>thead>tr:after, table.table-fixedheader>tbody>tr:after {
            content:' ';
            display: block;
            visibility: hidden;
            clear: both;
        }
        table.table-fixedheader>tbody {
            overflow-y: scroll;
            height: 300px;
        }
        table.table-fixedheader>thead {
            overflow-y: scroll;
        }
        table.table-fixedheader>thead::-webkit-scrollbar {
            background-color: inherit;
        }

        table.table-fixedheader>thead>tr>td:after, table.table-fixedheader>tbody>tr>td:after {
            content:' ';
            display: table-cell;
            visibility: hidden;
            clear: both;
        }

        table.table-fixedheader>thead tr td, table.table-fixedheader>tbody tr td {
            float: left;    
            word-wrap:break-word;
            height: 40px;
        }
    </style>
<?php $__env->stopPush(); ?>

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
      <?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                                    <i class="fa fa-navicon"></i>  WBS IQC Inspection
                                </div>
                            </div>
                            <div class="portlet-body">
									<div class="row">
	                                    <div class="col-md-12">
	                                    	<div class="pull-right">
	                                    		<a href="javascript:;" id="searchbtn" class="btn btn-sm blue input-sm" <?php echo($state); ?> >
                                                    <i class="fa fa-search"></i> Search
                                                </a>
	                                    		      <a href="javascript:;" id="statusbtn" class="btn btn-sm btn-success input-sm" <?php echo($state); ?> >
                                                    <i class="fa fa-ellipsis-v"></i> Update Status Bulk
                                                </a>
	                                    	</div>
	                                    </div>
	                                </div>
		                                  <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-fixedheader table-striped" id="tbl_iqc" style="font-size:10px">
                                                    <thead>
                                                        <tr>
                                                            <td style="width:2.1%" class="table-checkbox">
                                                                <input type="checkbox" id="chk_all" name="chk_all" class="group-checkable"/>
                                                            </td>
                                                            <td style="width:7.1%">Item/Part No.</td>
                                                            <td style="width:12.1%">Item Description</td>
                                                            <td style="width:7.1%">Supplier</td>
                                                            <td style="width:7.1%">Quantity</td>
                                                            <td style="width:7.1%">Lot No.</td>
                                                            <td style="width:7.1%">Drawing No.</td>
                                                            <td style="width:7.1%">Receving No.</td>
                                                            <td style="width:7.1%">Invoice No.</td>
                                                            <td style="width:7.1%">Status</td>
                                                            <td style="width:7.1%">IQC Result</td>
                                                            <td style="width:7.1%">Updated By</td>
                                                            <td style="width:7.1%">Updated Date</td>
                                                            <td style="width:7.1%">Edit Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_iqc_body" style="font-size:10px">
                                                    	
                                                    </tbody>
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
        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END CONTAINER -->

    <div id="searchmodal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog gray-gallery">
            <div class="modal-content ">
            	<div class="modal-header">
                    <h4 class="modal-title">Search</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
	                    <div class="form-group">
	                    	<label class="control-label col-sm-3">From</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm datepicker" id="from" name="from" placeholder="From" data-date-format="yyyy-mm-dd" value="<?php echo e(date('Y-m-d')); ?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-3">To</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm datepicker" id="to" name="to" placeholder="To" data-date-format="yyyy-mm-dd" value="<?php echo e(date('Y-m-d')); ?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-sm-3">Receiving No.</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" id="recno" name="recno">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-sm-3">Status</label>
	                        <div class="col-sm-9">
	                            <select class="form-control input-sm" name="status" id="status">
	                                <option value="0">Pending</option>
	                                <option value="1">Accepted</option>
	                                <option value="2">Reject</option>
	                                <option value="3">On Hold</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-sm-3">Item/Part No.</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" id="itemno" name="itemno"/>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-sm-3">Lot No.</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" id="lotno" name="lotno">
	                        </div>
	                    </div>
                    </form>

                </div>
                <div class="modal-footer">
                	<a href="javascript:;" data-dismiss="modal" id="gobtn" class="btn btn-primary btn-sm">Go</a>
                	<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="statusModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Update Status for IQC Inspection</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form  class="form-horizontal" id="statusmdl">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <p>All Fields are required.</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm" name="statusup" id="statusup">
                                            <option value="1" selected="selected">Accepted</option>
                                            <option value="2">Reject</option>
                                            <option value="3">On Hold</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">IQC Result</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control input-sm" id="iqcresup" style="resize:none" name="iqcresup"  id="iqcresup" ></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="selectedid"/>
                    <a href="javascript:;" id="updateIQCstatusbtn" data-dismiss="modal" class="btn btn-success" <?php echo($state); ?>>OK</a>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="bulkupdatemodal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Update Status for IQC Inspection</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form  class="form-horizontal">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <p>All Fields are required.</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control input-sm" name="statusupbulk" id="statusupbulk">
                                            <option value="1" selected="selected">Accepted</option>
                                            <option value="2">Reject</option>
                                            <option value="3">On Hold</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">IQC Result</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control input-sm" id="iqcresupbulk" style="resize:none" name="iqcresupbulk" ></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="javascript:;" id="updateIQCbulkbtn" data-dismiss="modal" class="btn btn-success" <?php echo($state); ?>>OK</a>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>

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

    <div id="msg" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 id="title" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="err_msg"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
	<script type="text/javascript">
		$(function() {
			loadforIQC(0);

			$('.datepicker').datepicker({
				dateFormat: 'yy-mm-dd'
			});

			$('#searchbtn').on('click', function() {
				$('#searchmodal').modal('show');
			});

			$('#statusbtn').on('click', function() {
				$('#bulkupdatemodal').modal('show');
			});

			$('#tbl_iqc_body').on('click','.updatesinglebtn', function() {
				var id = $(this).attr('data-id');
				$('#selectedid').val(id);
				$('#statusModal').modal('show');
			});

			$('#gobtn').on('click', function() {
				searchstatus();
			});

			$('#updateIQCstatusbtn').on('click', function() {
				var url = '<?php echo e(url("/postwbsiqcsingleupdate")); ?>';
	            var token = "<?php echo e(Session::token()); ?>";
	            var id = $('#selectedid').val();
	            var statusup = $('#statusup').val();
	            var iqcresup = $('#iqcresup').val();
				var data = {
	                _token: token,
	                id: id,
	                statusup: statusup,
	                iqcresup: iqcresup
	            };
	        	$.ajax({
	                url: url,
	                type: "POST",
	                data: data,
	            }).done( function(data, textStatus, jqXHR) {
	            	loadforIQC($('#statusup').val());
	            	isCheck($('#chk_all'))
	            }).fail( function(data, textStatus, jqXHR) {
	            	$('#loading').modal('hide');
	                $('#msg').modal('show');
	                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
	                $('#err_msg').html("There's some error while processing.");
	            });
			});

			$('.group-checkable').on('change', function(e) {
				$('input:checkbox.chk').not(this).prop('checked', this.checked);
			});

			$('#updateIQCbulkbtn').on('click', function() {
				var ids = getAllChecked();
				var url = '<?php echo e(url("/postwbsiqcupdatebulk")); ?>';
	            var token = "<?php echo e(Session::token()); ?>";
	            var statusup = $('#statusupbulk').val();
	            var iqcresup = $('#iqcresupbulk').val();
				var data = {
	                _token: token,
	                id: ids,
	                statusup: statusup,
	                iqcresup: iqcresup
	            };

	            if (ids.length > 0) {
	            	$.ajax({
		                url: url,
		                type: "POST",
		                data: data,
		            }).done( function(data, textStatus, jqXHR) {
		            	loadforIQC($('#statusupbulk').val());
		            	isCheck($('#chk_all'))
		            }).fail( function(data, textStatus, jqXHR) {
		            	$('#loading').modal('hide');
		                $('#msg').modal('show');
		                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
		                $('#err_msg').html("There's some error while processing.");
		            });
	            } else {
	            	$('#loading').modal('hide');
	                $('#msg').modal('show');
	                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
	                $('#err_msg').html("Please check 2 or more checkboxes");
	            }
			});

		});

		function loadforIQC(status) {
			$('#loading').modal('show');
			var iqctable = '';
			var url = '<?php echo e(url("/getwbsiqc")); ?>';
            var token = "<?php echo e(Session::token()); ?>";
			var data = {
                _token: token,
                status: status
            };
        	$.ajax({
                url: url,
                type: "GET",
                data: data,
            }).done( function(data, textStatus, jqXHR) {
            	$('#tbl_iqc_body').html('<tr id="nodata">'+
                                    		'<td colspan="14" class="text-center">No data displayed</td>'+
                                    	'</tr>');
            	if (data.length > 0) {
            		$('#nodata').remove();
            		$.each(data, function(i,x) {
	            		var status = '';
                        var color = '';
	            		if (x.iqc_status == 0) {
	            			status = 'Pending';
	            		}

	            		if (x.iqc_status == 1) {
	            			status = 'Accepted';
                            color = '#1f897f';
	            		}

	            		if (x.iqc_status == 2) {
	            			status = 'Rejected';
                            color = '#cb5a5e';
	            		}

	            		if (x.iqc_status == 3) {
	            			status = 'On Hold';
                            color = '#EF4836';
	            		}
	            		console.log(x);
	            		iqctable = '<tr>'+
	                                    '<td style="width:2.1%">'+
	                                    	'<input type="checkbox" class="chk" value="'+x.id+'" data-id="'+x.id+'"/>'+
	                                    '</td>'+
	                                    '<td style="width:7.1%">'+x.item+'</td>'+
	                                    '<td style="width:12.1%">'+x.item_desc+'</td>'+
	                                    '<td style="width:7.1%">'+x.supplier+'</td>'+
	                                    '<td style="width:7.1%">'+x.qty+'</td>'+
	                                    '<td style="width:7.1%">'+x.lot_no+'</td>'+
	                                    '<td style="width:7.1%">'+x.drawing_num+'</td>'+
	                                    '<td style="width:7.1%">'+x.wbs_mr_id+'</td>'+
	                                    '<td style="width:7.1%">'+x.invoice_no+'</td>'+
	                                    '<td style="width:7.1%"><strong style="color:'+color+';">'+status+'</strong></td>'+
	                                    '<td style="width:7.1%">'+x.iqc_result+'</td>'+
	                                    '<td style="width:7.1%">'+x.update_user+'</td>'+
	                                    '<td style="width:7.1%">'+x.updated_at+'</td>'+
	                                    '<td style="width:7.1%">'+
	                                    	'<a href="javascript:;" class="updatesinglebtn btn btn-primary btn-sm" data-id="'+x.id+'">'+
	                                    		'<i class="fa fa-edit"></i>'+
	                                    	'</a>'+
	                                    '</td>'+
	                                '</tr>';

	            		$('#tbl_iqc_body').append(iqctable);
	            	});
            	}
            	
            	$('#loading').modal('hide');
            }).fail( function(data, textStatus, jqXHR) {
            	$('#loading').modal('hide');
                $('#msg').modal('show');
                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#err_msg').html("There's some error while processing.");
            });
		}

		function searchstatus() {
			$('#loading').modal('show');
			var iqctable = '';
			var url = '<?php echo e(url("/getwbsiqcsearch")); ?>';
            var token = "<?php echo e(Session::token()); ?>";
			var data = {
                _token: token,
                from  : $('#from').val(),
				to    : $('#to').val(),
				recno : $('#recno').val(),
				status: $('#status').val(),
				itemno: $('#itemno').val(),
				lotno : $('#lotno').val()
            };
        	$.ajax({
                url: url,
                type: "GET",
                data: data,
            }).done( function(data, textStatus, jqXHR) {
            	console.log(data);
            	$('#tbl_iqc_body').html('<tr id="nodata">'+
                                    		'<td colspan="14" class="text-center">No data displayed</td>'+
                                    	'</tr>');
            	if (data.length > 0) {
            		$('#nodata').remove();
            		$.each(data, function(i,x) {
	            		var status = '';
                        var color = '';
	            		if (x.iqc_status == 0) {
	            			status = 'Pending';
                            $statuscolor = '';
	            		}

	            		if (x.iqc_status == 1) {
	            			status = 'Accepted';
                            color = '#1f897f';
	            		}

	            		if (x.iqc_status == 2) {
	            			status = 'Rejected';
                            color = '#c23f44';
	            		}

	            		if (x.iqc_status == 3) {
	            			status = 'On Hold';
                            color = '#EF4836';
	            		}
	            		console.log(x);
	            		iqctable = '<tr>'+
	                                    '<td>'+
	                                    	'<input type="checkbox" class="chk" value="'+x.id+'" data-id="'+x.id+'"/>'+
	                                    '</td>'+
	                                    '<td>'+x.item+'</td>'+
	                                    '<td>'+x.item_desc+'</td>'+
	                                    '<td>'+x.supplier+'</td>'+
	                                    '<td>'+x.qty+'</td>'+
	                                    '<td>'+x.lot_no+'</td>'+
	                                    '<td>'+x.drawing_num+'</td>'+
	                                    '<td>'+x.wbs_mr_id+'</td>'+
	                                    '<td>'+x.invoice_no+'</td>'+
	                                    '<td><strong style="color:'+color+';">'+status+'</strong></td>'+
	                                    '<td>'+x.iqc_result+'</td>'+
	                                    '<td>'+x.update_user+'</td>'+
	                                    '<td>'+x.updated_at+'</td>'+
	                                    '<td>'+
	                                    	'<a href="javascript:;" class="updatesinglebtn btn btn-primary btn-sm" data-id="'+x.id+'">'+
	                                    		'<i class="fa fa-edit"></i>'+
	                                    	'</a>'+
	                                    '</td>'+
	                                '</tr>';

	            		$('#tbl_iqc_body').append(iqctable);
	            	});
            	}
            	
            	$('#loading').modal('hide');
            }).fail( function(data, textStatus, jqXHR) {
            	$('#loading').modal('hide');
                $('#msg').modal('show');
                $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                $('#err_msg').html("There's some error while processing.");
            });
		}

		function getAllChecked() {
			/* declare an checkbox array */
			var chkArray = [];
			
			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			$(".chk:checked").each(function() {
				chkArray.push($(this).val());
			});

			return chkArray;
		}
		function isCheck(element) {
			if(element.is(':checked')) {
				element.parent('tr').removeAttr('checked');
				element.prop('checked',false)
			}
		}
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>