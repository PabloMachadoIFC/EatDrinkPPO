    <?php
        include("../../admin.php");
        require_once('../../../classes/autoload.php');
        require_once('acao.php');

        $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 
        switch ($aviso) {
            case 'Cadastrado':
                $msg = "User Cadastrado!";
                alert($msg);
                break;
            case 'NaoCadastrado':
                $msg = "User Não Cadastrado!";
                alert($msg);
                break;
            case 'Excluido':
                $msg = "User Excluido!";
                alert($msg);
                break;
            case 'NaoExcluido':
                $msg = "User Não Excluido!";
                alert($msg);
                break;
            case 'Editado':
                $msg = "User Editado!";
                alert($msg);
                break;
            case 'NaoEditado':
                $msg = "User Não Editado!";
                alert($msg);
                break;
            default:
                # code...
                break;
        }
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        function confirm($msg) {
            echo "<script type='text/javascript'>confirm('$msg');</script>";
        }

        $user = new Login(1, 'example','example','example', 1);

        $qeditando = null;


        $id = isset($_GET['id'])?$_GET['id']:0;
        if ($id > 0){
            $dados = $user->listar(1,$id);
            $qeditando = new Login($dados[0]['id'],$dados[0]['username'],$dados[0]['email'],$dados[0]['password'],$dados[0]['registration_date']);
        }
    ?>
        <center><h1>CRUD User</h1></center>
        <div class="">
            <div class="col-12">
                <form action="acao.php" method="post">
                    <div class="row">                       
                            <input type="hidden" name="id" id="id"  class="form-control" readonly value="<?php echo isset($qeditando)?$qeditando->getId():0 ?>">                       
                        <div class="col-4">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php if($qeditando) echo $qeditando->getUsername(); ?>">
                        </div>
                        <div class="col-4">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php if($qeditando) echo $qeditando->getEmail(); ?>">
                        </div>      
                        <div class="col-4">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?php if($qeditando) echo $qeditando->getPassword(); ?>">
                        </div>  
                        <div class="col-12" style="margin-top: 1vh;">
                            <center>
                                <button type="submit" class="btn btn-primary" name="acao" value="salvar"><?= ($qeditando) ? 'Editar User' : 'Criar User'; ?></button>
                            </center>
                        </div>
                    </div>
                </form>                
            </div>
            <div class="col-12">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>  
                            <th>Email</th>      
                            <th>Password</th>    
                            <th>Registration Date</th>                       
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $lista = $user->listar();
                        foreach ($lista as $item) {
                            $q = new Login($item['id'], $item['username'], $item['email'], $item['password'], $item['registration_date']);

                            echo '<tr>
                                <td>' . $q->getId() . '</td>
                                <td>' . $q->getUsername() . '</td>
                                <td>' . $q->getEmail() . '</td>
                                <td>' . $q->getPassword() . '</td>
                                <td>' . $q->getRegistrationDate() . '</td>
                                <td>
                                    <a class="btn btn-secondary" href="index.php?acao=editar&id=' . $q->getId() . '">Editar</a>
                                    <a class="btn btn-danger" href="acao.php?acao=excluir&id=' . $q->getId() . '">Excluir</a>
                                </td>
                            </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php                                           
        include("../../admin2.php");
    ?>