<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }
        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }
        input[type=submit]:hover {
        background-color: #45a049;
        }
        #formEdit{
            margin-top: 3em;
        }
        h1{
            font-size: 2em !important;
            text-align: center;
        }
    </style>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-7xl mx-auto" id="formEdit">
        <h1>Nueva Hora</h1>
        <div>
            <form action="/horas/crear" method ="POST">
                @csrf
                <label>Día:</label>
                <select name="diaH" id="">
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miércoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                </select>
                <label>Hora:</label>
                <select name="horaH" id="">
                    <option value="1">8:15</option>
                    <option value="2">9:15</option>
                    <option value="3">10:15</option>
                    <option value="4">11:45</option>
                    <option value="5">12:45</option>
                    <option value="6">13:45</option>
                </select>
                <label>Asignatura:</label>
                <select name="codAs" id="">
                    <?php
                    foreach ($asignaturas as $asignatura) {
                        echo '<option value="'.$asignatura["codAs"].'">'.$asignatura["nombreAs"].'</option>';
                    } ?>
                </select>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</x-app-layout>
