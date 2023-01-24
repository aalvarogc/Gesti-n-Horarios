<x-app-layout>
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
        #formEdit > div{
            text-align: center;
        }
        h1{
            font-size: 2em !important;
            text-align: center;
        }
    </style>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-7xl mx-auto" id="formEdit">
        <h1>Ver asignatura</h1>
        <div>
            <p> Nombre: {{ $asignatura->nombreAs}}</p>
            <p> Nombre corto: {{ $asignatura->nombreCortoAs}}</p>
            <p> Profesor: {{ $asignatura->profesorAs}}</p>
            <p> Color: <input type="color" value="{{ $asignatura->colorAs}}" disabled></p>
        </div>
    </div>
</x-app-layout>
