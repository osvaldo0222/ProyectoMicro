var btn_cargar=document.getElementById('btn_cargar_usuarios'),
	error_box=document.getElementById('error_box'),
	tabla=document.getElementById('table'),
	loader=document.getElementById('loader');





	var idUser,nameUser,facultad,userStatus;


function load_Users(){

	tabla.innerHTML='<tr><th>Matricula:</th><th>Nombre Estudiante</th><th>Facultad</th></tr>';
	var request=new XMLHttpRequest();
	request.open('GET','phpForJson/read_datas.php');
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
			element.innerHTML+=("<td>"+data[i].matricula+"</td>");
			element.innerHTML+=("<td>"+data[i].nombre+"</td>");
			element.innerHTML+=("<td>"+data[i].id_carrera+"</td>");
			//element.innerHTML+=("<td>"+data[i].Status+"</td>");
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




btn_cargar.addEventListener('click',function(){

	load_Users();


});




