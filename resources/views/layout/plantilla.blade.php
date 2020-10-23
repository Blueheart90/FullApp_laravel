<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .imagenCabecera{
            float: right;
            padding-right: 150px;
            width: 150px;
        }
        .cabecera{
            text-align: center;
            font-size: x-large;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-bottom: 100px;
        }
        .contenido form{
            width: 600px;
            margin: 0 auto;
        }
        table{
            margin: 0 auto;
        }
        .pie{
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.7em;
            margin-bottom: 15px;
        }
        table, tr, td{
            border: 1px solid black;
        }
        img{
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="cabecera">
        @yield("cabecera")
        <img src="/images/logo.png" alt="" class="imagenCabecera">
    </div>
    <div class="contenido">
        @yield("contenido")
        @yield("validacion")
        @if(count($errors) > 0)
            <h2>Validacion de formulario</h2>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="pie">
        @yield("pie")
        Primer Formulario Laravel
        2020
    </div>
</body>
</html>