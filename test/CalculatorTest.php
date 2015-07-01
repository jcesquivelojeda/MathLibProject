<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/06/15
 * Time: 11:07 AM
 */

require_once __DIR__ . '/../src/Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {

    private $calculator;

    public function setup()
    {
        $this->calculator = new Calculator();
    }

    function testItCanAddTwoNumbers(){

        $this->setParameters(1,1);
        $expectedSum = 2;
        $this->assertEquals($expectedSum, $this->calculator->add());

    }

    function testItCanTellIfTwoNumbersAreDivisible(){
        $this->setParameters(1,1);
        $this->assertTrue($this->calculator->isDivisible());
    }

    function testItCanTellIfTwoNumbersAreNotDivisible(){
        $this->setParameters(5,2);
        $this->assertFalse($this->calculator->isDivisible());
    }

    function testItCanTellTheSum(){
        $this->setParameters(1,1);
        $expectedSum = 2;

        $result = $this->calculator->tellmeTheSum();
        //$this->assertEquals('La suma de 1 mas 1 es 2',$result);
        //$this->assertContains('suma',$result);
        //$this->assertContains("$this->calculator->op1",$result);
        //$this->assertContains("$this->calculator->op2",$result);
        //$this->assertContains("$expectedSum",$result);

        $this->assertRegExp('/^.*sum.*1.*1.*2/',$result);

    }

    public function tearDown()
    {
        unset($this->calculator);
    }

    private function setParameters($op1,$op2)
    {
        $this->calculator->op1 = $op1;
        $this->calculator->op2 = $op2;
    }


}
 