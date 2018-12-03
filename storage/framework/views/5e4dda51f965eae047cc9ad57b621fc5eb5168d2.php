<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

	$( document ).ready(function(e) {

		$('.deleteAll-task').addClass("disabled");
		$('#add').removeClass("disabled");

		$('.checkAllitems').change(function(){
			if($('.checkAllitems').is(':checked')){
				$('.deleteAll-task').removeClass("disabled");
				$('#add').addClass("disabled");
				$('input[name=checkitem]').parents('span').addClass("checked");
				$('input[name=checkitem]').prop('checked',this.checked);
			}else{
				$('input[name=checkitem]').parents('span').removeClass("checked");
				$('input[name=checkitem]').prop('checked',this.checked);
				$('.deleteAll-task').addClass("disabled");
				$('#add').removeClass("disabled");
			}		
		});

		$('.checkboxes').change(function(){
			$('input[name=checkAllitem]').parents('span').removeClass("checked");
			$('input[name=checkAllitem]').prop('checked',false);
			if($('.checkboxes').is(':checked')){
				$('.deleteAll-task').removeClass("disabled");
				$('#add').addClass("disabled");
			}else{
				$('.deleteAll-task').addClass("disabled");
				$('#add').removeClass("disabled");
			}

		});

		$('#master').change(function()
		{
			var master = $(this).find(':selected').val();
			$('#catid').val(master);
			window.location.href = "<?php echo e(url('/dropdown?option=')); ?>" + master;
		});

		$('#add').on('click', function(e) 
		{
			var master = $('#master').val();
			var mastertext = $('#master :selected').text();

			e.preventDefault();

			$('#masterid').val(master);
			$('#hdnaction').val('ADD');
			$('#inputname').val("");

			$('.modal-title').html('');
			$('#myModal').modal('show');
			$('.modal-title').append(mastertext);

			$('#er1').html("");
			
			$('#inputname').keyup(function(){
				$('#er1').html(""); 
			});
		});

		$('#deleteAll').click(function(){	
			var master =$('#master').val();
			deleteAllmaster = $('#deleteAllmaster').val(master);

			$('.deleteAllmodal-title').html('Delete' + " " + deleteAllmaster);
			$('#deleteAllModal').modal('show');
			$('.deleteAllmodal-title').append(master);

		});

		$('#modaldelete').on('click', function() {
			deleteAllcheckeditems();
		});

		$('.edit-task').on('click', function(e) 
		{
			var master = $('#master').val();
			var master_selected = $('#master :selected').text();
			var edittext = $(this).val().split('|');
			var editid = edittext[0];
			var editdesc = edittext[1];

			$('#itemid').val(editid);
			$('#masterid').val(master);
			$('#inputname').val(editdesc);
			$('#hdnaction').val('EDIT');

			$('.modal-title').html('');
			$('.modal-title').append(master_selected);			
			$('#myModal').modal('show');

			$('#er1').html("");
			$('#inputname').keyup(function(){
				$('#er1').html(""); 
			});
		});

		$('.add_category').on('click', function(e) 
		{
			e.preventDefault();

			$('#inputcatname').val("");
			$("#inputcatname").focus();

			$('.modal-title').html('');
			$('#myModalCategory').modal('show');
			$('.modal-title').append('Add New Category');

			$('#er1').html("");
			
			$('#inputname').keyup(function(){
				$('#er1').html(""); 
			});
		});

		$('.edit_category').on('click', function(e) 
		{
			var master = $('#master').val();
			var master_selected = $('#master :selected').text();
			e.preventDefault();

			$('#catmasterid').val(master);
			$('#inputcatname').val(master_selected);
			$("#inputcatname").focus();
			$('#hdncataction').val('EDIT');

			$('.modal-title').html('');
			$('#myModalCategory').modal('show');
			$('.modal-title').append('Edit Category');

			$('#er1').html("");
			
			$('#inputname').keyup(function(){
				$('#er1').html(""); 
			});
		});

	});

	function deleteAllcheckeditems(){
		var master =$('#master :selected').val();
		var tray = [];
		$(".checkboxes:checked").each(function () {
			tray.push($(this).val());
		});
		var traycount =tray.length;

		$.post("<?php echo e(url('/dropdown-delete')); ?>", 
		{
			_token: $('meta[name=csrf-token]').attr('content'),
			tray : tray, 
			traycount : traycount, 
			master : master
		})
		.done(function(data) 
		{
    				// alert(data);
    				$.alert('Selected item/s not deleted succesfully.', {
    					position: ['center', [-0.42, 0]],
    					type: 'info',
    					closeTime: 3000,
    					autoClose: true
    				});
    				window.location.href = "<?php echo e(url('/dropdown?option=')); ?>" + master; 
    			})
		.fail(function() 
		{
			$.alert('Selected item was not deleted. Please try again.', {
				position: ['center', [-0.42, 0]],
				type: 'danger',
				closeTime: 3000,
				autoClose: true
			});
		});		
	}
</script>
<?php $__env->startSection('title'); ?>
Dropdown Master | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $state = ""; $readonly = ""; ?>
<?php foreach($userProgramAccess as $access): ?>
<?php if($access->program_code == Config::get('constants.MODULE_CODE_DESTI')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
				<div class="col-sm-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-truck"></i>  Dropdown
							</div>
						</div>
						<div class="portlet-body">

							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">     
									<div class="form-group">
										<div class="col-sm-2">
											<label class="control-label">Dropdown Name: </label>
										</div>
										<div class="col-sm-6">
											<select class="form-control input-sm" name="master" id="master">
												<?php if(isset($category)): ?>
												<?php foreach($category as $type): ?>
												<option value="<?php echo e($type->id); ?>" <?php if($selected_category==$type->id){ echo 'selected';} ?> ><?php echo e($type->category); ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
										</div>  
										<div class="col-sm-3">
											<button type="button" name="add_category" class="btn btn-sm btn-primary add_category" <?php echo($state); ?> >
												<i class="fa fa-plus"></i>
											</button>
											<button type="button" name="edit_category" class="btn btn-sm blue edit_category" <?php echo($state); ?> >
												<i class="fa fa-edit"></i>
											</button>
											<button type="button" name="del_category" data-toggle="modal" data-target="#deleteCatModal" class="btn btn-sm btn-danger del_category" <?php echo($state); ?> >
												<i class="fa fa-trash"></i>
											</button>
										</div>
									</div>							              
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<table class="table table-striped table-bordered table-hover" id="sample_3">
										<thead>
											<tr>
												<th class="table-checkbox" style="width: 5%">
													<input type="checkbox" class="group-checkable checkAllitems" data-set="#sample_3 .checkboxes"/>
												</th>
												<th></th>
												<th>Description</th>
											</tr>
										</thead>

										<tbody>
											<?php foreach($dropdownlist as $data): ?>
											<tr>	
												<td style="width: 5%">
													<input type="checkbox" class="form-control input-sm checkboxes" name="checkitem" id="checkitem" value="<?php echo e($data->id); ?>"></input>
												</td>								   									
												<td style="width: 7%">

													<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="<?php echo e($data->id . '|' . $data->description); ?>" <?php echo($state); ?>>
														<i class="fa fa-edit"></i> 
													</button>
												</td>
												<td><?php echo e($data->description); ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>									
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4 col-sm-offset-5" style="margin-top: 30px;">
											<button type="button" name="add" id="add" class="btn btn-success btn-lg" <?php echo($state); ?> >
												<i class="fa fa-plus-square-o"></i> Add
											</button>
											<button type="button" id="deleteAll" class="btn btn-danger btn-lg deleteAll-task" <?php echo($state); ?> >
												<i class="fa fa-trash"></i> Delete
											</button>
								</div>
							</div>
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog modal-sm gray-gallery">
							<!-- Modal content-->
							<form class="form-horizontal" id="destinationform" role="form" method="POST" action="<?php echo e(url('/dropdown-save')); ?>">
								<div class="modal-content ">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">
										<div class="row">

											<?php echo csrf_field(); ?>

											<div class="col-sm-12">

												<div class="form-group">
													<label for="inputname" class="col-sm-4 control-label">*Description</label>
													<div class="col-sm-8">
														<input type="text" class="form-control input-sm" id="inputname" name="description" autofocus maxlength="40">
														<div id="er1"></div>
														<input type="hidden" value="" name="dbmaster" id="dbmaster" />
													</div>


												</div>
											</div>

										</div>
									</div>
									<div class="modal-footer">
										<input type="hidden" class="form-control input-sm" id="masterid" name="masterid" maxlength="40" >
										<input type="hidden" class="form-control input-sm" id="itemid" name="itemid" maxlength="40" >
										<input type="hidden" class="form-control input-sm" id="hdnaction" name="action" maxlength="40" value="ADD">
										<button type="submit" class="btn btn-success" id="modalsave" ><i class="fa fa-save"></i> Save</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!-- Modal -->
					<div id="myModalCategory" class="modal fade" role="dialog">
						<div class="modal-dialog modal-sm gray-gallery">
							<!-- Modal content-->
							<form class="form-horizontal" id="destinationform" role="form" method="POST" action="<?php echo e(url('/dropdown-cat-save')); ?>">
								<div class="modal-content ">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">
										<div class="row">

											<?php echo csrf_field(); ?>

											<div class="col-sm-12">

												<div class="form-group">
													<label for="inputname" class="col-sm-5 control-label input-sm">*Category Name</label>
													<div class="col-sm-7">
														<input type="text" class="form-control input-sm" id="inputcatname" name="category" autofocus maxlength="40">
														<div id="er1"></div>
														<input type="hidden" value="" name="dbmaster" id="dbmaster" />
													</div>


												</div>
											</div>

										</div>
									</div>
									<div class="modal-footer">
										<input type="hidden" class="form-control input-sm" id="catmasterid" name="masterid" maxlength="40" >
										<input type="hidden" class="form-control input-sm" id="hdncataction" name="action" maxlength="40" value="ADD">
										<button type="submit" class="btn btn-success" id="modalsave" ><i class="fa fa-save"></i> Save</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--delete all modal-->
					<div id="deleteAllModal" class="modal fade" role="dialog">
						<div class="modal-dialog modal-sm gray-gallery">

							<!-- Modal content-->
							<form class="form-horizontal" id="deleteAllform" role="form">
								<div class="modal-content ">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="deleteAll-title">Delete Item</h4>
									</div>
									<div class="modal-body">
										<div class="row">

											<?php echo csrf_field(); ?>

											<div class="col-sm-12">
												<label for="inputname" class="col-sm-12 control-label text-center">
													Are you sure you want to delete record/s?
												</label>
												<input type="hidden" value="" name="deleteAllmaster" id="deleteAllmaster" />
											</div>	
										</div>
									</div>
									<div class="modal-footer">
										<a href="#" class="btn btn-success" id="modaldelete" ><i class="fa fa-save"></i> Yes</a>
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--delete Category-->
					<div id="deleteCatModal" class="modal fade" role="dialog">
						<div class="modal-dialog modal-sm gray-gallery">

							<!-- Modal content-->
							<form class="form-horizontal" id="deleteCatModal" role="form"  method="POST"  action="<?php echo e(url('/dropdown-cat-delete')); ?>">
								<div class="modal-content ">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="deleteAll-title">Delete Category</h4>
									</div>
									<div class="modal-body">
										<div class="row">

											<?php echo csrf_field(); ?>

											<div class="col-sm-12">
												<label for="inputname" class="col-sm-12 control-label text-center">
													Are you sure you want to delete this Category?
												</label>
												<input type="hidden" value="<?php echo $selected_category;?>" name="catid" id="catid" />
											</div>	
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Yes</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!-- 	Success Message Modal -->
					<div id="confirmModal" class="modal fade" role="dialog">
						<div class="modal-dialog modal-sm gray-gallery">

							<!-- Modal content-->
							<form class="form-horizontal" id="confirmForm" role="form" method="POST">
								<div class="modal-content ">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="deleteAll-title" id="modalTitle"></h4>
									</div>
									<div class="modal-body">
										<div class="row">

											<?php echo csrf_field(); ?>

											<div class="col-sm-12">
												<label for="confirmMessage" id="confirmMessage" class="col-sm-12 control-label text-center">
													
												</label>
											</div>	
										</div>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-success" id="confirmOk" ><i class="fa fa-save"></i>OK</a>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!---->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>