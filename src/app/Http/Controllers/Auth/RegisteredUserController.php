<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\PreRegisterEmailVerificationRequest;
use App\Http\Requests\Register\VerifyAuthCodeRequest;
use App\Mail\PreRegisterEmailVerification;
use App\Models\EmailVerification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * 認証コードをメールで送信
     *
     * @param PreRegisterEmailVerificationRequest $request
     * @return Response
     */
    public function preRegisterEmailVerification(PreRegisterEmailVerificationRequest $request): Response
    {
        // 6桁の認証コード生成
        $auth_code = null;

        while ($auth_code === null) {
            $tmp_auth_code = (int)str_pad(mt_rand(0, 999999), 6, 0, STR_PAD_LEFT);
            $count = EmailVerification::where('auth_code', $tmp_auth_code)->count();

            // ダブっていなければ認証コードとして採用
            if ($count == 0) {
                $auth_code = $tmp_auth_code;
            }
        }

        // 有効期限は1時間
        $dt = (new Carbon('+ 1 hour'));
        $expiration_datetime = (new Carbon('+ 1 hour'))->format('Y/m/d H:i');

        $emailVerification = new EmailVerification();
        $emailVerification->auth_code = $auth_code;
        $emailVerification->email     = $request->email;
        $emailVerification->expire_at = $dt;
        $emailVerification->save();

        // 認証コードをメール送信
        Mail::to($request->email)->send(new PreRegisterEmailVerification($auth_code, $expiration_datetime));

        return Inertia::render('Auth/AuthCode');
    }

    /**
     * 認証コードの有効性確認
     *
     * @return Response
     */
    public function verifyAuthCode(VerifyAuthCodeRequest $request): Response
    {
        // 使用済みにする
        $emailVerification = EmailVerification::where('auth_code', $request->auth_code)->first();
        $emailVerification->is_used = 1;
        $emailVerification->save();

        return Inertia::render('Auth/Register');
    }

    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
