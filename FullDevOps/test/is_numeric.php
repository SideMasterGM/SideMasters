<?php
  if (isset($_GET['value'])){
    if (!empty($_GET['value'])){
      if (is_numeric($_GET['value'])){
        echo "The value int is: ".$_GET['value'];
      } else {
        echo "The value is not int.";
      }
    } else {
      echo "No hay ningún dato!.";
    }
  } else {
    echo "The variable is not defined!.";
  }
?>
