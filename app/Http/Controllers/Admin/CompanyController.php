<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Repo\Company\ICompanyRepo;
use App\Http\Controllers\Controller;
use App\Repo\Employees\IEmployeesRepo;
use App\Http\Requests\Admin\Company\StoreCompanyRequest;
use App\Http\Requests\Admin\Company\UpdateCompanyRequest;

class CompanyController extends Controller
{
    private $companies = [];

    public function __construct(ICompanyRepo $company)
    {
        $this->companies  =  $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->companies->orderByDesc('id')->paginate(10);
     
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $companies = $this->companies->
        createOrUpdate($request->id, $request);
        

        if(isset($this->companies->id)){
           return redirect()->route('admin.companies.index')->with(['success'=>'Company has changed successfully!']); 
        } 

        if(!isset($this->companies->id)){
          return redirect()->route('admin.companies.index')->with(['success'=>'Company has added successfully!']); 
        } 

          return redirect()->route('admin.companies.index')->withErrors('Company not changed successfully! Please try again.');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companies->getById($id);

        
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->companies->delete($id)) 

        return redirect()->route('admin.companies.index')->with(['success','Company has deleted success!']);

        return redirect()->route('admin.companies.index')->withErrors('error','Company not deleted! Please try again.');
    }
}
