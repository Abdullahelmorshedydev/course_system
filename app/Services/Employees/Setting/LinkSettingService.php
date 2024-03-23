<?php

namespace App\Services\Employees\Setting;

use App\Interfaces\Employees\Setting\LinkSettingInterface;

class LinkSettingService
{
    private $linkSettingRepoInterface;

    public function __construct(LinkSettingInterface $linkSettingRepoInterface)
    {
        $this->linkSettingRepoInterface = $linkSettingRepoInterface;
    }

    public function index()
    {
        return $this->linkSettingRepoInterface->index();
    }

    public function update($data)
    {
        return $this->linkSettingRepoInterface->update($data);
    }
}
