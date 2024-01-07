<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\rayons;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $rayons = rayons::orderBy('rayon', 'ASC')->simplePaginate(5);
        $users = User::where('role', 'ps')->get();

        return view('admin.rayon.index', compact('rayons', 'users'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->where('role','ps');
        return view('admin.rayon.create', compact('users'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayons::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('admin.rayon.index')->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayons $rayons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayons = Rayons::find($id);
        $users = User::all()->where('role','ps');
        return view('admin.rayon.update', compact('users', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayons::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.rayon.index')->with('success', 'Success change data rayon!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rayons $rayons)
    {
        //
    }
}
