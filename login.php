<?php
    require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['pagLog_username'];
        $password = $_POST['pagLog_password'];  

        if (empty($username) || empty($password)) {
            echo 'Nombre o Contraseña incorrecta'; 
            exit;
        }

        $check = $connect -> prepare('SELECT password FROM usuarios WHERE username = ?');
        $check -> bind_param('s', $username);
        $check -> execute();
        $check -> store_result();

        if ($check -> num_rows == 0){
            echo 'Usuario no existe';
            exit;
        }

        $check -> bind_result($stored_password);
        $check -> fetch();

        if ($stored_password == $password) {
            echo 'Inicio exitoso';
            exit;
        }

        $check -> close();
        $db -> close();
    }
?>