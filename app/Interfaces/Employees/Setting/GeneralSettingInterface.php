<?php 

namespace App\Interfaces\Employees\Setting;

use Illuminate\Database\Eloquent\Model;

interface GeneralSettingInterface
{
    public function index();
    public function update(array $data);
}