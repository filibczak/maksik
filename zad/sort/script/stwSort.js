var forename = [],
	school = [],
	nr = 0;
	
		forename[nr] = 'Chojnacka Karolina';
		school[nr++] = 'SP5';
	
		forename[nr] = 'Cokan Patrycja';
		school[nr++] = 'SP5';
	
		forename[nr] = 'Grzelak Ewelina';
		school[nr++] = 'SP5';
	
		forename[nr] = 'Jaźwińska Patrycja';
		school[nr++] = 'SP7';
	
		forename[nr] = 'Wleklińska Karina';
		school[nr++] = 'SP1';



function stwSort(){
	
	var HTLM = '<div id="go">go</div>';
	
	for ( i = 0; i < nr; i++){
		HTLM += '<div class="sort">' + forename[i] + ', ' + school[i] + '<input type="text" id="time_'+i+'" class="time" value="'+ (nr-i) +':00"></input></div>'
	}

	$('#box').html(HTLM);
	
	pozytion();
}

function pozytion()
{
	//$('.sort').eq(3).css('top','500px');
	
	var height = 25,
		margin = 5,
		padding = 10;
	
	for (i = 0; i < nr; i++){
		$('.sort').eq(i).css('top', height*i + margin*i + padding*2*i);
	}
}