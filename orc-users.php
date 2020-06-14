<?php 

use \Hcode\PageAdmin;
use \Hcode\Model\User;

//----------------------------lista de cadastros---------------------------------------

$app->get("/orc/users",function(){

	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page -> setTpl("users", array("users" => $users));
});

//------------------------------rota de criação de cadastro----------------------------

$app->get("/orc/users/create",function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page-> setTpl("users-create");
});

//--------------------------------delete e usuario-----------------------------------

$app->get("/orc/users/:iduser/delete", function($iduser){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /index.php/orc/users");
	exit;

});

//----------------------criação de novo cadastro--------------------------------------
$app->post("/orc/users/create", function () {

 	User::verifyLogin();

	$user = new User();

 	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

 	$_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

 		"cost"=>12

 	]);

 	$user->setData($_POST);

	$user->save();

	header("Location: /index.php/orc/users");
 	exit;

});

//------------------------------update de cadastro--------------------------------

$app->get("/orc/users/:iduser",function($iduser){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page-> setTpl("users-update", array(
		"user"=>$user->getValues()
	));
});

//--------------------------jogando os updates no banco-----------------------------------------

$app->post("/orc/users/:iduser", function($iduser){

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

	$user->get((int)$iduser); // carrega os daods

	$user->setData($_POST);

	$user->update();

	header("Location: /index.php/orc/users");
	exit;
});

 ?>