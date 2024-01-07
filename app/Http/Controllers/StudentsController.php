<?php

namespace App\Http\Controllers;

use App\Models\rayons;
use App\Models\rombels;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rayons = rayons::all();
        $rombels = rombels::all();

        $search = $request->input('search');

        if ($search) {
            $students = Students::where('name', 'LIKE', '%' . $search . '%')->orderBy('name', 'ASC')->simplePaginate(5);
        } else {
            $students = students::orderBy('name', 'ASC')->simplePaginate(5);
        }

        return view('admin.student.index', compact('rayons', 'rombels', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = rayons::all();
        $rombels = rombels::all();
        return view('admin.student.create', compact('rayons', 'rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required|min:3',
            'rombel_id' => 'required',
            'rayon_id' => 'required'
        ]);

        students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Berhasil Menambah data siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayons = rayons::all();
        $rombels = rombels::all();
        $students = students::find($id);
        return view('admin.student.edit', compact('rayons', 'rombels', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required|min:3',
            'rombel_id' => 'required',
            'rayon_id' => 'required'
        ]);

        Students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Success change data student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(students $students)
    {
        //
    }


    // BAGIAN PEMBIMBING SISWA
    public function indexSiswa(Request $request)
    {
        $userIdLogin = Auth::id(); // Gunakan Auth::id() atau metode lain untuk mendapatkan id user yang login
        $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');

        $search = $request->input('searchSiswa');

        $students = Students::with('rayon', 'rombel')
        ->where('rayon_id', $rayonIdLogin);

        if ($search) {
            $students->where('name', 'like', "%$search%");                 
            // Add more columns as needed for searching
        }

        $students = $students->simplePaginate(5);
        return view('ps.student', compact('students'));
    }
}
