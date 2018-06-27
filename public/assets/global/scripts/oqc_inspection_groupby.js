$( function() {
    disabledContent();
    $('#field1').on('change',function(){
        if($('#field1').val() != ""){
            if($('#field1').val() == $('#field2').val() || $('#field1').val() == $('#field3').val()){
                msg("Duplicate Grouping","failed");
            }
            else{
                GroupByValues($(this).val(),$('#content1'));
                $("#content1").prop('disabled', false);
                $("#field2").prop('disabled', false);
                $("#calID").prop('disabled', false);
                
            }
        }
        else{
            disabledContent2();
        }
        
    });

    $('#field2').on('change',function(){
        if($('#field2').val() != ""){
            if($('#field1').val() == $('#field2').val() || $('#field2').val() == $('#field3').val()){
                msg("Duplicate Grouping","failed");
            }
            else{
                GroupByValues($(this).val(),$('#content2'));
                $("#content2").prop('disabled', false);
                $("#field3").prop('disabled', false);
            }
        }
        else{
            disabledContent2();
        }
    });

    $('#field3').on('change',function(){
        if($('#field3').val() != ""){
            if($('#field3').val() == $('#field2').val() || $('#field1').val() == $('#field3').val()){
                msg("Duplicate Grouping","failed");
            }
            else{
                GroupByValues($(this).val(),$('#content3'));
                $("#content3").prop('disabled', false);
            }
        }
        else{
            disabledContent2();
        }
    });

    $('#content2').on('change',function(){
        if($("#content1").val() == "")
        {
            msg("Please provide Data for First Group","failed");
            $("#content2").val('');
            $("#content2").prop('disabled', true);
        }
    });

    $('#content3').on('change',function(){
        if($("#content1").val() == "" || $("#content2").val() == "")
        {
            msg("Please provide Data for Group","failed");
            $("#content2").val('');
            $("#content2").prop('disabled', true);
            $("#content3").val('');
            $("#content3").prop('disabled', true);
        }

    });

    $('#gto').on('change',function(){
        if($("#gfrom").val() != "" || $("#gto").val() != "")
        {
            $("#field1").prop('disabled', false);
        }
    });

    $('#frm_DPPM').on('submit', function(e) {
        $('#group_by_pane').html('');
        var address = $(this).attr('action');
        var datas = $(this).serialize();
        $('#main_pane').hide();
        $('#group_by_pane').show();
        e.preventDefault();
        openloading();
        if($('#field2').val() == "" && $('#field3').val() == ""){
            var datas = $(this).serialize();
            var desFirst = deparam(datas);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success:function(returnData){
                    if(returnData.length > 0){
                        var form = returnData;
                        var desFirst = deparam(datas);
                        $.ajax({
                                url: GetSingleGroupByURL,
                                type: 'GET',
                                dataType: 'JSON',
                                data:{ _token:token,
                                        data:form,
                                        firstData:desFirst.field1,
                                        gto:desFirst.gto,
                                        gfrom:desFirst.gfrom
                                },
                                success:function(returnDataDetails){
                                        var details = returnDataDetails;
                                        FirstTable(form,datas,details);
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                    }
                                });
                    }
                    else{
                    closeloading();
                    msg("No Data Found","failed");
                    }
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        else if($('#field2').val() != "" && $('#field1').val() != "" && $('#field3').val() == ""){
            var start = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success:function(returnData){
                    if(returnData.length > 0){
                        var form = returnData;
                        var desFirst = deparam(datas);
                        $.ajax({
                                url: GetdoubleGroupByURL,
                                type: 'GET',
                                dataType: 'JSON',
                                data:{ _token:token,
                                        data:form,
                                        firstData:desFirst.field1,
                                        secondData:desFirst.field2,
                                        gto:desFirst.gto,
                                        gfrom:desFirst.gfrom,
                                },
                                success:function(returnDataDetails){
                                        var g1 = [], g2 =[];
                                        if($('#content1').val() != "")
                                        {
                                                    g1.push($('#content1').val());
                                        }
                                        else{
                                                for(var x=0;x<form.length;x++){
                                                    g1.push(form[x].chosenfield);
                                                }
                                        }
                                        if($('#content2').val() != "")
                                        {
                                                    g2.push($('#content2').val());
                                        }
                                        else{
                                                for(var x=0;x<returnDataDetails.length;x++){
                                                    g2.push(returnDataDetails[x].chosenfield2);
                                                }
                                        }
                                                        $.ajax({
                                                        url: GetdoubleGroupByURLdetails,
                                                        type: 'GET',
                                                        dataType: 'JSON',
                                                        data:{ _token:token,
                                                                content1:g1,
                                                                content2:g2,
                                                                firstData:desFirst.field1,
                                                                secondData:desFirst.field2,
                                                                gto:desFirst.gto,
                                                                gfrom:desFirst.gfrom,
                                                        },
                                                        success:function(returDetails){
                                                             secondTable(returDetails,desFirst);
                                                        },
                                                        error: function (xhr, ajaxOptions, thrownError) {
                                                                alert(xhr.status);
                                                                alert(thrownError);
                                                            }
                                                        });

                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                    }
                                });
                    }
                    else{
                        closeloading();
                        msg("No Data Found","failed");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        else{
            var start = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success:function(returnData){
                    if(returnData.length > 0){
                        var form = returnData;
                        var desFirst = deparam(datas);
                        $.ajax({
                                url: GettripleGroupByURL,
                                type: 'GET',
                                dataType: 'JSON',
                                data:{ _token:token,
                                        data:form,
                                        firstData:desFirst.field1,
                                        secondData:desFirst.field2,
                                        thirdData:desFirst.field3,
                                        gto:desFirst.gto,
                                        gfrom:desFirst.gfrom,
                                },
                                success:function(returnDataDetails){
                                        var g1 = [], g2 =[], g3 = [];
                                        if($('#content1').val() != ""){
                                                g1.push($('#content1').val());
                                        }
                                        else{
                                            for(var x=0;x<form.length;x++){
                                                g1.push(form[x].chosenfield);
                                            }
                                        }
                                        if($('#content2').val() != ""){
                                                g2.push($('#content2').val());
                                        }
                                        else{
                                            var uniqueField = [];
                                                for(var x=0;x<returnDataDetails.length;x++){
                                                    g2.push(returnDataDetails[x].chosenfield2);
                                                    $.each(g2, function(i, el){
                                                        if($.inArray(el, uniqueField) === -1) uniqueField.push(el);
                                                    });
                                                }
                                            g2 = uniqueField;
                                        }
                                        if($('#content3').val() != ""){
                                                g3.push($('#content3').val());
                                        }
                                        else{
                                            var uniqueField2 = [];
                                                for(var x=0;x<returnDataDetails.length;x++){
                                                    g3.push(returnDataDetails[x].chosenfield3);
                                                    $.each(g3, function(i, el){
                                                        if($.inArray(el, uniqueField2) === -1) uniqueField2.push(el);
                                                    });
                                                }
                                                g3 = uniqueField2;
                                        }
                                                        $.ajax({
                                                        url: GettripleGroupByURLdetails,
                                                        type: 'GET',
                                                        dataType: 'JSON',
                                                        data:{ _token:token,
                                                                content1:g1,
                                                                content2:g2,
                                                                content3:g3,
                                                                firstData:desFirst.field1,
                                                                secondData:desFirst.field2,
                                                                thirdData:desFirst.field3,
                                                                gto:desFirst.gto,
                                                                gfrom:desFirst.gfrom,
                                                        },
                                                        success:function(returDetails){
                                                             thirdTable(returDetails,desFirst);
                                                        },
                                                        error: function (xhr, ajaxOptions, thrownError) {
                                                                alert(xhr.status);
                                                                alert(thrownError);
                                                            }
                                                        });

                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                    }
                                });
                    }
                    else{
                        closeloading();
                        msg("No Data Found","failed");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        });
        // }).done(function(data,xhr,textStatus) {
        //     console.log(data);
        //     // closeloading();
        //     calculateLARDPPM(data);
        // }).fail(function(data,xhr,textStatus) {
        //     msg("There was an error while calculating",'error');
        // }).always(function() {
        //     closeloading();
        // });
        // });

    $('.view_inspection').live('click', function(e) {
        $('#inspection_id').val($(this).attr('data-id'));
        $('#assembly_line').val($(this).attr('data-assembly_line'));
        $('#lot_no').val($(this).attr('data-lot_no'));
        $('#app_date').val($(this).attr('data-app_date'));
        $('#app_time').val($(this).attr('data-app_time'));
        $('#prod_category').val($(this).attr('data-prod_category'));
        $('#po_no').val($(this).attr('data-po_no'));
        $('#series_name').val($(this).attr('data-device_name'));
        $('#customer').val($(this).attr('data-customer'));
        $('#po_qty').val($(this).attr('data-po_qty'));
        $('#family').val($(this).attr('data-family'));
        $('#type_of_inspection').val($(this).attr('data-type_of_inspection'));
        $('#severity_of_inspection').val($(this).attr('data-severity_of_inspection'));
        $('#inspection_lvl').val($(this).attr('data-inspection_lvl'));
        $('#aql').val($(this).attr('data-aql'));
        $('#accept').val($(this).attr('data-accept'));
        $('#reject').val($(this).attr('data-reject'));
        $('#date_inspected').val($(this).attr('data-date_inspected'));
        $('#ww').val($(this).attr('data-ww'));
        $('#fy').val($(this).attr('data-fy'));
        $('#time_ins_from').val($(this).attr('data-time_ins_from'));
        $('#time_ins_to').val($(this).attr('data-time_ins_to'));
        $('#shift').val($(this).attr('data-shift'));
        $('#inspector').val($(this).attr('data-inspector'));
        $('#submission').val($(this).attr('data-submission'));
        $('#coc_req').val($(this).attr('data-coc_req'));
        $('#judgement').val($(this).attr('data-judgement'));
        $('#lot_qty').val($(this).attr('data-lot_qty'));
        $('#sample_size').val($(this).attr('data-sample_size'));
        $('#lot_inspected').val($(this).attr('data-lot_inspected'));
        $('#lot_accepted').val($(this).attr('data-lot_accepted'));
        $('#no_of_defects').val($(this).attr('data-num_of_defects'));
        $('#remarks').val($(this).attr('data-remarks'));
        $('#inspection_save_status').val('EDIT');

        getNumOfDefectives($(this).attr('data-id'));

        if ($(this).attr('data-type') == 'PROBE PIN') {
            $('#is_probe').prop('checked', true);
        }

        checkAuhtor($(this).attr('data-inspector'));

        $('#inspection_modal').modal('show');
    });

    $('#btn_close_groupby').live('click', function() {
        $('#main_pane').show();
        $('#group_by_pane').hide();
    });


    $('#btn_clear_grpby').on('click', function() {
        clearGrpByFields();
        disabledContent2();
    });

    $('#btn_pdf_groupby').live('click', function() {
        window.location.href=PDFGroupByReportURL;
    });
    $('#btn_excel_groupby').live('click', function() {
        window.location.href=ExcelGroupByReportURL;
    });
});

function disabledContent(){
    $("#field1").prop('disabled', true);
    $("#field1").val('');
    $("#field2").prop('disabled', true);
    $("#field2").val('');
    $("#field3").prop('disabled', true);
    $("#field3").val('');
    $("#content1").prop('disabled', true);
    $("#content1").val('');
    $("#content2").prop('disabled', true);
    $("#content2").val('');
    $("#content3").prop('disabled', true);
    $("#content3").val('');
    $("#calID").prop('disabled', true);
}
function disabledContent2(){
    $("#field2").prop('disabled', true);
    $("#field2").val('');
    $("#field3").prop('disabled', true);
    $("#field3").val('');
    $("#content1").prop('disabled', true);
    $("#content1").val('');
    $("#content2").prop('disabled', true);
    $("#content2").val('');
    $("#content3").prop('disabled', true);
    $("#content3").val('');
    $("#calID").prop('disabled', true);
}


function deparam(query) {
    var pairs, i, keyValuePair, key, value, map = {};
    // remove leading question mark if its there
    if (query.slice(0, 1) === '?') {
        query = query.slice(1);
    }
    if (query !== '') {
        pairs = query.split('&');
        for (i = 0; i < pairs.length; i += 1) {
            keyValuePair = pairs[i].split('=');
            key = decodeURIComponent(keyValuePair[0]);
            value = (keyValuePair.length > 1) ? decodeURIComponent(keyValuePair[1]) : undefined;
            map[key] = value;
        }
    }
    return map;
}

function FirstTable(req,datas,details){
    var d = deparam(datas);
    for(var x=0;x<details.length;x++){
        var gp1 = "";
            gp1 += "<div class='panel-group accordion scrollable' id='grp"+x+"'>";
            gp1 += "<div class='panel panel-info'><div class='panel-heading'>";
            gp1 += "<h4 class='panel-title'><a class='accordion-toggle collapsed' data-toggle='collapse' data-parent='#grp"+x+" 'href='#grp_val"+x+"' aria-expanded='false'>";
            gp1 += d.field1 + ": "+req[x].chosenfield+"</a>";
            gp1 += "</h4>";
            gp1 += "</div>";
            gp1 += "<div id='grp_val"+x+"' class='panel-collapse collapse' aria-expanded='false' style=>";
            gp1 += "<div class='panel-body table-responsive' id='child"+x+"'>";
            gp1 += "<table style='font-size:9px' class='table table-condensed table-bordered'>";
            gp1 += "<thead>";
            gp1 += "<tr>";
            gp1 += "<td></td>";
            gp1 += "<td></td>";
            gp1 += "<td><strong>PO</strong></td>";
            gp1 += "<td><strong>Device Name</strong></td>";
            gp1 += "<td><strong>Customer</strong></td>";
            gp1 += "<td><strong>PO Qty</strong></td>";
            gp1 += "<td><strong>Family</strong></td>";
            gp1 += "<td><strong>Assembly Line</strong></td>";
            gp1 += "<td><strong>Lot No</strong></td>";
            gp1 += "<td><strong>App. Date</strong></td>";
            gp1 += "<td><strong>App. Time</strong></td>";
            gp1 += "<td><strong>Category</strong></td>";
            gp1 += "<td><strong>Type of Inspection</strong></td>";
            gp1 += "<td><strong>Severity of Inspection</strong></td>";
            gp1 += "<td><strong>Inspection Level</strong></td>";
            gp1 += "<td><strong>AQL</strong></td>";
            gp1 += "<td><strong>Accept</strong></td>";
            gp1 += "<td><strong>Reject</strong></td>";
            gp1 += "<td><strong>Date inspected</strong></td>";
            gp1 += "<td><strong>WW</strong></td>";
            gp1 += "<td><strong>FY</strong></td>";
            gp1 += "<td><strong>Time Inspected</strong></td>";
            gp1 += "<td><strong>Shift</strong></td>";
            gp1 += "<td><strong>Inspector</strong></td>";
            gp1 += "<td><strong>Submission</strong></td>";
            gp1 += "<td><strong>COC Requirement</strong></td>";
            gp1 += "<td><strong>Judgement</strong></td>";
            gp1 += "<td><strong>Lot Qty</strong></td>";
            gp1 += "<td><strong>Sample Size</strong></td>";
            gp1 += "<td><strong>Lot Inspected</strong></td>";
            gp1 += "<td><strong>Lot Accepted</strong></td>";
            gp1 += "<td><strong>No. of Defects</strong></td>";
            gp1 += "<td><strong>Remarks</strong></td>";
            gp1 += "<td><strong>Type</strong></td>";
            gp1 += "</tr>";
            gp1 += "</thead>";
            gp1 += "<tbody id='details_tbody'><tr>";

            for(y=0;y<details[x].length;y++){
                    var num = y+1;
                    gp1 += "<td>"+num+"</td>";
                    gp1 += "<td><button class=btn btn-sm view_inspection blue ";
                    gp1 += "data-id="+details[x][y].id+" ";
                    gp1 += "data-assembly_line="+details[x][y].assembly_line+" ";
                    gp1 += "data-lot_no="+details[x][y].lot_no+" ";
                    gp1 += "data-app_date="+details[x][y].app_date+" ";
                    gp1 += "data-app_time="+details[x][y].app_time+" ";
                    gp1 += "data-prod_category="+details[x][y].prod_category+" ";
                    gp1 += "data-po_no="+details[x][y].po_no+" ";
                    gp1 += "data-device_name="+details[x][y].device_name+" ";
                    gp1 += "data-customer="+details[x][y].customer+" ";
                    gp1 += "data-po_qty="+details[x][y].po_qty+" ";
                    gp1 += "data-family="+details[x][y].family+" ";
                    gp1 += "data-type_of_inspection="+details[x][y].type_of_inspection+" ";
                    gp1 += "data-severity_of_inspection="+details[x][y].severity_of_inspection+" ";
                    gp1 += "data-inspection_lvl="+details[x][y].inspection_lvl+" ";
                    gp1 += "data-aql="+details[x][y].aql+" ";
                    gp1 += "data-accept="+details[x][y].accept+" ";
                    gp1 += "data-reject="+details[x][y].reject+" ";
                    gp1 += "data-date_inspected="+details[x][y].date_inspected+" ";
                    gp1 += "data-ww="+details[x][y].ww+" ";
                    gp1 += "data-fy="+details[x][y].fy+" ";
                    gp1 += "data-time_ins_from="+details[x][y].time_ins_from+" ";
                    gp1 += "data-time_ins_to="+details[x][y].time_ins_to+" ";
                    gp1 += "data-shift="+details[x][y].shift+" ";
                    gp1 += "data-inspector="+details[x][y].inspector+" ";
                    gp1 += "data-submission="+details[x][y].submission+" ";
                    gp1 += "data-coc_req="+details[x][y].coc_req+" ";
                    gp1 += "data-judgement="+details[x][y].judgement+" ";
                    gp1 += "data-lot_qty="+details[x][y].lot_qty+" ";
                    gp1 += "data-sample_size="+details[x][y].sample_size+" ";
                    gp1 += "data-lot_inspected="+details[x][y].lot_inspected+" ";
                    gp1 += "data-lot_accepted="+details[x][y].lot_accepted+" ";
                    gp1 += "data-num_of_defects="+details[x][y].num_of_defects+" ";
                    gp1 += "data-remarks="+details[x][y].remarks+" ";
                    gp1 += "<i class=fa fa-edit>";
                    gp1 += "</i></button></td>";
               
                    gp1 += "<td>"+details[x][y].po_no+"</td>";
                    gp1 += "<td>"+details[x][y].device_name+"</td>";
                    gp1 += "<td>"+details[x][y].customer+"</td>";
                    gp1 += "<td>"+details[x][y].po_qty+"</td>";
                    gp1 += "<td>"+details[x][y].family+"</td>";
                    gp1 += "<td>"+details[x][y].assembly_line+"</td>";
                    gp1 += "<td>"+details[x][y].lot_no+"</td>";
                    gp1 += "<td>"+details[x][y].app_date+"</td>";
                    gp1 += "<td>"+details[x][y].app_time+"</td>";
                    gp1 += "<td>"+details[x][y].prod_category+"</td>";
                    gp1 += "<td>"+details[x][y].type_of_inspection+" </td>";
                    gp1 += "<td>"+details[x][y].severity_of_inspection+"</td>";
                    gp1 += "<td>"+details[x][y].inspection_lvl+"</td>";
                    gp1 += "<td>"+details[x][y].aql+"</td>";
                    gp1 += "<td>"+details[x][y].accept+"</td>";
                    gp1 += "<td>"+details[x][y].reject+"</td>";
                    gp1 += "<td>"+details[x][y].date_inspected+"</td>";
                    gp1 += "<td>"+details[x][y].ww+"</td>";
                    gp1 += "<td>"+details[x][y].fy+"</td>";
                    gp1 += "<td>"+details[x][y].time_ins_from+"</td>";
                    gp1 += "<td>"+details[x][y].shift+"</td>";
                    gp1 += "<td>"+details[x][y].inspector+"</td>";
                    gp1 += "<td>"+details[x][y].submission+"</td>";
                    gp1 += "<td>"+details[x][y].coc_req+"</td>";
                    gp1 += "<td>"+details[x][y].judgement+"</td>";
                    gp1 += "<td>"+details[x][y].lot_qty+"</td>";
                    gp1 += "<td>"+details[x][y].sample_size+"</td>";
                    gp1 += "<td>"+details[x][y].lot_inspected+"</td>";
                    gp1 += "<td>"+details[x][y].lot_accepted+"</td>";
                    gp1 += "<td>"+details[x][y].num_of_defects+"</td>";
                    gp1 += "<td>"+details[x][y].remarks+"</td>";
                    gp1 += "<td>"+details[x][y].type+"</td>";
                    gp1 += "</tr>";
            }
            gp1 += "</tbody>";
            gp1 += "</table>";
            gp1 += "</div>";
            gp1 += "</div>";
            gp1 += "</div>";
            gp1 += "</div>";
     $('#group_by_pane').append(gp1);
 }
 closeloading();
}

function secondTable(req,datas){
    for(var x=0;x<req.length;x++){
        var gp1 = "";
            gp1 += "<div class='panel-group accordion scrollable' id='grp"+x+"'>";
            gp1 += "<div class='panel panel-info'><div class='panel-heading'>";
            gp1 += "<h4 class='panel-title'><a class='accordion-toggle collapsed' data-toggle='collapse' data-parent='#grp"+x+"' href='#grp_val"+x+"' aria-expanded='false'>";
            gp1 += datas.field1 + ": "+req[x]["0"]["0"].chosenfield+"</a>";
            gp1 += "</h4>";
            gp1 += "</div>";
            gp1 += "<div id='grp_val"+x+"' class='panel-collapse collapse' aria-expanded='false' style=>";
            gp1 += "<div class='panel-body table-responsive' id='child"+x+"'>";
            gp1 += "<table style='font-size:9px' class='table table-condensed table-bordered'>";
            gp1 += "<thead>";
            
            gp1 += "</thead>";
            gp1 += "<tbody id='details_tbody'>";

            for(y=0;y<req[x].length;y++){
               
                    
                    var num = y+1;
                    var idc = guidGenerator();

                    gp1 += "<tr>";
                    gp1 += "<td>";
                    gp1 += "<div class='panel-group accordion scrollable' id='grp"+idc+"'>";
                    gp1 += "<div class='panel panel-info'><div class='panel-heading'>";
                    gp1 += "<h4 class=panel-title><a class='accordion-toggle' data-toggle='collapse' data-parent=#grp"+idc+" href=#grp_val"+idc+" aria-expanded='false'>";
                    gp1 += datas.field2 + ": "+req[x][y]["0"].chosenfield2+"</a>";
                    gp1 += "</h4>";
                    gp1 += "</div>";

                    gp1 += "<div id=grp_val"+idc+" class='panel-collapse collapse in' aria-expanded='false' style=>";
                    gp1 += "<div class=panel-body table-responsive id=child"+idc+">";
                  
                    gp1 += "<table style=width:100%>";
                    gp1 += "<tbody>";
                    gp1 += "<tr>";
                    gp1 += "<tr>";
                    gp1 += "<td></td>";
                    gp1 += "<td></td>";
                    gp1 += "<td><strong>PO</strong></td>";
                    gp1 += "<td><strong>Device Name</strong></td>";
                    gp1 += "<td><strong>Customer</strong></td>";
                    gp1 += "<td><strong>PO Qty</strong></td>";
                    gp1 += "<td><strong>Family</strong></td>";
                    gp1 += "<td><strong>Assembly Line</strong></td>";
                    gp1 += "<td><strong>Lot No</strong></td>";
                    gp1 += "<td><strong>App. Date</strong></td>";
                    gp1 += "<td><strong>App. Time</strong></td>";
                    gp1 += "<td><strong>Category</strong></td>";
                    gp1 += "<td><strong>Type of Inspection</strong></td>";
                    gp1 += "<td><strong>Severity of Inspection</strong></td>";
                    gp1 += "<td><strong>Inspection Level</strong></td>";
                    gp1 += "<td><strong>AQL</strong></td>";
                    gp1 += "<td><strong>Accept</strong></td>";
                    gp1 += "<td><strong>Reject</strong></td>";
                    gp1 += "<td><strong>Date inspected</strong></td>";
                    gp1 += "<td><strong>WW</strong></td>";
                    gp1 += "<td><strong>FY</strong></td>";
                    gp1 += "<td><strong>Time Inspected</strong></td>";
                    gp1 += "<td><strong>Shift</strong></td>";
                    gp1 += "<td><strong>Inspector</strong></td>";
                    gp1 += "<td><strong>Submission</strong></td>";
                    gp1 += "<td><strong>COC Requirement</strong></td>";
                    gp1 += "<td><strong>Judgement</strong></td>";
                    gp1 += "<td><strong>Lot Qty</strong></td>";
                    gp1 += "<td><strong>Sample Size</strong></td>";
                    gp1 += "<td><strong>Lot Inspected</strong></td>";
                    gp1 += "<td><strong>Lot Accepted</strong></td>";
                    gp1 += "<td><strong>No. of Defects</strong></td>";
                    gp1 += "<td><strong>Remarks</strong></td>";
                    gp1 += "<td><strong>Type</strong></td>";
                    gp1 += "</tr>";
                    gp1 += "</tr>";
                    for(z=0;z<req[x][y].length;z++){
                        //var pp = req["0"][x][z].po_no;
                        gp1 += "<tr>";
                        gp1 += "<td></td>";
                        gp1 += "<td></td>";
                        gp1 += "<td>"+req[x][y][z].po_no+"</td>";
                        gp1 += "<td>"+req[x][y][z].device_name+"</td>";
                        gp1 += "<td>"+req[x][y][z].customer+"</td>";
                        gp1 += "<td>"+req[x][y][z].po_qty+"</td>";
                        gp1 += "<td>"+req[x][y][z].family+"</td>";
                        gp1 += "<td>"+req[x][y][z].assembly_line+"</td>";
                        gp1 += "<td>"+req[x][y][z].lot_no+"</td>";
                        gp1 += "<td>"+req[x][y][z].app_date+"</td>";
                        gp1 += "<td>"+req[x][y][z].app_time+"</td>";
                        gp1 += "<td>"+req[x][y][z].prod_category+"</td>";
                        gp1 += "<td>"+req[x][y][z].type_of_inspection+" </td>";
                        gp1 += "<td>"+req[x][y][z].severity_of_inspection+"</td>";
                        gp1 += "<td>"+req[x][y][z].inspection_lvl+"</td>";
                        gp1 += "<td>"+req[x][y][z].aql+"</td>";
                        gp1 += "<td>"+req[x][y][z].accept+"</td>";
                        gp1 += "<td>"+req[x][y][z].reject+"</td>";
                        gp1 += "<td>"+req[x][y][z].date_inspected+"</td>";
                        gp1 += "<td>"+req[x][y][z].ww+"</td>";
                        gp1 += "<td>"+req[x][y][z].fy+"</td>";
                        gp1 += "<td>"+req[x][y][z].time_ins_from+"</td>";
                        gp1 += "<td>"+req[x][y][z].shift+"</td>";
                        gp1 += "<td>"+req[x][y][z].inspector+"</td>";
                        gp1 += "<td>"+req[x][y][z].submission+"</td>";
                        gp1 += "<td>"+req[x][y][z].coc_req+"</td>";
                        gp1 += "<td>"+req[x][y][z].judgement+"</td>";
                        gp1 += "<td>"+req[x][y][z].lot_qty+"</td>";
                        gp1 += "<td>"+req[x][y][z].sample_size+"</td>";
                        gp1 += "<td>"+req[x][y][z].lot_inspected+"</td>";
                        gp1 += "<td>"+req[x][y][z].lot_accepted+"</td>";
                        gp1 += "<td>"+req[x][y][z].num_of_defects+"</td>";
                        gp1 += "<td>"+req[x][y][z].remarks+"</td>";
                        gp1 += "<td>"+req[x][y][z].type+"</td>";
                        gp1 += "  </tr>";
                    }

                    gp1 += "</tbody></table>";
                    gp1 += "</div>";
                    gp1 += "</div>";
                    gp1 += "</td>";
                    gp1 += "</tr>";
                
            }
            gp1 += "</tbody>";
            gp1 += "</table>";
            gp1 += "</div>";
            gp1 += "</div>";
            gp1 += "</div>";
            gp1 += "</div>";
     $('#group_by_pane').append(gp1);
 }
 closeloading();
}

function thirdTable(req,datas){
    closeloading();
    var xreplicator = 0;
    for(var x=0;x<req.length;x++){
        var gp1 = "";
            gp1 += "<div class='panel-group accordion scrollable' id='grp"+x+"'>";
            gp1 += "<div class='panel panel-info'><div class='panel-heading'>";
            gp1 += "<h4 class='panel-title'><a class='accordion-toggle collapsed' data-toggle='collapse' data-parent='#grp"+x+"' href='#grp_val"+x+"' aria-expanded='false'>";
            gp1 += datas.field1 + ": "+req[x]["0"]["0"]["0"].chosenfield+"</a>";
            gp1 += "</h4>";
            gp1 += "</div>";
            gp1 += "<div id='grp_val"+x+"' class='panel-collapse collapse' aria-expanded='false'>";
            gp1 += "<div class='panel-body table-responsive' id='child"+x+"'>";
            gp1 += "<table style='font-size:9px' class='table table-condensed table-bordered'>";
            gp1 += "<thead>";
            
            gp1 += "</thead>";
            gp1 += "<tbody id='details_tbody'>";

            for(y=0;y<req[x].length;y++){
                    var idc = guidGenerator();
                    gp1 += "<tr>";
                    gp1 += "<td>";
                    gp1 += "<div class='panel-group accordion scrollable' id='grp"+idc+"'>";
                    gp1 += "<div class='panel panel-info'><div class='panel-heading'>";
                    gp1 += "<h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#grp"+idc+"' href='#grp_val"+idc+"' aria-expanded='true'>";
                    gp1 += datas.field2 + ": "+req[x][y]["0"]["0"].chosenfield2+"</a>";
                    //xreplicator++;
                    gp1 += "</h4>";
                    gp1 += "</div>";

                    gp1 += "<div id='grp_val"+idc+"' class='panel-collapse collapse in' aria-expanded='true'>";
                    gp1 += "<div class='panel-body table-responsive' id='child"+idc+"'>";

                                gp1 += "<table style=width:100%>";
                                for(z=0;z<req[x][y].length;z++){
                                    var idc2 = guidGenerator();
                                    var yy= req[x][y].length;
                                    gp1 += "<tr>";
                                    gp1 += "<td>";
                                    gp1 += "<div class='panel-group accordion scrollable' id='grp"+idc2+"'>";
                                    gp1 += "<div class='panel panel-info'><div class='panel-heading'>";
                                    gp1 += "<h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#grp"+idc2+"' href='#grp_val"+idc2+"' aria-expanded='true'>";
                                    gp1 += datas.field3 + ": "+req[x][y][z]["0"].chosenfield3+"</a>";
                                    gp1 += "</h4>";
                                    gp1 += "</div>";

                                    gp1 += "<div id='grp_val"+idc2+"' class='panel-collapse collapse in' aria-expanded='true' >";
                                    gp1 += "<div class='panel-body table-responsive' id='child"+idc2+"'>";

                                            gp1 += "<table style=width:100%>";
                                            gp1 += "<tbody>";
                                            gp1 += "<tr>";
                                            gp1 += "<tr>";
                                            gp1 += "<td></td>";
                                            gp1 += "<td></td>";
                                            gp1 += "<td><strong>PO</strong></td>";
                                            gp1 += "<td><strong>Device Name</strong></td>";
                                            gp1 += "<td><strong>Customer</strong></td>";
                                            gp1 += "<td><strong>PO Qty</strong></td>";
                                            gp1 += "<td><strong>Family</strong></td>";
                                            gp1 += "<td><strong>Assembly Line</strong></td>";
                                            gp1 += "<td><strong>Lot No</strong></td>";
                                            gp1 += "<td><strong>App. Date</strong></td>";
                                            gp1 += "<td><strong>App. Time</strong></td>";
                                            gp1 += "<td><strong>Category</strong></td>";
                                            gp1 += "<td><strong>Type of Inspection</strong></td>";
                                            gp1 += "<td><strong>Severity of Inspection</strong></td>";
                                            gp1 += "<td><strong>Inspection Level</strong></td>";
                                            gp1 += "<td><strong>AQL</strong></td>";
                                            gp1 += "<td><strong>Accept</strong></td>";
                                            gp1 += "<td><strong>Reject</strong></td>";
                                            gp1 += "<td><strong>Date inspected</strong></td>";
                                            gp1 += "<td><strong>WW</strong></td>";
                                            gp1 += "<td><strong>FY</strong></td>";
                                            gp1 += "<td><strong>Time Inspected</strong></td>";
                                            gp1 += "<td><strong>Shift</strong></td>";
                                            gp1 += "<td><strong>Inspector</strong></td>";
                                            gp1 += "<td><strong>Submission</strong></td>";
                                            gp1 += "<td><strong>COC Requirement</strong></td>";
                                            gp1 += "<td><strong>Judgement</strong></td>";
                                            gp1 += "<td><strong>Lot Qty</strong></td>";
                                            gp1 += "<td><strong>Sample Size</strong></td>";
                                            gp1 += "<td><strong>Lot Inspected</strong></td>";
                                            gp1 += "<td><strong>Lot Accepted</strong></td>";
                                            gp1 += "<td><strong>No. of Defects</strong></td>";
                                            gp1 += "<td><strong>Remarks</strong></td>";
                                            gp1 += "<td><strong>Type</strong></td>";
                                            gp1 += "</tr>";
                                            gp1 += "</tr>";
                                            for(a=0;a<req[x][y][z].length;a++){
                                                var ssl = req[x][y][z].length;
                                                var pp = req[x][y][z][a].po_no;
                                                gp1 += "<tr>";
                                                gp1 += "<td></td>";
                                                gp1 += "<td></td>";
                                                gp1 += "<td>"+req[x][y][z][a].po_no+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].device_name+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].customer+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].po_qty+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].family+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].assembly_line+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].lot_no+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].app_date+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].app_time+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].prod_category+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].type_of_inspection+" </td>";
                                                gp1 += "<td>"+req[x][y][z][a].severity_of_inspection+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].inspection_lvl+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].aql+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].accept+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].reject+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].date_inspected+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].ww+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].fy+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].time_ins_from+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].shift+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].inspector+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].submission+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].coc_req+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].judgement+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].lot_qty+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].sample_size+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].lot_inspected+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].lot_accepted+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].num_of_defects+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].remarks+"</td>";
                                                gp1 += "<td>"+req[x][y][z][a].type+"</td>";
                                                gp1 += "  </tr>";
                                            }
                                            gp1 += "</tbody></table>";
                                    

                                    gp1 += "</div>";
                                    gp1 += "</div>";
                                    gp1 += "</td>";
                                    gp1 += "</tr>";
                                }
                                gp1 += "</table>";

                    // gp1 += "</tbody></table>";
                    gp1 += "</div>";
                    gp1 += "</div>";
                    gp1 += "</td>";
                    gp1 += "</tr>";
                
            }
            gp1 += "</tbody>";
            gp1 += "</table>";
            gp1 += "</div>";
            gp1 += "</div>";
            gp1 += "</div>";
            gp1 += "</div>";
     $('#group_by_pane').append(gp1);
 }
 closeloading();
}

function guidGenerator() {
    var S4 = function() {
       return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
    };
    return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
}

function GroupBy() {
	$('#groupby_modal').modal('show');
}

function GroupByValues(field,element) {
	element.html('<option value=""></option>');
	var data = {
		_token: token,
		field: field
	}
	$.ajax({
		url: GroupByURL,
		type: 'GET',
		dataType: 'JSON',
		data: data,
	}).done(function(data,xhr,textStatus) {
		$.each(data, function(i, x) {
			element.append('<option value="'+x.field+'">'+x.field+'</option>');
		});
	}).fail(function(data,xhr,textStatus) {
		msg("There was an error while processing the values.",'error');
	}).always(function() {
		console.log("complete");
	});
}

function calculateLARDPPM(data) {
    var grp1 = '';
    var grp1_count = 2;
    var grp2 = '';
    var grp2_count = 2;
    var grp3 = '';
    var grp3_count = 2;
    var counter1 = 0;
    var node_child_count = 1;
    var node_parent_count = 1;
    var nxt_node = 1;
    var details = '';
    $('#group_by_pane').html('<div class="btn-group pull-right">'+
                                '<button class="btn btn-danger btn-sm" id="btn_close_groupby">'+
                                    '<i class="fa fa-times"></i> Close'+
                                '</button>'+
                                '<button class="btn btn-info btn-sm" id="btn_pdf_groupby">'+
                                    '<i class="fa fa-file-pdf-o"></i> PDF'+
                                '</button>'+
                                '<button class="btn btn-success btn-sm" id="btn_excel_groupby">'+
                                    '<i class="fa fa-file-excel-o"></i> Excel'+
                                '</button></div><br><br>');
    var details_body = '';
    

    $.each(data, function(i, x) {
        if (i === 'node1' && x.length > 0) {

            $.each(x, function(ii,xx) {
                var panelcolor = 'panel-info';

                if (parseInt(xx.DPPM) > 0) {
                    panelcolor = 'panel-danger';
                }

                grp1 = '';
                grp1 += '<div class="panel-group accordion scrollable" id="grp'+node_parent_count.toString()+'">';
                grp1 += '<div class="panel '+panelcolor+'">';
                grp1 += '<div class="panel-heading">';
                grp1 += '<h4 class="panel-title">';
                grp1 += '<a class="accordion-toggle" onclick="secondChild()" data-toggle="collapse" data-parent="#grp'+node_parent_count.toString()+'" href="#grp_val'+node_parent_count.toString()+'">';
                grp1 += jsUcfirst(xx.group)+': '+xx.group_val;
                grp1 += ' | LAR = '+xx.LAR+' ('+xx.no_of_accepted+' / '+xx.no_of_lots_inspected+')';
                grp1 += ' | DPPM = '+xx.DPPM+' ('+xx.no_of_defects+' / '+xx.sample_size+')';
                grp1 += '</a>';
                grp1 += '</h4>';
                grp1 += '</div>';
                grp1 += '<div id="grp_val'+node_parent_count.toString()+'" class="panel-collapse collapse">';
                grp1 += '<div class="panel-body table-responsive" id="child'+nxt_node.toString()+'">';

                if (xx.details.length > 0) {
                    details = '';
                    details_body = '';
                    details += '<table style="font-size:9px" class="table table-condensed table-bordered">';
                    details += '<thead>';
                    details += '<tr>';
                    details += '<td></td>';
                    details += '<td></td>';
                    details += '<td><strong>PO</strong></td>';
                    details += '<td><strong>Device Name</strong></td>';
                    details += '<td><strong>Customer</strong></td>';
                    details += '<td><strong>PO Qty</strong></td>';
                    details += '<td><strong>Family</strong></td>';
                    details += '<td><strong>Assembly Line</strong></td>';
                    details += '<td><strong>Lot No</strong></td>';
                    details += '<td><strong>App. Date</strong></td>';
                    details += '<td><strong>App. Time</strong></td>';
                    details += '<td><strong>Category</strong></td>';
                    details += '<td><strong>Type of Inspection</strong></td>';
                    details += '<td><strong>Severity of Inspection</strong></td>';
                    details += '<td><strong>Inspection Level</strong></td>';
                    details += '<td><strong>AQL</strong></td>';
                    details += '<td><strong>Accept</strong></td>';
                    details += '<td><strong>Reject</strong></td>';
                    details += '<td><strong>Date inspected</strong></td>';
                    details += '<td><strong>WW</strong></td>';
                    details += '<td><strong>FY</strong></td>';
                    details += '<td><strong>Time Inspected</strong></td>';
                    details += '<td><strong>Shift</strong></td>';
                    details += '<td><strong>Inspector</strong></td>';
                    details += '<td><strong>Submission</strong></td>';
                    details += '<td><strong>COC Requirement</strong></td>';
                    details += '<td><strong>Judgement</strong></td>';
                    details += '<td><strong>Lot Qty</strong></td>';
                    details += '<td><strong>Sample Size</strong></td>';
                    details += '<td><strong>Lot Inspected</strong></td>';
                    details += '<td><strong>Lot Accepted</strong></td>';
                    details += '<td><strong>No. of Defects</strong></td>';
                    details += '<td><strong>Remarks</strong></td>';
                    details += '<td><strong>Type</strong></td>';
                    details += '</tr>';
                    details += '</thead>';
                    details += '<tbody id="details_tbody">';

                    var cnt = 1;

                    $.each(xx.details, function(iii,xxx) {
                        
                        details_body += '<tr>';
                        details_body += '<td>'+cnt+'</td>';
                        details_body += '<td><button class="btn btn-sm view_inspection blue" data-id="'+xxx.id+'"'+ 
                                                'data-assembly_line="'+xxx.assembly_line+'"'+
                                                'data-lot_no="'+xxx.lot_no+'"'+
                                                'data-app_date="'+xxx.app_date+'"'+
                                                'data-app_time="'+xxx.app_time+'"'+
                                                'data-prod_category="'+xxx.prod_category+'"'+
                                                'data-po_no="'+xxx.po_no+'"'+
                                                'data-device_name="'+xxx.device_name+'"'+
                                                'data-customer="'+xxx.customer+'"'+
                                                'data-po_qty="'+xxx.po_qty+'"'+
                                                'data-family="'+xxx.family+'"'+
                                                'data-type_of_inspection="'+xxx.type_of_inspection+'"'+
                                                'data-severity_of_inspection="'+xxx.severity_of_inspection+'"'+
                                                'data-inspection_lvl="'+xxx.inspection_lvl+'"'+
                                                'data-aql="'+xxx.aql+'"'+
                                                'data-accept="'+xxx.accept+'"'+
                                                'data-reject="'+xxx.reject+'"'+
                                                'data-date_inspected="'+xxx.date_inspected+'"'+
                                                'data-ww="'+xxx.ww+'"'+
                                                'data-fy="'+xxx.fy+'"'+
                                                'data-time_ins_from="'+xxx.time_ins_from+'"'+
                                                'data-time_ins_to="'+xxx.time_ins_to+'"'+
                                                'data-shift="'+xxx.shift+'"'+
                                                'data-inspector="'+xxx.inspector+'"'+
                                                'data-submission="'+xxx.submission+'"'+
                                                'data-coc_req="'+xxx.coc_req+'"'+
                                                'data-judgement="'+xxx.judgement+'"'+
                                                'data-lot_qty="'+xxx.lot_qty+'"'+
                                                'data-sample_size="'+xxx.sample_size+'"'+
                                                'data-lot_inspected="'+xxx.lot_inspected+'"'+
                                                'data-lot_accepted="'+xxx.lot_accepted+'"'+ 
                                                'data-num_of_defects="'+xxx.num_of_defects+'"'+
                                                'data-remarks="'+xxx.remarks+'"><i class="fa fa-edit"></i>'+
                                            '</button>'+
                                        '</td>';
                        details_body += '<td>'+xxx.po_no+'</td>';
                        details_body += '<td>'+xxx.device_name+'</td>';
                        details_body += '<td>'+xxx.customer+'</td>';
                        details_body += '<td>'+xxx.po_qty+'</td>';
                        details_body += '<td>'+xxx.family+'</td>';
                        details_body += '<td>'+xxx.assembly_line+'</td>';
                        details_body += '<td>'+xxx.lot_no+'</td>';
                        details_body += '<td>'+xxx.app_date+'</td>';
                        details_body += '<td>'+xxx.app_time+'</td>';
                        details_body += '<td>'+xxx.prod_category+'</td>';
                        details_body += '<td>'+xxx.type_of_inspection+'</td>';
                        details_body += '<td>'+xxx.severity_of_inspection+'</td>';
                        details_body += '<td>'+xxx.inspection_lvl+'</td>';
                        details_body += '<td>'+xxx.aql+'</td>';
                        details_body += '<td>'+xxx.accept+'</td>';
                        details_body += '<td>'+xxx.reject+'</td>';
                        details_body += '<td>'+xxx.date_inspected+'</td>';
                        details_body += '<td>'+xxx.ww+'</td>';
                        details_body += '<td>'+xxx.fy+'</td>';
                        details_body += '<td>'+xxx.time_ins_from+'-'+xxx.time_ins_to+'</td>';
                        details_body += '<td>'+xxx.shift+'</td>';
                        details_body += '<td>'+xxx.inspector+'</td>';
                        details_body += '<td>'+xxx.submission+'</td>';
                        details_body += '<td>'+xxx.coc_req+'</td>';
                        details_body += '<td>'+xxx.judgement+'</td>';
                        details_body += '<td>'+xxx.lot_qty+'</td>';
                        details_body += '<td>'+xxx.sample_size+'</td>';
                        details_body += '<td>'+xxx.lot_inspected+'</td>';
                        details_body += '<td>'+xxx.lot_accepted+'</td>';
                        details_body += '<td>'+xxx.num_of_defects+'</td>';
                        details_body += '<td>'+xxx.remarks+'</td>';
                        details_body += '<td>'+xxx.type+'</td>';
                        details_body += '</tr>';
                        cnt++;
                    });
                    
                    details += details_body;

                    details += '</tbody>';
                    details += '</table>';
                    //$('#child'+node_child_count.toString()).append(details);
                    nxt_node++;
                }

                grp1 += details;
                                    
                grp1 += '</div>';
                grp1 += '</div>';
                grp1 += '</div>';
                grp1 += '</div>';


                $('#group_by_pane').append(grp1);
                node_parent_count++;
                node_child_count++;
            });
            
        }

        if (i === 'node2' && x.length > 0) {
            console.log(x[counter1]);
            
            $.each(x, function(ii,xx) {
                var panelcolor1 = 'panel-primary';
                if (parseInt(xx.DPPM) > 0) {
                    panelcolor1 = 'panel-danger';
                }

                grp2 = '';
                grp2 += '<div class="panel-group accordion scrollable" id="grp'+node_parent_count.toString()+'">';
                grp2 += '<div class="panel '+panelcolor1+'">';
                grp2 += '<div class="panel-heading">';
                grp2 += '<h4 class="panel-title">';
                grp2 += '<a class="accordion-toggle" data-toggle="collapse" data-parent="#grp'+node_parent_count.toString()+'" href="#grp_val'+node_parent_count.toString()+'">';
                grp2 += jsUcfirst(xx.group)+': '+xx.group_val;
                grp2 += ' | LAR = '+xx.LAR+' ('+xx.no_of_accepted+' / '+xx.no_of_lots_inspected+')';
                grp2 += ' | DPPM = '+xx.DPPM+' ('+xx.no_of_defects+' / '+xx.sample_size+')';
                grp2 += '</a>';
                grp2 += '</h4>';
                grp2 += '</div>';
                grp2 += '<div id="grp_val'+node_parent_count.toString()+'" class="panel-collapse collapse">';
                grp2 += '<div class="panel-body table-responsive" style="height:200px" id="child'+node_child_count.toString()+'">';

                if (xx.details.length > 0) {
                    details = '';
                    details_body = '';
                    details += '<table style="font-size:9px" class="table table-condensed table-bordered">';
                    details += '<thead>';
                    details += '<tr>';
                    details += '<td></td>';
                    details += '<td></td>';
                    details += '<td><strong>PO</strong></td>';
                    details += '<td><strong>Device Name</strong></td>';
                    details += '<td><strong>Customer</strong></td>';
                    details += '<td><strong>PO Qty</strong></td>';
                    details += '<td><strong>Family</strong></td>';
                    details += '<td><strong>Assembly Line</strong></td>';
                    details += '<td><strong>Lot No</strong></td>';
                    details += '<td><strong>App. Date</strong></td>';
                    details += '<td><strong>App. Time</strong></td>';
                    details += '<td><strong>Category</strong></td>';
                    details += '<td><strong>Type of Inspection</strong></td>';
                    details += '<td><strong>Severity of Inspection</strong></td>';
                    details += '<td><strong>Inspection Level</strong></td>';
                    details += '<td><strong>AQL</strong></td>';
                    details += '<td><strong>Accept</strong></td>';
                    details += '<td><strong>Reject</strong></td>';
                    details += '<td><strong>Date inspected</strong></td>';
                    details += '<td><strong>WW</strong></td>';
                    details += '<td><strong>FY</strong></td>';
                    details += '<td><strong>Time Inspected</strong></td>';
                    details += '<td><strong>Shift</strong></td>';
                    details += '<td><strong>Inspector</strong></td>';
                    details += '<td><strong>Submission</strong></td>';
                    details += '<td><strong>COC Requirement</strong></td>';
                    details += '<td><strong>Judgement</strong></td>';
                    details += '<td><strong>Lot Qty</strong></td>';
                    details += '<td><strong>Sample Size</strong></td>';
                    details += '<td><strong>Lot Inspected</strong></td>';
                    details += '<td><strong>Lot Accepted</strong></td>';
                    details += '<td><strong>No. of Defects</strong></td>';
                    details += '<td><strong>Remarks</strong></td>';
                    details += '<td><strong>Type</strong></td>';
                    details += '</tr>';
                    details += '</thead>';
                    details += '<tbody id="details_tbody">';

                    var cnt = 1;

                    $.each(xx.details, function(iii,xxx) {
                        
                        details_body += '<tr>';
                        details_body += '<td>'+cnt+'</td>';
                        details_body += '<td><button class="btn btn-sm view_inspection blue" data-id="'+xxx.id+'"'+ 
                                                'data-assembly_line="'+xxx.assembly_line+'"'+
                                                'data-lot_no="'+xxx.lot_no+'"'+
                                                'data-app_date="'+xxx.app_date+'"'+
                                                'data-app_time="'+xxx.app_time+'"'+
                                                'data-prod_category="'+xxx.prod_category+'"'+
                                                'data-po_no="'+xxx.po_no+'"'+
                                                'data-device_name="'+xxx.device_name+'"'+
                                                'data-customer="'+xxx.customer+'"'+
                                                'data-po_qty="'+xxx.po_qty+'"'+
                                                'data-family="'+xxx.family+'"'+
                                                'data-type_of_inspection="'+xxx.type_of_inspection+'"'+
                                                'data-severity_of_inspection="'+xxx.severity_of_inspection+'"'+
                                                'data-inspection_lvl="'+xxx.inspection_lvl+'"'+
                                                'data-aql="'+xxx.aql+'"'+
                                                'data-accept="'+xxx.accept+'"'+
                                                'data-reject="'+xxx.reject+'"'+
                                                'data-date_inspected="'+xxx.date_inspected+'"'+
                                                'data-ww="'+xxx.ww+'"'+
                                                'data-fy="'+xxx.fy+'"'+
                                                'data-time_ins_from="'+xxx.time_ins_from+'"'+
                                                'data-time_ins_to="'+xxx.time_ins_to+'"'+
                                                'data-shift="'+xxx.shift+'"'+
                                                'data-inspector="'+xxx.inspector+'"'+
                                                'data-submission="'+xxx.submission+'"'+
                                                'data-coc_req="'+xxx.coc_req+'"'+
                                                'data-judgement="'+xxx.judgement+'"'+
                                                'data-lot_qty="'+xxx.lot_qty+'"'+
                                                'data-sample_size="'+xxx.sample_size+'"'+
                                                'data-lot_inspected="'+xxx.lot_inspected+'"'+
                                                'data-lot_accepted="'+xxx.lot_accepted+'"'+ 
                                                'data-num_of_defects="'+xxx.num_of_defects+'"'+
                                                'data-remarks="'+xxx.remarks+'"><i class="fa fa-edit"></i>'+
                                            '</button>'+
                                        '</td>';
                        details_body += '<td>'+xxx.po_no+'</td>';
                        details_body += '<td>'+xxx.device_name+'</td>';
                        details_body += '<td>'+xxx.customer+'</td>';
                        details_body += '<td>'+xxx.po_qty+'</td>';
                        details_body += '<td>'+xxx.family+'</td>';
                        details_body += '<td>'+xxx.assembly_line+'</td>';
                        details_body += '<td>'+xxx.lot_no+'</td>';
                        details_body += '<td>'+xxx.app_date+'</td>';
                        details_body += '<td>'+xxx.app_time+'</td>';
                        details_body += '<td>'+xxx.prod_category+'</td>';
                        details_body += '<td>'+xxx.type_of_inspection+'</td>';
                        details_body += '<td>'+xxx.severity_of_inspection+'</td>';
                        details_body += '<td>'+xxx.inspection_lvl+'</td>';
                        details_body += '<td>'+xxx.aql+'</td>';
                        details_body += '<td>'+xxx.accept+'</td>';
                        details_body += '<td>'+xxx.reject+'</td>';
                        details_body += '<td>'+xxx.date_inspected+'</td>';
                        details_body += '<td>'+xxx.ww+'</td>';
                        details_body += '<td>'+xxx.fy+'</td>';
                        details_body += '<td>'+xxx.time_ins_from+'-'+xxx.time_ins_to+'</td>';
                        details_body += '<td>'+xxx.shift+'</td>';
                        details_body += '<td>'+xxx.inspector+'</td>';
                        details_body += '<td>'+xxx.submission+'</td>';
                        details_body += '<td>'+xxx.coc_req+'</td>';
                        details_body += '<td>'+xxx.judgement+'</td>';
                        details_body += '<td>'+xxx.lot_qty+'</td>';
                        details_body += '<td>'+xxx.sample_size+'</td>';
                        details_body += '<td>'+xxx.lot_inspected+'</td>';
                        details_body += '<td>'+xxx.lot_accepted+'</td>';
                        details_body += '<td>'+xxx.num_of_defects+'</td>';
                        details_body += '<td>'+xxx.remarks+'</td>';
                        details_body += '<td>'+xxx.type+'</td>';
                        details_body += '</tr>';
                        cnt++;
                    });

                    details += details_body;

                    details += '</tbody>';
                    details += '</table>';
                    //$('#child'+node_child_count.toString()).append(details);
                }

                grp2 += details;
                                    
                grp2 += '</div>';
                grp2 += '</div>';
                grp2 += '</div>';
                grp2 += '</div>';


                $('#child'+nxt_node).append(grp2);
                node_parent_count++;
                node_child_count++;
                panelcolor1 = '';
            });
            nxt_node++;
        }

        if (i === 'node3' && x.length > 0) {
            console.log(x[counter1]);
            
            $.each(x, function(ii,xx) {
                var panelcolor = 'panel-success';

                if (parseInt(xx.DPPM) > 0) {
                    panelcolor = 'panel-danger';
                }

                grp3 = '';
                grp3 += '<div class="panel-group accordion scrollable" id="grp'+node_parent_count.toString()+'">';
                grp3 += '<div class="panel '+panelcolor+'">';
                grp3 += '<div class="panel-heading">';
                grp3 += '<h4 class="panel-title">';
                grp3 += '<a class="accordion-toggle" data-toggle="collapse" data-parent="#grp'+node_parent_count.toString()+'" href="#grp_val'+node_parent_count.toString()+'">';
                grp3 += jsUcfirst(xx.group)+': '+xx.group_val;
                grp3 += ' | LAR = '+xx.LAR+' ('+xx.no_of_accepted+' / '+xx.no_of_lots_inspected+')';
                grp3 += ' | DPPM = '+xx.DPPM+' ('+xx.no_of_defects+' / '+xx.sample_size+')';
                grp3 += '</a>';
                grp3 += '</h4>';
                grp3 += '</div>';
                grp3 += '<div id="grp_val'+node_parent_count.toString()+'" class="panel-collapse collapse">';
                grp3 += '<div class="panel-body table-responsive" id="child'+node_child_count.toString()+'">';

                if (xx.details.length > 0) {
                    details = '';
                    details_body = '';
                    details += '<table style="font-size:10px" class="table table-condensed table-bordered">';
                    details += '<thead>';
                    details += '<tr>';
                    details += '<td></td>';
                    details += '<td></td>';
                    details += '<td><strong>PO</strong></td>';
                    details += '<td><strong>Device Name</strong></td>';
                    details += '<td><strong>Customer</strong></td>';
                    details += '<td><strong>PO Qty</strong></td>';
                    details += '<td><strong>Family</strong></td>';
                    details += '<td><strong>Assembly Line</strong></td>';
                    details += '<td><strong>Lot No</strong></td>';
                    details += '<td><strong>App. Date</strong></td>';
                    details += '<td><strong>App. Time</strong></td>';
                    details += '<td><strong>Category</strong></td>';
                    details += '<td><strong>Type of Inspection</strong></td>';
                    details += '<td><strong>Severity of Inspection</strong></td>';
                    details += '<td><strong>Inspection Level</strong></td>';
                    details += '<td><strong>AQL</strong></td>';
                    details += '<td><strong>Accept</strong></td>';
                    details += '<td><strong>Reject</strong></td>';
                    details += '<td><strong>Date inspected</strong></td>';
                    details += '<td><strong>WW</strong></td>';
                    details += '<td><strong>FY</strong></td>';
                    details += '<td><strong>Time Inspected</strong></td>';
                    details += '<td><strong>Shift</strong></td>';
                    details += '<td><strong>Inspector</strong></td>';
                    details += '<td><strong>Submission</strong></td>';
                    details += '<td><strong>COC Requirement</strong></td>';
                    details += '<td><strong>Judgement</strong></td>';
                    details += '<td><strong>Lot Qty</strong></td>';
                    details += '<td><strong>Sample Size</strong></td>';
                    details += '<td><strong>Lot Inspected</strong></td>';
                    details += '<td><strong>Lot Accepted</strong></td>';
                    details += '<td><strong>No. of Defects</strong></td>';
                    details += '<td><strong>Remarks</strong></td>';
                    details += '<td><strong>Type</strong></td>';
                    details += '</tr>';
                    details += '</thead>';
                    details += '<tbody id="details_tbody">';

                    var cnt = 1;

                    $.each(xx.details, function(iii,xxx) {
                        
                        details_body += '<tr>';
                        details_body += '<td>'+cnt+'</td>';
                        details_body += '<td><button class="btn btn-sm view_inspection blue" data-id="'+xxx.id+'"'+ 
                                                'data-assembly_line="'+xxx.assembly_line+'"'+
                                                'data-lot_no="'+xxx.lot_no+'"'+
                                                'data-app_date="'+xxx.app_date+'"'+
                                                'data-app_time="'+xxx.app_time+'"'+
                                                'data-prod_category="'+xxx.prod_category+'"'+
                                                'data-po_no="'+xxx.po_no+'"'+
                                                'data-device_name="'+xxx.device_name+'"'+
                                                'data-customer="'+xxx.customer+'"'+
                                                'data-po_qty="'+xxx.po_qty+'"'+
                                                'data-family="'+xxx.family+'"'+
                                                'data-type_of_inspection="'+xxx.type_of_inspection+'"'+
                                                'data-severity_of_inspection="'+xxx.severity_of_inspection+'"'+
                                                'data-inspection_lvl="'+xxx.inspection_lvl+'"'+
                                                'data-aql="'+xxx.aql+'"'+
                                                'data-accept="'+xxx.accept+'"'+
                                                'data-reject="'+xxx.reject+'"'+
                                                'data-date_inspected="'+xxx.date_inspected+'"'+
                                                'data-ww="'+xxx.ww+'"'+
                                                'data-fy="'+xxx.fy+'"'+
                                                'data-time_ins_from="'+xxx.time_ins_from+'"'+
                                                'data-time_ins_to="'+xxx.time_ins_to+'"'+
                                                'data-shift="'+xxx.shift+'"'+
                                                'data-inspector="'+xxx.inspector+'"'+
                                                'data-submission="'+xxx.submission+'"'+
                                                'data-coc_req="'+xxx.coc_req+'"'+
                                                'data-judgement="'+xxx.judgement+'"'+
                                                'data-lot_qty="'+xxx.lot_qty+'"'+
                                                'data-sample_size="'+xxx.sample_size+'"'+
                                                'data-lot_inspected="'+xxx.lot_inspected+'"'+
                                                'data-lot_accepted="'+xxx.lot_accepted+'"'+ 
                                                'data-num_of_defects="'+xxx.num_of_defects+'"'+
                                                'data-remarks="'+xxx.remarks+'"><i class="fa fa-edit"></i>'+
                                            '</button>'+
                                        '</td>';
                        details_body += '<td>'+xxx.po_no+'</td>';
                        details_body += '<td>'+xxx.device_name+'</td>';
                        details_body += '<td>'+xxx.customer+'</td>';
                        details_body += '<td>'+xxx.po_qty+'</td>';
                        details_body += '<td>'+xxx.family+'</td>';
                        details_body += '<td>'+xxx.assembly_line+'</td>';
                        details_body += '<td>'+xxx.lot_no+'</td>';
                        details_body += '<td>'+xxx.app_date+'</td>';
                        details_body += '<td>'+xxx.app_time+'</td>';
                        details_body += '<td>'+xxx.prod_category+'</td>';
                        details_body += '<td>'+xxx.type_of_inspection+'</td>';
                        details_body += '<td>'+xxx.severity_of_inspection+'</td>';
                        details_body += '<td>'+xxx.inspection_lvl+'</td>';
                        details_body += '<td>'+xxx.aql+'</td>';
                        details_body += '<td>'+xxx.accept+'</td>';
                        details_body += '<td>'+xxx.reject+'</td>';
                        details_body += '<td>'+xxx.date_inspected+'</td>';
                        details_body += '<td>'+xxx.ww+'</td>';
                        details_body += '<td>'+xxx.fy+'</td>';
                        details_body += '<td>'+xxx.time_ins_from+'-'+xxx.time_ins_to+'</td>';
                        details_body += '<td>'+xxx.shift+'</td>';
                        details_body += '<td>'+xxx.inspector+'</td>';
                        details_body += '<td>'+xxx.submission+'</td>';
                        details_body += '<td>'+xxx.coc_req+'</td>';
                        details_body += '<td>'+xxx.judgement+'</td>';
                        details_body += '<td>'+xxx.lot_qty+'</td>';
                        details_body += '<td>'+xxx.sample_size+'</td>';
                        details_body += '<td>'+xxx.lot_inspected+'</td>';
                        details_body += '<td>'+xxx.lot_accepted+'</td>';
                        details_body += '<td>'+xxx.num_of_defects+'</td>';
                        details_body += '<td>'+xxx.remarks+'</td>';
                        details_body += '<td>'+xxx.type+'</td>';
                        details_body += '</tr>';
                        cnt++;
                    });

                    details += details_body;

                    details += '</tbody>';
                    details += '</table>';
                    //$('#child'+node_child_count.toString()).append(details);
                    //nxt_node++;
                }

                node_child_count++;

                grp3 += details;
                                    
                grp3 += '</div>';
                grp3 += '</div>';
                grp3 += '</div>';
                grp3 += '</div>';


                $('#child'+nxt_node).append(grp3);
                node_parent_count++;
            });
        }

    });
    //node_parent_count++;

}

function clearGrpByFields() {
    $('.grpfield').val('');
}

// $(function(){
// $(".Collapsable").click(function () {

//         $(this).parent().children().toggle();
//         $(this).toggle();

//     });

// $(".Collapsable").each(function(){

//         $(this).parent().children().toggle();
//         $(this).toggle();
// });
// })