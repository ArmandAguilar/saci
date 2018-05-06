function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_factorpronostico.php?o=1',
		type:'POST',
		success:function(data)
                {
                    $("#DivTrabajo").append(data);    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
function add_fp()
{
    
    
    var  losdatos = {cboAnio:$("#cboAnio").val(),cboMes:$("#cboMes").val(),txtFactor:$("#txtFactor").val()};
    var v1=$("#cboAnio").val();
    var v2=$("#cboMes").val();
    var v3=$("#txtFactor").val();
    if(v1=="")
    {
       jQuery('#cboAnio').validationEngine('validate');  
    }
    else{
            if(v2=="")
              {
                jQuery('#cboMes').validationEngine('validate');    
              } 
           else
              {
                  if(v3=="")
                    {
                      jQuery('#txtFactor').validationEngine('validate');    
                    }  
                  else
                      {
                            $.ajax({
                                    url:'../../../scripts/oper_cat_factorpronostico.php?o=2',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                    {
                                        smoke.signal('Registro agregado con exito.');
                                        
                                        load_frm();
                                    },
                                    error:function(req,e,er) {
                                            alert('error!');
                                    }
                            }); 
                      }
                      
              }
     
      }

}
function saver_Order()
{
       document.frmOrderGrid.submit();
}
function borrar_factor(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_factorpronostico.php?o=3',
		type:'POST',
                data:losdatos,
                cache:false,
		success:function(data)
                {
                     load_frm()    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});    
	}
        else
        {}
   });
    
}

