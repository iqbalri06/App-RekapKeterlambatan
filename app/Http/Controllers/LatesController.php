<?php

namespace App\Http\Controllers;

use PDF;
use Excel;
use Carbon\Carbon;
use App\Models\lates;
use App\Models\rayons;
use App\Models\students;
use Illuminate\Http\Request;
use App\Exports\datatelatExport;
use App\Exports\datatelatPSExport;
use Illuminate\Support\Facades\Auth;


class LatesController extends Controller
{
    public function student()
    {
        return $this->belongsTo(students::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $lates = lates::join('students', 'lates.student_id', '=', 'students.id')
                ->where('students.name', 'LIKE', '%' . $search . '%')
                ->orderBy('lates.student_id', 'ASC')->simplePaginate(10);
            // $lates = lates::with('student')->where('student.name', 'LIKE', '%' . $search . '%')->orderBy('student_id', 'ASC')->simplePaginate(5);
        } else {
            $lates = lates::with('student')->orderBy('student_id')->simplePaginate(10);
        }

        // $lates = lates::with('student')->orderBy('student_id')->simplePaginate(5);

        return view('admin.data-telat.index', compact('lates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = students::all();
        date_default_timezone_set('Asia/Jakarta');
        $today = Carbon::now()->format('Y-m-d\TH:i');
        return view('admin.data-telat.create', compact('students', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required'
        ]);

        // dd($request->all());
        $data = Lates::create($request->all());
        if ($request->hasFile('bukti')) {
            $request->file('bukti')->move('storage/images/', $request->file('bukti')->getClientOriginalName());
            $data->bukti = $request->file('bukti')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('admin.data-telat.index')->with('success', 'Success add data');
    }

    /**
     * Display the specified resource.
     */
    public function show($student_id)
    {
        // Retrieve all records associated with the student_id
        $lates = Lates::with('student')->where('student_id', $student_id)->get();
        $student = students::all();

        return view('admin.data-telat.show', compact('lates', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = students::all();
        $lates = lates::with('student')->find($id);
        return view('admin.data-telat.edit', compact('students', 'lates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required'
        ]);

        $fileName = $request->file('bukti')->getClientOriginalName();

        $request->file('bukti')->move('storage/images/', $fileName);

        Lates::where('id', $id)->update([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $fileName,
        ]);
        return redirect()->route('admin.data-telat.index')->with('success', 'Success edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        lates::where('id', $id)->delete();
        return redirect()->route('admin.data-telat.index')->with('success', 'Success Delete Rombel');
    }

    public function downloadExcel()
    {
        return Excel::download(new datatelatExport, 'datatelat.xlsx');
    }

    public function downloadPDF($id)
    {
        // ambil data yg akan di tampilkan di pdf
        // kalau data nya akan dikirim ke file yg akan dijadikan pdf harus diubah menjadi bentuk array
        $lates = lates::with('student', 'student.rombel', 'student.rayon')->find($id)->toArray();
        $lates['rombel'] = $lates['student']['rombel']['rombel'];
        $lates['rayon'] = $lates['student']['rayon']['rayon'];

        $count = Lates::where('student_id', $lates['student'])->count();

        //var yg akan dipanggil di blade file pdf nya
        view()->share('lates', $lates);
        view()->share('count', $count);
        // view()->share('count', $count);
        // panggil view blade yg akan dicetak pdf serta data yg akan digunakan
        $pdf = PDF::loadView('admin.data-telat.download', compact('lates', 'count'));
        // download pdf file dengan nama tertentu
        return $pdf->download('Surat-Pernyataan.pdf');
    }

    // BAGIAN PEMBIMBING SISWA
    public function indexDataTelat(Request $request)
    {
        $userIdLogin = Auth::id(); // Gunakan Auth::id() atau metode lain untuk mendapatkan id user yang login
        // Mendapatkan rayon_id berdasarkan id user yang login
        $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');

        $search = $request->input('searchSiswa');

        $students = Lates::join('students', 'lates.student_id', '=', 'students.id')
            ->join('rayons', 'students.rayon_id', '=', 'rayons.id')
            ->where('rayons.user_id', $userIdLogin);

        if ($search) {
            $students->where('students.name', 'like', "%$search%");
        }

        $students = $students->select('lates.*')->simplePaginate(10);

        return view('ps.data-telat', compact('students'));
    }

    public function detailStudent($student_id)
    {
        $lates = Lates::with('student')->where('student_id', $student_id)->get();
        return view('ps.detail', compact('lates'));
    }

    public function downloadExcelPS()
    {
        $userIdLogin = Auth::id(); // Gunakan Auth::id() atau metode lain untuk mendapatkan id user yang login
        // Mendapatkan rayon_id berdasarkan id user yang login
        $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');

        return Excel::download(new datatelatPSExport($userIdLogin, $rayonIdLogin), 'data_telat_ps.xlsx');
    }
}
