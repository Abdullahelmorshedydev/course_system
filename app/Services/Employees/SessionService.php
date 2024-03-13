<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\SessionInterface;

class SessionService
{
    private $sessionRepoInterface;

    public function __construct(SessionInterface $sessionRepoInterface)
    {
        $this->sessionRepoInterface = $sessionRepoInterface;
    }

    public function index()
    {
        return $this->sessionRepoInterface->index();
    }

    public function store($data)
    {
        return $this->sessionRepoInterface->store($data);
    }

    public function update($session, $data)
    {
        return $this->sessionRepoInterface->update($session, $data);
    }

    public function destroy($session)
    {
        return $this->sessionRepoInterface->destroy($session);
    }
}
