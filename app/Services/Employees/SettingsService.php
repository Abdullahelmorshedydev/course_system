<?php

namespace App\Services\Employees;

use App\Repositories\Employee\SettingsRepository;

class SettingsService
{
    private $settingsRepository;

    public function __construct(SettingsRepository $settingsRepository)
    {
        $this->settingsRepository = $settingsRepository;
    }

    public function index()
    {
        return $this->settingsRepository->index();
    }

    public function update($data)
    {
        return $this->settingsRepository->update($data);
    }
}
