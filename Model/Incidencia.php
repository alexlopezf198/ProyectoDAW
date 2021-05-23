<?php
require_once '../Model/ProyectoDB.php';
class Incidencia{
    private $id;
    private $id_tipo;
    private $id_ubicacion;
    private $titulo;
    private $descripcion;
    private $fecha;

    function __construct($id, $id_tipo, $id_ubicacion, $titulo, $descripcion, $fecha) {
        
        $this->id = $id;
        $this->id_tipo = $id_tipo;
        $this->id_ubicacion = $id_ubicacion;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;

    }

    public function insert() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO incidencia (id, id_tipo, id_ubicacion, titulo, descripcion, fecha) VALUES (\"".$this->id."\", \"".$this->id_tipo."\", \"".$this->id_ubicacion."\", \"".$this->titulo."\", \"".$this->descripcion."\", \"".$this->fecha."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM incidencia WHERE id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE incidencia SET id=\"".$this->id."\", id_tipo=\"".$this->id_tipo."\", id_ubicacion=\"".$this->id_ubicacion."\", titulo=\"".$this->titulo."\", descripcion=\"".$this->descripcion."\", fecha=\"".$this->fecha."\" WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public static function getIncidencias() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha FROM incidencia ORDER BY fecha";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha);
        }
        return $incidencias;
    }
    
    public static function getIncidenciaById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha FROM incidencia WHERE id=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $incidencia = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha);
        return $incidencia;
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

    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

        return $this;
    }

    public function getId_ubicacion()
    {
        return $this->id_ubicacion;
    }

    public function setId_ubicacion($id_ubicacion)
    {
        $this->id_ubicacion = $id_ubicacion;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

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

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}