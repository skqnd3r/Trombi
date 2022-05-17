<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/profile.css">
    <script type="text/javascript" src="../js/script.js"></script>
</head>

<body>
    <button onclick="closeprofiler()" class="retour" style="background: none; border: 0; position:absolute; margin-left:90%;"><i class="far fa-times-circle fa-2x"></i></button>
    <div class="photo">
        <img src="https://auth.etna-alternance.net/api/users/{{ $user->login }}/photo">
    </div>
    <div class="background">
        <div class="profile">
            <label>Login: {{ $user->login }}</label>
            <label>Nom: {{ $user->nom }}</label>
            <label>Prénom: {{ $user->prenom }}</label>
            @if ($user->email != null)
                <label>Email: {{ $user->email }}</label>
            @endif
            @if ($user->phone != null)
                <label>Téléphone: {{ $user->phone }}</label>
            @endif
            <label>Service: {{ $user->service }}</label>
            @if ($user->tags != null)
                <label>Tags: {{ $user->tags }}</label>
            @endif
        </div>
    </div>
    <div class="buttan">
    @super
    <button onclick="updateprofile(`{{ $user->login }}`)" class="modifier">Modifer</button>
    <form class="deco" action="{{ route('remove', $user->login) }}" method="POST">
        @csrf
        <button type="submit" class="supprimer">Supprimer</button>
    </form>
    @endsuper
    </div>
</body>

</html>
