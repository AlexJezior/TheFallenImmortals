// JavaScript Document

//////////////////
//AJAX Functions//
//////////////////
function evalAJAXHtml(source){
	if(window.XMLHttpRequest){
		var ajax = new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var ajax = new ActiveXObject("Microsoft.XMLHTTP");
	}

	ajax.open("GET",source,true);
	ajax.onreadystatechange = function(){
		try{
			if(ajax.readyState == 4){
				if(ajax.status == 200){
					eval(ajax.responseText);
				}
			}
		}
		catch(e){
			//Exception-bug in FF
		}
	}
	ajax.send(null);
}

function evalpostAJAXHtml(source,datan){
	if(window.XMLHttpRequest){
		var ajax = new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var ajax = new ActiveXObject("Microsoft.XMLHTTP");
	}

	ajax.open("POST",source,true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.onreadystatechange = function(){
		try{
			if(ajax.readyState == 4){
				if (ajax.status == 200){
					eval(ajax.responseText);
				}
			}
		}
		catch(e){
			//Exception-bug in FF
		}
	}
	ajax.send(datan);
}