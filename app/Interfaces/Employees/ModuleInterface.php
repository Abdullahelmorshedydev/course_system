<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface ModuleInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $object, array $data);
    public function destroy(Model $object);
}