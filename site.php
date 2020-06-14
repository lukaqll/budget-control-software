<?php 

use Hcode\Page;
use Hcode\model\Product;
use Hcode\model\Category;

$app->get("/categories/:idcategory", function($idcategory){


	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'pruducts'=>[]
	]);

});

$app->get('/', function() { // executa essa funcao na pag inicail '/'

	$products = Product::listAll();

	$page = new Page(); //abre o header

	$page->setTpl("index", [
		'products'=>Product::checkList($products)
	]); //carrega o conteudo com o '__contruct'. o '__destruct' é atomatico quando acaba
  
}); // basicamente juntando as tags 'head', 'body' e 'h1'

 ?>