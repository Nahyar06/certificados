<!DOCTYPE html>
<html>

<head>
    <title>Subir Certificado</title>
</head>

<body>
    <a href="{{ route('persona.index') }}">Ver Personas Registradas</a>
    <br><br>

    <h2>Registrar Persona</h2>

    <form action="{{ route('persona.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>

        <label>DNI:</label>
        <input type="text" name="dni" required>
        <br><br>

        <label>Certificado (PDF):</label>
        <input type="file" name="certificado" accept="application/pdf" required>
        <br><br>

        <button type="submit">Guardar</button>
    </form>

</body>

</html>