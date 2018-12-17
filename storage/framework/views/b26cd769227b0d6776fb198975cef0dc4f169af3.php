    
<?php $__env->startSection('title'); ?>
     Yield Performance | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

     <?php $state = ""; $readonly = ""; ?>
     <?php foreach($userProgramAccess as $access): ?>
          <?php if($access->program_code == Config::get('constants.MODULE_CODE_REP')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
               <?php if($access->read_write == "2"): ?>
               <?php $state = "disabled"; $readonly = "readonly"; ?>
               <?php endif; ?>
          <?php endif; ?>
     <?php endforeach; ?>

     <div class="page-content">

          <!-- BEGIN PAGE CONTENT-->
          <div class="row">
               <div class="col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="portlet box blue" >
                         <div class="portlet-title">
                              <div class="caption">
                                   <i class="fa fa-area-chart"></i>  Yield Performance Report
                              </div>
                         </div>
                         <div class="portlet-body">

                              <div class="row">

                                   <div class="col-sm-12">

                                        <table id="tbl_reports" class="table table-striped table-bordered table-hover"style="font-size:10px">
                                             <thead >
                                                  <tr>
                                                       <td>PO Number</td>
                                                       <td>PO Qty</td>
                                                       <td>Device Name</td>
                                                       <td>Series</td>
                                                       <td>Family</td>
                                                       <td>Total Input</td>
                                                       <td>Total Output</td>
                                                       <td>Total Reject</td>
                                                       <td>Total Yield</td>
                                                  </tr>
                                             </thead>
                                             <tbody></tbody> 
                                        </table>


                                        <br>
                                        <div class="form-group pull-right">
                                             <label class="control-label col-sm-2">DPPM</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control input-sm" id="dppm" name="dppm">
                                             </div> 
                                        </div>
                                        <div class="col-sm-2">
                                             <input type="text" class="form-control input-sm date-picker" id="datefroms" name="datefroms" > Date From
                                        </div>
                                         <div class="col-sm-2">
                                             <input type="text" class="form-control input-sm date-picker" id="datetos" name="datetos" > Date To
                                        </div>
                                   </div>
                              </div>
                              <br>
                              <br>
                              <div class="row col-sm-offset-1 col-sm-10">
                                  <div id="chartContainer" style="height: 300px;"></div>
                              </div>
                              <div class="row">
                                   <div class="col-sm-12 text-center" style="margin-top:40px;">
                                        <a href="<?php echo e(url('/export-to-excel')); ?>" type="button" style="font-size:12px;" class="btn green-jungle input-sm" id="btnXexcel">
                                        <i class="fa fa-file-excel-o"></i> Export Summary to Excel
                                        </a>
                                        <a href="<?php echo e(url('/export-to-pdf')); ?>" type="button" style="font-size:12px;" class="btn yellow-gold input-sm" id="btnXpdf">
                                             <i class="fa fa-file-pdf-o"></i> Export Summary to Pdf
                                        </a>
                                        <button  type="button" style="font-size:12px;" class="btn blue-soft input-sm" id="btnxport">
                                             <i class="fa fa-share"></i>Export Files
                                        </button>
                                        <button  type="button" style="font-size:12px;" class="btn blue-soft input-sm" onclick="javascript:loadchart();" id="btnloadchart">
                                             <i class="fa fa-share"></i>Load Chart
                                        </button>
                                       
                                   </div>
                              </div>              
                         </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
               </div>
          </div>
          <!-- END PAGE CONTENT-->
     </div>
     
     <?php echo $__env->make('includes.yieldEmptyField_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.yieldReport_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.yieldReport_Exports_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.yieldReport_Summary_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.yieldReport_DefectSummary_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.yieldReport_YieldPerformanceSummary_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.yieldReport_YieldSummary_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/canvasjs.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/common.js')); ?>"></script>


<script type="text/javascript">
     var token = "<?php echo e(Session::token()); ?>";
     var ReportYieldPerformance = "<?php echo e(url('/ReportYieldPerformance')); ?>";
     var loadchartURL = "<?php echo e(url('/loadchart')); ?>";
     var updateyieldsummary = "<?php echo e(url('/update-yieldsummary')); ?>";
     var reportRecordsURL = "<?php echo e(url('/report-records')); ?>";

     var summaryREptURL = "<?php echo e(url('/summaryREpt')); ?>";
     var defectsummaryRptURL = "<?php echo e(url('/defectsummaryRpt')); ?>";
     var yieldsumfamRptURL = "<?php echo e(url('/yieldsumfamRpt')); ?>";
     var yieldsumRptURL = "<?php echo e(url('/yieldsumRpt')); ?>";

     var searchPOdetailsURL = "<?php echo e(url('/searchPOdetails')); ?>";

     var getYieldTargetURL = "<?php echo e(url('/getYieldTargetForReport')); ?>";
</script>
<script type="text/javascript"src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/yielding_performance_report.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPDefectSummaryReport.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPSummaryFamilyReport.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPSummaryReport.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPYieldSummaryReport.js')); ?>"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>