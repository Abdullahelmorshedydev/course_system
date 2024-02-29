<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface SettingsInterface
{
    public function index();
    public function update(array $data);
}