<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\Hash;
use App\Models\Lienhe;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Skip if running in console (migrations, commands)
        if ($this->app->runningInConsole()) {
            return;
        }

        $admin = Taikhoan::where('VaiTro', 'admin')->first();

        if (!$admin) {

            Taikhoan::create([
                'UserID' => 99999,
                'MatKhau' => Hash::make('admin123'),
                'VaiTro' => 'admin'
            ]);

            echo "Admin default created: 99999 / admin123";
        }
    }
}
