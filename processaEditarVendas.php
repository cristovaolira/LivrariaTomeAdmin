<?php
   require_once("autenticaEntrada.php");
    
    // Conexão com o Banco de Dados

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");

    // Edição

    $np = $_POST['np'];
    $titulo = $_POST['titulo'];
    $editora = $_POST['editora'];
    $data = $_POST['data'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $cep= $_POST['cep'];
    $mkt = $_POST['mktPlace'];
    $dt_pagamento = $_POST['mes'];
    $valorRecebido = $_POST['valorRecebido'];
	$desconto = $_POST['comDesconto'];
	$envio = $_POST['preco_envio'];
	$precoLivro = $_POST['preco'];

	$resultadoDesc = $precoLivro - ($precoLivro / 100 * $desconto);

	$lucro = $valorRecebido - $resultadoDesc - $envio;

        $notas = $_POST['notas'];

    $indica_venda = $np;

    $stratment = "UPDATE cadastro_vendas SET 	
    NUM_PED = '$np',
    TIT_LIVRO = '$titulo',
    EDI_LIVRO = '$editora',
    DATA = '$data',
    NOM_CLIENTE = '$nome',
    EMAIL_CLIENTE = '$email',
    EST_CLIENTE = '$estado',
    CID_CLIENTE = '$cidade',
    CEP= '$cep',
    MKT_PLACE = '$mkt',
    DT_PAGAMENTO = '$dt_pagamento',
    PRECO_ENVIO = '$envio',
    PRECO_LIVRO = '$precoLivro',
    C_DESCONTO_LIVRO = '$desconto',
    VALOR_RECEBIDO = '$valorRecebido',
    LUCRO_REAL = '$lucro',
    NOTAS = '$notas'
 
        WHERE NUM_PED = '$indica_venda'";

   $query = mysqli_query($conn, $stratment);
    if($query){
        header("Location:vendas.php");
    }
    else{
        die('Error: ' . mysqli_error($sql));
    }
?>
