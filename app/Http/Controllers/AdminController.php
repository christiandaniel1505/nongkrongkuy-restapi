<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $daftar = Home::paginate(9);
        return view('halaman.index', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $daftar = new Home;
        $daftar->id = $request->id;
        $daftar->title = $request->title;
        $daftar->content = $request->content;
        $daftar->title2 = $request->title2;
        $daftar->content2 = $request->content2;

        $daftar->save();


        //jika berhasil, kembalike halaman utama
        return redirect()->route('admin.index')->with('success', 'daftar cafe Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftar = Home::find($id);

        //eloquent untuk mengambil data sebelum dan sesudah data sekarang
        $next = Home::where('id', '<', $id)->orderBy('id','desc')->first();
        $prev = Home::where('id', '>', $id)->orderBy('id')->first();

        return view('detail', compact('daftar', 'prev', 'next'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftar = Home::findOrFail($id);
        return view('halaman.edit', compact('daftar'));
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
        $daftar = Home::where('id', $id)->first();
        $daftar->id = $request->id;
        $daftar->title = $request->title;
        $daftar->content = $request->content;
        $daftar->title2 = $request->title2;
        $daftar->content2 = $request->content2;

        Home::findOrFail($id)->update($request->all());
        $daftar->save();



        //jika berhasil, kembalike halaman utama
        return redirect()->route('home.index')->with('success', 'daftar cafe Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Home::findOrFail($id)->delete();


        //jika berhasil, kembalike halaman utama
        return redirect()->route('admin.index')->with('success', 'home berhasil dihapus');
    }
}
