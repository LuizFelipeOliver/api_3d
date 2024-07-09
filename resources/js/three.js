import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js'; 
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 100);

const renderer = new THREE.WebGLRenderer({alpha: true});
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

const controls = new OrbitControls(camera, renderer.domElement);

camera.position.set(0, 0, 5); 

const light = new THREE.AmbientLight(0xfef65b);
light.intensity = 10; 
scene.add(light);

const loader = new GLTFLoader().setPath('{{ $gltf->filepath }}');
loader.load('scene.gltf', (gltf) => {
    
    gltf.scene.position.set(0, 0, 0);
    
    gltf.scene.rotation.y = -1
    
    
    scene.add(gltf.scene);
}, undefined, (error) => {
    console.error(error);
});

window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});

function animate() {
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
}

animate();