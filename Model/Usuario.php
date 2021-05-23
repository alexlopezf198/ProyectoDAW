<?php
require_once '../Model/ProyectoDB.php';
class Usuario{
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $provincia;
    private $poblacion;
    private $fechaNacimiento;
    private $esTecnico;
    private $esAdmin;

    function __construct($dni, $nombre, $apellidos, $email, $provincia, $poblacion, $fechaNacimiento, $esTecnico, $esAdmin) {
        
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->provincia = $provincia;
        $this->poblacion = $poblacion;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->esTecnico = $esTecnico;
        $this->esAdmin = $esAdmin;

    }

    public function insert() {
        $conexion = ProyectoDB::connectDB();
        $insercion = "INSERT INTO usuario (dni, nombre, apellidos, email, provincia, poblacion, fechaNacimiento, esTecnico, esAdmin) VALUES (\"".$this->dni."\", \"".$this->nombre."\", \"".$this->apellidos."\", \"".$this->email."\", \"".$this->provincia."\", \"".$this->poblacion."\", \"".$this->fechaNacimiento."\", \"".$this->esTecnico."\", \"".$this->esAdmin."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = ProyectoDB::connectDB();
        $borrado = "DELETE FROM usuario WHERE dni=\"".$this->dni."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = ProyectoDB::connectDB();
        $actualiza = "UPDATE usuario SET nombre=\"".$this->nombre."\", apellidos=\"".$this->apellidos."\", email=\"".$this->email."\", provincia=\"".$this->provincia."\", poblacion=\"".$this->poblacion."\", fechaNacimiento=\"".$this->fechaNacimiento."\", esTecnico=\"".$this->esTecnico."\", esAdmin=\"".$this->esAdmin."\" WHERE dni=\"".$this->dni."\"";
        $conexion->exec($actualiza);
    }

    public static function getUsuarios() {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, poblacion, fechaNacimiento, esTecnico, esAdmin FROM usuario ORDER BY apellidos";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->poblacion, $registro->fechaNacimiento, $registro->esTecnico, $registro->esAdmin);
        }
        return $usuarios;
    }
    
    public static function getUsuarioById($id) {
        $conexion = ProyectoDB::connectDB();
        $seleccion = "SELECT dni, nombre, apellidos, email, provincia, poblacion, fechaNacimiento, esTecnico, esAdmin FROM usuario WHERE dni=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $usuario = new Usuario($registro->dni, $registro->nombre, $registro->apellidos, $registro->email, $registro->provincia, $registro->poblacion, $registro->fechaNacimiento, $registro->esTecnico, $registro->esAdmin);
        return $usuario;
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

    public function getPoblacion()
    {
        return $this->poblacion;
    }

    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

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
}