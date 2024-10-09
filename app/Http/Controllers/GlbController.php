<?php

namespace App\Http\Controllers;

use App\Models\GlbModel;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnArgument;

class GlbController extends Controller
{
    public function index()
    {
        $object = GlbModel::all();

        return view('index', compact('object'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'client' => 'required|string|max:255',
            'name_3d'=> 'required|string|max:255',
            'glbFile'=> 'required|mimes:glb|max:20480',
        ]);

        Log::info('Iniciando o processo de armazenamento do arquivo GLB.');

        $filePath = $request->file('glbFile')->storeAs('3d_models', $request->name_3d . '.glb', 'public');

        if ($filePath)
        {
            GlbModel::create([
                'client' => $request->client,
                'name_3d' => $request->name_3d,
                'filepath' => $filePath,
            ]);

            Log::info('Iniciando o processo de armazenamento do arquivo GLB.');

            return redirect()->route('glb.index')->with('success', 'Arquivo GLB enviado e armazenado com sucesso!');

        };

        return back()-with('error', 'Iniciando o processo de armazenamento do arquivo GLB.')->withInput();
    }
}

