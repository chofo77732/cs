function validar_curso(){
	var categoria, img, vid;
	categoria=document.getElementById("categoria").value;
	img=document.getElementById("imagen").value;
	vid=document.getElementById("video").value;

	if(categoria=="" ||  img=="" ||  vid==""){
		if(categoria=="" &  img=="" &  vid==""){
			alert("No has selecciondado categoria, imagen y video");
		}else{
			if(categoria=="" &  img==""){
			alert("No has selecciondado categoria y imagen");
		}else{
			if(categoria=="" &  vid==""){
			alert("No has selecciondado categoria y video");
		}else{
			if(img=="" &  vid==""){
			alert("No has selecciondado imagen y video");
		}else{
			if(categoria=="" ){
			alert("No has selecciondado categoria");
		}
						if(img=="" ){
			alert("No has selecciondado imagen");
		}
						if(vid=="" ){
			alert("No has selecciondado video");
		}
		}
				
		}
						
		}
				
		}
		
		
		
		return false;
	}else{

	return true;		
	}
}