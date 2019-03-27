function yieldsumfamRpt(){
     
     var ysfdatefrom = $('#ysf-datefrom').val();
     var ysfdateto = $('#ysf-dateto').val();
     var ptype = $('#ysf-ptype').val();
     var family = $('#ysf-family').val();

     window.location = yieldsumfamRptURL + "?_token=" + token + "&&datefrom=" + ysfdatefrom + "&&dateto=" + ysfdateto + 
                         "&&prodtype=" + ptype + "&&family=" + family;
}