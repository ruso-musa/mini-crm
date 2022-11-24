<?php
namespace App\Repo\Employees;

use App\Repo\Employees\IEmployeesRepo;
use App\Models\Employees;

class EmployeesRepo implements IEmployeesRepo{

    protected $employee = null;

    public function __construct(){
        $this->employee = Employees::query();
    }
   

    public function getAll()
    {
        return  $this->employee->all();
    }

    public function paginate($count)
    {
        return $this->employee->paginate($count);
    }


    public function getById($id)
    {
        return $this->employee->find($id);
    }


    public function orderByDesc($column)
    {
        $this->employee = $this->employee->orderBy($column,'DESC');

        return $this;
    }


    public function orderByAsc($column){
        $this->employee = $this->employee->orderBy($column,'ASC');

        return $this;
    }


    public function whereIn($column,$array =[]){
        $this->employee = $this->employee->whereIn($column, $array);

        return $this;
    }
    

    public function with(...$relation){
        $this->employee = $this->employee->with(...$relation);

        return $this;
    }


    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $employee = new Employees;
            $employee->company_id = $collection['company_id'];
            $employee->name = $collection['name'];
            $employee->lastname = $collection['lastname'];
            $employee->email = $collection['email'];
            $employee->phone = $collection['phone'];
            return $employee->save();
        }
            $employee = Employees::find($id);
            $employee->company_id = $collection['company_id'];
            $employee->name = $collection['name'];
            $employee->lastname = $collection['lastname'];
            $employee->email = $collection['email'];
            $employee->phone = $collection['phone'];
        return $employee->save();
    }

    


    public function delete($id)
    {
        return Employees::find($id)->delete();
    }

}