<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="../picture/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Trombinoscope</title>
</head>

<body onload="set_theme()">
    <header role="header">
        <nav class="menu" role="navigation">
            <div class="inner">
                <div class="m-left" style="color:white;">
                    <a href="{{ route('trombi') }}">
                        <h1 class="logo" style="color:white;">ETNA</h1>
                    </a>
                        <nav>
                            <ul>
                                <li class="menu-deroulant">
                                    <a style="color:white;">Services</a>
                                    <ul class="sous-menu">
                                        <li><a href="{{ route('service','Direction') }}">Direction</a></li>
                                        <li><a href="{{ route('service','Pedagogique') }}">Pedagogique</a></li>
                                        <li><a href="{{ route('service','Administratif') }}">Administratif</a></li>
                                        <li><a href="{{ route('service','Relations Entreprise') }}">Relations Entreprise</a></li>
                                        <li><a href="{{ route('service','Admissions') }}">Admissions</a></li>
                                        <li><a href="{{ route('service','BLU') }}">BLU</a></li>
                                        <li><a href="{{ route('service','Studio') }}">Studio</a></li>
                                        <li><a href="{{ route('service','RH Office Management') }}">RH et Office Management</a></li>
                                    </ul>
                            </li>
                        </ul>
                    </nav>
                    @super
                    <a onclick="admin()"><i class="fas fa-plus fa-2x" style="color:white; margin-top:   5%;"></i></a>
                    @endsuper
                    <form class="deco" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="deco" style="background:0; border:0;"><i class="fas fa-sign-out-alt fa-2x" style="color:white; margin-top:25%;"></i></button>
                    </form>
                    <a onclick="changeColor();" class="image_button"><img src="../picture/moon.png" style="width:50px;"></a>
                </div>
                <div class="m-right">
                </div>
                <div class="m-nav-toggle">
                    <span class="m-toggle-icon"></span>
                </div>
            </div>
        </nav>
    </header>

    <div class="ecran">
        <div class="left">
            <div class="recherche">
                <input type="text" name="search" id="barre" onkeyup="search()" placeholder="Faire une recherche"> <i
                class="fas fa-search" style="color:white;"></i>
            </div>
            <div class="photo">
                @foreach ($users as $user)
                    <a onclick="profiler(`{{ $user->login }}`)">

                        <div class="student">
                            <div hidden>
                                {{ strtoupper($user->nom) }}{{ strtolower($user->nom) }}{{ $user->nom }}
                                {{ strtoupper($user->prenom) }}{{ strtolower($user->prenom) }}{{ $user->prenom }}
                                {{ strtoupper($user->tags) }}{{ strtolower($user->tags) }}{{ $user->tags }}
                                {{ strtoupper($user->service) }}{{ strtolower($user->service) }}{{ $user->service }}
                            </div>
                            <img src="https://auth.etna-alternance.net/api/users/{{ $user->login }}/photo"
                                style="width:100px;">
                            <h4>{{ $user->login }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="right">
            <iframe id="profilediv" src="" width="100%" height="100%" frameBorder="0" sandbox="allow-scripts allow-same-origin allow-forms allow-top-navigation" >
                <p></p>
            </iframe>
        </div>
    </div>
</body>

</html>
