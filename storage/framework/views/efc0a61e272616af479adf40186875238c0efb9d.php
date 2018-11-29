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
												Production Material Request <i class="fa fa-angle-down"></i>
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
													<a href="<?php echo e(url('/wbspartsreceiving')); ?>">
		 											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbsphysicalinventory')); ?>">
		 											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
		 										   </a>
												</li>
												<li class="active">
													<a href="<?php echo e(url('/wbsprodmatrequest')); ?>">
		 											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
		 										   </a>
												</li>
												<li>
													<a href="<?php echo e(url('/wbswhsmatissuance')); ?>" >
		 											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
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
										   <a href="<?php echo e(url('/wbspartsreceiving')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
										   </a>
										   <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
										   </a>
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item active">
											   <i class="glyphicon glyphicon-save-file fa-2x"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item">
											   <i class="fa fa-cubes fa-2x font-red-flamingo"></i> Warehouse Material Issuance
										   </a>
										</div>
									</div>

									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row">
                                    		 <form method="POST" action="<?php echo e(url('/requestsummaryfrm')); ?>" class="form-horizontal" id="requestsummaryfrm">
												 <?php echo e(csrf_field()); ?>

                                    			 <div class="col-md-5">
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Request No.</label>
                                    					 <div class="col-md-3">
                                                            <?php if(isset($pmr_data)): ?>
                                                            <?php foreach($pmr_data as $pmrdata): ?>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                            <input type="hidden" class="form-control input-sm" id="recid" name="recid" value="<?php if(isset($pmrdata)){echo $pmrdata->id; } ?>" />
                                                            <input type="hidden" class="form-control input-sm" id="action" name="action" value="<?php if(isset($action)){echo $action; } ?>" />
                                                            <input type="hidden" class="form-control input-sm" id="hdnreqnopmr" name="hdnreqnopmr" value="<?php if(isset($pmrdata)){echo $pmrdata->transno; } ?>" />
                                    						<input type="text" class="form-control input-sm" id="reqnopmr" name="reqnopmr" value="<?php if(isset($pmrdata)){echo $pmrdata->transno; } ?>" <?php if($action!='VIEW'){ echo "disabled"; } ?>>
                                    					 </div>
                                    					 <div class="col-md-6">
                                    						 <div class="btn-group btn-group-circle">
                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('MIN'); " id="btn_min" class="btn blue input-sm" <?php if(isset($pmrdata)){if($pmrdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-backward"></i></button>
                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('PRV'); " id="btn_prv" class="btn blue input-sm" <?php if(isset($pmrdata)){if($pmrdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-backward"></i></button>
                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('NXT'); " id="btn_nxt" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-forward"></i></button>
                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('MAX'); " id="btn_max" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-forward"></i></button>
                                    						 </div>
                                    					 </div>
                                    				 </div>
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">PO No.</label>
                                    					 <div class="col-md-4">
                                    						 <input type="text" class="form-control input-sm" id="ponopmr" name="ponopmr" disabled="true" value="<?php if(isset($pmrdata)){echo $pmrdata->pono; } ?>">

                                    					 </div>
														<div class="col-md-5">
															<button type="button" onclick="javascript: searchPo()" class="btn btn-circle green input-sm" id="btn_ponopmr" <?php if($action=='VIEW'){ echo 'disabled'; } ?> ><i class="fa fa-arrow-circle-down"></i></button>
														</div>
                                    				 </div>
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Product Destination</label>
                                    					 <div class="col-md-4">
                                                             <select class="form-control input-sm select2me" id="prodes" name="prodes" disabled="true">
                                                                 <option value="-1" selected></option>
																 <?php foreach($prod as $prd): ?>
																 	<option value="<?php echo e($prd->id); ?>" <?php if(isset($pmrdata)){ if($pmrdata->destination == $prd->id) { echo 'selected'; }} ?> ><?php echo e($prd->description); ?></option>
																 <?php endforeach; ?>
                                                             </select>
                                                            <input type="hidden" class="form-control input-sm" id="selectedprodes" name="selectedprodes" value="<?php if(isset($pmrdata)){echo $pmrdata->destination; } ?>"/>
                                    					 </div>
                                    				 </div>
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Line Destination</label>
                                    					 <div class="col-md-4">
                                                             <select class="form-control input-sm select2me" id="linedes" name="linedes" disabled="true">
                                                                 <option value="-1" selected></option>
																 <?php foreach($line as $ln): ?>
																 	<option value="<?php echo e($ln->id); ?>" <?php if(isset($pmrdata)){ if($pmrdata->line == $ln->id) { echo 'selected'; }} ?> ><?php echo e($ln->description); ?></option>
																 <?php endforeach; ?>
                                                             </select>
                                                            <input type="hidden" class="form-control input-sm" id="selectedlinedes" name="selectedlinedes" value="<?php if(isset($pmrdata)){echo $pmrdata->line; } ?>"/>
                                    					 </div>
                                    				 </div>
                                    			 </div>

                                    			 <div class="col-md-3">
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Status</label>
                                    					 <div class="col-md-4">
                                    						 <input type="text" class="form-control input-sm" id="statuspmr" name="statuspmr" disabled="true" value="<?php if(isset($pmrdata)){echo $pmrdata->status; } ?>">
                                    					 </div>
                                    				 </div>
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Remarks</label>
                                    					 <div class="col-md-6">
                                    						 <textarea class="form-control input-sm" style="resize:none;" id="remarks" disabled="true"></textarea>
                                    					 </div>
                                    				 </div>
                                    			 </div>

                                    			 <div class="col-md-4">
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Created By</label>
                                    					 <div class="col-md-6">
                                    						 <input type="text" class="form-control input-sm" id="createdbypmr" name="createdbypmr" disabled="true" value="<?php if(isset($pmrdata)){echo $pmrdata->createdby; } ?>">
                                    					 </div>
                                    				 </div>
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Created Date</label>
                                    					 <div class="col-md-6">
                                    						 <input class="form-control input-sm date-picker" size="16" type="text" name="createddatepmr" id="createddatepmr" disabled="true" value="<?php if(isset($pmrdata)){echo $pmrdata->created_at; } ?>"/>
                                    					 </div>
                                    				 </div>
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Updated By</label>
                                    					 <div class="col-md-6">
                                    						 <input type="text" class="form-control input-sm" id="updatedbypmr" name="updatedbypmr" disabled="true" value="<?php if(isset($pmrdata)){echo $pmrdata->updatedby; } ?>">
                                    					 </div>
                                    				 </div>
                                    				 <div class="form-group row">
                                    					 <label class="control-label col-md-3">Updated Date</label>
                                    					 <div class="col-md-6">
                                    						 <input class="form-control input-sm date-picker" size="16" type="text" name="updateddatepmr" id="updateddatepmr" disabled="true" value="<?php if(isset($pmrdata)){echo $pmrdata->updated_at; } ?>"/>
                                    					 </div>
                                    				 </div>
                                    			 </div>
												 <span id="inputs1">
                                                    <?php if(isset($pmr_details_data)): ?>
                                                    <?php $cnt=1;?>
                                                    <?php foreach($pmr_details_data as $pmr_b_data): ?>
                                                    <div id="inputData<?php echo $cnt;?>">
                                                        <input type="hidden" name="editDetailid[]" class="form-control input-sm" id="detailid<?php echo $cnt;?>" value="<?php echo e($pmr_b_data->id); ?>">
                                                        <input type="hidden" name="editcode[]" class="form-control input-sm" id="code<?php echo $cnt;?>" value="<?php echo e($pmr_b_data->code); ?>">
                                                        <input type="hidden" name="editdesc[]" class="form-control input-sm" id="name<?php echo $cnt;?>" value="<?php echo e($pmr_b_data->name); ?>">
                                                        <input type="hidden" name="editIssuedqty[]" class="form-control input-sm" id="issuedqty<?php echo $cnt;?>" value="<?php echo e($pmr_b_data->issuedqty); ?>">
                                                        <input type="hidden" name="editclassification[]" class="form-control input-sm" id="classival<?php echo $cnt;?>" value="<?php echo e($pmr_b_data->classification); ?>">
                                                        <input type="hidden" name="editRequestqty[]" class="form-control input-sm" id="reqqtyval<?php echo $cnt;?>" required value="<?php echo e($pmr_b_data->requestqty); ?>">
                                                        <input type="hidden" name="editLocation[]" class="form-control input-sm" id="locval<?php echo $cnt;?>"  value="<?php echo e($pmr_b_data->location); ?>">
                                                        <input type="hidden" name="editRemarks[]" class="form-control input-sm" id="rmrks<?php echo $cnt;?>" value="<?php echo e($pmr_b_data->remarks); ?>">
                                                    </div>
                                                    <?php $cnt++;?>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                 </span>
											</form>
                                    	 </div>


                                    	 <div class="row">
                                    		 <div class="col-md-12">
												 <div class="portlet box" >
						 							<div class="portlet-body">

														<div class="row">
															<div class="col-md-12">

																<div class="scroller" style="height:300px">

																		<table class="table table-striped table-bordered table-hover table-responsive" style="font-size:10px" id="tblAllDetails">
						                                    				 <thead>
						                                    					<tr>
						                                    						<td class="text-center" colspan="13">Details</td>
						                                    					</tr>
						                                    					<tr>
						                                    						<td></td>
						                                    						<td></td>
						                                    						<td>Detail ID</td>
						                                    						<td>Item/Part No.</td>
						                                    						<td>Item Description</td>
						                                    						<td>Classification</td>
						                                    						<td>Issued Qty.(Kitting)</td>
						                                    						<td>Request Qty.</td>
						                                    						<td>Served Qty.</td>
						                                    						<td>Location</td>
						                                    						<td>Lot No.</td>
						                                    						<td>Last Served By</td>
						                                    						<td>Last Served Date</td>
						                                    					</tr>
						                                    				</thead>
						                                    				<tbody id="tbldetail">
                                                                                <?php if(isset($pmr_details_data)): ?>
                                                                                <?php $cnt=1;?>
                                                                                <?php foreach($pmr_details_data as $pmr_b_data): ?>
                                                                                <tr id="datas<?php echo $cnt;?>" class="datas">
                                                                                    <td style="width:10px">
                                                                                        <Input type="checkbox" class="checkboxes detailcheck" name="detailid[]" id="check<?php echo $cnt;?>" data-inpt="inputData<?php echo $cnt;?>" data-tr="datas<?php echo $cnt;?>" value="<?php echo $pmr_b_data->id;?>">
                                                                                    </td>
                                                                                    <td style="width:10px">
                                                                                        <a href="javascript:;" id="editmodal<?php echo $cnt;?>" class="btn btn-sm btn-success btn-block editmodal"
                                                                                         data-cnt="<?php echo $cnt;?>" data-id="<?php echo $pmr_b_data->id;?>" data-code="<?php echo $pmr_b_data->code;?>" data-name="<?php echo $pmr_b_data->name;?>" data-issuedqty="<?php echo $pmr_b_data->issuedqty;?>" data-locval="<?php echo $pmr_b_data->location;?>" data-cassival="<?php echo $pmr_b_data->classification;?>" data-reqqty="<?php echo $pmr_b_data->requestqty;?>" data-remarks="<?php echo $pmr_b_data->remarks;?>">
                                                                                        <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="detailidtd" name="detailidtd" id="detailidtd<?php echo $cnt;?>"><?php echo e($pmr_b_data->id); ?></td>
                                                                                    <td class="codetd" name="codetd" id="codetd<?php echo $cnt;?>"><?php echo e($pmr_b_data->code); ?></td>
                                                                                    <td class="nametd" name="nametd" id="nametd<?php echo $cnt;?>"><?php echo e($pmr_b_data->name); ?></td>
                                                                                    <td class="classsificationtd" name="classsificationtd" id="classsificationtd<?php echo $cnt;?>"><?php echo e($pmr_b_data->classification); ?></td>
                                                                                    <td class="issuedqtytd" name="issuedqtytd" id="issuedqtytd<?php echo $cnt;?>"><?php echo e($pmr_b_data->issuedqty); ?></td>
                                                                                    <td class="requestqtytd" name="requestqtytd" id="requestqtytd<?php echo $cnt;?>"><?php echo e($pmr_b_data->requestqty); ?></td>
                                                                                    <td class="servedqtytd" name="servedqtytd" id="servedqtytd<?php echo $cnt;?>"><?php echo e($pmr_b_data->servedqty); ?></td>
                                                                                    <td class="locationtd" name="locationtd" id="locationtd<?php echo $cnt;?>"><?php echo e($pmr_b_data->location); ?></td>
                                                                                    <td class="lotnotd" name="lotnotd" id="lotnotd<?php echo $cnt;?>"><?php echo e($pmr_b_data->lot_no); ?></td>
                                                                                    <td class="lastservedbytd" name="lastservedbytd" id="lastservedbytd<?php echo $cnt;?>"><?php echo e($pmr_b_data->last_served_by); ?></td>
                                                                                    <td class="lastserveddatetd" name="lastserveddatetd" id="lastserveddatetd<?php echo $cnt;?>"><?php echo e($pmr_b_data->last_served_date); ?></td>
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
															<div class="col-md-7 col-md-offset-5">
																<a href="javascript:;"  style="font-size:12px; <?php if($action!='ADD'){ echo 'display:none;'; } ?>" id="btnAddDetails" class="btn btn-success btn-sm btnDetails" disabled><i class="fa fa-plus"></i> Add</a>
																<a href="javascript:;"  style="font-size:12px; <?php if($action!='ADD'){ echo 'display:none;'; } ?>" id="btnDeleteDetails" class="btn btn-danger btn-sm btnDetails" disabled><i class="fa fa-trash"></i> Delete</a>
															</div>
														</div>

													</div>
												</div>

                                    		</div>
                                    	 </div>


                                    	 <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" class="btn green input-sm" id="addpmr" <?php echo($state); ?> >
                                                <i class="fa fa-plus"></i> Add New
                                                </button>
                                              <button type="submit" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" class="btn blue-madison input-sm" id="savepmr" <?php echo($state); ?> >
                                                <i class="fa fa-pencil"></i> Save
                                              </button>
                                              <button type="button" style="font-size:12px; <?php if(isset($prdata)){ if($prdata->status == 'Cancelled') { echo 'display:none;'; } } ?>  <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('EDIT'); " class="btn blue-madison input-sm" id="editpmr" <?php echo($state); ?> >
                                                <i class="fa fa-pencil"></i> Edit
                                              </button>
                                              <button type="button" style="font-size:12px; <?php if(isset($prdata)){ if($prdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('CNL'); " class="btn red input-sm" id="cancelpmr" <?php echo($state); ?> >
                                                <i class="fa fa-trash"></i> Cancel
                                              </button>
                                              <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('DIS'); " class="btn red-intense input-sm" id="discardpmr" <?php echo($state); ?> >
                                                <i class="fa fa-times"></i> Discard Changes
                                              </button>
                                              <button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: searchData();" class="btn blue-steel input-sm" id="searchpmr" >
                                                <i class="fa fa-search"></i> Search
                                              </button>
                                              <button type="submit" style="font-size:12px; <?php if(isset($prdata)){ if($prdata->status == 'Cancelled') { echo 'display:none;'; } } ?><?php if($action!='VIEW'){ echo 'display:none;'; } ?>" formtarget="_blank" onclick="javascript: generatePmrReport();" class="btn purple-plum input-sm" id="printpmr" <?php echo($state); ?>  <?php echo($state); ?>>
                                                <i class="fa fa-print"></i> Print
                                              </button>
                                            </div>
<!--
                                    		 <div class="col-md-8 col-md-offset-3">
                                    			 <a href="javascript: setControl('ADD');" id="addpmr" class="btn green">
                                    				 <i class="fa fa-plus"></i> Add
                                    			 </a>
												 <button type="submit" id="savepmr" class="btn btn-primary" disabled="true">
                                    				 <i class="fa fa-floppy-o"></i> Save
                                    			 </button>
                                    			 <button class="btn blue-madison" id="editpmr" disabled="true">
                                    				 <i class="fa fa-pencil"></i> Edit
                                    			 </button>
                                    			 <button class="btn red" id="cancelpmr" disabled="true">
                                    				 <i class="fa fa-trash"></i> Cancel
                                    			 </button>
                                    			 <button class="btn red-intense" id="discardpmr" disabled="true">
                                    				 <i class="fa fa-times"></i> Discard Changes
                                    			 </button>
                                    			 <button class="btn blue-steel">
                                    				 <i class="fa fa-search"></i> Search
                                    			 </button>
                                    			 <button class="btn purple-plum" id="printpmr" disabled="true">
                                    				 <i class="fa fa-print"></i> Print
                                    			 </button>
                                    		 </div> -->
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


    <!-- add po -->
        <div id="addpoModal" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog gray-gallery">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Load PO Details</h4>
                    </div>
                    <form method="POST" action="<?php echo e(url('/posearch')); ?>" class="form-horizontal" id="addpofrm">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2">PO No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm" id="posearch" name="posearch">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Load</button>
                            <a href="" data-dismiss="modal" class="btn btn-danger">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Select PO Details -->
        <div id="SelectPODetailsModal" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog gray-gallery">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Select PO Details</h4>
                    </div>
                    <form method="POST" action="<?php echo e(url('/savedetailpmr')); ?>" class="form-horizontal" id="selectpodetailfrm">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="scroller" style="height: 200px">
                                        <table class="table table-responsive table-bordered table-striped table-hover table-responsive"  style="font-size:10px">
                                            <thead>
                                                <tr>
                                                    <td></td>
                                                    <td>Code</td>
                                                    <td>Description</td>
                                                    <td>Issued QTY</td>
                                                    <td>Lot No.</td>
													<input type="hidden" name="po" id="po" value="">
                                                </tr>
                                            </thead>
                                            <tbody id="tblpodetail">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="col-md-3" style="text-align:left;">
                                <input type="checkbox" class="checkboxes checkall input-sm" id="checkall" name="checkall"/> Select All
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="" data-dismiss="modal" class="btn btn-danger">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <!-- Edit PO Details -->
        <div id="EditPODetailsModal" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog gray-gallery">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit PO Details</h4>
                    </div>
                    <form method="POST" action="<?php echo e(url('/editdetailpmr')); ?>" class="form-horizontal" id="editpodetailfrm">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Detail ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm" id="editDetailid"disabled="true">
											<input type="hidden" class="form-control input-sm" id="editDetailid1" name="editDetailid">
											<input type="hidden" class="form-control input-sm" id="cntval">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Item/Part No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm" id="editcode" disabled="true">
											<input type="hidden" class="form-control input-sm" id="editcode1" name="editcode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Item Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm" id="editdesc"disabled="true">
											<input type="hidden" class="form-control input-sm" id="editdesc1" name="editdesc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Classification</label>
                                        <div class="col-sm-9">
                                            <select class="form-control input-sm select2me" id="editclassification" name="editclassification">
                                                <option value=""></option>
												<?php foreach($class as $key => $classification): ?>
													<option value="<?php echo e($classification->description); ?>"><?php echo e($classification->description); ?></option>
												<?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Issued Qty. (Kitting)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm" id="editIssuedqty" disabled="true">
											<input type="hidden" class="form-control input-sm" id="editIssuedqty1" name="editIssuedqty">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Request Qty.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm mask_reqqty" id="editRequestqty" name="editRequestqty" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Location</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm" id="editLocation" disabled="true">
											<input type="hidden" class="form-control input-sm" id="editLocation1" name="editLocation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Remarks</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control input-sm" id="editRmrks" name="editRmrks">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" id="saveEditdetail" class="btn btn-success" <?php if(isset($action)){if($action == 'VIEW'){ echo 'disabled';} } ?> >Save</button>
							<!-- <a href="" data-dismiss="modal" id="saveEditdetail" class="btn btn-success">Save</a> -->
                            <!-- <button type="submit" class="btn btn-success">Save</button> -->
                            <a href="" data-dismiss="modal" class="btn btn-danger">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Message -->
  <div id="msgModal" class="modal fade" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-sm gray-gallery">
            <div class="modal-content ">
               <div class="modal-body">
                  <p id="msg"><?php echo e(Session::get('msg')); ?></p>
              </div>
              <div class="modal-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Cancel Confirmation Pop-message -->
  <div id="deleteModal" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm blue">
  		<form role="form" method="POST" action="<?php echo e(url('/cancelpmr')); ?>">
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

  <!-- Edit Batch Validation Pop-message -->
  <div id="invalidEditBatchModal" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm blue">
  		<div class="modal-content ">
  			<div class="modal-body">
  				<p>Request Qty contains invalid values. <br/> It must must not be greater than Issued Qty.</p>
  			</div>
  			<div class="modal-footer">
  				<button type="button" onclick="javascript: showAddBatch('EDIT');" class="btn btn-primary" id="btnok">OK</button>
  			</div>
  		</div>
  	</div>
  </div>

<!-- Search Modal -->
<div id="searchModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/wbsprodmatrequest')); ?>">
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
                                <label for="inputsearch_pono" class="col-md-4 control-label" style="font-size:12px">PO No.</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" id="srch_pono" placeholder="PO No." name="srch_pono" autofocus <?php echo($readonly); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputsearch_proddes" class="col-md-4 control-label" style="font-size:12px">Product Destination</label>
                                <div class="col-md-4">
                                    <select class="form-control input-sm select2me" id="srch_prodes" name="srch_prodes">
                                       <option value="-1">---Select---</option>
                                       <?php foreach($prod as $prd): ?>
                                       <option value="<?php echo e($prd->id); ?>" ><?php echo e($prd->description); ?></option>
                                       <?php endforeach; ?>
                                   </select>
                                </div>
                           </div>
                           <div class="form-group">
                            <label for="inputcode" class="col-md-4 control-label" style="font-size:12px">Line Destination</label>
                                <div class="col-md-4">
                                    <select class="form-control input-sm select2me" id="srch_linedes" name="srch_linedes">
                                        <option value="-1">---Select---</option>
                                         <?php foreach($line as $ln): ?>
                                         <option value="<?php echo e($ln->id); ?>" ><?php echo e($ln->description); ?></option>
                                         <?php endforeach; ?>
                                    </select>
                                </div>
                     </div>
                    <div class="form-group">
                        <label for="inputname" class="col-md-4 control-label" style="font-size:12px">Status</label>
                        <div class="col-md-8">
                            <label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Open" id="srch_open" name="Open" checked="true"/>Alert</label>
                            <label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Close" id="srch_close" name="Close"/>Close</label>
                            <label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="width:880px; height:500px; overflow:auto;">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_3" style="font-size:10px">
                        <thead>
                            <tr>
                                <td width="10%"></td>
                                <td>Transaction No.</td>
                                <td>PO No.</td>
                                <td>Product Destination</td>
                                <td>Line Destination</td>
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
            <button type="button" style="font-size:12px" onclick="javascript: filterData('SRCH'); " class="btn blue-madison"><i class="glyphicon glyphicon-filter"></i> Filter</button>
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
			$('#msgModal').modal('show');
		});
	</script>
<?php endif; ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$( document ).ready(function(e) {

        $('#prodes').on('change', function()
        {
            $("#selectedprodes").val(this.value);
        });
        $('#linedes').on('change', function()
        {
            $("#selectedlinedes").val(this.value);
        });

		$('#addpmr').on('click', function()
        {
                // Set header values to empty.
                $("#reqnopmr").val("");
                $("#hdnreqnopmr").val("");
                $('#ponopmr').val("");
                $("#prodes").val("");
                $("#linedes").val("");
                $("#remarks").val("");
                $("#statuspmr").val("");

                $("#editpmr").hide();
                $("#addpmr").hide();
                $("#searchpmr").hide();
                $("#cancelpmr").hide();
                $("#printpmr").hide();

                $("#savepmr").show();
                $("#discardpmr").show();
                $("#btnAddDetails").show();
                $("#btnDeleteDetails").show();

				$("#btn_ponopmr").removeAttr('disabled');
                $("#saveEditdetail").removeAttr('disabled');
                $("#ponopmr").removeAttr('disabled');
                $("#prodes").removeAttr('disabled');
                $("#linedes").removeAttr('disabled');
                $("#remarks").removeAttr('disabled');

				$("#reqnopmr").prop("disabled", true);


                var table = $('#tblAllDetails').DataTable();

                table
                    .clear()
                    .draw();

            // $('#addpoModal').modal('show');
        });

		$('#btnAddDetails').on('click', function() {
			$('#SelectPODetailsModal').modal('show');
		});

/*        $('#addpofrm').on('submit', function(e) {
			var formObj = $('#addpofrm');
			var formURL = formObj.attr("action");
			var formData = new FormData(this);
            var tblpodetail = '';
			e.preventDefault(); //Prevent Default action.

		});*/

        $('#selectpodetailfrm').on('submit', function(e) {
            var formObj = $('#selectpodetailfrm');
			var formURL = formObj.attr("action");
			var formData = new FormData(this);
            var tbldetail = '';
			e.preventDefault(); //Prevent Default action.
			$.ajax({
				url: formURL,
				method: 'POST',
				data:  formData,
				contentType: false,
				cache: false,
				processData:false,
			}).done( function(data, textStatus, jqXHR) {

				$('#inputs1').html('');
                $('#tbldetail').html('');
				var cnt = 1;
				$.each(data,function (i, det) {

    				console.log(det);

		          $(".itemselect").each(function()
		          {
		               var id = $(this).attr('name');
		               if($(this).is(':checked'))
		               {
		               		if($(this).val() == det.detailid)
		               		{
			                    tbldetail = '<tr id="datas'+cnt+'" class="datas">'+
			                                    '<td style="width:10px">'+
			                                        '<Input type="checkbox" class="checkboxes detailcheck" name="detailid[]" id="checkitem" data-inpt="inputData'+cnt+'" data-tr="datas'+cnt+'" value="'+det.detailid+'">'+
			                                    '</td>'+
			                                    '<td style="width:10px">'+
			                                        '<a href="javascript:;" id="editmodal'+cnt+'" class="btn btn-sm btn-success btn-block editmodal"'+
													' data-cnt="'+cnt+'" data-id="'+det.detailid+'" data-code="'+det.code+'" data-name="'+det.name+'" data-issuedqty="'+parseFloat(det.issuedqty+".0000")+'" data-locval="'+det.location+'">'+
														'<i class="fa fa-edit"></i>'+
													'</a>'+
			                                    '</td>'+
			                                    '<td class="detailidtd" name="detailidtd" id="detailidtd'+cnt+'">'+det.detailid+'</td>'+
			                                    '<td class="codetd" name="codetd" id="codetd'+cnt+'">'+det.code+'</td>'+
			                                    '<td class="nametd" name="nametd" id="nametd'+cnt+'">'+det.name+'</td>'+
			                                    '<td class="classsificationtd" name="classsificationtd" id="classsificationtd'+cnt+'"></td>'+
			                                    '<td class="issuedqtytd" name="issuedqtytd" id="issuedqtytd'+cnt+'">'+parseFloat(det.issuedqty+".0000")+'</td>'+
			                                    '<td class="requestqtytd" name="requestqtytd" id="requestqtytd'+cnt+'"></td>'+
			                                    '<td class="servedqtytd" name="servedqtytd" id="servedqtytd'+cnt+'"></td>'+
			                                    '<td class="locationtd" name="locationtd" id="locationtd'+cnt+'">'+det.location+'</td>'+
			                                    '<td class="lotnotd" name="lotnotd" id="lotnotd'+cnt+'">'+det.lotno+'</td>'+
			                                    '<td class="lastservedbytd" name="lastservedbytd" id="lastservedbytd'+cnt+'"></td>'+
			                                    '<td class="lastserveddatetd" name="lastserveddatetd" id="lastserveddatetd'+cnt+'"></td>'+
			                                '</tr>';
								$('#tbldetail').append(tbldetail);
								$('#inputs1').append('<div id="inputData'+cnt+'"><input type="hidden" name="editDetailid[]" class="form-control input-sm" id="detailid'+cnt+'" value="'+det.detailid+'">'+
									'<input type="hidden" name="editcode[]" class="form-control input-sm" id="code'+cnt+'" value="'+det.code+'">'+
									'<input type="hidden" name="editdesc[]" class="form-control input-sm" id="name'+cnt+'" value="'+det.name+'">'+
									'<input type="hidden" name="editIssuedqty[]" class="form-control input-sm" id="issuedqty'+cnt+'" value="'+parseFloat(det.issuedqty+".0000")+'">'+
									'<input type="hidden" name="editclassification[]" class="form-control input-sm" id="classival'+cnt+'">'+
									'<input type="hidden" name="editRequestqty[]" class="form-control input-sm" id="reqqtyval'+cnt+'" required>'+
									'<input type="hidden" name="editLocation[]" class="form-control input-sm" id="locval'+cnt+'" value="'+det.location+'">'+
									'<input type="hidden" name="editLotNo[]" class="form-control input-sm" id="locval'+cnt+'" value="'+det.lotno+'">'+
									'<input type="hidden" name="editRemarks[]" class="form-control input-sm" id="rmrks'+cnt+'"></div>'
								);
								cnt++;
		               		}
		               }
		          });

                });

				$('.btnDetails').removeAttr('disabled');
				$('#savepmr').removeAttr('disabled');
				$('#editpmr').removeAttr('disabled');
				$('#SelectPODetailsModal').modal('hide');
                $('#cancelpmr').prop('disabled', function(i, v) { return !v; });
                // $('#discardpmr').prop('disabled', function(i, v) { return !v; });
                $('#printpmr').prop('disabled', function(i, v) { return !v; });

			}).fail(function(data, jqXHR, textStatus, errorThrown) {
				console.log(data);
			});
        });

        $("#tbldetail").on("click", ".editmodal", function()
        {
			var cntval = $('#'+id).attr('data-cnt')
			var id = $(this).attr('id');
            var detailid = $('#'+id).attr('data-id');
            var code = $('#'+id).attr('data-code');
            var name = $('#'+id).attr('data-name');
            var issuedqty = $('#'+id).attr('data-issuedqty');
			var classi = $('#'+id).attr('data-cassival');
			var reqqty = $('#'+id).attr('data-reqqty');
			var loc = $('#'+id).attr('data-locval');
			var rmrks = $('#'+id).attr('data-rmrks');

			var reqno = $('#reqnopmr').val();
			var po = $('#posearch').val();
			var cb = "<?php echo e(Auth::user()->user_id); ?>";
			var line = $('#linedes').val();
			var prod = $('#prodes').val();

            $('#EditPODetailsModal').modal('show');

			/**
			 * Assign values to input
			 */
            $('#editDetailid').val(detailid);
            $('#editcode').val(code);
            $('#editdesc').val(name);
            $('#editIssuedqty').val(issuedqty);

            $('#editclassification').val($.trim(classi)).trigger('change');
			// $('#editclassification').val(classi);
			$('#editRequestqty').val(reqqty);
			$('#editLocation').val(loc);
            $('#editLocation1').val(loc);
            $('#editRemarks').val(rmrks);

			// $('#editreqno'+cntval).val(reqno);
			// $('#editpono'+cntval).val(po);
			// $('#editproddes'+cntval).val(prod);
			// $('#editlinedes'+cntval).val(line);
			// $('#editstatus'+cntval).val('Alert');
			// $('#editreqby'+cntval).val(cb);

			var cntval = $('#'+id).attr('data-cnt')
			$('#cntval').val(cntval);

        });

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

		function parseValue(str) {
		  Value = parseFloat( str.replace(/,/g,'') ).toFixed(2);
		  return +Value;
		}

		$('#saveEditdetail').on('click', function() {
			$('#statuspmr').val('Alert');
			var classi = $('#editclassification').val();
			var reqty = $('#editRequestqty').val();
			var isqty = $('#editIssuedqty').val();
			var loc = $('#editLocation').val();
			var rmrks = $('#editRmrks').val();
			var cnt = $('#cntval').val();
			var isvalid = true;

			if(parseFloat(reqty))
			{
				reqty = parseValue($('#editRequestqty').val());
				if(reqty <= 0)
				{
					isvalid = false;
				}
				else
				{
					isqty = parseValue($('#editIssuedqty').val());
					if(reqty > isqty)
					{
						isvalid = false;
					}
				}
			}
			else
			{
				isvalid = false;
			}

			if(isvalid)
			{
				$('#classsificationtd'+cnt).html(classi);
				$('#requestqtytd'+cnt).html(reqty);
				$('#locationtd'+cnt).html(loc);

				$('#classival'+cnt).val(classi);
				$('#reqqtyval'+cnt).val(reqty);
				$('#locval'+cnt).val(loc);
				$('#rmrks'+cnt).val(rmrks);

				$('#editmodal'+cnt).attr('data-cassival',classi);
				$('#editmodal'+cnt).attr('data-reqqty',reqty);
				$('#editmodal'+cnt).attr('data-locval',loc);
				$('#editmodal'+cnt).attr('data-rmrks',rmrks);
			}
			else
			{
                $('#EditPODetailsModal').modal('toggle');
                $("#invalidEditBatchModal").modal().shown();
			}
		});

	/**
	* Collate values with classname = name [parameter] in an array.
	**/
	function createArrValues(name)
	{
		var obj_data = new Object;
		var val_arr = new Array;
		var cnt = 0;
		$("."+name).each(function()
		{
			var id = $(this).attr('name');
			obj_data[id] = $(this).text();
			val_arr[cnt] = $.trim(obj_data[id]);
			cnt++;
		});
		return val_arr;
	}

		$('#savepmr').on('click', function(e) 
		{

		var obj_data = new Object;
		var pm_arr = new Array;
		var detail_arr = new Array;

		var cnt = 0;
		var ctr = 0;
		var is_valid = true;
		var action = $("#action").val();

		// Get Header values.
		pm_arr[0]  = $('#reqnopmr').val();
		pm_arr[1]  = $('#ponopmr').val();
		pm_arr[2]  = $("#prodes").val();
		pm_arr[3]  = $("#linedes").val();
		pm_arr[4]  = $("#remarks").val();
		pm_arr[5]  = $("#statuspmr").val();
		pm_arr[6]  = $("#createdbypmr").val();
		pm_arr[7]  = $("#createddatepmr").val();
		pm_arr[8]  = $("#updatedbypmr").val();
		pm_arr[9] = $("#updateddatepmr").val();

		// validate required fields
		// for now: location & countedby are required.
		if($.trim(pm_arr[1]) == '' )
		{
			is_valid = false;
		}

		detail_arr[0]  = createArrValues("detailidtd");
		detail_arr[1]  = createArrValues("codetd");
		detail_arr[2]  = createArrValues("nametd");
		detail_arr[3]  = createArrValues("classsificationtd");
		detail_arr[4]  = createArrValues("issuedqtytd");
		detail_arr[5]  = createArrValues("requestqtytd");
		detail_arr[6]  = createArrValues("servedqtytd");
		detail_arr[7]  = createArrValues("locationtd");
		detail_arr[8]  = createArrValues("lotnotd");
		detail_arr[9]  = createArrValues("lastservedbytd");
		detail_arr[10] = createArrValues("lastserveddatetd");

		if(is_valid)
		{
			$.post("<?php echo e(url('/requestsummaryfrm')); ?>",
			{
				_token       : $('meta[name=csrf-token]').attr('content')
				, pm_arr     : pm_arr
				, detail_arr : detail_arr
			})
			.done(function(data)
			{
				$('#loading').modal('toggle');
					// alert(data);
					$.alert('Product Material Request Updated Successfully.',
					{
						position  : ['center', [-0.40, 0]],
						type      : 'success',
						closeTime : 2000,
						autoClose : true,
						id        :'alert_suc'
					});

					if(pm_arr[0] == '')
					{
						window.location.href= "<?php echo e(url('/wbsprodmatrequest?page=')); ?>" + 'MAX&id=-1';
					}
					else
					{
						window.location.href= "<?php echo e(url('/wbsprodmatrequest?page=')); ?>" + 'CUR&id=' + $('#recid').val();
					}
			})
			.fail(function()
			{
				$('#loading').modal('toggle');
				alert('fail');
			});

			// $('#requestsummaryfrm').submit();
			// $('#ponopmr').prop('disabled', function(i, v) { return !v; });
			// $('#prodes').prop('disabled', function(i, v) { return !v; });
			// $('#linedes').prop('disabled', function(i, v) { return !v; });
			// $('#statuspmr').prop('disabled', function(i, v) { return !v; });
			// $('#createdbypmr').prop('disabled', function(i, v) { return !v; });
		}
	});

		$('#btnDeleteDetails').on('click', function(e){
			/* Get the checkboxes values based on the class attached to each check box */

			getValueUsingClass();

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
		});

               $("#reqnopmr").keyup(function(event){
                    var mat = $('#reqnopmr').val();
                    if(event.keyCode == 13)
                    {
                         window.location.href= "<?php echo e(url('/wbsprodmatrequest?page=')); ?>" + 'PMR&id=' + mat;
                    }
               });

          $(function()
          {
               // add multiple select / deselect functionality
               $("#checkall").click(function ()
               {
                    if(this.checked)
                    {
                         $('input[class=checkboxes]').parents('span').addClass("checked");
                         $("input[class=checkboxes]").prop('checked', this.checked);
                    }
                    else
                    {
                         $('input[class=checkboxes]').parents('span').removeClass("checked");
                         $("input[class=checkboxes]").prop('checked', this.checked);
                    }
               });
          });
	});

          function showAddBatch(action)
          {
               if(action=='ADD')
               {
                $('#invalidAddBatchModal').modal('toggle');
                $("#EditPODetailsModal").modal().shown();
	           }
	           else
	           {
	                $('#invalidEditBatchModal').modal('toggle');
	                $("#EditPODetailsModal").modal().shown();
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

        function searchPo()
        {
        	$.post("<?php echo e(url('/posearch')); ?>",
        	{
        		_token : $('meta[name=csrf-token]').attr('content')
        		, po   : $('#ponopmr').val()
        	})
        	.done(function(data, textStatus, jqXHR)
        	{
        		if (jQuery.isEmptyObject(data)) {
        			alert('No data found.');
        		} else {
        			$('#tblpodetail').html('');
        			var po = $('#posearch').val();
        			var cb = "<?php echo e(Auth::user()->user_id); ?>";

        			// $('#ponopmr').val(po);
        			// $('#createdbypmr').val(cb);
        			// $('#updatedbypmr').val(cb);
        			// $('#createddatepmr').val(getDate());
        			// $('#updateddatepmr').val(getDate());
        			cnt = 0;
        			$.each(data,function (i, po) {
        				console.log(po);
        				tblpodetail = '<tr>'+
        				'<td style="width:10px">'+
        				'<Input type="checkbox" class="checkboxes itemselect" name="details[]" value="'+po.detailid+'">'+
        				'</td>'+
        				'<td>'+po.code+
        				'<Input type="hidden" name="code[]" value="'+po.code+'">'+
        				'</td>'+
        				'<td>'+po.name+
        				'<Input type="hidden" name="name[]" value="'+po.name+'">'+
        				'</td>'+
        				'<td>'+parseFloat(po.issuedqty)+
        				'<Input type="hidden" name="issuedqty[]" value="'+parseFloat(po.issuedqty)+'">'+
        				'<Input type="hidden" name="location[]" value="'+po.location+'">'+
        				'</td>'+
        				'<td>'+po.lotno+
        				'<Input type="hidden" name="lotno[]" value="'+po.lotno+'">'+
        				'</td>'+
        				'</tr>';
        				$('#tblpodetail').append(tblpodetail);
        				cnt++;
        			});
        			$('#addpoModal').modal('hide');
        			$('#po').val($('#ponopmr').val());
        			$('#SelectPODetailsModal').modal('show');
        			$('#addpmr').attr('disabled','true');
        			$('#prodes').removeAttr('disabled');
        			$('#linedes').removeAttr('disabled');
        		}
        	})
        	.fail(function(data, jqXHR, textStatus, errorThrown) {
        		console.log(data);
        	});
        }

    /**
    * Navigate paggination of records.
    **/
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
        window.location.href= "<?php echo e(url('/wbsprodmatrequest?page=')); ?>" + val + '&id=' + id;
    }

    function setcontrol(action)
    {
        switch(action)
        {
            case ('EDIT'):

                $("#reqnopmr").prop("disabled", true);
                $("#btn_min").prop("disabled", true);
                $("#btn_prv").prop("disabled", true);
                $("#btn_nxt").prop("disabled", true);
                $("#btn_max").prop("disabled", true);

                $("#editpmr").hide();
                $("#addpmr").hide();
                $("#searchpmr").hide();
                $("#cancelpmr").hide();
                $("#printpmr").hide();

                $("#savepmr").show();
                $("#discardpmr").show();
                $("#btnAddDetails").show();
                $("#btnDeleteDetails").show();

                // $("#ponopmr").removeAttr('disabled');
                $("#btn_ponopmr").removeAttr('disabled');
                $("#prodes").removeAttr('disabled');
                $("#linedes").removeAttr('disabled');
                // $("#statuspmr").removeAttr('disabled');
                $("#remarks").removeAttr('disabled');
                $("#saveEditdetail").removeAttr('disabled');

                $("#action").val("EDIT");

            break;

            case ('CNL'):

                if($("#statuspmr").val() == 'Cancelled')
                {
                    $.alert('This transaction is already Cancelled.',
                    {
                        position  : ['center', [-0.40, 0]],
                        type      : 'error',
                        closeTime : 2000,
                        autoClose : true,
                        id        :'alert_suc'
                    });
                }
                else
                {
                    $("#deleteModal").modal("show");
                    $('#delete_inputId').val($("#recid").val());
                }

            break;

            case ('PRNT'):

                var values = item.split('|');
                var item = values[0];
                var isprinted = values[1];
                $("#barcodeModal").modal("show");
                $('#barcode_inputId').val($("#recid").val());
                $('#barcode_inputItemNo').val(item);

            break;

            case ('DIS'):

                window.location.href= "<?php echo e(url('/wbsprodmatrequest?page=')); ?>" + 'MIN&id=1';

            break;

            default:
                // $("#btn_cancel").removeAttr('disabled');
                // $("#btn_barcode").removeAttr('disabled');
                // $("#btn_print").removeAttr('disabled');

                // // $("#ponopmr").prop("disabled", true);
                // $("#btn_ponomr").prop("disabled", true);
                // $("#prodes").prop("disabled", true);
                // $("#linedes").prop("disabled", true);
                // $("#statuspmr").prop("disabled", true);
                // $("#remarks").prop("disabled", true);
                // $("#btn_save").prop("disabled", true);
                // $("#btn_discard").prop("disabled", true);
            break;
        }
    }

    /**
    * Show Search Modal.
    **/
    function searchData()
    {
        $("#searchModal").modal().shown();
    }

    /**
    * Load matching records depending on the inputted values.
    **/
    function filterData(action)
    {
        var condition_arr = new Array;

        if(action == 'SRCH')
        {
            condition_arr[0] = $("#srch_pono").val();
            condition_arr[1] = $("#srch_prodes").val();
            condition_arr[2] = $("#srch_linedes").val();
        }
        else
        {
            $("#srch_pono").val("");
            $("#srch_prodes").val("");
            $("#srch_linedes").val("");

            condition_arr[0] = 'X';
            condition_arr[1] = 'X';
            condition_arr[2] = 'X';
        }

        if($('#srch_open:checkbox:checked').length > 0)
        {
            condition_arr[3] ='1';
        }
        else
        {
            condition_arr[3] ='0';
        }

        if($('#srch_close:checkbox:checked').length > 0)
        {
            condition_arr[4] ='1';
        }
        else
        {
            condition_arr[4] ='0';
        }

        if($('#srch_cancelled:checkbox:checked').length > 0)
        {
            condition_arr[5] ='1';
        }
        else
        {
            condition_arr[5] ='0';
        }

        // alert(condition_arr);

        $.post("<?php echo e(url('/searchpmr')); ?>",
        {
            _token         : $('meta[name=csrf-token]').attr('content')
            , condition_arr: condition_arr
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

                newItem = '<tr>' + newcollink + newcol + '</tr>';
                $('#srch_tbl_body').append(newItem);
            });
        })
        .fail(function()
        {
            alert('fail');
        });
    }

    /**
    * Load selected record. (Triggered in Find link.)
    **/
    function findEdit(id)
    {
        window.location.href= "<?php echo e(url('/wbsprodmatrequest?page=')); ?>" + 'CUR&id=' + id;
    }
    /**
    * Open the Physical Inventory Report in a new tab.
    **/
    function generatePmrReport()
    {
        window.open("<?php echo e(url('/printpmr?')); ?>" + 'id=' + $("#recid").val(), '_blank');
    }
</script>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>