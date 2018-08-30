var po_reg_arr = [];

$(function() {
    loadDevice(loadporegdevice);
    makePOregTable(po_reg_arr)
    checkAllCheckboxesInTable('.check_all_po_reg','.check_item_po_reg');

    $('#tbl_device').on('click','.updatesinglebtn', function() {
       
       // getFamilyList();
       // getSeriesList();
       // getItems();
        $('#podeviceCode').prop('readonly',true);
        $('#poreg_Modal').modal('show');
        $('#pono').val($(this).attr('data-pono'));
        $('#podeviceCode').val($(this).attr('data-device_code'));
        $('#podevice').val($(this).attr('data-device_name'));
        $('#poquantity').val($(this).attr('data-poqty'));
        $('#family').val($(this).attr('data-family'));
        $('#deviceseries').val($(this).attr('data-series'));
        $('#deviceptype').val($(this).attr('data-prod_type'));
        $('#poregstatus').val('ADD');
        
        getDropdowns();
    });

    $('.group-checkable').on('change', function(e) {
        $('input:checkbox.chk').not(this).prop('checked', this.checked);
    });

    $('#update').on('click', function(e) {
        update();
    });

    $('#btn_save_po_reg').on('click', function() {
        poregistration();
    });

    $('#btn_remove_po_reg').on('click', function() {
        
    });
});

function getItems(id,bid) {
    var data = {
    _token: token,
        id : id
    };

    $.ajax({
        url: displayporegitem,
        type: "GET",
        data: data,
    }).done(function(data, textStatus, jqXHR) {
        var item = '',device_code = '',device_name = '', family = '',series = '',product_type = '';
        $.each(data, function(index, x) {
            device_code = x.device_code;
            device_name = x.device_name;
            family = x.family;
            series = x.series;
            product_type = x.product_type;
        });

        $('#podeviceCode').prop('disabled',true);
        $('#podeviceCode').val(device_code);
        $('#podevice').val(device_name);
        $('#family').val(family);
        $('#deviceseries').val(series);
        $('#deviceptype').val(product_type);
    }).fail( function(data, textStatus, jqXHR) {
        $('#loading').modal('hide');
        failedMsg("There's some error while processing.");
    });
}

function getDropdowns() {
    var data = {
        _token: token
    };

    $.ajax({
        url: getdropdownlang,
        type: "GET",
        data: data
    }).done(function(data,textStatus,jqXHR) {
        $('#family').select2({
            data:data.family,
            placeholder: "Select --"
        });
        $('#deviceseries').select2({
            data:data.series,
            placeholder: "Select --"
        });
        $('#deviceptype').select2({
            data:data.product_type,
            placeholder: "Select --"
        });
    }).fail(function(data,textStatus,jqXHR) {
        msg("There's some error while processing.",'failed');
    });
}


function getFamilyList(){
    var select = $('#family');
    $.ajax({
        url: loadfamilylist,
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
      url: loadserieslist,
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

function loadDevice(url) {
    $('#tbl_device').dataTable().fnClearTable();
    $('#tbl_device').dataTable().fnDestroy();
    $('#tbl_device').DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: url,
        columns: [
            {data: function(data){
                    return '<input type="checkbox" class="chk" value="'+data.id+'" data-id="'+data.id+'" data-code="'+data.item+'"/>';
            },orderable: false, searchable:false, name:"id" },
            { data: 'pono', name: 'pono' },
            { data: 'device_code', name: 'device_code' },
            { data: 'device_name', name: 'device_name' },
            { data: 'poqty', name: 'poqty' },
            { data: 'family', name: 'family' },
            { data: 'series', name: 'series' },
            { data: 'prod_type', name: 'prod_type' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        aoColumnDefs: [
            {
                aTargets:[13], // You actual column with the string 'America'
                fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                    $(nTd).css('font-weight', '700');
                    if(sData == "Accepted") {
                        $(nTd).css('background-color', '#c49f47');
                        $(nTd).css('color', '#fff');
                    }
                    if(sData == "Rejected") {
                        $(nTd).css('background-color', '#cb5a5e');
                        $(nTd).css('color', '#fff');
                    }
                    if(sData == "On-going") {
                        $(nTd).css('background-color', '#3598dc');
                        $(nTd).css('color', '#fff');
                    }
                },
                defaultContent: '',
                targets: '_all'
            }
        ],
        order: [[0,'desc']]
    });
}

function searchstatus() {
    var token = "{{ Session::token() }}";
    loadDevice('{{url("/getdevicesearch")}}'+'?_token='+token+
                                                '&&from='+$('#from').val()+
                                                '&&to='+$('#to').val()+
                                                '&&recno='+$('#recno').val()+
                                                '&&status='+$('#status').val()+
                                                '&&itemno='+$('#itemno').val()+
                                                '&&lotno='+$('#lotno').val()+
                                                '&&invoice_no='+$('#invoice_no').val());
}

function getAllChecked() {
    /* declare an checkbox array */
    var chkArray = [];

    /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    $(".chk:checked").each(function() {
        chkArray.push($(this).val());
    });

    return chkArray;
}

function getAllCheckedItemCode() {
    /* declare an checkbox array */
    var chkArray = [];

    /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    $(".chk:checked").each(function() {
        chkArray.push($(this).attr('data-code'));
    });

    return chkArray;
}

function isCheck(element) {
    if(element.is(':checked')) {
        element.parent('tr').removeAttr('checked');
        element.prop('checked',false)
    }
}

function saveporeg() {
    $('#loading').modal('show');
    var url = "{{url('/savedevicedetails')}}";
    // if (requiredFields(':input.required') == true) {
        var token = "{{Session::token()}}";
        
        var data = {
            _token: token,
            pono: $('#pono').val(),
            device_code: $('#device_code').val(),
            device_name: $('#device_name').val(),
            poquantity: $('#poquantity').val(),
            family: $('#family').val(),
            series: $('#series').val(),
            product_type: $('#product_type').val(),
        };
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: data
        }).done( function(data,textStatus,jqXHR) {
            $('#loading').modal('hide');
            if (data.return_status == 'success') {
                msg(data.msg,'success');
                loadDevice("{{url('/getdevice')}}");
            }

        }).fail( function(data,textStatus,jqXHR) {
            $('#loading').modal('hide');
            msg("There's some error while processing.",'failed');
        });
    // } else {
    //     $('#loading').modal('hide');
    //     msg("Please fill out all required fields.",'failed');
    // }   
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

function poregistration(){
    $('#loading').show();
    var pono = $('#pono').val();
    var podeviceCode = $('#podeviceCode').val();
    var podevice = $('#podevice').val();
    var poquantity = $('#poquantity').val();
    var Family = $('#family').val();
    var Series = $('#deviceseries').val();
    var ProdType = $('#deviceptype').val();
    var editsearch = $('#hdporegid').val();
    var status = $('#poregstatus').val();//(typeof STATUS != 'undefined')?STATUS:"ADD";
    
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

    $.ajax({
        url: getpoypics,
        type: 'GET',
        dataType: 'json',
        data: {
            _token: token,
            po: pono
        },
    }).done(function(data, textStatus, xhr) {
        if (data > 0 && status == "ADD") {
            msg("PO number Already Exist","failed");
        } else {
            var id = (typeof IDs != 'undefined')?IDs:1;
            $.ajax({
                url: addpodata,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: token, 
                   id:id,
                   pono: pono,
                   podeviceCode: podeviceCode,
                   podevice:podevice,
                   poquantity:poquantity,
                   family:Family,
                   series:Series,
                   prodtype:ProdType,
                   status:status
                },
            }).done(function(data, textStatus, xhr) {
                msg(data.msg,data.status);
                po_reg_arr = data.po_reg;

                makePOregTable(po_reg_arr);
            }).fail(function(xhr, textStatus, errorThrown) {
                msg(errorThrown,textStatus);
            }).always(function() {
                $('#loading').hide();
            });
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        msg(errorThrown,textStatus);
    })
    .always(function() {
        $('#loading').hide();
    });
}

function makePOregTable(arr) {
    $('#tbl_poregistration').dataTable().fnClearTable();
    $('#tbl_poregistration').dataTable().fnDestroy();
    $('#tbl_poregistration').dataTable({
        data: arr,
        columns: [
            { data: function(x) {
                return "<input type='checkbox' class='check_item_po_reg' data-id='"+x.id+"' value='"+x.id+"'>";
            }, searchable: false, orderable: false },

            { data: function(x) {
                return "<button class='btn btn-sm btn-primary btn_edit_po_reg' "+
                                "data-pono='"+x.pono+"'"+
                                "data-device_code='"+x.device_code+"'"+
                                "data-device_name='"+x.device_name+"'"+
                                "data-poqty='"+x.poqty+"'"+
                                "data-family='"+x.family+"'"+
                                "data-series='"+x.series+"'"+
                                "data-prod_type='"+x.prod_type+"'"+
                                "data-id='"+x.id+"'>"+
                            "<i class='fa fa-edit'></i>"+
                        "</button>";
            }, searchable: false, orderable: false },

            { data: 'pono' },
            { data: 'device_code' },
            { data: 'device_name' },
            { data: 'poqty' },
            { data: 'family' },
            { data: 'series' },
            { data: 'prod_type' },
        ]
    });
}

function requiredFields(requiredClass) {
    var reqlength = $(requiredClass).length;
    var value = $(requiredClass).filter(function () {
        return this.value != '';
    });

    if (value.length !== reqlength) {
        return false;
    } else {
        console.log('true');
        return true;
    }
}

function update() {
    $('#loading').modal('show');
    var data = {
        _token : token,
    };
            
    $.ajax({
        url: loadypicsdevice,
        method: 'POST',
        data:  data,
    }).done( function(data, textStatus, jqXHR) {
        console.log(data)
        msg('Successfully updated.','success');
        loadDevice(loadporegdevice);
    }).fail( function(data, textStatus, jqXHR) {
        msg('There is an error while updating.','error');
    }).always( function() {
        $('#loading').modal('hide');
    });
}

    // $(document).ready(function(e) {
    //      // DatePickers();
    //      ButtonsClicked();
    //      Checkboxes();
    //      EditButtons();
    //      ButtonsClear();
    //      //ButtonClosed();
    //      getDatatable('tbl_yield',"{{ url('/getYieldPerformanceDT')}}",dataColumnYIELD,[],0);


    //      $('#btn_save_po_reg').on('click', function() {
    //           poregistration();
    //      });

    //      $('#modalsave').on('click', function() {
    //          DeletePOcheck();
    //      });

    //      $('#modaldeleteSeries').on('click', function() {
    //          removeseriesreg();
    //      });

    //      $('#modalsaveRemoveDreg').on('click', function() {
    //          removemodreg();
    //      });

        

    //      $('#ysf-icsocket').change(function(){
    //           if($('#ysf-icsocket').is(':checked')){
    //                $('#chose').val("true");

    //           }else{
    //               $('#chose').val("false");
    //           }         
    //      });




    //      $STATUS = "ADD";
    //      $IDS = "";
    //      $('#tbl_poregistration_body').on('click', '.edit-poreg', function(e) {
    //           e.preventDefault();
    //         //  alert($(this).attr('data-id'));
    //           $('#pono').val($(this).attr('data-pono'));
    //           $('#podeviceCode').val($(this).attr('data-device_code'));
    //           $('#podevice').val($(this).attr('data-device_name'));
    //           $('#poquantity').val($(this).attr('data-poqty')); 
    //           $('#devicefamily').val($(this).attr('data-Family')); 
    //           $('#deviceseries').val($(this).attr('data-Series')); 
    //           $('#deviceptype').val($(this).attr('data-Prod_type')); 
    //           IDs = $(this).attr('data-id');
    //           STATUS = "EDIT";    
    //      });

    //      $('#tbl_seriesregtable_body').on('click', '.edit-seriesreg', function(e) {
    //           e.preventDefault();
    //           $('#Seriesfamily').val($(this).attr('data-family'));
    //           $('#seriesname').val($(this).attr('data-series'));
    //           IDs = $(this).attr('data-id');
    //           STATUS = "EDIT";    
    //      });

    //      $('#tbl_MODtable_body').on('click', '.edit-modedit', function(e) {
    //           e.preventDefault();
    //           $('#modfamily').val($(this).attr('data-family'));
    //           $('#mod').val($(this).attr('data-mod'));
    //           IDs = $(this).attr('data-id');
    //           STATUS = "EDIT";    
    //      });

    //      $('#tblfortarget').on('click', '.edit-target', function(e) {
    //           e.preventDefault();
    //           $('#target-datefrom').val($(this).attr('data-datefrom'));
    //           $('#target-dateto').val($(this).attr('data-dateto'));
    //           $('#targetyield').val($(this).attr('data-yield'));
    //           $('#targetdppm').val($(this).attr('data-dppm'));
    //           $('#targetptype').val($(this).attr('data-ptype'));
    //           IDs = $(this).attr('data-id');
    //           STATUS = "EDIT";    
    //      });



             
    //      // FieldsValidations();

    //      // $('#ypsr-family').on('change',function(){
    //      //      $('#ypsr-seriesname').select2('val',"");
    //      //      var family = $('select[name=ypsr-family]').val();
    //      //      $('#ypsr-seriesname').html("");
    //      //      $.post("{{ url('/devreg_get_series') }}",
    //      //      {
    //      //           _token:$('meta[name=csrf-token]').attr('content'),
    //      //           family:family 
    //      //      }).done(function(data, textStatus, jqXHR){
    //      //           console.log(data);
    //      //           $.each(data,function(i,val){
    //      //                var sup = '';
    //      //                switch(family) {
    //      //                     case "BGA":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "BGA-FP":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "LGA":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "PGA":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "PGA-LGA":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "PUS":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "Probe Pin":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "QFN":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "Socket No.2":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "SOJ":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                     case "TSOP":
    //      //                          var sup = '<option value="'+val.series+'">'+val.series+'</option>';
    //      //                          break;
    //      //                    default:
    //      //                          var sup = '<option value=""></option>';
    //      //                }
                             
    //      //                //var option = '<option value="'+val.supplier'">'+val.supplier'</option>';
    //      //                var option = sup;
    //      //                $('#ypsr-seriesname').append(option);
    //      //           });
    //      //      });
    // });

     
//});//end of script-------------------------------------------------------------------------------------
