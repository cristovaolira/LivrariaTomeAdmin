<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulario Faturas </title>
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
                                                  
                <h1 class="tituloDePagina">Faturas e notas</h1>
                 <h2 class="subtituloDePagina">Novo registro</h2>
                               
            </session>
             
              <session class="botoesCrud">
                  
                <div id="botaoCancelarFormularios">
                    <a href="vendas.php"> <button id="botaoDestaque"> Cancelar </button></a>
                </div>
             
             </session>
             
             <session class="formularios">
                 <!-- Formulário de Cadastro de Vendas -->
                 <div id="">
                     <center>
                        <form method="post" action="processaCadastroNF.php">
                            <input type="number" name="nf" id="np" placeholder="N da Nota" /> 

                            <input type="number" name="serie" id="serie" size="40" placeholder="Serie"/> <br />

                            <input type="text" name="entrada" id="data" size="9" placeholder="Data"/>

                            <input type="text" name="mes" id="mes" size="9" placeholder="Mes"/>

                            <input type="text" name="fornecedor" id="fornecedor" size="27" placeholder="Fornecedor" /><br />

                            <input type="text" name="vencimento" id="vencimento" size="9" placeholder="Vencimento" /> <br />

                            <input type="text" name="valor_bruto" id="valor_bruto" size="9" placeholder="Valor Bruto" /> 

                            <input type="text" name="valor_liquido" id="valor_liquido" placeholder="Valor Liquido" /> <br />
                            
                            <input type="text" name="notas" id="notas" placeholder="Campo p/ notas" /><br />
<b>Pago</b> <input type="checkbox" name="pago" />

                            <div id="botoesDeFormulario">
                                <input type="reset" name="reset" id="reset" value="Limpar" />
                                <input type="submit" name="enviar_dados" id="enviar_dados" value="Enviar Dados" />
                            </div>
                     </form>
                 </div>
                     
             </session>
             
             <footer>
             
                 <p>Desenvolvido por Livraria Tome - Setor de Tecnologia e Contabilidade</p>
                              
             </footer>
        </div>
        
    </body>
    
</html>