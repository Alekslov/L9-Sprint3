<?php declare(strict_types=1);

use Controller\EmployeeController;
use Model\Employee;
use PHPUnit\Framework\TestCase; 
use Repository\EmployeeRepository;
use function PHPUnit\Framework\assertEquals;



class EmployeeContollerTest extends TestCase {
    public function test1() {
        // given
        // $employeeRepository = new EmployeeRepository()); 
        $stub = $this->createStub(EmployeeRepository::class);
        $stub->method('getAll')->willReturn(array(new Employee(1, "Jonas"), new Employee(2, "Petras")));

        $employeeController = new EmployeeController($stub);
        // when
        $res = $employeeController->getAllJsonWithMetaInformation();
        // then ... turime pakeisti realiais duomenimis iš duomenų bazės!
        assertEquals('[{"id":1,"name":"Jonas"},{"id":2,"name":"Petras"}], count: 2', $res);
        

    }
}