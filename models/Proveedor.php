<?php
class Proveedor
{
    private $documento;
    private $tipoPersona;
    private $nombre;
    private $telefono;
    private $email;
    private $ciudad;
    private $direccion;


    public function __construct($documento, $tipoPersona, $nombre, $telefono, $email, $ciudad, $direccion)
    {
        $this->documento = $documento;
        $this->tipoPersona = $tipoPersona;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
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

    public function getTipoPersona()
    {
        return $this->tipoPersona;
    }

    public function setTipoPersona($tipoPersona)
    {
        $this->tipoPersona = $tipoPersona;

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

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

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

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }
}
