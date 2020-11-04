<?php   
namespace Tests\Services;

use Cursos\DB\MemoryStorage;

use function PHPUnit\Framework\assertEquals;

/* - CursosService
    register(nombre, descripcion, duracion) : Curso
    update(Curso) : Curso
    findOne(idCurso) : Curso
    findAll() : Curso[] */

    

final class CursosServiceTest extends \PHPUnit\Framework\TestCase{

    protected function setUp(): void
    {
        $storage = new MemoryStorage;
        $this->cursoservice = new \Cursos\Services\CursosService($storage);
        
    }


    public function testRegister(){
        
        $result = $this->cursoservice->register("curso","descripcion1","1h");
        $this->assertInstanceOf(\Cursos\Models\Curso::class,$result);
    }

    public function testRegisterGetAndOne(){
        
        $result = $this->cursoservice->register("curso3","descripcion3","3h");
        $this->assertEquals("curso3",$result->getName());
        $this->assertEquals("descripcion3",$result->getDescription());
        $this->assertEquals("3h",$result->getTime());
    }
    public function testRegister2Cursos(){
        
        $result1 = $this->cursoservice->register("curso1","descripcion1","4h");
        $result2 = $this->cursoservice->register("curso2","descripcion2","5h");
        $this->assertEquals("curso1",$result1->getName());
        $this->assertEquals("descripcion1",$result1->getDescription());
        $this->assertEquals("4h",$result1->getTime());
        $this->assertEquals("curso2",$result2->getName());
        $this->assertEquals("descripcion2",$result2->getDescription());
        $this->assertEquals("5h",$result2->getTime());
    }
    public function testFindOneInstance(){
        $registro = $this->cursoservice->register("curso1","descripcion1","4h");
        $result = $this->cursoservice->findOne($registro->getId());
        $this->assertInstanceOf(\Cursos\Models\Curso::class,$result);
    }
    public function testFindOne(){
        $registro = $this->cursoservice->register("curso1","descripcion1","4h");
        $find = $this->cursoservice->findOne($registro->getId());
        $this->assertEquals("curso1",$find->getName());
        $this->assertEquals("descripcion1",$find->getDescription());
        $this->assertEquals("4h",$find->getTime());
    }
    public function testFindOneWith2(){
        $registro1 = $this->cursoservice->register("curso1","descripcion1","4h");
        $registro2 = $this->cursoservice->register("curso2","descripcion2","5h");
        $find1 = $this->cursoservice->findOne($registro1->getId());
        $find2 = $this->cursoservice->findOne($registro2->getId());
        $this->assertEquals("curso1",$find1->getName());
        $this->assertEquals("descripcion1",$find1->getDescription());
        $this->assertEquals("4h",$find1->getTime());
        $this->assertEquals("curso2",$find2->getName());
        $this->assertEquals("descripcion2",$find2->getDescription());
        $this->assertEquals("5h",$find2->getTime());
    }
 

}