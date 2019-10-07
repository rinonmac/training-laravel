<?php

namespace App\Http\Controllers;

use App\Pengguna;
use App\position;
use Illuminate\Http\Request;
use DB;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = pengguna::all();
        $position = position::all();


        return view ('pages.home')->with('pengguna',$pengguna)->with('position',$position);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'fullname'=>'required|max:30',
            'username'=>'required|max:30',
            'password'=>'required|regex:[a-z][A-Z][0-9]',
            'email'=>'required|email',
            'phonenumber'=>'required|starts_with:+62',
            'position'=>'required'

            ]);
            Pengguna::create([
                'fullname'=> $request["fullname"],
                'username'=>$request["username"],
                'password'=>$request["password"],
                'email'=>$request["email"],
                'phonenumber'=>$request['phonenumber'],
                'position'=>$request['position']
            ]);

            return redirect('/')->with('status','Data berhasil disimpan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        //
    }
}
