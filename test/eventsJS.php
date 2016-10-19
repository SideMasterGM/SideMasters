<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Events JS</title>
	</head>
	<body>
		<script>
			function callkeydownhandler(evnt) {
			   var ev = (evnt) ? evnt : event;
			   var code=(ev.which) ? ev.which : event.keyCode;
			   if (code == 46){
			   		alert("Has presionado Delete o SUPR");
			   }
			}
			if (window.document.addEventListener) {
			   window.document.addEventListener("keydown", callkeydownhandler, false);
			} else {
			   window.document.attachEvent("onkeydown", callkeydownhandler);
			}
		</script>
	</body>
</html>