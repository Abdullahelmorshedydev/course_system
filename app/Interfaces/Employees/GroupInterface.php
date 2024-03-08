<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface GroupInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $group, array $data);
    public function destroy(Model $group);
}