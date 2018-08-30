@extends('layouts.master')    
@section('title')
     Yield Performance Yield Target | Pricon Microelectronics, Inc.
@endsection

@section('content')

     <?php $state = ""; $readonly = ""; ?>
     @foreach ($userProgramAccess as $access)
          @if ($access->program_code == Config::get('constants.MODULE_CODE_YIELDTAR'))  <!-- Please update "2001" depending on the corresponding program_code -->
               @if ($access->read_write == "2")
               <?php $state = "disabled"; $readonly = "readonly"; ?>
               @endif
          @endif
     @endforeach

     <div class="page-content">

          <!-- BEGIN PAGE CONTENT-->
          <div class="row">
               <div class="col-sm-9">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    @include('includes.message-block')
                    <div class="portlet box blue" >
                         <div class="portlet-title">
                              <div class="caption">
                                   <i class="fa fa-navicon"></i>  Yield Target
                              </div>
                         </div>
                         <div class="portlet-body">

                              <div class="row">
                                   <div class="col-sm-9">
                                        <form class="form-horizontal">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">PO Number</label>

                                             <div class="col-sm-9">
                                                  <div class="input-group">
                                                      <input type="text" class="form-control enter input-sm validate clear"  id="pono" name="pono" maxlength="15">
                                                      <span class="input-group-btn">
                                                          <button type="button" class="btn input-sm green" id="btn_getpodetails">
                                                              <i class="fa fa-search"></i>
                                                          </button>
                                                      </span>
                                                  </div>
                                                  <div id="er_pono"></div>
                                             </div>     
                                        </div>

                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Device Code</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control enter input-sm validate clear" id="podeviceCode" name="podeviceCode" maxlength="40" >
                                                  <div id="er_podeviceCode"></div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-3">Device Name</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control enter input-sm validate clear" name="podevice" maxlength="40" >
                                                  <div id="er_podevice"></div>
                                             </div>
                                        </div>


                                        <div class="form-group">
                                             <label class="control-label col-sm-3">PO Quantity</label>
                                             <div class="col-sm-9">
                                                  <input type="text" class="form-control enter input-sm validate clear" id="poquantity" name="poquantity" maxlength="40" >
                                                  <input type="hidden" class="form-control enter input-sm validate clear" id="poregstatus" name="poregstatus" maxlength="40" >
                                                  <input type="hidden" class="form-control input-sm" id="poregid" name="poregid" maxlength="40">
                                                  <div id="er_poquantity"></div>
                                             </div>
                                        </div>

                                         <div class="form-group row">
                                             <label class="control-label col-sm-3">Family</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control enter input-sm validate clear" id="devicefamily" name="devicefamily" tabindex="3">
                                                       <option value=""></option>
                                                    {{--    @foreach($family as $ys)
                                                            <option value="{{$ys->family}}">{{$ys->family}}</option>
                                                       @endforeach     --}}
                                                 </Select>
                                                  <div id="er_devicefamily"></div>
                                             </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3">Series</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control enter input-sm validate clear" id="deviceseries" name="deviceseries" tabindex="4">
                                                       <!-- block of series here -->      
                                                 </Select>
                                                  <div id="er_deviceseries"></div>
                                             </div>
                                        </div> 
                                        <div class="form-group row">
                                             <label class="control-label col-sm-3">Product Type</label>
                                             <div class="col-sm-9">
                                                  <Select class="form-control enter input-sm validate clear" id="deviceptype" name="deviceptype" tabindex="5">
                                                     <option value=""></option>
                                                    {{--  <option value="Test Socket">Test Socket</option>
                                                     <option value="Burn In">Burn In</option> --}}
                                                  </Select>
                                                  <input type="hidden" class="form-control input-sm" id="devregstatus" name="devregstatus" maxlength="40" >
                                                  <input type="hidden" class="form-control input-sm" id="devregid" name="devregid" maxlength="40">
                                                  <div id="er_deviceptype"></div>
                                             </div>
                                        </div>

                                        <div class="form-group pull-right">
                                             <div class="col-sm-12">
                                                  <button type="button" id="btn_save_po_reg" class="btn btn-success">Save</button> 
                                                  <button type="button" id='btnporegclear' class="btn btn-danger">Clear</button>
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


          
     

     

     <!-- Empty FIELD SEARCH -->
     <div id="messageModal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-sm gray-gallery">
               <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">Warning!</h4>
                    </div>
                    <form class="form-horizontal">
                         <div class="modal-body">
                              <div class="row">
                                   <div class="col-sm-12">
                                        <label class="control-label col-sm-10" id="message"></label>
                                   </div>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>

    
@endsection

@push('script')
{{-- <script type="text/javascript" src="{{ asset(Config::get('constants.PUBLIC_PATH').'assets/global/plugins/canvasjs.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/common.js') }}"></script>
<script type="text/javascript" src="{{ asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPDefectSummaryReport.js') }}"></script>
<script type="text/javascript" src="{{ asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPSummaryFamilyReport.js') }}"></script>
<script type="text/javascript" src="{{ asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPSummaryReport.js') }}"></script>
<script type="text/javascript" src="{{ asset(Config::get('constants.PUBLIC_PATH').'assets/global/scripts/YieldReportsJS/YPYieldSummaryReport.js') }}"></script>


<script type="text/javascript">

var dataColumn = [
     { data: function(data) {
          return '<input type="checkbox" class="checkboxespo" value="'+data.id+'" name="checkitempo" id="checkitempo">';
     }, name: 'id' },
     { data: 'action', name: 'action', orderable: false, searchable: false },
     { data: 'pono', name: 'pono' },
     { data: 'device_code', name: 'device_code' },
     { data: 'device_name', name: 'device_name' },
     { data: 'poqty', name: 'poqty' },    
     { data: 'Family', name: 'Family' },  
     { data: 'Series', name: 'Series' },  
     { data: 'Prod_type', name: 'Prod_type' },   
];

 var dataColumnseries = [
          { data: function(data) {
               return '<input type="checkbox" class="checkboxesseries" value="'+data.id+'" name="checkboxesseries" id="checkboxesseries">';
          }, name: 'id' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
          { data: 'family', name: 'family' },
          { data: 'series', name: 'series' },
     ];


 var dataColumnMOD = [
          { data: function(data) {
               return '<input type="checkbox" class="checkboxesmod" value="'+data.id+'" name="checkboxesmod" id="checkboxesmod">';
          }, name: 'id' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
          { data: 'family', name: 'family' },
          { data: 'mod', name: 'mod' },
     ];

var dataColumnYieldTarget = [
          { data: function(data) {
               return '<input type="checkbox" class="checkboxestarget" value="'+data.id+'" name="checkboxestarget" id="checkboxestarget">';
          }, name: 'id' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
          { data: 'datefrom', name: 'datefrom' },
          { data: 'dateto', name: 'dateto' },
          { data: 'yield', name: 'yield' },
          { data: 'dppm', name: 'dppm' },
          { data: 'ptype', name: 'ptype' },
     ];

var dataColumnYIELD = [
     { data: function(data) {
               return '<input type="checkbox" class="checkboxesYield" value="'+data.id+'" name="checkboxesYield" id="checkboxesYield">';
          }, name: 'id' },
          // { data: 'action', name: 'action', orderable: false, searchable: false },
          { data: 'pono', name: 'pono' },
          { data: 'poqty', name: 'poqty' },
          { data: 'device', name: 'device' },
          { data: 'series', name: 'series' },
          { data: 'family', name: 'family' },
          { data: 'toutput', name: 'toutput' },
          { data: 'treject', name: 'treject' },
          { data: 'accumulatedoutput', name: 'accumulatedoutput' },
     ];

$(document).ready(function(e) {
     DatePickers();
     ButtonsClicked();
     Checkboxes();
     EditButtons();
     ButtonsClear();
     //ButtonClosed();
     getDatatable('tbl_yield',"{{ url('/getYieldPerformanceDT')}}",dataColumnYIELD,[],0);


     $('#btn_save_po_reg').on('click', function() {
          poregistration();
     });

     $('#modalsave').on('click', function() {
         DeletePOcheck();
     });

     $('#modaldeleteSeries').on('click', function() {
         removeseriesreg();
     });

     $('#modalsaveRemoveDreg').on('click', function() {
         removemodreg();
     });

    

     $('#ysf-icsocket').change(function(){
          if($('#ysf-icsocket').is(':checked')){
               $('#chose').val("true");

          }else{
              $('#chose').val("false");
          }         
     });




     $STATUS = "ADD";
     $IDS = "";
     $('#tbl_poregistration_body').on('click', '.edit-poreg', function(e) {
          e.preventDefault();
        //  alert($(this).attr('data-id'));
          $('#pono').val($(this).attr('data-pono'));
          $('#podeviceCode').val($(this).attr('data-device_code'));
          $('#podevice').val($(this).attr('data-device_name'));
          $('#poquantity').val($(this).attr('data-poqty')); 
          $('#devicefamily').val($(this).attr('data-Family')); 
          $('#deviceseries').val($(this).attr('data-Series')); 
          $('#deviceptype').val($(this).attr('data-Prod_type')); 
          IDs = $(this).attr('data-id');
          STATUS = "EDIT";    
     });

     $('#tbl_seriesregtable_body').on('click', '.edit-seriesreg', function(e) {
          e.preventDefault();
          $('#Seriesfamily').val($(this).attr('data-family'));
          $('#seriesname').val($(this).attr('data-series'));
          IDs = $(this).attr('data-id');
          STATUS = "EDIT";    
     });

     $('#tbl_MODtable_body').on('click', '.edit-modedit', function(e) {
          e.preventDefault();
          $('#modfamily').val($(this).attr('data-family'));
          $('#mod').val($(this).attr('data-mod'));
          IDs = $(this).attr('data-id');
          STATUS = "EDIT";    
     });

     $('#tblfortarget').on('click', '.edit-target', function(e) {
          e.preventDefault();
          $('#target-datefrom').val($(this).attr('data-datefrom'));
          $('#target-dateto').val($(this).attr('data-dateto'));
          $('#targetyield').val($(this).attr('data-yield'));
          $('#targetdppm').val($(this).attr('data-dppm'));
          $('#targetptype').val($(this).attr('data-ptype'));
          IDs = $(this).attr('data-id');
          STATUS = "EDIT";    
     });



     
     FieldsValidations();

     

     $('#ypsr-family').on('change',function(){
          $('#ypsr-seriesname').select2('val',"");
          var family = $('select[name=ypsr-family]').val();
          $('#ypsr-seriesname').html("");
          $.post("{{ url('/devreg_get_series') }}",
          {
               _token:$('meta[name=csrf-token]').attr('content'),
               family:family 
          }).done(function(data, textStatus, jqXHR){
               console.log(data);
               $.each(data,function(i,val){
                    var sup = '';
                    switch(family) {
                         case "BGA":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "BGA-FP":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "LGA":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "PGA":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "PGA-LGA":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "PUS":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "Probe Pin":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "QFN":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "Socket No.2":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "SOJ":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                         case "TSOP":
                              var sup = '<option value="'+val.series+'">'+val.series+'</option>';
                              break;
                        default:
                              var sup = '<option value=""></option>';
                    }
                         
                    //var option = '<option value="'+val.supplier'">'+val.supplier'</option>';
                    var option = sup;
                    $('#ypsr-seriesname').append(option);
               });
          });
     });

     
});//end of script-------------------------------------------------------------------------------------
var i =0;
function loadchart(){

     var datefroms = $('#datefroms').val();
     var datetos = $('#datetos').val();
   

     var token = "{{ Session::token() }}";
     var data = {_token: token, datefroms:datefroms, datetos:datetos};
     $.ajax({
          
          url:"{{ url('/loadchart') }}",
          method:'post',
          data:data
     }).done(function(data, textStatus, jqXHR){
         console.log(data);
     /*    alert(data[0]['toutput']);
         var treject =data[0]['treject'];*/

          var chart = new CanvasJS.Chart("chartContainer",
          {
               theme: "theme3",
                        animationEnabled: true,
               title:{
                    text: "Chart Summary",
                    fontSize: 30
               },
               toolTip: {
                    shared: true
               },             
               axisY: {
                    title: "Total Quantity"
               },
               
               data: [ 
               {
                    type: "column",     
                    name: "Total Outputs",
                    legendText: "Total Output",
                    showInLegend: true, 
                    dataPoints:
                    [

                    /*{label: data[0].family, y: parseInt(data[0]['toutputs'])},*/
                    
                    ]
               },
               {
                    type: "column",     
                    name: "Total Rejects",
                    legendText: "Total Rejects",
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints:
                    [
                   
                   /*{label: data[0].family, y: parseInt(data[0]['treject'])},
                   */
                    
                    ]
               }
               
               ],
               legend:
               {
                    cursor:"pointer",
                    itemclick: function(e){
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                         e.dataSeries.visible = false;
                    }
                    else {
                         e.dataSeries.visible = true;
                    }
                         chart.render();
                    }
               },
          });


          for(var i = 0; i < data.length; i++)
          {
               var length = chart.options.data[0].dataPoints.length;
               chart.options.data[0].dataPoints.push({label: data[i].family, y: parseInt(data[i]['toutput'])});
               chart.render();
          }
          
          for(var i = 0; i < data.length; i++)
          {
               var length = chart.options.data[1].dataPoints.length;
               chart.options.data[1].dataPoints.push({label: data[i].family, y: parseInt(data[i]['qty'])});
               chart.render();
          }

    // });
     



     }).fail(function(jqXHR,textStatus,errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });     
}
function poregistration(){
     var pono = $('#pono').val();
     var podeviceCode = $('#podeviceCode').val();
     var podevice = $('#podevice').val();
     var poquantity = $('#poquantity').val();
     var Family = $('#devicefamily').val();
     var Series = $('#deviceseries').val();
     var ProdType = $('#deviceptype').val();
     var editsearch = $('#hdporegid').val();
     var status = (typeof STATUS != 'undefined')?STATUS:"ADD";
    
     // var id = $('input[name=poregid]').val();
     if(Family == null || Series ==null ||ProdType == null|| Family == "0" || Series =="0" ||ProdType == "0"){ 
          msg("Fill in Required Fields",'failed');
          return false;
     }
     if(pono == ""){     
        $('#er_pono').html("PO number field is empty"); 
        $('#er_pono').css('color', 'red');       
        return false;  
     }
     if(podeviceCode == ""){     
        $('#er_podeviceCode').html("Device field is empty"); 
        $('#er_podeviceCode').css('color', 'red');       
        return false;  
     } 
     if(podevice == ""){     
        $('#er_podevice').html("Device field is empty"); 
        $('#er_podevice').css('color', 'red');       
        return false;  
     } 
     if(poquantity == ""){     
        $('#er_poquantity').html("Quantity field is empty"); 
        $('#er_poquantity').css('color', 'red');       
        return false;  
     }
     $('#tblforporeg').html("");
     //CER
     jQuery.ajax({
          url: "{{ url('/CheckYpicsPO') }}",
          type: 'GET',
          dataType: 'json',
          data: {_token: "{{Session::token()}}", po: pono},
          success: function(returnData) {
               if(returnData > 0 && status == "ADD")
               {
                    msg("PO number Already Exist","failed");
               }
               else{
                    var id = (typeof IDs != 'undefined')?IDs:1;
                    jQuery.ajax({
                         url: "{{ url('/add-poregistration') }}",
                         type: 'POST',
                         dataType: 'json',
                         data: {_token: "{{Session::token()}}", 
                                   id:id,
                                   pono: pono,
                                   podeviceCode: podeviceCode,
                                   podevice:podevice,
                                   poquantity:poquantity,
                                   Family:Family,
                                   Series:Series,
                                   ProdType:ProdType,
                                   status:status
                               },
                         success:function(returnData){
                                        if(status == "ADD"){
                                             msg("PO Successfully added","success"); 
                                             clearALLfields();
                                        
                                             getDatatable('tbl_poregistration',"{{ url('/get-poregistration')}}",dataColumn,[],0);
                                        }
                                        else{
                                             msg("PO Successfully modified","success"); 
                                             getDatatable('tbl_poregistration',"{{ url('/get-poregistration')}}",dataColumn,[],0);
                                             clearALLfields();
                                             status = "ADD"
                                        }
                         },
                          error: function(xhr, textStatus, errorThrown) {

                          }
                     });



               }
          },
          error: function(xhr, textStatus, errorThrown) {
          //called when there is an error
          }
     });

     


      
}
         

}

}
function deleteAllcheckeditems(){
     var tray = [];
     $(".checkboxes:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;

     $.ajax({
          url: "{{ url('/deleteAll-yieldperformance') }}",
          method: 'get',
          data:  { 
               tray : tray, 
               traycount : traycount
          },
          
     }).done( function(data, textStatus, jqXHR) {
          console.log(data);
          window.location.href = "{{ url('/yieldperformance') }}";   
     }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log(errorThrown+'|'+textStatus);
     });
}
function removeporeg(){
     var tray = [];
     $(".checkboxespo:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;
     $('#tblforporeg').html("");
     $.ajax({
          url: "{{ url('/deleteporeg') }}",
          method: 'get',
          data:  { 
               tray : tray, 
               traycount : traycount
          },
          
     }).done(function(data, textStatus, jqXHR) {
          console.log(data);
          alert(data);
          $.each(data,function(i,val){
               var tblrow = '<tr>'+
                              '<td style="width: 2%" >'+
                                   '<input type="checkbox" class="form-control input-sm checkboxespo" value="'+val.id+'" name="checkitempo" id="checkitempo"></input>'+ 
                              '</td>'+ 
                              '<td style="width: 2%">'+
                                   '<button type="button" name="edit-poreg" class="btn btn-sm btn-primary edit-poreg" value="'+val.id+'">'+
                                        '<i class="fa fa-edit"></i>'+ 
                                   '</button> '+
                              '</td>'+                  
                              '<td>'+val.pono+'</td>'+
                              '<td>'+val.device+'</td>'+
                              '<td>'+val.poqty+'</td>'+    
                         '</tr>';
               $('#tblforporeg').append(tblrow);
               $('#pono').val("");
               $('#poquantity').val("");
               $('#podevice').val(""); 
               $('#poregid').val("");
               $('#poregstatus').val("ADD");
               $('.edit-poreg').click(function(){
                    $('#poregstatus').val("EDIT");
                    var editsearch = $(this).val();
                    $('#poregid').val(editsearch);
                    $.ajax({
                         url: "{{ url('/editporeg') }}",
                         method: 'get',
                         data:  { 
                              editsearch : editsearch, 
                         },
                         
                    }).done(function(data, textStatus, jqXHR) {
                         console.log(data);
                         $('#pono').val(data[0]['pono']);
                         $('#poquantity').val(data[0]['poqty']);
                         $('#podevice').val(data[0]['device']); 
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                         console.log(errorThrown+'|'+textStatus);
                    });
               });
          });
     }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log(errorThrown+'|'+textStatus);
     });
}

function removeYIELD(){
     var tray = [];
     $(".checkboxesYield:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;
     $.ajax({
          url: "{{ url('/deleteYIELD') }}",
          method: 'get',
          data:  { 
               tray : tray, 
               traycount : traycount
          },  
          success:function(){
               msg("Yield Deleted","success"); 
               getDatatable('tbl_yield',"{{ url('/getYieldPerformanceDT')}}",dataColumnYIELD,[],0);          
          }
     });
}


function removetargetreg(){
     var tray = [];
     $(".checkboxestarget:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;
   //  $('#tblfortarget').html("");
     $.ajax({
          url: "{{ url('/deleteAlltargetreg') }}",
          method: 'get',
          data:  { 
               tray : tray, 
               traycount : traycount
          },
          success:function(){
               msg("Target Yield Deleted","success"); 
               getDatatable('modreg-table',"{{ url('/getTargetYield')}}",dataColumnYieldTarget,[],0);
          }
     });
          
    
}
function update(){
     var yieldingno = $('input[name=yieldingno2]').val();
     var pono = $('input[name=pono2]').val();
     var poqty = $('input[name=poqty2]').val();
     var device = $('input[name=device2]').val();
     var family = $('#family2').val();
     var series = $('#series2').val();
     var toutput =  $('input[name=toutput2]').val();
     var treject =  $('input[name=treject2]').val();
     var twoyield =  $('input[name=twoyield2]').val();
     var masterid =  $('input[name=masterid]').val();

     var myData ={
                       'pono' : pono
                     ,'poqty' : poqty
                    ,'device' : device
                    ,'family' : family
                    ,'series' : series
                   ,'toutput' : toutput
                   ,'treject' : treject
                  ,'twoyield' : twoyield
                  ,'masterid' : masterid
               };

     $.post("{{ url('/update-yieldsummary') }}",
     { 
          _token: $('meta[name=csrf-token]').attr('content')
          , data: myData
     }).done(function(data, textStatus, jqXHR){
          /*console.log(data);*/
          window.location.href="{{ url('/yieldperformance') }}";
     }).fail(function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}

function DatePickers(){
     $( "#datefroms").datepicker();
     $( "#datetos").datepicker();
     $( "#dsr-datefrom" ).datepicker();
     $( "#dsr-dateto" ).datepicker();
     $( "#srdatefrom" ).datepicker();
     $( "#srdateto" ).datepicker();
     $( "#ypsr-datefrom" ).datepicker();
     $( "#ypsr-dateto" ).datepicker();
     $( "#ysf-datefrom" ).datepicker();
     $( "#ysf-dateto" ).datepicker();
     $('#target-datefrom').datepicker();
     $('#target-dateto').datepicker();

     $('#datefroms').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#datetos').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#dsr-datefrom').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#dsr-dateto').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#srdatefrom').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#srdateto').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#ypsr-datefrom').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#ypsr-dateto').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#ysf-datefrom').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#ysf-dateto').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#target-datefrom').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#target-dateto').on('change',function(){
          $(this).datepicker('hide');
     });
}
function ButtonsClicked(){
     $('#btnaddnew').click(function(){
          window.location.href = "{{ url('/addnewYieldperformance') }}";
     });

     $('#btnmAndr').click(function(){
          $('#mAndr-Modal').modal('show');
     });

     $('#btn_poreg').click(function(){
          $('#poreg_Modal').modal('show');
          $('#mAndr-Modal').modal('hide');
          $('.poreg_modal-title').html("Purchase Order Registration");
          $('#poregstatus').val("ADD");
          $('#pono').val("");
          $('#podevice').val("");
          $('#poquantity').val("");
          $('#poregid').val("");
          $('#pono').keyup(function(){
               if(this.value == ''){
                    $('#poquantity').val(""); 
                    $('#podevice').val("");
               }
          });
          getFamilyList('devicefamily');
          getSeriesList();
          getProductList();
          getDatatable('tbl_poregistration',"{{ url('/get-poregistration')}}",dataColumn,[],0);
          IDS="";
          STATUS = "ADD"
     });
    

     $('#btn_devicereg').click(function(){
          $('#devicereg_Modal').modal('show');
          $('#mAndr-Modal').modal('hide');
          $('.devicereg_modal-title').html("Device Registration");
          $('#devregstatus').val("ADD");
          $('#devicepono').val("");
          $('#devicename').val("");
          $('#devicefamily').select2('val',"");
          $('#deviceseries').select2('val',"");
          $('#deviceptype').select2('val',""); 
          $('#devregid').val(""); 
          IDS="";
          STATUS = "ADD"
     });
     $('#btn_seriesreg').click(function(){
          $('#seriesreg_Modal').modal('show');
          $('#mAndr-Modal').modal('hide');
          $('.seriesreg_modal-title').html("Series Registration");
          $('#seriesregstatus').val("ADD");
          $('#Seriesfamily').val("");
          $('#seriesname').val("");
          $('#seriesregid').val("");
          getFamilyList('Seriesfamily');
          getDatatable('tbl_seriesregtable',"{{ url('/get-seriesregistration')}}",dataColumnseries,[],0);
          IDS="";
          STATUS = "ADD"
     });

     $('#btn_modreg').click(function(){
          $('#modreg_Modal').modal('show');
          $('#mAndr-Modal').modal('hide');
          $('.modreg_modal-title').html("Mode of Defect Registration");
          $('#modregstatus').val("ADD");
          $('#mod').val("");
          $('#modfamily').val("");
          $('#modregid').val("");
          getProductTargetList('modfamily');
          getDatatable('tbl_MODtable',"{{ url('/getModofDef')}}",dataColumnMOD,[],0);
          IDS="";
          STATUS = "ADD"
     });
     $('#btn_target').click(function(){
          $('#targetreg_Modal').modal('show');
          $('#mAndr-Modal').modal('hide');
          $('.targetreg_modal-title').html("Target Yield Registration");
          $('#targetstatus').val("ADD");
          $('#target-datefrom').val("");
          $('#target-dateto').val("");
          $('#targetyield').val("");
          $('#targetdppm').val("");
          $('#targetid').val("");
          getProductTargetList('targetptype');
          getDatatable('modreg-table',"{{ url('/getTargetYield')}}",dataColumnYieldTarget,[],0);
          IDS="";
          STATUS = "ADD"
     });
  
     $('#btnxport-summaryrpt').click(function(){
          $('#summaryrpt_Modal').modal('show');
          $('#Export-Modal').modal('hide');
          $('.summaryrpt-title').html("Summary Report");
     });
     $('#btnxport-defectsummaryrpt').click(function(){
          $('#defectsummaryrpt_Modal').modal('show');
          $('#Export-Modal').modal('hide');
          $('.defectsummaryrpt-title').html("Defect Summary Report");
     });
     $('#btnxport-yieldpsrpt').click(function(){
          $('#yieldpsrpt_Modal').modal('show');
          $('#Export-Modal').modal('hide');
          $('.yieldpsrpt-title').html("Yield Performance Summary Report");
     });
     $('#btnxport-yieldsfrpt').click(function(){
          $('#yieldsfrpt_Modal').modal('show');
          $('#Export-Modal').modal('hide');
          $('.yieldsfrpt-title').html("Yield Summary Report");
     });
     $('#btnxport').click(function(){
          $('#Export-Modal').modal('show');
     });
     $('#btnxport-defectsummaryrpt').click(function(){
          var icsocket = $('#dsr-icsocket').val();
          var fol = $('#dsr-fol').val();
         
          $('#dsr-icsocket').change(function(){
               if($('#dsr-icsocket').is(':checked')){
                    $('input[name=dsr-fol]').parents('span').removeClass("checked");
                    $('input[name=dsr-fol]').prop('checked',false);    
               }
          });
          $('#dsr-fol').change(function(){
               if($('#dsr-fol').is(':checked')){
                    $('input[name=dsr-icsocket]').parents('span').removeClass("checked");
                    $('input[name=dsr-icsocket]').prop('checked',false);
               }
          });
         
     });
}
function FieldsValidations(){
    
     $('#pono').keyup(function(){
        $('#er_pono').html(""); 
     });
     $('#podevice').keyup(function(){
        $('#er_podevice').html(""); 
     });
     $('#poquantity').keyup(function(){
        $('#er_poquantity').html(""); 
     });
     //DEVICE Registration Inputs Validations-------------------
     $('#devicepono').keyup(function(){
        $('#er_devicepono').html(""); 
     });
     $('#devicename').keyup(function(){
        $('#er_devicename').html(""); 
     });
     $('#devicefamily').click(function(){
        $('#er_devicefamily').html(""); 
     });
     $('#deviceseries').click(function(){
        $('#er_deviceseries').html(""); 
     });
     $('#deviceptype').click(function(){
        $('#er_deviceptype').html(""); 
     });
     //SERIES Registration Inputs Validations-------------------
     $('#Seriesfamily').click(function(){
        $('#er_seriesfamily').html(""); 
     });
     $('#seriesname').click(function(){
        $('#er_seriesname').html(""); 
     });
     //MODE OF DEFECTS Registration Inputs Validations-------------------
     $('#mod').click(function(){
        $('#er_mod').html(""); 
     });
     $('#modfamily').click(function(){
        $('#er_modfamily').html(""); 
     });
     //TARGET YIELD Registration Inputs Validations-------------------
     $('#target-datefrom').click(function(){
        $('#er_target-datefrom').html(""); 
     });
     $('#target-dateto').click(function(){
        $('#er_target-dateto').html(""); 
     });
     $('#targetyield').keyup(function(){
        $('#er_targetyield').html(""); 
     });
     $('#targetdppm').keyup(function(){
        $('#er_targetdppm').html(""); 
     });
}
function ButtonsClear(){
     $('#btnporegclear').click(function(){
          // $('#hdporeg').val("ADD");
          // $('#pono').val("");
          // $('#podevice').val("");
          // $('#poquantity').val("");
          // $('#poregid').val("");
     });
     $('#btndeviceregclear').click(function(){
          $('#devregstatus').val("ADD");
          $('#devicepono').val("");
          $('#deviceptype').select2('val',"");
          $('#devicename').val("");
          $('#devicefamily').select2('val',"");
          $('#deviceseries').select2('val',"");
          $('#devregid').val("");
          IDS = "";
     });
     $('#btnseriesregclear').click(function(){
          $('#hdseriesreg').val("ADD");
          $('#Seriesfamily').select2('val',"");
          $('#seriesname').val("");
          $('#seriesregid').val("");
          IDS = "";
     });
     $('#btnmodregclear').click(function(){
          $('#hdmodreg').val("ADD");
          $('#mod').val("");
          $('#modfamily').select2('val',"");
          $('#modregid').val("");
          IDS = "";
     });
     $('#btntargetregclear').click(function(){
          $('#hdmodreg').val("ADD");
          $('#target-datefrom').val("");
          $('#target-dateto').val("");
          $('#targetyield').val("");
          $('#targetdppm').val("");
          $('#targetid').val("");
          IDS = "";
     });
}
function Checkboxes(){
     $('.checkAllitems').change(function(){
          if($('.checkAllitems').is(':checked')){
               $('.deleteAll-task').removeClass("disabled");
               $('input[name=checkitem]').parents('span').addClass("checked");
               $('input[name=checkitem]').prop('checked',this.checked);
               $('.edit-task').addClass("disabled");
               
          }else{
               $('input[name=checkitem]').parents('span').removeClass("checked");
               $('input[name=checkitem]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
               $('.edit-task').addClass("disabled");
          }         
     });

     $('.checkboxes').change(function(){
          $('input[name=checkAllitem]').parents('span').removeClass("checked");
          $('input[name=checkAllitem]').prop('checked',false);
          var tray = [];
          $(".checkboxes:checked").each(function () {
               tray.push($(this).val());
               $('.checkAllitems').prop('checked',false)
          
          });
          
          if($('.checkboxes').is(':checked')){
               $('.deleteAll-task').removeClass("disabled");
               $('#add').addClass("disabled");
          }else{
               $('input[name=checkAllitem]').parents('span').removeClass("checked");
               $('input[name=checkAllitem]').prop('checked',false);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
          }
     
     });
     $('.checkAllitemspo').change(function(){
          if($('.checkAllitemspo').is(':checked')){
               $('input[name=checkitempo]').parents('span').addClass("checked");
               $('input[name=checkitempo]').prop('checked',this.checked);
               
          }else{
               $('input[name=checkitempo]').parents('span').removeClass("checked");
               $('input[name=checkitempo]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
               $('.edit-task').addClass("disabled");
          }         
     });

    
     $('.checkAllitemsdevice').change(function(){
          if($('.checkAllitemsdevice').is(':checked')){
               $('input[name=checkitemdevice]').parents('span').addClass("checked");
               $('input[name=checkitemdevice]').prop('checked',this.checked);
               
          }else{
               $('input[name=checkitemdevice]').parents('span').removeClass("checked");
               $('input[name=checkitemdevice]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
               $('.edit-task').addClass("disabled");
          }         
     });

     $('.checkboxesdevice').change(function(){
          $('input[name=checkAllitemdevice]').parents('span').removeClass("checked");
          $('input[name=checkAllitemdevice]').prop('checked',false);
          var tray = [];
          $(".checkboxesdevice:checked").each(function () {
               tray.push($(this).val());
               $('.checkAllitemsdevice').prop('checked',false)
          
          });
          
          if($('.checkboxesdevice').is(':checked')){
               $('.deleteAll-task').removeClass("disabled");
               $('#add').addClass("disabled");
          }else{
               $('input[name=checkAllitemdevice]').parents('span').removeClass("checked");
               $('input[name=checkAllitemdevice]').prop('checked',false);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
          }    
     });

     $('.checkAllitemsseries').change(function(){
          if($('.checkAllitemsseries').is(':checked')){
               $('input[name=checkitemseries]').parents('span').addClass("checked");
               $('input[name=checkitemseries]').prop('checked',this.checked);
               
          }else{
               $('input[name=checkitemseries]').parents('span').removeClass("checked");
               $('input[name=checkitemseries]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
               $('.edit-task').addClass("disabled");
          }         
     });

     $('.checkboxesseries').change(function(){
          $('input[name=checkAllitemseries]').parents('span').removeClass("checked");
          $('input[name=checkAllitemseries]').prop('checked',false);
          var tray = [];
          $(".checkboxesseries:checked").each(function () {
               tray.push($(this).val());
               $('.checkAllitemsseries').prop('checked',false)
          
          });
          
          if($('.checkboxesseries').is(':checked')){
               $('.deleteAll-task').removeClass("disabled");
               $('#add').addClass("disabled");
          }else{
               $('input[name=checkAllitemseries]').parents('span').removeClass("checked");
               $('input[name=checkAllitemseries]').prop('checked',false);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
          }    
     });

     $('.checkAllitemsmod').change(function(){
          if($('.checkAllitemsmod').is(':checked')){
               $('input[name=checkitemmod]').parents('span').addClass("checked");
               $('input[name=checkitemmod]').prop('checked',this.checked);
               
          }else{
               $('input[name=checkitemmod]').parents('span').removeClass("checked");
               $('input[name=checkitemmod]').prop('checked',this.checked);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
               $('.edit-task').addClass("disabled");
          }         
     });

     $('.checkboxesmod').change(function(){
          $('input[name=checkAllitemmod]').parents('span').removeClass("checked");
          $('input[name=checkAllitemmod]').prop('checked',false);
          var tray = [];
          $(".checkboxesmod:checked").each(function () {
               tray.push($(this).val());
               $('.checkAllitemsmod').prop('checked',false)
          
          });
          
          if($('.checkboxesmod').is(':checked')){
               $('.deleteAll-task').removeClass("disabled");
               $('#add').addClass("disabled");
          }else{
               $('input[name=checkAllitemmod]').parents('span').removeClass("checked");
               $('input[name=checkAllitemmod]').prop('checked',false);
               $('.deleteAll-task').addClass("disabled");
               $('#add').removeClass("disabled");
          }    
     });
}
function EditButtons(){
     $('.edit-task').on('click', function(e) {
          var edittext = $(this).val().split('|');
          var editid = edittext[0];
          var pono = edittext[1];
          var poqty = edittext[2];
          var device = edittext[3];
          var series = edittext[4];
          var family = edittext[5];
          var toutput = edittext[6];
          var treject = edittext[7];
          var twoyield = edittext[8];

          $('#masterid').val(editid);
          $('.updatetitle').html('Update Yielding Summary');
          $('#updateyield_Modal').modal('show');
          $('#pono2').val(pono);
          $('#poqty2').val(poqty);
          $('#device2').val(device);
          $('#series2').val(series);
          $('#family2').val(family);
          $('#toutput2').val(toutput);
          $('#treject2').val(treject);
          $('#twoyield2').val(twoyield);
          $('#masterid').val(editid);        

          $('#name').keyup(function(){
             $('#er1').html(""); 
          });
          $('#desc').keyup(function(){
             $('#er2').html(""); 
          });
          $('#val').keyup(function(){
             $('#er3').html(""); 
          });
     });

     $('.edit-poreg').click(function(){
          $('#poregstatus').val("EDIT");
          var editsearch = $(this).val();
          $('#poregid').val(editsearch);
          $.ajax({
               url: "{{ url('/editporeg') }}",
               method: 'get',
               data:  { 
                    editsearch : editsearch, 
               },
               
          }).done(function(data, textStatus, jqXHR) {
               $('#pono').val(data[0]['pono']);
               $('#poquantity').val(data[0]['poqty']);
               $('#podevice').val(data[0]['device']); 
          }).fail(function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown+'|'+textStatus);
          });
     });

     $('.edit-devicereg').click(function(){
          $('#devregstatus').val("EDIT");
          var editsearch = $(this).val();
          $('input[name=devregid]').val(editsearch);
          $.ajax({
               url: "{{ url('/editdevicereg') }}",
               method: 'get',
               data:  { 
                    editsearch : editsearch, 
               },
               
          }).done(function(data, textStatus, jqXHR) {
               $('#devicepono').val(data[0]['pono']);
               $('#devicename').val(data[0]['devicename']);
               $('#devicefamily').select2('val',data[0]['family']);
               $('#deviceseries').select2('val',data[0]['series']); 
               $('#deviceptype').select2('val',data[0]['ptype']);
          }).fail(function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown+'|'+textStatus);
          });
     });

     $('.edit-seriesreg').click(function(){
          $('#seriesregstatus').val("EDIT");
          var editsearch = $(this).val();
          $('#seriesregid').val(editsearch);
          $.ajax({
               url: "{{ url('/editseriesreg') }}",
               method: 'get',
               data:  { 
                    editsearch : editsearch, 
               },
               
          }).done(function(data, textStatus, jqXHR) {
               $('#Seriesfamily').select2('val',data[0]['family']);
               $('#seriesname').val(data[0]['series']);
              
          }).fail(function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown+'|'+textStatus);
          });
     });

     $('.edit-modreg').click(function(){
          $('#modregstatus').val("EDIT");
          var editsearch = $(this).val();
          $('#modregid').val(editsearch);
          $.ajax({
               url: "{{ url('/editmodreg') }}",
               method: 'get',
               data:  { 
                    editsearch : editsearch, 
               },
               
          }).done(function(data, textStatus, jqXHR) {
               $('#mod').val(data[0]['mod']);
               $('#modfamily').select2('val',data[0]['family']);
          }).fail(function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown+'|'+textStatus);
          });
     });

     $('.edit-targetreg').click(function(){
          $('#targetstatus').val("EDIT");
          var editsearch = $(this).val();
          $('#targetid').val(editsearch);
          $.ajax({
               url: "{{ url('/edittargetreg') }}",
               method: 'get',
               data:  { 
                    editsearch : editsearch, 
               },
               
          }).done(function(data, textStatus, jqXHR) {
               console.log(data);
               $('#target-datefrom').val(data[0]['datefrom']);
               $('#target-dateto').val(data[0]['dateto']);
               $('#targetyield').val(data[0]['yield']);
               $('#targetdppm').val(data[0]['dppm']);
               $('#targetptype').select2('val',data[0]['ptype']); 
          }).fail(function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown+'|'+textStatus);
          });
     });
}

function ButtonClosed(){
     $('#btn_poclose').click(function(){
          window.location.href = "{{ url('/yieldperformance') }}";
     });
     $('#btn_devclose').click(function(){
          window.location.href = "{{ url('/yieldperformance') }}";
     });
     $('#btn_seriesclose').click(function(){
          window.location.href = "{{ url('/yieldperformance') }}";
     });
     $('#btn_modclose').click(function(){
          window.location.href = "{{ url('/yieldperformance') }}";
     });
     $('#btn_targetclose').click(function(){
          window.location.href = "{{ url('/yieldperformance') }}";
     });
}

//CER
function DeletePOcheck(){
var tray = [];
     $(".checkboxespo:checked").each(function () {
          tray.push($(this).val());
     });
     var traycount =tray.length;
     $('#tblforporeg').html("");


     jQuery.ajax({
             url: "{{ url('/deleteporeg') }}",
             type: 'GET',
             dataType: 'json',
             data:  { 
                    tray : tray, 
                    traycount : traycount
               },
             success: function(returnData) {
               if(returnData == 1)
               {
                    msg("Selected PO Deleted","success");
                    clearALLfields();
               }
               else{
                    msg("An Error Occurs","failed");
                    clearALLfields();
               }
               getDatatable('tbl_poregistration',"{{ url('/get-poregistration')}}",dataColumn,[],0);

          }
     });
          
}


function clearALLfields(){
     $('#pono').val("");
     $('#podeviceCode').val("");
     $('#podevice').val("");
     $('#poquantity').val("");
     $('#devicefamily').val("");
     $('#deviceseries').val("");
     $('#deviceptype').val("");
}


function getFamilyList(s){
   var select = $('#'+s);
   $.ajax({
          url: "{{ url('/getFamilyDropDown') }}",
          type: "get",
          dataType: "json",
          success: function (returndata) {
               select.empty();
               select.append($('<option></option>').val(0).html("- SELECT -"));
               if (returndata.length > 0) {
                  for(var x=0;x<returndata.length;x++){
                         select.append($('<option></option>').val(returndata[x].description).html(returndata[x].description));
                  }
               }
          }
   });
}

function getSeriesList(){
   var select = $('#deviceseries');
   $.ajax({
          url: "{{ url('/getSeriesDropdown') }}",
          type: "get",
          dataType: "json",
          success: function (returndata) {
               select.empty();
               select.append($('<option></option>').val(0).html("- SELECT -"));
               if (returndata.length > 0) {
                  for(var x=0;x<returndata.length;x++){
                         select.append($('<option></option>').val(returndata[x].description).html(returndata[x].description));
                  }
               }
          }
   });
}

function getProductList(){
   var select = $('#deviceptype');
   $.ajax({
          url: "{{ url('/getProdtypeDropdown') }}",
          type: "get",
          dataType: "json",
          success: function (returndata) {
               select.empty();
               select.append($('<option></option>').val(0).html("- SELECT -"));
               if (returndata.length > 0) {
                  for(var x=0;x<returndata.length;x++){
                         select.append($('<option></option>').val(returndata[x].description).html(returndata[x].description));
                  }
               }
          }
   });
}

function getProductTargetList(s){
   var select = $('#'+s);
   $.ajax({
          url: "{{ url('/getProdtypeDropdown') }}",
          type: "get",
          dataType: "json",
          success: function (returndata) {
               select.empty();
               select.append($('<option></option>').val(0).html("- SELECT -"));
               if (returndata.length > 0) {
                  for(var x=0;x<returndata.length;x++){
                         select.append($('<option></option>').val(returndata[x].description).html(returndata[x].description));
                  }
               }
          }
   });
}
$( function() {
$('body').on('keydown', '.enter', function(e) {
        var self = $(this)
            , form = self.parents('form:eq(0)')
            , focusable
            , next
            ;
        if (e.keyCode == 13) {
            focusable = form.find('.enter').filter(':visible');
            next = focusable.eq(focusable.index(this)+1);

            if (next.length) {
                next.focus();
            } else {
                form.submit();
            }
            return false;
        }
    });
}

</script>
@endpush