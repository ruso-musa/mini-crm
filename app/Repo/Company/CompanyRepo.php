<?php
namespace App\Repo\Company;

use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Repo\Company\ICompanyRepo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyRepo implements ICompanyRepo{

    protected $company;
    public $wasRecentlyCreated;



    public function __construct(){
        $this->company = Company::query();
        
    }
   

    public function getAll()
    {
        return $this->company->get();
    }

    public function getById($id)
    {
        return $this->company->find($id);
    }

    public function paginate($count){
        return $this->company->paginate($count);
    }

    public function orderByDesc($column)
    {
        $this->company = $this->company->orderBy($column,'DESC');

        return $this;
    }


    public function orderByAsc($column){
        $this->company = $this->company->orderBy($column,'ASC');

        return $this;
    }


    public function whereIn($column,$array =[]){
        $this->company = $this->company->whereIn($column, $array);

        return $this;
    }
    

    public function with(...$relation){
        $this->company = $this->company->with(...$relation);

        return $this;
    }


    public function createOrUpdate( $id = null, $collection = [])
    {   
        if(is_null($id)) {
            $company = new Company;

            $company->name = $collection['name'];
            $company->email = $collection['email'];
            $company->website = $collection['website'];
        

            if(!empty($collection->file)){
                $path = $collection->file->storeAs('public/'.Str::slug($collection['name']), $collection['name'].".".$collection->file->extension());

                 $company->logotype = $path;
            }
            
            return $company->save();
           }
            $company = $this->getById($id);

            $company->name = $collection['name'];
            $company->email = $collection['email'];
            $company->website = $collection['website'];
            
            if(!empty($collection->file)){
                $path = $collection->file->storeAs('public/'.Str::slug($collection['name']), $collection['name'].".".$collection->file->extension());

                 $company->logotype = $path;
            }

        return $company->save();
    }


    public function delete($id)
    {
        $company =  $this->company->find($id);

        if(File::exists(storage_path('app/'.$company->logotype))){
            File::delete(storage_path('app/'.$company->logotype));
            File::deleteDirectory(storage_path('app/public/'.Str::slug($company->name)));
        }
        $company->delete();
    }

}