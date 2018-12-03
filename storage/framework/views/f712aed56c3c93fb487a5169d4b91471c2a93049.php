<?php
/*******************************************************************************
     Copyright (c) Company Nam All rights reserved.

     FILE NAME: materialreceiving.blade.php
     MODULE NAME:  3006 : WBS - Material Receiving
     CREATED BY: AK.DELAROSA
     DATE CREATED: 2016.07.01
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.07.01    AK.DELAROSA      Initial Draft
     100-00-02   1     2016.07.05    MESPINOSA        Material Receving Implementation.
     200-00-01   1     2016.07.01    AK.DELAROSA      2ND VERSION
*******************************************************************************/
?>



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
                                                            Material Receiving <i class="fa fa-angle-down"></i>
                                                       </button>
                                                       <ul class="dropdown-menu" role="menu">
                                                            <li class="active">
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
                                                       <a href="<?php echo e(url('/materialreceiving')); ?>" class="list-group-item active">
                                                            <i class="fa fa-qrcode fa-2x"></i> Material Receiving
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
                                                  <div class="row">
                                                       <div class="col-md-4">
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Receiving No.</label>
                                                                 <div class="col-md-4">
                                                                      <input type="text" class="form-control clear input-sm" id="receivingno" name="receivingno" />
                                                                 </div>
                                                                 <div class="col-md-4" >
                                                                      <div class="btn-group btn-group-circle" style="width:200px;">
                                                                           <a href="javascript:navigate('first');" id="btn_min" class="btn blue input-sm"><i class="fa fa-fast-backward"></i></a>
                                                                           <a href="javascript:navigate('prev');" id="btn_prv" class="btn blue input-sm"><i class="fa fa-backward"></i></a>
                                                                           <a href="javascript:navigate('next');" id="btn_nxt" class="btn blue input-sm"><i class="fa fa-forward"></i></a>
                                                                           <a href="javascript:navigate('last');" id="btn_max" class="btn blue input-sm"><i class="fa fa-fast-forward"></i></a>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Receiving Date.</label>
                                                                 <div class="col-md-4">
                                                                      <input class="form-control clear input-sm date-picker" size="16" type="text" name="receivingdate" id="receivingdate"/>
                                                                 </div>
                                                                 <div class="col-md-5">
                                                                      <!-- <button type="button" class="btn btn-default">Previous</button> -->
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Invoice No.</label>
                                                                 <div class="col-md-4">
                                                                      <input type="text" class="form-control clear input-sm" id="invoiceno" name="invoiceno"/>
                                                                      <input type="hidden" class="form-control clear input-sm" id="hdninvoiceno" name="hdninvoiceno"/>
                                                                 </div>
                                                                 <div class="col-md-5">
                                                                      <button type="submit" class="btn btn-circle green input-sm" id="btn_checkinv"><i class="fa fa-arrow-circle-down"></i></button>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Invoice Date</label>
                                                                 <div class="col-md-4">
                                                                      <input class="form-control clear input-sm date-picker" size="16" type="text" name="invoicedate" id="invoicedate" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="col-md-4">
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Pallet No.</label>
                                                                 <div class="col-md-6">
                                                                      <input type="text" class="form-control clear input-sm" id="palletno" name="palletno" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Total Qty.</label>
                                                                 <div class="col-md-6">
                                                                      <input type="text" class="form-control clear input-sm" id="totalqty" name="totalqty" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Total Variance</label>
                                                                 <div class="col-md-6">
                                                                      <input type="text" class="form-control clear input-sm" id="totalvar" name="totalvar" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Status</label>
                                                                 <div class="col-md-6">
                                                                      <input type="text" class="form-control clear input-sm" id="status" name="status" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="col-md-4">
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Created By</label>
                                                                 <div class="col-md-6">
                                                                      <input type="text" class="form-control clear input-sm" id="createdby" name="createdby" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Created Date.</label>
                                                                 <div class="col-md-6">
                                                                      <input class="form-control clear input-sm date-picker" size="50" type="text" name="createddate" id="createddate" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Updated By</label>
                                                                 <div class="col-md-6">
                                                                      <input type="text" class="form-control clear input-sm" id="updatedby" name="updatedby" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label class="control-label col-md-3">Updated Date</label>
                                                                 <div class="col-md-6">
                                                                      <input class="form-control clear input-sm date-picker" size="50" type="text" name="updateddate" id="updateddate" disabled="disable"/>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <div class="row">
                                                       <div class="col-md-12">
                                                            <div class="tabbable-custom">
                                                                 <ul class="nav nav-tabs nav-tabs-lg" id="tabslist" role="tablist">
                                                                      <li class="active">
                                                                           <a href="#details" data-toggle="tab" data-toggle="tab" aria-expanded="true">Details</a>
                                                                      </li>
                                                                      <li>
                                                                           <a href="#summary" data-toggle="tab" data-toggle="tab" aria-expanded="true">Summary</a>
                                                                      </li>
                                                                      <li>
                                                                           <a href="#batch" data-toggle="tab" data-toggle="tab" aria-expanded="true">Batch Details</a>
                                                                      </li>
                                                                 </ul>

                                                                 <!-- Details Tab -->
                                                                 <div class="tab-content" id="tab-subcontents">
                                                                      <div class="tab-pane fade in active" id="details">
                                                                           <div class="row">
                                                                                <div class="col-md-12" style="height:486px; overflow:auto;">
                                                                                     <table class="table table-striped table-bordered table-hover table-responsive sortable" style="font-size:10px" id="tbl_details">
                                                                                          <thead>
                                                                                               <tr>
                                                                                                    <td width="20%">Item/Part No.</td>
                                                                                                    <td>Item Description</td>
                                                                                                    <td>Quantity</td>
                                                                                                    <td>PO/PR No.</td>
                                                                                                    <td>Unit Price</td>
                                                                                                    <td>Amount</td>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody id="tbl_details_body"></tbody>
                                                                                     </table>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                      <!-- Summary Tab -->
                                                                      <div class="tab-pane fade" id="summary">
                                                                           <div class="row">
                                                                                <div class="col-md-12" style="height:486px; overflow:auto;">
                                                                                     <table class="table table-striped table-bordered table-hover table-responsive" id="tbl_summary" style="font-size:10px">
                                                                                          <thead>
                                                                                               <tr>
                                                                                                    <td width="20%">Item/Part No.</td>
                                                                                                    <td width="20%">Item Description</td>
                                                                                                    <td>Quantity</td>
                                                                                                    <td>Received Qty.</td>
                                                                                                    <td>Variance</td>
                                                                                                    <td><input type="checkbox" id="checkbox_iqc" name="checkbox_iqc"/>Not Req'd</td>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody id="tbl_summary_body">
                                                                                               
                                                                                          </tbody>
                                                                                     </table>
                                                                                </div>
                                                                                <div class="col-md-2"></div>
                                                                           </div>
                                                                      </div>
                                                                      <!-- Batch Details Tab -->
                                                                      <div class="tab-pane fade" id="batch">
                                                                           <div class="row">
                                                                                <div class="col-md-12" style="height:486px; overflow:auto;">
                                                                                     <table class="table table-striped table-bordered table-hover table-responsive" id="tbl_batch" style="font-size:10px">
                                                                                          <thead id="th_batch">
                                                                                               <tr>
                                                                                                    <td class="table-checkbox" style="font-size:10px">
                                                                                                         <!-- <input type="checkbox" class="group-checkable" data-set="#tbl_batch .checkboxes"/> -->
                                                                                                    </td>
                                                                                                    <td></td>
                                                                                                    <td>Batch ID</td>
                                                                                                    <td>Item/Part No.</td>
                                                                                                    <td>Item Description</td>
                                                                                                    <td>Quantity</td>
                                                                                                    <td>Package Category</td>
                                                                                                    <td>Package Qty.</td>
                                                                                                    <td>Lot No.</td>
                                                                                                    <td>Location</td>
                                                                                                    <td>Supplier</td>
                                                                                                    <td>Not Req'd</td>
                                                                                                    <td>Printed</td>
                                                                                                    <td></td>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody id="tbl_batch_body" >
                                                                                              
                                                                                          </tbody>
                                                                                     </table>
                                                                                </div>
                                                                                <div class="col-md-2"></div>
                                                                           </div>
                                                                           <div class="row">
                                                                                <div class="col-md-12 text-center">
                                                                                     <button type="button"  class="btn green input-sm" id="btn_add_batch" <?php echo($state); ?> >
                                                                                          <i class="fa fa-plus"></i> Add Batch Item
                                                                                     </button>
                                                                                     <button type="button"  class="btn red input-sm" id="btn_delete_batch">
                                                                                          <i class="fa fa-trash"></i> Delete
                                                                                     </button>
                                                                                     <!-- <button type="button"  class="btn blue input-sm" id="btn_all_batch">
                                                                                          <i class="glyphicon glyphicon-asterisk"></i> Receive All
                                                                                     </button> -->
                                                                                     <input type="hidden" class="form-control input-sm" id="item_count" placeholder="Lower Limit" name="item_count"/>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>

                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Action Buttons -->
                                                  <div class="row">
                                                       <div class="col-md-12 text-center">
                                                            <!-- <button type="button" class="btn green input-sm" id="btn_add" <?php //echo($state); ?> >
                                                                 <i class="fa fa-plus"></i> Add New
                                                            </button> -->
                                                            <button type="button" class="btn blue-madison input-sm" id="btn_save" <?php echo($state); ?> >
                                                                 <i class="fa fa-pencil"></i> Save
                                                            </button>
                                                            <button type="button" class="btn blue-madison input-sm" id="btn_edit" >
                                                                 <i class="fa fa-pencil"></i> Edit
                                                            </button>
                                                            <button type="button" class="btn red input-sm" id="btn_cancel" <?php echo($state); ?> >
                                                                 <i class="fa fa-trash"></i> Cancel
                                                            </button>

                                                            <button type="button" class="btn red-intense input-sm" id="btn_discard" <?php echo($state); ?> >
                                                                 <i class="fa fa-pencil"></i> Discard Changes
                                                            </button>

                                                            <button type="button" class="btn blue-steel input-sm" id="btn_search">
                                                                 <i class="fa fa-search"></i> Search
                                                            </button>
                                                            <button type="button" class="btn grey-gallery input-sm" id="btn_barcode" <?php echo($state); ?>>
                                                                 <i class="fa fa-barcode"></i> Barcode
                                                            </button>
                                                            <button type="submit" class="btn purple-plum input-sm" id="btn_print">
                                                                 <i class="fa fa-print"></i> Print
                                                            </button>
                                                            <button type="submit" class="btn blue input-sm" id="btn_print_iqc">
                                                                 <i class="fa fa-print"></i> IQC
                                                            </button>
                                                            <input type="hidden" name="savestate" id="savestate">
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

     <!-- Add Batch Modal -->
     <div id="addbatchitem" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-md">
               <!-- Modal content-->
               <div class="modal-content blue">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Add Batch</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-6">
                                   All the fields are required.
                              </div>
                              <div class="col-md-12">
                                   <form class="form-horizontal">   
                                        <div class="form-group">
                                             <label for="inputcode" class="col-md-3 control-label">*Batch ID</label>
                                             <div class="col-md-9">
                                                  <input type="text" id="add_invoice_no" name="id" hidden="true" />
                                                  <input type="text" class="form-control input-sm" id="add_inputBatchId" placeholder="Batch ID" name="batchid" readonly />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">*Item No</label>
                                             <div class="col-md-9">
                                                  <input type="text" id="add_inputItemNo" class="form-control input-sm" name="itemno" <?php echo($state);?>>
                                                  <input type="hidden" id="add_inputItemDesc" class="form-control input-sm" name="itemno" <?php echo($state);?>>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">*Quantity</label>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm" id="add_inputQty" placeholder="Quantity" name="qty" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">*Package Category</label>
                                             </div>
                                             <div class="col-md-3">
                                                  <input type="text" id="add_inputBox" class="form-control input-sm" name="itemno" <?php echo($state);?>>
                                             </div>
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">*Package Qty</label>
                                             </div>
                                             <div class="col-md-3">
                                                  <input type="text" class="form-control input-sm" id="add_inputBoxQty" placeholder="Box Qty" name="boxqty" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label" >*Lot No</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm" id="add_inputLotNo" placeholder="Lot No" name="lotno" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Location</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm" id="add_inputLocation" placeholder="Location" name="location" disabled="disabled" <?php echo($readonly); ?> value=""/>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Supplier</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm" id="add_inputSupplier" placeholder="Supplier" name="supplier" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" id="btn_mdl_add" class="btn btn-success" <?php echo($state); ?>><i class="fa fa-plus"></i> Add</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
               </div>
          </div>
     </div>

     <!-- Search Modal -->
     <div id="searchModal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-xl">
               <!-- Modal content-->
               <div class="modal-content blue">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Search</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-5">
                                   <form class="form-horizontal">
                                        <div class="form-group">
                                             <label for="inputcode" class="col-md-3 control-label">Receive Date</label>
                                             <div class="col-md-7">
                                                  <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
                                                       <input type="text" class="form-control input-sm reset" name="srch_from" id="srch_from"/>
                                                       <span class="input-group-addon">to </span>
                                                       <input type="text" class="form-control input-sm reset" name="srch_to" id="srch_to"/>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Invoice No</label>
                                             <div class="col-md-7">
                                                  <input type="text" class="form-control input-sm reset" id="srch_invoiceno" placeholder="Invoice No" name="srch_invoiceno" autofocus <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Invoice Date</label>
                                             <div class="col-md-7">
                                                  <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
                                                       <input type="text" class="form-control input-sm reset" name="srch_invfrom" id="srch_invfrom"/>
                                                       <span class="input-group-addon"> to </span>
                                                       <input type="text" class="form-control input-sm reset" name="srch_invto" id="srch_invto"/>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Pallet No</label>
                                             <div class="col-md-7">
                                                  <input type="text" class="form-control input-sm reset" id="srch_palletno" placeholder="Pallet No" name="srch_palletno" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Status</label>
                                             <div class="col-md-7">
                                                  <label><input type="checkbox" class="checkboxes" value="Open" id="srch_open" name="Open" checked="checked"/>Open</label>
                                                  <label><input type="checkbox" class="checkboxes" value="Close" id="srch_close" name="Close"/>Close</label>
                                                  <label><input type="checkbox" class="checkboxes" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div class="col-md-7" style="height:200px; overflow: auto;">
                                   <table class="table table-striped table-bordered table-hover table-responsive sortable" style="font-size:10px">
                                        <thead>
                                             <tr>
                                                  <td></td>
                                                  <td>Transaction No.</td>
                                                  <td>Receive Date</td>
                                                  <td>Invoice No.</td>
                                                  <td>Invoice Date</td>
                                                  <td>Pallet No.</td>
                                                  <td>Status</td>
                                                  <td>Created By</td>
                                                  <td>Created Date</td>
                                                  <td>Updated By</td>
                                                  <td>Updated Date</td>
                                             </tr>
                                        </thead>
                                        <tbody id="tbl_search_body">
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <a href="javascript:;" class="btn blue-madison input-sm" id="btn_filter"><i class="glyphicon glyphicon-filter"></i> Filter</a>
                         <a href="javascript:;" class="btn green input-sm" id="btn_reset"><i class="glyphicon glyphicon-repeat"></i> Reset</a>
                         <a href="javascript:;" class="btn btn-danger input-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</a>
                    </div>
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

     <!-- MSG -->
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

     
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
     <script type="text/javascript" src="<?php echo e(asset('assets/global/scripts/sorttable.js')); ?>"></script>
     <script type="text/javascript">
          $(function() {
               ViewState();
               $('#btn_checkinv').on('click', function(e) {
                    $('#loading').modal('show');
                    $('.details_remove').remove();
                    $('.summary_remove').remove();
                    $('.batch_remove').remove();
                    var tbl_summary = '';
                    var tbl_details = '';
                    var url = '<?php echo e(url("/wbsmrpostinvoicenum")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         invoiceno: $('#invoiceno').val()
                    };

                    $.ajax({
                         url: url,
                         type: "POST",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         console.log(data);
                         var checked = '';
                         if (data.request_status == 'success') {
                              console.log(data.detailsdata);
                              var invdata = data.invoicedata;
                              $('#loading').modal('hide');
                              $('#receivingno').val(invdata.receiving_no);
                              $('#receivingdate').val(invdata.receiving_date);
                              $('#invoiceno').val(invdata.invoiceno);
                              $('#hdninvoiceno').val(invdata.invoiceno);
                              $('#invoicedate').val(invdata.invoice_date);
                              $('#totalqty').val(invdata.total_qty);
                              $('#totalvar').val(invdata.total_var);
                              $('#status').val(invdata.status);
                              $('#createdby').val(invdata.created_by);
                              $('#createddate').val(invdata.created_date);
                              $('#updatedby').val(invdata.updated_by);
                              $('#updateddate').val(invdata.updated_date);

                              $.each(data.detailsdata, function(index, x) {
                                   console.log(x);
                                   tbl_details = '<tr class="details_remove">'+
                                                       '<td>'+x.item+'</td>'+
                                                       '<td>'+x.description+'</td>'+
                                                       '<td>'+x.qty+'</td>'+
                                                       '<td>'+x.pr+'</td>'+
                                                       '<td>'+x.price+'</td>'+
                                                       '<td>'+x.amount+'</td>'+
                                                  '</tr>';
                                   $('#tbl_details_body').append(tbl_details);
                              });

                              $.each(data.summarydata, function(index, x) {
                                   if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC') {
                                        checked = 'checked="checked"';
                                   }
                                   tbl_summary = '<tr class="summary_remove">'+
                                                       '<td>'+x.item+
                                                            '<input type="hidden" name="item[]" value"'+x.item+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.description+
                                                            '<input type="hidden" name="description[]" value"'+x.description+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.qty+
                                                            '<input type="hidden" name="qty[]" value"'+x.qty+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.r_qty+
                                                            '<input type="hidden" name="r_qty[]" value"'+x.r_qty+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.variance+
                                                            '<input type="hidden" name="variance[]" value"'+x.variance+'" />'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="iqc[]" class="iqc_chk" '+checked+' value="1"/>'+
                                                       '</td>'+
                                                  '</tr>';
                                   $('#tbl_summary_body').append(tbl_summary);
                              });

                              AddState();
                              getPackage();
                              getItems();
                         } else {
                              $('#msg').modal('show');
                              $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                              $('#err_msg').html(data.msg);

                              ViewState();
                              $('#loading').modal('hide');
                         }
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("There's some error while processing.");
                    });
               });

               $('#btn_edit').on('click', function(e) {
                    EditState();
               });

               $('#btn_cancel').on('click', function() {
                    var url = '<?php echo e(url("/wbsmrcancel")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         ViewState();
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("There's some error while processing.");
                    });
               });

               $('#btn_discard').on('click', function() {
                    location.reload(true);
               });

               $('#receivingno').on('change', function() {
                    $('.details_remove').remove();
                    $('.summary_remove').remove();
                    $('.batch_remove').remove();
                    
                    var tbl_details = '';
                    var tbl_summary = '';
                    var tbl_batch = '';

                    $('#loading').modal('show');
                    var url = '<?php echo e(url("/wbsmrnumber")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         receivingno: $('#receivingno').val(),
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         var checked = '';
                         if (data.request_status == 'success') {
                              var invdata = data.invoicedata;
                              var status = '';
                              if (invdata.status == 'O') {
                                   status = 'Open';
                              } else {
                                   status = 'Closed';
                              }
                              $('#loading').modal('hide');
                              $('#receivingno').val(invdata.receive_no);
                              $('#receivingdate').val(invdata.receive_date);
                              $('#invoiceno').val(invdata.invoice_no);
                              $('#hdninvoiceno').val(invdata.invoice_no);
                              $('#invoicedate').val(invdata.invoice_date);
                              $('#palletno').val(invdata.pallet_no);
                              $('#totalqty').val(invdata.total_qty);
                              $('#totalvar').val(invdata.total_var);
                              $('#status').val(status);
                              $('#createdby').val(invdata.create_user);
                              $('#createddate').val(invdata.created_at);
                              $('#updatedby').val(invdata.update_user);
                              $('#updateddate').val(invdata.updated_at);

                              $.each(data.detailsdata, function(index, x) {
                                   tbl_details = '<tr class="details_remove">'+
                                                       '<td>'+x.item+'</td>'+
                                                       '<td>'+x.item_desc+'</td>'+
                                                       '<td>'+x.qty+'</td>'+
                                                       '<td>'+x.pr_no+'</td>'+
                                                       '<td>'+x.unit_price+'</td>'+
                                                       '<td>'+x.amount+'</td>'+
                                                  '</tr>';
                                   $('#tbl_details_body').append(tbl_details);
                              });

                              $.each(data.summarydata, function(index, x) {
                                   if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC') {
                                        checked = 'checked="checked"';
                                   }
                                   tbl_summary = '<tr class="summary_remove">'+
                                                       '<td>'+x.item+
                                                            '<input type="hidden" name="item[]" value"'+x.item+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.item_desc+
                                                            '<input type="hidden" name="item_desc[]" value"'+x.item_desc+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.qty+
                                                            '<input type="hidden" name="qty[]" value"'+x.qty+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.received_qty+
                                                            '<input type="hidden" name="received_qty[]" value"'+x.received_qty+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.variance+
                                                            '<input type="hidden" name="variance[]" value"'+x.variance+'" />'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="iqc[]" class="iqc_chk" '+checked+' value="1"/>'+
                                                       '</td>'+
                                                  '</tr>';
                                   $('#tbl_summary_body').append(tbl_summary);
                              });

                              var cnt = 0;
                              var checked_kit = '';
                              var checked_print = '';
                              $.each(data.batchdata, function(index, x) {
                                   if (x.for_kitting == 1) {
                                        checked_kit = 'checked="checked"';
                                   }
                                   if (x.is_printed == 1) {
                                        checked_print = 'checked="checked"';
                                   }
                                   cnt++;
                                   tbl_batch = '<tr class="batch_remove">'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="del_batch" disabled="disabled" class="chk_del_batch" data-qty="'+x.qty+'" data-item="'+x.item+'" value="'+x.id+'">'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<a href="javascript:;" class="btn input-sm blue edit_item_batch" disabled="disabled" data-id="'+x.id+'">'+
                                                                 '<i class="fa fa-edit"></i>'+
                                                            '<a>'+
                                                       '</td>'+
                                                       '<td>'+cnt+'</td>'+
                                                       '<td>'+x.item+
                                                            '<input type="hidden" name="item_batch[]" value="'+x.item+'">'+
                                                       '</td>'+
                                                       '<td>'+x.item_desc+
                                                            '<input type="hidden" name="item_desc_batch[]" value="'+x.item_desc+'">'+
                                                       '</td>'+
                                                       '<td>'+x.qty+
                                                            '<input type="hidden" name="qty_batch[]" value="'+x.qty+'">'+
                                                       '</td>'+
                                                       '<td>'+x.box+
                                                            '<input type="hidden" name="box_batch[]" value="'+x.box+'">'+
                                                       '</td>'+
                                                       '<td>'+x.box_qty+
                                                            '<input type="hidden" name="box_qty_batch[]" value="'+x.qty+'">'+
                                                       '</td>'+
                                                       '<td>'+x.lot_no+
                                                            '<input type="hidden" name="lot_no_batch[]" value="'+x.lot_no+'">'+
                                                       '</td>'+
                                                       '<td>'+x.location+
                                                            '<input type="hidden" name="location_batch[]" value="'+x.location+'">'+
                                                       '</td>'+
                                                       '<td>'+x.supplier+
                                                            '<input type="hidden" name="supplier_batch[]" value="'+x.supplier+'">'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="iqc_batch[]" value="'+x.for_kitting+'" '+checked_kit+'>'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="print_batch[]" value="'+x.is_printed+'" '+checked_print+'>'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-id="'+x.id+'">'+
                                                                 '<i class="fa fa-barcode"></i>'+
                                                            '<a>'+
                                                       '</td>'+
                                                  '</tr>';
                                   $('#tbl_batch_body').append(tbl_batch);
                              
                         });
                         } else {
                              $('#msg').modal('show');
                              $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                              $('#err_msg').html(data.msg);

                              ViewState();
                              $('#loading').modal('hide');
                         }
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("There's some error while processing.");
                    });
               });
               
               $('#btn_search').on('click', function(e) {
                    $('#searchModal').modal('show');
               });

               $('#btn_add_batch').on('click', function() {
                    $('#addbatchitem').modal('show');
               });

               $('#btn_filter').on('click', function() {
                    $('#tbl_search_body').html('');
                    var tbl_search = '';
                    var url = '<?php echo e(url("/wbsmrsearch")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         from: $('#srch_from').val(),
                         to: $('#srch_to').val(),
                         invoiceno: $('#srch_invoiceno').val(),
                         invfrom: $('#srch_invfrom').val(),
                         invto: $('#srch_invto').val(),
                         palletno: $('#srch_palletno').val(),
                         open: $('#srch_open').val(),
                         close: $('#srch_close').val(),
                         cancelled: $('#srch_cancelled').val(),
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         console.log(data);
                         var status = '';
                         $.each(data, function(index, x) {
                              console.log(x);
                              if (x.status == 'O') {
                                   status = 'Open';
                              } 
                              if (x.status == 'X') {
                                   status = 'Closed';
                              }

                              if (x.status == 'C') {
                                   status = 'Cancelled';
                              }
                              tbl_search = '<tr class="search_row">'+
                                                  '<td>'+
                                                       '<a href="javascript:;" class="btn blue input-sm look_search" data-id="'+x.id+'">'+
                                                            '<i class="fa fa-edit"></i>'+
                                                       '</a>'+
                                                  '</td>'+
                                                  '<td>'+x.receive_no+'</td>'+
                                                  '<td>'+x.receive_date+'</td>'+
                                                  '<td>'+x.invoice_no+'</td>'+
                                                  '<td>'+x.invoice_date+'</td>'+
                                                  '<td>'+x.pallet_no+'</td>'+
                                                  '<td>'+status+'</td>'+
                                                  '<td>'+x.create_user+'</td>'+
                                                  '<td>'+x.created_at+'</td>'+
                                                  '<td>'+x.update_user+'</td>'+
                                                  '<td>'+x.updated_at+'</td>'+
                                           '</tr>';
                              $('#tbl_search_body').append(tbl_search);
                         });
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("There's some error while processing.");
                    });
               });

               $('#tbl_search_body').on('click', '.look_search', function(e) {
                    var id = $(this).attr('data-id');
                    var url = '<?php echo e(url("/wbsmrlookitem")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         id: id
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         $('#searchModal').modal('hide');
                         var checked = '';
                         if (data.request_status == 'success') {
                              var invdata = data.invoicedata;
                              var status = '';
                              if (invdata.status == 'O') {
                                   status = 'Open';
                              } else {
                                   status = 'Closed';
                              }
                              $('#loading').modal('hide');
                              $('#receivingno').val(invdata.receive_no);
                              $('#receivingdate').val(invdata.receive_date);
                              $('#invoiceno').val(invdata.invoice_no);
                              $('#hdninvoiceno').val(invdata.invoice_no);
                              $('#invoicedate').val(invdata.invoice_date);
                              $('#palletno').val(invdata.pallet_no);
                              $('#totalqty').val(invdata.total_qty);
                              $('#totalvar').val(invdata.total_var);
                              $('#status').val(status);
                              $('#createdby').val(invdata.create_user);
                              $('#createddate').val(invdata.created_at);
                              $('#updatedby').val(invdata.update_user);
                              $('#updateddate').val(invdata.updated_at);

                              $.each(data.detailsdata, function(index, x) {
                                   tbl_details = '<tr class="details_remove">'+
                                                       '<td>'+x.item+'</td>'+
                                                       '<td>'+x.item_desc+'</td>'+
                                                       '<td>'+x.qty+'</td>'+
                                                       '<td>'+x.pr_no+'</td>'+
                                                       '<td>'+x.unit_price+'</td>'+
                                                       '<td>'+x.amount+'</td>'+
                                                  '</tr>';
                                   $('#tbl_details_body').append(tbl_details);
                              });

                              $.each(data.summarydata, function(index, x) {
                                   if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC') {
                                        checked = 'checked="checked"';
                                   }
                                   tbl_summary = '<tr class="summary_remove">'+
                                                       '<td>'+x.item+
                                                            '<input type="hidden" name="item[]" value"'+x.item+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.item_desc+
                                                            '<input type="hidden" name="item_desc[]" value"'+x.item_desc+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.qty+
                                                            '<input type="hidden" name="qty[]" value"'+x.qty+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.received_qty+
                                                            '<input type="hidden" name="received_qty[]" value"'+x.received_qty+'" />'+
                                                       '</td>'+
                                                       '<td>'+x.variance+
                                                            '<input type="hidden" name="variance[]" value"'+x.variance+'" />'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="iqc[]" class="iqc_chk" '+checked+' value="1"/>'+
                                                       '</td>'+
                                                  '</tr>';
                                   $('#tbl_summary_body').append(tbl_summary);
                              });
                              var cnt = 0;
                              var checked_kit = '';
                              var checked_print = '';
                              $.each(data.batchdata, function(index, x) {
                                   if (x.for_kitting == 1) {
                                        checked_kit = 'checked="checked"';
                                   }
                                   if (x.is_printed == 1) {
                                        checked_print = 'checked="checked"';
                                   }
                                   cnt++;
                                   tbl_batch = '<tr class="batch_remove">'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="del_batch" disabled="disabled" class="chk_del_batch" data-qty="'+x.qty+'" data-item="'+x.item+'" value="'+x.id+'">'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<a href="javascript:;" class="btn input-sm blue edit_item_batch" disabled="disabled" data-id="'+x.id+'">'+
                                                                 '<i class="fa fa-edit"></i>'+
                                                            '<a>'+
                                                       '</td>'+
                                                       '<td>'+cnt+'</td>'+
                                                       '<td>'+x.item+
                                                            '<input type="hidden" name="item_batch[]" value="'+x.item+'">'+
                                                       '</td>'+
                                                       '<td>'+x.item_desc+
                                                            '<input type="hidden" name="item_desc_batch[]" value="'+x.item_desc+'">'+
                                                       '</td>'+
                                                       '<td>'+x.qty+
                                                            '<input type="hidden" name="qty_batch[]" value="'+x.qty+'">'+
                                                       '</td>'+
                                                       '<td>'+x.box+
                                                            '<input type="hidden" name="box_batch[]" value="'+x.box+'">'+
                                                       '</td>'+
                                                       '<td>'+x.box_qty+
                                                            '<input type="hidden" name="box_qty_batch[]" value="'+x.qty+'">'+
                                                       '</td>'+
                                                       '<td>'+x.lot_no+
                                                            '<input type="hidden" name="lot_no_batch[]" value="'+x.lot_no+'">'+
                                                       '</td>'+
                                                       '<td>'+x.location+
                                                            '<input type="hidden" name="location_batch[]" value="'+x.location+'">'+
                                                       '</td>'+
                                                       '<td>'+x.supplier+
                                                            '<input type="hidden" name="supplier_batch[]" value="'+x.supplier+'">'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="iqc_batch[]" value="'+x.for_kitting+'" '+checked_kit+'>'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<input type="checkbox" name="print_batch[]" value="'+x.is_printed+'" '+checked_print+'>'+
                                                       '</td>'+
                                                       '<td>'+
                                                            '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-id="'+x.id+'">'+
                                                                 '<i class="fa fa-barcode"></i>'+
                                                            '<a>'+
                                                       '</td>'+
                                                  '</tr>';
                                   $('#tbl_batch_body').append(tbl_batch);
                                   
                              });
                         } else {
                              $('#msg').modal('show');
                              $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                              $('#err_msg').html(data.msg);

                              ViewState();
                              $('#loading').modal('hide');
                         }
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("There's some error while processing.");
                    });
               });

               $('#btn_reset').on('click', function() {
                    $('.reset').val('');
                    $('.search_row').remove();
               });

               $('#btn_barcode').on('click', function() {
                    $('#lodaing').modal('show');
                    var url = '<?php echo e(url("/wbsmrprintbarcode")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         receivingno: $('#receivingno').val(),
                         state: 'bulk'
                    };

                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                         $('#loading').modal('hide');
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("Please provide some values for Invoice Number or Material Receiving Number");
                    } else {
                         $.ajax({
                              url: url,
                              type: "POST",
                              data: data,
                         }).done( function(data, textStatus, jqXHR) {
                              $('#lodaing').modal('hide');
                              if (data.request_status == 'success') {
                                   $('#msg').modal('show');
                                   $('#title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                                   $('#err_msg').html(data.msg);
                                   updateIsPrinted($('#receivingno').val());
                              } else {
                                   $('#msg').modal('show');
                                   $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                                   $('#err_msg').html(data.msg);
                              }
                              
                         }).fail( function(data, textStatus, jqXHR) {
                              $('#loading').modal('hide');
                              $('#msg').modal('show');
                              $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                              $('#err_msg').html("There's some error while processing.");
                         });
                    }
               });

               $('#tbl_batch_body').on('click', '.barcode_item_batch', function(e) {
                    $('#lodaing').modal('show');
                    var url = '<?php echo e(url("/wbsmrprintbarcode")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         receivingno: $('#receivingno').val(),
                         id: $(this).attr('data-id'),
                         state: 'single'
                    };

                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                         $('#loading').modal('hide');
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("Please provide some values for Invoice Number or Material Receiving Number");
                    } else {
                         $.ajax({
                              url: url,
                              type: "POST",
                              data: data,
                         }).done( function(data, textStatus, jqXHR) {
                              $('#lodaing').modal('hide');
                              if (data.request_status == 'success') {
                                   $('#msg').modal('show');
                                   $('#title').html('<strong><i class="fa fa-check"></i></strong> Success!')
                                   $('#err_msg').html(data.msg);
                                   updateIsPrinted($('#receivingno').val());
                              } else {
                                   $('#msg').modal('show');
                                   $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                                   $('#err_msg').html(data.msg);
                              }
                              
                         }).fail( function(data, textStatus, jqXHR) {
                              $('#loading').modal('hide');
                              $('#msg').modal('show');
                              $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                              $('#err_msg').html("There's some error while processing.");
                         });
                    }
               });

               $('#checkbox_iqc').on('change', function(e) {
                    $('input:checkbox.iqc_chk').not(this).prop('checked', this.checked);
               });

               $('#btn_print').on('click', function() {
                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("Please provide some values for Invoice Number or Material Receiving Number");
                    } else {
                         var token = "<?php echo e(Session::token()); ?>";
                         var url = '<?php echo e(url("/wbsmrprintmr")); ?>'+'?receivingno='+$('#receivingno').val()+'&&_token='+token;

                         window.location.href= url;
                    }

               });

               $('#btn_print_iqc').on('click', function() {
                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("Please provide some values for Invoice Number or Material Receiving Number");
                    } else {
                         var token = "<?php echo e(Session::token()); ?>";
                         var url = '<?php echo e(url("/wbsmrprintiqc")); ?>'+'?receivingno='+$('#receivingno').val()+'&&_token='+token;

                         window.location.href= url;
                    }
               });

               $('#btn_delete_batch').on('click', function() {
                    if (isCheck($('.chk_del_batch'))) {
                         $('#loading').modal('show');
                         /* declare an checkbox array */
                         var id = [];
                         var qty = [];
                         var item = [];

                         /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
                         $(".chk_del_batch:checked").each(function() {
                              id.push($(this).val());
                              qty.push($(this).attr('data-qty'));
                              item.push($(this).attr('data-item'));
                         });


                         // $.each(chkArray, function(i,val) {
                              
                         // });
                         
                         $('.details_remove').remove();
                         $('.summary_remove').remove();
                         $('.batch_remove').remove();
                         
                         var tbl_details = '';
                         var tbl_summary = '';
                         var tbl_batch = '';
                         var url = '<?php echo e(url("/wbsmrdeletebatch")); ?>';
                         var token = "<?php echo e(Session::token()); ?>";
                         var data = {
                              _token: token,
                              receivingno: $('#receivingno').val(),
                              ids: id,
                              qtys: qty,
                              items: item
                         };

                         $.ajax({
                              url: url,
                              type: "POST",
                              data: data,
                         }).done( function(data, textStatus, jqXHR) {
                              var checked = '';
                              if (data.request_status == 'success') {
                                   var invdata = data.invoicedata;
                                   var status = '';
                                   if (invdata.status == 'O') {
                                        status = 'Open';
                                   } else {
                                        status = 'Closed';
                                   }
                                   $('#loading').modal('hide');
                                   $('#receivingno').val(invdata.receive_no);
                                   $('#receivingdate').val(invdata.receive_date);
                                   $('#invoiceno').val(invdata.invoice_no);
                                   $('#hdninvoiceno').val(invdata.invoice_no);
                                   $('#invoicedate').val(invdata.invoice_date);
                                   $('#palletno').val(invdata.pallet_no);
                                   $('#totalqty').val(invdata.total_qty);
                                   $('#totalvar').val(invdata.total_var);
                                   $('#status').val(status);
                                   $('#createdby').val(invdata.create_user);
                                   $('#createddate').val(invdata.created_at);
                                   $('#updatedby').val(invdata.update_user);
                                   $('#updateddate').val(invdata.updated_at);

                                   $.each(data.detailsdata, function(index, x) {
                                        tbl_details = '<tr class="details_remove">'+
                                                            '<td>'+x.item+'</td>'+
                                                            '<td>'+x.item_desc+'</td>'+
                                                            '<td>'+x.qty+'</td>'+
                                                            '<td>'+x.pr_no+'</td>'+
                                                            '<td>'+x.unit_price+'</td>'+
                                                            '<td>'+x.amount+'</td>'+
                                                       '</tr>';
                                        $('#tbl_details_body').append(tbl_details);
                                   });

                                   $.each(data.summarydata, function(index, x) {
                                        if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC') {
                                             checked = 'checked="checked"';
                                        }
                                        tbl_summary = '<tr class="summary_remove">'+
                                                            '<td>'+x.item+
                                                                 '<input type="hidden" name="item[]" value"'+x.item+'" />'+
                                                            '</td>'+
                                                            '<td>'+x.item_desc+
                                                                 '<input type="hidden" name="item_desc[]" value"'+x.item_desc+'" />'+
                                                            '</td>'+
                                                            '<td>'+x.qty+
                                                                 '<input type="hidden" name="qty[]" value"'+x.qty+'" />'+
                                                            '</td>'+
                                                            '<td>'+x.received_qty+
                                                                 '<input type="hidden" name="received_qty[]" value"'+x.received_qty+'" />'+
                                                            '</td>'+
                                                            '<td>'+x.variance+
                                                                 '<input type="hidden" name="variance[]" value"'+x.variance+'" />'+
                                                            '</td>'+
                                                            '<td>'+
                                                                 '<input type="checkbox" name="iqc[]" class="iqc_chk" '+checked+' value="1"/>'+
                                                            '</td>'+
                                                       '</tr>';
                                        $('#tbl_summary_body').append(tbl_summary);
                                   });

                                   var cnt = 0;
                                   var checked_kit = '';
                                   var checked_print = '';
                                   $.each(data.batchdata, function(index, x) {
                                        if (x.for_kitting == 1) {
                                             checked_kit = 'checked="checked"';
                                        }
                                        if (x.is_printed == 1) {
                                             checked_print = 'checked="checked"';
                                        }
                                        cnt++;
                                        tbl_batch = '<tr class="batch_remove">'+
                                                            '<td>'+
                                                                 '<input type="checkbox" name="del_batch" disabled="disabled" class="chk_del_batch" data-qty="'+x.qty+'" data-item="'+x.item+'" value="'+x.id+'">'+
                                                            '</td>'+
                                                            '<td>'+
                                                                 '<a href="javascript:;" class="btn input-sm blue edit_item_batch" disabled="disabled" data-id="'+x.id+'">'+
                                                                      '<i class="fa fa-edit"></i>'+
                                                                 '<a>'+
                                                            '</td>'+
                                                            '<td>'+cnt+'</td>'+
                                                            '<td>'+x.item+
                                                                 '<input type="hidden" name="item_batch[]" value="'+x.item+'">'+
                                                            '</td>'+
                                                            '<td>'+x.item_desc+
                                                                 '<input type="hidden" name="item_desc_batch[]" value="'+x.item_desc+'">'+
                                                            '</td>'+
                                                            '<td>'+x.qty+
                                                                 '<input type="hidden" name="qty_batch[]" value="'+x.qty+'">'+
                                                            '</td>'+
                                                            '<td>'+x.box+
                                                                 '<input type="hidden" name="box_batch[]" value="'+x.box+'">'+
                                                            '</td>'+
                                                            '<td>'+x.box_qty+
                                                                 '<input type="hidden" name="box_qty_batch[]" value="'+x.qty+'">'+
                                                            '</td>'+
                                                            '<td>'+x.lot_no+
                                                                 '<input type="hidden" name="lot_no_batch[]" value="'+x.lot_no+'">'+
                                                            '</td>'+
                                                            '<td>'+x.location+
                                                                 '<input type="hidden" name="location_batch[]" value="'+x.location+'">'+
                                                            '</td>'+
                                                            '<td>'+x.supplier+
                                                                 '<input type="hidden" name="supplier_batch[]" value="'+x.supplier+'">'+
                                                            '</td>'+
                                                            '<td>'+
                                                                 '<input type="checkbox" name="iqc_batch[]" value="'+x.for_kitting+'" '+checked_kit+'>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                 '<input type="checkbox" name="print_batch[]" value="'+x.is_printed+'" '+checked_print+'>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                 '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-id="'+x.id+'">'+
                                                                      '<i class="fa fa-barcode"></i>'+
                                                                 '<a>'+
                                                            '</td>'+
                                                       '</tr>';
                                        $('#tbl_batch_body').append(tbl_batch);
                                   
                              });
                              } else {
                                   $('#msg').modal('show');
                                   $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                                   $('#err_msg').html(data.msg);

                                   EditState();
                                   $('#loading').modal('hide');
                              }
                         }).fail( function(data, textStatus, jqXHR) {
                              $('#loading').modal('hide');
                              $('#msg').modal('show');
                              $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                              $('#err_msg').html("There's some error while processing.");
                         });
                    } else {
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html("Please select at least 1 batched item.");
                    }
               });

               $('#add_inputItemNo').on('change', function() {
                    getItemData();
               });
               
               // $('#btn_save').on('click', function() {
               //      var status = getMRStatus($('#status').val());
               //      var url = '<?php echo e(url("/wbsmrsave")); ?>';
               //      var token = "<?php echo e(Session::token()); ?>";
               //      var data = {
               //           _token: token,
               //           savestate: $('#savestate').val(),
               //           receive_no: $('#receivingno').val(),
               //           receive_date: $('#receivingdate').val(),
               //           invoice_no: $('#invoiceno').val(),
               //           invoice_date: $('#invoicedate').val(),
               //           pallet_no: $('#palletno').val(),
               //           total_qty: $('#totalqty').val(),
               //           total_var: $('#totalvar').val(),
               //           status: status,
               //           create_user: $('#createdby').val(),
               //           created_at: $('#createddate').val(),
               //           update_user: $('#updatedby').val(),
               //           updated_at: $('#updateddate').val(),
               //      };

               //      $.ajax({
               //           url: url,
               //           type: "POST",
               //           data: data,
               //      }).done( function(data, textStatus, jqXHR) {
                         
               //      }).fail( function(data, textStatus, jqXHR) {
               //           $('#loading').modal('hide');
               //           $('#msg').modal('show');
               //           $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
               //           $('#err_msg').html("There's some error while processing.");
               //      });
               // });
          });

          function AddState() {
               $('.chk_del_batch').prop('disabled', false);
               $('.edit_item_batch').removeAttr('disabled');
               $('#btn_add_batch').prop('disabled', true);
               $('#btn_delete_batch').prop('disabled', true);

               $('#btn_edit').hide();
               $('#btn_discard').hide();
               $('#btn_search').hide();
               $('#btn_barcode').hide();
               $('#btn_print').hide();
               $('#btn_print_iqc').hide();
               $('#btn_save').show();
               $('#btn_cancel').show();

               $('.chk_del_batch').prop('disabled', false);
               $('.edit_item_batch').removeAttr('disabled');
               $('#btn_add_batch').prop('disabled', false);
               $('#btn_delete_batch').prop('disabled', false);
          }

          function ViewState() {
               clear();
               $('#receivingno').prop('disabled', false);
               $('#palletno').prop('disabled', true);
               $('#invoiceno').prop('disabled', false);
               $('#receivingdate').prop('disabled', true);

               // $('.chk_del_batch').prop('disabled', true);
               // $('.edit_item_batch').prop('disabled', true);
               $('#btn_add_batch').prop('disabled', true);
               $('#btn_delete_batch').prop('disabled', true);

               $('#btn_save').hide();
               $('#btn_cancel').hide();
               $('#btn_discard').hide();
               $('#btn_edit').show();
               $('#btn_search').show();
               $('#btn_barcode').show();
               $('#btn_print').show();
               $('#btn_print_iqc').show();

               getLatestRecord();
          }

          function EditState() {
               $('#btn_edit').hide();
               $('#btn_cancel').hide();
               $('#btn_search').hide();
               $('#btn_barcode').hide();
               $('#btn_print').hide();
               $('#btn_print_iqc').hide();
               $('#btn_save').show();
               $('#btn_discard').show();
               $('.chk_del_batch').prop('disabled', false);
               $('.edit_item_batch').removeAttr('disabled');
               $('#btn_add_batch').prop('disabled', false);
               $('#btn_delete_batch').prop('disabled', false);
          }

          function clear() {
               $('.clear').val('');
          }

          function getLatestRecord() {
               $('.details_remove').remove();
               $('.summary_remove').remove();
               $('.batch_remove').remove();
               
               var tbl_details = '';
               var tbl_summary = '';
               var tbl_batch = '';

               $('#loading').modal('show');
               var url = '<?php echo e(url("/wbsgetlatestmr")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    invoiceno: $('#invoiceno').text()
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    var checked = '';
                    if (data.request_status == 'success') {
                         var invdata = data.invoicedata;
                         var status = '';
                         if (invdata.status == 'O') {
                              status = 'Open';
                         } 
                         if (invdata.status == 'X') {
                              status = 'Closed';
                         }

                         if (invdata.status == 'C') {
                              status = 'Cancelled';
                         }
                         $('#loading').modal('hide');
                         $('#receivingno').val(invdata.receive_no);
                         $('#receivingdate').val(invdata.receive_date);
                         $('#invoiceno').val(invdata.invoice_no);
                         $('#hdninvoiceno').val(invdata.invoice_no);
                         $('#invoicedate').val(invdata.invoice_date);
                         $('#palletno').val(invdata.pallet_no);
                         $('#totalqty').val(invdata.total_qty);
                         $('#totalvar').val(invdata.total_var);
                         $('#status').val(status);
                         $('#createdby').val(invdata.create_user);
                         $('#createddate').val(invdata.created_at);
                         $('#updatedby').val(invdata.update_user);
                         $('#updateddate').val(invdata.updated_at);

                         $.each(data.detailsdata, function(index, x) {
                              tbl_details = '<tr class="details_remove">'+
                                                  '<td>'+x.item+'</td>'+
                                                  '<td>'+x.item_desc+'</td>'+
                                                  '<td>'+x.qty+'</td>'+
                                                  '<td>'+x.pr_no+'</td>'+
                                                  '<td>'+x.unit_price+'</td>'+
                                                  '<td>'+x.amount+'</td>'+
                                             '</tr>';
                              $('#tbl_details_body').append(tbl_details);
                         });

                         $.each(data.summarydata, function(index, x) {
                              if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC') {
                                   checked = 'checked="checked"';
                              }
                              tbl_summary = '<tr class="summary_remove">'+
                                                  '<td>'+x.item+
                                                       '<input type="hidden" name="item[]" value"'+x.item+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.item_desc+
                                                       '<input type="hidden" name="item_desc[]" value"'+x.item_desc+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.qty+
                                                       '<input type="hidden" name="qty[]" value"'+x.qty+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.received_qty+
                                                       '<input type="hidden" name="received_qty[]" value"'+x.received_qty+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.variance+
                                                       '<input type="hidden" name="variance[]" value"'+x.variance+'" />'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="iqc[]" class="iqc_chk" '+checked+' value="1"/>'+
                                                  '</td>'+
                                             '</tr>';
                              $('#tbl_summary_body').append(tbl_summary);
                         });
                         var cnt = 0;
                         var checked_kit = '';
                         var checked_print = '';
                         $.each(data.batchdata, function(index, x) {
                              var checked_kit = '';
                              var checked_print = '';
                              if (x.for_kitting == 1) {
                                   checked_kit = 'checked="checked"';
                              }
                              if (x.is_printed == 1) {
                                   checked_print = 'checked="checked"';
                              }
                              cnt++;
                              tbl_batch = '<tr class="batch_remove">'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="del_batch" disabled="disabled" class="chk_del_batch" data-qty="'+x.qty+'" data-item="'+x.item+'" value="'+x.id+'">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<a href="javascript:;" class="btn input-sm blue edit_item_batch" disabled="disabled" data-id="'+x.id+'">'+
                                                            '<i class="fa fa-edit"></i>'+
                                                       '<a>'+
                                                  '</td>'+
                                                  '<td>'+cnt+'</td>'+
                                                  '<td>'+x.item+
                                                       '<input type="hidden" name="item_batch[]" value="'+x.item+'">'+
                                                  '</td>'+
                                                  '<td>'+x.item_desc+
                                                       '<input type="hidden" name="item_desc_batch[]" value="'+x.item_desc+'">'+
                                                  '</td>'+
                                                  '<td>'+x.qty+
                                                       '<input type="hidden" name="qty_batch[]" value="'+x.qty+'">'+
                                                  '</td>'+
                                                  '<td>'+x.box+
                                                       '<input type="hidden" name="box_batch[]" value="'+x.box+'">'+
                                                  '</td>'+
                                                  '<td>'+x.box_qty+
                                                       '<input type="hidden" name="box_qty_batch[]" value="'+x.qty+'">'+
                                                  '</td>'+
                                                  '<td>'+x.lot_no+
                                                       '<input type="hidden" name="lot_no_batch[]" value="'+x.lot_no+'">'+
                                                  '</td>'+
                                                  '<td>'+x.location+
                                                       '<input type="hidden" name="location_batch[]" value="'+x.location+'">'+
                                                  '</td>'+
                                                  '<td>'+x.supplier+
                                                       '<input type="hidden" name="supplier_batch[]" value="'+x.supplier+'">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="iqc_batch[]" value="'+x.for_kitting+'" '+checked_kit+' disabled="disabled">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="print_batch[]" value="'+x.is_printed+'" '+checked_print+' disabled="disabled">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-id="'+x.id+'">'+
                                                            '<i class="fa fa-barcode"></i>'+
                                                       '<a>'+
                                                  '</td>'+
                                             '</tr>';
                              $('#tbl_batch_body').append(tbl_batch);
                              
                         });
                    } else {
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html(data.msg);

                         //ViewState();
                         $('#loading').modal('hide');
                    }
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("There's some error while processing.");
               });
          }

          function navigate(to) {
               $('.details_remove').remove();
               $('.summary_remove').remove();
               $('.batch_remove').remove();
               
               var tbl_details = '';
               var tbl_summary = '';
               var tbl_batch = '';

               $('#loading').modal('show');
               var url = '<?php echo e(url("/wbsnavigate")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    receivingno: $('#receivingno').val(),
                    to: to
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    var checked = '';
                    if (data.request_status == 'success') {
                         var invdata = data.invoicedata;
                         var status = '';
                         if (invdata.status == 'O') {
                              status = 'Open';
                         } 
                         if (invdata.status == 'X') {
                              status = 'Closed';
                         }

                         if (invdata.status == 'C') {
                              status = 'Cancelled';
                         }
                         $('#loading').modal('hide');
                         $('#receivingno').val(invdata.receive_no);
                         $('#receivingdate').val(invdata.receive_date);
                         $('#invoiceno').val(invdata.invoice_no);
                         $('#hdninvoiceno').val(invdata.invoice_no);
                         $('#invoicedate').val(invdata.invoice_date);
                         $('#palletno').val(invdata.pallet_no);
                         $('#totalqty').val(invdata.total_qty);
                         $('#totalvar').val(invdata.total_var);
                         $('#status').val(status);
                         $('#createdby').val(invdata.create_user);
                         $('#createddate').val(invdata.created_at);
                         $('#updatedby').val(invdata.update_user);
                         $('#updateddate').val(invdata.updated_at);

                         $.each(data.detailsdata, function(index, x) {
                              tbl_details = '<tr class="details_remove">'+
                                                  '<td>'+x.item+'</td>'+
                                                  '<td>'+x.item_desc+'</td>'+
                                                  '<td>'+x.qty+'</td>'+
                                                  '<td>'+x.pr_no+'</td>'+
                                                  '<td>'+x.unit_price+'</td>'+
                                                  '<td>'+x.amount+'</td>'+
                                             '</tr>';
                              $('#tbl_details_body').append(tbl_details);
                         });

                         $.each(data.summarydata, function(index, x) {
                              if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC') {
                                   checked = 'checked="checked"';
                              }
                              tbl_summary = '<tr class="summary_remove">'+
                                                  '<td>'+x.item+
                                                       '<input type="hidden" name="item[]" value"'+x.item+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.item_desc+
                                                       '<input type="hidden" name="item_desc[]" value"'+x.item_desc+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.qty+
                                                       '<input type="hidden" name="qty[]" value"'+x.qty+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.received_qty+
                                                       '<input type="hidden" name="received_qty[]" value"'+x.received_qty+'" />'+
                                                  '</td>'+
                                                  '<td>'+x.variance+
                                                       '<input type="hidden" name="variance[]" value"'+x.variance+'" />'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="iqc[]" class="iqc_chk" '+checked+' value="1"/>'+
                                                  '</td>'+
                                             '</tr>';
                              $('#tbl_summary_body').append(tbl_summary);
                         });

                         var cnt = 0;
                         $.each(data.batchdata, function(index, x) {
                              var checked_kit = '';
                              var checked_print = '';
                              if (x.for_kitting == 1) {
                                   checked_kit = 'checked="checked"';
                              }
                              if (x.is_printed == 1) {
                                   checked_print = 'checked="checked"';
                              }
                              cnt++;
                              tbl_batch = '<tr class="batch_remove">'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="del_batch" disabled="disabled" class="chk_del_batch" data-qty="'+x.qty+'" data-item="'+x.item+'" value="'+x.id+'">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<a href="javascript:;" class="btn input-sm blue edit_item_batch" disabled="disabled" data-id="'+x.id+'">'+
                                                            '<i class="fa fa-edit"></i>'+
                                                       '<a>'+
                                                  '</td>'+
                                                  '<td>'+cnt+'</td>'+
                                                  '<td>'+x.item+
                                                       '<input type="hidden" name="item_batch[]" value="'+x.item+'">'+
                                                  '</td>'+
                                                  '<td>'+x.item_desc+
                                                       '<input type="hidden" name="item_desc_batch[]" value="'+x.item_desc+'">'+
                                                  '</td>'+
                                                  '<td>'+x.qty+
                                                       '<input type="hidden" name="qty_batch[]" value="'+x.qty+'">'+
                                                  '</td>'+
                                                  '<td>'+x.box+
                                                       '<input type="hidden" name="box_batch[]" value="'+x.box+'">'+
                                                  '</td>'+
                                                  '<td>'+x.box_qty+
                                                       '<input type="hidden" name="box_qty_batch[]" value="'+x.qty+'">'+
                                                  '</td>'+
                                                  '<td>'+x.lot_no+
                                                       '<input type="hidden" name="lot_no_batch[]" value="'+x.lot_no+'">'+
                                                  '</td>'+
                                                  '<td>'+x.location+
                                                       '<input type="hidden" name="location_batch[]" value="'+x.location+'">'+
                                                  '</td>'+
                                                  '<td>'+x.supplier+
                                                       '<input type="hidden" name="supplier_batch[]" value="'+x.supplier+'">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="iqc_batch[]" value="'+x.for_kitting+'" '+checked_kit+' disabled="disabled">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<input type="checkbox" name="print_batch[]" value="'+x.is_printed+'" '+checked_print+' disabled="disabled">'+
                                                  '</td>'+
                                                  '<td>'+
                                                       '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-id="'+x.id+'">'+
                                                            '<i class="fa fa-barcode"></i>'+
                                                       '<a>'+
                                                  '</td>'+
                                             '</tr>';
                              $('#tbl_batch_body').append(tbl_batch);
                              
                         });
                    } else {
                         $('#msg').modal('show');
                         $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                         $('#err_msg').html(data.msg);

                         ViewState();
                         $('#loading').modal('hide');
                    }
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("There's some error while processing.");
               });
          }

          function updateIsPrinted(receivingno) {
               $('.batch_remove').remove();
               var tbl_batch = '';
               var url = '<?php echo e(url("/wbsmrupdateisprinted")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    receivingno: receivingno
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    var cnt = 0;
                    $.each(data.batchdata, function(index, x) {
                         var checked_kit = '';
                         var checked_print = '';
                         if (x.for_kitting == 1) {
                              checked_kit = 'checked="checked"';
                         }
                         if (x.is_printed == 1) {
                              checked_print = 'checked="checked"';
                         }
                         cnt++;
                         tbl_batch = '<tr class="batch_remove">'+
                                             '<td>'+
                                                  '<input type="checkbox" name="del_batch" disabled="disabled" class="chk_del_batch" data-qty="'+x.qty+'" data-item="'+x.item+'" value="'+x.id+'">'+
                                             '</td>'+
                                             '<td>'+
                                                  '<a href="javascript:;" class="btn input-sm blue edit_item_batch" disabled="disabled" data-id="'+x.id+'">'+
                                                       '<i class="fa fa-edit"></i>'+
                                                  '<a>'+
                                             '</td>'+
                                             '<td>'+cnt+'</td>'+
                                             '<td>'+x.item+
                                                  '<input type="hidden" name="item_batch[]" value="'+x.item+'">'+
                                             '</td>'+
                                             '<td>'+x.item_desc+
                                                  '<input type="hidden" name="item_desc_batch[]" value="'+x.item_desc+'">'+
                                             '</td>'+
                                             '<td>'+x.qty+
                                                  '<input type="hidden" name="qty_batch[]" value="'+x.qty+'">'+
                                             '</td>'+
                                             '<td>'+x.box+
                                                  '<input type="hidden" name="box_batch[]" value="'+x.box+'">'+
                                             '</td>'+
                                             '<td>'+x.box_qty+
                                                  '<input type="hidden" name="box_qty_batch[]" value="'+x.qty+'">'+
                                             '</td>'+
                                             '<td>'+x.lot_no+
                                                  '<input type="hidden" name="lot_no_batch[]" value="'+x.lot_no+'">'+
                                             '</td>'+
                                             '<td>'+x.location+
                                                  '<input type="hidden" name="location_batch[]" value="'+x.location+'">'+
                                             '</td>'+
                                             '<td>'+x.supplier+
                                                  '<input type="hidden" name="supplier_batch[]" value="'+x.supplier+'">'+
                                             '</td>'+
                                             '<td>'+
                                                  '<input type="checkbox" name="iqc_batch[]" value="'+x.for_kitting+'" '+checked_kit+' disabled="disabled">'+
                                             '</td>'+
                                             '<td>'+
                                                  '<input type="checkbox" name="print_batch[]" value="'+x.is_printed+'" '+checked_print+' disabled="disabled">'+
                                             '</td>'+
                                             '<td>'+
                                                  '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-id="'+x.id+'">'+
                                                       '<i class="fa fa-barcode"></i>'+
                                                  '<a>'+
                                             '</td>'+
                                        '</tr>';
                         $('#tbl_batch_body').append(tbl_batch);
                    });
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("There's some error while processing.");
               });
          }

          function isCheck(element) {
               if(element.is(':checked')) {
                    return true;
               } else {
                    return false;
               }
          }

          function getMRStatus(status) {
               if (status == 'Open') {
                    return 'O'
               }

               if (status == 'Cancelled') {
                    return 'C'
               }

               if (status == 'Closed') {
                    return 'X'
               }
          }

          function getItems() {
               var url = "<?php echo e(url('/wbsmrgetitems')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    invoice_no: $('#invoiceno').val()
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    $('#add_inputItemNo').select2({
                         data: data
                    });
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("There's some error while processing.");
               });
          }

          function getItemData() {
               //add_inputLocation
               var url = "<?php echo e(url('/wbsmrgetitemdata')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    itemcode: $('#add_inputItemNo').val(),
                    invoice_no: $('#invoiceno').val()
               };
               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    console.log(data);
                    var itemname = '';
                    var rackno = '';
                    $.each(data, function(i,x) {
                         itemname = x.name;
                         rackno = x.rackno;
                    });
                    $('#add_inputItemDesc').val(itemname);
                    $('#add_inputLocation').val(rackno);
               }).fail( function(data, textStatus, jqXHR) {
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!');
                    $('#err_msg').html("There's some error while processing.");
               });
          }

          function getPackage() {
               var url = "<?php echo e(url('/wbsmrgetpackage')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    $('#add_inputBox').select2({
                         data: data
                    });
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    $('#msg').modal('show');
                    $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
                    $('#err_msg').html("There's some error while processing.");
               });
          }

     </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>