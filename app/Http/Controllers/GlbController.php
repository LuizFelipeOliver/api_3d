<?php

namespace App\Http\Controllers;

use App\Models\GlbModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GlbController extends Controller
{
    public function index()
    {
        $object = GlbModel::all();

        return view('index', compact('object'));
    }

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'client' => 'required|string|max:255',
                'filename' => 'required|string|max:255',
                'glbFile' => 'required|mimes:glb|max:20480',
            ]
        );

        Log::info('Iniciando o processo de armazenamento do arquivo GLB.');

        $fileName = Str::slug($request->filename) . '.glb';
        try {

            $filePath = $request->file('glbFile')->storeAs('public/obj', $fileName);
            if ($filePath) {
                GlbModel::create(
                    [
                        'client' => $request->client,
                        'filename' => $request->filename,
                        'filepath' => $filePath,
                    ]
                );

                Log::info('Arquivo GLB salvo em: ', ['path' => $filePath]);

                return redirect()->route('glb.index')->with('success', 'GLB enviado e armazenado');

            };

        } catch (\Exception $e) {
            Log::error('Erro ao armazenar arquivo GLB: ' . $e->getMessage());
            return back()->with('error', 'Erro ao armazenar o arquivo')->withInput();
        }


        return back()->with('error', 'Erro ao armazenar o arquivo')->withInput();
    }

    public function show($filename)
    {
        $glb = GlbModel::where('filename', $filename)->firstOrFail();


        return view(
            'show',
            compact('glb')
        );
        /*
        return response()->file(
            $path,
            [
                'Content-Type' => 'model/gltf-binary',
                'Content-Disposition' => 'inline; filename="'.basename($path).'"',
            ]
        );
        */
    }

    public function edit(GlbModel $glb)
    {
        return view('glb.edit', compact('glb'));
    }

    public function update(Request $request, GlbModel $glb)
    {
        $request->validate(
            [
                'client' => 'required|string|max:255',
                'filename' => 'required|string|max: 255',
                'glbFile' => 'mimes:glb|max:2040',
            ]
        );

        if ($request->hasFile('glbFile')) {
            $this->updateGlbFile($request, $glb);
        }

        $glb->update(
            [
                'client' => $request->client,
                'filename' => $request->filename,
            ]
        );

        return redirect()->route('index')->with('success', 'Arquivo Glb atualizado');
    }
    public function updateGlbFile(Request $request, GlbModel $glb)
    {
        Storage::disk('public')->delete($glb->filepath);

        $fileName = time() . '-' . Str::slug($request->filename) . '.glb';
        $filePath = $request->file('glbFile')->storeAs('obj', $fileName, 'public');

        $glb->update(
            [
                'filename' => $fileName,
                'filepath' => '/storage/' . $filePath,
            ]
        );
    }
    public function destroy(GlbModel $glb)
    {
        Storage::disk('public')->delete($glb->filepath);
        $glb->delete();

        return redirect()->route('glb.index')->with('success', 'Arquivo GLB removido!');
    }
}
