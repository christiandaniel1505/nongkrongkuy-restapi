<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;

class DaftarcafeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = Lists::paginate(9);
        return view('daftar.index', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi request
        $nm = $request->image;
        $namaFile = time().rand(100,999).".". $nm->getClientOriginalName();
        
        $daftar = new Lists;
        $daftar->id = $request->id;
        $daftar->title = $request->title;
        $daftar->content = $request->content;
        $daftar->alamat = $request->alamat;
        $daftar->link = $request->link;
        $daftar->image = $namaFile;

        $nm->move(public_path().'/img', $namaFile);
        $daftar->save();


        //jika berhasil, kembalike halaman utama
        return redirect()->route('daftar.index')->with('success', 'Daftar cafe Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftar = Lists::find($id);
        return view('daftar.edit', compact('daftar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nm = $request->image;
        
        $daftar = Lists::where('id', $id)->first();
        $daftar->id = $request->id;
        $daftar->title = $request->title;
        $daftar->content = $request->content;
        $daftar->alamat = $request->alamat;
        $daftar->link = $request->link;

        if ($request->hasFile('image')) {
            $daftar->delete_image();
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('img', $name);
            $daftar->image = $name;
        }

        Lists::findOrFail($id)->update($request->all());
        $daftar->save();



        //jika berhasil, kembalike halaman utama
        return redirect()->route('daftar.index')->with('success', 'Daftar cafe Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lists::findOrFail($id)->delete();


        //jika berhasil, kembalike halaman utama
        return redirect()->route('daftar.index')->with('success', 'Daftar berhasil dihapus');
        
    }
}
