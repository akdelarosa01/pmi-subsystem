<?php
/*******************************************************************************
     Copyright (c) Company Nam All rights reserved.

     FILE NAME: materialreceiving.blade.php
     MODULE NAME:  3006 : WBS - Material Receiving
     CREATED BY: AK.DELAROSA
     DATE CREATED: 2016.07.01
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.07.01    AK.DELAROSA      Initial Draft
     100-00-02   1     2016.07.05    MESPINOSA        Material Receving Implementation.
*******************************************************************************/
?>



<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script language="javascript" type="text/javascript">

          /*
          * Material Receiving START
          */
          $( document ).ready(function(e)
          {
               $("#receivingno").keyup(function(event){
                    var mat = $('#receivingno').val();
                    if(event.keyCode == 13)
                    {
                         window.location.href= "<?php echo e(url('/materialreceiving?page=')); ?>" + 'MAT&id=' + mat;
                    }
               });

               var queryString = new Array;
               var query = location.search.substr(1);
               var result = {};

               query.split("&").forEach(function(part)
               {
                    var item = part.split("=");

                    if(decodeURIComponent(item[0])=='action' && (decodeURIComponent(item[1])=='ADD' || decodeURIComponent(item[1])=='EDIT'))
                    {
                         var rowCount = $('#sample_2 tr').length;
                         if(rowCount >= 2)
                         {
                              $("#validInvoiceModal").modal("show");
                         }
                         else
                         {
                              if($('#existingReceiveNo').val() == '')
                              {
                                   $("#invalidInvoiceModal").modal("show");
                              }
                              else
                              {
                                   $("#existingInvoiceModal").modal("show");
                              }
                         }
                    }
               });

               $('#receivingdate').datepicker({
                       "setDate": new Date(),
                       "autoclose": true
               });

               $('#add_inputItemNo').on('change', function()
               {
                    var values = $(this).val().split('|');

                    if(values.length = 3)
                    {
                         $("#add_inputLocation").val(values[2]);
                    }
               });

/*               $('#edit_inputItemNo').on('change', function()
               {
                    var values = $(this).val().split('|');

                    if(values.length = 3)
                    {
                         $("#edit_inputLocation").val(values[2]);
                    }
               });*/
          });

          $(function()
          {
               // add multiple select / deselect functionality
               $("#checkbox_iqc").click(function ()
               {

                    if(this.checked)
                    {
                         $('input[name=iqc_check]').parents('span').addClass("checked");
                         $("input[name=iqc_check]").prop('checked', this.checked);
                    }
                    else
                    {
                         $('input[name=iqc_check]').parents('span').removeClass("checked");
                         $("input[name=iqc_check]").prop('checked', this.checked);
                    }
               });

               // if all checkbox are selected, check the checkbox_iqc checkbox
               // and viceversa
               $(".iqc_check").click(function()
               {
                    if($(".iqc_check").length == $(".iqc_check:checked").length)
                    {
                         $('input[name=checkbox_iqc]').parents('span').addClass("checked");
                         $("input[name=checkbox_iqc]").prop('checked', this.checked);
                    }
                    else
                    {
                         $('input[name=checkbox_iqc]').parents('span').removeClass("checked");
                         $("input[name=checkbox_iqc]").prop('checked', this.checked);
                    }

               });
          });

          function getrecord(val)
          {
               var id = 0;
               switch(val)
               {
                 case ('MIN'):
                 id = 1;
                 break;
                 case ('PRV'):
                 id = parseInt($('#recid').val());
                 break;
                 case ('NXT'):
                 id = parseInt($('#recid').val());
                 break;
                 case ('MAX'):
                 id = -1;
                 break;
                 case ('INV'):
                 id = 0;
                 break;
                 default:
                 id = 1;
                 break;
            }
            window.location.href= "<?php echo e(url('/materialreceiving?page=')); ?>" + val + '&id=' + id;
       }

       function saverecord()
       {
          var mat_arr = new Array;
          var obj_data = new Object;
          var foriqcitem = new Array;
          var foriqcitem_add = new Array;
          var itemno_arr = new Array;
          var itemdesc_arr = new Array;
          var qty_arr = new Array;
          var box_arr = new Array;
          var boxqty_arr = new Array;
          var lotno_arr = new Array;
          var location_arr = new Array;
          var supplier_arr = new Array;
          var cnt = 0;
          var ctr = 0;
          var is_valid = true;
          var is_invoicematch = true;
          var action = $("#action").val();
          var has_sum_check = 0;

          var detailsUpdateflag  = $("#detailsUpdateflag").val();
          var batchUpdateflag  = $("#batchUpdateflag").val();

          mat_arr[0] = $('#receivingno').val();
          mat_arr[1] = $("#receivingdate").val();
          mat_arr[2] = $("#invoiceno").val();
          mat_arr[3] = $("#invoicedate").val();
          mat_arr[4] = $("#palletno").val();
          mat_arr[5] = $("#totalqty").val();
          mat_arr[6] = $("#totalamt").val();
          mat_arr[7] = $("#status").val();
          mat_arr[8] = $("#createdby").val();
          mat_arr[9] = $("#createddate").val();
          mat_arr[10] = $("#updatedby").val();
          mat_arr[11] = $("#updateddate").val();

          if($.trim(mat_arr[1]) == ''
               || $.trim(mat_arr[2]) == ''
               || $.trim(mat_arr[3]) == ''
               || $.trim(mat_arr[4]) == '' )
          {
               is_valid = false;
          }

          if($("#invoiceno").val() != $("#hdninvoiceno").val())
          {
               is_invoicematch = false;
          }

          cnt = 0;
          $(".iqc_check").each(function()
          {
               mat_arr[12] = 1;
               var id = $(this).attr('name');
               if($(this).is(':checked'))
               {
                    foriqcitem[cnt] = $(this).val();
                    cnt++;
                    foriqcitem_add[ctr] = 1;
               }
               else
               {
                    foriqcitem_add[ctr] = 0;
               }
               ctr++
          });
               // alert(foriqcitem);

               cnt = 0;
               $(".inputItemNo").each(function()
               {
                    var id = $(this).attr('name');
                    obj_data[id] = $(this).text();
                    itemno_arr[cnt] = $.trim(obj_data[id]);
                    cnt++;
               });

               cnt = 0;
               $(".inputSupplier").each(function()
               {
                    var id = $(this).attr('name');
                    obj_data[id] = $(this).text();
                    supplier_arr[cnt] = $.trim(obj_data[id]);
                    cnt++;
               });


               cnt = 0;
               $(".inputQty").each(function()
               {
                    var id = $(this).attr('name');
                    obj_data[id] = $(this).text();
                    if(parseFloat(obj_data[id]))
                    {
                         qty_arr[cnt] = parseFloat($.trim(obj_data[id]));
                    }
                    else
                    {
                         is_valid = false;
                    }

                    cnt++;
               });

               cnt = 0;
               $(".inputBox").each(function()
               {
                    var id = $(this).attr('name');
                    obj_data[id] = $(this).text();
                    box_arr[cnt] = $.trim(obj_data[id]);
                    cnt++;
               });

               cnt = 0;
               $(".inputBoxQty").each(function()
               {
                    var id = $(this).attr('name');
                    obj_data[id] = $(this).text();
                    if(parseFloat(obj_data[id]))
                    {
                         boxqty_arr[cnt] = parseFloat($.trim(obj_data[id]));
                    }
                    else
                    {
                         is_valid = false;
                    }

                    cnt++;
               });

               cnt = 0;
               $(".inputLotNo").each(function()
               {
                    var id = $(this).attr('name');
                    obj_data[id] = $(this).text();
                    lotno_arr[cnt] = $.trim(obj_data[id]);
                    cnt++;
               });

               cnt = 0;
               $(".inputLocation").each(function()
               {
                    var id = $(this).attr('name');
                    obj_data[id] = $(this).text();
                    location_arr[cnt] = $.trim(obj_data[id]);
                    cnt++;
               });

               if(is_valid && is_invoicematch)
               {
                    $('#loading').modal('toggle');
                    switch(action)
                    {
                         case ('ADD'):
                              // alert('add');

                              $.post("<?php echo e(url('/wbsmat-save')); ?>",
                              {
                                   _token              : $('meta[name=csrf-token]').attr('content')
                                   , mat_arr           : mat_arr
                                   , itemno_arr        : itemno_arr
                                   , itemdesc_arr      : itemdesc_arr
                                   , qty_arr           : qty_arr
                                   , box_arr           : box_arr
                                   , boxqty_arr        : boxqty_arr
                                   , lotno_arr         : lotno_arr
                                   , location_arr      : location_arr
                                   , supplier_arr      : supplier_arr
                                   , detailsUpdateflag : detailsUpdateflag
                                   , batchUpdateflag   : batchUpdateflag
                                   , foriqcitem_add    : foriqcitem_add
                              })
                              .done(function(data)
                              {
                                   $('#loading').modal('toggle');
                                   // alert(data);
                                   $.alert('Material Receiving Added Successfully.',
                                   {
                                        position  : ['center', [-0.40, 0]],
                                        type      : 'success',
                                        closeTime : 2000,
                                        autoClose : true,
                                        id        :'alert_suc'
                                   });
                                   window.location.href= "<?php echo e(url('/materialreceiving?page=')); ?>" + 'MAX&id=-1';
                              })
                              .fail(function()
                              {
                                   $('#loading').modal('toggle');
                                   alert('fail');
                              });

                              break;

                              case('EDIT'):
                              // alert(detailsUpdateflag);
                              $.post("<?php echo e(url('/wbsmat-update')); ?>",
                              {
                                   _token              : $('meta[name=csrf-token]').attr('content')
                                   , mat_arr           : mat_arr
                                   , itemno_arr        : itemno_arr
                                   , itemdesc_arr      : itemdesc_arr
                                   , qty_arr           : qty_arr
                                   , box_arr           : box_arr
                                   , boxqty_arr        : boxqty_arr
                                   , lotno_arr         : lotno_arr
                                   , location_arr      : location_arr
                                   , supplier_arr      : supplier_arr
                                   , detailsUpdateflag : detailsUpdateflag
                                   , batchUpdateflag   : batchUpdateflag
                                   , foriqcitem_add    : foriqcitem_add
                                   , foriqcitem        : foriqcitem
                              })
                              .done(function(data)
                              {
                                   $('#loading').modal('toggle');
                                   // alert(data);
                                   $.alert('Material Receiving Updated Successfully.',
                                   {
                                        position  : ['center', [-0.40, 0]],
                                        type      : 'success',
                                        closeTime : 2000,
                                        autoClose : true,
                                        id        :'alert_suc'
                                   });
                                   window.location.href= "<?php echo e(url('/materialreceiving?page=')); ?>" + 'CUR&id=' + $('#recid').val();
                              })
                              .fail(function()
                              {
                                   $('#loading').modal('toggle');
                                   alert('fail');
                              });

                              break;

                              default:
                              // alert(action);

                              break;
                         }
                    }
                    else
                    {
                         if(is_invoicematch == false)
                         {
                              $("#mismatchInvoiceModal").modal("show");
                         }
                         else
                         {
                              $("#invalidInputDataModal").modal("show");
                         }

                    }
               }

               function setcontrol(action, item)
               {
               // $('#loading').modal('toggle');
               switch(action)
               {
                    case ('ADD'):
                    $("#receivingno").prop("disabled", true);
                    $("#btn_min").prop("disabled", true);
                    $("#btn_prv").prop("disabled", true);
                    $("#btn_nxt").prop("disabled", true);
                    $("#btn_max").prop("disabled", true);

                    $("#btn_edit").hide();
                    $("#btn_add").hide();
                    $("#btn_search").hide();
                    $("#btn_cancel").hide();
                    $("#btn_barcode").hide();
                    $("#btn_print_iqc").hide();
                    $("#btn_print").hide();

                    $("#invoiceno").removeAttr('disabled');
                    $("#btn_checkinv").removeAttr('disabled');
                    $("#palletno").removeAttr('disabled');
                    $("#receivingdate").removeAttr('disabled');

                      $("#btn_save").show();
                      $("#btn_discard").show();
                      $("#btn_delete_batch").show();
                      $("#btn_update_batch").show();
                      $("#btn_add_batch").show();

                         // Set header values to empty.
                         $("#receivingno").val("");
                         $("#receivingdate").datepicker("setDate", new Date());
                         // $("#receivingdate").val("");
                         $("#invoiceno").val("");
                         $("#invoicedate").val("");
                         $("#palletno").val("");
                         $("#totalqty").val("");
                         $("#totalamt").val("");
                         $("#status").val("");
                         $("#createdby").val("");
                         $("#createddate").val("");
                         $("#updatedby").val("");
                         $("#updateddate").val("");
                         $("#action").val("ADD");

                         $('input[name=checkbox_iqc]').parents('div').removeClass("disabled");
                         $('input[name=checkbox_iqc]').removeAttr('disabled');
                         $('input[name=iqc_check]').parents('div').removeClass("disabled");
                         $('input[name=iqc_check]').removeAttr('disabled');

                         var table = $('#sample_2').DataTable();
                         table
                         .clear()
                         .draw();
                         var table = $('#tbl_summary').DataTable();
                         table
                         .clear()
                         .draw();
                         var table = $('#tbl_batch').DataTable();
                         table
                         .clear()
                         .draw();

                      // document.getElementById('invoiceno').setAttribute("disabled","disabled");
                      break;

                      case ('EDIT'):

                      $("#receivingno").prop("disabled", true);
                      $("#btn_min").prop("disabled", true);
                      $("#btn_prv").prop("disabled", true);
                      $("#btn_nxt").prop("disabled", true);
                      $("#btn_max").prop("disabled", true);

                    $("#btn_edit").hide();
                    $("#btn_add").hide();
                    $("#btn_search").hide();
                    $("#btn_cancel").hide();
                    $("#btn_barcode").hide();
                    $("#btn_print_iqc").hide();
                    $("#btn_print").hide();

                      $("#invoiceno").removeAttr('disabled');
                      $("#btn_checkinv").removeAttr('disabled');
                      $("#palletno").removeAttr('disabled');
                      $("#receivingdate").removeAttr('disabled');
                      $("#btn_mdl_add").removeAttr('disabled');

                      $("#btn_save").show();
                      $("#btn_discard").show();
                      $("#btn_delete_batch").show();
                      $("#btn_all_batch").show();
                      $("#btn_update_batch").show();
                      $("#btn_add_batch").show();

                      $("#btn_discard").removeAttr('disabled');
                      $("#btn_add_batch").removeAttr('disabled');
                      $("#btn_delete_batch").removeAttr('disabled');
                      $("#btn_all_batch").removeAttr('disabled');
                      $("#btn_update_batch").removeAttr('disabled');


                      $('input[name=checkbox_iqc]').parents('div').removeClass("disabled");
                      $('input[name=checkbox_iqc]').removeAttr('disabled');
                      $('input[name=iqc_check]').parents('div').removeClass("disabled");
                      $('input[name=iqc_check]').removeAttr('disabled');

                      $("#action").val("EDIT");
                      break;
                      case ('CNL'):

                      if($("#status").val() == 'Cancelled')
                      {
                         $.alert('This transaction is already Cancelled.',
                         {
                              position  : ['center', [-0.40, 0]],
                              type      : 'error',
                              closeTime : 2000,
                              autoClose : true,
                              id        :'alert_suc'
                         });
                    }
                    else
                    {
                         $("#deleteModal").modal("show");
                         $('#delete_inputId').val($("#recid").val());
                    }
                    break;

                    case ('BATCH'):
                         $("#btn_add").hide();
                         $("#btn_cancel").hide();
                         $("#btn_print_iqc").hide();
                         $("#btn_print").hide();
                         $("#btn_search").hide();

                    break;
                    case ('NONBATCH'):
                         var action = $("#action").val();
                         var status = $("#status").val();
                         if(action == 'VIEW')
                         {
                              $("#btn_add").show();                            
                              $("#btn_search").show();
                              if(status == 'Cancelled')
                              {
                                   $("#btn_cancel").hide();
                                   $("#btn_print_iqc").hide();
                                   $("#btn_print").hide(); 
                              }
                              else
                              {
                                   $("#btn_cancel").show();
                                   $("#btn_print_iqc").show();
                                   $("#btn_print").show();    
                              }
                         }

                    break;

                    case ('PRNT'):

                    var values = item.split('|');
                    var item = values[0];
                    var isprinted = values[1];

                         // if(isprinted =='1')
                         // {
                     //       $.alert('This item is already Printed.',
                     //       {
                     //            position  : ['center', [-0.40, 0]],
                     //            type      : 'error',
                     //            closeTime : 2000,
                     //            autoClose : true,
                     //            id        :'alert_suc'
                     //       });
                         // }
                         // else
                         // {
                              $("#barcodeModal").modal("show");
                              $('#barcode_inputId').val($("#recid").val());

                              $('#barcode_inputItemNo').val(item);
                         // }

                         break;

                         case ('DIS'):
                         window.location.href= "<?php echo e(url('/materialreceiving?page=')); ?>" + 'MIN&id=1';
                         //window.location.reload();
                         break;
                         default:

                         $("#btn_cancel").removeAttr('disabled');
                         $("#btn_barcode").removeAttr('disabled');
                         $("#btn_print_iqc").removeAttr('disabled');
                         $("#btn_print").removeAttr('disabled');

                         $("#invoiceno").prop("disabled", true);
                         $("#btn_checkinv").prop("disabled", true);
                         $("#palletno").prop("disabled", true);
                         $("#receivingdate").prop("disabled", true);
                         $("#receivingno").prop("disabled", true);

                         $("#btn_save").prop("disabled", true);
                         $("#btn_discard").prop("disabled", true);
                         $("#btn_add_batch").prop("disabled", true);
                         $("#btn_delete_batch").prop("disabled", true);
                         $("#btn_all_batch").prop("disabled", true);
                         // $("#action").val("VIEW");
                         // document.getElementById('invoiceno').removeAttribute("disabled");
                         break;
                    }
               // $('#loading').modal('toggle');
          }

          function batchdata(action)
          {
               var is_valid = true;

               if(action == "ADD")
               {
                    if($.trim($("#add_inputItemNo").val()) == '-1'
                         || $.trim($("#add_inputQty").val()) == ''
                         || $('#add_inputBox').select2("val") == '-1'
                         || $.trim($("#add_inputBoxQty").val()) == ''
                         || $.trim($("#add_inputLotNo").val()) == '')
                    {
                         is_valid = false;
                    }

                    if(parseFloat($("#add_inputQty").val()))
                    {
                         $("#add_inputQty").val(parseFloat($.trim($("#add_inputQty").val())));
                    }
                    else
                    {
                         is_valid = false;
                    }

                    if(parseFloat($("#add_inputBoxQty").val()))
                    {
                         $("#add_inputBoxQty").val(parseFloat($.trim($("#add_inputBoxQty").val())));
                    }
                    else
                    {
                         is_valid = false;
                    }

                    if(is_valid)
                    {
                         var values = $("#add_inputItemNo").val().split('|');
                         var item = values[0];
                         var desc = values[1];

                         var count = parseInt($('#item_count').val()) + 1;
                         var newItem = '<tr id="tr_batch_item' + count + '">'
                         +'<td><input type="checkbox" class="checkboxes batch_item'+count+'" value="'+count+'"/></td>'
                         +'<td style=" padding-bottom: 0px;padding-top: 4px;padding-left: 20px;padding-right: 0px;" class="batch_item'+count+' inputBatchId"><button type="button" class="btn btn-primary btn-sm" onclick="editBatch('+count+')" value="sitem'+count+'"><i class="fa fa-edit"></i></button></td>'
                         +'<td>'+count+'</td>'
                         +'<td class="batch_item'+count+' inputItemNo" name="inputItemNo">'+ item +'</td>'
                         +'<td class="batch_item'+count+' inputItem" name="inputItem">'+ desc +'</td>'
                         +'<td class="batch_item'+count+' inputQty" name="inputQty">'+ $("#add_inputQty").val() +'</td>'
                         +'<td class="batch_item'+count+' inputBox" name="inputBox">'+ $('#add_inputBox').select2("val") +'</td>'
                         +'<td class="batch_item'+count+' inputBoxQty" name="inputBoxQty">'+ $("#add_inputBoxQty").val() +'</td>'
                         +'<td class="batch_item'+count+' inputLotNo" name="inputLotNo">'+ $("#add_inputLotNo").val() +'</td>'
                         +'<td class="batch_item'+count+' inputLocation" name="inputLocation">'+ $("#add_inputLocation").val() +'</td>'
                         +'<td class="batch_item'+count+' inputSupplier" name="inputSupplier">'+ $("#add_inputSupplier").val() +'</td>'
                         +'<td class="batch_item'+count+' inputIqc" name="inputIqc"><input type="checkbox" class="b_iqc_check" name="b_iqc_check" disabled /></td>'
                         +'<td class="batch_item'+count+' inputIsPrinted" name="inputIsPrinted"><input type="checkbox" class="isprinted" disabled /></td>'
                         +'<td><button type="button" class="btn grey-gallery input-sm" id="btn_sitemprint" disabled ><i class="fa fa-barcode"></i></button></td>'
                         +'</tr>';
                         $('#table_body').append(newItem);
                         $('#item_count').val(count);

                         $('#addbatchitem').modal('toggle');
                         $("#add_inputItemNo").val("");
                         $("#add_inputQty").val("");
                         $("#add_inputBox").val("");
                         $("#add_inputBoxQty").val("");
                         $("#add_inputLotNo").val("");
                         $("#add_inputLocation").val("");
                         $("#batchUpdateflag").val("1");
                    }
                    else
                    {
                         $('#addbatchitem').modal('toggle');
                         $("#invalidAddBatchModal").modal().shown();
                    }
               }
               else if (action == "DELETE")
               {
                    var obj_data = new Object;

                    $(".checkboxes").each(function()
                    {
                         var id = $(this).attr('name');
                         if($(this).is(':checked'))
                         {
                              obj_data[id] = $(this).val();
                              selecteditem = obj_data[id];
                              if( selecteditem.indexOf('x') >= 0)
                              {
                                   selecteditem = selecteditem.replace("x", "");
                              }
                              $('table#tbl_batch tr#'+'tr_batch_item' + selecteditem).remove();
                         }
                    });
                    $("#batchUpdateflag").val("1");
               }
               else if (action == "EDIT")
               {
                    if($.trim($("#edit_inputItemNo").val()) == ''
                         || $.trim($("#edit_inputQty").val()) == ''
                         || $('#edit_inputBox').select2("val") == '-1'
                         || $.trim($("#edit_inputBoxQty").val()) == ''
                         || $.trim($("#edit_inputLotNo").val()) == '')
                    {
                         is_valid = false;
                    }

                    if(parseFloat($("#edit_inputQty").val()))
                    {
                         $("#edit_inputQty").val(parseFloat($.trim($("#edit_inputQty").val())));
                    }
                    else
                    {
                         is_valid = false;
                    }

                    if(parseFloat($("#edit_inputBoxQty").val()))
                    {
                         $("#edit_inputQty").val(parseFloat($.trim($("#edit_inputQty").val())));
                    }
                    else
                    {
                         is_valid = false;
                    }

                    if(is_valid)
                    {
                         var values = $("#edit_inputItemNo").val().split('|');
                         var item = values[0];
                         var desc = values[1];

                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(4)').html(item);
                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(5)').html(desc);
                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(6)').html($("#edit_inputQty").val());
                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(7)').html($("#edit_inputBox").val());
                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(8)').html($("#edit_inputBoxQty").val());
                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(9)').html($("#edit_inputLotNo").val());
                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(10)').html($("#edit_inputLocation").val());
                         $('#tr_batch_item'+$("#editId").val()+' td:nth-child(11)').html($("#edit_inputSupplier").val());
                         $('#editbatchitem').modal('toggle');
                         $("#batchUpdateflag").val("1");
                    }
                    else
                    {
                         $('#editbatchitem').modal('toggle');
                         $("#invalidEditBatchModal").modal().shown();
                    }
               }
               else if(action == "ALL")
               {
                    $("#batchUpdateflag").val("1");
                    $('#loading').modal('toggle');
                    $.post("<?php echo e(url('/wbsmat-allbatch')); ?>",
                    {
                         _token      : $('meta[name=csrf-token]').attr('content'),
                         receivingno : $("#receivingno").val(),
                         invoiceno   : $("#invoiceno").val()
                    })
                    .done(function(datatable)
                    {
                              $('#loading').modal('toggle');
                              // alert(datatable);

                              var newcol = '';
                              var newItem = '';
                              var newcollink = '';

                              $('#table_body').html('');

                              var count = 0;

                              var arr = $.map(datatable, function(datarow)
                              {
                                   count ++;
                                   newItem = '<tr id="tr_batch_item' + count + '">'
                                   +'<td><input type="checkbox" class="checkboxes batch_item'+count+'" value="'+count+'"/></td>'
                                   +'<td style=" padding-bottom: 0px;padding-top: 4px;padding-left: 20px;padding-right: 0px;" class="batch_item'+count+' inputBatchId"><button type="button" class="btn btn-primary btm-sm" onclick="editBatch('+count+')" value="sitem'+count+'"><i class="fa fa-edit"></i></button></td>'
                                   +'<td>'+count+'</td>'
                                   +'<td class="batch_item'+count+' inputItemNo" name="inputItemNo">'+ datarow['item'] +'</td>'
                                   +'<td class="batch_item'+count+' inputItem" name="inputItem">'+ datarow['item_desc'] +'</td>'
                                   +'<td class="batch_item'+count+' inputQty" name="inputQty">'+ datarow['qty'] +'</td>'
                                   +'<td class="batch_item'+count+' inputBox" name="inputBox">'+ datarow['box'] +'</td>'
                                   +'<td class="batch_item'+count+' inputBoxQty" name="inputBoxQty">'+ datarow['box_qty'] +'</td>'
                                   +'<td class="batch_item'+count+' inputLotNo" name="inputLotNo">'+ datarow['lot_no'] +'</td>'
                                   +'<td class="batch_item'+count+' inputLocation" name="inputLocation">'+ datarow['location'] +'</td>'
                                   +'<td class="batch_item'+count+' inputSupplier" name="inputSupplier">'+ datarow['supplier'] +'</td>'
                                   +'<td class="batch_item'+count+' inputIqc" name="inputIqc"><input type="checkbox" class="b_iqc_check" name="b_iqc_check" disabled /></td>'
                                   +'<td class="batch_item'+count+' inputIsPrinted" name="inputIsPrinted"><input type="checkbox" class="isprinted" disabled /></td>'
                                   +'<td><button type="button" class="btn grey-gallery input-sm" id="btn_sitemprint" disabled ><i class="fa fa-barcode"></i></button></td>'
                                   +'</tr>';

                                   $('#table_body').append(newItem);
                              });
                         })
                    .fail(function()
                    {
                         $('#loading').modal('toggle');
                         alert('fail');
                    });
               }
          }

          function showAddBatchModal()
          {
               $('#add_inputBox').val('-1').trigger('change');
               $('#add_inputItemNo').val('-1').trigger('change');
               $("#addbatchitem").modal().shown();
          }

          function showAddBatch(action)
          {
               if(action=='ADD')
               {
                $('#invalidAddBatchModal').modal('toggle');
                $("#addbatchitem").modal().shown();
           }
           else
           {
                $('#invalidEditBatchModal').modal('toggle');
                $("#editbatchitem").modal().shown();
           }
      }

      function editBatch(count)
      {
          var obj_data = new Object;
          var selected_arr = new Array;
          var cnt = 0;

          $(".batch_item"+count).each(function()
          {
               var id = $(this).attr('name');
               if(cnt == 0)
               {
                    obj_data[id] = $(this).val();
               }
               else
               {
                    obj_data[id] = $(this).text();
               }
               selected_arr[cnt] = obj_data[id];
               cnt++;
          });

          $("#edit_inputBatchId").val($.trim(selected_arr[0]));
          $('#edit_inputItemNo').val($.trim(selected_arr[2]) + '|' + $.trim(selected_arr[3]))
          $("#edit_inputQty").val($.trim(selected_arr[4]));
          $('#edit_inputBox').val($.trim(selected_arr[5])).trigger('change');
          $("#edit_inputBoxQty").val($.trim(selected_arr[6]));
          $("#edit_inputLotNo").val($.trim(selected_arr[7]));
          $("#edit_inputLocation").val($.trim(selected_arr[8]));
          $("#edit_inputSupplier").val($.trim(selected_arr[9]));
          $("#editId").val(count);
          $('#editbatchitem').modal('show');
     }

         function searchData()
         {
           $("#searchModal").modal().shown();
      }

      function filterData(action)
      {
          var condition_arr = new Array;

          if(action == 'SRCH')
          {
               condition_arr[0] = $("#srch_from").val();
               condition_arr[1] = $("#srch_to").val();
               condition_arr[2] = $("#srch_invoiceno").val();
               condition_arr[3] = $("#srch_invfrom").val();
               condition_arr[4] = $("#srch_invto").val();
               condition_arr[5] = $("#srch_palletno").val();
          }
          else
          {
               $("#srch_from").val("")
               $("#srch_to").val("")
               $("#srch_invoiceno").val("")
               $("#srch_invfrom").val("")
               $("#srch_invto").val("")
               $("#srch_palletno").val("")

               condition_arr[0] = '';
               condition_arr[1] = '';
               condition_arr[2] = 'X';
               condition_arr[3] = '';
               condition_arr[4] = '';
               condition_arr[5] = 'X';
          }

          if($('#srch_open:checkbox:checked').length > 0)
          {
               condition_arr[6] ='1';
          }
          else
          {
               condition_arr[6] ='0';
          }

          if($('#srch_close:checkbox:checked').length > 0)
          {
               condition_arr[7] ='1';
          }
          else
          {
               condition_arr[7] ='0';
          }

          if($('#srch_cancelled:checkbox:checked').length > 0)
          {
               condition_arr[8] ='1';
          }
          else
          {
               condition_arr[8] ='0';
          }

          $.post("<?php echo e(url('/wbsmat-search')); ?>",
          {
               _token         : $('meta[name=csrf-token]').attr('content')
               , condition_arr: condition_arr
          })
          .done(function(datatable)
          {
                    // alert(datatable);

                    var newcol = '';
                    var newItem = '';
                    var newcollink = '';

                    $('#srch_tbl_body').html('');

                    var arr = $.map(datatable, function(datarow)
                    {
                         newcol = '';
                         $.each( datarow, function( ckey, value )
                         {
                              if(ckey == 'id')
                              {
                                   newcollink = '<td><a href="#" class="btn btn-primary btn-sm" onclick="findEdit('+value+')" value="'+ value +'">Find</a></td>';
                              }
                              else
                              {
                                   newcol = newcol + '<td>'+value+'</td>'
                              }
                         });
                         newItem = '<tr>'
                         + newcollink
                         + newcol
                         + '</tr>';
                         $('#srch_tbl_body').append(newItem);
                    });


               })
          .fail(function()
          {
               alert('fail');
          });
     }

     function findEdit(id)
     {
          window.location.href= "<?php echo e(url('/materialreceiving?page=')); ?>" + 'CUR&id=' + id;
     }

     function generateMrReport()
     {
          window.open("<?php echo e(url('/wbsmat-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
     }

     function generateIqcReport()
     {
          window.open("<?php echo e(url('/wbsmat-iqc-report?')); ?>" + 'id=' + $("#recid").val(), '_blank');
     }

          /*
          * Material Receiving END
          */
     </script>

<?php $__env->startSection('title'); ?>
     WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

     <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php $state = ""; $readonly = ""; ?>
     <?php foreach($userProgramAccess as $access): ?>
          <?php if($access->program_code == Config::get('constants.MODULE_CODE_WBS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
               <?php if($access->read_write == "2"): ?>
               <?php $state = "disabled"; $readonly = "readonly"; ?>
               <?php endif; ?>
          <?php endif; ?>
     <?php endforeach; ?>


     <div class="clearfix"></div>

     <!-- BEGIN CONTAINER -->
     <div class="page-container">
          <!-- BEGIN CONTENT -->
          <div class="page-content-wrapper">
               <div class="page-content">

                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                         <div class="col-md-12">
                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                              <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                              <div class="portlet box blue" >
                                   <div class="portlet-title">
                                        <div class="caption">
                                             <i class="fa fa-navicon"></i>  WBS
                                        </div>
                                   </div>
                                   <div class="portlet-body">

                                       <div class="row">
                                           <div class="col-xs-12 hidden-md hidden-lg hidden-xl">
                                               <div class="btn-group pull-right">
                                                   <button aria-expanded="false" class="btn green btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                                                       Material Receiving <i class="fa fa-angle-down"></i>
                                                   </button>
                                                   <ul class="dropdown-menu" role="menu">
                                                       <li class="active">
                                                           <a href="<?php echo e(url('/materialreceiving')); ?>">
                                                               <i class="fa fa-qrcode fa-2x font-blue-steel"></i> Material Receiving
                                                           </a>
                                                       </li>
                                                       <li>
                                                           <a href="<?php echo e(url('/iqc')); ?>">
                                                              <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
                                                           </a>
                                                       </li>
                                                       <li>
                                                           <a href="<?php echo e(url('/wbsmaterialkitting')); ?>">
                                                              <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
                                                          </a>
                                                       </li>
                                                       <li>
                                                           <a href="<?php echo e(url('/wbssakidashi')); ?>">
                                                              <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
                                                          </a>
                                                       </li>
                                                       <li>
                                                           <a href="<?php echo e(url('/wbspartsreceiving')); ?>">
                                                              <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
                                                          </a>
                                                       </li>
                                                       <li>
                                                           <a href="<?php echo e(url('/wbsphysicalinventory')); ?>">
                                                              <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
                                                          </a>
                                                       </li>
                                                       <li>
                                                           <a href="<?php echo e(url('/wbsprodmatrequest')); ?>">
                                                              <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
                                                          </a>
                                                       </li>
                                                       <li>
                                                           <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" >
                                                              <i class="fa fa-cubes fa-2x"></i> Warehouse Material Issuance
                                                          </a>
                                                       </li>
                                                   </ul>
                                               </div>
                                           </div>
                                       </div>

                                       <br>

                                       <div class="row">
                                           <div class="col-lg-2 col-md-2 hidden-xs hidden-sm">
                                               <div class="list-group">
                                                   <a href="<?php echo e(url('/materialreceiving')); ?>" class="list-group-item active">
                                                       <i class="fa fa-qrcode fa-2x"></i> Material Receiving
                                                   </a>
                                                   <a href="<?php echo e(url('/iqc')); ?>" class="list-group-item">
                                                      <i class="fa fa-search fa-2x font-blue"></i> IQC Inspection
                                                  </a>
                                                  <a href="<?php echo e(url('/wbsmaterialkitting')); ?>" class="list-group-item">
                                                      <i class="fa fa-clipboard fa-2x font-yellow-gold"></i> Material Kitting & Issuance
                                                  </a>
                                                  <a href="<?php echo e(url('/wbssakidashi')); ?>" class="list-group-item">
                                                      <i class="glyphicon glyphicon-paste fa-2x font-yellow-casablanca"></i> Sakidashi Issuance
                                                  </a>
                                                  <a href="<?php echo e(url('/wbspartsreceiving')); ?>" class="list-group-item">
                                                      <i class="glyphicon glyphicon-copy fa-2x font-purple"></i> Parts Receiving
                                                  </a>
                                                  <a href="<?php echo e(url('/wbsphysicalinventory')); ?>" class="list-group-item">
                                                      <i class="glyphicon glyphicon-list-alt fa-2x font-green"></i> Physical Inventory
                                                  </a>
                                                  <a href="<?php echo e(url('/wbsprodmatrequest')); ?>" class="list-group-item">
                                                      <i class="glyphicon glyphicon-save-file fa-2x font-blue-chambray"></i> Production Material Request
                                                  </a>
                                                  <a href="<?php echo e(url('/wbswhsmatissuance')); ?>" class="list-group-item">
                                                      <i class="fa fa-cubes fa-2x font-red-flamingo"></i> Warehouse Material Issuance
                                                  </a>
                                               </div>
                                           </div>

                                           <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                  <div class="row">
                                                       <form>
                                                            <?php echo csrf_field(); ?>

                                                            <div class="col-md-4">
                                                                 <div class="form-group row">
                                                                      <?php if(isset($mr_data)): ?>
                                                                      <?php foreach($mr_data as $mrdata): ?>
                                                                      <?php endforeach; ?>
                                                                      <?php endif; ?>
                                                                      <label class="control-label col-md-3" style="font-size:12px">Receiving No.</label>
                                                                      <div class="col-md-4">
                                                                           <input type="hidden" class="form-control input-sm" id="recid" name="recid" value="<?php if(isset($mrdata)){echo $mrdata->id; } ?>" />
                                                                           <input type="hidden" class="form-control input-sm" id="action" name="action" value="<?php if(isset($action)){echo $action; } ?>" />
                                                                           <input type="hidden" class="form-control input-sm" id="hdnreceivingno" name="hdnreceivingno" value="<?php if(isset($mrdata)){echo $mrdata->receive_no; } ?>" />
                                                                           <input type="hidden" class="form-control input-sm" id="detailsUpdateflag" name="detailsUpdateflag" value="<?php if(isset($detailsUpdateFlag)){echo $detailsUpdateFlag; } ?>" />
                                                                           <input type="hidden" class="form-control input-sm" id="batchUpdateflag" name="batchUpdateflag" value="<?php if(isset($batchUpdateFlag)){echo $batchUpdateFlag; } ?>" />
                                                                           <input type="hidden" class="form-control input-sm" id="isInvoiceValid" name="isInvoiceValid" value="<?php if(isset($isinvoicevalid)){echo $isinvoicevalid; } ?>" />
                                                                           <input type="hidden" class="form-control input-sm" id="existingInvoiceNo" name="existingInvoiceNo" value="<?php if(isset($existingInvoiceNo)){echo $existingInvoiceNo; } ?>" />
                                                                           <input type="hidden" class="form-control input-sm" id="existingReceiveNo" name="existingReceiveNo" value="<?php if(isset($existingReceiveNo)){echo $existingReceiveNo; }else{ echo '';} ?>" />
                                                                           <input type="text" class="form-control input-sm" id="receivingno" name="receivingno" value="<?php if(isset($mrdata)){echo $mrdata->receive_no; } ?>" <?php if($action!='VIEW'){ echo "disabled"; } ?> />
                                                                      </div>
                                                                      <div class="col-md-4" >
                                                                           <div class="btn-group btn-group-circle" style="width:200px;">
                                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('MIN'); " id="btn_min" class="btn blue input-sm" <?php if(isset($mrdata)){if($mrdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-backward"></i></button>
                                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('PRV'); " id="btn_prv" class="btn blue input-sm" <?php if(isset($mrdata)){if($mrdata->id == 1){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-backward"></i></button>
                                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('NXT'); " id="btn_nxt" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-forward"></i></button>
                                                                                <button type="button" style="font-size:12px" onclick="javascript: getrecord('MAX'); " id="btn_max" class="btn blue input-sm" <?php if(isset($ismax)){if($ismax){ echo 'disabled';} } ?> <?php if($action!='VIEW'){ echo "disabled"; } ?>><i class="fa fa-fast-forward"></i></button>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Receiving Date.</label>
                                                                      <div class="col-md-4">
                                                                           <input class="form-control input-sm date-picker" size="16" type="text" name="receivingdate" id="receivingdate" value="<?php if(isset($mrdata)){echo $mrdata->receive_date; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> />
                                                                      </div>
                                                                      <div class="col-md-5">
                                                                           <!-- <button type="button" class="btn btn-default">Previous</button> -->
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Invoice No.</label>
                                                                      <div class="col-md-4">
                                                                           <input type="text" class="form-control input-sm" id="invoiceno" name="invoiceno" value="<?php if(isset($mrdata)){ echo $mrdata->invoice_no; } ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> />
                                                                           <input type="hidden" class="form-control input-sm" id="hdninvoiceno" name="hdninvoiceno" value="<?php if(isset($mrdata)){echo $mrdata->invoice_no; } ?>" />
                                                                      </div>
                                                                      <div class="col-md-5">
                                                                           <button type="submit" class="btn btn-circle green input-sm" style="font-size:12px" id="btn_checkinv" <?php if($action=='VIEW'){ echo 'disabled'; } ?>><i class="fa fa-arrow-circle-down"></i></button>
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Invoice Date</label>
                                                                      <div class="col-md-4">
                                                                           <input class="form-control input-sm date-picker" size="16" type="text" name="invoicedate" id="invoicedate" value="<?php if(isset($mrdata)){echo $mrdata->invoice_date; } ?>"  <?php if($action=='VIEW'){ echo 'disabled'; } ?> />
                                                                      </div>
                                                                 </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Pallet No.</label>
                                                                      <div class="col-md-6">
                                                                           <input type="text" class="form-control input-sm" id="palletno" name="palletno" value="<?php if(isset($mrdata)){ if($mrdata->pallet_no != 'null') {echo $mrdata->pallet_no; }} ?>" <?php if($action=='VIEW'){ echo 'disabled'; } ?> />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Total Qty.</label>
                                                                      <div class="col-md-6">
                                                                           <input type="text" class="form-control input-sm" id="totalqty" name="totalqty" value="<?php if(isset($mrdata)){echo $mrdata->total_qty; } ?>" disabled="disable" />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Total Variance</label>
                                                                      <div class="col-md-6">
                                                                           <input type="text" class="form-control input-sm" id="totalamt" name="totalamt" value="<?php if(isset($mr_data_variance)){echo $mr_data_variance; } ?>" disabled="disable" />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Status</label>
                                                                      <div class="col-md-6">
                                                                           <input type="text" class="form-control input-sm" id="status" name="status" value="<?php if(isset($mrdata)){echo $mrdata->status; } ?>" disabled="disable" />
                                                                      </div>
                                                                 </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Created By</label>
                                                                      <div class="col-md-6">
                                                                           <input type="text" class="form-control input-sm" id="createdby" name="createdby" value="<?php if(isset($mrdata)){echo $mrdata->create_user; } ?>" disabled="disable" />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Created Date.</label>
                                                                      <div class="col-md-6">
                                                                           <input class="form-control input-sm date-picker" size="50" type="text" name="createddate" id="createddate" value="<?php if(isset($mrdata)){echo $mrdata->created_at; } ?>" disabled="disable"/>
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Updated By</label>
                                                                      <div class="col-md-6">
                                                                           <input type="text" class="form-control input-sm" id="updatedby" name="updatedby" value="<?php if(isset($mrdata)){echo $mrdata->update_user; } ?>" disabled="disable" />
                                                                      </div>
                                                                 </div>
                                                                 <div class="form-group row">
                                                                      <label class="control-label col-md-3" style="font-size:12px">Updated Date</label>
                                                                      <div class="col-md-6">
                                                                           <input class="form-control input-sm date-picker" size="50" type="text" name="updateddate" id="updateddate" value="<?php if(isset($mrdata)){echo $mrdata->updated_at; } ?>" disabled="disable"/>
                                                                      </div>
                                                                 </div>
                                                            </div>

                                                       </form>
                                                  </div>

                                                  <div class="row">
                                                       <div class="col-md-12">
                                                            <div class="tabbable-custom">
                                                                 <ul class="nav nav-tabs nav-tabs-lg" id="tabslist" role="tablist">
                                                                      <li class="active">
                                                                           <a href="#details" data-toggle="tab" onclick="javascript: setcontrol('NONBATCH'); " data-toggle="tab" aria-expanded="true" style="font-size:12px">Details</a>
                                                                      </li>
                                                                      <li>
                                                                           <a href="#summary" data-toggle="tab" onclick="javascript: setcontrol('NONBATCH'); " data-toggle="tab" aria-expanded="true" style="font-size:12px">Summary</a>
                                                                      </li>
                                                                      <li>
                                                                           <a href="#batch" data-toggle="tab" onclick="javascript: setcontrol('BATCH'); " data-toggle="tab" aria-expanded="true" style="font-size:12px">Batch Details</a>
                                                                      </li>
                                                                 </ul>

                                                                 <!-- Details Tab -->
                                                                 <div class="tab-content" id="tab-subcontents">
                                                                      <div class="tab-pane fade in active" id="details">
                                                                           <div class="row">
                                                                                <div class="col-md-8 col-md-offset-2">
                                                                                     <table class="table table-striped table-bordered table-hover table-responsive" id="sample_2" style="font-size:10px">
                                                                                          <thead>
                                                                                               <tr>
                                                                                                    <td width="20%">Item/Part No.</td>
                                                                                                    <td>Item Description</td>
                                                                                                    <td>Quantity</td>
                                                                                                    <td>PO/PR No.</td>
                                                                                                    <td>Unit Price</td>
                                                                                                    <td>Amount</td>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody>
                                                                                               <?php if(isset($mr_details_data)): ?>
                                                                                               <?php foreach($mr_details_data as $mrddata): ?>
                                                                                               <tr>
                                                                                                    <td><?php echo e($mrddata->item); ?></td>
                                                                                                    <td><?php echo e($mrddata->description); ?></td>
                                                                                                    <td style="text-align: right"><?php echo e($mrddata->qty); ?></td>
                                                                                                    <td><?php echo e($mrddata->pr); ?></td>
                                                                                                    <td style="text-align: right"><?php echo e($mrddata->price); ?></td>
                                                                                                    <td style="text-align: right"><?php echo e($mrddata->amount); ?></td>
                                                                                               </tr>
                                                                                               <?php endforeach; ?>
                                                                                               <?php endif; ?>
                                                                                          </tbody>
                                                                                     </table>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                      <!-- Summary Tab -->
                                                                      <div class="tab-pane fade" id="summary">
                                                                           <div class="row">
                                                                                <div class="col-md-1"></div>
                                                                                <div class="col-md-9"  style="width:1100px; height:486px; overflow:auto;">
                                                                                     <table class="table table-striped table-bordered table-hover table-responsive" id="tbl_summary">
                                                                                          <thead>
                                                                                               <tr>
                                                                                                    <th width="20%" style="font-size:10px">Item/Part No.</th>
                                                                                                    <th width="20%" style="font-size:10px">Item Description</th>
                                                                                                    <th style="font-size:10px">Quantity</th>
                                                                                                    <th style="font-size:10px">Received Qty.</th>
                                                                                                    <th style="font-size:10px">Variance</th>
                                                                                                    <th style="font-size:10px"><input type="checkbox" id="checkbox_iqc" name="checkbox_iqc" <?php if($action=='VIEW'){ echo 'disabled'; } ?> <?php echo($state); ?> />Not Req'd</th>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody>
                                                                                               <?php $iqc = 0?>
                                                                                               <?php if(isset($mr_summary_data)): ?>
                                                                                               <?php foreach($mr_summary_data as $mrsdata): ?>
                                                                                               <tr class="odd gradeX" data-id="<?php echo e($mrsdata->id); ?>">
                                                                                                    <td style="font-size:10px"><?php echo e($mrsdata->item); ?></td>
                                                                                                    <td style="font-size:10px"><?php echo e($mrsdata->description); ?></td>
                                                                                                    <td style="text-align: right; font-size:10px"><?php echo e($mrsdata->qty); ?></td>
                                                                                                    <td style="text-align: right; font-size:10px"><?php echo e($mrsdata->r_qty); ?></td>
                                                                                                    <td style="text-align: right; font-size:10px"><?php echo e($mrsdata->variance); ?></td>
                                                                                                    <td style="font-size:10px"><input type="checkbox" class="iqc_check" name="iqc_check" <?php if($action=='VIEW'){ echo 'disabled'; } ?> value="<?php echo e($mrsdata->id); ?>" <?php if(isset($mrsdata->iqc_required )){if($mrsdata->iqc_required == 1){ echo 'checked'; }}?> /></td>
                                                                                               </tr>
                                                                                               <?php endforeach; ?>
                                                                                               <?php endif; ?>
                                                                                          </tbody>
                                                                                     </table>
                                                                                </div>
                                                                                <div class="col-md-2"></div>
                                                                           </div>
                                                                      </div>
                                                                      <!-- Batch Details Tab -->
                                                                      <div class="tab-pane fade" id="batch">
                                                                           <div class="row">
                                                                                <div class="col-md-1"></div>
                                                                                <div class="col-md-9" style="width:1100px; height:486px; overflow:auto;">
                                                                                     <table class="table table-striped table-bordered table-hover table-responsive" id="tbl_batch" style="font-size:10px">
                                                                                          <thead id="th_batch">
                                                                                               <tr>
                                                                                                    <th class="table-checkbox" style="font-size:10px">
                                                                                                         <!-- <input type="checkbox" class="group-checkable" data-set="#tbl_batch .checkboxes"/> -->
                                                                                                    </th>
                                                                                                    <th style="font-size:10px"></th>
                                                                                                    <th style="font-size:10px">Batch ID</th>
                                                                                                    <th style="font-size:10px">Item/Part No.</th>
                                                                                                    <th style="font-size:10px">Item Description</th>
                                                                                                    <th style="font-size:10px">Quantity</th>
                                                                                                    <th style="font-size:10px">Package Category</th>
                                                                                                    <th style="font-size:10px">Package Qty.</th>
                                                                                                    <th style="font-size:10px">Lot No.</th>
                                                                                                    <th style="font-size:10px">Location</th>
                                                                                                    <th style="font-size:10px">Supplier</th>
                                                                                                    <th style="font-size:10px">Not Req'd</th>
                                                                                                    <th style="font-size:10px">Printed</th>
                                                                                                    <th style="font-size:10px"></th>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody id="table_body" >
                                                                                               <?php $ctr = 1; ?>
                                                                                               <?php if(isset($mr_batch_data)): ?>
                                                                                               <?php foreach($mr_batch_data as $mrbdata): ?>
                                                                                               <tr id="tr_batch_item<?php echo $ctr; ?>">
                                                                                                    <td><input type="checkbox" class="checkboxes batch_item<?php echo $ctr; ?> input-sm" value="<?php echo $ctr; ?>"/></td>
                                                                                                    <td style=" padding-bottom: 0px;padding-top: 4px;padding-left: 20px;padding-right: 0px;"><a href="#" class="btn btn-primary btn-sm" onclick="editBatch('<?php echo $ctr; ?>')" value="sitem<?php echo $ctr; ?>"><i class="fa fa-edit"></i></a></td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputBatchId"><?php echo $ctr; ?></td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputItemNo" name="inputItemNo"> <?php echo e($mrbdata->item); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputItem" name="inputItem"> <?php echo e($mrbdata->description); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputQty" name="inputQty"> <?php echo e($mrbdata->qty); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputBox" name="inputBox"> <?php echo e($mrbdata->box); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputBoxQty" name="inputBoxQty"> <?php echo e($mrbdata->box_qty); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputLotNo" name="inputLotNo"> <?php echo e($mrbdata->lot_no); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputLocation" name="inputLocation"> <?php echo e($mrbdata->location); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputSupplier" name="inputSupplier"> <?php echo e($mrbdata->supplier); ?> </td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputIqc" name="inputIqc"><input type="checkbox" class="b_iqc_check" name="b_iqc_check" disabled <?php if(isset($mrbdata->iqc_required )){if($mrbdata->iqc_required == 1){ echo 'checked'; }}?> /></td>
                                                                                                    <td class="batch_item<?php echo $ctr; ?> inputIsPrinted" name="inputIsPrinted"><input type="checkbox" class="isprinted<?php echo $ctr; ?>" disabled value="<?php echo e($mrbdata->is_printed); ?>" <?php if(isset($mrbdata->is_printed)){if($mrbdata->is_printed == 1){ echo 'checked';}} ?>/></td>
                                                                                                    <td>
                                                                                                         <button type="button" onclick="javascript: setcontrol('PRNT', '<?php echo e($mrbdata->item); ?>|<?php echo e($mrbdata->is_printed); ?>');" class="btn grey-gallery input-sm" <?php echo $state; ?> ><i class="fa fa-barcode"></i></button>
                                                                                                    </td>
                                                                                               </tr>
                                                                                               <?php $ctr ++; ?>
                                                                                               <?php endforeach; ?>
                                                                                               <?php endif; ?>
                                                                                          </tbody>
                                                                                     </table>
                                                                                </div>
                                                                                <div class="col-md-2"></div>
                                                                           </div>
                                                                           <div class="row">
                                                                                <div class="col-md-12 text-center">
                                                                                     <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: showAddBatchModal();" class="btn green input-sm" id="btn_add_batch" <?php echo($state); ?> >
                                                                                          <i class="fa fa-plus"></i> Add Batch Item
                                                                                     </button>
                                                                                     <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: batchdata('DELETE'); "  class="btn red input-sm" id="btn_delete_batch">
                                                                                          <i class="fa fa-trash"></i> Delete
                                                                                     </button>
                                                                                     <button type="button" style="font-size:12px; <?php if($action=='VIEW' || $action=='ADD'){ echo 'display:none;'; } ?>" onclick="javascript: batchdata('ALL'); "  class="btn blue input-sm" id="btn_all_batch">
                                                                                          <i class="glyphicon glyphicon-asterisk"></i> Receive All
                                                                                     </button>
                                                                                     <input type="hidden" style="font-size:12px" class="form-control input-sm" id="item_count" placeholder="Lower Limit" name="item_count" value="<?php echo $ctr-1; ?>" />
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>

                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Action Buttons -->
                                                  <form>
                                                       <?php echo csrf_field(); ?>

                                                       <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                 <button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?> " onclick="javascript: setcontrol('ADD'); " class="btn green input-sm" id="btn_add"<?php echo($state); ?> >
                                                                      <i class="fa fa-plus"></i> Add New
                                                                 </button>
                                                                 <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: saverecord(); " class="btn blue-madison input-sm" id="btn_save" <?php echo($state); ?> >
                                                                      <i class="fa fa-pencil"></i> Save
                                                                 </button>
                                                                 <button type="button" style="font-size:12px; <?php if(isset($mrdata)){ if($mrdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?> <?php echo($state); ?>" onclick="javascript: setcontrol('EDIT'); " class="btn blue-madison input-sm" id="btn_edit"  >
                                                                      <i class="fa fa-pencil"></i> Edit
                                                                 </button>
                                                                 <button type="button" style="font-size:12px; <?php if(isset($mrdata)){ if($mrdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('CNL'); " class="btn red input-sm" id="btn_cancel" <?php echo($state); ?> >
                                                                      <i class="fa fa-trash"></i> Cancel
                                                                 </button>

                                                                 <button type="button" style="font-size:12px; <?php if($action=='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('DIS'); " class="btn red-intense input-sm" id="btn_discard" <?php echo($state); ?> >
                                                                      <i class="fa fa-pencil"></i> Discard Changes
                                                                 </button>

                                                                 <button type="button" style="font-size:12px; <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: searchData();" class="btn blue-steel input-sm" id="btn_search">
                                                                      <i class="fa fa-search"></i> Search
                                                                 </button>
                                                                 <button type="button" style="font-size:12px; <?php if(isset($mrdata)){ if($mrdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" onclick="javascript: setcontrol('PRNT', ''); " class="btn grey-gallery input-sm" id="btn_barcode" <?php echo($state); ?>>
                                                                      <i class="fa fa-barcode"></i> Barcode
                                                                 </button>
                                                                 <button type="submit" style="font-size:12px; <?php if(isset($mrdata)){ if($mrdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php echo($state); ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" formtarget="_blank" onclick="javascript: generateMrReport();" class="btn purple-plum input-sm" id="btn_print">
                                                                      <i class="fa fa-print"></i> Print
                                                                 </button>
                                                                 <button type="submit"  style="font-size:12px; <?php if(isset($mrdata)){ if($mrdata->status == 'Cancelled') { echo 'display:none;'; } } ?> <?php echo($state); ?> <?php if($action!='VIEW'){ echo 'display:none;'; } ?>" formtarget="_blank" onclick="javascript: generateIqcReport();" class="btn blue input-sm" id="btn_print_iqc">
                                                                      <i class="fa fa-print"></i> IQC
                                                                 </button>
                                                            </div>
                                                       </div>
                                                  </form>

                                                  <!-- AJAX LOADER -->
                                                  <div id="loading" class="modal fade" role="dialog" data-backdrop="static">
                                                       <div class="modal-dialog modal-sm gray-gallery">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <div class="row">
                                                                           <div class="col-sm-2"></div>
                                                                           <div class="col-sm-8">
                                                                                <img src="assets/images/ajax-loader.gif" class="img-responsive">
                                                                           </div>
                                                                           <div class="col-sm-2"></div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Successful Invoice Load Pop-message-->
                                                  <div id="validInvoiceModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <p>Invoice Successfully Loaded.</p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Invalid Invoice Load Pop-message-->
                                                  <div id="invalidInvoiceModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <p>Please input valid Invoice No.</p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Existing Invoice Load Pop-message-->
                                                  <div id="existingInvoiceModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <p>Invoice [<?php echo $existingInvoiceNo ?>] already exists. Please refer to Receive No. [ <?php echo $existingReceiveNo ?> ].</p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Invalid Innvoice Load Pop-message-->
                                                  <div id="mismatchInvoiceModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <p>Invoice No. do not match with the loaded data. <br/> Please reload and try again.</p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Invalid Input Data before saving Load Pop-message-->
                                                  <div id="invalidInputDataModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <p>Please make sure that all required feilds are filled-up properly. <br/> Check the values and try again.</p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnok">OK</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Add Batch Validation Pop-message -->
                                                  <div id="invalidAddBatchModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <p>One or more fields contains invalid values.</p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" onclick="javascript: showAddBatch('ADD');" class="btn btn-primary" id="btnok">OK</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Edit Batch Validation Pop-message -->
                                                  <div id="invalidEditBatchModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <div class="modal-content ">
                                                                 <div class="modal-body">
                                                                      <p>One or more fields contains invalid values.</p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" onclick="javascript: showAddBatch('EDIT');" class="btn btn-primary" id="btnok">OK</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <!-- Cancel Confirmation Pop-message -->
                                                  <div id="deleteModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <form role="form" method="POST" action="<?php echo e(url('/wbsmat-cancel')); ?>">
                                                                 <div class="modal-content ">
                                                                      <div class="modal-body">
                                                                           <p>Are you sure you want to cancel this transaction?</p>
                                                                           <?php echo csrf_field(); ?>

                                                                           <input type="hidden" name="id" id="delete_inputId"/>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                           <button type="submit" class="btn btn-primary" id="delete">Yes</button>
                                                                           <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                                                                      </div>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>

                                                  <!-- Barcode Print Confirmation Pop-message -->
                                                  <div id="barcodeModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm blue">
                                                            <form role="form" method="POST" action="<?php echo e(url('/wbsmat-barcode')); ?>">
                                                                 <div class="modal-content ">
                                                                      <div class="modal-body">
                                                                           <p>Are you sure you want to print barcode/s?</p>
                                                                           <?php echo csrf_field(); ?>

                                                                           <input type="hidden" name="id" id="barcode_inputId"/>
                                                                           <input type="hidden" name="item" id="barcode_inputItemNo"/>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                           <button type="submit" class="btn btn-primary" id="barcode">Yes</button>
                                                                           <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                                                                      </div>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>

                                                  <!-- Add Batch Modal -->
                                                  <div id="addbatchitem" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm">
                                                       <form class="form-horizontal">
                                                            <!-- Modal content-->
                                                            <div class="modal-content blue" style="width:500px;">
                                                                 <div class="modal-header">
                                                                      <button type="button" class="close" style="font-size:12px" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title">Add Batch</h4>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                      <div class="row">
                                                                           <div class="col-md-6">
                                                                                All the fields are required.
                                                                           </div>
                                                                           <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                     <label for="inputcode" class="col-md-4 control-label" style="font-size:12px">*Batch ID</label>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" id="add_invoice_no" name="id" hidden="true" />
                                                                                          <input type="text" class="form-control input-sm" id="add_inputBatchId" placeholder="Batch ID" name="batchid" readonly />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <label for="inputname" class="col-md-4 control-label" style="font-size:12px">*Item No</label>
                                                                                     <div class="col-md-8">
                                                                                          <select id="add_inputItemNo"  class="form-control select2me input-sm" name="itemno" <?php echo($state); ?> >
                                                                                               <option value="-1">--Select--</option>
                                                                                               <?php if(isset($items)): ?>
                                                                                               <?php foreach($items as $value): ?>
                                                                                               <option value="<?php echo e($value->code . "|" . $value->name . "|" . $value->rackno); ?>"> <?php echo e($value->code . ' ' . $value->name); ?></option>
                                                                                               <?php endforeach; ?>
                                                                                               <?php endif; ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <label for="inputname" class="col-md-4 control-label" style="font-size:12px">*Quantity</label>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="add_inputQty" placeholder="Quantity" name="qty" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">*Package Category</label>
                                                                                     </div>
                                                                                     <div class="col-md-4">
                                                                                          <select id="add_inputBox"  class="form-control select2me input-sm" name="itemno" <?php echo($state); ?> >
                                                                                               <option value="-1">--Select--</option>
                                                                                               <?php if(isset($packaging)): ?>
                                                                                               <?php foreach($packaging as $value): ?>
                                                                                               <option value="<?php echo e($value->description); ?>"> <?php echo e($value->description); ?></option>
                                                                                               <?php endforeach; ?>
                                                                                               <?php endif; ?>
                                                                                          </select>
                                                                                     </div>
                                                                                     <div class="col-md-1" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">*Qty</label>
                                                                                     </div>
                                                                                     <div class="col-md-3">
                                                                                          <input type="text" class="form-control input-sm" id="add_inputBoxQty" placeholder="Box Qty" name="boxqty" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px;">*Lot No</label>
                                                                                     </div>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="add_inputLotNo" placeholder="Lot No" name="lotno" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">Location</label>
                                                                                     </div>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="add_inputLocation" placeholder="Location" name="location" disabled="disabled" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">Supplier</label>
                                                                                     </div>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="add_inputSupplier" placeholder="Supplier" name="supplier" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" id="btn_mdl_add" style="font-size:12px" onclick="javascript: batchdata('ADD'); " class="btn btn-success" <?php echo($state); ?> <?php if($action=='VIEW'){ echo 'disabled'; } ?>><i class="fa fa-plus"></i> Add</button>
                                                                      <button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                                 </div>
                                                            </div>
                                                       </form>
                                                       </div>
                                                  </div>

                                                  <!-- Edit Batch Modal -->
                                                  <div id="editbatchitem" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-sm">
                                                            <form class="form-horizontal">
                                                            <!-- Modal content-->
                                                            <div class="modal-content blue" style="width:500px;">
                                                                 <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title">EDIT Batch Details</h4>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                      <div class="row">
                                                                           <div class="col-md-6">
                                                                                All the fields are required.
                                                                           </div>
                                                                           <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                     <label for="inputcode" class="col-md-4 control-label" style="font-size:12px">*Batch ID</label>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="edit_inputBatchId" placeholder="Batch ID" name="batchid" readonly />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <label for="inputname" class="col-md-4 control-label" style="font-size:12px">*Item No</label>
                                                                                     <div class="col-md-8" id="edit_itemno">
                                                                                          <input type="text" class="form-control input-sm" id="edit_inputItemNo" placeholder="Item No." name="itemno" readonly />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <label for="inputname" class="col-md-4 control-label" style="font-size:12px">*Quantity</label>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="edit_inputQty" placeholder="Quantity" name="qty" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">*Package Category</label>
                                                                                     </div>
                                                                                     <div class="col-md-4">
                                                                                          <select id="edit_inputBox"  class="form-control select2me input-sm" name="itemno" <?php echo($state); ?> >
                                                                                               <option value="-1">--Select--</option>
                                                                                               <?php if(isset($packaging)): ?>
                                                                                               <?php foreach($packaging as $value): ?>
                                                                                               <option value="<?php echo e($value->description); ?>"> <?php echo e($value->description); ?></option>
                                                                                               <?php endforeach; ?>
                                                                                               <?php endif; ?>
                                                                                          </select>
                                                                                     </div>
                                                                                     <div class="col-md-1" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">*Qty</label>
                                                                                     </div>
                                                                                     <div class="col-md-3">
                                                                                          <input type="text" class="form-control input-sm" id="edit_inputBoxQty" placeholder="Box Qty" name="boxqty" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px;">*Lot No</label>
                                                                                     </div>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="edit_inputLotNo" placeholder="Lot No" name="lotno" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">Location</label>
                                                                                     </div>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="edit_inputLocation" placeholder="Location" name="location" disabled="disabled" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                     <div class="col-md-4" style="text-align: right;">
                                                                                          <label for="inputname" class="control-label" style="font-size:12px">Supplier</label>
                                                                                     </div>
                                                                                     <div class="col-md-8">
                                                                                          <input type="text" class="form-control input-sm" id="edit_inputSupplier" placeholder="Supplier" name="supplier" <?php echo($readonly); ?> />
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <input type="hidden" class="form-control input-sm" id="editId" name="editId"/>
                                                                      <button type="button" style="font-size:12px" id="btn_update_batch" onclick="javascript: batchdata('EDIT'); " class="btn btn-success" <?php echo($state); ?> <?php if($action=='VIEW'){ echo 'disabled'; } ?> ><i class="fa fa-edit"></i> Update</button>
                                                                      <button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                                 </div>
                                                            </div>
                                                            </form>
                                                       </div>
                                                  </div>


                                                  <!-- Search Modal -->
                                                  <div id="searchModal" class="modal fade" role="dialog">
                                                       <div class="modal-dialog modal-lg">

                                                            <!-- Modal content-->
                                                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/materialreceiving')); ?>">
                                                                 <?php echo csrf_field(); ?>

                                                                 <div class="modal-content blue">
                                                                      <div class="modal-header">
                                                                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                           <h4 class="modal-title">Search</h4>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                           <div class="row">
                                                                                <div class="col-md-12">
                                                                                     <div class="form-group">
                                                                                          <label for="inputcode" class="col-md-4 control-label" style="font-size:12px">Receive Date</label>
                                                                                          <div class="col-md-8">
                                                                                               <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
                                                                                                    <input type="text" class="form-control input-sm" name="srch_from" id="srch_from"/>
                                                                                                    <span class="input-group-addon">to </span>
                                                                                                    <input type="text" class="form-control input-sm" name="srch_to" id="srch_to"/>
                                                                                               </div>
                                                                                          </div>
                                                                                     </div>
                                                                                     <div class="form-group">
                                                                                          <label for="inputname" class="col-md-4 control-label" style="font-size:12px">Invoice No</label>
                                                                                          <div class="col-md-4">
                                                                                               <input type="text" class="form-control input-sm" id="srch_invoiceno" placeholder="Invoice No" name="srch_invoiceno" autofocus <?php echo($readonly); ?> />
                                                                                          </div>
                                                                                     </div>
                                                                                     <div class="form-group">
                                                                                          <label for="inputname" class="col-md-4 control-label" style="font-size:12px">Invoice Date</label>
                                                                                          <div class="col-md-8">
                                                                                               <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
                                                                                                    <input type="text" class="form-control input-sm" name="srch_invfrom" id="srch_invfrom"/>
                                                                                                    <span class="input-group-addon"> to </span>
                                                                                                    <input type="text" class="form-control input-sm" name="srch_invto" id="srch_invto"/>
                                                                                               </div>
                                                                                          </div>
                                                                                     </div>
                                                                                     <div class="form-group">
                                                                                          <label for="inputname" class="col-md-4 control-label" style="font-size:12px">Pallet No</label>
                                                                                          <div class="col-md-4">
                                                                                               <input type="text" class="form-control input-sm" id="srch_palletno" placeholder="Pallet No" name="srch_palletno" <?php echo($readonly); ?> />
                                                                                          </div>
                                                                                     </div>
                                                                                     <div class="form-group">
                                                                                          <label for="inputname" class="col-md-4 control-label" style="font-size:12px">Status</label>
                                                                                          <div class="col-md-8">
                                                                                               <label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Open" id="srch_open" name="Open" checked="true"/>Open</label>
                                                                                               <label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Close" id="srch_close" name="Close"/>Close</label>
                                                                                               <label><input type="checkbox" class="checkboxes" style="font-size:12px" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                           <div class="row" style="width:880px; height:500px; overflow:auto;">
                                                                                <div class="col-md-12">
                                                                                     <table class="table table-striped table-bordered table-hover table-responsive" id="sample_3" style="font-size:10px">
                                                                                          <thead>
                                                                                               <tr>
                                                                                                    <td width="10%"></td>
                                                                                                    <td>Transaction No.</td>
                                                                                                    <td>Receive Date</td>
                                                                                                    <td>Invoice No.</td>
                                                                                                    <td>Invoice Date</td>
                                                                                                    <td>Pallet No.</td>
                                                                                                    <td>Status</td>
                                                                                                    <td>Created By</td>
                                                                                                    <td>Created Date</td>
                                                                                                    <td>Updated By</td>
                                                                                                    <td>Updated Date</td>
                                                                                               </tr>
                                                                                          </thead>
                                                                                          <tbody id="srch_tbl_body">
                                                                                          </tbody>
                                                                                     </table>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                           <input type="hidden" class="form-control input-sm" id="editId" name="editId">
                                                                           <button type="button" style="font-size:12px" onclick="javascript: filterData('SRCH'); " class="btn blue-madison" ><i class="glyphicon glyphicon-filter"></i> Filter</button>
                                                                           <button type="button" style="font-size:12px" onclick="javascript: filterData('CNCL'); " class="btn green" ><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                                                           <button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                                      </div>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>



                                   </div>
                              </div>
                              <!-- END EXAMPLE TABLE PORTLET-->
                         </div>
                    </div>
                    <!-- END PAGE CONTENT-->
               </div>
          </div>
          <!-- END CONTENT -->

     </div>
     <!-- END CONTAINER -->
     <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>