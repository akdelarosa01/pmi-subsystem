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
												Material Kitting & Issuance <i class="fa fa-angle-down"></i>
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
												<li class="active">
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
													<a href="<?php echo e(url('/wbspartsreceiving')); ?>">
		 											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
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
												<li>
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
										   <a href="<?php echo e(url('/wbsmaterialkitting')); ?>" class="list-group-item  active">
											   <i class="fa fa-clipboard fa-2x"></i> Material Kitting & Issuance
										   </a>
										   <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
										   </a>
										   <a href="<?php echo e(url('/wbspartsreceiving')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
										   </a>
										   <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatreturn')); ?>" class="list-group-item">
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
											<?php echo e(csrf_field()); ?>

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
								   					 <div class="col-sm-4">
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
								   					 <div class="col-sm-4">
														 <input class="form-control input-sm add" type="text" id="updateddate" disabled="true" value="<?php if(isset($mkdata)){echo $mkdata->updated_at; } ?>" />
														 <input type="hidden" class="add" id="updateddate1" name="updateddate" value="<?php if(isset($mkdata)){echo $mkdata->updated_at; } ?>" />
								   					 </div>
								   				 </div>
								   			 </div>

									   	 </div>

									   	 <div class="row">
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
									   							 	<div class="scroller" style="height: 300px">
										   								 <table class="table table-striped table-bordered table-hover" style="font-size:10px">
										   									 <thead>
										   										 <tr>
																					 <td class="table-checkbox">
							 															<input type="checkbox" class="group-checkable" id="group-checkable"/>
							 														</td>
										   											 <td>Detail ID</td>
										   											 <td>Item/Part No.</td>
										   											 <td>Item Description</td>
										   											 <td>Usage</td>
										   											 <td>Rqd Qty.</td>
										   											 <td>Kit Qty.</td>
										   											 <td>Issued Qty.</td>
										   											 <td>Location</td>
										   											 <td>Drawing No.</td>
										   											 <td>Supplier</td>
										   											 <td>Whse100</td>
										   											 <td>Whse102</td>
										   										 </tr>
										   									 </thead>
										   									 <tbody id="tblKitDetails">
										   									 	<?php $cnt = 1;?>
										   									 	<?php if(isset($mk_data_details)): ?>
											   									 	<?php foreach($mk_data_details as $mkddata): ?>
												   									 	<tr id="datas<?php echo e($cnt); ?>">
												   									 		<td><input type="checkbox" id="chkIssDetail<?php echo e($cnt); ?>" data-inpt="inputData<?php echo e($cnt); ?>" data-tr="datas<?php echo e($cnt); ?>" class="checkboxes kitdetailschk" value="<?php echo e($mkddata->detailid); ?>"
																								data-id="<?php echo e($mkddata->detailid); ?>" data-itemcode="<?php echo e($mkddata->item); ?>" data-item_desc="<?php echo e($mkddata->item_desc); ?>" data-issued_qty="<?php echo e($mkddata->issued_qty); ?>" data-required_qty="<?php echo e($mkddata->rqd_qty); ?>"/></td>
												   									 		<td><?php echo e($mkddata->detailid); ?></td>
												   									 		<td><?php echo e($mkddata->item); ?></td>
												   									 		<td><?php echo e($mkddata->item_desc); ?></td>
												   									 		<td><?php echo e($mkddata->usage); ?></td>
												   									 		<td><?php echo e($mkddata->rqd_qty); ?></td>
												   									 		<td><?php echo e($mkddata->kit_qty); ?></td>
												   									 		<td><?php echo e($mkddata->issued_qty); ?></td>
												   									 		<td><?php echo e($mkddata->location); ?></td>
												   									 		<td><?php echo e($mkddata->drawing_no); ?></td>
												   									 		<td><?php echo e($mkddata->supplier); ?></td>
												   									 		<td><?php echo e($mkddata->whs100); ?></td>
												   									 		<td><?php echo e($mkddata->whs102); ?></td>
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
																	 <a href="javascript:;" class="btn grey-gallery input-sm" id="transfer">
									   									 <i class="fa fa-exchange"></i> Transfer to Sakidashi
									   								 </a>
									   							 </div>
									   						 </div>
									   					 </div>
									   					 <div class="tab-pane fade" id="issuancedetails">
									   						 <div class="row">
									   							 <div class="col-md-8 col-md-offset-2">
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
									   										 </tr>
									   									 </thead>
									   									 <tbody id="tblIssDetails">
																			 <?php $cnt = 0; ?>
										   									 	<?php if(isset($mk_issuance_details)): ?>
											   									 	<?php foreach($mk_issuance_details as $mkidata): ?>
																						<?php $cnt++?>
												   									 	<tr>
												   									 		<td>
												   									 			<input type="checkbox" id="chkIssDetail<?php echo e($mkidata->detailid); ?>" data-inpt="inputData<?php echo e($mkidata->detailid); ?>" data-tr="datas<?php echo e($mkidata->detailid); ?>" class="checkboxes" value="1"/>
												   									 		</td>
												   									 		<td>
																								<a href="javascript:;" class="btn btn-success btn-sm edit_detail_btn" data-id="<?php echo e($mkidata->detailid); ?>"
																									data-code="<?php echo e($mkidata->item); ?>" data-name="<?php echo e($mkidata->item); ?>" data-kitqty="<?php echo e($mkidata->kit_qty); ?>"
																									data-issuedqty="<?php echo e($mkidata->issued_qty); ?>" data-lotno="<?php echo e($mkidata->lot_no); ?>" data-location="<?php echo e($mkidata->location); ?>"
																									data-remarks="<?php echo e($mkidata->remarks); ?>"><i class="fa fa-edit"></i></a>
												   									 		</td>
												   									 		<td id="issdetailid-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->detailid); ?>

																								<input type="hidden" id="issdetailid<?php echo e($mkidata->detailid); ?>" name="issdetailid[]" value="<?php echo e($mkidata->detailid); ?>"/>
																							</td>
												   									 		<td id="item-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->item); ?>

																								<input type="hidden" id="item<?php echo e($mkidata->detailid); ?>" name="item[]" value="<?php echo e($mkidata->item); ?>"/>
																							</td>
												   									 		<td id="item_desc-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->item_desc); ?>

																								<input type="hidden" id="item_desc<?php echo e($mkidata->detailid); ?>" name="item_desc[]" value="<?php echo e($mkidata->item_desc); ?>"/>
																							</td>
												   									 		<td id="kit_qty-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->kit_qty); ?>

																								<input type="hidden" id="kit_qty<?php echo e($mkidata->detailid); ?>" name="kit_qty[]"value="<?php echo e($mkidata->kit_qty); ?>" />
																							</td>
												   									 		<td id="issued_qty-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->issued_qty); ?>

																								<input type="hidden" id="issued_qty<?php echo e($mkidata->detailid); ?>" name="issued_qty[]" value="<?php echo e($mkidata->issued_qty); ?>"/>
																							</td>
												   									 		<td id="lot_no-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->lot_no); ?>

																								<input type="hidden" id="lot_no<?php echo e($mkidata->detailid); ?>" name="lot_no[]" value="<?php echo e($mkidata->lot_no); ?>"/>
																							</td>
												   									 		<td id="location-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->location); ?>

																								<input type="hidden" id="location<?php echo e($mkidata->detailid); ?>" name="location[]" value="<?php echo e($mkidata->location); ?>"/>
																							</td>
												   									 		<td id="remarks-<?php echo e($mkidata->detailid); ?>">
																								<?php echo e($mkidata->remarks); ?>

																								<input type="hidden" id="remarks<?php echo e($mkidata->detailid); ?>" name="remarks[]" value="<?php echo e($mkidata->remarks); ?>"/>
																							</td>
												   									 	</tr>
											   									 	<?php endforeach; ?>
										   									 	<?php endif; ?>
																				<input type="hidden" name="count" value="<?php echo e($cnt); ?>">
									   									 </tbody>
									   								 </table>
									   							 </div>
									   						 </div>

									   						 <div class="row">
									   						     <div class="col-md-4 col-md-offset-5">
									   						         <a href="javascript:;" class="btn btn-success input-sm" id="addIssBtn" disabled="true">
									   						             <i class="fa fa-plus"></i> Add Details
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
									   	</div>
									</div>

									<form>
										<?php echo csrf_field(); ?>

										<div class="row">
                                            <div class="col-md-8 col-md-offset-3 text-center">
												<a href="javascript:;" class="btn green input-sm" id="btn_addPO">
													<i class="fa fa-plus"></i> Add New
												</a>
												<a href="javascript:;" class="btn btn-primary input-sm" id="btn_save" disabled="true">
													<i class="fa fa-floppy-o"></i> Save
												</a>
												<a href="javascript:;" class="btn btn-primary input-sm" id="btn_saveIssueance" disabled="true">
													<i class="fa fa-floppy-o"></i> Save
												</a>
								   			 	<a href="javascript:;" id="btn_edit" class="btn blue-madison input-sm">
								   					<i class="fa fa-pencil"></i> Edit
								   				</a>
								   				<a href="javascript:;" id="btn_cancel" class="btn red input-sm">
								   					<i class="fa fa-trash"></i> Cancel
								   				</a>
								   				<a href="javascript:;" id="btn_discard" class="btn red-intense input-sm" disabled="true">
								   					<i class="fa fa-times"></i> Discard Changes
								   				</a>
								   				<button type="button" style="font-size:12px" onclick="javascript: searchData();" class="btn blue-steel input-sm" id="btn_search" <?php if($action!='VIEW'){ echo 'disabled'; } ?>><i class="fa fa-search"></i> Search
								   				</button>
								   				<button type="submit" style="font-size:12px; <?php if(isset($mkdata)){ if($mkdata->status == 'Cancelled') { echo 'display:none;'; } } ?>" onclick="javascript: generateMkReport(); " class="btn grey-gallery input-sm" id="btn_barcode" <?php echo($state); ?> <?php if($action!='VIEW'){ echo 'disabled'; } ?>>
								   					<i class="fa fa-barcode"></i> Kitting List
								   				</button>
								   				<button type="submit" style="font-size:12px; <?php if(isset($mkdata)){ if($mkdata->status == 'Cancelled') { echo 'display:none;'; } } ?>" formtarget="_blank" onclick="javascript: generateMkReport2();" class="btn purple-plum input-sm" id="btn_print" <?php echo($state); ?> <?php if($action!='VIEW'){ echo 'disabled'; } ?>>
								   					<i class="fa fa-print"></i> Print
								   				</button>
								   			</div>
								   		</div>
									</form>

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
			<div class="modal-dialog gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 class="modal-title">Add Details</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
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
											<input type="text" class="form-control input-sm" id="detailidiss" disabled="disable">
											<input type="hidden" id="detailidiss1" name="detailidiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Item/Part No.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="itemiss" name="itemiss">
											<input type="hidden" id="nameiss" name="nameiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Lot. No</label>
										<div class="col-sm-8">
										   <input type="text" class="form-control input-sm" id="lotnoiss" name="lotnoiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kit Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="kitiss" disabled="disable">
											<input type="hidden" id="kitiss1" name="kitiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Issued Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="qtyiss" name="qtyiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Location</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="lociss" disabled="disable">
											<input type="hidden" id="lociss1" name="lociss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Remarks</label>
										<div class="col-sm-8">
											<textarea class="form-control input-sm" id="remarksiss" style="resize:none" name="remarksiss"></textarea>
										</div>
									</div>

								</form>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="addIssDetailbtn">OK</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</div>
			</div>
		</div>

	<!-- edit Issuance details -->
		<div id="editIssModal" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 class="modal-title">Edit Details</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
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
											<input type="text" class="form-control input-sm" id="editdetailidiss" disabled="disable">
											<input type="hidden" id="editdetailidiss1" name="editdetailidiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Item/Part No.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="edititemiss" name="edititemiss" disabled="true">
											<input type="hidden" id="editnameiss" name="editnameiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Lot. No</label>
										<div class="col-sm-8">
										   <input type="text" class="form-control input-sm" id="editlotnoiss" name="editlotnoiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kit Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="editkitiss" disabled="disable">
											<input type="hidden" id="editkitiss1" name="editkitiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Issued Qty.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="editqtyiss" name="editqtyiss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Location</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="editlociss" disabled="disable">
											<input type="hidden" id="editlociss1" name="editlociss">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Remarks</label>
										<div class="col-sm-8">
											<textarea class="form-control input-sm" id="editremarksiss" style="resize:none" name="editremarksiss"></textarea>
										</div>
									</div>

								</form>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="editIssDetailbtn">OK</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</div>
			</div>
		</div>

	<!-- add PO frm -->
		<!-- <div id="searchPOmodal" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 class="modal-title">Add PO No.</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">

									<?php echo e(csrf_field()); ?>

									<div class="form-group">
										<label class="control-label col-sm-2">PO No.</label>
										<div class="col-sm-9">
											<input type="text" class="form-control input-sm" id="searchpono" name="searchpono">
										</div>
									</div>


							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success" id="selectPObtn">OK</a>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</div>
			</div>
		</div> -->

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
							<?php /* <button type="submit" class="btn btn-primary">OK</button> */ ?>
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

	<!-- msg -->
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
						<span id="btn-excel"></span>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
					</div>
				</div>
			</div>
		</div>

	<!-- msg -->
		<div id="donemsg" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-sm gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<h4 id="title" class="modal-title"></h4>
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
<?php $__env->stopSection(); ?>

<?php if(Session::has('msg')): ?>
	<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			var msg = "<?php echo e(Session::get('msg')); ?>";
			$('#err_msg').html(msg);
			$('#msg').modal('show');
		});
	</script>


<?php endif; ?>



 <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
 <script type="text/javascript">
 	$( document ).ready(function(e) {
		toggleBtnInit();
		var link_id = '';

 		$("#issuanceno").keyup(function(event){
 			var mat = $('#issuanceno').val();
 			if(event.keyCode == 13)
 			{
 				window.location.href= "<?php echo e(url('/wbsmaterialkitting?page=')); ?>" + 'KIT&id=' + mat;
 			}
 		});

 		$('#addIssBtn').on('click', function(e) {
			$('addIssDetailbtn').attr('disabled','true');
			$('#itemiss').focus();
 			$('#addIssModal').modal('show');
			$('#addIssDetailbtn').attr('disabled','true');
 		});

 		$('#btn_addPO').on('click', function(e) {
 			setControl('ADD');
			// $('#action').val('ADD');
 		});

		$('#btn_edit').on('click', function(e) {
 			setControl('EDIT');
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
		}

		function setControl(ctrl) {
			if (ctrl == 'ADD') {
				var cd = getDate();
				$('#btn_save').toggle();
				$('#btn_discard').toggle();
				$('#btn_edit').toggle();
				$('#btn_cancel').toggle();
				$('#btn_search').toggle();
				$('#btn_barcode').toggle();
				$('#btn_print').toggle();
				$('#btn_addPO').toggle();

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
			}

			if (ctrl == 'EDIT') {
				$('#btn_saveIssueance').toggle();
				$('#btn_discard').toggle();
				$('#btn_edit').toggle();
				$('#btn_cancel').toggle();
				$('#btn_search').toggle();
				$('#btn_barcode').toggle();
				$('#btn_print').toggle();
				$('#btn_addPO').toggle();
				$('#transfer').toggle();
				$('#btn_delKitdetails').toggle();

				$('#kitQtybtn').removeAttr('disabled');
				$('#btn_discard').removeAttr('disabled');
				$('.edit_detail_btn').removeAttr('disabled');
				$('#btn_saveIssueance').removeAttr('disabled');

				$('#issuanceno').attr('disabled','true');
				$('#btn_min').attr('disabled','true');
				$('#btn_prv').attr('disabled','true');
				$('#btn_nxt').attr('disabled','true');
				$('#btn_max').attr('disabled','true');

				EnableIssDetailsBtn();
			}
		}

 		$('#selectPObtn').on('click', function(e) {
 			var pono = $('#searchpono').val();
 			if (pono == '') {
 				$('#err_msg').html('Field is empty.');
 				$('#msg').modal('show');
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
					$('#err_msg').html("PO number is not available.");
					$('#msg').modal('show');
				} else if(data == 'This data is already has issuance number.'){
					$('#err_msg').html("This data is already has issuance number.");
					$('#msg').modal('show');
				} else {
					$.each(data, function(i,det){
						var code = det.code;
						var name = det.prodname;
						var poqty = det.POqty;
						var cb = "<?php echo e(Auth::user()->user_id); ?>";
						var date = getDate();

						tblKitDetails = '<tr>'+
											'<td>'+
											 	'<input type="checkbox" class="checkboxes" data-id="'+cnt+'"/>'+
											'</td>'+
											'<td>'+cnt+
												'<input type="hidden" id="detailidkit" name="detailidkit" value="'+cnt+'">'+
											'</td>'+
											'<td>'+det.item+
												'<input type="hidden" id="codekit" name="codekit" value="'+det.item+'">'+
											'</td>'+
											'<td>'+det.item_desc+
												'<input type="hidden" id="partnamekit" name="partnamekit" value="'+det.item_desc+'">'+
											'</td>'+
											'<td>'+det.usage+
												'<input type="hidden" id="usagekit" name="usagekit" value="'+det.usage+'">'+
											'</td>'+
											'<td>'+det.rqd_qty+
												'<input type="hidden" id="rqdqtykit" name="rqdqtykit" value="'+det.rqd_qty+'">'+
											'</td>'+
											'<td></td>'+
											'<td>'+
												'<input type="hidden" id="issuedqtykit" name="issuedqtykit" value="">'+
											'</td>'+
											'<td>'+det.location+
												'<input type="hidden" id="locationkit" name="locationkit" value="'+det.location+'">'+
											'</td>'+
											'<td>'+det.drawing_no+
												'<input type="hidden" id="drawnumkit" name="drawnumkit" value="'+det.drawing_no+'">'+
											'</td>'+
											'<td>'+det.supplier+
												'<input type="hidden" id="supplierkit" name="supplierkit" value="'+det.supplier+'">'+
											'</td>'+
											'<td>'+det.whs100+
												'<input type="hidden" id="whs100kit" name="whs100kit" value="">'+
											'</td>'+
											'<td>'+det.whs102+
												'<input type="hidden" id="whs102kit" name="whs102kit" value="">'+
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
				$('#err_msg').html("There is an error while processing PO number. ["+pono+"]");
				$('#msg').modal('show');
				console.log(data);
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
			var kitqty = $('#getkitQty').val();//parseValue($('#getkitQty').val());
			var poqty = $('#poqty').val();//parseValue($('#poqty').val());

			if (kitqty > poqty) {
				$('#err_msg').html('Kit Qty must not be greater than the PO Qty.');
				$('#msg').modal('show');
			} else {
				$('#kitqty').val(kitqty);
				$('#kitqty1').val(kitqty);
				$('#KitQtymodal').modal('hide');
				$('#kitno').removeAttr('disabled');
				$('#preparedby').removeAttr('disabled');
				UpdateKitQty(e);
			}

		});

		function UpdateKitQty(e) {
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
					tblKitDetails = '<tr id="datas'+det.id+'">'+
										'<td>'+
										'<input type="checkbox" class="checkboxes kitdetailschk" data-id="'+det.id+'" data-code="'+det.item+'"'+
										' data-item_desc="'+det.item_desc+'" data-issued_qty="'+det.issued_qty+'" data-required_qty="'+det.rqd_qty+'"/>'+
									'</td>'+
										'</td>'+
										'<td>'+det.id+
											'<input type="hidden" id="detailidkit" name="detailidkit[]" value="'+det.id+'">'+
										'</td>'+
										'<td>'+det.item+
											'<input type="hidden" id="codekit" name="codekit[]" value="'+det.item+'">'+
										'</td>'+
										'<td>'+det.item_desc+
											'<input type="hidden" id="partnamekit" name="partnamekit[]" value="'+det.item_desc+'">'+
										'</td>'+
										'<td>'+det.usage+
											'<input type="hidden" id="usagekit" name="usagekit[]" value="'+det.usage+'">'+
										'</td>'+
										'<td>'+det.rqd_qty+
											'<input type="hidden" id="rqdqtykit" name="rqdqtykit[]" value="'+det.rqd_qty+'">'+
										'</td>'+
										'<td>'+det.kit_qty+
											'<input type="hidden" id="kitqtykit" name="kitqtykit[]" value="'+det.kit_qty+'">'+
										'</td>'+
										'<td>'+det.issued_qty+
											'<input type="hidden" id="issuedqtykit" name="issuedqtykit[]" value="'+det.issued_qty+'">'+
										'</td>'+
										'<td>'+det.location+
											'<input type="hidden" id="locationkit" name="locationkit[]" value="'+det.location+'">'+
										'</td>'+
										'<td>'+det.drawing_no+
											'<input type="hidden" id="drawnumkit" name="drawnumkit[]" value="'+det.drawing_no+'">'+
										'</td>'+
										'<td>'+det.supplier+
											'<input type="hidden" id="supplierkit" name="supplierkit[]" value="'+det.supplier+'">'+
										'</td>'+
										'<td>'+det.whs100+
											'<input type="hidden" id="whs100kit" name="whs100kit[]" value="'+det.whs100+'">'+
										'</td>'+
										'<td>'+det.whs102+
											'<input type="hidden" id="whs102kit" name="whs102kit[]" value="'+det.whs102+'">'+
										'</td>'+
									'</tr>';

					$('#tblKitDetails').append(tblKitDetails);
					console.log(det);
				});
				$('#btn_save').removeAttr('disabled');
			}).fail( function(data, textStatus, jqXHR) {
				console.log(data);
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
					$('#datas'+val).remove();
				});
				$('#confirm').modal('hide');
				$('#dn_err_msg').html(data.msg);
				$('#donemsg').modal('show');
				link_id = data.id.id;
				console.log(data.id.id);
			}).fail( function(data, textStatus, jqXHR) {
				$('#err_msg').html("There is an error while cancelling");
 				$('#msg').modal('show');
			});
		}

		function delDetails() {
			var id = [];

			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
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
					$('#datas'+val).remove();
				});
				$('#confirm').modal('hide');
				$('#dn_err_msg').html(data.msg);
				$('#donemsg').modal('show');
				link_id = data.id.id;
				console.log(data.id.id);
			}).fail( function(data, textStatus, jqXHR) {
				$('#err_msg').html("There is an error while cancelling");
 				$('#msg').modal('show');
			});
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
				console.log(data.id);
				$('#err_msg').html(data.msg);
 				$('#msg').modal('show');
				e.preventDefault();
				window.location.href="<?php echo e(url('/wbsmaterialkitting?page=')); ?>"+ "CUR&id=" + data.id.id;
			}).fail( function(data, textStatus, jqXHR) {
				$('#err_msg').html("There is an error while cancelling");
 				$('#msg').modal('show');
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
					$('#err_msg').html("This Item is not available for this P.O. number.");
					$('#msg').modal('show');
				} else {
					$.each(data, function(i,iss) {
						var name = iss.item_desc;
						var location = iss.location;
						var kitqty = iss.kit_qty;

						$('#kitiss').val(kitqty);
						$('#kitiss1').val(kitqty);
						$('#nameiss').val(name);
						$('#lociss').val(location);
						console.log(iss.item_desc);
					});
				}

			}).fail( function(data, textStatus, jqXHR) {
				console.log(data);
			});
		});

		$('#lotnoiss').on('change', function(e) {
			checkCodeAndLotNo();
		});

		$('#qtyiss').on('change', function() {
			var kit = parseInt($('#kitiss').val());
			var iss = parseInt($('#qtyiss').val());

			if (iss > kit) {
				$('#err_msg').html("Issued Qty. must be equal or lower than Kit Qty.");
				$('#msg').modal('show');
			}
		});

		function checkCodeAndLotNo() {
			var token = '<?php echo e(Session::token()); ?>';
			var Url = "<?php echo e(url('/getlotnodetails')); ?>";
			var code = $('#itemiss').val();
			var lotno = $('#lotnoiss').val();
			var values = {
				code : code,
				lotno : lotno,
				_token : token,
			};
			//e.preventDefault();
			$.ajax({
				url: Url,
				type: "POST",
				data: values,
			}).done( function(data, textStatus, jqXHR) {
				// alert(data);
				if (data.error == 1) {
					$('#err_msg').html(data.msg);
					$('#msg').modal('show');
				} else {
					$('#err_msg').html(data.msg);
					$('#msg').modal('show');
					$('#addIssDetailbtn').removeAttr('disabled');
				}

			}).fail( function(data, textStatus, jqXHR) {
				console.log(data);
			});
		}

		var newdetid = $('input[name=count]').val();
		$('#addIssDetailbtn').on('click', function() {

			var tblIssDetails = '';
			var code = $('#itemiss').val();
			var name = $('#nameiss').val();
			var kitqty = $('#kitiss').val();
			var issuedqty = $('#qtyiss').val();
			var lotno = $('#lotnoiss').val();
			var location = $('#lociss').val();
			var remarks = $('#remarksiss').val();
			var cnt = 1;

			newdetid++;

			tblIssDetails = '<tr id="datas'+cnt+'">'+
								'<td>'+
									'<input type="checkbox" id="chkIssDetail'+cnt+'" data-inpt="inputData'+cnt+'" data-tr="datas'+cnt+'" class="checkboxes" value="1"/>'+
								'</td>'+
								'<td>'+
									'<a href="#" class="btn btn-success btn-sm edit_detail_btn" data-id="'+newdetid+
									'" data-code="'+code+'" data-name="'+name+'" data-kitqty="'+kitqty+
									'" data-issuedqty="'+issuedqty+'" data-lotno="'+lotno+'" data-location="'+location+
									'" data-remarks="'+remarks+'"><i class="fa fa-edit"></i></a>'+
								'</td>'+
								'<td id="issdetailid-'+newdetid+'" class="id">'+newdetid+
									'<input type="hidden" id="issdetailid'+newdetid+'" name="issdetailid[]" value="'+newdetid+'"/>'+
								'</td>'+
								'<td id="item-'+newdetid+'">'+code+
									'<input type="hidden" id="item'+newdetid+'" name="item[]" value="'+code+'"/>'+
								'</td>'+
								'<td id="item_desc-'+newdetid+'">'+name+
									'<input type="hidden" id="item_desc'+newdetid+'" name="item_desc[]" value="'+name+'"/>'+
								'</td>'+
								'<td id="kit_qty-'+newdetid+'">'+kitqty+
									'<input type="hidden" id="kit_qty'+newdetid+'" name="kit_qty[]"value="'+kitqty+'" />'+
								'</td>'+
								'<td id="issued_qty-'+newdetid+'">'+issuedqty+
									'<input type="hidden" id="issued_qty'+newdetid+'" name="issued_qty[]" value="'+issuedqty+'"/>'+
								'</td>'+
								'<td id="lot_no-'+newdetid+'">'+lotno+
									'<input type="hidden" id="lot_no'+newdetid+'" name="lot_no[]" value="'+lotno+'"/>'+
								'</td>'+
								'<td id="location-'+newdetid+'">'+location+
									'<input type="hidden" id="location'+newdetid+'" name="location[]" value="'+location+'"/>'+
								'</td>'+
								'<td id="remarks-'+newdetid+'">'+remarks+
									'<input type="hidden" id="remarks'+newdetid+'" name="remarks[]" value="'+remarks+'"/>'+
								'</td>'+
							'</tr>';
			$('#tblIssDetails').append(tblIssDetails);
			$('#addIssModal').modal('hide');
			$('#btn_discard').removeAttr('disabled');
			$('#btn_save').removeAttr('disabled');
		});

		function EnableIssDetailsBtn()
		{
			$('#addIssBtn').removeAttr('disabled');
			$('#delIssBtn').removeAttr('disabled');
		}

		$('#btn_discard').on('click', function() {
			window.location.href="<?php echo e(url('/wbsmaterialkitting')); ?>";
		});

		$("#tblIssDetails").on("click", ".edit_detail_btn", function(){
			var id = $(this).attr('data-id');
			var code = $(this).attr('data-code');
			var name = $(this).attr('data-name');
			var kitqty = $(this).attr('data-kitqty');
			var issuedqty = $(this).attr('data-issuedqty');
			var lotno = $(this).attr('data-lotno');
			var location = $(this).attr('data-location');
			var remarks = $(this).attr('data-remarks');

			$('#editdetailidiss').val(id);
			$('#editdetailidiss1').val(id);
			$('#edititemiss').val(code);
			$('#editnameiss').val(name);
			$('#editkitiss').val(kitqty);
			$('#editkitiss1').val(kitqty);
			$('#editqtyiss').val(issuedqty);
			$('#editlotnoiss').val(lotno);
			$('#editlociss').val(location);
			$('#editlociss1').val(location);
			$('#editremarksiss').val(remarks);

			$('#editIssModal').modal('show');
		});

		$('#editIssDetailbtn').on('click', function() {
			var id = $('#editdetailidiss').val();
			var issuedqty = $('#editqtyiss').val();
			var lotno = $('#editlotnoiss').val();
			var remarks = $('#editremarksiss').val();

			$('#issued_qty-'+id).html(issuedqty+'<input type="hidden" id="issued_qty'+id+'" name="issued_qty[]" value="'+issuedqty+'"/>');
			$('#lot_no-'+id).html(lotno+'<input type="hidden" id="lot_no'+id+'" name="lot_no[]" value="'+lotno+'"/>');
			// $('#location-'+id).html(location+'<input type="hidden" id="location'+id+'" name="location[]" value="'+location+'"/>');
			$('#remarks-'+id).html(remarks+'<input type="hidden" id="remarks'+id+'" name="remarks[]" value="'+remarks+'"/>');

			$('#editIssModal').modal('hide');
		});

		$('#delIssBtn').on('click', function(e){
			/* Get the checkboxes values based on the class attached to each check box */
			getValueUsingClass();
		});

		$('#btn_save').on('click', function(e) {
			if ($('input[name=kitno]').val() == '' || $('input[name=preparedby]').val() == '') {
				$('#err_msg').html("All fields are required.");
				$('#msg').modal('show');
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
					$('#dn_err_msg').html(data.msg);
					$('#donemsg').modal('show');
					link_id = data.id.id;
					console.log(data.id.id);
				}).fail( function(data, textStatus, jqXHR) {

				});
			}
		});

		$('#btn_saveIssueance').on('click', function(e) {
			var url = "<?php echo e(url('/savematissue')); ?>";
			var token = "<?php echo e(Session::token()); ?>";
			var data = {
				_token: token,
				issno: $('input[name=issuanceno]').val(),
				po: $('input[name=searchpono]').val(),
				issdetailid: $('input[name^="issdetailid"]').map(function(){return $(this).val();}).get(),
				item: $('input[name^="item"]').map(function(){return $(this).val();}).get(),
				item_desc: $('input[name^="item_desc"]').map(function(){return $(this).val();}).get(),
				kit_qty: $('input[name^="kit_qty"]').map(function(){return $(this).val();}).get(),
				issued_qty: $('input[name^="issued_qty"]').map(function(){return $(this).val();}).get(),
				lot_no: $('input[name^="lot_no"]').map(function(){return $(this).val();}).get(),
				location: $('input[name^="location"]').map(function(){return $(this).val();}).get(),
				remarks: $('input[name^="remarks"]').map(function(){return $(this).val();}).get(),
			};

			$.ajax({
				url: url,
				type: "POST",
				data: data,
			}).done( function(data, textStatus, jqXHR) {
				$('#dn_err_msg').html(data.msg);
				$('#donemsg').modal('show');
				link_id = data.id.id;
				console.log(data.id.id);
			}).fail( function(data, textStatus, jqXHR) {

			});
		});

		$('#btn_donemsg').on('click', function() {
			$('#donemsg').modal('hide');
			window.location.href="<?php echo e(url('/wbsmaterialkitting?page=')); ?>" + "CUR&id=" + link_id;
			$('#btn_min').removeAttr('disabled');
			$('#btn_prv').removeAttr('disabled');
			$('#btn_nxt').attr('disabled','true');
			$('#btn_max').attr('disabled','true');
		});

		function getValueUsingClass(){
			/* declare an checkbox array */
			var chkArray = [];

			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			$(".checkboxes:checked").each(function() {
				chkArray.push($(this).attr('id'));
			});


			$.each(chkArray, function(i,val) {
				var tr = $('#'+val).attr('data-tr');
				var inpt = $('#'+val).attr('data-inpt');

				$('#'+tr).remove();
				$('#'+inpt).remove();
			});
		}


		$('.group-checkable').on('change', function(e) {
			// $('input:checkbox.kitdetailschk').prop('checked', function(i, v) { return !v; });
			$('input:checkbox.kitdetailschk').not(this).prop('checked', this.checked);
		});

	});

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
 	</script>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>