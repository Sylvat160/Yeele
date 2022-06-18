<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail d'inscription du participant</title>
</head>
<body>
    <table>
        <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Civilité</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $participant->lastname }}</td>
                <td>{{ $participant->firstname }}</td>
                <td>{{ $participant->email }}</td>
                <td>{{ $participant->phone }}</td>
                <td>{{ $participant->civility }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>