
$(function(){
    wczytajTresc(pokazHrefFromAddr());
    $('.clMenu').click(function(){
      var href = $(this).attr('href');
      wczytajTresc(href);
    });

    $('#mainContent')
    /*..::klient::..*/
    //dodatje
    .delegate('#snd-kli', 'submit', function(){
    	var imie = $('[name="imie"]').val();
    	var nazwisko = $('[name="nazwisko"]').val();
    	var wiek = $('[name="wiek"]').val();
    	$.post('dataSender.php',{
    		op: 'kli',
    		imie: imie,
    		nazwisko: nazwisko,
    		wiek: wiek
    	});
    	return false;
    })//dodanie END
    //edytuje
    .delegate('.edit-kli', 'click', function(){
        var parent = $(this).parent().parent();
        if($(this).text() != ' Zapisz'){
            $(this).text(" Zapisz");
            parent.children().eq(1).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(2).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(3).attr('contenteditable', 'true').addClass('doEdycji');
            $(this).removeClass('btn-default').addClass('btn-info');
        }else{
            var $th = $(this);
            $(this).text(" Edytuj");
            $(this).removeClass('btn-info').addClass('btn-default');
            parent.children().eq(1).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(2).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(3).attr('contenteditable', 'false').removeClass('doEdycji');
            var id =        parent.attr('data-usrid');
            var imie =      parent.children().eq(1).text();
            var nazwisko =  parent.children().eq(2).text();
            var wiek =      parent.children().eq(3).text();
            $.post('dataSender.php',{
                op: 'kliUpd',
                id: id,
                imie: imie,
                nazwisko: nazwisko,
                wiek: wiek
            }).done(function(data){
                switch(data){
                    case 1:
                    case '1':
                        $th.removeClass('btn-default').addClass('btn-success')
                        .text(' Zapisano!');
                    break;
                    case 0:
                    case '0':
                    default:
                        $th.removeClass('btn-default').addClass('btn-danger')
                        .text(' Coś poszło nie tak :/');
                    break;
                }
            }).fail(function(){
                $th.removeClass('btn-default').addClass('btn-danger');
            });
            setTimeout(function(){     
                $th
                    .removeClass('btn-info')
                    .removeClass('btn-success')
                    .removeClass('btn-danger')
                    .addClass('btn-default')
                    .text(' Edytuj');
            }, 2500);
        }
    })////edytuje END //klienci END
    /*..::Rezyserowie::..*/
    //dodanie
    .delegate('#snd-rez', 'submit', function(){
        var imie = $('[name="imie"]').val();
        var nazwisko = $('[name="nazwisko"]').val();
        var wiekU = $('[name="wiekU"]').val();
        $.post('dataSender.php',{
            op: 'rez',
            imie: imie,
            nazwisko: nazwisko,
            wiekU: wiekU
        });
        return false;
    })//dodanie END
    //edycja
    .delegate('.edit-rez', 'click', function(){
        var parent = $(this).parent().parent();
        if($(this).text() != ' Zapisz'){
            $(this).text(" Zapisz");
            parent.children().eq(1).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(2).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(3).attr('contenteditable', 'true').addClass('doEdycji');
            $(this).removeClass('btn-default').addClass('btn-info');
        }else{
            var $th = $(this);
            $(this).text(" Edytuj");
            $(this).removeClass('btn-info').addClass('btn-default');
            parent.children().eq(1).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(2).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(3).attr('contenteditable', 'false').removeClass('doEdycji');
            var id =        parent.attr('data-usrid');
            var imie =      parent.children().eq(1).text();
            var nazwisko =  parent.children().eq(2).text();
            var wiekU =      parent.children().eq(3).text();
            $.post('dataSender.php',{
                op: 'rezUpd',
                id: id,
                imie: imie,
                nazwisko: nazwisko,
                wiekU: wiekU
            }).done(function(data){
                alert(data);
                switch(data){
                    case 1:
                    case '1':
                        $th.removeClass('btn-default').addClass('btn-success')
                        .text(' Zapisano!');
                    break;
                    case 0:
                    case '0':
                    default:
                        $th.removeClass('btn-default').addClass('btn-danger')
                        .text(' Coś poszło nie tak :/');
                    break;
                }
            }).fail(function(){
                alert(123);
                $th.removeClass('btn-default').addClass('btn-danger');
            });
            setTimeout(function(){     
                $th
                    .removeClass('btn-info')
                    .removeClass('btn-success')
                    .removeClass('btn-danger')
                    .addClass('btn-default')
                    .text(' Edytuj');
            }, 2500);
        }
    })////edytuje END //rezyser END
    /*..::Gatunki::..*/
    //dodanie
    .delegate('#snd-gat', 'submit', function(){
        var nazwa = $('[name="nazwa"]').val();
        $.post('dataSender.php',{
            op: 'gat',
            nazwa: nazwa
        });
        return false;
    })//dodanie END
    //edycja
    .delegate('.edit-gat', 'click', function(){
        var parent = $(this).parent().parent();
        if($(this).text() != ' Zapisz'){
            $(this).text(" Zapisz");
            parent.children().eq(1).attr('contenteditable', 'true').addClass('doEdycji');
            $(this).removeClass('btn-default').addClass('btn-info');
        }else{
            var $th = $(this);
            $(this).text(" Edytuj");
            $(this).removeClass('btn-info').addClass('btn-default');
            parent.children().eq(1).attr('contenteditable', 'false').removeClass('doEdycji');
            var id =        parent.attr('data-usrid');
            var nazwa =      parent.children().eq(1).text();
            $.post('dataSender.php',{
                op: 'gatUpd',
                id: id,
                nazwa: nazwa
            }).done(function(data){
                switch(data){
                    case 1:
                    case '1':
                        $th.removeClass('btn-default').addClass('btn-success')
                        .text(' Zapisano!');
                    break;
                    case 0:
                    case '0':
                    default:
                        $th.removeClass('btn-default').addClass('btn-danger')
                        .text(' Coś poszło nie tak :/');
                    break;
                }
            }).fail(function(){
                $th.removeClass('btn-default').addClass('btn-danger');
            });
            setTimeout(function(){     
                $th
                    .removeClass('btn-info')
                    .removeClass('btn-success')
                    .removeClass('btn-danger')
                    .addClass('btn-default')
                    .text(' Edytuj');
            }, 2500);
        }
    })////edytuje END //Gatunki END
    /*..::filmy::..*/
    //dodanie
    .delegate('#snd-flm', 'submit', function(){
        var tytul = $('[name="tytul"]').val();
        var rez = $('[name="rez"] option:selected').val();
        var gat = $('[name="gat"] option:selected').val();
        var rok = $('[name="rokProdukcji"]').val();
        var czas = $('[name="czasTrwania"]').val();
        $.post('dataSender.php',{
            op: 'flm',
            tytul: tytul,
            rez: rez,
            gat: gat,
            rok: rok,
            czas: czas
        });
        return false;
    })//dodanie END
    //edycja
    .delegate('.edit-flm', 'click', function(){
        var parent = $(this).parent().parent();
        if($(this).text() != ' Zapisz'){
            $(this).text(" Zapisz");
            parent.children().eq(1).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(2).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(3).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(4).attr('contenteditable', 'true').addClass('doEdycji');
            parent.children().eq(5).attr('contenteditable', 'true').addClass('doEdycji');
            $(this).removeClass('btn-default').addClass('btn-info');
        }else{
            var $th = $(this);
            $(this).text(" Edytuj");
            $(this).removeClass('btn-info').addClass('btn-default');
            parent.children().eq(1).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(2).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(3).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(4).attr('contenteditable', 'false').removeClass('doEdycji');
            parent.children().eq(5).attr('contenteditable', 'false').removeClass('doEdycji');
            var id =        parent.attr('data-usrid');
            var tytul =      parent.children().eq(1).text();
            var rezyser =  parent.children().eq(2).text();
            var gatunek =      parent.children().eq(3).text();
            var prod =      parent.children().eq(4).text();
            var czas =      parent.children().eq(5).text();
            $.post('dataSender.php',{
                op: 'rezU2pd',
                id: id,
                imie: imie,
                nazwisko: nazwisko,
                wiekU: wiekU
            }).done(function(data){
                alert(data);
                switch(data){
                    case 1:
                    case '1':
                        $th.removeClass('btn-default').addClass('btn-success')
                        .text(' Zapisano!');
                    break;
                    case 0:
                    case '0':
                    default:
                        $th.removeClass('btn-default').addClass('btn-danger')
                        .text(' Coś poszło nie tak :/');
                    break;
                }
            }).fail(function(){
                alert(123);
                $th.removeClass('btn-default').addClass('btn-danger');
            });
            setTimeout(function(){     
                $th
                    .removeClass('btn-info')
                    .removeClass('btn-success')
                    .removeClass('btn-danger')
                    .addClass('btn-default')
                    .text(' Edytuj');
            }, 2500);
        }
    })////edytuje END //rezyser END
    /*..::Wyporzyczenia::..*/
    //dodanie
    .delegate('#snd-wyp', 'submit', function(){
        var flm = $('[name="flm"] option:selected').val();
        var kln = $('[name="kln"] option:selected').val();
        var wyp = $('[name="wyp"]').val();
        var odd = $('[name="odd"]').val();
        $.post('dataSender.php',{
            op: 'wyp',
            flm: tytul,
            kln: kln,
            wyp: wyp,
            odd: odd
        }).done(function(data){alert(data);});
        return false;
    })//dodanie END
    ;

});//jq END

function button2defauld($th){
    $th
        .removeClass('btn-info')
        .removeClass('btn-succes')
        .removeClass('btn-danger')
        .addClass('btn-default');
}

function wczytajTresc(href){
	$.post('ajax.php', {op: href})
	.done(function(data){
		$('#mainContent').html(data);
	})
	.fail(function(){
		alert('error');
	});
}

function pokazHrefFromAddr(){
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
	if(href == '') href = '#hom';
	return href;
}