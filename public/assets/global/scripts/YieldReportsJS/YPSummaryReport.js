$( function() {
     $('#srpo').on('change', function() {
          if ($(this).val() == '') {

          } else {
               $.ajax({
                    url: searchPOdetailsURL,
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                         _token: token,
                         po: $(this).val()
                    },
               }).done(function(data, textStatus, xhr) {
                    console.log(data);
                    $('#srprodtype').val(data.prod_type);
                    $('#srfamily').val(data.family);
                    $('#srseries').val(data.series);
                    $('#srdevice').val(data.device_name);
               }).fail(function(xhr, textStatus, errorThrown) {
                    console.log("error");
               });
               
          }
     });
});

function summaryREpt(){
     window.location.href = summaryREptURL + "?_token=" + token + 
          "&&datefrom=" + $('#srdatefrom').val() + 
          "&&dateto=" + $('#srdateto').val() + 
          '&&ptype=' + $('#srprodtype').val() +
          '&&family=' + $('#srfamily').val() +
          '&&series=' + $('#srseries').val() +
          '&&device=' + $('#srdevice').val() +
          '&&po=' + $('#srpo').val();
}