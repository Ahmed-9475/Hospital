<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Patient\PatientRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Services\ServicesRepository;
use App\Repository\Ambulance\AmbulanceRepository;
use App\Repository\Insurance\InsuranceRepository;
use App\Interface\Doctors\DoctorRepositoryInterface;
use App\Interface\Patient\PatientRepositoryInterface;
use App\Interface\Sections\SectionRepositoryInterface;
use App\Interface\Services\ServicesRepositoryInterface;
use App\Interface\Ambulance\AmbulanceRepositoryInterface;
use App\Interface\Insurance\InsuranceRepositoryInterface;
use App\Repository\SingleInvoices\SingleInvoicesRepository;
use App\Interface\SingleInvoices\SingleInvoicesRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(ServicesRepositoryInterface::class, ServicesRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(SingleInvoicesRepositoryInterface::class, SingleInvoicesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}