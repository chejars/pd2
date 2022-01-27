<!doctype html>
<html lang="lv">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
    crossorigin="anonymous">
</head>

<body>
    <header class="navbar navbar-dark bg-dark mb-5">
        <div class="container">
            <span class="navbar-brand mb-0 h1">{{ $title }}</span>
        </div>
    </header>

    <main class="container">
        <div id="root"></div>
    </main>
    
    <footer>
        <br><address>Izveidoja <a href='mailto:s9_eisaks_a@venta.lv'>Artis Eisaks</a><br>
        "Tīmekļa Tehnoloģiju" kursam 2021/2022<br>
        Rudens/ziemas semestrī.<br>
        </address>
    </footer>

    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>