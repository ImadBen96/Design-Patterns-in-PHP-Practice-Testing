<?php

namespace Creational\POOL;

class Car
{

    private  $rentAt;

    public function __construct()
    {
        $this->rentAt = new \DateTime();
    }

    public  function  moveCar(){
        return "car is moving ";
    }

}