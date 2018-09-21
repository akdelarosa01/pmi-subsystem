     <!--Summary Report -->
    <div id="summaryrpt_Modal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog " gray-gallery">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h4 class="summaryrpt-title"></h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-sm-12">
                                   <form class="form-horizontal">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">From</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control input-sm" name="srdatefrom" id="srdatefrom">
                                             </div>     
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">To</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control input-sm" name="srdateto" id="srdateto">
                                             </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Production Type</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control input-sm" id="srprodtype" name="srprodtype">
                                                     <option value=""></option>
                                                     <option value="Test Socket">Test Socket</option>
                                                     <option value="Burn In">Burn In</option>
                                                 </Select>
                                             </div>     
                                        </div>
                                        <div class="form-group pull-right">
                                             <div class="col-sm-12">
                                                  <button type="button" onclick="javascript:summaryREpt();"  class="btn green-jungle input-sm">Export to Excel</button>
                                                  <!-- <button type="button"  onclick="javascript:summaryREptpdf();" class="btn yellow-gold input-sm" >Export to PDF</button>  -->
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