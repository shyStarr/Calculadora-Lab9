<?php
require_once(__DIR__.'/calculadora.php');
use \PHPUnit\Framework\TestCase;
class CalculadoraTest extends TestCase{
        public function sumarProveedor()
    {
    return [
        'Caso 1' => [-1, -1, -2],
        'Caso 2' => [0, 0, 0],
        'Caso 3' => [0, -1, -1],
        'Caso 4' => [-1, 0, -1]
    ];
    }
    public function restarProveedor()
    {
    return [
        'Caso 1' => [-1, -1, 0],
        'Caso 2' => [0, 0, 0],
        'Caso 3' => [0, -1, 1],
        'Caso 4' => [-1, 0, -1]
    ];
    }
    public function multiProveedor()
    {
    return [
        'Caso 1' => [-1, -1, 1],
        'Caso 2' => [0, 0, 0],
        'Caso 3' => [0, -1, 0],
        'Caso 4' => [-1, 0, 0]
    ];
    }
    public function dividirProveedor()
    {
    return [
        'Caso 1' => [-1, -1, 1, 0],
        'Caso 2' => [0, 0, "Exception", ""],
        'Caso 3' => [0, -1, 0, 0],
        'Caso 4' => [-1, 0, "Exception", ""],
        'Caso 5' => [1, 3, 0.33, 0.01]
    ];
    }
    /**
    * @dataProvider sumarProveedor
    */
    public function testSumar($numero1, $numero2, $resultadoesperado){
        $calculadora = new calculadora();
        //$this->assertEquals(7, $calculadora->sumar(4,3));
        $this->assertEquals($resultadoesperado, $calculadora->sumar($numero1,$numero2));
    }
    /**
    * @dataProvider restarProveedor
    */
    public function testRestar($numero1, $numero2, $resultadoesperado){
        $calculadora = new calculadora();
        $this->assertEquals($resultadoesperado, $calculadora->restar($numero1,$numero2));
    }
    /**
    * @dataProvider multiProveedor
    */
    public function testMulti($numero1, $numero2, $resultadoesperado){
        $calculadora = new calculadora();
        $this->assertEquals($resultadoesperado, $calculadora->multi($numero1,$numero2));
    }
    /**
    * @dataProvider dividirProveedor
    */
    public function testDividir($numero1, $numero2, $resultadoesperado, $delta){
        $calculadora = new calculadora();
        if ($numero2 != 0){
            $this->assertEqualsWithDelta($resultadoesperado, $calculadora->dividir($numero1,$numero2), $delta);
        }
        else{
            $this->expectException('Exception');
            $calculadora->dividir($numero1, $numero2);
        }
    }
    public function testSameSumar(){
        $calculadora = new calculadora();
        $this->assertSame(6, $calculadora->sumar(3,3));
    }
    public function testGenerarArreglo(){
        $calculadora = new calculadora();
        $this->assertContains(5, $calculadora->GenerarArreglo());
    }
    public function testGenerarArreglo2(){
        $calculadora = new calculadora();
        $this->assertCount(5, $calculadora->GenerarArreglo());
    }
    public function testGenerarArreglo3(){
        $calculadora = new calculadora();
        $this->assertNotEmpty($calculadora->GenerarArreglo());
    }

    public function testCapturarEntradasPermutacion(){
        // Se crea el doble de prueba para la clase Calculadora, método 'capturarEntradasPermutacion'
        $stub = $this->createMock('Calculadora');
        $stub->method('capturarEntradasPermutacion')
            ->willReturn(array(5, 3));

        $this->assertSame(array(5, 3), $stub->capturarEntradasPermutacion());
    }

    public function testCalcularPermutacion(){
        /* Se crea un mock para la clase Calculadora.
         Solo se hace mock al método calcularFactorial*/
         $mock = $this->getMockBuilder('Calculadora')
         ->onlyMethods(array('calcularFactorial'))
         ->getMock();

        /* Se configuran las expectativas para el método calcularFactorial
        se llamará dos veces y devolverá 120 y 6, en cada ocasión, respectivamente. */
        $mock->expects($this->exactly(2))
        ->method('calcularFactorial')
        ->will($this->onConsecutiveCalls(120, 6));

        /* Se hace el assert. */
        $this->assertSame(20, $mock->calcularPermutacion(5, 2));

    }

    public function testComprobarLlamada(){
        $mock = $this->getMockBuilder('Calculadora')
         ->onlyMethods(array('calcularFactorial'))
         ->getMock();
        /*$mock->expects($this->exactly(2))
         ->method('calcularFactorial')
         ->withConsecutive([5], [3]);

         $mock->calcularFactorial(5);
         $mock->calcularFactorial(3);
         */
        /*$mock->expects($this->once())
         ->method('calcularFactorial')
         ->with(5)
         ->will($this->returnValue(120));

        $resultado = $mock->calcularFactorial(5);
        $this->assertEquals(120, $resultado);
        //$mock->calcularFactorial(3);
        $this->assertEquals(5, $resultado);*/

        $mock->expects($this->exactly(2))
         ->method('calcularFactorial')
         ->withConsecutive([5], [3])
         ->will($this->onConsecutiveCalls(120, 6));
         $this->assertEquals(120, $mock->calcularFactorial(5));
         $this->assertEquals(6, $mock->calcularFactorial(3));
    }
}