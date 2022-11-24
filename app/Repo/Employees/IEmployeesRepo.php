<?php
namespace App\Repo\Employees;

interface IEmployeesRepo{

    public function getAll();

    public function paginate($count);

    public function getById($id);

    public function createOrUpdate($id = null, $collection = []);

    public function delete($id);

    public function orderByDesc($column);

    public function orderByAsc($column);

    public function whereIn($column,$array = []);

    public function with(...$relation);
 
    
}