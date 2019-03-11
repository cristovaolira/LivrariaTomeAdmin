<?php
    
    require_once("autenticaEntrada.php");
    
    // Conexão com o Banco de Dados

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");


    //Comando Referentes a PESQUISA 

    $resultadoPesquisa = $_POST['txtPesquisa'];
        
    $queryPesquisa = mysqli_query($conn, "SELECT * FROM cadastro_vendas WHERE NUM_PED LIKE '%$resultadoPesquisa%'
    OR TIT_LIVRO LIKE '%$resultadoPesquisa%'
    OR EDI_LIVRO LIKE '%$resultadoPesquisa%'
    OR DATA LIKE '%$resultadoPesquisa%'
    OR NOM_CLIENTE LIKE '%$resultadoPesquisa%'
    OR EMAIL_CLIENTE LIKE '%$resultadoPesquisa%'
    OR EST_CLIENTE LIKE '%$resultadoPesquisa%'
    OR CID_CLIENTE LIKE '%$resultadoPesquisa%'
    OR CEP LIKE '%$resultadoPesquisa%'
    OR MKT_PLACE LIKE '%$resultadoPesquisa%'
    OR DT_PAGAMENTO LIKE '%$resultadoPesquisa%'
    OR PRECO_ENVIO LIKE '%$resultadoPesquisa%'
    OR PRECO_LIVRO LIKE '%$resultadoPesquisa%'
    OR C_DESCONTO_LIVRO LIKE '%$resultadoPesquisa%'
    OR VALOR_RECEBIDO LIKE '%$resultadoPesquisa%'
    ORDER BY ID DESC
    ");
$totalRegistro = mysqli_num_rows($queryPesquisa);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Pagina Inicial </title>
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
                 
                     <form class="campopesquisa" method="post" action="#">
                        <input type="text" name="txtPesquisa" id="pesquise" placeholder="  Pesquise por algo..." />
                        <input type="submit" name="submitPesquisa" id="ok" value="Ok" />
                     </form>
                 
                 </div>
                    
                </ul>
                </nav>
             
            <session>  
                
                
                 
                <h1 class="tituloDePagina">Vendas</h1>
                 
             </session>
             
                
             
             <session class="botoesCrud">
             
                <a href="indica_alteracao_vendas.html"> <button> Editar </button></a>
                <a href="indica_exclusao_vendas.html"> <button> Excluir </button></a>
                 <a href="formulario_cadastro_vendas.php"> <button id="botaoDestaque"> Novo Registro </button></a>
             
             </session>
             
             <session class="totalregistros">
                    <p> Total de registros: <?php echo $totalRegistro; ?> </p>
            </session>

             <session>
             
                <table class="table table-responsive">                 
                    <thead>
                        <th>N do Pedido</th>
                        <th>TItulo</th>
                        <th>Editora</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>CEP</th>
                        <th>Mkt Place</th>
                        <th>Mes</th>
                        <th>Valor Envio</th>
                        <th>Valor Livro</th>
                        <th>Desconto</th>
                        <th>Valor Recebido</th>
                        <th>Lucro Real</th>
                    </thead>  
                 <tbody>
                     <?php while($rows_dados = mysqli_fetch_assoc($queryPesquisa)){ ?>
                    <tr>
                        <td><?php echo $rows_dados['NUM_PED']; ?></td> 
                        <td><?php echo $rows_dados['TIT_LIVRO']; ?></td>
                        <td><?php echo $rows_dados['EDI_LIVRO']; ?></td>
                        <td><?php echo $rows_dados['DATA']; ?> </td>
                        <td><?php echo $rows_dados['NOM_CLIENTE']; ?></td>
                        <td><?php echo $rows_dados['EMAIL_CLIENTE']; ?> </td>
                        <td><?php echo $rows_dados['EST_CLIENTE']; ?></td>
                        <td><?php echo $rows_dados['CID_CLIENTE']; ?></td>
                        <td><?php echo $rows_dados['CEP']; ?></td>
                        <td><?php echo $rows_dados['MKT_PLACE']; ?></td>
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
                
                <session class="paginacao">
                    <!-- Paginação -->
                    	<?php
                    	$pagina_ant = $pagina - 1;
                    	$pagina_pos = $pagina + 1;
                    	
                    	?>
                    	<center>
                    	    			
                    		<nav class="paginacao">
                    		  <ul>
                    			<li class="itempaginacao">
                    				<?php
                    					if ($pagina_ant != 0){ ?>
                    						<a href="vendas.php?pagina=<?php echo $pagina_ant; ?>" aria-label="Anterior">
                    						<span aria-hidden="true">&laquo;</span>
                    						<span class="sr-only"></span>
                    						</a>
                    					<?php }	?>
                    			</li>
                    			<?php
                    			
                    				for($i = 1; $i < $num_pag + 1; $i++){ ?>
                    				
                    			<li class="itempaginacao">
                    				<a class="page-link" href="vendas.php?pagina=<?php echo $i; ?>">
                    					<?php echo $i; ?></a>
                    			</li>
                    			<?php } ?>
                    			<li class="page-item">
                    				<?php
                    					if ($pagina_pos !=0){ ?>
                    						<a href="vendas.php?pagina=<?php echo $pagina_pos; ?>" aria-label="Next">
                    						<span aria-hidden="true">&raquo;</span>
                    						<span class="sr-only"></span>
                    						</a>
                    				<?php } ?>
                    			</li>
                    		  </ul>
                    		</nav>
                    		
                    	</center>
                    
                </session>
             
             </session>
             
             <footer>
             
                 <p>Desenvolvido por Livraria Tomé - Setor de Tecnologia e Contabilidade</p>
                              
             </footer>
            
        </div>
        
    </body>
    
</html>