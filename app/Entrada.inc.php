<?php

class Entrada {
    
    private $id;
    private $autor_id;
    private $url;
    private $video;
    private $imagen;
    private $imagen2;
    private $titulo;
    private $precio;
    private $texto;
    private $fecha;
    private $activa;
    
    public function __construct($id, $autor_id, $url, $video, $imagen, $imagen2, $titulo, $precio, $texto, $fecha, $activa) {
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> url = $url;
        $this -> video = $video;
        $this -> imagen = $imagen;
        $this -> imagen2 = $imagen2;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> precio = $precio;
        $this -> fecha = $fecha;
        $this -> activa = $activa;
    }
     
    public function obtener_id() {
        return $this -> id;
    }
    
    public function obtener_autor_id() {
        return $this -> autor_id;
    }
    
    public function obtener_url() {
        return $this -> url;
    }

    public function obtener_video() {
        return $this -> video;
    }

    public function obtener_imagen() {
        return $this -> imagen;
    }

    public function obtener_imagen2() {
        return $this -> imagen2;
    }
    
    public function obtener_titulo() {
        return $this -> titulo;
    }
    
    public function obtener_precio() {
        return $this -> precio;
    }
    public function obtener_texto() {
        return $this -> texto;
    }
    
    public function obtener_fecha() {
        return $this -> fecha;
    }
    
    public function esta_activa() {
        return $this -> activa;
    }
    
    public function cambiar_url($url) {
        $this -> url = $url;
    }
    public function cambiar_video($video) {
        $this -> video = $video;
    }
    public function cambiar_imagen($imagen) {
        $this -> imagen = $imagen;
    }
    public function cambiar_imagen2($imagen2) {
        $this -> imagen2 = $imagen2;
    }
    
    public function cambiar_titulo($titulo) {
        $this -> titulo = $titulo;
    }

    public function cambiar_precio($precio) {
        $this -> precio = $precio;
    }
    
    public function cambiar_texto($texto) {
        $this -> texto = $texto;
    }
    
    public function cambiar_activa($activa) {
        $this -> activa = $activa;
    }
}