<?php

// Definimos o nome de usuário e senha de acesso

$usuario = "livrariatome";
$senha = "souochefe";


 
// Criamos uma funÃ§Ã£o que exibirÃ¡ uma mensagem de erro caso os dados estejam errados

function erro(){
    // Definindo CabeÃ§alhos
    header('WWW-Authenticate: Basic realm="Administracao"');
    header('HTTP/1.0 401 Unauthorized');
	// Mensagem que serÃ¡ exibida
    echo '<h1>Voce n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea</h1>';
	// PÃ¡ra o carregamento da pÃ¡gina
    exit;
}
 
// Se as informaÃ§Ãµes nÃ£o foram setadas
if (!isset($_SERVER['PHP_AUTH_USER']) or !isset($_SERVER['PHP_AUTH_PW'])) {
	erro();
} 
// Se as informaÃ§Ãµes foram setadas
else {
	// Se os dados informados forem diferentes dos definidos
	if ($_SERVER['PHP_AUTH_USER'] != $usuario or $_SERVER['PHP_AUTH_PW'] != $senha) {
		erro();
	}
}
?>