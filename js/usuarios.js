
function ver_grid()
{
    
   $("#Grids").empty();
   $.ajax({
                url:'../../../scripts/oper_usuarios.php?o=2',
		type:'POST',
		success:function(data)
                {
                    $("#Grids").append(data);    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
function add_user()
{
    var losdatos = {idempleado:$("#IdEmpleado").val(),nombres:$("#Nombres").val(),usuario:$("#Usuario").val(),password:$("#Password").val()};
    $.ajax({
                url:'../../../scripts/oper_usuarios.php?o=1',
		type:'POST',
                cache:false,
                data:losdatos,
		success:function(data)
                {
		    smoke.signal('Registro agregado con exito.');
                    $("#IdEmpleado").val('');
                    $("#Nombres").val('');
                    $("#Usuario").val('');
                    $("#Password").val('');
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
}

function saver_Order()
{
       document.frmOrderGrid.submit();
}
function saver_Order_procesos()
{
       document.frmOrderGridProcesos.submit();
}
function show_hide_nuevo()
{
    $("#formModificar").hide();
    if(formAlta.style.display=="none")
        {
            formAlta.style.display="inline";
        }
    else
        {
            formAlta.style.display="none";
        }
}
function show_hide_modificar()
{
    $("#formAlta").hide();
    if(formModificar.style.display=="none")
        {
            formModificar.style.display="inline";
        }
    else
        {
            formModificar.style.display="none";
        }
}
function del_user(id)
{
    var losdatos = {id:id};
    $.ajax({
                url:'../../../scripts/oper_usuarios.php?o=3',
		type:'POST',
                cache:false,
                data:losdatos,
		success:function(data)
                {
		    smoke.signal('Registro borrado con exito.');
                    ver_grid();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
    
}

function showAll_usuario()
{
    
    $("#GridUsuarios").empty();
    $.ajax({
                url:'../../../scripts/oper_usuarios.php?o=4',
		type:'POST',
                cache:false,
		success:function(data)
                {
		   $("#GridUsuarios").append(data); 
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
function showCatalogo_menu(id)
{
    $("#GridUsuarios").hide();  
    $("#GridMenuCatalogo").empty();
    var losdatos = {id:id};
    $.ajax({
                url:'../../../scripts/oper_usuarios.php?o=5',
		type:'POST',
                cache:false,
                data:losdatos,
		success:function(data)
                {
		   $("#GridMenuCatalogo").append(data); 
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
function showCatalogo_procesos(id)
{
    $("#GridUsuarios").hide();  
    $("#GridMenuCatalogo").empty();
    var losdatos = {id:id};
    $.ajax({
                url:'../../../scripts/oper_usuarios.php?o=6',
		type:'POST',
                cache:false,
                data:losdatos,
		success:function(data)
                {
		   $("#GridMenuCatalogo").append(data); 
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
function showCatalogo_reportes(id)
{
    $("#GridUsuarios").hide();  
    $("#GridMenuCatalogo").empty();
    var losdatos = {id:id};
    $.ajax({
                url:'../../../scripts/oper_usuarios.php?o=7',
		type:'POST',
                cache:false,
                data:losdatos,
		success:function(data)
                {
		   $("#GridMenuCatalogo").append(data); 
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
