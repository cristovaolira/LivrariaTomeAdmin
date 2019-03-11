<?php
    
    require_once("autenticaEntrada.php");
    
    // Conexão com o Banco de Dados

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");

   

    //Comando Referentes a PESQUISA 

    $resultadoPesquisa = $_POST['txtPesquisa'];
        
    $queryPesquisa = mysqli_query($conn, "SELECT * FROM notas_fiscais WHERE NF_NUM LIKE '%$resultadoPesquisa%'
    OR SERIE LIKE '%$resultadoPesquisa%'
    OR DATA LIKE '%$resultadoPesquisa%'
    OR MES_ANO LIKE '%$resultadoPesquisa%'
    OR FORNECEDOR LIKE '%$resultadoPesquisa%'
    OR VENCIMENTO LIKE '%$resultadoPesquisa%'
    OR VALOR_BRUTO LIKE '%$resultadoPesquisa%'
    OR VALOR_LIQUIDO LIKE '%$resultadoPesquisa%'
    OR _STATUS LIKE '%$resultadoPesquisa%'
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
                 
                     <form class="campopesquisa" method="post" action="#">
                        <input type="text" name="txtPesquisa" id="pesquise" placeholder="  Pesquise por algo..." />
                        <input type="submit" name="submitPesquisa" id="ok" value="Ok" />
                     </form>
                 
                 </div>
                    
                </ul>
                </nav>
             
            <session>  
                
                
                 
                <h1 class="tituloDePagina">Faturas e notas</h1>
                 
             </session>
             
                
             
             <session class="botoesCrud">
             
                <a href="indica_alteracao_vendas.html"> <button> Editar </button></a>
                <a href="indica_exclusao_vendas.html"> <button> Excluir </button></a>
                 <a href="formulario_cadastro_faturas.php"> <button id="botaoDestaque"> Novo Registro </button></a>
             
             </session>
             
              <session class="totalregistros">
                    <p> Total de registros: <?php echo $totalRegistro; ?> </p>
            </session>
             <session>
             
                <table class="table table-responsive">                 
                    <thead>
                        <th>N da Nota</th>
                        <th>Série</th>
                        <th>Data</th>
                        <th>Mês</th>
                        <th>Fornecedor</th>
                        <th>Vencimento</th>
                        <th>Valor Bruto</th>
                        <th>Valor Líquido</th>
                        <th>Status</th>
                    </thead>  
                 <tbody>
                     <?php while($rows_dados = mysqli_fetch_assoc($queryPesquisa)){ ?>
                    <tr>
                        <td><?php echo $rows_dados['NF_NUM']; ?></td> 
                        <td><?php echo $rows_dados['SERIE']; ?></td>
                        <td><?php echo $rows_dados['DATA']; ?></td>
                        <td><?php echo $rows_dados['MES_ANO']; ?> </td>
                        <td><?php echo $rows_dados['FORNECEDOR']; ?></td>
                        <td><?php echo $rows_dados['VENCIMENTO']; ?> </td>
                        <td><?php echo "R$".$rows_dados['VALOR_BRUTO']; ?> </td>
                        <td><?php echo "R$".$rows_dados['VALOR_LIQUIDO']; ?> </td>
                        <td> <?php if($rows_dados['_STATUS'] == "Pago"){
                                echo "<span style='color:green;'>" . "Pago" . "</span>";
                            }elseif($rows_dados['VENCIMENTO'] < date('Y-m-d')){
                                echo "<span style='color:red;'>" . "Vencida" . "</span>";
                            }
                                                    else{
                                echo "<span style='color:orange;'>" . "Aguardando Pagamento" . "</span>";
                            }
                            ?> </td>
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