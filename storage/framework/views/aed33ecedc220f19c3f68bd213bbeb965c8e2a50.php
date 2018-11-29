<?php $__env->startSection('title'); ?>
	Packing List Master | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_PCKNGLIST')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
										<i class="fa fa-barcode"></i>  Packing List Master
									</div>
								</div>
								<div class="portlet-body">
									<div class="row">
										<div class="col-sm-12">										
											<table class="table table-striped table-bordered table-hover" id="sample_3">
												<thead>
													<tr>
														<th class="table-checkbox" style="width: 5%" colspan="2">
															<input type="checkbox" class="group-checkable checkAllitems" data-set="#sample_3 .checkboxes"/>
														</th>
													
														<th>Sold To</th>
														<th>Carrier</th>
														<th>Port of Loading</th>
														<th>Port of Destination</th>
														<th>Description of Goods</th>
														<th>Ship To</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach($tableData as $dest): ?>
														<tr>
															
															<td style="width: 5%">
									                           <input type="checkbox" class="form-control input-sm checkboxes" name="checkitem" id="checkitem" value="<?php echo e($dest->id); ?>"></input>
									                          
								            				</td>
								   															
															<td style="width: 7%">
									                           
									                            <button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="<?php echo e($dest->id . '|' . $dest->soldto . '|' . $dest->carrier. '|' .$dest->portofloading. '|' .$dest->portofdestination. '|' .$dest->destinationofgoods. '|' .$dest->shipto); ?>">
								                						<i class="fa fa-edit"></i> 
								            					</button>
								            				</td>
								            				<td><?php echo e($dest->soldto); ?></td>
															<td><?php echo e($dest->carrier); ?></td>
															<td><?php echo e($dest->portofloading); ?></td>
															<td><?php echo e($dest->portofdestination); ?></td>
															<td><?php echo e($dest->destinationofgoods); ?></td>
															<td><?php echo e($dest->shipto); ?></td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>									
										</div>
									</div>

									<div class="row" style="margin-top: 30px;">
										<div class="col-sm-4 col-sm-offset-5">
											<a href="#" id="add" class="btn btn-success btn-lg">
												<i class="fa fa-plus-square-o"></i> Add
											</a>
											<button type="submit" class="btn btn-danger btn-lg deleteAll-task">
												<i class="fa fa-trash"></i> Delete 
											</button>
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

	<!-- Add Modal -->
	<div id="soldtoModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<form method="POST" class="form-horizontal" id="wbsfrmsml">
								<?php echo e(csrf_field()); ?>

								<div class="form-group">
									<div class="col-sm-7">
										<p>
											Value field is required.
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2">Sold To</label>
									<div class="col-sm-10">
										<textarea name="soldto" id="soldto" class="form-control" style="resize:none" ></textarea>
										<div id="er1"></div>
									</div>
								</div>		
								<div class="form-group">
									<label class="control-label col-sm-2">Carrier</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-sm" id="carrier" name="carrier" maxlength="40">
										<div id="er2"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2">Port of Loading</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-sm" id="portofloading" name="portofloading" maxlength="40">
										<div id="er3"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2">Port of Destination</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-sm" id="portofdestination" name="portofdestination" maxlength="40">
										<div id="er4"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2">Destination of Goods</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-sm" id="destinationofgoods" name="destinationofgoods" maxlength="40">
										<div id="er5"></div>
									</div>
								</div>		
								<div class="form-group">
									<label class="control-label col-sm-2">Ship To</label>
									<div class="col-sm-10">
										<textarea name="shipto" id="shipto" class="form-control" style="resize:none" ></textarea>
										<div id="er6"></div>
									</div>
								</div>
								
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<input type="hidden" class="form-control input-sm" id="masterid" name="masterid" maxlength="40" >
					<input type="hidden" class="form-control input-sm" id="hdnaction" name="hdnaction" maxlength="40" value="ADD">
					<button type="button" onclick="javascript:Add_Records();" class="btn btn-success">Save</button>
					<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- End of Add Modal -->


	<!--delete all modal-->
	<div id="deleteAllModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm gray-gallery">

								<!-- Modal content-->
			<form class="form-horizontal" id="deleteAllform" role="form">
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="deleteAll-title">Delete Sold Master Settings</h4>
					</div>
					<div class="modal-body">
						<div class="row">

							<?php echo csrf_field(); ?>

							<div class="col-sm-12">
								<label for="inputname" class="col-sm-12 control-label text-center">
								Are you sure you want to delete all record/s?
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

	<!-- End of Add Modal -->
<?php $__env->stopSection(); ?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$( document ).ready(function(e) {
		$('.deleteAll-task').addClass("disabled");
		$('.delete-task').addClass("disabled");
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

		$('#modaldelete').on('click',function(){
			deleteAllcheckeditems();
		});

		$('#add').on('click', function(e) {
			var master = $('#master').val();
			e.preventDefault();
			$('.modal-title').html('Add Sold Master');
			$('#soldtoModal').modal('show');
			$('#hdnaction').val('ADD');

			$('#soldto').val("");
			$('#carrier').val("");
			$('#portofloading').val("");	
			$('#portofdestination').val("");
			$('#destinationofgoods').val("");
			$('#shipto').val("");	

			$('#soldto').keyup(function(){
			   $('#er1').html(""); 
			});
			$('#carrier').keyup(function(){
			   $('#er2').html(""); 
			});
			$('#portofloading').keyup(function(){
			   $('#er3').html(""); 
			});
			$('#portofdestination').keyup(function(){
			   $('#er4').html(""); 
			});	
			$('#destinationofgoods').keyup(function(){
			   $('#er5').html(""); 
			});	
			$('#shipto').keyup(function(){
			   $('#er6').html(""); 
			});		
		});

		$('.edit-task').on('click', function(e) {
			

			var edittext = $(this).val().split('|');
        	var editid = edittext[0];
        	var soldto = edittext[1];
        	var carrier = edittext[2];
        	var pol = edittext[3];
        	var pod = edittext[4];
        	var dog = edittext[5];
        	var shipto = edittext[6];
        	$('#masterid').val(editid);
      		$('#hdnaction').val('EDIT');
			$('.modal-title').html('Update Packing List Master');
			$('#soldtoModal').modal('show');

			$('#soldto').val(soldto);
			$('#carrier').val(carrier);
			$('#portofloading').val(pol);	
			$('#portofdestination').val(pod);
			$('#destinationofgoods').val(dog);
			$('#shipto').val(shipto);	
			$('#er1').html("");
			$('#er2').html("");
			$('#er3').html("");	
			$('#er4').html("");
			$('#er5').html("");
			$('#er6').html("");	

			$('#soldto').keyup(function(){
			   $('#er1').html(""); 
			});
			$('#carrier').keyup(function(){
			   $('#er2').html(""); 
			});
			$('#portofloading').keyup(function(){
			   $('#er3').html(""); 
			});
			$('#portofdestination').keyup(function(){
			   $('#er4').html(""); 
			});	
			$('#destinationofgoods').keyup(function(){
			   $('#er5').html(""); 
			});	
			$('#shipto').keyup(function(){
			   $('#er6').html(""); 
			});		
		});

		$('.delete-task').click(function(e){      
		 	       
        	$.ajax({
				url: '/delete-sold',
				method: 'get',
				data:  { masterid : $(this).val() },
				
			}).done( function(data, textStatus, jqXHR) {
				window.location.href = '/packinglist';   
			}).fail(function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown+'|'+textStatus);
			});
			
    	});

		$('.deleteAll-task').click(function(e){      
		 	var master =$('#master').val();
    		deleteAllmaster = $('#deleteAllmaster').val(master);
    		
			$('.deleteAllmodal-title').html('Delete' + " " + deleteAllmaster);
			$('#deleteAllModal').modal('show');
			$('.deleteAllmodal-title').append(master);
			deleteAll();
    	});

	});

	/*function deleteAll(){
		var formObj = $('#deleteAllform');
		var formURL = formObj.attr("action");//<?php echo e(url('/readfile')); ?>;//
		var forsmata = new Forsmata(fomObj);

		$.ajax({
			url: formURL,
			method: 'post',
			data:  forsmata,
			
		}).done( function(data, textStatus, jqXHR) {
			console.log(data);
		}).fail(function(jqXHR, textStatus, errorThrown) {
			console.log(data);
		});

	}*/

	function deleteAllcheckeditems(){
		var tray = [];
		$('.checkboxes:checked').each(function(){
			tray.push($(this).val());
		});

		var traycount = tray.length;

		$.ajax({
				url:'/deleteAll-packinglist',
				method:'get',
				data:{ 
					tray : tray,
					traycount : traycount
				},			
		}).done(function(data, textStatus, jqXHR){
			window.location.href='/packinglist';
			/*console.log(data);*/
		}).fail(function(jqXHR, textStatus,errorThrown){
			console.log(errorThrown+'|'+textStatus);
		});
	}

	function Add_Records(){
		var action = $('#hdnaction').val();
		var soldto = $('textarea#soldto').val();
		var carrier = $('input[name=carrier]').val();
		var portofloading = $('input[name=portofloading]').val();
		var portofdestination = $('input[name=portofdestination]').val();
		var destinationofgoods = $('input[name=destinationofgoods]').val();
		var shipto = $('textarea#shipto').val();		
		var masterid = $('input[name=masterid]').val();
		var myData = {'soldto':soldto,'carrier':carrier,'portofloading':portofloading,'portofdestination':portofdestination,'destinationofgoods':destinationofgoods,'shipto':shipto,'masterid':masterid};

		switch(soldto){
			case '':
				$('#er1').html("Sold To field is blank"); $('#er1').css('color', 'red'); return false;
			break;
		}
		switch(carrier){
			case '':
				$('#er2').html("Carrier field is blank"); $('#er2').css('color', 'red'); return false;
			break;
		}
		switch(portofloading){
			case '':
				$('#er3').html("Port of Loading field is blank"); $('#er3').css('color', 'red'); return false;
			break;
		}
		switch(portofdestination){
			case '':
				$('#er4').html("Port of Destination field is blank"); $('#er4').css('color', 'red'); return false;
			break;
		}
		switch(destinationofgoods){
			case '':
				$('#er5').html("Destination of Goods field is blank"); $('#er5').css('color', 'red'); return false;
			break;
		}
		switch(shipto){
			case '':
				$('#er6').html("Ship to field is blank"); $('#er6').css('color', 'red'); return false;
			break;
		}
	

		if(action == 'ADD')
		{
			$.post("<?php echo e(url('/add-packinglist')); ?>", 
			{
				_token : $('meta[name=csrf-token]').attr('content')
				, data : myData
			}).done(function(data, textStatus, jqXHR){
				/*console.log(data);*/
				$('#soldtoModal').modal('hide');
				$('#confirmModal').modal('show');
			
				$('#modalTitle').html('Success Message');
				$('#confirmMessage').html('Record succesfully saved');
					
				$('#confirmOk').click(function(){
					window.location.href='/packinglist';
				});
			}).fail(function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown+'|'+textStatus);
			});
		}
		else if(action == 'EDIT')
		{
			$.post("<?php echo e(url('/update-packinglist')); ?>", 
			{
				_token : $('meta[name=csrf-token]').attr('content')
				, data : myData
			}).done(function(data, textStatus, jqXHR){
				/*console.log(data);*/
				$('#soldtoModal').modal('hide');
				$('#confirmModal').modal('show');
			
				$('#modalTitle').html('Success Message');
				$('#confirmMessage').html('Record succesfully updated');
					
				$('#confirmOk').click(function(){
					window.location.href='/packinglist';
				});
			}).fail(function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown+'|'+textStatus);
			});
		}
	}

	
</script>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>