function calculo()
{
    
   $("#DivLoad1").show();
   $.ajax({
                url:'../../../scripts/oper_calculoconsumopromedio.php?o=1',
		type:'POST',
		success:function(data)
                {
                    $("#DivLoad1").hide();
                    smoke.signal('Registros actualizados.');
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
