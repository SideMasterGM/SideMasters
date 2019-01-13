// Toggle Function
$(".CreateUser").click(function(){
	window.location.href="#Login";
	if ($('#toolstip').html() == "Registrarse"){
  		ChangeForm();
  		$(".header h2").html("Registrarse");
	  	document.getElementById("toolstip").innerHTML = "Tengo cuenta";
 	}
});

$(".Login").click(function(){
	window.location.href="#Login";
	if ($('#toolstip').html() != "Registrarse"){
  		ChangeForm();
  		$(".header h2").html("Iniciar sesión");
	  	document.getElementById("toolstip").innerHTML = "Registrarse";
 	}
});

$('.toggle').click(function(){
  	if ($('#toolstip').html() == "Registrarse"){
  		ChangeForm();
  		$(".header h2").html("Registrarse");
	  	document.getElementById("toolstip").innerHTML = "Tengo cuenta";
 	} else {
  		ChangeForm();
  		$(".header h2").html("Iniciar sesión");
  		document.getElementById("toolstip").innerHTML = "Registrarse";
  	}
});

function ChangeForm(){
  	$(".toggle").children('i').toggleClass('fa-pencil');
  	$('.form').animate({
   		height: "toggle",
    	'padding-top': 'toggle',
    	'padding-bottom': 'toggle',
    	opacity: "toggle"
    }, "slow");
}

window.onload = function(){
	document.getElementById("PassOne").onkeyup = CheckPassword;
	document.getElementById("PassTwo").onkeyup = CheckPassword;
	document.getElementById("CloseOverLay").onclick = CloseModal;
}

function CloseModal(){
	window.location.href="#";
}

function CheckPassword(){
	var PassOne = document.getElementById("PassOne"),
		PassTwo = document.getElementById("PassTwo");
		if (PassOne.value == "" || PassTwo.value == ""){
			PassOne.style.background="white";
			PassTwo.style.background="white";
			PassOne.style.color="black";
			PassTwo.style.color="black";
		} else {
			if (PassOne.value == PassTwo.value){
				PassOne.style.background="#6577FF";
				PassTwo.style.background="#6577FF";
				PassOne.style.color="white";
				PassTwo.style.color="white";
			} else {
				PassOne.style.background="white";
				PassTwo.style.background="white";
				PassOne.style.color="black";
				PassTwo.style.color="black";
			}
		}
}

$("#ClickSignIn").click(function(){
	$.ajax({
		url: "php/signin.php",
		type: "post",
		data: $("#FormSignIn").serialize(),
		success: function(data){
			$("#msgSignIn").html(data).show();
			ResetData($("#msgSignIn").html());
		}
	});
	return false;
});

$("#ClickLogin").click(function(){
	$.ajax({
		url: "php/login.php",
		type: "post",
		data: $("#FormLogin").serialize(),
		success: function(data){
			$("#msgLogin").html(data).show();
		}
	});
	return false;
});

function ResetData(string){
	if (string == '<div class="SignInGood">Registro con exito.</div>'){
		document.getElementById("PassOne").style.background="white";
		document.getElementById("PassOne").style.color="black";
		document.getElementById("PassTwo").style.background="white";
		document.getElementById("PassTwo").style.color="black";
		document.getElementById("FormSignIn").reset();
	}
}

function Funct_CallTag(StrTag){
	window.open(window.location.protocol + "//" + window.location.host + "/?category=" + encodeURIComponent(StrTag) , '_blank');
}

function Funct_Share(network, title_post){
	var URL = "";
	if (typeof(network) != "undefined" && typeof(title_post) != "undefined"){
		if (network.length > 0 && title_post.length > 0){
			if (network == "pt"){
                URL = "http://pinterest.com/pin/create/button/?url=http://31.220.54.154/?search=" + encodeURIComponent(title_post + "&comment=yes") + "&media=http://sidemasters.local/img/light_abstract_beams_lights_black_background_76367_2048x1152.jpg&description=Artículo muy interesante";
            } else if (network == "fb"){
                URL = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.protocol + "//" + window.location.host + "/?search=" + title_post + "&comment=yes");
            } else if (network == "tt"){
                URL = "https://twitter.com/?status=Me gusta este artículo " + window.location.protocol + "//" + window.location.host + "/?search=" + encodeURIComponent(title_post + "&comment=yes");
            } else if (network == "gp"){
                URL = "https://plus.google.com/share?url=" + window.location.protocol + "//" + window.location.host + "/?search=" + encodeURIComponent(title_post + "&comment=yes");
            }
            window.open(URL, '_blank' , 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
		}
	}
}

function Funct_EjecComment(value){
	window.location.href = window.location.protocol + "//" + window.location.host + "/?search=" + encodeURIComponent(value) + "&comment=yes";
}