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

             <session>

                <img style="height: 600px; width: 1100px;" src="imagens/em_construcao.png" alt="Página em construção" />

             </session>
 <footer>
             
                 <p>Desenvolvido por Livraria Tomé - Setor de Tecnologia e Contabilidade</p>
                              
             </footer>
            
        </div>
        
    </body>
    
</html>