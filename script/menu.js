var nrMenu = 0;
var linkMenu = [];
var nameMenu = [];
	
	linkMenu[nrMenu] = 	'index.html';
	nameMenu[nrMenu++] = 'Home';
	
	linkMenu[nrMenu] = 	'zad.html';
	nameMenu[nrMenu++] = 'Zadania';
	
	linkMenu[nrMenu] = 	'wzor.html';
	nameMenu[nrMenu++] = 'Wzory / scripty';

function stwMenu()
{
	var kodHTML = '';
	
	for (i = 0; i < nrMenu; i++)
		kodHTML += '<a href="' + linkMenu[i] + '" class="wybor">' + nameMenu[i] + '</a>';
		
	$('#menu').html(kodHTML);
}
//<a href="index.html#" class="wybor">dfada</a>