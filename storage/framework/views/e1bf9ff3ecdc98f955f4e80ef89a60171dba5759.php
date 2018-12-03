<?php $__env->startSection('title'); ?>
	QC Database | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_QCDB')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
									<i class="fa fa-search"></i>  QC Database
								</div>
                                <div class="tools">
                                </div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-xs-12 hidden-md hidden-lg hidden-xl">
										<div class="btn-group pull-right">
											<button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
												FGS <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li>
													<a href="<?php echo e(url('/iqcinspection')); ?>">
														<i class="fa fa-search fa-2x font-green"></i> IQC Inspection
													</a>
												</li>
												<li>
													<a href="<?php echo e(url('/oqcinspection')); ?>">
													   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
												   	</a>
												</li>
												<li class="active">
													<a href="<?php echo e(url('/fgs')); ?>">
		 											   <i class="fa fa-line-chart fa-2x font-yellow"></i> FGS
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/packinginspection')); ?>">
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
											<a href="<?php echo e(url('/iqcinspection')); ?>" class="list-group-item">
												<i class="fa fa-search fa-2x font-green"></i> IQC Inspection
											</a>
											<a href="<?php echo e(url('/oqcinspection')); ?>" class="list-group-item">
											   <i class="fa fa-search fa-2x font-red"></i> OQC Inspection
										   </a>
										   <a href="<?php echo e(url('/fgs')); ?>" class="list-group-item active">
											   <i class="fa fa-line-chart fa-2x font-yellow"></i> FGS
										   </a>
										   <a href="<?php echo e(url('/packinginspection')); ?>" class="list-group-item">
											   <i class="fa fa-cube fa-2x font-purple"></i> Packing Inspection
										   </a>
										</div>
									</div>

									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="portlet box yellow" >
                        							<div class="portlet-title">
                        								<div class="caption">
                        									<i class="fa fa-line-chart"></i> FGS
                        								</div>
                        							</div>
                        							<div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-hover table-bordered table-striped" id="fgsdatatable">
                                                                    <thead>
                                                                        <tr>
                                                                        	<td class="table-checkbox" style="width: 5%">
                                                                                <input type="checkbox" class="group-checkable checkAllitems" />
                                                                            </td>
                                                                            <td></td>
                                                                            <td>ID</td>
                                                                            <td>Date Inspection</td>
                                                                            <td>P.O. #</td>
                                                                            <td>Series Name</td>
                                                                            <td>Quantity</td>
                                                                            <td>Total No. of Lots</td>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tblforfgs">
                                                                    <?php foreach($tableData as $dest): ?>
                                                                    <tr>
                                                                        <td style="width: 2%">
                                                                              <input type="checkbox" class="form-control input-sm checkboxes" value="<?php echo e($dest->id); ?>" name="checkitem" id="checkitem"></input> 
                                                                        </td>                        
                                                                        <td style="width: 5%">           
                                                                            <button type="button" name="edit-task" value="<?php echo e($dest->id.'|'.$dest->date.'|'.$dest->po_no.'|'.$dest->device_name.'|'.$dest->qty.'|'.$dest->total_num_of_lots.'|'.$dest->dbcon); ?>" class="btn btn-sm btn-primary edit-task">
                                                                                   <i class="fa fa-edit"></i> 
                                                                            </button>
                                                                        </td>
                                                                        <td><?php echo e($dest->id); ?></td>
                                                                        <td><?php echo e($dest->date); ?></td>
                                                                        <td><?php echo e($dest->po_no); ?></td>
                                                                        <td><?php echo e($dest->device_name); ?></td>
                                                                        <td><?php echo e($dest->qty); ?></td>
                                                                        <td><?php echo e($dest->total_num_of_lots); ?></td>
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
                                                <a href="javascript:;" class="btn grey-gallery" id="btn_groupby">
                                                    <i class="fa fa-group"></i> Group By
                                                </a>
                                                <button type="button" onclick="javascript:deleteAllchecked();" class="btn red" id="btn_delete">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                                <a href="javascript:;" class="btn purple" id="btn_search">
                                                    <i class="fa fa-search"></i> Search
                                                </a>
                                                <a href="javascript:;" class="btn yellow-gold" id="btn_pdf">
                                                    <i class="fa fa-file-text-o"></i> Print to Pdf
                                                </a>
                                                <a href="javascript:;" class="btn green-jungle" id="btn_excel">
                                                    <i class="fa fa-file-text-o"></i> Print to Excel
                                                </a>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_search_from" id="hd_search_from"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_search_to" id="hd_search_to"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_search_pono" id="hd_search_pono"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_groupfield" id="hd_groupfield"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_groupfield2" id="hd_groupfield2"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_groupfield3" id="hd_groupfield3"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_groupfield4" id="hd_groupfield4"/>
                                                <input class="form-control input-sm" type="hidden" value="" name="hd_report_status" id="hd_report_status"/>
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
		<div class="modal-dialog modal-md gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">OQC FGS</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-3">Date</label>
									<div class="col-sm-9">
										<input class="form-control input-sm date-picker" type="text" name="date" id="date"/>										
									</div>
								</div>
								<div class="form-group">
                                    <label class="control-label col-sm-3">P.O. Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="po_no" name="po_no">
                                        <div id="er_po_no"></div>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-3">Device Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="device_name" name="device_name" readonly>
                                        <div id="er_device_name"></div>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-3">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="quantity" name="quantity">
                                        <div id="er_quantity"></div>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-3">Total No. of Lots</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" id="total_lots" name="total_lots">
                                        <input type="hidden" class="form-control input-sm" id="hd_status" name="hd_status">
                                        <input type="hidden" class="form-control input-sm" id="id" name="id">
                                        <div id="er_total_lots"></div>
                                    </div>
                                </div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn blue btn-sm" id="btn_clear"><i class="fa fa-eraser"></i> Clear</button>
						<button type="button" onclick="javascript:Save();" class="btn green btn-sm" id="btn_save"><i class="fa fa-floppy-o"></i> Save</button>
						<button type="button" data-dismiss="modal" class="btn red btn-sm"><i class="fa fa-times"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- GROUP BY MODAL -->
   <div id="GroupByModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-md gray-gallery">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Group Items By:</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-2">Date From</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control datepicker input-sm " id="groupby_datefrom" name="groupby_datefrom">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-2">Date To</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control datepicker input-sm " id="groupby_dateto" name="groupby_dateto">
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-2">Group #1</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm show-tick" name="group1" id="group1">
                                        <option value=""></option>
										<option value="date">Date Inspected</option>
										<option value="po_no">PO Number</option>
										<option value="device_name">Series Name</option>
										<option value="qty">Quantity</option>
										<option value="total_num_of_lots">Total No. of Lots</option>
                                    </select>
                                </div>
                             
                            </div>  
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-2">Group #2</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm show-tick" name="group2" id="group2">
                                        <option value=""></option>
										<option value="date">Date Inspected</option>
										<option value="po_no">PO Number</option>
										<option value="device_name">Series Name</option>
										<option value="qty">Quantity</option>
										<option value="total_num_of_lots">Total No. of Lots</option>
                                    </select>
                                </div>
                            </div>  
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-2">Group #3</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm show-tick" name="group3" id="group3">
                                        <option value=""></option>
										<option value="date">Date Inspected</option>
										<option value="po_no">PO Number</option>
										<option value="device_name">Series Name</option>
										<option value="qty">Quantity</option>
										<option value="total_num_of_lots">Total No. of Lots</option>
                                    </select>
                                </div>
                            </div>  
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label col-sm-2">Group #4</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm show-tick" name="group4" id="group4">
                                        <option value=""></option>
										<option value="date">Date Inspected</option>
										<option value="po_no">PO Number</option>
										<option value="device_name">Series Name</option>
										<option value="qty">Quantity</option>
										<option value="total_num_of_lots">Total No. of Lots</option>
                                    </select>
                                </div>
                            </div>      
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="javascript:groupby();" class="btn btn-success" id="">OK</button>
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
                                    <label class="control-label col-sm-3">PO Number</label>
                                    <div class="col-sm-7">
                                        <input class="form-control input-sm" type="text" value="" name="search_pono" id="search_pono"/>
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-sm-3">From</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_from" id="search_from"/>
										<div id="er_search_from"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">To</label>
									<div class="col-sm-7">
										<input class="form-control input-sm date-picker" type="text" value="" name="search_to" id="search_to"/>
										<div id="er_search_to"></div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" onclick="javascript:searchby();" class="btn btn-success" id="">OK</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger" id="btn_search-close">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Empty FIELD SEARCH -->
	<div id="emptyModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog gray-gallery">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Warning!</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label col-sm-10">Please search record/s first before you print reports</label>
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
<script>
$(function() {
    $('#fgsdatatable').DataTable();
    $('select[name=group1]').select2();
   	$('select[name=group2]').select2();
    $('select[name=group3]').select2();
    $('select[name=group4]').select2();
    $('#date').datepicker();
    $('#groupby_datefrom').datepicker();
    $('#groupby_dateto').datepicker();
    $('#search_from').datepicker();
    $('#search_to').datepicker();
    $('#date').on('change',function(){
          $(this).datepicker('hide');
     });
	$('#groupby_datefrom').on('change',function(){
          $(this).datepicker('hide');
    });
    $('#groupby_dateto').on('change',function(){
          $(this).datepicker('hide');
    });
    $('#search_from').on('change',function(){
          $(this).datepicker('hide');
    });
    $('#search_to').on('change',function(){
          $(this).datepicker('hide');
    });
	$('#btn_add').on('click', function() {
		$('#AddNewModal').modal('show');
		$('#hd_status').val("ADD");
		$('#po_no').val("");
		$('#device_name').val("");
		$('#quantity').val("");
		$('#total_lots').val("");
		$('#er_po_no').html("");
		$('#er_device_name').html("");
		$('#er_quantity').html("");
		$('#er_total_lots	').html("");

	});
	$('#btn_clear').click(function(){
		$('#po_no').val("");
		$('#device_name').val("");
		$('#quantity').val("");
		$('#total_lots').val("");
		$('#hd_status').val("");
	});

	$('#btn_groupby').on('click', function() {
        $('#GroupByModal').modal('show');
        $('#groupby_datefrom').val("");
        $('#groupby_dateto').val("");
        $('#group1').select2('val',"");
        $('#group1content').select2('val',"");

        //to classify group by when reporting----------
        $('#hd_report_status').val("GROUPBY");
        $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        $('#hd_search_pono').val("");
    });

	$('#btn_search').on('click', function() {
        $('#SearchModal').modal('show');
        $('#search_pono').val("");
        $('#search_from').val("");
        $('#search_to').val("");
        $('#er_search_from').html(""); 
        $('#er_search_to').html(""); 

        //to classify group by when reporting----------
        $('#hd_report_status').val("SEARCH");
        $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        $('#hd_groupfield').val("");
        $('#hd_value').val("");
    });

	$('#btn_clear').on('click', function () {
		$('#po_no').val('');
		$('#device_name').val('');
		$('#quantity').val('');
		$('#total_lots').val('');
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

    $('.edit-task').on('click', function(e) {
       	$('#AddNewModal').modal('show');
       	$('#hd_status').val("EDIT");
        var edittext = $(this).val().split('|');
        var editid = edittext[0];
        var date = edittext[1];
        var pono = edittext[2];
        var device = edittext[3];
       	var qty = edittext[4];
        var tlots = edittext[5];
        var dbcon = edittext[6];
        $('#date').val(date);
		$('#po_no').val(pono);
		$('#device_name').val(device);
		$('#quantity').val(qty);
		$('#total_lots').val(tlots);
		$('#dbcon').val("<?php echo e(Auth::user()->productline); ?>");
		$('#id').val(editid);  
    });
/*    if (window.event.keyCode == 13 ) return false;*/
    $('#po_no').keyup(function(){ 
        $('#er_po_no').html(""); 
    });


    $('#device_name').keyup(function(){
        $('#er_device_name').html(""); 
    });
    $('#quantity').keyup(function(){
        $('#er_quantity').html(""); 
    });
    $('#total_lots').keyup(function(){
        $('#er_total_lots').html(""); 
    });
    $('#search_from').click(function(){
        $('#er_search_from').html(""); 
    });
    $('#search_to').click(function(){
        $('#er_search_to').html(""); 
    });

    $('#po_no').on('change',function(){
        var pono = $(this).val();
        $.ajax({
            url:"<?php echo e(url('/getfgsYPICSrecords')); ?>",
            method:'get',
            data:{
                pono:pono
            },
        }).done(function(data, textStatus, jqXHR){
            console.log(data); 
            $('#device_name').val(data[0]['DEVNAME']);
            if(pono == ""){
	    		$('#device_name').val("");
	    	}
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown+'|'+textStatus);
        });
    });

    $('#btn_pdf').on('click', function() {
        console.log("ok");
        var pono = $('#hd_search_pono').val();
        var datefrom = $('#hd_search_from').val();
        var dateto = $('#hd_search_to').val();
        var g1 = $('#hd_groupfield').val();
        var g2 = $('#hd_groupfield2').val();
        var g3 = $('#hd_groupfield3').val();
        var g4 = $('#hd_groupfield4').val();
        var status = $('#hd_report_status').val();

        var url = "<?php echo e(url('/fgsprintreport?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&pono=" + pono+ "&g1=" + g1+ "&g2=" + g2+ "&g3=" + g3+ "&g4=" + g4+ "&status=" + status;
        window.location.href= url;
        $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        $('#hd_search_pono').val("");
   
    });

    $('#btn_excel').on('click', function() {
        var pono = $('#hd_search_pono').val();
        var datefrom = $('#hd_search_from').val();
        var dateto = $('#hd_search_to').val();
        var g1 = $('#hd_groupfield').val();
        var g2 = $('#hd_groupfield2').val();
        var g3 = $('#hd_groupfield3').val();
        var g4 = $('#hd_groupfield4').val();
        var status = $('#hd_report_status').val();
       
        var url = "<?php echo e(url('/fgsprintreportexcel?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&pono=" + pono+ "&g1=" + g1+ "&g2=" + g2+ "&g3=" + g3+ "&g4=" + g4+ "&status=" + status;
        window.location.href= url;
        $('#hd_search_from').val("");
    	$('#hd_search_to').val("");
    	$('#hd_search_pono').val("");
    
    });

});//--------------------------------------------end of script------------------------------

function Save(){
	var date = $('#date').val();
	var pono = $('#po_no').val();
	var device = $('#device_name').val();
	var quantity = $('#quantity').val();
	var tlots = $('#total_lots').val();
	var status = $('#hd_status').val();
	var dbcon = "<?php echo e(Auth::user()->productline); ?>";
	var id = $('#id').val();
	var myData = {date:date,pono:pono,device:device,quantity:quantity,tlots:tlots,status:status,dbcon:dbcon,id:id};
	if(pono == ""){     
        $('#er_po_no').html("PO Number field is empty"); 
        $('#er_po_no').css('color', 'red');       
        return false;  
    }
    if(device == ""){     
        $('#er_device_name').html("Device Name field is empty"); 
        $('#er_device_name').css('color', 'red');       
        return false;  
    }
    if(quantity == ""){     
        $('#er_quantity').html("Quantity field is empty"); 
        $('#er_quantity').css('color', 'red');       
        return false;  
    }
    if(tlots == ""){     
        $('#er_total_lots').html("Total Lots field is empty"); 
        $('#er_total_lots').css('color', 'red');       
        return false;  
    }

	$.post("<?php echo e(url('/fgsSave')); ?>",
	{
		_token:$('meta[name=csrf-token]').attr('content'),
		data:myData
	}).done(function(data, textStatus, jqXHR){
		/*console.log(data);*/
		window.location.href = "<?php echo e(url('/fgs')); ?>";
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
    var myData = {tray:tray,traycount:traycount};
    $.ajax({
            url:"<?php echo e(url('/fgsDelete')); ?>",
            method:'get',
            data:myData
                 
    }).done(function(data, textStatus, jqXHR){
        window.location.href="<?php echo e(url('/fgs')); ?>";
       /* alert(data);*/
    }).fail(function(jqXHR, textStatus,errorThrown){
        console.log(errorThrown+'|'+textStatus);
    });
}

function groupby(){
	var datefrom= $('#groupby_datefrom').val();
    var dateto = $('#groupby_dateto').val();
    var g1 = $('select[name=group1]').val();
    var g2 = $('select[name=group2]').val();
    var g3 = $('select[name=group3]').val();
    var g4 = $('select[name=group4]').val();
  
    if(datefrom == "undefined--undefined" && dateto == "undefined--undefined"){
        $('#hd_search_from').val("");
        $('#hd_search_to').val("");
        datefrom = "";
        dateto = "";
        $('#hd_groupfield').val(g1);
        $('#hd_groupfield2').val(g2);
        $('#hd_groupfield3').val(g3);
        $('#hd_groupfield4').val(g4);
    }else{
        $('#hd_search_from').val(datefrom);
        $('#hd_search_to').val(dateto);
        $('#hd_groupfield').val(g1);
        $('#hd_groupfield2').val(g2);
        $('#hd_groupfield3').val(g3);
        $('#hd_groupfield4').val(g4);
    }

    var myData = {g1:g1,g2:g2,g3:g3,g4:g4,datefrom:datefrom,dateto:dateto};
	$('#tblforfgs').html("");
	$.post("<?php echo e(url('/fgsdbgroupby')); ?>",
	{
		_token:$('meta[name=csrf-token]').attr('content'),
		data:myData
	}).done(function(data, textStatus, jqXHR){
		console.log(data);
        $('#hd_search_from').val(datefrom);
        $('#hd_search_to').val(dateto);
        $('#hd_groupfield').val(g1);
        $('#hd_groupfield2').val(g2);
        $('#hd_groupfield3').val(g3);
        $('#hd_groupfield4').val(g4);
		$.each(data,function(i,val){
			var tblrow = '<tr>'+
						'<td>'+
						    '<input type="checkbox" class="form-control input-sm checkboxes" value="'+val.id+'" name="checkitem" id="checkitem"></input> '+
						'</td>'+                        
						'<td style="width: 5%">'+           
						    '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+ '|' +val.date+ '|' +val.po_no+ '|' +device_name+'|'+val.qty+'|'+val.total_num_of_lots+'">'+
						    
						        '   <i class="fa fa-edit"></i> '+
						    '</button>'+
						'</td>'+
						'<td>'+val.id+'</td>'+
                        '<td>'+val.date+'</td>'+
                        '<td>'+val.po_no+'</td>'+
                        '<td>'+val.device_name+'</td>'+
                        '<td>'+val.qty+'</td>'+
                        '<td>'+val.total_num_of_lots+'</td>'+
					'</tr>';
			$('#tblforfgs').append(tblrow);			
			$('.edit-task').on('click', function(e) {
		       	$('#AddNewModal').modal('show');
		       	$('#hd_status').val("EDIT");
		        var edittext = $(this).val().split('|');
		        var editid = data[0]['id'];
		        $('#date').val(data[0]['date']);
				$('#po_no').val(data[0]['po_no']);
				$('#device_name').val(data[0]['device_name']);
				$('#quantity').val(data[0]['qty']);
				$('#total_lots').val(data[0]['total_num_of_lots']);
				$('#dbcon').val("<?php echo e(Auth::user()->productline); ?>");
				$('#id').val(editid);  
		    });
		});
	
	}).fail(function(jqXHR, textStatus, errorThrown){
		console.log(errorThrown+'|'+textStatus);
	});
}
function searchby(){
    var datefrom = $('#search_from').val();
    var dateto = $('#search_to').val();
    var pono = $('#search_pono').val();
    if(datefrom == ""){     
        $('#er_search_from').html("Date From field is empty"); 
        $('#er_search_from').css('color', 'red');       
        return false;  
    }
    if(dateto == ""){     
        $('#er_search_to').html("Search To field is empty"); 
        $('#er_search_to').css('color', 'red');       
        return false;  
    }
    $('#tblforfgs').html("");
    $.get("<?php echo e(url('/fgssearchby')); ?>",
    {
        _token:$('meta[name=csrf-token]').attr('content'),
        datefrom:datefrom,
        dateto:dateto,
        pono:pono
    }).done(function(data, textStatus, jqXHR){
        console.log(data);
        $('#hd_search_from').val(datefrom);
        $('#hd_search_to').val(dateto);
        $('#hd_search_pono').val(pono);
        $.each(data,function(i,val){
            var tblrow = '<tr>'+
						'<td>'+
						    '<input type="checkbox" class="form-control input-sm checkboxes" value="'+val.id+'" name="checkitem" id="checkitem"></input> '+
						'</td>'+                        
						'<td style="width: 5%">'+           
						    '<button type="button" name="edit-task" class="btn btn-sm btn-primary edit-task" value="'+val.id+ '|' +val.date+ '|' +val.po_no+ '|' +device_name+'|'+val.qty+'|'+val.total_num_of_lots+'">'+
						        '   <i class="fa fa-edit"></i> '+
						    '</button>'+
						'</td>'+
						'<td>'+val.id+'</td>'+
                        '<td>'+val.date+'</td>'+
                        '<td>'+val.po_no+'</td>'+
                        '<td>'+val.device_name+'</td>'+
                        '<td>'+val.qty+'</td>'+
                        '<td>'+val.total_num_of_lots+'</td>'+
					'</tr>';
			$('#tblforfgs').append(tblrow);			
            
        });

    }).fail(function(jqXHR, errorThrown, textStatus){
        console.log(errorThrown+'|'+textStatus);
    });
}

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>