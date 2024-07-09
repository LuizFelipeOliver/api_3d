<!DOCTYPE html>
<html>
<head>
    <title>Editar Objeto GLTF</title>
</head>
<body>
    <h1>Editar Objeto GLTF</h1>
    <form action="{{ route('gltf.update', $gltf->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="client">Nome do Cliente</label>
            <input type="text" id="client" name="client" value="{{ $gltf->client }}">
        </div>
        <br>
        <div>
            <label for="name_3d">Nome do Objeto</label>
            <input type="text" id="name_3d" name="name_3d" value="{{ $gltf->name_3d }}">
        </div>
        <br>
        <div>
            <label for="gltfFile">Novo Objeto 3D(GLTF)</label>
            <input type="file" name="gltfFile">
        </div>
        <button type="submit">Atualizar GLTF</button>
    </form>
</body>
</html>
