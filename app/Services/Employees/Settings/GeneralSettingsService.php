<?php

namespace App\Services\Employees;

use App\Repositories\Employee\GeneralSettingsRepository;

class GeneralSettingsService
{
    private $generalSettingsRepository;

    public function __construct(GeneralSettingsRepository $generalSettingsRepository)
    {
        $this->generalSettingsRepository = $generalSettingsRepository;
    }

    public function index()
    {
        return $this->generalSettingsRepository->index();
    }

    public function update($data)
    {
        return $this->generalSettingsRepository->update($data);
    }
}
