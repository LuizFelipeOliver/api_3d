# Blue Marlgin 🐟

Este projeto Laravel é dedicado ao gerenciamento de arquivos 3D GLTF, permitindo o upload, armazenamento, visualização e edição de objetos 3D através de uma interface web.

## Pré-requisitos
<ul>
    <li>PHP >= 8.3.8</li>
    <li>Composer > = 2.7.6</li>
    <li>Node >= 22.2.0</li>
</ul>

## Instalação
Clonar o repositório
```
git clone git@github.com:LuizFelipeOliver/api_3d.git
cd api_3d
```
Instalar dependencias
```
composer install && npm install
```
Rodar projeto
```
php artisan migrate && npx vite &
```


## Estrutura do Projeto
<ul>
    <li>app/: Contém os modelos, controladores e lógica de negócios do Laravel.</li>
    <li>public/: Diretório público onde ficam os assets (JavaScript, CSS, imagens) acessíveis pelo navegador.</li>
    <li>resources/: Contém as views Blade do Laravel, além dos assets não compilados (JavaScript, SASS, etc.).</li>
    <li>routes/: Define as rotas da aplicação Laravel.</li>
    <li>storage/: Armazena arquivos gerados pela aplicação, como logs e uploads.</li>
</ul>


1 cd caminho chave
2 ssh -i nome_chave ubuntu@ip_servidor
ou porta ssh arlterada
ssh -i nome_chave -p valor_porta ubuntu@ip_servidor
