<?php

    /***************************************************************
    * Objetivo: Arquivo responsável por reunir e padronizar todas as 
    variáveis e constantes que serão utilizadas em todo o projeto.
    * Autor: Florbela
    * Data: 04/02/2022
    * Versão: 1.0
    ***************************************************************/

    //Constantes do projeto
    //Modo 01 de criar uma constante
    define('ERRO_MSG_CAIXA_VAZIA', '<script> alert("Favor preencher todas as caixas!");</script>');

    //Modo 02 de criar uma constante
    const ERRO_MSG_OPERACAO_CALCULO = '<script> alert("Favor escolher uma operação válida!");</script>';
    const ERRO_MSG_CARACTER_INVALIDO_TEXTO = '<script> alert("Não é possível realizar cálculos de dados não numéricos!"); </script>';
    const ERROMSG_DIVISAO_ZERO = '<script> alert("Não é possível realizar divisão onde o valor 2 é igual a 0!"); </script>';
?>