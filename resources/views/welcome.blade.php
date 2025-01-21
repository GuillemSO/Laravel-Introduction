<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/sortFilms>Ordenar pelis por año</a></li>
        <li><a href=/filmout/countFilms>Contador de pelis</a></li>
    </ul>
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->


    <form action="" method="post">
        <h1>CREAR PELICULA</h1>
        
        <label for="Name">NAME:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="Year">YEAR:</label>
        <input type="text" name="year" id="year" required>
        <br>
        <label for="Genre">GENRE:</label>
        <input type="text" name="genre" id="genre" required>
        <br>
        <label for="Image">IMAGE_URL</label>
        <input type="url" name="image" id="image" required>
        <br>
        <label for="Country">COUNTRY</label>
        <input type="text" name="country" id="country" required>
        <br>
        <label for="Duration">Duration</label>
        <input type="number" name="duration" id="duration" required>h

        <br>
        <input type="submit" value="ENVIAR">
    </form>
</body>

</html>
