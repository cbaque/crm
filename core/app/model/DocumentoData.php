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
	public $paciente_id;
	public $category_id;
	public $categoria;

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
		$this->paciente_id;
		$this->category_id;
		$this->categoria;

	}

	public function getArchivo(){ return ArchivoData::getById($this->archivo_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (archivo_id,fecha,nombre,ruta,tipo,usuario_id, paciente_id, category_id) ";
		$sql .= "value ($this->archivo_id,\"$this->fecha\",\"$this->nombre\",\"$this->ruta\",\"$this->tipo\",$this->usuario_id,\"$this->paciente_id\",\"$this->category_id\")";
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

	public static function getAllCountPaciente($id) {

		$sql = "select count(archivo_id) as cantidad, archivo_id,b.name as paciente, b.identificacion as cedula, a.paciente_id from ".self::$tablename." a JOIN patients b on a.paciente_id = b.id where archivo_id = " .$id. " GROUP by archivo_id , b.name, b.identificacion, a.paciente_id";
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

	public static function getArchivoGroup() {

		$sql = "select archivo_id, fecha from ".self::$tablename." GROUP by archivo_id ";
		$query = Executor::doit($sql);
		
		$data = Model::many($query[0],new DocumentoData());

		return $data;		

	}

	public static function getAllCountCategory($archivo_id, $paciente_id) {

		$sql = "select a.archivo_id, b.name as categoria from ".self::$tablename." a JOIN category b on a.category_id = b.id where archivo_id = ".$archivo_id." and a.paciente_id = ".$paciente_id." ";
		$query = Executor::doit($sql);
		
		$data = Model::many($query[0],new DocumentoData());

		return $data;		

	}

}

?>