<?php
// verificar_senhas.php

$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$senhaConf = isset($_POST['senhaConf']) ? $_POST['senhaConf'] : '';

$senhasCoincidem = ($senha === $senhaConf);

echo json_encode(['senhasCoincidem' => $senhasCoincidem]);
?>
