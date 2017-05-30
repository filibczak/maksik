<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Krzysztof Kukiz kukizk@gmail.com">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<title>Viteo tutorial</title>
	<link href="" rel="icon" type="image/x-icon">
	<link rel="stylesheet" href="bin/style/screen.css">
	<script src="../../script/jq.js"></script>
	<script>
	$(function(){
		sq.attachEvent("onmousewheel", MouseWheelHandler());
		/*$('#box').mousewheel(function(e){
				console.log(e.originalEvent.wheelDelta);
			if(e.originalEvent.wheelDelta / 120 > 0){
				console.log('up');
			}else{
				console.log('up');
			}
		});*/
	})//jq END
/*	if (document.addEventListener) {
    document.addEventListener("mousewheel", MouseWheelHandler(), false);
    document.addEventListener("DOMMouseScroll", MouseWheelHandler(), false);
	} else {
			sq.attachEvent("onmousewheel", MouseWheelHandler());
	}*/


function MouseWheelHandler() {
    return function (e) {
        // cross-browser wheel delta
        var e = window.event || e;
        var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));

        //scrolling down?
        if (delta < 0) {
            alert("Down");
        }

        //scrolling up?
        else {
             alert("Up");
        }
        return false;
    }
}
	</script>
	
</head>
<body>	
<div id="box">
	<nav></nav>
	<article></article>
</div>
</body>
</html>