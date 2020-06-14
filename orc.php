<?php 

use Hcode\PageAdmin;
use Hcode\Model\User;

//----------------------- rota pag orc--------------------------------------------

$app->get('/orc', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index"); 
  
});

//------------------------- rota admin login------------------------------------------

$app->get('/orc/login', function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

//------------------------- verificar login admin-------------------------------------

$app->post('/orc/login', function(){

	User::login($_POST["login"], $_POST["password"]);

	header("location: /index.php/orc");

	exit;
});

//---------------------------rota ao deslogar----------------------------------------

$app->get('/orc/logout', function(){ 

	User::logout();

	header("Location: /index.php/orc/login"); // volta para paf de login admin
	exit;
});
 ?>