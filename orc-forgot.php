<?php 

use \Hcode\PageAdmin;
use \Hcode\Model\User;
//--------------------rota Esqueci minha senha -----------------------------

$app->get("/orc/forgot", function(){

	$page = new PageAdmin([
	"header"=>false,
	"footer"=>false
	]);

	$page->setTpl("forgot");
});

$app->post("/orc/forgot", function(){

	$user = User::getForgot($_POST["email"]);

	header("Location: /index.php/orc/forgot/sent");
	exit;
});

$app->get("/orc/forgot/sent", function(){

	$page = new PageAdmin([
	"header"=>false,
	"footer"=>false
	]);

	$page->setTpl("forgot-sent");
});

$app->get("/orc/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new PageAdmin([
	"header"=>false,
	"footer"=>false
	]);

	$page->setTpl("forgot-reset", array( "name"=>$user["desperson"], "code"=>$_GET["code"] ));

});

$app->post("/orc/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($user["idrecovery"]);

	$users = new User();

	$users->get((int)$forgot["iduser"]);

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, ["cost"=>12]);

	$users->setPassword($password);

	$page = new PageAdmin([
	"header"=>false,
	"footer"=>false
	]);

	$page->setTpl("forgot-reset-success");

});

 ?>