<?php
require_once '../Model/ProyectoDB.php';
class Ubicacion{
    private $id;
    private $nombre;
    private $descripcion;
    private $estaEliminado;

    function __construct($id=0, $nombre="", $descripcion="", $estaEliminado=0) {
        
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estaEliminado = $estaEliminado;

    }

    public function insert() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO ubicacion (nombre, descripcion, estaEliminado) VALUES (\"".$this->nombre."\", \"".$this->descripcion."\", \"".$this->estaEliminado."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM ubicacion WHERE id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE ubicacion SET nombre=\"".$this->nombre."\", descripcion=\"".$this->descripcion."\", estaEliminado=\"".$this->estaEliminado."\" WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public function eliminarUbicacion() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE ubicacion SET estaEliminado=1 WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public static function getUbicaciones() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM ubicacion ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $ubicaciones = [];
        while ($registro = $consulta->fetchObject()) {
            $ubicaciones[] = new Ubicacion($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
        }
        return $ubicaciones;
    }

    public static function getUbicacionesListar() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM ubicacion";
        $consulta = $conexion->query($seleccion);
        $ubicaciones = [];
        while ($registro = $consulta->fetchObject()) {
            $ubicaciones[] = new Ubicacion($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
        }
        return $ubicaciones;
    }

    public static function getUbicacionesByNombre($nom) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM ubicacion WHERE nombre LIKE \"%".$nom."%\"";
        $consulta = $conexion->query($seleccion);
        $ubicaciones = [];
        while ($registro = $consulta->fetchObject()) {
            $ubicaciones[] = new Ubicacion($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
        }
        return $ubicaciones;
    }
    
    public static function getUbicacionById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM ubicacion WHERE id=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $ubicacion = new Ubicacion($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
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

    public function getEstaEliminado()
    {
        return $this->estaEliminado;
    }

    public function setEstaEliminado($estaEliminado)
    {
        $this->estaEliminado = $estaEliminado;

        return $this;
    }
}

    