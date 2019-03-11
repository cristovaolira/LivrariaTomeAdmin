<?php
  
    $sql = mysqli_connect("localhost","root", "usbw", "livrariatome");

    // Edição

    $np = $_POST['np'];
    $titulo = $_POST['titulo'];
    $editora = $_POST['editora'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $mkt = $_POST['mktPlace'];
    $dt_pagamento = $_POST['dataPag'];
    $valorRecebido = $_POST['valorRecebido'];
	$desconto = $_POST['comDesconto'];
	$envio = $_POST['preco_envio'];
	$precoLivro = $_POST['preco'];

	$resultadoDesc = $precoLivro - ($precoLivro / 100 * $desconto);

	$lucro = $valorRecebido - $resultadoDesc - $envio;

    $indica_venda = $np;

    $stratment = "UPDATE cadastro_vendas SET 	
    NUM_PED = '$np',
    TIT_LIVRO = '$titulo',
    EDI_LIVRO = '$editora',
    NOM_CLIENTE = '$nome',
    EMAIL_CLIENTE = '$email',
    EST_CLIENTE = '$estado',
    CID_CLIENTE = '$cidade',
    MKT_PLACE = '$mkt',
    DT_PAGAMENTO = '$dt_pagamento',
    PRECO_ENVIO = '$envio',
    PRECO_LIVRO = '$precoLivro',
    C_DESCONTO_LIVRO = '$desconto',
    VALOR_RECEBIDO = '$valorRecebido',
    LUCRO_REAL = '$lucro'
 
        WHERE NUM_PED = '$indica_venda'";

   $query = mysqli_query($sql, $stratment);
    if($query){
        header("Location:boleto_de_compras.php");
    }
    else{
        die('Error: ' . mysqli_error($sql));
    }
?>
