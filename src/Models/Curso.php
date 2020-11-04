<?php 

namespace Cursos\Models;

class Curso {

    private $name;
    private $description;
    private $time;
    private $id;

    public function __construct(String $id,String $name,String $description, String $time)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->time = $time; 
    }
    public function asArray(){
        return array(
            "id"=>$this->id,
            "name"=>$this->name,
            "description"=>$this->description,
            "time"=>$this->time
        );
    }

    public function getName(){
        return $this->name;
    }   
    public function getDescription(){
        return $this->description;
    }
    public function getTime(){
        return $this->time;
    }
    public function getId(){
        return $this->id;
    }
}