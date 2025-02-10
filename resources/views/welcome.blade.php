<x-app-layout>
    <div class="container mt-5 mb-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h2>Crear Película</h2>
                    </div>
                    <div class="card-body">
                        @if (!empty($status))
                            <div class="alert alert-danger text-center">{{$status}}</div>
                        @endif
                        <form action="{{action('App\Http\Controllers\FilmController@createFilm')}}" method="POST">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Año:</label>
                                <input type="text" class="form-control" name="year" id="year" required>
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="form-label">Género:</label>
                                <input type="text" class="form-control" name="genre" id="genre" required>
                            </div>
                            <div class="mb-3">
                                <label for="img_url" class="form-label">Imagen (URL):</label>
                                <input type="text" class="form-control" name="img_url" id="img_url" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">País:</label>
                                <input type="text" class="form-control" name="country" id="country" required>
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Duración (h):</label>
                                <input type="number" class="form-control" name="duration" id="duration" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
