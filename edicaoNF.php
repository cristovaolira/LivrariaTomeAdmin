<?php
 require_once("autenticaEntrada.php");
    
    // Conexão com o Banco de Dados

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");

    $indica_venda = $_POST['nf'];
    $stratment = "SELECT * FROM notas_fiscais WHERE NF_NUM = $indica_venda";
    $query = mysqli_query($conn, $stratment);
    
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
                                                  
                <h1 class="tituloDePagina">Faturas e notas</h1>
                 <h2 class="subtituloDePagina">Edição de registro</h2>
                 
             <session class="botoesCrud">
                  
                <div id="botaoCancelarFormularios">
                    <a href="vendas.php"> <button id="botaoDestaque"> Cancelar </button></a>
                </div>
             
             </session>
            <session class="formularios">
                 <!-- Formulário de Cadastro de Notas fiscais -->
                 <div id="">
                     <center>
                        <form method="post" action="processaEditarNF.php">
                            <?php while($result = mysqli_fetch_assoc($query)){ ?>
                            
                            N nota<input type="text" name="nf" id="nf" size="10" placeholder="Nota Fiscal NÂº" value="<?php echo $result['NF_NUM'] ?>" /> 
                            
                            <input type="text" name="serie" id="serie" size="10" placeholder="Serie" value="<?php echo $result['SERIE'] ?>" />

                            Entrada<input type="text" name="entrada" id="entrada" size="10" placeholder="Data" value="<?php echo $result['DATA'] ?>" /> <br />
                            
                            Mes<input type="text" name="mes" id="entrada" size="10" placeholder="Mes/Ano" value="<?php echo $result['MES_ANO'] ?>" />
                            
                            Fornecedor<input type="text" name="fornecedor" id="fornecedor" placeholder="Fornecedor" value="<?php echo $result['FORNECEDOR'] ?>" />
                            
                            Vencimento<input type="text" name="vencimento" id="vencimento" size="10" placeholder="Vencimento" value="<?php echo $result['VENCIMENTO'] ?>" /><br /><br />
                            
                            Valor bruto<input type="text" name="valor_bruto" id="valor_bruto" size="10" placeholder="Valor" value="<?php echo $result['VALOR_BRUTO'] ?>"/>
                            
                            <input type="text" name="valor_liquido" id="valor_liquido" size="10" placeholder="Valor" value="<?php echo $result['VALOR_LIQUIDO'] ?>"/><br /><br />
                            
                            <input type="text" name="notas" id="notas" placeholder="Campo p/ notas" value="<?php echo $result['NOTAS'] ?>"/><br /><br />

                            Pago<br /> <input type="checkbox" name="pago" />     
                                                        <?php } ?>
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