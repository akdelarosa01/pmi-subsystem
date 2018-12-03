<?php $__env->startSection('title'); ?>
	QC Database Molding | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_QCMLD')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
									<i class="fa fa-search"></i>  QC Database Molding
								</div>
							</div>
							<div class="portlet-body">

                                <div class="row">
									<div class="col-xs-12 hidden-md hidden-lg hidden-xl">
										<div class="btn-group pull-right">
											<button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
												OQC Inspection <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li>
													<a href="<?php echo e(url('/oqcmolding')); ?>">
													   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
												   	</a>
												</li>
												<li class="active">
													<a href="<?php echo e(url('/packingmolding')); ?>">
		 											   <i class="fa fa-cube fa-2x font-purple"></i> Packing Inspection
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
											<a href="<?php echo e(url('/oqcmolding')); ?>" class="list-group-item">
											   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
										   </a>
										   <a href="<?php echo e(url('/packingmolding')); ?>" class="list-group-item active">
											   <i class="fa fa-cube fa-2x font-purple"></i> Packing Inspection
										   </a>
										</div>
									</div>

									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="portlet box purple" >
                        							<div class="portlet-title">
                        								<div class="caption">
                        									<i class="fa fa-cube"></i> Packing Inspection
                        								</div>
                        							</div>
                        							<div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-hover table-bordered table-striped" id="packingdatatable">
                                                                    <thead>
                                                                        <tr>
                                                                             <td class="table-checkbox" style="width: 5%">
                                                                                <input type="checkbox" class="group-checkable checkAllitems" />
                                                                            </td>
                                                                            <td></td>
                                                                            <td>ID</td>
                                                                            <td>PO Number</td>
                                                                            <td>Date Inspected</td>
                                                                            <td>Shipment Date</td>
                                                                            <td>Device Name</td>
                                                                            <td>Inspector</td>
                                                                            <td>Packing Type</td>
                                                                            <td>Unit Condition</td>
                                                                            <td>Packing Operator</td>
                                                                            <td>Packing Code Series</td>
                                                                            <td>Carton Number</td>
                                                                            <td>Packing Code</td>
                                                                            <td>Judgement</td>
                                                                            <td>total Qty</td>
                                                                            <td>Mode of Defect</td>
                                                                            <td>Remarks</td>
                                                                            <td>dbcon</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach($tableData as $dest): ?>
                                                                        <tr>
                                                                            <td style="width: 2%">
                                                                                  <input type="checkbox" class="form-control input-sm checkboxes" value="<?php echo e($dest->id); ?>" name="checkitem" id="checkitem"></input> 
                                                                            </td>                        
                                                                            <td style="width: 5%">           
                                                                                <button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="<?php echo e($dest->id. '|' .$dest->po_num. '|' .$dest->date_inspected. '|' .$dest->shipment_date. '|' .$dest->device_name. '|' .$dest->inspector. '|' .$dest->packing_type. '|' .$dest->unit_condition. '|' .$dest->packing_operator. '|' .$dest->packing_code_series. '|' .$dest->carton_num. '|' .$dest->packing_code. '|' .$dest->judgement. '|' .$dest->total_qty. '|' .$dest->mode_of_defect. '|' .$dest->remarks. '|' .$dest->dbcon); ?>">
                                                                                       <i class="fa fa-edit"></i> 
                                                                                </button>
                                                                            </td>
                                                                            <td><?php echo e($dest->id); ?></td>
                                                                            <td><?php echo e($dest->po_num); ?></td>
                                                                            <td><?php echo e($dest->date_inspected); ?></td>
                                                                            <td><?php echo e($dest->shipment_date); ?></td>
                                                                            <td><?php echo e($dest->device_name); ?></td>
                                                                            <td><?php echo e($dest->inspector); ?></td>
                                                                            <td><?php echo e($dest->packing_type); ?></td>
                                                                            <td><?php echo e($dest->unit_condition); ?></td>
                                                                            <td><?php echo e($dest->packing_operator); ?></td>
                                                                            <td><?php echo e($dest->packing_code_series); ?></td>
                                                                            <td><?php echo e($dest->carton_num); ?></td>
                                                                            <td><?php echo e($dest->packing_code); ?></td>
                                                                            <td><?php echo e($dest->judgement); ?></td>
                                                                            <td><?php echo e($dest->total_qty); ?></td>
                                                                            <td><?php echo e($dest->mode_of_defect); ?></td>
                                                                            <td><?php echo e($dest->remarks); ?></td>
                                                                            <td><?php echo e($dest->dbcon); ?></td>
                                                                        </tr>
                                                                        <?php endforeach; ?>
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
                                                <a href="javascript:;" class="btn green" id="btn_add">
                                                    <i class="fa fa-plus"></i> Add New
                                                </a>
                                                <!-- <a href="javascript:;" class="btn grey-gallery" id="btn_groupby">
                                                    <i class="fa fa-group"></i> Group By
                                                </a> -->
                                                <button type="button" onclick="javascript:deleteAllchecked();" class="btn red" id="btn_delete">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                                <!-- <a href="javascript:;" class="btn purple" id="btn_search">
                                                    <i class="fa fa-search"></i> Search
                                                </a>
												<a href="<?php echo e(url('/packingprintreport')); ?>" class="btn blue-hoki">
                                                    <i class="fa fa-file-text-o"></i> Report
                                                </a> -->
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

	<!-- ADD NEW MODAL -->
    <div id="AddNewModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog gray-gallery modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Packing Inspection Result</h4>
                </div>
                <form class=form-horizontal>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-4">P.O. No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" id="po_no" name="po_no">
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-sm-4">Inspection Date</label>
                                    <div class="col-sm-8">
                                        <input class="form-control input-sm date-picker" type="text" value="" name="insp_date" id="insp_date"/>
                                    </div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Shipment Date</label>
                                    <div class="col-sm-8">
                                        <input class="form-control input-sm date-picker" type="text" value="" name="ship_date" id="ship_date"/>
                                    </div>
								</div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Device Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" id="series_name" name="series_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Inspector</label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm show-tick" name="inspector" id="inspector">
                                            <option value=""></option>
                                            <?php foreach($inspectors as $inspector): ?>
                                            <option value="<?php echo e($inspector->description); ?>"><?php echo e($inspector->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-4">Packing Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm show-tick" name="packing_type" id="packing_type">
                                            <option value=""></option>
                                            <?php foreach($packingtypes as $packingtype): ?>
                                            <option value="<?php echo e($packingtype->description); ?>"><?php echo e($packingtype->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-4">Unit Condition</label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm show-tick" name="unit_condition" id="unit_condition">
                                            <option value="option"></option>
                                            <?php foreach($unitconditions as $unitcondition): ?>
                                            <option value="<?php echo e($unitcondition->description); ?>"><?php echo e($unitcondition->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-4">Packing Operator</label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm show-tick" name="packing_operator" id="packing_operator">
                                            <option value="option"></option>
                                            <?php foreach($packingoperators as $packingoperator): ?>
                                            <option value="<?php echo e($packingoperator->description); ?>"><?php echo e($packingoperator->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-sm-4">Remarks</label>
                                    <div class="col-sm-8">
                                        <textarea name="remarks" id="remarks" class="form-control input-sm" style="resize:none"></textarea>
                                    </div>
								</div>
                            </div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-sm-4">Packing Code<small>(per Series)</small></label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm show-tick" name="pack_code_per_series" id="pack_code_per_series">
                                            <option value="option"></option>
                                            <?php foreach($packingcodeperseries as $packingcodeperserie): ?>
                                            <option value="<?php echo e($packingcodeperserie->description); ?>"><?php echo e($packingcodeperserie->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
								</div>
								<div class="form-group">
                                    <label class="control-label col-sm-4">Carton No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" id="carton_no" name="carton_no">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-4">Packing Code.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" id="pack_code" name="pack_code">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-4">Runcard</label>
                                    <div class="col-sm-8">
                                        <a href="javascript:;" class="btn btn-block green" id="btn_runcard"> Lot Number</a>
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-sm-4">Judgement</label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm show-tick" name="judgement" id="judgement">
                                            <option value=""></option>
                                            <?php foreach($judgements as $judgement): ?>
                                            <option value="<?php echo e($judgement->description); ?>"><?php echo e($judgement->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
								</div>
								<div class="form-group">
                                    <label class="control-label col-sm-4">Total Qty</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" id="total_qty" name="total_qty">
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-sm-4">Mode of Defect</label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm show-tick" name="mode_of_defect" id="mode_of_defect">
                                            <option value=""></option>
                                            <?php foreach($mods as $mod): ?>
                                            <option value="<?php echo e($mod->description); ?>"><?php echo e($mod->description); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

								</div>
                               <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control input-sm" id="hdstatus" name="hdstatus">
                                    </div>
                                </div>
							</div>

                        </div>

						<div class="modal-footer">
							<button type="button" onclick="javascript:Packing_Save();" class="btn btn-success" id="btn_savemodal">Save</button>
							<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
						</div>

                    </div>
                </form>
            </div>
        </div>
    </div>

	<!-- GROUP BY MODAL -->
	<div id="GroupByModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Group Items By:</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control input-sm show-tick" name="" id="">
											<option value="option"></option>
											<option value="option">option</option>
											<option value="option">option</option>
										</select>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="">Apply</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- SEARCH MODAL -->
	<div id="SearchModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Search</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-3">From</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_from" id="search_from"/>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">To</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_to" id="search_to"/>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="">OK</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
$(function() {
    $('#packingdatatable').DataTable();

	// {
    //     processing: true,
    //     serverSide: true,
    //     ajax: "<?php echo e(url('/packingmoldingdata')); ?>",
    //     columns: [
    //         {data: 'id', name: 'id'},
    //         {data: 'partcode', name: 'partcode'},
    //         {data: 'updated_at', name: 'updated_at'},
    //         {data: 'partname', name: 'partname'},
    //         {data: 'po_no', name: 'po_no'},
    //         {data: 'customer', name: 'customer'},
    //         {data: 'shipment_date', name: 'shipment_date'},
    //         {data: 'packing_code', name: 'packing_code'},
    //         {data: 'po_qty', name: 'po_qty'},
    //         {data: 'qty', name: 'qty'}
    //     ]
    // }

	$('#btn_add').on('click', function() {
		$('#AddNewModal').modal('show');
        $('#hdstatus').val("ADD");
	});

    $('.edit-task').on('click', function() {
		$('#AddNewModal').modal('show');
        $('#hdstatus').val("EDIT");
        var edittext = $(this).val().split('|');
         var editid = edittext[0];
        $('input[name=po_no]').val(edittext[1]);
        $('input[name=insp_date]').val(edittext[2]);
        $('input[name=ship_date]').val(edittext[3]);
        $('input[name=series_name]').val(edittext[4]);
        $('#inspector').val(edittext[5]);
        $('#packing_type').val(edittext[6]);
        $('#unit_condition').val(edittext[7]);
        $('#packing_operator').val(edittext[8]);
        $('#pack_code_per_series').val(edittext[9]);
        //sampling plan inputs---------------------------
        $('input[name=carton_no]').val(edittext[10]);
        $('input[name=pack_code]').val(edittext[11]);
        $('select[name=judgement]').val(edittext[12]);
        $('input[name=total_qty]').val(edittext[13]);
        $('#mode_of_defect').val(edittext[14]);
        $('#remarks').val(edittext[15]);
	});

	$('#btn_groupby').on('click', function() {
		$('#GroupByModal').modal('show');
	});

	$('#btn_search').on('click', function() {
		$('#SearchModal').modal('show');
	});

	$('#btn_runcard').on('click', function() {
		$('#RuncardModal').modal('show');
	});

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

});

function Packing_Save(){
    //visual Inspection inputs--------------------
    var pono = $('input[name=po_no]').val();
    var inspectiondate = $('input[name=insp_date]').val();
    var shipmentdate = $('input[name=ship_date]').val();
    var devicename = $('input[name=series_name]').val();
    var inspector = $('select[name=inspector]').val();
    var packingtype = $('select[name=packing_type]').val();
    var unitcondition = $('select[name=unit_condition]').val();
    var packingoperator = $('select[name=packing_operator]').val();
    var packingcodeseries = $('select[name=pack_code_per_series]').val();
    //sampling plan inputs---------------------------
    var cartonnum = $('input[name=carton_no]').val();
    var packingcode = $('input[name=pack_code]').val();
    var judgement = $('select[name=judgement]').val();
    var totalqty = $('input[name=total_qty]').val();
    var modeofdefects = $('select[name=mode_of_defect]').val();
    var remarks = $('#remarks').val();
    var dbcon = "TS";
    var hdstatus = $('#hdstatus').val();
    var id = $('#checkitem').val();

  

    $.post("<?php echo e(url('/packingsave')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        pono:pono,
        inspectiondate:inspectiondate,
        shipmentdate:shipmentdate,
        devicename: devicename,
        inspector :inspector,
        packingtype:packingtype,
        unitcondition:unitcondition,
        packingoperator:packingoperator,
        packingcodeseries:packingcodeseries,
        cartonnum:cartonnum,
        packingcode:packingcode,
        judgement:judgement,
        totalqty:totalqty,
        modeofdefects:modeofdefects,
        remarks:remarks,
        dbcon:dbcon,
        hdstatus:hdstatus,
        id:id

    }).done(function(data, textStatus, jqXHR){
        window.location.href="<?php echo e(url('/packingmolding')); ?>"; 
        /*console.log(data);*/
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}

function deleteAllchecked(){
    var tray = [];
    $('.checkboxes:checked').each(function(){
        tray.push($(this).val());
    });

    var traycount = tray.length;

    $.ajax({
            url:"<?php echo e(url('/packingDelete')); ?>",
            method:'get',
            data:{ 
                tray : tray,
                traycount : traycount
            },          
    }).done(function(data, textStatus, jqXHR){
        window.location.href="<?php echo e(url('/packingmolding')); ?>";
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>