function load_upload1()
{
   
  $.ajax({
                url:'../../../scripts/o.php?o=1',
		type:'GET',
                cache:false,
		success:function(data){
                    
                        
			var tempfile='';
			$("#file_upload1").uploadify({
                                'swf'       : '../../../js/jq_uploadify/uploadify.swf',
                                'buttonText'	 : 'Seleccionar',
                                'uploader'         : '../../../scripts/upload_inicio.php',
                                'cancelImg'      : '../../../js/jq_uploadify/cancel.png',
                                'queueID'        : 'fileQueue1',
                                'auto'           : false,
                                'multi'          : false,
                                'onSelect'	:function(file){

                                        tempfile = file.name;
                                },
                                'onUploadComplete' : function(file){

                                            save_img(file.name,'Inicio');

                                },
                                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                                                    alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                                        }
                        });
                        
                        
                        $("#ImageT1").click(function(){
                            if(tempfile != '')
                             {
                                 $("#file_upload1").uploadify('upload','*');
                              }
                             else
                                 {

                                 }
                        });
                                },
		error:function(req,e,er) {
			alert('error!');
		}
	});
   
       
}
function load_upload2()
{
   
      $.ajax({
                url:'../../../scripts/o.php?o=1',
		type:'GET',
                cache:false,
		success:function(data){
                    
                        
			var tempfile='';
			$("#file_upload2").uploadify({
                                'swf'       : '../../../js/jq_uploadify/uploadify.swf',
                                'buttonText'	 : 'Seleccionar',
                                'uploader'         : '../../../scripts/upload_inicio.php',
                                'cancelImg'      : '../../../js/jq_uploadify/cancel.png',
                                'queueID'        : 'fileQueue2',
                                'auto'           : false,
                                'multi'          : false,
                                'onSelect'	:function(file){

                                        tempfile = file.name;
                                },
                                'onUploadComplete' : function(file){

                                        save_img(file.name,'Header');

                                },
                                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                                                    alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                                        }
                        });
                        
                        
                        $("#ImageT2").click(function(){
                            if(tempfile != '')
                             {
                                 $("#file_upload2").uploadify('upload','*');
                              }
                             else
                                 {

                                 }
                        });
                                },
		error:function(req,e,er) {
			alert('error!');
		}
	});    
}
function load_upload3()
{
   
  $.ajax({
                url:'../../../scripts/o.php?o=1',
		type:'GET',
                cache:false,
		success:function(data){
                    
                        
			var tempfile='';
			$("#file_upload3").uploadify({
                                'swf'       : '../../../js/jq_uploadify/uploadify.swf',
                                'buttonText'	 : 'Seleccionar',
                                'uploader'         : '../../../scripts/upload_inicio.php',
                                'cancelImg'      : '../../../js/jq_uploadify/cancel.png',
                                'queueID'        : 'fileQueue3',
                                'auto'           : false,
                                'multi'          : false,
                                'onSelect'	:function(file){

                                        tempfile = file.name;
                                },
                                'onUploadComplete' : function(file){

                                        save_img(file.name,'Reportes');

                                },
                                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                                                    alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                                        }
                        });
                        
                        
                        $("#ImageT3").click(function(){
                            if(tempfile != '')
                             {
                                 $("#file_upload3").uploadify('upload','*');
                              }
                             else
                                 {

                                 }
                        });
                                },
		error:function(req,e,er) {
			alert('error!');
		}
	});     
}
function save_img(img,tipo)
{
    var losdatos = {img:img,tipo:tipo};
    $.ajax({
                url:'../../../scripts/o.php?o=2',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                      
		},
		error:function(req,e,er) {
			alert('error!f');
		}
	}); 
}


