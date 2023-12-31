<?php

use Creational\POOL\Car;
use Creational\POOL\CarPool;

class PoolTest extends  \PHPUnit\Framework\TestCase
{
    private  $carPool;

    protected function setUp() :void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->carPool = new CarPool();
    }



    public  function  testCanRentCar()
    {
        $myCar = $this->carPool->rentCar();
       // var_dump($myCar);
       // ob_flush();
        $this->assertInstanceOf( Car::class , $myCar);
        $this->assertEquals(1,$this->carPool->getReport());
    }

    public  function  testCanFreeCar() {
        $myCar = $this->carPool->rentCar();
        $myCar2 = $this->carPool->rentCar();
        $this->assertEquals(0, $this->carPool->getFreeCount());

        $this->carPool->freeCar($myCar);
        $this->assertEquals(2,$this->carPool->getReport());
        $this->assertEquals(1, $this->carPool->getFreeCount());

    }

}