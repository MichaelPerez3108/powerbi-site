<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('objects.create')}}">Agregar objeto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('blob.index')}}">Listado de blobs</a>
                    </li>
            </div>
        </div>
    </nav>
    <h1 style="text-align: center;">Listado de objetos</h1>
    <hr style="display:relative; width:90%; margin:0 auto !important;" class="p-2">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Parent_id</th>
                <th scope="col">name</th>
                <th scope="col">type</th>
                <th scope="col">blob_id</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
            </tr>
        </thead>
        @foreach($objetos as $objeto)
        <tbody>
            <tr>
                <th scope="row"></th>
                <td>{{$objeto->id}}</td>
                <td>{{$objeto->parent_id}}</td>
                <td>{{$objeto->name}}</td>
                <td>{{$objeto->type}}</td>
                <td>{{$objeto->blob_id}}</td>
                <td>{{$objeto->created_at}}</td>
                <td>{{$objeto->updated_at}}</td>
                <td></td>
            </tr>
        @endforeach

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>