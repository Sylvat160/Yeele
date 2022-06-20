<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail de contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Karla', sans-serif;">
    <h2>Bonjour,</h2>
    <p><strong>{{ $data['firstname'] . ' ' . $data['lastname'] }}</strong> vient d'envoyé un message:</p>
    <h3>Sujet: {{ $data['subject'] }}</h3>
    <p style="font-style: italic;">{{ $data['message'] }}</p>
    <p>Son adresse mail: <a href="{{ $data['email'] }}">{{ $data['email'] }}</a></p>
</body>
</html>