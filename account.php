<?php
    require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['pagReg_username'];
        $password = $_POST['pagReg_password'];
        $email = $_POST['pagReg_email'];
    
        if (empty($username) || empty($password) || empty($email)){
            echo 'nombre, contraseña o email incorrectos'; 
            exit;
        }
        
        $check = $connect -> prepare('SELECT id FROM usuarios WHERE username = ? OR email = ?');
        $check -> bind_param('ss', $username, $email);
        $check -> execute();
        $check -> store_result();

        if ($check -> num_rows > 0){
            echo 'usuario o correo ya existentes';
            exit;
        }

        $creat_acount = $connect -> prepare('INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)');
        $creat_acount -> bind_param('sss', $username, $email, $password);
        if($creat_acount -> execute()){
            echo 'Cuenta creada';
            exit;
        }

        $creat_acount -> close();
        $db -> close();
    }
?>