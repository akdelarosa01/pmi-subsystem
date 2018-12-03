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
       /* #hd_barcode {
        	position: absolute;
		    z-index: -1;
        }*/
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
									<i class="fa fa-navicon"></i>  WBS Material Kitting & Issuance
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">
						   			 <div class="col-md-5">
						   			 	<div class="form-group row">
						   			 		<?php if(isset($mk_data)): ?>
						   			 		<?php foreach($mk_data as $mkdata): ?>
						   			 		<?php endforeach; ?>
						   			 		<?php endif; ?>
						   			 		<label class="control-label col-sm-3">Issuance No.</label>
						   					 <div class="col-sm-4">
						   					 	<input type="hidden" class="form-control input-sm" id="recid" name="recid" value="<?php if(isset($mkdata)){echo $mkdata->id; } ?>" />
						   					 	<input type="hidden" class="form-control input-sm" id="action" name="action" value="<?php if(isset($action)){echo $action; } ?>" />
						   					 	<input type="hidden" class="form-control input-sm" id="hdnissuanceno" name="hdnissuanceno" value="<?php if(isset($mkdata)){echo $mkdata->issuance_no; } ?>" />
						   					 	<input type="hidden" class="form-control input-sm" id="detailsUpdateflag" name="detailsUpdateflag" value="<?php if(isset($detailsUpdateFlag)){echo $detailsUpdateFlag; } ?>" />
						   					 	<input type="hidden" class="form-control input-sm" id="batchUpdateflag" name="batchUpdateflag" value="<?php if(isset($batchUpdateFlag)){echo $batchUpdateFlag; } ?>" />
						   					 	<input type="text" class="form-control input-sm add" id="issuanceno" name="issuanceno" value="<?php if(isset($mkdata)){echo $mkdata->issuance_no; } ?>" <?php if($action!='VIEW'){ echo "disabled"; } ?> >
						   					 </div>
						   					 <div class="btn-group btn-group-sm btn-group-circle col-sm-5">
						   					 	<div class="btn-group btn-group-circle" style="width:200px;">
						   					 		<button type="button" style="font-size:12px" onclick="javascript: getrecord('MIN'); " id="btn_min" class="btn blue input-sm" <?php if(isset($mkdata)){if($mkdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-backward"></i></button>
						   					 		<button type="button" style="font-size:12px" onclick="javascript: getrecord('PRV'); " id="btn_prv" class="btn blue input-sm" <?php if(isset($mkdata)){if($mkdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-backward"></i></button>
						   					 		<button type="button" style="font-size:12px" onclick="javascript: getrecord('NXT'); " id="btn_nxt" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-forward"></i></button>
						   					 		<button type="button" style="font-size:12px" onclick="javascript: getrecord('MAX'); " id="btn_max" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-forward"></i></button>
						   					 	</div>
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">PO No.</label>
						   					 <div class="col-sm-5">
						   						 <input type="text" class="form-control input-sm add" id="searchpono" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->po_no; } ?>" >
												 <input type="hidden" class="add" id="searchpono1" name="searchpono" value="<?php if(isset($mkdata)){echo $mkdata->po_no; } ?>" >
						   					 </div>
											 <div class="col-sm-4">
						   						 <a href="javascript:;" class="btn btn-circle green" id="selectPObtn"><i class="fa fa-arrow-circle-down"></i></a>
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Device Code</label>
						   					 <div class="col-sm-4">
						   						 <input type="text" class="form-control input-sm add" id="devicecode" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->device_code; } ?>" >
												 <input type="hidden" class="add" id="devicecode1" name="devicecode" value="<?php if(isset($mkdata)){echo $mkdata->device_code; } ?>" >
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Device Name</label>
						   					 <div class="col-sm-5">
						   						 <input type="text" class="form-control input-sm add" id="devicename" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->device_name; } ?>" >
												 <input type="hidden" class="add" id="devicename1" name="devicename" value="<?php if(isset($mkdata)){echo $mkdata->device_name; } ?>" >
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">PO Qty.</label>
						   					 <div class="col-sm-4">
						   						 <input type="text" class="form-control input-sm add" id="poqty" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->po_qty; } ?>" >
												 <input type="hidden" class="add" id="poqty1" name="poqty" value="<?php if(isset($mkdata)){echo $mkdata->po_qty; } ?>" >
						   					 </div>
						   				 </div>
						   			 </div>

						   			 <div class="col-md-3">
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Kit Qty.</label>
						   					 <div class="col-sm-4">
						   						 <input type="text" class="form-control input-sm add" id="kitqty" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->kit_qty; } ?>" >
												 <input type="hidden" class="add" id="kitqty1" name="kitqty" value="<?php if(isset($mkdata)){echo $mkdata->kit_qty; } ?>" >
						   					 </div>
						   					 <div class="col-sm-5">
						   						 <a href="javascript:;" class="btn btn-circle green" id="kitQtybtn"><i class="fa fa-arrow-circle-down"></i></a>
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Kit No.</label>
						   					 <div class="col-sm-6">
						   						 <input type="text" class="form-control input-sm add" id="kitno" name="kitno" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->kit_no; } ?>" >
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Prep. By</label>
						   					 <div class="col-sm-6">
						   						 <input type="text" class="form-control input-sm add" id="preparedby" name="preparedby" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->prepared_by; } ?>" >
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Status</label>
						   					 <div class="col-sm-6">
						   						 <input type="text" class="form-control input-sm add" id="statuskit" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->status; } ?>" >
												 <input type="hidden" class="add" id="statuskit1" name="statuskit" value="<?php if(isset($mkdata)){echo $mkdata->status; } ?>" >
						   					 </div>
						   				 </div>
						   			 </div>

						   			 <div class="col-md-4">
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Created By</label>
						   					 <div class="col-sm-6">
						   						 <input type="text" class="form-control input-sm add" id="createdby" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->create_user; } ?>" >
												 <input type="hidden" class="add" id="createdby1" name="createdby" value="<?php if(isset($mkdata)){echo $mkdata->create_user; } ?>" >
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Created Date.</label>
						   					 <div class="col-sm-6">
						   						 <input class="form-control input-sm add" type="text" id="createddate" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->created_at; } ?>" />
												 <input type="hidden" class="add" id="createddate1" name="createddate" value="<?php if(isset($mkdata)){echo $mkdata->created_at; } ?>" />
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Updated By</label>
						   					 <div class="col-sm-6">
						   						 <input type="text" class="form-control input-sm add" id="updatedby" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->update_user; } ?>" >
												 <input type="hidden" id="updatedby1" name="updatedby" value="<?php if(isset($mkdata)){echo $mkdata->update_user; } ?>" >
						   					 </div>
						   				 </div>
						   				 <div class="form-group row">
						   					 <label class="control-label col-sm-3">Updated Date</label>
						   					 <div class="col-sm-6">
												 <input class="form-control input-sm add" type="text" id="updateddate" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->updated_at; } ?>" />
												 <input type="hidden" class="add" id="updateddate1" name="updateddate" value="<?php if(isset($mkdata)){echo $mkdata->updated_at; } ?>" />
												 
						   					 </div>
						   				 </div>
						   			 </div>

						   			 <div class="col-md-12">
							   			 <div class="tabbable-custom">
							   				 <ul class="nav nav-tabs nav-tabs-lg" id="tabslist" role="tablist">
							   					 <li class="active" id="kitdetailsli">
							   						 <a href="#kitdetails" data-toggle="tab" data-toggle="tab" aria-expanded="true">Kit Details</a>
							   					 </li>
							   					 <li id="issuancedetailsli">
							   						 <a href="#issuancedetails" data-toggle="tab" data-toggle="tab" aria-expanded="true">Issuance Details</a>
							   					 </li>
							   				 </ul>

							   				 <div class="tab-content" id="tab-subcontents">
							   					 <div class="tab-pane fade in active" id="kitdetails">
							   						 <div class="row">
							   							 <div class="col-md-12">
							   							 	<div class="table-responsive" style="height: 300px; overflow: auto">
								   								 <table class="table table-bordered table-fixedheader table-striped" style="font-size:10px">
								   									 <thead>
								   										 <tr>
																			 <td style="width:3.6%" class="table-checkbox">
					 															<input type="checkbox" class="group-checkable" id="group-checkable"/>
					 														</td>
								   											 <td style="width:7.6%">Detail ID</td>
								   											 <td style="width:7.6%">Item/Part No.</td>
								   											 <td style="width:11.6%">Item Description</td>
								   											 <td style="width:7.6%">Usage</td>
								   											 <td style="width:7.6%">Rqd Qty.</td>
								   											 <td style="width:7.6%">Kit Qty.</td>
								   											 <td style="width:7.6%">Issued Qty.</td>
								   											 <td style="width:7.6%">Location</td>
								   											 <td style="width:7.6%">Drawing No.</td>
								   											 <td style="width:7.6%">Supplier</td>
								   											 <td style="width:7.6%">Whse100</td>
								   											 <td style="width:7.6%">Whse102</td>
								   										 </tr>
								   									 </thead>
								   									 <tbody id="tblKitDetails">
								   									 	<?php $cnt = 1;?>
								   									 	<?php if(isset($mk_data_details)): ?>
									   									 	<?php foreach($mk_data_details as $mkddata): ?>
										   									 	<tr id="details<?php echo e($cnt); ?>">
										   									 		<td style="width:3.6%"><input type="checkbox" id="chkKitDetail<?php echo e($cnt); ?>" data-inpt="inputData<?php echo e($cnt); ?>" data-tr="details<?php echo e($cnt); ?>" class="checkboxes kitdetailschk" value="<?php echo e($mkddata->detailid); ?>"
																						data-id="<?php echo e($mkddata->detailid); ?>" data-itemcode="<?php echo e($mkddata->item); ?>" data-item_desc="<?php echo e($mkddata->item_desc); ?>" data-issued_qty="<?php echo e($mkddata->issued_qty); ?>" data-required_qty="<?php echo e($mkddata->rqd_qty); ?>"/></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->detailid); ?></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->item); ?></td>
										   									 		<td style="width:11.6%"><?php echo e($mkddata->item_desc); ?></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->usage); ?></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->rqd_qty); ?></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->kit_qty); ?></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->issued_qty); ?></td>
										   									 		<td style="width:7.6%">
										   									 		<?php
										   									 		if($mkddata->location == null) {
										   									 			echo '';
										   									 		} else {
										   									 			echo $mkddata->location;
										   									 		}
										   									 		?></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->drawing_no); ?></td>
										   									 		<td style="width:7.6%"><?php echo e($mkddata->supplier); ?></td>
										   									 		<td style="width:7.6%">
										   									 		<?php
										   									 		if($mkddata->whs100 == null) {
										   									 			echo '';
										   									 		} else {
										   									 			echo $mkddata->whs100;
										   									 		}
										   									 		?></td>
										   									 		<td style="width:7.6%">
										   									 		<?php
										   									 		if($mkddata->whs102 == null) {
										   									 			echo '';
										   									 		} else {
										   									 			echo $mkddata->whs102;
										   									 		}
										   									 		?></td>
										   									 	</tr>
									   									 		<?php $cnt++;?>
									   									 	<?php endforeach; ?>
								   									 	<?php endif; ?>
								   									 </tbody>
								   								 </table>
								   							</div>
							   							 </div>
							   						 </div>
							   						 <div class="row">
														 <br>
							   							 <div class="col-md-12 text-center">
							   								 <a href="javascript:;" class="btn red input-sm" id="btn_delKitdetails">
							   									 <i class="fa fa-trash"></i> Delete
							   								 </a>
															 <!-- <a href="javascript:;" class="btn grey-gallery input-sm" id="transfer">
							   									 <i class="fa fa-exchange"></i> Transfer to Sakidashi
							   								 </a> -->
							   							 </div>
							   						 </div>
							   					 </div>
							   					 <div class="tab-pane fade" id="issuancedetails">
							   						 <div class="row">
							   							 <div class="col-md-12">
							   							 	<div class="table-responsive" style="height: 300px; overflow: auto">
								   								<table class="table table-striped table-bordered table-hover" style="font-size:10px" id="tblisuance">
								   									 <thead>
								   										 <tr>
								   											 <td class="table-checkbox" style="width: 10px">
								   					                             <input type="checkbox" class="group-checkable"/>
								   					                         </td>
								   											 <td style="width: 10px"></td>
								   											 <td>Detail ID</td>
								   											 <td>Item/Part No.</td>
								   											 <td>Item Description</td>
								   											 <td>Kit Qty.</td>
								   											 <td>Issued Qty.</td>
								   											 <td>Lot No.</td>
								   											 <td>Location</td>
								   											 <td>Remarks</td>
								   											 <td></td>
								   										 </tr>
								   									 </thead>
								   									 <tbody id="tblIssDetails">
																		 <?php $cnt = 0; ?>
									   									 	<?php if(isset($mk_issuance_details)): ?>
										   									 	<?php foreach($mk_issuance_details as $mkidata): ?>
																					<?php $cnt++?>
											   									 	<tr id="<?php echo e($mkidata->detailid); ?>">
											   									 		<td>
											   									 			<input type="checkbox" id="chkIssDetail<?php echo e($mkidata->detailid); ?>" data-inpt="issDetail<?php echo e($mkidata->detailid); ?>" data-tr="<?php echo e($mkidata->detailid); ?>" class="checkboxes issDetails" value="1"/>
											   									 		</td>
											   									 		<td>
																							<a href="javascript:;" class="btn btn-success btn-sm edit_detail_btn" data-id="<?php echo e($mkidata->detailid); ?>"
																								data-code="<?php echo e($mkidata->item); ?>" data-name="<?php echo e($mkidata->item_desc); ?>" data-kitqty="<?php echo e($mkidata->kit_qty); ?>"
																								data-issuedqty="<?php echo e($mkidata->issued_qty); ?>" data-lotno="<?php echo e($mkidata->lot_no); ?>" data-location="<?php echo e($mkidata->location); ?>"
																								data-remarks="<?php echo e($mkidata->remarks); ?>"><i class="fa fa-edit"></i></a>
											   									 		</td>
											   									 		<td id="issdetailid-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->detailid); ?>

																							<input type="hidden" id="issdetailid<?php echo e($mkidata->detailid); ?>" name="issdetailid[]" value="<?php echo e($mkidata->detailid); ?>"/>
																						</td>
											   									 		<td id="item-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->item); ?>

																							<input type="hidden" id="item<?php echo e($mkidata->detailid); ?>" name="issitem[]" value="<?php echo e($mkidata->item); ?>"/>
																						</td>
											   									 		<td id="item_desc-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->item_desc); ?>

																							<input type="hidden" id="item_desc<?php echo e($mkidata->detailid); ?>" name="issitemdesc[]" value="<?php echo e($mkidata->item_desc); ?>"/>
																						</td>
											   									 		<td id="kit_qty-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->kit_qty); ?>

																							<input type="hidden" id="kit_qty<?php echo e($mkidata->detailid); ?>" name="isskit_qty[]"value="<?php echo e($mkidata->kit_qty); ?>" />
																						</td>
											   									 		<td id="issued_qty-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->issued_qty); ?>

																							<input type="hidden" id="issued_qty<?php echo e($mkidata->detailid); ?>" name="ississued_qty[]" value="<?php echo e($mkidata->issued_qty); ?>"/>
																						</td>
											   									 		<td id="lot_no-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->lot_no); ?>

																							<input type="hidden" id="lot_no<?php echo e($mkidata->detailid); ?>" name="isslot_no[]" value="<?php echo e($mkidata->lot_no); ?>"/>
																						</td>
											   									 		<td id="location-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->location); ?>

																							<input type="hidden" id="location<?php echo e($mkidata->detailid); ?>" name="isslocation[]" value="<?php echo e($mkidata->location); ?>"/>
																						</td>
											   									 		<td id="remarks-<?php echo e($mkidata->detailid); ?>">
																							<?php echo e($mkidata->remarks); ?>

																							<input type="hidden" id="remarks<?php echo e($mkidata->detailid); ?>" name="issremarks[]" value="<?php echo e($mkidata->remarks); ?>"/>
																						</td>
																						<td id="barcode-<?php echo e($mkidata->detailid); ?>">
																							<a href="javascript:;" class="btn input-sm grey-gallery barcodebtn" data-detailid="<?php echo e($mkidata->detailid); ?>" data-item="<?php echo e($mkidata->item); ?>" data-item_desc="<?php echo e($mkidata->item_desc); ?>" data-kit_qty="<?php echo e($mkidata->kit_qty); ?>" data-issued_qty="<?php echo e($mkidata->issued_qty); ?>" data-lot_no="<?php echo e($mkidata->lot_no); ?>" data-location="<?php echo e($mkidata->location); ?>" data-id="<?php echo e($mkidata->id); ?>" data-issueno="<?php echo e($mkidata->issue_no); ?>">
																								<i class="fa fa-barcode"></i>
																							</a>

																						</td>
											   									 	</tr>
										   									 	<?php endforeach; ?>
									   									 	<?php endif; ?>
																			<input type="hidden" name="count" value="<?php echo e($cnt); ?>">
																			<input type="hidden" name="issuanceCount" id="issuanceCount" value="<?php echo e($cnt); ?>">
								   									 </tbody>
								   								</table>
								   							</div>
							   							 </div>
							   						 </div>

							   						 <div class="row">
							   						     <div class="col-md-12 text-center">
							   						         <a href="javascript:;" class="btn btn-success input-sm" id="addIssBtn" disabled="true">
							   						             <i class="fa fa-plus"></i> Add Details
							   						         </a>

							   						         <a href="javascript:;" class="btn btn-primary input-sm" id="saveIssBtn" disabled="true">
							   						             <i class="fa fa-floppy-o"></i> Save Details
							   						         </a>

							   						         <a href="javascript:;" class="btn btn-danger input-sm" id="delIssBtn" disabled="true">
							   						             <i class="fa fa-trash"></i> Delete
							   						         </a>
							   						     </div>
							   						 </div>

							   					 </div>
							   				 </div>

							   			 </div>
							   		</div>

									<form>
										<?php echo csrf_field(); ?>

										<div class="row">
                                            <div class="col-md-12 text-center">
												<a href="javascript:;" class="btn green input-sm" id="btn_addPO">
													<i class="fa fa-plus"></i> Add New
												</a>
												<a href="javascript:;" class="btn btn-primary input-sm" id="btn_save" disabled="true">
													<i class="fa fa-floppy-o"></i> Save Issuance
												</a>
												<a href="javascript:;" class="btn btn-primary input-sm" id="btn_saveIssueance" disabled="true">
													<i class="fa fa-floppy-o"></i> Save Issuance
												</a>
								   			 	<a href="javascript:;" id="btn_edit" class="btn blue-madison input-sm">
								   					<i class="fa fa-pencil"></i> Edit
								   				</a>
								   				<a href="javascript:;" id="btn_cancel" class="btn red input-sm">
								   					<i class="fa fa-trash"></i> Cancel P.O.
								   				</a>
								   				<a href="javascript:;" id="btn_discard" class="btn red-intense input-sm" disabled="true">
								   					<i class="fa fa-times"></i> Discard Changes
								   				</a>
								   				<button type="button" style="font-size:12px" onclick="javascript: searchData();" class="btn blue-steel input-sm" id="btn_search" <?php if($action!='VIEW'){ echo 'disabled'; } ?>><i class="fa fa-search"></i> Search
								   				</button>
								   			</div>
								   		</div>
								   		<br>
								   		<div class="row">
                                            <div class="col-md-12 text-center">

								   				<a href="javascript:;" style="font-size:12px; <?php if(isset($mkdata)){ if($mkdata->status == 'Cancelled') { echo 'display:none;'; } } ?>" class="btn grey-gallery input-sm" id="btn_kittinglist" <?php echo($state); ?> <?php if($action!='VIEW'){ echo 'disabled'; } ?>>
								   					<i class="fa fa-list"></i> Kitting List PDF
								   				</a>
								   				<a href="javascript:;" style="font-size:12px; <?php if(isset($mkdata)){ if($mkdata->status == 'Cancelled') { echo 'display:none;'; } } ?>" class="btn green input-sm" id="btn_kittinglistexcel" <?php echo($state); ?> <?php if($action!='VIEW'){ echo 'disabled'; } ?>>
								   					<i class="fa fa-list"></i> Kitting List Excel
								   				</a>
								   				<a href="javascript:;" style="font-size:12px; <?php if(isset($mkdata)){ if($mkdata->status == 'Cancelled') { echo 'display:none;'; } } ?>" formtarget="_blank" onclick="javascript: generateMkReport2();" class="btn purple-plum input-sm" id="btn_print" <?php echo($state); ?> <?php if($action!='VIEW'){ echo 'disabled'; } ?>>
								   					<i class="fa fa-print"></i> Transfer Slips
								   				</a>
								   				<a href="javascript:;" id="btn_reasonlogs" class="btn btn-success input-sm">
								   					<i class="fa fa-file-o"></i> FIFO Reason Logs
								   				</a>

								   			</div>


								   		</div>
									</form>
									<input type="hidden" name="brsense" id="brsense">
								   	<input type="hidden" id="hd_barcode" name="hd_barcode" />
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


	<!-- add Issuance details -->
		<div id="addIssModal" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-xl gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 class="modal-title">Add Details</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<form method="POST" action="" class="form-horizontal" id="addissmdl">
									<?php echo e(csrf_field()); ?>

									<div class="form-group">
										<div class="col-sm-12">
										   <p>
											   Item/Part No., Issued Qty., and Location fields are required.
										   </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Detail ID.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control add_iss_clear input-sm" id="detailidiss" disabled="disable">
											<input type="hidden" id="detailidiss1" name="detailidiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Item/Part No.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control add_iss_clear input-sm" id="itemiss" name="itemiss">
											<input type="hidden" id="nameiss" name="nameiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Lot. No</label>
										<div class="col-sm-8">
										   <input type="text" class="form-control add_iss_clear input-sm" id="lotnoiss" name="lotnoiss">
										   <input type="hidden" name="fifoid" id="fifoid">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kit Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control add_iss_clear input-sm" id="kitiss" disabled="disable">
											<input type="hidden" id="kitiss1" name="kitiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Issued Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control add_iss_clear input-sm" id="qtyiss" name="qtyiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Location</label>
										<div class="col-sm-8">
											<input type="text" class="form-control add_iss_clear input-sm" id="lociss" disabled="disable">
											<input type="hidden" id="lociss1" name="lociss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Remarks</label>
										<div class="col-sm-8">
											<textarea class="form-control add_iss_clear input-sm" id="remarksiss" style="resize:none" name="remarksiss"></textarea>
										</div>
									</div>

								</form>
							</div>
							<div class="col-md-6">
								<div style="height: 300; overflow: auto;">
									<table class="table table-bordered table-fixedheader table-striped table-fifo" style="font-size:10px">
										<thead>
											<tr>
												<td style="width:8.6%"></td>
												<td style="width:16.6%">Item Code</td>
												<td style="width:24.6%">Description</td>
												<td style="width:16.6%">Qty</td>
												<td style="width:16.6%">Lot</td>
												<td style="width:16.6%">Received Date</td>
											</tr>
										</thead>
										<tbody id="tblfifoAdd"></tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="addIssDetailbtn">OK</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger iss_edit_close" id="iss_add_close">Close</button>
					</div>
				</div>
			</div>
		</div>

	<!-- edit Issuance details -->
		<div id="editIssModal" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-xl gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 class="modal-title">Edit Details</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<form method="POST" action="" class="form-horizontal" id="editissmdl">
									<?php echo e(csrf_field()); ?>

									<div class="form-group">
										<div class="col-sm-12">
										   <p>
											   Item/Part No., Issued Qty., and Location fields are required.
										   </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Detail ID.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control edit_iss_clear input-sm" id="editdetailidiss" disabled="disable">
											<input type="hidden" id="editdetailidiss1" name="editdetailidiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Item/Part No.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control edit_iss_clear input-sm" id="edititemiss" name="edititemiss" disabled="true">
											<input type="hidden" id="editnameiss" name="editnameiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Lot. No</label>
										<div class="col-sm-8">
										   <input type="text" class="form-control edit_iss_clear input-sm" id="editlotnoiss" name="editlotnoiss">
										   <input type="hidden" name="fifoidedit" id="fifoidedit">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kit Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control edit_iss_clear input-sm" id="editkitiss" disabled="disable">
											<input type="hidden" id="editkitiss1" name="editkitiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Issued Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control edit_iss_clear input-sm" id="editqtyiss" name="editqtyiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Location</label>
										<div class="col-sm-8">
											<input type="text" class="form-control edit_iss_clear input-sm" id="editlociss" disabled="disable">
											<input type="hidden" id="editlociss1" name="editlociss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Remarks</label>
										<div class="col-sm-8">
											<textarea class="form-control edit_iss_clear input-sm" id="editremarksiss" style="resize:none" name="editremarksiss"></textarea>
										</div>
									</div>

								</form>
							</div>
							<div class="col-md-6">
								<div style="height: 300; overflow: auto;">
									<table class="table table-bordered table-fixedheader table-striped table-fifo" style="font-size:10px">
										<thead>
											<tr>
												<td style="width:8.6%"></td>
												<td style="width:16.6%">Item Code</td>
												<td style="width:24.6%">Description</td>
												<td style="width:16.6%">Received Qty</td>
												<td style="width:16.6%">Lot</td>
												<td style="width:16.6%">Received Date</td>
											</tr>
										</thead>
										<tbody id="tblfifoEdit"></tbody>
									</table>
								</div>
								
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="editIssDetailbtn">OK</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger iss_edit_close" id="iss_edit_close">Close</button>
					</div>
				</div>
			</div>
		</div>

	<!-- add KITqty frm -->
		<div id="KitQtymodal" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 class="modal-title">Add Kit Qty.</h4>
					</div>
					<?php /* <form method="POST" action="<?php echo e(url('/updatekitqty')); ?>" class="form-horizontal" id="KitQtyfrm"> */ ?>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<?php echo e(csrf_field()); ?>

									<div class="form-group">
										<label class="control-label col-sm-2">Kit Qty.</label>
										<div class="col-sm-9">
											<input type="text" class="form-control input-sm mask_kitqty" id="getkitQty" name="getkitQty">
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<a href="javascript:;" class="btn btn-success" id="selectKitQtybtn">OK</a>
							<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
						</div>
					<?php /* </form> */ ?>
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

	<!-- Delete Modal -->
		<div id="confirm" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm gray-gallery">
				<div class="modal-content ">
					<form class="form-horizontal" action="index.html" method="post">
						<div class="modal-body">
							<p id="del_msg"></p>
							<input type="hidden" name="delaction" id="delaction">
							<?php echo csrf_field(); ?>

						</div>
						<div class="modal-footer">
							<a href="javascript:;" class="btn btn-primary" id="btn_cancel_mdl">Yes</a>
							<button type="button" data-dismiss="modal" class="btn red">No</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	<!-- Search Modal -->
		<div id="searchModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/wbsmaterialkitting')); ?>">
					<?php echo csrf_field(); ?>

					<div class="modal-content blue">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Search</h4>
						</div>
						<div class="modal-body">
							<div class="row">
							<div class="col-md-12">
									<div class="form-group">
										<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Po No.</label>
										<div class="col-md-4">
											<input type="text" class="form-control input-sm" id="srch_pono" placeholder="Po No" name="srch_pono" autofocus <?php echo($readonly); ?> />
										</div>
									</div>
									<div class="form-group">
										<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Kit No.</label>
										<div class="col-md-4">
											<input type="text" class="form-control input-sm" id="srch_kitno" placeholder="Kit No" name="srch_kitno" <?php echo($readonly); ?> />
										</div>
									</div>
									<div class="form-group">
										<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Prepared By</label>
										<div class="col-md-4">
											<input type="text" class="form-control input-sm" id="srch_preparedby" placeholder="Prepared By" name="srch_preparedby" <?php echo($readonly); ?> />
										</div>
									</div>
									<div class="form-group">
										<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Slip No</label>
										<div class="col-md-4">
											<input type="text" class="form-control input-sm" id="srch_slipno" placeholder="Slip No" name="srch_slipno" <?php echo($readonly); ?> />
										</div>
									</div>
									<div class="form-group">
										<label for="inputname" class="col-md-4 control-label" style="font-size:12px">Status</label>
										<div class="col-md-8">
											<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Open" id="srch_open" name="Open" checked="true"/>Open</label>
											<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Close" id="srch_close" name="Close"/>Close</label>
											<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row" style="width:880px; height:500px; overflow:auto;">
								<div class="col-md-12">
									<table class="table table-striped table-bordered table-hover" id="sample_3" style="font-size:10px">
										<thead>
											<tr>
												<td width="10%"></td>
												<td>Transaction No.</td>
												<td>Po No.</td>
												<td>Device Code</td>
												<td>Device name</td>
												<td>Kit No.</td>
												<td>Prepared By</td>
												<td>Slip No.</td>
												<td>Status</td>
												<td>Created By</td>
												<td>Created Date</td>
												<td>Updated By</td>
												<td>Updated Date</td>
											</tr>
										</thead>
										<tbody id="srch_tbl_body">
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" class="form-control input-sm" id="editId" name="editId">
							<button type="button" style="font-size:12px" onclick="javascript: filterData('SRCH'); " class="btn blue-madison" ><i class="glyphicon glyphicon-filter"></i> Filter</button>
							<button type="button" style="font-size:12px" onclick="javascript: filterData('CNCL'); " class="btn green" ><i class="glyphicon glyphicon-repeat"></i> Reset</button>
							<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>


	<!-- barcode -->
		<div id="barcodeModal-" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog gray-gallery">
				<div class="modal-content ">
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-md-offset-1 col-md-10">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- FIFO prompt -->
		<div id="fifoModal" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 id="tit" class="modal-title">FIFO Alert</h4>
					</div>
					<div class="modal-body">
						<p>FIFO is recommended, but you can specify your reason for using this Lot number.</p>
						<textarea class="form-control" id="fiforeason"></textarea>
						<input type="hidden" name="frlotno" id="frlotno">
						<input type="hidden" name="fritem" id="fritem">
						<input type="hidden" name="frqty" id="frqty">
						<input type="hidden" name="frid" id="frid">
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-danger" id="err_msg_close">Close</button>
						<a href="javascript:;" id="btn_fiforeason" class="btn btn-success">OK</a>
					</div>
				</div>
			</div>
		</div>

	<!-- msg -->
		<div id="msg" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-sm gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 id="err_title" class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<p id="err_msg"></p>
					</div>
					<div class="modal-footer">
						<span id="btn-excel"></span>
						<button type="button" data-dismiss="modal" class="btn btn-danger" id="err_msg_close">Close</button>
					</div>
				</div>
			</div>
		</div>

	<!-- msg -->
		<div id="donemsg" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-sm gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 id="dn_title" class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<p id="dn_err_msg"></p>
					</div>
					<div class="modal-footer">
						<span id="btn-excel"></span>
						<a href="javascript:;" id="btn_donemsg" class="btn btn-danger">Close</a>
					</div>
				</div>
			</div>
		</div>

	
<?php $__env->stopSection(); ?>

<?php if(Session::has('msg')): ?>
	<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			var msg = "<?php echo e(Session::get('msg')); ?>";
			failedmsg(msg);
		});
	</script>


<?php endif; ?>



<?php $__env->startPush('script'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/JsBarcode.min.js')); ?>"></script>
<script type="text/javascript">
	$(document).on('click', function(e) {
		var isFocused = $('#hd_barcode').is(':focus');
		var isModalOpen = $('#addIssModal').hasClass('in');

		if ($('#brsense').val() == 'edit') {
			if (isModalOpen != true) {
				if (isFocused != true) {
					$('#hd_barcode').focus();
	    		}
			}
		}
	});

	$('.iss_edit_close').on('click', function(event) {
		$('#hd_barcode').focus();
		var isFocused = $('#hd_barcode').is(':focus');
		var isModalOpen = $('#addIssModal').hasClass('in');

		if ($('#brsense').val() == 'edit') {
			if (isModalOpen != true) {
				if (isFocused != true) {
					$('#hd_barcode').focus();
	    		}
			}
		}
	});

 	$( document ).ready(function(e) {
		toggleBtnInit();

		$('#brsense').val('');
		var isFocused = $('#hd_barcode').is(':focus');
		var isModalOpen = $('#addIssModal').hasClass('in');

		if ($('#brsense').val() == 'edit') {
			if (isModalOpen != true) {
				if (isFocused != true) {
					$('#hd_barcode').focus();
	    		}
			}
		}
	});

		var link_id = '';
 		$("#issuanceno").keyup(function(event){
 			var mat = $('#issuanceno').val();
 			if(event.keyCode == 13)
 			{
 				window.location.href= "<?php echo e(url('/wbsmaterialkitting?page=')); ?>" + 'KIT&id=' + mat;
 			}
 		});

 		$('#addIssBtn').on('click', function(e) {
 			$('.add_iss_clear').val('');
 			$('#tblfifoAdd').html('');
 			var tbl = '<tr>'+
 							'<td colspan="6" class="text-center">No Data Displayed.</td>'
 						'</tr>';
 			$('#tblfifoAdd').append(tbl);
			$('#itemiss').focus();
 			$('#addIssModal').modal('show');
 		});

 		$('#btn_addPO').on('click', function(e) {
 			setControl('ADD');

 		});
		$('#btn_edit').on('click', function(e) {
 			setControl('EDIT');
 		});

		//barcode fired----------------------------------
 		$('#hd_barcode').keypress( function(e){
 			var key = e.which;
			if(key == 13) {
	 			$('#lotnoiss').val("");
	 			var barcode = $('#hd_barcode').val();
	 			var pono = $('#searchpono').val();
	 			var formUrl = "<?php echo e(url('/getbarcode')); ?>";
				var token = '<?php echo e(Session::token()); ?>';
				var formData = {
					_token:token,
					barcode:barcode,
	 				pono:pono
				};

				$.ajax({
					url:formUrl,
					method:'GET',
					data:formData,
					dataType: "JSON"
				}).done(function(data, textstatus, jqXHR){
					if (data == null) {
						failedmsg("Item Code is not available in this P.O.");
						$('#hd_barcode').val('');
					} else {
						$('#detailidiss').val(data.id);
		 				$('#itemiss').val(data.item);
		 				$('#kitiss').val(data.kit_qty);
		 				$('#lociss').val(data.location);
		 				$('#hd_barcode').focusout();
		 				$('#lotnoiss').focus();
		 				$('#addIssModal').modal('show');
		 				$('#hd_barcode').val('');
		 				loadfifo(barcode,$('#tblfifoAdd'));
					}
	 			}).fail(function(jqXHR,textStatus,errorThrown){
					console.log(errorThrown+'|'+textStatus);
				});
			}
 		});
 		
 		//------------------------------------------------------
 		//lotno fired-------------------------
 		
 		$('#lotnoiss').change(function(){
 			var item = $('#itemiss').val();
 			var lotno = $('#lotnoiss').val();
 			var pono = $('#searchpono').val();
 			var formUrl = "<?php echo e(url('/getlotno')); ?>";
			var token = '<?php echo e(Session::token()); ?>';
			var formData = {
				_token:token,
				item:item,
				lotno:lotno,
				pono:pono
			};
			$.ajax({
				url:formUrl,
				method:'GET',
				data:formData,
			}).done(function(data, textstatus, jqXHR){

				if(data == "NM"){
 					failedmsg("Lot number not Match!");
				}else{
					$('#qtyiss').val(data[0]['issued_qty']);
				}	
 			}).fail(function(jqXHR,textStatus,errorThrown){
				console.log(errorThrown+'|'+textStatus);
			});
 		});
 		
 		//------------------------------------------------

 		$('#err_msg_close').click(function(){
 			$('#lotnoiss').val("");
 			$('#lotnoiss').focus();
 		});

 		$('#btn_kittinglist').on('click', function() {
 			if ($('#issuanceCount').val() > 0) {
 				generateMkReport();
 			} else {
 				failedmsg("There are no Issuances for this P.O.");
 			}
 		});

 		$('#btn_kittinglistexcel').on('click', function() {
 			var url = "<?php echo e(url('/wbsmatkitexceldispatch')); ?>";
 			var po = $('#searchpono').val();

 			window.location.href= url+"?po="+po;
 		});

		function toggleBtnInit() {
			$('#btn_save').hide();
			$('#btn_discard').hide();
			$('#btn_saveIssueance').hide();
			$('#transfer').hide();
			$('#btn_delKitdetails').hide();
			$('#selectPObtn').attr('disabled','true');
			$('#kitQtybtn').attr('disabled','true');
			$('.edit_detail_btn').attr('disabled','true');
			//$('.barcodebtn').prop('disabled', true);
		}

		function setControl(ctrl) {
			if (ctrl == 'ADD') {
				var cd = getDate();
				$('#brsense').val('');
				$('#btn_save').toggle();
				$('#btn_discard').toggle();
				$('#btn_edit').toggle();
				$('#btn_cancel').toggle();
				$('#btn_search').toggle();
				$('#btn_kittinglist').toggle();
				$('#btn_kittinglistexcel').hide();
				$('#btn_print').toggle();
				$('#btn_addPO').toggle();
				$('#btn_reasonlogs').toggle()

				$('#btn_discard').removeAttr('disabled');
				$('#searchpono').removeAttr('disabled');
				$('#selectPObtn').removeAttr('disabled');
				$('#kitQtybtn').removeAttr('disabled');
				$('#btn_min').attr('disabled','true');
				$('#btn_prv').attr('disabled','true');
				$('#btn_nxt').attr('disabled','true');
				$('#btn_max').attr('disabled','true');

				$('#issuanceno').attr('disabled','true');

				$('.add').val('');
				$('#tblKitDetails').html('');
				$('#tblIssDetails').html('');
				$('#createddate').val(cd);
				$('#updateddate').val(cd);
				//$('.barcodebtn').prop('disabled', false);
			}

			if (ctrl == 'EDIT') {
				$('#brsense').val('edit');
				$('#btn_saveIssueance').toggle();
				$('#btn_discard').toggle();
				$('#btn_edit').toggle();
				$('#btn_cancel').toggle();
				$('#btn_search').toggle();
				$('#btn_kittinglist').toggle();
				$('#btn_kittinglistexcel').hide();
				$('#btn_print').toggle();
				$('#btn_addPO').toggle();
				$('#transfer').toggle();
				$('#btn_delKitdetails').toggle();
				$('#btn_reasonlogs').toggle();

				$('#kitQtybtn').removeAttr('disabled');
				$('#btn_discard').removeAttr('disabled');
				$('.edit_detail_btn').removeAttr('disabled');
				$('#btn_saveIssueance').removeAttr('disabled');

				$('#issuanceno').attr('disabled','true');
				$('#btn_min').attr('disabled','true');
				$('#btn_prv').attr('disabled','true');
				$('#btn_nxt').attr('disabled','true');
				$('#btn_max').attr('disabled','true');
				//$('.barcodebtn').prop('disabled', false);

				EnableIssDetailsBtn();
				$('#hd_barcode').focus();
			}
		}

 		$('#selectPObtn').on('click', function(e) {
 			var pono = $('#searchpono').val();
 			if (pono == '') {
 				failedmsg('Field is empty.');
 			} else {
				$('#loading').modal('show');
 				SearchPO(e,pono);
 			}
 		});

		function SearchPO(e,pono) {
			var token = '<?php echo e(Session::token()); ?>';
			var searchUrl = "<?php echo e(url('/searchpo')); ?>";
			var values = {
				searchpono : pono,
				_token : token,
			};

			//e.preventDefault();
			$.ajax({
				url: searchUrl,
				type: "POST",
				data: values,
			}).done( function(data, textStatus, jqXHR) {
				var tblKitDetails = '';
				var itemissSelect = '';
				var cnt = 1;
				$('#tblKitDetails').html('');
				$('#itemiss').html('');
				$('#loading').modal('hide');

				if(data == '') {
					failedmsg("PO number is not available.");
				} else if(data == 'This data is already has issuance number.'){
					failedmsg("This data is already has issuance number.");
				} else {
					$.each(data, function(i,det){
						var code = det.code;
						var name = det.prodname;
						var poqty = det.POqty;
						var cb = "<?php echo e(Auth::user()->user_id); ?>";
						var date = getDate();
						var location = det.location;
						var whs100 = det.whs100;
						var whs102 = det.whs102;

						if (det.location == null) {
							location = '';
						}
						if (det.whs100 == null) {
							whs100 = '';
						}
						if (det.whs102 == null) {
							whs102 = '';
						}

						tblKitDetails = '<tr>'+
											'<td style="width:3.6%">'+
											 	'<input type="checkbox" class="checkboxes" data-id="'+cnt+'"/>'+
											'</td>'+
											'<td style="width:7.6%">'+cnt+
												'<input type="hidden" id="detailidkit" name="detailidkit" value="'+cnt+'">'+
											'</td>'+
											'<td style="width:7.6%">'+det.item+
												'<input type="hidden" id="codekit" name="codekit" value="'+det.item+'">'+
											'</td>'+
											'<td style="width:11.6%">'+det.item_desc+
												'<input type="hidden" id="partnamekit" name="partnamekit" value="'+det.item_desc+'">'+
											'</td>'+
											'<td style="width:7.6%">'+det.usage+
												'<input type="hidden" id="usagekit" name="usagekit" value="'+det.usage+'">'+
											'</td>'+
											'<td style="width:7.6%">'+det.rqd_qty+
												'<input type="hidden" id="rqdqtykit" name="rqdqtykit" value="'+det.rqd_qty+'">'+
											'</td>'+
											'<td style="width:7.6%"></td>'+
											'<td style="width:7.6%">'+det.issued_qty+
												'<input type="hidden" id="issuedqtykit" name="issuedqtykit" value="'+det.issued_qty+'">'+
											'</td>'+
											'<td style="width:7.6%">'+location+
												'<input type="hidden" id="locationkit" name="locationkit" value="'+location+'">'+
											'</td>'+
											'<td style="width:7.6%">'+det.drawing_no+
												'<input type="hidden" id="drawnumkit" name="drawnumkit" value="'+det.drawing_no+'">'+
											'</td>'+
											'<td style="width:7.6%">'+det.supplier+
												'<input type="hidden" id="supplierkit" name="supplierkit" value="'+det.supplier+'">'+
											'</td>'+
											'<td style="width:7.6%">'+whs100+
												'<input type="hidden" id="whs100kit" name="whs100kit" value="'+whs100+'">'+
											'</td>'+
											'<td style="width:7.6%">'+whs102+
												'<input type="hidden" id="whs102kit" name="whs102kit" value="'+whs102+'">'+
											'</td>'+
										'</tr>';

						$('#tblKitDetails').append(tblKitDetails);

						itemissSelect = '<option value="'+det.item+'">'+det.item+'</option>';

						$('#itemiss').append(itemissSelect);

						$('#devicecode').val(code);
						$('#devicename').val(name);
						$('#poqty').val(poqty);
						$('#statuskit').val('Open');

						$('#devicecode1').val(code);
						$('#devicename1').val(name);
						$('#poqty1').val(poqty);
						$('#statuskit1').val('Open');

						$('#createdby').val(cb);
						$('#createdby1').val(cb);
						$('#updatedby').val(cb);
						$('#updatedby1').val(cb);

						$('#createddate').val(date);
						$('#createddate1').val(date);
						$('#updateddate').val(date);
						$('#updateddate1').val(date);

						$('#btn_addPO').attr('disabled','true');
						$('#btn_cancel').removeAttr('disabled');

						cnt++;
					});

					$('#searchpono').val(pono);
					$('#searchpono1').val(pono);
					$().attr('disabled','true');

					$('#searchPOmodal').modal('hide');
					$('#btn_addPO').prop('disabled', function(i, v) { return !v; });
					$('#KitQtymodal').modal('show');
				}
			}).fail( function(data, textStatus, jqXHR) {
				$('#loading').modal('hide');
				failedmsg("There is an error while processing PO number. ["+pono+"]");
			});
		}

		$('#kitQtybtn').on('click', function() {
			$('#getkitQty').focus();
			$('#KitQtymodal').modal('show');
		})

		function parseValue(str) {
		  Value = parseFloat( str.replace(/,/g,'') ).toFixed(2);
		  return +Value;
		}

		$('#selectKitQtybtn').on('click', function() {
			var kitqty = parseFloat($('#getkitQty').val());//parseValue($('#getkitQty').val());
			var poqty = parseFloat($('#poqty').val());//parseValue($('#poqty').val());

			if (kitqty > poqty) {
				failedmsg('Kit Qty must not be greater than the PO Qty.');
			} else {
				$('#kitqty').val(kitqty);
				$('#kitqty1').val(kitqty);
				$('#KitQtymodal').modal('hide');
				$('#kitno').removeAttr('disabled');
				$('#preparedby').removeAttr('disabled');
				UpdateKitQty();
			}

		});

		function UpdateKitQty() {
			var tblKitDetails = '';
			var token = '<?php echo e(Session::token()); ?>';
			var Url = "<?php echo e(url('/updatekitqty')); ?>";
			var values = {
				kitqty : $('#getkitQty').val(),
				_token : token,
			};

			//e.preventDefault();
			$.ajax({
				url: Url,
				type: "POST",
				data: values,
			}).done( function(data, textStatus, jqXHR) {
				$('#tblKitDetails').html('');
				$.each(data, function(i,det) {
					var location = det.location;
					var whs100 = det.whs100;
					var whs102 = det.whs102;

					if (det.location == null) {
						location = '';
					}
					if (det.whs100 == null) {
						whs100 = '';
					}
					if (det.whs102 == null) {
						whs102 = '';
					}
					tblKitDetails = '<tr id="details'+det.id+'">'+
										'<td style="width:3.6%">'+
										'<input type="checkbox" class="checkboxes kitdetailschk" data-id="'+det.id+'" data-code="'+det.item+'"'+
										' data-item_desc="'+det.item_desc+'" data-issued_qty="'+det.issued_qty+'" data-required_qty="'+det.rqd_qty+'"/>'+
									'</td>'+
										'</td>'+
										'<td style="width:7.6%">'+det.id+
											'<input type="hidden" id="detailidkit" name="detailidkit[]" value="'+det.id+'">'+
										'</td>'+
										'<td style="width:7.6%">'+det.item+
											'<input type="hidden" id="codekit" name="codekit[]" value="'+det.item+'">'+
										'</td>'+
										'<td style="width:11.6%">'+det.item_desc+
											'<input type="hidden" id="partnamekit" name="partnamekit[]" value="'+det.item_desc+'">'+
										'</td>'+
										'<td style="width:7.6%">'+det.usage+
											'<input type="hidden" id="usagekit" name="usagekit[]" value="'+det.usage+'">'+
										'</td>'+
										'<td style="width:7.6%">'+det.rqd_qty+
											'<input type="hidden" id="rqdqtykit" name="rqdqtykit[]" value="'+det.rqd_qty+'">'+
										'</td>'+
										'<td style="width:7.6%">'+det.kit_qty+
											'<input type="hidden" id="kitqtykit" name="kitqtykit[]" value="'+det.kit_qty+'">'+
										'</td>'+
										'<td style="width:7.6%">'+det.issued_qty+
											'<input type="hidden" id="issuedqtykit" name="issuedqtykit[]" value="'+det.issued_qty+'">'+
										'</td>'+
										'<td style="width:7.6%">'+location+
											'<input type="hidden" id="locationkit" name="locationkit[]" value="'+location+'">'+
										'</td>'+
										'<td style="width:7.6%">'+det.drawing_no+
											'<input type="hidden" id="drawnumkit" name="drawnumkit[]" value="'+det.drawing_no+'">'+
										'</td>'+
										'<td style="width:7.6%">'+det.supplier+
											'<input type="hidden" id="supplierkit" name="supplierkit[]" value="'+det.supplier+'">'+
										'</td>'+
										'<td style="width:7.6%">'+whs100+
											'<input type="hidden" id="whs100kit" name="whs100kit[]" value="'+whs100+'">'+
										'</td>'+
										'<td style="width:7.6%">'+whs102+
											'<input type="hidden" id="whs102kit" name="whs102kit[]" value="'+whs102+'">'+
										'</td>'+
									'</tr>';

					$('#tblKitDetails').append(tblKitDetails);
					console.log(det);
				});
				$('#btn_save').removeAttr('disabled');
			}).fail( function(data, textStatus, jqXHR) {
				failedmsg('There is an error while processing.');
			});
		}

		$('#selectAll').on('change', function(e){
			var table = $(e.target).closest('table');
			$('.KitDetailchk',table).prop('checked',this.checked);
		});

		function SwitchTab() {
			if ($('#kitdetailsli').hasClass("active")) {
				$('#kitdetailsli').removeClass("active");
				$('#issuancedetailsli').addClass("active");
				$('#kitdetails').removeClass("in active");
				$('#issuancedetails').addClass("fade in active");
			} else if ($('#issuancedetailsli').hasClass("active") && $('#pono').val() != '') {

			}else {
				$('#issuancedetailsli').removeClass("active");
				$('#kitdetailsli').addClass("active");
				$('#issuancedetails').removeClass("in active");
				$('#kitdetails').addClass("fade in active");
			}
		}

		function getDate()
        {
            var d = new Date();

            var month = d.getMonth()+1;
            var day = d.getDate();

            var output = d.getFullYear() + '/' +
                ((''+month).length<2 ? '0' : '') + month + '/' +
                ((''+day).length<2 ? '0' : '') + day;

            return output;
        }

		$('#btn_cancel').on('click', function() {
			var cancel = "cancelpo";
			var msg = "Are you sure you want to cancel this transaction?";
			$('#delaction').val(cancel);
			$('#del_msg').html(msg);
			$('#confirm').modal('show');
		});

		$('#btn_delKitdetails').on('click', function() {
			var del = "deletedetails";
			var msg = "Are you sure you want to delete this/these detail/s?";
			$('#delaction').val(del);
			$('#del_msg').html(msg);
			$('#confirm').modal('show');
		});

		$('#btn_cancel_mdl').on('click', function(e) {
			if ($('#delaction').val() == 'cancelpo') {
				cancelpo();
			}

			if ($('#delaction').val() == 'deletedetails') {
				delDetails();
			}

			if ($('#delaction').val() == 'transfertosakidashi') {
				transfertosakidashi(e);
			}
		});

		$('#transfer').on('click', function(e) {
			var del = "transfertosakidashi";
			var msg = "Are you sure you want to transfer this/these detail/s to Sakidashi Issuance?";
			$('#delaction').val(del);
			$('#del_msg').html(msg);
			$('#confirm').modal('show');
		});

		function transfertosakidashi(e) {
			/* declare an checkbox array */
			var id = [], itemcode = [], item_desc = [], issued_qty = [], required_qty = [];

			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			if (isCheck($('.kitdetailschk'))) {
				$('.kitdetailschk:checked').each(function() {
					id.push($(this).attr('data-id'));
					itemcode.push($(this).attr('data-item'));
					issued_qty.push($(this).attr('data-issued_qty'));
					item_desc.push($(this).attr('data-item_desc'));
					required_qty.push($(this).attr('data-required_qty'));

				});
				var token = "<?php echo e(Session::token()); ?>";
				var data = {
					issno: $('input[name=issuanceno]').val(),
					po_no: $('input[name=searchpono]').val(),
					device_code: $('input[name=devicecode]').val(),
					device_name: $('input[name=devicename]').val(),
					po_qty: $('input[name=poqty]').val(),
					status: $('input[name=statuskit]').val(),
					id: id,
					item: itemcode,
					item_desc: item_desc,
					issued_qty: issued_qty,
					required_qty: required_qty,
					_token: token
				}
				var url = "<?php echo e(url('/transfertosakidashi')); ?>";
				$.ajax({
					url: url,
					type: "POST",
					data: data,
				}).done( function(data, textStatus, jqXHR) {
					//alert(data);
					console.log(data);
					$.each(id, function(i,val) {
						$('#details'+val).remove();
					});
					$('#confirm').modal('hide');
					donemsg(data.msg);
					link_id = data.id.id;
				}).fail( function(data, textStatus, jqXHR) {
	 				failedmsg("There is an error while transfering");
				});
			} else {
				failedmsg("Please select an item.");
			}
			
		}

		function delDetails() {
			var id = [];

			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			if (isCheck($('.kitdetailschk'))) {
				$(".kitdetailschk:checked").each(function() {
					id.push($(this).attr('data-id'));
				});
				var token = "<?php echo e(Session::token()); ?>";
				var data = {
					issno: $('input[name=issuanceno]').val(),
					id: id,
					_token: token
				}
				var url = "<?php echo e(url('/deletekitdetails')); ?>";
				$.ajax({
					url: url,
					type: "POST",
					data: data,
				}).done( function(data, textStatus, jqXHR) {
					console.log(data);
					$.each(id, function(i,val) {
						$('#details'+val).remove();
					});
					donemsg(data.msg);
					link_id = data.id.id;
				}).fail( function(data, textStatus, jqXHR) {
	 				failedmsg("There is an error while deleting");
				});
			} else {
	 			failedmsg("Please select an item.");
			}
		}

		function cancelpo() {
			$('#confirm').modal('hide');
			var url = "<?php echo e(url('/cancelkit')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				issno: $('input[name=issuanceno]').val(),
				_token: token,
			}

			$.ajax({
				url: url,
				type: "POST",
				data: data,
			}).done( function(data, textStatus, jqXHR) {
 				successmsg(data.msg);
				e.preventDefault();
				window.location.href="<?php echo e(url('/wbsmaterialkitting?page=')); ?>"+ "CUR&id=" + data.id.id;
			}).fail( function(data, textStatus, jqXHR) {
				failedmsg("There is an error while cancelling");
			});
		}

		$('#itemiss').on('change', function(e) {
			var token = '<?php echo e(Session::token()); ?>';
			var Url = "<?php echo e(url('/getcodedetails')); ?>";
			var values = {
				code : $('#itemiss').val(),
				_token : token,
			};
			//e.preventDefault();
			$.ajax({
				url: Url,
				type: "POST",
				data: values,
			}).done( function(data, textStatus, jqXHR) {
				if (data == '') {
					failedmsg("This Item is not available for this P.O. number.");
				} else {
					$.each(data, function(i,iss) {
						var name = iss.item_desc;
						var location = iss.location;
						var kitqty = iss.kit_qty;

						$('#kitiss').val(kitqty);
						$('#kitiss1').val(kitqty);
						$('#nameiss').val(name);
						$('#lociss').val(location);
						// console.log(iss.item_desc);
					});

					loadfifo($('#itemiss').val(),$('#tblfifoAdd'));
				}

			}).fail( function(data, textStatus, jqXHR) {
				failedmsg('There is an error while processing.');
			});
		});

		$('#qtyiss').focusout(function() {
			var kit = parseInt($('#kitiss').val());
			var iss = parseInt($('#qtyiss').val());

			if (iss > kit) {
				failedmsg("Issued Qty. must be equal or lower than Kit Qty.");
			}
		});

		var newdetid = $('input[name=count]').val();
		$('#addIssDetailbtn').on('click', function() {
			if ($('#tblfifoAdd tr').length > 0 || $('#tblfifoEdit tr').length > 0) {
				var tblIssDetails = '';
				var code = $('#itemiss').val();
				var name = $('#nameiss').val();
				var kitqty = $('#kitiss').val();
				var issuedqty = $('#qtyiss').val();
				var lotno = $('#lotnoiss').val();
				var location = $('#lociss').val();
				var remarks = $('#remarksiss').val();
				var fifoid = $('#fifoid').val();
				var cnt = 1;
				var issuanceno = $('#issuanceno').val();

				if (kitqty < issuedqty) {
					failedmsg("Issued quantity must be less than or equal to kit quantity.");
				} else {
					newdetid++;

					tblIssDetails = '<tr id="'+newdetid+'">'+
										'<td>'+
											'<input type="checkbox" id="chkIssDetail'+cnt+'" data-inpt="issDetail'+cnt+'" data-tr="'+newdetid+'" class="checkboxes issDetails" value="1"/>'+
										'</td>'+
										'<td>'+
											'<a href="#" class="btn btn-success btn-sm edit_detail_btn" data-id="'+newdetid+
											'" data-code="'+code+'" data-name="'+name+'" data-kitqty="'+kitqty+
											'" data-issuedqty="'+issuedqty+'" data-lotno="'+lotno+'" data-location="'+location+
											'" data-remarks="'+remarks+'" data-fifoid="'+fifoid+'"><i class="fa fa-edit"></i></a>'+
										'</td>'+
										'<td id="issdetailid-'+newdetid+'" class="id">'+newdetid+
											'<input type="hidden" id="issdetailid'+newdetid+'" name="issdetailid[]" value="'+newdetid+'"/>'+
										'</td>'+
										'<td id="item-'+newdetid+'">'+code+
											'<input type="hidden" id="item'+newdetid+'" name="issitem[]" value="'+code+'"/>'+
										'</td>'+
										'<td id="item_desc-'+newdetid+'">'+name+
											'<input type="hidden" id="item_desc'+newdetid+'" name="issitemdesc[]" value="'+name+'"/>'+
										'</td>'+
										'<td id="kit_qty-'+newdetid+'">'+kitqty+
											'<input type="hidden" id="kit_qty'+newdetid+'" name="isskit_qty[]"value="'+kitqty+'" />'+
										'</td>'+
										'<td id="issued_qty-'+newdetid+'">'+issuedqty+
											'<input type="hidden" id="issued_qty'+newdetid+'" name="ississued_qty[]" value="'+issuedqty+'"/>'+
										'</td>'+
										'<td id="lot_no-'+newdetid+'">'+lotno+
											'<input type="hidden" id="lot_no'+newdetid+'" name="isslot_no[]" value="'+lotno+'"/>'+
											'<input type="hidden" id="fifoid'+newdetid+'" name="issfifoid[]" value="'+fifoid+'"/>'+
										'</td>'+
										'<td id="location-'+newdetid+'">'+location+
											'<input type="hidden" id="location'+newdetid+'" name="isslocation[]" value="'+location+'"/>'+
										'</td>'+
										'<td id="remarks-'+newdetid+'">'+remarks+
											'<input type="hidden" id="remarks'+newdetid+'" name="issremarks[]" value="'+remarks+'"/>'+
										'</td>'+
										'<td id="barcode-'+newdetid+'">'+
											'<a href="javascript:;" class="btn input-sm grey-gallery barcodebtn" data-detailid="'+newdetid+'" data-item="'+code+'" data-item_desc="'+name+'" data-kit_qty="'+kitqty+'" data-issued_qty="'+issuedqty+'" data-lot_no="'+lotno+'" data-location="'+location+'" data-issueno="'+issuanceno+'">'+
												'<i class="fa fa-barcode"></i>'+
											'</a>'+
										'</td>'+
									'</tr>';
					$('#tblIssDetails').append(tblIssDetails);
					$('#addIssModal').modal('hide');
					$('#btn_discard').removeAttr('disabled');
					$('#btn_save').removeAttr('disabled');
				}

				
			}
		});

		function EnableIssDetailsBtn()
		{
			$('#addIssBtn').removeAttr('disabled');
			$('#saveIssBtn').removeAttr('disabled');
			$('#delIssBtn').removeAttr('disabled');
		}

		$('#btn_discard').on('click', function() {
			window.location.href="<?php echo e(url('/wbsmaterialkitting')); ?>";
		});

		$("#tblIssDetails").on("click", ".edit_detail_btn", function(){
 			$('#editIssModal').on('shown.bs.modal',function(){
				$('#editlotnoiss').focus();		
			});	
 			
			var id = $(this).attr('data-id');
			var code = $(this).attr('data-code');
			var name = $(this).attr('data-name');
			var kitqty = $(this).attr('data-kitqty');
			var issuedqty = $(this).attr('data-issuedqty');
			var lotno = $(this).attr('data-lotno');
			var location = $(this).attr('data-location');
			var remarks = $(this).attr('data-remarks');
			var fifoid = $(this).attr('data-fifoid');

			$('#editdetailidiss').val(id);
			$('#editdetailidiss1').val(id);
			$('#edititemiss').val(code);
			$('#editnameiss').val(name);
			$('#editkitiss').val(kitqty);
			$('#editkitiss1').val(kitqty);
			$('#editqtyiss').val(issuedqty);
			$('#editlotnoiss').val(lotno);
			$('#fifoidedit').val(fifoid);
			$('#editlociss').val(location);
			$('#editlociss1').val(location);
			$('#editremarksiss').val(remarks);

			$('#editIssModal').modal('show');
			loadfifo(code,$('#tblfifoEdit'));
		});

		$('#editIssDetailbtn').on('click', function() {
			var id = $('#editdetailidiss').val();
			var code = $('#edititemiss').val();
			var name = $('#editnameiss').val();
			var kitqty = $('#editkitiss').val();
			var issuedqty = $('#editqtyiss').val();
			var lotno = $('#editlotnoiss').val();
			var fifoid = $('#fifoidedit').val();
			var location = $('#editlociss').val();
			var remarks = $('#editremarksiss').val();

			$('#issued_qty-'+id).html(issuedqty+'<input type="hidden" id="ississued_qty'+id+'" name="ississued_qty[]" value="'+issuedqty+'"/>');

			$('#lot_no-'+id).html(lotno+'<input type="hidden" id="isslot_no'+id+'" name="isslot_no[]" value="'+lotno+'"/>'+
									'<input type="hidden" id="issfifoid'+id+'" name="issfifoid[]" value="'+fifoid+'"/>');
			// $('#location-'+id).html(location+'<input type="hidden" id="location'+id+'" name="location[]" value="'+location+'"/>');
			$('#remarks-'+id).html(remarks+'<input type="hidden" id="issremarks'+id+'" name="issremarks[]" value="'+remarks+'"/>');

			$('#editIssModal').modal('hide');
		});

		$('#delIssBtn').on('click', function(e){
			delIss();
		});

		$('#btn_save').on('click', function(e) {
			if ($('input[name=kitno]').val() == '' || $('input[name=preparedby]').val() == '') {
				failedmsg("All fields are required.");
			} else {
				var url = "<?php echo e(url('/savematkit')); ?>";
				var token = "<?php echo e(Session::token()); ?>";
				var data = {
					_token: token,
					po: $('input[name=searchpono]').val(),
					devicecode: $('input[name=devicecode]').val(),
					devicename: $('input[name=devicename]').val(),
					poqty: $('input[name=poqty]').val(),
					kitqty: $('input[name=kitqty]').val(),
					kitno: $('input[name=kitno]').val(),
					preparedby: $('input[name=preparedby]').val(),
					statuskit: $('input[name=statuskit]').val(),
					detailidkit: $('input[name^="detailidkit"]').map(function(){return $(this).val();}).get(),
					codekit: $('input[name^="codekit"]').map(function(){return $(this).val();}).get(),
					partnamekit: $('input[name^="partnamekit"]').map(function(){return $(this).val();}).get(),
					usagekit: $('input[name^="usagekit"]').map(function(){return $(this).val();}).get(),
					rqdqtykit: $('input[name^="rqdqtykit"]').map(function(){return $(this).val();}).get(),
					kitqtykit: $('input[name^="kitqtykit"]').map(function(){return $(this).val();}).get(),
					issuedqtykit: $('input[name^="issuedqtykit"]').map(function(){return $(this).val();}).get(),
					locationkit: $('input[name^="locationkit"]').map(function(){return $(this).val();}).get(),
					drawnumkit: $('input[name^="drawnumkit"]').map(function(){return $(this).val();}).get(),
					supplierkit: $('input[name^="supplierkit"]').map(function(){return $(this).val();}).get(),
					whs100kit: $('input[name^="whs100kit"]').map(function(){return $(this).val();}).get(),
					whs102kit: $('input[name^="whs102kit"]').map(function(){return $(this).val();}).get(),
				};

				$.ajax({
					url: url,
					type: "POST",
					data: data,
				}).done( function(data, textStatus, jqXHR) {
					donemsg(data.msg);
					link_id = data.id.id;
				}).fail( function(data, textStatus, jqXHR) {
					failedmsg('There is an error while processing.');
				});
			}
		});

		$('#btn_saveIssueance').on('click', function(e) {
			saveIssuanceDetails('saveissuance');
		});

		$('#saveIssBtn').on('click', function() {
			saveIssuanceDetails('savedetails');
		});

		function saveIssuanceDetails(types) {
			var url = "<?php echo e(url('/savematissue')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				issno: $('input[name=issuanceno]').val(),
				po: $('input[name=searchpono]').val(),
				issdetailid: $('input[name="issdetailid[]"]').map(function(){return $(this).val();}).get(),
				item: $('input[name="issitem[]"]').map(function(){return $(this).val();}).get(),
				item_desc: $('input[name="issitemdesc[]"]').map(function(){return $(this).val();}).get(),
				kit_qty: $('input[name="isskit_qty[]"]').map(function(){return $(this).val();}).get(),
				issued_qty: $('input[name="ississued_qty[]"]').map(function(){return $(this).val();}).get(),
				lot_no: $('input[name="isslot_no[]"]').map(function(){return $(this).val();}).get(),
				fifoid: $('input[name="issfifoid[]"]').map(function(){return $(this).val();}).get(),
				location: $('input[name="isslocation[]"]').map(function(){return $(this).val();}).get(),
				remarks: $('input[name="issremarks[]"]').map(function(){return $(this).val();}).get(),
			};

			$.ajax({
				url: url,
				type: "POST",
				data: data,
			}).done( function(data, textStatus, jqXHR) {
				if (types == 'saveissuance') {
					donemsg(data.msg);
					link_id = data.id.id;
				} else {
					successmsg(data.msg);
				}
			}).fail( function(data, textStatus, jqXHR) {
				failedmsg('There is an error while processing.');
			});
		}

		$('#btn_donemsg').on('click', function() {
			$('#donemsg').modal('hide');
			window.location.href="<?php echo e(url('/wbsmaterialkitting?page=')); ?>" + "CUR&id=" + link_id;
			$('#btn_min').removeAttr('disabled');
			$('#btn_prv').removeAttr('disabled');
			$('#btn_nxt').attr('disabled','true');
			$('#btn_max').attr('disabled','true');
		});

		function delIss(){
			/* declare an checkbox array */
			var chkArray = [];

			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			$(".issDetails:checked").each(function() {
				chkArray.push($(this).attr('id'));
			});

			console.log(chkArray);


			$.each(chkArray, function(i,val) {
				var tr = $('#'+val).attr('data-tr');
				console.log(tr);

				$('#tblIssDetails #'+tr).remove();
			});
		}


		$('.group-checkable').on('change', function(e) {
			$('input:checkbox.kitdetailschk').not(this).prop('checked', this.checked);
		});

		$('#btn_fiforeason').on('click', function() {
			var item = $('#fritem').val();
			var lotno = $('#frlotno').val();
			var qty = $('#frqty').val();
			var id = $('#frid').val();
			var issuanceno = $('#issuanceno').val();
			var reason = $('#fiforeason').val();

			if (reason == '') {
				failedmsg('Please specify your reason for using this Lot Number.');
			} else {
				saveFifoReason(item,lotno,qty,id,issuanceno,reason);
			}
		});

		$('#btn_reasonlogs').on('click', function() {
			window.location.href = "<?php echo e(url('/wbsmatkitreasonexcel')); ?>" + "?issuanceno="+$('#issuanceno').val();
		});

		$('#tblfifoAdd').on('click', '.btn_select_lot', function() {
			if ($(this).attr('data-rowcount') != 1) {
				$('#frlotno').val($(this).attr('data-lotno'));
				$('#frqty').val($(this).attr('data-qty'));
				$('#frid').val($(this).attr('data-id'));
				$('#fritem').val($('#itemiss').val());
	            $('#fifoModal').modal('show');
			} else {
				var lotno = $(this).attr('data-lotno');
				$('#lotnoiss').val(lotno);
				$('#qtyiss').val($(this).attr('data-qty'));
				$('#fifoid').val($(this).attr('data-id'));
			}
		});

		$('#tblfifoEdit').on('click', '.btn_select_lot', function() {
			if ($(this).attr('data-rowcount') != 1) {
				$('#frlotno').val($(this).attr('data-lotno'));
				$('#frqty').val($(this).attr('data-qty'));
				$('#frid').val($(this).attr('data-id'));
				$('#fritem').val($('#edititemiss').val());
	            $('#fifoModal').modal('show');
			} else {
				var lotno = $(this).attr('data-lotno');
				$('#editlotnoiss').val(lotno);
				$('#editqtyiss').val($(this).attr('data-qty'));
				$('#fifoidedit').val($(this).attr('data-id'));
			}
		});

		$('#tblIssDetails').on('click', '.barcodebtn', function() {
			var id = $(this).attr('data-detailid');
			var item = $(this).attr('data-item');
			var item_desc = $(this).attr('data-item_desc');
			var kit_qty = $(this).attr('data-kit_qty');
			var issued_qty = $(this).attr('data-issued_qty');
			var lot_no = $(this).attr('data-lot_no');
			var location = $(this).attr('data-location');
			var issuanceno = $(this).attr('data-issueno');
			var po = $('#searchpono').val();

			if (isOnMobile() == true) {
				printBRcode(id,item,item_desc,kit_qty,issued_qty,lot_no,location,po,issuanceno);
			} else {
				printBRcode(id,item,item_desc,kit_qty,issued_qty,lot_no,location,po,issuanceno);
				failedmsg("Please use mobile device.");
			}
		});

		function printBRcode(id,item,item_desc,kit_qty,issued_qty,lot_no,location,po,issuanceno) {
			window.location.href="/wbskit-brprint?id="+id+"&&issuanceno="+issuanceno;
		}	

 		function getrecord(val)
 		{
 			var id = 0;
 			switch(val)
 			{
 				case ('MIN'):
 				id = 1;
 				break;
 				case ('PRV'):
 				id = parseInt($('#recid').val());
 				break;
 				case ('NXT'):
 				id = parseInt($('#recid').val());
 				break;
 				case ('MAX'):
 				id = -1;
 				break;
 				case ('INV'):
 				id = 0;
 				break;
 				default:
 				id = 1;
 				break;
 			}
 			window.location.href= "<?php echo e(url('/wbsmaterialkitting?page=')); ?>" + val + '&id=' + id;
 		}

		function searchData()
		{
			$("#searchModal").modal().shown();
		}

 		function filterData(action)
 		{
 			var condition_arr = new Array;

 			if(action == 'SRCH')
 			{
 				condition_arr[0] = $("#srch_pono").val();
 				condition_arr[1] = $("#srch_kitno").val();
 				condition_arr[2] = $("#srch_preparedby").val();
 				condition_arr[3] = $("#srch_slipno").val();
 				condition_arr[4] = $("#srch_status").val();
 			}
 			else
 			{
 				$("#srch_pono").val("")
 				$("#srch_kitno").val("")
 				$("#srch_preparedby").val("")
 				$("#srch_slipno").val("")
 				$("#srch_status").val("")

 				condition_arr[0] = 'X';
 				condition_arr[1] = 'X';
 				condition_arr[2] = 'X';
 				condition_arr[3] = 'X';
 			}

 			if($('#srch_open:checkbox:checked').length > 0)
 			{
 				condition_arr[5] ='1';
 			}
 			else
 			{
 				condition_arr[5] ='0';
 			}

 			if($('#srch_close:checkbox:checked').length > 0)
 			{
 				condition_arr[6] ='1';
 			}
 			else
 			{
 				condition_arr[6] ='0';
 			}

 			if($('#srch_cancelled:checkbox:checked').length > 0)
 			{
 				condition_arr[7] ='1';
 			}
 			else
 			{
 				condition_arr[7] ='0';
 			}

 			$.post("<?php echo e(url('/wbskit-search')); ?>",
 			{
 				_token         : $('meta[name=csrf-token]').attr('content'),
 				condition_arr  : condition_arr
 			})
 			.done(function(datatable)
 			{
 				// alert(datatable);
                    var newcol = '';
                    var newItem = '';
                    var newcollink = '';

                    $('#srch_tbl_body').html('');

                    var arr = $.map(datatable, function(datarow)
                    {
                    	newcol = '';
                    	$.each( datarow, function( ckey, value )
                    	{
                    		if(ckey == 'id')
                    		{
                    			newcollink = '<td><a href="#" class="btn btn-primary btn-sm" onclick="findEdit('+value+')" value="'+ value +'">Find</a></td>';
                    		}
                    		else
                    		{
                    			newcol = newcol + '<td>'+value+'</td>'
                    		}
                    	});
                    	newItem = '<tr>'
                    	+ newcollink
                    	+ newcol
                    	+ '</tr>';
                    	$('#srch_tbl_body').append(newItem);
                    });


                })
 			.fail(function()
 			{
 				alert('fail');
 			});
 		}

		function findEdit(id)
		{
		  window.location.href= "<?php echo e(url('/wbsmaterialkitting?page=')); ?>" + 'CUR&id=' + id;
		}
		function generateMkReport()
		{
		  window.open("<?php echo e(url('/wbskit-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
		}

		function generateMkReport2()
		{
		  window.open("<?php echo e(url('/wbskit-print-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
		}

    function loadfifo(code,table) {
    	table.html('');
     	var url = "<?php echo e(url('/wbsmatkitfifotbl')); ?>";
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
     		var cnt = 1;
     		$.each(data, function(i, x) {
     			// console.log(x);
     			tblfifoAdd = '<tr>'+
     							'<td style="width:8.6%">'+
     								'<a href="javascript:;" class="btn btn-primary btn_select_lot input-sm" '+
     								'data-lotno="'+x.lot_no+'" data-id="'+x.id+'" data-rowcount="'+cnt+'" data-qty="'+x.qty+'">'+
     									'<i class="fa fa-pencil"></i>'+
     								'</a>'+
     							'</td>'+
                                '<td style="width:16.6%">'+x.item+'</td>'+
                                '<td style="width:24.6%">'+x.item_desc+'</td>'+
                                '<td style="width:16.6%">'+x.qty+'</td>'+
                                '<td style="width:16.6%">'+x.lot_no+'</td>'+
                                '<td style="width:16.6%">'+x.received_date+'</td>'+
                            '</tr>';

        		table.append(tblfifoAdd);
        		cnt++;
     		});
     	}).fail(function(data) {
     		failedmsg('There is an error while processing.');
     	});
     	
    }

    function isCheck(element) {
		if(element.is(':checked')) {
			return true;
		} else {
			return false;
		}
	}

	function isOnMobile() {
		var isMobile = false; //initiate as false
		// device detection
		if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

		return isMobile;
	}

	function failedmsg(msg) {
        $('#err_title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
        $('#err_msg').html(msg);
        $('#msg').modal('show');
	}

	function successmsg(msg) {
        $('#err_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
        $('#err_msg').html(msg);
        $('#msg').modal('show');
	}

	function donemsg(msg) {
		$('#dn_title').html('<strong><i class="fa fa-check"></i></strong> Success!')
		$('#dn_err_msg').html(msg);
		$('#donemsg').modal('show');
	}

	function saveFifoReason(item,lotno,qty,id,issuanceno,reason) {
		var token = "<?php echo e(Session::token()); ?>";
		var data = {
			_token: token,
			item: item,
			lotno: lotno,
			issuanceno: issuanceno,
			reason: reason,
		};

		$.ajax({
			url: '/wbsmatkitfiforeason',
			type: 'POST',
			dataType: 'JSON',
			data: data
		}).done( function(data, textStatus, jqXHR) {
			if (data.return_status == 'success') {
				console.log(data);
				$('#lotnoiss').val(lotno);
				$('#qtyiss').val(qty);
				$('#fifoid').val(id);

				$('#editlotnoiss').val(lotno);
				$('#editqtyiss').val(qty);
				$('#fifoidedit').val(id);
				
				$('#fifoModal').modal('hide');
			} else {
				failedmsg('Requesting Failed.');
			}
			
		}).fail( function(data, textStatus, jqXHR) {
			failedmsg("There was an error while processing.");
		});
	}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>