function summaryREpt(){
 	var srdatefrom = $('#srdatefrom').val();
 	var srdateto = $('#srdateto').val();
	var srprodtype = $('#srprodtype').val();
	var paramfrom = srdatefrom.split("/");
	var paramto = srdateto.split("/");
	var datefrom = paramfrom[2]+'-'+paramfrom[0]+'-'+paramfrom[1];
	var dateto = paramto[2]+'-'+paramto[0]+'-'+paramto[1];
    

     window.location = summaryREptURL + "?_token=" + token + "&&datefrom=" + datefrom + "&&dateto=" + dateto + "&&srprodtype=" + srprodtype;
}