<?php
//include() e require() -> Apenas importa o arquivo no php.
//include_once() e require()_once -> O servidor realiza uma restrição para importar somente uma vez o arquivo (melhor opção).

//Import do arquivo de configurações de variáveis e constantes
require_once('modulo/config.php');

//Import do arquivo funções para calculos matemáticos
require_once('modulo/calculos.php');

//Declaração das variáveis
$valor1 = (float) 0;
$valor2 = (float) 0;
$resultado = (float) 0;
$opcao = (string) null;

/*
	gettype() - verifica qual o tipo de dados de uma variavel
	settype() - modifica o tipo de dados de uma variavel

	$nome = 7;
	echo(gettype($nome));
	settype($nome, 'string');
	echo(gettype($nome));
	*/

//Validação para verificar se o botão foi clicado
if (isset($_POST['btncalc'])) {
	//Recebe os dados do formulário
	$valor1 = $_POST['txtn1'];
	$valor2 = $_POST['txtn2'];

	//strtoupper - converte um texto para Maiusculo
	//strtolower - converte um texto para minusculo

	//Validação de tratamento de erro para caixa vazia
	if ($_POST['txtn1'] == "" || $_POST['txtn2'] == "")
		echo (ERRO_MSG_CAIXA_VAZIA);
	else {
		//Validação de tratamento de erro para rdo sem escolha
		if (!isset($_POST['rdocalc']))
			echo (ERRO_MSG_OPERACAO_CALCULO);
		else {
			//Validação para tratamento de erro para dados incorretos
			if (!is_numeric($valor1) || !is_numeric($valor2))
				echo (ERRO_MSG_CARACTER_INVALIDO_TEXTO);
			else {
				//Apenas podemos receber o valor do rdo quando ele existir
				$opcao = strtoupper($_POST['rdocalc']);

				$resultado = operacaoMatematica($valor1, $valor2, $opcao);

				// //Processamento do calculo das operações
				// if ($opcao == 'SOMAR')
				// 	$resultado = $valor1 + $valor2;
				// elseif ($opcao == 'SUBTRAIR')
				// 	$resultado = $valor1 - $valor2;
				// elseif ($opcao == 'MULTIPLICAR')
				// 	$resultado = $valor1 * $valor2;
				// elseif ($opcao == 'DIVIDIR') {
				// 	//Validação para tratamento de erro da divisão por 0
				// 	if($valor2 == 0)
				// 		echo('<script> alert("Não é possível realizar divisão onde o valor 2 é igual a 0!"); </script>');
				// 	else
				// 		$resultado = $valor1 / $valor2;
				// }
			}
		}
	}
}
?>

<html>

<head>
	<title>Calculadora - Simples</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<div id="conteudo">
		<div id="titulo">
			Calculadora Simples
		</div>

		<div id="form">
			<form name="frmcalculadora" method="post" action="calculadora_simples.php">
				Valor 1:<input type="text" name="txtn1" value="<?= $valor1; ?>"> <br>
				Valor 2:<input type="text" name="txtn2" value="<?= $valor2; ?>"> <br>
				<div id="container_opcoes">
					<input type="radio" name="rdocalc" value="somar" <?= $opcao == 'SOMAR' ? 'checked' : null; ?>>Somar <br>
					<input type="radio" name="rdocalc" value="subtrair" <?= $opcao == 'SUBTRAIR' ? 'checked' : null; ?>>Subtrair <br>
					<input type="radio" name="rdocalc" value="multiplicar" <?= $opcao == 'MULTIPLICAR' ? 'checked' : null; ?>>Multiplicar <br>
					<input type="radio" name="rdocalc" value="dividir" <?= $opcao == 'DIVIDIR' ? 'checked' : null; ?>>Dividir <br>

					<input type="submit" name="btncalc" value="Calcular">

				</div>
				<div id="resultado">
					<?= $resultado; ?>
				</div>

			</form>
		</div>

	</div>

</body>

</html>