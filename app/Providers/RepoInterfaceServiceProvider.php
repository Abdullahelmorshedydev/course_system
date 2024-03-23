<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Employees\RoleInterface;
use App\Interfaces\Employees\TaskInterface;
use App\Interfaces\Employees\GroupInterface;
use App\Interfaces\Employees\MajorInterface;
use App\Interfaces\Employees\CourseInterface;
use App\Repositories\Employee\RoleRepository;
use App\Repositories\Employee\TaskRepository;
use App\Interfaces\Employees\SessionInterface;
use App\Repositories\Employee\GroupRepository;
use App\Repositories\Employee\MajorRepository;
use App\Interfaces\Employees\EmployeeInterface;
use App\Interfaces\Employees\FeedbackInterface;
use App\Interfaces\Employees\LocationInterface;
use App\Repositories\Employee\CourseRepository;
use App\Repositories\Employee\SessionRepository;
use App\Interfaces\Employees\AttendanceInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Employee\FeedbackRepository;
use App\Repositories\Employee\LocationRepository;
use App\Repositories\Employee\AttendanceRepository;
use App\Interfaces\Employees\Setting\FileSettingInterface;
use App\Interfaces\Employees\Setting\LinkSettingInterface;
use App\Repositories\Employee\Setting\FileSettingRepository;
use App\Repositories\Employee\Setting\LinkSettingRepository;
use App\Interfaces\Employees\Setting\GeneralSettingInterface;
use App\Repositories\Employee\Setting\GeneralSettingRepository;

class RepoInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskInterface::class, TaskRepository::class);
        $this->app->bind(GeneralSettingInterface::class, GeneralSettingRepository::class);
        $this->app->bind(LinkSettingInterface::class, LinkSettingRepository::class);
        $this->app->bind(FileSettingInterface::class, FileSettingRepository::class);
        $this->app->bind(SessionInterface::class, SessionRepository::class);
        $this->app->bind(MajorInterface::class, MajorRepository::class);
        $this->app->bind(LocationInterface::class, LocationRepository::class);
        $this->app->bind(GroupInterface::class, GroupRepository::class);
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(AttendanceInterface::class, AttendanceRepository::class);
        $this->app->bind(FeedbackInterface::class, FeedbackRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
