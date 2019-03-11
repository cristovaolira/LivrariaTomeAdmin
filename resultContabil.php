<?php
    require_once("processaLogin.php");
//Conexao com o Banco de Dados livrariatome

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");

// Comandos referentes à exibição de tabelas

     $mes = $_REQUEST['mes'];
    $ano = $_REQUEST['ano'];
    $MesAno = $mes."/".$ano;

//Relatório de VENDAS

   $queryVendas = mysqli_query($conn, "SELECT NUM_PED, DT_PAGAMENTO, PRECO_ENVIO, PRECO_LIVRO, C_DESCONTO_LIVRO, VALOR_RECEBIDO, LUCRO_REAL FROM cadastro_vendas WHERE DT_PAGAMENTO = '$MesAno'");

    $queryVendasBruto = mysqli_query($conn, "SELECT SUM(VALOR_RECEBIDO) AS LUCRO_BRUTO FROM cadastro_vendas WHERE DT_PAGAMENTO = '$MesAno'");
    
    $queryVendasLiquido = mysqli_query($conn, "SELECT SUM(LUCRO_REAL) AS LUCRO_LIQUIDO FROM cadastro_vendas WHERE DT_PAGAMENTO = '$MesAno'");

// Relatório de Notas Fiscais/Faturas

    //$queryFaturas = mysqli_query($sql, "SELECT * FROM notas_fiscais WHERE MES_ANO = '$MesAno'");
    
//    $queryFaturasBruto = mysqli_query($sql, "SELECT SUM(VALOR_BRUTO) AS TOTAL_BRUTO FROM notas_fiscais WHERE MES_ANO = '$MesAno'");

  //   $queryFaturasLiquido = mysqli_query($sql, "SELECT SUM(VALOR_LIQUIDO) AS TOTAL_LIQUIDO FROM notas_fiscais WHERE MES_ANO = '$MesAno'");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Contabilidade </title>
        <link rel="stylesheet" type="text/css" href="css/geral.css" />
         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="icon" href="imagens/fivecon.png" />
    </head>
    <body>
         <div id="box">
                                  
           <header>
                
                 <a href="inicio.html"><img src="imagens/sublogo.png" alt="Logotipo" /></a>
                
            </header>             
              
              <nav class="navegacao">
                <ul class="navegacao">
                   <a class="navegacao" href="inicio.html"><li>Menu Principal</li></a>
                   <a class="navegacao" href="vendas.php"><li>Vendas</li></a>
                   <a class="navegacao" href="faturas.php"><li>Faturas e Notas</li></a>          
                   <a class="navegacao" href="despesas_gerais.php"><li> Despesas Gerais</li></a>
                   <a class="navegacao" href="contabilidade.php"><li>Contabilidade</li></a>
                
                <div class="campopesquisa">
                 
                     <form class="campopesquisa" method="post" action="processaPesquisaVendas.php">
                        <input type="text" name="txtPesquisa" id="pesquise" placeholder="  Pesquise por algo..." />
                        <input type="submit" name="submitPesquisa" id="ok" value="Ok" />
                     </form>
                 
                 </div>
                    
                </ul>
                </nav>
             
            <session>  
         
                <h1 class="tituloDePagina">Contabilidade</h1>
                 
             </session>
             
             <session>
                <div id="containerVendas">
                    <h2>Vendas</h2>
                    <table class="table table-responsive">
                        <thead>
                                <tr>
                                    <th>Lucro liquido</th>
                                    <th>Lucro bruto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php while($rows_dados = mysqli_fetch_assoc($queryVendasLiquido)){ ?>
                                    <td><?php echo "<span style='color:green;font-family:Oxygen, Arial;font-size:10pt;text-shadow:0.5px 0.5px 0.5px silver;'>"."R$".number_format($rows_dados['LUCRO_LIQUIDO'],2)."</span>" ;?></td>
                                    <?php } ?>
                                    <?php while($rows_dados = mysqli_fetch_assoc($queryVendasBruto)){ ?>
                                    <td><?php echo "<span style='color:green;font-family:Oxygen, Arial;font-size:10pt;text-shadow:0.5px 0.5px 0.5px silver;'>"."R$".number_format($rows_dados['LUCRO_BRUTO'],2)."</span>" ;?></td>
                                    <?php } ?>
                                    
                                </tr>
                            </tbody>
                        
                    </table>
                    <table class="table table-responsive">                 
                    <thead>
                        <th>N do Pedido</th>
                        <th>Mes</th>
                        <th>Valor Envio</th>
                        <th>Valor Livro</th>
                        <th>Desconto</th>
                        <th>Valor Recebido</th>
                        <th>Lucro Real</th>
                    </thead>  
                 <tbody>
                     <?php while($rows_dados = mysqli_fetch_assoc($queryVendas)){ ?>
                    <tr>
                        <td><?php echo $rows_dados['NUM_PED']; ?></td> 
                        <td><?php echo $rows_dados['DT_PAGAMENTO']; ?></td>
                        <td><?php echo $rows_dados['PRECO_ENVIO']; ?></td>
                        <td><?php echo $rows_dados['PRECO_LIVRO']; ?></td>
                        <td><?php echo ($rows_dados['C_DESCONTO_LIVRO']. "%"); ?></td>
                        <td><?php echo $rows_dados['VALOR_RECEBIDO']; ?></td>
                        <td><?php echo "<span style='color:green;font-family:Oxygen, Arial;font-size:10pt;text-shadow:0.5px 0.5px 0.5px silver;'>"."R$".number_format($rows_dados['LUCRO_REAL'],2) ."</span>" ; ?></td>
                    </tr> 
                     <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </session>
        </div>
    </body>
</html>