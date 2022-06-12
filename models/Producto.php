<?php
class Proveedor
{
    private $codigo;
    private $nombre;
    private $descripcion;
    private $costo;
    private $saldoBodega;
    private $cantidadMinima;
    private $cantidadMaxima;
    private $imagen;
    private $categorias_id_categoria;


    public function __construct(
        $codigo,
        $nombre,
        $descripcion,
        $costo,
        $saldoBodega,
        $cantidadMinima,
        $cantidadMaxima,
        $imagen,
        $categorias_id_categoria
    ) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->costo = $costo;
        $this->saldoBodega = $saldoBodega;
        $this->cantidadMinima = $cantidadMinima;
        $this->cantidadMaxima = $cantidadMaxima;
        $this->imagen = $imagen;
        $this->categorias_id_categoria = $categorias_id_categoria;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

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

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    public function getSaldoBodega()
    {
        return $this->saldoBodega;
    }

    public function setSaldoBodega($saldoBodega)
    {
        $this->saldoBodega = $saldoBodega;

        return $this;
    }

    public function getCantidadMinima()
    {
        return $this->cantidadMinima;
    }

    public function setCantidadMinima($cantidadMinima)
    {
        $this->cantidadMinima = $cantidadMinima;

        return $this;
    }

    public function getCantidadMaxima()
    {
        return $this->cantidadMaxima;
    }

    public function setCantidadMaxima($cantidadMaxima)
    {
        $this->cantidadMaxima = $cantidadMaxima;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getCategorias_id_categoria()
    {
        return $this->categorias_id_categoria;
    }

    public function setCategorias_id_categoria($categorias_id_categoria)
    {
        $this->categorias_id_categoria = $categorias_id_categoria;

        return $this;
    }
}
