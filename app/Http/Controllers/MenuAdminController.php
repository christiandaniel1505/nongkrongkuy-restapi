<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Lists;
use DB;

class MenuAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = Menu::paginate(9);
        return view('menu.index', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftar = Lists::all();
        return view('menu.create', compact('daftar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->image;
        $namaFile = time().rand(100,999).".". $nm->getClientOriginalName();
        
        $daftar = new Menu;
        $daftar->id = $request->id;
        $daftar->cafe_id = $request->cafe_id;
        $daftar->title = $request->title;
        $daftar->content = $request->content;
        $daftar->image = $namaFile;
        $daftar->harga = $request->harga;

        $nm->move(public_path().'/img', $namaFile);
        $daftar->save();


        //jika berhasil, kembalike halaman utama
        return redirect()->route('menu.index')->with('success', 'Daftar cafe Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftar = Menu::with('lists')->where('id', $id);
        // dd($mahasiswa->matakuliah[0]);
        return view('menu.show', compact('daftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftar = Menu::findOrFail($id);
        return view('menu.edit', compact('daftar'));
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
        $namaFile = time().rand(100,999).".". $nm->getClientOriginalName();
        
        $daftar = new Menu;
        $daftar->id = $request->id;
        $daftar->cafe_id = $request->cafe_id;
        $daftar->title = $request->title;
        $daftar->content = $request->content;
        $daftar->image = $namaFile;
        $daftar->harga = $request->harga;

        $nm->move(public_path().'/img', $namaFile);
        $daftar->save();


        //jika berhasil, kembalike halaman utama
        return redirect()->route('menu.index')->with('success', 'Daftar cafe Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();


        //jika berhasil, kembalike halaman utama
        return redirect()->route('menu.index')->with('success', 'home berhasil dihapus');
    }
}
