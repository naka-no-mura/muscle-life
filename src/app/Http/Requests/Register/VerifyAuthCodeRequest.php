<?php

namespace App\Http\Requests\Register;

use App\Models\EmailVerification;
use Carbon\Carbon;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class VerifyAuthCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'auth_code' => [
                'required',
                'string', // 先頭文字の0が消えないようにするためにstring
                'size:6',
                'exists:email_verifications,auth_code',

                function (string $attribute, mixed $value, Closure $fail) {
                    $emailVerification = EmailVerification::select(['is_used', 'expire_at'])->where('auth_code', $value)->first();

                    if ($emailVerification) {
                        // 使用済みか
                        if ($emailVerification->is_used === 1) {
                            $fail('この認証コードはすでに利用されています。発行しなおしてください。');
                        }

                        // 有効期限切れか
                        if ((Carbon::now())->gt($emailVerification->expire_at)) {
                            $fail('認証コードが有効期限切れです。発行しなおしてください。');
                        }
                    }
                },
            ]
        ];
    }
}
