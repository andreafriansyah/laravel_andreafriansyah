<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPasien = Pasien::with('rumahsakit')->latest()->paginate(5);

        return view('pasien.index', compact('dataPasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rumahSakit = RumahSakit::get();

        return view('pasien.create', compact('rumahSakit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'alamat'   => 'required',
            'rs'   => 'required',
            'telepon'   => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        try {
            $data = Pasien::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'rs_id' => $request->rs,
                'telepon' => $request->telepon
            ]);

            return redirect()->route('indexPasien')->withSuccess('Berhasil menambah data Pasien');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Gagal menambah data Pasien');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $dataPasien = Pasien::with('rumahsakit')->where('id', $id)->first();

            return view('pasien.show', compact('dataPasien'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $dataPasien = Pasien::with('rumahsakit')->where('id', $id)->first();

            $rumahSakit = RumahSakit::get();

            return view('pasien.edit', compact('dataPasien', 'rumahSakit'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'alamat'   => 'required',
            'rs'   => 'required',
            'telepon'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        try {

            $data = Pasien::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'rs_id' => $request->rs,
                'telepon' => $request->telepon
            ]);

            return redirect()->route('indexPasien')->withSuccess('Berhasil update data Pasien');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Gagal update data Pasien');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pasien = Pasien::findorfail($id);

            $pasien->delete();

            return response()->json(['message' => 'Berhasil menghapus data Pasien', 'code' => 204]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Gagal delete Pasien', 'code' => 400]);
        }
    }
}
