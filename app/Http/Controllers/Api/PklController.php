<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pkl;

class PklController extends Controller
{
    //read
    public function index()
    {
        //ambil data dari tabel pkls, simpan ke variabel $pkl
        $pkl = Pkl::get();

        //response -> untuk membuat respon HTTP (balasan dari server)
        //json     -> memberi tahu Laravel utk kirim response dalam formas JSON
        //$pkl     -> data yang dikirim ke client
        //200      -> kode status HTTP artinya OK/permintaan berhasil
        return response()->json($pkl, 200);
    }

    //create
    public function store(Request $request)
    {
        $pkl = new Pkl();
        $pkl->student_id = $request->student_id;
        $pkl->teacher_id = $request->teacher_id;
        $pkl->industry_id = $request->industry_id;
        $pkl->start = $request->start;
        $pkl->end = $request->end;
        $pkl->save();

        return response()->json($pkl, 200);
    }

    //read -> simpan data ke database setelah user isi form
    public function show(string $id)
    {
        $pkl = Pkl::find($id); //cari data berdasarkan id
        return response()->json($pkl, 200);
    }

    public function update(Request $request, string $id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json(["message" => 'PKL not found'], 404);
        }

        $request->validate([
            'student_id' => 'sometimes|required|exists:students, id',
            'teacher_id' => 'sometimes|required|exists:teachers, id',
            'industry_id' => 'sometimes|required|exists:industries, id',
            'start' => 'sometimes|required|date',
            'end' => 'sometimes|required|date|after_or_equal:start',
        ]);

        $pkl->student_id = $request->student_id ?? $pkl->student_id;
        $pkl->teacher_id = $request->teacher_id ?? $pkl->teacher_id;
        $pkl->industry_id = $request->industry_id ?? $pkl->industry_id;
        $pkl->start = $request->start ?? $pkl->start;
        $pkl->end = $request->end ?? $pkl->end;
        $pkl->save();

        return response()->json($pkl, 200);
    }

    //remove
    public function destroy(string $id)
    {
        $pkl = Pkl::destroy($id); //hapus berdasarkan id
        return response()->json(["message"=>"Deleted"], 200);
    }
}
