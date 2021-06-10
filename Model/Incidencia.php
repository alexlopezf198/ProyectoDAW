<?php
require_once '../Model/ProyectoDB.php';
class Incidencia{
    private $id;
    private $id_tipo;
    private $id_ubicacion;
    private $id_usuario;
    private $id_tecnico;
    private $titulo;
    private $descripcion;
    private $fecha;
    private $estado;

    function __construct($id=0, $id_tipo=0, $id_ubicacion=0, $titulo="", $descripcion="", $fecha="", $estado=0, $id_usuario=0, $id_tecnico="NULL") {
        
        $this->id = $id;
        $this->id_tipo = $id_tipo;
        $this->id_ubicacion = $id_ubicacion;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->id_usuario = $id_usuario;
        $this->id_tecnico = $id_tecnico;

    }

    public function insert() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO incidencia (id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico) VALUES (\"".$this->id_tipo."\", \"".$this->id_ubicacion."\", \"".$this->titulo."\", \"".$this->descripcion."\", \"".$this->fecha."\", \"".$this->estado."\", \"".$this->id_usuario."\", \"".$this->id_tecnico."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM incidencia WHERE id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE incidencia SET id_tipo=\"".$this->id_tipo."\", id_ubicacion=\"".$this->id_ubicacion."\", titulo=\"".$this->titulo."\", descripcion=\"".$this->descripcion."\", fecha=\"".$this->fecha."\", estado=\"".$this->estado."\", id_usuario=\"".$this->id_usuario."\", id_tecnico=\"".$this->id_tecnico."\" WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public function modificaIncidencia() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE incidencia SET id_tipo=\"".$this->id_tipo."\", id_ubicacion=\"".$this->id_ubicacion."\", titulo=\"".$this->titulo."\", descripcion=\"".$this->descripcion."\", fecha=\"".$this->fecha."\", estado=\"".$this->estado."\", id_usuario=\"".$this->id_usuario."\", id_tecnico=".$this->id_tecnico." WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public function nuevaIncidencia() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO incidencia (id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico) VALUES (\"".$this->id_tipo."\", \"".$this->id_ubicacion."\", \"".$this->titulo."\", \"".$this->descripcion."\", \"".$this->fecha."\", \"".$this->estado."\", \"".$this->id_usuario."\", ".$this->id_tecnico.")";
        $conexion->exec($insercion);
    }

    public function atiendeIncidencia($id) {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE incidencia SET estado=1, id_tecnico=\"".$id."\" WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public function desatiendeIncidencia() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE incidencia SET estado=0, id_tecnico=null WHERE id=\"".$this->id."\"";
        $conexion->exec($actualiza);
    }

    public static function getIncidencias() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasPaginacion($offset, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia ORDER BY fecha DESC LIMIT ".$offset.", ".$cant_registros."";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getPaginasTotales($cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia";
        $consulta = $conexion->query($seleccion);
        $filas_totales = $consulta->rowCount();
        $paginas_totales = ceil($filas_totales / $cant_registros);
        return $paginas_totales;
    }

    public static function getPaginasTotalesIncPropias($id, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_usuario=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $filas_totales = $consulta->rowCount();
        $paginas_totales = ceil($filas_totales / $cant_registros);
        return $paginas_totales;
    }

    public static function getPaginasTotalesIncTramite($cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE NOT estado=2";
        $consulta = $conexion->query($seleccion);
        $filas_totales = $consulta->rowCount();
        $paginas_totales = ceil($filas_totales / $cant_registros);
        return $paginas_totales;
    }

    public static function getPaginasTotalesIncAtendidas($id, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_tecnico=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $filas_totales = $consulta->rowCount();
        $paginas_totales = ceil($filas_totales / $cant_registros);
        return $paginas_totales;
    }

    public static function getIncidenciasTramite() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE NOT estado=2 ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasTramitePaginacion($offset, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE NOT estado=2 ORDER BY fecha DESC LIMIT ".$offset.", ".$cant_registros."";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasAtendidas($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_tecnico=\"".$id."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasAtendidasPaginacion($id, $offset, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_tecnico=\"".$id."\" ORDER BY fecha DESC LIMIT ".$offset.", ".$cant_registros."";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasAtendidasFiltroTipo($idTec,$idTip) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_tecnico=\"".$idTec."\" AND id_tipo=\"".$idTip."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasAtendidasFiltroUbicacion($idTec,$idTip) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_tecnico=\"".$idTec."\" AND id_ubicacion=\"".$idTip."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasTramiteFiltroTipo($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE NOT estado=2 AND id_tipo=\"".$id."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasFiltroTipo($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_tipo=\"".$id."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasFiltroUbicacion($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_ubicacion=\"".$id."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasByUsuario($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_usuario=\"".$id."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasByUsuarioPaginacion($id, $offset, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_usuario=\"".$id."\" ORDER BY fecha DESC LIMIT ".$offset.", ".$cant_registros."";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasByUsuarioFiltroTipo($id_u, $id_t) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_usuario=\"".$id_u."\" AND id_tipo=\"".$id_t."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciasByUsuarioFiltroUbicacion($id_us, $id_ub) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id_usuario=\"".$id_us."\" AND id_ubicacion=\"".$id_ub."\" ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
        }
        return $incidencias;
    }

    public static function getIncidenciaById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT id, id_tipo, id_ubicacion, titulo, descripcion, fecha, estado, id_usuario, id_tecnico FROM incidencia WHERE id=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $incidencia = new Incidencia($registro->id, $registro->id_tipo, $registro->id_ubicacion, $registro->titulo, $registro->descripcion, $registro->fecha, $registro->estado, $registro->id_usuario, $registro->id_tecnico);
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

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getId_tecnico()
    {
        return $this->id_tecnico;
    }

    public function setId_tecnico($id_tecnico)
    {
        $this->id_tecnico = $id_tecnico;

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

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}