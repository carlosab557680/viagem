/*
 * Colinas - 2011 - Carlos Augusto Barbosa
 * Rotinas de chamada Ajax que permitem chamadas paralelas assíncronas
 * 
 * */


var divs = new Array(); // Vetor com as divs que receberão o retorno das chamadas
var xmlHttp = new Array(); // Vetor com as requisições HTTP 
var simul_reqs = 0; // Número de chamadas simultâneas
var slot_req = 0; // Slot (posição no  vetor ) que uma determinada chamada está utilizando

function ajax(url,nome_div)
{	
	// Se existem requisicoes simultaneas, aloca um novo slot, senão, pega o primeiro slot
	if (simul_reqs == 0) slot_reqs = 0;
	var r = slot_req++;
	simul_reqs++;

	divs[r] = nome_div;
	xmlHttp[r] = GetXMLajax();
	if(xmlHttp[r] == null)
	{
		alert("Your Browser does not support AJAX!");
		return;
	}
	xmlHttp[r].onreadystatechange = 
		function () {
		resposta(r);
	};
	xmlHttp[r].open("GET",url,true);
	xmlHttp[r].send(null);
}


//Resposta assincrona da chamada HTTP. Uma para cada slot que está sendo utilizado
function resposta(slot)
{
	if (xmlHttp[slot].readyState==4)
	{
		document.getElementById(divs[slot]).innerHTML = xmlHttp[slot].responseText;
		simul_reqs--;
	}
}

//Função que cria uma nova chamada HTTP dependendo do navegador
function GetXMLajax()
{
	var xmlHttp = null;
	try
	{
		// Fire Fox, Opera 8.0, Safari
		xmlHttp = new XMLHttpRequest;
	}	
	catch(e)
	{
		// Internet Explorer
		try {
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e) 
		{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

