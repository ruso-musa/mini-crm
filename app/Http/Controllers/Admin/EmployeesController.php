<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repo\Employees\IEmployeesRepo;
use App\Repo\Company\ICompanyRepo;


use App\Http\Requests\Admin\Employees\StoreEmployeeRequest;

class EmployeesController extends Controller
{
    private $employee;
    private $company;
    
    public function __construct(IEmployeesRepo $employee, ICompanyRepo $company)
    {
        $this->employee =  $employee;
        $this->company  =  $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employee->orderByDesc('id')->paginate(10);
     
        return view('admin.employees.index',compact('employees'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = $this->company->getAll();
        return view('admin.employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employees = $this->employee->
                 createOrUpdate($request->id,$request->all());

        if(!isset($employees->id)){
            return redirect()->route('admin.employees.index')->with(['success'=>'Employee has changed successfully!']); 
        } 
        
        if(isset($employees->id)){
            return redirect()->route('admin.employees.index')->with(['success'=>'Employee has added successfully!']); 
        } 

        return redirect()->route('admin.employees.index')->withErrors('Employee not changed successfully! Please try again.'); 
         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = $this->company->getAll();

        $employee =  $this->employee->getById($id);
        
        return view('admin.employees.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if($this->employee->delete($id)) 

        return redirect()->route('admin.employees.index')->with(['success','Employee has deleted success!']);

        return redirect()->route('admin.employees.index')->withErrors('error','Employee not deleted! Please try again.');
    }
}
