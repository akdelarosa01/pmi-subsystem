function yieldsumfamRpt(){
     
     var ysfdatefrom = $('#ysf-datefrom').val();
     var ysfdateto = $('#ysf-dateto').val();
     var yieldtarget = $('#ysf-yieldtarget').val();
     var checkboxicsocket = $('#ysf-icsocket').val();
     var ptype = $('#ysf-ptype').val();
    
     var checkboxfol = $('#ysf-fol').val();
     var token = "{{ Session::token() }}";
     var paramfrom = ysfdatefrom.split("/");
     var paramto = ysfdateto.split("/");
     var datefrom = paramfrom[2]+'-'+paramfrom[0]+'-'+paramfrom[1];
     var dateto = paramto[2]+'-'+paramto[0]+'-'+paramto[1];  
     var chosen = $('input[name=chose]').val();

     window.location = "{{ url('/yieldsumfamRpt') }}" + "?_token=" + token + "&&datefrom=" + datefrom + "&&dateto=" + dateto + "&&chosen=" + chose + "&&yieldtarget=" + yieldtarget + "&&ptype=" + ptype;

     // $.ajax({
     //      url: "{{ url('/yieldsumRptpdf') }}",
     //      method: 'get',
     //      data:  {
     //           yieldtarget:yieldtarget     
     //      },  
     // }).done(function(data, textStatus, jqXHR) {
     //      //alert(data);
     // }).fail(function(jqXHR, textStatus, errorThrown) {
     //      console.log(errorThrown+'|'+textStatus);
     // });
}

function yieldsumfamRptpdf(){
     
     var ysfdatefrom = $('#ysf-datefrom').val();
     var ysfdateto = $('#ysf-dateto').val();
     var yieldtarget = $('#ysf-yieldtarget').val();
     var checkboxicsocket = $('#ysf-icsocket').val();

    
     var checkboxfol = $('#ysf-fol').val();
     var token = "{{ Session::token() }}";
     var paramfrom = ysfdatefrom.split("/");
     var paramto = ysfdateto.split("/");
     var datefrom = paramfrom[2]+'-'+paramfrom[0]+'-'+paramfrom[1];
     var dateto = paramto[2]+'-'+paramto[0]+'-'+paramto[1];  
     var chosen = $('input[name=chose]').val();

     window.location = "{{ url('/yieldsumfamRptpdf') }}" + "?_token=" + token + "&&datefrom=" + datefrom + "&&dateto=" + dateto + "&&chosen=" + chose;

     // $.ajax({
     //      url: "{{ url('/yieldsumRptpdf') }}",
     //      method: 'get',
     //      data:  {
     //           yieldtarget:yieldtarget     
     //      },  
     // }).done(function(data, textStatus, jqXHR) {
     //      //alert(data);
     // }).fail(function(jqXHR, textStatus, errorThrown) {
     //      console.log(errorThrown+'|'+textStatus);
     // });
}