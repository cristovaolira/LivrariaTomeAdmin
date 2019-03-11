<?php
 require_once("autenticaEntrada.php");
    
    // Conexão com o Banco de Dados

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");

    $indica_venda = $_POST['np'];
    $stratment = "SELECT * FROM cadastro_vendas WHERE NUM_PED = '$indica_venda'";
    $query = mysqli_query($conn, $stratment);
    $result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Edicao de vendas </title>
        <link rel="stylesheet" type="text/css" href="css/geral.css" />
         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="icon" href="imagens/fivecon.png" />
    </head>  
    <body id="pagina_de_edicao">
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
                 <h2 class="subtituloDePagina">Edicao de registro</h2>
                 
             <session class="botoesCrud">
                  
                <div id="botaoCancelarFormularios">
                    <a href="vendas.php"> <button id="botaoDestaque"> Cancelar </button></a>
                </div>
             
             </session>
                
            <session class="formularios">
                 <!-- Formulário de Cadastro de Vendas -->
                 <div id="">
                     <center>
                        <form method="post" action="processaEditarVendas.php">
                            N do pedido:<input type="text" name="np" value="<?php echo $result['NUM_PED' ]; ?>" /> 

                            Titulo:<input type="text" name="titulo" size="40"value="<?php echo $result['TIT_LIVRO']; ?>" /> <br />

                            Editora:<input type="text" name="editora" value="<?php echo $result['EDI_LIVRO']; ?>" />

                            Data:<input type="text" name="data" size="9" value="<?php echo $result['DATA']; ?>" />

                            Nome:<input type="text" name="nome" size="27" value="<?php echo $result['NOM_CLIENTE']; ?>" /><br />

                            E-mail:<input type="text" name="email" size="40" value="<?php echo $result['EMAIL_CLIENTE']; ?>" /> <br />

                            Estado:<input type="text" name="estado" size="2" value="<?php echo $result['EST_CLIENTE']; ?>"/> 

                            Cidade:<input type="text" name="cidade" value="<?php echo $result['CID_CLIENTE']; ?>" /> 

                            CEP:<input type="text" name="cep" value="<?php echo $result['CEP']; ?>" /> 

                            Marketin Place:<input type="text" name="mktPlace" value="<?php echo $result['MKT_PLACE']; ?>" /><br />  

                            Mes:<input type="text" name="mes" value="<?php echo $result['DT_PAGAMENTO']; ?>" />			    

                            Preco de envio:<input type="text" name="preco_envio" size="12" value="<?php echo $result['PRECO_ENVIO']; ?>" />

                            Preco:<input type="text" name="preco" size="12" value="<?php echo $result['PRECO_LIVRO']; ?>" /><br />

                            Desconto:<input type="text" name="comDesconto" size="10" value="<?php echo $result['C_DESCONTO_LIVRO']; ?>"  />

                            Valor recebido:<input type="text" name="valorRecebido" size="12" value="<?php echo $result['VALOR_RECEBIDO']; ?>" /><br /><br />
                            
                            Notas:<input type="text" name="notas"  value="<?php echo $result['NOTAS']; ?>" /><br /><br />

                            <div id="botoesDeFormulario">
                                <input type="reset" name="reset" id="reset" value="Limpar" />
                                <input type="submit" name="enviar_dados" id="enviar_dados" value="Editar" />
                            </div>
                         </form>
                        </center>
                 </div>
                     
             </session>
             </session>
        </div>
    </body>
</html>