<?php
Class Calculadora {
    function sumar ($numero1, $numero2){
        return $numero1 + $numero2;
    }
    function restar ($numero1, $numero2){
        return $numero1 - $numero2;
    }
    function multi ($numero1, $numero2){
        return $numero1 * $numero2;
    }
    function dividir ($numero1, $numero2){
        if ($numero2 == 0){
            throw new Exception ("Division por cero");
        }
        return $numero1 / $numero2;
    }
    function GenerarArreglo (){
        $arreglo = array();
        for ($i=0 ; $i<5 ; $i++){
            $arreglo[$i] = rand(1,10);
        }
        return $arreglo;
    }

    public function capturarEntradasPermutacion(){
    
    }

    public function calcularPermutacion($n, $r){
        $numerador = $this->calcularFactorial($n);
        $denominador = $this->calcularFactorial($n - $r);
        return $numerador / $denominador;
    }

    public function calcularFactorial($numero){
        
    }

}