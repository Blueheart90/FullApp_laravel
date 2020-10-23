<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina para agregar usuarios</h1>
    {!! Form::open(['method' => 'POST', 'action'=>'AdminUsersController@store', 'files'=>'true']) !!}
        <table>
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
                <td>{!! Form::label('email_v', 'Verificacion de correo') !!}</td>
                <td>{!! Form::text('email_verified_at') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('password', 'Contraseña') !!}</td>
                <td>{!! Form::password('password', ['class' => 'awesome']) !!}</td>
            <tr>
                <td>{!! Form::label('foto', 'Agregar foto') !!}</td>
                <td>{!! Form::file('foto_id') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::submit('Crear user!') !!}</td>
                <td>{!! Form::reset('Borrar') !!}</td>
            </tr>
        </table>
    {!! Form::close() !!}
</body>
</html>