window.onload = start;

var silnik = new Audio("silnik.wav");

function start()
{
	stw_men();
}

//--- menu ---//
	
	var ile_opc_0 = 5;
	var opc_0 = new Array(ile_opc_0);
	opc_0[0] = "Przed II wojaną światową";
	opc_0[1] = "Początki";
	opc_0[2] = "Pierwsza fabryka";
	opc_0[3] = "Dalsze próby";
	opc_0[4] = "Wprowadzenie fiata";
	
	var ile_opc_1 = 4;
	var opc_1 = new Array(ile_opc_1);
	opc_1[0] = "Po II wojaną światową";
	opc_1[1] = "Licencja na fiata";
	opc_1[2] = "Pionier";
	opc_1[3] = "FIAT 126p";
	
	function stw_men()
	{
		var kod_html = '<header class="men_nag">' + opc_0[0] + '</header><div class="menu_1"><ul>'
		for (i = 1; i < ile_opc_0; i++)
		{
			kod_html += '<li><a href="#art_0_'+i+'" class="pod_wyb" onMouseUp="silnik.play();">'+opc_0[i]+'</a></li>';
		}
		kod_html += '</ul></div><hr id="menu_break">'
		
		
		kod_html += '<header class="men_nag">' + opc_1[0] + '</header><div class="menu_2"><ul>';
		for (i = 1; i < ile_opc_1; i++)
		{
			kod_html += '<li><a href="#art_1_'+i+'" class="pod_wyb" onMouseUp="silnik.play();">'+opc_1[i]+'</a></li>'
		}
		kod_html += '</ul></div>'
		
		document.getElementById("menu_0").innerHTML = kod_html;
	}