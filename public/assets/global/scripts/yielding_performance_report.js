var i =0;

$( function(e) {    
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
});

function loadchart(){
     var datefroms = $('#datefroms').val();
     var datetos = $('#datetos').val();
     var data = {_token: token, datefroms:datefroms, datetos:datetos};
     $.ajax({
          url:loadchart,
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

     $.post(updateyieldsummary,
     { 
          _token: token
          , data: myData
     }).done(function(data, textStatus, jqXHR){
          /*console.log(data);*/
          window.location.href=ReportYieldPerformance;
     }).fail(function(jqXHR, textStatus, errorThrown){
          console.log(errorThrown+'|'+textStatus);
     });
}
