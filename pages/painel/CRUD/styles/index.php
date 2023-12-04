    <?php
        include("../../admin.php");
        require_once('../../../classes/autoload.php');
        require_once('acao.php');

        $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 
        switch ($aviso) {
            case 'Cadastrado':
                $msg = "Culinary Style Cadastrado!";
                alert($msg);
                break;
            case 'NaoCadastrado':
                $msg = "Culinary Style Não Cadastrado!";
                alert($msg);
                break;
            case 'Excluido':
                $msg = "Culinary Style Excluido!";
                alert($msg);
                break;
            case 'NaoExcluido':
                $msg = "Culinary Style Não Excluido!";
                alert($msg);
                break;
            case 'Editado':
                $msg = "Culinary Style Editado!";
                alert($msg);
                break;
            case 'NaoEditado':
                $msg = "Culinary Style Não Editado!";
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

        $style = new Styles(1, 'example');

        $qeditando = null;


        $id = isset($_GET['id'])?$_GET['id']:0;
        if ($id > 0){
            $dados = $style->listar(1,$id);
            $qeditando = new Styles($dados[0]['id'],$dados[0]['name']);
        }
    ?>
        <div class="" style="margin:5vh;">
            <div class="col-12">
                <form action="acao.php" method="post">
                    <div class="row">                       
                            <input type="hidden" name="id" id="id"  class="form-control" readonly value="<?php echo isset($qeditando)?$qeditando->getId():0 ?>">                       
                        <div class="col-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php if($qeditando) echo $qeditando->getName(); ?>">
                        </div>
                        <div class="col-12" style="margin-top: 1vh;">
                            <center>
                                <button type="submit" class="btn btn-primary" name="acao" value="salvar"><?= ($qeditando) ? 'Editar Style' : 'Criar Style'; ?></button>
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
                            <th>Name</th>                     
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $lista = $style->listar();
                        foreach ($lista as $item) {
                            $q = new Styles($item['id'], $item['name']);

                            echo '<tr>
                                <td>' . $q->getId() . '</td>
                                <td>' . $q->getName() . '</td>
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