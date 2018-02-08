<?php

//This is the program class
class Program{

    private $name = '';
    private $size = 0;
    private $parent_name = null; //You can use parent id if you wish
    private $children = null;

    function __construct($_name = '', $_size = 0, $_parent_name = null, $_children = null){
        $this->name = $_name;
        $this->size = $_size;
        $this->parent_name = $_parent_name;
        $this->children = $_children;
    }

    public function setName($_name){
        $this->name = $_name;
    }

    public function getName(){
        return $this->name;
    }

    public function setSize($_size){
        $this->name = $_name;
    }

    public function getSize(){
        return $this->size;
    }

    public function setParentName($_parent_name){
        $this->parent_name = $_parent_name;
    }

    public function getParentName(){
        return $this->parent_name;
    }

    public function setChildren($_children = null){
        $this->children = $_children;
    }

    public function getChildren(){
        return $this->children;
    }

}

?>