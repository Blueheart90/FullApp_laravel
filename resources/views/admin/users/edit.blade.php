<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img {
            width: 150px;
        }
    </style>
</head>
<body>
    <h1>Pagina principal del Administrador</h1>
    <!-- 1. objeto que me manda el controlador en este caso se llama $user, 2. array= metodo a utilizar, controlador, id del producto. -->
    {!! Form::model($user, ['method'=>'PUT', 'action'=>['AdminUsersController@update', $user->id], 'files'=> 'true']) !!}
        <table>
            <tr>
                <td><img src="{{ Storage::url(($user->foto_id)? $user->foto->ruta : 'images/no-photo.jpg') }}" alt=""></td>    
            </tr>
            <tr>
                <td>{!! Form::label('name', 'Nombre del usuario') !!}</td>
                <td>{!! Form::text('name') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('role', 'Id del role') !!}</td>
                <td>{!! Form::select('role_id', ['1' => 'Administrador', '2' => 'Autor', '3' => 'Subscriptor'], null, ['placeholder' => 'Seleccione un Role']); !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('email', 'Correo electronico') !!}</td>
                <td>{!! Form::text('email') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('foto', 'Agregar foto') !!}</td>
                <td>{!! Form::file('foto_id') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::submit('Actualizar') !!}</td>
                <td>{!! Form::reset('Borrar campos') !!}</td>
            </tr>
        </table>
    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
        @csrf
        <!-- <input type="hidden" name="_method" value="DELETE"> -->
        <input type="submit" value="Borrar Registro">
    {!! Form::close() !!}
</body>
</html>
