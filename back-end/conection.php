<?php
    $mysqli  = new mysqli('localhost','root','','p_cp_estado');
    
    if($mysqli -> connect_error) 
        die('ERROR de ('.$mysqli->connect_errno.')'. $mysqli->connection_error);
    
    if(mysqli_connect_error())
        die('ERROR de ('.$mysqli->connect_errno().')'. $mysqli->connection_error());
    
?>
