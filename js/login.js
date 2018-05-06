function login()
{
    var losdatos = {user:$("#usuario").val(),pass:$("#password").val()};
    $.ajax({
                url:'scripts/login.php',
		type:'POST',
                cache:false,
                data:losdatos,
		success:function(data)
                {
		    var log=data;
                    
	            if(log=="YES")
                     {
                         window.location.href='sai_iniciar.php';
                     } 
                     else
                         {
                             smoke.signal("Error en las credenciales de acceso");
                         }
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
}

