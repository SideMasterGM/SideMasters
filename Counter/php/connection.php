<?php
    $CN = new mysqli("127.0.0.1", "root", "", "fulldevops");

    $Email = $_POST['email'];

    if (!empty($Email)){

        if ($CN->query("SELECT * FROM count_email WHERE email='".$Email."'")->num_rows == 0){
            $Query = $CN->query("INSERT INTO count_email (email, date_log, date_log_unix) VALUES ('".$Email."', '".date('Y-n-j')."', '".time()."');");
            
            if ($Query)
                echo "Ok";
            else
                echo "Fail";

        } else {
            echo "Existe";
        }
    }