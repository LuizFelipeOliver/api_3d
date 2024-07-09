<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use ZipArchive;
use App\Models\GlftModel;
use Illuminate\Support\Str;

class GlftController extends Controller
{
    public function index()
    {
        $objects = GlftModel::all();
        return view('gltf.index', compact('objects'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client' => 'required|string|max:255',
            'name_3d' => 'required|string|max:255',
            'gltfFile' => 'required|mimes:zip|max:20480', // Aumentei o limite para 20MB (20480 KB)
        ]);

        Log::info('Iniciando o processo de armazenamento e extração do arquivo ZIP.');

        $extractPath = $this->extractZipFile($request->file('gltfFile'), $request->name_3d);

        if ($extractPath) {
            GlftModel::create([
                'client' => $request->client,
                'name_3d' => $request->name_3d,
                'filepath' => $extractPath,
            ]);

            Log::info('Arquivos GLTF enviados e armazenados com sucesso.');

            return redirect()->route('gltf.index')->with('success', 'Arquivos GLTF enviados e armazenados com sucesso!');
        }

        return back()->with('error', 'Falha ao descompactar o arquivo ZIP.')->withInput();
    }

    private function extractZipFile($zipFile, $name_3d)
    {
        $zipFileName = time() . '_' . $zipFile->getClientOriginalName();
        $zipPath = $zipFile->storeAs('public/zips', $zipFileName);

        $zipFullPath = storage_path('app/' . $zipPath);
        $extractPath = public_path('obj/' . Str::slug($name_3d));

        if (!is_dir($extractPath)) {
            mkdir($extractPath, 0777, true);
        }

        $zip = new ZipArchive;

        if ($zip->open($zipFullPath) === true) {
            if ($zip->extractTo($extractPath)) {
                $zip->close();
                unlink($zipFullPath);
                return $extractPath;
            }
        }

        return false;
    }

    public function show(GlftModel $gltf)
    {
        return view('gltf.show', compact('gltf'));
    }

    public function edit(GlftModel $gltf)
    {
        return view('gltf.edit', compact('gltf'));
    }

    public function update(Request $request, GlftModel $gltf)
    {
        $request->validate([
            'client' => 'required|string|max:255',
            'name_3d' => 'required|string|max:255',
            'gltfFile' => 'mimes:gltf,glb|max:20240',
        ]);

        if ($request->hasFile('gltfFile')) {
            $this->updateGltfFile($request, $gltf);
        }

        $gltf->update([
            'client' => $request->client,
            'name_3d' => $request->name_3d,
        ]);

        return redirect()->route('gltf.index')->with('success', 'Arquivo GLTF atualizado com sucesso!');
    }

    private function updateGltfFile(Request $request, GlftModel $gltf)
    {
        Storage::disk('public')->delete($gltf->filepath);

        $fileName = time() . '-' . $request->file('gltfFile')->getClientOriginalName();
        $filePath = $request->file('gltfFile')->storeAs('obj', $fileName, 'public');

        $gltf->update([
            'filename' => $fileName,
            'filepath' => '/storage/' . $filePath,
        ]);
    }

    public function destroy(GlftModel $gltf)
    {
        Storage::disk('public')->delete($gltf->filepath);
        $gltf->delete();

        return redirect()->route('gltf.index')->with('success', 'Arquivo GLTF removido com sucesso!');
    }
}
