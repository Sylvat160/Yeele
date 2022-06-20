<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail d'inscription du participant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
</head>

<body>
    <div style="text-align: center; font-family: 'Karla', sans-serif;">
        <h2>Bonjour {{ $participant->firstname }}, </h2>
        <p style="font-size: 17px;">Vous venez de vous inscrire pour
            l'évènement <strong>{{ $participant->event->name }}</strong>.</p>
    </div>
    <table
        style="width: 320px; border: .5px solid #ddd; margin: 10px auto; font-family: 'Karla', sans-serif;">
        <thead style="background: #eee;">
            <th colspan="2" style="text-align: center; padding: 5px;">Vos information d'inscription</th>
        </thead>
        <tbody style="border: .1px solid #ddd;">
            <tr style="padding: 5px auto;">
                <td style="font-weight: bold;">Nom</td>
                <td>{{ $participant->lastname }}</td>
            </tr>
            <tr style="padding: 5px auto;">
                <td style="font-weight: bold;">Prenom</td>
                <td>{{ $participant->firstname }}</td>
            </tr>
            <tr style="padding: 5px auto;">
                <td style="font-weight: bold;">Civilité</td>
                <td>{{ $participant->civility }}</td>
            </tr>
            <tr style="padding: 5px auto;">
                <td style="font-weight: bold;">Adresse mail</td>
                <td>{{ $participant->email }}</td>
            </tr>
            <tr style="padding: 5px auto;">
                <td style="font-weight: bold;">Téléphone</td>
                <td>{{ $participant->phone }}</td>
            </tr>
            @isset($participant->price)
                <tr style="padding: 5px auto;">
                    <td style="font-weight: bold;">Tarif choisi</td>
                    <td>{{ $participant->price }}</td>
                </tr>
                <tr style="padding: 5px auto;">
                    <td style="font-weight: bold;">Mode de paiement choisi</td>
                    <td>{{ $participant->payment_method }}</td>
                </tr>
            @endisset
            @isset($participant->field)
                <tr style="padding: 5px auto;">
                    <td style="font-weight: bold;">Valeur du hamp libre</td>
                    <td>{{ $participant->field->name . ':' . $participant->field->value }}</td>
                </tr>
            @endisset
            @foreach (json_decode($participant->additional_data, true) as $key => $value)
                <tr style="padding: 5px auto;">
                    <td style="font-weight: bold;">{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
