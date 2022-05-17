<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Administration</title>
</head>

<body>
    <button onclick="closeprofiler()" class="retour" style="background: none; border: 0; position:absolute; margin-left:90%;"><i class="far fa-times-circle fa-2x" style="color: black"></i></button>
    <div class="connect">
        <div class="admin">
            <h1>Ajout d'un employé</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin') }}">
                @csrf
                <input type="text" name="login" id="login" placeholder="Login ETNA"><br>
                <br>
                <label>Rôle:
                    <select id="rights" name="rights" style="color:black;">
                        <option value="super adm" style="color:black;">Super administrateur</option>
                        <option value="adm" style="color:black;">Administrateur</option>
                        <option value="emp" style="color:black;" selected>Employé</option>
                    </select><br><br>
                    <input type="number" name="phone" placeholder="Numéro de téléphone"><br>
                    <input type="text" name="email" id="email" placeholder="Email"><br>
                    <input type="text" name="nom" id="nom" placeholder="Nom"><br>
                    <input type="text" name="prenom" id="prenom" placeholder="Prenom"><br>
                    <input type="text" name="service" id="service" placeholder="Service: Pédagogie, BLU, Administration, Relation école entreprise,ect.." @isset($service)
                    value="{{ $service }}"
                    @endisset><br>
                    <input type="text" name="tags" id="tags" placeholder="technique, ect.."><br>
                </label>
                <div class="buttan">
                    <button class="submit" type="submit" value="Ajouter employé" onclick="yo()">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
