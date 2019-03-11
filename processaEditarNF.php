<?php

    $sql = mysqli_connect("localhost","root", "usbw", "livrariatome");

    // Edição

    $nf = $_POST['nf'];
    $serie = $_POST['serie'];
    $entrada = $_POST['entrada'];
    $mes = $_POST['mes'];
    $fornecedor = $_POST['fornecedor'];
    $vencimento = $_POST['vencimento'];
    $valor_bruto = $_POST['valor_bruto'];
    $valor_liquido = $_POST['valor_liquido'];
    $notas = $_POST['notas'];

    //Verifica se foi pago
        if ($_POST['pago'] == true){
            $status = "Pago";
        }else{
            $status = "Aguardando Pagamento";
        }

    $indica_edicao = $nf;
  
    $stratment = "UPDATE notas_fiscais SET 	
    NF_NUM = '$nf',
    SERIE = '$serie',
    DATA = '$entrada',
    MES_ANO= '$mes',
    FORNECEDOR  = '$fornecedor',
    VENCIMENTO = '$vencimento',
    VALOR_BRUTO = '$valor_bruto',
    VALOR_LIQUIDO = '$valor_liquido',
    NOTAS = '$notas',
    _STATUS = '$status'
   
        WHERE NF_NUM = '$indica_edicao'";

   $query = mysqli_query($sql, $stratment);
    if($query){
        header("Location:faturas.php");
    }
    else{
        die('Error: ' . mysqli_error($sql));
    }
?>
