<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	define('INCLUDE_PATH','http://localhost/montaigner/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');


	//DB info
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','projeto_06');

	//CP constants
	define('NOME_EMPRESA','Montaigner');

	function selecionadoMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

?>