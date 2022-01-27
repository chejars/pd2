<!doctype html>
<html lang="lv">
<head>
    <meta charset="utf-8">
    <title>PD 2 - {{ $title }}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-
    beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
    eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</head>

<body>
    <div class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <header class="navbar navbar-light">
                        <div class="bg-light mb-4 py-4">
                            <div class="container">
                                <div class="row">
                                    <header class="col-md-6 offset-md-3">
                                        <nav class="navbar navbar-light navbar-expand-md">
                                            <span class="navbar-brand mb-0 h1">Geng Shop</span>
                                            <button class="navbar-toggler" type="button" data-bs-
                                            toggle="collapse" data-bs-target="#navbarNav">
                                            <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarNav">
                                            <ul class="navbar-nav">
                                                
                                            @if(Auth::check())
                                                <li class="nav-item">
                                                <a class="nav-link" href="/">Sākumlapa</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="/authors">Autori</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="/books">Grāmatas</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="/games">Spēles</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="/logout">Beigt darbu</a>
                                                </li>
                                            @else
                                                <li class="nav-item">
                                                <a class="nav-link" href="/login">Pieslēgties</a>
                                                </li>
                                            @endif                                            
                                            </ul>
                                            </div>
                                        </nav>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row">
            <main class="col-md-6 offset-md-3">
                @yield('content')
            </main>
        </div>
    </div>

    <div class="bg-primary text-white py-4 mt-4">
        <div class="container">
            <div class="row">
                <footer>
                    <br><address>Izveidoja <a href='mailto:s9_eisaks_a@venta.lv'>Artis Eisaks</a><br>
                    "Tīmekļa Tehnoloģiju" kursam 2021/2022<br>
                    Rudens/ziemas semestrī.<br>
                    </address>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>