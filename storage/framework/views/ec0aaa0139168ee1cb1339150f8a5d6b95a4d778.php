    
<?php $__env->startSection('title'); ?>
     Yield Performance | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .dataTables_scrollHeadInner{
            width:100% !important;
        }
        .dataTables_scrollHeadInner table{
            width:100% !important;
        }
        .modal-backdrop {
            z-index: -1;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php $state = ""; $readonly = ""; ?>
    <?php foreach($userProgramAccess as $access): ?>
          <?php if($access->program_code == Config::get('constants.MODULE_CODE_NEWTRAN')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
               <?php if($access->read_write == "2"): ?>
               <?php $state = "disabled"; $readonly = "readonly"; ?>
               <?php endif; ?>
          <?php endif; ?>
     <?php endforeach; ?>
     
    <div class="page-content">

        <div class="portlet box blue" >
            <div class="portlet-title">
                <div class="caption">
                     <i class="fa fa-navicon"></i>  Add New Yield Performance
                </div>
            </div>

            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-12">  
                        <form class="form-horizontal">
                            <?php echo csrf_field(); ?>

                            <div class="col-sm-4">
                                <input type="hidden"  value="<?php if(isset($count)){ echo intVal($count->yieldingno) + 1; } else {echo intVal($count) + 1;} ?>" name="hdyieldingno" id="hdyieldingno" />
                                <input type="hidden"  name="yieldingno" id="yieldingno" />  

                                <div class="form-group">
                                    <label class="control-label col-sm-3">PO No.</label>
                                    <div class="col-sm-6">
                                        <input type="hidden"  id="id" name="id"/>
                                        <input type="hidden"  id="row" name="row"/>
                                        <input type="text" value="<?php foreach($msrecords as $msrec): ?><?php echo e($msrec->PO); ?><?php endforeach; ?>" class="form-control input-sm" id="pono" name="pono"/>
                                        <div id="er1"></div>

                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" name="search-task"  class="btn btn-circle input-sm green load-task"  id="btnload">
                                           <i class="fa fa-arrow-circle-down"></i> 
                                        </button>
                                    </div>                                                           
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-3">PO Qty</label>
                                    <div class="col-sm-6">                                    
                                        <input class="form-control input-sm" size="16" type="text" name="poqty" id="poqty" 
                                    disabled="disabled"/> 
                                    <input class="form-control input-sm" size="16" type="hidden" name="hdpoqty" id="hdpoqty"/> 
                                        <div id="error1"></div>  
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Device</label>
                                    <div class="col-sm-6">                                        
                                        <input type="text" class="form-control input-sm" id="device" name="device" disabled="disabled"/>
                                        <div id="error2"></div>   
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Family</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="family" name="family" required>
                                            <option value=""></option>
                                          <?php foreach($family as $family): ?>
                                                <option value="<?php echo e($family->description); ?>"><?php echo e($family->description); ?>

                                                </option>
                                            <?php endforeach; ?>
                                        </Select>
                                        <div id="er2"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Series</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="series" name="series" required>
                                            <option value=""></option>
                                            <?php foreach($series as $series): ?>
                                                <option value="<?php echo e($series->description); ?>"><?php echo e($series->description); ?>

                                                </option>
                                            <?php endforeach; ?>
                                        </Select>
                                        <div id="er3"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Product Type</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="prodtype" name="prodtype" required>
                                           {<option value=""></option>
                                            <option value="Test Socket">Test Socket</option>
                                            <option value="Burn In">Burn In</option> 
                                        </Select>
                                        <div id="erprodtype"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Production Date</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control input-sm" id="productiondate" name="productiondate"/>
                                    </div>
                                      
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Yielding Station</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="yieldingstation" name="yieldingstation">
                                            <option value=""></option>
                                            <?php foreach($yieldstation as $ys): ?>
                                                <option value="<?php echo e($ys->description); ?>"><?php echo e($ys->description); ?>

                                                </option>
                                            <?php endforeach; ?>
                                        </Select>
                                        <div id="er6"></div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4">Accumulated Output</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="accumulatedoutput" name="accumulatedoutput" />
                                        <div id="er7"></div>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Classification</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="classification" name="classification">
                                            <option value=""></option>
                                            <option value="NDF">NDF</option>
                                            <option value="Material NG (MNG)">Material NG (MNG)</option>
                                            <option value="Production NG (PNG)">Production NG (PNG)</option>   
                                        </Select>
                                        <div id="er4"></div>
                                    </div>   
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Mode of Defect</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm mod" id="mod" name="mod">
                                        <option value=""></option>
                                            <?php foreach($modefect as $modefect): ?>
                                                <option value="<?php echo e($modefect->description); ?>"><?php echo e($modefect->description); ?>

                                                </option>
                                            <?php endforeach; ?>
                                        </Select>
                                        <div id="er5"></div>
                                    </div>   
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Qty</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control input-sm" id="qty" name="qty" />
                                        <div id="er10"></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" onclick="javascript:addpya();" name="search-task"  class="btn btn-circle input-sm green load-task"  id="btnloadpya">
                                        <i class="fa fa-plus"></i> 
                                        </button>
                                    </div>       
                                 </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Output</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="toutput" name="toutput"/>
                                        <div id="er8"></div>
                                      </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Reject</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="treject" name="treject"/>
                                        <div id="er9"></div>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total MNG</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="tmng" name="tmng"  disabled="disabled" />
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total PNG</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="tpng" name="tpng"  disabled="disabled" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">% Yield w/o MNG</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="ywomng" name="ywomng"  disabled="disabled" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Yield</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="twoyield" name="twoyield"  disabled="disabled" />
                                        <input type="hidden" class="form-control input-sm" id="counter" name="counter"  disabled="disabled" />
                                    </div>
                                 </div>

                            </div>
                        </form>

                    </div>
                </div>

                <br>

                <div class="form-group pull-right">
                    <label class="control-label col-sm-2">DPPM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="dppm" name="dppm" disabled="disabled">
                        <input type="hidden" class="form-control input-sm " name="hdstatus" id="hdstatus"></input>
                    </div>    
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="button" style="font-size:12px;" onclick="javascript:addnew();" class="btn green input-sm" id="btnadd">
                           <i class="fa fa-plus"></i> Add New
                        </button>
                        <button type="button" style="font-size:12px;" onclick="javascript: setcontrol('DIS'); " class="btn red-intense input-sm" id="btndiscard">
                           <i class="fa fa-pencil"></i> Discard Changes
                        </button>
                        <button type="button" style="font-size:12px;" class="btn green input-sm" id="btnsave">
                           <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </div>

                <hr>

                <div class="row">
                        <div class="col-sm-12" > 
                            <table id="tbl_pya" class="table table-striped table-bordered table-hover"style="font-size:10px">
                                <thead id="thead1">
                                    <tr>
                                        <td class="table-checkbox" style="width: 5%">
                                            <input type="checkbox" class="check_all_pya"/>
                                        </td>
                                        <td style="width: 5%">
                                        </td>
                                        <td>Production Date</td>
                                        <td>Yielding Station</td>
                                        <td>Accumulated Output</td>
                                        <td>Classification</td>
                                        <td>Mode of Defects</td>
                                        <td>Quantity</td>
                                    </tr>
                                </thead>
                                <tbody id="tbl_pya_body"></tbody>
                            </table>
                       
                        <button style="margin-top: 20px;" type="button" onclick="javascript:deletepya();" name="delete-taskPYA" class="btn btn-sm btn-danger delete-taskPYA" id="delete-taskPYA">Delete
                             <i class="fa fa-trash"></i> 
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php echo $__env->make('includes.yielding-modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    var token = "<?php echo e(Session::token()); ?>";
    var saveURL = "<?php echo e(url('/save-yield')); ?>";
    var searchPOURL = "<?php echo e(url('/search-pono2')); ?>";
    var getMODURL = "<?php echo e(url('/get_mod')); ?>";
    var getAutoValueURL = "<?php echo e(url('/getautovalue')); ?>";
    var getPngURL = "<?php echo e(url('/getpng')); ?>";
    var getMngURL = "<?php echo e(url('/getmng')); ?>";
    var searchDisplayPYAURL = "<?php echo e(url('/searchdisplaypya')); ?>";
    var searchDisplayCMQURL = "<?php echo e(url('/searchdisplaycmq')); ?>";
    var searchDisplayDetailsURL = "<?php echo e(url('/searchdisplaydetails')); ?>";
    var searchDisplaySummaryURL = "<?php echo e(url('/searchdisplaysummary')); ?>";
    var deleteAllPOURL = "<?php echo e(url('/deleteAll-pono2')); ?>";
    var searchYieldURL = "<?php echo e(url('/search-yieldperformance2')); ?>";
    var deletePyaURL = "<?php echo e(url('/deletepya')); ?>";
    var deleteCmqURL = "<?php echo e(url('/deletecmq')); ?>";
    var backURL = "<?php echo e(url('/yieldperformance')); ?>";
    var getPODetailsURL = "<?php echo e(url('/GetPONumberDetails')); ?>";
    var getFamilyDropdownURL = "<?php echo e(url('/getFamilyDropDown')); ?>";
    var getProdtypeDropdownURL = "<?php echo e(url('/getProdtypeDropdown')); ?>";
</script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/add_new_yielding_performance.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>