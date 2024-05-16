<?php
class ArchivoData {
	public static $tablename = "archivo";

	public function ArchivoData(){
		$this->id = "";
		$this->name = "";
		$this->fechaInsert=fecha::getDatetimeNow();
		$this->usuario_id = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,fechaInsert,usuario_id) ";
		$sql .= "value (\"$this->name\",\"$this->fechaInsert\",$this->usuario_id)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ArchivoData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->name\",fechaInsert= \"$this->fechaInsert\",usuario_id=$this->usuario_id where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ArchivoData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArchivoData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArchivoData());
	}


}

?>