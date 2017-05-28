/*
	autor: Krzysztof Kukiz
	mail: kukizk@gmail.com
	
	scrypt dla menu z trzema opcjami (mozna dodac wiecej opcji) i niegraniczona iloscia podopcji
*/

var menu = [];
var menuGdzieHtml = [];
var menuIle = [];
var menuIleDl = [];
var menuIleZestaw = 0;
	
	/*--- Home ---*/
	menu[menuIleZestaw] = [];
	menuGdzieHtml[menuIleZestaw] = [];
	menuIle[menuIleZestaw] = 0;
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = 'Home';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'index.html';
		menuIle[menuIleZestaw]++;
	menuIleDl[menuIleZestaw] = 60*menuIle[menuIleZestaw]
	menuIleZestaw++;
	
	/*--- Sorty ---*/
	menu[menuIleZestaw] = [];
	menuGdzieHtml[menuIleZestaw] = [];
	menuIle[menuIleZestaw] = 0;
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = 'Rodzaje Sortowań';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'sort.html';
		menuIle[menuIleZestaw]++;
		
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = 'Sortowanie bąbelkowe';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'sort.html#1';
		menuIle[menuIleZestaw]++;
		
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = '<span style="font-size: 0.85em; position: relative; top: -20px;">' + 'Sortowanie przez<br>wstawianie' + '</span>';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'sort.html#2';
		menuIle[menuIleZestaw]++;
		
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = '<span style="font-size: 0.85em; position: relative; top: -15px;">' + 'Sortowanie przez<br> wymianę' + '</span>';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'sort.html#3';
		menuIle[menuIleZestaw]++;
	menuIleDl[menuIleZestaw] = 60*menuIle[menuIleZestaw]
	menuIleZestaw++;
	
	/*--- Szyfry ---*/
	menu[menuIleZestaw] = [];
	menuGdzieHtml[menuIleZestaw] = [];
	menuIle[menuIleZestaw] = 0;
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = 'Rodzaje Szyfrów';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'szyfr.html';
		menuIle[menuIleZestaw]++;
	
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = 'Tryby pracy';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'szyfr.html#1';
		menuIle[menuIleZestaw]++;
	
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = 'Alogrytmy DES';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'szyfr.html#2';
		menuIle[menuIleZestaw]++;
	
		menu[menuIleZestaw][menuIle[menuIleZestaw]] = 'Szyfr Cezara';
		menuGdzieHtml[menuIleZestaw][menuIle[menuIleZestaw]] = 'szyfr.html#3';
		menuIle[menuIleZestaw]++;
	menuIleDl[menuIleZestaw] = 60*menuIle[menuIleZestaw]
	menuIleZestaw++;

window.onload = function()
{
		stwurzMenu();
		animujMenu();
		stwurzStopka();
		paczSzerokosc();
}

//tworzy menu
function stwurzMenu()
{
	var kodHTML = '';
	for (i = 0; i < menuIleZestaw; i++)
	{
		kodHTML += '<div class="opcje" id="zestawNr' + i + '">';
		for (j = 0; j < menuIle[i];j++)
			kodHTML += '<a href="' + menuGdzieHtml[i][j] + '"><div class="opcja">' + menu[i][j] + '</div></a>';
		kodHTML += '</div>';
	}
		
	document.getElementById('menu').innerHTML = kodHTML;
}




//animuje menu
function animujMenu()
{
	/*--- Animacja zjezcdzania w dół ---*/
	var czasOtwieranie = 400;
	var czasZamykanie = 200;
	var dlugoscJednejOpcji = 60;
	$('#zestawNr0')
		.mouseover(function(){
				$(this).stop().animate({
					height: dlugoscJednejOpcji*menuIle[0],
					borderWidth: 5
				},czasOtwieranie/2);
		})
		.mouseout(function(){
			$(this).stop().animate({
				height: dlugoscJednejOpcji,
				borderWidth: 0
			},czasZamykanie/2)
		});
		
	$('#zestawNr1')
		.mouseover(function(){
				$(this).stop().animate({
					height: dlugoscJednejOpcji*menuIle[1],
					borderWidth: 5
				},czasOtwieranie);
		})
		.mouseout(function(){
			$(this).stop().animate({
				height: dlugoscJednejOpcji,
				borderWidth: 0
			},czasZamykanie)
		});
		
	$('#zestawNr2')
		.mouseover(function(){
				$(this)
				.stop().animate({
					height: dlugoscJednejOpcji*menuIle[2],
					borderWidth: 5
				},czasOtwieranie);
		})
		.mouseout(function(){
			$(this).stop().animate({
				height: dlugoscJednejOpcji,
				borderWidth: 0
			},czasZamykanie)
		});
		
	/*--- Animacja podkreślenia ---*/	
	$('.opcja')
		.mouseover(function(){
			$(this).stop().animate({
				opacity: 0.75
			},100);
		})
		.mouseout(function(){
			$(this).stop().animate({
				opacity: 1
			},100);
		});
}