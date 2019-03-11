<?php

// INICIA LIGAÇÃO À BASE DE DADOS
    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");

// VERIFICA A LIGAÇÃO NÃO TEM ERROS
if (mysqli_connect_errno())
{
    // CASO TENHA ERROS MOSTRA O ERRO DE LIGAÇÃO À BASE DE DADOS
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// CASO TUDO ESTEJA OK INSERE DADOS NA BASE DE DADOS
 //Verifica se foi pago
      
      $status = $_POST['pago'];
       
        if ($status == true){
             $status = "Pago";
               
      }else{
            $status = "Aguardando Pagamento";
            
          }

	
		

$sql="INSERT INTO notas_fiscais (NF_NUM, SERIE, DATA, MES_ANO, FORNECEDOR, VENCIMENTO, VALOR_BRUTO, VALOR_LIQUIDO, NOTAS, _STATUS) VALUES ('$_POST[nf]','$_POST[serie]','$_POST[entrada]','$_POST[mes]','$_POST[fornecedor]','$_POST[vencimento]','$_POST[valor_bruto]','$_POST[valor_liquido]',' $_POST[notas]','$status')";


// CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}

// MOSTRA A MENSAGEM DE SUCESSO
echo "Um novo registro adicionado!";
    
mysqli_close($con);
    header("Location:faturas.php");

?>