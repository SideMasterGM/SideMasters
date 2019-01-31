(function () {
    var takePicture = document.querySelector("#take-picture"),
        showPicture = document.querySelector("#show-picture");

    if (takePicture && showPicture) {
        takePicture.onchange = function (event) {
            var files = event.target.files,
                file;
            if (files && files.length > 0) {
                file = files[0];
                try {
                    var URL = window.URL || window.webkitURL;
                    var imgURL = URL.createObjectURL(file);
                    showPicture.src = imgURL;
                    URL.revokeObjectURL(imgURL);
                }
                catch (e) {
                    try {
                        var fileReader = new FileReader();
                        fileReader.onload = function (event) {
                            showPicture.src = event.target.result;
                        };
                        fileReader.readAsDataURL(file);
                    }
                    catch (e) {
                        var error = document.querySelector("#error");
                        if (error) {
                            error.innerHTML = "Neither createObjectURL or FileReader are supported";
                        }
                    }
                }
            }
        };
    }
})();

if (window.addEventListener) {
    window.addEventListener("keydown", compruebaTecla, false);
} else if (document.attachEvent) {
    document.attachEvent("onkeydown", compruebaTecla);
}

function compruebaTecla(evt){
    var tecla = evt.which || evt.keyCode;
    if (tecla == 27){
        window.location.href="#";
    } else if (tecla == 46){
        if (evt.shiftKey){
            Funct_Direct_Delete();
        } else {
            Funct_Delete();
        }
    }
}

function _category_selected(name){
    var _textarea = document.getElementById("category_selected");

    if (_textarea.value.search(name) != -1)
        alert("La categoría " + name + ", ya se ha puesto antes!.");
    else {
        if (_textarea.value == "")
            _textarea.value = name;
        else
            _textarea.value = _textarea.value + ", " + name;
    }
}

function _clean_category_selected(){
    if (document.getElementById("category_selected").value == "")
        alert("El campo se encuentra limpio!.");
    else
        document.getElementById("category_selected").value = "";
}

function ItemSelected(NumRow){
    var SaveIdItem = document.getElementById("SaveIdItem"),
        SelectItem = document.getElementById(NumRow),
        GetChars = "";

    for (var i=0; NumRow[i] != "I"; i++)
        GetChars += NumRow[i];

    if (SaveIdItem.value == ""){
        SaveIdItem.value = GetChars + "Item";
        SelectItem.style.fontWeight = "bold";
    } else {
        document.getElementById(SaveIdItem.value).style.fontWeight = "normal";
        SaveIdItem.value = GetChars + "Item";
        SelectItem.style.fontWeight = "bold";
    }
}

function _sendFormEditArticle(NumRow){
    document.getElementById(NumRow).submit();
}

function Funct_View(){
    var Content = document.getElementById(ReturnData()),
        ChildContent = Content.getElementsByTagName("td")[1].innerHTML,
        URL = "";
    URL = window.location.protocol + "//" + window.location.host + "/?search=" + ChildContent;
    window.open(URL, '_blank');
}

function Funct_GoMainPage(){
  window.open(window.location.protocol + "//" + window.location.host, '_blank');
}

function Funct_Edit(){
    var MyString = "";

    for (var i=0; ReturnData()[i] != "I"; i++)
        MyString += ReturnData()[i];

    document.getElementById(MyString).submit();
}

function Funct_Share(MyValue){
    var Content = document.getElementById(ReturnData()),
        ChildContent = Content.getElementsByTagName("td")[1].innerHTML,
        URL = "";

    if (typeof(MyValue) != "undefined"){
        if (MyValue.length > 0){
            if (MyValue == "pt"){
                URL = "http://pinterest.com/pin/create/button/?url=http://31.220.54.154/?search=" + ChildContent + "&media=http://31.220.54.154/img/light_abstract_beams_lights_black_background_76367_2048x1152.jpg&description=Artículo muy interesante";
            } else if (MyValue == "fb"){
                URL = "https://www.facebook.com/sharer/sharer.php?u=" + window.location.protocol + "//" + window.location.host + "/?search=" + ChildContent;
            } else if (MyValue == "tt"){
                URL = "https://twitter.com/?status=Me gusta este artículo " + window.location.protocol + "//" + window.location.host + "/?search=" + ChildContent;
            } else if (MyValue == "gp"){
                URL = "https://plus.google.com/share?url=" + window.location.protocol + "//" + window.location.host + "/?search=" + ChildContent;
            }
            window.open(URL, '_blank' , 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        }
    } else {
        if (ReturnData("Ask") == true){
            window.location.href="#SharePost";
        }
    }
}

function Funct_GetLink(){
    var Content = document.getElementById(ReturnData()),
        ChildContent = Content.getElementsByTagName("td")[1].innerHTML,
        ObjectLink = document.getElementById("link-text"),
        GetLink = "";

    if (ReturnData("Ask") == true){
        GetLink = window.location.protocol + "//" + window.location.host + "/?search=" + ChildContent;
        ObjectLink.value = GetLink;
        window.location.href="#GetLink";
    }
}

function Funct_Forbidden(){
    alert("Press the button Forbideen and Data: " + ReturnData());
}

function Funct_Direct_Delete(){
     var Content = document.getElementById(ReturnData()),
        ChildContent = Content.getElementsByTagName("td")[1].innerHTML;

    if (ReturnData("Ask") == true){
        document.getElementById("ValueArticleDelete").value = ChildContent;
        document.getElementById("FormDelete_Article").submit();
    }
}

function Funct_Delete(){
    var Content = document.getElementById(ReturnData()),
        ChildContent = Content.getElementsByTagName("td")[1].innerHTML;

    if (ReturnData("Ask") == true){
        document.getElementById("SureString").innerHTML = "¿Seguro que desea eliminar <b>" + ChildContent + "</b>?";
        document.getElementById("ValueArticleDelete").value = ChildContent;
        window.location.href="#ConfirmDelete";
    }
}

function Funct_Details(){
    var MyString = "";

    for (var i=0; ReturnData()[i] != "I"; i++)
        MyString += ReturnData()[i];

    window.location.href = "#" + MyString + "Modal";
}

function ReturnData(Option){
    var ObjectContent = document.getElementById("SaveIdItem");
    
    if (Option == "Ask")
        if (ObjectContent.value != "")
            return true;
        else
            return false;

    return ObjectContent.value;
}

function Funct_DeleteArticle(){
    document.getElementById("FormDelete_Article").submit();
}