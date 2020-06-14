<?php 

use Hcode\PageAdmin;
use Hcode\PagePdf;
use Hcode\Model\User;
use Hcode\Model\Product;
use Hcode\Model\Item;
use Hcode\Model\Pdf;
use Dompdf\Dompdf;
use Hcode\Model\Arquive;
require_once("functions.php");

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', "portuguese");
date_default_timezone_set('America/Sao_Paulo');


	
$app->get("/orc/product/pdf/:cod/", function($cod){

		User::verifyLogin();

		$dompdf = new Dompdf(["enable_remote" => true]);

		ob_start();

		require ("Pdf.php");

		$dompdf->load_Html(ob_get_clean(), 'UTF-8');

		$dompdf->set_Paper("A5", "portrait");

		$dompdf->render();

		$dir = "views/orc/arquivos/";

		$name = "Nota" . " - " . $result['vlprice'] . ".pdf";

		$dompdf->stream($name, ["Attachment" => true] );

		$arquive = new Arquive();

		$arquive->save($result['cod'], $dir.$name);

});

$app->get("/orc/pdfall/:order/", function($order){

		User::verifyLogin();

		$dompdf = new Dompdf(["enable_remote" => true]);

		ob_start();

		require ("Pdfall.php");

		$dompdf->load_Html(ob_get_clean(), 'UTF-8');

		$dompdf->set_Paper("A4", "portrait");

		$dompdf->render();

		$dompdf->stream("listagem.pdf", ["Attachment" => true] );

});

// -------------------------------------- filtrando lista -------------

$app->get("/orc/products/:order", function($order){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Product::getPageSearch($search, $order);
	
	} else {

		$pagination = Product::getPage($page, $order);
	}

	$pages = [];

	for ($x=0; $x < $pagination['pages']; $x++) { 
		array_push($pages, [
			'href'=>'/index.php/orc/products/'.$order.'?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}


	$page = new PageAdmin();

	$page->setTpl("products",[
		"order" => $order,
		"products" => $pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	]);

});

//---------------------------------------------------------------------

$app->get("/orc/products/create/", function(){

	User::verifyLogin();

	$num = rand(1000,9999);

	$alfa = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r'];

	$cod = (string)strtoupper($alfa[rand(0,17)])."$num";

	$page = new PageAdmin();

	$page->setTpl("products-create", ['codigo'=>$cod]);

});

$app->post("/orc/products/create/", function(){

	User::verifyLogin();

	$product = new Product();

	$product->setData($_POST);

	$cod = $_POST['cod'];

	$product->save();


	$item = new Item();

	$item->setData($_POST);

	$item->saveitem();



	if (isset($_FILES['dir']) && $_FILES['dir']['name'] > '') {

		$arquive = new Arquive();

		$qtdchar = strlen($_FILES['dir']['name']);

		$ext = strtolower( substr($_FILES['dir']['name'], -4));

		$newname = strtolower( formatDir(substr($_FILES['dir']['name'], 0, ($qtdchar -4) ))) . $ext;

		$diretory = "views/orc/arquivos/";

		move_uploaded_file($_FILES['dir']['tmp_name'], $diretory.$newname);

		$dir = $diretory.$newname;

		$arquive->save($cod, formatDir($dir));
	}

	


	header("Location: /index.php/orc/product/up/"."$cod"."/");
	exit;

});

//----------------------- UPDATE --------------------------

$app->get("/orc/product/up/:cod/", function($cod){


	User::verifyLogin();

	$product = new Product();

	$product->getByUrl($cod);


	$item = new Item();

	$results = $item->listAllitens($cod);

	$qti = count($results);

	$valortotal = 0.0;

	for ($i=0; $i < $qti ; $i++) {	

		$qtd[$i] = $i;

		$valortotal += (float)$results[$i]['valor'] * (int)$results[$i]['qtd'];

	}

	$arquive = new Arquive();

	$resultsArq = $arquive->getArqByCod($cod);

	$page = new PageAdmin();

	$page->setTpl("products-update",[
		'product'=>$product->getValues(),
		'results'=>$results,
		'qti' => $qti,
		'valortotal' => $valortotal,
		'qtd'=> $qtd,
		'resultsArq'=>$resultsArq]);
});

$app->post("/orc/product/up/:cod/", function($cod){

	User::verifyLogin();

	$product = new Product();

	$product->getByUrl($cod);

	$product->setData($_POST);

	$product->save();


	$item = new Item();

	$results = $item->listAllitens($cod);

	$qtditens = count($results);

	for ($i=0; $i < $qtditens; $i++) {

		$id =  $_POST['id'.$results[$i]['id']];

		$iditem= $i + 1;

		$nitem=$_POST['item'.$results[$i]['id']];
		
		$nqtd=$_POST['qtd'.$results[$i]['id']];
		
		$nvalor=$_POST['valor'.$results[$i]['id']];

		Item::updateItem($id, $iditem, $nitem, $nqtd, $nvalor, $cod);
	}


	if (isset($_FILES['dir']) && $_FILES['dir']['name'] > '') {

		$arquive = new Arquive();

		$qtdchar = strlen($_FILES['dir']['name']);

		$ext = strtolower( substr($_FILES['dir']['name'], -4));

		$newname = strtolower( formatDir(substr($_FILES['dir']['name'], 0, ($qtdchar -4) ))) . $ext;

		$diretory = "views/orc/arquivos/";

		move_uploaded_file($_FILES['dir']['tmp_name'], $diretory.$newname);

		$dir = $diretory.$newname;

		$arquive->save($cod, formatDir($dir));
	}

	header('Location: /index.php/orc/product/up/'."$cod".'/');
	exit;

});


$app->get("/orc/product/item/addrow/:cod/", function($cod){

	$item = new Item();

	$results = $item->listAllitens($cod);

	$qtditens = count($results);

	Item::createRow($qtditens+1, $cod);

	header('Location: /index.php/orc/product/up/'."$cod".'/');
	exit;


});


$app->get("/orc/products/delete/:cod/", function($cod){

	User::verifyLogin();

	$product = new Product();

	$product->delete($cod);

	$arquive = new Arquive();

	$arquive->deleteByCod($cod);


	header('Location: /index.php/orc/products/dtregister');
	exit;
});

$app->get("/orc/product/deleteitem/:id/", function($id){

	User::verifyLogin();

	$item = new Item();

	$result = $item->getById((int)$id);

	$cod = $result['cod'];

	$id = $result['id'];

	$item->delete($id);

	header('Location: /index.php/orc/product/up/'."$cod".'/');
	exit;
});

$app->get("/orc/product/deletearq/:id/", function($id){

	User::verifyLogin();

	$arquive = new Arquive();

	$result = $arquive->deleteById($id);

	$cod = $result['cod'];


	header('Location: /index.php/orc/product/up/'."$cod".'/');
	exit;
});

$app->get("/orc/products/deletepagos/", function(){

	User::verifyLogin();

	$product = new Product();

	$results = $product->deletePagos();


	header('Location: /index.php/orc/products/dtregister');
	exit;
});


 ?>