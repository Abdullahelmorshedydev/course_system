<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface FeedbackInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $feedback, array $data);
    public function destroy(Model $feedback);
}