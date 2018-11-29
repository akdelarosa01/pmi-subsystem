<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: suppliermaster.blade.php
     MODULE NAME:  [2002] Supplier Master
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.04.13
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.04.13     MESPINOSA       Initial Draft
*******************************************************************************/
?>



<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">

	function action(action)
	{
        var obj_data = new Object;
        var cnt = 0;
        var selecteditem = '';

        $(".checkboxes").each(function()
        {
        	var id = $(this).attr('name');
        	if($(this).is(':checked'))
        	{
        		cnt++;
        		obj_data[id] = $(this).val();
        		selecteditem = obj_data[id];
        	}
       	});

        if (cnt == 0)
        {
    		$.alert('No selected supplier.', 
    		{
				position: ['center', [-0.42, 0]],
				type: 'danger',
				closeTime: 3000,
				autoClose: true
			});
        }
        else if (cnt == 1)
        {
        	if (action == "EDIT")
        	{
    			$.post("<?php echo e(url('/edit-supplier')); ?>", 
    			{
	               	_token: $('meta[name=csrf-token]').attr('content'),
	               	selected_supplier: selecteditem
               	})
    			.done(function(data) 
    			{
	    			$.each( data[0], function( key, value ) 
	    			{
    					switch(key) 
    					{
 						   	case "id":
    							$('#edit_inputId').val(value);
 						   	case "code":
    							$('#edit_inputCode').val(value);
    						case "name":
        						$('#edit_inputName').val(value);
	       					case "address":
    	   						$('#edit_inputAddress').val(value);
        					case "tel_no":
        						$('#edit_inputTelNo').val(value);
        					case "fax_no":
        						$('#edit_inputFaxNo').val(value);
        					case "email":
        						$('#edit_inputEmailAddress').val(value);
						}
    				});
    				$("#editModal").modal("show");
    			})
    			.fail(function() 
    			{
		    		$.alert('Selected supplier was not updated. Please check the values and try again.', 
		    		{
						position: ['center', [-0.42, 0]],
						type: 'danger',
						closeTime: 3000,
						autoClose: true
					});
    			});
        	}
        	else if (action == "DELETE")
        	{
    			$("#deleteModal").modal("show");
				$('#delete_inputId').val(selecteditem);
        	}
    	}
    	else
    	{
    		$.alert('Please select 1 supplier.', 
    		{
				position: ['center', [-0.42, 0]],
				type: 'danger',
				closeTime: 3000,
				autoClose: true
			});
    	}
	};

</script>

<?php $__env->startSection('title'); ?>
	Supplier Master | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $state = ""; $readonly = ""; ?>
		<?php foreach($userProgramAccess as $access): ?>
			<?php if($access->program_code == Config::get('constants.MODULE_CODE_SUPPLIER')): ?>
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
					<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet box blue">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-log-in"></i> SUPPLIER MASTER
									</div>
								</div>
								<div class="portlet-body">

									<div class="row">
										<div class="col-md-8">
											<h3 class="pull-left">SEARCH</h3>
										</div>
									</div>

									<br/>
										<div class="row">
											
											<div class="col-md-12">
												<table class="table table-striped table-bordered table-hover" id="sample_3">

													<thead>
														<tr>
															<th class="table-checkbox">
																<input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" <?php echo($state); ?> />
															</th>
															<th>
																CODE
															</th>
															<th>
																NAME
															</th>
															<th>
																ADDRESS
															</th>
														</tr>
													</thead>

													<tbody>
														<?php foreach($suppliers as $supplier): ?>
															<tr class="odd gradeX" data-id="<?php echo e($supplier->id); ?>">
																<td>
																	<input type="checkbox" class="checkboxes" name="check_id[]" value="<?php echo e($supplier->id); ?>" />
																	<?php echo csrf_field(); ?>

																</td>
																<td>
																	<?php echo e($supplier->code); ?>

																</td>
																<td>
																	<?php echo e($supplier->name); ?>

																</td>
																<td>
																	<?php echo e($supplier->address); ?>

																</td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											
										</div>

										<br/>

										<div class="row">
											<div class="col-md-6"></div>
											<div class="col-md-6">
												<div class="btn-group pull-right">
													<button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success btn-lg" <?php echo($state); ?> >
													<i class="fa fa-plus-square-o"></i> ADD</button>
													<button type="button" onclick="javascript:action('EDIT');" class="btn btn-primary btn-lg">
													<i class="fa fa-edit"></i> EDIT</button>
													<button type="button" onclick="javascript:action('DELETE');" class="btn btn-danger btn-lg" <?php echo($state); ?> >
													<i class="fa fa-trash-o"></i> DELETE</button> 
													<!--data-toggle="modal" data-target="#deleteModal"-->
												</div>
											</div>
										</div>

									

								</div>
							</div>
							<!-- END EXAMPLE TABLE PORTLET-->

							<!-- Add Modal -->
							<div id="addModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">

									<!-- Modal content-->
									<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register-supplier')); ?>">
										<div class="modal-content blue">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">ADD\EDIT SUPPLIER</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													
														<?php echo csrf_field(); ?>

														<div class="col-md-6">
															<div class="form-group">
																<label for="inputcode" class="col-md-4 control-label">*Code</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputCode" placeholder="Code" name="code" autofocus>
																</div>
															</div>
															<div class="form-group">
																<label for="inputname" class="col-md-4 control-label">*Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
																</div>
															</div>
															<div class="form-group">
																<label for="inputaddress" class="col-md-4 control-label">Address</label>
																<div class="col-md-8">
																	<textarea rows="5" cols="40" class="form-control" id="inputAddress" placeholder="Address" name="address" style="resize: none;" ></textarea>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="inputtelno" class="col-md-4 control-label">Tel No</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputTelNo" placeholder="Tel No" name="telno">
																	<span class="help-block">(999) 999-9999 </span>
																</div>
															</div>
															<div class="form-group">
																<label for="inputfaxno" class="col-md-4 control-label">Fax No</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="inputFaxNo" placeholder="Fax No" name="faxno">
																	<span class="help-block">(999) 999-9999 </span>
																</div>
															</div>
															<div class="form-group">
																<label for="inputemailaddress" class="col-md-4 control-label">Email Address</label>
																<div class="col-md-8">
																	<input type="email" class="form-control" id="inputEmailAddress" placeholder="Email Address" name="emailaddress">
																</div>
															</div>
														</div>
													
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success" id="btnAdd"><i class="fa fa-save"></i> Save</button>
												<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
											</div>
										</div>
									</form>
								</div>
							</div>

							<!-- Edit Modal -->
							<div id="editModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">

									<!-- Modal content-->
									<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/update-supplier')); ?>">
										<div class="modal-content blue">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">ADD\EDIT SUPPLIER</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													
														<?php echo csrf_field(); ?>

														<div class="col-md-6">
															<div class="form-group">
																<label for="inputcode" class="col-md-4 control-label">*Code</label>
																<div class="col-md-8">
																	<input type="text" id="edit_inputId" placeholder="Id" name="id" hidden="true">
																	<input type="text" class="form-control" id="edit_inputCode" placeholder="Code" name="code" autofocus <?php echo($readonly); ?> >
																</div>
															</div>
															<div class="form-group">
																<label for="inputname" class="col-md-4 control-label">*Name</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="edit_inputName" placeholder="Name" name="name" <?php echo($readonly); ?> >
																</div>
															</div>
															<div class="form-group">
																<label for="inputaddress" class="col-md-4 control-label">Address</label>
																<div class="col-md-8">
																	<textarea rows="5" cols="40" class="form-control" id="edit_inputAddress" placeholder="Address" name="address" style="resize: none;"> <?php echo($readonly); ?> ></textarea>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="inputtelno" class="col-md-4 control-label">Tel No</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="edit_inputTelNo" placeholder="Tel No" name="telno" <?php echo($readonly); ?> >
																	<span class="help-block">(999) 999-9999 </span>
																</div>
															</div>
															<div class="form-group">
																<label for="inputfaxno" class="col-md-4 control-label">Fax No</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" id="edit_inputFaxNo" placeholder="Fax No" name="faxno" <?php echo($readonly); ?> >
																	<span class="help-block">(999) 999-9999 </span>
																</div>
															</div>
															<div class="form-group">
																<label for="inputemailaddress" class="col-md-4 control-label">Email Address</label>
																<div class="col-md-8">
																	<input type="email" class="form-control" id="edit_inputEmailAddress" placeholder="Email Address" name="emailaddress" <?php echo($readonly); ?> >
																</div>
															</div>
														</div>
													
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success" id="btnUpdate" <?php echo($state); ?> ><i class="fa fa-save"></i> Save</button>
												<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div id="deleteModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm blue">
									<form role="form" method="POST" action="<?php echo e(url('/delete-supplier')); ?>">
										<div class="modal-content ">
											<div class="modal-body">
												<p>Are you sure you want to delete the selected supplier?</p>
												<?php echo csrf_field(); ?>

												<input type="hidden" name="id" id="delete_inputId"/>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary" id="delete">Delete</button>
												<button type="button" data-dismiss="modal" class="btn">Cancel</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div id="incorrectSelection" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm blue">
									<div class="modal-content ">
										<div class="modal-body">
											<p></p>
											<?php echo csrf_field(); ?>

										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn">OK</button>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->

	</div>
	<!-- END CONTAINER -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>