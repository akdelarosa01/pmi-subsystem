var target_arr = [];


$( function(e) {
  DatePickers();
  getOutputs();
  checkAllCheckboxesInTable('.checkAllitemstarget','.checkboxestarget');

  $("body").on("click",".edit-targetreg",function(e){
          var editsearch = $(this).val();
          $.ajax({
               url: edittargetreg,
               method: 'get',
               data:  { 
                    editsearch : editsearch, 
               }, 
          }).done(function(data, textStatus, jqXHR) {
               $('#datefrom').val(data[0]['datefrom']);
               $('#id').val(data[0]['id']);
               $('#dateto').val(data[0]['dateto']);
               $('#yield').val(data[0]['yield']);
               $('#dppm').val(data[0]['dppm']);
               $('#ptype').val(data[0]['ptype']); 
          }).fail(function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown+'|'+textStatus);
          });
  });

});  

function getOutputs() {
    target_arr = [];
    $.ajax({
        url: getOutputsURL,
        type: 'GET',
        dataType: 'JSON',
        data: {_token: token},
    }).done(function(data, textStatus, xhr){
        console.log(data);
        target_arr = data;
        makeDataTable(target_arr);
    }).fail( function(xhr, textStatus, errorThrown) {
        msg(errorThrown,textStatus);
    })
    .always(function() {
        console.log("complete");
    });
    
}
//Display table
function makeDataTable(arr) {
  $('#modregtable').dataTable().fnClearTable();
    $('#modregtable').dataTable().fnDestroy();
    $('#modregtable').dataTable({
        data: arr,
        bLengthChange : false,
        scrollY: "200px",
        paging: false,
        searching: false,
        columns: [ 
          { data: function(x) {
                return "<input type='checkbox' class='input-sm checkboxestarget' value='"+x.id+"'>";
            }, searchable: false, orderable: false },
             { data: function(x) {
                return "<button class='btn btn-sm btn-primary edit-targetreg' value='"+x.id+"'><i class='fa fa-edit'></i></button>";
            }, searchable: false, orderable: false },
            {data:'datefrom'},
            {data:'dateto'},
            {data:'yield'},
            {data:'dppm'},
            {data:'ptype'},
        ]
    });
}

function DatePickers(){
     $('#datefrom').datepicker();
     $('#dateto').datepicker();
     $('#datefrom').on('change',function(){
          $(this).datepicker('hide');
     });
     $('#dateto').on('change',function(){
          $(this).datepicker('hide');
     });
}

function removetargetreg(){
  var tray = [];
  $(".checkboxestarget:checked").each(function () {
    tray.push($(this).val());
  });
  var traycount =tray.length;
  $.ajax({
      url: deleteTarget,
      method: 'get',
      data: {tray:tray,traycount:traycount},
      success:function(data){
          msg("Target Yield Deleted","success"); 
          target_arr = data;
          makeDataTable(target_arr);
          getDatatable('modreg-table',getTargetTable,dataColumnYieldTarget,[],0);}
     });
}
function targetregistration(){
     var datefrom = $('#datefrom').val();
     var dateto = $('#dateto').val();
     var yield = $('#yield').val();
     var dppm = $('#dppm').val();
     var ptype = $('#ptype').val();
     var id = $('#id').val();
     if(datefrom == ""){     
        $('#er_target-datefrom').html("Date From field is empty"); 
        $('#er_target-datefrom').css('color', 'red');       
        return false;  
     }
     if(dateto == ""){     
        $('#er_target-dateto').html("Date To field is empty"); 
        $('#er_target-dateto').css('color', 'red');       
        return false;  
     }
     if(yield == ""){     
        $('#er_targetyield').html("Target Yield field is empty"); 
        $('#er_targetyield').css('color', 'red');       
        return false;  
     }
     if(dppm == ""){     
        $('#er_targetdppm').html("Target dppm field is empty"); 
        $('#er_targetdppm').css('color', 'red');       
        return false;  
     }
     if(ptype == ""){     
        $('#er_targetptype').html("Product Type field is empty"); 
        $('#er_targetptype').css('color', 'red');       
        return false;  
     }
     jQuery.ajax({
      url: targetInsert,
      type: 'POST',
      dataType: 'json',
      data:  //$(this).serialize(),
              {_token: token,
              id:id, 
              datefrom:datefrom,
              dateto:dateto,
              yield:yield,
              dppm:dppm,
              ptype:ptype},
      success:function(returnData){
        msg(returnData.msg,returnData.status); 
        target_arr = returnData.data;
        makeDataTable(target_arr);
        $("#formtarget")[0].reset(); 
        },
      error: function(xhr, textStatus, errorThrown) {
        alert(errorThrown);
      }
     });
}