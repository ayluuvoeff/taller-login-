<?php 
    $host = 'localhost';
    $dbname = 'john';
    $user = 'root';
    $pass = '';
    $connect = new mysqli ($host, $user, $pass, $dbname);

    if ($connect -> connect_error){
        die ('error: '.$connect -> connect_error);
    }
?>
