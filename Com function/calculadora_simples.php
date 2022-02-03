<?php
//Declaração das variáveis
$valor1 = (float) 0;
$valor2 = (float) 0;
$resultado = (float) 0;
$opcao = (string) null;

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
				echo ('<script> alert("Não é possível realizar divisão onde o valor 2 é igual a 0!"); </script>');
			else
				$result = $num1 / $num2;
			break;

		default:
			//Processamento caso não entre em nenhuma das opções.
	}

	$result = round($result, 2);

	return $result;
}

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
		echo ('<script> alert("Favor preencher todas as caixas!");</script>');
	else {
		//Validação de tratamento de erro para rdo sem escolha
		if (!isset($_POST['rdocalc']))
			echo ('<script> alert("Favor escolher uma operação válida!");</script>');
		else {
			//Validação para tratamento de erro para dados incorretos
			if (!is_numeric($valor1) || !is_numeric($valor2))
				echo ('<script> alert("Não é possível realizar cálculos de dados não numéricos!"); </script>');
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