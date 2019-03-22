var btn_cargar=document.getElementById('btn_cargar_usuarios'),
	error_box=document.getElementById('error_box'),
	tabla=document.getElementById('table'),
	loader=document.getElementById('loader');





	var idUser,nameUser,facultad,userStatus;


function load_Users(){

	tabla.innerHTML='<th>Matricula:</th><th>Nombre Estudiante</th><th>Facultad</th><th>Status</th></tr>';
	var request=new XMLHttpRequest();
	request.open('GET','php/read_data.php');
	loader.classList.add('active');


	request.onload=function(){

		var data=JSON.parse(request.responseText);
		console.log(data);

		if (data.error) {
			error_box.classList.add('active');
		}else{
			
			for (var i = 0; i <data.length; i++) {
				var element =document.createElement('tr');
			//Creating a row type element
			element.innerHTML+=("<td>"+data[i]._id+"</td>");
			element.innerHTML+=("<td>"+data[i]._Nombre+"</td>");
			element.innerHTML+=("<td>"+data[i]._Facultad+"</td>");
			element.innerHTML+=("<td>"+data[i].Status+"</td>");
			//inside that row i just put the data
			document.getElementById('table').appendChild(element);
			
				
			}

		}

	}



	request.onreadystatechange=function(){
			

		if (request.readyState==4 && request.status==200) {
				loader.classList.remove('active');


		}
	}
	request.send();

}

function addUSer(e){
	e.preventDefault();
	var request=new XMLHttpRequest();
	request.open('POST','php/insert_user.php');

	idUser=formulario.Matricula.value.trim();
	nameUser=formulario.Nombre.value.trim();
	facultad=formulario.Facultad.value.trim();
	userStatus=formulario.Status.value.trim();

		if (formulario_valido()) {
			error_box.classList.remove('active');
			var parameters='Matricula='+ idUser + '&Nombre='+ nameUser+'&Facultad='+ facultad+'&Status='+ userStatus;
			request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

			loader.classList.add('active');
			request.onload=function(){
				load_Users();
				formulario.Matricula.value='';
				formulario.Nombre.value='';
				formulario.Facultad.value='';
				formulario.Status.value='';
			}
			request.onreadystatechange=function(){
				if (request.readyState==4 && request.status==200) {
					loader.classList.remove('active');
				}
			}
			request.send(parameters);
			console.log('ok');
			console.log(parameters);
		}else{
			error_box.classList.add('active');
			error_box.innerHTML='Completa el form';
		}
}


btn_cargar.addEventListener('click',function(){

	load_Users();


});



formulario.addEventListener('submit',function(e){

	addUSer(e);

});



function formulario_valido(){
	
	if (idUser=='') {
		return false;
	}else if(nameUser==''){
		return false;

	}else if(facultad==''){
		return false;
	}else if(userStatus==''){
		return false;

	}
	return true;
}


setTimeOut(function(){
	

	
},2000);