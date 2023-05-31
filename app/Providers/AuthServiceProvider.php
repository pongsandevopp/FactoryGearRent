<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('access-admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('access-search', function ($user) {
            // เพิ่มโค้ดตรวจสอบสิทธิ์ในการเข้าถึงเมนู search ที่นี่
            // ตัวอย่างเช่น:
            return $user->role === 'admin' || $user->role === 'user';
        });
    }
}
