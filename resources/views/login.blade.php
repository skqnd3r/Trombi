<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../picture/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script type="text/javascript" src="login.js"></script> --}}
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <img src="../picture/EtnaLogo.png">
        <div class="connect">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input name="email" placeholder="login ETNA"></input>
                <input name="password" type="password" placeholder="mot de passe"></input>
                @if ($errors->has('password'))
                    <p class="erreur">{{ $errors->first('password') }}</p>
                @endif
                @if (\Session::has('error'))
                    <div class="erreur">{{ Session::get('error') }}</div>
                @endif
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</body>

</html>
