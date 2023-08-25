<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Muscle Life</title>
    </head>
    <body class="antialiased">
        <div>
            <p>この度はMuscle Lifeをダウンロードいただき誠にありがとうございます。</p>

            <p>認証コードは以下になります。</p>
            <p>アプリに入力の上、登録を進めてください。</p>

            {{ $auth_code }}

            <p>有効期限は {{ $expiration_datetime }} までです。</p>

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
