    <!DOCTYPE html>
    <html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
    </head>
    <body>
                
        <h1>Je suis connecté</h1>

        <!-- {{-- Sécuriser un partie de la page (n'apparait que si connecté) --}} -->
        @auth
                <h1>Dossier Confidentiel Top Secret</h1>
        @endauth
        
    </body>
    </html>