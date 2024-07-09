<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlftModel;
use Illuminate\Support\Facades\Storage;

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
        $request->validate(([
            'client' => 'required|string|max:255',
            'name_3d' => 'required|string|max:255',
            'gltfFile' => 'required|mimes:gltf,gltf2|max:2048',
        ]));

        $fileName = time() . '-' . $request->file('gltfFile')->getClientOriginalName();
        $filePath = $request->file('gltfFile')->storeAs('obj', $fileName, 'public');

        GlftModel::create([
            'client' => $request->client,
            'name_3d' => $request->name_3d,
            'filename' => $fileName,
            'filepath' => '/storage/' . $filePath,
        ]);

        return redirect()->route('gltf.index')->with('success', 'Arquivo GLTF enviado com sucesso!');
    }

    public function show(GlftModel $gltf)
    {
        return view('show', compact('glft'));
    }

    public function edit(GlftModel $gltf)
    {
        return view('gltf.edit', compact('glft'));
 
    }

    public function update(Request $request, GlftModel $gltf)
    {
        $request->validate([
            'client' => 'required|string|max:255',
            'name_3d' => 'required|string|max:255',
            'gltfFile' => 'mimes:gltf,gltf2|max:2048',
        ]);

        if ($request->hasFile('gltfFile')) {
            Storage::disk('public')->delete('obj/' . $gltf->filename);

            $fileName = time() . '-' . $request->file('gltfFile')->getClientOriginalName();
            $filePath = $request->file('gltfFile')->storeAs('obj', $fileName, 'public');

            $gltf->update([
                'filename' => $fileName,
                'filepath' => '/storage/' . $filePath,
            ]);
        }

        $gltf->update([
            'client' => $request->client,
            'name_3d' => $request->name_3d,
        ]);

        return redirect()->route('gltf.index')->with('success', 'Arquivo GLTF atualizado com sucesso!');
    }

    public function destroy(GlftModel $gltfFile)
    {
        Storage::disk('public')->delete('obj/' . $gltfFile->filename);

        $gltfFile->delete();

        return redirect()->route('gltf.index')->with('success', 'Arquivo GLTF removido com sucesso!');
    }
}
