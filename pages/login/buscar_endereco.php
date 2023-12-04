<?php
// buscar_endereco.php

if (isset($_POST['cep'])) {
  $cep = $_POST['cep'];

  // Faça a lógica para buscar o endereço no banco de dados com base no CEP informado
  // Substitua o código abaixo pela sua lógica de busca no banco de dados
  $cep = preg_replace("/[^0-9]/", "", $cep);
  $url = "http://viacep.com.br/ws/$cep/xml/";

  $xml = simplexml_load_file($url);

  if ($xml !== false) {
    $endereco = array(
      'logradouro' => (string) $xml->logradouro,
      'bairro' => (string) $xml->bairro,
      'localidade' => (string) $xml->localidade,
      'uf' => (string) $xml->uf
    );

    // Retorna o endereço como resposta para a requisição AJAX
    echo json_encode($endereco);
  } else {
    // Retorna um erro se não foi possível obter o endereço do CEP informado
    echo json_encode(array('error' => 'Endereço não encontrado para o CEP informado.'));
  }
} else {
  // Retorna um erro se o parâmetro cep não foi fornecido
  echo json_encode(array('error' => 'CEP não fornecido.'));
}
?>
