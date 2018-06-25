function defectsummaryRpt(){
     var dsrdatefrom = $('#dsr-datefrom').val();
     var dsrdateto = $('#dsr-dateto').val();
     var ptype = $('#dsr-ptype').val();
     var icsocket = $('#dsr-icsocket').val();
     var fol = $('#dsr-fol').val();
     var option = "";
     if($('#dsr-icsocket').is(':checked')){
          option = icsocket;   
     }
     if($('#dsr-fol').is(':checked')){
          option = fol;
     }
    
     var token = "{{ Session::token() }}";
     var paramfrom = dsrdatefrom.split("/");
     var paramto = dsrdateto.split("/");
     var datefrom = paramfrom[2]+'-'+paramfrom[0]+'-'+paramfrom[1];
     var dateto = paramto[2]+'-'+paramto[0]+'-'+paramto[1];

     window.location = "{{ url('/defectsummaryRpt') }}" + "?_token=" + token + "&&datefrom=" + datefrom + "&&dateto=" + dateto + "&&ptype=" + ptype + "&&option=" + option;
}