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
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box grey-gallery" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-navicon"></i>  WBS Production Material Return
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                        	<div class="col-md-12">
                                    			<div class="portlet-body">
			                                        <div class="row">
				                                        <form action="" class="form-horizontal">
				                                        	<div class="col-md-4">
				                                        		<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Ctrl #</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm clear" id="ctrlno" name="ctrlno">
				                                        			</div>
				                                        		</div>
				                                        		<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">PO #</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm clear" id="pono" name="pono">
				                                        			</div>
				                                        		</div>
				                                        		<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Code</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm clear" id="code" name="code">
				                                        			</div>
				                                        		</div>
				                                        		<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Qty Returned</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm clear" id="qtyreturned" name="qtyreturned">
				                                        			</div>
				                                        		</div>
				                                        	</div>
			                                        		<div class="col-md-4">
			                                        			<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Parts Name</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm" id="partsname" name="partsname" readonly>
				                                        			</div>
				                                        		</div>
				                                        		<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Lot No</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm" id="lotno" name="lotno">
				                                        			</div>
				                                        		</div>
				                                        		<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Remarks</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm" id="remarks" name="remarks">
				                                        			</div>
				                                        		</div>
			                                        		</div>
			                                        		<div class="col-md-4">
			                                        			<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Date Received</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm" data-date-format="yyyy-mm-dd" id="datereceived" name="datereceived">
				                                        			</div>
				                                        		</div>
				                                        		<div class="form-group">
				                                        			<label for="" class="control-label col-sm-3">Received By</label>
				                                        			<div class="col-sm-9">
				                                        				<input type="text" class="form-control input-sm" id="receivedby" name="receivedby" value="<?php echo e(Auth::user()->user_id); ?>" readonly>
				                                        			</div>
				                                        		</div>
				                
			                                        		</div>
				                                        </form>
			                                        </div>
			                                        <div class="row">
			                                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                                        		<div class="table-responsive">
			                                        			<table class="table table-bordered table-hover table-striped " id="tbl_details" style="font-size: 10px;margin-top: 20px;">
				                                        			<thead>
				                                        				<tr>
				                                        					<td></td>
				                                        					<td>Ctrl #</td>
				                                        					<td>PO #</td>
				                                        					<td>Code</td>
				                                        					<td>Qty Returned</td>
				                                        					<td>Parts Name</td>
				                                        					<td>Lot #</td>
				                                        					<td>Remarks</td>
				                                        					<td>Date Received</td>
				                                        					<td>Received By</td>
				                                        					<td></td>
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
                                        	</div>                                        	
                                        </div>

                                        <div class="row">
                                        	<div class="col-md-12 text-center">
												<a href="javascript:;" class="btn btn-sm green btn_save">
													<i class="fa fa-plus"></i> Save
												</a>
												<a href="javascript:;" class="btn btn-sm grey-gallery btn_clear">
													<i class="fa fa-eraser"></i> Clear
												</a>
												<a href="javascript:;" class="btn btn-sm purple btn_search">
													<i class="fa fa-search"></i> Search
												</a>
												<a href="javascript:;" class="btn btn-sm green-jungle" id="btnreturn_search">
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
                                <label class="control-label col-sm-3">Ctrl #</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="editctrlno">
                                    <input type="hidden" class="form-control input-sm" id="id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">P.O #</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="editpono">
                                </div>
                            </div>
                            <div class="form-group">
                    			<label for="" class="control-label col-sm-3">Code</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editcode" name="editcode" disabled="true">
                    			</div>
                    		</div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Qty Returned</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="editqtyreturned">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Parts Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm mask_reqqty" id="editpartsname" name="editpartsname" disabled="true">
                                </div>
                            </div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Lot no</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editlotno" name="editlotno" value="<?php echo e(Auth::user()->user_id); ?>">
                    			</div>
                    		</div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Remarks</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editremarks" name="editremarks">
                    			</div>
                    		</div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Date Received</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editdatereceived" name="editdatereceived" value="<?php echo e(date('Y-m-d')); ?>" data-date-format="yyyy-mm-dd">
                    			</div>
                    		</div>
                    		<div class="form-group">
                    			<label for="" class="control-label col-sm-3">Received By</label>
                    			<div class="col-sm-9">
                    				<input type="text" class="form-control input-sm" id="editreceivedby" name="editreceivedby">
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

<div id="searchModal" class="modal fade" role="dialog" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<form class="form-horizontal">
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
            		<div class="form-group">
            			<label for="" class="control-label col-sm-3">Item No.</label>
            			<div class="col-sm-8">
            				<input type="text" class="form-control input-sm reset" id="itemno" name="itemno">
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="" class="control-label col-sm-3">Lot No</label>
            			<div class="col-sm-6">
            				<input type="text" class="form-control input-sm reset" id="lotno" name="lotno">
            			</div>
            		</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn purple btn_search_records">Search</button>
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
			loadProdMatReturn();
			$('#datereceived').datepicker();
			$('#datereceived').change(function(){
				$(this).datepicker('hide');
			});
			$('#editdatereceived').datepicker();
			$('#editdatereceived').change(function(){
				$(this).datepicker('hide');
			});
			$('#tblforprodmatreturn').on('click', '.btn_editdetails',function() {
				$('#EditDetailsModal').modal('show');
				var editText = $(this).val().split('|');
				var id = editText[0];
				var ctrlno = editText[1];
				var pono = editText[2];
				var code = editText[3];
				var qtyreturned = editText[4];
				var partsname = editText[5];
				var lotno = editText[6];
				var remarks = editText[7];
				var datereceived = editText[8];
				var receivedby = editText[9];
				//retrieving records to each fields--
				$('#id').val(id);
				$('#editctrlno').val(ctrlno);
				$('#editpono').val(pono);
				$('#editcode').val(code);
				$('#editqtyreturned').val(qtyreturned);
				$('#editpartsname').val(partsname);
				$('#editlotno').val(lotno);
				$('#editremarks').val(remarks);
				$('#editdatereceived').val(datereceived);
				$('#editreceivedby').val(receivedby);
			});

			$('#btnreturn_search').on('click',function() {
				$('#ExcelModal').modal('show');
			});

			$('.btn_clear').on('click',function(){
				$('#tblforprodmatreturn').html("");
				$('.reset').val("");
			});
			
			$('.btn_search').on('click',function(){
				$('#searchModal').modal('show');
			});

			$('.btn_search_records').on('click',function(){
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

			$('.btn_save').on('click',function(){
				var ctrlno = $('#ctrlno').val();
				var pono = $('#pono').val();
				var code = $('#code').val();
				var qtyreturned = $('#qtyreturned').val();
				var partsname = $('#partsname').val();
				var lotno = $('#lotno').val();
				var remarks = $('#remarks').val();
				var datereceived = $('#datereceived').val();
				var receivedby = $('#receivedby').val();

				var formUrl = "<?php echo e(url('/wbsprodmatretsave')); ?>";
				var token = '<?php echo e(Session::token()); ?>';
				var formData = {
					_token:token,
					ctrlno:ctrlno,
					pono:pono,
					code:code,
					qtyreturned:qtyreturned,
					partsname:partsname,
					lotno:lotno,
					remarks:remarks,
					datereceived:datereceived,
					receivedby:receivedby
				}

				if (ctrlno == '' || pono == '' || code == '' || qtyreturned == '' || partsname == '' || lotno == '' || datereceived == '') {
					$('#messageBox').modal('show');
					$('.modal-title').html("Warning Message!");
					$('#modal-message').html("Please fill out all inputs.");
				} else {

					$.ajax({
						url:formUrl,
						method:'POST',
						data:formData,
					}).done(function(data, textstatus, jqXHR){
						console.log(data);
						loadProdMatReturn();	
					}).fail(function(jqXHR, textstatus, errorThrown){
						console.log(textstatus+'|'+errorThrown);
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

			var ctrlno = $('#editctrlno').val();
			var pono = $('#editpono').val();
			var code = $('#editcode').val();
			var qtyreturned = $('#editqtyreturned').val();
			var partsname = $('#editpartsname').val();
			var lotno = $('#editlotno').val();
			var remarks = $('#editremarks').val();
			var datereceived = $('#editdatereceived').val();
			var receivedby = $('#editreceivedby').val();


			var formUrl = "<?php echo e(url('/wbsSaveReturn')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token:token,
				ctrlno:ctrlno,
				pono:pono,
				code:code,
				qtyreturned:qtyreturned,
				partsname:partsname,
				lotno:lotno,
				remarks:remarks,
				datereceived:datereceived,
				receivedby:receivedby,
				id:id,

			};

			if (ctrlno == '' || pono == '' || code == '' || qtyreturned == '' || partsname == '' || lotno == '' || datereceived == '') {
				$('#messageBox').modal('show');
				$('.modal-title').html("Warning Message!");
				$('#modal-message').html("Please fill out all inputs.");
			} else {
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
						loadProdMatReturn();
					}else{
						$('#messageBox').modal('show');
						$('.modal-title').html("Warning Message!");
						$('#modal-message').html("Record Not Saved!");
						loadProdMatReturn();
					}
				}).fail(function(jqXHR, textstatus, errorThrown){
					console.log(textstatus+'|'+errorThrown);
				});
			}

			
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
				$('#tblforprodmatreturn').html('');
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
										'<button type="button" class="btn input-sm btn-circle green btn_editdetails" value="'+x.id+'|'+x.ctrlno+'|'+x.pono+'|'+x.code+'|'+x.qtyreturned+'|'+x.partsname+'|'+x.lotno+'|'+x.remarks+'|'+x.datereceived+'|'+x.receivedby+'">'+
                							'<i class="fa fa-edit"></i>'+
                						'</button>'+
									'</td>'+
									'<td>'+x.ctrlno+'<input type="hidden" id="hd_itemcode" value="'+x.ctrlno+'" name="hd_itemcode[]"></td>'+
									'<td>'+x.pono+'<input type="hidden" id="hd_itemdesc" value="'+x.pono+'" name="hd_itemdesc[]"></td>'+
									'<td>'+x.code+'<input type="hidden" id="hd_lotno" value="'+x.code+'" name="hd_lotno[]"></td>'+
									'<td>'+x.qtyreturned+'<input type="hidden" id="hd_issuedqty" value="'+x.qtyreturned+'" name="hd_issuedqty[]"></td>'+
									'<td>'+x.partsname+'<input type="hidden" id="hd_returnedqty" value="'+x.partsname+'" name="hd_returnedqty[]"></td>'+
									'<td>'+x.lotno+'<input type="hidden" id="hd_receivedby" value="'+x.lotno+'" name="hd_receivedby[]"></td>'+
									'<td>'+x.remarks+'<input type="hidden" id="hd_returnedby" value="'+x.remarks+'" name="hd_returnedby[]"></td>'+
									'<td>'+x.datereceived+'<input type="hidden" id="hd_returneddate" value="'+x.datereceived+'" name="hd_returneddate[]"></td>'+
									'<td>'+x.receivedby+'<input type="hidden" id="hd_return_status" value="'+x.receivedby+'" name="hd_return_status[]"></td>'+
									'<td>'+
										'<a href="javascript:;" class="btn btn-sm grey-gallery brcodebtn" data-id="'+x.id+'"><i class="fa fa-barcode"></i></a>'+
									'</td>'+
								'</tr>';

				$('#tblforprodmatreturn').append(tblrow);
			});
		}

		$('#code').on('change', function() {
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				item: $(this).val()
			}

			$.ajax({
				url: '/wbsreturn-getname',
				type: 'get',
				dataType: 'JSON',
				data: data
			}).done( function(data, txtStatus) {
				$('#partsname').val(data);
			}).fail( function(data, txtStatus) {
				$('#messageBox').modal('show');
				$('.modal-title').html("Warning Message!");
				$('#modal-message').html("Item code not recognized.");
			});
		});

		$('#tblforprodmatreturn').on('click', '.brcodebtn',function() {
	    	var id = $(this).attr('data-id');

	    	if (isOnMobile() == true) {
	    		printBRcode(id);
	    	} else {
	    		printBRcode(id);
	    		$('#messageBox').modal('show');
				$('.modal-title').html("Warning Message!");
				$('#modal-message').html("Please use mobile device.");
	    	}
	    });

	    function printBRcode(id) {
			window.location.href="/wbsreturn-brprint?id="+id;
		}

		function isOnMobile() {
			var isMobile = false; //initiate as false
			// device detection
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

			return isMobile;
		}
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>