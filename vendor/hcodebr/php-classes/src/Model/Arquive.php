<?php 

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Arquive extends Model 
{

	public function getArqByCod($cod)
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_arquives WHERE cod = :cod;", [":cod"=>$cod]);

	}

	public function getArqByDir($dir)
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_arquives WHERE dir = :dir;", [":dir"=>$dir]);

	}

	public function getArqById($id)
	{
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_arquives WHERE id = :id;", [":id"=>$id]);

		return $result[0];

	}

	public function save($cod, $dir)
	{
		$sql = new Sql();

		$sql->select("INSERT INTO tb_arquives (cod, dir, dtregister) VALUES(:cod, :dir, :dtregister)", [

			":cod"=>$cod,
			":dir"=>$dir,
			":dtregister"=>date("Y-m-d H:i:s")
		]);
	}

	public function deleteByCod($cod)
	{
		$sql = new Sql();

		$results = $this->getArqByCod($cod);

		for ($i=0; $i < count($results) ; $i++) { 
			
			unlink($results[$i]['dir']);

			$sql->select("DELETE FROM tb_arquives WHERE id = :id;", [ ":id"=>$results[$i]['id'] ]);

		}
	}

	public function deleteById($id)
	{
		$sql = new Sql();

		$result = $this->getArqById($id);

		unlink($result['dir']);

		$sql->select("DELETE FROM tb_arquives WHERE id = :id;", [ ":id"=>$result['id'] ]);

		return $result;

	}




}


 ?>