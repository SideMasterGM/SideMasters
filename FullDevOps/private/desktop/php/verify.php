<?php
    @session_start();
    if (@$_SESSION['login'] != "Open"){
        header("Location: ../../");
    } else {
       $username =  @$_SESSION['username'];

       include ("../connect_server/connect_server.php");
       $R = $SM->query("SELECT privileges FROM sm_log WHERE username='".$username."';");
       $Privileges = "";
       while ($CheckPrivileges = $R->fetch_array(MYSQLI_ASSOC)){
       		$Privileges = $CheckPrivileges['privileges'];
       }
    }
?>