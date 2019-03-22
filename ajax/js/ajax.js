
var btn= document.getElementById('btn_cargar_usuarios');
var loader= document.getElementById('loader');

btn.addEventListener('click',function(){

	var request=new XMLHttpRequest();
	//request.open('GET','http://www.json-generator.com/api/json/get/cgtNWUCIMO?indent=2');
	request.open('POST','php/read_data.php');

	loader.classList.add('active');


	request.onload=function(){
			//Execute a JavaScript immediately after a page has been loaded:
		//console.log(JSON.parse(request.responseText)[0]);
		var data=JSON.parse(request.responseText);



			for (var i = 0; i <data.length; i++) {
				var element =document.createElement('tr');
			//Creating a row type element
			element.innerHTML+=("<td>"+data[i]._id+"</td>");
			element.innerHTML+=("<td>"+data[i]._Nombre+"</td>");
			element.innerHTML+=("<td>"+data[i]._Facultad+"</td>");
			element.innerHTML+=("<td>"+data[i].Status+"</td>");
			//inside that row i just put the data
			document.getElementById('tabla').appendChild(element);
			
				
			}



		/*data.forEach(person=>{
			var element =document.createElement('tr');
			//Creating a row type element
			element.innerHTML+=("<td>"+person._id+"</td>");
			element.innerHTML+=("<td>"+person.Nombre+"</td>");
			element.innerHTML+=("<td>"+person.Facultad+"</td>");
			element.innerHTML+=("<td>"+person.Status+"</td>");
			//inside that row i just put the data
			document.getElementById('tabla').appendChild(element);
			//appendChild allows me to insert data inside an element, inside of tabla im just putting the element
		});*/
	}


	request.onreadystatechange=function(){

		/*
		he XMLHttpRequest.readyState property returns the state an XMLHttpRequest client is in. An XHR client exists in one of the following states:
		0 	UNSENT 	Client has been created. open() not called yet.
		1 	OPENED 	open() has been called.
		2 	HEADERS_RECEIVED 	send() has been called, and headers and status are available.
		3 	LOADING 	Downloading; responseText holds partial data.
		4 	DONE 	The operation is complete.

		

    					500 - 599: the server had an error

    					400 - 499: this is a client error (Ex: 404 page not found)

    					300 - 399: then exists a redirect

    					200 - 299: then it is correct and

    					100 - 199: means information message
		*/

		if (request.readyState==4 && request.status==200) {
				loader.classList.remove('active');


		}
	}


	request.send();




});