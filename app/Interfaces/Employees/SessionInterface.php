<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface SessionInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $session, array $data);
    public function destroy(Model $session);
}