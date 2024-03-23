<?php 

namespace App\Interfaces\Employees\Setting;

use Illuminate\Database\Eloquent\Model;

interface FileSettingInterface
{
    public function index();
    public function update(array $data);
}