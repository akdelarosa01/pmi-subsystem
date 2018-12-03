<?php $__env->startSection('title'); ?>
	WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_WBS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
												Production Material Return <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li>
													<a href="<?php echo e(url('/materialreceiving')); ?>">
														<i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
													</a>
												</li>
												<li>
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
													<a href="<?php echo e(url('/wbsphysicalinventory')); ?>">
		 											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsprodmatrequest')); ?>">
		 											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
		 										   </a>
												</li>
												<li class="active">
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
											<a href="<?php echo e(url('/iqc')); ?>" class="list-group-item">
											   <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
										   </a>
										   <a href="<?php echo e(url('/wbsmaterialkitting')); ?>" class="list-group-item">
											   <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
										   </a>
										   <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
										   </a>
										   <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-save-file fa-2x"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatreturn')); ?>" class="list-group-item active">
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
                                        		<div class="portlet box red">
	                                        		<div class="portlet-title">
														<div class="caption">Issuance Details</div>
													</div>
                                        			<div class="portlet-body">
                                        				<div class="row">
					                                        <form action="" class="form-horizontal">
					                                        	<div class="col-md-4">
					                                        		<div class="form-group">
					                                        			<label for="mkl_from" class="col-md-3 control-label">Issuance Date</label>
										                                <div class="col-md-7">
										                                    <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
										                                        <input type="text" class="form-control input-sm reset" name="issuance_from" id="issuance_from"/>
										                                        <span class="input-group-addon">to </span>
										                                        <input type="text" class="form-control input-sm reset" name="issuance_to" id="issuance_to"/>
										                                    </div>
										                                </div>
					                                        		</div>
					                                        	</div>
					                                        	<div class="col-md-4">
					                                        		<div class="form-group">
					                                        			<label for="" class="control-label col-sm-3">Item No.</label>
					                                        			<div class="col-sm-9">
					                                        				<input type="text" class="form-control input-sm reset" id="itemno" name="itemno">
					                                        			</div>
					                                        		</div>
					                                        	</div>
					                                        	<div class="col-md-4">
					                                        		<div class="form-group">
					                                        			<label for="" class="control-label col-sm-3">Lot No</label>
					                                        			<div class="col-sm-6">
					                                        				<input type="text" class="form-control input-sm reset" id="lotno" name="lotno">
					                                        			</div>
					                                        			<div class="col-sm-3">
					                                        				<button type="button" class="btn purple" id="btn_search">
														                        <i class="fa fa-search"></i> Search
														                    </button>
					                                        			</div>	
					                                        		</div>
					                                        	</div>
					                                        </form>
				                                        </div>
                                        				<table class="table table-bordered table-hover table-striped table-responsive" id="tbl_details" style="font-size: 10px;margin-top: 20px;">
		                                        			<thead>
		                                        				<tr>
		                                        					<td></td>
		                                        					<td>Item/Part Code</td>
		                                        					<td>Item Description</td>
		                                        					<td>Lot No</td>
		                                        					<td>Issued Qty</td>
		                                        					<td>Return Qty</td>
		                                        					<td>Received By</td>
		                                        					<td>Returned By</td>
		                                        					<td>Returned Date</td>
		                                        					<td>Return Status</td>
		                                        					<td>Remarks</td>
		                                        				</tr>
		                                        			</thead>
		                                        			<tbody id="tblforprodmatreturn">
		                                        				<!-- content here! -->
		                                        			</tbody>
		                                        		</table>
                                        			</div>
                                        		</div>
                                        	</div>                                        	
                                        </div>

                                        <div class="row">
                                        	<div class="col-md-12 text-center">
												<a href="javascript:;" class="btn btn-sm grey-gallery btn_clear">
													<i class="fa fa-eraser"></i> Clear
												</a>
												<a href="javascript:;" class="btn btn-sm green" id="btnreturn_search">
													<i class="fa fa-file-excel-o"></i> Export To Excel
												</a>
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


<div id="EditDetailsModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog gray-gallery">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Edit Details</h4>
            </div>
            <form method="POST" action="<?php echo e(url('/editdetailpmr')); ?>" class="form-horizontal" id="editpodetailfrm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Item/Part No.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="edititemcode" disabled="true">
                                    <input type="text" class="form-control input-sm" id="id" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Item Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="edititemdesc" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                    			<label for="" class="control-label col-sm-3">Lot No</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editlotno" name="editlotno" disabled="true">
                    			</div>
                    		</div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Issued Qty.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="editissuedqty" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Returned Qty.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm mask_reqqty" id="editreturnedqty" name="editreturnedqty" required>
                                </div>
                            </div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Received By</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editreceivedby" name="editreceivedby" disabled="true" value="<?php echo e(Auth::user()->user_id); ?>">
                    			</div>
                    		</div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Returned By</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editreturnedby" name="editreturnedby" required>
                    			</div>
                    		</div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Returned Date</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editreturneddate" name="editreturneddate" value="<?php echo e(date('Y-m-d')); ?>">
                    			</div>
                    		</div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Return Status</label>
                    			<div class="col-sm-9">
                    				<select class="form-control" name="return_status" id="return_status">
                    					<option value=""></option>
                    					<option value="Good">Good</option>
                    					<option value="NG">Not Good</option>
                    				</select>
                    			</div>
                    		</div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Remarks</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="editremarks" name="editremarks">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="saveedit" onclick="javascript:save();" class="btn btn-success">Save</button>
                    <a href="" data-dismiss="modal" class="btn btn-danger">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="ExcelModal" class="modal fade" role="dialog" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
            			<label for="mkl_from" class="col-md-3 control-label">Return Date</label>
                        <div class="col-md-7">
                            <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control input-sm reset" name="return_from" id="return_from"/>
                                <span class="input-group-addon">to </span>
                                <input type="text" class="form-control input-sm reset" name="return_to" id="return_to"/>
                            </div>
                        </div>
            		</div>
            		<div class="form-group">
            			<label for="" class="control-label col-sm-3">Item No.</label>
            			<div class="col-sm-8">
            				<input type="text" class="form-control input-sm" id="return_itemno" name="return_itemno">
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="" class="control-label col-sm-3">Lot No</label>
            			<div class="col-sm-8">
            				<input type="text" class="form-control input-sm" id="return_lotno" name="return_lotno">
            			</div>
            		</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm green" id="btnexport_excel">Export</button>
				<button data-dismiss="modal" class="btn btn-danger">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- MESSAGE MODAL -->
<div id="messageBox" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm gray-gallery">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-10" id="modal-message"></label>
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
	<script type="text/javascript">
		$(function() {
			$('#tblforprodmatreturn').on('click', '.btn_editdetails',function() {
				$('#EditDetailsModal').modal('show');
				var editText = $(this).val().split('|');
				var id = editText[0];
				var item = editText[1];
				var item_desc = editText[2];
				var lot_no = editText[3];
				var issued_qty_t = editText[4];
				var status = editText[5];
				var return_qty = editText[6];
				var returnedby = editText[7];
				var return_remarks = editText[8];
				//retrieving records to each fields--
				$('#id').val(id);
				$('#edititemcode').val(item);
				$('#edititemdesc').val(item_desc);
				$('#editlotno').val(lot_no);
				$('#editissuedqty').val(issued_qty_t);
				$('#return_status').val(status);
				$('#editreturnedqty').val(return_qty);
				$('#editreturnedby').val(returnedby);
				$('#editremarks').val(return_remarks);
			});

			$('#btnreturn_search').on('click',function() {
				$('#ExcelModal').modal('show');
			});

			$('.btn_clear').on('click',function(){
				$('#tblforprodmatreturn').html("");
				$('.reset').val("");
			});
				
			$('#btn_search').on('click',function(){
				var issuance_from = $('#issuance_from').val();
				var issuance_to = $('#issuance_to').val();
				var itemno = $('#itemno').val();
				var lotno = $('#lotno').val();
				var token = '<?php echo e(Session::token()); ?>';
				var formUrl = "<?php echo e(url('/searchrows')); ?>";
				var formData = {
					_token:token,
					issuance_from:issuance_from,
					issuance_to:issuance_to,
					itemno:itemno,
					lotno:lotno
				};
				if(issuance_from == "" || issuance_to == "" || itemno == ""){
					$('#messageBox').modal('show');
					$('.modal-title').html("Warning Message!");
					$('#modal-message').html("Issuance Date form ,Date to and Item No. is required for searching!");	
				}else{
					$('#tblforprodmatreturn').html("");
					$.ajax({
						url:formUrl,
						method:'GET',
						data:formData,
					}).done(function(data, textstatus, jqXHR){
						console.log(data);
						getDataTable(data);
					}).fail(function(jqXHR, textstatus, errorThrown){
						console.log(errorThrown+'|'+textstatus);
					});	
				}	
			});

			$('#btnexport_excel').on('click',function(){
				var datefrom = $('#return_from').val();
				var dateto = $('#return_to').val();
				var itemno = $('#return_itemno').val();
				var lotno = $('#return_lotno').val();
				var url = "<?php echo e(url('/returnExportToExcel?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&itemno=" + itemno+ "&lotno=" + lotno;
				window.location.href = url;

			});

		});//end of document function-------------------------------------------------
		function save(){
			var id = $('#id').val();
			var issuance_from = $('#issuance_from').val();
			var issuance_to = $('#issuance_to').val();
			var itemno = $('#itemno').val();
			var lotno = $('#lotno').val();

			var returnedqty = $('#editreturnedqty').val();
			var receivedby = $('#editreceivedby').val();
			var returnedby = $('#editreturnedby').val();
			var returneddate = $('#editreturneddate').val();
			var return_status = $('#return_status').val();
			var remarks = $('#editremarks').val();


			var formUrl = "<?php echo e(url('/wbsSaveReturn')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token:token,
				returnedqty:returnedqty,
				receivedby:receivedby,
				returnedby:returnedby,
				returneddate:returneddate,
				return_status:return_status,
				remarks:remarks,
				id:id,
				issuance_from:issuance_from,
				issuance_to:issuance_to,
				itemno:itemno,
				lotno:lotno
			};

			$('#tblforprodmatreturn').html("");
			$.ajax({
				url:formUrl,
				method:'POST',
				data:formData,
			}).done(function(data, textstatus, jqXHR){
				console.log(data);
				$('#EditDetailsModal').modal('hide');
				if(data == "UPDATED"){
					$('#messageBox').modal('show');
					$('.modal-title').html("Success Message!");
					$('#modal-message').html("Record Successfully Updated!");
				}else{
					$('#messageBox').modal('show');
					$('.modal-title').html("Warning Message!");
					$('#modal-message').html("Record Not Saved!");
				}
			}).fail(function(jqXHR, textstatus, errorThrown){
				console.log(textstatus+'|'+errorThrown);
			});
		}

		function loadProdMatReturn(){
			var formUrl = "<?php echo e(url('/wbsgetrows')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token:token,
			};
			$.ajax({
				url:formUrl,
				method:'GET',
				data:formData,
			}).done(function(data, textstatus, jqXHR){
				getDataTable(data);
			}).fail(function(jqXHR, textstatus, errorThrown){
				console.log(textstatus+'|'+errorThrown);
			});
		}

		function getDataTable(data){
			var cnt = 0
			$.each(data,function(i,x){
				cnt++;
				var tblrow 	=	'<tr>'+
									'<td>'+
										'<button type="button" class="btn input-sm btn-circle green btn_editdetails" value="'+x.id+'|'+x.item+'|'+x.item_desc+'|'+x.lot_no+'|'+x.issued_qty_t+'|'+x.return_status+'|'+x.return_qty+'|'+x.returnedby+'|'+x.return_remarks+'">'+
                							'<i class="fa fa-edit"></i>'+
                						'</button>'+
									'</td>'+
									'<td>'+x.item+'<input type="hidden" id="hd_itemcode" value="'+x.item+'" name="hd_itemcode[]"></td>'+
									'<td>'+x.item_desc+'<input type="hidden" id="hd_itemdesc" value="'+x.item_desc+'" name="hd_itemdesc[]"></td>'+
									'<td>'+x.lot_no+'<input type="hidden" id="hd_lotno" value="'+x.lot_no+'" name="hd_lotno[]"></td>'+
									'<td>'+x.issued_qty_t+'<input type="hidden" id="hd_issuedqty" value="'+x.issued_qty_t+'" name="hd_issuedqty[]"></td>'+
									'<td>'+x.returndate+'<input type="hidden" id="hd_returnedqty" value="'+x.returndate+'" name="hd_returnedqty[]"></td>'+
									'<td>'+x.receivedby+'<input type="hidden" id="hd_receivedby" value="'+x.receivedby+'" name="hd_receivedby[]"></td>'+
									'<td>'+x.returnedby+'<input type="hidden" id="hd_returnedby" value="'+x.returnedby+'" name="hd_returnedby[]"></td>'+
									'<td>'+x.returndate+'<input type="hidden" id="hd_returneddate" value="'+x.returndate+'" name="hd_returneddate[]"></td>'+
									'<td>'+x.return_status+'<input type="hidden" id="hd_return_status" value="'+x.return_status+'" name="hd_return_status[]"></td>'+
									'<td>'+x.return_remarks+'<input type="hidden" id="hd_remarks" value="'+x.return_remarks+'" name="hd_remarks[]"></td>'+
								'</tr>';

				$('#tblforprodmatreturn').append(tblrow);
			});
		}
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>