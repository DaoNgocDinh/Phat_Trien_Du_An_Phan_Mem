<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\Hash;

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
