<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Contabilidade </title>
        <link rel="stylesheet" type="text/css" href="css/geral.css" />
         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="icon" href="imagens/fivecon.png" />
        
        <script type="text/javascript">
            function vendas(){
                document.getElementById("html").innerHTML =
                    
                     "<p>Indique o mes e ano de consulta para VENDAS: <br /><form action='resultContabil.php' method='post'><select name='mes'><option value='JAN'>Janeiro</option><option value='FEV'>Fevereiro</option><option value='MAR'>Marco</option><option value='ABR'>Abril</option><option value='MAI'>Maio</option><option value='JUN'>Junho</option><option value='JUL'>Julho</option><option value='AGO'>Agosto</option><option value='SET'>Setembro</option><option value='OUT'>Outubro</option><option value='NOV'>Novembro</option><option value='DEZ'>Dezembro</option></select><select name='ano'><option value='17'>2017</option><option value='18'>2018</option><option value='19'>2019</option><option value='2020'>2020</option><option value='21'>2021</option><option value='22'>2022</option></select><input type='submit' value='Consultar'/></form>";
            }
            function faturas(){
                document.getElementById("html").innerHTML =
                    
                "<p>Indique o mes e ano de consulta para FATURAS E NOTAS: <br /><form action='mensalContabil.php' method='post'><select name='mes'><option value='JAN'>Janeiro</option><option value='FEV'>Fevereiro</option><option vaue='MAR'>Março</option><option value='ABR'>Abril</option><option value='MAI'>Maio</option><option value='JUN'>Junho</option><option value='JUL'>Julho</option><option value='AGO'>Agosto</option><option value='SET'>Setembro</option><option value='OUT'>Outubro</option><option value='NOV'>Novembro</option><option value='DEZ'>Dezembro</option></select><select name='ano'><option value='17'>2017</option><option value='18'>2018</option></select></form>";
            }
        </script>
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
         
                <h1 class="tituloDePagina">Contabilidade</h1>
                 
             </session>
             
             <center>
                <session>
                
                 <button onclick="vendas()">Vendas</button><button onclick="faturas()">Faturas e notas</button>
              
                 <div>
                    <p id="html"></p>
                 </div>
             </session>
          </center>
        </div>
    </body>
</html>