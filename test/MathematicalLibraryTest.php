<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/06/15
 * Time: 01:03 PM
 */

require_once __DIR__ . '/../src/Calculator.php';
require_once __DIR__.'/../src/MathematicalLibrary.php';
require_once __DIR__.'/../src/Display.php';
require_once __DIR__.'/../src/RealDao.php';
require_once __DIR__.'/../src/FakeDao.php';

class MathematicalLibraryTest extends PHPUnit_Framework_TestCase {


    public function testitCanDouble()
    {
        $mathLib = new MathematicalLibrary(new Calculator(), new Display());
        $this->assertEquals(4,$mathLib->double(2));
    }

    public function testitCanDoubleWithDummyObject()
    {
        $mathLib = new MathematicalLibrary(new Calculator(), new DummyDisplay());
        $this->assertEquals(4,$mathLib->double(2));
    }


    public function testItCanTellIfANumberIsEvenWithStubTest()
    {
        $mathLib = new MathematicalLibrary(new StubCalculator(), new Display());
        $this->assertTrue($mathLib->isSumEven(1,1));

    }



    public function testItCanTellIfANumberIsEvenWithMockObject()
    {
        $myMock = \Mockery::mock('Calculator');
        $myMock->shouldReceive('add')->andReturn(2);
        $mathLib = new MathematicalLibrary($myMock, new Display());
        $this->assertTrue($mathLib->isSumEven(1,1));

    }

    public function testItCanDisplayTripleWithSpyTest(){
        $spyDisplay = new SpyDisplay();
        $mathLib = new MathematicalLibrary(new Calculator(), $spyDisplay);
        $mathLib->displayTriple(3);
        $this->assertEquals(9,$spyDisplay->getShownValue());

    }

    public function testItCanDisplayTripleWithMockObject(){
        $spyDisplay = \Mockery::mock('Display');
        $mathLib = new MathematicalLibrary(new Calculator(), $spyDisplay);
        $spyDisplay->shouldReceive('show')->once()->with(9);
        $mathLib->displayTriple(3);
        \Mockery::close();

    }

    public function testItCanDoubleAndSaveWithFakeObject()
    {
        //$dao = new RealDao();
        $dao = new FakeDao();
        $mathLibrary = new MathematicalLibrary(new Calculator(),new DummyDisplay(),$dao);
        $mathLibrary->DoubleAndSave(2);
        $this->assertEquals(4,$dao->selectAll()[0]);

    }



    //Test Double
    //Dummy object
    //Test stubs
    //Test spy
    //Mock Objects
    //Fake Objects

}
//Dummy object class
class DummyDisplay extends Display{

    function __contruct(){
        return;
    }

}

//Test stubs class
class StubCalculator extends Calculator{
    function add(){
        return 2;
    }
}

//spy test class
class SpyDisplay extends Display{

    private $shownValue;

    /**
     * @return mixed
     */
    public function getShownValue()
    {
        return $this->shownValue;
    }

    function __construct(){
        return;
    }

    function show($value){
        $this->shownValue =$value;
    }
}