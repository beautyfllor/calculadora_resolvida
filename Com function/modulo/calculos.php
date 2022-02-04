<?php

/************************************************************************************
* Objetivo: Arquivo de funções matemáticas que poderá ser utilizado dentro do projeto
* Autor: Florbela
* Data: 04/02/2022
* Versão: 1.0
*************************************************************************************/

//Criando uma função para calcular as operações matemáticas
function operacaoMatematica($numero1, $numero2, $operacao) //Não é obrigado usar um nome diferente, foi só para não confundir;
{
	//Declaração de variáveis locais da função
	$num1 = (float) $numero1;
	$num2 = (float) $numero2;
	$result = (float) 0;
	$tipoCalculo = (string) $operacao;

	switch ($tipoCalculo) {
		case "SOMAR":
			$result = $num1 + $num2;
			break;
		case "SUBTRAIR":
			$result = $num1 - $num2;
			break;
		case "MULTIPLICAR":
			$result = $num1 * $num2;
			break;
		case "DIVIDIR":
			if ($num2 == 0)
				echo (ERROMSG_DIVISAO_ZERO);
			else
				$result = $num1 / $num2;
			break;

		default:
			//Processamento caso não entre em nenhuma das opções.
	}

	$result = round($result, 2);

	return $result;
}
?>