<?php
require_once '../Model/ProyectoDB.php';
class Tipo{
    private $id;
    private $nombre;
    private $descripcion;

    function __construct($id, $nombre, $descripcion) {
        
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;

    }

    public function insert() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO tipo (id, nombre, descripcion) VALUES (\"".$this->id."\", \"".$this->nombre."\", \"".$this->descripcion."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM tipo WHERE id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE tipo SET id=\"".$this->id."\", nombre=\"".$this->nombre."\", descripcion=\"".$this->descripcion."\" WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public static function getTipos() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion FROM tipo ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $tipos = [];
        while ($registro = $consulta->fetchObject()) {
            $tipos[] = new Tipo($registro->id, $registro->nombre, $registro->descripcion);
        }
        return $tipos;
    }
    
    public static function getTipoById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion FROM tipo WHERE id=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $tipo = new Tipo($registro->id, $registro->nombre, $registro->descripcion);
        return $tipo;
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