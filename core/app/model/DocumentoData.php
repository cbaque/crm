<?php
class DocumentoData {
	public static $tablename = "documentos";
/*	require_once "core/controller/fecha.php";*/
	public $id;
	public $nombre;
	public $archivo_id;
	public $usuario_id;
	public $ruta;
	public $tipo;
	public $fecha;
	public $paciente;
	public $cedula;
	public $cantidad;

	public function DocumentoData(){
		$this->id = "";
		$this->nombre = "";
		$this->archivo_id = "";
		$this->usuario_id = "";
		$this->ruta = "";
		$this->tipo = "";
		$this->fecha = fecha::getDatetimeNow();
		$this->paciente = "";
		$this->cedula= "";
		$this->cantidad= 0;

	}

	public function getArchivo(){ return ArchivoData::getById($this->archivo_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (archivo_id,fecha,nombre,ruta,tipo,usuario_id, paciente, cedula) ";
		$sql .= "value ($this->archivo_id,\"$this->fecha\",\"$this->nombre\",\"$this->ruta\",\"$this->tipo\",$this->usuario_id,\"$this->paciente\",\"$this->cedula\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$data = Model::one($query[0],new DocumentoData());

		return $data;
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by archivo_id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DocumentoData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new DocumentoData());
	}

	public static function getAllCount() {

		$sql = "select paciente, cedula, count(archivo_id) as cantidad, archivo_id from ".self::$tablename." GROUP by archivo_id ";
		$query = Executor::doit($sql);
		
		$data = Model::many($query[0],new DocumentoData());

		return $data;		

	}


	public static function getByArchivoId($archivoID) {

		$sql = "select * from ".self::$tablename." where archivo_id = $archivoID ";
		$query = Executor::doit($sql);
		
		$data = Model::many($query[0],new DocumentoData());

		return $data;		

	}

}

?>