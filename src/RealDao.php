<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/06/15
 * Time: 05:13 PM
 */

require_once 'DbAccess.php';

class RealDao implements DbAccess{
    private $data = [];

    function insert($value){
        sleep(1);
        $this->data[] =$value;
    }

    function selectAll(){
        sleep(1);
        return $this->data;
    }

} 