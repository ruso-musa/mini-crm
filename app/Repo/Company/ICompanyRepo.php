<?php
namespace App\Repo\Company;

interface ICompanyRepo{

    public function getAll();

    public function getById($id);

    public function paginate($count);

    public function createOrUpdate($id = null, $collection = []);

    public function delete($id);
}