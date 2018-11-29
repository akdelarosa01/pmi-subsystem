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
												Warehouse Material Issuance <i class="fa fa-angle-down"></i>
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
												<li>
													<a href="<?php echo e(url('/wbsprodmatrequest')); ?>">
		 											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
		 										   </a>
												</li>
												<li class="active">
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
										   <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
											   <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
										   </a>
										   <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item active">
											   <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
										   </a>
										</div>
									</div>

									<?php
										$act = 0;
										if(isset($active_tab)){

											if($active_tab == '1'){ $act = 1;}
											if($active_tab == '0'){ $act = 0;}
										}
									?>
									<input type="hidden" name="name" value="<?php echo e($act); ?>" id="active">

									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
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
																<form class="form-horizontal">
																	<div class="col-md-1 col-xs-12 col-sm-12">
																		<div class="form-group">
																			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																				<button type="submit" name="button" class="btn btn-success btn-block btn-sm">Refresh</button>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-2 col-xs-12 col-sm-12">
																		<div class="form-group">
																			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																				<input type="text" name="time" value="" class="form-control input-sm" placeholder="Auto Refresh in" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-2 col-xs-12 col-sm-12">
																		<div class="form-group">
																			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																				<!-- <input type="text" name="createdate" value="" class="form-control input-sm" placeholder="Create Date"> -->
																				<input class="form-control input-sm date-picker" name="createdate" size="16" type="text" value="" placeholder="Create Date" readonly/>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-2 col-xs-12 col-sm-12">
																		<div class="form-group">
																			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																				<!-- <input type="text" name="createdateto" value="" class="form-control input-sm" placeholder="To"> -->
																				<input class="form-control input-sm date-picker" name="createdateto" size="16" type="text" value="" placeholder="To" readonly/>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3 col-xs-12 col-sm-12">
																		<div class="form-group">
																			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																				<select class="select2me form-control input-sm col-xs-4 destination" name="destination" readonly>
																					<option value="option"></option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-1 col-xs-12 col-sm-12">
																		<div class="form-group">
																			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																				<button type="submit" name="button" class="btn btn-success btn-block btn-sm">Setup</button>
																			</div>
																		</div>

																	</div>
																</form>
															</div>

															<br>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="scroller table-responsive" style="height:300px; overflow-x: auto">
                                                                        <table class="table table-striped table-bordered table-hover table-responsive" style="font-size:10px">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td style="width:10px;"></td>
                                                                                    <td>Transaction No.</td>
                                                                                    <td>Date Created</td>
                                                                                    <td>PO No.</td>
                                                                                    <td>Destination</td>
                                                                                    <td>Line</td>
                                                                                    <td>Status</td>
                                                                                    <td>Requested By</td>
                                                                                    <td>Last Served By</td>
                                                                                    <td>Last Served Date</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tblSummary">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="scroller table-responsive" style="height:200px; overflow-x: auto">
                                                                        <table class="table table-striped table-bordered table-hover table-responsive" style="font-size:10px">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td style="width:10px;"></td>
                                                                                    <td>Detail ID</td>
                                                                                    <td>Item/Part No.</td>
                                                                                    <td>Item Description</td>
                                                                                    <td>Issued Qty.(Kitting)</td>
                                                                                    <td>Request Qty.</td>
                                                                                    <td>Served Qty.</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tblViewDetail">

                                                                            </tbody>
                                                                        </table>
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
                                                               						<input type="text" class="form-control input-sm" id="issuancenowhs" name="issuancenowhs" value="<?php if(isset($wmdata)){echo $wmdata->issuance_no; } ?>" <?php if($action!='VIEW'){ echo "disabled"; } ?>>
                                                               					 </div>
                                                               					 <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px;">
                                                               						 <div class="btn-group btn-group-sm btn-group-circle">
                                                                                        <button type="button" style="font-size:12px" onclick="javascript: getrecord('MIN'); " id="btn_min" class="btn blue input-sm" <?php if(isset($wmdata)){if($wmdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-backward"></i></button>
                                                                                        <button type="button" style="font-size:12px" onclick="javascript: getrecord('PRV'); " id="btn_prv" class="btn blue input-sm" <?php if(isset($wmdata)){if($wmdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-backward"></i></button>
                                                                                        <button type="button" style="font-size:12px" onclick="javascript: getrecord('NXT'); " id="btn_nxt" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-forward"></i></button>
                                                                                        <button type="button" style="font-size:12px" onclick="javascript: getrecord('MAX'); " id="btn_max" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-forward"></i></button>
                                                               						 </div>
                                                               					 </div>
                                                               				 </div>
                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-4">Request No.</label>
                                                               					 <div class="col-sm-4">
                                                               						 <input type="text" class="form-control input-sm" id="reqno" name="reqno" disabled="disable" value="<?php if(isset($wmdata)){echo $wmdata->request_no; } ?>" >
                                                               					 </div>
                                                               				 </div>
                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-4">Status</label>
                                                               					 <div class="col-sm-4">
                                                               						 <input type="text" class="form-control input-sm" id="statuswhs" name="statuswhs" disabled="disable" value="<?php if(isset($wmdata)){echo $wmdata->status; } ?>" >
                                                               					 </div>
                                                               				 </div>
                                                               			 </div>

                                                               			 <div class="col-md-4">
                                                                             <div class="form-group row">
                                                                                 <label class="control-label col-sm-3">Created By</label>
                                                                                 <div class="col-sm-5">
                                                                                     <input type="text" class="form-control input-sm" id="createdbywhs" name="createdbywhs" disabled="disable" value="<?php if(isset($wmdata)){echo $wmdata->createdby; } ?>" >
                                                                                 </div>
                                                                             </div>
                                                                             <div class="form-group row">
                                                                                 <label class="control-label col-sm-3">Created Date.</label>
                                                                                 <div class="col-sm-5">
                                                                                     <input class="form-control input-sm date-picker" size="16" type="text" name="createddatewhs" id="createddatewhs" disabled="disable" value="<?php if(isset($wmdata)){echo $wmdata->created_at; } ?>" />
                                                                                 </div>
                                                                             </div>
                                                               			 </div>

                                                               			 <div class="col-md-4">

                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-3">Updated By</label>
                                                               					 <div class="col-sm-5">
                                                               						 <input type="text" class="form-control input-sm" id="updatedbywhs" name="updatedbywhs" disabled="disable" value="<?php if(isset($wmdata)){echo $wmdata->updatedby; } ?>" >
                                                               					 </div>
                                                               				 </div>
                                                               				 <div class="form-group row">
                                                               					 <label class="control-label col-sm-3">Updated Date</label>
                                                               					 <div class="col-sm-5">
                                                               						 <input class="form-control input-sm date-picker" size="16" type="text" name="updateddatewhs" id="updateddatewhs" disabled="disable" value="<?php if(isset($wmdata)){echo $wmdata->updated_at; } ?>" />
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
                                                                                            <table class="table table-striped table-bordered table-hover" style="font-size:10px">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td class="text-center" colspan="9">Details</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="width:10px;">
                                                                                                            <input type="checkbox" class="checkboxes" value="1"/>
                                                                                                        </td>
                                                                                                        <td style="width:10px;"></td>
                                                                                                        <td>Detail ID</td>
                                                                                                        <td>Item/Part No.</td>
                                                                                                        <td>Item Description</td>
                                                                                                        <td>Issued Qty.(Others)</td>
                                                                                                        <td>Issued Qty.(This)</td>
                                                                                                        <td>Lot No.</td>
                                                                                                        <td>Location</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                     <?php if(isset($wm_details_data)): ?>
                                                                                                     <?php foreach($wm_details_data as $wmdddata): ?>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <input type="checkbox" class="checkboxes" value="1"/>
                                                                                                        </td>
                                                                                                        <td style="width:10px;">
                                                                                                            <a href="#" class="btn btn-circle btn-primary btn-sm" id="editissuance">
                                                                                                                <i class="fa fa-edit"></i>
                                                                                                            </a>
                                                                                                        <td class="detailid_td" name="detailid_td"><?php echo e($wmdddata->id); ?></td>
                                                                                                        <td class="code_td" name="code_td"><?php echo e($wmdddata->code); ?></td>
                                                                                                        <td class="name_td" name="name_td"><?php echo e($wmdddata->name); ?></td>
                                                                                                        <td class="issuedqty_td" name="issuedqty_td"><?php echo e($wmdddata->issuedqty); ?></td>
                                                                                                        <td class="servedqty_td" name="servedqty_td"><?php echo e($wmdddata->servedqty); ?></td>
                                                                                                        <td class="lot_no_td" name="lot_no_td"><?php echo e($wmdddata->lot_no); ?></td>
                                                                                                        <td class="location_td" name="location_td"><?php echo e($wmdddata->location); ?></td>
                                                                                                    </tr>
                                                                                                    <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-4 col-md-offset-5">
                                                                                            <button class="btn green input-sm" style="font-size:12px; <?php if(isset($wmdata)){ if($wmdata->status == 'Cancelled') { echo 'display:none;'; } } ?>  <?php if($action=='VIEW'){ echo 'display:none;'; } ?>">
                                                                                                <i class="fa fa-plus"></i> Add Detail
                                                                                            </button>
                                                                                            <button class="btn red input-sm" style="font-size:12px; <?php if(isset($wmdata)){ if($wmdata->status == 'Cancelled') { echo 'display:none;'; } } ?>  <?php if($action=='VIEW'){ echo 'display:none;'; } ?>">
                                                                                                <i class="fa fa-trash"></i> Delete Detail
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                    <div class="row">

																		<div class="col-md-12 text-center">
																		  <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: saverecord(); " class="btn blue-madison input-sm" id="btn_save" <?php echo($state); ?> >
																		    <i class="fa fa-pencil"></i> Save
																		  </button>
																		  <button type="button" style="font-size:12px; <?php if(isset($wmdata)){ if($wmdata->status == 'Cancelled') { echo 'display:none;'; } } ?>  <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('EDIT'); " class="btn blue-madison input-sm" id="btn_edit" <?php echo($state); ?> >
																		    <i class="fa fa-pencil"></i> Edit
																		  </button>
																		  <button type="button" style="font-size:12px; <?php if(isset($wmdata)){ if($wmdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('CNL'); " class="btn red input-sm" id="btn_cancel" <?php echo($state); ?> >
																		    <i class="fa fa-trash"></i> Cancel
																		  </button>
																		  <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('DIS'); " class="btn red-intense input-sm" id="btn_discard" <?php echo($state); ?> >
																		    <i class="fa fa-times"></i> Discard Changes
																		  </button>
																		  <button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: searchData();" class="btn blue-steel input-sm" id="btn_search" >
																		    <i class="fa fa-search"></i> Search
																		  </button>
																		  <button type="submit" style="font-size:12px; <?php if(isset($wmdata)){ if($wmdata->status == 'Cancelled') { echo 'display:none;'; } } ?><?php if($action!='VIEW'){ echo 'display:none;'; } ?>" formtarget="_blank" onclick="javascript: generateWmiReport();" class="btn purple-plum input-sm" id="btn_print" <?php echo($state); ?>  <?php echo($state); ?>>
																		    <i class="fa fa-print"></i> Print
																		  </button>
																		</div>
                                                                        <!-- <div class="col-md-8 col-md-offset-3">
                                                                            <button class="btn green">
                                                                                <i class="fa fa-floppy-o"></i> Save
                                                                            </button>
                                                                            <button class="btn red">
                                                                                <i class="fa fa-trash"></i> Cancel
                                                                            </button>
                                                                            <button class="btn red">
                                                                                <i class="fa fa-stop"></i> Discard Changes
                                                                            </button>
                                                                            <button class="btn blue">
                                                                                <i class="fa fa-search"></i> Search
                                                                            </button>
                                                                            <button class="btn purple">
                                                                                <i class="fa fa-print"></i> Print
                                                                            </button>
                                                                            <button class="btn grey-gallery">
                                                                                <i class="fa fa-barcode"></i> Barcode
                                                                            </button>
                                                                        </div> -->
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
            <div class="modal-dialog gray-gallery">
                                <form role="form" method="POST" action="<?php echo e(url('/wbswhsmatissuance')); ?>" class="form-horizontal" id="adddetmdl">
                                    <?php echo e(csrf_field()); ?>

                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
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
                                            <input type="text" class="form-control input-sm" id="issqtydet" name="issqtydet">
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
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn_saveAddDetail" class="btn btn-success">Save</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                    </div>
                </div>
                                </form>
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

	<!-- Search Modal -->
	<div id="searchModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/wbswhsmatissuance')); ?>">
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
										<label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Open" id="srch_open" name="Alert" checked="true"/>Alert</label>
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
											<td>Issuance No.</td>
											<td>Request No.</td>
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
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	loadMasAlert();
	activeTab();

	$( document ).ready(function(e) {
		setInterval(function(){
			loadMasAlert() // this will run after every 5 seconds
		}, 5000);
		//initBtn();

		$('#tblSummary').on('click', '.viewdetails', function(e) {
			var transno = $(this).attr('data-transno');
			var status = $(this).attr('data-status');
			$('#transno').val(transno);
			$('#hdnstatus').val(status);
			viewDetails(e,transno);
		});

		$('#tblViewDetail').on('click', '.addissuanceDetails', function(e) {
			//declaration of variables
			var issDetailid = $(this).attr('data-issDetailid');
			var detailid = $(this).attr('data-detailid');
			var code = $(this).attr('data-code');
			var name = $(this).attr('data-name');
			var requestqty = $(this).attr('data-requestqty');
			var servedqty = $(this).attr('data-servedqty');
			var location = $(this).attr('data-location');

			var issuedqty = parseFloat(requestqty) - parseFloat(servedqty);

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

			$('#addDetModal').modal('show');
		});

	   $("#issuancenowhs").keyup(function(event){
			var mat = $('#issuancenowhs').val();
			if(event.keyCode == 13)
			{
				 window.location.href= "<?php echo e(url('/wbswhsmatissuance?page=')); ?>" + 'WH&id=' + mat;
			}
	   });

/*	   $('#btn_saveAddDetail').on('click', function() {
		   switchTabs();
	   });*/

		function switchTabs() {
			$('#summarytab').removeClass('active');
			$('#requestsummary').removeClass('active');
			//
			$('#issuancetab').addClass('active');
			$('#issuance').addClass('active');
			$('#summarytabtoggle').removeAttr('data-toggle');
		}
	});

	/**
	* Navigate paggination of records.
	**/
	function activeTab() {
		var act = $('#active').val();
		if (act == '0') {
			$('#summarytab').addClass('active');
			$('#requestsummary').addClass('active');

			$('#issuancetab').removeClass('active');
			$('#issuance').removeClass('active');
		}

		if (act == '1') {
			$('#summarytab').removeClass('active');
			$('#requestsummary').removeClass('active');

			$('#issuancetab').addClass('active');
			$('#issuance').addClass('active');
		}
	}

	function loadMasAlert() {
		var formURL = "<?php echo e(url('/getmassalert')); ?>";
		var token = '<?php echo e(Session::token()); ?>';
		var formData = {
			_token : token,
		};
		var tblSummary = "";
		//e.preventDefault(); //Prevent Default action.
		$.ajax({
			url: formURL,
			method: 'GET',
			data:  formData,
		}).done( function(data, textStatus, jqXHR) {
			$('#tblSummary').html('');
			var row = "", font = "";
			$.each(data, function(i,item) {
				console.log(item);

				if(item.status == 'Alert') {
					row = '#AA3939';
					font = '#fff';
				} else {
					row="";
					font = '';
				}

				tblSummary = '<tr style="background-color:'+row+'; color:'+font+'">'+
								'<td>'+
									'<a href="javascript:;" class="btn btn-circle btn-primary btn-sm viewdetails" id="viewdetails" data-transno="'+item.transno+'" data-status="'+item.status+'">'+
										'<i class="fa fa-search"></i>'+
									'</a>'+
								'</td>'+
								'<td>'+item.transno+'</td>'+
								'<td>'+item.created_at+'</td>'+
								'<td>'+item.pono+'</td>'+
								'<td>'+item.destination+'</td>'+
								'<td>'+item.line+'</td>'+
								'<td>'+item.status+'</td>'+
								'<td>'+item.requestedby+'</td>'+
								'<td>'+item.lastservedby+'</td>'+
								'<td>'+item.lastserveddate+'</td>'+
							'</tr>'
				$('#tblSummary').append(tblSummary);
			});
		}).fail( function(data, textStatus, jqXHR) {

		});
	}

	function viewDetails(e,transno) {
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
			$.each(data,function(i,details) {
				tblViewDetail = '<tr>'+
									'<td>'+
										'<a href="javascript:;" class="btn btn-circle green btn-sm addissuanceDetails"'+
										'id="addissuance" data-transno="'+details.transno+'" data-issDetailid="'+cnt+'" data-detailid="'+details.detailid+'"'+
										'data-code="'+details.code+'" data-name="'+details.name+'" data-requestqty="'+details.requestqty+'"'+
										'data-servedqty="'+details.servedqty+'" data-location="'+details.location+'">'+
											'<i class="fa fa-plus"></i>'+
										'</a>'+
										'<input type="hidden" name="det-issDetailid[]" id="det-issDetailid'+cnt+'"/>'+
									'</td>'+
									'<td>'+details.detailid+
										'<input type="hidden" name="det-detailid[]" id="det-detailid'+cnt+'"/>'+
									'</td>'+
									'<td>'+details.code+
										'<input type="hidden" name="det-code[]" id="det-code'+cnt+'"/>'+
									'</td>'+
									'<td>'+details.name+
										'<input type="hidden" name="det-name[]" id="det-name'+cnt+'"/>'+
									'</td>'+
									'<td>'+details.issuedqty+
										'<input type="hidden" name="det-issuedqty[]" id="det-issuedqty'+cnt+'"/>'+
									'</td>'+
									'<td>'+details.requestqty+
										'<input type="hidden" name="det-requestqty[]" id="det-requestqty'+cnt+'"/>'+
									'</td>'+
									'<td>'+details.servedqty+
										'<input type="hidden" name="det-servedqty[]" id="det-servedqty'+cnt+'"/>'+
										'<input type="hidden" name="det-lot[]" id="det-lot'+cnt+'"/>'+
										'<input type="hidden" name="det-location[]" id="det-location'+cnt+'"/>'+
									'</td>'+
								'</tr>';
				$('#tblViewDetail').append(tblViewDetail);
				cnt++;
			});
		}).fail(function(data, jqXHR, textStatus, errorThrown) {
			console.log(data);
		});
	}

	function getrecord(val) {
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
		window.location.href= "<?php echo e(url('/wbswhsmatissuance?page=')); ?>" + val + '&id=' + id;
	}

	function initBtn() {
		$('#btn_edit').hide();
		$('#summarytab').addClass('active');
		$('#requestsummary').addClass('active');
	}


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

	/**
	* Save the updated or added values to DB.
	**/
	function saverecord()
	{
		var obj_data = new Object;
		var wmi_arr = new Array;
		var detail_arr = new Array;

		var cnt = 0;
		var ctr = 0;
		var is_valid = true;
		var action = $("#action").val();
		var batchUpdateflag  = $("#batchUpdateflag").val();

		// Get inventory values.
		wmi_arr[0]  = $('#issuancenowhs').val();
		wmi_arr[1]  = $("#reqno").val();
		wmi_arr[2]  = $("#statuswhs").val();
		wmi_arr[3]  = $("#createdbywhs").val();
		wmi_arr[4]  = $("#updatedbywhs").val();

		// validate required fields
		// for now: location & countedby are required.
		if($.trim(wmi_arr[1]) == '')
		{
			is_valid = false;
		}

		/* detailid_td */
		detail_arr[0] = createArrValues("detailid_td");
		/* code_td */
		detail_arr[1] = createArrValues("code_td");
		/* name_td */
		detail_arr[2] = createArrValues("name_td");
		/* issuedqty_td */
		detail_arr[3] = createArrValues("issuedqty_td");
		/* servedqty_td */
		detail_arr[4] = createArrValues("servedqty_td");
		/* lot_no_td */
		detail_arr[5] = createArrValues("lot_no_td");
		/* location_td */
		detail_arr[6] = createArrValues("location_td");
		// alert(wmi_arr);
		// alert(detail_arr);

		if(is_valid)
		{
			$('#loading').modal('toggle');

			switch(action)
			{
				case ('ADD'):
					// alert('add');
					$.post("<?php echo e(url('/wbswmi-save')); ?>",
					{
						_token       : $('meta[name=csrf-token]').attr('content')
						, wmi_arr    : wmi_arr
						, detail_arr : detail_arr
					})
					.done(function(data)
					{
						// alert(data);
						$('#loading').modal('toggle');
						$.alert('Warehouse Material Issuance Added Successfully.',
						{
							position  : ['center', [-0.40, 0]],
							type      : 'success',
							closeTime : 2000,
							autoClose : true,
							id        :'alert_suc'
						});

						window.location.href= "<?php echo e(url('/wbswhsmatissuance?page=')); ?>" + 'MAX&id=-1';
					})
					.fail(function()
					{
						$('#loading').modal('toggle');
						alert('fail');
					});

				break;

				case('EDIT'):
					// alert(detail_arr);
					$.post("<?php echo e(url('/wbswmi-update')); ?>",
					{
						_token       : $('meta[name=csrf-token]').attr('content')
						, wmi_arr    : wmi_arr
						, detail_arr : detail_arr
					})
					.done(function(data)
					{
						$('#loading').modal('toggle');
						// alert(data);
						$.alert('Warehouse Material Issuance Updated Successfully.',
						{
							position  : ['center', [-0.40, 0]],
							type      : 'success',
							closeTime : 2000,
							autoClose : true,
							id        :'alert_suc'
						});
						window.location.href= "<?php echo e(url('/wbswhsmatissuance?page=')); ?>" + 'CUR&id=' + data;
					})
					.fail(function()
					{
						$('#loading').modal('toggle');
						alert('fail');
					});
				break;

				default:
					// alert(action);
				break;
			}
		}
		else
		{
			$.alert('Something is wrong with the input data. All fields are required. Please check and try again.',
			{
				position  : ['center', [-0.40, 0]],
				type      : 'error',
				closeTime : 2000,
				autoClose : true,
				id        :'alert_suc'
			});
		}
	}

	/**
	* Set the state of the controls depending on Action (ADD, EDIT, CANCEL, PRINT, DISCARD)
	**/
	function setcontrol(action, item)
	{
		switch(action)
		{
			case ('ADD'):
				$("#action").val("ADD");
				$("#inventoryno").prop("disabled", true);
				$("#btn_min").prop("disabled", true);
				$("#btn_prv").prop("disabled", true);
				$("#btn_nxt").prop("disabled", true);
				$("#btn_max").prop("disabled", true);

				$("#btn_edit").hide();
				$("#btn_add").hide();
				$("#btn_search").hide();
				$("#btn_cancel").hide();
				$("#btn_print").hide();

				$("#location").removeAttr('disabled');
				$("#btn_location").removeAttr('disabled');
				$("#countedby").removeAttr('disabled');
				$("#inventorydate").removeAttr('disabled');
				$("#inventorytime").removeAttr('disabled');
				$("#actualdate").removeAttr('disabled');
				$("#actualtime").removeAttr('disabled');
				$("#remarks").removeAttr('disabled');

				$("#btn_save").show();
				$("#btn_discard").show();
				$("#btn_edit_save").show();

				// Set header values to empty.
				$("#inventoryno").val("");
				$("#inventorydate").datepicker("setDate", new Date());
				$("#inventorytime").val("12:00 AM");
				$("#actualdate").datepicker("setDate", new Date());
				$("#actualtime").val("12:00 AM");
				$("#location").val("");
				$("#countedby").val("");
				$("#totalqty").val("");
				$("#status").val("");
				$("#remarks").val("");
				$("#createdby").val("");
				$("#createddate").val("");
				$("#updatedby").val("");
				$("#updateddate").val("");

				var table = $('#tbl_batch').DataTable();

				table
					.clear()
					.draw();

			break;
			case ('EDIT'):

				$("#inventoryno").prop("disabled", true);
				$("#btn_min").prop("disabled", true);
				$("#btn_prv").prop("disabled", true);
				$("#btn_nxt").prop("disabled", true);
				$("#btn_max").prop("disabled", true);

				$("#btn_edit").hide();
				$("#btn_add").hide();
				$("#btn_search").hide();
				$("#btn_cancel").hide();
				$("#btn_print").hide();

				// $("#location").removeAttr('disabled');
				// $("#btn_location").removeAttr('disabled');
				$("#countedby").removeAttr('disabled');
				$("#inventorydate").removeAttr('disabled');
				$("#inventorytime").removeAttr('disabled');
				$("#actualdate").removeAttr('disabled');
				$("#actualtime").removeAttr('disabled');
				$("#remarks").removeAttr('disabled');
				$("#edit_actualqty").removeAttr('disabled');


				$("#btn_save").show();
				$("#btn_discard").show();
				$("#btn_edit_save").show();
				$("#action").val("EDIT");

			break;

			case ('CNL'):

				if($("#status").val() == 'Cancelled')
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

				window.location.href= "<?php echo e(url('/wbswhsmatissuance?page=')); ?>" + 'MIN&id=1';

			break;

			default:
				$("#btn_cancel").removeAttr('disabled');
				$("#btn_barcode").removeAttr('disabled');
				$("#btn_print").removeAttr('disabled');

				$("#location").prop("disabled", true);
				$("#btn_location").prop("disabled", true);
				$("#countedby").prop("disabled", true);
				$("#inventorydate").prop("disabled", true);
				$("#actualdate").prop("disabled", true);
				$("#inventoryno").prop("disabled", true);
				$("#btn_save").prop("disabled", true);
				$("#btn_discard").prop("disabled", true);
				$("#btn_add_batch").prop("disabled", true);
				$("#btn_delete_batch").prop("disabled", true);
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
			condition_arr[0] = $("#srch_issuanceno").val();
			condition_arr[1] = $("#srch_reqno").val();
		}
		else
		{
			$("#srch_issuanceno").val("");
			$("#srch_reqno").val("");

			condition_arr[0] = 'X';
			condition_arr[1] = 'X';
		}

		if($('#srch_open:checkbox:checked').length > 0)
		{
			condition_arr[2] ='1';
		}
		else
		{
			condition_arr[2] ='0';
		}

		if($('#srch_close:checkbox:checked').length > 0)
		{
			condition_arr[3] ='1';
		}
		else
		{
			condition_arr[3] ='0';
		}

		if($('#srch_cancelled:checkbox:checked').length > 0)
		{
			condition_arr[4] ='1';
		}
		else
		{
			condition_arr[4] ='0';
		}

		// alert(condition_arr);

		$.post("<?php echo e(url('/wbswmi-search')); ?>",
		{
			_token         : $('meta[name=csrf-token]').attr('content')
			, condition_arr: condition_arr
		})
		.done(function(datatable)
		{
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
		window.location.href= "<?php echo e(url('/wbswhsmatissuance?page=')); ?>" + 'CUR&id=' + id;
	}

	/**
	* Open the Physical Inventory Report in a new tab.
	**/
	function generateWmiReport()
	{
		window.open("<?php echo e(url('/wbswmi-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
	}
</script>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>