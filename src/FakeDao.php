<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 29/06/15
 * Time: 05:27 PM
 */

require_once 'DbAccess.php';
class FakeDao implements DbAccess{
    private $data = [];

    function insert($value){
        $this->data[] =$value;
    }

    function selectAll(){
        return $this->data;
    }
} 