<?php 

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;
use \Hcode\Model\Arquive;


//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);


class Product extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql-> select("SELECT * FROM tb_products ORDER BY desproduct");

	}

	public static function checkList($list)
	{
		foreach ($list as &$row) {
			$p = new Product;
			$p->setData($row);
			$row= $p->getValues();
		}

		return $list;
	}


//-------------------------------------- SAVE PRODUCT ------------------------------------------------
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desction, :price, :desurl, :nota, :stats, :prioridade, :dtregister, :cod, :pago )", array(
			":idproduct"=>$this->getidproduct(),
			":desproduct"=>$this->getdesproduct(),
			":vlprice"=>$this->getvlprice(),
			":vlwidth"=>$this->getvlwidth(),
			":vlheight"=>$this->getvlheight(),
			":vllength"=>$this->getvllength(),
			":vlweight"=>$this->getvlweight(),
			":desction"=>$this->getdesction(),
			":price"=>$this->getprice(),
			":desurl"=>$this->getdesurl(),
			":nota"=>$this->getnota(),	
			":stats"=>$this->getstats(),
			":prioridade"=>$this->getprioridade(),
			":dtregister"=>date("Y-m-d H:i:s"),
			":cod"=>$this->getcod(),
			":pago"=>$this->getpago()
		));

		$this->setData($results[0]);

	}
	
	public function get($idproduct)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct",
		[':idproduct'=>$idproduct]);

		$this->setData($results[0]);
	}

	public function getByUrl($cod)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE cod = :cod",
		[':cod'=>$cod]);

		$this->setData($results[0]);
	}

	public function delete($cod)
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_products WHERE cod = :cod",
		array(":cod"=>$cod));	

		$sql->query("DELETE FROM tb_itens WHERE cod = :cod",
		array(":cod"=>$cod));

	}

	public function deletePagos()
	{
		$sql = new Sql();
		$arquivo = new Arquive();

		$results = $sql->select("SELECT * FROM tb_products WHERE pago = :pago",
		array(":pago"=>"Pago"));

		$codigos = array();

		for ($i=0; $i < count($results) ; $i++) { 

			array_push($codigos, $results[$i]['cod']);

			$arquivo->deleteByCod($codigos[$i]);

			$sql->query("DELETE FROM tb_itens WHERE cod = :cod",
			array(":cod"=>$codigos[$i]));

			$this->delete($codigos[$i]);
		}

	}


	public function getValues()
	{
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	

	public static function getPage($page = 1, $order, $itemsPerPage = 30)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		if ($order == "dtregister") {
			$direction = "DESC";
		}else{$direction = "ASC";}

		$query = "
				SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_products 
				WHERE pago != 'Pago'
				ORDER BY $order $direction
				LIMIT $start, $itemsPerPage;";

			$results = $sql->select($query);



		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $order, $page = 1, $itemsPerPage = 30)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		if ($order == "dtregister") {
			$direction = "DESC";
		}else{$direction = "ASC";}

		$query = "
				SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_products
				WHERE desproduct LIKE :search
				OR vlprice LIKE :search
				OR desction LIKE :search
				OR nota LIKE :search
				OR stats LIKE :search
				OR prioridade LIKE :search
				OR desurl LIKE :search
				OR cod LIKE :search
				OR pago LIKE :search
				ORDER BY dtregister $direction
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



}


 ?>