<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface MajorInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $location, array $data);
    public function destroy(Model $location);
}