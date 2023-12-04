<?php
    spl_autoload_register(function($nome_classe){
        include_once($nome_classe.'.class.php');
    });
?>