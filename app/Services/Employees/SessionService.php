<?php

namespace App\Services\Employees;

use App\Traits\ApiResponseTrait;
use App\Repositories\Employee\SessionRepository;

class SessionService
{
    use ApiResponseTrait;

    private $sessionRepository;

    public function __construct(SessionRepository $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }

    public function index()
    {
        return $this->sessionRepository->index();
    }

    public function store($data)
    {
        return $this->sessionRepository->store($data);
    }

    public function update($session, $data)
    {
        return $this->sessionRepository->update($session, $data);
    }

    public function destroy($session)
    {
        return $this->sessionRepository->destroy($session);
    }
}
