<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;


class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataRS = RumahSakit::latest()->paginate(5);

        return view('rumahsakit.index', compact('dataRS'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rumahsakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'alamat'   => 'required',
            'email'   => 'required|email',
            'telepon'   => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        try {
            $data = RumahSakit::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon
            ]);

            return redirect()->route('home')->withSuccess('Berhasil menambah data Rumah Sakit');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Gagal menambah data Rumah Sakit');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $dataRS = RumahSakit::where('id', $id)->first();

            return view('rumahsakit.show', compact('dataRS'));
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
            $dataRS = RumahSakit::where('id', $id)->first();

            return view('rumahsakit.edit', compact('dataRS'));
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
            'email'   => 'required|email',
            'telepon'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        try {
            $data = RumahSakit::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'telepon' => $request->telepon
                ]);

                return redirect()->route('home')->withSuccess('Berhasil update data Rumah Sakit');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Gagal update data Rumah Sakit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $rumahSakit = RumahSakit::findorfail($id);

            $rumahSakit->delete();

            return response()->json(['message' => 'Berhasil menghapus data Rumah Sakit', 'code' => 204]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data Rumah Sakit', 'code' => 400]);
        }
    }
}
