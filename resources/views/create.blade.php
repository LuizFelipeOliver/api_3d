<!-- resources/views/gltf/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Novo Objeto 3D</title>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<body>
    <h1>Adicionar Novo Objeto 3D</h1>

    <form action="{{ route('gltf.store') }}" method="POST" enctype="multipart/form-data" class="dropzone">
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
            <div class="fallback">
                <label for="gltfFile">Objeto 3D(GLTF)</label>
                <input type="file" id="gltfFile" name="gltfFile">
            </div>
        </section>
        
        <button type="submit">Enviar GLTF</button>
    </form>

    <script>
        Dropzone.options = {
            paramName: "gltfFile",
            maxFilesize: 10,
            addRemoveLinks: true
        };
    </script>
</body>
</html>
