<?php
	function getIpAddr(){
        if (!empty(@$_SERVER['HTTP_CLIENT_IP']))
            return @$_SERVER['HTTP_CLIENT_IP'];
        else if (!empty(@$_SERVER['HTTP_X_FORWARDED_FOR']))
            return @$_SERVER['HTTP_X_FORWARDED_FOR'];
        return @$_SERVER['REMOTE_ADDR'];
    }

    if (@$_SESSION['login'] == "Open"){
    	$UpdateEnter = "UPDATE sm_enter SET username='".@$_SESSION['username']."' WHERE ip_addr='".getIpAddr()."'";
    	if (!$SM->query($UpdateEnter))
    		echo "<br/><br/><br/>Ocurrió un problema al intentar actualizar la sesión del usurio!.";
    } else {
	    $TF = 0;
	    $VerifyQuery = $SM->query("SELECT * FROM sm_enter WHERE ip_addr='".getIpAddr()."';");
	    while ($RowVQ = $VerifyQuery->fetch_array(MYSQLI_ASSOC)){
	    	if ($RowVQ['ip_addr'] == getIpAddr())
	    		$TF = 1;
	    }

	    if ($TF == 0){
    		$InsertEnter = "INSERT INTO sm_enter (ip_addr, user_domain, gateway_interface, server_name, server_protocol, request_method, request_time, document_root, accept_language, http_referer, data_navegator, uri_url, date_unix, username) VALUES ('".getIpAddr()."','".gethostbyaddr($_SERVER['REMOTE_ADDR'])."','".$_SERVER['GATEWAY_INTERFACE']."','".$_SERVER['SERVER_NAME']."','".$_SERVER['SERVER_PROTOCOL']."','".$_SERVER['REQUEST_METHOD']."','".$_SERVER['REQUEST_TIME']."','".$_SERVER['DOCUMENT_ROOT']."','".$_SERVER['HTTP_ACCEPT_LANGUAGE']."','".@$_SERVER['HTTP_REFERER']."','".$_SERVER['HTTP_USER_AGENT']."','".$_SERVER['REQUEST_URI']."','".time()."','-');";

	    	if (!$SM->query($InsertEnter)){
	    		//echo "<br/><br/><br/><br/>Error al insertar información del usuario!.";
            }
	    }
    }



?>