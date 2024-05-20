<?php
class PacienteData {
	public static $tablename = "patients";
    public $id;
    public $name;
    public $lastname;
    public $is_active;
    public $created_at; 
    public $identificacion; 

	public function PacienteData(){
		$this->id = "";
		$this->name = "";
		$this->lastname = "";
		$this->is_active = "1";
		$this->created_at = fecha::getDatetimeNow();
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,is_active,identificacion,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->is_active\",\"$this->identificacion\",\"$this->created_at\")";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",identificacion=$this->identificacion\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

}

?>