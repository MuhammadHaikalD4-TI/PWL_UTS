<?php

namespace App\Http\Controllers;

use App\Models\PengunjungModel;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $pengunjung = PengunjungModel::all();
        
        
        return view('pengunjung.pengunjung')->with('pengunjung', $pengunjung);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengunjung.create_pengunjung')->with('url_form', url('/pengunjung'));
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
            'nik' => 'required|string|max:10|unique:pengunjungs,nik',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:L,P',
            'hp' => 'required|digits_between:6,15',
            'alamat' => 'required|string|max:255',
            'tgl_datang' => 'required|date',
            'jam_datang' => 'required',
            'jam_keluar' => 'required',
        ]);

        $data = PengunjungModel::create($request->except(['_token']));
        return redirect('/pengunjung')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function show(PengunjungModel $pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengunjung = PengunjungModel::find($id);
        return view('pengunjung.create_pengunjung')
            ->with('p', $pengunjung)
            ->with('url_form', url('/pengunjung/' . $id));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:10|unique:pengunjungs,nik,' . $id,
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:L,P',
            'hp' => 'required|digits_between:6,15',
            'alamat' => 'required|string|max:255',
            'tgl_datang' => 'required|date',
            'jam_datang' => 'required',
            'jam_keluar' => 'required',
        ]);

        $data = PengunjungModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('/pengunjung')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PengunjungModel::where('id', '=', $id)->delete();
        return redirect('pengunjung')->with('success', 'Pengunjung Berhasil Dihapus');
    }
}
