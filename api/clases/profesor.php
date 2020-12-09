<?php

    class profesor {
        private $niu;
        private $nombre;
        private $apellido;

        public function __construct($niu, $nombre, $apellido) {
            $this->niu = $niu;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }


        public function getNombre(){
            return $this->nombre;
        }
        
    }
?>