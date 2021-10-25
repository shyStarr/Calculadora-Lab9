<?php
require_once(__DIR__.'/calculadora.php');
use \PHPUnit\Framework\TestCase;
class CalculadoraTest extends TestCase{
    public function testSumar(){
        $calculadora = new calculadora();
        $this->assertEquals(7, $calculadora->sumar(4,3));
    }
}