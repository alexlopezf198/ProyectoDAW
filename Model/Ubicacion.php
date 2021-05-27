<?php
require_once '../Model/ProyectoDB.php';
class Ubicacion{
    private $id;
    private $nombre;
    private $descripcion;

    function __construct($id=0, $nombre="", $descripcion="") {
        
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;

    }

    public function insert() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO ubicacion (id, nombre, descripcion) VALUES (\"".$this->id."\", \"".$this->nombre."\", \"".$this->descripcion."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM ubicacion WHERE id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE ubicacion SET id=\"".$this->id."\", nombre=\"".$this->nombre."\", descripcion=\"".$this->descripcion."\" WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public static function getUbicaciones() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion FROM ubicacion ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $ubicaciones = [];
        while ($registro = $consulta->fetchObject()) {
            $ubicaciones[] = new Ubicacion($registro->id, $registro->nombre, $registro->descripcion);
        }
        return $ubicaciones;
    }
    
    public static function getUbicacionById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion FROM ubicacion WHERE id=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $ubicacion = new Ubicacion($registro->id, $registro->nombre, $registro->descripcion);
        return $ubicacion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}

    