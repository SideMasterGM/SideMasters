if (window.addEventListener) {
	window.addEventListener("keydown", compruebaTecla, false);
} else if (document.attachEvent) {
    document.attachEvent("onkeydown", compruebaTecla);
}

// function compruebaTecla(evt){
//     var tecla = evt.which || evt.keyCode;
//     if(tecla == 17){
//         window.location.href="#Login";
//     } else if (tecla == 27){
//     	CloseModal();
//     }
// }

function compruebaTecla(evt){
    var tecla = evt.which || evt.keyCode;
    if (tecla == 46){
        if (evt.shiftKey){
        	window.location.href="#PrivateLogin";
        }
    }
}

// $(document).ready(function() {
//     jQuery.ias({
//         container : '.container_post',
//         item: '.post',
//         pagination: '.nav',
//         next: '.nav a',
//         loader: '<img src="img/ajax-loader.gif"/>',
//         triggerPageThreshold: 3
//     });
// });

// $(function () {
//     var $win = $(window);

//     $win.scroll(function () {
//         if ($win.scrollTop() == 0){
//             /*alert('Scrolled to Page Top');*/
//         } else if ($win.height() + $win.scrollTop() == $(document).height()) {
//             loadjscssfile("js/classie.js", "js");
//             loadjscssfile("js/main.js", "js");
//         }
//     });
// });

// function loadjscssfile(filename, filetype) {
// 	if (filetype=="js"){ //if filename is a external JavaScript file
// 		var fileref=document.createElement('script');
// 		fileref.setAttribute("type","text/javascript");
// 		fileref.setAttribute("src", filename);
// 	} else if (filetype=="css"){ //if filename is an external CSS file
// 		var fileref=document.createElement('link');
// 		fileref.setAttribute('rel', 'stylesheet');
// 		fileref.setAttribute('type', 'text/css');
// 		fileref.setAttribute('href', filename);
// 	}

// 	if (typeof fileref != "undefined"){
// 		document.getElementsByTagName("footer")[0].appendChild(fileref);
// 	}
// }