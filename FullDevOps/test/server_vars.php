<?php
	
	function getIpAddr(){
        if (!empty(@$_SERVER['HTTP_CLIENT_IP']))
            return @$_SERVER['HTTP_CLIENT_IP'];
        else if (!empty(@$_SERVER['HTTP_X_FORWARDED_FOR']))
            return @$_SERVER['HTTP_X_FORWARDED_FOR'];
        return @$_SERVER['REMOTE_ADDR'];
    }

    echo "<b>IP:</b> ".getIpAddr()."<br/>";
    echo "<b>Usuario de dominio:</b> ".gethostbyaddr($_SERVER['REMOTE_ADDR'])."<br/>";
    /*-------------------------------------------------*/

    echo "<b># Revision:</b> ".$_SERVER['GATEWAY_INTERFACE']."<br/>";
    echo "<b>Server Name:</b> ".$_SERVER['SERVER_NAME']."<br/>";
    echo "<b>Server Protocol:</b> ".$_SERVER['SERVER_PROTOCOL']."<br/>";
    echo "<b>Request Method:</b> ".$_SERVER['REQUEST_METHOD']."<br/>";
    echo "<b>Request Time:</b> ".$_SERVER['REQUEST_TIME']."<br/>";
    echo "<b>Document Root:</b> ".$_SERVER['DOCUMENT_ROOT']."<br/>";
    echo "<b>Accept Lenguage:</b> ".$_SERVER['HTTP_ACCEPT_LANGUAGE']."<br/>";
    echo "<b>De donde vienes:</b> ".@$_SERVER['HTTP_REFERER']."<br/>";
    echo "<b>Datos del navegador:</b> ".@$_SERVER['HTTP_USER_AGENT']."<br/>";
    echo "<b>Remote Host:</b> ".@$_SERVER['REMOTE_HOST']."<br/>";
    echo "<b>URI o URL:</b> ".@$_SERVER['REQUEST_URI']."<br/>";

    echo "<br/>";
    echo date("d/m/Y | H:i:s");
?>