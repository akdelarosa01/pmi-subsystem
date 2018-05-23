function yieldsumRpt(){
     var prodtype = $('#ypsr-prodtype').val();
     var family = $('#ypsr-family').val();
     var series = $('#ypsr-seriesname').val();
     var device = $('#ypsr-device').val();
     var pono = $('#ypsr-ponumber').val();
     var ypsrdatefrom = $('#ypsr-datefrom').val();
     var ypsrdateto = $('#ypsr-dateto').val();
     var token = "{{ Session::token() }}";
     var paramfrom = ypsrdatefrom.split("/");
     var paramto = ypsrdateto.split("/");
     var datefrom = paramfrom[2]+'-'+paramfrom[0]+'-'+paramfrom[1];
     var dateto = paramto[2]+'-'+paramto[0]+'-'+paramto[1];  

     window.location = "{{ url('/yieldsumRpt') }}" + "?_token=" + token + "&&datefrom=" + datefrom + "&&dateto=" + dateto + "&&prodtype=" + prodtype + "&&family=" + family + "&&series=" + series + "&&device=" + device + "&&pono=" + pono;    
}

function yieldsumRptpdf(){
     var prodtype = $('#ypsr-prodtype').val();
     var family = $('#ypsr-family').val();
     var series = $('#ypsr-seriesname').val();
     var device = $('#ypsr-device').val();
     var pono = $('#ypsr-ponumber').val();
     var ypsrdatefrom = $('#ypsr-datefrom').val();
     var ypsrdateto = $('#ypsr-dateto').val();
     var token = "{{ Session::token() }}";
     var paramfrom = ypsrdatefrom.split("/");
     var paramto = ypsrdateto.split("/");
     var datefrom = paramfrom[2]+'-'+paramfrom[0]+'-'+paramfrom[1];
     var dateto = paramto[2]+'-'+paramto[0]+'-'+paramto[1];  

     window.location = "{{ url('/yieldsumRptpdf') }}" + "?_token=" + token + "&&datefrom=" + datefrom + "&&dateto=" + dateto + "&&prodtype=" + prodtype + "&&family=" + family + "&&series=" + series + "&&device=" + device + "&&pono=" + pono;    
}