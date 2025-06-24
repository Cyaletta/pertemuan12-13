<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index', ['karyawans' => Karyawan::all()]);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::create($request->all());
        return response()->json($karyawan);
    }

    public function show($id)
    {
        return response()->json(Karyawan::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return response()->json($karyawan);
    }

    public function destroy($id)
    {
        Karyawan::destroy($id);
        return response()->json(['success' => true]);
    }
}