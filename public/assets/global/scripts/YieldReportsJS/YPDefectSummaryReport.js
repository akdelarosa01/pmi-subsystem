$( function() {
     $('#dsr-po').on('change', function() {
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
                    $('#dsr-ptype').val(data.prod_type);
                    $('#dsr-family').val(data.family);
                    $('#dsr-series').val(data.series);
                    $('#dsr-device').val(data.device_name);
               }).fail(function(xhr, textStatus, errorThrown) {
                    console.log("error");
               });
               
          }
     });
});

function defectsummaryRpt(){
     window.location.href = defectsummaryRptURL + "?_token=" + token + 
          "&&datefrom=" + $('#dsr-datefrom').val() + 
          "&&dateto=" + $('#dsr-dateto').val() + 
          '&&ptype=' + $('#dsr-ptype').val() +
          '&&family=' + $('#dsr-family').val() +
          '&&series=' + $('#dsr-series').val() +
          '&&device=' + $('#dsr-device').val() +
          '&&po=' + $('#dsr-po').val();
}

