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
    
    if ($acao == "cadastre") {        
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $email = isset($_POST['email']) ? strtolower($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $registration_date = date('Y-m-d H:i:s');
    
        $login = new Login($id, $username, $email, $password, $registration_date);

        if ($login->listar(3,$email)) {
            echo "O email já está cadastrado";
            $_SESSION['aviso'] = "EmailCadastrado";
            $_SESSION['email'] = $email;
                header("Location: index.php");
            exit;
        } else {
            echo "O email não está cadastrado, pode ser inserido no banco de dados";
            $login = new Login($id, $username, $email, $password, $registration_date);
            $login->inserir();

            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['aviso'] = "c2";
                header("Location: index.php");
            exit;
        }   
    }elseif($acao == "cadDois"){
        $email = isset($_SESSION['email']) ? strtolower($_SESSION['email']) : '';
        $owner_id = Password::getUserIdByEmail($email);

        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
        $zip_code = isset($_POST['zip_code']) ? $_POST['zip_code'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $culinary_style_id = isset($_POST['culinary_style_id']) ? $_POST['culinary_style_id'] : '';

        $establishment = new Establishment($id, $name, $cnpj, $zip_code, $phone,$address,$culinary_style_id,$owner_id);
        $establishment->inserir();

        $_SESSION['email'] = $email;
        $_SESSION['aviso'] = "cadastrado";
            header("Location: ../index.php");
        exit;
        
    }
?>