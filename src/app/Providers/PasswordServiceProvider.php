<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class PasswordServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * パスワードのルール
     * 文字・数字を含む8文字以上
     */
    public function boot(): void
    {
        Password::defaults(function() {
            return Password::min(8)
                        ->letters()
                        ->numbers()
                        ->uncompromised();
        });
    }
}
