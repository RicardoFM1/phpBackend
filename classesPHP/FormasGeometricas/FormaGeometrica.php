<?php

abstract  class FormaGeometria {
    
    
    protected float $area;
    abstract public function calcularArea(float $base, float $altura);
    public function getArea(){
        return $this->area;
    }

}
