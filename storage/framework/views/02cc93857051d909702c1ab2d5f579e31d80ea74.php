    
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

 
     
    <div class="page-content">

        <div class="portlet box blue" >
            <div class="portlet-title">
                <div class="caption">
                     <i class="fa fa-navicon"></i>  Rework Yield Performance
                </div>
            </div>

            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-12">  
                        <form class="form-horizontal">
                            <?php echo csrf_field(); ?>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">PO No.</label>
                                    <div class="col-sm-6">
                                        <input type="hidden"  id="id" name="id"/>
                                        <input type="hidden" id="yield_id" name='yield_id'/>
                                        <input type="hidden" id="old_value" name="old_value">
                                        <input type="hidden"  id="row" name="row"/>
                                        <input type="text" value="" class="form-control input-sm" id="pono" name="pono" required="" disabled="" />
                                        <div id="er1"></div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" name="search-task"  class="btn btn-circle input-sm green load-task"  id="btnload" disabled="">
                                           <i class="fa fa-arrow-circle-down"></i> 
                                        </button>
                                    </div>                                                           
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-3">PO Qty</label>
                                    <div class="col-sm-6">                                    
                                        <input class="form-control input-sm" size="16" type="text" name="poqty" id="poqty" 
                                    readonly="" /> 
                                    <input class="form-control input-sm" size="16" type="hidden" name="hdpoqty" id="hdpoqty"/> 
                                        <div id="error1"></div>  
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Device</label>
                                    <div class="col-sm-6">                                        
                                        <input type="text" class="form-control input-sm" id="device" name="device" readonly="" />
                                        <div id="error2"></div>   
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Family</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="family" name="family" disabled="" required="">
                                            <option value=""></option>                   
                                        </Select>
                                        <div id="er2"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Series</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="series" name="series"  disabled="">
                                            <option value=""></option>
                                            <?php /* <?php foreach($series as $series): ?>
                                                <option value="<?php echo e($series->description); ?>"><?php echo e($series->description); ?>

                                                </option>
                                            <?php endforeach; ?>  */ ?>                                      
                                        </Select>
                                        <div id="er3"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Product Type</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="prodtype" name="prodtype" required="" disabled="">
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
                                        <input type="date" class="form-control input-sm" id="productiondate" name="productiondate" readonly="" />
                                    </div>
                                      
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Yielding Station</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="yieldingstation" name="yieldingstation" disabled="">
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
                                        <input type="text" class="form-control input-sm" id="accumulatedoutput" name="accumulatedoutput" disabled="" />
                                        <div id="er7"></div>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Classification</label>
                                    <div class="col-sm-6">
                                        <Select class="form-control input-sm" id="classification" name="classification" disabled="">
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
                                        <Select class="form-control input-sm mod" id="mod" name="mod" disabled="">
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
                                        <input type="number" class="form-control input-sm" id="qty" name="qty" disabled />
                                        <div id="er10"></div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Rework</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control input-sm" id="rework" name="rework"/>
                                        <div id=""></div> 
                                    </div>                                    
                                    <div class="col-sm-2">
                                        <button type="button" name="search-task"  class="btn btn-circle input-sm blue load-task"  id="btnloadpya" disabled="">
                                        <i class="fa fa-check"></i> 
                                        </button>
                                    </div>
                                 </div>

                                 <div class="form-group hidden">
                                    <label class="control-label col-sm-4"></label>
                                    <div class="col-sm-6">
                                        <input type="hidden" class="form-control input-sm" id="oldrework" name="oldrework"/>
                                        <div id=""></div>
                                    </div>                                    
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4">Remarks</label>
                                    <div class="col-sm-6">
                                        <input type ="text" name="remarks" id="remarks" readonly="" class="form-control input-sm"/>
                                        <div id="er10"></div>
                                    </div>
                                 </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Input</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="tinput" name="tinput" readonly="" />
                                        <div id="er8"></div>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Output</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="toutput" name="toutput" readonly="" />
                                        <div id="er8"></div>
                                      </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Reject</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="treject" name="treject" readonly=""/>
                                        <div id="er9"></div>
                                    </div>
                                 </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Rework</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="trework" name="trework" readonly=""/>
                                        <div id="er9"></div>
                                    </div>
                                 </div>
                                

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total MNG</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="tmng" name="tmng"  readonly="" />
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total PNG</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="tpng" name="tpng"  readonly="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">% Yield w/o MNG</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="ywomng" name="ywomng"  readonly="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Total Yield</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" value="0" id="twoyield" name="twoyield"  readonly="" />
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
                        <button type="button" style="font-size:12px;" class="btn green input-sm" id="btnadd">
                           <i class="fa fa-pencil"></i> Rework Yielding
                        </button>
                        <button type="button" style="font-size:12px;" class="btn red-intense input-sm" id="btndiscard" disabled="">
                           <i class="fa fa-pencil"></i> Discard Changes
                        </button>
                        <button type="button" style="font-size:12px;" class="btn green input-sm" id="btnsave" disabled="">
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
                                        <td style="width: 5%">
                                        </td>
                                        <td>Production Date</td>
                                        <td>Yielding Station</td>
                                        <td>Accumulated Output</td>
                                        <td>Classification</td>
                                        <td>Mode of Defects</td>
                                        <td>Qty</td>
                                        <td>Rework</td>
                                        <td>Remarks</td>
                                    </tr>
                                </thead>
                                <tbody id="tbl_pya_body"></tbody>
                            </table>
                       <?php /* 
                        <button style="margin-top: 20px;" type="button" onclick="javascript:deletepya();" name="delete-taskPYA" class="btn btn-sm btn-danger delete-taskPYA" id="delete-taskPYA">Delete
                             <i class="fa fa-trash"></i> 
                        </button> */ ?>
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
    var GetDataInYieldingPerformance = "<?php echo e(url('/GetPoDetails')); ?>";
    var getProdtypeDropdownURL = "<?php echo e(url('/getProdtypeDropdown')); ?>";
    var getFamilyDropdownURL = "<?php echo e(url('/getFamilyDropDown')); ?>";
    var getSeriesDropdownURL = "<?php echo e(url('/getSeriesDropdown')); ?>";
    var saveURL = "<?php echo e(url('/rework-yield')); ?>";
</script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/ReworkYieldTransaction.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>