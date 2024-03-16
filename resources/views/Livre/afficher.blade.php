<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bibliothèque</title>
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

    <div class="container mt-4">
        <div>
            @if(session()->has('BienModifier'))
                <div class="alert alert-success">
                    {{ session('BienModifier') }}
                </div>
            @endif
            @if(session()->has('BienSupprimer'))
                <div class="alert alert-success">
                    {{ session('BienSupprimer') }}
                </div>
            @endif
        </div>
        

        <form action="{{ route('search_livres') }}" method="GET" class="mb-4">
            <div class="form-group">
                <label for="auteur">Rechercher par l'auteur :</label>
                <input type="text" id="auteur" name="auteur" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        
        <div>
            Total des livres: {{ $livres->count() }}
        </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Titre du livre</th>
                    <th>Auteur(s)</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                <tr>
                    <td>{{$livre->id}}</td>
                    <td>{{$livre->titre}}</td>
                    <td>{{$livre->nom_auteur}}</td>
                    <td>
                        <a href="{{ route('edit_livres', ['livre'=>$livre]) }}" class="btn btn-sm btn-primary">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('supprimer_livres', ['livre'=>$livre]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

</body>
</html>