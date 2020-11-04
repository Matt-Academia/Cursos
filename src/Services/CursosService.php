<?php
namespace Cursos\Services;
use \Cursos\Models\Curso;
use \Cursos\DB\StorageInterface;

class CursosService {

    /**
     * @var StorageInterface
     */
    private $db;

    private static $schema = 'cursos';

    public function __construct(StorageInterface $db) {
        $this->db = $db;
    }


    public function register(String $name,String $description,String $time){
        $id = time().rand();
        $curso = new Curso($id,$name,$description,$time);
        $this->db->save(self::$schema,$curso->asArray());
        return $curso;
    }
    public function findOne(String $idCurso){
        $conditions = array(
            new \Cursos\DB\Condition('id', '=', $idCurso)
        );
        $d = $this->db->findOne(self::$schema, $conditions);        
            
        $out = new Curso($d['id'], $d['name'], $d['description'],$d['time']);
        
        return $out;
    }
}