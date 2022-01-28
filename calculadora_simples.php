<?php
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
		echo ('<script> alert("Favor preencher todas as caixas!");</script>');
	else {
		//Validação de tratamento de erro para rdo sem escolha
		if (!isset($_POST['rdocalc']))
			echo ('<script> alert("Favor escolher uma operação válida!");</script>');
		else {
			//Apenas podemos receber o valor do rdo quando ele existir
			$opcao = strtoupper($_POST['rdocalc']);

			//Processamento das operações
			if ($opcao == 'SOMAR')
				$resultado = $valor1 + $valor2;
			elseif ($opcao == 'SUBTRAIR')
				$resultado = $valor1 - $valor2;
			elseif ($opcao == 'MULTIPLICAR')
				$resultado = $valor1 * $valor2;
			elseif ($opcao == 'DIVIDIR')
				$resultado = $valor1 / $valor2;
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
				Valor 1:<input type="text" name="txtn1" value="0"> <br>
				Valor 2:<input type="text" name="txtn2" value="0"> <br>
				<div id="container_opcoes">
					<input type="radio" name="rdocalc" value="somar">Somar <br>
					<input type="radio" name="rdocalc" value="subtrair">Subtrair <br>
					<input type="radio" name="rdocalc" value="multiplicar">Multiplicar <br>
					<input type="radio" name="rdocalc" value="dividir">Dividir <br>

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