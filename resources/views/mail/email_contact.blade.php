<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <h2>Prise de contact sur mon beau site</h2>
        <p>Réception d'une prise de contact avec les éléments suivants :</p>
        <ul>
            <li><strong>Nom</strong> : {{ $user['name'] }}</li>
            <li><strong>Email</strong> : {{ $user['email'] }}</li>
            <li><strong>Message</strong> : {{ $user['message'] }}</li>
        </ul>
    </body>
</html>