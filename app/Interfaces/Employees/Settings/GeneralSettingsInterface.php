<?php 

namespace App\Interfaces\Employees\Settings;

use Illuminate\Database\Eloquent\Model;

interface GeneralSettingsInterface
{
    public function index();
    public function update(array $data);
}