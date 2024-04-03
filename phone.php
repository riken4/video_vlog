<?php
include "config.php";

        $Number=$_POST['contact'];
        {
        if(preg_match("/^[0-9]{10}+$/",$Number)) {
            echo "Valid Phone Number";
            } else {
            echo "Invalid Phone Number";
            }
        }
?>
<?php

?>