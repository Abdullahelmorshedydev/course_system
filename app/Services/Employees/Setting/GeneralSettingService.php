<?php

namespace App\Services\Employees\Setting;

use App\Interfaces\Employees\Setting\GeneralSettingInterface;

class GeneralSettingService
{
    private $generalSettingRepoInterface;

    public function __construct(GeneralSettingInterface $generalSettingRepoInterface)
    {
        $this->generalSettingRepoInterface = $generalSettingRepoInterface;
    }

    public function index()
    {
        return $this->generalSettingRepoInterface->index();
    }

    public function update($data)
    {
        return $this->generalSettingRepoInterface->update($data);
    }
}
