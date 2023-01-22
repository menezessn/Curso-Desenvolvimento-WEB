<?php
    session_start();
    $_SESSION['autenticado'] = false;
    $usuarios = [
        ['id' => 1,'email'=>'adm@gmail.com', 'senha' => '1234', 'perfil_id'=>'1'],
        ['id' => 2, 'email'=>'admin@gmail.com', 'senha' => 'abcd', 'perfil_id'=>'1'],
        ['id' => 3, 'email'=>'jose@gmail.com', 'senha' => '4567', 'perfil_id'=>'2'],
        ['id' => 4, 'email'=>'cleide@gmail.com', 'senha' => '6789', 'perfil_id'=>'2']
    ];
    $login = $_POST['email'];
    $senha = $_POST['senha'];
    foreach ($usuarios as $usuario){
        if($usuario['email']==$login && $usuario['senha']==$senha){
            $_SESSION['autenticado']=true;
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['perfil_id'] = $usuario['perfil_id'];
        }
    }
    if($_SESSION['autenticado']){
        echo 'usuario autenticado';
        header('Location:menu.php');
    } else{
        $_SESSION['autenticado'] = false;
        header('Location:index.php?login=erro');
    }

?>