<?php
require_once '../Model/ProyectoDB.php';
class Usuario{
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $provincia;
    private $localidad;
    private $fechaNacimiento;
    private $contrasenia;
    private $esTecnico;
    private $esAdmin;
    private $estaEliminado;

    function __construct($dni="", $nombre="", $apellidos="", $email="", $provincia="", $localidad="", $fechaNacimiento="", $contrasenia="", $esTecnico=0, $esAdmin=0, $estaEliminado=0) {
        
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->provincia = $provincia;
        $this->localidad = $localidad;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->contrasenia = $contrasenia;
        $this->esTecnico = $esTecnico;
        $this->esAdmin = $esAdmin;
        $this->estaEliminado = $estaEliminado;

    }

    public function insert() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO usuario (dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado) VALUES (\"".$this->dni."\", \"".$this->nombre."\", \"".$this->apellidos."\", \"".$this->email."\", \"".$this->provincia."\", \"".$this->localidad."\", \"".$this->fechaNacimiento."\", \"".$this->contrasenia."\", \"".$this->esTecnico."\", \"".$this->esAdmin."\", \"".$this->estaEliminado."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM usuario WHERE dni=\"".$this->dni."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE usuario SET nombre=\"".$this->nombre."\", apellidos=\"".$this->apellidos."\", email=\"".$this->email."\", provincia=\"".$this->provincia."\", localidad=\"".$this->localidad."\", fechaNacimiento=\"".$this->fechaNacimiento."\", contrasenia=\"".$this->contrasenia."\", esTecnico=\"".$this->esTecnico."\", esAdmin=\"".$this->esAdmin."\", estaEliminado=\"".$this->estaEliminado."\" WHERE dni=\"".$this->dni."\"";
        $conexion->exec($actualiza);
    }
    public function eliminarUsuario() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE usuario SET estaEliminado=1 WHERE dni=\"".$this->dni."\"";
        $conexion->exec($actualiza);
    }
    public function activarUsuario() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE usuario SET estaEliminado=0 WHERE dni=\"".$this->dni."\"";
        $conexion->exec($actualiza);
    }

    public static function getUsuarios() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado FROM usuario ORDER BY apellidos";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->localidad, $registro->fechaNacimiento, $registro->contrasenia, $registro->esTecnico, $registro->esAdmin, $registro->estaEliminado);
        }
        return $usuarios;
    }

    public static function getUsuariosPaginacion($offset, $cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado FROM usuario ORDER BY apellidos LIMIT ".$offset.", ".$cant_registros."";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->localidad, $registro->fechaNacimiento, $registro->contrasenia, $registro->esTecnico, $registro->esAdmin, $registro->estaEliminado);
        }
        return $usuarios;
    }

    public static function getPaginasTotales($cant_registros) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado FROM usuario";
        $consulta = $conexion->query($seleccion);
        $filas_totales = $consulta->rowCount();
        $paginas_totales = ceil($filas_totales / $cant_registros);
        return $paginas_totales;
    }

    public static function getUsuariosClientes() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado FROM usuario WHERE esTecnico=0 AND esAdmin=0 ORDER BY apellidos";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->localidad, $registro->fechaNacimiento, $registro->contrasenia, $registro->esTecnico, $registro->esAdmin, $registro->estaEliminado);
        }
        return $usuarios;
    }

    public static function getUsuariosTecnicos() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado FROM usuario WHERE esTecnico=1 ORDER BY apellidos";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->localidad, $registro->fechaNacimiento, $registro->contrasenia, $registro->esTecnico, $registro->esAdmin, $registro->estaEliminado);
        }
        return $usuarios;
    }

    public static function getUsuariosAdmins() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado FROM usuario WHERE esAdmin=1 ORDER BY apellidos";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->localidad, $registro->fechaNacimiento, $registro->contrasenia, $registro->esTecnico, $registro->esAdmin, $registro->estaEliminado);
        }
        return $usuarios;
    }
    
    public static function getUsuarioById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, localidad, fechaNacimiento, contrasenia, esTecnico, esAdmin, estaEliminado FROM usuario WHERE dni=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $usuario = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->localidad, $registro->fechaNacimiento, $registro->contrasenia, $registro->esTecnico, $registro->esAdmin, $registro->estaEliminado);
        return $usuario;
    }

    public static function existeDni($dni) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT * FROM usuario WHERE dni=\"".$dni."\"";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount() > 0) {
            return true;	
        } else {
            return false;
        }
    }

    public static function existeEmail($email) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT * FROM usuario WHERE email=\"".$email."\"";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount() > 0) {
            return true;	
        } else {
            return false;
        }
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

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

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;

        return $this;
    }

    public function getEsTecnico()
    {
        return $this->esTecnico;
    }

    public function setEsTecnico($esTecnico)
    {
        $this->esTecnico = $esTecnico;

        return $this;
    }

    public function getEsAdmin()
    {
        return $this->esAdmin;
    }

    public function setEsAdmin($esAdmin)
    {
        $this->esAdmin = $esAdmin;

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