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
            height: 200px;
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
        table.table-fifo>tbody {
            overflow-y: scroll;
            height: 375px;
        }
    </style>
<?php $__env->stopPush(); ?>

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
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-navicon"></i>  WBS Warehouse Material Issuance
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">

									<?php
										$act = 0;
										if(isset($active_tab)){

											if($active_tab == '1'){ $act = 1;}
											if($active_tab == '0'){ $act = 0;}
										}
									?>
									<input type="hidden" name="name" value="<?php echo e($act); ?>" id="active">

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tabbable-custom">
                                                    <ul class="nav nav-tabs nav-tabs-lg" id="tabslist" role="tablist">
                                                        <li class="<?php if(isset($active_tab)){ if($active_tab == 0){ echo 'active';} }?>" id="summarytab">
                                                            <a href="#requestsummary" data-toggle="tab" aria-expanded="true" id="summarytabtoggle">Request Summary</a>
                                                        </li>
                                                        <li class="<?php if(isset($active_tab)){ if($active_tab == 1){ echo 'active';} }?>" id="issuancetab">
                                                            <a href="#issuance" data-toggle="tab" aria-expanded="true" >Issuance</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content" id="tab-subcontents">
                                                        <div class="tab-pane fade in <?php if(isset($active_tab)){ if($active_tab == 0){ echo 'active';} }?>" id="requestsummary">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-fixedheader table-striped" style="font-size:10px">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td style="width:6%;"></td>
                                                                                    <td style="width:11%;">Transaction No.</td>
                                                                                    <td style="width:10%;">Date Created</td>
                                                                                    <td style="width:11%;">PO No.</td>
                                                                                    <td style="width:11%;">Destination</td>
                                                                                    <td style="width:10%;">Line</td>
                                                                                    <td style="width:10%;">Status</td>
                                                                                    <td style="width:10%;">Requested By</td>
                                                                                    <td style="width:10%;">Last Served By</td>
                                                                                    <td style="width:11%;">Last Served Date</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tblSummary" style="font-size:10px">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-fixedheader table-striped" style="font-size:10px">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td style="width:5.1%;" class="text-center">
                                                                                    	<input type="checkbox" class="details_check" value="">
                                                                                    </td>
                                                                                    <td style="width:11.1%;">Detail ID</td>
                                                                                    <td style="width:11.1%;">Item/Part No.</td>
                                                                                    <td style="width:17.1%;">Item Description</td>
																					<td style="width:11.1%;">Classification</td>
                                                                                    <td style="width:11.1%;">Issued Qty.(Kitting)</td>
                                                                                    <td style="width:11.1%;">Request Qty.</td>
                                                                                    <td style="width:11.1%;">Served Qty.</td>
                                                                                    <td style="width:11.1%;">Served Date</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tblViewDetail" style="font-size:10px">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>

																	<br>
																	<div class="col-md-12 text-center">
																		<a href="javascript:;" class="btn green btn-sm" id="btn_addToIssuance" disabled="true">
																			<i class="fa fa-plus"></i> Add
																		</a>
																		<input type="hidden" id="total_req_qty" name="total_req_qty">
																		<input type="hidden" id="req_status" name="req_status">
																	</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade in <?php if(isset($active_tab)){ if($active_tab == 1){ echo 'active';} }?>" id="issuance">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                               		 <form>

                                                               			 <div class="col-md-4">
                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-4">Issuance No.</label>
                                                               					 <div class="col-sm-4">
                                                                                    <?php if(isset($wm_data)): ?>
                                                                                    <?php foreach($wm_data as $wmdata): ?>
                                                                                    <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                                    <input type="hidden" class="form-control input-sm" id="recid" name="recid" value="<?php if(isset($wmdata)){echo $wmdata->id; } ?>" />
                                                                                    <input type="hidden" class="form-control input-sm" id="action" name="action" value="<?php if(isset($action)){echo $action; } ?>" />
                                                               						<input type="text" class="form-control input-sm clear" id="issuancenowhs" name="issuancenowhs">
                                                               					 </div>
                                                               					 <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px;">
                                                               						 <div class="btn-group btn-group-sm btn-group-circle">
                                                                                        <a href="javascript:navigate('first');" id="btn_min" class="btn blue input-sm"><i class="fa fa-fast-backward"></i></a>
                                                                                        <a href="javascript:navigate('prev');" id="btn_prv" class="btn blue input-sm"><i class="fa fa-backward"></i></a>
                                                                                        <a href="javascript:navigate('next');" id="btn_nxt" class="btn blue input-sm"><i class="fa fa-forward"></i></a>
                                                                                        <a href="javascript:navigate('last');" id="btn_max" class="btn blue input-sm"><i class="fa fa-fast-forward"></i></a>
                                                               						 </div>
                                                               					 </div>
                                                               				 </div>
                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-4">Request No.</label>
                                                               					 <div class="col-sm-4">
                                                               						 <input type="text" class="form-control input-sm clear" id="reqno" name="reqno" disabled="disable">
                                                               					 </div>
                                                               				 </div>
                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-4">Status</label>
                                                               					 <div class="col-sm-4">
                                                               						 <input type="text" class="form-control input-sm clear" id="statuswhs" name="statuswhs" disabled="disable">
                                                               					 </div>
                                                               				 </div>
                                                               			 </div>

                                                               			 <div class="col-md-4">
                                                                             <div class="form-group row">
                                                                                 <label class="control-label col-sm-3">Created By</label>
                                                                                 <div class="col-sm-5">
                                                                                     <input type="text" class="form-control input-sm clear" id="createdbywhs" name="createdbywhs" disabled="disable">
                                                                                 </div>
                                                                             </div>
                                                                             <div class="form-group row">
                                                                                 <label class="control-label col-sm-3">Created Date.</label>
                                                                                 <div class="col-sm-5">
                                                                                     <input class="form-control input-sm clear date-picker" size="16" type="text" name="createddatewhs" id="createddatewhs" disabled="disable"/>
                                                                                 </div>
                                                                             </div>
                                                                             <div class="form-group row">
                                                               					 <label class="control-label col-sm-4">Total Request Qty</label>
                                                               					 <div class="col-sm-4">
                                                               						 <input type="text" class="form-control input-sm clear" id="totreqqty" name="totreqqty" disabled="disable">
                                                               					 </div>
                                                               				 </div>
                                                               			 </div>

                                                               			 <div class="col-md-4">

                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-3">Updated By</label>
                                                               					 <div class="col-sm-5">
                                                               						 <input type="text" class="form-control input-sm clear" id="updatedbywhs" name="updatedbywhs" disabled="disable">
                                                               					 </div>
                                                               				 </div>
                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-3">Updated Date</label>
                                                               					 <div class="col-sm-5">
                                                               						<input class="form-control input-sm clear date-picker" size="16" type="text" name="updateddatewhs" id="updateddatewhs" disabled="disable"/>
                                                               						<input type="hidden" class="add" id="hd_barcode" name="hd_barcode" />
                                                               						<input type="hidden" class="add" id="hd_status" name="hd_status" />
                                                               					 </div>
                                                               				 </div>
                                                               			 </div>

                                                               		 </form>
                                                               	 </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="portlet box">
                                                                                <div class="portlet-body">

                                                                                    <div class="row">
                                                                                        <div class="col-sm-12">
                                                                                            <table class="table table-bordered table-fixedheader table-striped" style="font-size:10px">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td style="width:100%;" class="text-center" colspan="9">Details</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <?php /* <td style="width:10px;">
                                                                                                            <input type="checkbox" class="checkboxes" value="1"/>
                                                                                                        </td> */ ?>
                                                                                                        <td style="width:4.5%;"></td>
                                                                                                        <td style="width:12.5%;">Detail ID</td>
                                                                                                        <td style="width:12.5%;">Item/Part No.</td>
                                                                                                        <td style="width:19.8%;">Item Description</td>
                                                                                                        <td style="width:12.4%;">Issued Qty.(Others)</td>
                                                                                                        <td style="width:12.5%;">Issued Qty.(This)</td>
                                                                                                        <td style="width:12.5%;">Lot No.</td>
                                                                                                        <td style="width:12.5%;">Location</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="tblIssuance">

                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>

                                                                                    <?php /* <div class="row">
                                                                                        <div class="col-md-4 col-md-offset-5">
                                                                                            <button class="btn red input-sm" id="btn_deleteAll" style="font-size:12px;">
                                                                                                <i class="fa fa-trash"></i> Delete Detail
                                                                                            </button>
                                                                                        </div>
                                                                                    </div> */ ?>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
																		<div class="col-md-12 text-center">
																		  	<a href="javascript:;" style="font-size:12px;" class="btn blue-madison input-sm" id="btn_save" <?php echo($state); ?> >
																		    	<i class="fa fa-floppy-o"></i> Save
																			</a>
																			<a href="javascript:;" style="font-size:12px;" class="btn blue-madison input-sm" id="btn_edit" <?php echo($state); ?> >
																			    <i class="fa fa-pencil"></i> Edit
																			</a>
																			<a href="javascript:;" style="font-size:12px;" class="btn red input-sm" id="btn_cancel" <?php echo($state); ?> >
																			    <i class="fa fa-trash"></i> Cancel
																			</a>
																			<a href="javascript:;" style="font-size:12px;" class="btn red-intense input-sm" id="btn_discard" <?php echo($state); ?> >
																			    <i class="fa fa-times"></i> Discard Changes
																			</a>
																		  	<button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" class="btn blue-steel input-sm" id="btn_search" >
																		    	<i class="fa fa-search"></i> Search
																		  	</button>
																		  	<!-- <button type="button" style="font-size:12px; <?php if(isset($wmdata)){ if($wmdata->status == 'Cancelled') { echo 'display:none;'; } } ?><?php if($action!='VIEW'){ echo 'display:none;'; } ?>" id="btn_report_excel" class="btn yellow-gold input-sm" id="btn_print" <?php echo($state); ?>  <?php echo($state); ?>>
																		    	<i class="fa fa-file-excel-o"></i> Export to Excel
																		  	</button> -->
																		  	<button type="button" style="font-size:12px;" id="btn_report_excel" class="btn yellow-gold input-sm" 
																		    	<i class="fa fa-file-excel-o"></i> Export to Excel
																		  	</button>
																		</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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


    <!-- add details -->
    <div id="addDetModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog gray-gallery modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Add Details</h4>
                </div>
				<form class="form-horizontal">
	                <div class="modal-body">
	                    <div class="row">
	                        <div class="col-md-6">
	                                <div class="form-group">
	                                    <div class="col-sm-12">
	                                       <p>
	                                           All fields are required.
	                                       </p>
	                                    </div>
	                                </div>
									<input type="hidden" name="transno" id="transno">
									<input type="hidden" name="hdnstatus" id="hdnstatus">
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Detail ID.</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="issueDetID" name="issueDetID" disabled="true">
											<input type="hidden" id="issueDetID1" name="issueDetID1">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Item/Part No.</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="itemnodet" name="itemnodet" disabled="true">
											<input type="hidden" id="itemnodet1" name="itemnodet1">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Item Description</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="itemdesc" name="itemdesc" disabled="true">
											<input type="hidden" id="itemdesc1" name="itemdesc1">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Request Detail ID</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="reqdetid" name="reqdetid" disabled="true">
											<input type="hidden" id="reqdetid1" name="reqdetid1">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Request Qty.</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="reqqtydet" name="reqqtydet" disabled="true">
											<input type="hidden" id="reqqtydet1" name="reqqtydet1">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Served Qty.</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="servedqtydet" name="servedqtydet" disabled="true">
											<input type="hidden" id="servedqtydet1" name="servedqtydet1">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Issued Qty.</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="issqtydet" name="issqtydet" readonly>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Lot. No</label>
	                                    <div class="col-sm-9">
	                                       <input type="text" class="form-control input-sm" id="lotnodet" name="lotnodet">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="control-label col-sm-3">Location</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control input-sm" id="locdet" name="locdet" disabled="true">
											<input type="hidden" id="locdet1" name="locdet1">
	                                    </div>
	                                </div>

	                        </div>

	                        <div class="col-md-6">
	                        	<div class="table-responsive">
									<table class="table table-bordered table-fixedheader table-striped table-fifo" style="font-size:10px">
										<thead>
											<tr>
												<td style="width: 9.66%"></td>
												<td style="width: 16.66%">Item Code</td>
												<td style="width: 24.66%">Description</td>
												<td style="width: 15.66%">Qty</td>
												<td style="width: 16.66%">Lot</td>
												<td style="width: 16.66%">Received Date</td>
											</tr>
										</thead>
										<tbody id="tblfifoAdd"></tbody>
									</table>
								</div>
	                        </div>
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <a href="javascript:;" id="btn_saveAddDetail" class="btn btn-success">Save</a>
	                    <button type="button" id="addDet_close" data-dismiss="modal" class="btn btn-danger">Close</button>
	                </div>
				</form>
            </div>
        </div>
    </div>

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

	<!-- Cancel Confirmation Pop-message -->
	<div id="deleteModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm blue">
			<form role="form" method="POST" action="<?php echo e(url('/wbswmi-cancel')); ?>">
				<div class="modal-content ">
					<div class="modal-body">
						<p>Are you sure you want to cancel this transaction?</p>
						<?php echo csrf_field(); ?>

						<input type="hidden" name="id" id="delete_inputId"/>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" id="delete">Yes</button>
						<button type="button" data-dismiss="modal" class="btn">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!--msg-->
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

	<!--msg-->
	<div id="msgdone" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 id="titledone" class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p id="err_msgdone"></p>
				</div>
				<div class="modal-footer">
					<a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="btn btn-danger">Close</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Search Modal -->
	<div id="searchModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content blue">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Issuance No.</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_issuanceno" placeholder="Issuance No." name="srch_issuanceno" autofocus <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Request No.</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" id="srch_reqno" placeholder="Request No." name="srch_reqno" autofocus <?php echo($readonly); ?> />
									</div>
								</div>
								<div class="form-group">
									<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Status</label>
									<div class="col-md-8">
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Serving" id="srch_serving" name="Alert" checked="true"/>Alert</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Closed" id="srch_close" id="search_close" name="Close"/>Close</label>
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-fixedheader" style="font-size:10px">
									<thead>
										<tr>
											<td style="width: 8.5%"></td>
											<td style="width: 14.5%">Issuance No.</td>
											<td style="width: 14.5%">Request No.</td>
											<td style="width: 12.5%">Status</td>
											<td style="width: 12.5%">Created By</td>
											<td style="width: 12.5%">Created Date</td>
											<td style="width: 12.5%">Updated By</td>
											<td style="width: 12.5%">Updated Date</td>
										</tr>
									</thead>
									<tbody id="srch_tbl_body">
									</tbody>
								</table>
							</div>
								
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" class="form-control input-sm" id="editId" name="editId">
					<button type="button" style="font-size:12px" onclick="javascript: filterData('SRCH'); " class="btn blue-madison"><i class="glyphicon glyphicon-filter"></i> Filter</button>
					<button type="button" style="font-size:12px" onclick="javascript: filterData('CNCL'); " class="btn green" ><i class="glyphicon glyphicon-repeat"></i> Reset</button>
					<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	loadMassAlert();
	loadLatestIssuance();
	setControl('');
	$( document ).ready(function(e) {
		setInterval(function(){
			loadMassAlert() // this will run after every 5 seconds
		}, 5000);

		focusbarcode();
		$('#hd_status').val("focus");
		$('#tblSummary').on('click', '.viewdetails', function() {
			var transno = $(this).attr('data-transno');
			var status = $(this).attr('data-status');
			checkIfNotClose(transno);
			viewDetails(e,transno,status);
		});

		$('#tblViewDetail').on('change', $('.smdetailschk'), function() {
			isCheck($('.smdetailschk'));
		});

		$('.details_check').on('change', function(e) {
			$('input:checkbox.smdetailschk').not(this).prop('checked', this.checked);
			isCheck($('.smdetailschk'));
		});

		

		$('#btn_search').click(function(){
			$('#hd_status').val("search");
		});


		$('#btn_addToIssuance').on('click', function() {
			clearIssuance();
			var detid = [];
			var id = [];
			$(".smdetailschk:checked").each(function() {
				detid.push($(this).attr('data-detailid'));
				id.push($(this).attr('data-id'));
			});

			var whstransno = $('#viewdetailchk'+detid).attr('data-whstransno');
			var transno = $('#viewdetailchk'+detid).attr('data-transno');
			var status = $('#viewdetailchk'+detid).attr('data-stats');
			var req_status = $('#req_status').val();
			var total_req_qty = $('#total_req_qty').val();
			var cd = getDate();
			var cu = "<?php echo e(Auth::user()->user_id); ?>";
			var tblIssuance = "";

			$('#issuancenowhs').val(whstransno);
			$('#reqno').val(transno);
			$('#statuswhs').val(status);
			$('#createdbywhs').val(cu);
			$('#createddatewhs').val(cd);
			$('#updatedbywhs').val(cu);
			$('#updateddatewhs').val(cd);
			$('#totreqqty').val(total_req_qty);

			var issueDetID = 1;
			if (req_status == 'Serving') {
				var url = "<?php echo e(url('/wbswhsserving')); ?>";
				var token = "<?php echo e(Session::token()); ?>";
				var data = {
					_token: token,
					whstransno: whstransno,
					reqtransno: transno,
				};

				$.ajax({
					url: url,
					method: 'GET',
					data:  data,
				}).done( function(data, textStatus, jqXHR) {
					$.each(data, function(i,x) {
						 tblIssuance = '<tr>'+
										'<td style="width:4.5%;">'+
											// '<a href="javascript:;" class="btn btn-circle green btn-sm addissuanceDetails"'+
											// 'id="addissuance" data-transno="'+transno+'" data-whstransno="'+whstransno+'" data-issDetailid="'+issueDetID+'" '+
											// 'data-code="'+x.item+'" data-name="'+x.item_desc+'" data-requestqty="'+x.request_qty+'" data-stats="'+x.status+'"'+
											// 'data-servedqty="'+x.issued_qty_t+'" data-location="'+x.location+'" data-issuedkit="'+x.issued_qty_o+'">'+
											// 	'<i class="fa fa-plus"></i>'+
											// '</a>'+
										'</td>'+
										'<td style="width:12.5%;">'+issueDetID+
										'</td>'+
										'<td style="width:12.5%;">'+x.item+
										'</td>'+
										'<td style="width:20.5%;">'+x.item_desc+
										'</td>'+
										'<td style="width:12.5%;">'+x.issued_qty_o+
										'</td>'+
										'<td style="width:12.5%;" id="issqtytd'+issueDetID+'">'+x.issued_qty_t+
										'</td>'+
										'<td style="width:12.5%;" id="lottd'+issueDetID+'">'+x.lot_no+
										'</td>'+
										'<td style="width:12.5%;">'+x.location+
										'</td>'+
									'</tr>';
						$('#tblIssuance').append(tblIssuance);
						issueDetID++;
					});

					$.each(detid, function(i,ids) {
						//var issueDetID = $('#viewdetailchk'+ids).attr('data-issDetailid');
						var itemnodet = $('#viewdetailchk'+ids).attr('data-code');
						var itemdesc = $('#viewdetailchk'+ids).attr('data-name');
						var issuedkit = $('#viewdetailchk'+ids).attr('data-issuedkit');
						var locdet = $('#viewdetailchk'+ids).attr('data-location');
						var requestqty = $('#viewdetailchk'+ids).attr('data-requestqty');
						var servedqty = $('#viewdetailchk'+ids).attr('data-servedqty');

						tblIssuance = '<tr>'+
											'<td style="width:4.5%;" class="text-center">'+
												'<a href="javascript:;" class="btn btn-circle green btn-sm addissuanceDetails"'+
												'id="addissuance" data-transno="'+transno+'" data-whstransno="'+whstransno+'" data-issDetailid="'+issueDetID+'" '+
												'data-code="'+itemnodet+'" data-name="'+itemdesc+'" data-requestqty="'+requestqty+'" data-stats="'+status+'"'+
												'data-servedqty="'+servedqty+'" data-location="'+locdet+'" data-issuedkit="'+issuedkit+'">'+
													'<i class="fa fa-plus"></i>'+
												'</a>'+
											'</td>'+
											'<td style="width:12.5%;">'+issueDetID+
												'<input type="hidden" name="detid[]" value="'+issueDetID+'">'+
											'</td>'+
											'<td style="width:12.5%;">'+itemnodet+
												'<input type="hidden" name="itemiss[]" value="'+itemnodet+'">'+
											'</td>'+
											'<td style="width:20.5%;">'+itemdesc+
												'<input type="hidden" name="itemdesciss[]" value="'+itemdesc+'">'+
											'</td>'+
											'<td style="width:12.5%;">'+issuedkit+
												'<input type="hidden" name="issuedkit[]" value="'+issuedkit+'">'+
											'</td>'+
											'<td style="width:12.5%;" id="issqtytd'+issueDetID+'">'+
												'<input type="hidden" name="qtyiss[]" id="issqty'+issueDetID+'">'+
											'</td>'+
											'<td style="width:12.5%;" id="lottd'+issueDetID+'">'+
												'<input type="hidden" name="lotiss[]" id="lot'+issueDetID+'">'+
											'</td>'+
											'<td style="width:12.5%;">'+locdet+
												'<input type="hidden" name="lociss[]" value="'+locdet+'">'+
												'<input type="hidden" name="requestqty[]" value="'+requestqty+'"/>'+
												'<input type="hidden" name="sqty[]" value="'+servedqty+'"/>'+
												'<input type="hidden" name="id[]" value="'+id[i]+'"/>'+
												'<input type="hidden" name="newentry[]" value="'+id[i]+'"/>'+
											'</td>'+
										'</tr>';
						$('#tblIssuance').append(tblIssuance);
						issueDetID++;

					});
				}).fail( function() {
					alert('error')
				});
			} else {
				$.each(detid, function(i,ids) {
					//var issueDetID = $('#viewdetailchk'+ids).attr('data-issDetailid');
					var itemnodet = $('#viewdetailchk'+ids).attr('data-code');
					var itemdesc = $('#viewdetailchk'+ids).attr('data-name');
					var issuedkit = $('#viewdetailchk'+ids).attr('data-issuedkit');
					var locdet = $('#viewdetailchk'+ids).attr('data-location');
					var requestqty = $('#viewdetailchk'+ids).attr('data-requestqty');
					var servedqty = $('#viewdetailchk'+ids).attr('data-servedqty');

					tblIssuance = '<tr>'+
										'<td style="width:4.5%;" class="text-center">'+
											'<a href="javascript:;" class="btn btn-circle green btn-sm addissuanceDetails"'+
											'id="addissuance" data-transno="'+transno+'" data-whstransno="'+whstransno+'" data-issDetailid="'+issueDetID+'" '+
											'data-code="'+itemnodet+'" data-name="'+itemdesc+'" data-requestqty="'+requestqty+'" data-stats="'+status+'"'+
											'data-servedqty="'+servedqty+'" data-location="'+locdet+'" data-issuedkit="'+issuedkit+'">'+
												'<i class="fa fa-plus"></i>'+
											'</a>'+
										'</td>'+
										'<td style="width:12.5%;">'+issueDetID+
											'<input type="hidden" name="detid[]" value="'+issueDetID+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+itemnodet+
											'<input type="hidden" name="itemiss[]" value="'+itemnodet+'">'+
										'</td>'+
										'<td style="width:20.5%;">'+itemdesc+
											'<input type="hidden" name="itemdesciss[]" value="'+itemdesc+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+issuedkit+
											'<input type="hidden" name="issuedkit[]" value="'+issuedkit+'">'+
										'</td>'+
										'<td style="width:12.5%;" id="issqtytd'+issueDetID+'">'+
											'<input type="hidden" name="qtyiss[]" id="issqty'+issueDetID+'">'+
										'</td>'+
										'<td style="width:12.5%;" id="lottd'+issueDetID+'">'+
											'<input type="hidden" name="lotiss[]" id="lot'+issueDetID+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+locdet+
											'<input type="hidden" name="lociss[]" value="'+locdet+'">'+
											'<input type="hidden" name="requestqty[]" value="'+requestqty+'"/>'+
											'<input type="hidden" name="sqty[]" value="'+servedqty+'"/>'+
											'<input type="hidden" name="id[]" value="'+id[i]+'"/>'+
											'<input type="hidden" name="newentry[]" value="'+id[i]+'"/>'+
										'</td>'+
									'</tr>';
					$('#tblIssuance').append(tblIssuance);
					issueDetID++;

				});
			}
			
			setControl('ADD');
			switchTabs();
		});

		$('#tblIssuance').on('click', '.addissuanceDetails', function(e) {
			//declaration of variables
			
			var issDetailid = $(this).attr('data-issDetailid');
			var detailid = $(this).attr('data-detailid');
			var code = $(this).attr('data-code');
			var name = $(this).attr('data-name');
			var issuedkit = $(this).attr('data-issuedkit');
			var requestqty = $(this).attr('data-requestqty');
			var servedqty = $(this).attr('data-servedqty');
			var location = $(this).attr('data-location');
			var trnsno = $(this).attr('data-transno');
			var stats = $(this).attr('data-stats');

			var issuedqty = parseFloat(requestqty) - parseFloat(servedqty);

			loadfifo(code,$('#tblfifoAdd'));

			//assign values
			$('#issueDetID').val(issDetailid);
			$('#issueDetID1').val(issDetailid);

			$('#reqdetid').val(detailid);
			$('#reqdetid1').val(detailid);

			$('#itemnodet').val(code);
			$('#itemnodet1').val(code);

			$('#itemdesc').val(name);
			$('#itemdesc1').val(name);

			$('#reqqtydet').val(requestqty);
			$('#reqqtydet1').val(requestqty);

			$('#servedqtydet').val(servedqty);
			$('#servedqtydet1').val(servedqty);

			$('#locdet').val(location);
			$('#locdet1').val(location);

			$('#issqtydet').val(issuedqty);
			$('#isskitqty').val(issuedkit);

			$('#rs_transno').val(trnsno);
			$('#rs_status').val(stats);

			$('#addDetModal').modal('show');
		});

		$('#tblfifoAdd').on('click', '.btn_select_lot', function() {
			var lotno = $(this).attr('data-lotno');
			var qty = $(this).attr('data-qty');
			$('#lotnodet').val(lotno);
			$('#issqtydet').val(qty);
			$('#hd_barcode').blur();
		});

		$('#lotnodet').on('change',function(){
			var lotno = $('.btn_select_lot').attr('data-lotno');
			var qty = $('.btn_select_lot').attr('data-qty');
			$('#lotnodet').val(lotno);
			$('#issqtydet').val(qty);
			$('#hd_barcode').blur();
		});

		$('#tblIssuance').on('click', '#addissuance', function() {

			$('#hd_status').val("add");
			$('#lotnodet').val('');
			$('#issqtydet').val('');

			$('#addDetModal').on('shown.bs.modal',function(){
				$('#lotnodet').focus();		
			});	
		});

		$('#addDet_close').click(function(){
			focusbarcode();
			$('#hd_status').val("focus");
			
		});

		$('#search_close').click(function(){
			$('#hd_status').val("focus");
			focusbarcode();
		});


		//barcode scanning fire--------------
		$('#hd_barcode').change(function(){
 			$('#addDetModal').modal('show');
 			$('#hd_status').val("add");
			if($('#hd_status').val() == "add"){
			  	$('body').click(function(){
			  		$('#hd_barcode').blur();  	
			  	}); 	
	    	}
	   		
			$('#addDetModal').on('shown.bs.modal',function(){
				$('#lotnodet').focus();		
			});	
		
 			var barcode = $('#hd_barcode').val();
 			var issuanceno = $('#issuancenowhs').val();
 			loadbarcodefifo(issuanceno,barcode,$('#tblfifoAdd'));
 			var formUrl = "<?php echo e(url('/getmatbarcode')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token:token,
				barcode:barcode,
			};

			//
			$.ajax({
				url:formUrl,
				method:'GET',
				data:formData,
				dataType: "JSON"
			}).done(function(data, textstatus, jqXHR){
				console.log(data);
 				$('#issueDetID').val(data.id);
 				$('#itemnodet').val(data.item);
 				$('#itemdesc').val(data.item_desc);
 				$('#reqqtydet').val(data.request_qty);
 				$('#servedqtydet').val(data.issued_qty_t);
 				$('#locdet').val(data.location);
 				$('#issqtydet').val("");
 				$('#lotnodet').val("");

 			}).fail(function(jqXHR,textStatus,errorThrown){
				console.log(errorThrown+'|'+textStatus);
			});
 		});

		$('#btn_saveAddDetail').on('click', function() {
			var issueDetID = $('#issueDetID').val();
			var itemnodet = $('#itemnodet').val();
			var itemdesc = $('#itemdesc').val();
			var reqdetid = $('#reqdetid').val();
			var reqqtydet = $('#reqqtydet').val();
			var servedqtydet = $('#servedqtydet').val();
			var issqtydet = $('#issqtydet').val();
			var lotnodet = $('#lotnodet').val();
			var locdet = $('#locdet').val();
			var issuedkit = $('#isskitqty').val();
			var transno = $('#rs_transno').val();
			var status = $('#rs_status').val();
			var cd = getDate();
			var cu = "<?php echo e(Auth::user()->user_id); ?>";
			var tblIssuance = "";

			// $('#reqno').val(transno);
			// $('#statuswhs').val(status);
			// $('#createdbywhs').val(cu);
			// $('#createddatewhs').val(cd);
			// $('#updatedbywhs').val(cu);
			// $('#updateddatewhs').val(cd);

			$('#issqtytd'+issueDetID).html(issqtydet+'<input type="hidden" name="qtyiss[]" id="issqty'+issueDetID+'">');
			$('#issqty'+issueDetID).val(issqtydet);
			$('#lottd'+issueDetID).html(lotnodet+'<input type="hidden" name="lotiss[]" id="lot'+issueDetID+'">');
			$('#lot'+issueDetID).val(lotnodet);



			$('#addDetModal').modal('hide');
		});

		$('#btn_save').on('click', function() {
			var url = "<?php echo e(url('/savewhsissuance')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				issuancenowhs: $('input[name=issuancenowhs]').val(),
				reqno: $('input[name=reqno]').val(),
				statuswhs: $('input[name=statuswhs]').val(),
				createdbywhs: $('input[name=createdbywhs]').val(),
				createddatewhs: $('input[name=createddatewhs]').val(),
				updatedbywhs: $('input[name=updatedbywhs]').val(),
				updateddatewhs: $('input[name=updateddatewhs]').val(),
				totreqqty: $('input[name=totreqqty]').val(),
				detid: $('input[name^="detid"]').map(function(){return $(this).val();}).get(),
				itemiss: $('input[name^="itemiss"]').map(function(){return $(this).val();}).get(),
				itemdesciss: $('input[name^="itemdesciss"]').map(function(){return $(this).val();}).get(),
				issuedkit: $('input[name^="issuedkit"]').map(function(){return $(this).val();}).get(),
				qtyiss: $('input[name^="qtyiss"]').map(function(){return $(this).val();}).get(),
				lotiss: $('input[name^="lotiss"]').map(function(){return $(this).val();}).get(),
				lociss: $('input[name^="lociss"]').map(function(){return $(this).val();}).get(),
				requestqty: $('input[name^="requestqty"]').map(function(){return $(this).val();}).get(),
				sqty: $('input[name^="sqty"]').map(function(){return $(this).val();}).get(),
				id: $('input[name^="id"]').map(function(){return $(this).val();}).get(),
				newentry: $('input[name^="newentry"]').map(function(){return $(this).val();}).get(),
			};


			$.ajax({
				url: url,
				type: "POST",
				data: data,
			}).done( function(data, textStatus, jqXHR) {
				//alert(data);
				$('input[name=issuancenowhs]').val('');
				$('input[name=reqno]').val('');
				$('input[name=statuswhs]').val('');
				$('input[name=createdbywhs]').val('');
				$('input[name=createddatewhs]').val('');
				$('input[name=updatedbywhs]').val('');
				$('input[name=updateddatewhs]').val('');

				loadMassAlert();

				$('#msgdone').modal('show');
				$('#titledone').html('<strong><i class="fa fa-exclamation-circle"></i></strong> Success!')
				$('#err_msgdone').html(data.msg);
			}).fail( function(data, textStatus, jqXHR) {
				console.log(data);
				//alert('error');
				$('#msg').modal('show');
				$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
				$('#err_msg').html("There's some error while processing.");
			});
		});

		$('#btn_edit').on('click', function() {
			setControl('EDIT');
		});

		$('#btn_cancel').on('click', function() {
			var url = "<?php echo e(url('/whsissuancecancel')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				issuancenowhs: $('input[name=issuancenowhs]').val(),
				req_no: $('input[name=reqno]').val()
			};

			$.ajax({
				url: url,
				type: "POST",
				data: data,
			}).done( function(data, textStatus, jqXHR) {
				$('#msg').modal('show');
				$('#title').html('<strong><i class="fa fa-exclamation-circle"></i></strong> Success!')
				$('#err_msg').html(data.msg);
			}).fail( function(data, textStatus, jqXHR) {
				$('#msg').modal('show');
				$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
				$('#err_msg').html("There's some error while processing.");
			});
		});

		$('#btn_discard').on('click', function() {
			window.location.href="<?php echo e(url('/wbswhsmatissuance')); ?>";
		});

		$('#summarytab').on('click', function() {
			if ($('#summarytabtoggle').attr('data-toggle') != '') {
				$(this).addClass('active');
				$('#requestsummary').addClass('active');
				$('#issuancetab').removeClass('active');
				$('#issuance').removeClass('active');
			}
			
		});

		$('#issuancetab').on('click', function() {
			$(this).addClass('active');
			$('#issuance').addClass('active');
			$('#summarytab').removeClass('active');
			$('#requestsummary').removeClass('active');
			$('#hd_barcode').focus();
		});

		$('#btn_search').on('click', function() {
			$('#searchModal').modal('show');
		});

		$('#btn_report_excel').on('click',function(){
   			var issuanceno = $('#issuancenowhs').val();
			
			var url = "<?php echo e(url('/wbsWhsReport_Excel?issuanceno=')); ?>" + issuanceno;
			window.location.href = url;	
		
		});

		$('#srch_tbl_body').on('click','.btn_search_edit', function(){
			$('#tblViewDetail').html('');	
			var edittext =  $(this).val().split('|');
			var id = edittext[0];
			var issuanceno = edittext[1];
			var formURL = "<?php echo e(url('/getsearch_totqty')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				issuanceno : issuanceno,
				_token : token,
			};

			$.ajax({
				url: formURL,
				method: 'GET',
				data:  formData,
			}).done( function(data, textStatus, jqXHR) {
				$('#totreqqty').val(data[0]['qty']);
				
				
			}).fail( function(jqXHR, textStatus, errorThrown){
				console.log(errorThrown+'|'+textStatus)
			});
			
			var requestno = edittext[2];
			var status = edittext[3];
			var createuser = edittext[4];
			var createdat = edittext[5];
			var updateuser = edittext[6];
			var updatedat = edittext[7];

			$('#issuancenowhs').val(issuanceno);
			$('#reqno').val(requestno);
			$('#statuswhs').val(status);
			$('#createdbywhs').val(createuser);
			$('#createddatewhs').val(createdat);
			$('#updatedby').val(updateuser);
			$('#updateddatewhs').val(updatedat);
			$('#tblIssuance').html('');

			var url = "<?php echo e(url('/getsearch_viewDetails')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				issuanceno: issuanceno
			};


			$.ajax({
				url:url,
				method:'GET',
				data:data,
			}).done(function(data,textStatus,jqXHR){
				$.each(data, function(i,obj) {
					tblIssuance = '<tr>'+
										'<td style="width:4.5%;">'+
											'<a href="javascript:;" class="btn btn-circle green btn-sm addissuanceDetails"'+
											'id="addissuance" data-transno="'+obj.request_no+'" data-issDetailid="'+obj.detail_id+'" '+
											'data-code="'+obj.item+'" data-name="'+obj.item_desc+'" data-requestqty="'+obj.request_qty+'" data-stats="'+obj.status+'"'+
											'data-servedqty="'+obj.issued_qty_t+'" data-location="'+obj.location+'" data-issuedkit="'+obj.issued_qty_o+'" data-lotiss="'+obj.lot_no+'">'+
												'<i class="fa fa-plus"></i>'+
											'</a>'+
										'</td>'+
										'<td style="width:12.5%;">'+obj.detail_id+
											'<input type="hidden" name="detid[]" value="'+obj.detail_id+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+obj.item+
											'<input type="hidden" name="itemiss[]" value="'+obj.item+'">'+
										'</td>'+
										'<td style="width:20.5%;">'+obj.item_desc+
											'<input type="hidden" name="itemdesciss[]" value="'+obj.item_desc+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+obj.issued_qty_o+
											'<input type="hidden" name="issuedkit[]" value="'+obj.issued_qty_o+'">'+
										'</td>'+
										'<td style="width:12.5%;" id="issqtytd'+obj.detail_id+'">'+obj.issued_qty_t+
											'<input type="hidden" name="qtyiss[]" id="issqty'+obj.detail_id+'">'+
										'</td>'+
										'<td style="width:12.5%;" id="lottd'+obj.detail_id+'">'+obj.lot_no+
											'<input type="hidden" name="lotiss[]" id="lot'+obj.detail_id+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+obj.location+
											'<input type="hidden" name="lociss[]" value="'+obj.location+'">'+
											'<input type="hidden" name="requestqty[]" value="'+obj.request_qty+'"/>'+
											'<input type="hidden" name="sqty[]" value="'+obj.issued_qty_t+'"/>'+
											'<input type="hidden" name="id[]" value="'+obj.pmr_detail_id+'"/>'+
										'</td>'+
									'</tr>';
					$('#tblIssuance').append(tblIssuance);
				});
			}).fail(function(){	
				console.log(errorThrown+'|'+textStatus);
			});
		})
	});

	function loadMassAlert() {
		var formURL = "<?php echo e(url('/getmassalert')); ?>";
		var token = '<?php echo e(Session::token()); ?>';
		var formData = {
			_token : token,
		};
		var tblSummary = "";

		$.ajax({
			url: formURL,
			method: 'GET',
			data:  formData,
		}).done( function(data, textStatus, jqXHR) {
			$('#tblSummary').html('');
			var row = "", font = "";
			$.each(data, function(i,item) {
				if(item.status == 'Alert') {
					row = '#AA3939';
					font = '#fff';
				} else if(item.status == 'Closed'){
					row = '#26A69A';
					font = '#fff';
				} else if(item.status == 'Serving'){
					row = '#edb5c0';
					font = '#000';
				} else {
					row = '';
					font = '';
				}

				var lastservedby = item.lastservedby;
				var lastserveddate = item.lastserveddate;

				if (lastservedby == null) {
					lastservedby = '';
				}

				if (lastserveddate == null) {
					lastserveddate = '';
				}

				tblSummary = '<tr style="background-color:'+row+'; color:'+font+'">'+
								'<td style="width:6%;" class="text-center">'+
									'<a href="javascript:;" class="btn btn-circle btn-primary btn-sm viewdetails" data-transno="'+item.transno+'"'+
									 'data-status="'+item.status+'">'+
										'<i class="fa fa-search"></i>'+
									'</a>'+
								'</td>'+
								'<td style="width:11%;">'+item.transno+'</td>'+
								'<td style="width:10%;">'+item.created_at+'</td>'+
								'<td style="width:11%;">'+item.pono+'</td>'+
								'<td style="width:11%;">'+item.destination+'</td>'+
								'<td style="width:10%;">'+item.line+'</td>'+
								'<td style="width:10%;">'+item.status+'</td>'+
								'<td style="width:10%;">'+item.requestedby+'</td>'+
								'<td style="width:10%;">'+lastservedby+'</td>'+
								'<td style="width:11%;">'+lastserveddate+'</td>'+
							'</tr>'
				$('#tblSummary').append(tblSummary);
			});
		}).fail( function(data, textStatus, jqXHR) {

		});
	}

	function viewDetails(e,transno,status) {
		var formURL = "<?php echo e(url('/viewdetails')); ?>";
		var token = '<?php echo e(Session::token()); ?>';
		var formData = {
			transno : transno,
			_token : token,
		};
		var tblViewDetail = "";
		//e.preventDefault(); //Prevent Default action.
		$.ajax({
			url: formURL,
			method: 'POST',
			data:  formData,
		}).done( function(data, textStatus, jqXHR) {
			$('#tblViewDetail').html('');
			var cnt = 1;
			var locked = '';
			var total_req_qty = 0;
			
			$.each(data,function(i,details) {
				var checkbox = '';
				if (details.requestqty > details.servedqty) {
					checkbox = '<input type="checkbox" class="checkboxes smdetailschk" value="1" id="viewdetailchk'+details.detailid+'" data-id="'+details.id+'" data-transno="'+details.transno+'"'+
								' data-issDetailid="'+cnt+'" data-detailid="'+details.detailid+'"'+ 'data-whstransno="'+details.whstransno+'"'+ 'data-classification="'+details.classification+'"'+
								'data-code="'+details.code+'" data-name="'+details.name+'" data-requestqty="'+details.requestqty+'" data-stats="'+status+'"'+
								'data-servedqty="'+details.servedqty+'" data-location="'+details.location+'" data-issuedkit="'+details.issuedqty+'" '+locked+'/>';
				}
				tblViewDetail = '<tr>'+
									'<td style="width:5.1%;" class="text-center">'+checkbox+
										'<input type="hidden" name="det-issDetailid[]" id="det-issDetailid'+cnt+'"/>'+
									'</td>'+
									'<td style="width:11.1%;">'+details.detailid+
										'<input type="hidden" name="det-detailid[]" id="det-detailid'+cnt+'"/>'+
									'</td>'+
									'<td style="width:11.1%;">'+details.code+
										'<input type="hidden" name="det-code[]" id="det-code'+cnt+'"/>'+
									'</td>'+
									'<td style="width:17.1%;">'+details.name+
										'<input type="hidden" name="det-name[]" id="det-name'+cnt+'"/>'+
									'</td>'+
									'<td style="width:11.1%;">'+details.classification+
										'<input type="hidden" name="det-class[]" id="det-class'+cnt+'"/>'+
									'</td>'+
									'<td style="width:11.1%;">'+details.issuedqty+
										'<input type="hidden" name="det-issuedqty[]" id="det-issuedqty'+cnt+'"/>'+
									'</td>'+
									'<td style="width:11.1%;">'+details.requestqty+
										'<input type="hidden" name="det-requestqty[]" id="det-requestqty'+cnt+'"/>'+
									'</td>'+
									'<td style="width:11.1%;">'+details.servedqty+
										'<input type="hidden" name="det-servedqty[]" id="det-servedqty'+cnt+'"/>'+
										'<input type="hidden" name="det-lot[]" id="det-lot'+cnt+'"/>'+
										'<input type="hidden" name="det-location[]" id="det-location'+cnt+'"/>'+
									'</td>'+
									'<td style="width:11.1%;">'+details.created_at+'</td>'+
								'</tr>';
				total_req_qty = parseFloat(total_req_qty) + parseFloat(details.requestqty);
				$('#tblViewDetail').append(tblViewDetail);
				cnt++;
				$('#total_req_qty').val(total_req_qty);
			});
		}).fail(function(data, jqXHR, textStatus, errorThrown) {
			console.log(data);
		});
	}

	function switchTabs() {
		$('#summarytab').removeClass('active');
		$('#requestsummary').removeClass('active');
		//
		$('#issuancetab').addClass('active');
		$('#issuance').addClass('active');
		$('#summarytabtoggle').attr('data-toggle','');
	}

	function isCheck(element) {
		if(element.is(':checked')) {
			$('#btn_addToIssuance').removeAttr('disabled');
		} else {
			$('#btn_addToIssuance').attr('disabled','true');
		}
	}

	function checkIfNotClose(transno) {
		var formURL = "<?php echo e(url('/wbswhscheckifnotclose')); ?>";
		var token = '<?php echo e(Session::token()); ?>';
		var formData = {
			transno : transno,
			_token : token,
		};
		var tblViewDetail = "";
		//e.preventDefault(); //Prevent Default action.
		$.ajax({
			url: formURL,
			method: 'GET',
			data:  formData,
		}).done( function(data, textStatus, jqXHR) {
			$('#req_status').val(data);
		}).fail( function(data, textStatus, jqXHR) {
			alert("Something's wrong.");
		});
	}

	function setControl(ctrl) {
		if (ctrl == 'ADD' || ctrl == 'EDIT') {
			$('#btn_save').show();
			$('#btn_edit').hide();
			$('#btn_cancel').hide();
			$('#btn_discard').show();
			$('#btn_search').hide();
			$('#btn_print').hide();

			$('#btn_min').attr('disabled','true');
			$('#btn_prv').attr('disabled','true');
			$('#btn_nxt').attr('disabled','true');
			$('#btn_max').attr('disabled','true');
		}
		if (ctrl == 'Closed' || ctrl == 'Cancelled') {
			$('#btn_save').hide();
			$('#btn_edit').hide();
			$('#btn_cancel').hide();
			$('#btn_discard').hide();
			$('#btn_search').show();
			$('#btn_print').show();
			$('.addissuanceDetails').attr('disabled','true');
			$('#btn_deleteAll').hide();
		}
		if (ctrl =='') {
			$('#btn_save').hide();
			$('#btn_edit').show();
			$('#btn_cancel').show();
			$('#btn_discard').hide();
			$('#btn_search').show();
			$('#btn_print').show();
		}
	}

	function clearIssuance() {
    	$('#tblIssuance tr').remove();
    	$('.clear').val('');
    }

    function getDate(){
		var d = new Date();

		var month = d.getMonth()+1;
		var day = d.getDate();

		var output = d.getFullYear() + '/' +
			((''+month).length<2 ? '0' : '') + month + '/' +
			((''+day).length<2 ? '0' : '') + day;

		return output;
	}

	function loadfifo(code,table) {
    	table.html('');
     	var url = "<?php echo e(url('/wbswhsissuancefifotbl')); ?>";
     	var token = "<?php echo e(Session::token()); ?>";
     	var tblfifoAdd = '';
     	var data = {
     		_token: token,
     		code  : code
     	};

     	$.ajax({
     		url: url,
            type: "GET",
            data: data,
     	}).done(function(data) {
     		$.each(data, function(i, x) {
     			tblfifoAdd = '<tr>'+
     							'<td style="width: 9.66%">'+
     								'<a href="javascript:;" class="btn btn-primary btn_select_lot btn-sm" data-lotno="'+x.lot_no+'" data-qty="'+x.qty+'">'+
     									'<i class="fa fa-pencil"></i>'+
     								'</a>'+
     							'</td>'+
                                '<td style="width: 16.66%">'+x.item+'</td>'+
                                '<td style="width: 24.66%">'+x.item_desc+'</td>'+
                                '<td style="width: 15.66%">'+x.qty+'</td>'+
                                '<td style="width: 16.66%">'+x.lot_no+'</td>'+
                                '<td style="width: 16.66%">'+x.created_at+'</td>'+
                            '</tr>';

        		table.append(tblfifoAdd);
     		});
     	}).fail(function(data) {
     	});
    }
    function loadbarcodefifo(issuance,code,table) {
    	table.html('');
     	var url = "<?php echo e(url('/wbswhsissuancefifotblbc')); ?>";
     	var token = "<?php echo e(Session::token()); ?>";
     	var tblfifoAdd = '';
     	var data = {
     		_token: token,
     		code  : code,
     		issuance : issuance
     	};

     	$.ajax({
     		url: url,
            type: "GET",
            data: data,
     	}).done(function(data) {
     		if(data == "norecord"){
     			$('#msg').modal('show');
				$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
				$('#err_msg').html("No record found!");	
     		}else{
     			$.each(data, function(i, x) {
	     			tblfifoAdd = '<tr>'+
	     							'<td style="width: 9.66%">'+
	     								'<a href="javascript:;" class="btn btn-primary btn_select_lot btn-sm" data-id="'+x.id+'" data-lotno="'+x.lot_no+'" data-qty="'+x.qty+'">'+
	     									'<i class="fa fa-pencil"></i>'+
	     								'</a>'+
	     							'</td>'+
	                                '<td style="width: 16.66%">'+x.item+'</td>'+
	                                '<td style="width: 24.66%">'+x.item_desc+'</td>'+
	                                '<td style="width: 15.66%">'+x.qty+'</td>'+
	                                '<td style="width: 16.66%">'+x.lot_no+'</td>'+
	                                '<td style="width: 16.66%">'+x.created_at+'</td>'+
	                            '</tr>';

	        		table.append(tblfifoAdd);
	     		});		
     		}
 			
     	}).fail(function(data) {
     	});
    }

    function navigate(to) {
		if ($('input[name=issuancenowhs]').val() == '') {
			loadLatestIssuance();
		} else {
			var tblIssuance = '';
			var url = "<?php echo e(url('/whsissuancenav')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				issuancenowhs: $('input[name=issuancenowhs]').val(),
				to: to
			};

			$.ajax({
				url: url,
				type: "GET",
				data: data,
			}).done( function(data, textStatus, jqXHR) {
				$('#tblIssuance').html('');
				if (data.request_status == 'failed') {
                    $('#msg').modal('show');
					$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
					$('#err_msg').html(data.msg);
                } else {
                	var iss = data.issuancedata;
                	var det = data.detailsdata;

                	$('input[name=issuancenowhs]').val(iss.issuance_no);
					$('input[name=reqno]').val(iss.request_no);
					$('input[name=statuswhs]').val(iss.status);
					$('input[name=createdbywhs]').val(iss.create_user);
					$('input[name=createddatewhs]').val(iss.created_at);
					$('input[name=totreqqty]').val(iss.total_req_qty);
					$('input[name=updatedbywhs]').val(iss.update_user);
					$('input[name=updateddatewhs]').val(iss.updated_at);

                	$.each(data.detailsdata, function(i,obj) {

						tblIssuance = '<tr>'+
											'<td style="width:4.5%;">'+
												'<a href="javascript:;" class="btn btn-circle green btn-sm addissuanceDetails"'+
												'id="addissuance" data-transno="'+obj.request_no+'" data-issDetailid="'+obj.detail_id+'" '+
												'data-code="'+obj.item+'" data-name="'+obj.item_desc+'" data-requestqty="'+obj.request_qty+'" data-stats="'+obj.status+'"'+
												'data-servedqty="'+obj.issued_qty_t+'" data-location="'+obj.location+'" data-issuedkit="'+obj.issued_qty_o+'" data-lotiss="'+obj.lot_no+'">'+
													'<i class="fa fa-plus"></i>'+
												'</a>'+
											'</td>'+
											'<td style="width:12.5%;">'+obj.detail_id+
												'<input type="hidden" name="detid[]" value="'+obj.detail_id+'">'+
											'</td>'+
											'<td style="width:12.5%;">'+obj.item+
												'<input type="hidden" name="itemiss[]" value="'+obj.item+'">'+
											'</td>'+
											'<td style="width:20.5%;">'+obj.item_desc+
												'<input type="hidden" name="itemdesciss[]" value="'+obj.item_desc+'">'+
											'</td>'+
											'<td style="width:12.5%;">'+obj.issued_qty_o+
												'<input type="hidden" name="issuedkit[]" value="'+obj.issued_qty_o+'">'+
											'</td>'+
											'<td style="width:12.5%;" id="issqtytd'+obj.detail_id+'">'+obj.issued_qty_t+
												'<input type="hidden" name="qtyiss[]" id="issqty'+obj.detail_id+'">'+
											'</td>'+
											'<td style="width:12.5%;" id="lottd'+obj.detail_id+'">'+obj.lot_no+
												'<input type="hidden" name="lotiss[]" id="lot'+obj.detail_id+'">'+
											'</td>'+
											'<td style="width:12.5%;">'+obj.location+
												'<input type="hidden" name="lociss[]" value="'+obj.location+'">'+
												'<input type="hidden" name="requestqty[]" value="'+obj.request_qty+'"/>'+
												'<input type="hidden" name="sqty[]" value="'+obj.issued_qty_t+'"/>'+
												'<input type="hidden" name="id[]" value="'+obj.pmr_detail_id+'"/>'+
											'</td>'+
										'</tr>';
						$('#tblIssuance').append(tblIssuance);
						setControl('');
					});
                }
				
			}).fail( function(data, textStatus, jqXHR) {
				alert('error');
			});
		}
	}

	function loadLatestIssuance() {
    	var url = "<?php echo e(url('/whslatestissuance')); ?>";
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token
		};

		$.ajax({
			url: url,
			type: "GET",
			data: data,
		}).done( function(data, textStatus, jqXHR) {
			$('#tblIssuance').html('');
			var obj = JSON.parse(data);
			console.log(obj);
			if (obj.status == 'success') {
				var iss = obj.issuance;
				var details = obj.details;

				$('input[name=issuancenowhs]').val(iss.issuance_no);
				$('input[name=reqno]').val(iss.request_no);
				$('input[name=statuswhs]').val(iss.status);
				$('input[name=createdbywhs]').val(iss.create_user);
				$('input[name=createddatewhs]').val(iss.created_at);
				$('input[name=totreqqty]').val(iss.total_req_qty);
				$('input[name=updatedbywhs]').val(iss.update_user);
				$('input[name=updateddatewhs]').val(iss.updated_at);

				$.each(details, function(i,det) {
				

					tblIssuance = '<tr>'+
										'<td style="width:4.5%;">'+
											'<a href="javascript:;" class="btn btn-circle green btn-sm addissuanceDetails"'+
											'id="addissuance" data-transno="'+det.request_no+'" data-issDetailid="'+det.detail_id+'" '+
											'data-code="'+det.item+'" data-name="'+det.item_desc+'" data-requestqty="'+det.request_qty+'" data-stats="'+det.status+'"'+
											'data-servedqty="'+det.issued_qty_t+'" data-location="'+det.location+'" data-issuedkit="'+det.issued_qty_o+'" data-lotiss="'+det.lot_no+'">'+
												'<i class="fa fa-plus"></i>'+
											'</a>'+
										'</td>'+
										'<td style="width:12.5%;">'+det.detail_id+
											'<input type="hidden" name="detid[]" value="'+det.detail_id+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+det.item+
											'<input type="hidden" name="itemiss[]" value="'+det.item+'">'+
										'</td>'+
										'<td style="width:20.5%;">'+det.item_desc+
											'<input type="hidden" name="itemdesciss[]" value="'+det.item_desc+'">'+
										'</td>'+
										'<td style="width:12.5%;">'+det.issued_qty_o+
											'<input type="hidden" name="issuedkit[]" value="'+det.issued_qty_o+'">'+
										'</td>'+
										'<td style="width:12.5%;" id="issqtytd'+det.detail_id+'">'+det.issued_qty_t+
										'</td>'+
										'<td style="width:12.5%;" id="lottd'+det.detail_id+'">'+det.lot_no+
										'</td>'+
										'<td style="width:12.5%;">'+det.location+
											'<input type="hidden" name="lociss[]" value="'+det.location+'">'+
											'<input type="hidden" name="requestqty[]" value="'+det.request_qty+'"/>'+
											'<input type="hidden" name="sqty[]" value="'+det.issued_qty_t+'"/>'+
										'</td>'+
									'</tr>';
					$('#tblIssuance').append(tblIssuance);
					setControl('');
				});
			}
		}).fail( function(data, textStatus, jqXHR) {
			alert('error');
		});
    }

    function filterData(action) {
    	$('#srch_tbl_body').html('');
    	if (action == 'SRCH') {
    		var url = "<?php echo e(url('/wbswmi-search')); ?>";
	     	var token = "<?php echo e(Session::token()); ?>";
	     	var srch_tbl_body = '';
	     	var condition_arr = {
	     		srch_issuanceno: $('#srch_issuanceno').val(),
				srch_reqno: $('#srch_reqno').val(),
				srch_serving: $('#srch_serving').val(),
				srch_closed: $('#srch_close').val(),
				srch_cancelled: $('#srch_cancelled').val(),
	     	}
	     	var data = {
	     		_token: token,
	     		condition_arr: condition_arr
	     	};

	     	$.ajax({
	     		url: url,
	            type: "POST",
	            data: data,
	            dataType: 'JSON'
	     	}).done(function(data) {
	     		console.log(data);
	     		$.each(data, function(i, x) {
	     			srch_tbl_body = '<tr>'+
	     									'<td style="width: 8.5%">'+
                                               	'<button type="button" class="btn blue input-sm btn_search_edit" value="'+x.id+'|'+x.issuance_no+'|'+x.request_no+'|'+x.status+'|'+x.create_user+'|'+x.created_at+'|'+x.update_user+'|'+x.updated_at+'">'+
                                                  	'<i class="fa fa-edit"></i>'+
                                               	'</button>'+
                                          	'</td>'+
											'<td style="width: 14.5%">'+x.issuance_no+'</td>'+
											'<td style="width: 14.5%">'+x.request_no+'</td>'+
											'<td style="width: 12.5%">'+x.status+'</td>'+
											'<td style="width: 12.5%">'+x.create_user+'</td>'+
											'<td style="width: 12.5%">'+x.created_at+'</td>'+
											'<td style="width: 12.5%">'+x.update_user+'</td>'+
											'<td style="width: 12.5%">'+x.updated_at+'</td>'+
										'</tr>';

	        		$('#srch_tbl_body').append(srch_tbl_body);
	     		});
	     	}).fail(function(data) {
	     		alert('error');
	     	});
    	} else{

    	}
    }


    function focusbarcode(){	
		$('body').click(function(){
		  	$('#hd_barcode').focus();
		});		
    
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>