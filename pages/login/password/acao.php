<?php
    session_start();
    require_once "../../../conf/Conexao.php";
    require_once "../../classes/autoload.php";
    
    echo "<br> POST: ";
    var_dump($_POST);
    echo "<br> GET: ";
    var_dump($_GET);
    echo "<br> SESSION: ";
    var_dump($_SESSION);
    echo "<br>";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  
            $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; 
            break;
        case 'POST': 
            $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; 
            break;
    }

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    if ($acao == "email") {
        $existingEmail = Password::checkExistingEmail($email); 
        $user_id = Password::getUserIdByEmail($email);

        if ($existingEmail) {
            echo "Email cadastrado.";

            date_default_timezone_set('America/Sao_Paulo'); $datenow = date('now');            
            $date = new DateTime();    $start_date = $date->format('Y-m-d H:i:s');
            $date = new DateTime('+15 minute'); $expiry_date = $date->format('Y-m-d H:i:s');

            $id = 0;
            $token = str_pad(rand(1,999999), 6, "0", STR_PAD_LEFT);

            $password = new Password($id, $start_date, $expiry_date, $token, $user_id);
            $password->inserir();

            $_SESSION['part'] = "token";
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;  
            $_SESSION['notification'] = "sendEmail";
            header('Location:index.php');
        } else {
            echo "Email não cadastrado.";
            $_SESSION['notification'] = "NotEmail";
            header('Location:index.php');
        }
    }elseif($acao == "tokenC"){
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
        $cod = isset($_POST['cod']) ? $_POST['cod'] : ""; 
        $token = isset($_SESSION['token']) ? $_SESSION['token'] : ""; 
        if ($cod == $token) {
            $_SESSION['part'] = "reset";
            $_SESSION['notification'] = "";
            $_SESSION['email'] = $email;
            header('Location:index.php');
        }elseif($cod != $token){
            $_SESSION['part'] = "token";
            $_SESSION['notification'] = "tokenWrong";
            $_SESSION['email'] = $email;
            header('Location:index.php');
        }else{
            $_SESSION['part'] = "token";
            $_SESSION['notification'] = "tokenExpiry";
            $_SESSION['email'] = $email;
            header('Location:index.php');
        }
    }elseif($acao == "reset"){
        $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : ""; 
        $newPasswordC = isset($_POST['newPasswordC']) ? $_POST['newPasswordC'] : "";
        echo "Senha: "  .$newPasswordC;
        
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
        if($newPassword == $newPasswordC){            
            echo $newPassword;
            
            $user_id = Password::getUserIdByEmail($email);   
            echo "<br>User ID: " . $user_id;
        
            $resetPass = Password::resetPassword($user_id, $newPassword);
            echo "<br>Reset result: " . var_dump($resetPass);
            
            if ($resetPass) {
                $_SESSION['notification'] = "passwordChanged";
            } else {
                $_SESSION['notification'] = "passwordChangeFailed";
                echo "Erro ao alterar a senha no banco de dados.";
            }           
                $_SESSION['email'] = $email;
                header('Location: ../index.php');
            exit();
        }
    }   
?>