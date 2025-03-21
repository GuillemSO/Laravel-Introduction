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
            <a href="/" class="text-decoration-none text-white"><h1 class="h3">FILMS</h1></a>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/oldFilms">Pelis antiguas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/newFilms">Pelis nuevas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/sortFilms">Ordenar pelis</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/filmout/countFilms">Contador de Películas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/actorout/countActors">Contador de Actores</a></li> 
                    <li class="nav-item"><a class="nav-link text-white" href="/actorout/actors">Lista Actores</a></li> 
                </ul>
            </nav>
        </div>
    </header>
    
    <main class="container mt-5 mb-5 pb-5">
        {{$slot}}
    </main>

    <footer class="bg-dark text-white py-3 fixed-bottom w-100 mt-5 ">
        <div class="w-100 text-center">
            <p>GRACIAS POR UTILIZAR NUESTRA WEB !</p>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>