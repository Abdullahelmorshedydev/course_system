<?php

namespace App\Repositories\Employee;

use App\Interfaces\Employees\FeedbackInterface;
use App\Models\Feedback;

class FeedbackRepository implements FeedbackInterface
{
    public function index()
    {
        return Feedback::paginate();
    }

    public function store($data)
    {
        return Feedback::create($data);
    }

    public function update($feedback, $data)
    {
        $feedback->update($data);
        return $feedback;
    }

    public function destroy($feedback)
    {
        return $feedback->delete();
    }
}
