<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">FILMS</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/oldFilms">Pelis antiguas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/newFilms">Pelis nuevas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/sortFilms">Ordenar pelis</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/countFilms">Contador</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main class="container mt-4 mb-4">
        {{$slot}}
    </main>

    <footer class="bg-dark text-white py-3 fixed-bottom w-100 mt-5 ">
        <div class="w-100 text-center">
            <p>GRACIAS POR UTILIZAR NUESTRA WEB !</p>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>