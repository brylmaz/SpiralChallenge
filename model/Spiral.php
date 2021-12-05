<?php 

namespace App\model;

use App\Modal;
use App\Database;
use \PDO;

class Spiral extends Modal {
	public $id;
	public $x;
	public $y;
	public $result;

	function getSpiral() {
		$db = Database::getInstance();
		$query = $db->prepare("SELECT * FROM spiral WHERE id = ? ");
		$query->execute(array($this->id));
		$result=$query->fetch(PDO::FETCH_ASSOC);
		if (empty($result)) {
			return false;
		}
		else{
			return $result;
		}
	}
	function addSpiral() {
		if ($this->checkSpiral()===true) {
			$db = Database::getInstance();
			$query = $db->prepare("INSERT INTO spiral SET x=?,y=?,result=?");
			$query->execute(array($this->x,$this->y,$this->result));
			$result=$query->fetchAll(PDO::FETCH_ASSOC);
			return $db->lastInsertId();
		}
		else{
			$result=$this->checkSpiral();
			return $result['id'];
		}
	}
	function checkSpiral() {
		$db = Database::getInstance();
		$query = $db->prepare("SELECT * FROM spiral WHERE x = ? AND y= ?");
		$query->execute(array($this->x,$this->y));
		$result=$query->fetch(PDO::FETCH_ASSOC);
		if (empty($result)) {
			return true;
		}
		else{
			return $result;
		}
	}
}


?>