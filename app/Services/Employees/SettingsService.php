<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\SettingsInterface;

class SettingsService
{
    private $settionsRepoInterface;

    public function __construct(SettingsInterface $settionsRepoInterface)
    {
        $this->settionsRepoInterface = $settionsRepoInterface;
    }

    public function index()
    {
        return $this->settionsRepoInterface->index();
    }

    public function update($data)
    {
        return $this->settionsRepoInterface->update($data);
    }
}
