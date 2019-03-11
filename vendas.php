<?php
    
    require_once("autenticaEntrada.php");
    
    // Conexão com o Banco de Dados

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");

    //Comandos para construir PAGINAÇÃO

	$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1; 
	$query = mysqli_query($conn, "SELECT * FROM cadastro_vendas");
	$totalRegistro = mysqli_num_rows($query);
	
	$quantidade_pag = 50;	
	$num_pag = ceil($totalRegistro/ $quantidade_pag);
	
	$inicio = ($quantidade_pag * $pagina) - $quantidade_pag;
	
	$queryPaginacao = mysqli_query($conn, "SELECT * FROM cadastro_vendas ORDER BY ID DESC LIMIT $inicio, $quantidade_pag");
	$totalRegistro = mysqli_num_rows($queryPaginacao);

	//Fim PAGINAÇÃO

	//Exibir quantidades (em numeros de linhas) de registros

	$queryContagem = mysqli_query($conn, "SELECT COUNT(*) AS TOTAL_LINHAS FROM cadastro_vendas");

	//Mostrar ganho total 

    $querySoma = mysqli_query($conn, "SELECT SUM(LUCRO_REAL) AS GANHO_TOTAL FROM cadastro_vendas");

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
                
                 <a href="inicio.php"><img src="imagens/sublogo.png" alt="Logotipo" /></a>
                
            </header>             
              
              <nav class="navegacao">
                <ul class="navegacao">
                   <a class="navegacao" href="inicio.php"><li>Menu Principal</li></a>
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
                
                
                 
                <h1 class="tituloDePagina">Vendas</h1>
                 
             </session>
             
                <session class="totalregistros">
                    <?php while($total_linhas = mysqli_fetch_assoc($queryContagem)){ ?>
                    <p> Total de registros: <?php echo $total_linhas['TOTAL_LINHAS']; ?> </p>
                    <?php } ?>
                   
                 </session>
             
             <session class="botoesCrud">
             
                <a href="indica_alteracao_vendas.html"> <button> Editar </button></a>
                <a href="indica_exclusao_vendas.html"> <button> Excluir </button></a>
                 <a href="formulario_cadastro_vendas.php"> <button id="botaoDestaque"> Novo Registro </button></a>
             
             </session>
             
             <session>
             
                <table class="table table-responsive">                 
                    <thead>
                        <th>N do Pedido</th>
                        <th>TItulo</th>
                        <th>Data</th>
                        <th>Mes</th>
                        <th>Valor Envio</th>
                        <th>Valor Livro</th>
                        <th>Desconto</th>
                        <th>Valor Recebido</th>
                        <th>Lucro Real</th>
                        <th>Obs.</th>
                    </thead>  
                 <tbody>
                     <?php while($rows_dados = mysqli_fetch_assoc($queryPaginacao)){ ?>
                    <tr>
                        <td><?php echo $rows_dados['NUM_PED']; ?></td> 
                        <td><?php echo $rows_dados['TIT_LIVRO']; ?></td>
                        <td><?php echo $rows_dados['DATA']; ?> </td>
                        <td><?php echo $rows_dados['DT_PAGAMENTO']; ?></td>
                        <td><?php echo $rows_dados['PRECO_ENVIO']; ?></td>
                        <td><?php echo $rows_dados['PRECO_LIVRO']; ?></td>
                        <td><?php echo ($rows_dados['C_DESCONTO_LIVRO']. "%"); ?></td>
                        <td><?php echo $rows_dados['VALOR_RECEBIDO']; ?></td>
                        <td><?php echo "<span style='color:green;font-family:Oxygen, Arial;font-size:10pt;text-shadow:0.5px 0.5px 0.5px silver;'>"."R$".number_format($rows_dados['LUCRO_REAL'],2) ."</span>" ; ?></td>
                        <td><?php echo $rows_dados['NOTAS']; ?></td>
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