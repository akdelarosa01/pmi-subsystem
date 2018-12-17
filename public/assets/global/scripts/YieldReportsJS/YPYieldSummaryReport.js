$( function() {
     $('#ypsr-datefrom').on('change', function(event) {
          $.ajax({
               url: getYieldTargetURL,
               type: 'GET',
               dataType: 'JSON',
               data: {
                    _token: token,
                    date_from:$('#ypsr-datefrom').val(),
                    date_to:$('#ypsr-dateto').val(),
                    prod_type:$('#ypsr-prodtype').val()
               },
          }).done(function(data, textStatus, xhr) {
               console.log(data);
               $('#ypsr-targetyield').val(data.target_yield);
          }).fail(function(xhr, textStatus, errorThrown) {
               console.log("error");
          });
          
     });

     $('#ypsr-dateto').on('change', function(event) {
          $.ajax({
               url: getYieldTargetURL,
               type: 'GET',
               dataType: 'JSON',
               data: {
                    _token: token,
                    date_from:$('#ypsr-datefrom').val(),
                    date_to:$('#ypsr-dateto').val(),
                    prod_type:$('#ypsr-prodtype').val()
               },
          }).done(function(data, textStatus, xhr) {
               console.log(data);
               $('#ypsr-targetyield').val(data.target_yield);
          }).fail(function(xhr, textStatus, errorThrown) {
               console.log("error");
          });
          
     });

     $('#ypsr-prodtype').on('change', function(event) {
          $.ajax({
               url: getYieldTargetURL,
               type: 'GET',
               dataType: 'JSON',
               data: {
                    _token: token,
                    date_from:$('#ypsr-datefrom').val(),
                    date_to:$('#ypsr-dateto').val(),
                    prod_type:$('#ypsr-prodtype').val()
               },
          }).done(function(data, textStatus, xhr) {
               console.log(data);
               $('#ypsr-targetyield').val(data.target_yield);
          }).fail(function(xhr, textStatus, errorThrown) {
               console.log("error");
          });
          
     });
});



function yieldsumRpt() {
     var prodtype = $('#ypsr-prodtype').val();
     var target_yield = $('#ypsr-targetyield').val();
     var ypsrdatefrom = $('#ypsr-datefrom').val();
     var ypsrdateto = $('#ypsr-dateto').val();

     window.location = yieldsumRptURL + "?_token=" + token + 
                                   "&&datefrom=" + ypsrdatefrom + 
                                   "&&dateto=" + ypsrdateto + 
                                   "&&prodtype=" + prodtype + 
                                   "&&target_yield=" + target_yield;
}