<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\FeedbackInterface;
use App\Traits\ApiResponseTrait;

class FeedbackService
{
    use ApiResponseTrait;

    private $feedbackRepoInterface;

    public function __construct(FeedbackInterface $feedbackRepoInterface)
    {
        $this->feedbackRepoInterface = $feedbackRepoInterface;
    }

    public function index()
    {
        return $this->feedbackRepoInterface->index();
    }

    public function store($data)
    {
        return $this->feedbackRepoInterface->store($data);
    }

    public function update($feedback, $data)
    {
        return $this->feedbackRepoInterface->update($feedback, $data);
    }

    public function destroy($feedback)
    {
        return $this->feedbackRepoInterface->destroy($feedback);
    }
}
