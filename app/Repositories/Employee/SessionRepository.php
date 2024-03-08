<?php

namespace App\Repositories\Employee;

use App\Interfaces\Employees\SessionInterface;
use App\Models\Session;

class SessionRepository implements SessionInterface
{
    public function index()
    {
        return Session::paginate();
    }

    public function store($data)
    {
        return Session::create($data);
    }

    public function update($session, $data)
    {
        $session->update($data);
        return $session;
    }

    public function destroy($session)
    {
        return $session->delete();
    }
}
