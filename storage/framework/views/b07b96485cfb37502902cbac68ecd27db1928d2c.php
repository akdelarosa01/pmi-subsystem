
    
<?php $__env->startSection('title'); ?>
     Yield Performance | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

     <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php $state = ""; $readonly = ""; ?>
     <?php foreach($userProgramAccess as $access): ?>
          <?php if($access->program_code == Config::get('constants.MODULE_CODE_YLDPRFMNCE')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
                                             <i class="fa fa-navicon"></i>  Yield Performance
                                        </div>
                                        <div class="tools">
                                             <button href="javascript:;" onclick="window.history.back();" class="btn btn-sm red">Back</button>
                                        </div>
                                   </div>

                                   <div class="portlet-body">
                                        
                                       <div class="row">
                                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="row col-sm-12">
                                                       <form>
                                                            <?php echo csrf_field(); ?>

                                                            <div class="col-sm-4">
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-3" style="font-size:12px">Control No</label>
                                                                      <div class="col-sm-6">
                                                                           <input class="form-control input-sm" size="16" type="hidden" value="<?php echo $count; ?>" name="hdyieldingno" id="hdyieldingno" />
                                                                           <input placeholder="Search by Control#/PO#" class="form-control input-sm" size="16" type="text"  name="yieldingno" id="yieldingno" />  
                                                                      </div>
                                                                    
                                                                 </div> 
                                                                 <form>
                                                                 <?php echo e(csrf_field()); ?>

                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-3" style="font-size:12px">PO No.</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" value="<?php foreach($msrecords as $msrec): ?><?php echo e($msrec->PO); ?><?php endforeach; ?>" class="form-control input-sm" id="pono" name="pono"/>
                                                                           <div id="er1"></div>
                                                                      </div>
                                                                      <div class="col-sm-3">
                                                                           <button type="button" onclick="javascript:searchpo();" name="search-task"  class="btn btn-circle input-sm green load-task"  id="btnload">
                                                                           <i class="fa fa-arrow-circle-down"></i> 
                                                                           </button>
                                                                      </div>                                                           
                                                                 </div>
                                                                 </form>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-3" style="font-size:12px">PO Qty</label>
                                                                      <div class="col-sm-6">
                                                                           
                                                                           <input class="form-control input-sm" size="16" type="text" name="poqty" value="<?php foreach($msrecords as $msrec): ?><?php echo e($msrec->POqty); ?> <?php endforeach; ?>" id="poqty" disabled="disabled"/>   
                                                                      </div>
                                                                 </div> 
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-3" style="font-size:12px">Device</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="device" name="device" value="<?php foreach($msrecords as $msrec): ?><?php echo e($msrec->devicename); ?><?php endforeach; ?>" disabled="disabled"/>   
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-3" style="font-size:12px">Family</label>
                                                                      <div class="col-sm-6">
                                                                           <Select class="form-control" id="family" name="family">
                                                                           <option value=""></option>
                                                                           <?php foreach($family as $fam): ?>
                                                                           <option value="<?php echo e($fam->description); ?>"><?php echo e($fam->description); ?></option>
                                                                           <?php endforeach; ?>
                                                                           </Select>
                                                                           <div id="er2"></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-3" style="font-size:12px">Series</label>
                                                                      <div class="col-sm-6">
                                                                           <Select class="form-control" id="series" name="series" required>
                                                                           <option value=""></option>
                                                                           <?php foreach($series as $serie): ?>
                                                                           <option value="<?php echo e($serie->description); ?>"><?php echo e($serie->description); ?>

                                                                           </option>
                                                                           <?php endforeach; ?>
                                                                           </Select>
                                                                           <div id="er3"></div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Production Date</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="productiondate" name="productiondate" disabled="disabled" />
                                                                      </div>
                                                                      
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Yielding Station</label>
                                                                      <div class="col-sm-6">
                                                                           <Select class="form-control" id="yieldingstation" name="yieldingstation">
                                                                           <option value=""></option>
                                                                           <?php foreach($yieldstation as $ys): ?>
                                                                           <option value="<?php echo e($ys->description); ?>"><?php echo e($ys->description); ?>

                                                                           </option>
                                                                            <?php endforeach; ?>
                                                                           </Select>
                                                                           <div id="er6"></div>
                                                                          
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Accumulated Output</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="accumulatedoutput" name="accumulatedoutput" />
                                                                           <div id="er7"></div>
                                                                      </div>
                                                                       <div class="col-sm-2">
                                                                           <button type="button" onclick="javascript:addpya();" name="search-task"  class="btn btn-circle input-sm green load-task"  id="btnload">
                                                                           <i class="fa fa-plus"></i> 
                                                                           </button>
                                                                      </div>     
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Classification</label>
                                                                      <div class="col-sm-6">
                                                                           <Select class="form-control" id="classification" name="classification">
                                                                           <option value=""></option>
                                                                           <?php foreach($category as $cat): ?>
                                                                           <option value="<?php echo e($cat->description); ?>"><?php echo e($cat->description); ?>

                                                                           </option>
                                                                           <?php endforeach; ?>
                                                                           </Select>
                                                                           <div id="er4"></div>
                                                                      </div>   
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Mode of Defect</label>
                                                                      <div class="col-sm-6">
                                                                           <Select class="form-control mod" id="mod" name="mod">
                                                                           <option></option>
                                                                           <?php foreach($modefect as $cat): ?>
                                                                           <option  value="<?php echo e($cat->description); ?>">
                                                                           <?php echo e($cat->description); ?>

                                                                           </option>
                                                                           <?php endforeach; ?>
                                                                           </Select>
                                                                           <div id="er5"></div>
                                                                      </div>   
                                                                 </div>

                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Qty</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="qty" name="qty" />
                                                                      </div>
                                                                      <div class="col-sm-2">
                                                                           <button type="button" onclick="javascript:addcmq();" name="search-task"  class="btn btn-circle input-sm green load-task"  id="btnload">
                                                                           <i class="fa fa-plus"></i> 
                                                                           </button>
                                                                      </div>       
                                                                 </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Total Output</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="toutput" name="toutput"  disabled="disabled" />
                                                                           <div id="er8"></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Total Reject</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="treject" name="treject"/>
                                                                           <div id="er9"></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Total MNG</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="tmng" name="tmng"  disabled="disabled" />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Total PNG</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="tpng" name="tpng"  disabled="disabled" />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">% Yield w/o MNG</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="ywomng" name="ywomng" disabled="disabled"  />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px">Total w/o Yield</label>
                                                                      <div class="col-sm-6">
                                                                           <input type="text" class="form-control input-sm" id="ttwoyield" name="twoyield"  disabled="disabled" />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-sm-4" style="font-size:12px"></label>
                                                                      <div class="col-sm-6">
                                                                            <button type="button" style="font-size:12px;" onclick="javascript:save();" class="btn green input-sm" id="btnsave">
                                                                                <i class="fa fa-save"></i> Save
                                                                           </button>
                                                                      </div>
                                                                 </div>   
                                                            </div>


                                                       </form>   
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-sm-6">
                                                            <label class="control-label col-sm-12" style="font-size:12px">
                                                                 <h4>Table for (Production Date,Yielding Station and Accumulated Data)</h4>
                                                            </label>
                                                       </div>
                                                       <div class="col-sm-6">
                                                             <label class="control-label col-sm-12" style="font-size:12px">
                                                                 <h4>Table for (Classification,Mode of Defect/s and Quantity)
                                                                 </h4>
                                                            </label>
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-sm-6">
                                                            <div class="scroller" style="height: 300px">
                                                                 <table id="results1" class="table table-striped table-bordered table-hover"style="font-size:13px">
                                                                      <thead id="thead1">
                                                                           <tr>
                                                                                <th class="table-checkbox" style="width: 5%">
                                                                                     <input type="checkbox" class="group-checkable checkAllitemsPYA" name="checkAllitemPYA" data-set="#sample_3 .checkboxes"/>
                                                                                </th>
                                                                                <th>Purchase Order</th>
                                                                                <th>Production Date</th>
                                                                                <th>Yielding Station</th>
                                                                                <th>Accumulated Output</th>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody id="tbody1">
                                                                           <?php foreach($fieldpya as $rec): ?>
                                                                           <tr>                   
                                                                                <td style="width: 2%">
                                                                                  <input type="checkbox" class="form-control input-sm checkboxesPYA" value="<?php echo e($rec->id); ?>" name="checkitemPYA" id="checkitemPYA">
                                                                                  </input> 
                                                                                  <input type="hidden" value="<?php echo e($rec->id. '|' .$rec->pono. '|' .$rec->productiondate. '|' .$rec->yieldingstation. '|' .$rec->accumulatedoutput); ?>" class="form-control input-sm" id="hdpya" name="hdpya"  disabled="disabled" />
                                                                                </td> 
                                                                                <td><?php echo e($rec->pono); ?></td>
                                                                                <td><?php echo e($rec->productiondate); ?></td>
                                                                                <td><?php echo e($rec->yieldingstation); ?></td>
                                                                                <td><?php echo e($rec->accumulatedoutput); ?></td>
                                                                           </tr>
                                                                           <?php endforeach; ?>
                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                            <button style="margin-top: 20px;" type="button" onclick="javascript:deletepya();" name="delete-taskPYA" class="btn btn-mg btn-danger delete-taskPYA" id="delete-taskPYA">Delete
                                                                 <i class="fa fa-trash"></i> 
                                                            
                                                            </button>
                                                       </div>
                                                       <div class="col-sm-6">
                                                            <div class="scroller" style="height: 300px">
                                                                 <table id="results2" class="table table-striped table-bordered table-hover" style="font-size:13px">
                                                                      <thead id="thead2">
                                                                           <tr>
                                                                                <th class="table-checkbox" style="width: 5%">
                                                                                     <input type="checkbox" class="group-checkable checkAllitemsCMQ" name="checkAllitemCMQ" data-set="#sample_3 .checkboxes"/>
                                                                                </th>
                                                                                <th>Purchase Order</th>
                                                                                <th>Classification</th>
                                                                                <th>Mode of Defects</th>
                                                                                <th>Quantity</th>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody id="tbody2">
                                                                           <?php foreach($fieldcmq as $rec): ?>
                                                                           <tr>                      
                                                                                <td style="width: 3%"> 
                                                                                     <input type="checkbox" class="form-control input-sm checkboxesCMQ" value="<?php echo e($rec->id); ?>" name="checkitemCMQ" id="checkitemCMQ">
                                                                                     </input>
                                                                                     <input type="hidden" value="<?php echo e($rec->id. '|' .$rec->pono. '|' .$rec->classification. '|' .$rec->mod. '|' .$rec->qty); ?>" class="form-control input-sm" id="hdcmq" name="hdcmq"  disabled="disabled" />
                                                                                </td>
                                                                                <td><?php echo e($rec->pono); ?></td>
                                                                                <td><?php echo e($rec->classification); ?></td>
                                                                                <td><?php echo e($rec->mod); ?></td>
                                                                                <td><?php echo e($rec->qty); ?></td>
                                                                           </tr>

                                                                           <?php endforeach; ?>

                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                            <button style="margin-top:20px;" type="button" onclick="javascript:deletecmq();" name="delete-taskCMQ" class="btn btn-mg btn-danger delete-taskCMQ" id="delete-taskCMQ">Delete
                                                                 <i class="fa fa-trash"></i> 
                                                            
                                                            </button>
                                                       </div>
                                                  </div>

                                                  <br>

                                                  <div class="row">
                                                       <div class="col-sm-12">
                                                            <div class="tabbable-custom">
                                                                 <ul class="nav nav-tabs nav-tabs-lg" id="tabslist" role="tablist">
                                                                      <li class="active">
                                                                           <a href="#details" data-toggle="tab" data-toggle="tab" aria-expanded="true">Details</a>
                                                                      </li>
                                                                      <li>
                                                                           <a href="#summary" data-toggle="tab" data-toggle="tab" aria-expanded="true">Summary</a>
                                                                      </li>
                                                                    
                                                                 </ul>

                                                                 <!-- Details Tab -->
                                                                 <div class="tab-content" id="tab-subcontents">
                                                                      <div class="tab-pane fade in active" id="details">
                                                                           <div class="row">
                                                                                <div class="col-sm-10 col-sm-offset-1">
                                                                                     <table class="table table-striped table-bordered table-hover" id="sample_3" style="font-size:13px">
                                                                                          <thead >
                                                                                               <tr>
                                                                                               <th class="table-checkbox" style="width: 5%">
                                                                                                    <input type="checkbox" class="group-checkable checkAllitems" name="checkAllitem" data-set="#sample_3 .checkboxes"/>

                                                                                               </th>
                                                                                               <th></th>
                                                                                               <th>Date</th>
                                                                                               <th>Yield Station</th>
                                                                                               <th>Output</th>
                                                                                               <th>Classification</th>
                                                                                               <th>MOD</th>
                                                                                               <th>Qty</th>
                                                                                               <th>PO No.</th>
                                                                                               <th>PO Qty</th>
                                                                                               <th>Device</th>
                                                                                               <th>Family</th>
                                                                                               <th>Series</th>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody>
                                                                                               <?php foreach($records as $rec): ?>
                                                                                               <tr>
                                                                                                    <td style="width: 2%">
                                                                                                      <input type="checkbox" class="form-control input-sm checkboxes" value="<?php echo e($rec->id); ?>" name="checkitem" id="checkitem"></input>
                                                                                                      
                                                                                                    </td>                        
                                                                                                    <td style="width: 3%"> 
                                                                                                    <button type="button" onclick="javascript:edit();" name="edit-task" class="btn btn-sm btn-primary edit-task" value="<?php echo e($rec->id.'|'.$rec->productiondate.'|'.$rec->yieldingstation.'|'.$rec->toutput.'|'.$rec->classification.'|'.$rec->mod.'|'.$rec->qty.'|'.$rec->pono.'|'.$rec->poqty.'|'.$rec->device.'|'.$rec->family.'|'.$rec->series.'|'.$rec->accumulatedoutput.'|'.$rec->treject.'|'.$rec->ywomng); ?>">
                                                                                                         <i class="fa fa-edit"></i> 
                                                                                                    </button>
                                                                                                    </td>
                                                                                                    <td><?php echo e($rec->productiondate); ?></td>
                                                                                                    <td><?php echo e($rec->yieldingstation); ?></td>
                                                                                                    <td><?php echo e($rec->accumulatedoutput); ?></td>
                                                                                                    <td><?php echo e($rec->classification); ?></td>
                                                                                                    <td><?php echo e($rec->mod); ?></td>
                                                                                                    <td><?php echo e($rec->qty); ?></td>
                                                                                                    <td><?php echo e($rec->pono); ?></td>
                                                                                                    <td><?php echo e($rec->poqty); ?></td>
                                                                                                    <td><?php echo e($rec->device); ?></td>
                                                                                                    <td><?php echo e($rec->family); ?></td>
                                                                                                    <td><?php echo e($rec->series); ?></td>
                                                                                               </tr>

                                                                                               <?php endforeach; ?>

                                                                                          </tbody>
                                                                                     </table>
                                                                                </div>
                                                                                <div class="col-sm-12 text-center">
                                                                                     <button type="button" style="font-size:12px;" class="btn red input-sm remove-task" id="btnremove_detail">
                                                                                          <i class="fa fa-trash remove-task"></i> Remove
                                                                                     </button>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                      <!-- Summary Tab -->
                                                                      <div class="tab-pane fade" id="summary">
                                                                           <div class="row">
                                                                                <div class="col-sm-10 col-sm-offset-1">
                                                                                     <table class="table table-striped table-bordered table-hover" id="sample_3" style="font-size:13px">
                                                                                          <thead>
                                                                                               <tr>
                                                                                                    <th>PO No.</th>
                                                                                                    <th>PO Qty</th>
                                                                                                    <th>Device Name</th>
                                                                                                    <th>Series</th>
                                                                                                    <th>Family</th>
                                                                                                    <th>Total Output</th>
                                                                                                    <th>Total Reject</th>
                                                                                                    <th>Total Yield</th>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody>
                                                                                               <?php foreach($records as $rec): ?>
                                                                                               <tr>
                                                                                                    <td><?php echo e($rec->pono); ?></td>
                                                                                                    <td><?php echo e($rec->poqty); ?></td>
                                                                                                    <td><?php echo e($rec->device); ?></td>
                                                                                                    <td><?php echo e($rec->series); ?></td>
                                                                                                    <td><?php echo e($rec->family); ?></td>
                                                                                                    <td><?php echo e($rec->toutput); ?></td>
                                                                                                    <td><?php echo e($rec->treject); ?></td>
                                                                                                    <td><?php echo e($rec->twoyield); ?></td>
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
                                                  </div>

                                                  <!-- Action Buttons -->
                                                  <form>
                                                       <?php echo csrf_field(); ?>

                                                       <div class="row">
                                                            <div class="col-sm-12 text-center">
                                                                 <button type="button" style="font-size:12px;" onclick="javascript:addnew();" class="btn green input-sm" id="btnadd">
                                                                      <i class="fa fa-plus"></i> Add New
                                                                 </button>
                                                                 <button type="button" style="font-size:12px;" onclick="javascript: setcontrol('DIS'); " class="btn red-intense input-sm" id="btndiscard">
                                                                      <i class="fa fa-pencil"></i> Discard Changes
                                                                 </button>
                                                                 <button type="button" style="font-size:12px;" class="btn blue-steel input-sm" id="btnsearch" onclick="javascript:searchrecord();">
                                                                      <i class="fa fa-search"></i> Search
                                                                 </button>
                                                                
                                                            </div>
                                                       </div>
                                                  </form>
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

     <!-- Success Message Modal -->
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

     <!--delete all modal-->
     <div id="deleteAllModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-sm gray-gallery">
          <!-- Modal content-->
               <form class="form-horizontal" id="deleteAllform" role="form" method="POST">
                    <div class="modal-content ">
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="deleteAll-title">Delete Yield Performance Details</h4>
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
                              <button class="btn btn-success" id="modaldelete" ><i class="fa fa-save"></i> Yes</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                         </div>
                    </div>
               </form>
          </div>
     </div>

     <!-- Existing Invoice Load Pop-message-->
     <div id="multisearchModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-md">
               <div class="modal-content">
                     <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="multisearch-title"></h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <?php echo csrf_field(); ?>

                              <div class="form-group row">
                                   <div class="col-sm-5 col-sm-offset-1">
                                     <label class="control-label col-sm-4" style="font-size:12px">Type</label>  
                                   </div>
                                   <div class="col-sm-5">
                                      <label class="control-label col-sm-4" style="font-size:12px">Values</label>  
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <div class="col-sm-5 col-sm-offset-1">
                                        <Select class="form-control" id="mSearchtype1" name="mSearchtype1">
                                        <option>Select One..</option>
                                        <option value="1">Yielding No</option>
                                        <option value="2">PO No.</option>
                                        <option value="3">PO Qty.</option>
                                        <option value="4">Device</option>
                                        <option value="5">Family</option>
                                        <option value="6">Series</option>
                                        <option value="7">Classification</option>
                                        <option value="8">Mode of Defect</option>
                                        <option value="9">Quantity</option>
                                        <option value="10">Production Date</option>
                                        <option value="11">Yielding Station</option>
                                        <option value="12">Accumulated Output</option>
                                        </Select>
                                   </div>
                                   <div class="col-sm-5">
                                        <Select class="form-control mSearchval1" id="mSearchval1" name="mSearchval1">
                                      
                                        </Select>  
                                   </div>
                              </div>
                             
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" onclick="javascript:multiSearchDisplay();" class="btn btn-success" id="btnmultiSearch" ><i class="fa fa-save"></i>Search</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
                    </div>
               </div>
          </div>
     </div>
    
     <!-- Existing Invoice Load Pop-message-->
     <div id="searchpoModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-sm blue">
               <div class="modal-content ">
                     <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="searchpo-title"></h4>
                    </div>
                    <div class="modal-body">
                         <h4 id="po-message"></h4>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
                    </div>
               </div>
          </div>
     </div>



     <!-- Add Modal -->
     <div class="modal fade" id="editModal" role="dialog">
         <div class="modal-dialog modal-lg">
               <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="editmodal-title"></h4>
                    </div>

                    <div class="modal-body">
                    <div class="row col-lg-12">
                              <form>
                                   <?php echo csrf_field(); ?>

                                   <div class="col-sm-4">
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3" style="font-size:12px">Control No</label>
                                             <div class="col-sm-6">
                                                  <input value="<?php echo $yieldingno ?>" class="form-control input-sm" size="16" type="hidden" name="hdyieldingno" id="hdyieldingno" />
                                                  <input class="form-control input-sm" size="16" type="text" name="yieldingno2" id="yieldingno2" disabled="disabled" />
                                             </div>
                                           
                                        </div> 
                                       
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3" style="font-size:12px">PO No.</label>
                                             <div class="col-sm-6">
                                                  <input type="text" value="<?php foreach($msrecords as $msrec): ?><?php echo e($msrec->PO); ?><?php endforeach; ?>" class="form-control input-sm" id="pono2" name="pono2"  disabled="disabled" />
                                             </div>
                                                                                             
                                        </div>
                                     
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3" style="font-size:12px">PO Qty</label>
                                             <div class="col-sm-6">    
                                                  <input class="form-control input-sm" size="16" type="text" name="poqty2" value="<?php foreach($msrecords as $msrec): ?><?php echo e($msrec->POqty); ?> <?php endforeach; ?>" id="poqty2" disabled="disabled" />   
                                             </div> 
                                        </div> 
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3" style="font-size:12px">Device</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="device2" name="device2" value="  <?php foreach($msrecords as $msrec): ?><?php echo e($msrec->devicename); ?><?php endforeach; ?>" disabled="disabled" />
                                                  
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3" style="font-size:12px">Family</label>
                                             <div class="col-sm-6">
                                                  <Select class="form-control" id="family2" name="family2">
                                                 
                                                  <?php foreach($family as $fam): ?>
                                                  <option value="<?php echo e($fam->description); ?>"><?php echo e($fam->description); ?></option>
                                                  <?php endforeach; ?>
                                                  </Select>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3" style="font-size:12px">Series</label>
                                             <div class="col-sm-6">
                                                  <Select class="form-control" id="series2" name="series2">
                                                 
                                                  <?php foreach($series as $serie): ?>
                                                  <option value="<?php echo e($serie->description); ?>"><?php echo e($serie->description); ?>

                                                  </option>
                                                  <?php endforeach; ?>
                                                  </Select>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="col-sm-4">
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Classification</label>
                                             <div class="col-sm-6">
                                                  <Select class="form-control" id="classification2" name="classification2">
                                                 
                                                  <?php foreach($category as $cat): ?>
                                                  <option value="<?php echo e($cat->description); ?>"><?php echo e($cat->description); ?>

                                                  </option>
                                                  <?php endforeach; ?>
                                                  </Select>
                                             </div>   
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Mode of Defect</label>
                                             <div class="col-sm-6">
                                                  <Select class="form-control mod2" id="mod2" name="mod2">
                                                  <option></option>
                                                  <?php foreach($modefect as $mod): ?>
                                                  <option value="<?php echo e($mod->description); ?>"><?php echo e($mod->description); ?></option>
                                                  <?php endforeach; ?>
                                                  </Select>
                                                  <div id="erd4"></div>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Qty</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="qty2" name="qty2" disabled="" />
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Production Date</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="productiondate2" name="productiondate2"  disabled/>
                                             </div>
                                             
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Yielding Station</label>
                                             <div class="col-sm-6">
                                                  <Select class="form-control" id="yieldingstation2" name="yieldingstation2">
                                                 
                                                  <?php foreach($yieldstation as $ys): ?>
                                                  <option value="<?php echo e($ys->description); ?>"><?php echo e($ys->description); ?>

                                                  </option>
                                                   <?php endforeach; ?>
                                                  </Select>
                                                 
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Accumulated Output</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="accumulatedoutput2" name="accumulatedoutput2" />
                                                  <div id="erd1"></div>
                                             </div>
                                        </div>

                                   </div>

                                   <div class="col-sm-4">
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Total Output</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="toutput2" name="toutput2"/>
                                                  <div id="erd2"></div>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Total Reject</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="treject2" name="treject2" />
                                                  <div id="erd3"></div>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Total MNG</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="tmng2" name="tmng2" disabled="disabled"/>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Total PNG</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="tpng2" name="tpng2" disabled="disabled"/>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">% Yield w/o MNG</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="ywomng2" name="ywomng2" disabled="disabled"/>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px">Total w/o Yield</label>
                                             <div class="col-sm-6">
                                                  <input type="text" class="form-control input-sm" id="twoyield2" name="twoyield2" disabled="disabled"/>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="control-label col-sm-4" style="font-size:12px"></label>
                                             <div class="col-sm-6">
                                                   <button type="button" style="font-size:12px;" onclick="javascript:update();" class="btn green input-sm" id="btnupdate">
                                                       <i class="fa fa-trash"></i> Update
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>

                    <div class="modal-footer">
                  
                    </div>
               
               </div>
          </div>
     </div>
 
<?php $__env->stopSection(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$( document ).ready(function(e) {
     $('#btnsave').addClass("disabled");
     $('#btnload').addClass("disabled");
  
     $('input[name=pono]').attr('disabled',true);
     $('input[name=poqty]').attr('disabled',true);
     $('input[name=device]').attr('disabled',true);
      $('input[name=treject]').attr('disabled',true);
     $('#family').attr('disabled',true);
     $('#series').attr('disabled',true);
     $('#classification').attr('disabled',true);
     $('#mod').attr('disabled',true);
     $('input[name=qty]').attr('disabled',true);
     $('input[name=productiondate]').attr('disabled',true);
     $('#yieldingstation').attr('disabled',true);
     $('input[name=accumulatedoutput]').attr('disabled',true);
     $('#yieldingno').val("");

     $('#btnremove_detail').addClass("disabled");
//-------------------------------------------------------------------------------------multisearching---------------
     $('#mSearchtype1').change(function(e){
          var mSearchtype1 = $('#mSearchtype1').val();
          var mSearchval1 = $('#mSearchval1').val();
          var myData = {'mSearchtype1':mSearchtype1,'mSearchval1':mSearchval1};
          var fieldname = "";
           $.post("<?php echo e(url('/multisearch-yieldperformance')); ?>",
          { 
               _token: $('meta[name=csrf-token]').attr('content')
               , data: myData
          }).done(function(data, textStatus, jqXHR){  
               
               for(var i=0;i<data.length;i++){
                    var field = data[i];
                    var mSearchtype1 = $('#mSearchtype1').val();
                    switch(mSearchtype1){
                         case '2':
                              $('#mSearchval1').append('<option value="'+field.pono+'">'+field.pono+'</option>'); 
                              break;
                         case '3':
                              $('#mSearchval1').append('<option value="'+field.poqty+'">'+field.poqty+'</option>'); 
                              break;
                         case '4':
                              $('#mSearchval1').append('<option value="'+field.device+'">'+field.device+'</option>'); 
                              break;
                         case '5':
                              $('#mSearchval1').append('<option value="'+field.family+'">'+field.family+'</option>'); 
                              break;
                         case '6':
                              $('#mSearchval1').append('<option value="'+field.series+'">'+field.series+'</option>'); 
                              break;
                         case '7':
                              $('#mSearchval1').append('<option value="'+field.classification+'">'+field.classification+'</option>'); 
                              break;
                         case '8':
                              $('#mSearchval1').append('<option value="'+field.mod+'">'+field.mod+'</option>'); 
                              break;
                         case '9':
                              $('#mSearchval1').append('<option value="'+field.qty+'">'+field.qty+'</option>'); 
                              break;
                         case '10':
                              $('#mSearchval1').append('<option value="'+field.pruductiondate+'">'+field.productiondate+'</option>'); 
                              break;
                         case '11':
                              $('#mSearchval1').append('<option value="'+field.yieldingstation+'">'+field.yieldingstation+'</option>'); 
                              break;
                         case '12':
                              $('#mSearchval1').append('<option value="'+field.accumulatedoutput+'">'+field.accumulatedoutput+'</option>'); 
                              break;
                         default:
                              $('#mSearchval1').append('<option value="'+field.yieldingno+'">'+field.yieldingno+'</option>'); 
                              break;
                    }
               }  
               return false; 
          }).fail(function(jqXHR, textStatus, errorThrown){
               console.log(errorThrown+'|'+textStatus);
          });  
     });
    
//---------------------------------------------------------------------------   Input Restriction----------------------
     $('#qty').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });
     $('#accumulatedoutput').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });
     $('#toutput').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });
     $('#treject').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });

     $('#qty2').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });
     $('#accumulatedoutput2').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });
     $('#toutput2').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });
     $('#treject2').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
     });
    
//-----------------------------------------------------------------------------------------
     $('#treject').keyup(function(){
          var accumulatedoutput = $('#accumulatedoutput').val();
          var treject = $('#treject').val();
          var tempans = accumulatedoutput - treject;
          var ans = tempans / accumulatedoutput * 100;
          var yinpercent = ans.toFixed(2);
          $('#ywomng').val(yinpercent);
     });
     $('#accumulatedoutput').keyup(function(){
          var accumulatedoutput = $('#accumulatedoutput').val();
          var treject = $('#treject').val();
          var tempans = accumulatedoutput - treject;
          var ans = tempans / accumulatedoutput * 100;
          var yinpercent = ans.toFixed(2);
          $('#ywomng').val(yinpercent);
     });  
     $('#treject2').keyup(function(){
          var accumulatedoutput = $('#accumulatedoutput2').val();
          var treject = $('#treject2').val();
          var tempans = accumulatedoutput - treject;
          var ans = tempans / accumulatedoutput * 100;
          var yinpercent = ans.toFixed(2);
          $('#ywomng2').val(yinpercent);
     });
     $('#accumulatedoutput2').keyup(function(){
          var accumulatedoutput = $('#accumulatedoutput2').val();
          var treject = $('#treject2').val();
          var tempans = accumulatedoutput - treject;
          var ans = tempans / accumulatedoutput * 100;
          var yinpercent = ans.toFixed(2);
          $('#ywomng2').val(yinpercent);
     });                             
//---------------------------------------------------------------------------------
     $('#modaldelete').click(function() {
          deleteAllcheckeditems();
     });

          
//---------------------------------------------------------------------------------
     $('#btndiscard').click(function(){
          $('#btnsearch').removeClass("disabled");
          $('input[name=yieldingno]').attr('disabled',false);
          $('input[name=pono]').attr('disabled',true);
          $('input[name=poqty]').attr('disabled',true);
          $('input[name=device]').attr('disabled',true);
          $('#family').attr('disabled',true);
          $('#series').attr('disabled',true);
          $('#classification').attr('disabled',true);
          $('#mod').attr('disabled',true);
          $('input[name=qty]').attr('disabled',true);
          $('input[name=productiondate]').attr('disabled',true);
          $('#yieldingstation').attr('disabled',true);
          $('input[name=accumulatedoutput]').attr('disabled',true);

          $('input[name=yieldingno]').val("");
          $('input[name=pono]').val("");
          $('input[name=poqty]').val("");
          $('input[name=device]').val("");
          $('#family').val("");
          $('#series').val("");
          $('#classification').val("");
          $('#mod').val("");
          $('input[name=qty]').val("");
          $('input[name=productiondate]').val("");
          $('#yieldingstation').val("");
          $('input[name=toutput]').val(""); 
          $('input[name=treject]').val("");
          $('input[name=tmng]').val("");
          $('input[name=tpng]').val("");
          $('input[name=ywomng]').val("");
          $('input[name=twoyield]').val("");        
     });

//--------------------------------------------------------------------------------------
     $('#btnadd').click(function(){
          $('#btnsearch').addClass("disabled");
          var hdyieldingno = $('#hdyieldingno').val();
          $('input[name=yieldingno]').val(hdyieldingno);
          $('input[name=pono]').attr('disabled',false);      
          $('#family').attr('disabled',false);
          $('#series').attr('disabled',false);
          $('#classification').attr('disabled',false);
          $('#mod').attr('disabled',false);
          $('input[name=qty]').attr('disabled',false);
          $('select[name=yieldingstation]').attr('disabled',false);  
          $('input[name=accumulatedoutput]').attr('disabled',false);  
          $('input[name=toutput]').attr('disabled',false);  
          $('input[name=yieldingno]').attr('disabled',true);  

          $('input[name=pono]').val("");
          $('input[name=poqty]').val("");
          $('input[name=device]').val("");
          $('#family').val("");
          $('#series').val("");
          $('#classification').val("");
          $('#mod').val("");
          $('input[name=qty]').val("");
          $('#yieldingstation').val("");
          $('input[name=toutput]').val(""); 
          $('input[name=treject]').val("");
          $('input[name=tmng]').val("");
          $('input[name=tpng]').val("");
          $('input[name=ywomng]').val("");
          $('input[name=twoyield]').val("");  
          $('input[name=accumulatedoutput]').val("");   
     });
//------------------------------------------------------------------------------------------------
     $('.edit-task').click(function(){
          $('#editModal').modal('show');
          $('.editmodal-title').html('Update Yield Performance');
          var getvalue = $(this).val().split('|');
          var yieldingno = getvalue[0];
          var  productiondate = getvalue[1];
          var  yieldingstation = getvalue[2];
          var  toutput = getvalue[3];
          var  classification = getvalue[4];
          var  mod = getvalue[5];
          var  qty = getvalue[6];
          var  pono = getvalue[7];
          var  poqty = getvalue[8];
          var  device = getvalue[9];
          var  family = getvalue[10];
          var  series = getvalue[11];
          var  Aoutput = getvalue[12];
          var  treject = getvalue[13];
          var  ywomng = getvalue[14];
       
          $('#yieldingno2').val(yieldingno);
          $('#productiondate2').val(productiondate.substring(0,10));
          $('#yieldingstation2').val(yieldingstation);
          $('#accumulatedoutput2').val(Aoutput);
          $('#classification2').val(classification);

          var tempmod =  mod.split(',');
          var stabmod = $('#mod2').select2('val',tempmod);
          var mod2 = $('#mod2 option:selected').length;
          var qty2 = $('#qty2').val(qty);

          $('#mod2').click(function(){
               var mod3 = $('#mod2 option:selected').length;
               $('#qty2').val(mod3);    
          });
        
          $('#pono2').val(pono);
          $('#poqty2').val(poqty);
          $('#device2').val(device);
          $('#family2').val(family);
          $('#series2').val(series);
          $('#toutput2').val(toutput);
          $('#treject2').val(treject);  
          $('#ywomng2').val(ywomng);
     });
//---------------------------------------------------------------------------------------------     
     $('.checkAllitems').change(function(){
          if($('.checkAllitems').is(':checked')){           
               $('input[name=checkitem]').parents('span').addClass("checked");
               $('input[name=checkitem]').prop('checked',this.checked);
               $('.edit-task').addClass("disabled");    
               $('#btnremove_detail').removeClass("disabled");          
          }else{
               $('input[name=checkitem]').parents('span').removeClass("checked");
               $('input[name=checkitem]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled"); 
               $('.edit-task').removeClass("disabled");  
               $('#btnremove_detail').addClass("disabled");          
          }         
     });
//-----------------------------------------------------------------------------------------------
     $('.checkboxes').change(function(){
          $('input[name=checkAllitem]').parents('span').removeClass("checked");
          $('input[name=checkAllitem]').prop('checked',false);
          var tray = [];
          $(".checkboxes:checked").each(function () {
               tray.push($(this).val());
               $('.checkAllitems').prop('checked',false);
               $('#btnremove_detail').removeClass("disabled");    
          
          });
          
          if($('.checkboxes').is(':checked')){
               $('input[name=checkAllitem]').parents('span').removeClass("checked");
               $('input[name=checkAllitem]').prop('checked',false);

          } else {
               $('#btnremove_detail').addClass("disabled");
          }
     });
//---------------------------------------------------------------------------------------------     
     $('.checkAllitemsPYA').change(function(){
          if($('.checkAllitemsPYA').is(':checked')){           
               $('input[name=checkitemPYA]').parents('span').addClass("checked");
               $('input[name=checkitemPYA]').prop('checked',this.checked);
               $('.edit-task').addClass("disabled");    
               $('#btnremove_detail').removeClass("disabled");          
          }else{
               $('input[name=checkitemPYA]').parents('span').removeClass("checked");
               $('input[name=checkitemPYA]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled"); 
               $('.edit-task').removeClass("disabled");  
               $('#btnremove_detail').addClass("disabled");          
          }         
     });
//-----------------------------------------------------------------------------------------------
     $('.checkboxesPYA').change(function(){
          $('input[name=checkAllitemPYA]').parents('span').removeClass("checked");
          $('input[name=checkAllitemPYA]').prop('checked',false);
          var tray = [];
          $(".checkboxes:checked").each(function () {
               tray.push($(this).val());
               $('.checkAllitemsPYA').prop('checked',false);
               $('#btnremove_detail').removeClass("disabled");    
          
          });
          
          if($('.checkboxesPYA').is(':checked')){
               $('input[name=checkAllitemPYA]').parents('span').removeClass("checked");
               $('input[name=checkAllitemPYA]').prop('checked',false);

          } else {
               $('#btnremove_detail').addClass("disabled");
          }
     });
//---------------------------------------------------------------------------------------------     
     $('.checkAllitemsCMQ').change(function(){
          if($('.checkAllitemsCMQ').is(':checked')){           
               $('input[name=checkitemCMQ]').parents('span').addClass("checked");
               $('input[name=checkitemCMQ]').prop('checked',this.checked);
               $('.edit-task').addClass("disabled");           
          }else{
               $('input[name=checkitemCMQ]').parents('span').removeClass("checked");
               $('input[name=checkitemCMQ]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled"); 
               $('.edit-task').removeClass("disabled");  
               $('#btnremove_detail').addClass("disabled");          
          }         
     });
//-----------------------------------------------------------------------------------------------
     $('.checkboxesCMQ').change(function(){
          $('input[name=checkAllitemCMQ]').parents('span').removeClass("checked");
          $('input[name=checkAllitemCMQ]').prop('checked',false);
          var tray = [];
          $(".checkboxes:checked").each(function () {
               tray.push($(this).val());
               $('.checkAllitemsCMQ').prop('checked',false);
          
          });
          
          if($('.checkboxesPYA').is(':checked')){
               $('input[name=checkAllitemCMQ]').parents('span').removeClass("checked");
               $('input[name=checkAllitemCMQ]').prop('checked',false);

          } else {
               $('#btnremove_detail').addClass("disabled");
          }
     });



//---------------------------------------------------------------------------------------------------          
     $('.remove-task').on('click', function() {
          $('#deleteAllModal').modal('show');
     });

//--------------------------------------------------------------------------------------------
     $('#editModal').on('shown.bs.modal', function () {
         $(this).find('.modal-dialog').css({
          width:'80%',
          height:'auto',
          });
     });
//----------------------------------------------------------------------------------------------
     $('.mod2').select2();


});//end of script-------------------------------------------------------------------------------------
function edit(){
      $('#accumulatedoutput2').keyup(function(){
          $('#erd1').html(""); 
     });
     $('#toutput2').keyup(function(){
          $('#erd2').html(""); 
     });
     $('#treject2').keyup(function(){
          $('#erd3').html(""); 
     });
     $('#mod2').click(function(){
          $('#erd4').html(""); 
     });
}

function addnew(){
     $('#btnsave').removeClass("disabled");
     $('#btnload').removeClass("disabled");
     $('#treject').attr('disabled',false);
    
     var d = new Date();
     var month = d.getMonth()+1;
     var day = d.getDate();

     var output = d.getFullYear() + '/' +
         (month<10 ? '0' : '') + month + '/' +
         (day<10 ? '0' : '') + day;
   
     $('input[name=productiondate]').val(output);

     $('#pono').keyup(function(){
          $('#er1').html(""); 
          if(!this.value){
               $('#poqty').val("");
               $('#device').val("");
          }
     });
     $('#btnload').click(function(){
          $('#er1').html("");  
     });
     $('#family').click(function(){
          $('#er2').html(""); 
     });
     $('#series').click(function(){
          $('#er3').html(""); 
     });
     $('#classification').click(function(){
          $('#er4').html(""); 
     });
     $('#mod').click(function(){
          $('#er5').html(""); 
     });
     $('#yieldingstation').click(function(){
          $('#er6').html(""); 
     });
     $('#accumulatedoutput').keyup(function(){
          $('#er7').html(""); 
     });
     $('#toutput').keyup(function(){
          $('#er8').html(""); 
     });
     $('#treject').keyup(function(){
          $('#er9').html(""); 
     });


}


function save(){
     var yieldingno = $('input[name=yieldingno]').val();
     var pono = $('input[name=pono]').val();
     var poqty = $('input[name=poqty]').val();
     var device = $('input[name=device]').val();
     var family = $('#family').val();
     var series = $('#series').val();
     var classification = $('#classification').val();
     var mod = $('#mod').val();
     var qty = $('input[name=qty]').val();
     var productiondate =  $('input[name=productiondate]').val();
     var yieldingstation =  $('#yieldingstation').val();
     var accumulatedoutput =  $('input[name=accumulatedoutput]').val();
     var toutput =  $('input[name=toutput]').val();
     var treject = $('input[name=treject]').val();
     var tmng =  $('input[name=tmng]').val();
     var tpng =  $('input[name=tpng]').val();
     var ywomng =  $('input[name=ywomng]').val();
     var twoyield =  $('input[name=twoyield]').val();

     if(pono == ""){     
          $('#er1').html("PO number field is empty"); 
       $('#er1').css('color', 'red');       
          return false;  
     } 
     if (family == ""){
          $('#er2').html("Family field is empty"); 
       $('#er2').css('color', 'red');        
          return false;
     }
     if (series == ""){
          $('#er3').html("Series field is empty"); 
       $('#er3').css('color', 'red');
          return false;
     }
     if (classification == ""){
          $('#er4').html("Classification field is empty"); 
       $('#er4').css('color', 'red');
          return false;
     }
     if (!$('#mod option:selected').length){
          $('#er5').html("Mode of Deffect field is empty"); 
       $('#er5').css('color', 'red');
          return false;
     }
     if (yieldingstation == ""){
          $('#er6').html("Yielding Station field is empty"); 
       $('#er6').css('color', 'red');
          return false;
     }
     if (accumulatedoutput == ""){
          $('#er7').html("Accumulated Output field is empty"); 
       $('#er7').css('color', 'red');
          return false;
     }
     if (toutput == ""){
          $('#er8').html("Total Output field is empty"); 
       $('#er8').css('color', 'red');
          return false;
     }
     if (treject == ""){
          $('#er9').html("Total Reject field is empty"); 
       $('#er9').css('color', 'red');
          return false;
     }

     var traymod = [];
     $('#mod option:selected').each(function () {
          traymod.push($(this).val());
     });
    
    
     var myData ={
                 'yieldingno' : yieldingno
                      ,'pono' : pono
                     ,'poqty' : poqty
                    ,'device' : device
                    ,'family' : family
                    ,'series' : series
            ,'classification' : classification
                       ,'mod' : traymod
                       ,'qty' : qty
            ,'productiondate' : productiondate
            ,'yieldingstation': yieldingstation
         ,'accumulatedoutput' : accumulatedoutput
                   ,'toutput' : toutput
                   ,'treject' : treject
                      ,'tmng' : tmng
                      ,'tpng' : tpng
                    ,'ywomng' : ywomng
                  ,'twoyield' : twoyield
               };

     $.post("<?php echo e(url('/add-yieldperformance2')); ?>",
     { 
          _token: $('meta[name=csrf-token]').attr('content')
          , data: myData
     }).done(function(data, textStatus, jqXHR){
          if(data > 0){
               $('#searchpoModal').modal('show');
               $('.searchpo-title').html('Warning Message!');
               $('#po-message').html('Record Exist.');
               return false;
          }
          window.location.href="<?php echo e(url('/yieldperformance2')); ?>"; 
          $('#searchpoModal').modal('show');
          $('.searchpo-title').html('Success Message!');
          $('#po-message').html('Record successfully saved.');
     }).fail(function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}

function addpya(){
     var pono =  $('input[name=pono]').val();
     var productiondate =  $('input[name=productiondate]').val();
     var yieldingstation =  $('#yieldingstation').val();
     var accumulatedoutput =  $('input[name=accumulatedoutput]').val();
   
     var myData ={
                       'pono' : pono    
            ,'productiondate' : productiondate
            ,'yieldingstation': yieldingstation
         ,'accumulatedoutput' : accumulatedoutput
               };

     $.post("<?php echo e(url('/add-yield-pya2')); ?>",
     { 
          _token: $('meta[name=csrf-token]').attr('content')
          , data: myData
     }).done(function(data, textStatus, jqXHR){
          var hdpya = $('#hdpya').val().split('|');
          var id = hdpya[0];
          var pono = hdpya[1];
          var productiondate = hdpya[2];
          var yieldingstation = hdpya[3];
          var accumulatedoutput = hdpya[4];
          var tbodynew='<tr>'+
          '<td style="width: 3%"> '+ 
               '<div class="checker" id="uniform-checkitemPYA">'+
                    '<span>'+                     
                  
                    '<input type="checkbox" class="form-control input-sm checkboxesPYA" value="'+id+'" name="checkitemPYA" id="checkitemPYA"></input>'+
                    '</span>'+
               '</div>'+
          '</td>'+         
          '<td>'+pono+'</td>'+
          '<td>'+productiondate+'</td>'+
          '<td>'+yieldingstation+'</td>'+
          '<td>'+accumulatedoutput+'</td>'+        
          '</tr>';
          $('#tbody1').append(tbodynew); 

     }).fail(function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}

function addcmq(){
     var pono = $('#pono').val();
     var classification = $('#classification').val();
     var mod = $('#mod').val();
     var qty = $('input[name=qty]').val();
   
     var myData ={ 
                       'pono' : pono  
            ,'classification' : classification
                       ,'mod' : mod
                       ,'qty' : qty
               };

     $.post("<?php echo e(url('/add-yield-cmq2')); ?>",
     { 
          _token: $('meta[name=csrf-token]').attr('content')
          , data: myData
     }).done(function(data, textStatus, jqXHR){
          var hdcmq = $('#hdcmq').val().split('|');
          var id = hdcmq[0];
          var pono = hdcmq[1];
          var classification = hdcmq[2];
          var mod = hdcmq[3];
          var qty = hdcmq[4];
          var tbodynew='<tr>'+
               '<td style="width: 3%"> '+ 
                    '<div class="checker" id="uniform-checkitemCMQ">'+
                         '<span>'+                       
                         '<input type="checkbox" class="form-control input-sm checkboxesCMQ" value="'+id+'" name="checkitemCMQ" id="checkitemCMQ"></input>'+
                          '</span>'+
                    '</div>'+
               '</td>'+         
               '<td>'+pono+'</td>'+
               '<td>'+classification+'</td>'+
               '<td>'+mod+'</td>'+
               '<td>'+qty+'</td>'+        
               '</tr>';
          $('#tbody2').append(tbodynew);
     }).fail(function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}

function update(){
     var yieldingno = $('input[name=yieldingno2]').val();
     var pono = $('input[name=pono2]').val();
     var poqty = $('input[name=poqty2]').val();
     var device = $('input[name=device2]').val();
     var family = $('#family2').val();
     var series = $('#series2').val();
     var classification = $('#classification2').val();
     var mod = $('#mod2').val();
     var qty = $('input[name=qty2]').val();
     var productiondate =  $('input[name=productiondate2]').val();
     var yieldingstation =  $('#yieldingstation2').val();
     var accumulatedoutput =  $('input[name=accumulatedoutput2]').val();
     var toutput =  $('input[name=toutput2]').val();
     var treject =  $('input[name=treject2]').val();
     var tmng =  $('input[name=tmng2]').val();
     var tpng =  $('input[name=tpng2]').val();
     var ywomng =  $('input[name=ywomng2]').val();
     var twoyield =  $('input[name=twoyield2]').val();

     if (accumulatedoutput == ""){
          $('#erd1').html("Accumulated Output field is empty"); 
       $('#erd1').css('color', 'red');
          return false;
     }
     if (toutput == ""){
          $('#erd2').html("Total Output field is empty"); 
       $('#erd2').css('color', 'red');
          return false;
     }
     if (treject == ""){
          $('#erd3').html("Total Reject field is empty"); 
       $('#erd3').css('color', 'red');
          return false;
     }
     if(!$('#mod2 option:selected').length){
          $('#erd4').html("Mode of Deffect field is empty"); 
       $('#erd4').css('color', 'red');
          return false;
     }

     var traymod = [];
     $("#mod2 option:selected").each(function () {
          traymod.push($(this).val());

     });

     var myData ={
                 'yieldingno' : yieldingno
                      ,'pono' : pono
                     ,'poqty' : poqty
                    ,'device' : device
                    ,'family' : family
                    ,'series' : series
            ,'classification' : classification
                       ,'mod' : traymod
                       ,'qty' : qty
            ,'productiondate' : productiondate
            ,'yieldingstation': yieldingstation
         ,'accumulatedoutput' : accumulatedoutput
                   ,'toutput' : toutput
                   ,'treject' : treject
                      ,'tmng' : tmng
                      ,'tpng' : tpng
                    ,'ywomng' : ywomng
                  ,'twoyield' : twoyield
               };

     $.post("<?php echo e(url('/update-yieldperformance2')); ?>",
     { 
          _token: $('meta[name=csrf-token]').attr('content')
          , data: myData
     }).done(function(data, textStatus, jqXHR){
         /* console.log(data);*/
          window.location.href="<?php echo e(url('/yieldperformance2')); ?>";
     }).fail(function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}

function searchpo(){

     var pono = $('#pono').val();
     var myData = {'pono':pono};
     if(pono == ""){
          $('#searchpoModal').modal('show');
          $('.searchpo-title').html('Warning Message!');
          $('#po-message').html('PO number field is empty.');
     }

     if(!(pono)){
          $('#searchpoModal').modal('show');
          $('#po-title').html('Please enter a valid PO.');
          $('#pono').val("");
          $('#poqty').val("");
          $('#device').val("");
     } else {
          $.post("<?php echo e(url('/search-pono2')); ?>",
          { 
               _token: $('meta[name=csrf-token]').attr('content')
               , data: myData
          }).done(function(data, textStatus, jqXHR){
               if(data == 0   ){
                    $('#searchpoModal').modal('show');
                    $('.searchpo-title').html('Warning Message!');
                    $('#po-message').html('PO number not Match');
               } 
               $('#pono').val(data[0]['PO']);
               $('#poqty').val(data[0]['POqty']);
               $('#device').val(data[0]['devicename']);  
          }).fail(function(jqXHR, textStatus, errorThrown){
               console.log(errorThrown+'|'+textStatus);
          });  
     }

}

function deleteAllcheckeditems(){
     var tray = [];
     $(".checkboxes:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;

     $.ajax({
          url: "<?php echo e(url('/deleteAll-pono2')); ?>",
          method: 'get',
          data:  { 
               tray : tray, 
               traycount : traycount
          },
          
     }).done( function(data, textStatus, jqXHR) {
         /* console.log(data);*/
          window.location.href = "<?php echo e(url('/yieldperformance2')); ?>";   
     }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log(errorThrown+'|'+textStatus);
     });
}

function searchrecord(){
     var search = $('#yieldingno').val();
     var myData = {'search':search};
    
 
     if(!(search)){
          $('#multisearchModal').modal('show');
          $('.multisearch-title').html('Search multiple records');
         
     } else {
          $.post("<?php echo e(url('/search-yieldperformance2')); ?>",
          { 
               _token: $('meta[name=csrf-token]').attr('content')
               , data: myData
          }).done(function(data, textStatus, jqXHR){
               console.log(data);
               /*if(data == 0){
                    $('#searchpoModal').modal('show');
                    $('.searchpo-title').html('Warning Message!');
                    $('#po-message').html('Record not Found');
               }*/
               $('#pono').val(data[0]['pono']);
               $('#poqty').val(data[0]['poqty']);
               $('#device').val(data[0]['device']);
               $('#family').val(data[0]['family']);
               $('#series').val(data[0]['series']);
               $('#classification').val(data[0]['classification']);

               var mod = data[0]['mod'];
               var tempmod =  mod.split(',');
               var stabmod = $('.mod').select2('val',tempmod);
               var mod = $('.mod option:selected').length;
               var qty2 = $('#qty').val(mod2);

               $('#mod').click(function(){
                    var mod3 = $('#mod option:selected').length;
                    $('#qty').val(mod3);    
               });

               $('#qty').val(data[0]['qty']);
               $('#productiondate').val(data[0]['productiondate'].substring(0,10));
               $('#yieldingstation').val(data[0]['yieldingstation']);
               $('#accumulatedoutput').val(data[0]['accumulatedoutput']);
               $('#toutput').val(data[0]['toutput']);
               $('#treject').val(data[0]['treject']);
               $('#tmng').val(data[0]['tmng']);
               $('#tpng').val(data[0]['tpng']);
               $('#ywomng').val(data[0]['ywomng']);
               $('#twoyield').val(data[0]['twoyield']);

          }).fail(function(jqXHR, textStatus, errorThrown){
               console.log(errorThrown+'|'+textStatus);
          });  
     }    
}

function deletepya(){
      var tray = [];
     $(".checkboxesPYA:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;

     $.ajax({
             url:"<?php echo e(url('/delete-pya2')); ?>",
          method:'get',
            data:{
               tray:tray,
               traycount:traycount
          },
     }).done(function(data, textStatus, jqXHR ){
           window.location.href="<?php echo e(url('/yieldperformance2')); ?>";
     }).fail(function(textStatus, jqXHR, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}

function deletecmq(){
      var tray = [];
     $(".checkboxesCMQ:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;

     $.ajax({
             url:"<?php echo e(url('/delete-cmq2')); ?>",
          method:'get',
            data:{
               tray:tray,
               traycount:traycount
          },
     }).done(function(data, textStatus, jqXHR ){
           window.location.href="<?php echo e(url('/yieldperformance2')); ?>";
     }).fail(function(textStatus, jqXHR, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}

/*function multiSearchDisplay(){
     var mSearchtype1 = $('#mSearchtype1').val();
     var mSearchval1 = $('#mSearchval1').val();
     var tempval = mSearchval1.split(',');
     var myData = {'mSearchtype1':mSearchtype1,'mSearchval1':mSearchval1};

     $.post("<?php echo e(url('/multiSearchDisplay')); ?>",
     { 
          _token: $('meta[name=csrf-token]').attr('content')
          , data: myData
     }).done(function(data, textStatus, jqXHR){  
          console.log(data[0].pono);
          var tbody = '<tbody id="tbody1">'+
                         '<?php foreach($records as $rec): ?>'+
                         '<tr>'+
                              '<td style="width: 2%">'+
                                '<input type="checkbox" class="form-control input-sm checkboxes" value="<?php echo e($rec->id); ?>" name="checkitem" id="checkitem"></input>'+
                                
                              '</td> '+                       
                              '<td style="width: 3%">'+ 
                              '<button type="button" onclick="javascript:edit();" name="edit-task" class="btn btn-sm btn-primary edit-task" value="<?php echo e($rec->id.'|'.$rec->productiondate.'|'.$rec->yieldingstation.'|'.$rec->toutput.'|'.$rec->classification.'|'.$rec->mod.'|'.$rec->qty.'|'.$rec->pono.'|'.$rec->poqty.'|'.$rec->device.'|'.$rec->family.'|'.$rec->series.'|'.$rec->accumulatedoutput.'|'.$rec->treject.'|'.$rec->ywomng); ?>">'+
                                   '<i class="fa fa-edit"></i> '+
                              '</button>'+
                              '</td>'+
                              '<td><?php echo e($rec->productiondate); ?></td>'+
                              '<td><?php echo e($rec->yieldingstation); ?></td>'+
                              '<td><?php echo e($rec->accumulatedoutput); ?></td>'+
                              '<td><?php echo e($rec->classification); ?></td>'+
                              '<td><?php echo e($rec->mod); ?></td>'+
                              '<td><?php echo e($rec->qty); ?></td>'+
                              '<td><?php echo e($rec->pono); ?></td>'+
                              '<td><?php echo e($rec->poqty); ?></td>'+
                              '<td><?php echo e($rec->device); ?></td>'+
                              '<td><?php echo e($rec->family); ?></td>'+
                              '<td><?php echo e($rec->series); ?></td>'+
                         '</tr>'+

                         '<?php endforeach; ?>'+

                    '</tbody>';

     }).fail(function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });  
  
}*/


</script>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>