<!DOCTYPE html>
<html>
<head>
    <title>Lista de Personas</title>
</head>
<body>

<h2>Personas Registradas</h2>

<a href="/admin">← Volver</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Ver Certificado</th>
        <th>QR</th>
    </tr>

    @foreach($personas as $persona)
    <tr>
        <td>{{ $persona->nombre }}</td>
        <td>{{ $persona->dni }}</td>
        <td>
            <a href="{{ route('persona.ver', $persona->codigo_unico) }}" target="_blank">
                Ver PDF
            </a>
        </td>
        <td>
            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate(route('persona.ver', $persona->codigo_unico)) !!}
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>