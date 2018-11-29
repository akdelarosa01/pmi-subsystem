<!--Yield Performance Summary Report -->
     <div id="yieldpsrpt_Modal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog gray-gallery">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h4 class="yieldpsrpt-title"></h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-sm-12">
                                   <form class="form-horizontal">
                                        <?php echo csrf_field(); ?>

                                        
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">From</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control input-sm date-picker" name="ypsr-datefrom" id="ypsr-datefrom">
                                             </div>     
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">To</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control input-sm date-picker" name="ypsr-dateto" id="ypsr-dateto">
                                             </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">PO Number</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control input-sm" name="ypsr-ponumber" id="ypsr-ponumber">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Product Type</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control input-sm " id="ypsr-prodtype" name="ypsr-prodtype">
                                                       <option value=""></option>
                                                       <option value="TEST SOCKET">TEST SOCKET</option>
                                                       <option value="BURN-IN">BURN-IN</option>
                                                 </Select>
                                             </div>     
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Family</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control input-sm " id="ypsr-family" name="ypsr-family">
                                                       <option></option>
                                                       <?php foreach($family as $fam): ?>
                                                       <option value="<?php echo e($fam->description); ?>"><?php echo e($fam->description); ?></option>
                                                       <?php endforeach; ?>
                                                 </Select>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Series Name</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control input-sm " id="ypsr-seriesname" name="ypsr-seriesname">
                                                       <option value=""></option>
                                                       <!-- yield performance series -->
                                                 </Select>
                                             </div>
                                        </div>
                                        <?php /* <div class="form-group">
                                             <label class="control-label col-sm-3">Device</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control input-sm " id="ypsr-device" name="ypsr-device">
                                                       <option value=""></option>
                                                       <?php foreach($record as $rec): ?>
                                                       <option value="<?php echo e($rec->device); ?>"><?php echo e($rec->device); ?></option>
                                                       <?php endforeach; ?>
                                                 </Select>
                                             </div>
                                        </div> */ ?>
                                        <div class="form-group pull-right">
                                             <div class="col-sm-12">
                                                  <button type="button" onclick="javascript:yieldsumRpt();"  class="btn green-jungle input-sm">Export to Excel</button>
                                                  <?php /* <button type="button" onclick="javascript:yieldsumRptpdf();" class="btn yellow-gold input-sm" >Export to PDF</button>  */ ?>
                                                  <button type="button" data-dismiss="modal" class="btn btn-danger input-sm">Close</button>
                                             </div>  
                                        </div>
                                   </form>   
                              </div>
                         </div>
                    </div>
               </div>    
          </div>
     </div>