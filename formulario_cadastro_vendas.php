<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Cadastro de Vendas </title>
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
                        <input type="text" name="txtPesquisa" id="pesquise" placeholder="Pesquise por algo..." />
                        <input type="submit" name="submitPesquisa" id="ok" value="Ok" />
                     </form>
                 
                 </div>
                    
                </ul>
             </nav>
             
             <session class="formulariosAlinhamentoBotao&Titulo">
                                                  
                <h1 class="tituloDePagina">Vendas</h1>
                 <h2 class="subtituloDePagina">Novo registro</h2>
                               
            </session>
             
              <session class="botoesCrud">
                  
                <div id="botaoCancelarFormularios">
                    <a href="vendas.php"> <button id="botaoDestaque"> Cancelar </button></a>
                </div>
             
             </session>
             
             <session class="formularios">
                 <!-- Formulário de Cadastro de Vendas -->
                 <div border="1" style="border-radius:5px;" id="">
                     <center>
                        <form method="post" action="processaCadastroVendas.php">
                            <input type="text" name="np" id="np" placeholder="N do Pedido" /> 

                            <input type="text" name="titulo" id="titulo" size="40" placeholder="Titulo" /> <br />

                            <input type="text" name="data" id="data" size="9" placeholder="Data"/>

                            <input type="text" name="mes" id="mes" placeholder="MES/ANO" />			    

                            <input type="text" name="preco_envio" id="preco_envio" placeholder="Preco de Envio" size="12"/>

                            <input type="text" name="preco" id="preco_livro" placeholder="Preco do Livro" size="12" /><br />

                            <input type="text" name="comDesconto" id="comDesconto" placeholder="Desconto %" size="10" />

                            <input type="text" name="valorRecebido" id="valorRecebido" placeholder="Valor Recebido" size="12"/><br /><br />

                            <input type="text" name="notas" id="notas" placeholder="Campo p/ notas" />
                            <br />
                            <div id="botoesDeFormulario">
                                <input type="reset" name="reset" id="reset" value="Limpar" />
                                <input type="submit" name="enviar_dados" id="enviar_dados" value="Enviar Dados" />
                            </div>
                         </form>
                        </center>
                 </div>
                     
             </session>
             
             <footer>
             
                 <p>Desenvolvido por Livraria Tome - Setor de Tecnologia e Contabilidade</p>
                              
             </footer>
        </div>
        
    </body>
    
</html>