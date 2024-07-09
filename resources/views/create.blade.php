<!-- resources/views/gltf/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Novo Objeto 3D</title>
</head>
<body>
    <h1>Adicionar Novo Objeto 3D</h1>

    <form action="{{ route('gltf.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="client">Nome do Cliente</label>
            <input type="text" id="client" name="client">
        </div>
        <br>
        <div>
            <label for="name_3d">Nome do Objeto</label>
            <input type="text" id="name_3d" name="name_3d">
        </div>
        <br>
        <section>
            <div>
                <label for="gltfFile">Objeto 3D(GLTF) .zip</label>
                <input type="file" id="gltfFile" name="gltfFile" accept=".zip">
            </div>
        </section>
        
        <button type="submit">Enviar GLTF</button>
    </form>
</body>
</html>
