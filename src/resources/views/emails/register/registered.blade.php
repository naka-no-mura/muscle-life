<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Muscle Life</title>
    </head>
    <body class="antialiased">
        <div>
            <p>アカウント作成完了</p>

            <p>大切に保管してください。</p>

            {{ $user->email }}

            <p>パスワード: ********</p>

            <p>
                ━━━━━━━━━━━━━━━━━━━━━<br>
                このメールアドレスは送信専用となっております。<br>
                返信いただいても対応はいたしかねますのでご了承ください。<br>
                ※このメールに心当たりがない場合は、お手数ですが破棄してください。<br>
                ━━━━━━━━━━━━━━━━━━━━━
            </p>
        </div>
    </body>
</html>
