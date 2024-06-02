<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Object3D;

class Object3DController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $object = Object3D::all();
        return response()->json($object);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'path' => 'required|string|max:255'
        ]);

        $object = Object3D::create($data);

        return response()->json($object, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $object = Object3D::findOrfail($id);
        return response()->json($object);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $object = Object3D::findOrfail($id);
        return response()->json($object);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $object = Object3D::findOrfail($id);

        $data = $request->validate([
            'path' => 'required|string|max:255'
        ]);

        $object->update($data);
        return response()->json($object, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $object = Object3D::findOrfail($id);
        $object->delete();
        return response()->json(null, 204);
    }
}
