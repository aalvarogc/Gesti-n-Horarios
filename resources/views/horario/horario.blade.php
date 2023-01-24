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
        height: 50px;
        }
        td{
            height: 35px;
            /* color: white; */
            font-weight: bold;
        }
        td:hover{
            background: lightgray;
            transition: all .2s;
            cursor: pointer;
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
        .eliminarBtn{
            cursor: pointer;
        }
        h2{
            text-align: center;
        }
    </style>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-7xl mx-auto">
        <h2>Tu Horario</h2>
        <table>
            <tr>
                <!-- <th></th> -->
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
            <?php
            $index = 0;
            for($i = 1; $i < 7; $i++){ // rows
                echo "<tr>";
                for($j = 1; $j < 6; $j++){ // columns
                    if(isset($horas[$index]) && ($i == $horas[$index]->horaH) && ($j == $horas[$index]->diaH)){
                        // serializo las claves primarias para pasarlas por la URL para poder eliminar una hora
                        $array_primaryKeys = serialize([$horas[$index]->diaH, $horas[$index]->horaH, $horas[$index]->codAs]);
                        $array_primaryKeys = urlencode($array_primaryKeys);
                        
                        echo '<td style=background-color:'.$horas[$index]->colorAs.'>';
                        echo '<a href="/horas/eliminar/'.$array_primaryKeys.'">'.$horas[$index]->nombreCortoAs.'</a>';
                        echo '</td>';
                        $index++;
                    }else{
                        echo "<td>---</td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
        <button type="button" class="btn btn-primary"><a href="/horas/crear">Añadir Hora</a></button>
    </div>
</x-app-layout>
