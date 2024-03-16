<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                Bibliothèque
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ajouter_livres')}}">Ajouter un livre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Formulaire pour modifier un livre</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
            
        @endif
    </div>
    <form action="{{ route('modifier_livres', ['livre' => $livre->id]) }}" method="post" class="mb-4">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="titre">Titre : </label>
            <input type="text" id="titre" name="titre" value="{{ $livre->titre }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nom_auteur">Auteur : </label>
        <input type="text" id="auteur" name="nom_auteur" value="{{ $livre->nom_auteur }}" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</body>
</html>