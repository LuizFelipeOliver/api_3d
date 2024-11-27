<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Novo Objeto GLB</title>
</head>
<body>
    <h1>Cadastrar Novo Objeto GLB</h1>

    <!-- Exibe erros de validação -->
    @if ($errors->any())
        <div>
            <strong>Erro!</strong> Verifique os campos abaixo:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de cadastro -->
    <form action="{{ route('glb.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="client">Nome do Cliente:</label>
            <input type="text" id="client" name="client" value="{{ old('client') }}" required>
        </div>
        <br>

        <div>
            <label for="name_3d">Nome do Objeto 3D:</label>
            <input type="text" id="filename" name="filename" value="{{ old('name_3d') }}" required>
        </div>
        <br>

        <div>
            <label for="glbFile">Arquivo GLB:</label>
            <input type="file" id="glbFile" name="glbFile" accept=".glb" required>
        </div>
        <br>

        <button type="submit">Cadastrar Objeto</button>
    </form>

    <!-- Link para voltar à página de listagem -->
    <br>
    <a href="{{ route('glb.index') }}">Voltar para a lista</a>
</body>
</html>
