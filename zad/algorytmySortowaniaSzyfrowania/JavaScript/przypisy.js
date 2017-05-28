var przepisKtury = 0;
var przepis = new Array();
var przepisLink = new Array();
	
	przepis[przepisKtury] = 'algorytm.edu.pl';
	przepisLink[przepisKtury++] = 'http://www.algorytm.edu.pl/algorytmy-maturalne/szyfrowanie.html';
	
	przepis[przepisKtury] = 'b-skrzypczyk.republika.pl';
	przepisLink[przepisKtury++] = 'http://www.b-skrzypczyk.republika.pl/alg_sym.html';
	
	przepis[przepisKtury] = 'securelist.pl';
	przepisLink[przepisKtury++] = 'http://www.securelist.pl/threats/5906,ef_g73_5r_kilka_slow_o_szyfrowaniu_i_algorytmach.html';
	
	przepis[przepisKtury] = 'algorytm.org';
	przepisLink[przepisKtury++] = 'http://www.algorytm.org/algorytmy-sortowania/';
	
	przepis[przepisKtury] = 'wikipedia.org (1)';
	przepisLink[przepisKtury++] = 'https://pl.wikipedia.org/wiki/Sortowanie';
	
	przepis[przepisKtury] = 'wikipedia.org (2)';
	przepisLink[przepisKtury++] = 'https://pl.wikipedia.org/wiki/Szyfr';
/*	
	przepis[przepisKtury] = '';
	przepisLink[przepisKtury++] = '';
*/

function stwurzStopka()
{
	var kodHTML = new Array();
	kodHTML[0] = '';
	kodHTML[1] = '';
	
	//<a href="#"><span class="stopkalinkZaznaczenie">&raquo; fafgafvaegbvesag</span></a><br>
	//'<a href="' + przepisLink[i] + '"><span class="stopkalinkZaznaczenie">&raquo; ' + przepis[i] + '</span></a><br>';
	for (i = 0; i < przepisKtury; i++)
	{
		if(i % 2 == 0)
			kodHTML[0] += '<a class="jedenLink" href="' + przepisLink[i] + '" target="_blank"><span class="stopkalinkZaznaczenie">&raquo; ' + przepis[i] + '</span></a><br>';
		else
			kodHTML[1] += '<a class="jedenLink" href="' + przepisLink[i] + '" target="_blank"><span class="stopkalinkZaznaczenie">&raquo; ' + przepis[i] + '</span></a><br>';
	}
	document.getElementById('linki1').innerHTML = kodHTML[0];
	document.getElementById('linki2').innerHTML = kodHTML[1];
}