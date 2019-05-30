    
<?php $__env->startSection('title'); ?>
     Yield Performance | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

     <?php $state = ""; $readonly = ""; ?>
     <?php foreach($userProgramAccess as $access): ?>
          <?php if($access->program_code == Config::get('constants.MODULE_CODE_YLDPRFMNCE')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
               <?php if($access->read_write == "2"): ?>
               <?php $state = "disabled"; $readonly = "readonly"; ?>
               <?php endif; ?>
          <?php endif; ?>
     <?php endforeach; ?>

     <div class="page-content">

          <!-- BEGIN PAGE CONTENT-->
          <div class="row">
               <div class="col-md-offset-2 col-md-8">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="portlet box blue" >
                         <div class="portlet-title">
                              <div class="caption">
                                   <i class="fa fa-bullseye"></i>  Yield Target
                              </div>
                         </div>
                         <div class=" portlet-body">
                              <div class="row">
                                   <div class="col-sm-offset-2  col-sm-8">
                                        <form class="form-horizontal" id="formtarget" role="form"  method="POST" 
                                        action="<?php echo e(url('/add-targetreg')); ?>" />
                                             <?php echo csrf_field(); ?>

                                             <input type="hidden" id="id" name="id" value="0">
                                             <div class="form-group">
                                                  <label class="control-label col-sm-3">From</label>
                                                  <div class="col-sm-9">
                                                       <input type="text" class="form-control input-sm validate" name="datefrom" id="datefrom">
                                                       <div id="datefrom_feedback"></div>
                                                  </div>
                                              </div>    
                                              <div class="form-group">     
                                                  <label class="control-label col-sm-3">To</label>
                                                  <div class="col-sm-9">
                                                       <input type="text" class="form-control input-sm validate" name="dateto" id="dateto">
                                                      <div id="dateto_feedback"></div>
                                                  </div>   
                                             </div>
                                             <div class="form-group">
                                                  <label class="control-label col-sm-3">Target Yield</label>
                                                  <div class="col-sm-9">
                                                       <input type="text" class="form-control input-sm validate" id="yield" name="yield">
                                                       <div id="yield_feedback"></div>
                                                  </div>     
                                             </div>
                                             <div class="form-group">
                                                  <label class="control-label col-sm-3">Target DPPM</label>
                                                  <div class="col-sm-9">
                                                       <input type="text" class="form-control input-sm validate" id="dppm" name="dppm">
                                                       <div id="dppm_feedback"></div>
                                                  </div>     
                                             </div>
                                             <div class="form-group">
                                                  <label class="control-label col-sm-3">Product Type</label>
                                                  <div class="col-sm-9">
                                                       <select class="form-control input-sm select-validate" name="ptype" id="ptype">
                                                            <option value=""></option>
                                                            <option value="TEST SOCKET">TEST SOCKET</option>
                                                            <option value="BURN-IN">BURN-IN</option>     
                                                       </select>
                                                       <div id="ptype_feedback"></div>
                                                  </div>     
                                             </div>
                                             <br>
                                             <div class="form-group pull-right">
                                                  <div class="col-sm-12">
                                                       <button type="submit" id='targetsave' class="btn btn-success">Save</button>
                                                       <button type="reset" id='targetclear' class="btn btn-danger">Clear</button>
                                                  </div>
                                             </div>      
                                        </form>       
                                   </div>
                              </div><br/>
                              <div class="row">
                                   <div class="col-sm-12">
                                        <table id="modregtable" class="table table-striped table-bordered table-hover"style="font-size:13px">
                                             <thead id="thead1">
                                                  <tr>
                                                       <td class="table-checkbox" style="width: 5%">
                                                       <input type="checkbox" class="group-checkable checkAllitemstarget" name="checkAllitemtarget"/>
                                                       </td>
                                                       <td></td>
                                                       <td>From</td>
                                                       <td>To</td>
                                                       <td>Target Yield</td>
                                                       <td>Target DPPM</td>
                                                       <td>Product Type</td>
                                                  </tr>
                                             </thead>
                                             <tbody  id="tblfortarget">
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         <div>
                         <br/><button type="button" id='saveTarget' onclick="javascript:removetargetreg();"  class="btn red">Remove</button>
                    </div>
               </div>
          </div>
     </div>
     
     
     <?php echo $__env->make('includes.yieldEmptyField_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPDefectSummaryReport.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPSummaryFamilyReport.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPSummaryReport.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPYieldSummaryReport.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>"></script>
<script type="text/javascript">
     var token = "<?php echo e(Session::token()); ?>";
     var getOutputsURL = "<?php echo e(url('/getOutputsURL')); ?>";
     var targetInsert = "<?php echo e(url('/add-targetreg')); ?>";
     var edittargetreg = "<?php echo e(url('/edittargetreg')); ?>";
     var getTargetTable = "<?php echo e(url('/getTargetYield')); ?>";
     var deleteTarget = "<?php echo e(url('/deleteAlltargetreg')); ?>";
</script>
<script type="text/javascript"src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/yield_target.js')); ?>"></script>




<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>