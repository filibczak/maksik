
$(function(){
    wczytajTresc(pokazHrefFromAddr());
    $('a').click(function(){
      var href = $(this).attr('href');
      alert(123);
      wczytajTresc(href);
    });

});//jq END

function wczytajTresc(href){
	alert(href);
	$.post('ajax.php', {op: href})
	.done(function(data){
		alert(data);
	})
	.fail(function(){
		alert('error');
	});
}

function pokazHrefFromAddr(e){
	var addr = document.location.href;
	var dl = addr.length;
	var dodawaj = false;
	var href = '';
	for(i = 0; i < dl; i++){
	  if(addr[i] == '#') dodawaj = true;
	  if(dodawaj){
	    if(addr[i] == '?') break;
	    href += addr[i];
	  }
	}
return href;
      }