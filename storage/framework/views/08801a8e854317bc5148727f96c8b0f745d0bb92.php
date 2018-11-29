     <!--Yield Summary Family Report -->
     <div id="yieldsfrpt_Modal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog gray-gallery">
               <div class="modal-content ">
                    <div class="modal-header green">
                         <h4 class="yieldsfrpt-title"></h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-sm-12">
                                   <form class="form-horizontal">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group">
                                             <label class="control-label col-sm-3">From</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control input-sm date-picker" name="ysf-datefrom" id="ysf-datefrom">
                                             </div>     
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">To</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control input-sm date-picker" name="ysf-dateto" id="ysf-dateto">
                                             </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Yield Target</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control input-sm " id="ysf-yieldtarget" name="ysf-yieldtarget">
                                                       <option value=""></option>
                                                       <?php foreach($targetyield as $rec): ?>
                                                       <option value="<?php echo e($rec->yield); ?>"><?php echo e($rec->yield); ?></option>
                                                       <?php endforeach; ?>
                                                  </Select>
                                                  <input type="hidden" class="form-control input-sm" id="chose" name="chose" disabled="disabled"/>
                                             </div>     
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Product</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control input-sm " id="ysf-ptype" name="ysf-ptype">
                                                       <option value=""></option>
                                                       <option value="TEST SOCKET">TEST SOCKET</option>
                                                       <option value="BURN-IN">BURN-IN</option>
                                                  </Select>
                                                  <input type="hidden" class="form-control input-sm" id="chose" name="chose" disabled="disabled"/>
                                             </div>     
                                        </div>
                                        <hr>
                                        <div class="form-group pull-right">
                                             <div class="col-sm-12">
                                                  <button type="button" onclick="javascript:yieldsumfamRpt();"  class="btn green-jungle input-sm">Export to Excel</button>
                                                  <?php /* <button type="button" onclick="javascript:yieldsumfamRptpdf();" class="btn yellow-gold input-sm" >Export to PDF</button>  */ ?>
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