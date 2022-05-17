<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/update.css">
    <script type="text/javascript" src="../js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body onload="set_theme()">
    <div class="photo">
        <img src="https://auth.etna-alternance.net/api/users/{{ $user->login }}/photo">
    </div>
    <div class="background">
        <form method="POST" enctype="multipart/form-data" action="{{ route('update', $user->login) }}">
            <label>Login: {{ $user->login }}</label><br>
            @csrf
        <br><label>Rôle:
                <select id="rights" name="rights" style="color:black;">
                    <option value="super adm" style="color:black;" @if ($user->rights == 'super adm')
                        selected
                        @endif>Super administrateur</option>
                    <option value="adm" style="color:black;" @if ($user->rights == 'adm')
                        selected
                        @endif>Administrateur</option>
                    <option value="emp" style="color:black;" @if ($user->rights == 'emp')
                        selected
                        @endif>Employé</option>
                </select><br><br>
                <label>Nom:</label>
                <input type="text" name="nom" id="nom" value="{{ $user->nom }}" placeholder="Nom"><br>
                <label>Prénom:</label>
                <input type="text" name="prenom" id="prenom" value="{{ $user->prenom }}" placeholder="Prenom"><br>
                <label>Email:</label>
                <input type="text" name="email" id="email" value="{{ $user->email }}" placeholder="Email"><br>
                <label>Téléphone:</label>
                <input type="number" name="phone" value="{{ $user->phone }}" placeholder="Numéro de téléphone"><br>
                <label>Service:</label>
                <input type="text" name="service" id="service" value="{{ $user->service }}"
                    placeholder="Service: Pédagogie, BLU, Administration, Relation école entreprise,ect.."><br>
                <label>Tags:</label>
                <input type="text" name="tags" id="tags" value="{{ $user->tags }}" placeholder="technique, ect.."><br>
            </label>
            <div class="buttan">
                <button type="submit" value="Ajouter employé" style="width: 100%; justify-content:center; margin-left:35%;">Ajouter</button>
            </div>
        </form>
    </div>
</body>

</html>
