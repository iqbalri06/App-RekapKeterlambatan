<?php

namespace App\Http\Controllers;

use App\Models\rombels;
use Illuminate\Http\Request;

class RombelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $rombels = rombels::where('rombel', 'LIKE', '%' . $search . '%')->orderBy('rombel', 'ASC')->simplePaginate(5);
        } else {
            $rombels = rombels::orderBy('rombel', 'ASC')->simplePaginate(5);
        }
        return view('admin.rombel.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required|min:3'
        ]);

        Rombels::create([
            'rombel' => $request->rombel
        ]);

        return redirect()->route('admin.rombel.index')->with('success', 'Berhasil Nambah Data Rombel');
    }

    /**
     * Display the specified resource.
     */
    public function show(rombels $rombels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rombels = Rombels::find($id);
        return view('admin.rombel.update', compact('rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rombel' => 'required'
        ]);

        rombels::where('id', $id)->update([
            'rombel' => $request->rombel
        ]);

        return redirect()->route('admin.rombel.index')->with('success', 'Success change data rombel!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rombels::where('id', $id)->delete();
        return redirect()->route('admin.rombel.index')->with('success', 'Success Delete Rombel');
    }
}
