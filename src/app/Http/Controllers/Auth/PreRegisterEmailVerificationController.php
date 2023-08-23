<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\PreRegisterEmailVerificationRequest;
use App\Http\Requests\Register\VerifyAuthCodeRequest;
use App\Mail\PreRegisterEmailVerification;
use App\Models\EmailVerification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;

class PreRegisterEmailVerificationController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/AuthCode');
    }

    /**
     * 認証コードをメールで送信
     *
     * @param PreRegisterEmailVerificationRequest $request
     * @return Response
     */
    public function store(PreRegisterEmailVerificationRequest $request): Response
    {
        // 6桁の認証コード生成
        $auth_code = null;

        while ($auth_code === null) {
            $tmp_auth_code = (int)str_pad(mt_rand(0, 999999), 6, 0, STR_PAD_LEFT);

            // ダブっていなければ認証コードとして採用
            if (!$is_existence = EmailVerification::where('auth_code', $tmp_auth_code)->exists()) {
                $auth_code = $tmp_auth_code;
            }
        }

        // 有効期限は1時間
        $dt = new Carbon('+ 1 hour');

        $emailVerification = new EmailVerification();
        $emailVerification->auth_code = $auth_code;
        $emailVerification->email     = $request->email;
        $emailVerification->expire_at = $dt;
        $emailVerification->save();

        // 認証コードをメール送信
        Mail::to($request->email)->send(new PreRegisterEmailVerification($auth_code, $dt->format('Y/m/d H:i')));

        return Inertia::render('Auth/AuthCode');
    }

    /**
     * 認証コードの有効性確認
     *
     * @return Response
     */
    public function update(VerifyAuthCodeRequest $request): Response
    {
        // 使用済みにする
        $emailVerification = EmailVerification::where('auth_code', $request->auth_code)->first();
        $emailVerification->is_used = 1;
        $emailVerification->save();

        return Inertia::render('Auth/Register');
    }
}
