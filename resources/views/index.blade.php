<!DOCTYPE html>
<html>
<head>
    <title>Lista de Objetos GLTF</title>
</head>
<body>
    <h1>Lista de Objetos GLTF</h1>
    <ul>
        @foreach($objects as $object)
            <li>{{ $object->name_3d }}</li>
        @endforeach
    </ul>
</body>
</html>
