<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mis animales</title>
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
</head>

<body>

@include("navbar")

  <div class="container mt-5">
    <form action="{{ route('animal.update', $animal) }}" method="post">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" value="{{ $animal->name }}">
      </div>

      <div class="form-group">
        <label for="weight">Peso</label>
        <input type="number" class="form-control" name="weight" value="{{ $animal->weight }}">
      </div>

      <div class="form-group">
        <label for="age">Edad</label>
        <input type="number" class="form-control" name="age" value="{{ $animal->age }}">
      </div>

      <div class="form-group">
        <label for="description">Descripción</label>
        <input type="text" class="form-control" name="description" value="{{ $animal->description }}">
      </div>

      <button type="submit" class="btn btn-primary mt-3">Editar</button>
    </form>
  </div>

  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+FAz8eFiBjz4z0LEnGf9Ifm09uj1g" 
    crossorigin="anonymous"></script>
</body>

</html>
