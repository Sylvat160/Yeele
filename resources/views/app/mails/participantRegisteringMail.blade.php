<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail d'inscription du participant</title>
</head>
<body>
    <table style="border: .5px solid #ddd;">
        <thead style="background: #eee;">
            <th colspan="2">Vos information d'inscription</th>
        </thead>
        <tbody>
            @foreach ($participant as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>