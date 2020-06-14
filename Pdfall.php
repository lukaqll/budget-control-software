
<?php 

use Hcode\Model\Product;
use Hcode\DB\Sql;

	function getpdfall($cod)
	{
		$cod = "B4360";
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_products WHERE cod = :cod",
		[':cod'=>$cod]);

		return $result[0];

	}

	function listAllitens($cod)
	{

		$sql = new Sql();

		$results = $sql-> select("SELECT * FROM tb_itens WHERE cod = :cod ORDER BY iditem;",[':cod' => $cod]);

		return $results;

	}

	function getPageSearch($search, $order, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		if ($order == "dtregister") {
			$direction = "DESC";
		}else{$direction = "ASC";}

		$sql = new Sql();

		$query = "	SELECT SQL_CALC_FOUND_ROWS *
					FROM tb_products
					WHERE desproduct LIKE :search 
					OR vlprice LIKE :search
					OR desction LIKE :search
					OR nota LIKE :search
					OR stats LIKE :search
					OR prioridade LIKE :search
					OR desurl LIKE :search
					OR cod LIKE :search
					ORDER BY $order $direction
					LIMIT $start, $itemsPerPage;";

		$results = $sql->select("$query",
			[':search'=>'%'.$search.'%']);


		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	} 

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$search = explode("/", $search);


		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

		if ($search != '') {

			$pagination = getPageSearch($search, $order);
		
		} else {

			$pagination = getPage($page);
		}

		$pages = [];

		for ($x=0; $x < $pagination['pages']; $x++) { 
			array_push($pages, [
				'href'=>'/orc/products/?'.http_build_query([
					'page'=>$x+1,
					'search'=>$search
				]),
				'text'=>$x+1
			]);
		}



	$result = getPageSearch($search[0], $order);
	
	$resultquery = $result['data'];

	$rows = count($resultquery);

	$baselink = "http://localhost:".$_SERVER['SERVER_PORT'];

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
<title>PDF - <?= $resp ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?=$baselink?>/res/orc/bootstrap/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/b88754c2b4.js" crossorigin="anonymous"></script>

	<style type="text/css">
			@font-face {
			font-family: 'OpenSans';
			src: url("lib/fonts/OpenSans/OpenSans-Regular.ttf");
			font-size: 1em;
		}


		@page{
			margin: 70px 0;
		}

		body{
		
		}

		.container{
			width: 70%;
			margin:0 auto;
		}

		#logo {
			position: relative;
			margin-left: 10px;
			margin-top: 0px;
			width: 200px;
		}

		h1{
			font-family: 'OpenSans';
			font-weight: bold;
			color: black;
			font-size: 40px;
			position: relative;
			margin-left: 80px;
			top: -90px;
		}
		h2{
			font-family: 'OpenSans';
			color: black;
			font-size: 15px;
			position: relative;
			margin-left: 168px;
			font-weight: lighter;
			top: -90px;

		}

		.camp{
			border: none;
			font-family: 'OpenSans';
			margin-left: -10px;
			margin-top: -5px;
		}

		#cliente{
			border-right-color: black;
		}

		#itens{
			height: 250px;
		}

		p{
			margin-top: 0px;
		}

		label{
			font-family: Arial;
			font-weight: bolder;

		}

		#title{
			font-size: 15px;
		}

		.tab{
			border-radius: 0;
		}

	</style>


<body>

		<div class="container">
			
			<img src="<?=$baselink?>/lib/logo_nome.png" id="logo">

		</div><br><br><br><br>

	<form class="container" method="POST">
  
 	<table style="margin-left: -20px; width: 600px;">
		<thead >
		<tr style="background-color: rgb(225,225,255); border-radius:5px;  height: 25px; padding-left: 10px; margin-left: -30px">
			<th><label style="margin-left: 10px;">Cod</label></th>
			<th><label style="margin-left: 10px;">Pedido</label></th>
			<th><label style="margin-left: 0px">Cliente</label></th>
			<th><label style="margin-left: 0px">Nota</label></th>
			<th><label>Valor</label></th>
		</tr>
		</thead>

		<?php for ($i=0; $i < $rows; $i++): 

			$valor = formatPrice( $resultquery[$i]['price'] );

		?>	
		<tr>
			<td> <label style="margin-left: 10px; font-weight: lighter; font-family: OpenSans"><?= $resultquery[$i]['cod'] ?> </label></td>
			
			<td> <label style="margin-left: 10px; margin-right: -80px; width: 50px; font-weight: lighter; font-family: OpenSans"> <?= $resultquery[$i]['desurl'] ?> </label></td>
			
			<td> <label style="margin-left: 7px; width: 60px;font-weight: lighter; font-family: OpenSans"><?= $resultquery[$i]['vlprice'] ?> </label></td>
			
			<td> <label style="width: 60px;font-weight: lighter; font-family: OpenSans"><?= $resultquery[$i]['nota'] ?> </label></td>

			<td> <label style="width: 60px;font-weight: lighter; font-family: OpenSans"><?= $valor ?> </label></td>

		</tr>
		<?php endfor; ?>   
    </table>   
 	
	

<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>