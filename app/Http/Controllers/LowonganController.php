<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Lowongan::all();
        if ($result) {
            $data['code'] = 200;
            $data['result'] = $result;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'telepon' => 'required',
            'jumlah_mhs' => 'required',
            'durasi' => 'required',
            'mitra_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        $lowongan = Lowongan::create($request->all());
        
        if ($lowongan) {
            $data['code'] = 200;
            $data['result'] = $lowongan;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response($data);
        // return "tes";
        // return redirect()->route('lowongan.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        $result = Lowongan::find($lowongan->id);

        if ($result) {
            $data['code'] = 200;
            $data['result'] = $result;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response()->json($data);
        // return view('lowongan.show', compact('lowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        return view('lowongan.edit', compact('lowongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'telepon' => 'required',
            'jumlah_mhs' => 'required',
            'durasi' => 'required',
            'mitra_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        $lowongan->update($request->all());

        if ($lowongan) {
            $data['code'] = 200;
            $data['result'] = $lowongan;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response($data);
        // return redirect()->route('lowongan.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        $lowongan = Lowongan::find($lowongan->id);
        $lowongan->delete();
        if ($lowongan) {
            $data['code'] = 200;
            $data['result'] = $lowongan;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response($data);
        // return redirect()->route('lowongan.index')->with('success', 'Post deleted successfully.');
    }
}
