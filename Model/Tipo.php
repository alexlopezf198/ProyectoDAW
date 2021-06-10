<?php
require_once '../Model/ProyectoDB.php';
class Tipo{
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
        $insercion = "INSERT INTO tipo (nombre, descripcion, estaEliminado) VALUES (\"".$this->nombre."\", \"".$this->descripcion."\", \"".$this->estaEliminado."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM tipo WHERE id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE tipo SET nombre=\"".$this->nombre."\", descripcion=\"".$this->descripcion."\", estaEliminado=\"".$this->estaEliminado."\" WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public function eliminarTipo() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE tipo SET estaEliminado=1 WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public static function getTipos() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM tipo WHERE estaEliminado=0 ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $tipos = [];
        while ($registro = $consulta->fetchObject()) {
            $tipos[] = new Tipo($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
        }
        return $tipos;
    }

    public static function getPaginasTotales($cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM tipo WHERE estaEliminado=0";
        $consulta = $conexion->query($seleccion);
        $filas_totales = $consulta->rowCount();
        $paginas_totales = ceil($filas_totales / $cant_registros);
        return $paginas_totales;
    }

    public static function getTiposListar() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM tipo WHERE estaEliminado=0";
        $consulta = $conexion->query($seleccion);
        $tipos = [];
        while ($registro = $consulta->fetchObject()) {
            $tipos[] = new Tipo($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
        }
        return $tipos;
    }

    public static function getTiposListarPaginacion($offset, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM tipo WHERE estaEliminado=0 LIMIT ".$offset.", ".$cant_registros."";
        $consulta = $conexion->query($seleccion);
        $tipos = [];
        while ($registro = $consulta->fetchObject()) {
            $tipos[] = new Tipo($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
        }
        return $tipos;
    }

    public static function getTiposByNombre($nom) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM tipo WHERE  nombre LIKE \"%".$nom."%\"";
        $consulta = $conexion->query($seleccion);
        $tipos = [];
        while ($registro = $consulta->fetchObject()) {
            $tipos[] = new Tipo($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
        }
        return $tipos;
    }
    
    public static function getTipoById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, estaEliminado FROM tipo WHERE id=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $tipo = new Tipo($registro->id, $registro->nombre, $registro->descripcion, $registro->estaEliminado);
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