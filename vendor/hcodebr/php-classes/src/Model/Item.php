<?php 

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use Hcode\Model\Product;

class Item extends Model
{

	//-------------------------------------- SAVE ITEM ------------------------------------------------
	public function saveitem()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_itens_save(:id, :iditem, :cod, :item, :qtd, :valor)", array(
			":id"=>$this->getid(),
			":iditem"=>$this->getiditem(),
			":cod"=>$this->getcod(),
			":item"=>$this->getitem(),
			":qtd"=>$this->getqtd(),
			":valor"=>$this->getvalor()
		));

		$this->setData($results[0]);

	}
	

	public static function createRow($iditem, $cod)
	{
		$sql = new Sql();

		$sql->select("INSERT INTO tb_itens (iditem, qtd, valor, cod) 
						VALUES (:iditem, :qtd, :valor, :cod);",
					  [':iditem'=>$iditem,
					   ':cod'=>$cod,
					   ':valor'=>0.00,
					   ':qtd'=>1]);
	}


	public static function updateItem($id, $niditem, $nitem, $nqtd, $nvalor, $cod)
	{
		$sql = new Sql();

		$sql->select("UPDATE tb_itens
					  SET 
					  iditem = :niditem,
					  item = :nitem,
					  qtd = :nqtd, 
					  valor = :nvalor
					  WHERE id = :id AND cod = :cod;",

					  [':id'=>$id,
					   ':nitem'=>$nitem,
					   ':nqtd'=>$nqtd,
					   ':nvalor'=>$nvalor,
					   ':niditem'=>$niditem,
					   ':cod'=>$cod]);
	}

	public function get($cod)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_itens WHERE cod = :cod",
		[':cod'=>$cod]);

		$this->setData($results[0]);
	}

	public function getById($id)
	{
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_itens WHERE id = :id",
		[':id'=>$id]);

		return $result[0];
	}

	public function delete($id)
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_itens WHERE id = :id",
		array(":id"=>$id));	

	}

	public function getValuesItens()
	{
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	public static function listAllitens($cod)
	{

		$sql = new Sql();

		return $sql-> select("SELECT * FROM tb_itens WHERE cod = :cod ORDER BY iditem;",[':cod' => $cod]);

	}

	public static function listAll()
	{

		$sql = new Sql();

		return $sql-> select("SELECT * FROM tb_itens;");

	}

}


 ?>