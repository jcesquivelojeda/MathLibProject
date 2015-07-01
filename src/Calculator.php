<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/06/15
 * Time: 11:06 AM
 */
Class Calculator{
    public $op1;
    public $op2;

    function  add(){
        return $this->op1 + $this->op2;
}

    function isDivisible(){
        return $this ->op1 % $this->op2 == 0;
    }

    function tellmeTheSum(){
        return "La suma de ".$this->op1 .' mas '.$this->op2 .' es '.$this->add();
    }
}