
@vite(['resources/js/three.js'])


<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div id="canvas-container"></div>

    <script>
         const gltfPath = "{{'/obj/' . $gltf->name_3d}}/";
        window.gltfPath = gltfPath;
    </script>
</body>