<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <style>
        body {
        margin: auto;
        }
        main{
            padding: 50px;
        }
        table, td, th {
        border: 1px solid black;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        text-align: center;
        }
        th {
        height: 70px;
        }
        td {
        height: 30px;
        }
        .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        }
        button{
            margin: 5px;
        }
        a{
            color: white;
            text-decoration: none;
        }
    </style>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-7xl mx-auto">
    <h2>Listado de asignaturas</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Nombre Corto</th>
            <th>Profesor</th>
            <th>Color</th>
        </tr>
        @foreach ($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->nombreAs }}</td>
                <td>{{ $asignatura->nombreCortoAs }}</td>
                <td>{{ $asignatura->profesorAs }}</td>
                <td style="background-color:{{ $asignatura->colorAs }};"></td>
                <td>
                    <button type="button" class="btn btn-success"><a href="/asignaturas/ver/{{$asignatura->codAs}}">Ver</a></button>
                    <button type="button" class="btn btn-warning"><a href="/asignaturas/editar/{{$asignatura->codAs}}">Editar</a></button>
                    <button type="button" class="btn btn-danger"><a href="/asignaturas/eliminar/{{$asignatura->codAs}}">Eliminar</a></button>        
                </td>
        </tr>
        @endforeach
    </table>
    <br>
    <button type="button" class="btn btn-primary"><a href="/asignaturas/crear">Nueva asignatura</a></button>
    </div>
</x-app-layout>
