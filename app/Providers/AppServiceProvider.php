<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Taikhoan;
use App\Models\Giangvien;
use App\Models\Nghiencuusinh;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
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

        if (!Session::has('UserID') && Cookie::has('remember_user')) {

        $user = Taikhoan::where('UserID', Cookie::get('remember_user'))->first();

        if ($user) {
            Session::put('UserID', $user->UserID);
            Session::put('VaiTro', $user->VaiTro);

            if ($user->VaiTro == 'giangvien') {
                $gv = Giangvien::where('UserID', $user->UserID)->first();
                Session::put('HoTen', $gv->HoTen);
            }

            if ($user->VaiTro == 'nghiencuusinh') {
                $sv = Nghiencuusinh::where('UserID', $user->UserID)->first();
                Session::put('HoTen', $sv->HoTen);
            }

            if ($user->VaiTro == 'admin') {
                Session::put('HoTen', 'Admin');
            }
        }
    }
    }
}
