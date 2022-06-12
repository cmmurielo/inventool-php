<?php
class Cliente
{
    private $usuario;
    private $contrasena;
    private $nombre;
    private $apellido;
    private $documento;
    private $perfil_id_perfil;

    public function __construct($usuario, $contrasena, $nombre, $apellido, $documento, $perfil_id_perfil)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->perfil_id_perfil = $perfil_id_perfil;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

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

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    public function getPerfil_id_perfil()
    {
        return $this->perfil_id_perfil;
    }

    public function setPerfil_id_perfil($perfil_id_perfil)
    {
        $this->perfil_id_perfil = $perfil_id_perfil;

        return $this;
    }
}
