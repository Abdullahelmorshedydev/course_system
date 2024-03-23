<?php

namespace App\Services\Employees\Setting;

use App\Interfaces\Employees\Setting\FileSettingInterface;

class FileSettingService
{
    private $fileSettingRepoInterface;

    public function __construct(FileSettingInterface $fileSettingRepoInterface)
    {
        $this->fileSettingRepoInterface = $fileSettingRepoInterface;
    }

    public function index()
    {
        return $this->fileSettingRepoInterface->index();
    }

    public function update($data)
    {
        return $this->fileSettingRepoInterface->update($data);
    }
}
