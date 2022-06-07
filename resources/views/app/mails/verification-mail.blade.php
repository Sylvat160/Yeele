<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription réussi</title>
</head>
<body>
    <h1>Bonjour <p>{{ $user->firstname }}</p>! Votre inscription a été un succès.</h1>
    <p>Veuillez cliquer sur le lien ci-dessous pour valider votre adresse e-mail!</p>
    <a href="{{ $url }}">Valider votre adresse e-mail</a>
</body>
</html>