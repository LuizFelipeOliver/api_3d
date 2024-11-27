<!DOCTYPE html>
<html>
<head>
    <title>Lista de Objetos GLTF</title>
</head>
<body>
    <h1>Lista de Objetos GLb</h1>
    <ul>
        @foreach($object as $item)
            <li>
                <strong>{{ $item->filename }}</strong> - Cliente: {{ $item->client }}
                <br>
                <a href="{{ route('glb.show', $item->filename) }}">Ver Arquivo</a> |
                <a href="{{ route('glb.edit', $item) }}">Editar</a> |
                <form action="{{ route('glb.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
